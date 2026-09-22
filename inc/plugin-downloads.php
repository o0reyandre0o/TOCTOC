<?php
/**
 * Download counter for the plugins we publish.
 *
 * The ZIP lives in wp-content/uploads, so a direct link never touches PHP and
 * can never be counted. The button therefore points at /?toctoc-download=<slug>,
 * which records the hit and redirects to the file. A 302 is invisible to the
 * person downloading and to anything that follows links.
 *
 * What gets counted is deliberately narrow: no bots, and one hit per visitor
 * every six hours. A number that counts a crawler twice a day is worse than no
 * number, because it looks like demand.
 *
 * Read it in wp-admin: Dashboard, "Plugin downloads".
 *
 * @package TocToc
 */

defined( 'ABSPATH' ) || exit;

const TOCTOC_DL_OPTION = 'toctoc_plugin_downloads';

/**
 * The URL to put on a download button.
 *
 * @param string $slug Plugin slug.
 * @return string
 */
function toctoc_plugin_download_url( $slug ) {
	return add_query_arg( 'toctoc-download', rawurlencode( $slug ), home_url( '/' ) );
}

/**
 * Find a plugin by slug.
 *
 * @param string $slug Plugin slug.
 * @return array<string,mixed>|null
 */
function toctoc_plugin_by_slug( $slug ) {
	if ( ! function_exists( 'toctoc_plugins' ) ) {
		return null;
	}
	foreach ( toctoc_plugins() as $p ) {
		if ( $slug === $p['slug'] ) {
			return $p;
		}
	}
	return null;
}

/**
 * Does this request look like a person clicking a button?
 *
 * Deliberately generous with what it rejects. A missed download costs nothing;
 * a counted crawler makes the whole number untrustworthy.
 *
 * @return bool
 */
function toctoc_dl_is_human() {
	$ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? strtolower( sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) ) : '';
	if ( '' === $ua ) {
		return false;
	}
	$bots = array( 'bot', 'crawl', 'spider', 'slurp', 'curl', 'wget', 'python', 'java/', 'go-http', 'headless', 'phantom', 'preview', 'fetcher', 'monitor', 'scan', 'facebookexternalhit', 'ahrefs', 'semrush', 'dataprovider' );
	foreach ( $bots as $b ) {
		if ( false !== strpos( $ua, $b ) ) {
			return false;
		}
	}
	// A HEAD is a link checker, not a download.
	$method = isset( $_SERVER['REQUEST_METHOD'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ) ) : 'GET';
	return 'GET' === $method;
}

/**
 * Serve and count a download.
 */
