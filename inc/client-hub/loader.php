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
	'google'      => 'TCH_Google',
	'linkedin'    => 'TCH_LinkedIn',
	'content'     => 'TCH_Content',
	'publisher'   => 'TCH_Publisher',
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

if ( $tch_ready && ! defined( 'TCH_BOOTED' )
	&& class_exists( 'TCH_Post_Type' ) && class_exists( 'TCH_Fields' ) && class_exists( 'TCH_Dashboard' ) ) {
	// TCH_BOOTED stops the hooks being registered twice if the plugin build of
	// this hub is also active — that would give you two Client Hub menus.
	define( 'TCH_BOOTED', true );
	TCH_Post_Type::init();
	TCH_Fields::init();
	TCH_Dashboard::init();
	TCH_Google::init();
	TCH_LinkedIn::init();
	TCH_Content::init();
	TCH_Publisher::init();
} elseif ( $tch_ready ) {
	// Loaded by something else already; nothing to do.
	$tch_ready = true;
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

/**
 * One-time seed: the TocToc Marketing client record, created with every ID we
 * already hold (LinkedIn URN from the site schema, YouTube channel ID resolved
 * from the @wearetoctoc canonical URL). Idempotent twice over: an option flag
 * plus a lookup of the existing record, so it can never duplicate — and it only
 * ever INSERTS, so anything you later edit by hand is never overwritten.
 */
add_action( 'admin_init', function () {
	if ( ! defined( 'TCH_BOOTED' ) || get_option( 'tch_seeded_toctoc_v1' ) ) {
		return;
	}
	if ( ! current_user_can( TCH_CAPABILITY ) ) {
		return; // seed under an admin request, same gate as the hub itself
	}
	$existing = get_posts( array(
		'post_type'   => TCH_Post_Type::POST_TYPE,
		'title'       => 'TocToc Marketing',
		'post_status' => 'any',
		'numberposts' => 1,
		'fields'      => 'ids',
	) );
	if ( $existing ) {
		update_option( 'tch_seeded_toctoc_v1', 1, false );
		return;
	}
	$id = wp_insert_post( array(
		'post_type'   => TCH_Post_Type::POST_TYPE,
		'post_status' => 'publish',
		'post_title'  => 'TocToc Marketing',
	) );
	if ( ! $id || is_wp_error( $id ) ) {
		return; // leave the flag unset so the next admin load retries
	}
	$meta = array(
		// General.
		'_tch_client_website'          => 'https://toctoc.ky',
		'_tch_client_contact'          => 'Daniel Garrido',
		'_tch_client_email'            => 'info@toctoc.ky',
		'_tch_client_status'           => 'active',
		'_tch_client_notes'            => 'Our own agency site. Custom theme (TOCTOC Sky Editorial), all SEO in-theme, auto-deploy from GitHub.',
		// Google Business Profile — account/location IDs arrive with the API in
		// phase 2; category and rating context are known today.
		'_tch_gbp_primary_category'    => 'Marketing agency',
		// YouTube — channel ID taken from the canonical URL of @wearetoctoc.
		'_tch_youtube_channel_id'      => 'UCjTE48JKYdNehgwBb8ybNug',
		'_tch_youtube_url'             => 'https://www.youtube.com/@wearetoctoc',
		'_tch_youtube_handle'          => '@wearetoctoc',
		// LinkedIn — same organization ID the site schema publishes in sameAs.
		'_tch_linkedin_organization_urn' => 'urn:li:organization:110122083',
		'_tch_linkedin_url'            => 'https://www.linkedin.com/company/110122083/',
	);
	foreach ( $meta as $key => $value ) {
		update_post_meta( $id, $key, $value );
	}
	update_option( 'tch_seeded_toctoc_v1', 1, false );
} );

/**
 * Seed v2: every site TocToc has built or manages, with the profile links
 * discovered by crawling each client's own homepage on 2026-08-04 (YouTube
 * channel IDs resolved through each channel's canonical URL). Same contract as
 * seed v1: insert-only — an existing record with the same title is never
 * touched, so hand edits always win. Engagement is set only for the six
 * clients confirmed active; everyone else stays unclassified on purpose.
 */
add_action( 'admin_init', function () {
	if ( ! defined( 'TCH_BOOTED' ) || get_option( 'tch_seeded_clients_v2' ) ) {
		return;
	}
	if ( ! current_user_can( TCH_CAPABILITY ) ) {
		return;
	}
	// title => [ website, engagement, youtube[ id, handle ], linkedin_url, instagram ]
	$seed = array(
		'Uncle Liu'                  => array( 'https://uncleliu.ky', 'active', null, null, 'uncleliu.ky' ),
		'Coconut Room'               => array( 'https://coconutroom.ky', 'active', null, null, 'coconutroom.ky' ),
		'Prime Kitchen'              => array( 'https://primekitchen.ky', 'active', null, 'https://www.linkedin.com/company/prime-group-cayman/', 'primekitchen.ky' ),
		'San Si Wu'                  => array( 'https://sansiwu.ky', 'active', null, null, 'sansiwu.ky' ),
		'19-81 Brewing Co.'          => array( 'https://1981brewingco.com', 'active', null, null, '1981brewingco' ),
		'TintXKing'                  => array( 'https://tintxking.com', 'active', array( 'UCtM9Wm9_LgPlstILVeeyOIg', '' ), 'https://www.linkedin.com/company/tintxking/', 'tintxking' ),
		'Carnivore Smash Burger'     => array( 'https://carnivore.ky', '', null, null, 'smash.ky' ),
		'Prime Group'                => array( 'https://primegroup.ky', '', null, 'https://www.linkedin.com/company/prime-group-ky/', 'primekitchen.ky' ),
		'Yallah'                     => array( 'https://yallah.ky', '', null, null, 'yallah.ky' ),
		'Easy Lot'                   => array( 'https://easylot.ky', '', array( 'UCfejmvl93pIcH8fcccIkhng', '@EasyLotKy' ), null, 'easylotky' ),
		'Prospect Storage'           => array( 'https://prospectstorage.ky', '', array( 'UC0ZyygUZZKnZ4kARwM6ag-g', '@ProspectStorage' ), null, 'prospectstorage.ky' ),
		'Prospect Center'            => array( 'https://prospectcenter.ky', '', null, null, 'prospectcenter.ky' ),
		'Gate Garage Door Solutions' => array( 'https://gategaragedoorsolutions.com', '', null, null, '' ),
		'We Wax The Competition'     => array( 'https://wewaxthecompetition.com', '', null, null, 'wewax' ),
		'Cabifinde'                  => array( 'https://cabifinde.com', '', null, null, 'cabifinde' ),
		'PR Optics'                  => array( 'https://pr-optics.com', '', null, null, '' ),
		'SolaraPRO'                  => array( 'https://solara-pro.com', '', null, null, '' ),
		"D's Pizza"                  => array( 'https://dspizza.ky', '', null, null, '' ),
		'Luxe Detailing'             => array( 'https://luxedetailing.ky', '', null, null, 'luxedetailing.ky' ),
		'Miss Cayman Islands'        => array( 'https://misscaymanislands.ky', '', null, null, 'officialmisscaymanislands' ),
		'Adventura Cayman'           => array( 'https://adventuracayman.com', '', null, null, 'adventuracayman' ),
		'The Conscious Closet'       => array( 'https://theconsciouscloset.ky', '', null, null, 'the_conscious_closet_ky' ),
		'Infinite Mindcare'          => array( 'https://infinitemindcare.com', '', null, 'https://www.linkedin.com/company/infinitemindcare/', '' ),
		'Daniel Garrido'             => array( 'https://danielgarrido.com', '', null, null, '' ),
		'VitaGo'                     => array( 'https://vitagopr.com', '', null, null, 'vitagopr' ),
	);

	$existing = array();
	foreach ( TCH_Post_Type::all() as $c ) {
		$existing[ get_the_title( $c ) ] = true;
	}

	foreach ( $seed as $title => $row ) {
		if ( isset( $existing[ $title ] ) ) {
			continue;
		}
		$id = wp_insert_post( array(
			'post_type'   => TCH_Post_Type::POST_TYPE,
			'post_status' => 'publish',
			'post_title'  => $title,
		) );
		if ( ! $id || is_wp_error( $id ) ) {
			continue;
		}
		update_post_meta( $id, '_tch_client_website', $row[0] );
		if ( '' !== $row[1] ) {
			update_post_meta( $id, '_tch_client_status', $row[1] );
		}
		if ( is_array( $row[2] ) ) {
			update_post_meta( $id, '_tch_youtube_channel_id', $row[2][0] );
			update_post_meta( $id, '_tch_youtube_url', 'https://www.youtube.com/channel/' . $row[2][0] );
			if ( '' !== $row[2][1] ) {
				update_post_meta( $id, '_tch_youtube_handle', $row[2][1] );
			}
		}
		if ( ! empty( $row[3] ) ) {
			update_post_meta( $id, '_tch_linkedin_url', $row[3] );
		}
		if ( '' !== $row[4] ) {
			update_post_meta( $id, '_tch_client_notes', 'IG: @' . $row[4] );
		}
	}
	update_option( 'tch_seeded_clients_v2', 1, false );
} );

/**
 * Migration v3 (2026-08-04, user decision): the board is the REAL client list,
 * not a portfolio. Deletes the 19 seed-v2 records that are not one of the six
 * confirmed active clients (+ TocToc itself), and loads the 19-81 Brewing
 * profiles the user supplied by hand. Only titles this code itself seeded are
 * ever deleted — a record the user created manually can never match the list.
 */
add_action( 'admin_init', function () {
	if ( ! defined( 'TCH_BOOTED' ) || get_option( 'tch_migration_v3' ) ) {
		return;
	}
	if ( ! current_user_can( TCH_CAPABILITY ) ) {
		return;
	}
	$remove = array(
		'Carnivore Smash Burger', 'Prime Group', 'Yallah', 'Easy Lot',
		'Prospect Storage', 'Prospect Center', 'Gate Garage Door Solutions',
		'We Wax The Competition', 'Cabifinde', 'PR Optics', 'SolaraPRO',
		"D's Pizza", 'Luxe Detailing', 'Miss Cayman Islands', 'Adventura Cayman',
		'The Conscious Closet', 'Infinite Mindcare', 'Daniel Garrido', 'VitaGo',
	);
	foreach ( TCH_Post_Type::all() as $client ) {
		if ( in_array( get_the_title( $client ), $remove, true ) ) {
			wp_delete_post( $client->ID, true );
		}
	}
	// 19-81 Brewing Co. — channel and company page supplied by the user.
	$brew = get_posts( array(
		'post_type'   => TCH_Post_Type::POST_TYPE,
		'title'       => '19-81 Brewing Co.',
		'post_status' => 'any',
		'numberposts' => 1,
		'fields'      => 'ids',
	) );
	if ( $brew ) {
		update_post_meta( $brew[0], '_tch_youtube_channel_id', 'UCy4wKhUcIFuioKsg5H0H86A' );
		update_post_meta( $brew[0], '_tch_youtube_url', 'https://www.youtube.com/channel/UCy4wKhUcIFuioKsg5H0H86A' );
		update_post_meta( $brew[0], '_tch_linkedin_url', 'https://www.linkedin.com/company/19-81-brewing-co/' );
	}
	update_option( 'tch_migration_v3', 1, false );
} );

/**
 * Migration v4: LinkedIn company pages supplied by the user (2026-08-05).
 *
 * Only the page URL — the urn:li:organization value arrives on its own once the
 * Community Management API is approved and Discover pages runs, which matches
 * on exactly the vanity name stored here. Never overwrites an existing value.
 */
add_action( 'admin_init', function () {
	if ( ! defined( 'TCH_BOOTED' ) || get_option( 'tch_migration_v4' ) ) {
		return;
	}
	if ( ! current_user_can( TCH_CAPABILITY ) ) {
		return;
	}
	$pages = array(
		'Coconut Room' => 'https://www.linkedin.com/company/room-coconut/',
		'Uncle Liu'    => 'https://www.linkedin.com/company/uncle-liu-s-chinese-kitchen/',
	);
	foreach ( $pages as $title => $url ) {
		$found = get_posts( array(
			'post_type'   => TCH_Post_Type::POST_TYPE,
			'title'       => $title,
			'post_status' => 'any',
			'numberposts' => 1,
			'fields'      => 'ids',
		) );
		if ( ! $found ) {
			continue;
		}
		$key = TCH_Platforms::meta_key( 'linkedin', 'url' );
		if ( '' === trim( (string) get_post_meta( $found[0], $key, true ) ) ) {
			update_post_meta( $found[0], $key, $url );
		}
	}
	update_option( 'tch_migration_v4', 1, false );
} );

/**
 * Daily automatic YouTube sync. Manual "Sync now" stays for on-demand runs;
 * this keeps the numbers fresh without anyone remembering to click. Themes get
 * no activation hook, so the schedule is ensured lazily from admin requests.
 */
add_action( 'admin_init', function () {
	if ( defined( 'TCH_BOOTED' ) && ! wp_next_scheduled( 'tch_daily_sync' ) ) {
		wp_schedule_event( time() + HOUR_IN_SECONDS, 'daily', 'tch_daily_sync' );
	}
} );
add_action( 'tch_daily_sync', function () {
	if ( ! class_exists( 'TCH_Google' ) || ! TCH_Google::is_connected() ) {
		return;
	}
	$result = TCH_Google::sync_youtube();
	update_option( 'tch_last_cron_result', array(
		'time'   => time(),
		'result' => is_wp_error( $result ) ? 'error: ' . $result->get_error_message() : $result . ' channel(s)',
	), false );
} );

/** Admin stylesheet, loaded only on the hub's own screens. */
add_action( 'admin_enqueue_scripts', function ( $hook ) {
	$screen = get_current_screen();
	$types  = array( TCH_Post_Type::POST_TYPE, TCH_Content::POST_TYPE );
	$ours   = ( $screen && in_array( $screen->post_type, $types, true ) )
		|| ( false !== strpos( (string) $hook, 'toctoc-client-hub' ) );
	if ( ! $ours ) {
		return;
	}
	wp_enqueue_style( 'tch-admin', TCH_URL . 'admin.css', array(), TCH_VERSION );

	// The composer's media picker needs wp.media, which is not loaded on
	// custom post type screens unless asked for.
	if ( $screen && TCH_Content::POST_TYPE === $screen->post_type ) {
		wp_enqueue_media();
	}
} );
