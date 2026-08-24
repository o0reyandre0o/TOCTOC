<?php
/**
 * Blog index — the page with slug "blog".
 *
 * Why this file exists (Aug 2026): the site had 16 URLs and no blog, so the
 * whole "[industry] website design cayman islands" long tail was uncontested.
 * AirVu Media published eight of those posts in nineteen days while we had
 * nowhere to answer from. This is the shelf; single.php is the article.
 *
 * Why a page template and not home.php: this install runs `show_on_front` =
 * "posts", so WordPress ignores `page_for_posts` entirely and home.php would
 * never be reached. Switching to a static front page would mean creating a
 * second page that renders the home — the exact duplicate that got /homepage/
 * indexed once already. A page template needs no global setting changed, and
 * it is the convention every other page here follows.
 */
get_header();

$blog_intro = get_the_excerpt();
if ( ! $blog_intro ) {
	$blog_intro = 'Field notes from building websites in the Cayman Islands — what actually makes a local business findable by Google, ChatGPT and Gemini, written from the sites we build and the data we can show.';
}

// Own query: the page's main loop is the page itself, not the posts.
// 'page' rather than 'paged' is what a static page receives from /blog/page/2/.
$tt_paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$tt_q     = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => $tt_paged,
) );
$tt_rest = array();
?>

