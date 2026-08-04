<?php
/**
 * Google connection (phase 1): OAuth 2.0 + YouTube Data API v3.
 *
 * Deliberately the first integration because it needs no Google approval — it
 * proves the whole pipeline (consent screen, token exchange, encrypted refresh
 * token, scheduled refresh, API fetch) on the lowest-risk API before the same
 * plumbing carries Business Profile access in phase 2.
 *
 * Secrets: client id/secret come from wp-config constants and never touch the
 * database; the refresh token is stored encrypted via TCH_Credentials; the
 * short-lived access token only ever lives in a transient.
 *
 * While the Cloud consent screen stays in "Testing", Google expires refresh
 * tokens after 7 days — reconnecting from the dashboard is expected until the
 * app is published and verified.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Google {

	const AUTH_URL  = 'https://accounts.google.com/o/oauth2/v2/auth';
	const TOKEN_URL = 'https://oauth2.googleapis.com/token';
	const SCOPE_YT  = 'https://www.googleapis.com/auth/youtube.readonly';
	// Requested at consent time already so ONE reconnect covers phase 2; API
	// calls against it stay dead until Google approves the access request
	// (support case 7-2699000041208 — approved shows as 300 QPM quota).
	const SCOPE_GBP = 'https://www.googleapis.com/auth/business.manage';
	// Upload needs its own scope beyond youtube.readonly. Requested up front so
	// one consent covers reading stats today and publishing video tomorrow.
	const SCOPE_YT_UPLOAD = 'https://www.googleapis.com/auth/youtube.upload';

	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'maybe_handle_oauth' ) );
		add_action( 'admin_init', array( __CLASS__, 'maybe_handle_sync' ) );
	}

	/** wp-config constants present and the encrypted store usable. */
	public static function is_configured() {
		return defined( 'TCH_GOOGLE_CLIENT_ID' ) && TCH_GOOGLE_CLIENT_ID
			&& defined( 'TCH_GOOGLE_CLIENT_SECRET' ) && TCH_GOOGLE_CLIENT_SECRET
			&& TCH_Credentials::is_available();
	}

	/**
	 * Connected state.
	 *
	 * $client_id 0 is the agency-wide connection, used for Business Profile
	 * (one Google account manages many listings) and as the fallback for
	 * anything without its own token. A non-zero id is that client's own
	 * connection, which YouTube requires: videos.insert has no channel
	 * parameter, so publishing to a given channel means holding a token that
	 * authenticates AS that channel.
	 */
	public static function is_connected( $client_id = 0 ) {
		return null !== TCH_Credentials::get( 'google', 'refresh_token', (int) $client_id );
	}

	/**
	 * Must byte-for-byte match an Authorised redirect URI on the OAuth client:
	 * https://toctoc.ky/wp-admin/admin.php?page=toctoc-client-hub&tch_oauth=google
	 */
	public static function redirect_uri() {
		return admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_oauth=google' );
	}

	public static function connect_url( $client_id = 0 ) {
		$client_id = (int) $client_id;
		return self::AUTH_URL . '?' . http_build_query( array(
			'client_id'     => TCH_GOOGLE_CLIENT_ID,
			'redirect_uri'  => self::redirect_uri(),
			'response_type' => 'code',
			'scope'         => self::SCOPE_YT . ' ' . self::SCOPE_YT_UPLOAD . ' ' . self::SCOPE_GBP,
			'access_type'   => 'offline',
			// Without prompt=consent Google only issues a refresh token on the
			// very first authorisation; every reconnect after that would come
			// back without one and silently break the weekly re-auth cycle.
			// It also forces the account/channel chooser, which is exactly what
			// per-client connections depend on.
			'prompt'        => 'consent select_account',
			// The nonce is bound to the client id, so the callback cannot be
			// replayed to file a token against a different client.
			'state'         => wp_create_nonce( 'tch_google_oauth_' . $client_id ) . ':' . $client_id,
		) );
	}

	public static function sync_url() {
		return wp_nonce_url(
			admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=sync_youtube' ),
			'tch_sync_youtube'
		);
	}

	public static function disconnect_url( $client_id = 0 ) {
		$url = admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=google_disconnect' );
		if ( $client_id ) {
			$url = add_query_arg( 'client', (int) $client_id, $url );
		}
		return wp_nonce_url( $url, 'tch_google_disconnect' );
	}

	/** OAuth callback: ?page=toctoc-client-hub&tch_oauth=google&code=… */
	public static function maybe_handle_oauth() {
		if ( ! isset( $_GET['page'], $_GET['tch_oauth'] )
			|| TCH_Dashboard::SLUG !== $_GET['page'] || 'google' !== $_GET['tch_oauth'] ) {
			return;
		}
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			return;
		}
		$back = admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG );

		if ( isset( $_GET['error'] ) ) {
			self::flash( 'Google returned: ' . sanitize_text_field( wp_unslash( $_GET['error'] ) ) );
			wp_safe_redirect( $back );
			exit;
		}
		if ( ! isset( $_GET['code'], $_GET['state'] ) ) {
			return;
		}
		$state = sanitize_text_field( wp_unslash( $_GET['state'] ) );
		list( $nonce, $for_client ) = array_pad( explode( ':', $state, 2 ), 2, '0' );
		$for_client = (int) $for_client;
		if ( ! wp_verify_nonce( $nonce, 'tch_google_oauth_' . $for_client ) ) {
			self::flash( 'OAuth state check failed — please try connecting again.' );
			wp_safe_redirect( $back );
			exit;
		}
		if ( $for_client ) {
			$back = get_edit_post_link( $for_client, 'raw' ) ?: $back;
		}

		$resp = wp_remote_post( self::TOKEN_URL, array(
			'timeout' => 20,
			'body'    => array(
				'code'          => sanitize_text_field( wp_unslash( $_GET['code'] ) ),
				'client_id'     => TCH_GOOGLE_CLIENT_ID,
				'client_secret' => TCH_GOOGLE_CLIENT_SECRET,
				'redirect_uri'  => self::redirect_uri(),
				'grant_type'    => 'authorization_code',
			),
		) );
		$data = self::json( $resp );

		if ( empty( $data['refresh_token'] ) ) {
			$detail = isset( $data['error'] ) ? $data['error'] . ' — ' . ( $data['error_description'] ?? '' ) : 'no refresh token in response';
			self::flash( 'Token exchange failed: ' . $detail );
			wp_safe_redirect( $back );
			exit;
		}

		TCH_Credentials::set( 'google', 'refresh_token', $data['refresh_token'], $for_client );
		if ( ! empty( $data['access_token'] ) ) {
			set_transient( self::token_key( $for_client ), $data['access_token'], max( 60, (int) ( $data['expires_in'] ?? 3600 ) - 60 ) );
		}

		// Record which channel this token actually publishes to, so the client
		// screen can show it and the publisher can compare without an extra call.
		if ( $for_client && ! empty( $data['access_token'] ) ) {
			$who = wp_remote_get( 'https://www.googleapis.com/youtube/v3/channels?part=id,snippet&mine=true', array(
				'timeout' => 20,
				'headers' => array( 'Authorization' => 'Bearer ' . $data['access_token'] ),
			) );
			$info = is_wp_error( $who ) ? array() : json_decode( (string) wp_remote_retrieve_body( $who ), true );
			$id   = (string) ( $info['items'][0]['id'] ?? '' );
			if ( '' !== $id ) {
				update_post_meta( $for_client, '_tch_yt_token_channel', $id );
				update_post_meta( $for_client, '_tch_yt_token_channel_title', sanitize_text_field( (string) ( $info['items'][0]['snippet']['title'] ?? '' ) ) );
				// First connection for a client with no channel on file: adopt it.
				if ( '' === trim( (string) get_post_meta( $for_client, TCH_Platforms::meta_key( 'youtube', 'channel_id' ), true ) ) ) {
					update_post_meta( $for_client, TCH_Platforms::meta_key( 'youtube', 'channel_id' ), $id );
				}
			}
		}

		self::flash( $for_client ? 'Connected for this client.' : 'Google connected.', 'success' );
		wp_safe_redirect( $back );
		exit;
	}

	private static function token_key( $client_id = 0 ) {
		$client_id = (int) $client_id;
		return 'tch_google_access' . ( $client_id ? '_' . $client_id : '' );
	}

	/**
	 * Valid access token, refreshing through the stored refresh token.
	 *
	 * With a client id, returns that client's own token and nothing else — it
	 * never falls back to the agency connection, because falling back is
	 * precisely how a video meant for one channel ends up on another.
	 */
	public static function access_token( $client_id = 0 ) {
		$client_id = (int) $client_id;
		$cached    = get_transient( self::token_key( $client_id ) );
		if ( $cached ) {
			return $cached;
		}
		$refresh = TCH_Credentials::get( 'google', 'refresh_token', $client_id );
		if ( null === $refresh ) {
			return null;
		}
		$resp = wp_remote_post( self::TOKEN_URL, array(
			'timeout' => 20,
			'body'    => array(
				'refresh_token' => $refresh,
				'client_id'     => TCH_GOOGLE_CLIENT_ID,
				'client_secret' => TCH_GOOGLE_CLIENT_SECRET,
				'grant_type'    => 'refresh_token',
			),
		) );
		$data = self::json( $resp );
		if ( empty( $data['access_token'] ) ) {
			// invalid_grant here almost always means the 7-day testing-mode
			// expiry hit; drop the dead token so the UI offers Connect again.
			if ( isset( $data['error'] ) && 'invalid_grant' === $data['error'] ) {
				TCH_Credentials::delete( 'google', 'refresh_token', $client_id );
			}
			return null;
		}
		set_transient( self::token_key( $client_id ), $data['access_token'], max( 60, (int) ( $data['expires_in'] ?? 3600 ) - 60 ) );
		return $data['access_token'];
	}

	/** ?tch_action=sync_youtube and ?tch_action=google_disconnect */
	public static function maybe_handle_sync() {
		if ( ! isset( $_GET['page'], $_GET['tch_action'] ) || TCH_Dashboard::SLUG !== $_GET['page'] ) {
			return;
		}
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			return;
		}
		$action = sanitize_key( wp_unslash( $_GET['tch_action'] ) );
		$back   = admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG );

		if ( 'google_disconnect' === $action ) {
			check_admin_referer( 'tch_google_disconnect' );
			$for = (int) ( $_GET['client'] ?? 0 );
			TCH_Credentials::delete( 'google', 'refresh_token', $for );
			delete_transient( self::token_key( $for ) );
			if ( $for ) {
				delete_post_meta( $for, '_tch_yt_token_channel' );
				delete_post_meta( $for, '_tch_yt_token_channel_title' );
				$back = get_edit_post_link( $for, 'raw' ) ?: $back;
			}
			self::flash( 'Disconnected.', 'success' );
			wp_safe_redirect( $back );
			exit;
		}

		if ( 'sync_youtube' === $action ) {
			check_admin_referer( 'tch_sync_youtube' );
			$result = self::sync_youtube();
			if ( is_wp_error( $result ) ) {
				self::flash( 'YouTube sync failed: ' . $result->get_error_message() );
			} else {
				self::flash( sprintf( 'YouTube synced — %d channel(s) updated.', $result ), 'success' );
			}
			wp_safe_redirect( $back );
			exit;
		}

		if ( 'discover_gbp' === $action ) {
			check_admin_referer( 'tch_discover_gbp' );
			$result = self::discover_gbp();
			if ( is_wp_error( $result ) ) {
				self::flash( 'GBP discovery failed: ' . $result->get_error_message() );
			} else {
				self::flash( sprintf( 'GBP discovery — %d location(s) matched to clients.', $result ), 'success' );
			}
			wp_safe_redirect( $back );
			exit;
		}
	}

	public static function gbp_url() {
		return wp_nonce_url(
			admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=discover_gbp' ),
			'tch_discover_gbp'
		);
	}

	/**
	 * Phase 2, step 1: walk every GBP account the connected Google user
	 * manages, list its locations, and match each location to a client record
	 * by website host. Fills the account/location IDs the meta boxes leave
	 * empty, plus the Maps URL and primary category when absent.
	 *
	 * Built ahead of approval on purpose: until case 7-2699000041208 is granted
	 * the first call returns Google's own "quota exceeded / API not approved"
	 * message, which the dashboard surfaces verbatim — pressing the button IS
	 * the approval test.
	 */
	public static function discover_gbp() {
		$token = self::access_token();
		if ( ! $token ) {
			return new WP_Error( 'tch_no_token', 'not connected — use Connect Google first' );
		}
		$args = array( 'timeout' => 25, 'headers' => array( 'Authorization' => 'Bearer ' . $token ) );

		$accounts = self::json( wp_remote_get( 'https://mybusinessaccountmanagement.googleapis.com/v1/accounts', $args ) );
		if ( isset( $accounts['error'] ) ) {
			return new WP_Error( 'tch_api', is_array( $accounts['error'] ) ? ( $accounts['error']['message'] ?? 'API error' ) : $accounts['error'] );
		}
		if ( empty( $accounts['accounts'] ) ) {
			return new WP_Error( 'tch_api', 'the connected Google user manages no GBP accounts' );
		}

		// client host => post id, so locations match by the site they declare.
		$by_host = array();
		foreach ( TCH_Post_Type::all() as $client ) {
			$site = (string) get_post_meta( $client->ID, '_tch_client_website', true );
			$host = strtolower( (string) wp_parse_url( $site, PHP_URL_HOST ) );
			if ( $host ) {
				$by_host[ preg_replace( '/^www\./', '', $host ) ] = $client->ID;
			}
		}

		$matched = 0;
		foreach ( $accounts['accounts'] as $account ) {
			$page = '';
			do {
				$url = add_query_arg( array(
					'readMask'  => 'name,title,websiteUri,categories.primaryCategory.displayName,metadata.mapsUri',
					'pageSize'  => 100,
					'pageToken' => $page,
				), 'https://mybusinessbusinessinformation.googleapis.com/v1/' . rawurlencode( $account['name'] ) . '/locations' );
				$locations = self::json( wp_remote_get( $url, $args ) );
				if ( isset( $locations['error'] ) ) {
					return new WP_Error( 'tch_api', is_array( $locations['error'] ) ? ( $locations['error']['message'] ?? 'API error' ) : $locations['error'] );
				}
				foreach ( (array) ( $locations['locations'] ?? array() ) as $loc ) {
					$host = strtolower( (string) wp_parse_url( (string) ( $loc['websiteUri'] ?? '' ), PHP_URL_HOST ) );
					$host = preg_replace( '/^www\./', '', $host );
					if ( ! $host || ! isset( $by_host[ $host ] ) ) {
						continue;
					}
					$post_id = $by_host[ $host ];
					update_post_meta( $post_id, TCH_Platforms::meta_key( 'gbp', 'account_id' ), sanitize_text_field( $account['name'] ) );
					update_post_meta( $post_id, TCH_Platforms::meta_key( 'gbp', 'location_id' ), sanitize_text_field( $loc['name'] ?? '' ) );
					if ( ! empty( $loc['metadata']['mapsUri'] ) && '' === (string) get_post_meta( $post_id, TCH_Platforms::meta_key( 'gbp', 'url' ), true ) ) {
						update_post_meta( $post_id, TCH_Platforms::meta_key( 'gbp', 'url' ), esc_url_raw( $loc['metadata']['mapsUri'] ) );
					}
					if ( ! empty( $loc['categories']['primaryCategory']['displayName'] ) && '' === (string) get_post_meta( $post_id, TCH_Platforms::meta_key( 'gbp', 'primary_category' ), true ) ) {
						update_post_meta( $post_id, TCH_Platforms::meta_key( 'gbp', 'primary_category' ), sanitize_text_field( $loc['categories']['primaryCategory']['displayName'] ) );
					}
					$matched++;
				}
				$page = (string) ( $locations['nextPageToken'] ?? '' );
			} while ( '' !== $page );
		}
		update_option( 'tch_gbp_last_discover', time(), false );
		return $matched;
	}

	/**
	 * Pull snippet+statistics for every client channel. One API call per 50
	 * channels (the API's batch maximum), so the whole roster costs one unit
	 * of quota rather than one per client.
	 */
	public static function sync_youtube() {
		$token = self::access_token();
		if ( ! $token ) {
			return new WP_Error( 'tch_no_token', 'not connected (or the testing-mode token expired) — use Connect Google first' );
		}

		$map = array(); // channel_id => array of client post ids (shared channels allowed)
		foreach ( TCH_Post_Type::all() as $client ) {
			$cid = trim( (string) get_post_meta( $client->ID, TCH_Platforms::meta_key( 'youtube', 'channel_id' ), true ) );
			if ( '' !== $cid ) {
				$map[ $cid ][] = $client->ID;
			}
		}
		if ( ! $map ) {
			return new WP_Error( 'tch_no_channels', 'no client has a YouTube channel ID yet' );
		}

		$updated = 0;
		foreach ( array_chunk( array_keys( $map ), 50 ) as $chunk ) {
			$resp = wp_remote_get( add_query_arg( array(
				'part'       => 'snippet,statistics',
				'id'         => implode( ',', $chunk ),
				'maxResults' => 50,
			), 'https://www.googleapis.com/youtube/v3/channels' ), array(
				'timeout' => 25,
				'headers' => array( 'Authorization' => 'Bearer ' . $token ),
			) );
			$data = self::json( $resp );
			if ( isset( $data['error'] ) ) {
				return new WP_Error( 'tch_api', $data['error']['message'] ?? 'YouTube API error' );
			}
			foreach ( (array) ( $data['items'] ?? array() ) as $ch ) {
				foreach ( (array) ( $map[ $ch['id'] ] ?? array() ) as $post_id ) {
					update_post_meta( $post_id, '_tch_youtube_stat_title', sanitize_text_field( $ch['snippet']['title'] ?? '' ) );
					update_post_meta( $post_id, '_tch_youtube_stat_subs', (int) ( $ch['statistics']['subscriberCount'] ?? 0 ) );
					update_post_meta( $post_id, '_tch_youtube_stat_videos', (int) ( $ch['statistics']['videoCount'] ?? 0 ) );
					update_post_meta( $post_id, '_tch_youtube_stat_views', (int) ( $ch['statistics']['viewCount'] ?? 0 ) );
					update_post_meta( $post_id, '_tch_youtube_synced_at', time() );
					$updated++;
				}
			}
		}
		update_option( 'tch_youtube_last_sync', time(), false );
		return $updated;
	}

	/** One-shot admin notice surviving the redirect. */
	private static function flash( $message, $type = 'error' ) {
		set_transient( 'tch_flash_' . get_current_user_id(), array( 'msg' => $message, 'type' => $type ), 60 );
	}

	public static function take_flash() {
		$key   = 'tch_flash_' . get_current_user_id();
		$flash = get_transient( $key );
		if ( $flash ) {
			delete_transient( $key );
		}
		return $flash ?: null;
	}

	private static function json( $resp ) {
		if ( is_wp_error( $resp ) ) {
			return array( 'error' => $resp->get_error_message() );
		}
		$decoded = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
		return is_array( $decoded ) ? $decoded : array();
	}
}
