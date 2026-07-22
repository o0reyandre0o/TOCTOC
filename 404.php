<?php
/**
 * The 404 (Page Not Found) template.
 * Turns a dead-end into a lead: catchy headline, clear CTA back home,
 * a phone CTA, and quick links to the highest-intent service pages.
 */

get_header(); ?>

<main class="relative min-h-[100svh] w-full overflow-hidden flex items-center bg-background text-foreground">

    <!-- Clean Sky background (matches the homepage hero) -->
    <img
        src="<?php echo esc_url( toctoc_clouds_src() ); ?>"
        srcset="<?php echo esc_attr( toctoc_clouds_srcset() ); ?>"
        sizes="100vw"
        alt=""
        aria-hidden="true"
        loading="lazy"
        decoding="async"
        class="absolute inset-0 w-full h-full object-cover"
    />
    <div class="absolute inset-0 bg-white/50 z-[1]"></div>
    <div class="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-b from-transparent via-background/60 to-background pointer-events-none z-[2]"></div>

    <!-- Soft floating accent orbs -->
    <div class="absolute top-24 -left-20 w-72 h-72 rounded-full bg-accent/30 blur-3xl z-[1] animate-float-slow"></div>
    <div class="absolute bottom-24 -right-16 w-80 h-80 rounded-full bg-sky-mid/20 blur-3xl z-[1] animate-drift"></div>

    <div class="relative z-10 mx-auto max-w-4xl px-6 pt-36 pb-24 text-center flex flex-col items-center">

        <div class="inline-flex items-center gap-2 px-4 py-1.5 text-[11px] font-bold text-slate-950 uppercase tracking-wider">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-sky-deep"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            Error 404 · Page Not Found
        </div>

        <h1 class="mt-6 text-7xl sm:text-8xl md:text-9xl leading-[0.9] text-slate-900 font-display">
            Nobody <em class="italic text-sky-deep font-display">answered</em><br />this door.
        </h1>

        <p class="mt-8 mx-auto max-w-xl text-base sm:text-lg text-slate-950 font-medium">
            The page you knocked on has moved or never existed &mdash; but your next
            <strong class="bg-accent text-sky-deep px-1.5 py-0.5 rounded-md">growth opportunity</strong>
            is just one click away. Let&rsquo;s get you back on track.
        </p>

        <!-- Primary CTAs: Home + Call (lead capture) -->
        <div class="mt-12 flex flex-wrap items-center justify-center gap-4">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="group inline-flex items-center justify-center gap-3 rounded-full bg-accent text-accent-foreground w-full sm:w-64 pl-7 pr-2 py-2 text-base font-bold shadow-glow transition-transform hover:scale-[1.02] decoration-none">
                Back to Home
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary text-primary-foreground transition-transform group-hover:rotate-45">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                </span>
            </a>
            <a href="tel:+13455478120" class="inline-flex items-center justify-center gap-2 rounded-full bg-white w-full sm:w-64 py-4 text-base font-bold text-slate-900 hover:bg-white/90 transition-colors decoration-none shadow-soft">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Talk to an Expert
            </a>
        </div>

        <!-- Lead-capture: high-intent destinations -->
        <div class="mt-16 w-full">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-6">Or explore where the growth happens</p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/' ) ); ?>" class="rounded-full bg-white/70 border border-white/60 text-slate-700 hover:text-sky-deep hover:border-sky-deep/40 text-sm px-5 py-2.5 font-bold transition-colors decoration-none shadow-soft">AI Search Visibility</a>
                <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="rounded-full bg-white/70 border border-white/60 text-slate-700 hover:text-sky-deep hover:border-sky-deep/40 text-sm px-5 py-2.5 font-bold transition-colors decoration-none shadow-soft">Web Design</a>
                <a href="<?php echo esc_url( home_url( '/social-media-marketing-services-cayman-islands/' ) ); ?>" class="rounded-full bg-white/70 border border-white/60 text-slate-700 hover:text-sky-deep hover:border-sky-deep/40 text-sm px-5 py-2.5 font-bold transition-colors decoration-none shadow-soft">Social Media</a>
                <a href="<?php echo esc_url( home_url( '/digital-marketing-agency-cayman-islands/' ) ); ?>" class="rounded-full bg-white/70 border border-white/60 text-slate-700 hover:text-sky-deep hover:border-sky-deep/40 text-sm px-5 py-2.5 font-bold transition-colors decoration-none shadow-soft">All Services</a>
                <a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="rounded-full bg-white/70 border border-white/60 text-slate-700 hover:text-sky-deep hover:border-sky-deep/40 text-sm px-5 py-2.5 font-bold transition-colors decoration-none shadow-soft">About Us</a>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>
