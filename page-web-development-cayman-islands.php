<?php
/**
 * Template Name: Web Development Cayman
 * Template Post Type: page
 *
 * Scope narrowed 10 Aug 2026 to e-commerce and web applications. This page was
 * competing with /website-design-agency-cayman-islands/ for plain "web
 * development cayman" and losing 41 impressions to 2,659, so the two split by
 * intent instead: brochure and restaurant builds live there, transactional
 * builds live here. Keep the hero on apps — widening it back to generic
 * web development re-opens the cannibalisation.
 *
 * 29 Sep 2026: e-commerce dropped as a service (Daniel, Trello card 606), so
 * the page is now web apps and booking platforms only. The URL stays: it is
 * linked from the footer, the services grid and the guide.
 */
get_header(); ?>

<main class="min-h-screen bg-background text-foreground">
    <!-- Section 1: Hero -->
    <section class="relative pt-48 pb-32 overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <?php toctoc_render_breadcrumbs( 'Web Development' ); ?>
                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                    Web Apps &middot; Booking &middot; Integrations
                </div>
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                    Web Apps &amp; Booking Platforms in <em class="italic text-accent font-display">Cayman.</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                    Booking platforms, customer portals and internal tools. When your site has to take a booking, run a workflow or talk to the systems you already use, it stops being a website and becomes software &mdash; and we build it to hold up.
                </p>
                <p class="mt-6 text-lg text-white/50 leading-relaxed max-w-3xl">
                    Looking for a standard business or restaurant website instead? That is over on
                    <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-accent font-bold hover:underline">website development</a>.
                </p>
                <div class="mt-12 flex flex-wrap gap-4">
                    <a href="#capabilities" class="group inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                        Our Capabilities
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 text-accent transition-transform group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Capabilities -->
    <section id="capabilities" class="py-24 md:py-32 bg-slate-50">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">What We Build</span>
                <h2 class="mt-6 text-5xl md:text-7xl font-display text-slate-900 leading-[0.9]">Development <em class="italic text-sky-deep font-display">Capabilities</em></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <article class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Custom Websites</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Bespoke, hand-built websites with clean code and custom architecture — no bloated templates, no compromises on speed.</p>
                </article>
                <article class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Booking Platforms</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Reservations, appointments and availability that sync with your calendar and confirm automatically — built around how your business actually runs.</p>
                </article>
                <article class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Web Apps &amp; Portals</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Customer portals, member areas, directories and dashboards with real-time functionality tailored to how your business runs.</p>
                </article>
                <article class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">CMS &amp; WordPress</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Easy-to-manage sites built on WordPress and modern CMS platforms, so your team can update content without code.</p>
                </article>
                <article class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">API &amp; Integrations</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Connect your website to CRMs, payment gateways, booking tools, and the systems your business already relies on.</p>
                </article>
                <article class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Maintenance &amp; Support</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Ongoing updates, security, backups, and performance monitoring to keep your site fast, safe, and online.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Section 3: Performance (dark editorial) -->
    <section class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-8">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex flex-col md:flex-row items-end justify-between gap-12 mb-20">
                <div class="max-w-2xl">
                    <h2 class="text-5xl md:text-7xl font-display leading-[0.9]">Engineered for <em class="italic text-accent font-display">Speed &amp; Search.</em></h2>
                </div>
                <p class="text-white/40 text-lg max-w-sm italic">
                    A website is only as good as it is fast and findable. We build for Core Web Vitals and AI visibility from the first line of code.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div>
                    <div class="text-accent text-4xl font-display mb-4">01.</div>
                    <h3 class="text-2xl font-display mb-4">Page speed and Core Web Vitals</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Optimized code and Core Web Vitals so your site loads instantly on mobile and keeps visitors from bouncing.</p>
                </div>
                <div>
                    <div class="text-accent text-4xl font-display mb-4">02.</div>
                    <h3 class="text-2xl font-display mb-4">Semantic HTML and structured data</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Clean semantic markup and Schema baked in, so Google and AI assistants understand and recommend your site.</p>
                </div>
                <div>
                    <div class="text-accent text-4xl font-display mb-4">03.</div>
                    <h3 class="text-2xl font-display mb-4">Security and handling traffic growth</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Built to grow with your business and to stay secure, with best practices for hosting, backups, and updates.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Design + Dev link -->
    <section class="py-24 md:py-32">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <h2 class="text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Need design <em class="italic text-sky-deep font-display">and</em> development?</h2>
            <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                Most projects need both. Our <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-sky-deep font-bold underline decoration-accent decoration-2 underline-offset-4">website design team</a> shapes the look and feel, while our developers make it fast, functional, and ready to rank. One partner, from first sketch to launch.
            </p>
            <div class="mt-10">
                <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="inline-flex items-center gap-2 font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                    Explore Website Development <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <?php
    toctoc_render_faq( [
        [
            'q' => 'How much does web development cost in the Cayman Islands?',
            'a' => 'Web development cost depends on complexity — a booking setup, a customer portal and a bespoke internal tool are very different builds. Toc Toc quotes transparently after a short call about your goals and required features, so you only pay for what your project actually needs.',
        ],
        [
            'q' => 'What is the difference between a website and a web application?',
            'a' => 'A website informs; a web application does work. If your visitors read, browse and then call you, you need a website — and that is built on our <a href="https://toctoc.ky/website-design-agency-cayman-islands/">website development</a> service. If they log in, book, pay, upload or manage something, you need an application, which is what this page covers. The dividing line matters because the second carries state, permissions and money, and has to be engineered accordingly.',
        ],
        [
            'q' => 'Do you build booking systems and custom web applications?',
            'a' => 'Yes. We develop booking systems, customer portals, directories and custom web apps with real-time functionality, built to scale as your Cayman business grows. We do not build online stores (e-commerce) as a service.',
        ],
        [
            'q' => 'Do you offer website maintenance and support after launch?',
            'a' => 'Yes. We offer ongoing maintenance, security updates, backups, and performance monitoring so your website stays fast, safe, and online — and we are here when you need changes or new features.',
        ],
        /*
         * Added 10 Aug 2026, trimmed 29 Sep 2026 when e-commerce was dropped:
         * the payment-gateway and Shopify/WooCommerce questions went with it.
         * Each answer leads with the answer, because Google's generative
         * features quote passages, not pages.
         */
        [
            'q' => 'Can you connect a web app to the systems we already use?',
            'a' => 'Yes, and it is usually where the value is. Calendars, CRMs, booking tools, point-of-sale and payment processors can all be connected when they expose an interface we can talk to, which is the first thing we check. Connecting what you already run beats replacing it.',
        ],
        [
            'q' => 'How long does it take to build a booking platform or web app?',
            'a' => 'A booking setup on an existing platform is typically a matter of weeks; a custom portal or application is measured in months. The variable that moves the timeline most is rarely the code — it is how ready your business rules, data and integrations are when we start. We will tell you which of those is the bottleneck at the quote stage rather than halfway through.',
        ],
    ], 'Web Development FAQ', 'Development Questions, <em class="italic text-sky-deep font-display">Answered</em>' );
    ?>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-5xl md:text-8xl font-display leading-[0.9] text-slate-900">Let's build <br /><em class="italic text-sky-deep font-display">Something Fast.</em></h2>
            <div class="mt-12">
                <a href="tel:+13455478120" class="group inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    Call Us
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
    <!-- Free SEO Checker CTA -->
    <?php
    // Latest articles on this page's topics; see toctoc_render_related_posts().
    // Guarded: functions.php can reach the server after this template does.
    if ( function_exists( 'toctoc_render_related_posts' ) ) {
        toctoc_render_related_posts( array( 11, 18 ), 'From the <em class="italic text-sky-deep font-display">workshop</em>' );
    }
    ?>

    <?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
