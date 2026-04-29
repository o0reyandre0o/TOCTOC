<?php get_header(); ?>

<main class="min-h-screen bg-background">
    <!-- Hero Section -->
    <section id="home" class="relative min-h-[100svh] w-full overflow-hidden flex items-center">
        <!-- Sky background -->
        <img
            src="https://images.unsplash.com/photo-1513002749550-c59d786b8e6c?q=80&w=2574&auto=format&fit=crop"
            alt="Sky above the clouds"
            class="absolute inset-0 w-full h-full object-cover"
        />
        <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-b from-transparent to-background pointer-events-none z-[2]"></div>

        <div class="relative z-10 mx-auto max-w-6xl px-6 pt-32 pb-24 text-center flex flex-col items-center">
            <div class="inline-flex items-center gap-2 rounded-full glass px-4 py-1.5 text-[11px] font-bold text-slate-600 shadow-soft border border-white/80">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-sky-deep"><path d="M12 2v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="M20 12h2"/><path d="m19.07 4.93-1.41 1.41"/><path d="M15.89 15.89 12 12"/><path d="m16.13 7.87-4.13 4.13"/><path d="m7.87 16.13 4.13-4.13"/><path d="m15.89 8.11 3.18-3.18"/><path d="m4.93 19.07 3.18-3.18"/><path d="M12 22v-2"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="m6.34 17.66-1.41 1.41"/></svg>
                A 2026-READY MARKETING AGENCY · CAYMAN ISLANDS
            </div>

            <h1 class="mt-8 text-5xl sm:text-6xl md:text-7xl lg:text-[100px] leading-[0.95] text-slate-900 font-display">
                A Marketing Agency<br />
                focused on getting your<br />
                business in <em class="italic text-sky-deep font-display">AI Answers.</em>
            </h1>

            <p class="mt-8 mx-auto max-w-2xl text-base sm:text-lg text-slate-600">
                We build the <strong>Revenue Loop</strong> for your business — a framework to turn digital presence into a measurable revenue engine.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-2">
                <span class="rounded-full bg-white px-6 py-2 text-sm font-semibold text-slate-900 shadow-soft border border-slate-100">Get Recommended</span>
                <span class="text-slate-300">—</span>
                <span class="rounded-full bg-white px-6 py-2 text-sm font-semibold text-slate-900 shadow-soft border border-slate-100">Get Chosen</span>
                <span class="text-slate-300">—</span>
                <span class="rounded-full bg-white px-6 py-2 text-sm font-semibold text-slate-900 shadow-soft border border-slate-100">Get Clients Back</span>
            </div>

            <div class="mt-12 flex flex-wrap items-center justify-center gap-4">
                <a href="#contact" class="group inline-flex items-center gap-3 rounded-full bg-accent text-accent-foreground pl-7 pr-2 py-2 text-base font-bold shadow-glow transition-transform hover:scale-[1.02] decoration-none">
                    Book a Free Consultation
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary text-primary-foreground transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
                <a href="#portfolio" class="inline-flex items-center gap-2 rounded-full glass px-10 py-4 text-base font-bold text-slate-800 hover:bg-white/80 transition-colors decoration-none shadow-soft">
                    See Portfolio
                </a>
            </div>
        </div>
    </section>

    <!-- Section 2: Intro -->
    <section class="relative py-24 md:py-32">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2 text-xs font-bold text-slate-500 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Based in the Cayman Islands
            </div>
            <p class="mt-10 text-3xl md:text-5xl leading-[1.2] text-slate-900 font-display">
                We are a digital marketing agency focused on getting your business
                <em class="italic text-sky-deep font-display"> recommended by AI agents.</em> Our Revenue Loop is
                the framework we have successfully applied to all our clients to turn digital presence
                into a measurable revenue engine.
            </p>
        </div>
    </section>

    <!-- Section 3: Revenue Loop -->
    <section id="loop" class="relative py-24 md:py-32 bg-sky-pale/50">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">The framework</span>
                <h2 class="mt-4 text-5xl md:text-7xl text-slate-900 font-display">
                    We build a <em class="italic text-sky-deep font-display">Revenue Loop</em> for your business
                </h2>
                <p class="mt-8 text-lg text-slate-600 max-w-2xl leading-relaxed">
                    A three-phase marketing framework designed to dominate the 2026 digital landscape by turning
                    search intent into sustainable growth.
                </p>
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-3">
                <!-- Card 01 -->
                <article class="relative rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass">
                    <div class="flex items-center justify-between mb-10">
                        <span class="font-display text-6xl text-sky-deep/20">01</span>
                        <div class="w-12 h-12 bg-slate-950 rounded-full flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
                        </div>
                    </div>
                    <h3 class="text-3xl text-slate-900 font-display mb-2">Get Recommended</h3>
                    <p class="text-sm font-bold text-sky-deep uppercase tracking-wider mb-6">Discovery & AI Visibility</p>
                    <p class="text-sm leading-relaxed text-slate-500 mb-8">We optimize your “Context” across the platforms AI assistants use to learn about and recommend local businesses.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Google Maps</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Apple Maps</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">TripAdvisor</span>
                    </div>
                </article>

                <!-- Card 02 -->
                <article class="relative rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass">
                    <div class="flex items-center justify-between mb-10">
                        <span class="font-display text-6xl text-sky-deep/20">02</span>
                        <div class="w-12 h-12 bg-slate-950 rounded-full flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        </div>
                    </div>
                    <h3 class="text-3xl text-slate-900 font-display mb-2">Get Chosen</h3>
                    <p class="text-sm font-bold text-sky-deep uppercase tracking-wider mb-6">Your Website Foundation</p>
                    <p class="text-sm leading-relaxed text-slate-500 mb-8">We build high-speed “Discovery Engines” that turn a recommendation into a confirmed lead.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Custom Website</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Mobile UI/UX</span>
                    </div>
                </article>

                <!-- Card 03 -->
                <article class="relative rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass">
                    <div class="flex items-center justify-between mb-10">
                        <span class="font-display text-6xl text-sky-deep/20">03</span>
                        <div class="w-12 h-12 bg-slate-950 rounded-full flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m17 2 4 4-4 4"/><path d="M3 11v-1a4 4 0 0 1 4-4h14"/><path d="m7 22-4-4 4-4"/><path d="M21 13v1a4 4 0 0 1-4 4H3"/></svg>
                        </div>
                    </div>
                    <h3 class="text-3xl text-slate-900 font-display mb-2">Get Clients Back</h3>
                    <p class="text-sm font-bold text-sky-deep uppercase tracking-wider mb-6">Retention & Automation</p>
                    <p class="text-sm leading-relaxed text-slate-500 mb-8">We capture customer data and use intelligent systems to keep your brand top-of-mind.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">SMS Automation</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">CRM Loop</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Section 4: Process -->
    <section id="process" class="relative py-24 md:py-32">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-12">
                <div class="max-w-2xl">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Our Process</span>
                    <h2 class="mt-4 text-5xl md:text-7xl text-slate-900 font-display leading-[0.9]">
                        How to <em class="italic text-sky-deep font-display">work with us</em>
                    </h2>
                </div>
                <p class="text-slate-500 max-w-sm text-lg">
                    A transparent, 4-step path to increasing your leads and revenue.
                </p>
            </div>

            <div class="mt-20 grid grid-cols-1 md:grid-cols-4 bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-soft">
                <div class="p-10 border-r border-slate-50 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">01</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h4 class="text-2xl text-slate-900 font-display mb-4">Book a Free Consultation</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">We discuss your goals and audit your current digital presence.</p>
                </div>
                <div class="p-10 border-r border-slate-50 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">02</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h4 class="text-2xl text-slate-900 font-display mb-4">We Present a Solution</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">We map out a custom Revenue Loop specific to your industry.</p>
                </div>
                <div class="p-10 border-r border-slate-50 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">03</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h4 class="text-2xl text-slate-900 font-display mb-4">We Execute the Plan</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">Our team builds your foundation and optimizes your AI visibility.</p>
                </div>
                <div class="p-10 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">04</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h4 class="text-2xl text-slate-900 font-display mb-4">Start Receiving Leads</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">Your business becomes the recommended answer in search.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Portfolio (Dark Mode) -->
    <section id="portfolio" class="relative py-24 md:py-32 bg-slate-950 text-white rounded-t-[3rem]">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Portfolio</span>
                <h2 class="mt-6 text-5xl md:text-8xl font-display leading-[0.9]">
                    We build websites <em class="italic text-accent font-display">AI loves</em> & humans trust.
                </h2>
                <p class="mt-8 text-lg text-slate-400 max-w-2xl italic">
                    Recent high-performance “Discovery Engines” launched in the last 14 days.
                </p>
            </div>

            <ul class="mt-20 divide-y divide-white/10 border-y border-white/10">
                <li>
                    <a href="https://adventuracayman.com" target="_blank" class="group flex items-center justify-between py-10 md:py-14 transition-all hover:bg-white/5 px-4 -mx-4 rounded-[2rem] decoration-none text-white">
                        <div class="flex items-center gap-8 md:gap-16">
                            <span class="text-4xl md:text-7xl font-display group-hover:text-accent transition-colors">Adventura Cayman</span>
                            <span class="hidden md:inline text-[11px] uppercase tracking-[0.3em] text-white/30 font-black">Tourism</span>
                        </div>
                        <div class="flex items-center gap-6">
                            <span class="hidden sm:inline text-sm text-white/40 font-mono italic">adventuracayman.com</span>
                            <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-slate-950 transition-all group-hover:rotate-45">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://uncleliu.ky" target="_blank" class="group flex items-center justify-between py-10 md:py-14 transition-all hover:bg-white/5 px-4 -mx-4 rounded-[2rem] decoration-none text-white">
                        <div class="flex items-center gap-8 md:gap-16">
                            <span class="text-4xl md:text-7xl font-display group-hover:text-accent transition-colors">Uncle Liu</span>
                            <span class="hidden md:inline text-[11px] uppercase tracking-[0.3em] text-white/30 font-black">Restaurant</span>
                        </div>
                        <div class="flex items-center gap-6">
                            <span class="hidden sm:inline text-sm text-white/40 font-mono italic">uncleliu.ky</span>
                            <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-slate-950 transition-all group-hover:rotate-45">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                            </span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Section 6: CTA (Clouds) -->
    <section id="contact" class="relative py-32 md:py-48 text-center bg-sky-pale/50 overflow-hidden">
        <div class="relative z-10 mx-auto max-w-4xl px-6">
            <h2 class="text-5xl md:text-[100px] leading-[0.95] text-slate-950 font-display">Ready to build your <em class="italic font-display">Revenue Loop?</em></h2>
            <p class="mt-8 text-slate-600 text-lg md:text-xl">Let’s turn your brand into the recommended answer.</p>
            <a href="mailto:hello@toctoc.ky" class="group mt-12 inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-transform hover:scale-[1.05] decoration-none">
                Book a Free Consultation
                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                </span>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
