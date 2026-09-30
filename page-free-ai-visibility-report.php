<?php
/**
 * Template Name: Free AI Visibility Report
 * Template Post Type: page
 *
 * Landing page for the free AI & Google visibility report. First published on
 * 30 Sep 2026 as a stand-alone copy of an external HTML design (its own fonts
 * and teal palette); the same day Andre asked for it in the Toc Toc design
 * instead: Instrument Serif + Inter, the lime accent, the sky hero, rounded
 * cards, the theme footer — and the logo alone in the top bar, with no menu
 * ($GLOBALS['toctoc_landing'], read by header.php). Copy, form, rotating
 * customer questions and FAQ are unchanged.
 *
 * Title, description and Open Graph come from $seo_map in header.php; the FAQ
 * and its FAQPage from toctoc_render_faq(); the Service node joins the page
 * graph through toctoc_schema_add_raw(). The form posts to inc/ai-report.php
 * (email to info@ + GHL contact tagged "ai visibility report"); ?src=… in the
 * URL becomes the lead's source.
 *
 * @package Toc Toc
 */

$GLOBALS['toctoc_landing']     = true;
$GLOBALS['toctoc_landing_cta'] = array( 'Call the Team', 'tel:+13455478120' );
$GLOBALS['toctoc_landing_rating'] = true; // Google rating centred in the bar.

get_header();

