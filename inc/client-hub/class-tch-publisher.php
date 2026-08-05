<?php
/**
 * Publisher: the cron engine and the per-channel adapters.
 *
 * Content records say what/where/when; everything about HOW to talk to a
 * platform lives here, one method per channel. Adding a platform later is a new
 * adapter plus one line in dispatch() — the composer, the queue and the
 * staleness alerts need no changes.
 *
 * Every attempt is recorded per target on the content record, so a partial
 * failure (three clients published, one API hiccup) is visible and retryable
 * instead of silent.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Publisher {

	const CRON_HOOK = 'tch_publish_due';

	/** Days without a post before a channel is flagged stale. */
	public static function staleness_thresholds() {
		return array( 'gbp' => 14, 'linkedin' => 10, 'youtube' => 30 );
	}

	public static function init() {
		add_action( self::CRON_HOOK, array( __CLASS__, 'run_due' ) );
		add_action( 'admin_init', array( __CLASS__, 'ensure_schedule' ) );
		add_filter( 'cron_schedules', array( __CLASS__, 'add_interval' ) );
		add_action( 'admin_init', array( __CLASS__, 'maybe_publish_now' ) );
	}

	public static function add_interval( $schedules ) {
		$schedules['tch_five_minutes'] = array( 'interval' => 300, 'display' => 'Every 5 minutes (TocToc)' );
		return $schedules;
	}

	public static function ensure_schedule() {
		if ( ! wp_next_scheduled( self::CRON_HOOK ) ) {
			wp_schedule_event( time() + 60, 'tch_five_minutes', self::CRON_HOOK );
		}
	}

	/**
	 * True when a channel can actually deliver right now. The composer uses this
	 * to label channels still waiting on API approval — they can be queued, they
	 * just will not fire yet.
	 */
	public static function channel_is_live( $channel ) {
		switch ( $channel ) {
			case 'youtube':
				// Live per client, not globally — see publish_youtube().
				return class_exists( 'TCH_Google' );
			case 'gbp':
				// Approved shows up as a working locations call; we treat the
				// discovery timestamp as the signal so we do not burn quota here.
				return class_exists( 'TCH_Google' ) && TCH_Google::is_connected() && (bool) get_option( 'tch_gbp_last_discover' );
			case 'linkedin':
				return class_exists( 'TCH_LinkedIn' ) && TCH_LinkedIn::is_connected();
		}
		return false;
	}

	/** Manual "publish now" from the queue screen, and the IndexNow backfill. */
	public static function maybe_publish_now() {
		if ( ! isset( $_GET['page'], $_GET['tch_action'] ) || TCH_Dashboard::SLUG !== $_GET['page'] ) {
			return;
		}
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			return;
		}
		$action = sanitize_key( wp_unslash( $_GET['tch_action'] ) );

		if ( 'indexnow_all' === $action ) {
			check_admin_referer( 'tch_indexnow_all' );
			$res = TCH_Bing::submit_all();
			TCH_Google::flash_public(
				is_wp_error( $res ) ? 'IndexNow: ' . $res->get_error_message() : 'IndexNow: all published pages submitted.',
				is_wp_error( $res ) ? 'error' : 'success'
			);
			wp_safe_redirect( admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG ) );
			exit;
		}

		if ( 'publish_now' !== $action ) {
			return;
		}
		check_admin_referer( 'tch_publish_now' );
		$id = (int) ( $_GET['content'] ?? 0 );
		if ( $id ) {
			self::publish( $id );
		}
		wp_safe_redirect( admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '-queue' ) );
		exit;
	}

	/** Cron entry point: everything scheduled and due. */
	public static function run_due() {
		$due = get_posts( array(
			'post_type'   => TCH_Content::POST_TYPE,
			'post_status' => 'any',
			'numberposts' => 20, // bounded so one run can never hang the site
			'meta_query'  => array(
				array( 'key' => '_tch_c_state', 'value' => 'scheduled' ),
				array( 'key' => '_tch_c_scheduled_at', 'value' => time(), 'compare' => '<=', 'type' => 'NUMERIC' ),
			),
			'fields'      => 'ids',
		) );
		foreach ( $due as $id ) {
			self::publish( $id );
		}
	}

	/**
	 * Deliver one content record to each of its targets.
	 *
	 * Targets already delivered are skipped, so re-running after a partial
	 * failure retries only what failed — never double-posts to a client.
	 */
	public static function publish( $content_id ) {
		$targets = (array) get_post_meta( $content_id, '_tch_c_targets', true );
		if ( ! $targets ) {
			return;
		}
		$results = (array) get_post_meta( $content_id, '_tch_c_results', true );
		$all_ok  = true;

		foreach ( $targets as $target ) {
			if ( ! empty( $results[ $target ]['ok'] ) ) {
				continue; // already delivered
			}
			list( $client_id, $channel ) = array_pad( explode( ':', (string) $target ), 2, '' );
			$outcome = self::dispatch( (int) $client_id, $channel, $content_id );

			$results[ $target ] = array(
				'ok'      => ! is_wp_error( $outcome ),
				'message' => is_wp_error( $outcome ) ? $outcome->get_error_message() : (string) $outcome,
				'time'    => time(),
			);
			if ( is_wp_error( $outcome ) ) {
				$all_ok = false;
			} else {
				// Feeds the staleness alerts on the dashboard.
				update_post_meta( (int) $client_id, '_tch_last_pub_' . $channel, time() );
			}
		}

		update_post_meta( $content_id, '_tch_c_results', $results );
		update_post_meta( $content_id, '_tch_c_state', $all_ok ? 'published' : 'failed' );
	}

	private static function dispatch( $client_id, $channel, $content_id ) {
		if ( ! self::channel_is_live( $channel ) ) {
			return new WP_Error( 'tch_channel_pending', sprintf( '%s is not connected/approved yet — left queued', $channel ) );
		}
		switch ( $channel ) {
			case 'gbp':
				return self::publish_gbp( $client_id, $content_id );
			case 'youtube':
				return self::publish_youtube( $client_id, $content_id );
			case 'linkedin':
				return self::publish_linkedin( $client_id, $content_id );
		}
		return new WP_Error( 'tch_no_adapter', 'no adapter for ' . $channel );
	}

	/**
	 * Google Business Profile local post.
	 *
	 * Uses the v4 endpoint, which is still the current way to create posts (the
	 * newer split APIs cover business information and reviews, not posts).
	 */
	private static function publish_gbp( $client_id, $content_id ) {
		$token = TCH_Google::access_token();
		if ( ! $token ) {
			return new WP_Error( 'tch_no_token', 'Google not connected' );
		}
		$account  = (string) get_post_meta( $client_id, TCH_Platforms::meta_key( 'gbp', 'account_id' ), true );
		$location = (string) get_post_meta( $client_id, TCH_Platforms::meta_key( 'gbp', 'location_id' ), true );
		if ( '' === $account || '' === $location ) {
			return new WP_Error( 'tch_no_location', 'client has no GBP account/location id' );
		}
		// Stored values already carry their "accounts/…" / "locations/…" prefix.
		$parent = trim( $account, '/' ) . '/' . ltrim( str_replace( $account . '/', '', $location ), '/' );

		$summary = wp_strip_all_tags( (string) get_post_field( 'post_content', $content_id ) );
		$summary = trim( preg_replace( '/\s+/', ' ', $summary ) );
		if ( '' === $summary ) {
			return new WP_Error( 'tch_empty', 'post body is empty' );
		}
		// Google rejects anything over 1500 characters outright.
		if ( mb_strlen( $summary ) > 1500 ) {
			$summary = mb_substr( $summary, 0, 1497 ) . '…';
		}

		$body = array(
			'languageCode' => 'en',
			'summary'      => $summary,
			'topicType'    => 'STANDARD',
		);

		$cta_type = (string) get_post_meta( $content_id, '_tch_c_cta_type', true );
		$cta_url  = (string) get_post_meta( $content_id, '_tch_c_cta_url', true );
		if ( '' !== $cta_type ) {
			$body['callToAction'] = array( 'actionType' => $cta_type );
			// CALL derives its number from the listing and must not carry a url.
			if ( 'CALL' !== $cta_type && '' !== $cta_url ) {
				$body['callToAction']['url'] = $cta_url;
			}
		}

		$media_id = (int) get_post_meta( $content_id, '_tch_c_media_id', true );
		if ( $media_id ) {
			$url = wp_get_attachment_url( $media_id );
			if ( $url ) {
				$body['media'] = array( array( 'mediaFormat' => 'PHOTO', 'sourceUrl' => $url ) );
			}
		}

		$resp = wp_remote_post( 'https://mybusiness.googleapis.com/v4/' . $parent . '/localPosts', array(
			'timeout' => 30,
			'headers' => array(
				'Authorization' => 'Bearer ' . $token,
				'Content-Type'  => 'application/json',
			),
			'body'    => wp_json_encode( $body ),
		) );
		if ( is_wp_error( $resp ) ) {
			return $resp;
		}
		$data = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
		if ( isset( $data['error'] ) ) {
			return new WP_Error( 'tch_api', (string) ( $data['error']['message'] ?? 'GBP API error' ) );
		}
		return 'published: ' . (string) ( $data['name'] ?? 'ok' );
	}

	/**
	 * YouTube upload via a resumable session.
	 *
	 * Resumable rather than a single POST because client videos run to hundreds
	 * of megabytes; this streams the file in 5 MB chunks so PHP never has to
	 * hold the whole thing in memory.
	 *
	 * Quota note: Google cut videos.insert from 1600 units to ~100 in Dec 2025,
	 * so the default 10,000/day allowance is roughly 100 uploads rather than 6.
	 */
	private static function publish_youtube( $client_id, $content_id ) {
		// This client's OWN token. No fallback to the agency connection: that
		// fallback is what put a TocToc video on a client's channel.
		$token = TCH_Google::access_token( $client_id );
		if ( ! $token ) {
			return new WP_Error(
				'tch_no_token',
				'this client has no YouTube connection — open the client and use Connect YouTube with the account that owns its channel'
			);
		}
		/*
		 * Confirm WHERE this token publishes before sending a byte.
		 *
		 * videos.insert has no channel parameter — it always uploads to the
		 * default channel of the authenticated account. So a single connection
		 * cannot serve several clients: whoever is connected receives every
		 * upload, silently. Putting a client's video on the wrong channel is
		 * worse than not publishing at all, so this compares the token's real
		 * channel against the one stored on the client and refuses on a
		 * mismatch. Costs 1 quota unit out of 10,000/day.
		 */
		$expected = trim( (string) get_post_meta( $client_id, TCH_Platforms::meta_key( 'youtube', 'channel_id' ), true ) );
		$who      = wp_remote_get( 'https://www.googleapis.com/youtube/v3/channels?part=id&mine=true', array(
			'timeout' => 20,
			'headers' => array( 'Authorization' => 'Bearer ' . $token ),
		) );
		$who_data = is_wp_error( $who ) ? array() : json_decode( (string) wp_remote_retrieve_body( $who ), true );
		$actual   = (string) ( $who_data['items'][0]['id'] ?? '' );
		if ( '' === $actual ) {
			$msg = (string) ( $who_data['error']['message'] ?? 'could not read the connected channel' );
			return new WP_Error( 'tch_no_channel', $msg . ' — reconnect Google (the youtube.upload scope may be missing)' );
		}
		if ( '' !== $expected && $actual !== $expected ) {
			return new WP_Error(
				'tch_wrong_channel',
				sprintf(
					'refused: the connected Google account publishes to channel %1$s, but this client is %2$s. Connect with the account that owns %2$s, or fix the client\'s Channel ID.',
					$actual,
					$expected
				)
			);
		}

		$path = self::resolve_media_path( $content_id );
		if ( is_wp_error( $path ) ) {
			return $path;
		}
		$media_id = (int) get_post_meta( $content_id, '_tch_c_media_id', true );
		$size = filesize( $path );
		if ( ! $size ) {
			return new WP_Error( 'tch_no_media', 'video file is empty' );
		}

		$tags = array_filter( array_map( 'trim', explode( ',', (string) get_post_meta( $content_id, '_tch_c_tags', true ) ) ) );
		$meta = array(
			'snippet' => array(
				'title'       => mb_substr( get_the_title( $content_id ), 0, 100 ),
				'description' => mb_substr( wp_strip_all_tags( (string) get_post_field( 'post_content', $content_id ) ), 0, 5000 ),
				'tags'        => array_values( $tags ),
			),
			'status'  => array( 'privacyStatus' => 'public', 'selfDeclaredMadeForKids' => false ),
		);

		// 1) open the resumable session
		$init = wp_remote_post( 'https://www.googleapis.com/upload/youtube/v3/videos?uploadType=resumable&part=snippet,status', array(
			'timeout' => 30,
			'headers' => array(
				'Authorization'           => 'Bearer ' . $token,
				'Content-Type'            => 'application/json; charset=UTF-8',
				'X-Upload-Content-Length' => (string) $size,
				'X-Upload-Content-Type'   => (string) ( ( $media_id ? get_post_mime_type( $media_id ) : '' ) ?: 'video/*' ),
			),
			'body'    => wp_json_encode( $meta ),
		) );
		if ( is_wp_error( $init ) ) {
			return $init;
		}
		$upload_url = wp_remote_retrieve_header( $init, 'location' );
		if ( ! $upload_url ) {
			$err = json_decode( (string) wp_remote_retrieve_body( $init ), true );
			return new WP_Error( 'tch_api', (string) ( $err['error']['message'] ?? 'could not open upload session' ) );
		}

		// 2) stream the bytes
		$chunk  = 5 * 1024 * 1024;
		$handle = fopen( $path, 'rb' );
		if ( ! $handle ) {
			return new WP_Error( 'tch_no_media', 'could not open the video file' );
		}
		$offset = 0;
		$final  = null;
		while ( $offset < $size ) {
			$data = fread( $handle, $chunk );
			if ( false === $data || '' === $data ) {
				fclose( $handle );
				return new WP_Error( 'tch_read', 'read error at byte ' . $offset );
			}
			$len  = strlen( $data );
			$resp = wp_remote_request( $upload_url, array(
				'method'  => 'PUT',
				'timeout' => 120,
				'headers' => array(
					'Content-Length' => (string) $len,
					'Content-Range'  => sprintf( 'bytes %d-%d/%d', $offset, $offset + $len - 1, $size ),
				),
				'body'    => $data,
			) );
			if ( is_wp_error( $resp ) ) {
				fclose( $handle );
				return $resp;
			}
			$code = (int) wp_remote_retrieve_response_code( $resp );
			// 308 = chunk accepted, keep going. 200/201 = upload complete.
			if ( 308 !== $code && 200 !== $code && 201 !== $code ) {
				fclose( $handle );
				$err = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
				return new WP_Error( 'tch_api', 'upload failed (HTTP ' . $code . '): ' . (string) ( $err['error']['message'] ?? '' ) );
			}
			if ( 200 === $code || 201 === $code ) {
				$final = json_decode( (string) wp_remote_retrieve_body( $resp ), true );
			}
			$offset += $len;
		}
		fclose( $handle );

		$video_id = (string) ( $final['id'] ?? '' );
		return $video_id ? 'uploaded: https://youtu.be/' . $video_id : 'uploaded';
	}

	/**
	 * LinkedIn company page post.
	 *
	 * One agency-wide connection covers every page the member administers, so
	 * unlike YouTube there is no per-client token — only the client's own
	 * organization URN, which Discover LinkedIn fills in automatically.
	 */
	private static function publish_linkedin( $client_id, $content_id ) {
		$urn = trim( (string) get_post_meta( $client_id, TCH_Platforms::meta_key( 'linkedin', 'organization_urn' ), true ) );
		if ( '' === $urn ) {
			return new WP_Error( 'tch_no_urn', 'client has no LinkedIn organization URN — run Discover LinkedIn' );
		}
		return TCH_LinkedIn::publish( $urn, get_post_field( 'post_content', $content_id ) );
	}

	/**
	 * Local path of the file to upload: the chosen attachment, or the pasted
	 * URL for files sitting in /uploads/ without a media-library record.
	 *
	 * The pasted URL is resolved against the uploads directory and then checked
	 * with realpath, so a crafted value ("…/uploads/../../wp-config.php") cannot
	 * walk out of that directory and hand a server file to YouTube.
	 */
	private static function resolve_media_path( $content_id ) {
		$media_id = (int) get_post_meta( $content_id, '_tch_c_media_id', true );
		if ( $media_id ) {
			$path = get_attached_file( $media_id );
			if ( $path && is_readable( $path ) ) {
				return $path;
			}
		}

		$url = (string) get_post_meta( $content_id, '_tch_c_media_url', true );
		if ( '' === $url ) {
			return new WP_Error( 'tch_no_media', 'no video selected — pick one in Image or video, or paste a file URL' );
		}
		$uploads = wp_upload_dir();
		if ( 0 !== strpos( $url, $uploads['baseurl'] ) ) {
			return new WP_Error( 'tch_bad_media', 'the file URL must be inside ' . $uploads['baseurl'] );
		}
		$candidate = $uploads['basedir'] . substr( $url, strlen( $uploads['baseurl'] ) );
		$real      = realpath( $candidate );
		$base      = realpath( $uploads['basedir'] );
		if ( ! $real || ! $base || 0 !== strpos( $real, $base ) || ! is_readable( $real ) ) {
			return new WP_Error( 'tch_bad_media', 'that file does not exist on this server' );
		}
		return $real;
	}

	/**
	 * Clients whose channels have gone quiet. Drives the dashboard warning and
	 * protects the 90-day guarantee: a client that silently stops getting posts
	 * is a client the guarantee will eventually cost money on.
	 */
	public static function stale_report() {
		$out = array();
		foreach ( TCH_Post_Type::all() as $client ) {
			if ( 'active' !== get_post_meta( $client->ID, '_tch_client_status', true ) ) {
				continue; // only clients on a monthly retainer
			}
			foreach ( self::staleness_thresholds() as $channel => $days ) {
				if ( 'ready' !== TCH_Post_Type::status( $client->ID, $channel ) ) {
					continue; // channel not set up — that is a different gap
				}
				$last = (int) get_post_meta( $client->ID, '_tch_last_pub_' . $channel, true );
				$age  = $last ? floor( ( time() - $last ) / DAY_IN_SECONDS ) : null;
				if ( null === $age || $age >= $days ) {
					$out[] = array(
						'client'  => get_the_title( $client ),
						'id'      => $client->ID,
						'channel' => $channel,
						'days'    => $age,
						'limit'   => $days,
					);
				}
			}
		}
		return $out;
	}
}
