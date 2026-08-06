<?php
/**
 * Template Name: Case Study — TintXKing
 * Template Post Type: page
 *
 * Create a WordPress page with slug "case-study-tintxking-orlando".
 *
 * Split out of /our-work/ on 2026-08-05 so each case study is a URL of its own:
 * one page carrying three cases competes with itself and can be sent to nobody
 * in particular. TintXKing goes first because it is the only one of the three
 * whose Search Console numbers show genuine growth — clicks +62%, impressions
 * +63% and average position improving from 14.9 to 11.1 over the same 90 days,
 * with 19-81 and Uncle Liu both down on tourist-season decline.
 *
 * Every figure on this page is read from Search Console for
 * sc-domain:tintxking.com, 90 days to 2026-08-02 against the previous 90. The
 * low CTR is stated rather than hidden: a case study that only reports the
 * flattering half is the kind a prospect can check and stop believing.
 */
get_header();

// Measured, not estimated. Update these together with the date below.
$cs_period   = '90 days to 2 August 2026, against the previous 90';
$cs_metrics  = array(
	array( 'Clicks from Google',  '225',  '364',  '+62%' ),
	array( 'Search impressions',  '32,700', '53,358', '+63%' ),
	array( 'Average position',    '14.9', '11.1', '3.8 places' ),
);

// Discovery queries — people who did not know the brand existed.
$cs_queries = array(
	array( 'window tinting near me',      '9.1', '2,955' ),
	array( 'window tint orlando',         '7.0', '1,372' ),
	array( 'window tinting orlando',      '9.8', '1,169' ),
	array( 'tint near me',                '6.6', '1,050' ),
	array( 'car window tinting near me',  '9.0', '870' ),
	array( 'tint x',                      '9.7', '798' ),
	array( 'car tint near me',            '6.2', '467' ),
	array( 'orlando tint',                '9.0', '391' ),
	array( 'window tinting orlando prices', '7.0', '316' ),
	array( 'ceramic tint near me',        '5.2', '252' ),
);

$cs_delivered = array(
	'Built a brand-new, conversion-focused website structure.',
	'Updated, verified, and deeply improved their Google Maps profile.',
	'Overhauled, aligned, and optimized their active social media channels.',
	'Weekly updates across every platform, so their footprint stays active, verified and authoritative for search engines.',
);

