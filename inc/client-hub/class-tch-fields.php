<?php
/**
 * Meta boxes for the client record — one box per platform, generated from
 * TCH_Platforms so adding a field never means touching this file.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Fields {

	const NONCE = 'tch_save_client';

	public static function init() {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add' ) );
		add_action( 'save_post_' . TCH_Post_Type::POST_TYPE, array( __CLASS__, 'save' ), 10, 2 );
	}

	public static function add() {
		add_meta_box(
			'tch-general',
			'Client details',
			array( __CLASS__, 'render_general' ),
			TCH_Post_Type::POST_TYPE,
			'normal',
			'high'
		);
		foreach ( TCH_Platforms::all() as $slug => $platform ) {
			add_meta_box(
				'tch-platform-' . $slug,
				$platform['icon'] . '  ' . $platform['label'],
				array( __CLASS__, 'render_platform' ),
				TCH_Post_Type::POST_TYPE,
				'normal',
				'default',
				array( 'slug' => $slug )
			);
		}
	}

	public static function general_fields() {
		return array(
			'website'  => array( 'label' => 'Website', 'type' => 'url' ),
			'contact'  => array( 'label' => 'Main contact', 'type' => 'text' ),
			'email'    => array( 'label' => 'Contact email', 'type' => 'text' ),
			'status'   => array(
				'label'   => 'Engagement',
				'type'    => 'select',
				'options' => array(
					'active'   => 'Active — monthly',
					'build'    => 'Build in progress',
					'paused'   => 'Paused',
					'former'   => 'Former client',
				),
			),
			'notes'    => array( 'label' => 'Notes', 'type' => 'textarea' ),
		);
	}

	public static function render_general( $post ) {
		wp_nonce_field( self::NONCE, self::NONCE . '_nonce' );
		echo '<table class="form-table tch-form"><tbody>';
		foreach ( self::general_fields() as $key => $field ) {
			self::render_field( '_tch_client_' . $key, $field, $post->ID );
		}
		echo '</tbody></table>';
	}

	public static function render_platform( $post, $box ) {
		$slug     = $box['args']['slug'];
		$platform = TCH_Platforms::get( $slug );
		if ( ! $platform ) {
			return;
		}

		if ( ! empty( $platform['note'] ) ) {
			printf(
				'<p class="tch-note tch-note--%s">%s</p>',
				esc_attr( 'manual' === $platform['api'] ? 'manual' : 'api' ),
				esc_html( $platform['note'] )
			);
		}

		echo '<table class="form-table tch-form"><tbody>';
		foreach ( $platform['fields'] as $field_key => $field ) {
			self::render_field( TCH_Platforms::meta_key( $slug, $field_key ), $field, $post->ID );
		}
		echo '</tbody></table>';
	}

	private static function render_field( $meta_key, $field, $post_id ) {
		$value = get_post_meta( $post_id, $meta_key, true );
		$id    = esc_attr( $meta_key );
		echo '<tr><th scope="row"><label for="' . $id . '">' . esc_html( $field['label'] ) . '</label></th><td>';

		switch ( $field['type'] ) {
			case 'textarea':
				printf(
					'<textarea id="%1$s" name="%1$s" rows="4" class="large-text">%2$s</textarea>',
					$id,
					esc_textarea( (string) $value )
				);
				break;

			case 'select':
				printf( '<select id="%1$s" name="%1$s">', $id );
				$options = $field['options'] ?? array();
				if ( ! isset( $options[''] ) ) {
					$options = array( '' => '—' ) + $options;
				}
				foreach ( $options as $opt_value => $opt_label ) {
					printf(
						'<option value="%s"%s>%s</option>',
						esc_attr( $opt_value ),
						selected( $value, $opt_value, false ),
						esc_html( $opt_label )
					);
				}
				echo '</select>';
				break;

			default: // text, url
				printf(
					'<input type="text" id="%1$s" name="%1$s" value="%2$s" class="regular-text" />',
					$id,
					esc_attr( (string) $value )
				);
		}

		if ( ! empty( $field['hint'] ) ) {
			echo '<p class="description">' . esc_html( $field['hint'] ) . '</p>';
		}
		echo '</td></tr>';
	}

	/** Every meta key this plugin owns, so save() never trusts arbitrary input. */
	private static function all_meta_keys() {
		$keys = array();
		foreach ( self::general_fields() as $key => $field ) {
			$keys[ '_tch_client_' . $key ] = $field;
		}
		foreach ( TCH_Platforms::all() as $slug => $platform ) {
			foreach ( $platform['fields'] as $field_key => $field ) {
				$keys[ TCH_Platforms::meta_key( $slug, $field_key ) ] = $field;
			}
		}
		return $keys;
	}

	public static function save( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! isset( $_POST[ self::NONCE . '_nonce' ] )
			|| ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST[ self::NONCE . '_nonce' ] ) ), self::NONCE ) ) {
			return;
		}
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			return;
		}

		foreach ( self::all_meta_keys() as $meta_key => $field ) {
			if ( ! isset( $_POST[ $meta_key ] ) ) {
				continue;
			}
			$raw = wp_unslash( $_POST[ $meta_key ] );

			switch ( $field['type'] ) {
				case 'url':
					$value = esc_url_raw( trim( (string) $raw ) );
					break;
				case 'textarea':
					$value = sanitize_textarea_field( (string) $raw );
					break;
				case 'select':
					// Never store a value that is not one of the offered options.
					$allowed = array_keys( $field['options'] ?? array() );
					$allowed[] = '';
					$value   = in_array( (string) $raw, $allowed, true ) ? (string) $raw : '';
					break;
				default:
					$value = sanitize_text_field( (string) $raw );
			}

			if ( '' === $value ) {
				delete_post_meta( $post_id, $meta_key );
			} else {
				update_post_meta( $post_id, $meta_key, $value );
			}
		}
	}
}
