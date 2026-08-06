<?php
/**
 * Template Name: Case Study — Prime Group
 * Template Post Type: page
 *
 * Create a WordPress page with slug "case-study-prime-group-cayman".
 *
 * The cleanest of the three cases to argue, because only one variable moved.
 * TocToc built primegroup.ky from scratch and did not touch the Google Business
 * Profile, the social accounts or any paid campaign — so the year-on-year change
 * is attributable to the site itself rather than to a bundle of channels. Every
 * figure comes from Search Console for the same months a year apart, which is
 * the only comparison that survives a seasonal market.
 */
get_header();

$pg_metrics = array(
	array( 'Clicks from Google', '75',    '304',   '+305%' ),
	array( 'Search impressions', '1,275', '2,839', '+123%' ),
	array( 'Click-through rate', '5.88%', '10.71%', 'nearly double' ),
	array( 'Average position',   '17.3',  '9.1',   '8.2 places' ),
);

// Recruitment queries — the ones bringing people who were not looking for the
// company by name.
$pg_queries = array(
	array( 'hospitality jobs in cayman islands',            '9.2',  '188' ),
	array( 'cayman islands hospitality jobs',               '11.1', '58' ),
	array( 'hospitality jobs cayman islands',               '9.6',  '58' ),
	array( 'restaurant jobs in cayman islands',             '13.0', '44' ),
	array( 'restaurant jobs in cayman islands for foreigners', '8.7', '29' ),
	array( 'cayman islands hotel jobs',                     '23.6', '7' ),
	array( 'chef jobs in cayman islands',                   '7.0',  '3' ),
);

$pg_countries = array(
	array( 'Cayman Islands', '132' ),
	array( 'United States',  '26' ),
	array( 'Canada',         '22' ),
	array( 'United Kingdom', '15' ),
	array( 'Jamaica',        '12' ),
	array( 'Kenya',          '12' ),
);
?>

