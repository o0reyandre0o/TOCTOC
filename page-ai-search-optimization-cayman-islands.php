<?php
/**
 * Template Name: AI Search Optimization Cayman
 * Template Post Type: page
 *
 * Create a WordPress page with slug "ai-search-optimization-cayman-islands"
 * to publish it (replaces the old "seo-agency-services-cayman-islands" page;
 * a 301 redirect from the old slug is handled in functions.php).
 */
get_header();

// Video proof — same clips as the homepage, with page-specific on-video headlines.
$ai_proof = array(
    array(
        'headline' => 'How we ranked our clients #1 &amp; #2 on ChatGPT &amp; Gemini! &#128081;',
        'desc'     => 'A search demonstration showing Prime Group&rsquo;s Uncle Liu and Coconut Room ranked as the #1 and #2 best Chinese restaurants on Seven Mile Beach by both ChatGPT and Gemini.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-chinese-1-1.mp4',
        'poster'   => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-chinese-cover.webp',
    ),
    array(
        'headline' => 'How we got our client recommended #1 by ChatGPT &amp; Gemini &#127836;',
        'desc'     => 'Video proof showing Lucky Rabbit instantly recommended by ChatGPT and Gemini as the #1 Japanese restaurant near Prospect, showcasing high visibility in local AI search results.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-japanese-2-1.mp4',
        'poster'   => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-japanese-cover.webp',
    ),
    array(
        'headline' => 'How we made our client the #1 brewery on ChatGPT &amp; Gemini &#127866;',
        'desc'     => 'A demonstration of 19-81 Brewing Co. cited as the undisputed #1 craft brewery with a taproom in Grand Cayman by ChatGPT and Gemini, confirming their digital authority.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-1.mp4',
        'poster'   => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-cover.webp',
    ),
);

// Table of contents — anchors match the section ids below.
$ai_toc = array(
    array( '#how-it-works', 'How It Works: Our Simple 2-Phase Plan' ),
    array( '#guarantee',    'Our 90-Day Result Guarantee' ),
    array( '#exclusivity',  'Industry Exclusivity: One Business Per Category' ),
    // Local SEO dropped from here on 10 Aug 2026 along with its section; the
    // FAQ entry now carries that content and the anchor below points at it.
    array( '#faq',          'FAQ: Local SEO, Pricing, Timelines &amp; How This Differs' ),
);

// Phase 1 — the AI Foundation Build. Each point pairs with a 3-website collage.
$ai_phase1 = array(
    array(
        'title' => 'A Fast, AI-Ready Website',
        'body'  => 'We build a brand-new website (or deeply upgrade your existing site) designed for instant mobile speed. We install hidden background code that translates your exact services, location, and hours directly into AI language.',
        'img'   => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-aisearch-imgs.png',
        'imgs'  => array( 2, 9, 4 ),
    ),
    array(
        'title' => 'Automated 5-Star Review System',
        'body'  => 'AI search engines heavily prioritize customer reviews. We install an automated system that texts your happy customers a 1-tap link to leave a Google review right after they do business with you.',
        'img'   => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-aisearch-imgs-2.png',
        'imgs'  => array( 10, 5, 3 ),
    ),
    array(
        'title' => 'Google Maps, Apple Maps &amp; LinkedIn Synchronization',
        'body'  => 'We clean up, verify, and lock down your exact business details across Google Maps, Apple Maps, TripAdvisor, and your official LinkedIn Company Page so search bots see matching, verified information everywhere.',
        'img'   => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-aisearch-imgs-3.png',
        'imgs'  => array( 6, 8, 0 ),
    ),
    array(
        'title' => 'Branded YouTube Channel Setup',
        'body'  => 'We create and optimize a dedicated YouTube channel for your business, complete with an initial introductory video asset to give you an immediate video footprint in Cayman.',
        'img'   => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-aisearch-imgs-5.png',
        'imgs'  => array( 1, 7, 11 ),
    ),
);

