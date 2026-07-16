<?php
/**
 * Template Name: AI Search Optimization Cayman
 * Template Post Type: page
 *
 * Create a WordPress page with slug "ai-search-optimization-cayman-islands"
 * to publish it (replaces the old "seo-agency-services-cayman-islands" page;
 * a 301 redirect from the old slug is handled in functions.php).
 */
get_header();

// Video proof — same clips as the homepage, with page-specific on-video headlines.
$ai_proof = array(
    array(
        'headline' => 'How we ranked our clients #1 &amp; #2 on ChatGPT &amp; Gemini! &#128081;',
        'desc'     => 'A search demonstration showing Prime Group&rsquo;s Uncle Liu and Coconut Room ranked as the #1 and #2 best Chinese restaurants on Seven Mile Beach by both ChatGPT and Gemini.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-chinese-1-1.mp4',
        'poster'   => '',
    ),
    array(
        'headline' => 'How we got our client recommended #1 by ChatGPT &amp; Gemini &#127836;',
        'desc'     => 'Video proof showing Lucky Rabbit instantly recommended by ChatGPT and Gemini as the #1 Japanese restaurant near Prospect, showcasing high visibility in local AI search results.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-japanese-2-1.mp4',
        'poster'   => '',
    ),
    array(
        'headline' => 'How we made our client the #1 brewery on ChatGPT &amp; Gemini &#127866;',
        'desc'     => 'A demonstration of 19-81 Brewing Co. cited as the undisputed #1 craft brewery with a taproom in Grand Cayman by ChatGPT and Gemini, confirming their digital authority.',
        'mp4'      => 'https://toctoc.ky/wp-content/uploads/2026/07/toctoc-ai-results-1981-1.mp4',
        'poster'   => '',
    ),
);

// Table of contents — anchors match the section ids below.
$ai_toc = array(
    array( '#video-proof',     'Video Proof: Live Results for Cayman Brands' ),
    array( '#trust',           'How We Get ChatGPT &amp; Gemini to Trust Your Brand' ),
    array( '#how-ai-reads',    'How AI Engines Actually Read Your Website' ),
    array( '#traditional-seo', 'Why Traditional SEO is Failing Your Business' ),
    array( '#process',         'Our 3-Step Process for AI Visibility' ),
);
?>

