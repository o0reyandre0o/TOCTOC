<?php
/**
 * /chamber-members/ form handler.
 *
 * Daniel's brief (Trello 606, 29 Sep 2026): Chamber of Commerce members leave
 * their details, we email them back whether their category is still open, and
 * every submission lands in the CRM tagged "Chamber of Commerce Cayman" — a
 * digital link between us and the Chamber.
 *
 * Outputs per submission:
 * 1. An email to info@toctoc.ky, always. It works with no setup, and it is the
 *    fallback if the CRM call fails.
 * 2. The CRM (GoHighLevel), when a Private Integration token and location ID
 *    are saved: the contact is upserted with the tag, and a note records the
 *    category and message. GHL's public API cannot create workflows, so any
 *    automation (confirmation email, task for Daniel) hangs off the tag inside
 *    GHL: trigger "Contact Tag added → Chamber of Commerce Cayman".
 * 3. Otherwise, a JSON POST to an inbound webhook if one is configured.
 *
 * The token lives only in the database. It is set through a write-only REST
 * route (admins only, never echoed back) or the password field on Settings →
 * General, and it is never committed to the theme repository.
 *
 * Spam: reuses the SEO checker's honeypot, timing and Turnstile checks and its
 * per-IP rate limit, when that file is loaded.
 *
 * @package Toc Toc
 */

defined( 'ABSPATH' ) || exit;

const TOCTOC_CHAMBER_TAG = 'Chamber of Commerce Cayman';
const TOCTOC_GHL_API     = 'https://services.leadconnectorhq.com';

/** Settings on Settings → General: GHL location, token (write-only) and the webhook fallback. */
add_action(
	'admin_init',
	function () {
		register_setting( 'general', 'toctoc_chamber_webhook', array( 'sanitize_callback' => 'esc_url_raw' ) );
		register_setting( 'general', 'toctoc_ghl_location', array( 'sanitize_callback' => 'sanitize_text_field' ) );
		register_setting(
			'general',
			'toctoc_ghl_token',
			array(
				// An empty submission keeps the saved token: the field never shows it.
				'sanitize_callback' => function ( $v ) {
					$v = trim( (string) $v );
					return '' === $v ? get_option( 'toctoc_ghl_token', '' ) : sanitize_text_field( $v );
				},
			)
		);
		add_settings_field(
			'toctoc_ghl_location',
			'Chamber members: GHL location ID',
			function () {
				printf( '<input type="text" id="toctoc_ghl_location" name="toctoc_ghl_location" value="%s" class="regular-text code" />', esc_attr( get_option( 'toctoc_ghl_location', '' ) ) );
			},
			'general'
		);
		add_settings_field(
			'toctoc_ghl_token',
			'Chamber members: GHL private integration token',
			function () {
				$set = '' !== get_option( 'toctoc_ghl_token', '' );
				printf(
					'<input type="password" id="toctoc_ghl_token" name="toctoc_ghl_token" value="" autocomplete="new-password" class="regular-text code" placeholder="%s" /><p class="description">%s Contacts are created with the tag &ldquo;%s&rdquo;.</p>',
					$set ? esc_attr( 'Saved — leave empty to keep it' ) : 'pit-…',
					$set ? 'A token is saved and hidden.' : 'No token saved.',
					esc_html( TOCTOC_CHAMBER_TAG )
				);
			},
			'general'
		);
		add_settings_field(
			'toctoc_chamber_webhook',
			'Chamber members: CRM webhook URL (fallback)',
			function () {
				printf(
					'<input type="url" id="toctoc_chamber_webhook" name="toctoc_chamber_webhook" value="%s" class="regular-text code" /><p class="description">Only used when no GHL token is saved.</p>',
					esc_attr( get_option( 'toctoc_chamber_webhook', '' ) )
				);
			},
			'general'
		);
	}
);

/**
 * Write-only REST route to save the GHL credentials: POST /wp-json/toctoc/v1/ghl
 * with token and location. Admins only; the response says whether a token is
 * set and never includes it.
 */
add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'toctoc/v1',
			'/ghl',
			array(
				'methods'             => 'POST',
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
				'callback'            => function ( WP_REST_Request $r ) {
					$token = trim( (string) $r->get_param( 'token' ) );
					$loc   = trim( (string) $r->get_param( 'location' ) );
					if ( '' !== $token ) {
						update_option( 'toctoc_ghl_token', sanitize_text_field( $token ), false );
					}
					if ( '' !== $loc ) {
						update_option( 'toctoc_ghl_location', sanitize_text_field( $loc ), false );
					}
					return array(
						'token_set' => '' !== get_option( 'toctoc_ghl_token', '' ),
						'location'  => get_option( 'toctoc_ghl_location', '' ),
					);
				},
			)
		);
	}
);

