<?php
/**
 * Single article.
 *
 * The body comes from the WordPress editor, so its styling cannot be done with
 * Tailwind utilities — the classes would have to live inside the saved HTML.
 * `.tt-prose` in src/tailwind.css styles the editor output instead: one place
 * to change how every article reads.
 *
 * Two things are generated from the content rather than typed by the author, so
 * they can never drift out of sync with it: the reading time, and the table of
 * contents (built from the H2s, which also get the ids the TOC links to).
 */
get_header();

while ( have_posts() ) :
	the_post();

	$tt_cats     = get_the_category();
	$tt_cat      = ! empty( $tt_cats ) ? $tt_cats[0]->name : 'Article';
	$tt_content  = apply_filters( 'the_content', get_the_content() );
	$tt_toc      = toctoc_extract_toc( $tt_content );   // also injects the ids
	$tt_content  = $tt_toc['html'];
	$tt_read     = toctoc_reading_time( get_the_content() );
	$tt_author   = get_the_author_meta( 'display_name' ) ?: 'TocToc Marketing';
	$tt_excerpt  = wp_strip_all_tags( get_the_excerpt() );

	// Map the WordPress author onto the Person entities already declared in
	// header.php, so an article credits the same node the About page does
	// instead of minting a second identity for the same human.
	$tt_author_ids = array(
		'Daniel Garrido'  => 'https://toctoc.ky/#daniel-garrido',
		'Andre Gutierrez' => 'https://www.linkedin.com/in/andre-g-9b373a97/#person',
		'Nora Bravo'      => 'https://toctoc.ky/#nora-bravo',
	);
	$tt_author_id  = $tt_author_ids[ $tt_author ] ?? '';
	?>