<main class="min-h-screen bg-background text-foreground">

	<!-- Hero -->
	<section class="relative overflow-hidden bg-slate-950 pt-40 pb-24 md:pt-48 md:pb-32">
		<div aria-hidden="true" class="pointer-events-none absolute -top-24 -right-24 w-[32rem] h-[32rem] rounded-full bg-accent/10 blur-3xl"></div>
		<div class="relative z-10 mx-auto max-w-6xl px-6">
			<?php toctoc_render_breadcrumbs( 'Prime Group Case Study' ); ?>
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Case Study &middot; Hospitality Group &middot; Grand Cayman</span>
			<h1 class="mt-6 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-display leading-[0.98] text-white max-w-4xl">
				The Website That Started <em class="italic text-accent font-display">Recruiting</em>
			</h1>
			<p class="mt-8 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
				Chefs in Jamaica and Kenya now find Prime Group while searching for hospitality work in Cayman. We built the site; we changed nothing else.
			</p>

			<div class="mt-14 grid gap-5 sm:grid-cols-3 max-w-3xl">
				<?php foreach ( array(
					array( '+305%', 'more clicks than the same months last year' ),
					array( '9.1',   'average position, from 17.3' ),
					array( '10.7%', 'click-through rate, up from 5.9%' ),
				) as $pg_h ) : ?>
				<div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-6">
					<span class="block text-4xl md:text-5xl font-display text-accent leading-none"><?php echo esc_html( $pg_h[0] ); ?></span>
					<span class="mt-3 block text-[11px] font-bold uppercase tracking-[0.18em] text-white/50 leading-snug"><?php echo esc_html( $pg_h[1] ); ?></span>
				</div>
				<?php endforeach; ?>
			</div>
			<p class="mt-6 text-sm text-white/40">May&ndash;August 2026 against the same months of 2025. Source: Google Search Console.</p>
		</div>
	</section>

	<!-- Only one thing changed -->
	<section class="py-20 md:py-28 bg-white">
		<div class="mx-auto max-w-4xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">What we did &mdash; and what we did not</span>
			<h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Only one thing changed</h2>
			<div class="mt-8 space-y-6 text-lg leading-relaxed text-slate-600">
				<p>
					We built primegroup.ky from scratch &mdash; a custom site with no page builder, with the SEO written into the theme rather than bolted on as a plugin.
				</p>
				<p>
					<?php /* Stating the scope is the whole argument. Most case studies move
					         five channels at once and then claim credit for the total; here
					         there is only one variable, so the attribution is honest. */ ?>
					And then nothing else. <strong class="font-semibold text-slate-900">We do not manage their Google Business Profile. We do not run their social accounts. We have never run a paid campaign for them.</strong> No listings work, no review campaign, no ads.
				</p>
				<p>
					That matters more than it sounds. Most case studies change five things at once and take credit for the total. Here there was one variable, so the numbers below belong to the website and nothing else.
				</p>
			</div>

			<div class="mt-12 grid gap-6 sm:grid-cols-2">
				<div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
					<h3 class="text-xl font-display text-slate-900 mb-4">What we built</h3>
					<ul class="space-y-3 text-base text-slate-600">
						<li>&mdash; A custom website, coded from zero</li>
						<li>&mdash; SEO structure built into the theme</li>
						<li>&mdash; A careers section structured to be found</li>
						<li>&mdash; Schema markup and clean site architecture</li>
					</ul>
				</div>
				<div class="rounded-[2rem] border border-slate-100 bg-white p-8">
					<h3 class="text-xl font-display text-slate-900 mb-4">What we never touched</h3>
					<ul class="space-y-3 text-base text-slate-400">
						<li>&mdash; Google Business Profile</li>
						<li>&mdash; Social media accounts</li>
						<li>&mdash; Paid advertising</li>
						<li>&mdash; Review generation</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Numbers -->
	<section class="py-20 md:py-28 bg-slate-50">
		<div class="mx-auto max-w-5xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">The numbers</span>
			<h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">All four moved together</h2>
			<p class="mt-6 text-lg text-slate-600 leading-relaxed max-w-3xl">
				Clicks rising is easy if you simply appear more often. Clicks rising <em>while</em> the click-through rate nearly doubles means appearing for better searches, not just more of them.
			</p>

			<div class="mt-12 overflow-x-auto">
				<table class="w-full text-left border-collapse">
					<thead>
						<tr class="border-b-2 border-slate-900">
							<th class="py-4 pr-4 text-sm font-bold uppercase tracking-wider text-slate-900">Metric</th>
							<th class="py-4 px-4 text-sm font-bold uppercase tracking-wider text-slate-500">May&ndash;Aug 2025</th>
							<th class="py-4 px-4 text-sm font-bold uppercase tracking-wider text-slate-900">May&ndash;Aug 2026</th>
							<th class="py-4 pl-4 text-sm font-bold uppercase tracking-wider text-sky-deep">Change</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $pg_metrics as $pg_m ) : ?>
						<tr class="border-b border-slate-100">
							<td class="py-5 pr-4 font-display text-xl text-slate-900"><?php echo esc_html( $pg_m[0] ); ?></td>
							<td class="py-5 px-4 text-slate-500 tabular-nums"><?php echo esc_html( $pg_m[1] ); ?></td>
							<td class="py-5 px-4 text-slate-900 font-bold tabular-nums"><?php echo esc_html( $pg_m[2] ); ?></td>
							<td class="py-5 pl-4 font-bold text-sky-deep tabular-nums"><?php echo esc_html( $pg_m[3] ); ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- The recruitment story -->
	<section class="py-20 md:py-28 bg-white">
		<div class="mx-auto max-w-5xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">The unexpected part</span>
			<h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">The careers page became the second front door</h2>
			<p class="mt-6 text-lg text-slate-600 leading-relaxed max-w-3xl">
				A third of all search traffic to the site &mdash; 109 of 304 clicks &mdash; lands on the careers page. Not from people who know the company, but from people looking for hospitality work in the Cayman Islands.
			</p>

			<div class="mt-12 grid gap-10 lg:grid-cols-2">
				<div>
					<h3 class="text-xl font-display text-slate-900 mb-6">What they searched</h3>
					<table class="w-full text-left border-collapse">
						<thead>
							<tr class="border-b-2 border-slate-200">
								<th class="py-3 pr-4 text-xs font-bold uppercase tracking-wider text-slate-500">Search</th>
								<th class="py-3 pl-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-right">Position</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $pg_queries as $pg_q ) : ?>
							<tr class="border-b border-slate-100">
								<td class="py-3 pr-4 text-slate-700 text-sm">&ldquo;<?php echo esc_html( $pg_q[0] ); ?>&rdquo;</td>
								<td class="py-3 pl-4 font-bold text-slate-900 tabular-nums text-right"><?php echo esc_html( $pg_q[1] ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div>
					<h3 class="text-xl font-display text-slate-900 mb-6">Where they searched from</h3>
					<table class="w-full text-left border-collapse">
						<thead>
							<tr class="border-b-2 border-slate-200">
								<th class="py-3 pr-4 text-xs font-bold uppercase tracking-wider text-slate-500">Country</th>
								<th class="py-3 pl-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-right">Clicks</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $pg_countries as $pg_c ) : ?>
							<tr class="border-b border-slate-100">
								<td class="py-3 pr-4 text-slate-700 text-sm"><?php echo esc_html( $pg_c[0] ); ?></td>
								<td class="py-3 pl-4 font-bold text-slate-900 tabular-nums text-right"><?php echo esc_html( $pg_c[1] ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<p class="mt-6 text-sm text-slate-500 leading-relaxed">
						Jamaica and Kenya are two of the countries Cayman hospitality recruits from. Those candidates are finding Prime Group directly, from abroad, before any agency is involved.
					</p>
				</div>
			</div>

			<div class="mt-14 rounded-[2rem] border-l-4 border-sky-deep bg-slate-50 p-8 md:p-10">
				<h4 class="text-2xl font-display text-slate-900">Why this is worth more than it looks</h4>
				<p class="mt-4 text-lg text-slate-600 leading-relaxed">
					Staffing is one of the hardest problems in Cayman hospitality, and recruitment agencies are expensive. A careers page that ranks for &ldquo;hospitality jobs in cayman islands&rdquo; is not a marketing metric &mdash; it is a candidate who arrives without a placement fee attached.
				</p>
			</div>

			<?php /* Named for the same reason the TintXKing page names its CTR: a case
			         study that only reports the flattering half is one a prospect can
			         check and stop believing. */ ?>
			<div class="mt-8 rounded-[2rem] border border-slate-100 bg-white p-8 md:p-10">
				<h4 class="text-2xl font-display text-slate-900">What is still open</h4>
				<p class="mt-4 text-lg text-slate-600 leading-relaxed">
					At position 9.1 the site sits at the bottom of page one for most of those job searches. Every place gained from here is worth more than the last. And because we do not manage their listings or social accounts, there is a whole layer of local visibility that has never been worked at all.
				</p>
			</div>
		</div>
	</section>

	<!-- What it means -->
	<section class="py-20 md:py-28 bg-slate-950 text-white">
		<div class="mx-auto max-w-4xl px-6">
			<span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">What this means for you</span>
			<h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">A website is not a brochure</h2>
			<div class="mt-8 space-y-6 text-lg leading-relaxed text-white/60">
				<p>
					Prime Group did not buy a marketing campaign. They bought a website &mdash; built properly, with the search structure inside it rather than added afterwards by a plugin.
				</p>
				<p>
					A year later it triples their search traffic, ranks eight places higher, and quietly recruits staff from three continents. That is what the difference between a site that exists and a site that is built to be found actually looks like.
				</p>
			</div>

			<div class="mt-12 flex flex-wrap gap-4">
				<a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
					See how we build them
					<span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 text-accent transition-transform group-hover:rotate-45">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
				</span>
				</a>
				<a href="<?php echo esc_url( home_url( '/case-study-tintxking-orlando/' ) ); ?>" class="inline-flex items-center rounded-full border border-white/20 px-8 py-4 text-lg font-bold text-white hover:bg-white/5 transition-colors decoration-none">
					Read the TintXKing case
				</a>
			</div>
		</div>
	</section>

	<?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
