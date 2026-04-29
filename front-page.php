<?php get_header(); ?>

<main class="min-h-screen bg-background text-foreground">
    <!-- Section 1: Hero Section -->
    <section id="home" class="relative min-h-[100svh] w-full overflow-hidden flex items-center">
        <!-- Clean Sky background -->
        <img
            src="https://images.unsplash.com/photo-1513002749550-c59d786b8e6c?q=80&w=2574&auto=format&fit=crop"
            alt="Sky"
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
                We are a 2026-ready marketing company that builds the <strong>Revenue Loop</strong> for your business.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-2">
                <span class="rounded-full bg-white px-6 py-2 text-sm font-semibold text-slate-900 shadow-soft border border-slate-100">Get Recommended</span>
                <span class="text-slate-300">•</span>
                <span class="rounded-full bg-white px-6 py-2 text-sm font-semibold text-slate-900 shadow-soft border border-slate-100">Get Chosen</span>
                <span class="text-slate-300">•</span>
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
            <p class="text-3xl md:text-5xl leading-[1.2] text-slate-900 font-display">
                We are a digital marketing agency based in the Cayman Islands, focused on getting your business
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
                <h2 class="text-5xl md:text-7xl text-slate-900 font-display">
                    We build a <em class="italic text-sky-deep font-display">Revenue Loop</em> for your business
                </h2>
                <p class="mt-8 text-lg text-slate-600 max-w-2xl leading-relaxed">
                    <strong>What is it?</strong> A three-phase marketing framework designed to dominate the 2026 digital landscape by turning search intent into sustainable growth.
                </p>
                <p class="mt-6 text-slate-500 max-w-2xl">
                    Our Revenue Loop framework consists of three fundamental phases designed to stabilize your digital foundation, drive new discovery through AI, and maximize customer lifetime value.
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
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">LinkedIn</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Yelp</span>
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
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Performance Landings</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Online Booking</span>
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
                    <p class="text-sm leading-relaxed text-slate-500 mb-8">We capture your customer data and use intelligent systems to keep your brand top-of-mind.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Email Marketing</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">SMS Automation</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">CRM Integration</span>
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
                    <h2 class="text-5xl md:text-7xl text-slate-900 font-display leading-[0.9]">
                        How to <em class="italic text-sky-deep font-display">Work With Us</em>
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
                    <h4 class="text-2xl text-slate-900 font-display mb-4">We Present a Tailored Solution</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">We map out a custom Revenue Loop specific to your industry.</p>
                </div>
                <div class="p-10 border-r border-slate-50 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">03</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h4 class="text-2xl text-slate-900 font-display mb-4">We Execute the Solution</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">Our team builds your foundation and optimizes your AI visibility.</p>
                </div>
                <div class="p-10 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep">04</span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h4 class="text-2xl text-slate-900 font-display mb-4">You Start Receiving Leads</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">Your business becomes the recommended answer in the modern search era.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Portfolio -->
    <section id="portfolio" class="relative py-24 md:py-32 bg-slate-950 text-white rounded-t-[3rem]">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-8xl font-display leading-[0.9]">
                    Portfolio: We Build Websites <em class="italic text-accent font-display">AI Loves</em> & Humans Trust.
                </h2>
                <p class="mt-8 text-lg text-slate-400 max-w-2xl italic">
                    Recent high-performance “Discovery Engines” launched in the last 14 days.
                </p>
            </div>

            <ul class="mt-20 divide-y divide-white/10 border-y border-white/10">
                <li>
                    <a href="https://adventuracayman.com" target="_blank" class="group flex items-center justify-between py-10 transition-all hover:bg-white/5 px-4 -mx-4 rounded-[2rem] decoration-none text-white">
                        <span class="text-4xl md:text-7xl font-display group-hover:text-accent transition-colors">Adventura Cayman</span>
                        <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-slate-950 transition-all group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://uncleliu.ky" target="_blank" class="group flex items-center justify-between py-10 transition-all hover:bg-white/5 px-4 -mx-4 rounded-[2rem] decoration-none text-white">
                        <span class="text-4xl md:text-7xl font-display group-hover:text-accent transition-colors">Uncle Liu</span>
                        <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-slate-950 transition-all group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://coconutroom.ky" target="_blank" class="group flex items-center justify-between py-10 transition-all hover:bg-white/5 px-4 -mx-4 rounded-[2rem] decoration-none text-white">
                        <span class="text-4xl md:text-7xl font-display group-hover:text-accent transition-colors">Coconut Room</span>
                        <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-slate-950 transition-all group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://insulation.brisanaconstruction.com" target="_blank" class="group flex items-center justify-between py-10 transition-all hover:bg-white/5 px-4 -mx-4 rounded-[2rem] decoration-none text-white">
                        <span class="text-4xl md:text-7xl font-display group-hover:text-accent transition-colors">Brisana Insulation</span>
                        <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-slate-950 transition-all group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://prospectcenter.ky" target="_blank" class="group flex items-center justify-between py-10 transition-all hover:bg-white/5 px-4 -mx-4 rounded-[2rem] decoration-none text-white">
                        <span class="text-4xl md:text-7xl font-display group-hover:text-accent transition-colors">Prospect Center</span>
                        <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-slate-950 transition-all group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Section 6: Social Proof (Google Reviews) -->
    <section id="reviews" class="relative py-24 md:py-32 bg-slate-950 text-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-10">
                <div class="max-w-2xl">
                    <h2 class="text-5xl md:text-7xl font-display">
                        What Our <em class="italic text-accent font-display">Clients Say</em>
                    </h2>
                    <p class="mt-8 text-white/50 text-lg">
                        22 years of marketing expertise backed by real local results.
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex flex-col items-end">
                        <div class="flex gap-1 text-accent mb-1">★★★★★</div>
                        <div class="text-sm font-bold text-white/40">4.9/5 Rating on Google</div>
                    </div>
                    <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_light_color_92x30dp.png" alt="Google" class="h-6 opacity-80" />
                </div>
            </div>

            <div class="mt-20 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Daniel and his team were genuinely a joy to work with. Daniel is thoughtful and generous and makes time for all your questions.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">LF</div>
                        <div>
                            <div class="text-base font-bold">Laura Farries</div>
                            <div class="text-xs text-white/40 italic">2 months ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Working with Daniel at Toc Toc was the best experience we’ve ever had with a web designer! Highly recommend.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">PP</div>
                        <div>
                            <div class="text-base font-bold">Paradise Paddle</div>
                            <div class="text-xs text-white/40 italic">3 weeks ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Excellent design work! They're super creative and gave my brand image a huge boost. Highly recommended!”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">DA</div>
                        <div>
                            <div class="text-base font-bold">Diego Andre</div>
                            <div class="text-xs text-white/40 italic">2 months ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Excellent service! The Toctoc team helped me improve my website's SEO, and I started seeing real results quickly.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">MR</div>
                        <div>
                            <div class="text-base font-bold">María Rincón</div>
                            <div class="text-xs text-white/40 italic">2 months ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Daniel Garrido and his team are absolutely top-tier! They built an incredible website for me, making the process stress-free.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">BS</div>
                        <div>
                            <div class="text-base font-bold">Bipolaroid Studios</div>
                            <div class="text-xs text-white/40 italic">a year ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “They have been extremely helpful and innovative taking our vision and making it a reality. Wide range of services available.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">JM</div>
                        <div>
                            <div class="text-base font-bold">Jeff Mcglashan</div>
                            <div class="text-xs text-white/40 italic">2 years ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Daniel is awesome! He immensely knows the ins and outs of social media marketing and he is a great help.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">JT</div>
                        <div>
                            <div class="text-base font-bold">Janice Tangub</div>
                            <div class="text-xs text-white/40 italic">2 years ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Very professional, awesome at what they do and great customer service on top! Can’t recommend enough.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">SW</div>
                        <div>
                            <div class="text-base font-bold">Stuart Whittle</div>
                            <div class="text-xs text-white/40 italic">2 years ago</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl hover:bg-white/[0.05] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-1 text-accent">★★★★★</div>
                        <svg viewBox="0 0 24 24" width="18" height="18" class="text-white/20" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    </div>
                    <blockquote class="text-lg leading-relaxed text-white/90">
                        “Top notch marketing. Very engaged, attentive to details and a pleasure to work with.”
                    </blockquote>
                    <figcaption class="mt-auto pt-8 border-t border-white/5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">LZ</div>
                        <div>
                            <div class="text-base font-bold">Lois Zachok</div>
                            <div class="text-xs text-white/40 italic">a month ago</div>
                        </div>
                    </figcaption>
                </figure>
            </div>

            <div class="mt-16 text-center">
                <a href="https://www.google.com/maps/place/Toc+Toc+Marketing+-+Digital+Marketing+Agency/@19.2945176,-81.3754188,17z/data=!4m8!3m7!1s0x224ce3f8338a51c1:0xece663baba0755!8m2!3d19.2945176!4d-81.3754188!9m1!1b1!16s%2Fg%2F11t6vf_mtj?hl=en&entry=ttu&g_ep=EgoyMDI2MDQyNi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/5 px-8 py-4 text-sm font-bold text-white hover:bg-white/10 transition-all decoration-none">
                    <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_light_color_92x30dp.png" alt="Google" class="h-4 mr-2" />
                    Read More Reviews
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ml-1"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 7: Case Studies (Hidden for now)
    <section class="relative py-24 md:py-32 bg-slate-950 text-white border-t border-white/5">
        ...
    </section>
    -->

    <!-- Section 8: Final Call to Action -->
    <section id="contact" class="relative py-32 md:py-48 overflow-hidden bg-gradient-to-b from-background via-sky-pale to-sky-light/30">
        <div class="relative mx-auto max-w-4xl px-6 text-center flex flex-col items-center">
            <h2 class="text-5xl md:text-[100px] leading-[0.95] text-slate-950 font-display">
                Ready to build your <br /><em class="italic font-display">Revenue Loop?</em>
            </h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 max-w-xl mx-auto">
                Let’s talk about your business and how we can turn your brand into the recommended answer.
            </p>
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
