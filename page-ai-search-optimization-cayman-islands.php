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
        'poster'   => '',
    ),
    array(
        'headline' => 'How we got our client recommended #1 by ChatGPT &amp; Gemini &#127836;',
        'desc'     => 'Video proof showing Lucky Rabbit instantly recommended by ChatGPT and Gemini as the #1 Japanese restaurant near Prospect, showcasing high visibility in local AI search results.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-japanese-2-1.mp4',
        'poster'   => '',
    ),
    array(
        'headline' => 'How we made our client the #1 brewery on ChatGPT &amp; Gemini &#127866;',
        'desc'     => 'A demonstration of 19-81 Brewing Co. cited as the undisputed #1 craft brewery with a taproom in Grand Cayman by ChatGPT and Gemini, confirming their digital authority.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-1.mp4',
        'poster'   => '',
    ),
);

// Table of contents — anchors match the section ids below.
$ai_toc = array(
    array( '#video-proof',     'Live Video Proof: Results for Cayman Brands' ),
    array( '#what-we-do',      'What We Do: Our 4 Core AI Visibility Steps' ),
    array( '#how-we-do-it',    'How We Do It: Our 3-Step Execution Process' ),
    array( '#traditional-seo', 'Why Traditional SEO is Failing Your Business' ),
    array( '#faq',             'Frequently Asked Questions' ),
);

// Section 2 — the four things we actually build and manage.
$ai_core_steps = array(
    array(
        'n'      => '1',
        'title'  => 'We Build a High-Speed, AI-Ready Website From Scratch.',
        'body'   => 'If you already have one, we keep it and deeply improve its backend structure. If your current site is too slow or outdated to crawl, we will discuss a full or partial redesign to make it perfect.',
        'behind' => 'AI assistants don&rsquo;t read websites the way humans do; they scan hidden code in the background. We inject specialized Schema Markup into your site code. This hands ChatGPT and Gemini your exact location, hours, and services on a silver platter.',
    ),
    array(
        'n'      => '2',
        'title'  => 'We Sync Your Business Details Across Maps and Core Social Profiles.',
        'body'   => 'We fully clean up, sync, and lock down your exact business name, address, phone number, and services across Google Maps, Apple Maps, local directories, LinkedIn, Facebook, and Instagram.',
        'behind' => 'Before an AI engine risks recommending you, it runs an automated web background check to verify you are a real, active company. Mismatched details across different apps confuse the AI, but a perfectly synchronized network of profiles forces them to trust you.',
    ),
    array(
        'n'      => '3',
        'title'  => 'We Restructure Your Content to Answer Real Conversational Questions.',
        'body'   => 'We take your business knowledge and turn it into deep-dive website blogs, LinkedIn articles, and visual micro-content. We explicitly write and format these assets to serve as direct, definitive answers to consumer queries.',
        'behind' => 'People don&rsquo;t type short keyword phrases into AI engines anymore; they ask full sentences like, &ldquo;Where is the best place to get authentic Chinese food open right now?&rdquo; We format your content so AI tools can instantly scan, summarize, and deliver your brand as their live recommendation.',
    ),
    array(
        'n'      => '4',
        'title'  => 'We Provide Continuous Monthly Maintenance and Weekly Performance Updates.',
        'body'   => 'We don&rsquo;t just set it and forget it. We perform weekly technical health checks on your website, continuously feed the algorithms fresh content, and monitor your live positioning.',
        'behind' => 'AI algorithms never stop changing, and competitors will try to outrank you. By running weekly optimization updates and tracking exactly how tools like ChatGPT and Gemini cite your brand, we protect and defend your #1 spot.',
    ),
);

// Section 3 — the execution timeline.
$ai_process = array(
    array(
        'n'     => '01',
        'title' => 'Discovery &amp; Strategy',
        'body'  => 'We analyze your current digital footprint, audit how AI engines view your competitors, and map out your custom AI Search Visibility blueprint.',
        'items' => array(),
    ),
    array(
        'n'     => '02',
        'title' => 'The 3-Day Base Build',
        'body'  => 'Once the strategy is locked in, our team sets up your core digital foundation. This initial launch takes exactly 3 days to build and complete, delivering:',
        'items' => array(
            'Your new or deeply improved, high-speed website.',
            'A fully optimized professional LinkedIn profile featuring your first deep-dive article.',
            'Updated, fully aligned Instagram and Facebook profiles.',
            'A newly launched or fully optimized YouTube channel featuring at least one high-value video introducing your company.',
            '3 high-impact social media posts &ldquo;chunked&rdquo; directly out of your main LinkedIn article.',
        ),
    ),
    array(
        'n'     => '03',
        'title' => 'Ongoing Maintenance &amp; Monitoring',
        'body'  => 'AI search engines favor consistent activity. To scale your visibility and defend your rankings, we transition into a monthly growth schedule:',
        'items' => array(
            'We run weekly technical updates and monitoring to ensure your website remains at peak crawling speed.',
            'We produce and publish at least one deep-dive LinkedIn and website article per month to expand your AI keyword footprint.',
            'We continuously repurpose that monthly article into video and image content chunks for your YouTube, Instagram, and Facebook feeds, proving to AI engines that your brand is completely verified and trusted.',
        ),
    ),
);

