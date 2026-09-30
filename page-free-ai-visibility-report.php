<?php
/**
 * Template Name: Free AI Visibility Report
 * Template Post Type: page
 *
 * Stand-alone landing page (30 Sep 2026), reproduced exactly from the approved
 * HTML design (v2 on 30 Sep 2026: rotating customer question in the chat
 * illustration), so it deliberately skips get_header()/get_footer(): no site nav,
 * no theme CSS, its own fonts and palette. Slug-matched, so the WordPress page
 * only needs the slug free-ai-visibility-report.
 *
 * What differs from the static mock-up is invisible: the form really submits
 * (inc/ai-report.php → email to info@ + GHL contact with a tag), the rating
 * comes from toctoc_google_reviews(), Open Graph tags are added, and GTM loads
 * with the same internal-traffic exclusion as the rest of the site. ?src=… in
 * the URL is carried into the lead as its source.
 *
 * @package Toc Toc
 */

$ttr_reviews = function_exists( 'toctoc_google_reviews' ) ? toctoc_google_reviews() : array( 'rating' => '4.8', 'count' => 25 );
$ttr_title   = 'Free AI & Google Visibility Report | Toc Toc Marketing';
$ttr_desc    = 'Find out whether ChatGPT, Gemini and Google recommend your business when customers ask who to call. Free report from Toc Toc Marketing, sent to your inbox.';
$ttr_url     = 'https://toctoc.ky/free-ai-visibility-report/';
$ttr_og      = function_exists( 'toctoc_og_image_url' )
	? toctoc_og_image_url( 'free-ai-visibility-report', 'Free AI & Google Visibility Report', 'https://toctoc.ky/wp-content/uploads/2026/07/logo-toctoc-new-05.webp' )
	: 'https://toctoc.ky/wp-content/uploads/2026/07/logo-toctoc-new-05.webp';
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?php echo esc_html( $ttr_title ); ?></title>
<meta name="description" content="<?php echo esc_attr( $ttr_desc ); ?>">
<link rel="canonical" href="<?php echo esc_url( $ttr_url ); ?>">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="Toc Toc Marketing">
<meta property="og:url" content="<?php echo esc_url( $ttr_url ); ?>">
<meta property="og:title" content="<?php echo esc_attr( $ttr_title ); ?>">
<meta property="og:description" content="<?php echo esc_attr( $ttr_desc ); ?>">
<meta property="og:image" content="<?php echo esc_url( $ttr_og ); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo esc_attr( $ttr_title ); ?>">
<meta name="twitter:description" content="<?php echo esc_attr( $ttr_desc ); ?>">
<meta name="twitter:image" content="<?php echo esc_url( $ttr_og ); ?>">
<link rel="icon" type="image/png" href="/wp-content/uploads/fbrfg/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/svg+xml" href="/wp-content/uploads/fbrfg/favicon.svg">
<link rel="shortcut icon" href="/wp-content/uploads/fbrfg/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/uploads/fbrfg/apple-touch-icon.png">
<link rel="manifest" href="/wp-content/uploads/fbrfg/site.webmanifest">
<meta name="author" content="Toc Toc Marketing">
<meta name="generator" content="TOCTOC Sky Editorial by Toc Toc (https://toctoc.ky/)">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
<script type="application/ld+json">
{"@context":"https://schema.org","@graph":[
{"@type":"Organization","@id":"https://toctoc.ky/#organization","name":"Toc Toc Marketing","url":"https://toctoc.ky/","logo":"https://toctoc.ky/wp-content/uploads/2026/07/logo-toctoc-new-05.webp","telephone":"+1 345-547-8120","email":"info@toctoc.ky","address":{"@type":"PostalAddress","streetAddress":"207 Sparky's Dr","addressLocality":"George Town","addressRegion":"Grand Cayman","postalCode":"KY1-1110","addressCountry":"KY"},"founder":{"@id":"https://toctoc.ky/#daniel-garrido"},"memberOf":{"@id":"https://caymanchamber.ky/#organization"}},
{"@type":"Service","@id":"https://toctoc.ky/free-ai-visibility-report/#service","name":"Free AI & Google Visibility Report","serviceType":"AI search visibility audit","description":"A report showing whether ChatGPT, Gemini and Google name a business when customers ask who to call, which businesses they recommend instead, how the business looks on Google, and the three fixes that would help most. Sent by email within one business day.","provider":{"@id":"https://toctoc.ky/#organization"},"areaServed":[{"@type":"Country","name":"Cayman Islands"},{"@type":"Place","name":"Worldwide"}],"url":"https://toctoc.ky/free-ai-visibility-report/"},
{"@type":"BreadcrumbList","@id":"https://toctoc.ky/free-ai-visibility-report/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"https://toctoc.ky/"},{"@type":"ListItem","position":2,"name":"Free AI & Google Visibility Report","item":"https://toctoc.ky/free-ai-visibility-report/"}]},
{"@type":"WebPage","@id":"https://toctoc.ky/free-ai-visibility-report/#webpage","url":"https://toctoc.ky/free-ai-visibility-report/","name":"Free AI & Google Visibility Report","description":<?php echo wp_json_encode( $ttr_desc, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>,"isPartOf":{"@id":"https://toctoc.ky/#website"},"about":{"@id":"https://toctoc.ky/free-ai-visibility-report/#service"},"breadcrumb":{"@id":"https://toctoc.ky/free-ai-visibility-report/#breadcrumb"},"publisher":{"@id":"https://toctoc.ky/#organization"}},
{"@type":"FAQPage","@id":"https://toctoc.ky/free-ai-visibility-report/#faq","isPartOf":{"@id":"https://toctoc.ky/free-ai-visibility-report/#webpage"},"mainEntity":[
{"@type":"Question","name":"Is the report really free?","acceptedAnswer":{"@type":"Answer","text":"Yes. It's free and comes with no obligation. You can use it yourself or ask us to help."}},
{"@type":"Question","name":"How long does it take?","acceptedAnswer":{"@type":"Answer","text":"You'll have it within one business day of sending the form."}},
{"@type":"Question","name":"Do you need access to my accounts?","acceptedAnswer":{"@type":"Answer","text":"No. The report uses what's publicly visible: your website, your listings, and what AI tools and Google show when asked."}},
{"@type":"Question","name":"Do you work with businesses outside the Cayman Islands?","acceptedAnswer":{"@type":"Answer","text":"Yes. We work with businesses here and abroad."}}
]}
]}
</script>
<script>
/* Internal traffic and GTM: same rules as header.php. Our own browsers carry the
   tt_internal cookie and load no analytics; everyone else gets GTM after the
   first interaction or 3.5 s. */
(function(w,d){
  var debug=/[?&](gtm_debug|tagassistant)/.test(w.location.search);
  w.TT_INTERNAL=!debug&&/(?:^|;\s*)tt_internal=1(?:;|$)/.test(d.cookie);
})(window,document);
(function(w,d,s,l,i){
  w[l]=w[l]||[];
  if(w.TT_INTERNAL)return;
  var loaded=false;
  function load(){if(loaded)return;loaded=true;w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i;f.parentNode.insertBefore(j,f);}
  var evs=['scroll','mousemove','touchstart','keydown','pointerdown'];
  function fire(){load();evs.forEach(function(e){w.removeEventListener(e,fire);});}
  evs.forEach(function(e){w.addEventListener(e,fire,{passive:true});});
  w.setTimeout(load,3500);
})(window,document,'script','dataLayer','GTM-5ZT8BLFP');
</script>
<style>
:root{
  --bg:#F5F7F6; --panel:#FFFFFF; --ink:#12202B; --muted:#4B5B66; --line:#D5DDE0;
  --accent:#0B6E6E; --accent-ink:#FFFFFF; --hi:#F2B705; --miss:#B3261E; --ok:#1B7A3E;
  box-sizing:border-box; padding-top:env(safe-area-inset-top,0px); padding-bottom:env(safe-area-inset-bottom,0px);
}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){
  --bg:#0E1A21; --panel:#15252E; --ink:#EAF0F2; --muted:#9FB0B8; --line:#284049;
  --accent:#3FC1BE; --accent-ink:#06201F; --miss:#FF8A80; --ok:#6FD394;}}
:root[data-theme="dark"]{
  --bg:#0E1A21; --panel:#15252E; --ink:#EAF0F2; --muted:#9FB0B8; --line:#284049;
  --accent:#3FC1BE; --accent-ink:#06201F; --miss:#FF8A80; --ok:#6FD394;}
html{scroll-padding-top:env(safe-area-inset-top,0px)}
*{box-sizing:border-box}
body{margin:0;background:var(--bg);color:var(--ink);font:400 1.05rem/1.6 "Source Sans 3",system-ui,-apple-system,"Segoe UI",sans-serif}
h1,h2,h3{font-family:"Bricolage Grotesque","Trebuchet MS",system-ui,sans-serif;line-height:1.12;margin:0 0 .6em;letter-spacing:-.01em}
h1{font-size:clamp(2rem,5.4vw,3.3rem);font-weight:800}
h2{font-size:clamp(1.5rem,3.4vw,2rem);font-weight:800}
h3{font-size:1.1rem;font-weight:600}
p{margin:0 0 1em}
a{color:var(--accent)}
.wrap{max-width:1080px;margin:0 auto;padding:0 20px}
header.top{padding:16px 0;border-bottom:1px solid var(--line)}
header.top .wrap{display:flex;justify-content:space-between;align-items:center;gap:10px 24px;flex-wrap:wrap}
.brand{font-family:"Bricolage Grotesque",sans-serif;font-weight:800;font-size:1.15rem}
.trust{display:flex;gap:6px 18px;flex-wrap:wrap;color:var(--muted);font-size:.92rem}
.trust b{color:var(--ink)}
.stars{color:var(--hi);letter-spacing:1px}
.hero{display:grid;grid-template-columns:1.1fr .9fr;gap:44px;padding:52px 0 60px;align-items:start}
.lead{font-size:1.2rem;color:var(--muted);max-width:34em}
.chat{background:var(--panel);border:1px solid var(--line);border-radius:14px;padding:18px;margin:26px 0 0;max-width:34em}
.q{background:var(--bg);border-radius:10px;padding:10px 14px;font-weight:600;margin-bottom:12px}
.a ol{margin:.4em 0 .8em;padding-left:1.3em}
.you{display:flex;align-items:center;gap:10px;border-top:1px dashed var(--line);padding-top:12px;font-weight:600}
.you .dot{width:12px;height:12px;border-radius:50%;background:var(--miss);flex:none}
.cap{font-size:.85rem;color:var(--muted);margin:10px 0 0}
#cq{transition:opacity .25s ease;min-height:3.2em}
.lab{font-size:.85rem;color:var(--muted);margin:0 0 6px}
.chips{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:16px}
.chip{font:600 .92rem "Source Sans 3",sans-serif;color:var(--ink);background:var(--bg);border:1.5px solid var(--line);border-radius:999px;padding:6px 14px;cursor:pointer}
.chip.on{background:var(--accent);color:var(--accent-ink);border-color:var(--accent)}
.chip:focus-visible{outline:3px solid var(--hi);outline-offset:2px}
.a ol{margin:0 0 .8em}
.card{background:var(--panel);border:1px solid var(--line);border-radius:14px;padding:26px}
.card h2{font-size:1.4rem}
label{display:block;font-weight:600;font-size:.95rem;margin:14px 0 4px}
input{width:100%;font:inherit;color:var(--ink);background:var(--bg);border:1.5px solid var(--line);border-radius:8px;padding:11px 12px}
input:focus-visible,button:focus-visible,summary:focus-visible,a:focus-visible{outline:3px solid var(--hi);outline-offset:2px}
.opt{font-weight:400;color:var(--muted)}
button.go{width:100%;margin-top:20px;padding:14px 18px;font:600 1.05rem "Source Sans 3",sans-serif;border:0;border-radius:8px;background:var(--accent);color:var(--accent-ink);cursor:pointer}
button.go:hover{filter:brightness(1.08)}
button.go[disabled]{opacity:.7;cursor:progress}
.fine{font-size:.85rem;color:var(--muted);margin:12px 0 0}
.err{display:none;margin:12px 0 0;font-size:.95rem;font-weight:600;color:var(--miss)}
.err.show{display:block}
.hp{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden}
.thanks{display:none}
.thanks.show{display:block}
section.block{padding:52px 0;border-top:1px solid var(--line)}
.two{display:grid;grid-template-columns:1fr 1.05fr;gap:40px;align-items:start;margin-top:22px}
.qs{list-style:none;margin:0;padding:0;display:grid;gap:18px}
.qs h3{margin:0 0 .15em}
.qs p{margin:0;color:var(--muted)}
.sample{background:var(--panel);border:1px solid var(--line);border-radius:14px;padding:18px;overflow-x:auto}
.sample h3{margin:0 0 .2em}
table{width:100%;border-collapse:collapse;font-size:.95rem;min-width:420px}
th,td{text-align:left;padding:9px 8px;border-bottom:1px solid var(--line)}
th{font-weight:600;color:var(--muted);font-size:.85rem}
.n{color:var(--miss);font-weight:600}.y{color:var(--ok);font-weight:600}
.fix{margin-top:14px;background:var(--bg);border-radius:10px;padding:12px 14px;font-size:.95rem}
ol.steps{list-style:none;counter-reset:s;padding:0;margin:24px 0 0;display:grid;gap:18px;max-width:40em}
ol.steps li{counter-increment:s;padding-left:52px;position:relative}
ol.steps li::before{content:counter(s);position:absolute;left:0;top:0;width:36px;height:36px;border-radius:50%;background:var(--accent);color:var(--accent-ink);display:grid;place-items:center;font:800 1rem "Bricolage Grotesque",sans-serif}
ol.steps b{display:block}
details{background:var(--panel);border:1px solid var(--line);border-radius:10px;padding:14px 18px;margin-bottom:10px;max-width:46em}
summary{cursor:pointer;font-weight:600}
details p{margin:.7em 0 0;color:var(--muted)}
footer{border-top:1px solid var(--line);padding:26px 0 34px;color:var(--muted);font-size:.92rem}
footer p{margin:0 0 .4em}
@media (max-width:820px){.hero,.two{grid-template-columns:1fr;gap:28px}.hero{padding-top:32px}}
@media (prefers-reduced-motion:no-preference){.card{animation:rise .5s ease-out both}@keyframes rise{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}}
</style>
</head>
<body>
<header class="top"><div class="wrap">
  <a class="brand" href="https://toctoc.ky/" style="color:inherit;text-decoration:none">Toc Toc Marketing</a>
  <div class="trust">
    <span><span class="stars" aria-hidden="true">★★★★★</span> <b><?php echo esc_html( $ttr_reviews['rating'] ); ?></b> on Google (<?php echo (int) $ttr_reviews['count']; ?> reviews)</span>
    <span>Member, Cayman Islands Chamber of Commerce</span>
  </div>
</div></header>

<main>
<div class="wrap hero">
  <div>
    <h1>When customers ask ChatGPT or Google who to call, does it name you?</h1>
    <p class="lead">Get a free report showing what AI tools and Google say about your business today, who they recommend instead, and what to fix first.</p>
    <div class="chat" aria-label="Illustration of an AI answer">
      <p class="lab">A customer asks ChatGPT:</p>
      <div class="q" id="cq" aria-live="off">What's the best restaurant near me for a special dinner?</div>
      <p class="lab">ChatGPT answers:</p>
      <div class="a">
        <ol><li>A competitor of yours</li><li>Another competitor</li><li>A third competitor</li></ol>
      </div>
      <div class="you"><span class="dot" aria-hidden="true"></span>Your business isn't named, so that customer never calls you.</div>
      <p class="cap">Illustration. Your report shows the real answers for your business.</p>
    </div>
  </div>

  <div class="card">
    <div id="form-view">
      <h2>Get your free report</h2>
      <p style="color:var(--muted);margin-bottom:0">Sent to your inbox within one business day.</p>
      <form id="rf" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
        <input type="hidden" name="action" value="toctoc_ai_report">
        <input type="hidden" name="source" id="source" value="direct">
        <input type="hidden" name="ttseo_t" id="ttseo_t" value="0">
        <div class="hp" aria-hidden="true"><label>Leave this empty <input type="text" name="website_extra" tabindex="-1" autocomplete="off"></label></div>
        <label for="name">Your name</label>
        <input id="name" name="name" autocomplete="name" required>
        <label for="biz">Business name</label>
        <input id="biz" name="business" autocomplete="organization" required>
        <label for="web">Website <span class="opt">(if you have one)</span></label>
        <input id="web" name="website" inputmode="url" autocomplete="url" placeholder="example.com">
        <label for="mail">Email</label>
        <input id="mail" name="email" type="email" autocomplete="email" required>
        <label for="what">What do customers look for when they find you?</label>
        <input id="what" name="service" placeholder="e.g. emergency plumber, family dentist">
        <button class="go" type="submit">Send me my free report</button>
        <p class="err" id="rf-err" role="alert">That didn't go through. Please try again, or email us at <a href="mailto:info@toctoc.ky">info@toctoc.ky</a>.</p>
      </form>
      <p class="fine">Free, with no obligation. We use your details only to prepare your report and follow up about it. <a href="https://toctoc.ky/privacy-policy/">Privacy policy</a></p>
    </div>
    <div class="thanks" id="thanks" role="status" aria-live="polite">
      <h2>Thanks, you're on the list.</h2>
      <p>We'll prepare your report and email it within one business day. Check your spam folder if you don't see it.</p>
    </div>
  </div>
</div>

<section class="block"><div class="wrap">
  <h2>Your report answers four questions</h2>
  <p style="color:var(--muted);max-width:40em;margin:0">We ask ChatGPT, Gemini and Google the same questions your customers ask, then show you exactly what came back.</p>
  <div class="two">
    <ul class="qs">
      <li><h3>Does AI mention my business?</h3><p>Yes or no, for each question we test.</p></li>
      <li><h3>Who does it recommend instead?</h3><p>The businesses that show up in your place.</p></li>
      <li><h3>How do I look on Google?</h3><p>Whether your website and listings are clear and easy to find.</p></li>
      <li><h3>What should I fix first?</h3><p>The three changes that would help most, in plain language.</p></li>
    </ul>
    <div class="sample" aria-label="Example report page">
      <h3>Example page from a report</h3>
      <p class="cap" style="margin:0 0 10px">Sample data for illustration only.</p>
      <table>
        <thead><tr><th>Question we tested</th><th>ChatGPT</th><th>Gemini</th><th>Google</th></tr></thead>
        <tbody>
          <tr><td>"Best [service] near me"</td><td class="n">Not named</td><td class="n">Not named</td><td class="y">Page 1</td></tr>
          <tr><td>"Who to call for [problem]"</td><td class="n">Not named</td><td class="y">Named</td><td class="n">Page 2</td></tr>
          <tr><td>"[Service] in [your area]"</td><td class="y">Named</td><td class="n">Not named</td><td class="y">Page 1</td></tr>
        </tbody>
      </table>
      <div class="fix"><b>Fix first:</b> your opening hours differ between your website and Google Maps.</div>
    </div>
  </div>
</div></section>

<section class="block"><div class="wrap">
  <h2>How it works</h2>
  <ol class="steps">
    <li><b>You send us the form.</b>It takes about a minute.</li>
    <li><b>We ask the questions your customers ask.</b>We test them on AI tools and Google and record what comes back.</li>
    <li><b>You get the report by email.</b>Then you decide whether you want help acting on it. There's no pressure either way.</li>
  </ol>
</div></section>

<section class="block"><div class="wrap">
  <h2>Common questions</h2>
  <details><summary>Is the report really free?</summary><p>Yes. It's free and comes with no obligation. You can use it yourself or ask us to help.</p></details>
  <details><summary>How long does it take?</summary><p>You'll have it within one business day of sending the form.</p></details>
  <details><summary>Do you need access to my accounts?</summary><p>No. The report uses what's publicly visible: your website, your listings, and what AI tools and Google show when asked.</p></details>
  <details><summary>Do you work with businesses outside the Cayman Islands?</summary><p>Yes. We work with businesses here and abroad.</p></details>
</div></section>
</main>

<footer><div class="wrap">
  <p><a href="https://toctoc.ky/" style="color:inherit;text-decoration:none"><b>Toc Toc Marketing</b></a> · Founded and led by Daniel Garrido · 207 Sparky's Dr, George Town, Cayman Islands</p>
  <p><a href="tel:+13455478120">+1 (345) 547-8120</a> · <a href="https://wa.me/13455478120">WhatsApp</a> · <a href="mailto:info@toctoc.ky">info@toctoc.ky</a></p>
  <p>Trade &amp; Business Licence TB1795A</p>
</div></footer>

<script>
(function(){
  var qs=["What's the best restaurant near me for a special dinner?","Which lawyer should I call for a property dispute near me?","Which construction company should I hire for a new build near me?","Which strata management company should we hire for our complex?","Who can do a property valuation near me?","Who's a good accountant for a small business near me?","Who's the best physiotherapist near me?"];
  var el=document.getElementById("cq"),i=0,paused=false;
  if(window.matchMedia&&matchMedia("(prefers-reduced-motion: reduce)").matches)return;
  var box=el.parentNode;
  box.addEventListener("mouseenter",function(){paused=true});
  box.addEventListener("mouseleave",function(){paused=false});
  setInterval(function(){
    if(paused||document.hidden)return;
    el.style.opacity=0;
    setTimeout(function(){i=(i+1)%qs.length;el.textContent=qs[i];el.style.opacity=1;},250);
  },3000);
})();
(function(){
  var t0=Date.now();
  try{var s=new URLSearchParams(location.search).get("src");if(s)document.getElementById("source").value=s.slice(0,80);}catch(e){}
  var f=document.getElementById("rf"),btn=f.querySelector("button.go"),err=document.getElementById("rf-err");
  f.addEventListener("submit",function(e){
    e.preventDefault();
    err.classList.remove("show");
    document.getElementById("ttseo_t").value=String(Date.now()-t0);
    btn.disabled=true;
    fetch(f.action,{method:"POST",body:new FormData(f),credentials:"same-origin"})
      .then(function(r){return r.json();})
      .then(function(res){
        if(!res||!res.success){throw new Error("fail");}
        window.dataLayer=window.dataLayer||[];
        window.dataLayer.push({event:"report_lead",lead_source:document.getElementById("source").value});
        document.getElementById("form-view").style.display="none";
        var t=document.getElementById("thanks");t.classList.add("show");t.setAttribute("tabindex","-1");t.focus();
      })
      .catch(function(){btn.disabled=false;err.classList.add("show");});
  });
  /* Phone, WhatsApp and email clicks, same event as the rest of the site. */
  document.addEventListener("click",function(e){
    var a=e.target&&e.target.closest?e.target.closest('a[href^="tel:"],a[href^="mailto:"],a[href*="wa.me"]'):null;
    if(!a)return;var h=a.getAttribute("href")||"";
    window.dataLayer=window.dataLayer||[];
    window.dataLayer.push({event:"contact_click",contact_method:h.indexOf("tel:")===0?"phone":h.indexOf("mailto:")===0?"email":"whatsapp",page_path:location.pathname});
  },true);
})();
</script>
</body>
</html>
