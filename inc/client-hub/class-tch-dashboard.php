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
		add_menu_page(
			'Client Hub',
			'Client Hub',
			TCH_CAPABILITY,
			self::SLUG,
			array( __CLASS__, 'render' ),
			'dashicons-networking',
			26
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
			'Setup',
			'Setup',
			TCH_CAPABILITY,
			self::SLUG . '-setup',
			array( __CLASS__, 'render_setup' )
		);
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
			<p class="tch-lede">
				Every profile TocToc manages, in one grid.
				<span class="tch-dot tch-dot--ready"></span> ready
				<span class="tch-dot tch-dot--partial"></span> incomplete
				<span class="tch-dot tch-dot--empty"></span> missing
			</p>

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
			<?php endif; ?>
		</div>
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
