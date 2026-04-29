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
        <!-- fade to background at bottom -->
        <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-b from-transparent to-background pointer-events-none z-[2]"></div>

        <!-- Floating clouds -->
        <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/690ce435b295f16c937cbef7_b37d532fd83b00c1e636745a11a55287_join-left.svg" alt="" aria-hidden class="absolute -left-20 top-40 w-[420px] opacity-90 animate-drift z-[1] pointer-events-none" />
        <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/690ce435bd41a8da12a0be42_459daa8b4411ff62fef7ad254a9456d5_join-right.svg" alt="" aria-hidden class="absolute -right-32 top-72 w-[520px] opacity-80 animate-float-slow z-[1] pointer-events-none" />

        <div class="relative z-10 mx-auto max-w-6xl px-6 pt-32 pb-24 text-center">
            <div class="inline-flex items-center gap-2 rounded-full glass px-4 py-1.5 text-xs font-medium text-primary shadow-soft">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-sky-deep"><path d="M12 2v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="M20 12h2"/><path d="m19.07 4.93-1.41 1.41"/><path d="M15.89 15.89 12 12"/><path d="m16.13 7.87-4.13 4.13"/><path d="m7.87 16.13 4.13-4.13"/><path d="m15.89 8.11 3.18-3.18"/><path d="m4.93 19.07 3.18-3.18"/><path d="M12 22v-2"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="m6.34 17.66-1.41 1.41"/></svg>
                A 2026-ready marketing agency · Cayman Islands
            </div>

            <h1 class="mt-8 text-5xl sm:text-6xl md:text-7xl lg:text-[88px] leading-[1.02] text-primary text-balance font-display">
                A Marketing Agency<br />
                focused on getting your<br />
                business in <em class="italic text-sky-deep">AI Answers.</em>
            </h1>

            <p class="mt-6 mx-auto max-w-2xl text-base sm:text-lg text-primary/70">
                We build the <span class="font-medium text-primary">Revenue Loop</span> for your business —
                a framework to turn digital presence into a measurable revenue engine.
            </p>

            <!-- core concept pill row -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-2 text-sm font-medium">
                <span class="flex items-center gap-2">
                    <span class="rounded-full glass px-4 py-1.5 text-primary shadow-sm">Get Recommended</span>
                    <span class="text-primary/40">→</span>
                </span>
                <span class="flex items-center gap-2">
                    <span class="rounded-full glass px-4 py-1.5 text-primary shadow-sm">Get Chosen</span>
                    <span class="text-primary/40">→</span>
                </span>
                <span class="flex items-center gap-2">
                    <span class="rounded-full glass px-4 py-1.5 text-primary shadow-sm">Get Clients Back</span>
                </span>
            </div>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                <a href="#contact" class="group inline-flex items-center gap-2 rounded-full bg-accent text-accent-foreground pl-6 pr-2 py-2 text-sm font-semibold shadow-glow transition-transform hover:scale-[1.02]">
                    Book a Free Consultation
                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-primary text-primary-foreground transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
                <a href="#portfolio" class="inline-flex items-center gap-2 rounded-full glass px-6 py-3 text-sm font-semibold text-primary hover:bg-white/80 transition-colors">
                    See Portfolio
                </a>
            </div>
        </div>
    </section>

    <!-- Section 2: Intro -->
    <section id="about" class="relative py-24 md:py-32">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-border bg-card px-4 py-1.5 text-xs font-medium text-muted-foreground">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-sky-deep"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Based in the Cayman Islands
            </div>
            <p class="mt-8 text-2xl md:text-4xl leading-snug text-primary text-balance font-display">
                We are a digital marketing agency focused on getting your business
                <em class="italic text-sky-deep"> recommended by AI agents.</em> Our Revenue Loop is
                the framework we have successfully applied to all our clients to turn digital presence
                into a measurable revenue engine.
            </p>
        </div>
    </section>

    <!-- Section 3: Revenue Loop -->
    <section id="loop" class="relative py-24 md:py-32 bg-sky-pale">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-deep">The framework</span>
                <h2 class="mt-4 text-4xl md:text-6xl text-primary text-balance font-display">
                    We build a <em class="italic text-sky-deep font-display">Revenue Loop</em> for your business
                </h2>
                <p class="mt-6 text-lg text-muted-foreground max-w-2xl">
                    A three-phase marketing framework designed to dominate the 2026 digital landscape by turning
                    search intent into sustainable growth.
                </p>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                <!-- Phase 01 -->
                <article class="relative rounded-3xl bg-card border border-border p-7 shadow-soft hover:shadow-glass transition-shadow">
                    <div class="flex items-center justify-between">
                        <span class="font-display text-5xl text-sky-deep/30">01</span>
                        <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-primary text-primary-foreground">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
                        </span>
                    </div>
                    <h3 class="mt-6 text-3xl text-primary font-display">Get Recommended</h3>
                    <p class="mt-1 text-sm font-medium text-sky-deep">Discovery & AI Visibility</p>
                    <p class="mt-4 text-sm leading-relaxed text-muted-foreground">We optimize your “Context” across the platforms AI assistants use to learn about and recommend local businesses.</p>
                    <div class="mt-6 flex flex-wrap gap-1.5">
                        <span class="rounded-full bg-secondary text-secondary-foreground text-[10px] px-3 py-1 uppercase tracking-wider font-semibold">Google Maps</span>
                        <span class="rounded-full bg-secondary text-secondary-foreground text-[10px] px-3 py-1 uppercase tracking-wider font-semibold">Apple Maps</span>
                        <span class="rounded-full bg-secondary text-secondary-foreground text-[10px] px-3 py-1 uppercase tracking-wider font-semibold">ChatGPT</span>
                    </div>
                </article>
                <!-- Phase 02 -->
                <article class="relative rounded-3xl bg-card border border-border p-7 shadow-soft hover:shadow-glass transition-shadow">
                    <div class="flex items-center justify-between">
                        <span class="font-display text-5xl text-sky-deep/30">02</span>
                        <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-primary text-primary-foreground">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        </span>
                    </div>
                    <h3 class="mt-6 text-3xl text-primary font-display">Get Chosen</h3>
                    <p class="mt-1 text-sm font-medium text-sky-deep">Your Website Foundation</p>
                    <p class="mt-4 text-sm leading-relaxed text-muted-foreground">We build high-speed “Discovery Engines” that turn a recommendation into a confirmed lead.</p>
                    <div class="mt-6 flex flex-wrap gap-1.5">
                        <span class="rounded-full bg-secondary text-secondary-foreground text-[10px] px-3 py-1 uppercase tracking-wider font-semibold">Custom Design</span>
                        <span class="rounded-full bg-secondary text-secondary-foreground text-[10px] px-3 py-1 uppercase tracking-wider font-semibold">Fast Load</span>
                    </div>
                </article>
                <!-- Phase 03 -->
                <article class="relative rounded-3xl bg-card border border-border p-7 shadow-soft hover:shadow-glass transition-shadow">
                    <div class="flex items-center justify-between">
                        <span class="font-display text-5xl text-sky-deep/30">03</span>
                        <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-primary text-primary-foreground">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="m17 2 4 4-4 4"/><path d="M3 11v-1a4 4 0 0 1 4-4h14"/><path d="m7 22-4-4 4-4"/><path d="M21 13v1a4 4 0 0 1-4 4H3"/></svg>
                        </span>
                    </div>
                    <h3 class="mt-6 text-3xl text-primary font-display">Get Clients Back</h3>
                    <p class="mt-1 text-sm font-medium text-sky-deep">Retention & Automation</p>
                    <p class="mt-4 text-sm leading-relaxed text-muted-foreground">We capture customer data and use intelligent systems to keep your brand top-of-mind.</p>
                    <div class="mt-6 flex flex-wrap gap-1.5">
                        <span class="rounded-full bg-secondary text-secondary-foreground text-[10px] px-3 py-1 uppercase tracking-wider font-semibold">CRM</span>
                        <span class="rounded-full bg-secondary text-secondary-foreground text-[10px] px-3 py-1 uppercase tracking-wider font-semibold">SMS Automation</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Section 4: Process -->
    <section id="process" class="relative py-24 md:py-32">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                <div class="max-w-2xl">
                    <span class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-deep">Our Process</span>
                    <h2 class="mt-4 text-4xl md:text-6xl text-primary text-balance font-display">
                        How to <em class="italic text-sky-deep font-display">work with us</em>
                    </h2>
                </div>
                <p class="text-muted-foreground max-w-sm">
                    A transparent, 4-step path to increasing your leads and revenue.
                </p>
            </div>

            <ol class="mt-14 grid gap-px bg-border rounded-3xl overflow-hidden md:grid-cols-2 lg:grid-cols-4 shadow-soft">
                <li class="bg-card p-8 hover:bg-sky-pale/40 transition-colors">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-mono font-semibold text-sky-deep">01</span>
                        <div class="h-px flex-1 bg-border"></div>
                    </div>
                    <h3 class="mt-6 text-2xl text-primary leading-tight font-display">Book a Free Consultation</h3>
                    <p class="mt-3 text-sm text-muted-foreground leading-relaxed">We discuss your goals and audit your current digital presence.</p>
                </li>
                <li class="bg-card p-8 hover:bg-sky-pale/40 transition-colors">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-mono font-semibold text-sky-deep">02</span>
                        <div class="h-px flex-1 bg-border"></div>
                    </div>
                    <h3 class="mt-6 text-2xl text-primary leading-tight font-display">Tailored Solution</h3>
                    <p class="mt-3 text-sm text-muted-foreground leading-relaxed">We map out a custom Revenue Loop specific to your industry.</p>
                </li>
                <li class="bg-card p-8 hover:bg-sky-pale/40 transition-colors">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-mono font-semibold text-sky-deep">03</span>
                        <div class="h-px flex-1 bg-border"></div>
                    </div>
                    <h3 class="mt-6 text-2xl text-primary leading-tight font-display">We Execute</h3>
                    <p class="mt-3 text-sm text-muted-foreground leading-relaxed">Our team builds your foundation and optimizes your AI visibility.</p>
                </li>
                <li class="bg-card p-8 hover:bg-sky-pale/40 transition-colors">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-mono font-semibold text-sky-deep">04</span>
                        <div class="h-px flex-1 bg-border"></div>
                    </div>
                    <h3 class="mt-6 text-2xl text-primary leading-tight font-display">Receive Leads</h3>
                    <p class="mt-3 text-sm text-muted-foreground leading-relaxed">Your business becomes the recommended answer in search.</p>
                </li>
            </ol>
        </div>
    </section>

    <!-- Section 5: Portfolio -->
    <section id="portfolio" class="relative py-24 md:py-32 bg-primary text-primary-foreground rounded-t-[2.5rem]">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-accent">Portfolio</span>
                <h2 class="mt-4 text-4xl md:text-6xl text-balance font-display">
                    We build websites <em class="italic text-accent font-display">AI loves</em> & humans trust.
                </h2>
                <p class="mt-6 text-lg text-primary-foreground/70 max-w-2xl">
                    Recent high-performance “Discovery Engines” launched in the last 14 days.
                </p>
            </div>

            <ul class="mt-14 divide-y divide-white/10 border-y border-white/10">
                <li>
                    <a href="https://adventuracayman.com" target="_blank" class="group flex items-center justify-between py-6 md:py-7 transition-colors hover:bg-white/5 px-2 md:px-4 -mx-2 md:-mx-4 rounded-2xl">
                        <div class="flex items-center gap-4 md:gap-8">
                            <span class="text-3xl md:text-5xl font-display group-hover:text-accent transition-colors">Adventura Cayman</span>
                            <span class="hidden md:inline text-[10px] uppercase tracking-widest text-primary-foreground/50">Tourism</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="hidden sm:inline text-sm text-primary-foreground/60 font-mono">adventuracayman.com</span>
                            <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-accent-foreground transition-all group-hover:rotate-45">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://uncleliu.ky" target="_blank" class="group flex items-center justify-between py-6 md:py-7 transition-colors hover:bg-white/5 px-2 md:px-4 -mx-2 md:-mx-4 rounded-2xl">
                        <div class="flex items-center gap-4 md:gap-8">
                            <span class="text-3xl md:text-5xl font-display group-hover:text-accent transition-colors">Uncle Liu</span>
                            <span class="hidden md:inline text-[10px] uppercase tracking-widest text-primary-foreground/50">Restaurant</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="hidden sm:inline text-sm text-primary-foreground/60 font-mono">uncleliu.ky</span>
                            <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-accent-foreground transition-all group-hover:rotate-45">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://prospectcenter.ky" target="_blank" class="group flex items-center justify-between py-6 md:py-7 transition-colors hover:bg-white/5 px-2 md:px-4 -mx-2 md:-mx-4 rounded-2xl">
                        <div class="flex items-center gap-4 md:gap-8">
                            <span class="text-3xl md:text-5xl font-display group-hover:text-accent transition-colors">Prospect Center</span>
                            <span class="hidden md:inline text-[10px] uppercase tracking-widest text-primary-foreground/50">Retail</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="hidden sm:inline text-sm text-primary-foreground/60 font-mono">prospectcenter.ky</span>
                            <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-white/10 group-hover:bg-accent group-hover:text-accent-foreground transition-all group-hover:rotate-45">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                            </span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Section 6: Social Proof -->
    <section class="relative py-24 md:py-32 bg-primary text-primary-foreground">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-accent">Social proof</span>
                <h2 class="mt-4 text-4xl md:text-6xl font-display">
                    What our <em class="italic text-accent font-display">clients say</em>
                </h2>
                <p class="mt-6 text-primary-foreground/70">
                    22 years of marketing expertise backed by real local results.
                </p>
            </div>

            <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                <figure class="rounded-3xl glass p-6 flex flex-col gap-4 bg-white/5 border-white/10 backdrop-blur-md">
                    <div class="flex gap-0.5 text-accent">★★★★★</div>
                    <blockquote class="text-base leading-relaxed text-primary-foreground/90 font-medium">
                        “TocToc rebuilt our entire online presence. We started showing up in AI recommendations within weeks.”
                    </blockquote>
                    <figcaption class="mt-auto pt-4 border-t border-white/10">
                        <div class="text-sm font-semibold">Maria S.</div>
                        <div class="text-xs text-primary-foreground/60">Owner, Coconut Room</div>
                    </figcaption>
                </figure>
                <figure class="rounded-3xl glass p-6 flex flex-col gap-4 bg-white/5 border-white/10 backdrop-blur-md">
                    <div class="flex gap-0.5 text-accent">★★★★★</div>
                    <blockquote class="text-base leading-relaxed text-primary-foreground/90 font-medium">
                        “Bookings doubled in 30 days. Their Revenue Loop framework actually delivers.”
                    </blockquote>
                    <figcaption class="mt-auto pt-4 border-t border-white/10">
                        <div class="text-sm font-semibold">James K.</div>
                        <div class="text-xs text-primary-foreground/60">Director, Adventura</div>
                    </figcaption>
                </figure>
                <figure class="rounded-3xl glass p-6 flex flex-col gap-4 bg-white/5 border-white/10 backdrop-blur-md">
                    <div class="flex gap-0.5 text-accent">★★★★★</div>
                    <blockquote class="text-base leading-relaxed text-primary-foreground/90 font-medium">
                        “Customers find us through ChatGPT now. Real magic — and real revenue.”
                    </blockquote>
                    <figcaption class="mt-auto pt-4 border-t border-white/10">
                        <div class="text-sm font-semibold">Liu W.</div>
                        <div class="text-xs text-primary-foreground/60">Uncle Liu</div>
                    </figcaption>
                </figure>
                <figure class="rounded-3xl glass p-6 flex flex-col gap-4 bg-white/5 border-white/10 backdrop-blur-md">
                    <div class="flex gap-0.5 text-accent">★★★★★</div>
                    <blockquote class="text-base leading-relaxed text-primary-foreground/90 font-medium">
                        “Professional, fast, and transparent. The website converts like nothing we had.”
                    </blockquote>
                    <figcaption class="mt-auto pt-4 border-t border-white/10">
                        <div class="text-sm font-semibold">Brian P.</div>
                        <div class="text-xs text-primary-foreground/60">Brisana Insulation</div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>

    <!-- Section 7: Final CTA -->
    <section id="contact" class="relative py-32 md:py-40 overflow-hidden bg-sky-pale">
        <!-- background cloud -->
        <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/690ce435b295f16c937cbef7_b37d532fd83b00c1e636745a11a55287_join-left.svg" alt="" aria-hidden class="absolute -left-20 bottom-0 w-[500px] opacity-90 pointer-events-none" />
        <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/690ce435bd41a8da12a0be42_459daa8b4411ff62fef7ad254a9456d5_join-right.svg" alt="" aria-hidden class="absolute -right-20 top-10 w-[420px] opacity-80 animate-float-slow pointer-events-none" />

        <div class="relative mx-auto max-w-4xl px-6 text-center">
            <h2 class="text-5xl md:text-7xl text-primary text-balance font-display">
                Ready to build your <em class="italic font-display">Revenue Loop?</em>
            </h2>
            <p class="mt-6 text-lg text-primary/70 max-w-xl mx-auto">
                Let’s talk about your business and how we can turn your brand into the recommended answer.
            </p>
            <a href="mailto:hello@toctoc.ky" class="group mt-10 inline-flex items-center gap-2 rounded-full bg-primary text-primary-foreground pl-7 pr-2 py-2.5 text-base font-semibold shadow-pill transition-transform hover:scale-[1.02]">
                Book a Free Consultation
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-accent text-accent-foreground transition-transform group-hover:rotate-45">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                </span>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