// FAQ — visible accordion + FAQPage schema (what AI answer engines actually read).
$ai_faqs = array(
    array(
        'q' => 'Will this get my business recommended by ChatGPT and Gemini?',
        'a' => 'Yes — that is the entire goal. We build your Local Knowledge Graph across Google Maps, Apple Maps, directories and reviews, then add Schema markup and Answer Engine Optimization so AI assistants read your business as the trusted, definitive answer. We are already delivering #1 recommendations on ChatGPT and Gemini for Cayman businesses like Uncle Liu, Coconut Room, Lucky Rabbit and 19-81 Brewing Co.',
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
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero -->
    <section class="relative pt-48 pb-24 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                    AI Search Visibility &amp; Optimization Services
                </div>
                <h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-slate-900">
                    Make Your Business the <em class="italic text-sky-deep font-display">#1 Choice</em> on ChatGPT, Gemini, and Google
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-slate-600 leading-relaxed max-w-3xl">
                    We deploy the AI Search Visibility Framework to ensure your Cayman Islands brand is the definitive recommendation when customers ask AI assistants for local solutions.
                </p>
                <div class="mt-12 flex flex-wrap gap-4">
                    <a href="tel:+13455478120" class="group inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                        Call Us Today
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro -->
    <section class="pb-12 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl space-y-6">
                <p class="text-xl text-slate-700 leading-relaxed">
                    Traditional search has changed. Customers are no longer just typing &ldquo;Cayman restaurant&rdquo; into Google&mdash;they are asking their phones full, conversational questions. If your business isn&rsquo;t set up for this shift, AI engines won&rsquo;t even know you exist.
                </p>
                <p class="text-xl text-slate-700 leading-relaxed">
                    We take care of all the complex technical heavy lifting so your business is always the first one recommended.
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

    <!-- 1. Live Video Proof -->
    <section id="video-proof" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-14">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; Proof, not promises</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Live Video Proof: <em class="italic text-sky-deep font-display">Results for Cayman Brands</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    We don&rsquo;t just talk about the future of search&mdash;we&rsquo;ve already coded our clients into the top spots. Here is the real-world proof of Cayman businesses dominating ChatGPT and Gemini today.
                </p>
            </div>
            <div class="grid gap-8 md:grid-cols-3">
                <?php foreach ( $ai_proof as $pv ) : ?>
                <figure class="flex flex-col items-center text-center">
                    <div class="relative aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] bg-slate-950 shadow-soft ring-1 ring-slate-100">
                        <video class="w-full h-full object-cover" controls preload="none" data-ttlazy playsinline <?php echo $pv['poster'] ? 'poster="' . esc_url( $pv['poster'] ) . '"' : ''; ?>>
                            <source src="<?php echo esc_url( $pv['mp4'] ); ?>#t=0.1" type="video/mp4">
                        </video>
                        <div class="pointer-events-none absolute inset-x-0 top-0 z-10 px-4 pt-4 pb-10 bg-gradient-to-b from-black/85 via-black/45 to-transparent">
                            <span class="block text-left text-sm font-bold text-white leading-snug drop-shadow-md"><?php echo wp_kses_post( $pv['headline'] ); ?></span>
                        </div>
                    </div>
                    <figcaption class="mt-5 max-w-[300px]">
                        <span class="block text-sm text-slate-500 leading-relaxed"><?php echo wp_kses_post( $pv['desc'] ); ?></span>
                    </figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    // VideoObject schema for the proof clips.
    toctoc_render_video_schema( array_map( function ( $pv ) {
        return array(
            'name'         => wp_strip_all_tags( html_entity_decode( $pv['headline'], ENT_QUOTES, 'UTF-8' ) ),
            'description'  => wp_strip_all_tags( html_entity_decode( $pv['desc'], ENT_QUOTES, 'UTF-8' ) ),
            'contentUrl'   => $pv['mp4'],
            'thumbnailUrl' => toctoc_og_image_url( 'video-' . substr( md5( $pv['mp4'] ), 0, 8 ), wp_strip_all_tags( html_entity_decode( $pv['headline'], ENT_QUOTES, 'UTF-8' ) ), 'https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg' ),
            'uploadDate'   => '2026-07-17',
        );
    }, $ai_proof ) );
    ?>

    <!-- 2. What We Do: 4 core steps -->
    <section id="what-we-do" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">02 &middot; What We Do</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">What We Do: <em class="italic text-sky-deep font-display">Our 4 Core AI Visibility Steps</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    Instead of just ranking you in old-school blue links, we actively build your brand&rsquo;s presence inside the databases that fuel AI search engines. Here is exactly what we build and manage for your business:
                </p>
            </div>

            <div class="mt-14 space-y-6">
                <?php foreach ( $ai_core_steps as $s ) : ?>
                <article class="rounded-[2.5rem] border border-slate-100 bg-slate-50 p-8 md:p-10 shadow-soft">
                    <div class="flex flex-col md:flex-row md:items-start gap-6 md:gap-8">
                        <span class="shrink-0 inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-slate-950 text-white text-2xl font-display">
                            <?php echo esc_html( $s['n'] ); ?>
                        </span>
                        <div class="flex-1">
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep mb-2">Step <?php echo esc_html( $s['n'] ); ?></p>
                            <h3 class="text-2xl md:text-3xl font-display text-slate-900 leading-snug"><?php echo wp_kses_post( $s['title'] ); ?></h3>
                            <p class="mt-4 text-lg text-slate-600 leading-relaxed"><?php echo wp_kses_post( $s['body'] ); ?></p>

                            <div class="mt-6 rounded-[1.5rem] border border-sky-deep/15 bg-sky-pale/40 p-6">
                                <p class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.15em] text-sky-deep mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                    How this works behind the scenes
                                </p>
                                <p class="text-base text-slate-600 leading-relaxed"><?php echo wp_kses_post( $s['behind'] ); ?></p>
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 3. How We Do It: 3-step execution -->
    <section id="how-we-do-it" class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">03 &middot; Our Process</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">How We Do It: <em class="italic text-accent font-display">Our 3-Step Execution Process</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    We take the complexity out of the equation. Here is the exact framework we use to take your business from hidden to highly cited:
                </p>
            </div>

            <div class="mt-14 space-y-10">
                <?php foreach ( $ai_process as $p ) : ?>
                <article class="flex flex-col md:flex-row gap-6 md:gap-10 border-t border-white/10 pt-10">
                    <div class="shrink-0 md:w-40">
                        <span class="text-5xl md:text-6xl font-display text-accent leading-none"><?php echo esc_html( $p['n'] ); ?></span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl md:text-3xl font-display leading-snug"><?php echo wp_kses_post( $p['title'] ); ?></h3>
                        <p class="mt-4 text-lg text-white/60 leading-relaxed"><?php echo wp_kses_post( $p['body'] ); ?></p>
                        <?php if ( ! empty( $p['items'] ) ) : ?>
                        <ul class="mt-6 space-y-3">
                            <?php foreach ( $p['items'] as $li ) : ?>
                            <li class="flex items-start gap-3 text-white/70 leading-relaxed">
                                <span class="shrink-0 mt-1 inline-flex items-center justify-center w-5 h-5 rounded-full bg-accent/20 text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                                </span>
                                <span><?php echo wp_kses_post( $li ); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. Why Traditional SEO is Failing -->
    <section id="traditional-seo" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">04 &middot; Generative Engine Optimization</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Why Traditional SEO is <em class="italic text-sky-deep font-display">Failing Your Business</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    Traditional SEO was built for short, static keywords. Today, the market has shifted to <strong class="font-semibold text-slate-900">Conversational Queries</strong>&mdash;meaning customers are asking highly specific, full-sentence questions like, &ldquo;Where is the best place to get authentic Chinese food on Seven Mile Beach open right now?&rdquo;
                </p>
                <p class="mt-6 text-lg text-slate-600 leading-relaxed">To win these modern searches, we deploy <strong class="font-semibold text-slate-900">Generative Engine Optimization (GEO)</strong>:</p>
            </div>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-white shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">AI-Ready Content</div>
                    <p class="text-slate-600 leading-relaxed">We structure, format, and optimize your website&rsquo;s information so AI tools can instantly read and summarize it.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-white shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Instant Recommendations</div>
                    <p class="text-slate-600 leading-relaxed">Instead of just ranking you in a list of blue links, GEO ensures AI engines dynamically generate a live recommendation that features your business first.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. FAQ -->
    <section id="faq" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">05 &middot; FAQ</span>
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
                    <p class="mt-5 text-base md:text-lg leading-relaxed text-slate-600"><?php echo esc_html( $faq['a'] ); ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-5xl px-6">
            <h2 class="text-4xl sm:text-6xl md:text-7xl leading-[1.02] text-slate-950 font-display">
                Claim Your #1 Spot in the <br /><em class="italic font-display text-sky-deep">AI Search Era</em>
            </h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                Don&rsquo;t let your competitors get coded into the algorithms first. Let&rsquo;s talk today and secure your brand as the recommended answer.
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
echo wp_json_encode(
    array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => 'AI Search Visibility & Optimization Services',
        'serviceType' => 'AI Search Optimization (SEO, AEO & GEO)',
        'provider'    => array(
            '@type' => 'ProfessionalService',
            '@id'   => 'https://toctoc.ky',
            'name'  => 'TocToc Marketing',
        ),
        'areaServed'  => array(
            '@type' => 'Place',
            'name'  => 'Cayman Islands',
        ),
        'description' => 'AI Search Optimization for Cayman Islands businesses: SEO, Answer Engine Optimization (AEO) and Generative Engine Optimization (GEO) that make your brand the recommended answer on ChatGPT, Gemini and Google. We build a high-speed AI-ready website, sync your business details across Google Maps, Apple Maps and core social profiles, restructure your content to answer conversational questions, and provide continuous monthly maintenance with weekly performance updates.',
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
                return array(
                    '@type'          => 'Question',
                    'name'           => $f['q'],
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text'  => $f['a'],
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