<main class="min-h-screen bg-background text-foreground">

    <!-- Hero -->
    <section class="relative pt-48 pb-24 overflow-hidden bg-white">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-sky-deep blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent blur-[100px] rounded-full"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-6xl px-6">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-sky-deep/10 bg-sky-pale/50 px-4 py-1.5 text-[11px] font-bold text-sky-deep mb-8 uppercase tracking-widest">
                    AI Search Visibility Framework &middot; Cayman Islands
                </div>
                <h1 class="text-5xl md:text-7xl font-display leading-[0.95] text-slate-900">
                    Make Your Business the <em class="italic text-sky-deep font-display">#1 Choice</em> on ChatGPT, Gemini, and Google
                </h1>
                <p class="mt-10 text-xl md:text-2xl text-slate-600 leading-relaxed max-w-3xl">
                    We deploy the AI Search Visibility Framework to ensure your Cayman Islands brand is the definitive recommendation when customers ask AI assistants for local solutions.
                </p>
                <div class="mt-12 flex flex-wrap gap-4">
                    <a href="tel:+13455478120" class="group inline-flex items-center gap-3 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                        Call Us Today
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro -->
    <section class="pb-12 bg-white">
        <div class="mx-auto max-w-3xl px-6 space-y-6">
            <p class="text-xl text-slate-700 leading-relaxed">
                Traditional search has changed. Customers are no longer just typing &ldquo;Cayman restaurant&rdquo; into Google&mdash;they are asking their phones full, conversational questions. If your business isn&rsquo;t set up for this shift, AI engines won&rsquo;t even know you exist.
            </p>
            <p class="text-xl text-slate-700 leading-relaxed">
                We take care of all the complex technical heavy lifting so your business is always the first one recommended.
            </p>
        </div>
    </section>

    <!-- What's On This Page (table of contents) -->
    <section class="pb-20 bg-white">
        <div class="mx-auto max-w-3xl px-6">
            <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-8 md:p-10 shadow-soft">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl font-display text-slate-900">What&rsquo;s On This Page</h2>
                    <span class="shrink-0 inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-[11px] font-bold text-sky-deep border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        3 min read
                    </span>
                </div>
                <p class="text-sm text-slate-500 mb-6">It takes about 3 minutes to read. We respect your time.</p>
                <ol class="space-y-3">
                    <?php foreach ( $ai_toc as $i => $item ) : ?>
                    <li>
                        <a href="<?php echo esc_attr( $item[0] ); ?>" class="group flex items-start gap-4 decoration-none">
                            <span class="shrink-0 inline-flex items-center justify-center w-7 h-7 rounded-full bg-sky-pale text-sky-deep text-sm font-bold"><?php echo (int) ( $i + 1 ); ?></span>
                            <span class="text-lg text-slate-700 group-hover:text-sky-deep transition-colors leading-snug pt-0.5"><?php echo wp_kses_post( $item[1] ); ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </section>

    <!-- 1. Video Proof -->
    <section id="video-proof" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-3xl mb-14">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">01 &middot; Proof, not promises</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Video Proof: Live Results for <em class="italic text-sky-deep font-display">Cayman Brands</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                    We don&rsquo;t just talk about the future of search&mdash;we&rsquo;ve already coded our clients into the top spots. Here is the real-world proof of Cayman businesses dominating ChatGPT and Gemini today.
                </p>
            </div>
            <div class="grid gap-8 md:grid-cols-3">
                <?php foreach ( $ai_proof as $pv ) : ?>
                <figure class="flex flex-col items-center text-center">
                    <div class="relative aspect-[9/16] w-full max-w-[280px] overflow-hidden rounded-[2rem] bg-slate-950 shadow-soft ring-1 ring-slate-100">
                        <video class="w-full h-full object-cover" controls preload="metadata" playsinline <?php echo $pv['poster'] ? 'poster="' . esc_url( $pv['poster'] ) . '"' : ''; ?>>
                            <source src="<?php echo esc_url( $pv['mp4'] ); ?>#t=0.1" type="video/mp4">
                        </video>
                        <div class="pointer-events-none absolute inset-x-0 top-0 z-10 px-4 pt-4 pb-10 bg-gradient-to-b from-black/85 via-black/45 to-transparent">
                            <span class="block text-left text-sm font-bold text-white leading-snug drop-shadow-md"><?php echo wp_kses_post( $pv['headline'] ); ?></span>
                        </div>
                    </div>
                    <figcaption class="mt-5 max-w-[300px]">
                        <span class="block text-sm text-slate-500 leading-relaxed"><?php echo wp_kses_post( $pv['desc'] ); ?></span>
                    </figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 2. Trust Your Brand -->
    <section id="trust" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-4xl px-6">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">02 &middot; Local Knowledge Graph</span>
            <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">How We Get ChatGPT &amp; Gemini to <em class="italic text-sky-deep font-display">Trust Your Brand</em></h2>
            <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                Before an AI engine risks recommending your business to a user, it searches the entire internet to verify you are a real, active, and highly rated company. This complete web of data is known as your <strong class="font-semibold text-slate-900">Local Knowledge Graph</strong>.
            </p>
            <p class="mt-6 text-lg text-slate-600 leading-relaxed">We force the algorithms to choose you using a two-step approach:</p>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Building the Graph</div>
                    <p class="text-slate-600 leading-relaxed">We clean, sync, and lockdown your business information across Google Maps, Apple Maps, directory sites, and local reviews to build an unbreakable digital profile.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Triggering the Recommendation</div>
                    <p class="text-slate-600 leading-relaxed">Once the AI trusts this network of proof, our Answer Engine Optimization (AEO) framework kicks in, cementing your brand as the definitive, trusted answer in your industry.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. How AI Reads Your Website -->
    <section id="how-ai-reads" class="py-24 md:py-32 bg-slate-900 text-white rounded-[3rem] mx-4 scroll-mt-28">
        <div class="mx-auto max-w-4xl px-6">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-accent">03 &middot; Schema Markup</span>
            <h2 class="mt-6 text-4xl md:text-6xl font-display leading-[0.95]">How AI Engines Actually <em class="italic text-accent font-display">Read Your Website</em></h2>
            <p class="mt-8 text-lg text-white/60 leading-relaxed">
                AI assistants don&rsquo;t look at your beautiful photos or read your text the way humans do. Instead, they scan the hidden code running in the background of your site.
            </p>
            <p class="mt-6 text-lg text-white/60 leading-relaxed">To bridge this gap, we install a specialized digital language called <strong class="font-semibold text-white">Schema Markup</strong>:</p>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] bg-white/5 border border-white/10">
                    <div class="text-accent text-sm font-bold mb-3">The Invisible Translator</div>
                    <p class="text-white/60 leading-relaxed">This code acts as a direct translator between your website and AI databases.</p>
                </div>
                <div class="p-8 rounded-[2rem] bg-white/5 border border-white/10">
                    <div class="text-accent text-sm font-bold mb-3">Zero Guesswork</div>
                    <p class="text-white/60 leading-relaxed">It hands ChatGPT and Gemini your exact location, hours, services, and menus on a silver platter so the algorithm never has to guess what you do.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Why Traditional SEO is Failing -->
    <section id="traditional-seo" class="py-24 md:py-32 bg-white scroll-mt-28">
        <div class="mx-auto max-w-4xl px-6">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">04 &middot; Generative Engine Optimization</span>
            <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Why Traditional SEO is <em class="italic text-sky-deep font-display">Failing Your Business</em></h2>
            <p class="mt-8 text-lg text-slate-600 leading-relaxed">
                Traditional SEO was built for short, static keywords. Today, the market has shifted to <strong class="font-semibold text-slate-900">Conversational Queries</strong>&mdash;meaning customers are asking highly specific, full-sentence questions like, &ldquo;Where is the best place to get authentic Chinese food on Seven Mile Beach open right now?&rdquo;
            </p>
            <p class="mt-6 text-lg text-slate-600 leading-relaxed">To win these modern searches, we deploy <strong class="font-semibold text-slate-900">Generative Engine Optimization (GEO)</strong>:</p>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">AI-Ready Content</div>
                    <p class="text-slate-600 leading-relaxed">We structure, format, and optimize your website&rsquo;s information so AI tools can instantly read and summarize it.</p>
                </div>
                <div class="p-8 rounded-[2rem] border border-slate-100 bg-slate-50 shadow-soft">
                    <div class="text-sky-deep text-sm font-bold mb-3">Instant Recommendations</div>
                    <p class="text-slate-600 leading-relaxed">Instead of just ranking you in a list of blue links, GEO ensures AI engines dynamically generate a live recommendation that features your business first.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. 3-Step Process -->
    <section id="process" class="py-24 md:py-32 bg-slate-50 scroll-mt-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="max-w-2xl mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep">05 &middot; Our Process</span>
                <h2 class="mt-6 text-4xl md:text-6xl font-display text-slate-900 leading-[0.95]">Our 3-Step Process for <em class="italic text-sky-deep font-display">AI Visibility</em></h2>
                <p class="mt-8 text-lg text-slate-600 leading-relaxed">A transparent, 3-step path to putting your business at the top of modern search results.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-4xl font-display mb-4">01</div>
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Discovery &amp; Strategy</h3>
                    <p class="text-slate-500 leading-relaxed">We discuss your business goals, audit your current digital footprint, and map out a custom AI Search Visibility plan tailored to your industry.</p>
                </div>
                <div class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-4xl font-display mb-4">02</div>
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Build &amp; Optimize</h3>
                    <p class="text-slate-500 leading-relaxed">Our team sets up your digital profiles for AI crawlers, optimizes your local data feeds, and builds your high-speed website foundation.</p>
                </div>
                <div class="p-10 rounded-[2.5rem] bg-white border border-slate-100 shadow-soft">
                    <div class="text-sky-deep text-4xl font-display mb-4">03</div>
                    <h3 class="text-2xl font-display text-slate-900 mb-4">Get Cited &amp; Grow</h3>
                    <p class="text-slate-500 leading-relaxed">Your business becomes the recommended answer in modern search engines like ChatGPT and Gemini, turning AI discovery traffic into a steady stream of new leads.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 md:py-32 bg-sky-pale/50 text-center">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-4xl md:text-7xl font-display leading-[0.95] text-slate-900">Claim Your #1 Spot in the <br /><em class="italic text-sky-deep font-display">AI Search Era</em></h2>
            <p class="mt-8 text-lg md:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto">
                Don&rsquo;t let your competitors get coded into the algorithms first. Let&rsquo;s talk today and secure your brand as the recommended answer.
            </p>
            <div class="mt-12">
                <a href="tel:+13455478120" class="group inline-flex items-center gap-4 rounded-full bg-slate-950 text-white pl-8 pr-3 py-3 text-lg font-bold shadow-pill transition-all hover:scale-105 decoration-none">
                    Call Us Today
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-accent text-slate-950 transition-transform group-hover:rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
</main>

<script type="application/ld+json">
<?php
echo wp_json_encode(
    array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => 'AI Search Optimization',
        'serviceType' => 'AI Search Optimization (SEO, AEO & GEO)',
        'provider'    => array(
            '@type' => 'ProfessionalService',
            '@id'   => 'https://toctoc.ky',
            'name'  => 'TocToc Marketing',
        ),
        'areaServed'  => array(
            '@type' => 'Place',
            'name'  => 'Cayman Islands',
        ),
        'description' => 'AI Search Optimization for Cayman Islands businesses: SEO, Answer Engine Optimization (AEO) and Generative Engine Optimization (GEO) that make your brand the recommended answer on ChatGPT, Gemini and Google.',
        'url'         => 'https://toctoc.ky/ai-search-optimization-cayman-islands/',
    ),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
?>
</script>

<?php get_footer(); ?>
