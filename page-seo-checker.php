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
$ttseo_ts    = get_option( 'toctoc_ts_site', '' );
if ( $ttseo_ts ) {
	echo '<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>';
}
?>

<style>
@media print {
    nav, footer, .ttseo-noprint { display: none !important; }
    .ttseo-print-header { display: block !important; }
    #ttseo-results { display: block !important; background: #fff !important; padding: 0 !important; }
    #ttseo-results .shadow-soft, #ttseo-results .shadow-glass { box-shadow: none !important; }
    #ttseo-results section, #ttseo-results > div { max-width: 100% !important; padding-left: 0 !important; padding-right: 0 !important; }
    #ttseo-vs { background: #0f172a !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    #ttseo-results .rounded-\[2rem\] { break-inside: avoid; }
}
</style>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero + form -->
    <section class="ttseo-noprint relative pt-40 md:pt-48 pb-20 overflow-hidden bg-white">
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
                    <input id="ttseo-competitor" type="text" inputmode="url" placeholder="Compare with a competitor's URL (optional)" class="mt-3 w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />

                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input id="ttseo-name" type="text" placeholder="Your name (optional)" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />
                        <input id="ttseo-email" type="email" required placeholder="Your email" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />
                    </div>

                    <label class="mt-4 flex items-center gap-2 text-sm text-slate-600 cursor-pointer select-none">
                        <input id="ttseo-crawl-toggle" type="checkbox" class="w-4 h-4 rounded border-slate-300 accent-sky-deep">
                        Scan the whole website (up to 20 pages)
                    </label>

                    <?php if ( $ttseo_ts ) : ?>
                    <div class="cf-turnstile mt-4" data-sitekey="<?php echo esc_attr( $ttseo_ts ); ?>"></div>
                    <?php endif; ?>

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

            <div class="ttseo-print-header" style="display:none;">
                <p style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#0284c7;font-weight:bold;margin:0;">TocToc Marketing &middot; SEO / GEO Report</p>
                <hr style="border:none;border-top:2px solid #0f172a;margin:8px 0 20px;">
            </div>
            <div class="flex items-center justify-between gap-4 mb-8">
                <p class="text-sm text-slate-500">Report for <span id="ttseo-target" class="font-bold text-slate-900"></span></p>
                <button id="ttseo-pdf" type="button" class="ttseo-noprint shrink-0 inline-flex items-center gap-2 rounded-full bg-slate-950 text-white px-5 py-2.5 text-sm font-bold hover:bg-slate-800 transition-colors">
                    Download PDF
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                </button>
            </div>

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

            <!-- Competitor comparison (shown only when a competitor is entered) -->
            <div id="ttseo-vs" class="hidden rounded-[2rem] bg-slate-950 text-white p-8 md:p-10 mb-10">
                <p class="text-xs font-bold uppercase tracking-widest text-accent mb-6">You vs your competitor</p>
                <div id="vs-body"></div>
            </div>

            <!-- Plain-English summary -->
            <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 md:p-10 mb-10">
                <div class="inline-flex items-center gap-2 rounded-full bg-sky-pale/60 px-4 py-1.5 text-[11px] font-bold text-sky-deep uppercase tracking-widest mb-5">In plain English</div>
                <p id="summary-verdict" class="text-xl md:text-2xl font-display text-slate-900 leading-snug"></p>
                <div id="summary-speed" class="mt-4"></div>
                <div id="summary-fix" class="mt-6"></div>
                <div id="summary-good" class="mt-2"></div>
                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="tel:+13455478120" class="inline-flex items-center gap-2 font-bold text-sky-deep decoration-none">
                        Want help fixing these? Call TocToc
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <h2 class="text-2xl md:text-3xl font-display text-slate-900 mb-6">The technical details</h2>

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
            <div class="ttseo-noprint rounded-[2.5rem] bg-slate-950 text-white p-10 md:p-14 text-center">
                <h2 class="text-3xl md:text-5xl font-display leading-[0.95]">Want us to <em class="italic text-accent font-display">fix all this?</em></h2>
                <p class="mt-6 text-white/60 max-w-xl mx-auto">TocToc Marketing builds websites that Google and AI love. Let's turn these scores green.</p>
                <a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/' ) ); ?>" class="mt-8 inline-flex items-center gap-3 rounded-full bg-accent text-slate-950 pl-8 pr-3 py-3 text-lg font-bold shadow-glow transition-transform hover:scale-105 decoration-none">
                    Talk to TocToc
                    <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-slate-950 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg></span>
                </a>
            </div>

        </div>
    </section>

    <!-- Full-site crawl results -->
    <section id="ttseo-crawl" class="hidden py-16 md:py-24 bg-white">
        <div class="mx-auto max-w-5xl px-6">
            <h2 class="text-3xl md:text-4xl font-display text-slate-900 mb-2">Full-site scan</h2>
            <p id="crawl-status" class="text-slate-500 mb-6">Finding pages…</p>
            <div class="w-full h-2 bg-slate-200 rounded-full overflow-hidden mb-10">
                <div id="crawl-bar" class="h-full bg-sky-deep transition-all duration-300" style="width:0%"></div>
            </div>
            <div class="grid grid-cols-3 gap-4 md:gap-6 mb-10">
                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-6 text-center">
                    <div id="crawl-avg-seo" class="text-4xl md:text-5xl font-display leading-none">—</div>
                    <p class="text-xs uppercase tracking-widest text-slate-500 mt-2">Avg SEO</p>
                </div>
                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-6 text-center">
                    <div id="crawl-avg-geo" class="text-4xl md:text-5xl font-display leading-none">—</div>
                    <p class="text-xs uppercase tracking-widest text-slate-500 mt-2">Avg GEO</p>
                </div>
                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-6 text-center">
                    <div id="crawl-pages" class="text-4xl md:text-5xl font-display leading-none">0</div>
                    <p class="text-xs uppercase tracking-widest text-slate-500 mt-2">Pages</p>
                </div>
            </div>
            <div class="rounded-[2rem] bg-white border border-slate-100 shadow-soft overflow-x-auto">
                <table class="w-full text-sm min-w-[520px]">
                    <thead>
                        <tr class="text-left text-slate-400 border-b border-slate-100">
                            <th class="p-4 font-bold">Page</th>
                            <th class="p-4 font-bold">SEO</th>
                            <th class="p-4 font-bold">GEO</th>
                            <th class="p-4 font-bold">Issues</th>
                        </tr>
                    </thead>
                    <tbody id="crawl-rows"></tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script>
