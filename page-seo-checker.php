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
/*
 * The llms.txt draft box.
 *
 * Written out here rather than left to the Tailwind utilities on the element,
 * because a <pre> without white-space and overflow set does not degrade
 * gracefully — it spills its lines straight across the page, which is exactly
 * what happened the first time this shipped: the compiled stylesheet deploys on
 * a slower cycle than the PHP, so for a few minutes the markup was live with no
 * rules behind it. Layout that would break the page belongs where it cannot
 * arrive late.
 *
 * The long URLs in the Key pages section are single unbroken tokens, so
 * pre-wrap alone is not enough; anywhere is what actually breaks them.
 */
#llms-body {
    white-space: pre-wrap;
    overflow-wrap: anywhere;
    word-break: break-word;
    max-height: 24rem;
    overflow: auto;
    tab-size: 2;
}

@media print {
    nav, footer, .ttseo-noprint { display: none !important; }
    /* Print the draft in full instead of a scrollable window of it. */
    #llms-body { max-height: none !important; overflow: visible !important; }
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

<?php ob_start(); ?>
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "@id": "https://toctoc.ky/seo-checker/#app",
  "name": "Free SEO, GEO & AEO Checker",
  "url": "https://toctoc.ky/seo-checker/",
  "description": "A free, instant tool that audits any website's classic SEO, its AI visibility (GEO/AEO — how ready the page is to be found and recommended by ChatGPT, Perplexity and Google AI) and its Core Web Vitals speed, returning a score and plain-English plus technical fixes.",
  "applicationCategory": "BusinessApplication",
  "applicationSubCategory": "SEO & AI Visibility Audit Tool",
  "operatingSystem": "All",
  "browserRequirements": "Requires JavaScript. Runs in any modern web browser.",
  "inLanguage": "en",
  "isAccessibleForFree": true,
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Classic on-page SEO audit (titles, meta descriptions, headings, images)",
    "AI visibility check for GEO / AEO — readiness to be recommended by ChatGPT, Perplexity and Google AI",
    "Core Web Vitals and page speed analysis",
    "Whole-site scan of up to 20 pages",
    "Plain-English and technical explanations of every issue",
    "Detailed image audit: missing, empty, generic alt text and responsive-image (srcset / picture) checks",
    "Downloadable PDF, JSON and Markdown reports, plus free weekly monitoring"
  ],
  "provider": { "@id": "https://toctoc.ky/#organization" },
  "publisher": { "@id": "https://toctoc.ky/#organization" }
}
<?php toctoc_schema_add_raw( ob_get_clean() ); ?>

<?php
/*
 * FAQ — added 31 Aug 2026, and the reason is worth recording.
 *
 * This page is the second most visited on the site after the home, but it had
 * 354 words of visible text: everything else lives in sections that stay
 * hidden until a scan finishes. So a first-time visitor, and any crawler,
 * arrived at a form with almost nothing explaining what the tool does or why
 * the result matters.
 *
 * These answers stay visible whether or not anyone runs a scan, and they carry
 * FAQPage markup for the answer engines this tool is itself about.
 */
