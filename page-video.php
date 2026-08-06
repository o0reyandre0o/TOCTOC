<?php
/**
 * Template Name: Video Watch Page
 * Template Post Type: page
 *
 * One video, one page, video as the main content — which is exactly what Google
 * means by a "watch page" and the only thing that clears the "Video isn't on a
 * watch page" report. Removing the duplicate VideoObject markup in August was a
 * real fix for a different problem (three URLs claiming the same clip) but did
 * not touch this one: Google flags the <video> element itself, not the markup,
 * so a clip embedded among other content stays flagged however it is annotated.
 *
 * Assign this template to a page whose slug matches a key in toctoc_watch_videos().
 * The clip stays embedded on /our-work/ and the service pages as a poster that
 * links here, so the proof is still visible where it persuades without those
 * pages carrying a <video> element Google will report.
 */
get_header();

$vw_all  = toctoc_watch_videos();
$vw_slug = get_post_field( 'post_name', get_the_ID() );
$vw      = $vw_all[ $vw_slug ] ?? null;

if ( ! $vw ) :
	?>
	<main class="min-h-screen bg-background flex items-center justify-center px-6">
		<p class="text-slate-500">This page needs a slug matching one of the tracked videos.</p>
	</main>
	<?php
	get_footer();
	return;
endif;
?>

<main class="min-h-screen bg-slate-950 text-white">
	<section class="pt-36 pb-20 md:pt-44 md:pb-28">
		<div class="mx-auto max-w-4xl px-6">
			<?php toctoc_render_breadcrumbs( $vw['short'] ); ?>

			<h1 class="mt-2 text-3xl sm:text-4xl md:text-5xl font-display leading-[1.05] text-white max-w-3xl">
				<?php echo wp_kses_post( $vw['title'] ); ?>
			</h1>

			<?php /* The video sits immediately under the H1 and above everything else:
			         "main content" is a judgement Google makes from prominence, so
			         nothing competes with it for the top of the page. */ ?>
			<div class="mt-10 flex justify-center">
				<div class="relative aspect-[9/16] w-full max-w-[400px] overflow-hidden rounded-[2rem] bg-black shadow-glass ring-1 ring-white/10">
					<video class="w-full h-full object-cover" controls playsinline preload="metadata"
						poster="<?php echo esc_url( $vw['poster'] ); ?>">
						<source src="<?php echo esc_url( $vw['mp4'] ); ?>" type="video/mp4">
					</video>
				</div>
			</div>

			<div class="mt-12 max-w-2xl mx-auto">
				<p class="text-lg md:text-xl text-white/70 leading-relaxed"><?php echo wp_kses_post( $vw['desc'] ); ?></p>
				<p class="mt-6 text-sm text-white/40">
					Recorded <?php echo esc_html( $vw['recorded'] ); ?> &middot; TocToc Marketing, Grand Cayman
				</p>

				<?php if ( ! empty( $vw['cta'] ) ) : ?>
				<a href="<?php echo esc_url( home_url( $vw['cta'][0] ) ); ?>" class="group mt-10 inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
					<?php echo esc_html( $vw['cta'][1] ); ?>
					<span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 text-accent transition-transform group-hover:rotate-45">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
					</span>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php
	// This page — and only this page — declares itself the watch page for this clip.
	toctoc_render_video_schema( array( array(
		'name'         => wp_strip_all_tags( html_entity_decode( $vw['title'], ENT_QUOTES, 'UTF-8' ) ),
		'description'  => wp_strip_all_tags( html_entity_decode( $vw['desc'], ENT_QUOTES, 'UTF-8' ) ),
		'contentUrl'   => $vw['mp4'],
		'thumbnailUrl' => $vw['poster'],
		'uploadDate'   => $vw['uploaded'],
	) ) );
	?>
</main>

<?php get_footer(); ?>
