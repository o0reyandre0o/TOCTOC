<?php
/**
 * Template Name: Now Hiring
 * Template Post Type: page
 *
 * /now-hiring/ used to carry a 2024 job ad for a designer (in Spanish, with an
 * embedded CRM form) and was kept out of the index as an orphan. On 29 Sep 2026
 * Daniel asked for it to stay public with one message: no open positions, but
 * internship applications are welcome (Trello 606). Slug-matched, so the page
 * needs no template chosen in wp-admin.
 *
 * @package Toc Toc
 */

get_header();

$ttn_mail = 'mailto:info@toctoc.ky?subject=' . rawurlencode( 'Internship application' );
?>

<main class="min-h-screen bg-background text-foreground">

    <section class="relative pt-48 pb-24 overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-sky-deep blur-[120px] rounded-full"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-5xl px-6">
            <?php toctoc_render_breadcrumbs( 'Careers' ); ?>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                Careers
            </div>
            <h1 class="text-5xl sm:text-6xl md:text-7xl font-display leading-[0.95] text-white">
                Not hiring right now. <em class="italic text-accent font-display">Internships are open.</em>
            </h1>
            <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                There are no open positions at Toc Toc Marketing at the moment. We do accept applications for internships, where you work on real client projects alongside the team.
            </p>
        </div>
    </section>

    <section class="py-24 md:py-28 bg-white">
        <div class="mx-auto max-w-5xl px-6 grid md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-4xl md:text-5xl font-display text-slate-900 leading-[0.95]">Areas you can <em class="italic text-sky-deep font-display">apply for</em></h2>
                <ul class="mt-8 space-y-4 text-lg text-slate-700">
                    <li>Graphic design and social media content</li>
                    <li>Video editing: reels, shorts and stories</li>
                    <li>Web development and technical SEO</li>
                </ul>
                <p class="mt-8 text-base text-slate-500 leading-relaxed">
                    Toc Toc Marketing is a Cayman Islands digital marketing agency specializing in AI Search Visibility, SEO and high-performance websites. The <a href="<?php echo esc_url( home_url( '/team/' ) ); ?>" class="font-bold text-sky-deep decoration-none hover:underline">team</a> is small, works remotely, and works in English and Spanish.
                </p>
            </div>
            <div class="rounded-[2.5rem] bg-slate-50 border border-slate-100 p-10">
                <h2 class="text-3xl font-display text-slate-900">How to apply</h2>
                <p class="mt-4 text-base text-slate-600 leading-relaxed">Email <a href="<?php echo esc_url( $ttn_mail ); ?>" class="font-bold text-sky-deep decoration-none hover:underline">info@toctoc.ky</a> with the subject <strong class="text-slate-900">Internship application</strong> and include:</p>
                <ul class="mt-6 space-y-3 text-base text-slate-700">
                    <li>Which area you are interested in</li>
                    <li>Your CV and a link to your portfolio or work samples</li>
                    <li>Your availability: hours per week and start date</li>
                </ul>
                <p class="mt-6 text-sm text-slate-500">Applications in English or Spanish are welcome. We read every one and will get in touch if there is a fit.</p>
                <a href="<?php echo esc_url( $ttn_mail ); ?>" class="group mt-8 inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    Apply by email
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