<main class="min-h-screen bg-background text-foreground">

	<!-- Hero -->
	<article>
		<header class="relative pt-40 md:pt-48 pb-14 md:pb-20 overflow-hidden bg-slate-950 text-white">
			<div class="absolute inset-0 z-0 opacity-40">
				<div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
				<div class="absolute -bottom-32 -right-24 w-96 h-96 bg-accent/40 blur-[120px] rounded-full"></div>
			</div>
			<div class="relative z-10 mx-auto max-w-4xl px-6">
				<?php toctoc_render_breadcrumbs( $tt_cat ); ?>
				<div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
					<?php echo esc_html( $tt_cat ); ?>
				</div>
				<h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-[76px] font-display leading-[0.98] text-white">
					<?php the_title(); ?>
				</h1>
				<?php if ( $tt_excerpt ) : ?>
					<p class="mt-8 text-xl text-white/70 leading-relaxed max-w-3xl"><?php echo esc_html( $tt_excerpt ); ?></p>
				<?php endif; ?>

				<div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-3 text-[11px] font-bold uppercase tracking-widest text-white/50">
					<span class="text-white/80"><?php echo esc_html( $tt_author ); ?></span>
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></time>
					<span><?php echo esc_html( $tt_read ); ?> min read</span>
					<?php if ( get_the_modified_date( 'Ymd' ) !== get_the_date( 'Ymd' ) ) : ?>
						<span class="text-accent">Updated <?php echo esc_html( get_the_modified_date( 'j M Y' ) ); ?></span>
					<?php endif; ?>
				</div>
			</div>
		</header>

		<?php
		/*
		 * The featured image is deliberately NOT rendered here. It is a cover:
		 * it identifies the article in the blog index and in link previews, and
		 * inside the article itself it would only push the first paragraph
		 * below the fold to repeat what the headline already said. It is still
		 * declared in the BlogPosting schema at the bottom of this file, so
		 * social platforms and search engines get it.
		 */
		?>

		<!-- Body -->
		<div class="bg-white pt-16 md:pt-20 pb-16 md:pb-24">
			<div class="mx-auto max-w-6xl px-6">
				<div class="grid gap-12 lg:grid-cols-[minmax(0,1fr)_16rem] lg:gap-16">

					<div class="tt-prose min-w-0">
						<?php echo $tt_content; // phpcs:ignore WordPress.Security.EscapeOutput ?>
					</div>

					<?php if ( ! empty( $tt_toc['items'] ) ) : ?>
						<aside class="order-first lg:order-none">
							<div class="lg:sticky lg:top-28 rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-soft">
								<p class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep">On this page</p>
								<ol class="mt-4 space-y-3">
									<?php foreach ( $tt_toc['items'] as $tt_i => $tt_item ) : ?>
										<li class="flex gap-3 text-sm leading-snug">
											<span class="shrink-0 font-bold text-slate-300 tabular-nums"><?php echo esc_html( sprintf( '%02d', $tt_i + 1 ) ); ?></span>
											<a href="#<?php echo esc_attr( $tt_item['id'] ); ?>" class="text-slate-600 hover:text-sky-deep transition-colors decoration-none"><?php echo esc_html( $tt_item['text'] ); ?></a>
										</li>
									<?php endforeach; ?>
								</ol>
							</div>
						</aside>
					<?php endif; ?>

				</div>
			</div>
		</div>

		<!-- Author -->
		<div class="pb-16 md:pb-24 bg-white">
			<div class="mx-auto max-w-4xl px-6">
				<div class="flex flex-col gap-6 sm:flex-row sm:items-center rounded-[2rem] border border-slate-100 bg-slate-50 p-8 shadow-soft">
					<div class="shrink-0">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 88, '', esc_attr( $tt_author ), array( 'class' => 'rounded-full' ) ); ?>
					</div>
					<div>
						<p class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep">Written by</p>
						<p class="mt-2 text-2xl font-display text-slate-900"><?php echo esc_html( $tt_author ); ?></p>
						<p class="mt-2 text-sm text-slate-500 leading-relaxed">
							<?php
							$tt_bio = get_the_author_meta( 'description' );
							echo esc_html( $tt_bio ? $tt_bio : 'TocToc Marketing builds websites in the Cayman Islands that Google and AI assistants can read, understand and recommend.' );
							?>
						</p>
						<a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="mt-4 inline-block text-sm font-bold text-sky-deep decoration-none hover:underline">Meet the team &rarr;</a>
					</div>
				</div>
			</div>
		</div>

	</article>

	<?php
	// Related: same category first, newest, never the current post.
	$tt_related = get_posts( array(
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'category__in'   => wp_list_pluck( $tt_cats, 'term_id' ),
		'no_found_rows'  => true,
	) );
	if ( count( $tt_related ) < 3 ) {
		$tt_related = get_posts( array(
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'no_found_rows'  => true,
		) );
	}
	if ( $tt_related ) :
		?>
		<section class="py-16 md:py-24 bg-slate-50">
			<div class="mx-auto max-w-6xl px-6">
				<h2 class="text-4xl md:text-5xl font-display text-slate-900 leading-[0.98]">Keep <em class="italic text-sky-deep font-display">reading</em></h2>
				<div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
					<?php foreach ( $tt_related as $tt_r ) : ?>
						<article class="group flex flex-col rounded-[2rem] border border-slate-100 bg-white shadow-soft overflow-hidden">
							<a href="<?php echo esc_url( get_permalink( $tt_r ) ); ?>" class="block overflow-hidden bg-slate-200 aspect-[16/10] decoration-none">
								<?php echo get_the_post_thumbnail( $tt_r, 'medium_large', array( 'class' => 'h-full w-full object-cover transition-transform duration-700 group-hover:scale-105', 'loading' => 'lazy' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
							</a>
							<div class="flex flex-1 flex-col p-6">
								<h3 class="text-xl font-display leading-tight text-slate-900">
									<a href="<?php echo esc_url( get_permalink( $tt_r ) ); ?>" class="decoration-none hover:text-sky-deep transition-colors"><?php echo esc_html( get_the_title( $tt_r ) ); ?></a>
								</h3>
								<span class="mt-auto pt-5 text-[11px] font-bold uppercase tracking-widest text-slate-400"><?php echo esc_html( get_the_date( 'j M Y', $tt_r ) ); ?></span>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="mt-12 inline-flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-sky-deep decoration-none hover:underline">All articles &rarr;</a>
			</div>
		</section>
	<?php endif; ?>

	<?php toctoc_render_checker_cta(); ?>

</main>

<script type="application/ld+json">
<?php
$tt_img = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'full' ) : '';
$tt_ld  = array(
	'@context'         => 'https://schema.org',
	'@type'            => 'BlogPosting',
	'@id'              => get_permalink() . '#article',
	'mainEntityOfPage' => array( '@type' => 'WebPage', '@id' => get_permalink() ),
	'headline'         => wp_strip_all_tags( get_the_title() ),
	'description'      => $tt_excerpt,
	'datePublished'    => get_the_date( 'c' ),
	'dateModified'     => get_the_modified_date( 'c' ),
	'inLanguage'       => 'en-US',
	'wordCount'        => str_word_count( wp_strip_all_tags( get_the_content() ) ),
	'isPartOf'         => array( '@id' => 'https://toctoc.ky/#website' ),
	'publisher'        => array( '@id' => 'https://toctoc.ky/#organization' ),
	'author'           => $tt_author_id
		? array( '@id' => $tt_author_id )
		: array( '@type' => 'Organization', '@id' => 'https://toctoc.ky/#organization' ),
);
if ( $tt_img ) {
	$tt_ld['image'] = $tt_img;
}
if ( ! empty( $tt_cats ) ) {
	$tt_ld['articleSection'] = wp_list_pluck( $tt_cats, 'name' );
}
echo wp_json_encode( $tt_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
?>
</script>

<?php
endwhile;

get_footer();
