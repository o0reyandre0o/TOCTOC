<?php get_header(); ?>

<!-- Venezuela appeal bar — slim black strip pinned above everything -->
<div class="fixed top-0 inset-x-0 z-[1100] bg-slate-950 text-white">
    <div class="mx-auto max-w-6xl px-4 h-11 flex items-center justify-center gap-2 sm:gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 text-[#ED1C24]"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
        <span class="text-xs sm:text-sm font-bold truncate">Venezuela Earthquake Appeal</span>
        <a href="<?php echo esc_url( home_url( '/venezuela/' ) ); ?>" class="shrink-0 inline-flex items-center rounded-full bg-[#C8102E] px-3 sm:px-4 py-1.5 text-[11px] sm:text-xs font-bold text-white hover:bg-[#A50D26] transition-colors decoration-none">
            Donate now
        </a>
    </div>
</div>
<style>
    /* Push the floating nav below the appeal bar (home page only). */
    nav.fixed { top: 3.5rem !important; }
</style>

<main class="min-h-screen bg-background text-foreground">
    <!-- Section 1: Hero Section -->
    <section id="home" class="relative min-h-[100svh] w-full overflow-hidden flex items-center">
        <!-- Clean Sky background -->
        <img
            src="<?php echo esc_url( toctoc_clouds_src() ); ?>"
            srcset="<?php echo esc_attr( toctoc_clouds_srcset() ); ?>"
            sizes="100vw"
            alt="Sky"
            width="1920"
            height="1280"
            fetchpriority="high"
            class="absolute inset-0 w-full h-full object-cover"
        />
        <!-- White overlay to lighten background -->
        <div class="absolute inset-0 bg-white/40 z-[1]"></div>
        <div class="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-b from-transparent via-background/50 to-background pointer-events-none z-[2]"></div>

        <div class="relative z-10 mx-auto max-w-6xl px-6 pt-44 md:pt-52 pb-24 text-center flex flex-col items-center">
            <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] leading-[0.95] text-slate-900 font-display">
                A Marketing Agency<br />
                focused on getting your<br />
                business in <em class="italic text-sky-deep font-display">AI Answers.</em>
            </h1>

            <p class="mt-8 mx-auto max-w-2xl text-base sm:text-lg text-slate-950 font-medium">
                We are a 2026-ready marketing company based in the Cayman Islands that deploys the <strong class="bg-accent text-slate-950 px-1.5 py-0.5 rounded-md">AI Search Visibility Framework</strong> for your business.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-8 gap-y-4">
                <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M20 6 9 17l-5-5"/></svg>
                    Get Recommended
                </div>
                <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M20 6 9 17l-5-5"/></svg>
                    Get Chosen
                </div>
                <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M20 6 9 17l-5-5"/></svg>
                    Stay Recommended
                </div>
            </div>

            <div class="mt-12 flex flex-wrap items-center justify-center gap-4">
                <a href="tel:+13455478120" class="group inline-flex items-center justify-center gap-3 rounded-full bg-accent text-accent-foreground w-full sm:w-64 pl-7 pr-2 py-2 text-base font-bold shadow-glow transition-transform hover:scale-[1.02] decoration-none">
                    Call Us
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary text-primary-foreground transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
                <a href="#portfolio" class="inline-flex items-center justify-center rounded-full bg-white w-full sm:w-64 py-4 text-base font-bold text-slate-900 hover:bg-white/90 transition-colors decoration-none">
                    See Portfolio
                </a>
            </div>
        </div>
    </section>

    <!-- Results-in-numbers marquee: an endless sliding band of proof under the hero. -->
    <style>
        @keyframes ttc-marquee { to { transform: translateX(-50%); } }
        .ttc-marquee-track { animation: ttc-marquee 30s linear infinite; }
        .ttc-marquee:hover .ttc-marquee-track { animation-play-state: paused; }
    </style>
    <section aria-label="TocToc Marketing in numbers" class="ttc-marquee relative bg-white border-y border-slate-100 overflow-hidden py-8 md:py-10">
        <!-- Edge fade -->
        <div class="pointer-events-none absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent z-10"></div>
        <div class="pointer-events-none absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent z-10"></div>

        <div class="ttc-marquee-track flex w-max items-center">
            <?php
            $ttc_stats = array(
                array( '20+',  'AI-Ready Websites<br>in 2026' ),
                array( '4.8<span class="text-accent align-top text-2xl md:text-3xl">&#9733;</span>', 'Google rating<br>(24 reviews)' ),
            );
            // Two identical copies make the -50% translate loop seamless.
            for ( $ttc_copy = 0; $ttc_copy < 2; $ttc_copy++ ) :
            ?>
            <div class="flex w-max items-center shrink-0" <?php echo $ttc_copy ? 'aria-hidden="true"' : ''; ?>>
                <?php foreach ( $ttc_stats as $ttc_s ) : ?>
                <div class="flex items-center gap-4 shrink-0 pl-12 md:pl-16">
                    <span class="text-4xl md:text-5xl font-display text-slate-950 leading-none whitespace-nowrap"><?php echo $ttc_s[0]; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
                    <span class="text-[10px] md:text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500 leading-snug text-left"><?php echo wp_kses_post( $ttc_s[1] ); ?></span>
                </div>
                <span class="shrink-0 ml-12 md:ml-16 w-2 h-2 rounded-full bg-accent"></span>
                <?php endforeach; ?>
            </div>
            <?php endfor; ?>
        </div>
    </section>

    <!-- Section 2: Intro -->
    <section class="relative py-24 md:py-32">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                We are a digital marketing agency based in the Cayman Islands, focused on getting your business
                <em class="italic text-sky-deep font-display"> recommended by AI agents.</em>
            </p>
            <p class="mt-8 text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                Our <em class="italic text-sky-deep font-display">AI Search Visibility Framework</em> is the proven system we use to turn local digital presence into definitive AI citations (and the real-world results speak for themselves).
            </p>
        </div>
    </section>

    <!-- Section 2b: Proof (AI search demos) -->
    <?php
    /*
     * Claim language, changed 10 Aug 2026 — read before editing these strings.
     *
     * Nothing on this site may state that TocToc delivers, produces or
     * guarantees a #1 recommendation or ranking. AI assistants are
     * non-deterministic and their answers vary by phrasing, account, location
     * and date, so a "#1" claim is not something anyone can stand behind. The
     * agreed wording is that we "have successfully influenced AI-generated
     * local recommendations", and captures are described as what a recorded
     * session showed, in the past tense, without asserting a durable position.
     */
    $ttc_proof = array(
        array(
            'label'  => 'Chinese Restaurants',
            'desc'   => 'A recorded session in which ChatGPT and Gemini both named Prime Group&rsquo;s Uncle Liu and Coconut Room among the top Chinese restaurants on Seven Mile Beach.',
            'mp4'    => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-chinese-1-1.mp4',
            'poster' => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-chinese-cover.webp', // Optional: thumbnail image URL.
        ),
        array(
            'label'  => 'Japanese Restaurants',
            'desc'   => 'A recorded session in which ChatGPT and Gemini both recommended Lucky Rabbit when asked for Japanese food near Prospect.',
            'mp4'    => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-japanese-2-1.mp4',
            'poster' => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-japanese-cover.webp',
        ),
        array(
            'label'  => 'Craft Brewery',
            'desc'   => 'A recorded session in which ChatGPT and Gemini both cited 19-81 Brewing Co. when asked about craft breweries in the Cayman Islands.',
            'mp4'    => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-1.mp4',
            'poster' => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-cover.webp',
        ),
    );
    ?>
    <section class="relative py-24 md:py-32 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-14">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Proof, not promises</span>
                <h2 class="mt-6 text-5xl md:text-7xl text-slate-900 font-display leading-[0.95]">
                    Cayman businesses named by <br /><em class="italic text-sky-deep font-display">ChatGPT and Gemini</em>
                </h2>
                <p class="mt-8 text-lg text-slate-600 max-w-2xl leading-relaxed">
                    <strong class="font-semibold text-slate-900">We have successfully influenced AI-generated local recommendations for Cayman businesses on ChatGPT and Gemini.</strong> We don&rsquo;t just talk about the future of search &mdash; the recordings below are real sessions, and you can run the same prompts yourself.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                <?php foreach ( $ttc_proof as $pv ) : ?>
                <figure class="flex flex-col items-center text-center">
                    <?php if ( ! empty( $pv['mp4'] ) ) : ?>
                    <?php
                    // Poster-only facade; the <video> is built on click in footer.php.
                    // Nothing here downloads until asked, and there is no <video> for
                    // Search Console's watch-page report to flag on a supporting page.
                    toctoc_render_proof_video( array(
                        'mp4'    => $pv['mp4'],
                        'poster' => $pv['poster'],
                        'label'  => $pv['label'] . ' in AI search',
                        'class'  => 'max-w-[280px] shadow-soft ring-1 ring-slate-100',
                    ) );
                    ?>
                    <?php else : ?>
                    <div class="aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] bg-slate-950 shadow-soft ring-1 ring-slate-100">
                        <div class="w-full h-full flex flex-col items-center justify-center text-center gap-4 text-white/60">
                            <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor" class="text-sky-deep"><path d="M8 5v14l11-7z"/></svg>
                            </span>
                            <span class="text-xs font-bold uppercase tracking-widest">Video coming soon</span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <figcaption class="mt-5">
                        <span class="block text-lg font-display text-slate-900 mb-1"><?php echo esc_html( $pv['label'] ); ?></span>
                        <span class="block text-sm text-slate-500 leading-relaxed"><?php echo wp_kses_post( $pv['desc'] ); ?></span>
                    </figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    /*
     * No VideoObject schema here, and none on /our-work/ either any more — the
     * clips ship as click-to-play facades with no <video> element at all, which
     * is what finally cleared "Video isn't on a watch page". Full reasoning in
     * toctoc_render_proof_video() and in the note where the markup used to live
     * at the bottom of page-our-work.php.
     */
    ?>

    <!-- Section 3: AI Search Visibility Framework -->
    <section id="loop" class="relative py-24 md:py-32 overflow-hidden bg-sky-pale/50">
        <!-- Clouds background (same sky image as the hero) -->
        <img src="<?php echo esc_url( toctoc_clouds_src() ); ?>" srcset="<?php echo esc_attr( toctoc_clouds_srcset() ); ?>" sizes="100vw" alt="" aria-hidden="true" width="1920" height="1280" loading="lazy" decoding="async" class="absolute inset-0 w-full h-full object-cover object-bottom" />
        <!-- Stronger white at the top (behind the heading) fading to lighter over the cards, so clouds stay visible but the title is readable. -->
        <div class="absolute inset-0 bg-gradient-to-b from-white/95 via-white/60 to-white/70 z-[1]"></div>
        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-7xl text-slate-900 font-display">
                    How a business gets recommended by <em class="italic text-sky-deep font-display">ChatGPT and Gemini</em>
                </h2>
                <p class="mt-8 text-lg text-slate-700 max-w-2xl leading-relaxed">
                    A simple <strong class="text-slate-900">2-phase plan</strong>, backed by a <strong class="text-slate-900">90-day result guarantee</strong>, designed to make your business the kind of source ChatGPT, Gemini, Perplexity and Google can find, trust and cite.
                </p>
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-3">
                <!-- Card 1: Phase 1 -->
                <article class="relative rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass">
                    <div class="flex items-center justify-between mb-10">
                        <span class="font-display text-4xl md:text-5xl text-sky-deep">Phase 1</span>
                        <div class="w-12 h-12 bg-slate-950 rounded-full flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                        </div>
                    </div>
                    <h3 class="text-3xl text-slate-900 font-display mb-2">The one-time setup: site, reviews, maps and listings</h3>
                    <p class="text-sm font-bold text-sky-deep uppercase tracking-wider mb-6">Built &amp; Launched Once</p>
                    <p class="text-sm leading-relaxed text-slate-500 mb-6">We build the core assets AI search tools need to recognize and trust your business &mdash; fast, verified, and recommended everywhere.</p>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-3">What We Build</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Fast AI-Ready Website</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">5-Star Review System</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Maps &amp; LinkedIn Sync</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Branded YouTube</span>
                    </div>
                </article>

                <!-- Card 2: Phase 2 -->
                <article class="relative rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass">
                    <div class="flex items-center justify-between mb-10">
                        <span class="font-display text-4xl md:text-5xl text-sky-deep">Phase 2</span>
                        <div class="w-12 h-12 bg-slate-950 rounded-full flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                        </div>
                    </div>
                    <h3 class="text-3xl text-slate-900 font-display mb-2">The monthly work: upkeep, content and monitoring</h3>
                    <p class="text-sm font-bold text-sky-deep uppercase tracking-wider mb-6">Billed Monthly &middot; Cancel Anytime</p>
                    <p class="text-sm leading-relaxed text-slate-500 mb-6">Once your foundation is live, we run continuous maintenance to keep your business at the top of local search results.</p>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-3">Every Month</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Weekly Bot Maintenance</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Monthly Authority Article</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Social Chunking</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Monthly AI Audits</span>
                    </div>
                </article>

                <!-- Card 3: 90-Day Guarantee -->
                <article class="relative rounded-[2.5rem] bg-slate-950 text-white border border-white/10 p-10 shadow-glass transition-all">
                    <div class="flex items-center justify-between mb-10">
                        <span class="font-display text-4xl md:text-5xl text-accent">90 Days</span>
                        <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center text-slate-950">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-display mb-2">What happens if AI still does not recommend you</h3>
                    <p class="text-sm font-bold text-accent uppercase tracking-wider mb-6">Zero Risk</p>
                    <p class="text-sm leading-relaxed text-white/60 mb-6">If ChatGPT or Gemini aren&rsquo;t recommending you for your primary local searches within 90 days, we run all Phase 2 updates <strong class="text-white">FREE</strong> until they do.</p>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-white/40 mb-3">The Promise</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-white/10 text-white/70 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-white/10">No Fine Print</span>
                        <span class="rounded-full bg-white/10 text-white/70 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-white/10">No Excuses</span>
                        <span class="rounded-full bg-white/10 text-white/70 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-white/10">One Per Category</span>
                    </div>
                </article>
            </div>
        </div>
    </section>


    <!-- Local credentials — answers the "is this an actual Cayman firm?" question
         that Bing's query data shows buyers asking before they enquire. -->
    <?php toctoc_render_local_trust(); ?>

    <!-- Section 4: Services — the home page's only in-body links to the service pages -->
    <?php toctoc_render_services_grid(); ?>

    <!--
        Section 4b: Just Launched.

        The four most recent handovers, sitting directly above the standing
        portfolio so the newest work is the first proof anyone meets. Each card
        carries a short silent clip of the site moving (hero, then a scroll
        down), played on click. Content and markup live in
        toctoc_recent_projects()
        and toctoc_render_recent_projects() so this page and the web development
        page can never drift apart.
    -->
    <section id="recent" class="relative py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Recent Projects Delivered</span>
                <h2 class="mt-6 text-5xl md:text-7xl font-display text-slate-900 leading-[0.95]">
                    Just <em class="italic text-sky-deep font-display">Launched</em>
                </h2>
                <p class="mt-8 text-lg text-slate-600 max-w-2xl leading-relaxed">
                    The four most recent websites we designed, built and handed over &mdash; newest first. Click any card to watch a short clip of the real site &mdash; the hero, then a scroll down.
                </p>
            </div>

            <div class="mt-16">
                <?php toctoc_render_recent_projects(); ?>
            </div>
        </div>
    </section>

    <!-- Section 5: Portfolio -->
    <section id="portfolio" class="relative py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-12 shadow-glass">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-8xl font-display leading-[0.9]">
                    Portfolio: We Build Websites <em class="italic text-accent font-display">AI Loves</em> & Humans Trust.
                </h2>
                <p class="mt-8 text-lg text-slate-400 max-w-2xl italic">
                    Recent high-performance “Discovery Engines” launched in the last 14 days.
                </p>
            </div>

            <div class="mt-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                <!-- Project 1: Adventura -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/04/photo-5156922354653924700-y-768x416.webp" alt="Adventura Cayman" width="768" height="416" loading="lazy" decoding="async" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Adventura Cayman</h3>
                        <p class="text-white/60 text-sm mb-6">Premium Watersports Rental platform with real-time availability and booking.</p>
                        <a href="https://adventuracayman.com" target="_blank" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 2: Uncle Liu -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-49-04-768x418.webp" alt="Uncle Liu" width="768" height="418" loading="lazy" decoding="async" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Uncle Liu</h3>
                        <p class="text-white/60 text-sm mb-6">Luxury E-commerce experience tailored for the local market.</p>
                        <a href="https://uncleliu.ky" target="_blank" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 3: Pr-Optics -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-56-45-768x418.webp" alt="Pr-Optics" width="768" height="418" loading="lazy" decoding="async" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Pr-Optics</h3>
                        <p class="text-white/60 text-sm mb-6">Modern Optical Boutique website featuring high-end eyewear collections and appointment booking.</p>
                        <a href="https://pr-optics.com/" target="_blank" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 4: Smash Burger -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/image-2026-05-13-11-23-39-768x477.webp" alt="Smash Burger" width="768" height="477" loading="lazy" decoding="async" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Smash Burger</h3>
                        <p class="text-white/60 text-sm mb-6">Vibrant Quick Service Restaurant website with digital ordering and loyalty program.</p>
                        <a href="https://carnivore.ky/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 5: Solara -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-092614.webp" alt="Solara" width="1897" height="1032" loading="lazy" decoding="async" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Solara</h3>
                        <p class="text-white/60 text-sm mb-6">Precision photochromic eyewear brand site with a product-led, search-ready structure.</p>
                        <a href="https://solara-pro.com/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 6: 19-81 Brewing Co. -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-092511.webp" alt="19-81 Brewing Co." width="1905" height="1026" loading="lazy" decoding="async" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">19-81 Brewing Co.</h3>
                        <p class="text-white/60 text-sm mb-6">Craft brewery and taproom site, built so ChatGPT and Gemini can read and cite it.</p>
                        <a href="https://1981brewingco.com/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-16 flex justify-center">
                <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-white text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    View Our Work
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 6: Social Proof (Google Reviews) -->
    <!-- Section 6: Social Proof (Google Reviews) - Orbiting Layout -->
    <section id="reviews" class="relative py-32 bg-[#f8fafc] text-slate-900 rounded-[3rem] mx-4 my-12 overflow-hidden">
        <style>
            @keyframes float {
                0% { transform: translateY(0px) rotate(0deg); }
                33% { transform: translateY(-15px) rotate(1deg); }
                66% { transform: translateY(-5px) rotate(-1deg); }
                100% { transform: translateY(0px) rotate(0deg); }
            }
            .float-animation {
                animation: float 8s ease-in-out infinite;
            }
            .float-delayed-1 { animation-delay: -2s; }
            .float-delayed-2 { animation-delay: -4s; }
            .float-delayed-3 { animation-delay: -6s; }
            
            #reviews .hover\:pause-animation:hover {
                animation-play-state: paused;
            }
        </style>

        <!-- Grid Background -->
        <div class="absolute inset-0 opacity-[0.08]" style="background-image: linear-gradient(#94a3b8 1px, transparent 1px), linear-gradient(90deg, #94a3b8 1px, transparent 1px); background-size: 50px 50px;"></div>
        
        <div class="relative mx-auto max-w-7xl px-6">
            
            <!-- Floating Cards Container (H2 centered behind reviews on Desktop, Stacked on Mobile) -->
            <div class="relative min-h-[800px] md:h-[1000px] w-full mt-10 flex flex-col md:block">
                
                <!-- TITLE: Top on Mobile, Centered on Desktop -->
                <div class="relative md:absolute md:inset-0 flex flex-col items-center md:justify-center text-center z-0 pointer-events-none mb-20 md:mb-0">
                    <h2 class="text-5xl md:text-[90px] font-display leading-[0.85] tracking-tighter text-black select-none">
                        TocToc Works <br />
                        <span class="italic">Wherever You Do</span>
                    </h2>
                    <div class="mt-8 md:mt-12 flex flex-col items-center gap-4">
                        <div class="flex gap-1 text-yellow-500 text-2xl md:text-3xl">★★★★★</div>
                        <div class="text-sm font-bold text-slate-400 uppercase tracking-[0.4em]">4.9/5 Rating on Google</div>
                    </div>
                </div>

                <!-- Floating Cards -->
                <div class="flex flex-col gap-6 md:block">
                    <!-- Review 1 -->
                    <div class="relative md:absolute md:top-[50px] md:left-[2%] w-full md:w-[350px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-20 md:float-animation hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-black text-white flex items-center justify-center font-bold text-xl shadow-lg">LF</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Laura Farries</div>
                                <div class="text-xs text-slate-500">Entrepreneur · Cayman Islands</div>
                            </div>
                        </div>
                        <p class="text-xl font-bold leading-[1.4] text-slate-800">
                            “Daniel and his team were genuinely a joy to work with. Thoughtful, generous, and always makes time.”
                        </p>
                    </div>

                    <!-- Review 2 -->
                    <div class="relative md:absolute md:top-[0px] md:right-[2%] w-full md:w-[380px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-30 md:float-animation md:float-delayed-1 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center font-bold text-xl shadow-inner">MT</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Mark Thompson</div>
                                <div class="text-xs text-slate-500">Creative Director · Paradise Paddle</div>
                            </div>
                        </div>
                        <p class="text-xl font-bold leading-[1.4] text-slate-800">
                            “Working with Daniel at TocToc was the best experience we’ve ever had with a marketing agency! Highly recommend.”
                        </p>
                    </div>

                    <!-- Review 3 -->
                    <div class="relative md:absolute md:top-[380px] md:left-[0%] w-full md:w-[340px] bg-white/80 backdrop-blur-xl p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-white z-10 md:float-animation md:float-delayed-2 hover:pause-animation transition-all duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 font-bold text-xl border border-slate-100">SJ</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Sarah Jenkins</div>
                                <div class="text-xs text-slate-500">Marketing Executive · UK</div>
                            </div>
                        </div>
                        <p class="text-lg font-bold leading-[1.4] text-slate-700">
                            “The AI-driven strategy they implemented doubled our leads in months. Professional, fast, and results-oriented.”
                        </p>
                    </div>

                    <!-- Review 4 -->
                    <div class="relative md:absolute md:top-[320px] md:right-[0%] w-full md:w-[350px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-40 md:float-animation md:float-delayed-3 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-yellow-100 text-yellow-800 flex items-center justify-center font-bold text-xl shadow-inner">JT</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Janice Tangub</div>
                                <div class="text-xs text-slate-500">Client · Cayman Islands</div>
                            </div>
                        </div>
                        <p class="text-lg font-bold leading-[1.4] text-slate-800">
                            “Daniel is awesome! He immensely knows the ins and outs of social media marketing and he is a great help.”
                        </p>
                    </div>

                    <!-- Review 5 -->
                    <div class="relative md:absolute md:top-[680px] md:left-[10%] w-full md:w-[360px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-30 md:float-animation md:float-delayed-1 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xl shadow-inner">SW</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Stuart Whittle</div>
                                <div class="text-xs text-slate-500">Business Owner · Cayman Islands</div>
                            </div>
                        </div>
                        <p class="text-lg font-bold leading-[1.4] text-slate-800">
                            “Very professional, awesome at what they do and great customer service on top! Can’t recommend enough.”
                        </p>
                    </div>

                    <!-- Review 6 -->
                    <div class="relative md:absolute md:top-[620px] md:right-[5%] w-full md:w-[360px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-50 md:float-animation md:float-delayed-2 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-black text-white flex items-center justify-center font-bold text-xl shadow-lg">JW</div>
                            <div>
                                <div class="font-bold text-black leading-tight">James Wilson</div>
                                <div class="text-xs text-slate-500">Tech Founder · Bipolaroid Studios</div>
                            </div>
                        </div>
                        <p class="text-xl font-bold leading-[1.4] text-slate-800">
                            “I was looking for a partner who understood the AI era. TocToc precision with a local touch. Honestly game-changer.”
                        </p>
                    </div>
                </div>

            </div>

            <div class="mt-20 flex justify-center relative z-50">
                <a href="https://www.google.com/maps/place/Toc+Toc+Marketing+-+Digital+Marketing+Agency/@19.2945176,-81.3754188,17z/data=!4m8!3m7!1s0x224ce3f8338a51c1:0xece663baba0755!8m2!3d19.2945176!4d-81.3754188!9m1!1b1!16s%2Fg%2F11t6vf_mtj?hl=en&entry=ttu&g_ep=EgoyMDI2MDQyNi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="inline-flex items-center gap-3 rounded-full border border-slate-200 bg-white px-10 py-5 text-sm font-bold text-slate-900 hover:bg-slate-50 transition-all shadow-xl hover:scale-105 decoration-none">
                    <svg viewBox="0 0 24 24" width="20" height="20" class="mr-1"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    View All Reviews
                </a>
            </div>
        </div>
    </section>

    <!-- How to Work With Us — moved below testimonials -->
    <section id="process" class="relative py-24 md:py-32">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-12">
                <div class="max-w-2xl">
                    <h2 class="text-5xl md:text-7xl text-slate-900 font-display leading-[0.9]">
                        How to <em class="italic text-sky-deep font-display">Work With Us</em>
                    </h2>
                </div>
                <p class="text-slate-500 max-w-sm text-lg">
                    A transparent, 3-step path to putting your business at the top of AI search results.
                </p>
            </div>

            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-soft">
                <div class="p-10 border-b md:border-b-0 md:border-r border-slate-50 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">01</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h3 class="text-2xl text-slate-900 font-display mb-4">Discovery &amp; Strategy</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">We discuss your business goals, audit your current digital footprint, and map out a custom AI Search Visibility plan tailored to your industry.</p>
                </div>
                <div class="p-10 border-b md:border-b-0 md:border-r border-slate-50 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">02</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h3 class="text-2xl text-slate-900 font-display mb-4">Build &amp; Optimize</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Our team sets up your digital profiles for AI crawlers, optimizes your local data feeds, and builds your high-speed website foundation.</p>
                </div>
                <div class="p-10 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">03</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h3 class="text-2xl text-slate-900 font-display mb-4">Get Cited &amp; Grow</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Your business becomes the recommended answer in modern search engines like ChatGPT and Gemini, turning AI discovery traffic into a steady stream of new leads.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Case Studies (Hidden for now)
    <section class="relative py-24 md:py-32 bg-slate-950 text-white border-t border-white/5">
        ...
    </section>
    -->

    <?php /* Los plugins que publicamos. Va aqui, despues de los servicios y
             antes de las preguntas: quien llego hasta este punto ya sabe que
             hacemos, y esto es la prueba de que lo hacemos. */ ?>
    <section id="plugins" class="relative py-24 md:py-32 bg-slate-950 text-white rounded-[3rem] mx-4 my-12 overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-sky-deep blur-[120px] rounded-full"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-6xl px-6 grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Open source &middot; GPL</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">
                    We publish the tools <em class="italic text-accent font-display">we build for ourselves.</em>
                </h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed max-w-md">
                    Every plugin came out of a real problem on a client site in Grand Cayman. They are free, GPL-licensed, and anyone can install them &mdash; starting with a one-click theme deploy from GitHub, backup and rollback included.
                </p>
                <a href="/plugins/" class="mt-10 inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-6 pr-2 py-2 text-base font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    See our plugins
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-950 text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </span>
                </a>
            </div>
            <a href="/plugins/" class="block decoration-none">
                <img src="https://toctoc.ky/wp-content/uploads/2026/09/ag-theme-sync-for-github-cover.webp"
                     alt="AG Theme Sync for GitHub, a free WordPress plugin by TocToc"
                     width="1600" height="840" loading="lazy" decoding="async"
                     class="w-full h-auto rounded-[1.75rem] border border-white/10 shadow-glass" />
            </a>
        </div>
    </section>

    <?php
    // Visible FAQ + matching FAQPage schema (answers must exist in the DOM for
    // AI answer engines to trust and quote them).
    toctoc_render_faq( [
        [
            'q' => 'What is the AI Search Visibility Framework?',
            'a' => 'The AI Search Visibility Framework is TocToc Marketing\'s three-phase system for Cayman businesses: Get Recommended (discovery and AI visibility), Get Chosen (a high-speed website foundation AI loves to crawl), and Stay Recommended (ongoing optimization, content and reviews). The goal is to make your business a source ChatGPT, Gemini and Google can find, trust and cite when someone asks for a recommendation in your category.',
        ],
        [
            'q' => 'Do you offer SEO services in the Cayman Islands?',
            'a' => 'Yes. TocToc Marketing is a leading AI Search Optimization agency in the Cayman Islands covering SEO, AEO and GEO — ranking businesses on Google and getting them recommended by AI assistants like ChatGPT and Gemini.',
        ],
        [
            'q' => 'Can you really get my business recommended by ChatGPT and Gemini?',
            'a' => 'We have successfully influenced AI-generated local recommendations for Cayman businesses. In recorded sessions, ChatGPT and Gemini named Uncle Liu, Coconut Room, Lucky Rabbit and 19-81 Brewing Co. when asked for recommendations in their categories. What nobody can honestly promise is a specific position: these systems are non-deterministic, and their answers shift with how the question is worded, where the person is and when they ask. What we can do is the work that makes your business eligible to be cited at all — and hand you the prompts so you can check for yourself.',
        ],
        [
            'q' => 'How long does it take to appear in AI search results?',
            'a' => 'Our base build takes 3 days, and most local Cayman businesses see measurable movement in 3 to 6 months, with compounding growth after that as citations and authority accumulate.',
        ],
        /*
         * Four added 10 Aug 2026. The home page draws 146 impressions through
         * Google's generative features but only 1.0% of its total, the weakest
         * ratio of any page here — against 13.2% on the AI Search Optimization
         * page, which carries twice as many FAQ entries. Passage extraction is
         * the mechanism, so the fix is more answerable questions, drawn from
         * queries the site already receives: "best marketing agency cayman"
         * (388 impressions at position 11.3) and "top creative agencies in
         * cayman" (155 at 10.1) are both unanswered anywhere on the site.
         */
        [
            'q' => 'Who is the best marketing agency in the Cayman Islands?',
            'a' => 'No agency can honestly declare itself the best, so judge on evidence you can check yourself: published client work you can visit, reviews from named clients, and results shown with the source data rather than asserted. TocToc Marketing holds 4.8 out of 5 across 24 reviews and publishes case studies with the Search Console figures behind them — a 305% organic increase for Prime Group and a 469% rise in leads for TintXKing, each measured against the same quarter a year earlier. Ask every agency on your shortlist for the same.',
        ],
        [
            'q' => 'What does a marketing agency in Grand Cayman cost?',
            'a' => 'Cost depends on your category rather than your size, because what you are really buying is the effort needed to outrank whoever is currently ahead of you. A restaurant on Seven Mile Beach sits in a far denser market than a specialist service on the east side, and the work scales accordingly. We quote after one call and will say plainly if the budget you have in mind will not be enough to change anything.',
        ],
        [
            'q' => 'Do you work with small businesses, or only large companies?',
            'a' => 'Most of our clients are small, owner-run Cayman businesses — restaurants, a brewery, a boutique, a detailing shop, a counselling practice. Small businesses tend to benefit most from this work, because AI assistants answer questions about local services constantly and a well-structured small business can outrank a much larger competitor that never bothered with the technical groundwork.',
        ],
        [
            'q' => 'Do I still need SEO if AI assistants are replacing search?',
            'a' => 'Yes, because they draw on the same foundation. ChatGPT, Gemini and Google\'s AI answers are assembled from crawlable, well-structured web content — the very thing SEO produces. What changes is the target: instead of competing for a blue link, you are competing to be the source an assistant quotes. Sites that neglected the technical basics are invisible to both.',
        ],
    ], 'FAQ', 'Quick Questions, <em class="italic text-sky-deep font-display">Answered</em>' );
    ?>

    <!-- Section 8: Final Call to Action -->
    <section id="contact" class="relative py-32 md:py-48 overflow-hidden bg-gradient-to-b from-background via-sky-pale to-sky-light/30">
        <div class="relative mx-auto max-w-5xl px-6 text-center flex flex-col items-center">
            <h2 class="text-4xl sm:text-6xl md:text-7xl leading-[1.02] text-slate-950 font-display">
                Ready to put your business in <br /><em class="italic font-display">AI Search?</em>
            </h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 max-w-xl mx-auto">
                Let’s talk about your business and how we can turn your brand into the recommended answer.
            </p>
            <a href="tel:+13455478120" class="group mt-12 inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-transform hover:scale-[1.05] decoration-none">
                Call Us
                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                </span>
            </a>
        </div>
    </section>
    <!-- Free SEO Checker CTA -->
    <?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