// Phase 2 — Monthly Protection & Growth.
$ai_phase2 = array(
    array(
        'title' => 'Weekly Search Bot Maintenance',
        'body'  => 'We run weekly technical updates to keep search engine crawlers actively visiting and indexing your website.',
    ),
    array(
        'title' => '1 Monthly Authority Article (Website &amp; LinkedIn) + Social Chunking',
        'body'  => 'We write one detailed industry article about your business expertise, publish it directly to your website and LinkedIn, then turn it into short video and image posts for YouTube, Instagram, and Facebook.',
    ),
    array(
        'title' => 'Monthly AI Ranking Audits',
        'body'  => 'Every 30 days, we test ChatGPT, Gemini, and Google Maps with real customer questions to track your market share against local rivals.',
    ),
);

// FAQ — visible accordion + FAQPage schema (what AI answer engines actually read).
$ai_faqs = array(
    array(
        'q' => 'Will this get my business recommended by ChatGPT and Gemini?',
        'a' => 'Yes — that is the entire goal. We build your Local Knowledge Graph across Google Maps, Apple Maps, directories and reviews, then add Schema markup and Answer Engine Optimization so AI assistants read your business as the trusted, definitive answer. We are already delivering #1 recommendations on ChatGPT and Gemini for Cayman businesses like Uncle Liu, Coconut Room, Lucky Rabbit and 19-81 Brewing Co.',
    ),
    /*
     * This entry absorbed the standalone "Local SEO Services in the Cayman
     * Islands" section that used to sit near the top of the page (moved
     * 10 Aug 2026). It replaced a two-line answer on the same subject rather
     * than being added alongside it, so the page states this once instead of
     * twice. The full section content is kept verbatim — three paragraphs and
     * the SEO/AEO/GEO cards — because "local seo company in cayman islands"
     * draws 659 impressions and this is the passage that answers it.
     */
    array(
        'q' => 'Do you offer local SEO services in the Cayman Islands?',
        'a' => '<p>Yes &mdash; local SEO is the foundation of this service, not a separate package. Before an AI assistant can recommend you, it has to be able to find and verify you &mdash; and it reads the same signals Google does. That makes local SEO the foundation of everything on this page, not a separate product. As an <strong class="font-semibold text-slate-900">SEO agency in Cayman</strong>, we start with the unglamorous work: your Google Business Profile, your NAP consistency across every directory, your site speed, your internal linking and your Schema markup.</p>'
            . '<p>That base is what earns you the map pack for &ldquo;near me&rdquo; searches in George Town and along Seven Mile Beach. It is also, increasingly, what ChatGPT and Gemini cite when a visitor asks them for a recommendation instead of typing into Google. The work is the same; the payoff now lands in two places at once.</p>'
            . '<p>So when businesses come to us looking for a <strong class="font-semibold text-slate-900">local SEO company in the Cayman Islands</strong>, this is that service &mdash; with the answer-engine layer built in rather than sold separately. Classic <strong class="font-semibold text-slate-900">SEO services in Cayman</strong> get you ranked. AEO and GEO get you recommended. You need both, and neither works without the other.</p>'
            . '<div class="grid gap-4 sm:grid-cols-3 pt-2">'
            . '<div class="rounded-[1.5rem] border border-slate-100 bg-white p-6 shadow-soft">'
            . '<h3 class="text-xl font-display text-slate-900 mb-2">SEO</h3>'
            . '<p class="text-sm leading-relaxed text-slate-500">Technical foundations, local citations and Google Business Profile &mdash; so you rank in Cayman search results and the map pack.</p></div>'
            . '<div class="rounded-[1.5rem] border border-slate-100 bg-white p-6 shadow-soft">'
            . '<h3 class="text-xl font-display text-slate-900 mb-2">AEO</h3>'
            . '<p class="text-sm leading-relaxed text-slate-500">Answer Engine Optimization &mdash; structured, quotable content that wins featured snippets and voice results.</p></div>'
            . '<div class="rounded-[1.5rem] border border-slate-100 bg-white p-6 shadow-soft">'
            . '<h3 class="text-xl font-display text-slate-900 mb-2">GEO</h3>'
            . '<p class="text-sm leading-relaxed text-slate-500">Generative Engine Optimization &mdash; the entity and citation work that makes AI assistants name your business.</p></div>'
            . '</div>',
    ),
    array(
        'q' => 'How much do SEO services cost in the Cayman Islands?',
        'a' => 'There is no fixed price list. What you need depends on your industry, how competitive your category is locally, and whether you are starting from a working website or from scratch. We build a custom monthly plan and quote it transparently after a free strategy call — the base build takes 3 days, then ongoing work is billed monthly and you can cancel anytime.',
    ),
    array(
        'q' => 'What is the difference between SEO, AEO and GEO?',
        'a' => 'SEO (Search Engine Optimization) gets you ranked on Google. AEO (Answer Engine Optimization) gets your business quoted as the direct answer in featured snippets and voice search. GEO (Generative Engine Optimization) gets you recommended by AI assistants like ChatGPT, Gemini and Perplexity. Our AI Search Optimization covers all three, because in 2026 your customers search across all of them.',
    ),
    array(
        'q' => 'How long does it take to show up in AI search results?',
        'a' => 'The base build takes 3 days, but visibility compounds after that. Most local Cayman businesses see measurable movement in 3 to 6 months, with growth continuing from there. Cleaning up your Google Business Profile and local data can lift visibility faster, while becoming the default AI recommendation in a competitive category takes sustained authority and citation building.',
    ),
    array(
        'q' => 'Do you work with small, local Cayman businesses?',
        'a' => 'Yes. We work with small and local businesses across Grand Cayman — restaurants, hospitality, retail, professional services and more — with a plan scaled to your industry, competition and budget.',
    ),
    array(
        'q' => 'How is this different from traditional SEO?',
        'a' => 'Traditional SEO targets short keywords and a list of blue links. AI Search Optimization targets conversational, full-sentence questions and gets your business generated as the live recommendation an AI gives — not just a ranking. We optimize your data structure, Schema and content specifically for how ChatGPT, Gemini and Google AI read and cite businesses today.',
    ),
    array(
        'q' => 'How much does AI Search Optimization cost in the Cayman Islands?',
        'a' => 'We build a custom monthly plan based on your industry, competition and goals rather than one-size-fits-all packages. Book a free strategy call and we will give you a transparent quote.',
    ),
);

