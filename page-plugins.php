<?php
/**
 * Template Name: Plugins
 * Template Post Type: page
 *
 * Slug-matched (page-plugins.php), so the page needs no template chosen in
 * wp-admin. Content comes from inc/plugins.php.
 *
 * @package TocToc
 */

if ( ! function_exists( 'toctoc_plugins' ) ) {
	// inc/plugins.php not on the server yet — render the page's own content
	// rather than fatal. Same guard, same reason, as the team pages.
	get_header();
	echo '<main class="min-h-screen bg-background text-foreground pt-48 pb-32"><div class="mx-auto max-w-3xl px-6">';
	while ( have_posts() ) { the_post(); the_content(); }
	echo '</div></main>';
	get_footer();
	return;
}

get_header();

$tt_plugins = toctoc_plugins();

/*
 * SoftwareApplication per plugin, pushed into the page's single @graph rather
 * than printed as its own <script>. A plugin still in review gets no
 * downloadUrl: the node describes what exists, not what we hope exists.
 */
if ( function_exists( 'toctoc_schema_add' ) ) {
	foreach ( $tt_plugins as $tt_p ) {
		$tt_node = array(
			'@type'               => 'SoftwareApplication',
			'@id'                 => home_url( '/plugins/' ) . '#' . $tt_p['slug'],
			'name'                => $tt_p['name'],
			'applicationCategory' => 'DeveloperApplication',
			'operatingSystem'     => 'WordPress',
			'softwareVersion'     => $tt_p['version'],
			'softwareRequirements'=> html_entity_decode( $tt_p['requires'], ENT_QUOTES, 'UTF-8' ),
			'description'         => html_entity_decode( wp_strip_all_tags( $tt_p['lede'] ), ENT_QUOTES, 'UTF-8' ),
			'author'              => array( '@id' => 'https://www.linkedin.com/in/andre-g-9b373a97/#person' ),
			'publisher'           => array( '@id' => home_url( '/' ) . '#organization' ),
			'isAccessibleForFree' => true,
			'license'             => 'https://www.gnu.org/licenses/gpl-2.0.html',
			'image'               => $tt_p['image'] ?? '',
		);
		if ( 'live' === $tt_p['state'] ) {
			$tt_node['downloadUrl'] = $tt_p['wporg'];
			$tt_node['url']         = $tt_p['wporg'];
		} elseif ( ! empty( $tt_p['zip'] ) ) {
			// Mientras espera revision se descarga de aqui, asi que el nodo
			// puede decirlo: describe lo que existe, no lo que esperamos.
			$tt_node['downloadUrl'] = $tt_p['zip'];
		}
		toctoc_schema_add( $tt_node );
	}
}
?>

