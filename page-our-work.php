<?php
/**
 * Template Name: Our Work
 * Template Post Type: page
 *
 * Create a WordPress page with slug "our-work" to publish it at /our-work/.
 */
get_header();

/**
 * TintXKing sales lift.
 *
 * Left empty on purpose: this is a real client sales figure and must not be
 * invented. Set it (e.g. '25%') and the sentence below picks it up automatically.
 * While it is empty the copy renders without a specific number, so the page is
 * always safe to publish.
 */
$ow_tint_lift = '';

// Table of contents — anchors match the section ids below.
$ow_toc = array(
    array( '#zero-to-one',    'Understanding &ldquo;Zero-to-One&rdquo; Visibility (Our Metric for Success)' ),
    array( '#case-1981',      'Case Study: 19-81 Brewing Co. (Craft Brewery)' ),
    array( '#case-prime',     'Case Study: Prime Group (Chinese Restaurants)' ),
    array( '#case-tintxking', 'Case Study: TintXKing (Window Tint Company)' ),
    array( '#web-design',     'Standalone Web Design Showcase' ),
);

$ow_tint_shift = $ow_tint_lift
    ? 'Achieved a distinct ' . $ow_tint_lift . ' increase in overall sales by ensuring that whenever ad traffic researched the brand, local profiles completely validated their authority.'
    : 'Achieved a distinct increase in overall sales by ensuring that whenever ad traffic researched the brand, local profiles completely validated their authority.';

