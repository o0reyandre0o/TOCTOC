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
 * slug chamber-members. Approved by Daniel and published 29 Sep 2026, with the
 * category-check form handled in inc/chamber-members.php (email to info@ plus
 * the CRM tag "Chamber of Commerce Cayman"). No prices, no guaranteed outcomes.
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
                <a href="#check" class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-sky-deep hover:gap-3 transition-all decoration-none">Check your category now &darr;</a>
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

    <!-- Category check form -->
    <?php
    $ttc_state = isset( $_GET['form'] ) ? sanitize_key( wp_unslash( $_GET['form'] ) ) : '';
    $ttc_ts    = get_option( 'toctoc_ts_site', '' );
    $ttc_notes = array(
        'sent'    => array( 'bg-accent/20 text-slate-900', 'Thank you. We have your details and will email you whether your category is available.' ),
        'missing' => array( 'bg-red-50 text-red-800', 'Please fill in your name, business, category and a valid email.' ),
        'limit'   => array( 'bg-red-50 text-red-800', 'Too many attempts from this connection. Please try again in an hour, or email info@toctoc.ky.' ),
        'error'   => array( 'bg-red-50 text-red-800', 'The form expired. Please send it again.' ),
    );
    ?>
    <section id="check" class="py-24 md:py-28 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-5xl px-6 grid md:grid-cols-5 gap-12">
            <div class="md:col-span-2">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Category check</span>
                <h2 class="mt-6 text-4xl md:text-5xl font-display text-slate-900 leading-[0.95]">Is your category <em class="italic text-sky-deep font-display">still open?</em></h2>
                <p class="mt-6 text-lg text-slate-600 leading-relaxed">Leave your details and we will email you whether we can take on your category. If you would like the audit too, say so in the message.</p>
                <ol class="mt-8 space-y-3 text-sm text-slate-500">
                    <li><strong class="text-slate-900">1.</strong> You send the form.</li>
                    <li><strong class="text-slate-900">2.</strong> We check the category and reply by email.</li>
                    <li><strong class="text-slate-900">3.</strong> If it is open, we offer a short call. What you do next is up to you.</li>
                </ol>
            </div>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="md:col-span-3 rounded-[2.5rem] bg-white border border-slate-100 p-8 md:p-10 shadow-soft grid gap-5" id="ttc-form">
                <?php if ( isset( $ttc_notes[ $ttc_state ] ) ) : ?>
                <p class="rounded-2xl px-5 py-4 text-sm font-bold <?php echo esc_attr( $ttc_notes[ $ttc_state ][0] ); ?>" role="status"><?php echo esc_html( $ttc_notes[ $ttc_state ][1] ); ?></p>
                <?php endif; ?>
                <input type="hidden" name="action" value="toctoc_chamber" />
                <?php wp_nonce_field( 'toctoc_chamber', 'ttc_nonce' ); ?>
                <input type="hidden" name="ttseo_t" value="0" />
                <div aria-hidden="true" style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;">
                    <label>Leave this empty <input type="text" name="website_extra" tabindex="-1" autocomplete="off" /></label>
                </div>
                <?php
                foreach ( array(
                    array( 'name', 'Your name', 'text', true, 'name' ),
                    array( 'business', 'Business name', 'text', true, 'organization' ),
                    array( 'category', 'Your category (e.g. restaurant, law firm, dentist)', 'text', true, 'off' ),
                    array( 'email', 'Email', 'email', true, 'email' ),
                    array( 'phone', 'Phone (optional)', 'tel', false, 'tel' ),
                    array( 'website', 'Website (optional)', 'url', false, 'url' ),
                ) as $ttc_field ) :
                ?>
                <label class="grid gap-2 text-sm font-bold text-slate-700">
                    <?php echo esc_html( $ttc_field[1] ); ?>
                    <input type="<?php echo esc_attr( $ttc_field[2] ); ?>" name="<?php echo esc_attr( $ttc_field[0] ); ?>" autocomplete="<?php echo esc_attr( $ttc_field[4] ); ?>" <?php echo $ttc_field[3] ? 'required' : ''; ?> class="h-12 rounded-xl border border-slate-200 bg-white px-4 text-base font-normal text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-deep" />
                </label>
                <?php endforeach; ?>
                <label class="grid gap-2 text-sm font-bold text-slate-700">
                    Anything we should know? (optional)
                    <textarea name="message" rows="3" class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-base font-normal text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-deep"></textarea>
                </label>
                <?php if ( $ttc_ts ) : ?>
                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
                <div class="cf-turnstile" data-sitekey="<?php echo esc_attr( $ttc_ts ); ?>" data-response-field-name="ts_token"></div>
                <?php endif; ?>
                <button type="submit" class="mt-2 inline-flex items-center justify-center gap-3 rounded-full bg-slate-950 text-white h-14 px-8 text-lg font-bold shadow-pill transition-transform hover:scale-[1.02]">Check my category</button>
                <p class="text-xs text-slate-400">We only use your details to answer you. See our <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="underline">privacy policy</a>.</p>
            </form>
            <script>
            (function () {
                var f = document.getElementById('ttc-form'), t0 = Date.now();
                if (!f) return;
                f.addEventListener('submit', function () {
                    f.elements.ttseo_t.value = String(Date.now() - t0);
                    if (window.dataLayer) window.dataLayer.push({ event: 'chamber_lead' });
                });
            })();
            </script>
        </div>
    </section>

    <!-- Who you will work with -->
    <section class="py-24 md:py-28 bg-white">
        <div class="mx-auto max-w-5xl px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">Who you will talk to</span>
                <h2 class="mt-6 text-4xl md:text-5xl font-display text-slate-900 leading-[0.95]">
                    <a href="<?php echo esc_url( home_url( '/team/daniel-garrido/' ) ); ?>" class="decoration-none hover:text-sky-deep transition-colors">Daniel Garrido</a>, Founder
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