function toctoc_plugin_download_handler() {
	if ( empty( $_GET['toctoc-download'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- public download link, changes nothing for the visitor.
		return;
	}
	$slug   = sanitize_key( wp_unslash( $_GET['toctoc-download'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$plugin = toctoc_plugin_by_slug( $slug );

	if ( ! $plugin || empty( $plugin['zip'] ) ) {
		wp_safe_redirect( home_url( '/plugins/' ), 302 );
		exit;
	}

	if ( toctoc_dl_is_human() ) {
		$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
		$ua  = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';
		$key = 'toctoc_dl_' . md5( $slug . '|' . $ip . '|' . $ua );
		if ( ! get_transient( $key ) ) {
			set_transient( $key, 1, 6 * HOUR_IN_SECONDS );
			toctoc_plugin_download_record( $slug, $plugin['version'] );
		}
	}

	header( 'X-Robots-Tag: noindex, nofollow', true );
	nocache_headers();
	wp_redirect( $plugin['zip'], 302 ); // phpcs:ignore WordPress.Security.SafeRedirect -- our own uploads URL, read from our own data file.
	exit;
}
add_action( 'init', 'toctoc_plugin_download_handler', 1 );

/**
 * Write one download into the tally.
 *
 * Daily buckets, trimmed to 90 days. Enough to see a launch or a mention; not
 * enough to turn an option row into a log file.
 *
 * @param string $slug    Plugin slug.
 * @param string $version Version served.
 */
function toctoc_plugin_download_record( $slug, $version = '' ) {
	$all = get_option( TOCTOC_DL_OPTION, array() );
	if ( ! is_array( $all ) ) {
		$all = array();
	}
	$row = isset( $all[ $slug ] ) && is_array( $all[ $slug ] )
		? $all[ $slug ]
		: array(
			'total'   => 0,
			'days'    => array(),
			'last'    => 0,
			'version' => '',
		);

	$today                 = current_time( 'Y-m-d' );
	$row['total']          = (int) $row['total'] + 1;
	$row['days'][ $today ] = ( isset( $row['days'][ $today ] ) ? (int) $row['days'][ $today ] : 0 ) + 1;
	$row['last']           = current_time( 'timestamp' ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp
	$row['version']        = $version;

	if ( count( $row['days'] ) > 90 ) {
		ksort( $row['days'] );
		$row['days'] = array_slice( $row['days'], -90, null, true );
	}

	$all[ $slug ] = $row;
	update_option( TOCTOC_DL_OPTION, $all, false );
}

/**
 * Downloads in the last N days, today included.
 *
 * @param array<string,int> $days Day => count.
 * @param int               $n    Days back.
 * @return int
 */
function toctoc_plugin_downloads_since( $days, $n ) {
	$from = gmdate( 'Y-m-d', strtotime( '-' . ( (int) $n - 1 ) . ' days', current_time( 'timestamp' ) ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp
	$sum  = 0;
	foreach ( (array) $days as $d => $c ) {
		if ( $d >= $from ) {
			$sum += (int) $c;
		}
	}
	return $sum;
}

/**
 * Register the dashboard widget.
 */
function toctoc_plugin_downloads_widget() {
	if ( ! current_user_can( 'edit_pages' ) || ! function_exists( 'toctoc_plugins' ) ) {
		return;
	}
	wp_add_dashboard_widget( 'toctoc_plugin_downloads', 'Plugin downloads', 'toctoc_plugin_downloads_widget_render' );
}
add_action( 'wp_dashboard_setup', 'toctoc_plugin_downloads_widget' );

/**
 * Dashboard widget body.
 */
function toctoc_plugin_downloads_widget_render() {
	$all = get_option( TOCTOC_DL_OPTION, array() );
	$all = is_array( $all ) ? $all : array();
	$now = current_time( 'timestamp' ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp

	echo '<table class="widefat striped" style="border:0"><thead><tr>';
	echo '<th style="padding-left:0">Plugin</th><th style="text-align:right">7 days</th><th style="text-align:right">30 days</th><th style="text-align:right">Total</th><th style="text-align:right;padding-right:0">Last</th>';
	echo '</tr></thead><tbody>';

	foreach ( toctoc_plugins() as $p ) {
		$row  = isset( $all[ $p['slug'] ] ) && is_array( $all[ $p['slug'] ] ) ? $all[ $p['slug'] ] : array();
		$days = isset( $row['days'] ) ? (array) $row['days'] : array();
		$last = ! empty( $row['last'] ) ? human_time_diff( (int) $row['last'], $now ) . ' ago' : '&mdash;';

		echo '<tr>';
		echo '<td style="padding-left:0"><strong>' . esc_html( $p['name'] ) . '</strong><br><span style="color:#646970">v' . esc_html( $p['version'] ) . '</span></td>';
		echo '<td style="text-align:right;font-variant-numeric:tabular-nums">' . esc_html( (string) toctoc_plugin_downloads_since( $days, 7 ) ) . '</td>';
		echo '<td style="text-align:right;font-variant-numeric:tabular-nums">' . esc_html( (string) toctoc_plugin_downloads_since( $days, 30 ) ) . '</td>';
		echo '<td style="text-align:right;font-weight:600;font-variant-numeric:tabular-nums">' . esc_html( (string) ( isset( $row['total'] ) ? (int) $row['total'] : 0 ) ) . '</td>';
		echo '<td style="text-align:right;padding-right:0;color:#646970">' . wp_kses_post( $last ) . '</td>';
		echo '</tr>';

		/*
		 * Fourteen days as bars. The totals say how many; this says whether
		 * anything is actually happening, which is the question you open the
		 * dashboard to answer.
		 */
		$series = array();
		$max    = 1;
		for ( $i = 13; $i >= 0; $i-- ) {
			$d              = gmdate( 'Y-m-d', strtotime( '-' . $i . ' days', $now ) );
			$v              = isset( $days[ $d ] ) ? (int) $days[ $d ] : 0;
			$series[ $d ]   = $v;
			$max            = max( $max, $v );
		}
		$bars = '';
		foreach ( $series as $d => $v ) {
			$h     = $v ? max( 3, (int) round( 22 * $v / $max ) ) : 2;
			$bars .= '<span title="' . esc_attr( $d . ': ' . $v ) . '" style="display:inline-block;width:6px;margin-right:2px;height:' . (int) $h . 'px;background:' . ( $v ? '#2271b1' : '#dcdcde' ) . ';vertical-align:bottom"></span>';
		}
		echo '<tr><td colspan="5" style="padding:0 0 12px 0;border-bottom:1px solid #f0f0f1">' . wp_kses_post( $bars ) . ' <span style="color:#646970;font-size:11px">last 14 days</span></td></tr>';
	}

	echo '</tbody></table>';
	echo '<p style="margin:12px 0 0;color:#646970;font-size:12px">Bots and repeat hits within six hours are not counted, and neither is anyone who copies the file URL directly. The number is a floor, not a total.</p>';
}

/**
 * Read the tally over REST, for anyone who can already see it in wp-admin.
 *
 * Same numbers as the dashboard widget, for checking a deploy or pulling the
 * figure into a report without opening the panel. Permission-gated rather than
 * public: how many people downloaded a plugin is ours to share, not the
 * internet's to scrape.
 */
function toctoc_plugin_downloads_route() {
	register_rest_route(
		'toctoc/v1',
		'/plugin-downloads',
		array(
			'methods'             => 'GET',
			'callback'            => 'toctoc_plugin_downloads_rest',
			'permission_callback' => static function () {
				return current_user_can( 'edit_pages' );
			},
		)
	);
}
add_action( 'rest_api_init', 'toctoc_plugin_downloads_route' );

/**
 * REST payload.
 *
 * @return array<int, array<string, mixed>>
 */
function toctoc_plugin_downloads_rest() {
	$all = get_option( TOCTOC_DL_OPTION, array() );
	$all = is_array( $all ) ? $all : array();
	$out = array();

	foreach ( toctoc_plugins() as $p ) {
		$row  = isset( $all[ $p['slug'] ] ) && is_array( $all[ $p['slug'] ] ) ? $all[ $p['slug'] ] : array();
		$days = isset( $row['days'] ) ? (array) $row['days'] : array();
		$out[] = array(
			'slug'    => $p['slug'],
			'name'    => $p['name'],
			'version' => $p['version'],
			'total'   => isset( $row['total'] ) ? (int) $row['total'] : 0,
			'last7'   => toctoc_plugin_downloads_since( $days, 7 ),
			'last30'  => toctoc_plugin_downloads_since( $days, 30 ),
			'last'    => ! empty( $row['last'] ) ? gmdate( 'Y-m-d H:i', (int) $row['last'] ) : null,
			'days'    => $days,
		);
	}
	return $out;
}
