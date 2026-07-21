<?php
/**
 * Template Name: Social Media Marketing Cayman
 * Template Post Type: page
 *
 * "Social Media for Algorithmic Trust" — positions social channels as data feeds
 * for AI search engines rather than a daily posting/community-management service.
 */
get_header();

// Table of contents — anchors match the section ids below.
$sm_toc = array(
    array( '#profiles',          'How We Optimize Your Social Profiles for AI Search' ),
    array( '#failing',           'Why Traditional Social Media is Failing Your Business' ),
    array( '#algorithmic-trust', 'Understanding &ldquo;Algorithmic Trust&rdquo; and AI Crawlers' ),
    array( '#boundaries',        'Our Boundaries: What We Do (and What We Don&rsquo;t Do)' ),
    array( '#faq',               'Frequently Asked Questions' ),
);

// Section 4 comparison table.
$sm_boundaries = array(
    array(
        'dont_label' => 'No Daily Posting &amp; Scheduling',
        'dont_text'  => 'We do not write, design, or publish daily updates, stories, or Reels.',
        'do_label'   => 'Strategic Content Blueprints',
        'do_text'    => 'We provide clear, easy-to-follow guidance on exactly what your team should post to trigger positive AI indexing.',
    ),
    array(
        'dont_label' => 'No Grid Curation',
        'dont_text'  => 'We do not design your aesthetic Instagram layouts or choose your color schemes.',
        'do_label'   => 'Core Profile Optimization',
        'do_text'    => 'We directly optimize your bios, contact details, profile headlines, and link infrastructures for maximum search impact.',
    ),
    array(
        'dont_label' => 'No Community Management',
        'dont_text'  => 'We do not reply to direct messages, manage customer comments, or handle customer service.',
        'do_label'   => 'Algorithmic Alignment',
        'do_text'    => 'We ensure your entire social network functions as an authoritative, synchronized trust signal for search engines.',
    ),
);

