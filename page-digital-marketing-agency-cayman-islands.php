<?php
/**
 * Template Name: Digital Marketing Agency Cayman
 * Template Post Type: page
 *
 * "The Digital Marketing Agency Built for the AI Search Era" — a unified digital
 * footprint that makes the business the #1 recommended answer on ChatGPT,
 * Gemini and Google.
 */
get_header();

// Table of contents — anchors match the section ids below.
$dm_toc = array(
    array( '#approach',    'How Our Digital Marketing Approach Helps Your Business' ),
    array( '#showcase',    'Featured Case Study &amp; Website Showcase' ),
    array( '#engine',      'Our Unified Growth Engine (How We Work)' ),
    array( '#boundaries',  'Who We Work With (And Our Boundaries)' ),
);

// Section 1 — value points.
$dm_value = array(
    array( 'Permanent Digital Assets', 'Instead of renting temporary visibility, we build high-speed websites, Schema-coded data, and authoritative articles that serve as permanent trust signals for search bots.' ),
    array( 'Unified Channel Synergy', 'We connect your website, Google Maps, TripAdvisor, LinkedIn, YouTube, Facebook, and Instagram so search engines see a single, verified brand across the web.' ),
    array( 'High-Intent Customer Capture', 'Customers asking AI engines for local recommendations are already looking to buy. We position your brand directly in front of these ready-to-act buyers.' ),
    array( 'Future-Proof Search Footprint', 'As conversational search replaces standard keyword searches, your business remains ahead of local competitors who haven&rsquo;t updated their digital infrastructure.' ),
);

// Section 2 — 4-pillar engine.
$dm_pillars = array(
    array( '1', 'High-Speed, AI-Ready Web Engineering', 'We build or deeply restructure your website foundation using specialized Schema Markup, ensuring ChatGPT, Gemini, and Google scan your exact location, services, and authority without friction.' ),
    array( '2', 'Local Knowledge Graph &amp; Map Synchronization', 'We clean up, synchronize, and lock down your exact business details across Google Maps, Apple Maps, local directories, and primary social channels to verify your real-world legitimacy.' ),
    array( '3', 'High-Authority Content &amp; Social Chunking', 'We write deep-dive website and LinkedIn articles that establish your industry expertise, then &ldquo;chunk&rdquo; that core insight into visual video and image assets for YouTube, Instagram, and Facebook.' ),
    array( '4', 'Weekly Maintenance &amp; Search Bot Indexing', 'We run weekly technical updates, monitor AI citation shifts, and issue fresh indexing requests to web crawlers to keep your brand active and prioritized.' ),
);