<main class="min-h-screen bg-background text-foreground">

	<section class="relative pt-36 pb-20 overflow-hidden bg-slate-950 text-white">
		<div class="absolute inset-0 z-0 opacity-40">
			<div class="absolute top-0 right-1/4 w-[520px] h-[520px] bg-sky-deep blur-[120px] rounded-full"></div>
		</div>
		<div class="relative z-10 mx-auto max-w-5xl px-6">
			<?php toctoc_render_breadcrumbs( 'Plugins' ); ?>
			<div class="mt-8 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent uppercase tracking-widest">
				Open source &middot; GPL
			</div>
			<h1 class="mt-8 text-5xl sm:text-6xl md:text-7xl font-display leading-[0.95] text-white">
				Tools we built because <em class="italic text-accent font-display">we needed them.</em>
			</h1>
			<p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
				Every plugin here came out of a real problem on a client build in Grand Cayman. We publish them free, under the GPL, in the official WordPress directory &mdash; because a tool nobody can install is not a tool.
			</p>
		</div>
	</section>

	<section class="py-24 md:py-28 bg-white">
		<div class="mx-auto max-w-5xl px-6 space-y-10">
			<?php foreach ( $tt_plugins as $tt_p ) : ?>
			<article class="rounded-[2.5rem] border border-slate-100 bg-white p-8 md:p-12 shadow-soft">

				<?php if ( ! empty( $tt_p['image'] ) ) : ?>
				<img src="<?php echo esc_url( $tt_p['image'] ); ?>"
					 alt="<?php echo esc_attr( $tt_p['image_alt'] ); ?>"
					 width="1600" height="840" loading="lazy" decoding="async"
					 class="w-full h-auto rounded-[1.75rem] border border-slate-100 mb-10" />
				<?php endif; ?>

				<div class="flex flex-wrap items-center gap-4">
					<h2 class="text-3xl md:text-4xl font-display text-slate-900"><?php echo esc_html( $tt_p['name'] ); ?></h2>
					<?php if ( 'live' === $tt_p['state'] ) : ?>
					<span class="rounded-full bg-accent px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-slate-950">On WordPress.org</span>
					<?php else : ?>
					<span class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-slate-500">In review at WordPress.org</span>
					<?php endif; ?>
				</div>

				<p class="mt-3 text-[11px] font-bold uppercase tracking-widest text-slate-400">
					v<?php echo esc_html( $tt_p['version'] ); ?> &middot; <?php echo wp_kses_post( $tt_p['requires'] ); ?> &middot;
					by <a href="<?php echo esc_url( $tt_p['author_url'] ); ?>" class="text-sky-deep decoration-none hover:underline"><?php echo esc_html( $tt_p['author'] ); ?></a>
				</p>

				<p class="mt-8 text-xl text-slate-700 leading-relaxed max-w-3xl"><?php echo wp_kses_post( $tt_p['lede'] ); ?></p>

				<div class="mt-10 grid md:grid-cols-2 gap-10">
					<div>
						<h3 class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep mb-4">The problem it solves</h3>
						<p class="text-slate-600 leading-relaxed"><?php echo wp_kses_post( $tt_p['problem'] ); ?></p>
					</div>
					<div>
						<h3 class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep mb-4">What it does</h3>
						<ul class="space-y-3">
							<?php foreach ( $tt_p['features'] as $tt_f ) : ?>
							<li class="flex gap-3 text-sm text-slate-600 leading-relaxed">
								<span aria-hidden="true" class="text-sky-deep shrink-0">&mdash;</span>
								<span><?php echo wp_kses_post( $tt_f ); ?></span>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="mt-10 flex flex-wrap items-center gap-4">
					<?php if ( 'live' === $tt_p['state'] ) : ?>
					<a href="<?php echo esc_url( $tt_p['wporg'] ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-6 pr-2 py-2 text-base font-bold shadow-pill transition-all hover:scale-105 decoration-none">
						Get it on WordPress.org
						<span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-accent text-slate-950">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
						</span>
					</a>
					<?php else : ?>
					<a href="<?php echo esc_url( $tt_p['zip'] ); ?>" download class="inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-6 pr-2 py-2 text-base font-bold shadow-pill transition-all hover:scale-105 decoration-none">
						Download v<?php echo esc_html( $tt_p['version'] ); ?> &middot; <?php echo esc_html( $tt_p['zip_kb'] ); ?> KB
						<span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-accent text-slate-950">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
						</span>
					</a>
					<p class="text-sm text-slate-500 max-w-sm">Waiting on review at WordPress.org. Install it from here meanwhile &mdash; once it is approved, reinstall from the directory to get automatic updates.</p>
					<?php endif; ?>
				</div>

				<?php if ( ! empty( $tt_p['install'] ) ) : ?>
				<div class="mt-10 rounded-[1.75rem] border border-slate-100 bg-slate-50/60 p-8">
					<h3 class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep mb-6">How to install it</h3>
					<ol class="space-y-3">
						<?php foreach ( $tt_p['install'] as $tt_i => $tt_step ) : ?>
						<li class="flex gap-4 text-sm text-slate-600 leading-relaxed">
							<span class="shrink-0 inline-flex h-6 w-6 items-center justify-center rounded-full bg-slate-900 text-white text-[11px] font-bold"><?php echo (int) $tt_i + 1; ?></span>
							<span><?php echo wp_kses_post( $tt_step ); ?></span>
						</li>
						<?php endforeach; ?>
					</ol>
					<?php if ( ! empty( $tt_p['server'] ) ) : ?>
					<p class="mt-6 text-sm text-slate-500"><?php echo wp_kses_post( $tt_p['server'] ); ?></p>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</article>
			<?php endforeach; ?>

			<p class="text-center text-slate-500">
				More on the way. If one of these nearly does what you need, <a href="/contact/" class="font-bold text-sky-deep decoration-none hover:underline">tell us what is missing</a>.
			</p>
		</div>
	</section>

	<?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
