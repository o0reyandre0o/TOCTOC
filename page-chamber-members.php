<?php
/**
 * Template Name: Chamber Members
 * Template Post Type: page
 *
 * Landing page for members of the Cayman Islands Chamber of Commerce, asked for
 * on Trello card 606 (29 Sep 2026). The Chamber profiled us in August and
 * describes the member offer — an audit plus a category-availability check —
 * but members had nowhere on our own site to land, and nothing here tied us to
 * the Chamber beyond one line in a trust card.
 *
 * Slug-matched (page-chamber-members.php), so the WordPress page only needs the
 * slug chamber-members. It was created as a DRAFT: Daniel confirms the offer
 * wording before it goes public. No prices, no guaranteed outcomes.
 *
 * @package Toc Toc
 */

get_header();

$ttc_article = 'https://caymanchamber.ky/chamber-profile-toc-toc-marketing-a-new-marketing-service-for-the-ai-age/';
$ttc_mail    = 'mailto:info@toctoc.ky?subject=' . rawurlencode( 'Chamber member audit' );
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero -->
    <section class="relative pt-48 pb-28 overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-sky-deep blur-[120px] rounded-full"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-5xl px-6">
            <?php toctoc_render_breadcrumbs( 'Chamber Members' ); ?>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[11px] font-bold text-accent mb-8 uppercase tracking-widest">
                For Chamber members
            </div>
            <h1 class="text-5xl sm:text-6xl md:text-7xl font-display leading-[0.95] text-white">
                For members of the Cayman Islands <em class="italic text-accent font-display">Chamber of Commerce.</em>
            </h1>
            <p class="mt-10 text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl">
                Toc Toc Marketing is a Cayman Islands digital marketing agency specializing in AI Search Visibility, SEO and high-performance websites &mdash; and a member of the Chamber, which profiled us in August 2026.
            </p>
            <a href="<?php echo esc_url( $ttc_article ); ?>" target="_blank" rel="noopener" class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-accent hover:gap-3 transition-all decoration-none">
                Read the Chamber&rsquo;s profile: &ldquo;A New Marketing Service for the AI Age&rdquo;
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </a>
        </div>
    </section>

    <!-- The offer -->
    <section class="py-24 md:py-28 bg-white">
        <div class="mx-auto max-w-5xl px-6">
            <div class="max-w-3xl mb-14">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">The member offer</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Two things we do for <em class="italic text-sky-deep font-display">every member who asks.</em></h2>
            </div>
            <div class="grid gap-8 md:grid-cols-2">
                <article class="rounded-[2.5rem] bg-white border border-slate-100 p-10 shadow-soft">
                    <h3 class="text-3xl font-display text-slate-900 mb-4">An AI Search Visibility audit</h3>
                    <p class="text-base text-slate-600 leading-relaxed">We check how ChatGPT, Gemini, Siri and Google currently describe your business, whether your name, address and phone number match everywhere they appear, and what is stopping AI assistants from citing you. You get the findings in plain English, with what to fix first.</p>
                </article>
                <article class="rounded-[2.5rem] bg-slate-950 text-white border border-white/10 p-10 shadow-glass">
                    <h3 class="text-3xl font-display mb-4">A category availability check</h3>
                    <p class="text-base text-white/60 leading-relaxed">We work with one business per category in each market, so we are never optimizing one client against another. Before anything else, we tell you whether your category is still open.</p>
                    <a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/#exclusivity' ) ); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-accent hover:gap-3 transition-all decoration-none">
                        How category exclusivity works
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </article>
            </div>
        </div>
    </section>

    <!-- How it works -->
    <section class="py-24 md:py-28 bg-slate-50">
        <div class="mx-auto max-w-5xl px-6">
            <h2 class="text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How to <em class="italic text-sky-deep font-display">claim it</em></h2>
            <ol class="mt-14 grid gap-6 md:grid-cols-3">
                <?php foreach ( array(
                    array( 'Get in touch', 'Call, WhatsApp or email us and mention you are a Chamber member.' ),
                    array( 'We run the checks', 'We run the audit and check whether your category is available.' ),
                    array( 'We walk you through it', 'A short call to go over what we found. What you do next is up to you.' ),
                ) as $ttc_i => $ttc_step ) : ?>
                <li class="rounded-[2rem] bg-white border border-slate-100 p-8 shadow-soft">
                    <span class="font-mono text-xs font-bold text-sky-deep"><?php echo esc_html( sprintf( '%02d', $ttc_i + 1 ) ); ?></span>
                    <h3 class="mt-4 text-2xl font-display text-slate-900"><?php echo esc_html( $ttc_step[0] ); ?></h3>
                    <p class="mt-3 text-sm text-slate-500 leading-relaxed"><?php echo esc_html( $ttc_step[1] ); ?></p>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- Who you will work with -->
    <section class="py-24 md:py-28 bg-white">
        <div class="mx-auto max-w-5xl px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Who you will talk to</span>
                <h2 class="mt-6 text-4xl md:text-5xl font-display text-slate-900 leading-[0.95]">
                    <a href="<?php echo esc_url( home_url( '/team/daniel-garrido/' ) ); ?>" class="decoration-none hover:text-sky-deep transition-colors">Daniel Garrido</a>, Founder &amp; CEO
                </h2>
                <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                    Daniel represents Toc Toc Marketing at the Chamber and scopes every project himself. Behind him is a small team in George Town working in English and Spanish &mdash; <a href="<?php echo esc_url( home_url( '/team/' ) ); ?>" class="font-bold text-sky-deep decoration-none hover:underline">meet the team</a>.
                </p>
            </div>
            <div class="rounded-[2.5rem] bg-sky-pale/50 border border-slate-100 p-10">
                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-500 mb-4">Contact</p>
                <ul class="space-y-3 text-lg text-slate-800">
                    <li><a href="tel:+13455478120" class="decoration-none hover:text-sky-deep">+1 345-547-8120</a></li>
                    <li><a href="<?php echo esc_url( $ttc_mail ); ?>" class="decoration-none hover:text-sky-deep">info@toctoc.ky</a></li>
                    <li class="text-slate-600">207 Sparky&rsquo;s Dr, George Town KY1-1110, Cayman Islands</li>
                </ul>
                <a href="tel:+13455478120" class="group mt-8 inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    Call Us
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <?php toctoc_render_checker_cta(); ?>

</main>

<?php get_footer(); ?>
