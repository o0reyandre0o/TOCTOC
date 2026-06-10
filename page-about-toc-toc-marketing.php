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
                <div id="daniel-garrido" class="mt-16 flex items-center gap-8 p-10 rounded-[3rem] bg-white/5 border border-white/10 w-fit">
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

    <!-- Section 4: Team Grid -->
    <section id="team" class="py-24 md:py-32 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center mb-20">
                <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                    The Talent
                </div>
                <h2 class="text-5xl md:text-8xl font-display text-slate-900 leading-none">A Passionate <em class="italic text-sky-deep font-display">Team.</em></h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 max-w-4xl mx-auto">
                <!-- Andre Gutierrez -->
                <article id="andre-gutierrez" class="rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass text-left">
                    <div class="flex items-center gap-5 mb-8">
                        <div class="w-16 h-16 rounded-full bg-sky-pale flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-display text-slate-900">Andre Gutierrez</h3>
                            <p class="text-xs font-bold text-sky-deep uppercase tracking-[0.2em] mt-1">Web Developer</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-500 mb-8">
                        Andre builds the websites AI loves and humans trust. An AI-driven developer who blends <strong class="text-slate-700">vibe coding</strong> with deep WordPress and Elementor expertise, he ships fast, high-performance sites engineered to get recommended in the answer economy.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Vibe Coding</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">WordPress</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Elementor</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">AI Development</span>
                    </div>
                </article>

                <!-- Nora Bravo -->
                <article id="nora-bravo" class="rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass text-left">
                    <div class="flex items-center gap-5 mb-8">
                        <div class="w-16 h-16 rounded-full bg-accent/20 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-sky-deep"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-display text-slate-900">Nora Bravo</h3>
                            <p class="text-xs font-bold text-sky-deep uppercase tracking-[0.2em] mt-1">Graphic Designer</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-500 mb-8">
                        Nora gives every brand its visual voice. From logos and brand identities to scroll-stopping social creatives, she designs the look and feel that makes Cayman businesses instantly recognizable — and impossible to ignore.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Branding</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Visual Identity</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Social Creatives</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Graphic Design</span>
                    </div>
                </article>
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