// Section 3 — showcase projects (real Cayman builds).
$dm_projects = array(
    array( 'name' => 'Uncle Liu', 'scope' => 'Full AI-Ready Website Build featuring high-speed mobile architecture and Schema Markup.', 'url' => 'https://uncleliu.ky', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-093300.webp', 'w' => 1897, 'h' => 1105 ),
    array( 'name' => 'San Si Wu', 'scope' => 'Strategic Web Redesign &amp; Google Maps Synchronization.', 'url' => 'https://sansiwu.ky', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-093611.webp', 'w' => 1898, 'h' => 1062 ),
    array( 'name' => 'Easy Lot Cayman', 'scope' => 'Backend Restructuring &amp; Conversion Optimization.', 'url' => 'https://easylot.ky', 'img' => 'https://toctoc.ky/wp-content/uploads/2024/01/easylot-website-local-business-cayman-islands.webp', 'w' => 0, 'h' => 0 ),
);

// Section 4 — boundaries table.
$dm_boundaries = array(
    array(
        'dont_label' => 'No Daily Social Posting',
        'dont_text'  => 'We do not handle daily post scheduling, stories, or Instagram grid aesthetic curation.',
        'do_label'   => 'Content Architecture',
        'do_text'    => 'We build high-value video, image, and written content &ldquo;chunks&rdquo; that build search engine trust.',
    ),
    array(
        'dont_label' => 'No Short-Term Ad Campaigns',
        'dont_text'  => 'We do not build or manage paid Google Ads, social media ads, or print ads.',
        'do_label'   => 'Organic Authority Building',
        'do_text'    => 'We build permanent, crawlable digital assets that generate ongoing organic search leads.',
    ),
    array(
        'dont_label' => 'No Community Management',
        'dont_text'  => 'We do not handle customer DMs, comment replies, or administrative tasks.',
        'do_label'   => 'Technical Optimization',
        'do_text'    => 'We manage site speed, Schema code, map synchronization, and AI bot indexing.',
    ),
);
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero -->
    <section class="relative pt-48 pb-24 overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <?php toctoc_render_breadcrumbs( 'Services' ); ?>
                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                    Full-Service Digital Marketing &middot; Cayman Islands
                </div>
                <h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-white">
                    The Digital Marketing Agency Built for the <em class="italic text-accent font-display">AI Search Era</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                    We unify your web presence to make your Cayman business the #1 recommended answer on ChatGPT, Gemini, and Google.
                </p>
                <div class="mt-12 flex flex-wrap gap-4">
                    <a href="tel:+13455478120" class="group inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                        Call Us Today
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 text-accent transition-transform group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro (home-style: large centered display) -->
    <section class="relative py-20 md:py-28 bg-white">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <div class="space-y-8">
                <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                    If you came here searching for a &ldquo;digital marketing agency&rdquo; in the Cayman Islands, you probably expected a menu of basic retainers &mdash; post scheduling, ad coordination, generic reporting. We don&rsquo;t operate like a traditional agency.
                </p>
                <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                    In the modern era of search, true digital marketing is about building <em class="italic text-sky-deep font-display">Algorithmic Trust.</em> We engineer a unified digital footprint so that when customers ask AI engines for a recommendation, your business is the one brought to the surface.
                </p>
            </div>
        </div>
    </section>

    <!-- What's On This Page (table of contents) -->
    <section class="pb-20 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl rounded-[2rem] border border-slate-100 bg-slate-50 p-8 md:p-10 shadow-soft">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl font-display text-slate-900">What&rsquo;s On This Page</h2>
                    <span class="shrink-0 inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-[11px] font-bold text-sky-deep border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        3 min read
                    </span>
                </div>
                <p class="text-sm text-slate-500 mb-6">It takes about 3 minutes to read. We respect your time.</p>
                <ol class="space-y-3">
                    <?php foreach ( $dm_toc as $i => $item ) : ?>
                    <li>
                        <a href="<?php echo esc_attr( $item[0] ); ?>" class="group flex items-start gap-4 decoration-none">
                            <span class="shrink-0 inline-flex items-center justify-center w-7 h-7 rounded-full bg-sky-pale text-sky-deep text-sm font-bold"><?php echo (int) ( $i + 1 ); ?></span>
                            <span class="text-lg text-slate-700 group-hover:text-sky-deep transition-colors leading-snug pt-0.5"><?php echo wp_kses_post( $item[1] ); ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </section>

    <!-- 1. How Our Approach Helps -->
    <section id="approach" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; The Value We Bring</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How Our Digital Marketing Approach <em class="italic text-sky-deep font-display">Helps Your Business</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    As a specialized digital marketing agency, our entire focus is on driving measurable, long-term visibility that converts modern buyers. Here is the value we bring to your business:
                </p>
            </div>
            <div class="mt-12 grid md:grid-cols-2 gap-6">
                <?php foreach ( $dm_value as $v ) : ?>
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3"><?php echo wp_kses_post( $v[0] ); ?></div>
                    <p class="text-slate-600 leading-relaxed"><?php echo wp_kses_post( $v[1] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 2. Featured Case Study + Showcase -->
    <section id="showcase" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">02 &middot; Proof</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Featured Case Study &amp; <em class="italic text-sky-deep font-display">Website Showcase</em></h2>
            </div>

            <!-- Featured case study: 19-81 -->
            <div class="mt-12 rounded-[2.5rem] bg-slate-950 text-white p-8 md:p-12 shadow-glass">
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-accent mb-3">Featured Case Study</p>
                <h3 class="text-3xl md:text-4xl font-display leading-tight">19-81 Brewing Co.</h3>
                <div class="mt-8 grid md:grid-cols-3 gap-6">
                    <div class="rounded-[1.5rem] bg-white/5 border border-white/10 p-6">
                        <p class="text-sky-deep text-sm font-bold mb-2" style="color:#7dd3fc;">The Goal</p>
                        <p class="text-white/70 leading-relaxed text-sm">Establish a local craft brewery as a consistently recommended brand for conversational search queries.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white/5 border border-white/10 p-6">
                        <p class="text-accent text-sm font-bold mb-2">The Result</p>
                        <p class="text-white/70 leading-relaxed text-sm">Regularly recommended as a top choice across ChatGPT, Gemini, and local search maps.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white/5 border border-white/10 p-6">
                        <p class="text-white text-sm font-bold mb-2">What We Delivered</p>
                        <p class="text-white/70 leading-relaxed text-sm">A brand-new high-speed website, updated Google Maps &amp; TripAdvisor profiles, overhauled social channels, and continuous weekly updates for search crawlers.</p>
                    </div>
                </div>
            <!-- The Proof Loop -->
                <div class="mt-10">
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-white/50 mb-6">The Proof Loop</p>
                    <div class="grid md:grid-cols-3 gap-6 items-start">
                        <div class="flex justify-center md:justify-start">
                            <div class="relative aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] bg-slate-950 shadow-soft ring-1 ring-white/10">
                                <video class="w-full h-full object-cover" controls preload="none" data-ttlazy playsinline>
                                    <source src="https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-1.mp4#t=0.1" type="video/mp4">
                                </video>
                                <div class="pointer-events-none absolute inset-x-0 top-0 z-10 px-4 pt-4 pb-10 bg-gradient-to-b from-black/85 via-black/45 to-transparent">
                                    <span class="block text-left text-sm font-bold text-white leading-snug drop-shadow-md">How we made our client the #1 brewery on ChatGPT &amp; Gemini &#127866;</span>
                                </div>
                            </div>
                        </div>
                        <figure class="flex flex-col items-center md:items-start">
                            <div class="aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] border border-white/10 bg-slate-950">
                                <img src="https://toctoc.ky/wp-content/uploads/2026/07/photo-5102759273703345434-w.webp" alt="19-81 Brewing Co. website by TocToc Marketing" width="1273" height="2560" loading="lazy" decoding="async" class="w-full h-full object-cover object-top" />
                            </div>
                            <figcaption class="mt-3 max-w-[280px] text-[11px] font-bold uppercase tracking-widest text-white/50">19-81 website</figcaption>
                        </figure>
                        <figure class="flex flex-col items-center md:items-start">
                            <div class="aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] border border-white/10 bg-slate-950">
                                <img src="https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-094552.webp" alt="19-81 Brewing Co. Google Business Profile" width="505" height="1198" loading="lazy" decoding="async" class="w-full h-full object-cover object-top" />
                            </div>
                            <figcaption class="mt-3 max-w-[280px] text-[11px] font-bold uppercase tracking-widest text-white/50">Google Business Profile</figcaption>
                        </figure>
                    </div>
                </div>
            </div>

            <!-- Portfolio showcase -->
            <div class="mt-14 max-w-3xl">
                <h3 class="text-2xl md:text-3xl font-display text-slate-900">Website Portfolio Showcase</h3>
                <p class="mt-4 text-lg text-slate-600 leading-relaxed">Every project we launch is built on clean code, high speeds, and crawlable backend architectures designed for both human visitors and AI bots.</p>
            </div>
            <div class="mt-10 grid md:grid-cols-3 gap-8">
                <?php foreach ( $dm_projects as $p ) : ?>
                <div class="group flex flex-col gap-5">
                    <div class="aspect-video rounded-[2rem] bg-slate-100 overflow-hidden border border-slate-100 shadow-soft">
                        <img src="<?php echo esc_url( $p['img'] ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $p['name'] ) . ' website by TocToc Marketing' ); ?>" <?php echo ! empty( $p['w'] ) ? 'width="' . (int) $p['w'] . '" height="' . (int) $p['h'] . '"' : ''; ?> loading="lazy" decoding="async" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h4 class="text-xl font-display text-slate-900 mb-1"><?php echo wp_kses_post( $p['name'] ); ?></h4>
                        <p class="text-sm text-slate-600 leading-relaxed mb-3"><?php echo wp_kses_post( $p['scope'] ); ?></p>
                        <a href="<?php echo esc_url( $p['url'] ); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-sm font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-12">
                <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    See All Our Work
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- 3. Unified Growth Engine -->
    <section id="engine" class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-10 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">03 &middot; How We Work</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">Our Unified <em class="italic text-accent font-display">Growth Engine</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    We execute a streamlined, 4-pillar system designed to optimize your digital marketing footprint for modern search engines:
                </p>
            </div>
            <div class="mt-14 grid md:grid-cols-2 gap-6">
                <?php foreach ( $dm_pillars as $pl ) : ?>
                <article class="rounded-[2rem] bg-white/5 border border-white/10 p-8">
                    <div class="flex items-start gap-5">
                        <span class="shrink-0 inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-accent text-slate-950 text-xl font-display"><?php echo esc_html( $pl[0] ); ?></span>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-accent mb-1">Pillar <?php echo esc_html( $pl[0] ); ?></p>
                            <h3 class="text-xl md:text-2xl font-display leading-snug"><?php echo wp_kses_post( $pl[1] ); ?></h3>
                            <p class="mt-3 text-white/60 leading-relaxed"><?php echo wp_kses_post( $pl[2] ); ?></p>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. Who We Work With (boundaries) -->
    <section id="boundaries" class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-10 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">04 &middot; Full Transparency</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">Who We Work With <em class="italic text-accent font-display">(And Our Boundaries)</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    To maintain speed and deliver clear search rankings, we operate with transparent professional boundaries:
                </p>
            </div>

            <div class="mt-12">
                <table class="w-full border-collapse block md:table">
                    <thead class="hidden md:table-header-group">
                        <tr>
                            <th class="w-1/2 text-left align-bottom pb-5 pr-8 border-b border-white/15 text-xl font-normal text-white/90">What We <strong class="font-bold text-white">Don&rsquo;t</strong> Do</th>
                            <th class="w-1/2 text-left align-bottom pb-5 pl-8 border-b border-white/15 text-xl font-normal text-white/90">What We <strong class="font-bold text-white">Do</strong> Do</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        <?php foreach ( $dm_boundaries as $b ) : ?>
                        <tr class="block md:table-row">
                            <td class="block md:table-cell align-top pt-7 pb-4 md:py-7 md:pr-8 md:border-b md:border-white/10 text-white/60 leading-relaxed">
                                <span class="md:hidden block text-[10px] font-bold uppercase tracking-widest text-white/35 mb-2">What we don&rsquo;t do</span>
                                <strong class="font-bold text-white"><?php echo wp_kses_post( $b['dont_label'] ); ?>:</strong> <?php echo wp_kses_post( $b['dont_text'] ); ?>
                            </td>
                            <td class="block md:table-cell align-top pb-7 md:py-7 md:pl-8 border-b border-white/10 text-white/60 leading-relaxed">
                                <span class="md:hidden block text-[10px] font-bold uppercase tracking-widest text-accent mb-2">What we do do</span>
                                <strong class="font-bold text-white"><?php echo wp_kses_post( $b['do_label'] ); ?>:</strong> <?php echo wp_kses_post( $b['do_text'] ); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-5xl px-6">
            <h2 class="text-4xl md:text-6xl font-display leading-[1.02] text-slate-900">Do You Want a Digital Marketing Strategy <br /><em class="italic text-sky-deep font-display">Built for the AI Era?</em></h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                Stop relying on outdated agency retainers. Let&rsquo;s build a synchronized digital footprint that makes ChatGPT, Gemini, and Google recommend your Cayman business first.
            </p>
            <div class="mt-12">
                <a href="tel:+13455478120" class="group inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    Call Us Today
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
</main>

<script type="application/ld+json">
<?php
// OfferCatalog: a formal, machine-readable enumeration of every service —
// so when an AI is asked "what does TocToc offer?", the answer is structured.
$ttc_catalog = array(
	array(
		'AI Search Optimization (SEO, AEO & GEO)',
		'Search, Answer and Generative Engine Optimization — rank on Google and get recommended by AI assistants like ChatGPT and Gemini.',
		'https://toctoc.ky/ai-search-optimization-cayman-islands/',
	),
	array(
		'Website Design',
		'Fast, mobile-first websites that convert visitors into leads.',
		'https://toctoc.ky/website-design-agency-cayman-islands/',
	),
	array(
		'Web Development',
		'Custom websites, e-commerce and web apps built for speed and SEO.',
		'https://toctoc.ky/web-development-cayman-islands/',
	),
	array(
		'Social Media for Algorithmic Trust',
		'Profile optimization and strategic content blueprints so AI crawlers read your business as active, consistent and trusted.',
		'https://toctoc.ky/social-media-marketing-services-cayman-islands/',
	),
	array(
		'Digital PR for AI Authority Citations',
		'Permanent, high-authority digital assets — LinkedIn optimization, deep-dive articles and repurposed video content — that make AI engines cite and recommend your brand.',
		'https://toctoc.ky/advertising-pr-agency-cayman-islands/',
	),
	array(
		'Full-Service Digital Marketing',
		'A single partner for your entire marketing presence in the Cayman Islands.',
		'https://toctoc.ky/digital-marketing-agency-cayman-islands/',
	),
);
echo wp_json_encode(
	array(
		'@context' => 'https://schema.org',
		'@type'    => 'OfferCatalog',
		'name'     => 'TocToc Marketing Services',
		'url'      => 'https://toctoc.ky/digital-marketing-agency-cayman-islands/',
		'provider' => array( '@id' => 'https://toctoc.ky/#organization' ),
		'itemListElement' => array_map(
			function ( $s ) {
				return array(
					'@type'       => 'Offer',
					'itemOffered' => array(
						'@type'       => 'Service',
						'name'        => $s[0],
						'description' => $s[1],
						'url'         => $s[2],
						'provider'    => array( '@id' => 'https://toctoc.ky/#organization' ),
						'areaServed'  => array( '@type' => 'Place', 'name' => 'Cayman Islands' ),
					),
				);
			},
			$ttc_catalog
		),
	),
	JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
