<?php
/**
 * Instant indexing via IndexNow, with Bing Webmaster as the reporting side.
 *
 * When a page is published or updated its URL is pushed straight to the search
 * engines instead of waiting to be crawled. IndexNow is used rather than Bing's
 * own SubmitUrl endpoint because one call reaches every participating engine —
 * Bing, Yandex, Seznam, Naver — and does not spend the Webmaster API quota.
 *
 * Why this matters more than Bing's traffic suggests: ChatGPT's web search reads
 * Bing's index. Measured 2026-08-05, toctoc.ky sits at position 1 on Bing for
 * "cayman seo" on almost no impressions. The clicks are irrelevant; the
 * placement is what an answer engine reads, so being indexed within minutes of
 * publishing is being quotable within minutes of publishing.
 *
 * The key is NOT a credential. IndexNow works by proving control of the host:
 * the same key must be readable at a public URL on the domain, which is exactly
 * what makes the submission trustworthy. It is served dynamically here — same
 * trick as /sitemap.xml and /llms.txt — so nothing has to be uploaded by hand.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Bing {

	/** Public by design — see the class note. Override in wp-config if rotated. */
	const DEFAULT_KEY = '89b2bdcf8a4a4dbea388cce7d7eaee28';

	const INDEXNOW  = 'https://api.indexnow.org/IndexNow';
	const WEBMASTER = 'https://ssl.bing.com/webmaster/api.svc/json/';
	const LOG       = 'tch_bing_log';

	public static function init() {
		add_action( 'init', array( __CLASS__, 'serve_key_file' ) );
		add_action( 'transition_post_status', array( __CLASS__, 'on_transition' ), 10, 3 );
	}

	public static function key() {
		return defined( 'TCH_INDEXNOW_KEY' ) && TCH_INDEXNOW_KEY ? TCH_INDEXNOW_KEY : self::DEFAULT_KEY;
	}

	public static function key_location() {
		return home_url( '/' . self::key() . '.txt' );
	}

	/**
	 * Serve /<key>.txt containing the key. Intercepted before WordPress routing
	 * so no physical file and no permalink flush is needed — the same approach
	 * the sitemap uses.
	 */
	public static function serve_key_file() {
		$path = strtok( $_SERVER['REQUEST_URI'] ?? '', '?' );
		if ( '/' . self::key() . '.txt' !== $path ) {
			return;
		}
		header( 'Content-Type: text/plain; charset=utf-8' );
		echo esc_html( self::key() );
		exit;
	}

	public static function on_transition( $new_status, $old_status, $post ) {
		if ( 'publish' !== $new_status ) {
			return;
		}
		// Public post types only. The hub's client and content records are
		// private and must never be handed to a search engine.
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

		// One submission per URL per hour: saving a page repeatedly while editing
		// should not look like hammering to the receiving engines.
		$guard = 'tch_in_sent_' . md5( $url );
		if ( get_transient( $guard ) ) {
			return;
		}
		set_transient( $guard, 1, HOUR_IN_SECONDS );

		// Deferred — submitting must never slow down or break saving a post.
		wp_schedule_single_event( time() + 15, 'tch_bing_submit', array( array( $url ) ) );
	}

	/**
	 * Submit one or more URLs. Up to 10,000 per call per the protocol.
	 * Returns true or a WP_Error.
	 */
	public static function submit( $urls ) {
		$urls = array_values( array_filter( (array) $urls ) );
		if ( ! $urls ) {
			return new WP_Error( 'tch_in_empty', 'no URLs given' );
		}
		$host = wp_parse_url( home_url(), PHP_URL_HOST );

		$resp = wp_remote_post( self::INDEXNOW, array(
			'timeout' => 20,
			'headers' => array( 'Content-Type' => 'application/json; charset=utf-8' ),
			'body'    => wp_json_encode( array(
				'host'        => $host,
				'key'         => self::key(),
				'keyLocation' => self::key_location(),
				'urlList'     => array_slice( $urls, 0, 10000 ),
			) ),
		) );

		if ( is_wp_error( $resp ) ) {
			self::log( $urls, 'error: ' . $resp->get_error_message() );
			return $resp;
		}
		$code = (int) wp_remote_retrieve_response_code( $resp );

		// The protocol's codes are specific enough to be worth naming: a 403
		// means the key file is not readable, which is the one failure that
		// silently disables everything.
		$meanings = array(
			200 => 'accepted',
			202 => 'accepted (key validation pending)',
			400 => 'bad request — malformed payload',
			403 => 'key rejected — ' . self::key_location() . ' is not serving the key',
			422 => 'URLs do not belong to this host, or key mismatch',
			429 => 'rate limited',
		);
		$msg = $meanings[ $code ] ?? ( 'HTTP ' . $code );

		self::log( $urls, ( $code < 300 ? '' : 'error: ' ) . $msg );
		return $code < 300 ? true : new WP_Error( 'tch_in_api', $msg );
	}

	/** Every published page — used by the "submit everything" button. */
	public static function submit_all() {
		$urls = array( home_url( '/' ) );
		foreach ( get_posts( array(
			'post_type'   => 'page',
			'post_status' => 'publish',
			'numberposts' => 200,
			'fields'      => 'ids',
		) ) as $id ) {
			$link = get_permalink( $id );
			if ( $link ) {
				$urls[] = $link;
			}
		}
		return self::submit( array_unique( $urls ) );
	}

	private static function log( $urls, $result ) {
		$log = (array) get_option( self::LOG, array() );
		array_unshift( $log, array(
			'time'   => time(),
			'url'    => count( $urls ) > 1 ? count( $urls ) . ' URLs' : reset( $urls ),
			'result' => $result,
		) );
		update_option( self::LOG, array_slice( $log, 0, 30 ), false );
	}

	public static function get_log() {
		return (array) get_option( self::LOG, array() );
	}

	/** True when the key file actually answers — the thing that breaks silently. */
	public static function key_file_ok() {
		$cached = get_transient( 'tch_in_keyfile' );
		if ( false !== $cached ) {
			return (bool) $cached;
		}
		$resp = wp_remote_get( self::key_location(), array( 'timeout' => 10 ) );
		$ok   = ! is_wp_error( $resp )
			&& 200 === (int) wp_remote_retrieve_response_code( $resp )
			&& self::key() === trim( (string) wp_remote_retrieve_body( $resp ) );
		set_transient( 'tch_in_keyfile', $ok ? 1 : 0, HOUR_IN_SECONDS );
		return $ok;
	}

	/** Bing Webmaster is still the place to see whether URLs landed. */
	public static function is_configured() {
		return defined( 'TCH_BING_API_KEY' ) && TCH_BING_API_KEY;
	}

	public static function quota() {
		if ( ! self::is_configured() ) {
			return null;
		}
		$resp = wp_remote_get( add_query_arg( array(
			'siteUrl' => home_url( '/' ),
			'apikey'  => TCH_BING_API_KEY,
		), self::WEBMASTER . 'GetUrlSubmissionQuota' ), array( 'timeout' => 15 ) );
		if ( is_wp_error( $resp ) ) {
			return null;
		}
		$data = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
		return $data['d'] ?? null;
	}
}

add_action( 'tch_bing_submit', array( 'TCH_Bing', 'submit' ), 10, 1 );