$ttseo_faqs = array(
    array(
        'q' => 'Is it really free, and do you need my email?',
        'a' => '<p>Free, and no. The email field is optional &mdash; the scan runs and shows you the whole result without it. If you do leave one, we send the full report and a weekly re-check that tells you if your score drops.</p>',
    ),
    array(
        'q' => 'What does it actually look at?',
        'a' => '<p>Three things at once, which is the point of it. The classic on-page work: titles, meta descriptions, heading structure, image alt text. Then AI visibility &mdash; whether a language model can tell what your business does and where it is, and whether your structured data says anything useful about you. Then speed, measured against Core Web Vitals.</p><p>Most tools do one of those three. The reason to look at them together is that they fail together: a page a crawler cannot parse is usually also a page an assistant cannot summarise.</p>',
    ),
    array(
        'q' => 'How is this different from PageSpeed Insights?',
        'a' => '<p>PageSpeed measures how fast a page loads, and nothing else. That is one of the three sections here, and Google\'s own tool is the authority on it &mdash; we do not pretend otherwise.</p><p>The other two sections are the ones PageSpeed does not cover: whether a search engine can understand what the page is about, and whether an AI assistant has enough to go on to recommend you.</p>',
    ),
    array(
        'q' => 'What are GEO and AEO?',
        'a' => '<p><strong>GEO</strong> is generative engine optimisation &mdash; being cited when ChatGPT, Gemini or Perplexity assemble an answer rather than return a list of links.</p><p><strong>AEO</strong> is answer engine optimisation &mdash; being the direct answer: the box at the top of Google, or what a voice assistant reads aloud.</p><p>Both run on the same foundations as ordinary SEO, plus structure a machine can read without guessing at it.</p>',
    ),
    array(
        'q' => 'Will fixing these get me recommended by ChatGPT?',
        'a' => '<p>It makes it possible. That is not the same as guaranteed, and we would rather say so.</p><p>AI answers are not stable &mdash; ask the same question twice on different days and different businesses come back. Anyone promising you a fixed position in an AI answer is describing something that does not exist. What this checker finds are the reasons a model currently cannot read you at all, which is a different and more fixable problem.</p>',
    ),
    array(
        'q' => 'Can I scan a site that is not mine?',
        'a' => '<p>Yes, and plenty of people run it on a competitor before they run it on themselves. The scan only reads what is already published publicly, the same as any search engine does.</p>',
    ),
    array(
        'q' => 'I have the report. Where do I start?',
        'a' => '<p>Start with anything marked missing before anything marked weak. An absent title or no structured data at all costs you more than a mediocre version of either, and takes less time to fix.</p><p>Every issue comes with a plain-English explanation and a technical one, so you can act on it yourself or forward it to whoever builds your site without having to translate anything.</p>',
    ),
);
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero + form -->
    <section class="ttseo-noprint relative pt-40 md:pt-48 pb-20 overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-4xl px-6 text-center">
            <?php toctoc_render_breadcrumbs( 'Free SEO Checker' ); ?>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                Free Tool · SEO · GEO · AEO
            </div>
            <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-[100px] font-display leading-[0.95] text-white">
                Is your website ready for <em class="italic text-accent font-display">Google &amp; AI?</em>
            </h1>
            <p class="mt-8 mx-auto max-w-2xl text-lg text-white/70 leading-relaxed">
                Run a free instant audit of any page — classic SEO, AI visibility (GEO/AEO), and Core Web Vitals speed. Get your scores and exactly what to fix.
            </p>

            <form id="ttseo-form" class="mt-10 mx-auto max-w-2xl text-left">
                <div class="rounded-[2rem] bg-white border border-slate-200 shadow-soft p-6 md:p-8">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Website URL</label>
                    <input id="ttseo-url" type="text" required inputmode="url" placeholder="https://yourwebsite.com" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-lg text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />
                    <input id="ttseo-competitor" type="text" inputmode="url" placeholder="Compare with a competitor's URL (optional)" class="mt-3 w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />

                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input id="ttseo-name" type="text" placeholder="Your name (optional)" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />
                        <?php // 'required' dropped 27 Aug 2026 while the tool is being tested — see the note in toctoc_seo_check_handler(). ?>
                        <input id="ttseo-email" type="email" placeholder="Your email (optional)" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3.5 text-slate-900 outline-none focus:border-sky-deep focus:bg-white transition-colors" />
                    </div>
                    <?php
                    /*
                     * Said out loud, under the field, rather than crammed into a
                     * placeholder — the long version was cut off mid-sentence at
                     * "we'll send", which reads like a bug and tells nobody what
                     * they lose by skipping it. Scores appear on screen either
                     * way; the emailed report is the part that walks away.
                     */
                    ?>
                    <p class="mt-3 flex items-start gap-2 text-sm text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0 text-sky-deep" aria-hidden="true"><path d="M4 4h16v16H4z"/><path d="m4 7 8 6 8-6"/></svg>
                        <span>Your scores appear on screen either way. <strong class="text-slate-900">Add your email and we also send the full written report</strong> &mdash; every issue, why it matters and how to fix it. Without one, nothing is sent.</span>
                    </p>

                    <label class="mt-4 flex items-center gap-2 text-sm text-slate-600 cursor-pointer select-none">
                        <input id="ttseo-crawl-toggle" type="checkbox" class="w-4 h-4 rounded border-slate-300 accent-sky-deep">
                        Scan the whole website (up to 20 pages)
                    </label>
                    <label class="mt-2 flex items-center gap-2 text-sm text-slate-600 cursor-pointer select-none">
                        <input id="ttseo-monitor-toggle" type="checkbox" class="w-4 h-4 rounded border-slate-300 accent-sky-deep">
                        Watch my site weekly &amp; email me if my score drops (free)
                    </label>

                    <?php /* Cebo: invisible y fuera del arbol de accesibilidad, con
                             autocomplete apagado para que el navegador no lo rellene. */ ?>
                    <div aria-hidden="true" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden">
                        <label for="website_extra">Do not fill this in</label>
                        <input type="text" id="website_extra" name="website_extra" tabindex="-1" autocomplete="off" value="">
                    </div>

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
                <div class="ttseo-noprint shrink-0 flex flex-wrap items-center gap-2">
                    <button id="ttseo-pdf" type="button" class="inline-flex items-center gap-2 rounded-full bg-slate-950 text-white px-5 py-2.5 text-sm font-bold hover:bg-slate-800 transition-colors">
                        Download PDF
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                    </button>
                    <button id="ttseo-json" type="button" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white text-slate-700 px-4 py-2.5 text-sm font-bold hover:border-slate-300 hover:text-slate-900 transition-colors">
                        JSON
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                    </button>
                    <button id="ttseo-md" type="button" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white text-slate-700 px-4 py-2.5 text-sm font-bold hover:border-slate-300 hover:text-slate-900 transition-colors">
                        Markdown
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                    </button>
                </div>
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

            <!--
                The entity graph.

                Sits right after the GEO panel because it answers the same
                question one level deeper: the panel says whether an AI can read
                the page, this says what it would actually learn — which things
                the site claims exist, and whether they are joined up or just a
                pile of unrelated blocks.
            -->
            <div id="graph-card" class="hidden rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 mb-8">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-display text-slate-900">What an AI sees</h2>
                        <p class="text-sm text-slate-500 mt-2 max-w-2xl">Every entity your page declares, and how they connect. Grey boxes are entities this page points at but declares elsewhere &mdash; on another page, or on another site. That is how identity is built across the web.</p>
                    </div>
                    <button type="button" id="graph-png" class="ttseo-noprint shrink-0 rounded-full border border-slate-200 px-5 py-2 text-sm font-bold text-slate-700 transition-colors hover:border-sky-deep hover:text-sky-deep">Download image</button>
                </div>

                <div id="graph-stats" class="mt-6 flex flex-wrap gap-2"></div>

                <div id="graph-canvas" class="mt-6 overflow-x-auto rounded-2xl border border-slate-100 bg-slate-50/60"></div>

                <div class="mt-4 flex flex-wrap items-center gap-x-5 gap-y-2 text-xs text-slate-500">
                    <span class="inline-flex items-center gap-2"><span class="inline-block w-3 h-3 rounded-sm" style="background:#16a34a"></span> Complete</span>
                    <span class="inline-flex items-center gap-2"><span class="inline-block w-3 h-3 rounded-sm" style="background:#d97706"></span> Missing recommended</span>
                    <span class="inline-flex items-center gap-2"><span class="inline-block w-3 h-3 rounded-sm" style="background:#dc2626"></span> Missing required</span>
                    <span class="inline-flex items-center gap-2"><span class="inline-block w-3 h-3 rounded-sm" style="background:#94a3b8"></span> Defined on another page or site</span>
                    <span class="inline-flex items-center gap-2"><span class="inline-block w-3 h-3 rounded-sm" style="background:#dc2626"></span> Broken reference</span>
                </div>

                <div id="graph-panel" class="mt-6 rounded-2xl bg-slate-950 text-slate-100 p-6 text-sm leading-relaxed"></div>
            </div>

            <!--
                Draft llms.txt.

                Sits after the GEO panel on purpose: by this point the reader has
                seen whether their site is readable at all, which is the thing
                that decides whether this file is worth publishing. Handing over
                the draft first — the way the standalone generators do — gets it
                pasted onto sites nothing can read yet.
            -->
            <div id="llms-card" class="hidden rounded-[2rem] bg-white border border-slate-100 shadow-soft p-8 mb-8">
                <div class="flex flex-wrap items-start justify-between gap-4 mb-2">
                    <div>
                        <h2 class="text-2xl font-display text-slate-900">Your draft <code class="text-xl">llms.txt</code></h2>
                        <p class="text-sm text-slate-500 mt-2 max-w-2xl">Built from your own page and sitemap. It is a <strong>draft</strong>: every <code>TODO</code> below is a fact only you know. Fill them in before publishing, then upload it to the root of your site.</p>
                    </div>
                    <div class="ttseo-noprint flex gap-2 shrink-0">
                        <button type="button" id="llms-copy" class="rounded-full border border-slate-200 px-5 py-2 text-sm font-bold text-slate-700 transition-colors hover:border-sky-deep hover:text-sky-deep">Copy</button>
                        <button type="button" id="llms-dl" class="rounded-full bg-slate-950 text-white px-5 py-2 text-sm font-bold transition-transform hover:scale-105">Download</button>
                    </div>
                </div>
                <pre id="llms-body" class="mt-5 max-h-96 overflow-auto rounded-2xl bg-slate-950 text-slate-100 p-6 text-[13px] leading-relaxed whitespace-pre-wrap break-words"></pre>
                <p class="mt-4 text-xs text-slate-400">Worth knowing: <code>llms.txt</code> is a proposed convention, and no major AI company has publicly committed to reading it. It costs an afternoon and it cannot slow your site down &mdash; but do the readable-content and structured-data work first. <a href="<?php echo esc_url( home_url( '/2026/08/26/llms-txt-cayman-islands/' ) ); ?>" class="font-bold text-sky-deep decoration-none hover:underline">The honest version, at length &rarr;</a></p>
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
                <div id="ttseo-crawl-tools" class="ttseo-noprint hidden shrink-0 flex flex-wrap items-center gap-2">
                    <button id="ttseo-crawl-pdf" type="button" class="inline-flex items-center gap-2 rounded-full bg-slate-950 text-white px-5 py-2.5 text-sm font-bold hover:bg-slate-800 transition-colors">
                        Download PDF
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                    </button>
                    <button id="ttseo-crawl-json" type="button" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white text-slate-700 px-4 py-2.5 text-sm font-bold hover:border-slate-300 hover:text-slate-900 transition-colors">
                        JSON
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                    </button>
                    <button id="ttseo-crawl-md" type="button" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white text-slate-700 px-4 py-2.5 text-sm font-bold hover:border-slate-300 hover:text-slate-900 transition-colors">
                        Markdown
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5"/><path d="M12 15V3"/></svg>
                    </button>
                </div>
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

    <!-- FAQ — always visible, unlike the result sections above, which stay
         hidden until a scan runs. Read near-verbatim by AI answer engines. -->
    <section id="faq" class="ttseo-noprint py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">FAQ</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">About this <em class="italic text-sky-deep font-display">checker</em></h2>
            </div>
            <div class="max-w-4xl space-y-4">
                <?php foreach ( $ttseo_faqs as $faq ) : ?>
                <details class="group rounded-[1.75rem] border border-slate-100 bg-slate-50 p-7 shadow-soft transition-all open:bg-white">
                    <summary class="flex cursor-pointer items-center justify-between gap-4 text-xl md:text-2xl font-display text-slate-900 list-none [&amp;::-webkit-details-marker]:hidden">
                        <span><?php echo esc_html( $faq['q'] ); ?></span>
                        <span class="shrink-0 inline-flex items-center justify-center w-9 h-9 rounded-full bg-sky-pale text-sky-deep transition-transform group-open:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                        </span>
                    </summary>
                    <div class="mt-5 space-y-5 text-base md:text-lg leading-relaxed text-slate-600"><?php echo wp_kses_post( $faq['a'] ); ?></div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php ob_start(); ?>