window.TTSEO = {
    ajax: '<?php echo esc_js( $ttseo_ajax ); ?>',
    nonce: '<?php echo esc_js( $ttseo_nonce ); ?>',
    ts: '<?php echo esc_js( $ttseo_ts ); ?>',
    // label -> { plain, tech, fix }. Single source of truth lives in seo-checker-tool.php.
    explain: <?php echo wp_json_encode( toctoc_seo_explanations() ); ?>
};
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
        if (v == null) { el.innerHTML = '<span style="color:#94a3b8;">—</span>'; return; }
        el.innerHTML = '<span style="color:' + scoreColor(v) + ';">' + v + '</span><span style="font-size:0.34em;color:#94a3b8;font-weight:400;"> / 100</span>';
    }
    var ICON = {
        pass: '<span style="color:#16a34a">&#10003;</span>',
        warn: '<span style="color:#d97706">&#33;</span>',
        fail: '<span style="color:#dc2626">&#10007;</span>',
        info: '<span style="color:#64748b">&#8226;</span>'
    };
    // Look up the two explanations for a check. Rows from the single-URL check carry
    // them inline; crawl issues only carry a label, so fall back to TTSEO.explain.
    function explainOf(r) {
        var e = (TTSEO.explain && TTSEO.explain[r.label]) || {};
        return {
            plain: r.plain || e.plain || '',
            tech: r.tech || e.tech || r.why || '',
            fix: r.fix || e.fix || ''
        };
    }

    // The two explanations (+ the fix when the check isn't passing), for one check.
    function explainHtml(r) {
        var e = explainOf(r);
        var out = '';
        if (e.plain) {
            out += '<p class="mt-2 text-sm text-slate-600 leading-relaxed">' +
                '<span class="font-bold text-sky-deep">In plain English:</span> ' + esc(e.plain) + '</p>';
        }
        if (e.tech) {
            out += '<p class="mt-1.5 text-xs text-slate-400 leading-relaxed">' +
                '<span class="font-bold text-slate-500">Technical:</span> ' + esc(e.tech) + '</p>';
        }
        if (e.fix && (r.status === 'fail' || r.status === 'warn')) {
            out += '<p class="mt-2 text-sm text-amber-700 bg-amber-50 border border-amber-100 rounded-xl px-3 py-2 leading-relaxed">' +
                '<span class="font-bold">How to fix:</span> ' + esc(e.fix) + '</p>';
        }
        return out;
    }

    function renderList(containerId, rows) {
        var html = rows.map(function (r) {
            return '<div class="flex items-start gap-4 py-5 border-b border-slate-50 last:border-0">' +
                '<span class="shrink-0 w-6 text-center text-lg font-bold">' + (ICON[r.status] || ICON.info) + '</span>' +
                '<div class="flex-1 min-w-0">' +
                    '<div class="flex flex-wrap items-baseline justify-between gap-2">' +
                        '<span class="font-bold text-slate-900">' + esc(r.label) + '</span>' +
                        '<span class="text-sm text-slate-500">' + esc(r.detail) + '</span>' +
                    '</div>' +
                    explainHtml(r) +
                '</div></div>';
        }).join('');
        document.getElementById(containerId).innerHTML = html;
    }

    function renderSummary(d) {
        var all = (d.seo || []).concat(d.geo || []);
        var fails = all.filter(function (r) { return r.status === 'fail'; });
        var warns = all.filter(function (r) { return r.status === 'warn'; });
        var passes = all.filter(function (r) { return r.status === 'pass'; });
        var avg = Math.round(((d.scores.seo || 0) + (d.scores.geo || 0)) / 2);

        var verdict;
        if (avg >= 80) verdict = "Great news — your website is in good shape! Just a few small tweaks and you're set.";
        else if (avg >= 50) verdict = "Your website is doing okay, but there are some important things to improve so more people — and AI — can find it.";
        else verdict = "Your website needs some work — but don't worry, everything is fixable. Here's exactly what to do, in plain language.";
        document.getElementById('summary-verdict').textContent = verdict;

        var issues = fails.concat(warns);
        var fixEl = document.getElementById('summary-fix');
        if (!issues.length) {
            fixEl.innerHTML = '<p class="text-slate-600">Nothing major to fix — nicely done! 🎉</p>';
        } else {
            var html = '<p class="font-bold text-slate-900 mb-4">What to improve (' + issues.length + '):</p><ul class="space-y-4">';
            issues.forEach(function (r) {
                var tip = explainOf(r).fix || r.why || r.label;
                var dot = r.status === 'fail' ? '🔴' : '🟡';
                html += '<li class="flex gap-3"><span class="shrink-0">' + dot + '</span><span class="text-slate-700 leading-relaxed">' + esc(tip) + '</span></li>';
            });
            html += '</ul>';
            fixEl.innerHTML = html;
        }

        var goodEl = document.getElementById('summary-good');
        goodEl.innerHTML = passes.length
            ? '<p class="mt-6 text-sm text-slate-500 leading-relaxed"><span class="font-bold text-green-600">✓ Already good:</span> ' + passes.map(function (r) { return esc(r.label); }).join(', ') + '.</p>'
            : '';
    }

    function renderCompetitor(d) {
        var el = document.getElementById('ttseo-vs');
        if (!d.competitor || !d.competitor.scores) { el.classList.add('hidden'); return; }
        var c = d.competitor;
        function bar(label, you, them) {
            return '<div style="margin-bottom:22px;">' +
                '<p style="font-size:13px;color:rgba(255,255,255,.6);margin-bottom:8px;">' + esc(label) + '</p>' +
                '<div class="grid grid-cols-2 gap-4">' +
                    '<div><span style="font-size:34px;font-family:\'Instrument Serif\',serif;color:' + scoreColor(you) + ';">' + you + '</span><span style="color:rgba(255,255,255,.4);"> / 100</span><p style="font-size:12px;color:rgba(255,255,255,.5);margin-top:2px;">You</p></div>' +
                    '<div><span style="font-size:34px;font-family:\'Instrument Serif\',serif;color:' + scoreColor(them) + ';">' + them + '</span><span style="color:rgba(255,255,255,.4);"> / 100</span><p style="font-size:12px;color:rgba(255,255,255,.5);margin-top:2px;">' + esc(c.host) + '</p></div>' +
                '</div></div>';
        }
        var youAvg = Math.round((d.scores.seo + d.scores.geo) / 2);
        var themAvg = Math.round((c.scores.seo + c.scores.geo) / 2);
        var verdict = youAvg > themAvg ? "You're ahead of your competitor overall — nice. Keep the lead." :
                      youAvg < themAvg ? "Your competitor is ahead overall — this is your chance to catch up and pass them." :
                      "You're neck and neck with your competitor.";
        document.getElementById('vs-body').innerHTML =
            '<p style="font-size:24px;font-family:\'Instrument Serif\',serif;line-height:1.2;margin-bottom:28px;">' + esc(verdict) + '</p>' +
            bar('SEO', d.scores.seo, c.scores.seo) +
            bar('GEO / AEO — AI visibility', d.scores.geo, c.scores.geo);
        el.classList.remove('hidden');
    }

    function updateSpeedSummary(perf) {
        var el = document.getElementById('summary-speed');
        if (!el) return;
        if (perf == null) { el.innerHTML = ''; return; }
        var emoji, msg;
        if (perf >= 90) { emoji = '🟢'; msg = 'Your site loads fast — great for visitors and for Google.'; }
        else if (perf >= 50) { emoji = '🟡'; msg = 'Your loading speed is okay, but making it faster would keep more visitors and help your ranking.'; }
        else { emoji = '🔴'; msg = 'Your site is slow to load. This frustrates visitors and hurts your Google ranking — fixing speed should be a priority.'; }
        el.innerHTML = '<p class="flex gap-3 text-slate-700 leading-relaxed"><span class="shrink-0">' + emoji + '</span><span><strong>Speed:</strong> ' + esc(msg) + '</span></p>';
    }

    function resetBtn() {
        var btn = document.getElementById('ttseo-submit');
        var lbl = document.getElementById('ttseo-btn-label');
        if (btn) { btn.disabled = false; btn.style.opacity = '1'; }
        if (lbl) { lbl.textContent = 'Analyze my website'; }
    }

    function runCrawl(url, email, name, tsToken) {
        var sec = document.getElementById('ttseo-crawl');
        sec.classList.remove('hidden');
        document.getElementById('crawl-rows').innerHTML = '';
        document.getElementById('crawl-bar').style.width = '0%';
        document.getElementById('crawl-avg-seo').textContent = '—';
        document.getElementById('crawl-avg-geo').textContent = '—';
        document.getElementById('crawl-pages').textContent = '0';
        document.getElementById('crawl-status').textContent = 'Finding pages…';
        sec.scrollIntoView({ behavior: 'smooth' });

        var params = { action: 'toctoc_seo_discover', nonce: TTSEO.nonce, url: url, email: email, name: name };
        if (tsToken) params.ts_token = tsToken;
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: new URLSearchParams(params) })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            if (window.turnstile) { try { window.turnstile.reset(); } catch (e) {} }
            resetBtn();
            if (!json || !json.success) { showError(json && json.data ? json.data.message : 'Could not scan that site.'); return; }
            var urls = (json.data && json.data.urls) || [];
            if (!urls.length) { document.getElementById('crawl-status').textContent = 'No pages found to scan.'; return; }
            crawlPages(urls);
        })
        .catch(function () {
            if (window.turnstile) { try { window.turnstile.reset(); } catch (e) {} }
            resetBtn();
            showError('Network error. Please try again.');
        });
    }

    function crawlPages(urls) {
        var total = urls.length, done = 0, counted = 0, seoSum = 0, geoSum = 0;
        var rows = document.getElementById('crawl-rows');
        var statusEl = document.getElementById('crawl-status');
        function next(i) {
            if (i >= total) {
                statusEl.textContent = 'Done — scanned ' + counted + ' page' + (counted === 1 ? '' : 's') + '.';
                return;
            }
            statusEl.textContent = 'Scanning ' + (i + 1) + ' of ' + total + '…';
            var body = new URLSearchParams({ action: 'toctoc_seo_page', nonce: TTSEO.nonce, url: urls[i] });
            fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
            .then(function (r) { return r.json(); })
            .then(function (json) {
                done++;
                document.getElementById('crawl-bar').style.width = Math.round(done / total * 100) + '%';
                if (json && json.success) {
                    var d = json.data; counted++; seoSum += d.seo; geoSum += d.geo;
                    var path = d.url.replace(/^https?:\/\/[^\/]+/, '') || '/';
                    rows.insertAdjacentHTML('beforeend',
                        '<tr class="border-b border-slate-50">' +
                        '<td class="p-4"><a href="' + esc(d.url) + '" target="_blank" rel="noopener" class="text-sky-deep hover:underline break-all">' + esc(path) + '</a></td>' +
                        '<td class="p-4 font-bold" style="color:' + scoreColor(d.seo) + '">' + d.seo + '</td>' +
                        '<td class="p-4 font-bold" style="color:' + scoreColor(d.geo) + '">' + d.geo + '</td>' +
                        '<td class="p-4 text-slate-500">' + (d.fails + d.warns) + '</td>' +
                        '</tr>');
                    document.getElementById('crawl-pages').textContent = counted;
                    document.getElementById('crawl-avg-seo').textContent = Math.round(seoSum / counted);
                    document.getElementById('crawl-avg-geo').textContent = Math.round(geoSum / counted);
                }
                next(i + 1);
            })
            .catch(function () { done++; next(i + 1); });
        }
        next(0);
    }

    function showError(msg) {
        var e = document.getElementById('ttseo-error');
        e.textContent = msg || 'Something went wrong. Please try again.';
        e.classList.remove('hidden');
    }

    var pdfBtn = document.getElementById('ttseo-pdf');
    if (pdfBtn) {
        pdfBtn.addEventListener('click', function () { window.print(); });
    }

    form.addEventListener('submit', function (ev) {
        ev.preventDefault();
        document.getElementById('ttseo-error').classList.add('hidden');
        var url = document.getElementById('ttseo-url').value.trim();
        var competitor = document.getElementById('ttseo-competitor').value.trim();
        var email = document.getElementById('ttseo-email').value.trim();
        var name = document.getElementById('ttseo-name').value.trim();
        if (!url || !email) { showError('Please enter a URL and your email.'); return; }
        var tsToken = (TTSEO.ts && window.turnstile) ? (window.turnstile.getResponse() || '') : '';
        if (TTSEO.ts && !tsToken) { showError('Please complete the anti-spam check below.'); return; }

        var btn = document.getElementById('ttseo-submit');
        var lbl = document.getElementById('ttseo-btn-label');
        btn.disabled = true; btn.style.opacity = '.7';
        lbl.textContent = 'Analyzing…';

        // dataLayer lead event for GTM.
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ event: 'seo_check_lead', lead_email: email, checked_url: url });

        var crawlToggle = document.getElementById('ttseo-crawl-toggle');
        if (crawlToggle && crawlToggle.checked) {
            runCrawl(url, email, name, tsToken);
            return;
        }

        var params = { action: 'toctoc_seo_check', nonce: TTSEO.nonce, url: url, email: email, name: name };
        if (competitor) params.competitor = competitor;
        if (tsToken) params.ts_token = tsToken;
        var body = new URLSearchParams(params);
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            btn.disabled = false; btn.style.opacity = '1'; lbl.textContent = 'Analyze my website';
            if (window.turnstile) { try { window.turnstile.reset(); } catch (e) {} }
            if (!json || !json.success) { showError(json && json.data ? json.data.message : 'Could not analyze that URL.'); return; }
            var d = json.data;

            document.getElementById('ttseo-results').classList.remove('hidden');
            document.getElementById('ttseo-target').textContent = d.url;
            setScore('score-seo', d.scores.seo);
            setScore('score-geo', d.scores.geo);

            document.getElementById('prev-title').textContent = d.meta.title || '(no title)';
            document.getElementById('prev-url').textContent = d.url;
            document.getElementById('prev-desc').textContent = d.meta.description || '(no meta description)';

            renderSummary(d);
            renderCompetitor(d);
            renderList('list-seo', d.seo);
            renderList('list-geo', d.geo);

            document.getElementById('ttseo-results').scrollIntoView({ behavior: 'smooth' });

            // Kick off PageSpeed (slower).
            runPSI(d.url);
        })
        .catch(function () {
            btn.disabled = false; btn.style.opacity = '1'; lbl.textContent = 'Analyze my website';
            if (window.turnstile) { try { window.turnstile.reset(); } catch (e) {} }
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
            updateSpeedSummary(d.performance);
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
