<?php
/**
 * The status board — the reason the hub is centralised.
 *
 * One grid: every client down the side, every platform across the top. The point
 * is to answer "who is missing what" in a glance, which is exactly what you lose
 * if each client site manages its own profiles.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TCH_Dashboard {

	const SLUG = 'toctoc-client-hub';

	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'menu' ) );
	}

	public static function menu() {
		/*
		 * No position argument on purpose.
		 *
		 * WordPress keys the admin menu by position, so passing an integer that
		 * another plugin already uses silently overwrites one of the two menus —
		 * a plugin's screen simply vanishes from the sidebar. This previously
		 * passed 26, which is squarely in the range plugins pick from.
		 *
		 * Omitting it appends the menu at the end of the list, where it cannot
		 * collide with anything.
		 */
		add_menu_page(
			'Client Hub',
			'Client Hub',
			TCH_CAPABILITY,
			self::SLUG,
			array( __CLASS__, 'render' ),
			'dashicons-networking'
		);

		add_submenu_page(
			self::SLUG,
			'Status board',
			'Status board',
			TCH_CAPABILITY,
			self::SLUG,
			array( __CLASS__, 'render' )
		);

		// The CPT is registered with show_in_menu => false, so wire its screens
		// in here to keep everything under one menu.
		add_submenu_page(
			self::SLUG,
			'Clients',
			'Clients',
			TCH_CAPABILITY,
			'edit.php?post_type=' . TCH_Post_Type::POST_TYPE
		);
		add_submenu_page(
			self::SLUG,
			'Add Client',
			'Add Client',
			TCH_CAPABILITY,
			'post-new.php?post_type=' . TCH_Post_Type::POST_TYPE
		);
		add_submenu_page(
			self::SLUG,
			'Compose content',
			'Compose',
			TCH_CAPABILITY,
			'post-new.php?post_type=' . TCH_Content::POST_TYPE
		);
		add_submenu_page(
			self::SLUG,
			'Content queue',
			'Queue',
			TCH_CAPABILITY,
			self::SLUG . '-queue',
			array( __CLASS__, 'render_queue' )
		);
		// The plain WordPress list, with search, filters and bulk actions. The
		// Queue view above is the scheduling lens; this is the archive.
		add_submenu_page(
			self::SLUG,
			'All content',
			'All content',
			TCH_CAPABILITY,
			'edit.php?post_type=' . TCH_Content::POST_TYPE
		);
		add_submenu_page(
			self::SLUG,
			'Setup',
			'Setup',
			TCH_CAPABILITY,
			self::SLUG . '-setup',
			array( __CLASS__, 'render_setup' )
		);
	}

	/** Everything queued or delivered, newest schedule first. */
	public static function render_queue() {
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			wp_die( 'You do not have permission to view this page.' );
		}
		/*
		 * Fetch everything, then sort in PHP.
		 *
		 * Ordering with meta_key => '_tch_c_scheduled_at' makes WP_Query INNER
		 * JOIN postmeta, which silently drops every record that has no date yet
		 * — so a draft saved without a schedule vanished from this screen even
		 * though it existed. At 100 rows, sorting here is both correct and cheap.
		 */
		$items = get_posts( array(
			'post_type'   => TCH_Content::POST_TYPE,
			'post_status' => 'any',
			'numberposts' => 100,
			'orderby'     => 'date',
			'order'       => 'DESC',
		) );
		usort( $items, function ( $a, $b ) {
			$wa = (int) get_post_meta( $a->ID, '_tch_c_scheduled_at', true );
			$wb = (int) get_post_meta( $b->ID, '_tch_c_scheduled_at', true );
			// Undated drafts float to the top: they are the ones needing attention.
			if ( ! $wa && ! $wb ) {
				return $b->post_date_gmt <=> $a->post_date_gmt;
			}
			if ( ! $wa ) {
				return -1;
			}
			if ( ! $wb ) {
				return 1;
			}
			return $wa <=> $wb;
		} );
		?>
		<div class="wrap tch-wrap">
			<h1>
				Content queue
				<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=' . TCH_Content::POST_TYPE ) ); ?>" class="page-title-action">Compose</a>
			</h1>
			<?php if ( ! $items ) : ?>
				<div class="notice notice-info inline"><p>Nothing queued. <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=' . TCH_Content::POST_TYPE ) ); ?>">Compose your first post</a> — write once, tick the clients and channels, set a date.</p></div>
			<?php else : ?>
				<table class="widefat striped">
					<thead><tr><th>Content</th><th>State</th><th>Publish at</th><th>Targets</th><th></th></tr></thead>
					<tbody>
					<?php foreach ( $items as $item ) :
						$state   = get_post_meta( $item->ID, '_tch_c_state', true ) ?: 'draft';
						$when    = (int) get_post_meta( $item->ID, '_tch_c_scheduled_at', true );
						$targets = (array) get_post_meta( $item->ID, '_tch_c_targets', true );
						$results = (array) get_post_meta( $item->ID, '_tch_c_results', true );
						$done    = 0;
						foreach ( $results as $r ) {
							$done += ! empty( $r['ok'] ) ? 1 : 0;
						}
						?>
						<tr>
							<td><a href="<?php echo esc_url( get_edit_post_link( $item->ID ) ); ?>"><strong><?php echo esc_html( get_the_title( $item ) ); ?></strong></a></td>
							<td><span class="tch-state tch-state--<?php echo esc_attr( $state ); ?>"><?php echo esc_html( ucfirst( $state ) ); ?></span></td>
							<td><?php echo $when ? esc_html( wp_date( 'Y-m-d H:i', $when ) ) : '&mdash;'; ?></td>
							<td><?php echo esc_html( sprintf( '%d/%d delivered', $done, count( $targets ) ) ); ?></td>
							<td>
								<?php if ( 'published' !== $state && $targets ) : ?>
									<a class="button button-small" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=' . self::SLUG . '&tch_action=publish_now&content=' . $item->ID ), 'tch_publish_now' ) ); ?>">Publish now</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>

			<h2>Automation</h2>
			<?php $next = wp_next_scheduled( TCH_Publisher::CRON_HOOK ); ?>
			<p>
				Publisher runs every 5 minutes.
				<?php echo $next ? 'Next run in ' . esc_html( human_time_diff( $next ) ) . '.' : '<strong>Not scheduled.</strong>'; ?>
			</p>
			<p class="description">
				WordPress only fires its cron when someone visits the site, so a quiet hour can delay a
				scheduled post. For minute-accurate publishing add a real server cron hitting
				<code><?php echo esc_html( site_url( 'wp-cron.php?doing_wp_cron' ) ); ?></code> every 5 minutes
				(and set <code>DISABLE_WP_CRON</code> to true in wp-config.php).
			</p>
		</div>
		<?php
	}

	public static function render() {
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			wp_die( 'You do not have permission to view this page.' );
		}
		$clients   = TCH_Post_Type::all();
		$platforms = TCH_Platforms::all();
		?>
		<div class="wrap tch-wrap">
			<h1>Client Hub</h1>
			<?php
			// One-shot result of a connect/sync action, set before the redirect.
			$flash = class_exists( 'TCH_Google' ) ? TCH_Google::take_flash() : null;
			if ( $flash ) {
				printf(
					'<div class="notice notice-%s is-dismissible"><p>%s</p></div>',
					esc_attr( 'success' === $flash['type'] ? 'success' : 'error' ),
					esc_html( $flash['msg'] )
				);
			}
			?>

			<?php if ( class_exists( 'TCH_Google' ) ) : ?>
			<div class="tch-connections">
				<?php if ( ! TCH_Google::is_configured() ) : ?>
					<p><span class="tch-dot tch-dot--empty"></span> <strong>Google:</strong> not configured — define the constants in wp-config.php (see <a href="<?php echo esc_url( admin_url( 'admin.php?page=' . self::SLUG . '-setup' ) ); ?>">Setup</a>).</p>
				<?php elseif ( ! TCH_Google::is_connected() ) : ?>
					<p>
						<span class="tch-dot tch-dot--partial"></span> <strong>Google:</strong> configured, not connected.
						<a class="button button-primary" href="<?php echo esc_url( TCH_Google::connect_url() ); ?>">Connect Google</a>
					</p>
				<?php else : ?>
					<p>
						<span class="tch-dot tch-dot--ready"></span> <strong>Google:</strong> connected.
						<a class="button button-primary" href="<?php echo esc_url( TCH_Google::sync_url() ); ?>">Sync YouTube now</a>
						<a class="button" href="<?php echo esc_url( TCH_Google::gbp_url() ); ?>" title="Works once Google approves the Business Profile API request (case 7-2699000041208). Until then this button doubles as the approval test — an error means still pending.">Discover GBP</a>
						<a class="button" href="<?php echo esc_url( TCH_Google::disconnect_url() ); ?>">Disconnect</a>
						<?php $last = (int) get_option( 'tch_youtube_last_sync' ); ?>
						<?php if ( $last ) : ?>
							<span class="description">Last sync: <?php echo esc_html( human_time_diff( $last ) ); ?> ago.</span>
						<?php endif; ?>
					</p>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<p class="tch-lede">
				Every profile TocToc manages, in one grid.
				<span class="tch-dot tch-dot--ready"></span> ready
				<span class="tch-dot tch-dot--partial"></span> incomplete
				<span class="tch-dot tch-dot--empty"></span> missing
			</p>

			<?php
			// Staleness first: this is the screen's most actionable content. A
			// retained client going quiet is what eventually makes the 90-day
			// guarantee expensive, so it outranks the coverage grid.
			$stale = class_exists( 'TCH_Publisher' ) ? TCH_Publisher::stale_report() : array();
			if ( $stale ) :
				?>
				<div class="notice notice-warning inline tch-stale">
					<p><strong>Needs a post</strong></p>
					<ul>
						<?php foreach ( $stale as $s ) : ?>
							<li>
								<a href="<?php echo esc_url( get_edit_post_link( $s['id'] ) ); ?>"><strong><?php echo esc_html( $s['client'] ); ?></strong></a>
								&middot; <code><?php echo esc_html( $s['channel'] ); ?></code> &mdash;
								<?php
								echo null === $s['days']
									? 'never published from the hub'
									: esc_html( sprintf( '%d days ago (limit %d)', $s['days'], $s['limit'] ) );
								?>
							</li>
						<?php endforeach; ?>
					</ul>
					<p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=' . TCH_Content::POST_TYPE ) ); ?>">Compose a post</a></p>
				</div>
			<?php endif; ?>

			<?php if ( ! $clients ) : ?>
				<div class="notice notice-info inline">
					<p>
						No clients yet.
						<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=' . TCH_Post_Type::POST_TYPE ) ); ?>">Add your first client</a>
						— start with the ones whose listings you already manage: Uncle Liu, Coconut Room, Prime Kitchen, Carnivore, 19-81 Brewing Co., TintXKing.
					</p>
				</div>
			<?php else : ?>
				<table class="widefat striped tch-board">
					<thead>
						<tr>
							<th class="tch-board__client">Client</th>
							<?php foreach ( $platforms as $p ) : ?>
								<th class="tch-board__platform" title="<?php echo esc_attr( $p['label'] ); ?>">
									<span aria-hidden="true"><?php echo esc_html( $p['icon'] ); ?></span>
									<span class="tch-board__platform-label"><?php echo esc_html( $p['label'] ); ?></span>
								</th>
							<?php endforeach; ?>
							<th>Engagement</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ( $clients as $client ) :
						$engagement = get_post_meta( $client->ID, '_tch_client_status', true );
						?>
						<tr>
							<td class="tch-board__client">
								<a href="<?php echo esc_url( get_edit_post_link( $client->ID ) ); ?>">
									<strong><?php echo esc_html( get_the_title( $client ) ); ?></strong>
								</a>
							</td>
							<?php foreach ( array_keys( $platforms ) as $slug ) : ?>
								<td class="tch-board__cell">
									<?php echo TCH_Post_Type::status_dot( $client->ID, $slug ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
								</td>
							<?php endforeach; ?>
							<td><?php echo esc_html( $engagement ? ucfirst( $engagement ) : '—' ); ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

				<?php self::render_totals( $clients, $platforms ); ?>
				<?php self::render_youtube_stats( $clients ); ?>
			<?php endif; ?>
		</div>
		<?php
	}

	/** Synced YouTube numbers per client — only rows that have data. */
	private static function render_youtube_stats( $clients ) {
		$rows = array();
		foreach ( $clients as $client ) {
			$synced = (int) get_post_meta( $client->ID, '_tch_youtube_synced_at', true );
			if ( ! $synced ) {
				continue;
			}
			$rows[] = array(
				'name'   => get_the_title( $client ),
				'edit'   => get_edit_post_link( $client->ID ),
				'title'  => (string) get_post_meta( $client->ID, '_tch_youtube_stat_title', true ),
				'subs'   => (int) get_post_meta( $client->ID, '_tch_youtube_stat_subs', true ),
				'videos' => (int) get_post_meta( $client->ID, '_tch_youtube_stat_videos', true ),
				'views'  => (int) get_post_meta( $client->ID, '_tch_youtube_stat_views', true ),
				'synced' => $synced,
			);
		}
		if ( ! $rows ) {
			return;
		}
		?>
		<h2>YouTube</h2>
		<table class="widefat striped" style="max-width:860px">
			<thead>
				<tr><th>Client</th><th>Channel</th><th>Subscribers</th><th>Videos</th><th>Views</th><th>Synced</th></tr>
			</thead>
			<tbody>
			<?php foreach ( $rows as $r ) : ?>
				<tr>
					<td><a href="<?php echo esc_url( $r['edit'] ); ?>"><strong><?php echo esc_html( $r['name'] ); ?></strong></a></td>
					<td><?php echo esc_html( $r['title'] ); ?></td>
					<td><?php echo esc_html( number_format_i18n( $r['subs'] ) ); ?></td>
					<td><?php echo esc_html( number_format_i18n( $r['videos'] ) ); ?></td>
					<td><?php echo esc_html( number_format_i18n( $r['views'] ) ); ?></td>
					<td><?php echo esc_html( human_time_diff( $r['synced'] ) ); ?> ago</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php
	}

	private static function render_totals( $clients, $platforms ) {
		echo '<h2>Coverage</h2><ul class="tch-totals">';
		foreach ( $platforms as $slug => $platform ) {
			$ready = 0;
			foreach ( $clients as $client ) {
				if ( 'ready' === TCH_Post_Type::status( $client->ID, $slug ) ) {
					$ready++;
				}
			}
			printf(
				'<li><span>%s %s</span><strong>%d / %d</strong></li>',
				esc_html( $platform['icon'] ),
				esc_html( $platform['label'] ),
				(int) $ready,
				count( $clients )
			);
		}
		echo '</ul>';
	}

	public static function render_setup() {
		if ( ! current_user_can( TCH_CAPABILITY ) ) {
			wp_die( 'You do not have permission to view this page.' );
		}
		$config    = TCH_Credentials::config_status();
		$crypto_ok = TCH_Credentials::is_available();
		$redirect  = admin_url( 'admin.php?page=' . self::SLUG . '&tch_oauth=google' );
		?>
		<div class="wrap tch-wrap">
			<h1>Setup</h1>

			<h2>Encryption</h2>
			<p>
				<?php if ( $crypto_ok ) : ?>
					<span class="tch-dot tch-dot--ready"></span>
					Token encryption is available
					(<?php echo function_exists( 'sodium_crypto_secretbox' ) ? 'libsodium' : 'OpenSSL AES-256-CBC + HMAC'; ?>).
				<?php else : ?>
					<span class="tch-dot tch-dot--empty"></span>
					<strong>Unavailable.</strong> Neither libsodium nor OpenSSL is reachable — do not connect any account until this is fixed.
				<?php endif; ?>
			</p>

			<h2>wp-config.php constants</h2>
			<p class="description">
				These live on the filesystem on purpose, so a database dump never exposes them.
				Add them <em>above</em> the <code>/* That's all, stop editing! */</code> line.
			</p>
			<table class="widefat striped" style="max-width:640px">
				<tbody>
				<?php foreach ( $config as $name => $present ) : ?>
					<tr>
						<td><code><?php echo esc_html( $name ); ?></code></td>
						<td>
							<?php if ( $present ) : ?>
								<span class="tch-dot tch-dot--ready"></span> defined
							<?php else : ?>
								<span class="tch-dot tch-dot--empty"></span> not defined
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<h2>Google OAuth redirect URI</h2>
			<p>Paste this into the OAuth client in Google Cloud Console, under <em>Authorised redirect URIs</em>:</p>
			<p><input type="text" class="large-text code" readonly onclick="this.select()" value="<?php echo esc_attr( $redirect ); ?>" /></p>

			<h2>Roadmap</h2>
			<ol class="tch-roadmap">
				<li><strong>Phase 0 — done.</strong> Private client records, profile inventory, status board, encrypted store.</li>
				<li><strong>Phase 1 — YouTube.</strong> Data API v3, no approval needed. Proves the OAuth plumbing.</li>
				<li><strong>Phase 2 — Google Business Profile, read.</strong> Listings, hours, reviews, insights.</li>
				<li><strong>Phase 3 — Google Business Profile, write.</strong> Posts and review replies.</li>
				<li><strong>Phase 4 — LinkedIn.</strong> Community Management API.</li>
				<li><strong>Phase 5 — Apple Business Connect.</strong> Needs a Third-Party Partner ID.</li>
				<li><strong>Bing Places — manual, by design.</strong> Its partner API requires 10,000+ listings; import from GBP per client instead.</li>
			</ol>
		</div>
		<?php
	}
}
