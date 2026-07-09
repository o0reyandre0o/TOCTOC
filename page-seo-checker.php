<?php
/**
 * Template Name: SEO / GEO Checker
 * Template Post Type: page
 *
 * Public lead-magnet tool. Requires seo-checker-tool.php (loaded from functions.php).
 * Create a WordPress page with slug "seo-checker" to publish it at /seo-checker/.
 */
get_header();

$ttseo_nonce = wp_create_nonce( 'toctoc_seo' );
$ttseo_ajax  = admin_url( 'admin-ajax.php' );
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero + form -->
    <section class="relative pt-40 md:pt-48 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-4xl px-6 text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                Free Tool · SEO · GEO · AEO
            </div>
            <h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-slate-900">
                Is your website ready for <em class="italic text-sky-deep font-display">Google &amp; AI?</em>
            </h1>
            <p class="mt-8 mx-auto max-w-2xl text-lg text-slate-600 leading-relaxed">
                Run a free instant audit of any page — classic SEO, AI visibility (GEO/AEO), and Core Web Vitals speed. Get your scores and exactly what to fix.
            </p>

            <form id="ttseo-form" class="mt-10 mx-auto max-w-2xl text-left">
                <div class="rounded-[2rem] bg-white border border-slate-200 shadow-soft p-6 md:p-8">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Website URL</label>
                    <input id="ttseo-url" type="text" required inputmode="url" placeholder="https://yourwebsite.com" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-lg text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />

                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input id="ttseo-name" type="text" placeholder="Your name (optional)" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />
                        <input id="ttseo-email" type="email" required placeholder="Your email" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />
                    </div>

                    <button id="ttseo-submit" type="submit" class="mt-5 w-full inline-flex items-center justify-center gap-3 rounded-full bg-slate-950 text-white py-4 text-lg font-bold shadow-pill transition-all hover:scale-[1.01] decoration-none">
                        <span id="ttseo-btn-label">Analyze my website</span>
                        <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-accent text-slate-950">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </button>
                    <p class="mt-3 text-xs text-slate-400 text-center">We'll email you the report. No spam — just your results.</p>
                </div>
                <p id="ttseo-error" class="hidden mt-4 text-center text-sm font-bold text-red-600"></p>
            </form>
        </div>
    </section>

    <!-- Results -->
    <section id="ttseo-results" class="hidden py-16 md:py-24 bg-slate-50">
        <div class="mx-auto max-w-5xl px-6">

            <p class="text-center text-sm text-slate-500 mb-8">Report for <span id="ttseo-target" class="font-bold text-slate-900"></span></p>

            <!-- Score cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 text-center">
                    <div id="score-seo" class="text-6xl font-display leading-none">—</div>
                    <p class="mt-3 text-sm font-bold uppercase tracking-widest text-slate-500">SEO</p>
                </div>
                <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 text-center">
                    <div id="score-geo" class="text-6xl font-display leading-none">—</div>
                    <p class="mt-3 text-sm font-bold uppercase tracking-widest text-slate-500">GEO / AEO / AI</p>
                </div>
                <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 text-center">
                    <div id="score-perf" class="text-6xl font-display leading-none">
                        <span class="inline-block w-6 h-6 border-2 border-slate-200 border-t-sky-deep rounded-full animate-spin"></span>
                    </div>
                    <p class="mt-3 text-sm font-bold uppercase tracking-widest text-slate-500">Speed</p>
                </div>
            </div>

            <!-- Search preview -->
            <div id="ttseo-preview" class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 mb-8">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Search preview</p>
                <p id="prev-title" class="text-xl text-[#1a0dab] leading-snug"></p>
                <p id="prev-url" class="text-sm text-[#006621] mt-1"></p>
                <p id="prev-desc" class="text-sm text-slate-600 mt-1"></p>
            </div>

            <!-- On-page SEO -->
            <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 mb-8">
                <h2 class="text-2xl font-display text-slate-900 mb-6">On-page SEO</h2>
                <div id="list-seo" class="divide-y divide-slate-100"></div>
            </div>

            <!-- GEO / AEO -->
            <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 mb-8">
                <h2 class="text-2xl font-display text-slate-900 mb-2">GEO / AEO — AI visibility</h2>
                <p class="text-sm text-slate-500 mb-6">How ready your page is to be found and recommended by AI engines (ChatGPT, Perplexity, Google AI).</p>
                <div id="list-geo" class="divide-y divide-slate-100"></div>
            </div>

            <!-- Performance -->
            <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 mb-8">
                <h2 class="text-2xl font-display text-slate-900 mb-6">Speed &amp; Core Web Vitals</h2>
                <div id="perf-body" class="text-slate-500">
                    <span class="inline-flex items-center gap-2"><span class="inline-block w-4 h-4 border-2 border-slate-200 border-t-sky-deep rounded-full animate-spin"></span> Measuring with Google PageSpeed…</span>
                </div>
            </div>

            <!-- CTA -->
            <div class="rounded-[2.5rem] bg-slate-950 text-white p-10 md:p-14 text-center">
                <h2 class="text-3xl md:text-5xl font-display leading-[0.95]">Want us to <em class="italic text-accent font-display">fix all this?</em></h2>
                <p class="mt-6 text-white/60 max-w-xl mx-auto">TocToc Marketing builds websites that Google and AI love. Let's turn these scores green.</p>
                <a href="<?php echo esc_url( home_url( '/seo-agency-services-cayman-islands/' ) ); ?>" class="mt-8 inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-glow transition-transform hover:scale-105 decoration-none">
                    Talk to TocToc
                    <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-slate-950 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg></span>
                </a>
            </div>

        </div>
    </section>
