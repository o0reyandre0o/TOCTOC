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
                             line from each chip to its marker as the globe turns.
                             data-dlat/data-dlon are stylized display positions (spread apart
                             for readability) — the visible text keeps the real coordinates. -->
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-accent/50 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="left:0;top:16%" data-dlat="16" data-dlon="-105" data-main="1">
                            <p class="text-sm font-bold text-white leading-none">Cayman Islands</p>
                            <p class="mt-1 text-[10px] tracking-wider text-accent">19.3&deg;N &middot; 81.4&deg;W &middot; HQ</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="right:0;top:4%" data-dlat="40" data-dlon="-72">
                            <p class="text-sm font-bold text-white leading-none">USA</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">Miami</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="right:0;top:56%" data-dlat="4" data-dlon="-48">
                            <p class="text-sm font-bold text-white leading-none">Puerto Rico</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">San Juan</p>
                        </div>
                        <div class="ttglobe-chip absolute pointer-events-none rounded-xl border border-white/15 bg-slate-900/95 px-3 py-2 shadow-soft transition-opacity duration-500" style="left:8%;bottom:4%" data-dlat="-24" data-dlon="-88">
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
        // the real coordinates live in the chip labels). Cayman center-left,
        // USA top-right, Puerto Rico right, Venezuela bottom.
        var HQ = [16, -105];
        var DESTS = [[40, -72], [4, -48], [-24, -88]];

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

        // Rotation: centered on the marker cluster, sweeping ±32° — plus the
        // user can grab and spin the globe (drag with inertia).
        var BASE = Math.PI / 2 - (-105 * Math.PI / 180);
        var TILT = -0.32;
        var cosT = Math.cos(TILT), sinT = Math.sin(TILT);

        var W = 0, H = 0, CX = 0, CY = 0, R = 0, dpr = 1;
        function resize() {
            dpr = Math.min(2, window.devicePixelRatio || 1);
            W = wrap.clientWidth; H = wrap.clientHeight;
            canvas.width = W * dpr; canvas.height = H * dpr;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
            CX = W / 2; CY = H / 2; R = Math.min(W, H) * 0.42;
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
            // With prefers-reduced-motion the ambient animation freezes at a nice
            // pose, but manual drag still rotates the globe.
            var t = reduced ? 9 : now * 0.001;
            if (!dragging) { userVel *= 0.94; userAng += userVel; }
            var ang = BASE + userAng + (reduced ? 0 : Math.sin(t * 0.4) * 0.55);
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

        var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduced) {
            frame(0);
            return;
        }
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
</main>

<?php get_footer(); ?>
