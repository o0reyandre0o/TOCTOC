<?php
/**
 * Bing URL submission.
 *
 * Every time a page is published or updated, its URL is pushed straight into
 * Bing's index instead of waiting to be crawled. Bing grants 10,000 submissions
 * a day, which is far more headroom than this site will ever need.
 *
 * Why bother with Bing at a fraction of Google's volume: ChatGPT's web search
 * reads Bing's index. Measured 2026-08-05, toctoc.ky ranks position 1 on Bing
 * for "cayman seo" while barely registering any impressions — the traffic is
 * negligible but the placement is what an answer engine actually reads. Getting
 * a page indexed fast is getting it quotable fast, which is the product this
 * agency sells.
 *
 * wp-config.php:
 *   define( 'TCH_BING_API_KEY', '…' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Bing {

	const ENDPOINT = 'https://ssl.bing.com/webmaster/api.svc/json/';
	const LOG      = 'tch_bing_log';

	public static function init() {
		// Fires on publish and on every later update of an already-live page.
		add_action( 'transition_post_status', array( __CLASS__, 'on_transition' ), 10, 3 );
	}

	public static function is_configured() {
		return defined( 'TCH_BING_API_KEY' ) && TCH_BING_API_KEY;
	}

	public static function on_transition( $new_status, $old_status, $post ) {
		if ( 'publish' !== $new_status || ! self::is_configured() ) {
			return;
		}
		// Only real, public pages. The hub's own post types are private and must
		// never be handed to a search engine.
		$type = get_post_type_object( $post->post_type );
		if ( ! $type || empty( $type->public ) ) {
			return;
		}
		if ( wp_is_post_revision( $post ) || wp_is_post_autosave( $post ) ) {
			return;
		}

		$url = get_permalink( $post );
		if ( ! $url ) {
			return;
		}

		// One submission per URL per hour. Saving a page four times while editing
		// should not spend four submissions or look like hammering to Bing.
		$guard = 'tch_bing_sent_' . md5( $url );
		if ( get_transient( $guard ) ) {
			return;
		}
		set_transient( $guard, 1, HOUR_IN_SECONDS );

		// Deferred: submission must never slow down or break saving a post.
		wp_schedule_single_event( time() + 15, 'tch_bing_submit', array( $url ) );
	}

	/** Submit one URL. Returns true, or a WP_Error. */
	public static function submit( $url ) {
		if ( ! self::is_configured() ) {
			return new WP_Error( 'tch_bing_unset', 'TCH_BING_API_KEY is not defined' );
		}
		$resp = wp_remote_post(
			self::ENDPOINT . 'SubmitUrl?apikey=' . rawurlencode( TCH_BING_API_KEY ),
			array(
				'timeout' => 20,
				'headers' => array( 'Content-Type' => 'application/json; charset=utf-8' ),
				'body'    => wp_json_encode( array(
					'siteUrl' => home_url( '/' ),
					'url'     => $url,
				) ),
			)
		);
		if ( is_wp_error( $resp ) ) {
			self::log( $url, 'error: ' . $resp->get_error_message() );
			return $resp;
		}
		$code = (int) wp_remote_retrieve_response_code( $resp );
		if ( $code >= 300 ) {
			$body = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
			$msg  = (string) ( $body['Message'] ?? ( 'HTTP ' . $code ) );
			self::log( $url, 'error: ' . $msg );
			return new WP_Error( 'tch_bing_api', $msg );
		}
		self::log( $url, 'submitted' );
		return true;
	}

	/** Last 30 submissions, newest first — surfaced on the hub's Setup screen. */
	private static function log( $url, $result ) {
		$log = (array) get_option( self::LOG, array() );
		array_unshift( $log, array( 'time' => time(), 'url' => $url, 'result' => $result ) );
		update_option( self::LOG, array_slice( $log, 0, 30 ), false );
	}

	public static function get_log() {
		return (array) get_option( self::LOG, array() );
	}

	/** Remaining quota, or null if unavailable. */
	public static function quota() {
		if ( ! self::is_configured() ) {
			return null;
		}
		$resp = wp_remote_get( add_query_arg( array(
			'siteUrl' => home_url( '/' ),
			'apikey'  => TCH_BING_API_KEY,
		), self::ENDPOINT . 'GetUrlSubmissionQuota' ), array( 'timeout' => 15 ) );
		if ( is_wp_error( $resp ) ) {
			return null;
		}
		$data = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
		return isset( $data['d'] ) ? $data['d'] : null;
	}
}

/** Cron target for the deferred submission. */
add_action( 'tch_bing_submit', array( 'TCH_Bing', 'submit' ), 10, 1 );