// Case studies. 'mp4' empty renders a labelled placeholder instead of a player.
$ow_cases = array(
    array(
        'id'        => 'case-1981',
        'n'         => '02',
        'eyebrow'   => 'Case Study &middot; Craft Brewery',
        'title'     => '19-81 Brewing Co.',
        'lead'      => 'How we established a local craft brewery as a consistently recommended brand for conversational search queries.',
        'body'      => 'When tourists and locals ask ChatGPT or Gemini for local craft beer recommendations, our optimization ensures 19-81 Brewing Co. is frequently positioned as a top choice.',
        'shift'     => 'Moved from low online visibility to a highly prioritized local choice, regularly appearing at the top of local map packs and conversational AI answers.',
        'delivered' => array(
            'Built a brand-new, high-speed website.',
            'Fully updated, optimized, and improved their Google Maps and TripAdvisor listings.',
            'Overhauled and optimized their primary Social Media channels for better search discoverability.',
            'Perform weekly updates across all of these channels to keep search crawlers and AI bots continuously fed with fresh data.',
        ),
        'mp4'       => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-1.mp4',
        'headline'  => 'How we made our client the #1 brewery on ChatGPT &amp; Gemini &#127866;',
        'shots'     => array(
            array( 'label' => '19-81 website', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/photo-5102759273703345434-w.webp', 'w' => 1273, 'h' => 2560 ),
            array( 'label' => 'Google Business Profile', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-094552.webp', 'w' => 505, 'h' => 1198 ),
        ),
        'bg'        => 'bg-white',
        'card'      => 'bg-slate-50',
    ),
    array(
        'id'        => 'case-prime',
        'n'         => '03',
        'eyebrow'   => 'Case Study &middot; Chinese Restaurants',
        'title'     => 'Prime Group',
        'lead'      => 'How we positioned sister restaurant brands to stand out in a highly competitive local dining market.',
        'body'      => 'Seven Mile Beach has a high concentration of restaurants, making local visibility challenging. We synchronized the digital profiles of Prime Group&rsquo;s two locations so search bots easily recognize their value.',
        'shift'     => 'Both venues are routinely chosen by AI engines and local maps as top-tier recommended locations for Chinese and local dining queries.',
        'delivered' => array(
            'Built a brand-new, modern website foundation for the locations.',
            'Cleaned up, synchronized, and optimized their Google Maps and TripAdvisor profiles.',
            'Perform weekly updates to their website and local listings to maintain algorithmic trust and crawl freshness.',
        ),
        'mp4'       => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-chinese-1-1.mp4',
        'headline'  => 'How we ranked our clients #1 &amp; #2 on ChatGPT &amp; Gemini! &#128081;',
        'shots'     => array(
            array( 'label' => 'Uncle Liu &mdash; Google Business Profile', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-094942.webp', 'w' => 500, 'h' => 1198 ),
            array( 'label' => 'Coconut Room &mdash; Google Business Profile', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-094910.webp', 'w' => 502, 'h' => 1198 ),
        ),
        'bg'        => 'bg-slate-50',
        'card'      => 'bg-white',
    ),
    array(
        'id'        => 'case-tintxking',
        'n'         => '04',
        'eyebrow'   => 'Case Study &middot; Window Tint Company',
        'title'     => 'TintXKing',
        'lead'      => 'How building a trustworthy local footprint maximized the return on investment for their paid online marketing.',
        'body'      => 'TintXKing utilizes online advertisements to capture immediate sales traffic. While ads bring the initial traffic, a clean local reputation is what converts those clicks into paying customers. We built an authoritative digital footprint to support their active ad campaigns.',
        'shift'     => $ow_tint_shift,
        'delivered' => array(
            'Built a brand-new, conversion-focused website structure.',
            'Updated, verified, and deeply improved their Google Maps profile.',
            'Overhauled, aligned, and optimized their active Social Media channels.',
            'Perform weekly updates across all platforms to keep their digital footprint active, verified, and authoritative for search engines.',
        ),
        'mp4'       => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-tintxking.mp4',
        'headline'  => 'How TintXKing shows up in ChatGPT &amp; Gemini &#128663;',
        'shots'     => array(
            array( 'label' => 'TintXKing website', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/descarga.webp', 'w' => 396, 'h' => 800 ),
            array( 'label' => 'Google Maps listing', 'img' => 'https://toctoc.ky/wp-content/uploads/2026/07/captura-de-pantalla-2026-07-17-094748.webp', 'w' => 502, 'h' => 1198 ),
        ),
        'bg'        => 'bg-white',
        'card'      => 'bg-slate-50',
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
                <?php toctoc_render_breadcrumbs( 'Our Work' ); ?>
                <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                    Our Work
                </div>
                <h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-slate-900">
                    Real Results: Making Brands the <em class="italic text-sky-deep font-display">Undisputed Choice</em> in the AI Era
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-slate-600 leading-relaxed max-w-3xl">
                    In AI search, there is no &ldquo;Page 2.&rdquo; You are either the recommended answer, or you are invisible. Here is how we put our clients at the absolute top.
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
            <div class="max-w-3xl">
                <p class="text-xl text-slate-700 leading-relaxed">
                    On this page, you&rsquo;ll find live demonstrations of how we take businesses&mdash;from craft breweries to high-performance automotive services&mdash;and code them directly into the trust networks of ChatGPT, Gemini, and Google.
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
                    <?php foreach ( $ow_toc as $i => $item ) : ?>
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

    <!-- 1. Zero-to-One Visibility -->
    <section id="zero-to-one" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; Our Metric for Success</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Understanding <em class="italic text-sky-deep font-display">&ldquo;Zero-to-One&rdquo;</em> Visibility</h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    In traditional search, performance is measured by climbing a long list of search links or local map packs. While maintaining a top position on Google Maps is still highly critical, AI conversational search introduces a brand-new metric: <strong class="font-semibold text-slate-900">Zero-to-One Visibility</strong>.
                </p>
                <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                    When a user asks ChatGPT or Gemini for a recommendation, the AI doesn&rsquo;t give them a list of dozens of choices. It selects a tiny, highly trusted handful of businesses.
                </p>
            </div>

            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                    <div class="flex items-baseline gap-3 mb-3">
                        <span class="text-5xl font-display text-slate-300 leading-none">0</span>
                        <span class="text-sm font-bold text-slate-400">Invisible to AI</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">The AI engine crawls the web, finds inconsistent or outdated info about a brand, and omits them from the conversation entirely.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-sky-deep/20 bg-sky-pale/40 shadow-soft">
                    <div class="flex items-baseline gap-3 mb-3">
                        <span class="text-5xl font-display text-sky-deep leading-none">1</span>
                        <span class="text-sm font-bold text-sky-deep">Trusted by AI</span>
                    </div>
                    <p class="text-slate-600 leading-relaxed">The AI engine scans a perfectly synchronized digital footprint and actively delivers that business as a primary recommendation.</p>
                </div>
            </div>

            <p class="mt-10 max-w-3xl text-lg text-slate-600 leading-relaxed">
                Our framework focuses on securing your traditional local map positions while simultaneously moving your business from Zero to One in conversational AI answers.
            </p>
        </div>
    </section>

    <!-- 2-4. Case studies -->
    <?php foreach ( $ow_cases as $c ) : ?>
    <section id="<?php echo esc_attr( $c['id'] ); ?>" class="py-24 md:py-32 <?php echo esc_attr( $c['bg'] ); ?> scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep"><?php echo esc_html( $c['n'] ); ?> &middot; <?php echo wp_kses_post( $c['eyebrow'] ); ?></span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Case Study: <em class="italic text-sky-deep font-display"><?php echo wp_kses_post( $c['title'] ); ?></em></h2>
                <p class="mt-8 text-xl text-slate-700 leading-relaxed font-medium"><?php echo wp_kses_post( $c['lead'] ); ?></p>
                <p class="mt-5 text-lg text-slate-600 leading-relaxed"><?php echo wp_kses_post( $c['body'] ); ?></p>
            </div>

            <div class="mt-10 grid lg:grid-cols-2 gap-6">
                <!-- The Shift -->
                <div class="p-8 rounded-[2rem] border border-sky-deep/20 bg-sky-pale/40 shadow-soft">
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep mb-3">The Shift</p>
                    <p class="text-lg text-slate-700 leading-relaxed"><?php echo wp_kses_post( $c['shift'] ); ?></p>
                </div>
                <!-- What We Delivered -->
                <div class="p-8 rounded-[2rem] border border-slate-100 <?php echo esc_attr( $c['card'] ); ?> shadow-soft">
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-deep mb-4">What We Delivered</p>
                    <ul class="space-y-3">
                        <?php foreach ( $c['delivered'] as $d ) : ?>
                        <li class="flex items-start gap-3 text-slate-600 leading-relaxed">
                            <span class="shrink-0 mt-1 inline-flex items-center justify-center w-5 h-5 rounded-full bg-sky-pale text-sky-deep">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            </span>
                            <span><?php echo wp_kses_post( $d ); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- The Proof Loop -->
            <div class="mt-12">
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-6">The Proof Loop</p>
                <div class="grid md:grid-cols-3 gap-6 items-start">
                    <!-- Video -->
                    <div class="flex justify-center md:justify-start">
                        <?php if ( $c['mp4'] ) : ?>
                        <div class="relative aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] bg-slate-950 shadow-soft ring-1 ring-slate-100">
                            <video class="w-full h-full object-cover" controls preload="none" data-ttlazy playsinline>
                                <source src="<?php echo esc_url( $c['mp4'] ); ?>#t=0.1" type="video/mp4">
                            </video>
                            <div class="pointer-events-none absolute inset-x-0 top-0 z-10 px-4 pt-4 pb-10 bg-gradient-to-b from-black/85 via-black/45 to-transparent">
                                <span class="block text-left text-sm font-bold text-white leading-snug drop-shadow-md"><?php echo wp_kses_post( $c['headline'] ); ?></span>
                            </div>
                        </div>
                        <?php else : ?>
                        <div class="aspect-[9/16] w-full max-w-[280px] rounded-[2rem] border-2 border-dashed border-slate-200 bg-slate-50/60 flex flex-col items-center justify-center gap-3 text-center px-6">
                            <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-slate-300 shadow-soft">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                            </span>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">ChatGPT &amp; Gemini demo</span>
                            <span class="text-xs text-slate-400">Video slot</span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Screenshot slots — matched to the video frame (9:16, 280px). -->
                    <?php foreach ( $c['shots'] as $shot ) : ?>
                    <?php if ( ! empty( $shot['img'] ) ) : ?>
                    <?php $ow_contain = ( isset( $shot['fit'] ) && 'contain' === $shot['fit'] ); ?>
                    <figure class="flex flex-col items-center md:items-start">
                        <div class="aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] border border-slate-100 shadow-soft <?php echo $ow_contain ? 'bg-slate-100 flex items-center justify-center' : 'bg-slate-950'; ?>">
                            <img src="<?php echo esc_url( $shot['img'] ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $c['title'] . ' — ' . $shot['label'] ) ); ?>" <?php echo ! empty( $shot['w'] ) ? 'width="' . (int) $shot['w'] . '" height="' . (int) $shot['h'] . '"' : ''; ?> loading="lazy" decoding="async" class="<?php echo $ow_contain ? 'w-full h-auto' : 'w-full h-full object-cover object-top'; ?>" />
                        </div>
                        <figcaption class="mt-3 max-w-[280px] text-[11px] font-bold uppercase tracking-widest text-slate-400"><?php echo wp_kses_post( $shot['label'] ); ?></figcaption>
                    </figure>
                    <?php else : ?>
                    <div class="flex flex-col items-center md:items-start">
                        <div class="aspect-[9/16] w-full max-w-[280px] rounded-[2rem] border-2 border-dashed border-slate-200 bg-slate-50/60 flex flex-col items-center justify-center gap-3 text-center px-6">
                            <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-slate-300 shadow-soft">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                            </span>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400"><?php echo wp_kses_post( $shot['label'] ); ?></span>
                            <span class="text-xs text-slate-400">Screenshot slot</span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>

    <?php
    // VideoObject schema for the case-study demo videos.
    toctoc_render_video_schema( array_map( function ( $c ) {
        return array(
            'name'         => $c['title'] . ' — ' . wp_strip_all_tags( html_entity_decode( $c['headline'], ENT_QUOTES, 'UTF-8' ) ),
            'description'  => wp_strip_all_tags( html_entity_decode( $c['lead'], ENT_QUOTES, 'UTF-8' ) ),
            'contentUrl'   => $c['mp4'],
            'thumbnailUrl' => toctoc_og_image_url( 'video-' . sanitize_title( $c['title'] ), $c['title'] . ' · Case Study', 'https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg' ),
            'uploadDate'   => '2026-07-17',
        );
    }, $ow_cases ) );
    ?>

    <!-- 5. Standalone Web Design Showcase -->
    <section id="web-design" class="relative py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-12 shadow-glass scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">05 &middot; Standalone Web Design</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">High-Performance, <em class="italic text-accent font-display">Search-Ready Digital Foundations</em></h2>
                <p class="mt-8 text-lg text-white/50 leading-relaxed">
                    Even when our clients only require a standalone website, we build every project with the exact same clean code, high speeds, and crawlable backend structure that we use for our full optimization campaigns. These sites are designed to perform cleanly for both human visitors and search engine bots.
                </p>
            </div>

            <div class="mt-20">
                <?php toctoc_render_showcase_grid( true ); ?>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-5xl px-6">
            <h2 class="text-4xl md:text-6xl font-display leading-[1.02] text-slate-900">
                Are You Ready to Turn Your Brand Into <br /><em class="italic text-sky-deep font-display">the Recommended Answer?</em>
            </h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                Let&rsquo;s talk today about optimizing your website, maps, and channels to secure your spot at the top of local and AI search.
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
        '@context'        => 'https://schema.org',
        '@type'           => 'CollectionPage',
        'name'            => 'Our Work — TocToc Marketing',
        'description'     => 'Case studies showing how TocToc Marketing makes Cayman Islands businesses the recommended answer on ChatGPT, Gemini and Google — including 19-81 Brewing Co., Prime Group and TintXKing.',
        'url'             => 'https://toctoc.ky/our-work/',
        'isPartOf'        => array( '@id' => 'https://toctoc.ky/#website' ),
        'about'           => array( '@id' => 'https://toctoc.ky/#organization' ),
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
