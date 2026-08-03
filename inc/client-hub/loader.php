<?php
/**
 * TocToc Client Hub — loader.
 *
 * Central console for the client profiles TocToc manages: Google Business
 * Profile, YouTube, LinkedIn, Apple Business Connect and Bing Places. Lives
 * entirely inside /wp-admin/ and is visible to administrators only.
 *
 * Phase 0: private client records, profile inventory, status board and the
 * encrypted store later phases will keep OAuth tokens in. No external API calls
 * yet.
 *
 * WHY THIS SITS IN THE THEME
 * The textbook answer is a plugin — themes for presentation, plugins for
 * function. It ships here instead because this theme auto-commits and
 * auto-pushes to origin/main within seconds of every edit, so a change is live
 * immediately, whereas a plugin would mean zipping and uploading by hand on each
 * iteration. That shipping speed matters more than the convention here.
 *
 * The trade-off, stated plainly: switch away from this theme and the client
 * records stop being registered, so they vanish from wp-admin. They are NOT
 * deleted — posts and post meta stay in the database and reappear the moment the
 * theme (or an equivalent plugin) registers the post type again.
 *
 * Everything is kept in this one directory with no dependency on the theme's
 * functions, so promoting it to a real plugin later is: move the folder, swap
 * this file for a plugin header. Nothing else changes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// defined() guards: if this hub is ever ALSO installed as a plugin, plugins load
// before the theme and would define these first. Redefining raises warnings and
// re-requiring the classes under a different path is a fatal "cannot redeclare".
if ( ! defined( 'TCH_VERSION' ) ) {
	define( 'TCH_VERSION', '0.1.0' );
}
if ( ! defined( 'TCH_PATH' ) ) {
	define( 'TCH_PATH', get_template_directory() . '/inc/client-hub/' );
}
if ( ! defined( 'TCH_URL' ) ) {
	define( 'TCH_URL', get_template_directory_uri() . '/inc/client-hub/' );
}
/** Only administrators may ever see or touch client records. */
if ( ! defined( 'TCH_CAPABILITY' ) ) {
	define( 'TCH_CAPABILITY', 'manage_options' );
}

/**
 * Load every class, but never fatal on a missing or half-deployed file.
 *
 * This whole feature is optional; the SEO in this theme is not. A partial deploy
 * must degrade to "the hub is not there today", never to "the theme is broken",
 * because WordPress answers a broken theme by switching to the default one.
 */
$tch_ready = true;
$tch_map   = array(
	'platforms'   => 'TCH_Platforms',
	'credentials' => 'TCH_Credentials',
	'post-type'   => 'TCH_Post_Type',
	'fields'      => 'TCH_Fields',
	'dashboard'   => 'TCH_Dashboard',
);
foreach ( $tch_map as $tch_slug => $tch_classname ) {
	// Already loaded from somewhere else (e.g. the standalone plugin version of
	// this hub). require_once only de-duplicates by path, so requiring the same
	// class from a second location is a fatal "cannot redeclare".
	if ( class_exists( $tch_classname ) ) {
		continue;
	}
	$tch_file = TCH_PATH . 'class-tch-' . $tch_slug . '.php';
	if ( ! is_readable( $tch_file ) ) {
		$tch_ready = false;
		continue;
	}
	require_once $tch_file;
}
unset( $tch_map, $tch_slug, $tch_classname, $tch_file );

if ( $tch_ready && class_exists( 'TCH_Post_Type' ) && class_exists( 'TCH_Fields' ) && class_exists( 'TCH_Dashboard' ) ) {
	TCH_Post_Type::init();
	TCH_Fields::init();
	TCH_Dashboard::init();
} elseif ( is_admin() ) {
	add_action( 'admin_notices', function () {
		echo '<div class="notice notice-warning"><p><strong>Client Hub:</strong> some files under <code>inc/client-hub/</code> are missing on the server, so the hub is disabled. The rest of the theme is unaffected.</p></div>';
	} );
}
unset( $tch_ready );

/**
 * Themes get no activation hook, so flush rewrite rules once when the theme is
 * switched on. The post type has rewrite => false and no public URL, so this is
 * belt-and-braces rather than strictly required.
 */
add_action( 'after_switch_theme', function () {
	TCH_Post_Type::register();
	flush_rewrite_rules();
} );

/** Admin stylesheet, loaded only on the hub's own screens. */
add_action( 'admin_enqueue_scripts', function ( $hook ) {
	$screen = get_current_screen();
	$ours   = ( $screen && TCH_Post_Type::POST_TYPE === $screen->post_type )
		|| ( false !== strpos( (string) $hook, 'toctoc-client-hub' ) );
	if ( ! $ours ) {
		return;
	}
	wp_enqueue_style( 'tch-admin', TCH_URL . 'admin.css', array(), TCH_VERSION );
} );
