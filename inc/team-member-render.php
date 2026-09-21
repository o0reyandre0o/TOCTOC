<?php
/**
 * The one renderer behind every /team/<slug>/ page.
 *
 * Included by the four page-<slug>.php shims. WordPress picks page-{slug}.php
 * on its own, so these pages need no template assigned in wp-admin — one less
 * thing to get wrong if a page is ever deleted and recreated.
 *
 * @package TocToc
 */

defined( 'ABSPATH' ) || exit;

$tt_slug   = get_post_field( 'post_name', get_the_ID() );
$tt_member = toctoc_team_member( $tt_slug );

if ( null === $tt_member ) {
	// A page slug that looks like a member page but has no record. Better to
	// fall through to the normal page rendering than to print a blank profile.
	get_header();
	echo '<main class="min-h-screen bg-background text-foreground pt-48 pb-32"><div class="mx-auto max-w-3xl px-6">';
	the_content();
	echo '</div></main>';
	get_footer();
	return;
}

$tt_first    = strtok( $tt_member['name'], ' ' );
$tt_articles = toctoc_team_articles( $tt_member );
$tt_total    = toctoc_team_article_count( $tt_member );

// No JSON-LD here. The page node lives in header.php's @graph via
// toctoc_team_extra_schema_json(), so the page keeps one ld+json block and one
// definition of each @id. A second <script> here produced two blocks and two
// definitions of the same Person — the exact ambiguity stable @ids exist to
// prevent.

get_header(); ?>

