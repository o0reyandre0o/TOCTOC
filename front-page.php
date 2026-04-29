<?php get_header(); ?>

<main class="min-h-screen bg-background">
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

    <!-- Section 6: Social Proof -->
    <section class="relative py-24 md:py-32 bg-slate-950 text-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-5xl md:text-7xl font-display">
                    What Our <em class="italic text-accent font-display">Clients Say</em>
                </h2>
                <p class="mt-8 text-white/50 text-lg">
                    22 years of marketing expertise backed by real local results.
                </p>
            </div>
            <!-- Google Review Integration Placeholder -->
            <div class="mt-20 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl">
                    <div class="flex gap-1 text-accent">★★★★★</div>
                    <p class="text-lg text-white/90 italic">“Real results, real magic.”</p>
                    <div class="mt-auto pt-8 border-t border-white/5 text-sm text-white/40 font-medium">Verified Google Review</div>
                </div>
                <div class="rounded-[2.5rem] bg-white/[0.03] border border-white/5 p-10 flex flex-col gap-6 backdrop-blur-3xl">
                    <div class="flex gap-1 text-accent">★★★★★</div>
                    <p class="text-lg text-white/90 italic">“The Revenue Loop delivered exactly what they promised.”</p>
                    <div class="mt-auto pt-8 border-t border-white/5 text-sm text-white/40 font-medium">Verified Google Review</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Case Studies -->
    <section class="relative py-24 md:py-32 bg-slate-950 text-white border-t border-white/5">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-7xl font-display">
                    The Loop in <em class="italic text-accent font-display">Action</em>
                </h2>
                <p class="mt-8 text-white/50 text-lg">
                    Video deep-dives into how we transform businesses through our Revenue Loop.
                </p>
            </div>
            
            <div class="mt-16 grid gap-8 md:grid-cols-3">
                <div class="aspect-video rounded-[2rem] bg-white/5 border border-white/10 flex items-center justify-center group cursor-pointer hover:bg-white/10 transition-all">
                    <div class="text-center p-8">
                        <div class="text-xs font-bold uppercase tracking-widest text-accent mb-2">Video 01</div>
                        <div class="text-lg font-display">The Prime Group Portfolio Shift</div>
                    </div>
                </div>
                <div class="aspect-video rounded-[2rem] bg-white/5 border border-white/10 flex items-center justify-center group cursor-pointer hover:bg-white/10 transition-all">
                    <div class="text-center p-8">
                        <div class="text-xs font-bold uppercase tracking-widest text-accent mb-2">Video 02</div>
                        <div class="text-lg font-display">Real Estate AI Dominance</div>
                    </div>
                </div>
                <div class="aspect-video rounded-[2rem] bg-white/5 border border-white/10 flex items-center justify-center group cursor-pointer hover:bg-white/10 transition-all">
                    <div class="text-center p-8">
                        <div class="text-xs font-bold uppercase tracking-widest text-accent mb-2">Video 03</div>
                        <div class="text-lg font-display">Retention Systems & Automation</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
