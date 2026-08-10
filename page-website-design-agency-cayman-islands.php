<?php
/**
 * Template Name: Website Development Grand Cayman
 * Template Post Type: page
 *
 * Retargeted 10 Aug 2026 from "AI-Ready Web Design" to website DEVELOPMENT plus
 * a restaurant/hospitality lead. The slug stays as-is: it holds every one of the
 * page's 2,659 impressions and a slug is a weak signal next to that.
 *
 * Why the move — 180 days of Search Console, page position vs the home's:
 *
 *   restaurant website design cayman islands   702 impr   this 18.3  home 25.0
 *   web development services cayman            673 impr   this 19.6  home 36.9
 *   website development company cayman is.     659 impr   this 24.0  home  —
 *   web development cayman                     380 impr   this 21.7  home 25.6
 *   website development grand cayman           111 impr   this 23.5  home 27.4
 *   --- terms the home owns, so this page stops chasing them ---
 *   web design cayman islands                  632 impr   this 20.7  home  3.3
 *   web development agency cayman islands      425 impr   this 15.8  home  5.7
 *
 * On every "design" head term the home outranks this page by 15+ positions, and
 * two pages splitting one query is what kept both off page one. On "development"
 * and "restaurant" this page is the site's best URL and merely stuck on page two.
 * So it now targets only the second group. See also the note in header.php.
 */
get_header();

// Table of contents — anchors match the section ids below.
$wd_toc = array(
    array( '#restaurants',  'Restaurant &amp; Hospitality Websites We&rsquo;ve Built in Cayman' ),
    array( '#how-we-help',  'How We Help Your Business (Build, Rebuild, or Optimize)' ),
    array( '#showcase',     'Full Website Portfolio' ),
    array( '#failing',      'Why Most Cayman Websites Fail Their Owners' ),
    array( '#ai-ready',     'What Makes a Website &ldquo;AI-Ready&rdquo;? (Our 3 Core Pillars)' ),
    array( '#process',      'Our 3-Step Web Development &amp; Launch Process' ),
    array( '#faq',          'Frequently Asked Questions' ),
);

// Section 1 comparison table: current situation -> how we help.
$wd_help = array(
    array(
        'situation' => '&ldquo;I don&rsquo;t have a website at all.&rdquo;',
        'label'     => 'Full AI-Ready Build',
        'text'      => 'We build your brand-new, high-speed website from scratch on a modern framework&mdash;complete with Schema Markup and local map integrations.',
    ),
    array(
        'situation' => '&ldquo;I have a site I like, but it needs technical upgrades.&rdquo;',
        'label'     => 'Backend Restructuring',
        'text'      => 'We keep your design intact while fixing the backend code&mdash;injecting Schema Markup, boosting site speed, and aligning metadata for AI crawlers.',
    ),
    array(
        'situation' => '&ldquo;My current site is slow, outdated, or broken.&rdquo;',
        'label'     => 'Strategic Redesign',
        'text'      => 'We execute a complete redesign that modernizes your visual aesthetics while rebuilding the site foundation for speed, leads, and modern search indexing.',
    ),
);


// Section 4 — the 3 pillars.
$wd_pillars = array(
    array(
        'n'     => '1',
        'title' => 'Deep Schema Code Injection (The Invisible AI Translator)',
        'body'  => 'We hand-code specialized Schema Markup into every page of your site. This structured data acts as an invisible translator that communicates directly with search databases.',
        'why'   => 'Schema Markup hands ChatGPT, Gemini, and Google your exact location, operating hours, service lists, and pricing on a silver platter&mdash;ensuring the algorithm never has to guess what you do.',
    ),
    array(
        'n'     => '2',
        'title' => 'Ultra-High-Speed Mobile Engineering',
        'body'  => 'We build streamlined, lightweight websites optimized for instant loading on mobile devices across the Cayman Islands.',
        'why'   => 'AI search crawlers assign higher trust scores to fast sites. If your website takes more than 3 seconds to load, search engines downgrade your authority and bounce potential customers before they see your homepage.',
    ),
    array(
        'n'     => '3',
        'title' => 'Generative Engine Optimization (GEO) Content Structure',
        'body'  => 'We write and format your website content so it answers real, conversational questions asked by modern users.',
        'why'   => 'People don&rsquo;t search with short keywords anymore; they ask full conversational questions. By structuring your pages into direct answer blocks, AI engines can easily scrape and feature your content as the live recommendation.',
    ),
);

