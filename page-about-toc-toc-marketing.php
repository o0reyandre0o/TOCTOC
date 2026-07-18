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

    <!-- Where we work: animated dot globe (Cayman HQ + USA, Puerto Rico, Venezuela) -->
    <section class="relative py-20 md:py-28 bg-slate-950 text-white rounded-[3rem] mx-4 my-8 overflow-hidden">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div class="order-2 lg:order-1">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Where we work</span>
                    <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">One team, <em class="italic text-accent font-display">four countries</em></h2>
                    <p class="mt-8 text-lg text-white/60 leading-relaxed max-w-md">
                        Our HQ is in George Town, Grand Cayman &mdash; and our clients rank from the United States and Puerto Rico to Venezuela. Everything we do is digital-first, so borders don&rsquo;t slow us down.
                    </p>
                    <ul class="mt-10 space-y-4">
                        <li class="flex items-center gap-4">
                            <span class="inline-flex w-2.5 h-2.5 rounded-full bg-accent shadow-glow"></span>
                            <span class="font-bold text-white">Cayman Islands</span>
                            <span class="text-xs font-bold uppercase tracking-widest text-accent border border-accent/30 rounded-full px-2.5 py-0.5">HQ</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <span class="inline-flex w-2.5 h-2.5 rounded-full bg-white/40"></span>
                            <span class="text-white/80">United States</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <span class="inline-flex w-2.5 h-2.5 rounded-full bg-white/40"></span>
                            <span class="text-white/80">Puerto Rico</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <span class="inline-flex w-2.5 h-2.5 rounded-full bg-white/40"></span>
                            <span class="text-white/80">Venezuela</span>
                        </li>
                    </ul>
                </div>

                <div class="order-1 lg:order-2">
                    <div id="ttglobe-wrap" class="relative mx-auto w-full max-w-[560px] aspect-square select-none">
                        <canvas id="ttglobe" class="block w-full h-full"></canvas>
                        <!-- Location chips: fixed slots at the edges; canvas draws a leader
                             line from each chip to its marker as the globe turns. -->
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-accent/50 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="left:0;top:22%" data-lat="19.29" data-lon="-81.38" data-main="1">
                            <p class="text-sm font-bold text-white leading-none">Cayman Islands</p>
                            <p class="mt-1 text-[10px] tracking-wider text-accent">19.3&deg;N &middot; 81.4&deg;W &middot; HQ</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="right:2%;top:2%" data-lat="25.77" data-lon="-80.19">
                            <p class="text-sm font-bold text-white leading-none">USA</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">Miami</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="right:0;top:52%" data-lat="18.44" data-lon="-66.10">
                            <p class="text-sm font-bold text-white leading-none">Puerto Rico</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">San Juan</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="left:12%;bottom:2%" data-lat="10.48" data-lon="-66.90">
                            <p class="text-sm font-bold text-white leading-none">Venezuela</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">Caracas</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
    (function () {
        // ---- TocToc dot globe: vanilla canvas, no libraries. ----
        var wrap = document.getElementById('ttglobe-wrap');
        var canvas = document.getElementById('ttglobe');
        if (!wrap || !canvas || !canvas.getContext) return;
        var ctx = canvas.getContext('2d');
        var chips = Array.prototype.slice.call(wrap.querySelectorAll('.ttglobe-chip'));

        var ACCENT = '#D9FF3E';
        var DOT = 'rgba(226, 232, 240, 0.9)';      // slate-200
        var GRID_DOT = 'rgba(56, 189, 248, 0.55)'; // sky-400

        // Fibonacci sphere.
        var N = 750, pts = [];
        for (var i = 0; i < N; i++) {
            var y = 1 - (2 * i) / (N - 1);
            var r = Math.sqrt(Math.max(0, 1 - y * y));
            var th = i * 2.399963;
            pts.push([Math.cos(th) * r, y, Math.sin(th) * r]);
        }

        function fromLatLon(lat, lon) {
            var p = lat * Math.PI / 180, l = lon * Math.PI / 180;
            return [Math.cos(p) * Math.cos(l), Math.sin(p), Math.cos(p) * Math.sin(l)];
        }

        var HQ = [19.29, -81.38];
        var DESTS = [[25.77, -80.19], [18.44, -66.10], [10.48, -66.90]];

        // Pre-sample the connection arcs (in un-rotated space).
        function arcPoints(a, b) {
            var A = fromLatLon(a[0], a[1]), B = fromLatLon(b[0], b[1]);
            var out = [];
            for (var t = 0; t <= 1.0001; t += 0.033) {
                var x = A[0] + (B[0] - A[0]) * t;
                var y = A[1] + (B[1] - A[1]) * t;
                var z = A[2] + (B[2] - A[2]) * t;
                var m = Math.sqrt(x * x + y * y + z * z) || 1;
                var lift = 1 + 0.16 * Math.sin(Math.PI * t); // rise above the surface
                out.push([x / m * lift, y / m * lift, z / m * lift]);
            }
            return out;
        }
        var arcs = DESTS.map(function (d) { return arcPoints(HQ, d); });

        // Base rotation faces the Caribbean; gentle oscillation keeps it visible.
        var BASE = Math.PI / 2 - (-81.38 * Math.PI / 180);
        var TILT = -0.30;
        var cosT = Math.cos(TILT), sinT = Math.sin(TILT);

        var W = 0, H = 0, CX = 0, CY = 0, R = 0, dpr = 1;
        function resize() {
            dpr = Math.min(2, window.devicePixelRatio || 1);
            W = wrap.clientWidth; H = wrap.clientHeight;
            canvas.width = W * dpr; canvas.height = H * dpr;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
            CX = W / 2; CY = H / 2; R = Math.min(W, H) * 0.40;
        }
        resize();
        window.addEventListener('resize', resize);

        function project(v, ang) {
            var ca = Math.cos(ang), sa = Math.sin(ang);
            var x = v[0] * ca + v[2] * sa;
            var z = -v[0] * sa + v[2] * ca;
            var y = v[1] * cosT - z * sinT;   // slight tilt toward the viewer
            var z2 = v[1] * sinT + z * cosT;
            return [CX + x * R, CY - y * R, z2]; // z2 > 0 = facing the camera
        }

        var CHIP_OFF = {
            left:  function (el, x, y) { return 'translate(' + (x - el.offsetWidth - 16) + 'px,' + (y - el.offsetHeight / 2) + 'px)'; },
            right: function (el, x, y) { return 'translate(' + (x + 16) + 'px,' + (y - el.offsetHeight / 2) + 'px)'; },
            above: function (el, x, y) { return 'translate(' + (x - el.offsetWidth / 2) + 'px,' + (y - el.offsetHeight - 14) + 'px)'; },
            below: function (el, x, y) { return 'translate(' + (x - el.offsetWidth / 2) + 'px,' + (y + 14) + 'px)'; }
        };

        function frame(now) {
            var t = now * 0.001;
            var ang = BASE + Math.sin(t * 0.28) * 0.42;
            ctx.clearRect(0, 0, W, H);

            // Halo.
            ctx.beginPath();
            ctx.arc(CX, CY, R + 14, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(148, 163, 184, 0.12)';
            ctx.lineWidth = 1;
            ctx.stroke();

            // Sphere dots (back first for a hint of depth).
            for (var pass = 0; pass < 2; pass++) {
                for (var i = 0; i < N; i++) {
                    var p = project(pts[i], ang);
                    var front = p[2] > 0;
                    if ((pass === 0 && front) || (pass === 1 && !front)) continue;
                    var a = front ? 0.25 + 0.65 * p[2] : 0.05;
                    ctx.globalAlpha = a;
                    ctx.fillStyle = (i % 7 === 0) ? GRID_DOT : DOT;
                    var s = front ? 1.5 : 1;
                    ctx.fillRect(p[0] - s / 2, p[1] - s / 2, s, s);
                }
            }
            ctx.globalAlpha = 1;

            // Arcs + travelling pulse.
            for (var k = 0; k < arcs.length; k++) {
                var arc = arcs[k];
                ctx.beginPath();
                var visible = false;
                for (var j = 0; j < arc.length; j++) {
                    var q = project(arc[j], ang);
                    if (j === 0) ctx.moveTo(q[0], q[1]); else ctx.lineTo(q[0], q[1]);
                    if (q[2] > 0) visible = true;
                }
                ctx.strokeStyle = 'rgba(217, 255, 62, ' + (visible ? 0.55 : 0.10) + ')';
                ctx.lineWidth = 1.4;
                ctx.stroke();
                // Pulse dot along the arc.
                var pt = arc[Math.floor(((t * 0.35 + k * 0.33) % 1) * (arc.length - 1))];
                var pp = project(pt, ang);
                if (pp[2] > -0.1) {
                    ctx.beginPath();
                    ctx.arc(pp[0], pp[1], 2.6, 0, Math.PI * 2);
                    ctx.fillStyle = '#ffffff';
                    ctx.fill();
                }
            }

            // Markers + chips.
            chips.forEach(function (el) {
                var v = fromLatLon(parseFloat(el.dataset.lat), parseFloat(el.dataset.lon));
                var p = project(v, ang);
                var front = p[2] > 0.05;
                var main = el.dataset.main === '1';
                if (front) {
                    if (main) { // pulsing HQ ring
                        var pr = 9 + 3 * Math.sin(t * 2.2);
                        ctx.beginPath();
                        ctx.arc(p[0], p[1], pr, 0, Math.PI * 2);
                        ctx.strokeStyle = 'rgba(217, 255, 62, ' + (0.5 - 0.25 * Math.sin(t * 2.2)) + ')';
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
                var op = front ? Math.min(1, Math.max(0, (p[2] - 0.05) * 4)) : 0;
                el.style.opacity = op;
                el.style.transform = CHIP_OFF[el.dataset.mode || 'right'](el, p[0], p[1]);
            });
        }

        var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduced) {
            frame(0); // single static frame
            return;
        }
        var running = true;
        function loop(now) { if (running) frame(now); requestAnimationFrame(loop); }
        requestAnimationFrame(loop);
        // Don't burn CPU while offscreen.
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
</main>

<?php get_footer(); ?>