<?php
echo wp_json_encode(
    array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        '@id'        => 'https://toctoc.ky/seo-checker/#faq',
        'isPartOf'   => array( '@id' => 'https://toctoc.ky/seo-checker/#app' ),
        'mainEntity' => array_map(
            function ( $f ) {
                // Google requires the marked-up answer to match the visible
                // text, so it is stripped from the same string the page renders
                // rather than written out a second time.
                return array(
                    '@type'          => 'Question',
                    'name'           => wp_strip_all_tags( $f['q'] ),
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text'  => trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( $f['a'] ) ) ),
                    ),
                );
            },
            $ttseo_faqs
        ),
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
<?php toctoc_schema_add_raw( ob_get_clean() ); ?>

<script>
var TTSEO_LOADED = Date.now();
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
                    (r.items && r.items.length
                        ? '<ul class="mt-3 space-y-1 text-xs text-slate-500 list-disc pl-5">' + r.items.map(function (it) { return '<li>' + esc(it) + '</li>'; }).join('') + '</ul>'
                        : '') +
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
        document.getElementById('ttseo-crawl-tools').classList.add('hidden');
        document.getElementById('crawl-print-target').textContent = url;
        // Measure the entered URL's speed in parallel with the crawl.
        var spd = document.getElementById('crawl-speed');
        spd.classList.remove('hidden');
        spd.innerHTML = '<span class="inline-flex items-center gap-2 text-slate-500"><span class="inline-block w-4 h-4 border-2 border-slate-200 border-t-sky-deep rounded-full animate-spin"></span> Measuring speed with Google PageSpeed&hellip;</span>';
        runPSI(url, 1, { score: null, body: 'crawl-speed' });
        sec.scrollIntoView({ behavior: 'smooth' });

        var params = { action: 'toctoc_seo_discover', nonce: TTSEO.nonce, url: url, email: email, name: name };
        if (tsToken) params.ts_token = tsToken;
        params.website_extra = (document.getElementById('website_extra') || {}).value || '';
        params.ttseo_t = Date.now() - TTSEO_LOADED;
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
                // Only offer the downloads once every page has actually been scanned.
                if (counted) document.getElementById('ttseo-crawl-tools').classList.remove('hidden');
                if (counted) {
                    renderSitewide(pages);
                    checkBrokenLinks(linkMap, pages);
                    recordCrawlHistory(siteUrl, email, Math.round(seoSum / counted), Math.round(geoSum / counted));
                    // Held for the crawl JSON / Markdown export buttons.
                    window.__ttseoCrawl = {
                        site: siteUrl,
                        generated: new Date().toISOString(),
                        avgSeo: Math.round(seoSum / counted),
                        avgGeo: Math.round(geoSum / counted),
                        pages: pages
                    };
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
                    pages.push({ url: d.url, title: d.title || '', desc: d.desc || '', h1: (d.h1 | 0), phones: d.phones || [], seo: d.seo, geo: d.geo, issues: d.issues || [] });
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
                            (r.items && r.items.length
                                ? '<ul class="mt-2 space-y-1 text-xs text-slate-500 list-disc pl-5">' + r.items.map(function (it) { return '<li>' + esc(it) + '</li>'; }).join('') + '</ul>'
                                : '') +
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

    /*
     * The entity graph, drawn as inline SVG.
     *
     * No charting library on purpose. This tool measures how fast the visitor's
     * page loads; shipping 150 KB of JavaScript to draw twenty rectangles would
     * contradict its own advice. Everything below is string concatenation and
     * one breadth-first pass.
     *
     * The layout is deliberately deterministic — columns by distance from the
     * busiest node — rather than a force simulation. A force layout looks
     * livelier and puts the same graph somewhere different every run, which is
     * useless when the picture is meant to be compared and shared.
     */
    var TTG = { g: null, pos: [], sel: -1 };

    var TTG_NW = 176, TTG_NH = 54, TTG_GAPX = 232, TTG_GAPY = 74;

    function ttgColor(state) {
        if (state === 'ok') { return '#16a34a'; }
        if (state === 'warn') { return '#d97706'; }
        if (state === 'gap' || state === 'broken') { return '#dc2626'; }
        return '#94a3b8';
    }

    function ttgClip(s, n) {
        s = String(s || '');
        return s.length > n ? s.slice(0, n - 1) + '…' : s;
    }

    /**
     * Place every node in a column by its distance from the hub.
     *
     * The hub is the most connected node, which on a healthy site is the
     * Organization or the WebSite — the thing everything else hangs off. When
     * nothing is connected to anything, every node lands in its own column and
     * the picture says exactly that.
     */
    function ttgLayout(g) {
        var n = g.nodes.length, adj = {}, i;
        g.edges.forEach(function (e) {
            (adj[e.f] = adj[e.f] || []).push(e.t);
            (adj[e.t] = adj[e.t] || []).push(e.f);
        });

        var hub = 0, best = -1;
        for (i = 0; i < n; i++) {
            var score = ((adj[i] || []).length * 1000) + (g.nodes[i].props || 0);
            if (score > best) { best = score; hub = i; }
        }

        var depth = [], q = [hub];
        depth[hub] = 0;
        while (q.length) {
            var cur = q.shift();
            (adj[cur] || []).forEach(function (nx) {
                if (depth[nx] === undefined) { depth[nx] = depth[cur] + 1; q.push(nx); }
            });
        }
        var maxd = 0;
        for (i = 0; i < n; i++) { if (depth[i] !== undefined && depth[i] > maxd) { maxd = depth[i]; } }
        for (i = 0; i < n; i++) { if (depth[i] === undefined) { depth[i] = maxd + 1; } }

        var cols = {};
        for (i = 0; i < n; i++) { (cols[depth[i]] = cols[depth[i]] || []).push(i); }
        var keys = Object.keys(cols).map(Number).sort(function (a, b) { return a - b; });

        /*
         * A column taller than six boxes makes a thin stack that all the edges
         * have to cross. Past that it is split into side-by-side sub-columns,
         * which costs width — and width is the one thing a scrollable strip has
         * plenty of.
         */
        var columns = [];
        keys.forEach(function (k) {
            var list = cols[k];
            if (list.length <= 6) { columns.push(list); return; }
            var parts = Math.ceil(list.length / 6), per = Math.ceil(list.length / parts);
            for (var a = 0; a < list.length; a += per) { columns.push(list.slice(a, a + per)); }
        });

        var tallest = 0;
        columns.forEach(function (c) { tallest = Math.max(tallest, c.length); });

        var H = Math.max(230, tallest * TTG_GAPY + 70);
        var W = 40 + columns.length * TTG_GAPX;
        var pos = [];
        columns.forEach(function (list, ci) {
            var colH = list.length * TTG_GAPY;
            list.forEach(function (idx, ri) {
                pos[idx] = { x: 24 + ci * TTG_GAPX, y: (H - colH) / 2 + ri * TTG_GAPY };
            });
        });
        return { pos: pos, w: W, h: H };
    }

    /** Point on a cubic bezier at t, for placing a label along the curve. */
    function ttgAt(x1, y1, c1, d1, c2, d2, x2, y2, t) {
        var u = 1 - t;
        return {
            x: u * u * u * x1 + 3 * u * u * t * c1 + 3 * u * t * t * c2 + t * t * t * x2,
            y: u * u * u * y1 + 3 * u * u * t * d1 + 3 * u * t * t * d2 + t * t * t * y2
        };
    }

    function ttgSvg(g, lay, sel) {
        var pos = lay.pos, s = '';
        var labelEdges = g.edges.length <= 12;
        var seen = {}, rank = {};

        s += '<svg id="ttg-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' + lay.w + ' ' + lay.h + '" width="' + lay.w + '" height="' + lay.h + '" font-family="ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, sans-serif">';
        s += '<rect width="' + lay.w + '" height="' + lay.h + '" fill="#f8fafc"/>';
        s += '<defs><marker id="ttg-a" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="7" markerHeight="7" orient="auto-start-reverse"><path d="M0 0 10 5 0 10z" fill="#94a3b8"/></marker>';
        s += '<marker id="ttg-ar" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="7" markerHeight="7" orient="auto-start-reverse"><path d="M0 0 10 5 0 10z" fill="#dc2626"/></marker></defs>';

        g.edges.forEach(function (e) {
            var a = pos[e.f], b = pos[e.t];
            if (!a || !b) { return; }
            var x1 = a.x + TTG_NW, y1 = a.y + TTG_NH / 2, x2 = b.x, y2 = b.y + TTG_NH / 2;
            if (b.x < a.x) { x1 = a.x; x2 = b.x + TTG_NW; }
            var on = (sel === e.f || sel === e.t);
            var roto = (e.k === 'broken');
            var col = roto ? '#dc2626' : (on ? '#0369a1' : '#cbd5e1');
            var dx = Math.max(40, Math.abs(x2 - x1) / 2);
            var c1 = x1 + dx, c2 = x2 - dx;
            s += '<path d="M' + x1 + ' ' + y1 + ' C' + c1 + ' ' + y1 + ',' + c2 + ' ' + y2 + ',' + x2 + ' ' + y2 + '"'
              + ' fill="none" stroke="' + col + '" stroke-width="' + (on ? 2.2 : 1.4) + '"'
              + (e.d ? ' stroke-dasharray="5 4"' : '') + ' marker-end="url(#' + (roto ? 'ttg-ar' : 'ttg-a') + ')"/>';

            /*
             * One label per property per source. Three employee edges leaving
             * the same box do not need the word three times, and the copies
             * land on top of each other anyway.
             */
            var clave = e.f + '|' + e.p;
            rank[e.f] = (rank[e.f] || 0) + 1;
            if ((labelEdges || on) && !seen[clave]) {
                seen[clave] = 1;
                // Staggered along the curve so fans out of one node do not
                // stack every label in the same vertical strip.
                var t = 0.38 + 0.14 * ((rank[e.f] - 1) % 3);
                var p = ttgAt(x1, y1, c1, y1, c2, y2, x2, y2, t);
                s += '<text x="' + p.x.toFixed(1) + '" y="' + (p.y - 5).toFixed(1) + '" text-anchor="middle" font-size="10" fill="' + (roto ? '#dc2626' : '#64748b') + '"'
                  + ' stroke="#f8fafc" stroke-width="3.5" paint-order="stroke">' + esc(e.p) + '</text>';
            }
        });

        g.nodes.forEach(function (nd, i) {
            var p = pos[i];
            if (!p) { return; }
            var c = ttgColor(nd.state), on = (sel === i);
            var type = ttgClip(nd.types.join(', '), 24);
            var name = nd.label ? ttgClip(nd.label, 26) : (nd.id ? ttgClip(nd.id.replace(/^https?:\/\//, ''), 26) : 'no name');
            // For a reference, the host is the useful second line: the first
            // already carries the fragment that identifies the entity.
            if (nd.kind && nd.host) { type = ttgClip(nd.host, 24); }
            s += '<g class="ttg-node" data-i="' + i + '" style="cursor:pointer">';
            s += '<rect x="' + p.x + '" y="' + p.y + '" width="' + TTG_NW + '" height="' + TTG_NH + '" rx="12" fill="#ffffff"'
              + ' stroke="' + (on ? '#0f172a' : '#e2e8f0') + '" stroke-width="' + (on ? 2 : 1) + '"'
              + (nd.state === 'ext' ? ' stroke-dasharray="4 3"' : '') + '/>';
            s += '<rect x="' + p.x + '" y="' + (p.y + 10) + '" width="4" height="' + (TTG_NH - 20) + '" rx="2" fill="' + c + '"/>';
            s += '<text x="' + (p.x + 16) + '" y="' + (p.y + 23) + '" font-size="11.5" font-weight="700" fill="#0f172a">' + esc(type) + '</text>';
            s += '<text x="' + (p.x + 16) + '" y="' + (p.y + 40) + '" font-size="11" fill="#64748b">' + esc(name) + '</text>';
            if (nd.orphan && nd.state !== 'ext') {
                s += '<circle cx="' + (p.x + TTG_NW - 12) + '" cy="' + (p.y + 12) + '" r="4" fill="#d97706"><title>Connected to nothing</title></circle>';
            }
            s += '</g>';
        });

        s += '</svg>';
        return s;
    }

    function ttgPill(label, value, tone) {
        var bg = tone === 'bad' ? '#fef2f2' : tone === 'warn' ? '#fffbeb' : '#f1f5f9';
        var fg = tone === 'bad' ? '#dc2626' : tone === 'warn' ? '#b45309' : '#334155';
        return '<span class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-xs font-bold" style="background:' + bg + ';color:' + fg + '">'
            + '<span style="font-variant-numeric:tabular-nums">' + esc(String(value)) + '</span> ' + esc(label) + '</span>';
    }

    /**
     * The detail panel.
     *
     * Deliberately phrased as consequences rather than property names. "Missing
     * address" is a schema fact; "an AI cannot say where you are" is the reason
     * anyone should care, and it is the same sentence the report uses.
     */
    function ttgPanel(i) {
        var el = document.getElementById('graph-panel');
        var g = TTG.g;
        if (!el || !g) { return; }

        if (i < 0 || !g.nodes[i]) {
            el.innerHTML = '<p class="text-slate-400">Click any box to see what it declares &mdash; and what it is missing.</p>';
            return;
        }
        var nd = g.nodes[i];
        var ins = g.edges.filter(function (e) { return e.t === i; });
        var outs = g.edges.filter(function (e) { return e.f === i; });

        var h = '<p class="text-xs font-bold uppercase tracking-widest" style="color:' + ttgColor(nd.state) + '">' + esc(nd.types.join(' + ')) + '</p>';
        h += '<p class="mt-1 text-lg font-bold">' + esc(nd.label || '(no name)') + '</p>';
        h += '<p class="mt-1 text-xs break-all" style="color:#94a3b8">' + (nd.id ? esc(nd.id) : 'No @id &mdash; nothing on any page can point at this entity') + '</p>';

        if (nd.kind === 'site') {
            h += '<p class="mt-4 text-slate-300">Declared on another page of this site, and referenced here by <code>@id</code>. That is the right way round: an entity should be defined once and pointed at everywhere else.</p>';
        } else if (nd.kind === 'external') {
            h += '<p class="mt-4 text-slate-300">An entity on another site. Pointing at it by <code>@id</code> is how a search engine or an AI ties this business to the same thing described elsewhere &mdash; a directory, a profile, a chamber of commerce.</p>';
        } else if (nd.kind === 'broken') {
            h += '<p class="mt-4" style="color:#f87171">This reference has no domain, only a fragment. It resolves against whichever page happens to read it, which means it resolves to nothing dependable. Write it as a full URL.</p>';
        } else {
            if (nd.req && nd.req.length) {
                h += '<p class="mt-4"><span class="font-bold" style="color:#f87171">Required, missing:</span> ' + esc(nd.req.join(', ')) + '</p>';
            }
            if (nd.rec && nd.rec.length) {
                h += '<p class="mt-2"><span class="font-bold" style="color:#fbbf24">Recommended, missing:</span> ' + esc(nd.rec.join(', ')) + '</p>';
            }
            if (!(nd.req && nd.req.length) && !(nd.rec && nd.rec.length)) {
                h += '<p class="mt-4"><span class="font-bold" style="color:#4ade80">Complete.</span> Every property Google and the AI engines look for on this type is present.</p>';
            }
            h += '<p class="mt-2 text-slate-400">' + esc(String(nd.props)) + ' properties declared'
              + (nd.sameAs ? ' &middot; ' + esc(String(nd.sameAs)) + ' sameAs link' + (nd.sameAs === 1 ? '' : 's') : ' &middot; no sameAs links')
              + '</p>';
        }

        if (outs.length) {
            h += '<p class="mt-4 text-slate-300"><span class="font-bold">Points at:</span> ' + outs.map(function (e) {
                var t = g.nodes[e.t];
                return esc(e.p) + ' &rarr; ' + esc(t.label || t.types.join(', ')) + (e.d ? ' <span style="color:#f87171">(not defined here)</span>' : '');
            }).join(' &middot; ') + '</p>';
        }
        if (ins.length) {
            h += '<p class="mt-2 text-slate-300"><span class="font-bold">Pointed at by:</span> ' + ins.map(function (e) {
                var f = g.nodes[e.f];
                return esc(f.label || f.types.join(', ')) + ' (' + esc(e.p) + ')';
            }).join(' &middot; ') + '</p>';
        }
        if (!ins.length && !outs.length && nd.state !== 'ext') {
            h += '<p class="mt-4" style="color:#fbbf24">Connected to nothing. It is valid markup, but it floats: nothing else on the page says how this relates to the business.</p>';
        }

        el.innerHTML = h;
    }

    function ttgDraw() {
        var box = document.getElementById('graph-canvas');
        if (!box || !TTG.g) { return; }
        var lay = ttgLayout(TTG.g);
        TTG.pos = lay.pos;
        box.innerHTML = ttgSvg(TTG.g, lay, TTG.sel);
        Array.prototype.forEach.call(box.querySelectorAll('.ttg-node'), function (el) {
            el.addEventListener('click', function () {
                var i = parseInt(el.getAttribute('data-i'), 10);
                TTG.sel = (TTG.sel === i) ? -1 : i;
                ttgDraw();
                ttgPanel(TTG.sel);
            });
        });
    }

    /**
     * Export the drawing as a PNG.
     *
     * Rasterised through a canvas rather than handed over as an .svg file: the
     * point is an image somebody can paste into an email to a client, and half
     * the places they would paste it do not render SVG.
     */
    function ttgPng(domain) {
        var svg = document.getElementById('ttg-svg');
        if (!svg) { return; }
        var lay = ttgLayout(TTG.g);
        var pad = 24, foot = 46, scale = 2;
        var w = lay.w + pad * 2, h = lay.h + pad * 2 + foot;

        var raw = new XMLSerializer().serializeToString(svg);
        var img = new Image();
        img.onload = function () {
            var cv = document.createElement('canvas');
            cv.width = w * scale; cv.height = h * scale;
            var cx = cv.getContext('2d');
            cx.scale(scale, scale);
            cx.fillStyle = '#ffffff'; cx.fillRect(0, 0, w, h);
            cx.drawImage(img, pad, pad, lay.w, lay.h);
            cx.fillStyle = '#94a3b8';
            cx.font = '12px ui-sans-serif, system-ui, Segoe UI, sans-serif';
            cx.fillText('Structured data on ' + domain, pad, h - 18);
            cx.textAlign = 'right';
            cx.fillStyle = '#0f172a';
            cx.fillText('toctoc.ky/seo-checker', w - pad, h - 18);
            var a = document.createElement('a');
            a.href = cv.toDataURL('image/png');
            a.download = 'entity-graph-' + domain.replace(/[^a-z0-9.-]/gi, '-') + '.png';
            a.click();
        };
        img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(raw)));
    }

    function renderGraph(d) {
        var card = document.getElementById('graph-card');
        if (!card) { return; }
        var g = d && d.graph;
        if (!g || !g.nodes) { card.classList.add('hidden'); return; }

        TTG.g = g; TTG.sel = -1;
        card.classList.remove('hidden');

        var st = g.stats || {};
        var stats = document.getElementById('graph-stats');

        // No entities at all is the loudest possible finding, so it gets the
        // whole panel instead of an empty frame with a zero next to it.
        if (!st.entities) {
            stats.innerHTML = '';
            document.getElementById('graph-canvas').innerHTML =
                '<div class="p-10 text-center"><p class="text-lg font-bold text-slate-900">Nothing to draw.</p>'
                + '<p class="mt-2 text-sm text-slate-500 max-w-md mx-auto">This page declares no structured data, so an AI engine has to guess what the business is, where it is, and whether it is the same company it saw somewhere else. Usually it guesses wrong, or skips you.</p></div>';
            ttgPanel(-1);
            return;
        }

        stats.innerHTML = ttgPill(st.entities === 1 ? 'entity declared here' : 'entities declared here', st.entities, 'ok')
            + (st.offpage ? ttgPill(st.offpage === 1 ? 'link to the rest of the site' : 'links to the rest of the site', st.offpage, 'ok') : '')
            + (st.offsite ? ttgPill(st.offsite === 1 ? 'link to another site' : 'links to other sites', st.offsite, 'ok') : '')
            + (st.broken ? ttgPill(st.broken === 1 ? 'broken reference' : 'broken references', st.broken, 'bad') : '')
            + (st.orphans ? ttgPill(st.orphans === 1 ? 'entity connected to nothing' : 'entities connected to nothing', st.orphans, 'warn') : '')
            + (st.noid ? ttgPill(st.noid === 1 ? 'entity without @id' : 'entities without @id', st.noid, 'warn') : '');

        ttgDraw();
        ttgPanel(-1);

        var btn = document.getElementById('graph-png');
        if (btn) {
            btn.onclick = function () {
                var host = '';
                try { host = new URL(d.url).hostname; } catch (e) { host = 'site'; }
                ttgPng(host);
            };
        }
    }
    /**
     * Draft llms.txt panel. Hidden entirely when the server sent nothing, so a
     * failed sitemap read never leaves an empty box on the report.
     */
    function renderLlms(d) {
        var card = document.getElementById('llms-card');
        if (!card) { return; }
        var txt = (d && d.llms) ? String(d.llms) : '';
        if (!txt.trim()) { card.classList.add('hidden'); return; }

        document.getElementById('llms-body').textContent = txt;
        card.classList.remove('hidden');

        var copy = document.getElementById('llms-copy');
        copy.onclick = function () {
            // Copy and download are the only proof that the draft was worth
            // generating. Without them we would be guessing whether anyone uses it.
            ttTrack('llms_draft_copy', { checker_url: d.url });
            var done = function () {
                copy.textContent = 'Copied';
                setTimeout(function () { copy.textContent = 'Copy'; }, 1800);
            };
            // navigator.clipboard needs a secure context and can be blocked;
            // the textarea fallback keeps the button working either way.
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(txt).then(done, fallback);
            } else {
                fallback();
            }
            function fallback() {
                var ta = document.createElement('textarea');
                ta.value = txt;
                ta.setAttribute('readonly', '');
                ta.style.position = 'fixed';
                ta.style.opacity = '0';
                document.body.appendChild(ta);
                ta.select();
                try { document.execCommand('copy'); done(); } catch (e) {}
                document.body.removeChild(ta);
            }
        };

        document.getElementById('llms-dl').onclick = function () {
            ttTrack('llms_draft_download', { checker_url: d.url });
            var blob = new Blob([txt], { type: 'text/plain;charset=utf-8' });
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'llms.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            setTimeout(function () { URL.revokeObjectURL(a.href); }, 1000);
        };
    }

    /**
     * Push an event to GTM's dataLayer.
     *
     * GA4's enhanced measurement fires form_start on its own the moment someone
     * touches a field, but it never sees the submit: this form does not reload
     * the page, it posts over AJAX. That left 12 form_starts in the week of
     * 24 Aug 2026 with nothing recording whether a single one finished — blind
     * at the one step of the funnel that matters.
     *
     * Guarded so a blocked or not-yet-loaded GTM can never break the tool: the
     * audit must keep working for someone running an ad blocker.
     */
    function ttTrack(name, params) {
        try {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push(Object.assign({ event: name }, params || {}));
        } catch (e) {}
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

    // ---- JSON / Markdown export of the single-page report -------------------
    // Serializes the report already held in window.__ttseoReport — no extra
    // request. JSON is the full machine-readable payload; Markdown is a clean,
    // shareable text version (dev-friendly, like SEO Ghost's report formats).
    function ttseoHostSlug(u) {
        try { return new URL(u).hostname.replace(/^www\./, '') || 'report'; }
        catch (e) { return 'report'; }
    }
    function ttseoDownload(filename, text, mime) {
        var blob = new Blob([text], { type: mime + ';charset=utf-8' });
        var a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        setTimeout(function () { URL.revokeObjectURL(a.href); a.remove(); }, 200);
    }
    function ttseoStatusMark(s) {
        return s === 'pass' ? '✅' : (s === 'warn' ? '🟡' : (s === 'fail' ? '🔴' : 'ℹ️'));
    }
    function ttseoReport() { return window.__ttseoReport || null; }
    function ttseoExportJSON() {
        var d = ttseoReport();
        if (!d) { return; }
        var payload = {
            tool: 'TocToc Marketing — Free SEO / GEO / AEO Checker',
            source: 'https://toctoc.ky/seo-checker/',
            generated: new Date().toISOString(),
            url: d.url,
            scores: d.scores,
            meta: d.meta,
            seo: d.seo,
            geo: d.geo,
            competitor: d.competitor || null
        };
        ttseoDownload('seo-report-' + ttseoHostSlug(d.url) + '.json', JSON.stringify(payload, null, 2), 'application/json');
    }
    function ttseoExportMarkdown() {
        var d = ttseoReport();
        if (!d) { return; }
        function rowsMD(rows) {
            return (rows || []).map(function (r) {
                var line = '- ' + ttseoStatusMark(r.status) + ' **' + r.label + '** — ' + (r.detail || '');
                if (r.items && r.items.length) {
                    line += '\n' + r.items.map(function (it) { return '  - ' + it; }).join('\n');
                }
                if (r.fix) { line += '\n  - _Fix:_ ' + r.fix; }
                return line;
            }).join('\n');
        }
        var host = ttseoHostSlug(d.url);
        var md = '# SEO / GEO Report — ' + host + '\n\n';
        md += '**URL:** ' + d.url + '  \n';
        md += '**Generated:** ' + new Date().toLocaleString() + '  \n';
        md += '**SEO score:** ' + d.scores.seo + '/100  \n';
        md += '**AI visibility (GEO / AEO):** ' + d.scores.geo + '/100  \n';
        if (d.competitor && d.competitor.scores) {
            md += '**Competitor (' + (d.competitor.host || d.competitor.url) + '):** SEO ' + d.competitor.scores.seo + ' · GEO ' + d.competitor.scores.geo + '  \n';
        }
        md += '\n## On-page SEO\n' + rowsMD(d.seo) + '\n\n';
        md += '## AI visibility (GEO / AEO)\n' + rowsMD(d.geo) + '\n\n';
        md += '---\nGenerated by TocToc Marketing — https://toctoc.ky/seo-checker/\n';
        ttseoDownload('seo-report-' + host + '.md', md, 'text/markdown');
    }
    var jsonBtn = document.getElementById('ttseo-json');
    if (jsonBtn) { jsonBtn.addEventListener('click', ttseoExportJSON); }
    var mdBtn = document.getElementById('ttseo-md');
    if (mdBtn) { mdBtn.addEventListener('click', ttseoExportMarkdown); }

    // ---- JSON / Markdown export of the full-site (crawl) scan ---------------
    function ttseoCrawlPath(u) { return (u || '').replace(/^https?:\/\/[^\/]+/, '') || '/'; }
    function ttseoCrawlIssues(p) {
        return (p.issues || []).filter(function (r) { return r.status === 'fail' || r.status === 'warn'; });
    }
    function ttseoCrawlExportJSON() {
        var C = window.__ttseoCrawl;
        if (!C) { return; }
        var payload = {
            tool: 'TocToc Marketing — Free SEO / GEO / AEO Checker (full-site scan)',
            source: 'https://toctoc.ky/seo-checker/',
            generated: C.generated,
            site: C.site,
            pages_scanned: C.pages.length,
            averages: { seo: C.avgSeo, geo: C.avgGeo },
            pages: C.pages.map(function (p) {
                return { url: p.url, seo: p.seo, geo: p.geo, title: p.title, description: p.desc, h1: p.h1, issues: p.issues || [] };
            })
        };
        ttseoDownload('seo-sitescan-' + ttseoHostSlug(C.site) + '.json', JSON.stringify(payload, null, 2), 'application/json');
    }
    function ttseoCrawlExportMarkdown() {
        var C = window.__ttseoCrawl;
        if (!C) { return; }
        var host = ttseoHostSlug(C.site);
        var md = '# Full-site SEO / GEO Report — ' + host + '\n\n';
        md += '**Site:** ' + C.site + '  \n';
        md += '**Generated:** ' + new Date(C.generated).toLocaleString() + '  \n';
        md += '**Pages scanned:** ' + C.pages.length + '  \n';
        md += '**Average SEO:** ' + C.avgSeo + '/100  \n';
        md += '**Average AI visibility (GEO / AEO):** ' + C.avgGeo + '/100  \n\n';
        md += '| Page | SEO | GEO | Issues |\n|---|---|---|---|\n';
        C.pages.forEach(function (p) {
            md += '| ' + ttseoCrawlPath(p.url) + ' | ' + p.seo + ' | ' + p.geo + ' | ' + ttseoCrawlIssues(p).length + ' |\n';
        });
        md += '\n';
        C.pages.forEach(function (p) {
            var issues = ttseoCrawlIssues(p);
            if (!issues.length) { return; }
            md += '## ' + p.url + '\n';
            md += 'SEO ' + p.seo + ' · GEO ' + p.geo + '\n\n';
            issues.forEach(function (r) {
                md += '- ' + ttseoStatusMark(r.status) + ' **' + r.label + '** — ' + (r.detail || '');
                if (r.items && r.items.length) { md += '\n' + r.items.map(function (it) { return '  - ' + it; }).join('\n'); }
                var fix = (explainOf(r) || {}).fix;
                if (fix) { md += '\n  - _Fix:_ ' + fix; }
                md += '\n';
            });
            md += '\n';
        });
        md += '---\nGenerated by TocToc Marketing — https://toctoc.ky/seo-checker/\n';
        ttseoDownload('seo-sitescan-' + host + '.md', md, 'text/markdown');
    }
    var crawlJsonBtn = document.getElementById('ttseo-crawl-json');
    if (crawlJsonBtn) { crawlJsonBtn.addEventListener('click', ttseoCrawlExportJSON); }
    var crawlMdBtn = document.getElementById('ttseo-crawl-md');
    if (crawlMdBtn) { crawlMdBtn.addEventListener('click', ttseoCrawlExportMarkdown); }

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
        // Email optional while testing — the URL is the only thing the audit
        // actually needs. See the note in toctoc_seo_check_handler().
        if (!url) { showError('Please enter a website URL.'); return; }
        // The whole-site crawl is the exception: it runs in the background and
        // delivers by email, so without an address it has nowhere to report to.
        var wantsCrawl = document.getElementById('ttseo-crawl-toggle');
        if (wantsCrawl && wantsCrawl.checked && !email) {
            showError('A whole-site crawl is emailed when it finishes, so it needs an email address.');
            return;
        }
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
        params.website_extra = (document.getElementById('website_extra') || {}).value || '';
        params.ttseo_t = Date.now() - TTSEO_LOADED;
        var body = new URLSearchParams(params);
        fetch(TTSEO.ajax, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
        .then(function (r) { return r.json(); })
        .then(function (json) {
            btn.disabled = false; btn.style.opacity = '1'; lbl.textContent = 'Analyze my website';
            if (window.turnstile) { try { window.turnstile.reset(); } catch (e) {} }
            if (!json || !json.success) {
                // Tracked too: a run that dies here is a lead lost at the last
                // step, and the message says why — bad URL, rate limit, timeout.
                ttTrack('checker_failed', {
                    checker_error: (json && json.data && json.data.message) ? String(json.data.message).slice(0, 100) : 'unknown'
                });
                showError(json && json.data ? json.data.message : 'Could not analyze that URL.');
                return;
            }
            var d = json.data;
            window.__ttseoReport = d; // held for the JSON / Markdown export buttons

            // The conversion. Everything above this line is intent; this is the
            // moment a stranger became a lead with an email attached.
            ttTrack('checker_complete', {
                checker_url: d.url,
                checker_seo: d.scores.seo,
                checker_geo: d.scores.geo,
                checker_has_llms_draft: d.llms ? 'yes' : 'no'
            });

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
            renderGraph(d);
            renderLlms(d);

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