<main class="min-h-screen bg-background text-foreground">

	<!-- Hero -->
	<section class="relative pt-40 md:pt-48 pb-16 md:pb-20 overflow-hidden bg-slate-950 text-white">
		<div class="absolute inset-0 z-0 opacity-40">
			<div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
			<div class="absolute -bottom-32 -right-24 w-96 h-96 bg-accent/40 blur-[120px] rounded-full"></div>
		</div>
		<div class="relative z-10 mx-auto max-w-5xl px-6">
			<?php toctoc_render_breadcrumbs( 'Blog' ); ?>
			<div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
				Field Notes &middot; Grand Cayman
			</div>
			<h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[92px] font-display leading-[0.95] text-white">
				The <em class="italic text-accent font-display">TocToc</em> Blog
			</h1>
			<p class="mt-8 text-xl text-white/70 leading-relaxed max-w-3xl">
				<?php echo esc_html( $blog_intro ); ?>
			</p>
		</div>
	</section>

	<!-- Posts -->
	<section class="py-16 md:py-24 bg-white">
		<div class="mx-auto max-w-6xl px-6">

			<?php if ( $tt_q->have_posts() ) : ?>

				<?php
				// The newest post gets the wide treatment; the rest go in the grid.
				$tt_first = true;
				?>
				<div class="grid gap-8 md:gap-10">
					<?php
					while ( $tt_q->have_posts() ) :
						$tt_q->the_post();
						$tt_cat  = get_the_category();
						$tt_cat  = ! empty( $tt_cat ) ? $tt_cat[0]->name : 'Article';
						$tt_read = toctoc_reading_time( get_the_content() );

						if ( $tt_first ) :
							$tt_first = false;
							?>
							<article class="group grid gap-8 lg:grid-cols-2 lg:items-center rounded-[2.5rem] border border-slate-100 bg-slate-50 p-6 md:p-8 shadow-soft">
								<a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-[1.75rem] bg-slate-200 aspect-[16/10] decoration-none">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'large', array( 'class' => 'h-full w-full object-cover transition-transform duration-700 group-hover:scale-105', 'loading' => 'eager' ) ); ?>
									<?php endif; ?>
								</a>
								<div>
									<div class="flex flex-wrap items-center gap-3 text-[11px] font-bold uppercase tracking-widest">
										<span class="rounded-full bg-accent px-3 py-1 text-slate-950"><?php echo esc_html( $tt_cat ); ?></span>
										<span class="text-slate-400"><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></span>
										<span class="text-slate-400"><?php echo esc_html( $tt_read ); ?> min read</span>
									</div>
									<h2 class="mt-6 text-4xl md:text-5xl font-display leading-[1.02] text-slate-900">
										<a href="<?php the_permalink(); ?>" class="decoration-none hover:text-sky-deep transition-colors"><?php the_title(); ?></a>
									</h2>
									<p class="mt-5 text-lg text-slate-600 leading-relaxed"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 38 ) ); ?></p>
									<a href="<?php the_permalink(); ?>" class="group/link mt-8 inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-6 pr-2 py-2 text-base font-bold shadow-pill transition-all hover:scale-105 decoration-none">
										Read the article
										<span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-accent text-slate-950 transition-transform group-hover/link:rotate-45">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
										</span>
									</a>
								</div>
							</article>
							<?php
						else :
							// Collect the rest so they can share one grid below.
							$tt_rest[] = array(
								'title' => get_the_title(),
								'link'  => get_permalink(),
								'exc'   => wp_trim_words( get_the_excerpt(), 24 ),
								'date'  => get_the_date( 'j M Y' ),
								'cat'   => $tt_cat,
								'read'  => $tt_read,
								'thumb' => get_the_post_thumbnail( null, 'medium_large', array( 'class' => 'h-full w-full object-cover transition-transform duration-700 group-hover:scale-105', 'loading' => 'lazy' ) ),
							);
						endif;
					endwhile;
					?>
				</div>

				<?php if ( ! empty( $tt_rest ) ) : ?>
					<div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
						<?php foreach ( $tt_rest as $tt_p ) : ?>
							<article class="group flex flex-col rounded-[2rem] border border-slate-100 bg-white shadow-soft overflow-hidden">
								<a href="<?php echo esc_url( $tt_p['link'] ); ?>" class="block overflow-hidden bg-slate-200 aspect-[16/10] decoration-none">
									<?php echo $tt_p['thumb']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
								</a>
								<div class="flex flex-1 flex-col p-6">
									<div class="flex flex-wrap items-center gap-2 text-[10px] font-bold uppercase tracking-widest">
										<span class="rounded-full bg-sky-pale px-2.5 py-1 text-sky-deep"><?php echo esc_html( $tt_p['cat'] ); ?></span>
										<span class="text-slate-400"><?php echo esc_html( $tt_p['read'] ); ?> min</span>
									</div>
									<h3 class="mt-4 text-2xl font-display leading-tight text-slate-900">
										<a href="<?php echo esc_url( $tt_p['link'] ); ?>" class="decoration-none hover:text-sky-deep transition-colors"><?php echo esc_html( $tt_p['title'] ); ?></a>
									</h3>
									<p class="mt-3 text-sm text-slate-500 leading-relaxed"><?php echo esc_html( $tt_p['exc'] ); ?></p>
									<span class="mt-auto pt-5 text-[11px] font-bold uppercase tracking-widest text-slate-400"><?php echo esc_html( $tt_p['date'] ); ?></span>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php
				$tt_pag = paginate_links( array( 'type' => 'array', 'prev_text' => 'Previous', 'next_text' => 'Next' ) );
				if ( $tt_pag ) :
					?>
					<nav aria-label="Blog pages" class="mt-16 flex flex-wrap justify-center gap-2">
						<?php foreach ( $tt_pag as $tt_link ) : ?>
							<span class="[&>*]:inline-flex [&>*]:h-11 [&>*]:min-w-[2.75rem] [&>*]:items-center [&>*]:justify-center [&>*]:rounded-full [&>*]:border [&>*]:border-slate-200 [&>*]:px-4 [&>*]:text-sm [&>*]:font-bold [&>*]:decoration-none [&>a:hover]:border-sky-deep [&>a:hover]:text-sky-deep [&>.current]:bg-slate-950 [&>.current]:text-white [&>.current]:border-slate-950">
								<?php echo $tt_link; // phpcs:ignore WordPress.Security.EscapeOutput ?>
							</span>
						<?php endforeach; ?>
					</nav>
				<?php endif; ?>

			<?php else : ?>

				<div class="mx-auto max-w-2xl rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center shadow-soft">
					<h2 class="text-3xl font-display text-slate-900">Nothing published yet</h2>
					<p class="mt-4 text-slate-600">The first article is on its way. In the meantime, the <a href="<?php echo esc_url( home_url( '/digital-marketing-cayman-islands-guide/' ) ); ?>" class="font-bold text-sky-deep">2026 Cayman digital marketing guide</a> covers the ground.</p>
				</div>

			<?php endif; ?>

		</div>
	</section>

	<?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
