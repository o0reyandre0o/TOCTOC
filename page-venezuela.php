<?php
/**
 * Template Name: Venezuela Earthquake Appeal
 * Template Post Type: page
 *
 * Landing for the Cayman Islands Red Cross Venezuela Earthquake Appeal.
 * Hosted on toctoc.ky to help spread the word. URL: /venezuela
 */
get_header(); ?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Section 1: Hero -->
    <section class="relative pt-40 md:pt-48 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 opacity-[0.07]">
            <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-[#ED1C24] blur-[120px] rounded-full"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-4xl px-6 text-center flex flex-col items-center">
            <!-- Cayman Islands Red Cross official logo -->
            <a href="https://redcross.org.ky/" target="_blank" rel="noopener" class="mb-10 inline-block decoration-none">
                <img src="https://redcross.org.ky/wp-content/themes/redcross/images/logo_60years.svg" alt="Cayman Islands Red Cross" class="h-16 w-auto mx-auto" />
            </a>

            <div class="inline-flex items-center gap-2 rounded-full border border-[#ED1C24]/20 bg-[#ED1C24]/5 px-4 py-1.5 text-[11px] font-bold text-[#ED1C24] mb-8 uppercase tracking-widest">
                Emergency Appeal · June 29 – July 31, 2026
            </div>

            <h1 class="text-5xl sm:text-6xl md:text-7xl font-display leading-[0.92] text-slate-900">
                Venezuela <em class="italic text-[#ED1C24] font-display">Earthquake</em> Appeal
            </h1>

            <p class="mt-8 mx-auto max-w-2xl text-lg sm:text-xl text-slate-600 leading-relaxed">
                On June 24th, 2026, two devastating earthquakes shattered communities in northern Venezuela, leaving thousands of families facing unimaginable loss. In just <strong class="text-slate-900">39 seconds</strong>, the earthquakes changed countless lives forever.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="#donate" class="group inline-flex items-center justify-center gap-3 rounded-full bg-[#ED1C24] text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 hover:bg-[#c8161d] decoration-none">
                    Donate Now
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white text-[#ED1C24] transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 2: Image -->
    <section class="pb-8 bg-white">
        <div class="mx-auto max-w-5xl px-6">
            <figure>
                <div class="overflow-hidden rounded-[2.5rem] shadow-glass">
                    <img
                        src="https://content.api.news/v3/images/bin/d252bb5f8159e9d1b1a1d85860728696"
                        alt="Earthquake damage in northern Venezuela, June 2026 — Cayman Islands Red Cross appeal"
                        class="w-full h-auto object-cover"
                        loading="lazy"
                    />
                </div>
                <figcaption class="mt-3 text-center text-xs text-slate-400">
                    Photo: Juan Barreto / AFP
                </figcaption>
            </figure>
        </div>
    </section>

    <!-- Section 3: The need -->
    <section class="py-20 md:py-28 bg-white">
        <div class="mx-auto max-w-3xl px-6 text-center">
            <p class="text-3xl md:text-5xl leading-[1.15] text-slate-900 font-display">
                Thousands of families have lost their homes, their belongings, and their loved ones.
                <em class="italic text-[#ED1C24] font-display"> Your donation brings help and hope.</em>
            </p>
            <p class="mt-8 text-lg text-slate-500 leading-relaxed">
                Every contribution to the Cayman Islands Red Cross International Emergency Appeals goes toward emergency relief for the communities affected by the Venezuela earthquakes.
            </p>
        </div>
    </section>

    <!-- Section 4: Donate -->
    <section id="donate" class="py-24 md:py-32 bg-slate-950 text-white">
        <div class="mx-auto max-w-3xl px-6 text-center">
            <h2 class="text-5xl md:text-7xl font-display leading-[0.95]">Please <em class="italic text-[#ED1C24] font-display">donate</em> now</h2>
            <p class="mt-6 text-lg text-white/60">Cayman Islands Red Cross · International Emergency Appeals</p>

            <div class="mt-12 rounded-[2.5rem] bg-white/5 border border-white/10 p-8 md:p-12 text-left">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#ED1C24]">Bank Transfer · Butterfield Bank</span>
                <div class="mt-6 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
                    <div>
                        <p class="text-sm text-white/50 font-medium mb-1">Account Number (KYD)</p>
                        <p id="account-number" class="text-3xl md:text-4xl font-display tracking-wide text-white">136-035054-0060</p>
                    </div>
                    <button id="copy-account" type="button" class="shrink-0 inline-flex items-center justify-center gap-2 rounded-full bg-[#ED1C24] text-white px-6 py-3 text-sm font-bold transition-all hover:bg-[#c8161d] hover:scale-105">
                        <svg id="copy-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                        <span id="copy-label">Copy</span>
                    </button>
                </div>
            </div>

            <p class="mt-8 text-sm text-white/40">
                The appeal runs from June 29 to July 31, 2026.
            </p>
        </div>
    </section>

    <!-- Section 5: Spread the word -->
    <section class="py-20 md:py-28 bg-sky-pale/40 text-center">
        <div class="mx-auto max-w-2xl px-6">
            <h2 class="text-4xl md:text-6xl font-display leading-[0.95] text-slate-900">Can't donate? <em class="italic text-[#ED1C24] font-display">Share it.</em></h2>
            <p class="mt-6 text-lg text-slate-500">Every share helps reach someone who can give. Spread the word and help these families.</p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://toctoc.ky/venezuela/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-white border border-slate-200 px-6 py-3 text-sm font-bold text-slate-700 hover:text-[#ED1C24] hover:border-[#ED1C24]/30 transition-colors decoration-none shadow-soft">Share on Facebook</a>
                <a href="https://wa.me/?text=Venezuela%20Earthquake%20Appeal%20%E2%80%94%20please%20help%20the%20Cayman%20Islands%20Red%20Cross%3A%20https://toctoc.ky/venezuela/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-white border border-slate-200 px-6 py-3 text-sm font-bold text-slate-700 hover:text-[#ED1C24] hover:border-[#ED1C24]/30 transition-colors decoration-none shadow-soft">Share on WhatsApp</a>
                <a href="https://twitter.com/intent/tweet?text=Venezuela%20Earthquake%20Appeal%20%E2%80%94%20please%20help%20the%20Cayman%20Islands%20Red%20Cross&url=https://toctoc.ky/venezuela/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-white border border-slate-200 px-6 py-3 text-sm font-bold text-slate-700 hover:text-[#ED1C24] hover:border-[#ED1C24]/30 transition-colors decoration-none shadow-soft">Share on X</a>
            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('copy-account');
    if (!btn) return;
    btn.addEventListener('click', function () {
        var number = document.getElementById('account-number').textContent.trim();
        navigator.clipboard.writeText(number).then(function () {
            var label = document.getElementById('copy-label');
            label.textContent = 'Copied!';
            setTimeout(function () { label.textContent = 'Copy'; }, 2000);
        });
    });
});
</script>

<?php get_footer(); ?>