/**
 * Call the GHL API.
 *
 * @param string $method HTTP method.
 * @param string $path   Path after the API host.
 * @param array  $body   JSON body.
 * @return array{ok:bool, code:int, data:array}
 */
function toctoc_ghl_request( $method, $path, $body ) {
	$res  = wp_remote_request(
		TOCTOC_GHL_API . $path,
		array(
			'method'  => $method,
			'timeout' => 8,
			'headers' => array(
				'Authorization' => 'Bearer ' . get_option( 'toctoc_ghl_token', '' ),
				'Version'       => '2021-07-28',
				'Content-Type'  => 'application/json',
				'Accept'        => 'application/json',
			),
			'body'    => wp_json_encode( $body ),
		)
	);
	$code = is_wp_error( $res ) ? 0 : (int) wp_remote_retrieve_response_code( $res );
	$data = is_wp_error( $res ) ? array() : (array) json_decode( (string) wp_remote_retrieve_body( $res ), true );
	return array(
		'ok'   => $code >= 200 && $code < 300,
		'code' => $code,
		'data' => $data,
	);
}

/**
 * Send a submission to GHL: upsert the contact with the tag, then add a note.
 *
 * @param array<string,string> $f Sanitised fields.
 * @return string Status line for the team email.
 */
function toctoc_chamber_to_ghl( $f ) {
	$loc   = get_option( 'toctoc_ghl_location', '' );
	$parts = preg_split( '/\s+/', $f['name'], 2 );
	$up    = toctoc_ghl_request(
		'POST',
		'/contacts/upsert',
		array_filter(
			array(
				'locationId'  => $loc,
				'firstName'   => $parts[0],
				'lastName'    => isset( $parts[1] ) ? $parts[1] : '',
				'name'        => $f['name'],
				'email'       => $f['email'],
				'phone'       => $f['phone'],
				'companyName' => $f['business'],
				'website'     => $f['website'],
				'tags'        => array( TOCTOC_CHAMBER_TAG ),
				'source'      => 'toctoc.ky/chamber-members',
			)
		)
	);
	$id = isset( $up['data']['contact']['id'] ) ? $up['data']['contact']['id'] : '';
	if ( ! $up['ok'] || ! $id ) {
		error_log( 'toctoc chamber: GHL upsert failed, HTTP ' . $up['code'] ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions
		return 'CRM: could not create the contact (HTTP ' . $up['code'] . '). Add it by hand.';
	}
	$note = "Chamber of Commerce member — category check\nCategory: " . $f['category'];
	if ( '' !== $f['message'] ) {
		$note .= "\nMessage: " . $f['message'];
	}
	$note .= "\nFrom: https://toctoc.ky/chamber-members/";
	toctoc_ghl_request( 'POST', '/contacts/' . rawurlencode( $id ) . '/notes', array( 'body' => $note ) );
	return 'CRM: contact saved in GHL with the tag "' . TOCTOC_CHAMBER_TAG . '".';
}

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

	// CRM first, so the team email can say whether it worked.
	$crm = 'CRM: not connected.';
	if ( get_option( 'toctoc_ghl_token', '' ) && get_option( 'toctoc_ghl_location', '' ) ) {
		$crm = toctoc_chamber_to_ghl( $f );
	} elseif ( get_option( 'toctoc_chamber_webhook', '' ) ) {
		$parts = preg_split( '/\s+/', $f['name'], 2 );
		wp_remote_post(
			get_option( 'toctoc_chamber_webhook', '' ),
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
		$crm = 'CRM: sent to the webhook.';
	}

	// Email to the team, always.
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
	$body .= "\nReply to this email to answer them.\n" . $crm . "\n";
	wp_mail(
		'info@toctoc.ky',
		'Chamber member — category check: ' . $f['category'] . ' (' . $f['business'] . ')',
		$body,
		array( 'Reply-To: ' . $f['name'] . ' <' . $f['email'] . '>' )
	);

	wp_safe_redirect( add_query_arg( 'form', 'sent', $back ) . '#check' );
	exit;
}
add_action( 'admin_post_nopriv_toctoc_chamber', 'toctoc_chamber_submit' );
add_action( 'admin_post_toctoc_chamber', 'toctoc_chamber_submit' );