// Section 5 — process.
$wd_process = array(
    array( '01', 'Discovery &amp; Content Architecture', 'We map out your site map, align your local Cayman keywords, and structure your page layout to guide visitors directly toward making a call.' ),
    array( '02', 'High-Speed Development &amp; Schema Integration', 'Our team builds your site foundation, optimizes mobile performance, injects hidden Schema code, and connects your Google Maps and local profiles.' ),
    array( '03', 'Launch &amp; Continuous Indexing', 'We launch your site and immediately issue live indexing requests to Google and AI web scrapers&mdash;ensuring your new digital asset is indexed and ready to bring in calls.' ),
);

// FAQ — visible accordion + FAQPage schema (what AI answer engines actually read).
$wd_faqs = array(
    array(
        'q' => 'How much does a website cost in the Cayman Islands?',
        'a' => 'It depends on scope — a focused local business site is very different from a large e-commerce build. Rather than fixed packages, we quote each project based on the pages, features and integrations you need. Book a free call and we will give you a transparent, itemized quote.',
    ),
    array(
        'q' => 'How much does a restaurant website cost in the Cayman Islands?',
        'a' => 'A restaurant site is usually one of the more contained builds we do: menus, hours, location, gallery, reservations and the structured data that lets Google and AI assistants read all of it correctly. Because the scope is well understood after five Cayman restaurant builds, we can quote it quickly and accurately after a short call.',
    ),
    array(
        'q' => 'Can you add online menus, reservations or ordering to my restaurant website?',
        'a' => 'Yes. We build menus as real, crawlable page content rather than a PDF or an image — that is the single most common reason a restaurant is invisible to ChatGPT, Gemini and Google, because none of them can read a picture of your menu reliably. We also connect direct reservations and integrate whichever ordering or delivery platform you already use.',
    ),
    array(
        'q' => 'What does "AI-ready" web development actually mean?',
        'a' => 'An AI-ready website is engineered so ChatGPT, Gemini and Google can read, trust and recommend it. In practice that means hand-coded Schema markup, a clean semantic HTML structure AI can parse into answers, lightning-fast mobile performance, and content organized around the real questions your customers ask.',
    ),
    array(
        'q' => 'Can you redesign or upgrade my existing website instead of building a new one?',
        'a' => 'Yes. We do all three: build from scratch, redesign, or optimize what you already have. If your current site is fundamentally sound we restructure its speed, Schema and content architecture; if it is holding you back, we rebuild it on a high-speed, AI-ready foundation.',
    ),
    array(
        'q' => 'Do you build on WordPress?',
        'a' => 'Yes — we build fast, custom-coded WordPress sites (and custom themes), which gives you an easy-to-manage platform without the bloat and slow load times of generic page-builder templates. Every build is engineered for Core Web Vitals speed and clean, crawlable code.',
    ),
    array(
        'q' => 'Do you work with businesses outside Grand Cayman?',
        'a' => 'Yes. Most of our web development work is on Grand Cayman, but we have built and launched sites for clients in Puerto Rico, Florida and the wider Caribbean. The engineering is the same wherever you are; what changes is the local search and structured data setup, which we tailor to the market you actually sell in.',
    ),
    array(
        'q' => 'Will my website be fast and mobile-friendly?',
        'a' => 'Yes. Speed and mobile-first design are core to every build, not an afterthought — we optimize for Google Core Web Vitals because page speed is both a ranking signal and the difference between a visitor who converts and one who leaves.',
    ),
    array(
        'q' => 'How long does it take to build a website?',
        'a' => 'The core high-speed foundation is built in a matter of days, with the full timeline depending on the number of pages, content readiness and any custom features. We will give you a clear schedule with your quote after the discovery call.',
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
                <?php toctoc_render_breadcrumbs( 'Website Development' ); ?>
                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                    Website Development &middot; Grand Cayman
                </div>
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                    Website Development in <em class="italic text-accent font-display">Grand Cayman</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                    We are a website development company on Grand Cayman that hand-codes fast, custom sites &mdash; no page builders, no bloated templates. Our web development services have built more restaurant websites in the Cayman Islands than anything else, and those kitchens are now the ones ChatGPT and Gemini name first.
                </p>
                <p class="mt-6 text-lg text-white/50 leading-relaxed max-w-3xl">
                    Restaurants, breweries, retail, professional services and tourism &mdash; 14 live builds across Cayman, Puerto Rico and beyond.
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
                    We don&rsquo;t build generic brochure sites. We engineer web foundations built for <em class="italic text-sky-deep font-display">lightning-fast speeds, maximum conversion, and algorithmic trust.</em>
                </p>
                <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                    A &ldquo;pretty&rdquo; website isn&rsquo;t enough any more. If your code is bloated, slow, or missing structured data, AI assistants like ChatGPT and Gemini will simply bypass your business when a hungry visitor asks where to eat tonight.
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
                    <?php foreach ( $wd_toc as $i => $item ) : ?>
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

    <!--
        1. Restaurants first.

        This section leads because "restaurant website design cayman islands" is
        the single clearest opening in the whole Search Console account: 702
        impressions in 180 days, this page already the site's best result at
        position 18.3, and a portfolio of five hospitality builds that no other
        agency on the island can match. Everything below is the general pitch;
        this is the one where the proof is specific.
    -->
    <section id="restaurants" class="relative py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-12 shadow-glass scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">01 &middot; Restaurants &amp; Hospitality</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">Restaurant Website Design in the <em class="italic text-accent font-display">Cayman Islands</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    Most of what we build is food and drink. Five live restaurant and brewery sites on Grand Cayman &mdash; Szechuan, tropical Asian, Chinese street food, smash burgers and craft beer &mdash; each hand-coded, each fast on a phone at the table, each structured so search engines and AI assistants can read the menu, the hours and the location without guessing.
                </p>
                <p class="mt-5 text-lg text-white/60 leading-relaxed">
                    That last part is why it matters. When someone on Seven Mile Beach asks ChatGPT or Gemini where to eat, the assistant answers from what it can actually parse. Our restaurant clients are the ones it names.
                </p>
            </div>

            <div class="mt-14">
                <?php toctoc_render_showcase_grid( true, 'food' ); ?>
            </div>

            <div class="mt-14 grid gap-5 md:grid-cols-2">
                <a href="<?php echo esc_url( home_url( '/case-study-prime-group-cayman/' ) ); ?>" class="group rounded-[2rem] border border-white/10 bg-white/5 p-8 transition-colors hover:bg-white/10 decoration-none block">
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-accent">Case study</span>
                    <h3 class="mt-3 text-2xl font-display text-white">Prime Group &mdash; +305% organic growth</h3>
                    <p class="mt-3 text-white/50 leading-relaxed">Uncle Liu and Coconut Room, rebuilt from zero and measured against the same quarter a year earlier in Search Console.</p>
                    <span class="mt-5 inline-flex items-center gap-2 font-bold text-accent group-hover:gap-4 transition-all">Read the numbers
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </span>
                </a>
                <a href="<?php echo esc_url( home_url( '/case-study-tintxking-orlando/' ) ); ?>" class="group rounded-[2rem] border border-white/10 bg-white/5 p-8 transition-colors hover:bg-white/10 decoration-none block">
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-accent">Case study</span>
                    <h3 class="mt-3 text-2xl font-display text-white">TintXKing &mdash; +469% in leads</h3>
                    <p class="mt-3 text-white/50 leading-relaxed">Not a restaurant, but the clearest proof of what the build method does to a local service business year over year.</p>
                    <span class="mt-5 inline-flex items-center gap-2 font-bold text-accent group-hover:gap-4 transition-all">Read the numbers
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- 2. How We Help (Build / Rebuild / Optimize) -->
    <section id="how-we-help" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">02 &middot; Build, Rebuild or Optimize</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How We Help <em class="italic text-sky-deep font-display">Your Business</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    Every business comes to us at a different stage. Here is how we shape our web development services around where you actually are:
                </p>
            </div>
            <div class="mt-12 space-y-5">
                <?php foreach ( $wd_help as $h ) : ?>
                <div class="grid md:grid-cols-2 gap-6 rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 md:p-10">
                    <div class="flex items-start gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 mt-1 text-slate-300"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                        <p class="text-xl md:text-2xl font-display text-slate-900 leading-snug"><?php echo wp_kses_post( $h['situation'] ); ?></p>
                    </div>
                    <div class="md:border-l md:border-slate-100 md:pl-8">
                        <p class="text-sky-deep text-sm font-bold mb-2"><?php echo wp_kses_post( $h['label'] ); ?></p>
                        <p class="text-slate-600 leading-relaxed"><?php echo wp_kses_post( $h['text'] ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 3. Full Portfolio (dark, same as Our Work) -->
    <section id="showcase" class="relative py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-12 shadow-glass scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">03 &middot; Portfolio</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">Full Website <em class="italic text-accent font-display">Portfolio</em></h2>
                <p class="mt-8 text-lg text-white/50 leading-relaxed">
                    Beyond hospitality: retail, wellness, professional services, tourism and manufacturing. Every project on clean code, high speeds, and a crawlable backend architecture.
                </p>
            </div>
            <div class="mt-14">
                <?php toctoc_render_showcase_grid( true ); ?>
            </div>
            <div class="mt-14">
                <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-white text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    See All Our Work
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- 4. Why Most Cayman Websites Fail -->
    <section id="failing" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">04 &middot; The Old Way vs The New Reality</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Why Most Cayman Websites <em class="italic text-sky-deep font-display">Fail Their Owners</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    Most agencies spend all of their effort on visual aesthetics and none on how modern search engines actually read the code underneath.
                </p>
            </div>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-white shadow-soft">
                    <div class="text-slate-400 text-sm font-bold mb-3">The Old Approach</div>
                    <p class="text-slate-600 leading-relaxed">Agencies build heavy, slow websites filled with unoptimized images and bloated page builders. They look nice to humans, but search engine crawlers and AI bots get choked on the code and abandon the site.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-sky-deep/20 bg-sky-pale/40 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">The New Reality</div>
                    <p class="text-slate-600 leading-relaxed">Today, your website has two distinct audiences: human customers who want fast information, and backend AI Web Scrapers that evaluate your site code to decide whether to recommend your business. If your site isn&rsquo;t built for both, you lose leads to competitors who are.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. What Makes a Website AI-Ready: 3 Pillars -->
    <section id="ai-ready" class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">05 &middot; The 3 Core Pillars</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">What Makes a Website <em class="italic text-accent font-display">&ldquo;AI-Ready&rdquo;</em>?</h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    We build every website on a specialized technical framework designed to maximize speed, search indexing, and user conversions:
                </p>
            </div>
            <div class="mt-14 space-y-6">
                <?php foreach ( $wd_pillars as $pl ) : ?>
                <article class="rounded-[2.5rem] bg-white/5 border border-white/10 p-8 md:p-10">
                    <div class="flex flex-col md:flex-row md:items-start gap-6 md:gap-8">
                        <span class="shrink-0 inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-accent text-slate-950 text-2xl font-display">
                            <?php echo esc_html( $pl['n'] ); ?>
                        </span>
                        <div class="flex-1">
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-accent mb-2">Pillar <?php echo esc_html( $pl['n'] ); ?></p>
                            <h3 class="text-2xl md:text-3xl font-display leading-snug"><?php echo wp_kses_post( $pl['title'] ); ?></h3>
                            <p class="mt-4 text-lg text-white/60 leading-relaxed"><?php echo wp_kses_post( $pl['body'] ); ?></p>
                            <p class="mt-4 text-base text-white/80 leading-relaxed"><span class="font-bold text-accent">Why this matters:</span> <?php echo wp_kses_post( $pl['why'] ); ?></p>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. 3-Step Process -->
    <section id="process" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">06 &middot; Our Process</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Our 3-Step Web Development &amp; <em class="italic text-sky-deep font-display">Launch Process</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    We remove the stress and long delays usually associated with web development projects. Here is how we get your business live and optimized:
                </p>
            </div>
            <div class="mt-14 grid md:grid-cols-3 gap-8">
                <?php foreach ( $wd_process as $s ) : ?>
                <div class="p-10 rounded-[2.5rem] bg-slate-50 border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-4xl font-display mb-4"><?php echo esc_html( $s[0] ); ?></div>
                    <h3 class="text-2xl font-display text-slate-900 mb-4 leading-snug"><?php echo wp_kses_post( $s[1] ); ?></h3>
                    <p class="text-slate-500 leading-relaxed"><?php echo wp_kses_post( $s[2] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 6. FAQ -->
    <section id="faq" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">06 &middot; FAQ</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Web Design, <em class="italic text-sky-deep font-display">Answered</em></h2>
            </div>
            <div class="max-w-4xl space-y-4">
                <?php foreach ( $wd_faqs as $faq ) : ?>
                <details class="group rounded-[1.75rem] border border-slate-100 bg-slate-50 p-7 shadow-soft transition-all open:bg-white">
                    <summary class="flex cursor-pointer items-center justify-between gap-4 text-xl md:text-2xl font-display text-slate-900 list-none [&::-webkit-details-marker]:hidden">
                        <span><?php echo esc_html( $faq['q'] ); ?></span>
                        <span class="shrink-0 inline-flex items-center justify-center w-9 h-9 rounded-full bg-sky-pale text-sky-deep transition-transform group-open:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                        </span>
                    </summary>
                    <p class="mt-5 text-base md:text-lg leading-relaxed text-slate-600"><?php echo esc_html( $faq['a'] ); ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-5xl px-6">
            <h2 class="text-4xl md:text-6xl font-display leading-[1.02] text-slate-900">Do You Want a Website <br /><em class="italic text-sky-deep font-display">for the AI Era?</em></h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                Whether you need a brand-new website built from scratch or a deep technical upgrade to your existing site, we build high-speed digital assets that convert visitors and get recommended by ChatGPT, Gemini, and Google. Let&rsquo;s talk about your project today.
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
    <!-- Free SEO Checker CTA -->
    <?php toctoc_render_checker_cta(); ?>

</main>

<script type="application/ld+json">
<?php
echo wp_json_encode(
    array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => 'AI-Ready Web Design',
        'serviceType' => 'Website Design and Development',
        'provider'    => array( '@id' => 'https://toctoc.ky/#organization' ),
        'areaServed'  => array( '@type' => 'Place', 'name' => 'Cayman Islands' ),
        'description' => 'Custom, high-speed AI-ready websites for Cayman Islands businesses: hand-coded Schema markup, ultra-fast mobile engineering and GEO content structure, engineered to convert visitors and get cited and recommended by ChatGPT, Gemini and Google.',
        'url'         => 'https://toctoc.ky/website-design-agency-cayman-islands/',
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<script type="application/ld+json">
<?php
echo wp_json_encode(
    array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(
            function ( $f ) {
                return array(
                    '@type'          => 'Question',
                    'name'           => $f['q'],
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text'  => $f['a'],
                    ),
                );
            },
            $wd_faqs
        ),
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