$cs_shots = array(
	array( 'label' => 'TintXKing website', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/descarga.webp', 'w' => 396, 'h' => 800 ),
	array( 'label' => 'Google Maps listing', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-094748.webp', 'w' => 502, 'h' => 1198 ),
);
?>

<main class="min-h-screen bg-background text-foreground">

	<!-- Hero -->
	<section class="relative overflow-hidden bg-slate-950 pt-40 pb-24 md:pt-48 md:pb-32">
		<div aria-hidden="true" class="pointer-events-none absolute -top-24 -right-24 w-[32rem] h-[32rem] rounded-full bg-accent/10 blur-3xl"></div>
		<div class="relative z-10 mx-auto max-w-6xl px-6">
			<?php toctoc_render_breadcrumbs( 'TintXKing Case Study' ); ?>
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Case Study &middot; Window Tinting &middot; Orlando</span>
			<h1 class="mt-6 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-display leading-[0.98] text-white max-w-4xl">
				From Invisible to Page One: <em class="italic text-accent font-display">63% More Searches in 90 Days</em>
			</h1>
			<p class="mt-8 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
				How TintXKing started showing up when someone in Orlando searches &ldquo;window tinting near me&rdquo; &mdash; and stopped depending on ads to be found.
			</p>

			<!-- Headline numbers -->
			<div class="mt-14 grid gap-5 sm:grid-cols-3 max-w-3xl">
				<?php foreach ( array(
					array( '+62%', 'more clicks from Google' ),
					array( '+63%', 'more search impressions' ),
					array( '11.1', 'average position, from 14.9' ),
				) as $cs_h ) : ?>
				<div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-6">
					<span class="block text-4xl md:text-5xl font-display text-accent leading-none"><?php echo esc_html( $cs_h[0] ); ?></span>
					<span class="mt-3 block text-[11px] font-bold uppercase tracking-[0.18em] text-white/50 leading-snug"><?php echo esc_html( $cs_h[1] ); ?></span>
				</div>
				<?php endforeach; ?>
			</div>
			<p class="mt-6 text-sm text-white/40"><?php echo esc_html( $cs_period ); ?>. Source: Google Search Console.</p>
		</div>
	</section>

	<!-- The problem -->
	<section class="py-20 md:py-28 bg-white">
		<div class="mx-auto max-w-4xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">The problem</span>
			<div class="mt-8 space-y-6 text-xl md:text-2xl leading-[1.4] text-slate-950 font-display">
				<p>TintXKing was buying every customer. Ads brought traffic, traffic brought sales, and the moment the ad budget paused, so did the phone.</p>
				<p class="text-sky-deep italic">Nobody was finding them by accident.</p>
				<p>In Orlando, a driver who wants their windows tinted opens Google and types &ldquo;window tinting near me&rdquo;. If you are not on that first page, that customer belongs to someone else &mdash; and you pay again to reach the next one.</p>
			</div>
		</div>
	</section>

	<!-- What we did -->
	<section class="py-20 md:py-28 bg-slate-50">
		<div class="mx-auto max-w-6xl px-6">
			<div class="max-w-3xl">
				<span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">What we built</span>
				<h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">A footprint that earns the click</h2>
				<p class="mt-8 text-lg text-slate-600 leading-relaxed">
					Ads rent attention. A verified, consistent local presence owns it &mdash; and it is what convinces both a searcher and a search engine that the business is real.
				</p>
			</div>
			<div class="mt-14 grid gap-6 md:grid-cols-2">
				<?php foreach ( $cs_delivered as $cs_i => $cs_d ) : ?>
				<div class="rounded-[2rem] border border-slate-100 bg-white p-8 shadow-soft">
					<span class="font-display text-3xl text-sky-deep"><?php echo esc_html( str_pad( (string) ( $cs_i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<p class="mt-4 text-base leading-relaxed text-slate-600"><?php echo esc_html( $cs_d ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- The numbers -->
	<section class="py-20 md:py-28 bg-white">
		<div class="mx-auto max-w-5xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">The numbers</span>
			<h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Every metric moved the same way</h2>
			<p class="mt-6 text-lg text-slate-600 leading-relaxed max-w-3xl">
				Clicks, impressions and ranking all improved together. That matters: visibility that grows while ranking slips usually means appearing for searches nobody cares about.
			</p>

			<div class="mt-12 overflow-x-auto">
				<table class="w-full text-left border-collapse">
					<thead>
						<tr class="border-b-2 border-slate-900">
							<th class="py-4 pr-4 text-sm font-bold uppercase tracking-wider text-slate-900">Metric</th>
							<th class="py-4 px-4 text-sm font-bold uppercase tracking-wider text-slate-500">Previous 90 days</th>
							<th class="py-4 px-4 text-sm font-bold uppercase tracking-wider text-slate-900">Last 90 days</th>
							<th class="py-4 pl-4 text-sm font-bold uppercase tracking-wider text-sky-deep">Change</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $cs_metrics as $cs_m ) : ?>
						<tr class="border-b border-slate-100">
							<td class="py-5 pr-4 font-display text-xl text-slate-900"><?php echo esc_html( $cs_m[0] ); ?></td>
							<td class="py-5 px-4 text-slate-500 tabular-nums"><?php echo esc_html( $cs_m[1] ); ?></td>
							<td class="py-5 px-4 text-slate-900 font-bold tabular-nums"><?php echo esc_html( $cs_m[2] ); ?></td>
							<td class="py-5 pl-4 font-bold text-sky-deep tabular-nums"><?php echo esc_html( $cs_m[3] ); ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<h3 class="mt-20 text-3xl md:text-4xl font-display text-slate-900">Found by people who had never heard of them</h3>
			<p class="mt-5 text-lg text-slate-600 leading-relaxed max-w-3xl">
				Only 28 of those clicks came from someone searching the brand name. Everything below is a stranger with a problem, finding TintXKing while looking for a solution.
			</p>

			<div class="mt-10 overflow-x-auto">
				<table class="w-full text-left border-collapse">
					<thead>
						<tr class="border-b-2 border-slate-900">
							<th class="py-4 pr-4 text-sm font-bold uppercase tracking-wider text-slate-900">Search</th>
							<th class="py-4 px-4 text-sm font-bold uppercase tracking-wider text-slate-500">Position</th>
							<th class="py-4 pl-4 text-sm font-bold uppercase tracking-wider text-slate-500">Times shown</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $cs_queries as $cs_q ) : ?>
						<tr class="border-b border-slate-100">
							<td class="py-4 pr-4 text-slate-900">&ldquo;<?php echo esc_html( $cs_q[0] ); ?>&rdquo;</td>
							<td class="py-4 px-4 font-bold text-slate-900 tabular-nums"><?php echo esc_html( $cs_q[1] ); ?></td>
							<td class="py-4 pl-4 text-slate-500 tabular-nums"><?php echo esc_html( $cs_q[2] ); ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<?php /* Stated, not buried. A case study that reports only the flattering
			         half is one a prospect can check and stop believing — and this
			         number is also the honest description of what comes next. */ ?>
			<div class="mt-14 rounded-[2rem] border-l-4 border-sky-deep bg-slate-50 p-8 md:p-10">
				<h4 class="text-2xl font-display text-slate-900">What we have not fixed yet</h4>
				<p class="mt-4 text-lg text-slate-600 leading-relaxed">
					Those 53,358 impressions produced 364 clicks &mdash; a click-through rate of 0.68%. That is what an average position of 11 looks like: shown to plenty of people, mostly just below where they stop scrolling. Moving from page two to the top five is the next piece of work, and it is worth more than any of the growth above.
				</p>
			</div>
		</div>
	</section>

	<!-- AI proof -->
	<section class="py-20 md:py-28 bg-slate-950 text-white">
		<div class="mx-auto max-w-6xl px-6">
			<div class="max-w-3xl">
				<span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Proof, not promises</span>
				<h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">And when the question goes to an AI</h2>
				<p class="mt-8 text-lg text-white/60 leading-relaxed">
					Google is no longer the only place people ask. Here is TintXKing coming up in ChatGPT and Gemini &mdash; a recording, not a claim.
				</p>
			</div>

			<?php
			/*
			 * Three identical 9:16 frames, the same treatment /our-work/ uses.
			 * The video and the two screenshots have different native ratios
			 * (396x800 and 502x1198), so giving each its own sizing left them at
			 * mismatched heights and the row read as two separate blocks.
			 * A fixed frame with object-cover object-top keeps the tops aligned,
			 * which is where the useful part of a phone screenshot lives.
			 */
			?>
			<div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3 justify-items-center lg:justify-items-start">

				<figure class="flex flex-col items-center lg:items-start w-full">
					<div class="relative aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] bg-black shadow-glass ring-1 ring-white/10">
						<?php /* No VideoObject markup here: /our-work/ is the declared watch
						         page for these clips, and claiming a second one is what failed
						         Search Console's video validation in July. */ ?>
						<video class="w-full h-full object-cover" controls preload="none" data-ttlazy playsinline
							poster="https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-tintxking-cover.webp">
							<source src="https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-tintxking.mp4" type="video/mp4">
						</video>
						<div class="pointer-events-none absolute inset-x-0 top-0 z-10 px-4 pt-4 pb-10 bg-gradient-to-b from-black/85 via-black/45 to-transparent">
							<span class="block text-left text-sm font-bold text-white leading-snug drop-shadow-md">How TintXKing shows up in ChatGPT &amp; Gemini &#128663;</span>
						</div>
					</div>
					<figcaption class="mt-4 max-w-[280px] text-[11px] font-bold uppercase tracking-widest text-white/40">ChatGPT &amp; Gemini demo</figcaption>
				</figure>

				<?php foreach ( $cs_shots as $cs_s ) : ?>
				<figure class="flex flex-col items-center lg:items-start w-full">
					<div class="aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] bg-white/5 ring-1 ring-white/10 shadow-glass">
						<img src="<?php echo esc_url( $cs_s['img'] ); ?>" alt="<?php echo esc_attr( $cs_s['label'] . ' — TintXKing, by TocToc Marketing' ); ?>" width="<?php echo (int) $cs_s['w']; ?>" height="<?php echo (int) $cs_s['h']; ?>" loading="lazy" decoding="async" class="w-full h-full object-cover object-top" />
					</div>
					<figcaption class="mt-4 max-w-[280px] text-[11px] font-bold uppercase tracking-widest text-white/40"><?php echo esc_html( $cs_s['label'] ); ?></figcaption>
				</figure>
				<?php endforeach; ?>

			</div>
		</div>
	</section>

	<!-- What it means -->
	<section class="py-20 md:py-28 bg-white">
		<div class="mx-auto max-w-4xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">What this means for you</span>
			<h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Ads rent customers. Search earns them.</h2>
			<div class="mt-8 space-y-6 text-lg leading-relaxed text-slate-600">
				<p>
					TintXKing did not stop advertising. What changed is that they no longer depend on it to be found: 336 of those 364 clicks came from people who had never heard the name, searching for a service rather than a brand.
				</p>
				<p>
					That is the difference between a cost that repeats every month and an asset that compounds. And it is the same work whether the searcher is in Orlando or George Town &mdash; a verified footprint, a fast site, and information consistent enough that both Google and an AI assistant will vouch for you.
				</p>
			</div>

			<div class="mt-12 flex flex-wrap gap-4">
				<a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/' ) ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
					See how we do it
					<span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
					</span>
				</a>
				<a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="inline-flex items-center rounded-full border border-slate-200 px-8 py-4 text-lg font-bold text-slate-900 hover:bg-slate-50 transition-colors decoration-none">
					More case studies
				</a>
			</div>
		</div>
	</section>

	<?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
