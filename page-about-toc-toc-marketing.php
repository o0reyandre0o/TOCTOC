<?php
/**
 * Template Name: About TocToc Marketing
 * Template Post Type: page
 */
get_header(); ?>

<main class="min-h-screen bg-background text-foreground">
    <!-- Section 1: Hero -->
    <section class="relative pt-48 pb-32 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-sky-deep blur-[120px] rounded-full"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                    The Dynamic Team
                </div>
                <h1 class="text-5xl md:text-[110px] font-display leading-[0.85] text-slate-900">
                    Your Digital Agency in <em class="italic text-sky-deep font-display">The Cayman Islands.</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-slate-600 leading-relaxed max-w-3xl">
                    We combine local expertise with global data-driven strategies. We are your partners in growth, specializing in scaling impact for businesses, coaches, and consultants.
                </p>
            </div>
        </div>
    </section>

    <!-- Section 2: Mission & Values -->
    <section class="py-24 md:py-32 bg-slate-50">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <h2 class="text-5xl md:text-[100px] font-display leading-[0.85] text-slate-900 mb-12">
                    Our Mission: <br /><em class="italic text-sky-deep font-display">Digital Excellence.</em>
                </h2>
                <div class="grid md:grid-cols-2 gap-12">
                    <p class="text-2xl text-slate-600 leading-relaxed italic">
                        We’ve spent countless hours understanding the unique needs and challenges of local businesses. We’re not just providers; we’re partners.
                    </p>
                    <p class="text-xl text-slate-500 leading-relaxed">
                        From crafting compelling brand stories to executing effective marketing campaigns, we’ve got you covered. Our expertise spans website design, SEO, social media, and more.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Founder's Story -->
    <section class="py-24 md:py-32 bg-slate-950 text-white overflow-hidden rounded-[4rem] mx-4 my-8">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Meet the Founder</span>
                <h2 class="mt-8 text-5xl md:text-8xl font-display text-white leading-[0.9]">
                    Meet the Team Behind <em class="italic text-accent font-display">Your Growth.</em>
                </h2>
                <div class="mt-16 space-y-10 text-white/60 text-2xl leading-relaxed italic">
                    <p>“I know what it’s like to run a local business – the feeling of building something special from the ground up. It’s my story, too!”</p>
                    <p>“As a musician and marketer, I translate that passion into powerful campaigns that make your business sing. Think of me as your marketing teammate.”</p>
                </div>
                <div class="mt-16 flex items-center gap-8 p-10 rounded-[3rem] bg-white/5 border border-white/10 w-fit">
                    <div class="w-20 h-20 rounded-full bg-accent/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                    </div>
                    <div>
                        <div class="text-4xl font-display text-white">Daniel Garrido</div>
                        <div class="text-sm uppercase tracking-[0.3em] text-white/40 font-bold">Founder & CEO</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Team Mini-Grid -->
    <section class="py-24 md:py-32 bg-white text-center">
        <div class="mx-auto max-w-6xl px-6">
            <h2 class="text-5xl md:text-8xl font-display text-slate-900 mb-20 leading-none">A Passionate <em class="italic text-sky-deep font-display">Team.</em></h2>
            <div class="flex flex-wrap justify-center gap-24">
                <div class="text-center">
                    <h4 class="text-4xl font-display text-slate-900 mb-2">Andre</h4>
                    <p class="text-sm text-slate-400 uppercase font-bold tracking-[0.2em]">Strategy & Technical</p>
                </div>
                <div class="text-center">
                    <h4 class="text-4xl font-display text-slate-900 mb-2">Nora</h4>
                    <p class="text-sm text-slate-400 uppercase font-bold tracking-[0.2em]">Creative & Brand</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale text-center">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-5xl md:text-[100px] font-display leading-[0.85] text-slate-900">
                Let’s rock your <br /><em class="italic text-sky-deep font-display">Local Presence.</em>
            </h2>
            <p class="mt-8 text-xl text-slate-600 italic">Grab your metaphorical guitar and book a free consultation today!</p>
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