$ttr_reviews = function_exists( 'toctoc_google_reviews' ) ? toctoc_google_reviews() : array( 'rating' => '4.8', 'count' => 25 );
$ttr_ts      = get_option( 'toctoc_ts_site', '' ); // Cloudflare Turnstile, same keys as the SEO checker.
$ttr_input   = 'w-full h-12 rounded-xl border border-slate-200 bg-slate-50 px-4 text-base font-normal text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-deep';
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero: question + chat illustration, form card -->
    <section class="relative overflow-hidden">
        <img src="<?php echo esc_url( toctoc_clouds_src() ); ?>" srcset="<?php echo esc_attr( toctoc_clouds_srcset() ); ?>" sizes="100vw" alt="" aria-hidden="true" width="1920" height="1280" fetchpriority="high" decoding="async" class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute inset-0 bg-white/50 z-[1]"></div>
        <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-b from-transparent to-background pointer-events-none z-[2]"></div>

        <div class="relative z-10 mx-auto max-w-6xl px-6 pt-40 md:pt-44 pb-20 grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] gap-10 lg:gap-12 items-start">
            <div class="min-w-0">
                <h1 class="text-[2.6rem] sm:text-6xl lg:text-7xl leading-[0.95] text-slate-950 font-display [text-wrap:balance]">
                    When customers ask ChatGPT or Google who to call, <em class="italic text-sky-deep font-display">does it name you?</em>
                </h1>
                <p class="mt-8 text-lg md:text-xl text-slate-700 leading-relaxed max-w-xl">Get a free report showing what AI tools and Google say about your business today, who they recommend instead, and what to fix first.</p>

                <div class="mt-10 max-w-xl rounded-[2rem] bg-white border border-slate-100 p-5 sm:p-6 md:p-8 shadow-soft" aria-label="Illustration of an AI answer">
                    <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2">A customer asks ChatGPT:</p>
                    <div id="cq" aria-live="off" class="rounded-2xl bg-sky-pale/60 px-5 py-4 font-bold text-slate-900 min-h-[3.2em] transition-opacity duration-300">What's the best restaurant near me for a special dinner?</div>
                    <p class="mt-5 text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2">ChatGPT answers:</p>
                    <ol class="list-decimal pl-6 space-y-1 text-slate-700">
                        <li>A competitor of yours</li>
                        <li>Another competitor</li>
                        <li>A third competitor</li>
                    </ol>
                    <div class="mt-5 flex items-center gap-3 border-t border-dashed border-slate-200 pt-4 font-bold text-slate-900">
                        <span class="w-3 h-3 rounded-full bg-red-500 shrink-0" aria-hidden="true"></span>
                        Your business isn't named, so that customer never calls you.
                    </div>
                    <p class="mt-3 text-xs text-slate-500">Illustration. Your report shows the real answers for your business.</p>
                </div>
            </div>

            <div id="report" class="min-w-0 rounded-[2rem] sm:rounded-[2.5rem] bg-white border border-slate-100 p-6 sm:p-8 md:p-10 shadow-glass lg:sticky lg:top-32 scroll-mt-32">
                <div id="form-view">
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Free &middot; No obligation</span>
                    <h2 class="mt-4 text-4xl font-display text-slate-900 leading-none">Get your <em class="italic text-sky-deep font-display">free report</em></h2>
                    <p class="mt-3 text-sm text-slate-500">Sent to your inbox within one business day.</p>
                    <form id="rf" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" class="mt-6 grid gap-4">
                        <input type="hidden" name="action" value="toctoc_ai_report">
                        <input type="hidden" name="source" id="source" value="direct">
                        <input type="hidden" name="ttseo_t" id="ttseo_t" value="0">
                        <div aria-hidden="true" style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;"><label>Leave this empty <input type="text" name="website_extra" tabindex="-1" autocomplete="off"></label></div>
                        <label class="grid gap-2 text-sm font-bold text-slate-700">Your name
                            <input id="name" name="name" autocomplete="name" required class="<?php echo esc_attr( $ttr_input ); ?>">
                        </label>
                        <label class="grid gap-2 text-sm font-bold text-slate-700">Business name
                            <input id="biz" name="business" autocomplete="organization" required class="<?php echo esc_attr( $ttr_input ); ?>">
                        </label>
                        <label class="grid gap-2 text-sm font-bold text-slate-700"><span>Website <span class="font-normal text-slate-400">(if you have one)</span></span>
                            <input id="web" name="website" inputmode="url" autocomplete="url" placeholder="example.com" class="<?php echo esc_attr( $ttr_input ); ?>">
                        </label>
                        <label class="grid gap-2 text-sm font-bold text-slate-700">Email
                            <input id="mail" name="email" type="email" autocomplete="email" required class="<?php echo esc_attr( $ttr_input ); ?>">
                        </label>
                        <label class="grid gap-2 text-sm font-bold text-slate-700">What do customers look for when they find you?
                            <input id="what" name="service" placeholder="e.g. emergency plumber, family dentist" class="<?php echo esc_attr( $ttr_input ); ?>">
                        </label>
                        <?php if ( $ttr_ts ) : ?>
                        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
                        <div class="cf-turnstile" data-sitekey="<?php echo esc_attr( $ttr_ts ); ?>" data-response-field-name="ts_token"></div>
                        <?php endif; ?>
                        <button type="submit" class="group mt-2 inline-flex items-center justify-between gap-3 rounded-full bg-slate-950 text-white pl-6 sm:pl-8 pr-2 py-2 text-base sm:text-lg font-bold shadow-pill transition-transform hover:scale-[1.02] disabled:opacity-60 disabled:cursor-progress">
                            Send me my free report
                            <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                            </span>
                        </button>
                        <p id="rf-err" role="alert" class="hidden text-sm font-bold text-red-700">That didn't go through. Please try again, or email us at <a href="mailto:info@toctoc.ky" class="underline">info@toctoc.ky</a>.</p>
                        <p id="rf-cap" role="alert" class="hidden text-sm font-bold text-red-700">Please complete the anti-spam check above.</p>
                    </form>
                    <p class="mt-5 text-xs text-slate-500 leading-relaxed">Free, with no obligation. We use your details only to prepare your report and follow up about it. <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="font-bold text-sky-deep decoration-none hover:underline">Privacy policy</a></p>
                </div>
                <div id="thanks" class="hidden" role="status" aria-live="polite">
                    <span class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-accent text-slate-950 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    </span>
                    <h2 class="text-4xl font-display text-slate-900 leading-none">Thanks, you're <em class="italic text-sky-deep font-display">on the list.</em></h2>
                    <p class="mt-4 text-base text-slate-600 leading-relaxed">We'll prepare your report and email it within one business day. Check your spam folder if you don't see it.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- What the report answers -->
    <section class="py-24 md:py-32 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">What you get</span>
                <h2 class="mt-6 text-[2.6rem] sm:text-5xl md:text-7xl font-display text-slate-900 leading-[0.9]">Your report answers <em class="italic text-sky-deep font-display">four questions</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">We ask ChatGPT, Gemini and Google the same questions your customers ask, then show you exactly what came back.</p>
            </div>
            <div class="mt-16 grid grid-cols-1 lg:grid-cols-2 gap-10 items-start [&>*]:min-w-0">
                <ul class="grid sm:grid-cols-2 gap-6">
                    <?php foreach ( array(
                        array( 'Does AI mention my business?', 'Yes or no, for each question we test.' ),
                        array( 'Who does it recommend instead?', 'The businesses that show up in your place.' ),
                        array( 'How do I look on Google?', 'Whether your website and listings are clear and easy to find.' ),
                        array( 'What should I fix first?', 'The three changes that would help most, in plain language.' ),
                    ) as $ttr_q ) : ?>
                    <li class="rounded-[2rem] bg-slate-50 border border-slate-100 p-7">
                        <h3 class="text-2xl font-display text-slate-900 leading-tight"><?php echo esc_html( $ttr_q[0] ); ?></h3>
                        <p class="mt-3 text-sm text-slate-500 leading-relaxed"><?php echo esc_html( $ttr_q[1] ); ?></p>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="rounded-[2rem] sm:rounded-[2.5rem] bg-slate-950 text-white p-6 sm:p-8 md:p-10 shadow-glass overflow-x-auto" aria-label="Example report page">
                    <h3 class="text-3xl font-display">Example page from a report</h3>
                    <p class="mt-2 text-xs text-white/50">Sample data for illustration only.</p>
                    <table class="mt-6 w-full min-w-[420px] text-sm border-collapse">
                        <thead>
                            <tr class="text-left text-[11px] font-bold uppercase tracking-widest text-white/40">
                                <th class="py-3 pr-3 font-bold">Question we tested</th><th class="py-3 px-2 font-bold">ChatGPT</th><th class="py-3 px-2 font-bold">Gemini</th><th class="py-3 pl-2 font-bold">Google</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10 border-t border-white/10">
                            <?php
                            $ttr_no  = '<span class="font-bold text-red-400">%s</span>';
                            $ttr_yes = '<span class="font-bold text-accent">%s</span>';
                            foreach ( array(
                                array( '"Best [service] near me"', array( 0, 'Not named' ), array( 0, 'Not named' ), array( 1, 'Page 1' ) ),
                                array( '"Who to call for [problem]"', array( 0, 'Not named' ), array( 1, 'Named' ), array( 0, 'Page 2' ) ),
                                array( '"[Service] in [your area]"', array( 1, 'Named' ), array( 0, 'Not named' ), array( 1, 'Page 1' ) ),
                            ) as $ttr_row ) : ?>
                            <tr>
                                <td class="py-3 pr-3 text-white/80"><?php echo esc_html( $ttr_row[0] ); ?></td>
                                <?php for ( $ttr_c = 1; $ttr_c <= 3; $ttr_c++ ) : ?>
                                <td class="py-3 px-2"><?php echo sprintf( $ttr_row[ $ttr_c ][0] ? $ttr_yes : $ttr_no, esc_html( $ttr_row[ $ttr_c ][1] ) ); // phpcs:ignore WordPress.Security.EscapingOutput -- fixed markup, escaped value. ?></td>
                                <?php endfor; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="mt-6 rounded-2xl bg-white/5 border border-white/10 px-5 py-4 text-sm text-white/70"><strong class="text-accent">Fix first:</strong> your opening hours differ between your website and Google Maps.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works -->
    <section class="relative py-24 md:py-32">
        <div class="mx-auto max-w-6xl px-6">
            <h2 class="text-[2.6rem] sm:text-5xl md:text-7xl text-slate-900 font-display leading-[0.9]">How it <em class="italic text-sky-deep font-display">works</em></h2>
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-soft">
                <?php foreach ( array(
                    array( 'You send us the form.', 'It takes about a minute.' ),
                    array( 'We ask the questions your customers ask.', 'We test them on AI tools and Google and record what comes back.' ),
                    array( 'You get the report by email.', "Then you decide whether you want help acting on it. There's no pressure either way." ),
                ) as $ttr_i => $ttr_step ) : ?>
                <div class="p-10 border-b md:border-b-0 <?php echo $ttr_i < 2 ? 'md:border-r' : ''; ?> border-slate-50 hover:bg-sky-pale/30 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <span class="font-mono text-xs font-bold text-sky-deep"><?php echo esc_html( sprintf( '%02d', $ttr_i + 1 ) ); ?></span>
                        <div class="h-[1px] flex-1 bg-slate-100"></div>
                    </div>
                    <h3 class="text-2xl text-slate-900 font-display mb-4"><?php echo esc_html( $ttr_step[0] ); ?></h3>
                    <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html( $ttr_step[1] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-12 flex justify-center">
                <a href="#report" class="group inline-flex items-center gap-4 rounded-full bg-accent text-slate-950 pl-8 pr-2 py-2 text-lg font-bold shadow-glow transition-transform hover:scale-[1.03] decoration-none">
                    Get my free report
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-950 text-accent transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <?php
    // Visible accordion + FAQPage from the same strings.
    toctoc_render_faq(
        array(
            array( 'q' => 'Is the report really free?', 'a' => "Yes. It's free and comes with no obligation. You can use it yourself or ask us to help." ),
            array( 'q' => 'How long does it take?', 'a' => "You'll have it within one business day of sending the form." ),
            array( 'q' => 'Do you need access to my accounts?', 'a' => "No. The report uses what's publicly visible: your website, your listings, and what AI tools and Google show when asked." ),
            array( 'q' => 'Do you work with businesses outside the Cayman Islands?', 'a' => 'Yes. We work with businesses here and abroad.' ),
        ),
        'FAQ',
        'Common <em class="italic text-sky-deep font-display">questions</em>'
    );
    ?>

</main>

<?php ob_start(); ?>
{
  "@type": "Service",
  "@id": "https://toctoc.ky/free-ai-visibility-report/#service",
  "name": "Free AI & Google Visibility Report",
  "serviceType": "AI search visibility audit",
  "description": "A report showing whether ChatGPT, Gemini and Google name a business when customers ask who to call, which businesses they recommend instead, how the business looks on Google, and the three fixes that would help most. Sent by email within one business day.",
  "provider": { "@id": "https://toctoc.ky/#organization" },
  "areaServed": [ { "@type": "Country", "name": "Cayman Islands" }, { "@type": "Place", "name": "Worldwide" } ],
  "url": "https://toctoc.ky/free-ai-visibility-report/"
}
<?php
if ( function_exists( 'toctoc_schema_add_raw' ) ) {
	toctoc_schema_add_raw( ob_get_clean() );
} else {
	ob_end_clean();
}
?>

<script>
(function(){
  var qs=["What's the best restaurant near me for a special dinner?","Which lawyer should I call for a property dispute near me?","Which construction company should I hire for a new build near me?","Which strata management company should we hire for our complex?","Who can do a property valuation near me?","Who's a good accountant for a small business near me?","Who's the best physiotherapist near me?"];
  var el=document.getElementById("cq"),i=0,paused=false;
  if(!el||(window.matchMedia&&matchMedia("(prefers-reduced-motion: reduce)").matches))return;
  var box=el.parentNode;
  box.addEventListener("mouseenter",function(){paused=true});
  box.addEventListener("mouseleave",function(){paused=false});
  setInterval(function(){
    if(paused||document.hidden)return;
    el.style.opacity=0;
    setTimeout(function(){i=(i+1)%qs.length;el.textContent=qs[i];el.style.opacity=1;},300);
  },3000);
})();
(function(){
  var t0=Date.now();
  try{var s=new URLSearchParams(location.search).get("src");if(s)document.getElementById("source").value=s.slice(0,80);}catch(e){}
  var f=document.getElementById("rf");if(!f)return;
  var btn=f.querySelector('button[type="submit"]'),err=document.getElementById("rf-err"),cap=document.getElementById("rf-cap");
  var hasCaptcha=!!f.querySelector(".cf-turnstile");
  function resetCaptcha(){if(window.turnstile){try{window.turnstile.reset();}catch(x){}}}
  f.addEventListener("submit",function(e){
    e.preventDefault();
    err.classList.add("hidden");cap.classList.add("hidden");
    if(hasCaptcha){var tk=f.querySelector('[name="ts_token"]');if(!tk||!tk.value){cap.classList.remove("hidden");return;}}
    document.getElementById("ttseo_t").value=String(Date.now()-t0);
    btn.disabled=true;
    /* f.action would return the <input name="action">, not the URL. */
    fetch(f.getAttribute("action"),{method:"POST",body:new FormData(f),credentials:"same-origin"})
      .then(function(r){return r.json();})
      .then(function(res){
        if(res&&!res.success&&res.data&&res.data.reason==="captcha"){btn.disabled=false;resetCaptcha();cap.classList.remove("hidden");return;}
        if(!res||!res.success){throw new Error("fail");}
        window.dataLayer=window.dataLayer||[];
        window.dataLayer.push({event:"report_lead",lead_source:document.getElementById("source").value});
        document.getElementById("form-view").classList.add("hidden");
        var t=document.getElementById("thanks");t.classList.remove("hidden");t.setAttribute("tabindex","-1");t.focus();
      })
      .catch(function(){btn.disabled=false;resetCaptcha();err.classList.remove("hidden");});
  });
})();
</script>

<?php get_footer(); ?>