$ai_sites = toctoc_showcase_sites();

// A "cool" overlapping collage of three real client websites.
$ai_collage = function ( $sites, $idx ) {
    $n = count( $sites );
    if ( ! $n ) { return; }
    $a = $sites[ $idx[0] % $n ];
    $b = $sites[ $idx[1] % $n ];
    $c = $sites[ $idx[2] % $n ];
    $shot = function ( $s ) {
        return '<img src="' . esc_url( $s['img'] ) . '" alt="' . esc_attr( wp_strip_all_tags( $s['name'] ) . ' website by TocToc' ) . '" '
            . ( ! empty( $s['w'] ) ? 'width="' . (int) $s['w'] . '" height="' . (int) $s['h'] . '" ' : '' )
            . 'loading="lazy" decoding="async" class="w-full h-auto" />';
    };
    ?>
    <div class="relative aspect-[5/4] w-full max-w-[560px] mx-auto" aria-hidden="true">
        <figure class="absolute top-0 right-0 w-[70%] rotate-[3deg] rounded-2xl overflow-hidden shadow-glass ring-1 ring-black/5 bg-white"><?php echo $shot( $b ); ?></figure>
        <figure class="absolute bottom-0 left-0 w-[62%] -rotate-[4deg] rounded-2xl overflow-hidden shadow-glass ring-1 ring-black/5 bg-white"><?php echo $shot( $a ); ?></figure>
        <figure class="absolute bottom-8 right-6 w-[44%] rotate-[6deg] rounded-2xl overflow-hidden shadow-xl ring-1 ring-black/5 bg-white z-10"><?php echo $shot( $c ); ?></figure>
    </div>
    <?php
};

