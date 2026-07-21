<?php
/**
 * Template Name: Advertising & PR Agency Cayman
 * Template Post Type: page
 *
 * "Digital PR for AI Authority Citations" — positions Digital PR as permanent,
 * machine-readable trust assets rather than paid ad campaign management.
 */
get_header();

// Table of contents — anchors match the section ids below.
$pr_toc = array(
    array( '#authority',  'How We Help You Build Your Digital Authority' ),
    array( '#fuels',      'How Digital PR Fuels ChatGPT, Gemini, and Google' ),
    array( '#citation',   'What is an &ldquo;AI Authority Citation&rdquo;?' ),
    array( '#ads-vs-pr',  'Ads for Short-Term Traffic vs. Digital PR for AI Trust' ),
    array( '#boundaries', 'Our Boundaries: What We Do (and What We Don&rsquo;t Do)' ),
    array( '#faq',        'Frequently Asked Questions' ),
);

// Section 5 comparison table.
$pr_boundaries = array(
    array(
        'dont_label' => 'No Paid Ad Campaign Management',
        'dont_text'  => 'We do not build or run short-term Google Ads, social media ads, or print ad campaigns.',
        'do_label'   => 'LinkedIn &amp; Profile Optimization',
        'do_text'    => 'We directly write, structure, and optimize your LinkedIn presence to act as a major professional citation.',
    ),
    array(
        'dont_label' => 'No Low-Value &ldquo;Daily Posting&rdquo;',
        'dont_text'  => 'We do not write or schedule generic daily posts to keep your feed busy.',
        'do_label'   => 'High-Value Blog Production',
        'do_text'    => 'We write deep-dive website articles that act as the definitive source of truth for AI web scrapers.',
    ),
    array(
        'dont_label' => 'No Community Management',
        'dont_text'  => 'We do not reply to direct messages, manage customer comments, or handle customer service.',
        'do_label'   => 'Multi-Platform Repurposing',
        'do_text'    => 'We develop your core content into high-performing video and image chunks for YouTube, Instagram, and Facebook.',
    ),
);

