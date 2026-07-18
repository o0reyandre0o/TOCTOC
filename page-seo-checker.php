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

    /* Never force display on these two: only the mode that actually ran has had its
       .hidden removed by JS. Forcing it would print an empty skeleton of the other. */
    #ttseo-results, #ttseo-crawl {
        background: #fff !important;
        padding: 0 !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    #ttseo-results .shadow-soft, #ttseo-results .shadow-glass,
    #ttseo-crawl .shadow-soft, #ttseo-crawl .shadow-glass { box-shadow: none !important; }
    #ttseo-results section, #ttseo-results > div,
    #ttseo-crawl > div { max-width: 100% !important; padding-left: 0 !important; padding-right: 0 !important; }
    #ttseo-vs { background: #0f172a !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    #ttseo-results .rounded-\[2rem\] { break-inside: avoid; }

    /* Full-site scan: expand every per-URL breakdown so the PDF carries the issues
       of every page, not just the ones the user happened to click open. */
    #ttseo-crawl tbody tr.hidden { display: table-row !important; }
    #ttseo-crawl .overflow-x-auto { overflow: visible !important; }
    #ttseo-crawl table { min-width: 0 !important; width: 100% !important; }
    #ttseo-crawl tbody tr { break-inside: avoid; }
    #ttseo-crawl .ttseo-expand { color: #0f172a !important; text-decoration: none !important; }
    #ttseo-crawl .ttseo-expand span { display: none !important; } /* the ▾ chevron */
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
                    <label class="mt-2 flex items-center gap-2 text-sm text-slate-600 cursor-pointer select-none">
                        <input id="ttseo-monitor-toggle" type="checkbox" class="w-4 h-4 rounded border-slate-300 accent-sky-deep">
                        Watch my site weekly &amp; email me if my score drops (free)
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

            <!-- Scan history / progress vs previous scans (filled when the lead has scanned before) -->
            <div id="ttseo-history" class="hidden rounded-[2rem] bg-white border border-slate-100 shadow-soft p-6 md:p-8 mb-10"></div>

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

            <!-- Shareable score badge (filled after a successful check) -->
            <div id="ttseo-share" class="hidden ttseo-noprint rounded-[2rem] bg-white border border-slate-100 shadow-soft p-6 md:p-8 mb-10"></div>

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

            <div class="ttseo-print-header" style="display:none;">
                <p style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#0284c7;font-weight:bold;margin:0;">TocToc Marketing &middot; Full-Site SEO / GEO Report</p>
                <p id="crawl-print-target" style="font-size:13px;color:#555;margin:6px 0 0;"></p>
                <hr style="border:none;border-top:2px solid #0f172a;margin:8px 0 20px;">
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4 mb-2">
                <h2 class="text-3xl md:text-4xl font-display text-slate-900">Full-site scan</h2>
                <button id="ttseo-crawl-pdf" type="button" class="ttseo-noprint hidden shrink-0 inline-flex items-center gap-2 rounded-full bg-slate-950 text-white px-5 py-2.5 text-sm font-bold hover:bg-slate-800 transition-colors">
                    Download PDF
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                </button>
            </div>
            <p id="crawl-status" class="text-slate-500 mb-6">Finding pages…</p>
            <div class="ttseo-noprint w-full h-2 bg-slate-200 rounded-full overflow-hidden mb-10">
                <div id="crawl-bar" class="h-full bg-sky-deep transition-all duration-300" style="width:0%"></div>
            </div>
            <!-- Speed of the entered URL (Google PageSpeed) — runs alongside the crawl. -->
            <div id="crawl-speed" class="hidden rounded-[2rem] bg-white border border-slate-100 shadow-soft p-6 md:p-8 mb-10"></div>
            <!-- Site-wide findings: duplicates, H1s, NAP consistency and broken links (filled after the crawl). -->
            <div id="crawl-sitewide" class="hidden rounded-[2rem] bg-white border border-slate-100 shadow-soft p-6 md:p-8 mb-10"></div>
            <!-- Shareable score badge for crawl mode (site-wide averages) -->
            <div id="crawl-share" class="hidden ttseo-noprint rounded-[2rem] bg-white border border-slate-100 shadow-soft p-6 md:p-8 mb-10"></div>
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
        document.getElementById('ttseo-crawl-pdf').classList.add('hidden');
        document.getElementById('crawl-print-target').textContent = url;
        // Measure the entered URL's speed in parallel with the crawl.
        var spd = document.getElementById('crawl-speed');
        spd.classList.remove('hidden');
        spd.innerHTML = '<span class="inline-flex items-center gap-2 text-slate-500"><span class="inline-block w-4 h-4 border-2 border-slate-200 border-t-sky-deep rounded-full animate-spin"></span> Measuring speed with Google PageSpeed&hellip;</span>';
        runPSI(url, 1, { score: null, body: 'crawl-speed' });
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
            crawlPages(urls, url, email);
        })
        .catch(function () {
            if (window.turnstile) { try { window.turnstile.reset(); } catch (e) {} }
            resetBtn();
            showError('Network error. Please try again.');
        });
    }

    function pathOf(u) { return u.replace(/^https?:\/\/[^\/]+/, '') || '/'; }

    function crawlPages(urls, siteUrl, email) {
        var total = urls.length, done = 0, counted = 0, seoSum = 0, geoSum = 0;
        var rows = document.getElementById('crawl-rows');
        var statusEl = document.getElementById('crawl-status');
        // Collected across pages for the site-wide cross-analysis.
        var pages = [];
        var linkMap = {}; // normalized url -> { url, src: [pages linking to it] }
        function next(i) {
            if (i >= total) {
                statusEl.textContent = 'Done — scanned ' + counted + ' page' + (counted === 1 ? '' : 's') + '.';
                // Only offer the PDF once every page has actually been scanned.
                if (counted) document.getElementById('ttseo-crawl-pdf').classList.remove('hidden');
                if (counted) {
                    renderSitewide(pages);
                    checkBrokenLinks(linkMap, pages);
                    recordCrawlHistory(siteUrl, email, Math.round(seoSum / counted), Math.round(geoSum / counted));
                }
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
                    pages.push({ url: d.url, title: d.title || '', desc: d.desc || '', h1: (d.h1 | 0), phones: d.phones || [] });
                    (d.links || []).forEach(function (L) {
                        var k = L.replace(/\/+$/, '').toLowerCase();
                        if (!linkMap[k]) linkMap[k] = { url: L, src: [] };
                        if (linkMap[k].src.length < 5 && linkMap[k].src.indexOf(d.url) < 0) linkMap[k].src.push(d.url);
                    });
                    var path = d.url.replace(/^https?:\/\/[^\/]+/, '') || '/';
                    var issues = d.issues || [];
                    var rid = 'crawlrow-' + i;
                    // Every scanned URL gets its own expandable breakdown, with the same
                    // plain-English + technical explanation as the single-page report.
                    var issuesCell = issues.length
                        ? '<button type="button" class="ttseo-expand font-bold text-sky-deep hover:underline" data-target="' + rid + '">' + (d.fails + d.warns) + ' <span class="text-xs">&#9662;</span></button>'
                        : '<span class="font-bold text-green-600">0</span>';
                    var detailHtml = issues.map(function (r) {
                        return '<div class="py-3 border-b border-slate-100 last:border-0">' +
                            '<div class="flex flex-wrap items-baseline gap-2">' +
                                '<span>' + (ICON[r.status] || ICON.info) + '</span>' +
                                '<span class="font-bold text-slate-900">' + esc(r.label) + '</span>' +
                                '<span class="text-xs text-slate-500">' + esc(r.detail) + '</span>' +
                            '</div>' + explainHtml(r) +
                        '</div>';
                    }).join('');
                    rows.insertAdjacentHTML('beforeend',
                        '<tr class="border-b border-slate-50">' +
                        '<td class="p-4"><a href="' + esc(d.url) + '" target="_blank" rel="noopener" class="text-sky-deep hover:underline break-all">' + esc(path) + '</a></td>' +
                        '<td class="p-4 font-bold" style="color:' + scoreColor(d.seo) + '">' + d.seo + '</td>' +
                        '<td class="p-4 font-bold" style="color:' + scoreColor(d.geo) + '">' + d.geo + '</td>' +
                        '<td class="p-4 text-slate-500">' + issuesCell + '</td>' +
                        '</tr>' +
                        (issues.length ? '<tr id="' + rid + '" class="hidden"><td colspan="4" class="px-4 pb-6 pt-0 bg-slate-50/60">' + detailHtml + '</td></tr>' : ''));
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

    // ---- Site-wide cross-analysis: issues only visible across the whole site. ----
    function renderSitewide(pages) {
        var el = document.getElementById('crawl-sitewide');
        el.classList.remove('hidden');
        var findings = [];

        // Duplicate titles / meta descriptions across pages.
        function dupGroups(field) {
            var map = {};
            pages.forEach(function (p) {
                var v = (p[field] || '').trim().toLowerCase();
                if (!v) return;
                (map[v] = map[v] || []).push(pathOf(p.url));
            });
            return Object.keys(map).filter(function (k) { return map[k].length > 1; }).map(function (k) { return map[k]; });
        }
        var dupT = dupGroups('title');
        if (dupT.length) {
            findings.push({ sev: 'fail', title: 'Duplicate page titles',
                detail: dupT.map(function (g) { return g.slice(0, 4).join(', ') + (g.length > 4 ? ' +' + (g.length - 4) : '') + ' share one title'; }).join(' · '),
                plain: 'Each page competes against its twins in Google instead of ranking on its own. Give every page a unique title.' });
        } else {
            findings.push({ sev: 'pass', title: 'Page titles', detail: 'All ' + pages.length + ' scanned pages have unique titles', plain: '' });
        }
        var dupD = dupGroups('desc');
        if (dupD.length) {
            findings.push({ sev: 'warn', title: 'Duplicate meta descriptions',
                detail: dupD.map(function (g) { return g.slice(0, 4).join(', ') + (g.length > 4 ? ' +' + (g.length - 4) : ''); }).join(' · '),
                plain: 'Google rewrites duplicated descriptions and your click-through rate suffers. Write a unique one per page.' });
        } else {
            findings.push({ sev: 'pass', title: 'Meta descriptions', detail: 'No duplicates across scanned pages', plain: '' });
        }

        // H1 discipline across the site.
        var badH1 = pages.filter(function (p) { return p.h1 !== 1; });
        if (badH1.length) {
            findings.push({ sev: 'warn', title: 'H1 problems on ' + badH1.length + ' page' + (badH1.length === 1 ? '' : 's'),
                detail: badH1.slice(0, 5).map(function (p) { return pathOf(p.url) + ' (' + p.h1 + ' H1' + (p.h1 === 1 ? '' : 's') + ')'; }).join(' · ') + (badH1.length > 5 ? ' …' : ''),
                plain: 'Every page needs exactly one main heading so search engines and AI know what it is about.' });
        } else {
            findings.push({ sev: 'pass', title: 'H1 headings', detail: 'Every scanned page has exactly one H1', plain: '' });
        }

        // NAP consistency: clickable phone numbers across the site.
        var phoneSet = {};
        var pagesWithPhone = 0;
        pages.forEach(function (p) {
            if (p.phones.length) pagesWithPhone++;
            p.phones.forEach(function (ph) { phoneSet[ph] = (phoneSet[ph] || 0) + 1; });
        });
        var phones = Object.keys(phoneSet);
        if (phones.length === 0) {
            findings.push({ sev: 'warn', title: 'No clickable phone number found',
                detail: 'None of the ' + pages.length + ' scanned pages has a tel: link',
                plain: 'A consistent, clickable phone number is a core local trust signal — AI engines cross-check it against your Google profile. This is part of your NAP (Name, Address, Phone) consistency.' });
        } else if (phones.length === 1) {
            findings.push({ sev: 'pass', title: 'Phone number consistent (NAP)',
                detail: phones[0] + ' on ' + pagesWithPhone + ' of ' + pages.length + ' pages', plain: '' });
        } else {
            findings.push({ sev: 'warn', title: phones.length + ' different phone numbers across the site',
                detail: phones.slice(0, 3).join(' · ') + (phones.length > 3 ? ' …' : ''),
                plain: 'Mismatched phone numbers confuse the automated background check AI engines run before recommending a business. If they are all intentional (departments, locations), make sure each also matches its Google Business Profile.' });
        }

        var html = '<h3 class="text-xl font-display text-slate-900 mb-1">Site-wide findings</h3>' +
            '<p class="text-sm text-slate-500 mb-5">Issues that only show up when you look at the whole site together.</p>';
        findings.forEach(function (f) {
            html += '<div class="flex items-start gap-4 py-4 border-b border-slate-50">' +
                '<span class="shrink-0 w-6 text-center text-lg font-bold">' + (ICON[f.sev] || ICON.info) + '</span>' +
                '<div class="flex-1 min-w-0">' +
                    '<span class="font-bold text-slate-900">' + esc(f.title) + '</span>' +
                    '<span class="block text-sm text-slate-500 mt-0.5">' + esc(f.detail) + '</span>' +
                    (f.plain ? '<p class="mt-1.5 text-sm text-slate-600 leading-relaxed"><span class="font-bold text-sky-deep">In plain English:</span> ' + esc(f.plain) + '</p>' : '') +
                '</div></div>';
        });
        html += '<div id="crawl-links" class="pt-4 text-sm text-slate-500">Preparing internal link check&hellip;</div>';
        el.innerHTML = html;
    }

    // ---- Broken internal links: probe links discovered during the crawl. ----
    function checkBrokenLinks(linkMap, pages) {
        var mount = document.getElementById('crawl-links');
        if (!mount) return;
        var crawled = {};
        pages.forEach(function (p) { crawled[p.url.replace(/\/+$/, '').toLowerCase()] = true; });
        var candidates = Object.keys(linkMap).filter(function (k) { return !crawled[k]; }).slice(0, 50).map(function (k) { return linkMap[k]; });
        if (!candidates.length) {
            mount.innerHTML = '<span class="font-bold text-green-600">&#10003;</span> No extra internal links to verify — every link found points to a scanned page.';
            return;
        }
        var broken = [];
        var idx = 0;
        function batch() {
            if (idx >= candidates.length) {
                if (!broken.length) {
                    mount.innerHTML = '<span class="font-bold text-green-600">&#10003;</span> Checked ' + candidates.length + ' internal links — none broken.';
                } else {
                    var html = '<div class="flex items-start gap-4 py-4">' +
                        '<span class="shrink-0 w-6 text-center text-lg font-bold">' + ICON.fail + '</span>' +
                        '<div class="flex-1 min-w-0">' +
                        '<span class="font-bold text-slate-900">' + broken.length + ' broken internal link' + (broken.length === 1 ? '' : 's') + '</span>' +
                        '<p class="mt-1.5 text-sm text-slate-600 leading-relaxed"><span class="font-bold text-sky-deep">In plain English:</span> These links send visitors (and crawlers) to dead pages. Fix or remove them — broken links waste crawl budget and erode trust.</p>' +
                        '<ul class="mt-2 space-y-1">';
                    broken.slice(0, 10).forEach(function (b) {
                        html += '<li class="text-sm text-slate-500 break-all">' + esc(pathOf(b.url)) + ' <span class="font-bold text-red-600">(' + (b.code === 0 ? 'unreachable' : b.code) + ')</span>' +
                            (b.src.length ? ' <span class="text-slate-400">&larr; linked from ' + esc(b.src.slice(0, 2).map(pathOf).join(', ')) + (b.src.length > 2 ? ' …' : '') + '</span>' : '') + '</li>';
                    });
                    html += (broken.length > 10 ? '<li class="text-sm text-slate-400">…and ' + (broken.length - 10) + ' more</li>' : '') + '</ul></div></div>';
                    mount.innerHTML = html;
                }
                return;
            }
            var slice = candidates.slice(idx, idx + 10);
            mount.innerHTML = '<span class="inline-flex items-center gap-2"><span class="inline-block w-4 h-4 border-2 border-slate-200 border-t-sky-deep rounded-full animate-spin"></span> Checking internal links&hellip; ' + Math.min(idx + 10, candidates.length) + ' of ' + candidates.length + '</span>';
            var body = new URLSearchParams({ action: 'toctoc_seo_status', nonce: TTSEO.nonce, urls: JSON.stringify(slice.map(function (c) { return c.url; })) });
            fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
            .then(function (r) { return r.json(); })
            .then(function (json) {
                if (json && json.success && json.data.codes) {
                    slice.forEach(function (c) {
                        var code = json.data.codes[c.url];
                        if (typeof code === 'number' && code !== -1 && (code === 0 || code >= 400)) {
                            broken.push({ url: c.url, code: code, src: c.src });
                        }
                    });
                }
                idx += 10;
                batch();
            })
            .catch(function () { idx += 10; batch(); });
        }
        batch();
    }

    // ---- Scan history: "your progress since last time". ----
    function historyHtml(hist, seoNow, geoNow) {
        var prev = hist[0];
        var dS = seoNow - prev.seo, dG = geoNow - prev.geo;
        function chip(d) {
            if (d > 0) return '<span style="color:#16a34a;font-weight:bold;">&#9650; +' + d + '</span>';
            if (d < 0) return '<span style="color:#dc2626;font-weight:bold;">&#9660; ' + d + '</span>';
            return '<span class="text-slate-400 font-bold">=</span>';
        }
        var html = '<div class="flex flex-wrap items-center gap-x-6 gap-y-2">' +
            '<span class="text-xs font-bold uppercase tracking-widest text-sky-deep">Your progress</span>' +
            '<span class="text-slate-700">vs your last scan (' + esc((prev.created_at || '').slice(0, 10)) + '): SEO ' + chip(dS) + ' &middot; GEO ' + chip(dG) + '</span>' +
            '</div>';
        if (hist.length > 1) {
            html += '<p class="mt-2 text-xs text-slate-400">Earlier: ' + hist.slice(1).map(function (h) {
                return esc((h.created_at || '').slice(0, 10)) + ' (' + h.seo + '/' + h.geo + ')';
            }).join(' · ') + '</p>';
        }
        return html;
    }

    function renderHistory(hist, seoNow, geoNow) {
        var el = document.getElementById('ttseo-history');
        if (!el) return;
        if (!hist || !hist.length) { el.classList.add('hidden'); return; }
        el.innerHTML = historyHtml(hist, seoNow, geoNow);
        el.classList.remove('hidden');
    }

    // Crawl mode: report the site-wide averages so they enter the same history,
    // then show the progress line at the top of the site-wide panel.
    function recordCrawlHistory(siteUrl, email, avgSeo, avgGeo) {
        if (!email) return;
        var params = { action: 'toctoc_seo_history', nonce: TTSEO.nonce, url: siteUrl, email: email, seo: avgSeo, geo: avgGeo };
        var monT = document.getElementById('ttseo-monitor-toggle');
        if (monT && monT.checked) params.monitor = '1';
        var body = new URLSearchParams(params);
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            if (!json || !json.success) return;
            // Share badge always (site-wide averages) — even on a first scan.
            renderShareBadge(json.data.badge, 'crawl-share');
            // Progress line only when there is a previous scan to compare against.
            if (json.data.history && json.data.history.length) {
                var panel = document.getElementById('crawl-sitewide');
                if (panel) panel.insertAdjacentHTML('afterbegin', '<div class="pb-4 mb-4 border-b border-slate-100">' + historyHtml(json.data.history, avgSeo, avgGeo) + '</div>');
            }
        })
        .catch(function () {});
    }

    // ---- CrUX: what real Chrome users experienced (28-day p75). ----
    function cruxRate(v, good, poor) {
        if (v === null || v === undefined) return ['—', '#94a3b8'];
        v = parseFloat(v);
        if (v <= good) return ['Good', '#16a34a'];
        if (v <= poor) return ['Needs work', '#d97706'];
        return ['Poor', '#dc2626'];
    }

    function fetchCrux(url, mountId) {
        var host = document.getElementById(mountId);
        if (!host) return;
        var body = new URLSearchParams({ action: 'toctoc_seo_crux', nonce: TTSEO.nonce, url: url });
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            var div = document.createElement('div');
            div.className = 'mt-5 pt-5 border-t border-slate-100';
            if (!json || !json.success) {
                div.innerHTML = '<p class="text-xs text-slate-400">Real-user data: ' + esc(json && json.data ? json.data.message : 'unavailable') + '</p>';
                host.appendChild(div);
                return;
            }
            var d = json.data;
            var lcp = cruxRate(d.lcp, 2500, 4000), inp = cruxRate(d.inp, 200, 500), cls = cruxRate(d.cls, 0.1, 0.25);
            function item(label, rate, disp) {
                return '<div><p class="text-xs font-bold uppercase tracking-widest text-slate-500">' + label + '</p>' +
                    '<p class="mt-1 text-xl font-display text-slate-900">' + disp + ' <span style="font-size:12px;font-weight:bold;color:' + rate[1] + '">' + rate[0] + '</span></p></div>';
            }
            div.innerHTML = '<p class="text-xs font-bold uppercase tracking-widest text-sky-deep mb-3">Real users &middot; Chrome, last 28 days (' + (d.level === 'origin' ? 'whole site' : 'this page') + ')</p>' +
                '<div class="grid grid-cols-3 gap-4">' +
                item('LCP', lcp, d.lcp != null ? (d.lcp / 1000).toFixed(1) + ' s' : '—') +
                item('INP', inp, d.inp != null ? d.inp + ' ms' : '—') +
                item('CLS', cls, d.cls != null ? parseFloat(d.cls).toFixed(2) : '—') +
                '</div>';
            host.appendChild(div);
        })
        .catch(function () {});
    }

    // ---- Shareable badge: preview + copy-paste embed code. Works in both modes
    // (single report mounts into #ttseo-share, full-site scan into #crawl-share). ----
    function renderShareBadge(badgeUrl, mountId) {
        var el = document.getElementById(mountId || 'ttseo-share');
        if (!el) return;
        if (!badgeUrl) { el.classList.add('hidden'); return; }
        var embed = '<a href="https://toctoc.ky/seo-checker/"><img src="' + badgeUrl + '" alt="SEO score verified by TocToc Marketing" width="460" height="72"></a>';
        el.innerHTML =
            '<p class="text-xs font-bold uppercase tracking-widest text-sky-deep mb-4">Proud of your score? Share it</p>' +
            '<div class="flex flex-col md:flex-row md:items-center gap-6">' +
                '<img src="' + esc(badgeUrl) + '" alt="Score badge" width="460" height="72" class="shrink-0 max-w-full h-auto" />' +
                '<div class="flex-1 min-w-0">' +
                    '<p class="text-sm text-slate-500 mb-2">Paste this on your website or share the image — it links back to the checker:</p>' +
                    '<textarea readonly rows="2" class="ttseo-embed-ta w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-600 outline-none"></textarea>' +
                    '<button type="button" class="ttseo-copy-btn mt-2 inline-flex items-center gap-2 rounded-full bg-slate-950 text-white px-5 py-2 text-sm font-bold hover:bg-slate-800 transition-colors">Copy embed code</button>' +
                '</div>' +
            '</div>';
        el.classList.remove('hidden');
        var ta = el.querySelector('.ttseo-embed-ta');
        ta.value = embed;
        el.querySelector('.ttseo-copy-btn').addEventListener('click', function () {
            ta.select();
            try { document.execCommand('copy'); } catch (e) {}
            if (navigator.clipboard) { navigator.clipboard.writeText(embed).catch(function () {}); }
            this.textContent = 'Copied ✓';
            var btn = this;
            setTimeout(function () { btn.textContent = 'Copy embed code'; }, 2000);
        });
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

    // Full-site scan PDF. The print stylesheet expands every collapsed per-URL
    // breakdown, so the export always contains every page and all its issues —
    // regardless of what the user expanded on screen.
    var crawlPdfBtn = document.getElementById('ttseo-crawl-pdf');
    if (crawlPdfBtn) {
        crawlPdfBtn.addEventListener('click', function () { window.print(); });
    }

    // Expand/collapse a crawled page's issue breakdown (delegated — rows are added later).
    var crawlRows = document.getElementById('crawl-rows');
    if (crawlRows) {
        crawlRows.addEventListener('click', function (ev) {
            var btn = ev.target.closest('.ttseo-expand');
            if (!btn) return;
            var el = document.getElementById(btn.getAttribute('data-target'));
            if (el) el.classList.toggle('hidden');
        });
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
        var monToggle = document.getElementById('ttseo-monitor-toggle');
        if (monToggle && monToggle.checked) params.monitor = '1';
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
            renderHistory(d.history || [], d.scores.seo, d.scores.geo);
            renderShareBadge(d.badge);
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

    // Google's Lighthouse run can outlast our server timeout on slow sites, but it
    // keeps analyzing and caches the result — so a retry usually succeeds fast.
    // `els` targets where to render: default is the single-URL report; the
    // full-site scan passes its own panel ({score:null, body:'crawl-speed'}).
    function runPSI(url, attempt, els) {
        attempt = attempt || 1;
        els = els || { score: 'score-perf', body: 'perf-body' };
        var MAX_ATTEMPTS = 3;
        var perfEl = document.getElementById(els.body);
        var body = new URLSearchParams({ action: 'toctoc_seo_psi', nonce: TTSEO.nonce, url: url });
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            if (!json || !json.success) {
                var retryable = json && json.data && json.data.retryable;
                if (retryable && attempt < MAX_ATTEMPTS) {
                    perfEl.innerHTML = '<span class="inline-flex items-center gap-2 text-slate-500"><span class="inline-block w-4 h-4 border-2 border-slate-200 border-t-sky-deep rounded-full animate-spin"></span> Google is still analyzing this site &mdash; retrying (' + (attempt + 1) + '/' + MAX_ATTEMPTS + ')&hellip;</span>';
                    setTimeout(function () { runPSI(url, attempt + 1, els); }, 4000);
                    return;
                }
                if (els.score) setScore(els.score, null);
                var failMsg = retryable
                    ? 'This site takes Google a very long time to analyze (usually a sign it is quite slow). Try again in a minute.'
                    : (json && json.data ? json.data.message : 'Speed data unavailable.');
                perfEl.innerHTML = '<span class="text-slate-400">' + esc(failMsg) + '</span>';
                return;
            }
            var d = json.data;
            var metric = function (label, val) {
                return '<div class="rounded-2xl bg-slate-50 border border-slate-100 p-5"><p class="text-xs font-bold uppercase tracking-widest text-slate-500">' + label + '</p><p class="mt-1 text-2xl font-display text-slate-900">' + esc(val) + '</p></div>';
            };
            var grid = '<div class="grid grid-cols-2 sm:grid-cols-3 gap-4">' +
                metric('LCP', d.lcp) + metric('CLS', d.cls) + metric('Total Blocking', d.tbt) +
                metric('First Paint', d.fcp) + metric('Speed Index', d.si) +
                '</div>';
            var desktopLine = '<p class="mt-4 text-sm text-slate-500">Mobile score above &middot; Desktop: <strong id="' + (els.score ? 'psi-desktop-single' : 'psi-desktop-crawl') + '">measuring&hellip;</strong></p>';
            if (els.score) {
                setScore(els.score, d.performance);
                updateSpeedSummary(d.performance);
                perfEl.innerHTML = grid + desktopLine;
            } else {
                // Crawl panel: include the score inline, since there is no score card.
                perfEl.innerHTML =
                    '<div class="flex flex-wrap items-baseline gap-3 mb-5">' +
                        '<span class="text-sm font-bold uppercase tracking-widest text-slate-500">Speed (Google PageSpeed)</span>' +
                        '<span class="text-4xl font-display" style="color:' + scoreColor(d.performance) + '">' + d.performance + '</span>' +
                        '<span class="text-slate-400">/ 100 &middot; mobile</span>' +
                    '</div>' + grid + desktopLine;
            }
            // Kick the desktop measurement + real-user CrUX data once mobile has rendered.
            fetchDesktopScore(url, els.score ? 'psi-desktop-single' : 'psi-desktop-crawl');
            fetchCrux(url, els.score ? 'perf-body' : 'crawl-speed');
        })
        .catch(function () {
            if (els.score) setScore(els.score, null);
            perfEl.innerHTML = '<span class="text-slate-400">Speed data unavailable.</span>';
        });
    }

    // Desktop PageSpeed score — appended under the mobile metrics (same retry logic).
    function fetchDesktopScore(url, mountId, attempt) {
        attempt = attempt || 1;
        var el = document.getElementById(mountId);
        if (!el) return;
        var body = new URLSearchParams({ action: 'toctoc_seo_psi', nonce: TTSEO.nonce, url: url, strategy: 'desktop' });
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            if (!json || !json.success) {
                if (json && json.data && json.data.retryable && attempt < 3) {
                    setTimeout(function () { fetchDesktopScore(url, mountId, attempt + 1); }, 4000);
                    return;
                }
                el.textContent = 'unavailable';
                return;
            }
            el.innerHTML = '<span style="color:' + scoreColor(json.data.performance) + '">' + json.data.performance + '</span><span class="text-slate-400 font-normal"> / 100</span>';
        })
        .catch(function () { el.textContent = 'unavailable'; });
    }
})();
</script>

<?php get_footer(); ?>
