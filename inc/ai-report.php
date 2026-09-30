<?php
/**
 * /free-ai-visibility-report/ form handler (AJAX).
 *
 * The landing page posts here with fetch() and shows its thank-you panel only
 * when this answers success. Each request:
 * 1. is emailed to info@toctoc.ky, always (Reply-To the lead);
 * 2. becomes a GoHighLevel contact tagged "ai visibility report", with a note
 *    holding the service, website and campaign source (?src=…), using the same
 *    token and helper as the Chamber form (inc/chamber-members.php).
 *
 * No nonce on purpose: the page may be served from a cache for longer than a
 * nonce lives, and a stale nonce would silently lose leads. Spam is handled by
 * Cloudflare Turnstile (same keys as the SEO checker, added 30 Sep 2026), the
 * checker's honeypot + timing checks and a per-IP rate limit.
 *
 * @package Toc Toc
 */

defined( 'ABSPATH' ) || exit;

const TOCTOC_REPORT_TAG = 'ai visibility report';

/**
 * Handle one report request.
 *
 * @return void
 */
function toctoc_ai_report_submit() {
	// Bots are told it worked, so they learn nothing.
	if ( function_exists( 'toctoc_seo_looks_automated' ) && toctoc_seo_looks_automated() ) {
		wp_send_json_success();
	}
	// A failed captcha is answered honestly so a person can retry.
	if ( function_exists( 'toctoc_seo_turnstile_ok' ) && ! toctoc_seo_turnstile_ok() ) {
		wp_send_json_error( array( 'reason' => 'captcha' ), 403 );
	}
	if ( function_exists( 'toctoc_seo_rate_limited' ) && toctoc_seo_rate_limited( 'ai_report', 5 ) ) {
		wp_send_json_error( array( 'reason' => 'limit' ), 429 );
	}

	$f = array();
	foreach ( array( 'name', 'business', 'service', 'source' ) as $k ) {
		$f[ $k ] = isset( $_POST[ $k ] ) ? sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing -- see file comment.
	}
	$f['email']   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
	$f['website'] = isset( $_POST['website'] ) ? sanitize_text_field( wp_unslash( $_POST['website'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
	$f['source']  = substr( '' !== $f['source'] ? $f['source'] : 'direct', 0, 80 );

	if ( '' === $f['name'] || '' === $f['business'] || ! is_email( $f['email'] ) ) {
		wp_send_json_error( array( 'reason' => 'missing' ), 400 );
	}

	// CRM first, so the email can say whether it worked.
	$crm = 'CRM: not connected.';
	if ( function_exists( 'toctoc_ghl_request' ) && get_option( 'toctoc_ghl_token', '' ) && get_option( 'toctoc_ghl_location', '' ) ) {
		$parts   = preg_split( '/\s+/', $f['name'], 2 );
		$website = $f['website'];
		if ( '' !== $website && ! preg_match( '#^https?://#i', $website ) ) {
			$website = 'https://' . $website;
		}
		$up = toctoc_ghl_request(
			'POST',
			'/contacts/upsert',
			array_filter(
				array(
					'locationId'  => get_option( 'toctoc_ghl_location', '' ),
					'firstName'   => $parts[0],
					'lastName'    => isset( $parts[1] ) ? $parts[1] : '',
					'name'        => $f['name'],
					'email'       => $f['email'],
					'companyName' => $f['business'],
					'website'     => esc_url_raw( $website ),
					'tags'        => array( TOCTOC_REPORT_TAG ),
					'source'      => 'toctoc.ky/free-ai-visibility-report (src=' . $f['source'] . ')',
				)
			)
		);
		$id = isset( $up['data']['contact']['id'] ) ? $up['data']['contact']['id'] : '';
		if ( $up['ok'] && $id ) {
			$note = "Free AI & Google Visibility Report request\n"
				. 'Business: ' . $f['business'] . "\n"
				. 'Customers look for: ' . ( '' !== $f['service'] ? $f['service'] : '(not given)' ) . "\n"
				. 'Website: ' . ( '' !== $f['website'] ? $f['website'] : '(none)' ) . "\n"
				. 'Source: ' . $f['source'] . "\n"
				. 'Promised: report by email within one business day.';
			toctoc_ghl_request( 'POST', '/contacts/' . rawurlencode( $id ) . '/notes', array( 'body' => $note ) );
			$crm = 'CRM: contact saved in GHL with the tag "' . TOCTOC_REPORT_TAG . '".';
		} else {
			error_log( 'toctoc ai report: GHL upsert failed, HTTP ' . $up['code'] ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions
			$crm = 'CRM: could not create the contact (HTTP ' . $up['code'] . '). Add it by hand.';
		}
	}

	$body = "New request for the Free AI & Google Visibility Report.\n"
		. "Promised: the report by email within one business day.\n\n"
		. 'Name: ' . $f['name'] . "\n"
		. 'Business: ' . $f['business'] . "\n"
		. 'Email: ' . $f['email'] . "\n"
		. 'Website: ' . ( '' !== $f['website'] ? $f['website'] : '(none)' ) . "\n"
		. 'Customers look for: ' . ( '' !== $f['service'] ? $f['service'] : '(not given)' ) . "\n"
		. 'Source: ' . $f['source'] . "\n\n"
		. $crm . "\n";
	wp_mail(
		'info@toctoc.ky',
		'AI visibility report request: ' . $f['business'],
		$body,
		array( 'Reply-To: ' . $f['name'] . ' <' . $f['email'] . '>' )
	);

	wp_send_json_success();
}
add_action( 'wp_ajax_nopriv_toctoc_ai_report', 'toctoc_ai_report_submit' );
add_action( 'wp_ajax_toctoc_ai_report', 'toctoc_ai_report_submit' );