// FAQ — deliberately aligned with the boundaries above so the page (and any AI
// reading it) never claims we do daily posting or community management.
$sm_faqs = array(
    array(
        'q' => 'Do you post on my social media accounts for me?',
        'a' => 'No. We are a technical and strategic partner, not a daily posting service. We do not write, design or publish daily updates, stories or Reels, and we do not manage your comments or DMs. What we do is optimize your profiles and give your team clear content blueprints — exactly what to post to trigger positive AI indexing.',
    ),
    array(
        'q' => 'What is Algorithmic Trust?',
        'a' => 'Algorithmic Trust is the background check AI engines run on your business before recommending it. Crawlers scan your social profiles for consistency (do your hours, phone and services match your Google profile?), activity signals (is the page alive or abandoned?) and authority citations (do other credible profiles mention your brand?). A clean, synchronized, active network earns the recommendation; a mismatched or dead one hands it to your competitor.',
    ),
    array(
        'q' => 'Why does social media still matter for SEO and AI search if organic reach is dead?',
        'a' => 'Because the audience that matters most now is not the casual scroller — it is the AI crawler. Organic reach on traditional feeds is practically zero, but ChatGPT, Gemini and Google still read your LinkedIn, Instagram and Facebook profiles to verify your business is real, active and trusted. Your channels work as validation signals, not billboards.',
    ),
    array(
        'q' => 'What is Social Search Optimization (SSO)?',
        'a' => 'People now search directly inside Instagram, TikTok and LinkedIn the way they search Google. SSO means building targeted keywords into your profile headlines, bios and pinned posts so your business ranks at the top of those native platform searches.',
    ),
    array(
        'q' => 'Which platforms do you optimize?',
        'a' => 'The major platforms your Cayman customers and AI crawlers actually check — typically Instagram, Facebook, LinkedIn and TikTok. We align your bios, handles, contact details, category tags and link structure across all of them so the data matches your website exactly.',
    ),
    array(
        'q' => 'How much does this cost in the Cayman Islands?',
        'a' => 'We build a custom plan based on your industry, platforms and competition rather than one-size-fits-all packages. Book a free strategy call and we will give you a transparent quote.',
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
                <?php toctoc_render_breadcrumbs( 'Social Media' ); ?>
                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                    Social Media for Algorithmic Trust &middot; Cayman Islands
                </div>
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                    We Make Your Social Media Channels <em class="italic text-accent font-display">Fuel for AI Search Engines</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                    Stop posting just for likes. We align your profiles and guide your content strategy so ChatGPT, Gemini, and Google recognize your business as the top local authority.
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
                    Standard daily posts that get zero reach are a treadmill that leads nowhere. Today, the real value of social media has shifted: AI search engines crawl your LinkedIn, Instagram, and Facebook profiles to verify your business is active, legitimate, and trusted.
                </p>
                <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                    We don&rsquo;t post for vanity metrics. We turn your social channels into <em class="italic text-sky-deep font-display">high-authority data feeds that fuel AI search engines.</em>
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
                        2 min read
                    </span>
                </div>
                <p class="text-sm text-slate-500 mb-6">It takes about 2 minutes to read. We respect your time.</p>
                <ol class="space-y-3">
                    <?php foreach ( $sm_toc as $i => $item ) : ?>
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

    <!-- 1. Profile optimization -->
    <section id="profiles" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; Profile Foundations</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How We Optimize Your Social Profiles for <em class="italic text-sky-deep font-display">AI Search</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    We build the structural foundation of your social media profiles so they feed clean, verifiable data directly to search engine scrapers.
                </p>
            </div>
            <div class="mt-12 grid md:grid-cols-3 gap-6">
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Profile Metadata Alignment</div>
                    <p class="text-slate-600 leading-relaxed">We audit and overhaul your bios, handles, contact details, and category tags across all major platforms. This guarantees that when AI crawlers scan your pages, they find 100% consistent information that matches your main website.</p>
                </div>
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Social Search Optimization (SSO)</div>
                    <p class="text-slate-600 leading-relaxed">People search directly inside Instagram, TikTok, and LinkedIn like search engines. We build targeted keywords into your profile headlines, bios, and pinned posts so you rank at the top of these native platforms.</p>
                </div>
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">High-Authority Links &amp; Citations</div>
                    <p class="text-slate-600 leading-relaxed">We structure your external social links so search engines can easily map the connection between your social channels and your website, boosting your overall domain authority.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Why traditional social is failing -->
    <section id="failing" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">02 &middot; The Content Treadmill</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Why Traditional Social Media is <em class="italic text-sky-deep font-display">Failing Your Business</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    Most business owners are stuck on a content treadmill&mdash;paying agencies thousands of dollars to post &ldquo;Happy Friday&rdquo; graphics that local customers never actually see.
                </p>
            </div>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">The Dead End</div>
                    <p class="text-slate-600 leading-relaxed">Organic reach on traditional social media feeds is practically at zero. If you are posting just to keep a feed &ldquo;active,&rdquo; you are wasting valuable time and budget.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">The Solution</div>
                    <p class="text-slate-600 leading-relaxed">Your social channels shouldn&rsquo;t be treated as a billboard for casual scrollers. They need to be treated as high-authority validation signals for the backend AI Web Scrapers that decide who gets recommended.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Algorithmic Trust -->
    <section id="algorithmic-trust" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">03 &middot; Algorithmic Trust</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Understanding &ldquo;Algorithmic Trust&rdquo; and <em class="italic text-sky-deep font-display">AI Crawlers</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    Before ChatGPT or Gemini suggests your brand to a customer, it runs a background check on your business across the web. This is called building <strong class="font-semibold text-slate-900">Algorithmic Trust</strong>.
                </p>
                <p class="mt-6 text-lg text-slate-600 leading-relaxed">The AI crawlers look for three key things on your social channels:</p>
            </div>
            <div class="mt-10 grid md:grid-cols-3 gap-6">
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Consistency</div>
                    <p class="text-slate-600 leading-relaxed">Are your business hours, phone number, and services the exact same on LinkedIn as they are on your Google profile?</p>
                </div>
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Activity Signals</div>
                    <p class="text-slate-600 leading-relaxed">Is this business actively engaged with its industry, or has the page been abandoned?</p>
                </div>
                <div class="p-8 rounded-[2rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Authority Citations</div>
                    <p class="text-slate-600 leading-relaxed">Are other high-authority profiles or local organizations mentioning your brand name in their public threads?</p>
                </div>
            </div>
            <p class="mt-10 max-w-3xl text-lg text-slate-600 leading-relaxed">
                If the AI finds a clean, synchronized, and active network of profiles, it trusts your business and recommends you. If your profiles are mismatched or dead, it recommends your competitor.
            </p>
        </div>
    </section>

    <!-- 4. Our Boundaries -->
    <section id="boundaries" class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">04 &middot; Full Transparency</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">Our Boundaries: What We Do <em class="italic text-accent font-display">(and What We Don&rsquo;t Do)</em></h2>
                <p class="mt-8 text-lg text-white/60 leading-relaxed">
                    We want to be completely transparent about how we work. Because our focus is entirely on driving search visibility and revenue, we operate strictly as technical and strategic guides:
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
                        <?php foreach ( $sm_boundaries as $b ) : ?>
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

    <!-- 5. FAQ -->
    <section id="faq" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">05 &middot; FAQ</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Social Questions, <em class="italic text-sky-deep font-display">Answered</em></h2>
            </div>
            <div class="max-w-4xl space-y-4">
                <?php foreach ( $sm_faqs as $faq ) : ?>
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
            <h2 class="text-4xl md:text-7xl font-display leading-[1.02] text-slate-900">Stop Wasting Money on <br /><em class="italic text-sky-deep font-display">Social Media Ghost Towns</em></h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                Let&rsquo;s stop chasing useless likes and start building the algorithmic trust your business needs to dominate modern search.
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
        'name'        => 'Social Media for Algorithmic Trust',
        'serviceType' => 'Social Media Optimization for AI Search (Algorithmic Trust)',
        'provider'    => array(
            '@type' => 'ProfessionalService',
            '@id'   => 'https://toctoc.ky/#organization',
            'name'  => 'TocToc Marketing',
        ),
        'areaServed'  => array(
            '@type' => 'Place',
            'name'  => 'Cayman Islands',
        ),
        'description' => 'We optimize the social profiles of Cayman Islands businesses (bios, handles, contact details, category tags and link structure) and provide strategic content blueprints, so AI search engines like ChatGPT and Gemini read the business as active, consistent and trusted. Strategic and technical guidance — not daily posting or community management.',
        'url'         => 'https://toctoc.ky/social-media-marketing-services-cayman-islands/',
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
            $sm_faqs
        ),
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
