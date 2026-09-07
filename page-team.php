<?php
/**
 * Template Name: Team Index
 * Template Post Type: page
 *
 * The parent page of the four profiles. Slug-matched (page-team.php), so it
 * needs no template chosen in wp-admin either.
 *
 * @package TocToc
 */

if ( ! function_exists( 'toctoc_team_members' ) ) {
	// inc/team.php not on the server yet — render the page's own content rather
	// than fatal. Same guard, same reason, as the four profile shims.
	get_header();
	echo '<main class="min-h-screen bg-background text-foreground pt-48 pb-32"><div class="mx-auto max-w-3xl px-6">';
	while ( have_posts() ) { the_post(); the_content(); }
	echo '</div></main>';
	get_footer();
	return;
}

get_header();

$tt_team = toctoc_team_members();

// No JSON-LD here either: the CollectionPage node is emitted inside
// header.php's @graph by toctoc_team_extra_schema_json(). One block per page.
?>

<main class="min-h-screen bg-background text-foreground">

	<section class="relative pt-48 pb-24 overflow-hidden bg-slate-950 text-white">
		<div class="absolute inset-0 z-0 opacity-40">
			<div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-sky-deep blur-[120px] rounded-full"></div>
		</div>
		<div class="relative z-10 mx-auto max-w-5xl px-6">
			<?php toctoc_render_breadcrumbs( 'Team' ); ?>
			<div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
				The people
			</div>
			<h1 class="text-5xl sm:text-6xl md:text-7xl font-display leading-[0.95] text-white">
				Four people, and <em class="italic text-accent font-display">what each one does.</em>
			</h1>
			<p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
				TocToc Marketing is a small team in George Town, Grand Cayman. Nobody here is a department &mdash; every project is scoped, designed, built and published by the four people on this page.
			</p>
		</div>
	</section>

	<section class="py-24 md:py-28 bg-white">
		<div class="mx-auto max-w-5xl px-6">
			<div class="grid gap-8 md:grid-cols-2">
				<?php foreach ( $tt_team as $tt_slug => $tt_member ) : ?>
				<a href="<?php echo esc_url( toctoc_team_url( $tt_slug ) ); ?>" class="group rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft hover:shadow-glass transition-all decoration-none block text-left">
					<div class="flex items-center gap-5 mb-8">
						<img src="<?php echo esc_url( $tt_member['photo'] ); ?>"
							 alt="<?php echo esc_attr( $tt_member['name'] . ', ' . $tt_member['role_plain'] . ' at TocToc Marketing' ); ?>"
							 width="300" height="300" loading="lazy" decoding="async"
							 class="w-24 h-24 rounded-full object-cover object-top shrink-0" />
						<div>
							<h2 class="text-3xl font-display text-slate-900 group-hover:text-sky-deep transition-colors"><?php echo esc_html( $tt_member['name'] ); ?></h2>
							<p class="text-xs font-bold text-sky-deep uppercase tracking-[0.2em] mt-1"><?php echo wp_kses_post( $tt_member['role'] ); ?></p>
						</div>
					</div>
					<p class="text-sm leading-relaxed text-slate-500 mb-6"><?php echo wp_kses_post( $tt_member['lede'] ); ?></p>
					<span class="inline-flex items-center gap-2 text-sm font-bold text-sky-deep group-hover:gap-3 transition-all">
						Profile
						<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
					</span>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php toctoc_render_checker_cta(); ?>


</main>

<?php get_footer(); ?>
