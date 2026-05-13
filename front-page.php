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
        <!-- White overlay to lighten background -->
        <div class="absolute inset-0 bg-white/40 z-[1]"></div>
        <div class="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-b from-transparent via-background/50 to-background pointer-events-none z-[2]"></div>

        <div class="relative z-10 mx-auto max-w-6xl px-6 pt-32 pb-24 text-center flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 text-[11px] font-bold text-slate-950">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-sky-deep"><path d="M12 2v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="M20 12h2"/><path d="m19.07 4.93-1.41 1.41"/><path d="M15.89 15.89 12 12"/><path d="m16.13 7.87-4.13 4.13"/><path d="m7.87 16.13 4.13-4.13"/><path d="m15.89 8.11 3.18-3.18"/><path d="m4.93 19.07 3.18-3.18"/><path d="M12 22v-2"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="m6.34 17.66-1.41 1.41"/></svg>
                A 2026-READY MARKETING AGENCY · CAYMAN ISLANDS
            </div>

            <h1 class="mt-8 text-5xl sm:text-6xl md:text-7xl lg:text-[100px] leading-[0.95] text-slate-900 font-display">
                A Marketing Agency<br />
                focused on getting your<br />
                business in <em class="italic text-sky-deep font-display">AI Answers.</em>
            </h1>

            <p class="mt-8 mx-auto max-w-2xl text-base sm:text-lg text-slate-950 font-medium">
                We are a 2026-ready marketing company that builds the <strong class="bg-accent text-sky-deep px-1.5 py-0.5 rounded-md">Revenue Loop</strong> for your business.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-x-8 gap-y-4">
                <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M20 6 9 17l-5-5"/></svg>
                    Get Recommended
                </div>
                <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M20 6 9 17l-5-5"/></svg>
                    Get Chosen
                </div>
                <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M20 6 9 17l-5-5"/></svg>
                    Get Clients Back
                </div>
            </div>

            <div class="mt-12 flex flex-wrap items-center justify-center gap-4">
                <a href="tel:+13455478120" class="group inline-flex items-center justify-center gap-3 rounded-full bg-accent text-accent-foreground w-full sm:w-64 pl-7 pr-2 py-2 text-base font-bold shadow-glow transition-transform hover:scale-[1.02] decoration-none">
                    Call Us
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary text-primary-foreground transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
                <a href="#portfolio" class="inline-flex items-center justify-center rounded-full bg-white w-full sm:w-64 py-4 text-base font-bold text-slate-900 hover:bg-white/90 transition-colors decoration-none">
                    See Portfolio
                </a>
            </div>
        </div>
    </section>

    <!-- Section 2: Intro -->
    <section class="relative py-24 md:py-32">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <p class="text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                We are a digital marketing agency based in the Cayman Islands, focused on getting your business
                <em class="italic text-sky-deep font-display"> recommended by AI agents.</em>
            </p>
            <p class="mt-8 text-3xl md:text-5xl leading-[1.2] text-slate-950 font-display">
                Our Revenue Loop is the framework we have successfully applied to all our clients to turn digital presence
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
                <p class="mt-8 text-lg text-slate-600 max-w-2xl leading-relaxed">
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
                    <h4 class="text-2xl text-slate-900 font-display mb-4">Free Consultation Call</h4>
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
    <section id="portfolio" class="relative py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 my-12 shadow-glass">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-8xl font-display leading-[0.9]">
                    Portfolio: We Build Websites <em class="italic text-accent font-display">AI Loves</em> & Humans Trust.
                </h2>
                <p class="mt-8 text-lg text-slate-400 max-w-2xl italic">
                    Recent high-performance “Discovery Engines” launched in the last 14 days.
                </p>
            </div>

            <div class="mt-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                <!-- Project 1: Adventura -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/04/photo-5156922354653924700-y.webp" alt="Adventura Cayman" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Adventura Cayman</h3>
                        <p class="text-white/40 text-sm mb-6">Premium Watersports Rental platform with real-time availability and booking.</p>
                        <a href="https://adventuracayman.com" target="_blank" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 2: Uncle Liu -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-49-04.webp" alt="Uncle Liu" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Uncle Liu</h3>
                        <p class="text-white/40 text-sm mb-6">Luxury E-commerce experience tailored for the local market.</p>
                        <a href="https://uncleliu.ky" target="_blank" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 3: Pr-Optics -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-56-45.webp" alt="Pr-Optics" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Pr-Optics</h3>
                        <p class="text-white/40 text-sm mb-6">Modern Optical Boutique website featuring high-end eyewear collections and appointment booking.</p>
                        <a href="https://pr-optics.com/" target="_blank" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 4: Smash Burger -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/image-2026-05-13-11-23-39.webp" alt="Smash Burger" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Smash Burger</h3>
                        <p class="text-white/40 text-sm mb-6">Vibrant Quick Service Restaurant website with digital ordering and loyalty program.</p>
                        <a href="#" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 5: Prospect Center -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/04/image-2026-04-29-16-47-02.webp" alt="Prospect Center" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">Prospect Center</h3>
                        <p class="text-white/40 text-sm mb-6">Corporate Real Estate portal with advanced search and directory features.</p>
                        <a href="https://prospectcenter.ky" target="_blank" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Project 6: The Yard -->
                <div class="group flex flex-col gap-6">
                    <div class="aspect-video rounded-[2.5rem] bg-white/5 overflow-hidden border border-white/10 shadow-soft">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/05/image-2026-05-13-11-23-06.webp" alt="The Yard" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700" />
                    </div>
                    <div>
                        <h3 class="text-3xl font-display text-white mb-2">The Yard</h3>
                        <p class="text-white/40 text-sm mb-6">Industrial Co-working and storage facility landing page with unit booking.</p>
                        <a href="#" class="inline-flex items-center gap-2 font-bold text-accent hover:gap-4 transition-all decoration-none">
                            Visit Website <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Social Proof (Google Reviews) -->
    <!-- Section 6: Social Proof (Google Reviews) - Orbiting Layout -->
    <section id="reviews" class="relative py-32 bg-[#f8fafc] text-slate-900 rounded-[3rem] mx-4 my-12 overflow-hidden">
        <style>
            @keyframes float {
                0% { transform: translateY(0px) rotate(0deg); }
                33% { transform: translateY(-15px) rotate(1deg); }
                66% { transform: translateY(-5px) rotate(-1deg); }
                100% { transform: translateY(0px) rotate(0deg); }
            }
            .float-animation {
                animation: float 8s ease-in-out infinite;
            }
            .float-delayed-1 { animation-delay: -2s; }
            .float-delayed-2 { animation-delay: -4s; }
            .float-delayed-3 { animation-delay: -6s; }
            
            #reviews .hover\:pause-animation:hover {
                animation-play-state: paused;
            }
        </style>

        <!-- Grid Background -->
        <div class="absolute inset-0 opacity-[0.08]" style="background-image: linear-gradient(#94a3b8 1px, transparent 1px), linear-gradient(90deg, #94a3b8 1px, transparent 1px); background-size: 50px 50px;"></div>
        
        <div class="relative mx-auto max-w-7xl px-6">
            
            <!-- Floating Cards Container (H2 centered behind reviews on Desktop, Stacked on Mobile) -->
            <div class="relative min-h-[800px] md:h-[1000px] w-full mt-10 flex flex-col md:block">
                
                <!-- TITLE: Top on Mobile, Centered on Desktop -->
                <div class="relative md:absolute md:inset-0 flex flex-col items-center md:justify-center text-center z-0 pointer-events-none mb-20 md:mb-0">
                    <h2 class="text-5xl md:text-[112px] font-display leading-[0.85] tracking-tighter text-black select-none">
                        TocToc Works <br />
                        <span class="italic">Wherever You Do</span>
                    </h2>
                    <div class="mt-8 md:mt-12 flex flex-col items-center gap-4">
                        <div class="flex gap-1 text-yellow-500 text-2xl md:text-3xl">★★★★★</div>
                        <div class="text-sm font-bold text-slate-400 uppercase tracking-[0.4em]">4.9/5 Rating on Google</div>
                    </div>
                </div>

                <!-- Floating Cards -->
                <div class="flex flex-col gap-6 md:block">
                    <!-- Review 1 -->
                    <div class="relative md:absolute md:top-[50px] md:left-[2%] w-full md:w-[350px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-20 md:float-animation hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-black text-white flex items-center justify-center font-bold text-xl shadow-lg">LF</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Laura Farries</div>
                                <div class="text-xs text-slate-400">Entrepreneur · Cayman Islands</div>
                            </div>
                        </div>
                        <p class="text-xl font-bold leading-[1.4] text-slate-800">
                            “Daniel and his team were genuinely a joy to work with. Thoughtful, generous, and always makes time.”
                        </p>
                    </div>

                    <!-- Review 2 -->
                    <div class="relative md:absolute md:top-[0px] md:right-[2%] w-full md:w-[380px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-30 md:float-animation md:float-delayed-1 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center font-bold text-xl shadow-inner">MT</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Mark Thompson</div>
                                <div class="text-xs text-slate-400">Creative Director · Paradise Paddle</div>
                            </div>
                        </div>
                        <p class="text-xl font-bold leading-[1.4] text-slate-800">
                            “Working with Daniel at TocToc was the best experience we’ve ever had with a marketing agency! Highly recommend.”
                        </p>
                    </div>

                    <!-- Review 3 -->
                    <div class="relative md:absolute md:top-[380px] md:left-[0%] w-full md:w-[340px] bg-white/80 backdrop-blur-xl p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-white z-10 md:float-animation md:float-delayed-2 hover:pause-animation transition-all duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 font-bold text-xl border border-slate-100">SJ</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Sarah Jenkins</div>
                                <div class="text-xs text-slate-400">Marketing Executive · UK</div>
                            </div>
                        </div>
                        <p class="text-lg font-bold leading-[1.4] text-slate-700">
                            “The AI-driven strategy they implemented doubled our leads in months. Professional, fast, and results-oriented.”
                        </p>
                    </div>

                    <!-- Review 4 -->
                    <div class="relative md:absolute md:top-[320px] md:right-[0%] w-full md:w-[350px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-40 md:float-animation md:float-delayed-3 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold text-xl shadow-inner">JT</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Janice Tangub</div>
                                <div class="text-xs text-slate-400">Client · Cayman Islands</div>
                            </div>
                        </div>
                        <p class="text-lg font-bold leading-[1.4] text-slate-800">
                            “Daniel is awesome! He immensely knows the ins and outs of social media marketing and he is a great help.”
                        </p>
                    </div>

                    <!-- Review 5 -->
                    <div class="relative md:absolute md:top-[680px] md:left-[10%] w-full md:w-[360px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-30 md:float-animation md:float-delayed-1 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xl shadow-inner">SW</div>
                            <div>
                                <div class="font-bold text-black leading-tight">Stuart Whittle</div>
                                <div class="text-xs text-slate-400">Business Owner · Cayman Islands</div>
                            </div>
                        </div>
                        <p class="text-lg font-bold leading-[1.4] text-slate-800">
                            “Very professional, awesome at what they do and great customer service on top! Can’t recommend enough.”
                        </p>
                    </div>

                    <!-- Review 6 -->
                    <div class="relative md:absolute md:top-[620px] md:right-[5%] w-full md:w-[360px] bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.06)] border border-slate-100 z-50 md:float-animation md:float-delayed-2 hover:pause-animation transition-all duration-500 hover:shadow-2xl">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-black text-white flex items-center justify-center font-bold text-xl shadow-lg">JW</div>
                            <div>
                                <div class="font-bold text-black leading-tight">James Wilson</div>
                                <div class="text-xs text-slate-400">Tech Founder · Bipolaroid Studios</div>
                            </div>
                        </div>
                        <p class="text-xl font-bold leading-[1.4] text-slate-800">
                            “I was looking for a partner who understood the AI era. TocToc precision with a local touch. Honestly game-changer.”
                        </p>
                    </div>
                </div>

            </div>

            <div class="mt-20 flex justify-center relative z-50">
                <a href="https://www.google.com/maps/place/Toc+Toc+Marketing+-+Digital+Marketing+Agency/@19.2945176,-81.3754188,17z/data=!4m8!3m7!1s0x224ce3f8338a51c1:0xece663baba0755!8m2!3d19.2945176!4d-81.3754188!9m1!1b1!16s%2Fg%2F11t6vf_mtj?hl=en&entry=ttu&g_ep=EgoyMDI2MDQyNi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="inline-flex items-center gap-3 rounded-full border border-slate-200 bg-white px-10 py-5 text-sm font-bold text-slate-900 hover:bg-slate-50 transition-all shadow-xl hover:scale-105 decoration-none">
                    <svg viewBox="0 0 24 24" width="20" height="20" class="mr-1"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    View All Reviews
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
            <a href="tel:+13455478120" class="group mt-12 inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-transform hover:scale-[1.05] decoration-none">
                Call Us
                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                </span>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