<main class="min-h-screen bg-background text-foreground">

	<!-- Profile hero -->
	<section class="relative pt-36 pb-20 overflow-hidden bg-slate-950 text-white">
		<div class="absolute inset-0 z-0 opacity-40">
			<div class="absolute top-0 left-1/3 w-[520px] h-[520px] bg-sky-deep blur-[120px] rounded-full"></div>
		</div>

		<div class="relative z-10 mx-auto max-w-5xl px-6">
			<?php toctoc_render_breadcrumbs( $tt_member['name'] ); ?>

			<div class="mt-8 grid md:grid-cols-[minmax(0,260px)_1fr] gap-10 md:gap-14 items-start">

				<?php /* El retrato en vertical y en rectangulo: a 5:6 cabe la persona,
						 no solo la cara, y deja de competir con el titular. */ ?>
				<figure class="relative">
					<img src="<?php echo esc_url( $tt_member['photo'] ); ?>"
						 alt="<?php echo esc_attr( $tt_member['name'] . ', ' . $tt_member['role_plain'] . ' at TocToc Marketing' ); ?>"
						 width="520" height="624" fetchpriority="high" decoding="async"
						 class="w-full aspect-[5/6] object-cover object-top rounded-[1.75rem] border border-white/10" />
					<figcaption class="absolute -bottom-3 left-5 right-5 rounded-full bg-accent px-4 py-2 text-center text-[10px] font-bold uppercase tracking-[0.18em] text-slate-950">
						TocToc &middot; Grand Cayman
					</figcaption>
				</figure>

				<div class="pt-2">
					<h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-white"><?php echo esc_html( $tt_member['name'] ); ?></h1>

					<?php /* En caja normal y a mayor tamano: es la frase que de verdad
							 importa despues del nombre, y en versalitas se leia peor. */ ?>
					<p class="mt-4 text-xl md:text-2xl text-white/75 leading-snug"><?php echo wp_kses_post( $tt_member['role'] ); ?></p>

					<div class="mt-7 h-px bg-gradient-to-r from-accent/55 to-white/10"></div>

					<?php /* Todos los datos duros en una fila, en vez de apilados. */ ?>
					<dl class="mt-6 flex flex-wrap items-center gap-x-8 gap-y-3 text-sm">
						<?php if ( ! empty( $tt_member['from'] ) ) : ?>
						<div>
							<dt class="sr-only">From</dt>
							<dd class="text-white/45">From <span class="text-white/80"><?php echo esc_html( $tt_member['from']['city'] ); ?>, Venezuela</span></dd>
						</div>
						<?php endif; ?>
						<?php if ( $tt_total ) : ?>
						<div>
							<dt class="sr-only">Published</dt>
							<dd class="text-white/45"><span class="text-white/80"><?php echo esc_html( $tt_total ); ?></span> <?php echo 1 === $tt_total ? 'article' : 'articles'; ?></dd>
						</div>
						<?php endif; ?>
						<?php if ( ! empty( $tt_member['orcid'] ) ) : ?>
						<div>
							<dt class="sr-only">ORCID</dt>
							<dd class="text-white/45">ORCID <a href="<?php echo esc_url( $tt_member['orcid'] ); ?>" target="_blank" rel="noopener me" class="text-white/80 decoration-none hover:text-accent transition-colors"><?php echo esc_html( str_replace( 'https://orcid.org/', '', $tt_member['orcid'] ) ); ?></a></dd>
						</div>
						<?php endif; ?>
					</dl>

					<p class="mt-7 text-xl md:text-2xl text-white/70 leading-relaxed max-w-2xl"><?php echo wp_kses_post( $tt_member['lede'] ); ?></p>

					<?php /* Pildoras: en esta pagina los enlaces son la prueba de que la
							 persona es quien dice ser, no una nota al pie. */ ?>
					<div class="mt-8 flex flex-wrap items-center gap-3">
						<a href="<?php echo esc_url( $tt_member['linkedin'] ); ?>" target="_blank" rel="noopener me" class="inline-flex items-center gap-2 rounded-full bg-white/10 hover:bg-accent hover:text-slate-950 px-5 py-2.5 text-sm font-bold transition-colors decoration-none">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.35V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29ZM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14Zm1.78 13.02H3.55V9h3.57v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0Z"/></svg>
							LinkedIn
						</a>
						<?php if ( ! empty( $tt_member['orcid'] ) ) : ?>
						<a href="<?php echo esc_url( $tt_member['orcid'] ); ?>" target="_blank" rel="noopener me" class="inline-flex items-center gap-2 rounded-full border border-white/15 hover:border-accent hover:text-accent px-5 py-2.5 text-sm font-bold transition-colors decoration-none">ORCID</a>
						<?php endif; ?>
						<?php if ( $tt_member['site'] ) : ?>
						<a href="<?php echo esc_url( $tt_member['site'] ); ?>" target="_blank" rel="noopener me" class="inline-flex items-center gap-2 rounded-full border border-white/15 hover:border-accent hover:text-accent px-5 py-2.5 text-sm font-bold transition-colors decoration-none"><?php echo esc_html( preg_replace( '#^https?://#', '', $tt_member['site'] ) ); ?></a>
						<?php endif; ?>
					</div>

					<div class="mt-8 flex flex-wrap gap-2">
						<?php foreach ( $tt_member['tags'] as $tt_tag ) : ?>
						<span class="rounded-full bg-white/5 text-white/45 text-[10px] px-3 py-1.5 font-bold uppercase tracking-widest border border-white/10"><?php echo wp_kses_post( $tt_tag ); ?></span>
						<?php endforeach; ?>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Bio + what they do -->
	<section class="py-24 md:py-28 bg-white">
		<div class="mx-auto max-w-5xl px-6 grid lg:grid-cols-3 gap-16">

			<div class="lg:col-span-2">
				<h2 class="text-4xl md:text-5xl font-display text-slate-900 leading-[0.95]">
					Who <em class="italic text-sky-deep font-display"><?php echo esc_html( $tt_first ); ?></em> is
				</h2>
				<div class="mt-8 space-y-6 text-lg text-slate-500 leading-relaxed">
					<?php foreach ( $tt_member['bio'] as $tt_para ) : ?>
					<p><?php echo wp_kses_post( $tt_para ); ?></p>
					<?php endforeach; ?>
				</div>
			</div>

			<aside class="lg:col-span-1">
				<div class="rounded-[2rem] border border-slate-100 bg-slate-50/60 p-8">
					<h2 class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep mb-6">What <?php echo esc_html( $tt_first ); ?> does</h2>
					<ul class="space-y-4">
						<?php foreach ( $tt_member['does'] as $tt_item ) : ?>
						<li class="flex gap-3 text-sm text-slate-600 leading-relaxed">
							<span aria-hidden="true" class="text-sky-deep shrink-0">&mdash;</span>
							<span><?php echo wp_kses_post( $tt_item ); ?></span>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</aside>

		</div>
	</section>

	<?php if ( $tt_articles ) : ?>
	<!-- Published work. This is what keeps the page from being a headshot and a
	     paragraph: it grows by itself every time an article ships. -->
	<section class="py-24 md:py-28 bg-slate-950 text-white">
		<div class="mx-auto max-w-5xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Published</span>
			<h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">
				Articles by <em class="italic text-accent font-display"><?php echo esc_html( $tt_member['name'] ); ?></em>
			</h2>
			<p class="mt-6 text-lg text-white/50 max-w-2xl">
				<?php echo esc_html( $tt_total ); ?> <?php echo 1 === $tt_total ? 'piece' : 'pieces'; ?> on the TocToc blog.<?php if ( $tt_total > count( $tt_articles ) ) : ?> The <?php echo esc_html( count( $tt_articles ) ); ?> most recent are below.<?php endif; ?>
			</p>

			<ul class="mt-12 divide-y divide-white/10 border-y border-white/10">
				<?php foreach ( $tt_articles as $tt_post ) : ?>
				<li>
					<a href="<?php echo esc_url( get_permalink( $tt_post ) ); ?>" class="group flex flex-col sm:flex-row sm:items-baseline sm:justify-between gap-2 py-6 decoration-none">
						<span class="text-xl md:text-2xl font-display text-white group-hover:text-accent transition-colors"><?php echo esc_html( get_the_title( $tt_post ) ); ?></span>
						<time datetime="<?php echo esc_attr( get_the_date( 'c', $tt_post ) ); ?>" class="text-[11px] font-bold uppercase tracking-widest text-white/30 shrink-0"><?php echo esc_html( get_the_date( 'j M Y', $tt_post ) ); ?></time>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>

			<a href="<?php echo esc_url( toctoc_blog_url() ); ?>" class="mt-12 inline-flex items-center gap-2 text-sm font-bold text-accent hover:gap-3 transition-all decoration-none">
				All articles
				<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
			</a>
		</div>
	</section>
	<?php endif; ?>

	<!-- Back to the rest of the team -->
	<section class="py-24 md:py-28 bg-white">
		<div class="mx-auto max-w-5xl px-6">
			<h2 class="text-4xl md:text-5xl font-display text-slate-900 leading-[0.95]">The rest of <em class="italic text-sky-deep font-display">the team</em></h2>
			<div class="mt-12 grid sm:grid-cols-3 gap-6">
				<?php foreach ( toctoc_team_members() as $tt_other_slug => $tt_other ) : ?>
					<?php if ( $tt_other_slug === $tt_slug ) { continue; } ?>
					<a href="<?php echo esc_url( toctoc_team_url( $tt_other_slug ) ); ?>" class="group rounded-[2rem] border border-slate-100 bg-white p-6 shadow-soft hover:shadow-glass transition-all decoration-none flex items-center gap-4">
						<img src="<?php echo esc_url( $tt_other['photo'] ); ?>" alt="<?php echo esc_attr( $tt_other['name'] ); ?>" width="200" height="200" loading="lazy" decoding="async" class="w-14 h-14 rounded-full object-cover object-top shrink-0" />
						<span>
							<span class="block text-lg font-display text-slate-900 group-hover:text-sky-deep transition-colors"><?php echo esc_html( $tt_other['name'] ); ?></span>
							<span class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mt-1"><?php echo wp_kses_post( $tt_other['role'] ); ?></span>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
			<a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="mt-12 inline-flex items-center gap-2 text-sm font-bold text-sky-deep hover:gap-3 transition-all decoration-none">
				About TocToc Marketing
				<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
			</a>
		</div>
	</section>

	<?php toctoc_render_checker_cta(); ?>


</main>

<?php get_footer(); ?>
