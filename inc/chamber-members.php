<?php
/**
 * /chamber-members/ form handler.
 *
 * Daniel's brief (Trello 606, 29 Sep 2026): Chamber of Commerce members leave
 * their details, we email them back whether their category is still open, and
 * every submission lands in the CRM tagged "Chamber of Commerce Cayman" — a
 * digital link between us and the Chamber.
 *
 * Two outputs per submission:
 * 1. An email to info@toctoc.ky, always. It works the day the page goes live
 *    and needs no setup.
 * 2. A JSON POST to the CRM's inbound webhook, when one is saved under
 *    Settings → General → "Chamber members: CRM webhook URL". The workflow on
 *    the CRM side creates or updates the contact and applies the tag; the tag
 *    is also sent in the payload so the mapping is obvious.
 *
 * Spam: reuses the SEO checker's honeypot, timing and Turnstile checks and its
 * per-IP rate limit, when that file is loaded.
 *
 * @package Toc Toc
 */

defined( 'ABSPATH' ) || exit;

const TOCTOC_CHAMBER_TAG = 'Chamber of Commerce Cayman';

/** Settings field for the CRM webhook, on Settings → General. */
add_action(
	'admin_init',
	function () {
		register_setting( 'general', 'toctoc_chamber_webhook', array( 'sanitize_callback' => 'esc_url_raw' ) );
		add_settings_field(
			'toctoc_chamber_webhook',
			'Chamber members: CRM webhook URL',
			function () {
				printf(
					'<input type="url" id="toctoc_chamber_webhook" name="toctoc_chamber_webhook" value="%s" class="regular-text code" placeholder="https://services.leadconnectorhq.com/hooks/…" /><p class="description">Inbound webhook of the CRM workflow that adds the tag &ldquo;%s&rdquo;. Leave empty to only send the email to info@toctoc.ky.</p>',
					esc_attr( get_option( 'toctoc_chamber_webhook', '' ) ),
					esc_html( TOCTOC_CHAMBER_TAG )
				);
			},
			'general'
		);
	}
);

/**
 * Handle a submission, logged in or not.
 *
 * @return void
 */
function toctoc_chamber_submit() {
	$back = home_url( '/chamber-members/' );

	if ( ! isset( $_POST['ttc_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ttc_nonce'] ) ), 'toctoc_chamber' ) ) {
		wp_safe_redirect( add_query_arg( 'form', 'error', $back ) . '#check' );
		exit;
	}

	// Bots get the same "sent" screen as people, so they learn nothing.
	$spam = ( function_exists( 'toctoc_seo_looks_automated' ) && toctoc_seo_looks_automated() )
		|| ( function_exists( 'toctoc_seo_turnstile_ok' ) && ! toctoc_seo_turnstile_ok() );
	if ( $spam ) {
		wp_safe_redirect( add_query_arg( 'form', 'sent', $back ) . '#check' );
		exit;
	}
	if ( function_exists( 'toctoc_seo_rate_limited' ) && toctoc_seo_rate_limited( 'chamber', 5 ) ) {
		wp_safe_redirect( add_query_arg( 'form', 'limit', $back ) . '#check' );
		exit;
	}

	$f = array();
	foreach ( array( 'name', 'business', 'category', 'phone' ) as $k ) {
		$f[ $k ] = isset( $_POST[ $k ] ) ? sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) : '';
	}
	$f['email']   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$f['website'] = isset( $_POST['website'] ) ? esc_url_raw( wp_unslash( $_POST['website'] ) ) : '';
	$f['message'] = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $f['name'] || '' === $f['business'] || '' === $f['category'] || ! is_email( $f['email'] ) ) {
		wp_safe_redirect( add_query_arg( 'form', 'missing', $back ) . '#check' );
		exit;
	}

	// 1. Email to the team.
	$rows = array(
		'Name'     => $f['name'],
		'Business' => $f['business'],
		'Category' => $f['category'],
		'Email'    => $f['email'],
		'Phone'    => $f['phone'],
		'Website'  => $f['website'],
		'Message'  => $f['message'],
	);
	$body = "A Chamber of Commerce member asked whether their category is available.\n\n";
	foreach ( $rows as $label => $value ) {
		if ( '' !== $value ) {
			$body .= $label . ': ' . $value . "\n";
		}
	}
	$body .= "\nReply to this email to answer them. CRM tag: " . TOCTOC_CHAMBER_TAG . "\n";
	wp_mail(
		'info@toctoc.ky',
		'Chamber member — category check: ' . $f['category'] . ' (' . $f['business'] . ')',
		$body,
		array( 'Reply-To: ' . $f['name'] . ' <' . $f['email'] . '>' )
	);

	// 2. CRM, when a webhook is configured.
	$hook = get_option( 'toctoc_chamber_webhook', '' );
	if ( $hook ) {
		$parts = preg_split( '/\s+/', $f['name'], 2 );
		wp_remote_post(
			$hook,
			array(
				'timeout'  => 8,
				'blocking' => false,
				'headers'  => array( 'Content-Type' => 'application/json' ),
				'body'     => wp_json_encode(
					array(
						'first_name'   => $parts[0],
						'last_name'    => isset( $parts[1] ) ? $parts[1] : '',
						'full_name'    => $f['name'],
						'email'        => $f['email'],
						'phone'        => $f['phone'],
						'company_name' => $f['business'],
						'website'      => $f['website'],
						'category'     => $f['category'],
						'message'      => $f['message'],
						'tags'         => array( TOCTOC_CHAMBER_TAG ),
						'source'       => 'toctoc.ky/chamber-members',
					)
				),
			)
		);
	}

	wp_safe_redirect( add_query_arg( 'form', 'sent', $back ) . '#check' );
	exit;
}
add_action( 'admin_post_nopriv_toctoc_chamber', 'toctoc_chamber_submit' );
add_action( 'admin_post_toctoc_chamber', 'toctoc_chamber_submit' );
