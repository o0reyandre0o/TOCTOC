<?php
/**
 * Template Name: Digital Marketing Agency Cayman
 * Template Post Type: page
 *
 * "The Digital Marketing Agency Built for the AI Search Era" — a unified digital
 * footprint that makes the business findable, trustworthy and citable to
 * ChatGPT, Gemini and Google. No "#1" claims in the copy — see front-page.php.
 */
get_header();

// Table of contents — anchors match the section ids below.
$dm_toc = array(
    array( '#approach',    'What does a digital marketing agency actually do?' ),
    array( '#showcase',    'Featured Case Study &amp; Website Showcase' ),
    array( '#engine',      'The four things that decide whether AI finds you' ),
    array( '#boundaries',  'Who this works for, and who it does not' ),
    array( '#faq',         'Frequently Asked Questions' ),
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
    array( '1', 'Structured data, so a model can read your business', 'We build or deeply restructure your website foundation using specialized Schema Markup, ensuring ChatGPT, Gemini, and Google scan your exact location, services, and authority without friction.' ),
    array( '2', 'The same business details everywhere Google looks', 'We clean up, synchronize, and lock down your exact business details across Google Maps, Apple Maps, local directories, and primary social channels to verify your real-world legitimacy.' ),
    array( '3', 'Articles first, then the same idea as video and images', 'We write deep-dive website and LinkedIn articles that establish your industry expertise, then &ldquo;chunk&rdquo; that core insight into visual video and image assets for YouTube, Instagram, and Facebook.' ),
    array( '4', 'Weekly technical upkeep and fresh indexing requests', 'We run weekly technical updates, monitor AI citation shifts, and issue fresh indexing requests to web crawlers to keep your brand active and prioritized.' ),
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

// FAQ — visible accordion + FAQPage schema (what AI answer engines actually read).
$dm_faqs = array(
    array(
        'q' => 'What does a full-service digital marketing agency in the Cayman Islands actually do?',
        'a' => 'We unify your entire digital presence into one verified brand that search engines and AI trust. That means a high-speed, Schema-coded website, synchronized Google Maps and directory listings, optimized social profiles, and authoritative content — all engineered so ChatGPT, Gemini and Google can find your Cayman business, trust what they find, and cite it when someone asks for a recommendation.',
    ),
    array(
        'q' => 'Do you run Google Ads or paid social media campaigns?',
        'a' => 'No. We do not build or manage paid Google Ads, social ads or print ads. Ads rent attention and stop the moment you stop paying. Instead we build permanent, crawlable digital assets — websites, Schema data and authoritative content — that generate ongoing organic search leads and compound in value over time.',
    ),
    array(
        'q' => 'How is TocToc different from a traditional marketing agency?',
        'a' => 'A traditional agency sells retainers for posting, ad management and generic reporting. We build permanent digital assets and algorithmic trust: the structured data, local knowledge graph and content that make ChatGPT, Gemini and Google read your business as the definitive, trusted answer in your category.',
    ),
    array(
        'q' => 'Do you handle daily social media posting and community management?',
        'a' => 'No. We do not do daily post scheduling, stories, grid curation, DMs or comment replies. What we do is content architecture — building high-value video, image and written content "chunks" and optimizing your profiles so AI crawlers read your business as active, consistent and trusted.',
    ),
    array(
        'q' => 'How long does it take to see results?',
        'a' => 'The core website and technical foundation take a few days to build, but visibility compounds after that. Most local Cayman businesses see measurable movement in 3 to 6 months, with growth continuing from there as authority and citations build.',
    ),
    array(
        'q' => 'How much does digital marketing cost in the Cayman Islands?',
        'a' => 'We build a custom monthly plan based on your industry, competition and goals rather than one-size-fits-all packages. Book a free strategy call and we will give you a transparent quote.',
    ),
    /*
     * The four below were added 10 Aug 2026 to match queries this page already
     * receives, taken from 180 days of Search Console rather than guessed:
     * "marketing design services cayman" (657 impressions), "online marketing
     * cayman" (568), "communications agency cayman" (56) and "best marketing
     * agency cayman" (388 impressions at position 11.3).
     *
     * Each answer states the answer in its first sentence. Google's generative
     * features extract passages, not pages — which is why this page earns 82 AI
     * impressions while sitting at position 37 in the classic results, and why
     * the site's most FAQ-dense page earns 13.2% of its impressions through AI
     * against the home page's 1.0%.
     */
    array(
        'q' => 'Who is the best marketing agency in the Cayman Islands?',
        'a' => 'There is no single objective answer, so judge on evidence rather than claims: published client results you can verify, real reviews, and whether the agency actually builds assets you own. TocToc Marketing is rated 4.8 out of 5 across 24 reviews, and we publish case studies with the underlying Search Console figures — a 305% organic increase for Prime Group and a 469% rise in leads for TintXKing, both measured against the same quarter a year earlier. Ask any agency you are considering for the same kind of proof.',
    ),
    array(
        'q' => 'Do you offer marketing design and branding services in Cayman?',
        'a' => 'Yes. Design and branding run through everything we build — brand identity, the visual system for your website, and the content assets that carry it. What makes our approach different is that the design is engineered to be readable by machines as well as people: the same page that looks right to a customer is structured so Google, ChatGPT and Gemini can parse who you are, what you sell and where you are.',
    ),
    array(
        'q' => 'What is the difference between a marketing agency and a communications agency?',
        'a' => 'A communications agency focuses on message and reputation — press, public relations, internal and crisis communication. A marketing agency is responsible for demand: getting found, generating enquiries and converting them. We work on the demand side, and specifically on being found in the places people now search, which increasingly means AI assistants as much as Google.',
    ),
    array(
        'q' => 'What does online marketing cost for a small business in Grand Cayman?',
        'a' => 'It depends far more on your competition than on your size — a restaurant on Seven Mile Beach competes in a denser market than a specialist service outside George Town. We price against what it actually takes to reach the front page in your category, not by business size, and we will tell you honestly on the first call if we think the budget you have in mind is not enough to move the needle.',
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
                <?php /* This H1 said "The Digital Marketing Agency…", the same claim as
                         the front page, and Search Console showed the cost: the home
                         ranks 4.5 for "marketing agency cayman islands" while this page
                         sat at 44 for the identical term. It now claims the ground
                         nothing else covers — consulting, branding and marketing
                         services for Grand Cayman — which has real local demand and no
                         page competing for it. */ ?>
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                    <?php /*
                        "Branding" dropped 27 Aug 2026, finishing what the title
                        change on 20 Aug started — the title said Consulting
                        while this H1 still said Branding, which is the site
                        arguing with itself on the one signal Google weighs most.

                        Branding is not ours to win: on mobile in Cayman the HOME
                        ranks 4.5 for "branding and design agency cayman" and
                        this page 24.5. Chasing it here splits the signal and
                        loses to our own front page.
                    */ ?>
                    Marketing Services &amp; Consulting for <em class="italic text-accent font-display">Grand Cayman</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                    Strategy, branding and campaigns from one local team &mdash; and every piece built so ChatGPT, Gemini and Google read your business as the Cayman authority.
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
    <section id="approach" class="relative py-24 md:py-32 overflow-hidden bg-sky-pale/50 scroll-mt-28">
        <img src="<?php echo esc_url( toctoc_clouds_src() ); ?>" srcset="<?php echo esc_attr( toctoc_clouds_srcset() ); ?>" sizes="100vw" alt="" aria-hidden="true" width="1920" height="1280" loading="lazy" decoding="async" class="absolute inset-0 w-full h-full object-cover object-bottom" />
        <div class="absolute inset-0 bg-gradient-to-b from-white/95 via-white/60 to-white/70 z-[1]"></div>
        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; The Value We Bring</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">What does a digital marketing agency <em class="italic text-sky-deep font-display">actually do?</em></h2>
                <p class="mt-8 text-lg text-slate-700 leading-relaxed">
                    A digital marketing agency runs the work that makes a business findable and credible online: the website, the search listings, the content and the advertising. In the Cayman Islands that now includes a fifth job &mdash; being readable by ChatGPT, Gemini and Google&rsquo;s AI answers, which increasingly decide what a customer sees before any website does.
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
                            <?php
                            // Facade, not a <video> — see toctoc_render_proof_video().
                            toctoc_render_proof_video( array(
                                'mp4'     => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-1.mp4',
                                'poster'  => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-cover.webp',
                                'label'   => '19-81 Brewing named by ChatGPT and Gemini',
                                'class'   => 'max-w-[280px] shadow-soft ring-1 ring-white/10',
                                'overlay' => '<div class="pointer-events-none absolute inset-x-0 top-0 z-40 px-4 pt-4 pb-10 bg-gradient-to-b from-black/85 via-black/45 to-transparent">'
                                    . '<span class="block text-left text-sm font-bold text-white leading-snug drop-shadow-md">How 19-81 Brewing shows up in ChatGPT &amp; Gemini &#127866;</span></div>',
                            ) );
                            ?>
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
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">The four things that decide <em class="italic text-accent font-display">whether AI finds you</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    Four things, in this order. We measured a typical Cayman business site in August 2026 and found that 91% of its search impressions came from rank-tracking software rather than people &mdash; which is why we start with what a machine can actually read about you, not with volume:
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
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">Who this works for, <em class="italic text-accent font-display">and who it does not</em></h2>
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

    <!-- 5. FAQ -->
    <section id="faq" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">05 &middot; FAQ</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Your Questions, <em class="italic text-sky-deep font-display">Answered</em></h2>
            </div>
            <div class="max-w-4xl space-y-4">
                <?php foreach ( $dm_faqs as $faq ) : ?>
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

    <!-- Free SEO Checker CTA -->
    <?php toctoc_render_checker_cta(); ?>

</main>

<?php ob_start(); ?>
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
		'Website Development',
		'Fast, hand-coded business and restaurant websites — five live Cayman restaurant builds.',
		'https://toctoc.ky/website-design-agency-cayman-islands/',
	),
	array(
		'E-commerce & Web App Development',
		'Online stores, booking platforms and internal tools for Cayman businesses.',
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
<?php toctoc_schema_add_raw( ob_get_clean() ); ?>

<?php ob_start(); ?>
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
			$dm_faqs
		),
	),
	JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
<?php toctoc_schema_add_raw( ob_get_clean() ); ?>

<?php get_footer(); ?>