// Reusable Google rating badge (aggregateRating lives in the site-wide schema graph).
$ai_google_rating = function ( $dark = false ) {
    $wrap  = $dark ? 'border-white/20 bg-white/10 text-white' : 'border-slate-200 bg-white text-slate-900 shadow-soft';
    $muted = $dark ? 'text-white/60' : 'text-slate-500';
    ?>
    <div class="inline-flex items-center gap-3 rounded-full border <?php echo esc_attr( $wrap ); ?> px-5 py-2.5">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
        <span class="text-lg font-bold leading-none">4.8</span>
        <span class="inline-flex text-amber-400" aria-hidden="true">
            <?php for ( $i = 0; $i < 5; $i++ ) : ?><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"/></svg><?php endfor; ?>
        </span>
        <span class="text-sm font-medium <?php echo esc_attr( $muted ); ?> leading-none">21 Google reviews</span>
    </div>
    <?php
};
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
                <?php toctoc_render_breadcrumbs( 'AI Search Optimization' ); ?>
                <?php /* "Local SEO" leads the H1 deliberately. When this page replaced
                         /seo-agency-services-cayman-islands/ the word "SEO" left the copy
                         entirely, and Search Console shows what it cost: the retired URL
                         still pulls 1,062 impressions while this one gets 11. The demand is
                         all in SEO language — "local seo company in cayman islands" (561
                         impressions), "seo services cayman" (319, position 4.3), "seo agency
                         cayman" (104) — and none of those words appeared on the page. */ ?>
                <h1 class="mt-2 text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                    Local SEO That Gets Your Cayman Business Recommended by <em class="italic text-accent font-display">ChatGPT, Gemini, and Google</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                    An SEO agency in the Cayman Islands built for how people search now. We handle the fast website, Google Maps &amp; LinkedIn presence, and 5-star review system that <em class="italic text-white font-display">forces AI engines to recommend your brand.</em>
                </p>
                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <a href="tel:+13455478120" class="group inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                        Call Us Today
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 text-accent transition-transform group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                    <?php $ai_google_rating( true ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro: how AI picks the winner -->
    <section class="relative py-20 md:py-28 bg-white">
        <div class="mx-auto max-w-4xl px-6">
            <div class="space-y-8 text-2xl md:text-3xl leading-[1.3] text-slate-950 font-display">
                <p>When a tourist on Seven Mile Beach or a local resident in George Town asks ChatGPT or Google, &ldquo;Where is the best place to get my car tinted?&rdquo; or &ldquo;What&rsquo;s the best local restaurant for dinner tonight?&rdquo;, AI doesn&rsquo;t give them a list of 50 blue links.</p>
                <p class="text-sky-deep italic">It picks one or two trusted businesses and gives their exact names.</p>
                <p>If your website is slow, your Google Maps or LinkedIn profile is unverified, or you don&rsquo;t have recent customer reviews, AI search tools will simply skip your business and recommend your competitor. <em class="italic text-slate-950 not-italic font-bold">We fix that.</em></p>
            </div>
        </div>
    </section>

    <!-- Local SEO: the half of this service the page never actually named -->
    <?php
    /*
     * The "Local SEO Services in the Cayman Islands" section stood here until
     * 10 Aug 2026. Its full content now lives as the second FAQ entry at the
     * bottom of the page — same three paragraphs, same SEO/AEO/GEO cards.
     */
    ?>

    <!-- Video proof -->
    <section id="video-proof" class="py-20 md:py-28 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Live proof, not promises</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Hit Play to See Our Clients&rsquo; <em class="italic text-sky-deep font-display">AI Results</em></h2>
            </div>
            <div class="grid gap-8 md:grid-cols-3">
                <?php foreach ( $ai_proof as $pv ) : ?>
                <figure class="flex flex-col items-center text-center">
                    <?php
                    // Facade, not a <video> — see toctoc_render_proof_video(). The
                    // headline gradient rides along as the overlay so it stays pinned
                    // above both the poster and the video the click builds.
                    toctoc_render_proof_video( array(
                        'mp4'     => $pv['mp4'],
                        'poster'  => $pv['poster'],
                        'label'   => wp_strip_all_tags( html_entity_decode( $pv['headline'], ENT_QUOTES, 'UTF-8' ) ),
                        'class'   => 'max-w-[280px] shadow-soft ring-1 ring-slate-100',
                        'overlay' => '<div class="pointer-events-none absolute inset-x-0 top-0 z-40 px-4 pt-4 pb-10 bg-gradient-to-b from-black/85 via-black/45 to-transparent">'
                            . '<span class="block text-left text-sm font-bold text-white leading-snug drop-shadow-md">' . wp_kses_post( $pv['headline'] ) . '</span></div>',
                    ) );
                    ?>
                    <figcaption class="mt-5 max-w-[300px]">
                        <span class="block text-sm text-slate-500 leading-relaxed"><?php echo wp_kses_post( $pv['desc'] ); ?></span>
                    </figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    /*
     * No VideoObject schema here on purpose — see the same note in front-page.php.
     * The clips are click-to-play facades with no <video> element, so no page on
     * the site claims to be a watch page any more.
     */
    ?>

    <!-- What's On This Page (table of contents) -->
    <section class="pb-20 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl rounded-[2rem] border border-slate-100 bg-slate-50 p-8 md:p-10 shadow-soft">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl font-display text-slate-900">What&rsquo;s On This Page</h2>
                    <span class="shrink-0 inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-[11px] font-bold text-sky-deep border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        2 min read
                    </span>
                </div>
                <p class="text-sm text-slate-500 mb-6">It takes about 2 minutes to read. We respect your time.</p>
                <ol class="space-y-3">
                    <?php foreach ( $ai_toc as $i => $item ) : ?>
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

    <!-- 1. How It Works: 2-Phase Plan -->
    <section id="how-it-works" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; How It Works</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Our Simple <em class="italic text-sky-deep font-display">2-Phase Plan</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    We handle all the technical work, website setup, and profile connections for you. Our service is broken into two clear, transparent phases:
                </p>
            </div>

            <!-- Phase 1 -->
            <div class="mt-16">
                <div class="flex flex-wrap items-center gap-4 mb-4">
                    <span class="inline-flex items-center justify-center rounded-full bg-slate-950 text-accent px-5 py-2 text-sm font-bold uppercase tracking-widest">Phase 1</span>
                    <h3 class="text-2xl md:text-3xl font-display text-slate-900">The AI Foundation Build</h3>
                </div>
                <p class="max-w-3xl text-lg text-slate-600 leading-relaxed">
                    In Phase 1, we build and launch the core assets your business needs to be recognized and trusted by AI search tools:
                </p>

                <div class="mt-14 space-y-16 md:space-y-24">
                    <?php foreach ( $ai_phase1 as $n => $p ) : ?>
                    <div class="grid md:grid-cols-2 gap-8 md:gap-14 items-center">
                        <div class="md:order-2">
                            <?php if ( ! empty( $p['img'] ) ) : ?>
                            <img src="<?php echo esc_url( $p['img'] ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $p['title'] ) . ' — real websites built by TocToc' ); ?>" loading="lazy" decoding="async" class="w-full h-auto max-w-[480px] mx-auto" />
                            <?php else : ?>
                            <?php $ai_collage( $ai_sites, $p['imgs'] ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="md:order-1">
                            <span class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-sky-pale text-sky-deep text-xl font-display mb-5"><?php echo (int) ( $n + 1 ); ?></span>
                            <h4 class="text-2xl md:text-3xl font-display text-slate-900 leading-tight"><?php echo wp_kses_post( $p['title'] ); ?></h4>
                            <p class="mt-4 text-lg text-slate-600 leading-relaxed"><?php echo wp_kses_post( $p['body'] ); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Phase 2 -->
            <div class="mt-20 rounded-[3rem] bg-slate-900 text-white p-8 md:p-14 shadow-glass">
                <div class="flex flex-wrap items-center gap-4 mb-4">
                    <span class="inline-flex items-center justify-center rounded-full bg-accent text-slate-950 px-5 py-2 text-sm font-bold uppercase tracking-widest">Phase 2</span>
                    <h3 class="text-2xl md:text-3xl font-display text-white">Monthly Protection &amp; Growth</h3>
                    <span class="text-xs font-bold uppercase tracking-widest text-white/50">Billed Monthly &middot; Cancel Anytime</span>
                </div>
                <p class="max-w-3xl text-lg text-white/60 leading-relaxed">
                    Once your foundation is live, we perform continuous monthly maintenance to keep your business at the top of local search results:
                </p>
                <div class="mt-12 grid md:grid-cols-3 gap-6">
                    <?php foreach ( $ai_phase2 as $p ) : ?>
                    <article class="rounded-[2rem] bg-white/5 border border-white/10 p-7">
                        <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-accent text-slate-950 mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                        </span>
                        <h4 class="text-xl font-display leading-snug"><?php echo wp_kses_post( $p['title'] ); ?></h4>
                        <p class="mt-3 text-white/60 leading-relaxed"><?php echo wp_kses_post( $p['body'] ); ?></p>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. 90-Day Result Guarantee -->
    <section id="guarantee" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-5xl px-6">
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">02 &middot; Zero Risk</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Our 90-Day <em class="italic text-sky-deep font-display">Result Guarantee</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    We take all the risk off your shoulders. When you launch Phase 1: The AI Foundation, our work is backed by a simple promise:
                </p>
            </div>
            <div class="mt-12 rounded-[2.5rem] bg-slate-950 text-white p-8 md:p-14 shadow-glass text-center">
                <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-accent text-slate-950 mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </span>
                <p class="text-2xl md:text-4xl font-display leading-[1.25] max-w-3xl mx-auto">
                    If your business is not being cited or recommended by ChatGPT or Gemini for your primary local customer searches within <em class="italic text-accent font-display">90 days</em> of launch, we perform all Phase 2 monthly updates completely <em class="italic text-accent font-display">FREE</em> until it is.
                </p>
                <p class="mt-8 text-lg text-white/60">No fine print. No excuses. We keep working until your business gets recommended.</p>
            </div>
        </div>
    </section>

    <!-- 3. Industry Exclusivity -->
    <section id="exclusivity" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">03 &middot; One Per Category</span>
                    <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Industry <em class="italic text-sky-deep font-display">Exclusivity</em></h2>
                    <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                        Because AI engines usually only recommend 1 to 3 businesses when a customer asks a question, we cannot work with direct competitors in the same market.
                    </p>
                    <p class="mt-4 text-lg text-slate-600 leading-relaxed">
                        We operate on a strict <strong class="text-slate-900">Category Exclusivity</strong> rule in the Cayman Islands, for example:
                    </p>
                    <ul class="mt-8 space-y-4">
                        <?php foreach ( array(
                            'We only accept one craft brewery.',
                            'We only accept one window tint company.',
                            'We only accept one commercial real estate agency, law firm, or luxury service provider.',
                        ) as $ex ) : ?>
                        <li class="flex items-start gap-4">
                            <span class="shrink-0 inline-flex items-center justify-center w-8 h-8 rounded-full bg-sky-pale text-sky-deep mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <span class="text-lg text-slate-700 leading-relaxed"><?php echo esc_html( $ex ); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                        Once we partner with your business, we lock out your local competitors and focus 100% of our energy on keeping your brand at the top.
                    </p>
                </div>
                <div class="rounded-[3rem] bg-slate-950 text-white p-10 md:p-14 shadow-glass text-center">
                    <span class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-white/10 text-accent mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </span>
                    <p class="text-3xl md:text-4xl font-display leading-tight">Your category. <em class="italic text-accent font-display">Locked.</em></p>
                    <p class="mt-6 text-white/60 leading-relaxed">We only recommend one business per category to the AI engines &mdash; make sure it&rsquo;s you, not your competitor.</p>
                    <div class="mt-8"><?php $ai_google_rating( true ); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-5xl px-6">
            <h2 class="text-4xl sm:text-6xl md:text-7xl leading-[1.02] text-slate-950 font-display">
                Ready to Lock In Your Business Category <br /><em class="italic font-display text-sky-deep">Before Your Competitor Does?</em>
            </h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                Let&rsquo;s talk today about building your AI Foundation and securing your spot at the top of local AI search.
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

    <!-- FAQ (kept for AEO — read near-verbatim by AI answer engines) -->
    <section id="faq" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">FAQ</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">AI Search, <em class="italic text-sky-deep font-display">Answered</em></h2>
            </div>
            <div class="max-w-4xl space-y-4">
                <?php foreach ( $ai_faqs as $faq ) : ?>
                <details class="group rounded-[1.75rem] border border-slate-100 bg-slate-50 p-7 shadow-soft transition-all open:bg-white">
                    <summary class="flex cursor-pointer items-center justify-between gap-4 text-xl md:text-2xl font-display text-slate-900 list-none [&::-webkit-details-marker]:hidden">
                        <span><?php echo esc_html( $faq['q'] ); ?></span>
                        <span class="shrink-0 inline-flex items-center justify-center w-9 h-9 rounded-full bg-sky-pale text-sky-deep transition-transform group-open:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                        </span>
                    </summary>
                    <?php /* div, not p: the local-SEO answer below carries several
                             paragraphs and a three-card grid, and nesting a <p>
                             inside a <p> makes the browser close the outer one
                             early, dropping the styling from everything after it.
                             wp_kses_post rather than esc_html for the same reason —
                             the markup in that answer has to survive. */ ?>
                    <div class="mt-5 space-y-5 text-base md:text-lg leading-relaxed text-slate-600"><?php echo wp_kses_post( $faq['a'] ); ?></div>
                </details>
                <?php endforeach; ?>
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
        'name'        => 'AI Search Visibility & Optimization Services',
        'serviceType' => 'AI Search Optimization (SEO, AEO & GEO)',
        'provider'    => array( '@id' => 'https://toctoc.ky/#organization' ),
        'areaServed'  => array( '@type' => 'Place', 'name' => 'Cayman Islands' ),
        'description' => 'AI Search Optimization for Cayman Islands businesses: a two-phase plan that makes your brand the recommended answer on ChatGPT, Gemini and Google. Phase 1 (the AI Foundation Build) delivers a fast, AI-ready website, an automated 5-star Google review system, synchronized Google Maps, Apple Maps and LinkedIn profiles, and a branded YouTube channel. Phase 2 (Monthly Protection & Growth) adds weekly search-bot maintenance, one monthly authority article with social chunking, and monthly AI ranking audits. Backed by a 90-day result guarantee and strict one-business-per-category exclusivity.',
        'url'         => 'https://toctoc.ky/ai-search-optimization-cayman-islands/',
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
                // The local-SEO answer is HTML now that it holds the old section.
                // Stripping tags naively would weld the last word of one block to
                // the first of the next ("...the other.SEO Technical..."), so tags
                // become a space first and runs of whitespace collapse after.
                $text = preg_replace( '/<[^>]+>/', ' ', $f['a'] );
                $text = trim( preg_replace( '/\s+/u', ' ', html_entity_decode( $text, ENT_QUOTES, 'UTF-8' ) ) );
                return array(
                    '@type'          => 'Question',
                    'name'           => wp_strip_all_tags( $f['q'] ),
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text'  => $text,
                    ),
                );
            },
            $ai_faqs
        ),
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
