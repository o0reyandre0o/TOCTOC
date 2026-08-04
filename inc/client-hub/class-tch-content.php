<?php
/**
 * Content: the scheduling record.
 *
 * One post here = one piece of content aimed at any number of client/channel
 * pairs. Writing once and fanning out is the whole point: TocToc sells "weekly
 * updates across all channels", which today means logging into six different
 * Google accounts by hand.
 *
 * Deliberately channel-agnostic. The record stores WHAT to publish, WHERE and
 * WHEN; TCH_Publisher owns HOW, one adapter per platform. That is why a channel
 * still waiting on API approval (GBP) can be selected and queued today and will
 * start delivering the moment the adapter goes live — no re-authoring.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Content {

	const POST_TYPE = 'tch_content';
	const NONCE     = 'tch_save_content';

	/** Channels that can actually receive a publish call. */
	public static function publishable_channels() {
		return array(
			'gbp'     => 'Google Business Profile',
			'youtube' => 'YouTube',
			'linkedin'=> 'LinkedIn',
		);
	}

	public static function init() {
		add_action( 'init', array( __CLASS__, 'register' ) );
		add_action( 'add_meta_boxes', array( __CLASS__, 'meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ), 10, 2 );
		add_filter( 'manage_' . self::POST_TYPE . '_posts_columns', array( __CLASS__, 'columns' ) );
		add_action( 'manage_' . self::POST_TYPE . '_posts_custom_column', array( __CLASS__, 'column' ), 10, 2 );
	}

	public static function register() {
		register_post_type( self::POST_TYPE, array(
			'labels' => array(
				'name'          => 'Content',
				'singular_name' => 'Content',
				'add_new_item'  => 'Compose content',
				'edit_item'     => 'Edit content',
				'not_found'     => 'Nothing queued yet.',
			),
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'rewrite'             => false,
			'query_var'           => false,
			'show_in_rest'        => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'supports'            => array( 'title', 'editor' ),
			// Same primitive-caps-only rule as the client post type: mapping the
			// singular meta caps to manage_options would register that cap as a
			// meta capability and break every permission check on the site.
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'capabilities'        => array(
				'edit_posts'             => TCH_CAPABILITY,
				'edit_others_posts'      => TCH_CAPABILITY,
				'edit_private_posts'     => TCH_CAPABILITY,
				'edit_published_posts'   => TCH_CAPABILITY,
				'publish_posts'          => TCH_CAPABILITY,
				'read_private_posts'     => TCH_CAPABILITY,
				'delete_posts'           => TCH_CAPABILITY,
				'delete_others_posts'    => TCH_CAPABILITY,
				'delete_private_posts'   => TCH_CAPABILITY,
				'delete_published_posts' => TCH_CAPABILITY,
				'create_posts'           => TCH_CAPABILITY,
			),
		) );
	}

	public static function meta_boxes() {
		add_meta_box( 'tch-c-targets', 'Where to publish', array( __CLASS__, 'box_targets' ), self::POST_TYPE, 'normal', 'high' );
		add_meta_box( 'tch-c-schedule', 'Schedule', array( __CLASS__, 'box_schedule' ), self::POST_TYPE, 'side', 'high' );
		add_meta_box( 'tch-c-options', 'Options', array( __CLASS__, 'box_options' ), self::POST_TYPE, 'normal', 'default' );
		add_meta_box( 'tch-c-results', 'Delivery log', array( __CLASS__, 'box_results' ), self::POST_TYPE, 'normal', 'low' );
	}

	/**
	 * The target matrix: clients down, channels across. A checkbox is only
	 * offered where the client actually has that channel wired up, so you
	 * cannot queue a GBP post for a client whose location ID is still unknown.
	 */
	public static function box_targets( $post ) {
		wp_nonce_field( self::NONCE, self::NONCE . '_nonce' );
		$selected = (array) get_post_meta( $post->ID, '_tch_c_targets', true );
		$clients  = TCH_Post_Type::all();
		$channels = self::publishable_channels();

		if ( ! $clients ) {
			echo '<p>No clients yet — add one first.</p>';
			return;
		}
		echo '<table class="widefat striped tch-targets"><thead><tr><th>Client</th>';
		foreach ( $channels as $slug => $label ) {
			$ready = TCH_Publisher::channel_is_live( $slug );
			printf(
				'<th style="text-align:center">%s%s</th>',
				esc_html( $label ),
				$ready ? '' : '<br><span class="description">pending API</span>'
			);
		}
		echo '</tr></thead><tbody>';

		foreach ( $clients as $client ) {
			printf( '<tr><td><strong>%s</strong></td>', esc_html( get_the_title( $client ) ) );
			foreach ( array_keys( $channels ) as $slug ) {
				$configured = 'ready' === TCH_Post_Type::status( $client->ID, $slug );
				$key        = $client->ID . ':' . $slug;
				printf(
					'<td style="text-align:center">%s</td>',
					$configured
						? sprintf(
							'<input type="checkbox" name="tch_targets[]" value="%s"%s />',
							esc_attr( $key ),
							checked( in_array( $key, $selected, true ), true, false )
						)
						: '<span class="description" title="This client has no ID stored for that channel yet">&mdash;</span>'
				);
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		echo '<p class="description">The editor body above is the message. Channels with “pending API” accept the queue now and deliver once the API is approved.</p>';
	}

	public static function box_schedule( $post ) {
		$state = get_post_meta( $post->ID, '_tch_c_state', true ) ?: 'draft';
		$when  = (int) get_post_meta( $post->ID, '_tch_c_scheduled_at', true );
		$value = $when ? wp_date( 'Y-m-d\TH:i', $when ) : '';
		// 'published' and 'failed' are OUTCOMES the publisher writes, never
		// things you ask for. Offering them in this dropdown was a trap: picking
		// "Published" only relabelled the record while nothing was ever sent.
		$is_outcome = in_array( $state, array( 'published', 'failed' ), true );
		?>
		<?php if ( $is_outcome ) : ?>
			<p>
				<strong>Result</strong><br>
				<span class="tch-state tch-state--<?php echo esc_attr( $state ); ?>"><?php echo esc_html( ucfirst( $state ) ); ?></span>
			</p>
			<p>
				<label><input type="checkbox" name="tch_c_requeue" value="1"> Send again</label><br>
				<span class="description">Only targets that have not been delivered are retried.</span>
			</p>
		<?php else : ?>
			<p>
				<label for="tch_c_state"><strong>State</strong></label><br>
				<select id="tch_c_state" name="tch_c_state" style="width:100%">
					<option value="draft" <?php selected( $state, 'draft' ); ?>>Draft — not going anywhere</option>
					<option value="scheduled" <?php selected( $state, 'scheduled' ); ?>>Scheduled — publish at the time below</option>
				</select>
			</p>
		<?php endif; ?>
		<p>
			<label for="tch_c_when"><strong>Publish at</strong></label><br>
			<input type="datetime-local" id="tch_c_when" name="tch_c_when" value="<?php echo esc_attr( $value ); ?>" style="width:100%">
			<span class="description">Site time (<?php echo esc_html( wp_timezone_string() ); ?>).</span>
		</p>
		<?php if ( $post->ID && 'auto-draft' !== $post->post_status ) : ?>
			<p style="border-top:1px solid #dcdcde;padding-top:12px;margin-top:12px">
				<a class="button button-primary" style="width:100%;text-align:center"
				   href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=' . TCH_Dashboard::SLUG . '&tch_action=publish_now&content=' . $post->ID ), 'tch_publish_now' ) ); ?>">
					Publish now
				</a>
				<span class="description">Save your changes first — this sends whatever is already stored.</span>
			</p>
		<?php endif; ?>
		<?php
	}

	public static function box_options( $post ) {
		$media = (int) get_post_meta( $post->ID, '_tch_c_media_id', true );
		$cta   = (string) get_post_meta( $post->ID, '_tch_c_cta_type', true );
		$url   = (string) get_post_meta( $post->ID, '_tch_c_cta_url', true );
		$tags  = (string) get_post_meta( $post->ID, '_tch_c_tags', true );
		?>
		<table class="form-table tch-form"><tbody>
			<tr>
				<th><label>Image or video</label></th>
				<td>
					<?php /* Real media picker. Asking for an attachment ID by hand was
					         hostile: you had to leave the composer, find the number and
					         type it back in. wp.media is the same modal the rest of
					         WordPress uses, so uploading happens right here. */ ?>
					<div class="tch-media">
						<input type="hidden" id="tch_c_media_id" name="tch_c_media_id" value="<?php echo $media ? (int) $media : ''; ?>">
						<div class="tch-media__preview"><?php echo self::media_preview_html( $media ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
						<p>
							<button type="button" class="button tch-media__pick"><?php echo $media ? 'Change' : 'Select or upload'; ?></button>
							<button type="button" class="button-link-delete tch-media__clear" <?php echo $media ? '' : 'style="display:none"'; ?>>Remove</button>
						</p>
						<p class="description">Photo for a Google Business Profile post, video file for a YouTube upload.</p>
					</div>
					<script>
					jQuery(function ($) {
						var wrap  = $('.tch-media'),
						    field = wrap.find('#tch_c_media_id'),
						    frame;
						wrap.on('click', '.tch-media__pick', function (e) {
							e.preventDefault();
							if (!frame) {
								frame = wp.media({
									title: 'Select image or video',
									library: { type: ['image', 'video'] },
									multiple: false,
									button: { text: 'Use this file' }
								});
								frame.on('select', function () {
									var a = frame.state().get('selection').first().toJSON(),
									    thumb = (a.sizes && a.sizes.thumbnail) ? a.sizes.thumbnail.url : '';
									field.val(a.id);
									wrap.find('.tch-media__preview').html(
										(thumb ? '<img src="' + thumb + '" alt="" />' : '') +
										'<span class="tch-media__name">' + a.filename + '</span>'
									);
									wrap.find('.tch-media__pick').text('Change');
									wrap.find('.tch-media__clear').show();
								});
							}
							frame.open();
						});
						wrap.on('click', '.tch-media__clear', function (e) {
							e.preventDefault();
							field.val('');
							wrap.find('.tch-media__preview').empty();
							wrap.find('.tch-media__pick').text('Select or upload');
							$(this).hide();
						});
					});
					</script>
				</td>
			</tr>
			<tr>
				<th><label for="tch_c_cta_type">Google post button</label></th>
				<td>
					<select id="tch_c_cta_type" name="tch_c_cta_type">
						<?php
						$options = array(
							''             => '— none —',
							'LEARN_MORE'   => 'Learn more',
							'BOOK'         => 'Book',
							'ORDER'        => 'Order online',
							'SHOP'         => 'Shop',
							'SIGN_UP'      => 'Sign up',
							'CALL'         => 'Call now',
						);
						foreach ( $options as $k => $v ) {
							printf( '<option value="%s"%s>%s</option>', esc_attr( $k ), selected( $cta, $k, false ), esc_html( $v ) );
						}
						?>
					</select>
					<input type="url" name="tch_c_cta_url" value="<?php echo esc_attr( $url ); ?>" class="regular-text" placeholder="https://…">
					<p class="description">Google Business Profile only. “Call now” takes no URL.</p>
				</td>
			</tr>
			<tr>
				<th><label for="tch_c_tags">YouTube tags</label></th>
				<td><input type="text" id="tch_c_tags" name="tch_c_tags" value="<?php echo esc_attr( $tags ); ?>" class="regular-text" placeholder="cayman, restaurant, seven mile beach"></td>
			</tr>
		</tbody></table>
		<?php
	}

	/** Thumbnail for images, filename for videos (which have no preview image). */
	public static function media_preview_html( $media_id ) {
		$media_id = (int) $media_id;
		if ( ! $media_id || ! get_post( $media_id ) ) {
			return '';
		}
		$html = '';
		if ( wp_attachment_is_image( $media_id ) ) {
			$html .= wp_get_attachment_image( $media_id, 'thumbnail' );
		}
		$file  = get_attached_file( $media_id );
		$html .= '<span class="tch-media__name">' . esc_html( $file ? basename( $file ) : ( '#' . $media_id ) ) . '</span>';
		return $html;
	}

	/** Per-target outcome of the last publish attempt — the audit trail. */
	public static function box_results( $post ) {
		$results = (array) get_post_meta( $post->ID, '_tch_c_results', true );
		if ( ! $results ) {
			echo '<p class="description">Nothing delivered yet.</p>';
			return;
		}
		echo '<table class="widefat striped"><thead><tr><th>Target</th><th>Result</th><th>When</th></tr></thead><tbody>';
		foreach ( $results as $key => $row ) {
			list( $client_id, $channel ) = array_pad( explode( ':', (string) $key ), 2, '' );
			printf(
				'<tr><td>%s &middot; <code>%s</code></td><td>%s</td><td>%s</td></tr>',
				esc_html( get_the_title( (int) $client_id ) ),
				esc_html( $channel ),
				esc_html( (string) ( $row['message'] ?? '' ) ),
				esc_html( ! empty( $row['time'] ) ? wp_date( 'Y-m-d H:i', (int) $row['time'] ) : '' )
			);
		}
		echo '</tbody></table>';
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

		$targets = array();
		foreach ( (array) ( $_POST['tch_targets'] ?? array() ) as $raw ) {
			$raw = sanitize_text_field( wp_unslash( $raw ) );
			if ( preg_match( '/^\d+:(gbp|youtube|linkedin)$/', $raw ) ) {
				$targets[] = $raw;
			}
		}
		update_post_meta( $post_id, '_tch_c_targets', $targets );

		// Only draft/scheduled can be asked for. A record already carrying an
		// outcome keeps it unless "Send again" is ticked, so saving an edit can
		// never silently un-publish something.
		if ( ! empty( $_POST['tch_c_requeue'] ) ) {
			update_post_meta( $post_id, '_tch_c_state', 'scheduled' );
		} elseif ( isset( $_POST['tch_c_state'] ) ) {
			$state = sanitize_key( wp_unslash( $_POST['tch_c_state'] ) );
			update_post_meta( $post_id, '_tch_c_state', in_array( $state, array( 'draft', 'scheduled' ), true ) ? $state : 'draft' );
		}

		// datetime-local has no timezone, so read it in the site's zone rather
		// than letting strtotime() assume UTC and shift every post.
		$when = sanitize_text_field( wp_unslash( $_POST['tch_c_when'] ?? '' ) );
		if ( '' !== $when ) {
			try {
				$dt = new DateTime( $when, wp_timezone() );
				update_post_meta( $post_id, '_tch_c_scheduled_at', $dt->getTimestamp() );
			} catch ( Exception $e ) {
				delete_post_meta( $post_id, '_tch_c_scheduled_at' );
			}
		} else {
			delete_post_meta( $post_id, '_tch_c_scheduled_at' );
		}

		$media = (int) ( $_POST['tch_c_media_id'] ?? 0 );
		if ( $media > 0 ) {
			update_post_meta( $post_id, '_tch_c_media_id', $media );
		} else {
			delete_post_meta( $post_id, '_tch_c_media_id' );
		}

		$cta_types = array( '', 'LEARN_MORE', 'BOOK', 'ORDER', 'SHOP', 'SIGN_UP', 'CALL' );
		$cta       = sanitize_text_field( wp_unslash( $_POST['tch_c_cta_type'] ?? '' ) );
		update_post_meta( $post_id, '_tch_c_cta_type', in_array( $cta, $cta_types, true ) ? $cta : '' );
		update_post_meta( $post_id, '_tch_c_cta_url', esc_url_raw( wp_unslash( $_POST['tch_c_cta_url'] ?? '' ) ) );
		update_post_meta( $post_id, '_tch_c_tags', sanitize_text_field( wp_unslash( $_POST['tch_c_tags'] ?? '' ) ) );
	}

	public static function columns( $columns ) {
		return array(
			'cb'         => $columns['cb'] ?? '',
			'title'      => 'Content',
			'tch_state'  => 'State',
			'tch_when'   => 'Publish at',
			'tch_where'  => 'Targets',
		);
	}

	public static function column( $column, $post_id ) {
		switch ( $column ) {
			case 'tch_state':
				$state = get_post_meta( $post_id, '_tch_c_state', true ) ?: 'draft';
				printf( '<span class="tch-state tch-state--%s">%s</span>', esc_attr( $state ), esc_html( ucfirst( $state ) ) );
				break;
			case 'tch_when':
				$when = (int) get_post_meta( $post_id, '_tch_c_scheduled_at', true );
				echo $when ? esc_html( wp_date( 'Y-m-d H:i', $when ) ) : '&mdash;';
				break;
			case 'tch_where':
				$targets = (array) get_post_meta( $post_id, '_tch_c_targets', true );
				if ( ! $targets ) {
					echo '&mdash;';
					break;
				}
				$bits = array();
				foreach ( $targets as $t ) {
					list( $cid, $ch ) = array_pad( explode( ':', (string) $t ), 2, '' );
					$bits[] = get_the_title( (int) $cid ) . ' (' . $ch . ')';
				}
				echo esc_html( implode( ', ', $bits ) );
				break;
		}
	}
}
