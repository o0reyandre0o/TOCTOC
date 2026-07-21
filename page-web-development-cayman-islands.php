<?php
/**
 * Template Name: Web Development Cayman
 * Template Post Type: page
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
                    Built Fast · Built to Scale
                </div>
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                    Web Development Agency in <em class="italic text-accent font-display">Cayman.</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                    From custom websites to e-commerce platforms and web apps, our Cayman web development services turn ideas into fast, secure, scalable products engineered to perform and rank.
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
                    <h3 class="text-2xl font-display text-slate-900 mb-4">E-commerce Development</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Secure online stores with smooth checkout, inventory, and payments — built to sell to the Cayman market and beyond.</p>
                </article>
                <article class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft hover:shadow-glass transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Web Apps &amp; Portals</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Booking systems, directories, and customer portals with real-time functionality tailored to how your business runs.</p>
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
                    <h3 class="text-2xl font-display mb-4">Performance First</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Optimized code and Core Web Vitals so your site loads instantly on mobile and keeps visitors from bouncing.</p>
                </div>
                <div>
                    <div class="text-accent text-4xl font-display mb-4">02.</div>
                    <h3 class="text-2xl font-display mb-4">SEO-Ready Architecture</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Clean semantic markup and Schema baked in, so Google and AI assistants understand and recommend your site.</p>
                </div>
                <div>
                    <div class="text-accent text-4xl font-display mb-4">03.</div>
                    <h3 class="text-2xl font-display mb-4">Secure &amp; Scalable</h3>
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
                    Explore Web Design <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <?php
    toctoc_render_faq( [
        [
            'q' => 'How much does web development cost in the Cayman Islands?',
            'a' => 'Web development cost depends on complexity — a custom brochure site, an e-commerce store, and a bespoke web app are very different builds. TocToc quotes transparently after a short call about your goals and required features, so you only pay for what your project actually needs.',
        ],
        [
            'q' => 'What is the difference between web design and web development?',
            'a' => 'Web design is the look, feel, and user experience — layout, branding, and visuals. Web development is the engineering that makes it work — the code, functionality, integrations, and performance. We handle both in-house for Cayman businesses, so your site is beautiful and technically excellent.',
        ],
        [
            'q' => 'Do you build e-commerce and custom web applications?',
            'a' => 'Yes. We develop secure e-commerce stores, booking systems, customer portals, directories, and custom web apps with real-time functionality, built to scale as your Cayman business grows.',
        ],
        [
            'q' => 'Do you offer website maintenance and support after launch?',
            'a' => 'Yes. We offer ongoing maintenance, security updates, backups, and performance monitoring so your website stays fast, safe, and online — and we are here when you need changes or new features.',
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
    <?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
