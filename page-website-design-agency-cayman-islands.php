<?php
/**
 * Template Name: Website Design Agency Cayman
 * Template Post Type: page
 */
get_header(); ?>

<main class="min-h-screen bg-background text-foreground">
    <!-- Section 1: Hero -->
    <section class="relative pt-48 pb-32 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-1.5 text-[11px] font-bold text-slate-500 mb-8 uppercase tracking-widest">
                    Your 24/7 Salesperson
                </div>
                <h1 class="text-5xl md:text-8xl font-display leading-[0.9] text-slate-900">
                    The Leading <em class="italic text-sky-deep font-display">Web Design Agency</em> for Cayman.
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-slate-600 leading-relaxed max-w-3xl">
                    We don't just build sites; we specialize in website redesign SEO and development engineered to convert visitors into loyal clients.
                </p>
                <div class="mt-12 flex flex-wrap gap-4">
                    <a href="#portfolio" class="group inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                        See Portfolio
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Case Studies Grid -->
    <section id="portfolio" class="py-24 md:py-32 bg-slate-50">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <!-- Project 1: Adventura -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-[4/5] rounded-[2.5rem] bg-slate-200 overflow-hidden shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-adventura-cayman.jpg" alt="Adventura Cayman" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-slate-900 mb-2">Adventura Cayman</h3>
                        <p class="text-slate-500 mb-6">Premium Watersports Rental platform with real-time availability and booking.</p>
                        <a href="https://adventuracayman.com" target="_blank" class="inline-flex items-center gap-2 font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 2: Coconut Room -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-[4/5] rounded-[2.5rem] bg-slate-200 overflow-hidden shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-coconut-room.jpg" alt="Coconut Room" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-slate-900 mb-2">Coconut Room</h3>
                        <p class="text-slate-500 mb-6">Vibrant Hospitality design featuring digital menus and seamless reservations.</p>
                        <a href="https://coconutroom.ky" target="_blank" class="inline-flex items-center gap-2 font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 3: Prospect Center -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-[4/5] rounded-[2.5rem] bg-slate-200 overflow-hidden shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-prospect-center.jpg" alt="Prospect Center" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-slate-900 mb-2">Prospect Center</h3>
                        <p class="text-slate-500 mb-6">Corporate Real Estate portal with advanced search and directory features.</p>
                        <a href="https://prospectcenter.ky" target="_blank" class="inline-flex items-center gap-2 font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 4: Uncle Liu -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-[4/5] rounded-[2.5rem] bg-slate-200 overflow-hidden shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-uncle-liu.jpg" alt="Uncle Liu" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-slate-900 mb-2">Uncle Liu</h3>
                        <p class="text-slate-500 mb-6">Luxury E-commerce experience tailored for the local market.</p>
                        <a href="https://uncleliu.ky" target="_blank" class="inline-flex items-center gap-2 font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 5: Brisana -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-[4/5] rounded-[2.5rem] bg-slate-200 overflow-hidden shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-brisana.jpg" alt="Brisana Insulation" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-slate-900 mb-2">Brisana Insulation</h3>
                        <p class="text-slate-500 mb-6">Industrial Service landing page optimized for lead generation.</p>
                        <a href="https://insulation.brisanaconstruction.com" target="_blank" class="inline-flex items-center gap-2 font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 6: Pr-Optics -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-[4/5] rounded-[2.5rem] bg-slate-200 overflow-hidden shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-proptics.jpg" alt="Pr-Optics" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-slate-900 mb-2">Pr-Optics</h3>
                        <p class="text-slate-500 mb-6">Modern Optical Boutique website featuring high-end eyewear collections and appointment booking.</p>
                        <a href="https://pr-optics.com/" target="_blank" class="inline-flex items-center gap-2 font-bold text-sky-deep hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Why Choose Us -->
    <section class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-8">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex flex-col md:flex-row items-end justify-between gap-12 mb-20">
                <div class="max-w-2xl">
                    <h2 class="text-5xl md:text-7xl font-display leading-[0.9]">Driving Sales Through <em class="italic text-accent font-display">Communication.</em></h2>
                </div>
                <p class="text-white/40 text-lg max-w-sm italic">
                    A website must do more than look pretty—it must communicate your value and close the deal.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div>
                    <div class="text-accent text-4xl font-display mb-4">01.</div>
                    <h3 class="text-2xl font-display mb-4">Boost Online Visibility</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Our web design Cayman services improve your search engine rankings from day one.</p>
                </div>
                <div>
                    <div class="text-accent text-4xl font-display mb-4">02.</div>
                    <h3 class="text-2xl font-display mb-4">Increase Lead Gen</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Convert more visitors with strategic website development design and CTAs.</p>
                </div>
                <div>
                    <div class="text-accent text-4xl font-display mb-4">03.</div>
                    <h3 class="text-2xl font-display mb-4">Responsive Design</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Ensure your site looks great on all devices with our mobile-first Cayman design.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Features -->
    <section class="py-24 md:py-32">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center mb-20">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Technical Excellence</span>
                <h2 class="mt-6 text-5xl md:text-7xl font-display text-slate-900 leading-[0.9]">Website Redesign <em class="italic text-sky-deep font-display">& Development</em></h2>
                <p class="mt-6 text-lg text-slate-500 max-w-2xl mx-auto">
                    Need more than a website? Explore our full <a href="<?php echo esc_url( home_url( '/web-development-cayman-islands/' ) ); ?>" class="text-sky-deep font-bold underline decoration-accent decoration-2 underline-offset-4">web development services in Cayman</a> — e-commerce, web apps, and custom builds.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="p-10 rounded-[2.5rem] border border-slate-100 shadow-soft hover:bg-slate-50 transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Search Optimized</h3>
                    <p class="text-slate-500 text-sm mb-6">Implement SEO best practices for improved visibility in search results from launch.</p>
                </div>
                <div class="p-10 rounded-[2.5rem] border border-slate-100 shadow-soft hover:bg-slate-50 transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Mobile Optimization</h3>
                    <p class="text-slate-500 text-sm mb-6">Responsive design for seamless browsing on smartphones and tablets.</p>
                </div>
                <div class="p-10 rounded-[2.5rem] border border-slate-100 shadow-soft hover:bg-slate-50 transition-all">
                    <h3 class="text-2xl font-display text-slate-900 mb-4">WhatsApp Integration</h3>
                    <p class="text-slate-500 text-sm mb-6">Add live chat to your website for instant customer support and conversion.</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    toctoc_render_faq( [
        [
            'q' => 'How much does a website cost in the Cayman Islands?',
            'a' => 'Website cost in Cayman depends on the number of pages, features like booking or e-commerce, and whether you need custom design or a redesign. TocToc builds every site as a 24/7 salesperson engineered to convert, and we quote transparently after a quick call about your goals — no generic packages.',
        ],
        [
            'q' => 'How long does it take to build a website?',
            'a' => 'A focused business website typically takes 3 to 6 weeks from kickoff to launch, depending on content readiness and the scope of features. Larger e-commerce or directory platforms take longer. We map a clear timeline before we start so you always know what comes next.',
        ],
        [
            'q' => 'Do you offer website redesign and web development services?',
            'a' => 'Yes. Beyond new builds, we specialize in website redesign and full web development for Cayman businesses — rebuilding slow, outdated, or poorly converting sites with custom architecture, fast Core Web Vitals, and SEO baked in from launch.',
        ],
        [
            'q' => 'Do you build websites for restaurants and hospitality businesses in Cayman?',
            'a' => 'Absolutely. We have built sites for restaurants, watersports, optical boutiques, and real estate across Grand Cayman, with features like digital menus, online reservations, and real-time booking. Hospitality and tourism are a core focus for us.',
        ],
        [
            'q' => 'Will my website be optimized for SEO and mobile?',
            'a' => 'Every website we build is mobile-first and search optimized from day one — clean code, fast loading, Schema markup, and a structure Google and AI assistants love to crawl. A beautiful site that nobody finds is wasted, so visibility is built in, not bolted on.',
        ],
    ], 'Web Design FAQ', 'Website Questions, <em class="italic text-sky-deep font-display">Answered</em>' );
    ?>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-5xl md:text-8xl font-display leading-[0.9] text-slate-900">Get your <br /><em class="italic text-sky-deep font-display">Custom Quote</em></h2>
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
</main>

<?php get_footer(); ?>