</main>

<script>
window.TTSEO = { ajax: '<?php echo esc_js( $ttseo_ajax ); ?>', nonce: '<?php echo esc_js( $ttseo_nonce ); ?>' };
(function () {
    var form = document.getElementById('ttseo-form');
    if (!form) return;

    function esc(s) {
        return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }
    function scoreColor(v) { return v >= 80 ? '#16a34a' : (v >= 50 ? '#d97706' : '#dc2626'); }
    function setScore(id, v) {
        var el = document.getElementById(id);
        if (v == null) { el.textContent = '—'; return; }
        el.textContent = v;
        el.style.color = scoreColor(v);
    }
    var ICON = {
        pass: '<span style="color:#16a34a">&#10003;</span>',
        warn: '<span style="color:#d97706">&#33;</span>',
        fail: '<span style="color:#dc2626">&#10007;</span>',
        info: '<span style="color:#64748b">&#8226;</span>'
    };
    function renderList(containerId, rows) {
        var html = rows.map(function (r) {
            return '<div class="flex items-start gap-4 py-4">' +
                '<span class="shrink-0 w-6 text-center text-lg font-bold">' + (ICON[r.status] || ICON.info) + '</span>' +
                '<div class="flex-1">' +
                    '<div class="flex flex-wrap items-baseline justify-between gap-2">' +
                        '<span class="font-bold text-slate-900">' + esc(r.label) + '</span>' +
                        '<span class="text-sm text-slate-500">' + esc(r.detail) + '</span>' +
                    '</div>' +
                    (r.why ? '<p class="mt-1 text-xs text-slate-400 leading-relaxed">' + esc(r.why) + '</p>' : '') +
                '</div></div>';
        }).join('');
        document.getElementById(containerId).innerHTML = html;
    }

    function showError(msg) {
        var e = document.getElementById('ttseo-error');
        e.textContent = msg || 'Something went wrong. Please try again.';
        e.classList.remove('hidden');
    }

    form.addEventListener('submit', function (ev) {
        ev.preventDefault();
        document.getElementById('ttseo-error').classList.add('hidden');
        var url = document.getElementById('ttseo-url').value.trim();
        var email = document.getElementById('ttseo-email').value.trim();
        var name = document.getElementById('ttseo-name').value.trim();
        if (!url || !email) { showError('Please enter a URL and your email.'); return; }

        var btn = document.getElementById('ttseo-submit');
        var lbl = document.getElementById('ttseo-btn-label');
        btn.disabled = true; btn.style.opacity = '.7';
        lbl.textContent = 'Analyzing…';

        // dataLayer lead event for GTM.
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ event: 'seo_check_lead', lead_email: email, checked_url: url });

        var body = new URLSearchParams({ action: 'toctoc_seo_check', nonce: TTSEO.nonce, url: url, email: email, name: name });
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            btn.disabled = false; btn.style.opacity = '1'; lbl.textContent = 'Analyze my website';
            if (!json || !json.success) { showError(json && json.data ? json.data.message : 'Could not analyze that URL.'); return; }
            var d = json.data;

            document.getElementById('ttseo-results').classList.remove('hidden');
            document.getElementById('ttseo-target').textContent = d.url;
            setScore('score-seo', d.scores.seo);
            setScore('score-geo', d.scores.geo);

            document.getElementById('prev-title').textContent = d.meta.title || '(no title)';
            document.getElementById('prev-url').textContent = d.url;
            document.getElementById('prev-desc').textContent = d.meta.description || '(no meta description)';

            renderList('list-seo', d.seo);
            renderList('list-geo', d.geo);

            document.getElementById('ttseo-results').scrollIntoView({ behavior: 'smooth' });

            // Kick off PageSpeed (slower).
            runPSI(d.url);
        })
        .catch(function () {
            btn.disabled = false; btn.style.opacity = '1'; lbl.textContent = 'Analyze my website';
            showError('Network error. Please try again.');
        });
    });

    function runPSI(url) {
        var body = new URLSearchParams({ action: 'toctoc_seo_psi', nonce: TTSEO.nonce, url: url });
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            var perfEl = document.getElementById('perf-body');
            if (!json || !json.success) {
                setScore('score-perf', null);
                perfEl.innerHTML = '<span class="text-slate-400">' + esc(json && json.data ? json.data.message : 'Speed data unavailable.') + '</span>';
                return;
            }
            var d = json.data;
            setScore('score-perf', d.performance);
            var metric = function (label, val) {
                return '<div class="rounded-2xl bg-slate-50 border border-slate-100 p-5"><p class="text-xs font-bold uppercase tracking-widest text-slate-400">' + label + '</p><p class="mt-1 text-2xl font-display text-slate-900">' + esc(val) + '</p></div>';
            };
            perfEl.innerHTML = '<div class="grid grid-cols-2 sm:grid-cols-3 gap-4">' +
                metric('LCP', d.lcp) + metric('CLS', d.cls) + metric('Total Blocking', d.tbt) +
                metric('First Paint', d.fcp) + metric('Speed Index', d.si) +
                '</div>';
        })
        .catch(function () {
            setScore('score-perf', null);
            document.getElementById('perf-body').innerHTML = '<span class="text-slate-400">Speed data unavailable.</span>';
        });
    }
})();
</script>

<?php get_footer(); ?>
