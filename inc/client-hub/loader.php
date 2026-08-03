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

define( 'TCH_VERSION', '0.1.0' );
define( 'TCH_PATH', get_template_directory() . '/inc/client-hub/' );
define( 'TCH_URL', get_template_directory_uri() . '/inc/client-hub/' );

/** Only administrators may ever see or touch client records. */
define( 'TCH_CAPABILITY', 'manage_options' );

require_once TCH_PATH . 'class-tch-platforms.php';
require_once TCH_PATH . 'class-tch-credentials.php';
require_once TCH_PATH . 'class-tch-post-type.php';
require_once TCH_PATH . 'class-tch-fields.php';
require_once TCH_PATH . 'class-tch-dashboard.php';

TCH_Post_Type::init();
TCH_Fields::init();
TCH_Dashboard::init();

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
