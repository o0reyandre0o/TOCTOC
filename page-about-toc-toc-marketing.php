<?php
/**
 * Template Name: About TocToc Marketing
 * Template Post Type: page
 */
get_header(); ?>

<main class="min-h-screen bg-background text-foreground">
    <!-- Section 1: Hero -->
    <section class="relative pt-48 pb-32 overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-sky-deep blur-[120px] rounded-full"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <?php toctoc_render_breadcrumbs( 'About Us' ); ?>
                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                    The Dynamic Team
                </div>
                <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                    Your Digital Agency in <em class="italic text-accent font-display">The Cayman Islands.</em>
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
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
                    <?php $daniel_photo = 'https://toctoc.ky/wp-content/uploads/2026/07/dsf5319-1.webp'; ?>
                    <?php if ( $daniel_photo ) : ?>
                    <img src="<?php echo esc_url( $daniel_photo ); ?>" alt="Daniel Garrido, Founder & Sales at TocToc Marketing" width="80" height="80" loading="lazy" class="w-28 h-28 rounded-full object-cover object-top shrink-0" />
                    <?php else : ?>
                    <div class="w-20 h-20 rounded-full bg-accent/20 flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                    </div>
                    <?php endif; ?>
                    <div>
                        <div class="text-4xl font-display text-white">Daniel Garrido</div>
                        <div class="text-sm uppercase tracking-[0.3em] text-white/40 font-bold">Founder &amp; Sales</div>
                        <div class="mt-3 flex flex-wrap items-center gap-x-6 gap-y-2">
                            <a href="https://danielgarrido.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-sm font-bold text-accent hover:gap-2.5 transition-all decoration-none">
                                danielgarrido.com
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                            </a>
                            <a href="https://www.linkedin.com/in/bydanielgarrido/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-sm font-bold text-accent hover:gap-3 transition-all decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.35V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29ZM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14Zm1.78 13.02H3.55V9h3.57v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0Z"/></svg>
                                LinkedIn
                            </a>
                        </div>
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
                        <?php // Retrato nuevo, 27 ago 2026. Se sirve a 320 px para un avatar de 96: el original venia asi y ampliarlo solo inventa pixeles. ?>
                        <img src="https://toctoc.ky/wp-content/uploads/2026/08/andre-gutierrez-toctoc.webp" alt="Andre Gutierrez, Web Developer at TocToc Marketing" width="320" height="320" loading="lazy" decoding="async" class="w-24 h-24 rounded-full object-cover object-top shrink-0" />
                        <div>
                            <h3 class="text-3xl font-display text-slate-900">Andre Gutierrez</h3>
                            <p class="text-xs font-bold text-sky-deep uppercase tracking-[0.2em] mt-1">Web Developer</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-500 mb-5">
                        Andre builds the websites AI loves and humans trust. An AI-driven developer who blends <strong class="text-slate-700">vibe coding</strong> with deep WordPress and Elementor expertise, he ships fast, high-performance sites engineered to get recommended in the answer economy.
                    </p>
                    <a href="https://www.linkedin.com/in/andre-g-9b373a97/" target="_blank" rel="noopener" class="mb-8 inline-flex items-center gap-2 text-sm font-bold text-sky-deep hover:gap-3 transition-all decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.35V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29ZM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14Zm1.78 13.02H3.55V9h3.57v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0Z"/></svg>
                        LinkedIn
                    </a>
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
                        <img src="https://toctoc.ky/wp-content/uploads/2026/08/nora-bravo-toctoc.webp" alt="Nora Bravo, Graphic Designer at TocToc Marketing" width="512" height="512" loading="lazy" decoding="async" class="w-24 h-24 rounded-full object-cover object-top shrink-0" />
                        <div>
                            <h3 class="text-3xl font-display text-slate-900">Nora Bravo</h3>
                            <p class="text-xs font-bold text-sky-deep uppercase tracking-[0.2em] mt-1">Graphic Designer</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-500 mb-5">
                        Nora gives every brand its visual voice. From logos and brand identities to scroll-stopping social creatives, she designs the look and feel that makes Cayman businesses instantly recognizable — and impossible to ignore.
                    </p>
                    <a href="https://www.linkedin.com/in/norabravo92/" target="_blank" rel="noopener" class="mb-8 inline-flex items-center gap-2 text-sm font-bold text-sky-deep hover:gap-3 transition-all decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.35V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29ZM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14Zm1.78 13.02H3.55V9h3.57v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0Z"/></svg>
                        LinkedIn
                    </a>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Branding</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Visual Identity</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Social Creatives</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Graphic Design</span>
                    </div>
                </article>

                <!-- Adriana Brito — added 26 Aug 2026. First name corrected from "Andreina" on 27 Aug:
                     it went in wrong and was live for a day. -->
                <article id="adriana-brito" class="rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft transition-all hover:shadow-glass text-left">
                    <div class="flex items-center gap-5 mb-8">
                        <img src="https://toctoc.ky/wp-content/uploads/2026/08/adriana-brito-toctoc.webp" alt="Adriana Brito, Video Editor and Social Media at TocToc Marketing" width="512" height="512" loading="lazy" decoding="async" class="w-24 h-24 rounded-full object-cover object-top shrink-0" />
                        <div>
                            <h3 class="text-3xl font-display text-slate-900">Adriana Brito</h3>
                            <p class="text-xs font-bold text-sky-deep uppercase tracking-[0.2em] mt-1">Video Editor &amp; Social Media</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-500 mb-5">
                        Adriana turns raw footage into the reels and stories that carry our clients&rsquo; work &mdash; and runs the day-to-day of the accounts those pieces live on. Editing, captions, pacing, publishing: the unglamorous craft that decides whether a good idea gets watched or scrolled past.
                    </p>
                    <a href="https://www.linkedin.com/in/adriana-brito-b2004034b" target="_blank" rel="noopener" class="mb-8 inline-flex items-center gap-2 text-sm font-bold text-sky-deep hover:gap-3 transition-all decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.66H9.35V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29ZM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14Zm1.78 13.02H3.55V9h3.57v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0Z"/></svg>
                        LinkedIn
                    </a>
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Video Editing</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Reels &amp; Shorts</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Social Media</span>
                        <span class="rounded-full bg-slate-50 text-slate-500 text-[10px] px-3.5 py-1.5 font-bold uppercase tracking-widest border border-slate-100">Content Production</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Where we work: animated dot globe (Cayman HQ + USA, Puerto Rico, Venezuela) -->
    <section class="relative py-20 md:py-28 bg-slate-950 text-white rounded-[3rem] mx-4 my-8 overflow-hidden">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-start">

                <div class="order-2 lg:order-1">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Where we work</span>
                    <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">One team, <em class="italic text-accent font-display">four countries</em></h2>
                    <p class="mt-8 text-lg text-white/60 leading-relaxed max-w-md">
                        Four countries, two languages, one framework. We work in <strong class="text-white font-semibold">English and Spanish</strong> &mdash; and everything we do is digital-first, so borders don&rsquo;t slow us down.
                    </p>

                    <!-- Country cards: 2×2 right under the text. -->
                    <div class="mt-8 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-[1.5rem] border border-accent/40 bg-white/5 p-5">
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-accent mb-1.5">HQ &middot; Caribbean</p>
                            <h3 class="text-xl font-display text-white">Cayman Islands</h3>
                            <p class="mt-2 text-sm text-white/50 leading-relaxed">Main operation in George Town &mdash; hospitality, dining, real estate and professional services.</p>
                            <p class="mt-3 text-[10px] font-bold uppercase tracking-widest text-white/40">George Town &middot; Seven Mile Beach &middot; Prospect</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5">
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/40 mb-1.5">Southeast US</p>
                            <h3 class="text-xl font-display text-white">United States</h3>
                            <p class="mt-2 text-sm text-white/50 leading-relaxed">Projects across Florida and the Southeast &mdash; security, home services and B2B supply.</p>
                            <p class="mt-3 text-[10px] font-bold uppercase tracking-widest text-white/40">Miami &middot; Orlando &middot; Charleston</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5">
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/40 mb-1.5">Caribbean</p>
                            <h3 class="text-xl font-display text-white">Puerto Rico</h3>
                            <p class="mt-2 text-sm text-white/50 leading-relaxed">Design and development for optical, eyewear and wellness brands on the island.</p>
                            <p class="mt-3 text-[10px] font-bold uppercase tracking-widest text-white/40">San Juan &middot; Caguas</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5">
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/40 mb-1.5">South America</p>
                            <h3 class="text-xl font-display text-white">Venezuela</h3>
                            <p class="mt-2 text-sm text-white/50 leading-relaxed">Projects and partnerships &mdash; the same framework, tuned to the local market.</p>
                            <p class="mt-3 text-[10px] font-bold uppercase tracking-widest text-white/40">Caracas &middot; Zulia</p>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <div id="ttglobe-wrap" class="relative mx-auto w-full max-w-[640px] aspect-square select-none">
                        <canvas id="ttglobe" class="block w-full h-full"></canvas>
                        <!-- Location chips: fixed slots at the edges; canvas draws a leader
                             line from each chip to its marker as the globe turns.
                             data-dlat/data-dlon are stylized display positions (spread apart
                             for readability) — the visible text keeps the real coordinates. -->
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-accent/50 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="left:0;top:18%" data-dlat="18" data-dlon="-45" data-main="1">
                            <p class="text-sm font-bold text-white leading-none">Cayman Islands</p>
                            <p class="mt-1 text-[10px] tracking-wider text-accent">HQ</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="right:0;top:4%" data-dlat="22" data-dlon="-100">
                            <p class="text-sm font-bold text-white leading-none">USA</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="right:0;top:44%" data-dlat="2" data-dlon="-108">
                            <p class="text-sm font-bold text-white leading-none">Puerto Rico</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="left:10%;bottom:6%" data-dlat="-48" data-dlon="-58">
                            <p class="text-sm font-bold text-white leading-none">Venezuela</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <script>
    (function () {
        // ---- TocToc dot globe v2: dense sphere + graticule, visible rotation,
        //      fixed chips with leader lines. Vanilla canvas, no libraries. ----
        var wrap = document.getElementById('ttglobe-wrap');
        var canvas = document.getElementById('ttglobe');
        if (!wrap || !canvas || !canvas.getContext) return;
        var ctx = canvas.getContext('2d');
        var chips = Array.prototype.slice.call(wrap.querySelectorAll('.ttglobe-chip'));

        var ACCENT = '#D9FF3E';

        // Dense fibonacci sphere.
        var N = 1300, pts = [];
        for (var i = 0; i < N; i++) {
            var y = 1 - (2 * i) / (N - 1);
            var r = Math.sqrt(Math.max(0, 1 - y * y));
            var th = i * 2.399963;
            pts.push([Math.cos(th) * r, y, Math.sin(th) * r]);
        }

        // Graticule: latitude rings + meridians as fine sky-blue dots.
        var grid = [];
        var lat, lon, a;
        for (var li = 0; li < 5; li++) {           // latitudes -60,-30,0,30,60
            lat = (-60 + li * 30) * Math.PI / 180;
            for (a = 0; a < Math.PI * 2; a += Math.PI / 60) {
                grid.push([Math.cos(a) * Math.cos(lat), Math.sin(lat), Math.sin(a) * Math.cos(lat)]);
            }
        }
        for (var mi = 0; mi < 6; mi++) {           // meridians every 30°
            lon = mi * Math.PI / 6;
            for (a = 0; a < Math.PI * 2; a += Math.PI / 60) {
                grid.push([Math.cos(a) * Math.cos(lon), Math.sin(a), Math.cos(a) * Math.sin(lon)]);
            }
        }

        function fromLatLon(la, lo) {
            var p = la * Math.PI / 180, l = lo * Math.PI / 180;
            return [Math.cos(p) * Math.cos(l), Math.sin(p), Math.cos(p) * Math.sin(l)];
        }

        // Stylized display positions (spread across the hemisphere for clarity —
        // the real coordinates live in the chip labels). With the projection
        // used here, screen-left corresponds to GREATER longitudes than the
        // camera center (-75): Cayman left, USA top-right, PR right, VE bottom.
        var HQ = [18, -45];
        var DESTS = [[22, -100], [2, -108], [-48, -58]];

        function arcPoints(A0, B0) {
            var A = fromLatLon(A0[0], A0[1]), B = fromLatLon(B0[0], B0[1]);
            var out = [];
            for (var t = 0; t <= 1.0001; t += 0.033) {
                var x = A[0] + (B[0] - A[0]) * t;
                var yy = A[1] + (B[1] - A[1]) * t;
                var z = A[2] + (B[2] - A[2]) * t;
                var m = Math.sqrt(x * x + yy * yy + z * z) || 1;
                var lift = 1 + 0.18 * Math.sin(Math.PI * t);
                out.push([x / m * lift, yy / m * lift, z / m * lift]);
            }
            return out;
        }
        var arcs = DESTS.map(function (d) { return arcPoints(HQ, d); });

        // Rotation: BASE centers longitude -75 on screen (with this projection a
        // point is screen-centered when lon - BASE = 90°, so BASE = lonC - 90°).
        // Ambient sweep ±20° always on, plus grab-and-spin with inertia.
        var BASE = (-75 * Math.PI / 180) - Math.PI / 2;
        var TILT = -0.32;
        var cosT = Math.cos(TILT), sinT = Math.sin(TILT);

        var W = 0, H = 0, CX = 0, CY = 0, R = 0, dpr = 1;
        function resize() {
            dpr = Math.min(2, window.devicePixelRatio || 1);
            W = wrap.clientWidth; H = wrap.clientHeight;
            canvas.width = W * dpr; canvas.height = H * dpr;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
            CX = W / 2; CY = H / 2; R = Math.min(W, H) * 0.44;
        }
        resize();
        window.addEventListener('resize', resize);

        function project(v, ang) {
            var ca = Math.cos(ang), sa = Math.sin(ang);
            var x = v[0] * ca + v[2] * sa;
            var z = -v[0] * sa + v[2] * ca;
            var yv = v[1] * cosT - z * sinT;
            var z2 = v[1] * sinT + z * cosT;
            return [CX + x * R, CY - yv * R, z2];
        }

        // Leader line endpoint: the point on the chip's border facing the marker.
        function chipEdge(el, px, py) {
            var cx = el.offsetLeft + el.offsetWidth / 2;
            var cy = el.offsetTop + el.offsetHeight / 2;
            var dx = px - cx, dy = py - cy;
            if (!dx && !dy) return [cx, cy];
            var s = 1 / Math.max(Math.abs(dx) / (el.offsetWidth / 2 + 4), Math.abs(dy) / (el.offsetHeight / 2 + 4));
            return [cx + dx * s, cy + dy * s];
        }

        function frame(now) {
            var t = now * 0.001;
            if (!dragging) { userVel *= 0.94; userAng += userVel; }
            var ang = BASE + userAng + Math.sin(t * 0.4) * 0.35;
            ctx.clearRect(0, 0, W, H);

            // Halo rings.
            ctx.lineWidth = 1;
            ctx.beginPath(); ctx.arc(CX, CY, R + 12, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(148,163,184,0.14)'; ctx.stroke();
            ctx.beginPath(); ctx.arc(CX, CY, R + 26, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(148,163,184,0.06)'; ctx.stroke();

            var i, p, al;

            // Graticule (structure): fine sky dots.
            for (i = 0; i < grid.length; i++) {
                p = project(grid[i], ang);
                if (p[2] > 0) {
                    al = 0.10 + 0.22 * p[2];
                    ctx.globalAlpha = al;
                    ctx.fillStyle = 'rgba(56,189,248,1)';
                    ctx.fillRect(p[0] - 0.6, p[1] - 0.6, 1.2, 1.2);
                }
            }

            // Surface dots with a soft twinkle so the sphere feels alive.
            for (i = 0; i < N; i++) {
                p = project(pts[i], ang);
                if (p[2] > 0) {
                    var tw = 0.8 + 0.2 * Math.sin(t * 1.7 + i * 1.3);
                    ctx.globalAlpha = (0.30 + 0.60 * p[2]) * tw;
                    ctx.fillStyle = 'rgba(226,232,240,1)';
                    ctx.fillRect(p[0] - 0.9, p[1] - 0.9, 1.8, 1.8);
                } else {
                    ctx.globalAlpha = 0.05;
                    ctx.fillStyle = 'rgba(226,232,240,1)';
                    ctx.fillRect(p[0] - 0.5, p[1] - 0.5, 1, 1);
                }
            }
            ctx.globalAlpha = 1;

            // Connection arcs + travelling pulses.
            for (var k = 0; k < arcs.length; k++) {
                var arc = arcs[k];
                ctx.beginPath();
                var visible = false;
                for (var j = 0; j < arc.length; j++) {
                    var q = project(arc[j], ang);
                    if (j === 0) ctx.moveTo(q[0], q[1]); else ctx.lineTo(q[0], q[1]);
                    if (q[2] > 0) visible = true;
                }
                ctx.strokeStyle = 'rgba(217,255,62,' + (visible ? 0.6 : 0.12) + ')';
                ctx.lineWidth = 1.5;
                ctx.stroke();
                var pt = arc[Math.floor(((t * 0.35 + k * 0.33) % 1) * (arc.length - 1))];
                var pp = project(pt, ang);
                if (pp[2] > -0.1) {
                    ctx.beginPath();
                    ctx.arc(pp[0], pp[1], 2.6, 0, Math.PI * 2);
                    ctx.fillStyle = '#ffffff';
                    ctx.fill();
                }
            }

            // Markers, leader lines and chip opacity.
            chips.forEach(function (el) {
                var v = fromLatLon(parseFloat(el.dataset.dlat), parseFloat(el.dataset.dlon));
                p = project(v, ang);
                var front = p[2] > 0.02;
                var main = el.dataset.main === '1';
                el.style.opacity = front ? 1 : 0.25;
                if (front) {
                    // Leader line from chip border to marker.
                    var e = chipEdge(el, p[0], p[1]);
                    ctx.beginPath();
                    ctx.moveTo(e[0], e[1]);
                    ctx.lineTo(p[0], p[1]);
                    ctx.strokeStyle = main ? 'rgba(217,255,62,0.55)' : 'rgba(255,255,255,0.28)';
                    ctx.lineWidth = 1;
                    ctx.stroke();
                    ctx.beginPath();
                    ctx.arc(e[0], e[1], 1.8, 0, Math.PI * 2);
                    ctx.fillStyle = main ? 'rgba(217,255,62,0.8)' : 'rgba(255,255,255,0.5)';
                    ctx.fill();
                    // Marker.
                    if (main) {
                        var pr = 9 + 3 * Math.sin(t * 2.2);
                        ctx.beginPath();
                        ctx.arc(p[0], p[1], pr, 0, Math.PI * 2);
                        ctx.strokeStyle = 'rgba(217,255,62,' + (0.5 - 0.25 * Math.sin(t * 2.2)) + ')';
                        ctx.lineWidth = 1.5;
                        ctx.stroke();
                    }
                    ctx.beginPath();
                    ctx.arc(p[0], p[1], main ? 5.5 : 4, 0, Math.PI * 2);
                    ctx.fillStyle = ACCENT;
                    ctx.fill();
                    ctx.beginPath();
                    ctx.arc(p[0], p[1], main ? 2.2 : 1.6, 0, Math.PI * 2);
                    ctx.fillStyle = '#0f172a';
                    ctx.fill();
                }
            });
        }

        // Grab-and-spin with inertia.
        var dragging = false, userAng = 0, userVel = 0, lastX = 0;
        canvas.style.cursor = 'grab';
        canvas.style.touchAction = 'pan-y'; // keep vertical page scroll on touch
        canvas.addEventListener('pointerdown', function (ev) {
            dragging = true; lastX = ev.clientX; userVel = 0;
            canvas.style.cursor = 'grabbing';
            if (canvas.setPointerCapture) { try { canvas.setPointerCapture(ev.pointerId); } catch (e) {} }
        });
        canvas.addEventListener('pointermove', function (ev) {
            if (!dragging) return;
            var dx = ev.clientX - lastX;
            lastX = ev.clientX;
            userAng += dx * 0.005;
            userVel = dx * 0.005;
        });
        function endDrag() { dragging = false; canvas.style.cursor = 'grab'; }
        canvas.addEventListener('pointerup', endDrag);
        canvas.addEventListener('pointercancel', endDrag);

        var running = true;
        function loop(now) { if (running) frame(now); requestAnimationFrame(loop); }
        requestAnimationFrame(loop);
        if ('IntersectionObserver' in window) {
            new IntersectionObserver(function (e) { running = e[0].isIntersecting; }).observe(wrap);
        }
    })();
    </script>

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
    <!-- Free SEO Checker CTA -->
    <?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
