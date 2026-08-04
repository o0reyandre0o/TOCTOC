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

	public static function is_connected() {
		return null !== TCH_Credentials::get( 'google', 'refresh_token' );
	}

	/**
	 * Must byte-for-byte match an Authorised redirect URI on the OAuth client:
	 * https://toctoc.ky/wp-admin/admin.php?page=toctoc-client-hub&tch_oauth=google
	 */
	public static function redirect_uri() {
		return admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_oauth=google' );
	}

	public static function connect_url() {
		return self::AUTH_URL . '?' . http_build_query( array(
			'client_id'     => TCH_GOOGLE_CLIENT_ID,
			'redirect_uri'  => self::redirect_uri(),
			'response_type' => 'code',
			'scope'         => self::SCOPE_YT,
			'access_type'   => 'offline',
			// Without prompt=consent Google only issues a refresh token on the
			// very first authorisation; every reconnect after that would come
			// back without one and silently break the weekly re-auth cycle.
			'prompt'        => 'consent',
			'state'         => wp_create_nonce( 'tch_google_oauth' ),
		) );
	}

	public static function sync_url() {
		return wp_nonce_url(
			admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=sync_youtube' ),
			'tch_sync_youtube'
		);
	}

	public static function disconnect_url() {
		return wp_nonce_url(
			admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=google_disconnect' ),
			'tch_google_disconnect'
		);
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
		if ( ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['state'] ) ), 'tch_google_oauth' ) ) {
			self::flash( 'OAuth state check failed — please try connecting again.' );
			wp_safe_redirect( $back );
			exit;
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

		TCH_Credentials::set( 'google', 'refresh_token', $data['refresh_token'] );
		if ( ! empty( $data['access_token'] ) ) {
			set_transient( 'tch_google_access', $data['access_token'], max( 60, (int) ( $data['expires_in'] ?? 3600 ) - 60 ) );
		}
		self::flash( 'Google connected.', 'success' );
		wp_safe_redirect( $back );
		exit;
	}

	/** Valid access token, refreshing through the stored refresh token. */
	public static function access_token() {
		$cached = get_transient( 'tch_google_access' );
		if ( $cached ) {
			return $cached;
		}
		$refresh = TCH_Credentials::get( 'google', 'refresh_token' );
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
				TCH_Credentials::delete( 'google', 'refresh_token' );
			}
			return null;
		}
		set_transient( 'tch_google_access', $data['access_token'], max( 60, (int) ( $data['expires_in'] ?? 3600 ) - 60 ) );
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
			TCH_Credentials::delete( 'google', 'refresh_token' );
			delete_transient( 'tch_google_access' );
			self::flash( 'Google disconnected.', 'success' );
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
