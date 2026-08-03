<?php
/**
 * The client record.
 *
 * Registered with public => false, which is stronger than a noindex meta tag:
 * WordPress never generates a front-end URL for these posts at all, so there is
 * nothing for Google to crawl even if someone guessed a slug. They exist only
 * inside /wp-admin/, behind the login, and every capability is mapped to
 * manage_options so only administrators can list, read or edit them.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Post_Type {

	const POST_TYPE = 'toctoc_client';

	public static function init() {
		add_action( 'init', array( __CLASS__, 'register' ) );
		add_filter( 'manage_' . self::POST_TYPE . '_posts_columns', array( __CLASS__, 'columns' ) );
		add_action( 'manage_' . self::POST_TYPE . '_posts_custom_column', array( __CLASS__, 'column_content' ), 10, 2 );
	}

	public static function register() {
		register_post_type( self::POST_TYPE, array(
			'labels' => array(
				'name'               => 'Clients',
				'singular_name'      => 'Client',
				'add_new_item'       => 'Add Client',
				'edit_item'          => 'Edit Client',
				'search_items'       => 'Search clients',
				'not_found'          => 'No clients yet.',
				'not_found_in_trash' => 'No clients in the trash.',
			),
			// The whole point: no front end, no feed, no archive, no REST.
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'rewrite'             => false,
			'query_var'           => false,
			'show_in_rest'        => false,
			'show_ui'             => true,
			'show_in_menu'        => false, // hangs off the Client Hub menu instead
			'menu_icon'           => 'dashicons-groups',
			'supports'            => array( 'title' ),
			'capability_type'     => 'toctoc_client',
			'map_meta_cap'        => true,
			'capabilities'        => array(
				'edit_post'          => TCH_CAPABILITY,
				'read_post'          => TCH_CAPABILITY,
				'delete_post'        => TCH_CAPABILITY,
				'edit_posts'         => TCH_CAPABILITY,
				'edit_others_posts'  => TCH_CAPABILITY,
				'publish_posts'      => TCH_CAPABILITY,
				'read_private_posts' => TCH_CAPABILITY,
				'delete_posts'       => TCH_CAPABILITY,
				'create_posts'       => TCH_CAPABILITY,
			),
		) );
	}

	/** All clients, alphabetical. */
	public static function all() {
		return get_posts( array(
			'post_type'      => self::POST_TYPE,
			'post_status'    => array( 'publish', 'draft' ),
			'numberposts'    => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'suppress_filters' => false,
		) );
	}

	public static function columns( $columns ) {
		$new = array(
			'cb'    => $columns['cb'] ?? '',
			'title' => 'Client',
		);
		foreach ( TCH_Platforms::all() as $slug => $p ) {
			$new[ 'tch_' . $slug ] = $p['icon'] . ' ' . $p['label'];
		}
		$new['date'] = 'Updated';
		return $new;
	}

	public static function column_content( $column, $post_id ) {
		if ( 0 !== strpos( $column, 'tch_' ) ) {
			return;
		}
		$slug = substr( $column, 4 );
		echo self::status_dot( $post_id, $slug ); // phpcs:ignore WordPress.Security.EscapeOutput
	}

	/**
	 * Whether a platform is wired up for a client, based on its key field.
	 * Returns 'ready', 'partial' (some fields filled, key one missing) or 'empty'.
	 */
	public static function status( $post_id, $platform_slug ) {
		$platform = TCH_Platforms::get( $platform_slug );
		if ( ! $platform ) {
			return 'empty';
		}
		$filled = 0;
		foreach ( array_keys( $platform['fields'] ) as $field ) {
			if ( '' !== trim( (string) get_post_meta( $post_id, TCH_Platforms::meta_key( $platform_slug, $field ), true ) ) ) {
				$filled++;
			}
		}
		$key = get_post_meta( $post_id, TCH_Platforms::meta_key( $platform_slug, $platform['key_field'] ), true );
		if ( '' !== trim( (string) $key ) ) {
			return 'ready';
		}
		return $filled > 0 ? 'partial' : 'empty';
	}

	public static function status_dot( $post_id, $platform_slug ) {
		$state  = self::status( $post_id, $platform_slug );
		$labels = array( 'ready' => 'Ready', 'partial' => 'Incomplete', 'empty' => 'Missing' );
		return sprintf(
			'<span class="tch-dot tch-dot--%1$s" title="%2$s" aria-label="%2$s"></span>',
			esc_attr( $state ),
			esc_attr( $labels[ $state ] )
		);
	}
}