// FAQ — aligned with the boundaries above so neither a visitor nor an AI reading
// this page can conclude that we run paid ad campaigns or manage communities.
$pr_faqs = array(
    array(
        'q' => 'Do you run Google Ads or social media ad campaigns for me?',
        'a' => 'No. We do not build or run short-term paid ad campaigns — Google Ads, social ads or print. Paid advertising is a sales tool: it works while the spend is on, and stops when it stops. We focus exclusively on Digital PR: permanent, searchable assets that keep feeding AI engines long after a campaign would have ended.',
    ),
    array(
        'q' => 'What is an AI Authority Citation?',
        'a' => 'An AI Authority Citation is any time a trusted, high-ranking platform or website mentions your brand name, services or location. AI models read the web constantly to learn which local businesses are genuinely respected, so when a high-trust network like LinkedIn consistently references your business, the model treats it as real-world proof of your authority.',
    ),
    array(
        'q' => 'What do you actually produce?',
        'a' => 'Three things: an optimized LinkedIn presence that acts as a major professional citation; deep-dive, SEO-optimized blog articles on your website that serve as the knowledge base AI engines scrape; and fully produced video and image content repurposed from those articles for YouTube, Instagram and Facebook.',
    ),
    array(
        'q' => 'How is Digital PR different from traditional PR?',
        'a' => 'Traditional PR chases press coverage and events for human audiences. Digital PR builds permanent, machine-readable assets and citations across high-authority platforms, structured so that AI crawlers and search engines can find, connect and trust them. The audience includes the algorithm, not only the reader.',
    ),
    array(
        'q' => 'Do you also handle daily posting or replying to comments?',
        'a' => 'No. We do not write generic daily posts to keep a feed busy, and we do not manage direct messages, comments or customer service. We are digital footprint architects — our work is the high-value assets and the structure that makes search engines and AI trust them.',
    ),
    array(
        'q' => 'How long does it take to see results?',
        'a' => 'Digital PR compounds rather than switching on. Most Cayman businesses see meaningful movement over 3 to 6 months as articles get indexed, profiles get crawled and citations accumulate. Unlike ads, those assets keep working after you stop paying for them.',
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
                <?php toctoc_render_breadcrumbs( 'Digital PR' ); ?>
                <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                    Digital PR for AI Authority Citations &middot; Cayman Islands
                </div>
                <h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-slate-900">
                    We Turn Digital PR into <em class="italic text-sky-deep font-display">Permanent AI Trust Signals</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-slate-600 leading-relaxed max-w-3xl">
                    Ads are built for short-term traffic. Digital PR is built for long-term AI authority. We secure the high-value digital citations that make ChatGPT, Gemini, and Google recommend your brand.
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

    <!-- Intro (home-style: large centered display) -->
    <section class="relative py-20 md:py-28 bg-white">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <div class="space-y-8">
                <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                    In the modern era of search, AI engines like ChatGPT and Gemini actively scrape the web for articles, digital profiles, and video platforms to see who is trusted right now.
                </p>
                <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                    Instead of managing short-term ad campaigns, we architect Digital PR strategies that give these AI engines the permanent, authoritative proof they need to confidently recommend your business for the long haul.
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
                    <?php foreach ( $pr_toc as $i => $item ) : ?>
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

    <!-- 1. Build Your Digital Authority -->
    <section id="authority" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; Digital Assets</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How We Help You Build Your <em class="italic text-sky-deep font-display">Digital Authority</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    We don&rsquo;t just plan your strategy&mdash;we build the high-value digital assets that search engines and AI agents use to verify your expertise. Here is how we build your permanent digital footprint:
                </p>
            </div>
            <div class="mt-12 grid md:grid-cols-3 gap-6">
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">LinkedIn Authority Building</div>
                    <p class="text-slate-600 leading-relaxed">We optimize and develop your personal or company LinkedIn presence. As the world&rsquo;s premier professional network, LinkedIn is heavily crawled by search engines. We turn your profile into a high-authority trust hub.</p>
                </div>
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Deep-Dive Website Blog Articles</div>
                    <p class="text-slate-600 leading-relaxed">We research and write authoritative, SEO-optimized blog articles for your website. These articles act as the primary &ldquo;knowledge base&rdquo; that AI engines scrape when looking for detailed answers to user questions.</p>
                </div>
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Social Media Content &ldquo;Chunking&rdquo; (Videos &amp; Images)</div>
                    <p class="text-slate-600 leading-relaxed">We break down your deep-dive blog articles into digestible, visual micro-content. We deliver fully produced videos and images optimized for YouTube, Instagram, and Facebook, signaling to search engines that your brand is consistently active across the entire web.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. How Digital PR fuels the AI engines -->
    <section id="fuels" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">02 &middot; Third-Party Validation</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How Digital PR Fuels <em class="italic text-sky-deep font-display">ChatGPT, Gemini, and Google</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    When a customer asks an AI assistant for a local recommendation, the AI doesn&rsquo;t just look at your website. It searches the wider web for third-party validation.
                </p>
                <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                    We structure your digital footprint so that when high-authority websites mention your brand, AI engines register it as a massive vote of confidence.
                </p>
            </div>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">High-Authority Platform Interlinking</div>
                    <p class="text-slate-600 leading-relaxed">We connect your primary website directly to your optimized profiles on high-trust networks like LinkedIn and YouTube. This creates clean, authoritative link pathways that web crawlers trust implicitly.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Entity Association</div>
                    <p class="text-slate-600 leading-relaxed">We ensure that when your brand is mentioned across these major digital platforms, it is directly tied to your specific industry keywords, so AI crawlers naturally connect your business to local search queries.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. What is an AI Authority Citation -->
    <section id="citation" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">03 &middot; Entity Trust</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">What is an <em class="italic text-sky-deep font-display">&ldquo;AI Authority Citation&rdquo;</em>?</h2>
                <div class="mt-8 space-y-6">
                    <p class="text-lg text-slate-600 leading-relaxed">
                        An AI Authority Citation is any time a trusted, high-ranking platform or website mentions your brand&rsquo;s name, services, or location.
                    </p>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        AI models are trained on massive amounts of unstructured web text. They read the internet constantly to learn which local businesses are genuinely respected.
                    </p>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        If ChatGPT sees that a trusted professional network like LinkedIn or a prominent digital content hub is consistently talking about your business, it treats that as real-world proof of your authority.
                    </p>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        The more organic, high-quality digital citations your business accumulates, the higher your <strong class="font-semibold text-slate-900">&ldquo;Entity Trust Score&rdquo;</strong> rises&mdash;guaranteed to make AI models confidently recommend you over competitors.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Ads vs Digital PR -->
    <section id="ads-vs-pr" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">04 &middot; Two Different Tools</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Ads for Short-Term Traffic vs. <em class="italic text-sky-deep font-display">Digital PR for AI Trust</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    To grow a business in the AI era, it is vital to understand how these two marketing tools work together:
                </p>
            </div>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-slate-400 text-sm font-bold mb-3">Paid Advertising (The Sales Tool)</div>
                    <p class="text-slate-600 leading-relaxed">Excellent for turning on an immediate faucet of traffic, leads, and sales. However, it is purely transactional. The moment the ad spend stops, the visibility stops. It does not feed the long-term memory maps of AI engines.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-sky-deep/20 bg-sky-pale/40 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Digital PR (The Reputation Tool)</div>
                    <p class="text-slate-600 leading-relaxed">Built to create permanent, searchable assets. When you publish high-value articles and optimized video content across the web, those assets live online forever. They serve as continuous reference points that AI web scrapers crawl to measure your brand&rsquo;s credibility over time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Our Boundaries -->
    <section id="boundaries" class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">05 &middot; Full Transparency</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">Our Boundaries: What We Do <em class="italic text-accent font-display">(and What We Don&rsquo;t Do)</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    Because we focus exclusively on building long-term search visibility and algorithmic authority, we operate strictly as digital footprint architects:
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
                        <?php foreach ( $pr_boundaries as $b ) : ?>
                        <tr class="block md:table-row">
                            <td class="block md:table-cell align-top pt-7 pb-4 md:py-7 md:pr-8 md:border-b md:border-white/10 text-white/60 leading-relaxed">
                                <span class="md:hidden block text-[10px] font-bold uppercase tracking-widest text-white/35 mb-2">What we don&rsquo;t do</span>
                                <strong class="font-bold text-white"><?php echo wp_kses_post( $b['dont_label'] ); ?>:</strong> <?php echo esc_html( $b['dont_text'] ); ?>
                            </td>
                            <td class="block md:table-cell align-top pb-7 md:py-7 md:pl-8 border-b border-white/10 text-white/60 leading-relaxed">
                                <span class="md:hidden block text-[10px] font-bold uppercase tracking-widest text-accent mb-2">What we do do</span>
                                <strong class="font-bold text-white"><?php echo wp_kses_post( $b['do_label'] ); ?>:</strong> <?php echo esc_html( $b['do_text'] ); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 6. FAQ -->
    <section id="faq" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">06 &middot; FAQ</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Your Questions, <em class="italic text-sky-deep font-display">Answered</em></h2>
            </div>
            <div class="max-w-4xl space-y-4">
                <?php foreach ( $pr_faqs as $faq ) : ?>
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
            <h2 class="text-4xl md:text-6xl font-display leading-[1.02] text-slate-900">Stop Renting Attention. <br /><em class="italic text-sky-deep font-display">Start Building Digital Authority.</em></h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                While ads are great for immediate sales, Digital PR builds the permanent trust signals your business needs to own the AI search era. Let&rsquo;s talk about securing your brand&rsquo;s digital footprint today.
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
        'name'        => 'Digital PR for AI Authority Citations',
        'serviceType' => 'Digital PR and AI Authority Citation Building',
        'provider'    => array(
            '@type' => 'ProfessionalService',
            '@id'   => 'https://toctoc.ky/#organization',
            'name'  => 'TocToc Marketing',
        ),
        'areaServed'  => array(
            '@type' => 'Place',
            'name'  => 'Cayman Islands',
        ),
        'description' => 'Digital PR for Cayman Islands businesses: we build permanent, high-authority digital assets — an optimized LinkedIn presence, deep-dive SEO blog articles, and repurposed video and image content for YouTube, Instagram and Facebook — so ChatGPT, Gemini and Google cite and recommend the brand. We do not run paid ad campaigns, daily posting or community management.',
        'url'         => 'https://toctoc.ky/advertising-pr-agency-cayman-islands/',
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
            $pr_faqs
        ),
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
