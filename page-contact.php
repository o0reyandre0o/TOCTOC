<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * Create a WordPress page with slug "contact" to publish it at /contact/.
 * Features an animated dot-globe (vanilla canvas, no libraries) showing the
 * Cayman HQ and the countries we serve: USA, Puerto Rico and Venezuela.
 */
get_header();
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero -->
    <section class="relative pt-48 pb-16 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                    Contact Us
                </div>
                <h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-slate-900">
                    Based in Cayman. <em class="italic text-sky-deep font-display">Working across the Americas.</em>
                </h1>
                <p class="mt-8 text-xl md:text-2xl text-slate-600 leading-relaxed max-w-2xl">
                    Our HQ is in George Town, Grand Cayman &mdash; and our clients rank from the United States and Puerto Rico to Venezuela. Distance has never been the problem.
                </p>
            </div>
        </div>
    </section>

    <!-- Globe -->
    <section class="relative py-20 md:py-28 bg-slate-950 text-white rounded-[3rem] mx-4 my-8 overflow-hidden">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div class="order-2 lg:order-1">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">Where we work</span>
                    <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">One team, <em class="italic text-accent font-display">four countries</em></h2>
                    <p class="mt-8 text-lg text-white/60 leading-relaxed max-w-md">
                        Everything we do is digital-first, so borders don&rsquo;t slow us down. The same framework that puts Cayman businesses at the top of ChatGPT and Google runs for our clients abroad.
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
                        <!-- Location chips: positioned by JS as the globe turns. -->
                        <div class="ttglobe-chip absolute left-0 top-0 pointer-events-none rounded-xl border border-accent/40 bg-slate-900/90 px-3 py-2 shadow-soft" data-lat="19.29" data-lon="-81.38" data-mode="left" data-main="1">
                            <p class="text-sm font-bold text-white leading-none">Cayman Islands</p>
                            <p class="mt-1 text-[10px] tracking-wider text-accent">19.3&deg;N &middot; 81.4&deg;W &middot; George Town &middot; HQ</p>
                        </div>
                        <div class="ttglobe-chip absolute left-0 top-0 pointer-events-none rounded-xl border border-white/15 bg-slate-900/90 px-3 py-2 shadow-soft" data-lat="25.77" data-lon="-80.19" data-mode="above">
                            <p class="text-sm font-bold text-white leading-none">USA</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">25.8&deg;N &middot; 80.2&deg;W &middot; Miami</p>
                        </div>
                        <div class="ttglobe-chip absolute left-0 top-0 pointer-events-none rounded-xl border border-white/15 bg-slate-900/90 px-3 py-2 shadow-soft" data-lat="18.44" data-lon="-66.10" data-mode="right">
                            <p class="text-sm font-bold text-white leading-none">Puerto Rico</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">18.4&deg;N &middot; 66.1&deg;W &middot; San Juan</p>
                        </div>
                        <div class="ttglobe-chip absolute left-0 top-0 pointer-events-none rounded-xl border border-white/15 bg-slate-900/90 px-3 py-2 shadow-soft" data-lat="10.48" data-lon="-66.90" data-mode="below">
                            <p class="text-sm font-bold text-white leading-none">Venezuela</p>
                            <p class="mt-1 text-[10px] tracking-wider text-white/50">10.5&deg;N &middot; 66.9&deg;W &middot; Caracas</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact methods -->
    <section class="py-20 md:py-28 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-14">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Reach us</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Let&rsquo;s <em class="italic text-sky-deep font-display">talk</em></h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <a href="tel:+13455478120" class="group p-10 rounded-[2.5rem] bg-slate-50 border border-slate-100 shadow-soft hover:bg-white hover:shadow-glass transition-all decoration-none">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-slate-950 text-accent mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </span>
                    <h3 class="text-2xl font-display text-slate-900 mb-2 group-hover:text-sky-deep transition-colors">Call us</h3>
                    <p class="text-slate-500">+1 (345) 547-8120</p>
                </a>
                <a href="mailto:info@toctoc.ky" class="group p-10 rounded-[2.5rem] bg-slate-50 border border-slate-100 shadow-soft hover:bg-white hover:shadow-glass transition-all decoration-none">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-slate-950 text-accent mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </span>
                    <h3 class="text-2xl font-display text-slate-900 mb-2 group-hover:text-sky-deep transition-colors">Email us</h3>
                    <p class="text-slate-500">info@toctoc.ky</p>
                </a>
                <div class="p-10 rounded-[2.5rem] bg-slate-50 border border-slate-100 shadow-soft">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-slate-950 text-accent mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
                    </span>
                    <h3 class="text-2xl font-display text-slate-900 mb-2">Visit us</h3>
                    <p class="text-slate-500">George Town, Grand Cayman<br>Cayman Islands, KY1-1102</p>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
(function () {
    // ---- TocToc dot globe: vanilla canvas, no libraries. ----
    var wrap = document.getElementById('ttglobe-wrap');
    var canvas = document.getElementById('ttglobe');
    if (!wrap || !canvas || !canvas.getContext) return;
    var ctx = canvas.getContext('2d');
    var chips = Array.prototype.slice.call(wrap.querySelectorAll('.ttglobe-chip'));

    var ACCENT = '#D9FF3E';
    var DOT = 'rgba(226, 232, 240, 0.9)';   // slate-200
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

<script type="application/ld+json">
<?php
echo wp_json_encode(
    array(
        '@context'    => 'https://schema.org',
        '@type'       => 'ContactPage',
        'name'        => 'Contact TocToc Marketing',
        'url'         => 'https://toctoc.ky/contact/',
        'description' => 'Contact TocToc Marketing — headquartered in George Town, Grand Cayman, serving clients in the Cayman Islands, the United States, Puerto Rico and Venezuela.',
        'mainEntity'  => array(
            '@type'      => 'ProfessionalService',
            '@id'        => 'https://toctoc.ky',
            'name'       => 'TocToc Marketing',
            'telephone'  => '+1-345-547-8120',
            'email'      => 'info@toctoc.ky',
            'areaServed' => array(
                array( '@type' => 'Country', 'name' => 'Cayman Islands' ),
                array( '@type' => 'Country', 'name' => 'United States' ),
                array( '@type' => 'Country', 'name' => 'Puerto Rico' ),
                array( '@type' => 'Country', 'name' => 'Venezuela' ),
            ),
        ),
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
