<?php
/**
 * LinkedIn connection: OAuth, organization discovery and page posting.
 *
 * Unlike YouTube — where a token publishes only to the channel that authorised
 * it, forcing one connection per client — LinkedIn lists every organization the
 * signed-in member administers. So a single agency connection covers all client
 * pages, which is exactly how TocToc operates.
 *
 * Built before approval lands (Community Management API requested 2026-08-05).
 * Until then the calls return LinkedIn's own permission error, surfaced verbatim
 * in the delivery log, and the Connect button doubles as the approval test.
 *
 * wp-config.php:
 *   define( 'TCH_LINKEDIN_CLIENT_ID',     '77an6u7k65xx8d' );
 *   define( 'TCH_LINKEDIN_CLIENT_SECRET', '…' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_LinkedIn {

	const AUTH_URL  = 'https://www.linkedin.com/oauth/v2/authorization';
	const TOKEN_URL = 'https://www.linkedin.com/oauth/v2/accessToken';

	/**
	 * Versioned APIs require an explicit YYYYMM version header. LinkedIn keeps
	 * roughly a year of versions live, so this trails the current month a little
	 * rather than tracking it — an unreleased version is rejected outright.
	 */
	const API_VERSION = '202606';

	/** Read pages, manage them, and post as them. */
	const SCOPES = 'r_organization_social w_organization_social rw_organization_admin';

	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'maybe_handle_oauth' ) );
		add_action( 'admin_init', array( __CLASS__, 'maybe_handle_actions' ) );
	}

	public static function is_configured() {
		return defined( 'TCH_LINKEDIN_CLIENT_ID' ) && TCH_LINKEDIN_CLIENT_ID
			&& defined( 'TCH_LINKEDIN_CLIENT_SECRET' ) && TCH_LINKEDIN_CLIENT_SECRET
			&& TCH_Credentials::is_available();
	}

	public static function is_connected() {
		return null !== TCH_Credentials::get( 'linkedin', 'access_token' );
	}

	public static function redirect_uri() {
		return admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_oauth=linkedin' );
	}

	public static function connect_url() {
		return self::AUTH_URL . '?' . http_build_query( array(
			'response_type' => 'code',
			'client_id'     => TCH_LINKEDIN_CLIENT_ID,
			'redirect_uri'  => self::redirect_uri(),
			'scope'         => self::SCOPES,
			'state'         => wp_create_nonce( 'tch_linkedin_oauth' ),
		) );
	}

	public static function discover_url() {
		return wp_nonce_url(
			admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=discover_linkedin' ),
			'tch_discover_linkedin'
		);
	}

	public static function disconnect_url() {
		return wp_nonce_url(
			admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=linkedin_disconnect' ),
			'tch_linkedin_disconnect'
		);
	}

	public static function maybe_handle_oauth() {
		if ( ! isset( $_GET['page'], $_GET['tch_oauth'] )
			|| TCH_Dashboard::SLUG !== $_GET['page'] || 'linkedin' !== $_GET['tch_oauth'] ) {
			return;
		}
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			return;
		}
		$back = admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG );

		if ( isset( $_GET['error'] ) ) {
			TCH_Google::flash_public( 'LinkedIn returned: ' . sanitize_text_field( wp_unslash( $_GET['error_description'] ?? $_GET['error'] ) ) );
			wp_safe_redirect( $back );
			exit;
		}
		if ( ! isset( $_GET['code'], $_GET['state'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['state'] ) ), 'tch_linkedin_oauth' ) ) {
			TCH_Google::flash_public( 'LinkedIn state check failed — try connecting again.' );
			wp_safe_redirect( $back );
			exit;
		}

		$resp = wp_remote_post( self::TOKEN_URL, array(
			'timeout' => 20,
			'headers' => array( 'Content-Type' => 'application/x-www-form-urlencoded' ),
			'body'    => array(
				'grant_type'    => 'authorization_code',
				'code'          => sanitize_text_field( wp_unslash( $_GET['code'] ) ),
				'client_id'     => TCH_LINKEDIN_CLIENT_ID,
				'client_secret' => TCH_LINKEDIN_CLIENT_SECRET,
				'redirect_uri'  => self::redirect_uri(),
			),
		) );
		$data = is_wp_error( $resp ) ? array() : json_decode( (string) wp_remote_retrieve_body( $resp ), true );

		if ( empty( $data['access_token'] ) ) {
			TCH_Google::flash_public( 'LinkedIn token exchange failed: ' . (string) ( $data['error_description'] ?? $data['error'] ?? 'no token returned' ) );
			wp_safe_redirect( $back );
			exit;
		}

		TCH_Credentials::set( 'linkedin', 'access_token', $data['access_token'] );
		// LinkedIn access tokens last ~60 days and only some apps get a refresh
		// token, so the expiry is stored and surfaced rather than assumed away.
		update_option( 'tch_linkedin_expires', time() + (int) ( $data['expires_in'] ?? 5184000 ), false );
		if ( ! empty( $data['refresh_token'] ) ) {
			TCH_Credentials::set( 'linkedin', 'refresh_token', $data['refresh_token'] );
		}

		TCH_Google::flash_public( 'LinkedIn connected.', 'success' );
		wp_safe_redirect( $back );
		exit;
	}

	public static function maybe_handle_actions() {
		if ( ! isset( $_GET['page'], $_GET['tch_action'] ) || TCH_Dashboard::SLUG !== $_GET['page'] ) {
			return;
		}
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			return;
		}
		$action = sanitize_key( wp_unslash( $_GET['tch_action'] ) );
		$back   = admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG );

		if ( 'linkedin_disconnect' === $action ) {
			check_admin_referer( 'tch_linkedin_disconnect' );
			TCH_Credentials::delete( 'linkedin', 'access_token' );
			TCH_Credentials::delete( 'linkedin', 'refresh_token' );
			delete_option( 'tch_linkedin_expires' );
			TCH_Google::flash_public( 'LinkedIn disconnected.', 'success' );
			wp_safe_redirect( $back );
			exit;
		}

		if ( 'discover_linkedin' === $action ) {
			check_admin_referer( 'tch_discover_linkedin' );
			$result = self::discover_organizations();
			if ( is_wp_error( $result ) ) {
				TCH_Google::flash_public( 'LinkedIn discovery failed: ' . $result->get_error_message() );
			} else {
				TCH_Google::flash_public( sprintf( 'LinkedIn — %d page(s) matched to clients.', $result ), 'success' );
			}
			wp_safe_redirect( $back );
			exit;
		}
	}

	public static function access_token() {
		$token = TCH_Credentials::get( 'linkedin', 'access_token' );
		if ( null === $token ) {
			return null;
		}
		$expires = (int) get_option( 'tch_linkedin_expires' );
		if ( $expires && $expires < time() ) {
			return null; // expired; the UI offers Connect again
		}
		return $token;
	}

	/** Days left on the current token, or null when not connected. */
	public static function days_left() {
		$expires = (int) get_option( 'tch_linkedin_expires' );
		if ( ! $expires || ! self::is_connected() ) {
			return null;
		}
		return max( 0, (int) floor( ( $expires - time() ) / DAY_IN_SECONDS ) );
	}

	private static function request( $method, $url, $body = null ) {
		$token = self::access_token();
		if ( ! $token ) {
			return new WP_Error( 'tch_no_token', 'LinkedIn not connected (or the token expired)' );
		}
		$args = array(
			'method'  => $method,
			'timeout' => 30,
			'headers' => array(
				'Authorization'             => 'Bearer ' . $token,
				'LinkedIn-Version'          => self::API_VERSION,
				'X-Restli-Protocol-Version' => '2.0.0',
				'Content-Type'              => 'application/json',
			),
		);
		if ( null !== $body ) {
			$args['body'] = wp_json_encode( $body );
		}
		$resp = wp_remote_request( $url, $args );
		if ( is_wp_error( $resp ) ) {
			return $resp;
		}
		$code = (int) wp_remote_retrieve_response_code( $resp );
		$raw  = (string) wp_remote_retrieve_body( $resp );
		$json = json_decode( $raw, true );

		if ( $code >= 400 ) {
			$message = is_array( $json ) ? (string) ( $json['message'] ?? $json['error_description'] ?? '' ) : '';
			if ( '' === $message ) {
				$message = 'HTTP ' . $code . ' ' . mb_substr( $raw, 0, 200 );
			}
			return new WP_Error( 'tch_api', $message );
		}
		return array( 'body' => is_array( $json ) ? $json : array(), 'headers' => wp_remote_retrieve_headers( $resp ) );
	}

	/**
	 * List every page the connected member administers and write the URN onto
	 * the matching client, so nobody has to hunt for urn:li:organization ids by
	 * hand. Matches on the page's vanity name or its website host against the
	 * client's stored LinkedIn URL, then falls back to the client title.
	 */
	public static function discover_organizations() {
		$url = 'https://api.linkedin.com/rest/organizationAcls?q=roleAssignee&role=ADMINISTRATOR&state=APPROVED'
			. '&projection=(elements*(organization~(id,localizedName,vanityName,localizedWebsite)))';
		$res = self::request( 'GET', $url );
		if ( is_wp_error( $res ) ) {
			return $res;
		}
		$elements = (array) ( $res['body']['elements'] ?? array() );
		if ( ! $elements ) {
			return new WP_Error( 'tch_none', 'the connected account administers no pages' );
		}

		$clients = TCH_Post_Type::all();
		$matched = 0;

		foreach ( $elements as $el ) {
			$org = $el['organization~'] ?? array();
			$id  = (int) ( $org['id'] ?? 0 );
			if ( ! $id ) {
				continue;
			}
			$urn    = 'urn:li:organization:' . $id;
			$vanity = strtolower( (string) ( $org['vanityName'] ?? '' ) );
			$name   = strtolower( (string) ( $org['localizedName'] ?? '' ) );
			$site   = strtolower( (string) wp_parse_url( (string) ( $org['localizedWebsite'] ?? '' ), PHP_URL_HOST ) );
			$site   = preg_replace( '/^www\./', '', $site );

			foreach ( $clients as $client ) {
				$stored_url = strtolower( (string) get_post_meta( $client->ID, TCH_Platforms::meta_key( 'linkedin', 'url' ), true ) );
				$client_web = strtolower( (string) wp_parse_url( (string) get_post_meta( $client->ID, '_tch_client_website', true ), PHP_URL_HOST ) );
				$client_web = preg_replace( '/^www\./', '', $client_web );
				$title      = strtolower( get_the_title( $client ) );

				$hit = ( $vanity && false !== strpos( $stored_url, '/' . $vanity ) )
					|| ( '' !== $stored_url && false !== strpos( $stored_url, '/' . $id ) )
					|| ( $site && $client_web && $site === $client_web )
					|| ( $name && $name === $title );

				if ( ! $hit ) {
					continue;
				}
				update_post_meta( $client->ID, TCH_Platforms::meta_key( 'linkedin', 'organization_urn' ), $urn );
				if ( '' === $stored_url && $vanity ) {
					update_post_meta( $client->ID, TCH_Platforms::meta_key( 'linkedin', 'url' ), 'https://www.linkedin.com/company/' . $vanity . '/' );
				}
				$matched++;
				break;
			}
		}
		update_option( 'tch_linkedin_last_discover', time(), false );
		return $matched;
	}

	/**
	 * Publish to a company page. Text-only for now: LinkedIn image posts need a
	 * separate upload-registration round trip, which is worth adding once the
	 * text path is proven against the live API rather than guessed at.
	 */
	public static function publish( $urn, $text ) {
		$text = trim( wp_strip_all_tags( (string) $text ) );
		if ( '' === $text ) {
			return new WP_Error( 'tch_empty', 'post body is empty' );
		}
		if ( mb_strlen( $text ) > 3000 ) {
			$text = mb_substr( $text, 0, 2997 ) . '…';
		}
		$res = self::request( 'POST', 'https://api.linkedin.com/rest/posts', array(
			'author'                    => $urn,
			'commentary'                => $text,
			'visibility'                => 'PUBLIC',
			'distribution'              => array(
				'feedDistribution'               => 'MAIN_FEED',
				'targetEntities'                 => array(),
				'thirdPartyDistributionChannels' => array(),
			),
			'lifecycleState'            => 'PUBLISHED',
			'isReshareDisabledByAuthor' => false,
		) );
		if ( is_wp_error( $res ) ) {
			return $res;
		}
		// The new post's id comes back in a header, not the body.
		$id = '';
		if ( isset( $res['headers'] ) && method_exists( $res['headers'], 'offsetGet' ) ) {
			$id = (string) $res['headers']->offsetGet( 'x-restli-id' );
		}
		return 'published' . ( $id ? ': ' . $id : '' );
	}
}
