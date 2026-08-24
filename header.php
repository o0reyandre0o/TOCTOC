<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Perf: warm up connections to the render-critical + image origins -->
    <!-- Fonts: direct links (parallel) instead of the old @import chain inside style.css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@400;500;600;700;800&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@400;500;600;700;800&display=swap"></noscript>
    <!-- Compiled Tailwind (static, ~39 KB) — replaces the runtime CDN build. Rebuild with: npm run build:css -->
    <?php
    // Inline the compiled Tailwind CSS so it never render-blocks as a separate request
    // (the whole sheet is only ~44 KB / ~8 KB gzipped). Falls back to a normal stylesheet
    // link if the file can't be read.
    $ttc_css_path = get_template_directory() . '/assets/tailwind.min.css';
    $ttc_css      = @file_get_contents( $ttc_css_path );
    if ( false !== $ttc_css && '' !== $ttc_css ) {
        echo '<style id="toctoc-tw">' . $ttc_css . '</style>';
    } else {
        echo '<link rel="stylesheet" href="' . esc_url( get_template_directory_uri() . '/assets/tailwind.min.css' ) . '?v=' . (int) @filemtime( $ttc_css_path ) . '">';
    }
    ?>
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <?php if ( is_front_page() ) : ?>
    <link rel="preload" as="image" href="<?php echo esc_url( toctoc_clouds_src() ); ?>" imagesrcset="<?php echo esc_attr( toctoc_clouds_srcset() ); ?>" imagesizes="100vw" fetchpriority="high">
    <?php endif; ?>

    <link rel="icon" type="image/svg+xml" href="https://toctoc.ky/toctoc-new-favicon-03.svg">
    <link rel="shortcut icon" href="https://toctoc.ky/toctoc-new-favicon-03.svg">
    <link rel="apple-touch-icon" href="https://toctoc.ky/toctoc-new-favicon-03.svg">
    
    <?php
    // SEO & Social Meta logic
    $site_name = "TocToc Marketing";
    $default_title = "TocToc Marketing | Digital Marketing Agency Cayman Islands";
    /*
     * No "#1" claims in any of the copy below — see the note in front-page.php.
     * We do not state that we deliver a #1 recommendation or ranking, because
     * AI answers vary by phrasing, location and date and no agency can stand
     * behind that. Agreed wording: we have influenced AI-generated local
     * recommendations, and we make businesses findable, trustworthy and citable.
     */
    $default_desc = "AI Search Visibility agency in the Cayman Islands. We help local businesses get found, trusted and cited by ChatGPT, Gemini and Google, with high-performance websites AI reads and humans trust.";
    $logo_url = "https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg";
    
    $seo_map = [
        /*
         * Keeps the head term: the home ranks 3.5-9.8 across the whole agency
         * cluster and wins every one of them against our own service pages.
         *
         * Description rewritten 20 Aug 2026. Over 28 days the home took 2,570
         * impressions from Cayman at position 6.8 and returned ONE click, so the
         * ranking is not the problem — the snippet is. The old one led with
         * credentials (licensed, George Town, 4.8 stars), which answer "are they
         * real?" but give nobody a reason to pick us over the other five
         * agencies on the page.
         *
         * A first attempt opened with the free checker and was reverted the same
         * day: that offer is the /seo-checker/ page's own snippet, and someone
         * searching "marketing agency cayman islands" is shopping for an agency,
         * not a tool. Promising a tool to that query misdescribes the page.
         *
         * So it now leads with the differentiator instead — the thing no other
         * Cayman agency says — and keeps the proof as the closing clause.
         */
        'front' => [
            'title' => 'Marketing Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Cayman marketing agency building websites ChatGPT and Gemini can read, not just Google. Web design, SEO and AI visibility from George Town. 4.8★, 24 reviews.'
        ],
        'ai-search-optimization-cayman-islands' => [
            'title' => 'SEO & AI Search Optimization Cayman | ChatGPT, Gemini',
            'desc' => 'Rank on Google and get recommended by ChatGPT & Gemini. SEO, AEO & GEO for Cayman Islands businesses, rated 4.8★ (24 reviews). Book a free strategy call.'
        ],
        'seo-agency-services-cayman-islands' => [
            'title' => 'AI Search Optimization Cayman | ChatGPT & Gemini | TocToc',
            'desc' => 'Get your business found and recommended by ChatGPT, Gemini & Google. AI Search Optimization (SEO, AEO & GEO) for Cayman Islands brands. Book a free strategy call.'
        ],
        /*
         * Retargeted away from the head term on 2026-08-05.
         *
         * This page and the front page both said "…Marketing Agency Cayman
         * Islands", so Google could not tell them apart and split the authority:
         * the home ranks 4.5 for "marketing agency cayman islands" while this
         * page sat at 44, and the same pattern repeated across five money
         * queries. The home wins those, so this page stops contesting them and
         * takes territory nothing else covers — consulting, branding and
         * "marketing services grand cayman", all of which have real Cayman
         * demand (84-95 impressions each) and no page of their own.
         */
        /*
         * Branding dropped from the title 20 Aug 2026. The 5 Aug retarget sent
         * this page after consulting, branding and "marketing services grand
         * cayman", and 28 days later only one of the three took: it sits at 13.3
         * on "marketing services grand cayman" and at 22-31 on every branding
         * query — while the HOME ranks 1.0-4.7 on those same branding terms
         * without a branding page existing at all. That is the same split the
         * retarget was meant to end, just moved to a new keyword. The home wins
         * branding, so this page stops contesting it and doubles down on the
         * one term where it is genuinely the site's best URL.
         */
        'digital-marketing-agency-cayman-islands' => [
            'title' => 'Marketing Services & Consulting Grand Cayman | TocToc',
            'desc' => 'Marketing consulting and full-service campaigns for Grand Cayman businesses — strategy, design and execution from one local team in George Town. Rated 4.8★ by 24 clients.'
        ],
        // Retargeted 10 Aug 2026. Carrying "web design" here was a losing fight:
        // the home ranks 3.3 on "web design cayman islands" and this page 20.7,
        // so the two were splitting one query and neither reached page one. The
        // page's real territory is "development" and "restaurant", where it is
        // the site's best URL already (18.3 on "restaurant website design cayman
        // islands" vs the home's 25.0). Title now carries the two nouns that
        // actually convert here. Full evidence table in the page template.
        'website-design-agency-cayman-islands' => [
            'title' => 'Website Development Grand Cayman | Restaurant Sites | TocToc',
            'desc' => 'Website development company in Grand Cayman. We hand-code fast, custom sites — and we have built more Cayman restaurant websites than anyone. Rated 4.8★ (24 reviews). Free quote.'
        ],
        // Bing's query log for this page is dominated by "social media COMPANY in
        // cayman" and "social media AGENCIES cayman islands" — the noun people
        // actually type — while the old title only carried "marketing". The page
        // already converts unusually well there (position 4, 100% CTR on a small
        // sample), so the title now matches the search rather than our jargon.
        'social-media-marketing-services-cayman-islands' => [
            'title' => 'Social Media Company Cayman Islands | Agency | TocToc',
            'desc' => 'A social media agency in the Cayman Islands that makes ChatGPT, Gemini & Google read your brand as the local authority. Rated 4.8★ by 24 clients. Book a free call.'
        ],
        'advertising-pr-agency-cayman-islands' => [
            'title' => 'PR Agency Cayman | Digital PR & AI Authority | TocToc',
            'desc' => 'A Cayman Islands PR agency for the AI era. We build the citations and authority that make ChatGPT, Gemini & Google recommend your brand. Free strategy call.'
        ],
        // Narrowed 10 Aug 2026 to e-commerce and web apps. This page and
        // /website-design-agency-cayman-islands/ were both aiming at plain
        // "web development cayman" — and this one lost badly (41 impressions at
        // position 44.8 against the other's 2,659). Rather than redirect a page
        // linked from the footer and three templates, the two now split by
        // intent: brochure and restaurant builds there, transactional builds
        // here. Nothing overlaps, so nothing cannibalises.
        'web-development-cayman-islands' => [
            'title' => 'E-commerce & Web App Development Cayman Islands | TocToc',
            'desc' => 'Custom e-commerce and web application development in the Cayman Islands — online stores, booking platforms and internal tools built to be fast and secure. Free project quote.'
        ],
        'venezuela' => [
            'title' => 'Venezuela Earthquake Appeal — Donate Now | Cayman Islands',
            'desc' => 'See what is happening in Venezuela after the June 2026 earthquakes: photos, videos and footage from the ground, plus trusted ways to donate from the Cayman Islands.'
        ],
        /*
         * Blog index, added 24 Aug 2026 with the blog itself. Deliberately not
         * chasing a head term: this URL exists to be crawled and to funnel
         * authority to the articles, which are the pages meant to rank.
         */
        'blog' => [
            'title' => 'Blog: Web Design & AI Search in Cayman | TocToc',
            'desc' => 'Field notes on building websites in the Cayman Islands that Google, ChatGPT and Gemini can actually read — written from the sites we build and the data behind them.'
        ],
        'seo-checker' => [
            'title' => 'Free Website SEO, GEO & AEO Checker | TocToc Cayman',
            'desc' => 'Run a free instant audit of any website: classic SEO, AI visibility (GEO/AEO) and Core Web Vitals speed. Get your scores and exactly what to fix.'
        ],
        'digital-marketing-cayman-islands-guide' => [
            'title' => 'Digital Marketing in the Cayman Islands: 2026 Guide | TocToc',
            'desc' => 'A clear 2026 guide to digital marketing in the Cayman Islands — SEO, AEO/GEO, AI visibility, costs and how to choose an agency. Answered by TocToc Marketing.'
        ],
        'case-study-prime-group-cayman' => [
            'title' => 'The Website That Started Recruiting | Case Study | TocToc',
            'desc' => 'We built Prime Group\'s site and touched nothing else — no listings, no social, no ads. A year later: +305% clicks, position 17.3 to 9.1, and chefs in Jamaica and Kenya finding them.'
        ],
        'case-study-tintxking-orlando' => [
            'title' => 'Window Tint Shop: 5.7x More Search Traffic | Case Study | TocToc',
            'desc' => 'TintXKing went from invisible to page one in Orlando — 469% more clicks than the same months last year. The Search Console data, what we changed, and what is still not fixed.'
        ],
        'our-work' => [
            'title' => 'Our Work | AI Search Case Studies Cayman | TocToc',
            'desc' => 'Real results: how we have influenced AI-generated recommendations for Cayman brands. Case studies from 19-81 Brewing Co., Prime Group and TintXKing.'
        ],
        'about-toc-toc-marketing' => [
            'title' => 'About TocToc Marketing | Your Digital Partners in Cayman',
            'desc' => 'Meet the team behind your growth. We combine local Cayman expertise with global digital strategies to help your business scale.'
        ],
        'cookie-policy' => [
            'title' => 'Cookie Policy | TocToc Marketing Cayman Islands',
            'desc' => 'Read TocToc Marketing\'s Cookie Policy. Learn how we use cookies to enhance your experience on our Cayman Islands digital marketing agency website.'
        ],
        'privacy-policy' => [
            'title' => 'Privacy Policy | TocToc Marketing Cayman Islands',
            'desc' => 'TocToc Marketing\'s Privacy Policy. Understand how we collect, use, and protect your personal data as a leading digital marketing agency in the Cayman Islands.'
        ],
        'terms-and-conditions' => [
            'title' => 'Terms & Conditions | TocToc Marketing Cayman Islands',
            'desc' => 'Review TocToc Marketing\'s Terms and Conditions governing the use of our digital marketing services in the Cayman Islands.'
        ]
    ];

    $seo_map['404'] = [
        'title' => 'Page Not Found | TocToc Marketing Cayman Islands',
        'desc' => 'The page you are looking for does not exist. Explore TocToc Marketing\'s SEO, AEO, web design, and digital marketing services in the Cayman Islands.'
    ];

    $default_keywords = 'digital marketing agency cayman islands, marketing agency grand cayman, seo cayman islands, web design cayman islands, toctoc marketing';
    $keywords_map = [
        'front' => 'digital marketing agency cayman islands, ai marketing agency, aeo agency, ai search visibility framework, marketing agency grand cayman, seo cayman islands',
        'ai-search-optimization-cayman-islands' => 'local seo cayman islands, local seo company in cayman islands, seo services cayman, seo agency cayman, ai search optimization cayman islands, ai seo cayman, aeo agency cayman, geo optimization cayman, chatgpt seo, gemini recommendation, ai search visibility cayman, answer engine optimization',
        'seo-agency-services-cayman-islands' => 'ai search optimization cayman islands, ai seo cayman, aeo agency cayman, geo optimization cayman, chatgpt seo, gemini recommendation, ai search visibility cayman, answer engine optimization',
        'digital-marketing-agency-cayman-islands' => 'marketing services grand cayman, cayman marketing consultant, cayman marketing consulting, branding agency cayman islands, cayman islands branding, marketing design services cayman, graphic design cayman islands, marketing strategy grand cayman',
        'website-design-agency-cayman-islands' => 'website development grand cayman, web development services cayman, website development company cayman islands, web development cayman, restaurant website design cayman islands, restaurant website cayman, wordpress development cayman, website developers grand cayman',
        'social-media-marketing-services-cayman-islands' => 'social media company in cayman, social media agencies cayman islands, social media company cayman, social media strategy cayman, social media marketing cayman islands, social media agency cayman, social media for ai search, algorithmic trust, social search optimization, instagram linkedin optimization cayman',
        'advertising-pr-agency-cayman-islands' => 'digital pr cayman islands, ai authority citations, pr agency cayman, pr services cayman, entity trust score, linkedin authority building cayman, digital pr for ai search, brand citations chatgpt gemini',
        'web-development-cayman-islands' => 'ecommerce development cayman islands, online store development cayman, web app development cayman, booking platform development cayman, woocommerce developer cayman islands, custom web application cayman',
        'our-work' => 'toctoc marketing case studies, ai search results cayman islands, chatgpt ranking case study, gemini recommendation cayman, 19-81 brewing, prime group cayman, web design portfolio cayman islands',
        'about-toc-toc-marketing' => 'about toctoc marketing, marketing team cayman islands, daniel garrido, digital marketing experts grand cayman',
        'venezuela' => 'donate venezuela cayman islands, venezuela earthquake appeal cayman, help venezuela from cayman, venezuela earthquake donation, cayman islands red cross venezuela, donate to venezuela earthquake',
        'blog' => 'cayman islands web design blog, seo cayman islands, ai search cayman, restaurant website cayman, toctoc marketing blog',
        'seo-checker' => 'free seo checker, seo audit tool, geo checker, aeo checker, ai visibility checker, website seo test, core web vitals test, seo checker cayman islands',
        'digital-marketing-cayman-islands-guide' => 'digital marketing cayman islands guide, best marketing agency cayman, seo aeo geo cayman, how to choose a marketing agency cayman, ai visibility cayman, marketing agency cayman islands',
    ];

    // Per-page social share image (og:image / twitter:image). Use a raster image
    // (JPG/PNG, ideally 1200x630) — social platforms do not render the SVG logo.
    $og_image_map = [
        'venezuela' => 'https://content.api.news/v3/images/bin/d252bb5f8159e9d1b1a1d85860728696',
    ];

    $current_slug = '';
    if (is_front_page()) {
        $current_slug = 'front';
    } elseif (is_404()) {
        $current_slug = '404';
    } elseif (is_home()) {
        // The posts page. is_home() is neither is_singular() nor is_archive(),
        // so without this branch it fell through to $default_title and shipped
        // the blog index under the front page's title — exactly the duplicate
        // that got /category/ URLs flagged.
        $current_slug = 'blog';
    } elseif (is_singular()) {
        global $post;
        $current_slug = $post->post_name ?? '';
    }
    // Archives, search and feeds deliberately get no slug: on a category archive
    // the global $post is just the first post in the loop, so the old code handed
    // them a random (or empty) slug and they fell through to the front page's
    // title. They are noindexed a few lines below instead.

    // Pages that must never be indexed. WordPress archives and search results
    // have no entry in $seo_map, so they used to inherit the home page's exact
    // title and description — Google indexed /category/digital-marketing/ under
    // the front page's title and flagged /category/social-media/ as a duplicate.
    // The three slugs are orphans from older builds that still answer 200:
    // /homepage/ is a literal copy of the front page, /now-hiring/ and /sansiwu/
    // are stale since 2024. None are linked from the site or the sitemap.
    $orphan_slugs = ['homepage', 'now-hiring', 'sansiwu'];
    $is_noindex = is_404()
        || is_search()
        || is_archive()
        || is_attachment()
        || is_paged()
        || in_array($current_slug, $orphan_slugs, true);

    if (isset($seo_map[$current_slug])) {
        $title = $seo_map[$current_slug]['title'];
        $desc  = $seo_map[$current_slug]['desc'];
    } elseif (is_singular() && get_the_title()) {
        // No hand-written entry: derive the title from the page itself. Falling
        // back to $default_title here is what made every unmapped URL look like
        // a copy of the front page in the SERPs.
        $title = wp_strip_all_tags(get_the_title()) . ' | ' . $site_name;
        $desc  = has_excerpt() ? wp_strip_all_tags(get_the_excerpt()) : $default_desc;
    } else {
        $title = $default_title;
        $desc  = $default_desc;
    }
    $keywords = $keywords_map[$current_slug] ?? $default_keywords;
    // Per-page OG: explicit map first (e.g. Venezuela photo), then a generated
    // branded 1200x630 card (social platforms don't render the SVG logo).
    $og_image = $og_image_map[$current_slug]
        ?? ( function_exists( 'toctoc_og_image_url' ) ? toctoc_og_image_url( $current_slug ?: 'default', $title, $logo_url ) : $logo_url );
    $current_url = home_url(add_query_arg([], $GLOBALS['wp']->request));
    if (is_front_page()) {
        $canonical = home_url('/');
    } elseif (is_singular()) {
        // get_permalink() is immune to junk query strings and pagination, unlike
        // rebuilding the URL from $wp->request.
        $canonical = get_permalink();
    } else {
        $canonical = trailingslashit($current_url);
    }
    ?>

    <title><?php echo esc_html($title); ?></title>
    <meta name="description" content="<?php echo esc_attr($desc); ?>">
    <meta name="keywords" content="<?php echo esc_attr($keywords); ?>">
    <meta name="author" content="TocToc Marketing">
    <meta name="publisher" content="TocToc Marketing">
    <meta name="copyright" content="TocToc Marketing">
    <?php if ($is_noindex): ?>
    <meta name="robots" content="noindex, follow">
    <?php else: ?>
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <?php endif; ?>
    
    <!-- Google Tag Manager (delayed until first interaction / 3.5s to free the main thread) -->
    <script>(function(w,d,s,l,i){
        w[l]=w[l]||[]; // dataLayer available immediately so events queue before GTM loads
        var loaded=false;
        function load(){
            if(loaded)return; loaded=true;
            w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
            var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
            j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
            f.parentNode.insertBefore(j,f);
        }
        var evs=['scroll','mousemove','touchstart','keydown','pointerdown'];
        function fire(){ load(); evs.forEach(function(e){ w.removeEventListener(e,fire); }); }
        evs.forEach(function(e){ w.addEventListener(e,fire,{passive:true}); });
        w.setTimeout(load,3500); // fallback so no-interaction sessions are still tracked
    })(window,document,'script','dataLayer','GTM-5ZT8BLFP');</script>
    <!-- End Google Tag Manager -->

    <!--
      Microsoft Clarity — heatmaps and session recordings, and it links up with
      Bing Webmaster Tools so the behaviour data sits beside the search data.

      Loaded normally rather than deferred like GTM above: the script is already
      async so it never blocks parsing, and a recorder that starts 3.5s late
      misses the first scroll and the first rage-click — exactly the moments the
      tool exists to capture. GTM can afford the delay because its events queue
      in the dataLayer; a session recording cannot be replayed retroactively.
    -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "xxr2kxt233");
    </script>
    <!-- End Microsoft Clarity -->

    <!-- Image Source for legacy crawlers -->
    <link rel="image_src" href="<?php echo esc_url($logo_url); ?>">
    
    <!-- Open Graph / Facebook -->
    <?php
    // Case studies and the guide are articles, not the site itself.
    $og_type = ( is_singular() && in_array( $current_slug, array( 'case-study-tintxking-orlando', 'digital-marketing-cayman-islands-guide' ), true ) )
        ? 'article' : 'website';
    ?>
    <meta property="og:type" content="<?php echo esc_attr($og_type); ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="TocToc Marketing">
    <?php // Same URL as the canonical. $current_url drops the trailing slash, and
          // Facebook and LinkedIn treat /page and /page/ as two objects, splitting
          // a post's shares and reactions between them. ?>
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($desc); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <?php // Declared so a platform can lay out the preview immediately instead of
          // downloading the file first just to measure it. The generator always
          // outputs 1200x630. ?>
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo esc_attr($title); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta property="twitter:description" content="<?php echo esc_attr($desc); ?>">
    <meta property="twitter:image" content="<?php echo esc_url($og_image); ?>">

    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": ["Organization", "ProfessionalService", "LocalBusiness"],
          "name": "TocToc Marketing",
          "alternateName": "Toc Toc Marketing",
          "description": "<?php echo esc_attr($default_desc); ?>",
          "slogan": "AI Search Visibility for Cayman businesses. We help you get found, trusted and cited by ChatGPT, Gemini & Google — with high-performance websites AI reads and humans trust.",
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.8",
            "reviewCount": "24",
            "bestRating": "5",
            "worstRating": "1"
          },
          "areaServed": [
            { "@type": "Country", "name": "Cayman Islands" },
            { "@type": "City", "name": "George Town" },
            { "@type": "Place", "name": "Grand Cayman" },
            { "@type": "Country", "name": "United States" },
            { "@type": "Country", "name": "Puerto Rico" },
            { "@type": "Country", "name": "Venezuela" }
          ],
          "image": "<?php echo esc_url($logo_url); ?>",
          "logo": "<?php echo esc_url($logo_url); ?>",
          "@id": "https://toctoc.ky/#organization",
          "url": "https://toctoc.ky",
          "telephone": "+1 345-547-8120",
          "email": "info@toctoc.ky",
          "priceRange": "$$",
          "memberOf": {
            "@type": "Organization",
            "@id": "https://caymanchamber.ky/#organization",
            "name": "Cayman Islands Chamber of Commerce",
            "alternateName": "CICOC",
            "url": "https://caymanchamber.ky/"
          },
          "knowsAbout": [
            "Search Engine Optimization (SEO)",
            "Answer Engine Optimization (AEO)",
            "Generative Engine Optimization (GEO)",
            "AI Search Visibility",
            "Website Design and Development",
            "Social Media Marketing",
            "Local SEO Cayman Islands",
            "Digital Marketing Strategy"
          ],
          "founder": {
            "@type": "Person",
            "@id": "https://toctoc.ky/#daniel-garrido",
            "name": "Daniel Garrido",
            "jobTitle": "Founder & CEO",
            "knowsAbout": ["Web Design", "Search Engine Optimization", "Digital Marketing", "Brand Strategy"],
            "sameAs": ["https://www.linkedin.com/in/bydanielgarrido/", "https://danielgarrido.com"],
            "worksFor": { "@id": "https://toctoc.ky/#organization" }
          },
          "employee": [
            {
              "@type": "Person",
              "@id": "https://www.linkedin.com/in/andre-g-9b373a97/#person",
              "name": "Andre Gutierrez",
              "jobTitle": "Web Developer & Technical SEO Specialist",
              "description": "AI-driven web developer, and the developer and creator of the TocToc Marketing WordPress theme. Specializes in vibe coding, WordPress, technical and semantic SEO, building high-performance websites optimized for AI search visibility.",
              "knowsAbout": ["WordPress Development", "WordPress Theme Development", "Vibe Coding", "Technical SEO", "Semantic SEO", "JSON-LD Structured Data", "Conversion Rate Optimization (CRO)", "Elementor", "AI-Assisted Development", "Web Performance"],
              "sameAs": ["https://www.linkedin.com/in/andre-g-9b373a97/"],
              "worksFor": [
                { "@id": "https://toctoc.ky/#organization" },
                { "@type": "Organization", "name": "Polimedios", "url": "https://polimedios.com/" }
              ]
            },
            {
              "@type": "Person",
              "@id": "https://toctoc.ky/#nora-bravo",
              "name": "Nora Bravo",
              "jobTitle": "Graphic Designer",
              "description": "Graphic designer crafting brand identities, visual systems, and creative assets that make Cayman businesses stand out.",
              "knowsAbout": ["Graphic Design", "Branding", "Visual Identity", "Social Media Creatives"],
              "sameAs": ["https://www.linkedin.com/in/norabravo92/"],
              "worksFor": { "@id": "https://toctoc.ky/#organization" }
            }
          ],
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Grand Cayman",
            "addressLocality": "George Town",
            "addressRegion": "Grand Cayman",
            "postalCode": "KY1-1102",
            "addressCountry": "KY"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 19.2945176,
            "longitude": -81.3754188
          },
          "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
              "Monday",
              "Tuesday",
              "Wednesday",
              "Thursday",
              "Friday"
            ],
            "opens": "09:00",
            "closes": "18:00"
          },
          "sameAs": [
            "https://www.facebook.com/wearetoctoc",
            "https://www.instagram.com/toctoc.ky",
            "https://www.linkedin.com/company/110122083/",
            "https://www.youtube.com/@wearetoctoc"
          ]
        },
        {
          "@type": "WebSite",
          "@id": "https://toctoc.ky/#website",
          "url": "https://toctoc.ky",
          "name": "TocToc Marketing",
          "publisher": { "@id": "https://toctoc.ky/#organization" },
          "creator": { "@id": "https://toctoc.ky/#organization" },
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://toctoc.ky/?s={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        },
        {
          "@type": "BreadcrumbList",
          "@id": "<?php echo $current_url; ?>#breadcrumb",
          "itemListElement": [
            {
              "@type": "ListItem",
              "position": 1,
              "item": {
                "@id": "https://toctoc.ky",
                "name": "Home"
              }
            }
            <?php if (!is_front_page()): ?>
            ,{
              "@type": "ListItem",
              "position": 2,
              "item": {
                "@id": "<?php echo $current_url; ?>",
                "name": "<?php echo esc_attr($title); ?>"
              }
            }
            <?php endif; ?>
          ]
        }
        <?php /* Front-page FAQ schema now lives in front-page.php via toctoc_render_faq(),
                 where the answers are visible on the page — AI engines only trust FAQ
                 markup whose text exists in the rendered content. */ ?>
        <?php if (is_page('about-toc-toc-marketing')): ?>
        ,{
          "@type": "AboutPage",
          "@id": "<?php echo esc_url($canonical); ?>#webpage",
          "url": "<?php echo esc_url($canonical); ?>",
          "name": "<?php echo esc_attr($title); ?>",
          "description": "<?php echo esc_attr($desc); ?>",
          "about": { "@id": "https://toctoc.ky/#organization" },
          "isPartOf": { "@id": "https://toctoc.ky/#website" }
        }
        <?php endif; ?>
      ]
    }
    </script>


    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5ZT8BLFP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<nav class="fixed top-6 left-1/2 -translate-x-1/2 w-[90%] max-w-6xl h-16 glass rounded-full flex items-center justify-between px-5 xl:px-8 z-[1000] shadow-soft border border-white/50">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center group decoration-none">
        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg" alt="TocToc Marketing" width="734" height="127" class="h-6 w-auto transition-transform group-hover:scale-105" />
    </a>
    
    <!-- Desktop Menu.
         Breakpoint is lg, not md: seven items with labels this long do not fit a
         768px bar, and "Web Development" (which replaced the shorter "Web Design"
         on 10 Aug 2026) is what pushed it over. Below 1024px the hamburger takes
         over. whitespace-nowrap on the links stops a long label from wrapping to
         two lines and squashing the logo against the first item. -->
    <div class="hidden items-center gap-3 xl:gap-5 lg:flex">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-[11px] xl:text-[13px] whitespace-nowrap font-bold<?php echo is_front_page() ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Home</a>
        <a href="<?php echo esc_url( home_url( '/digital-marketing-agency-cayman-islands/' ) ); ?>" class="text-[11px] xl:text-[13px] whitespace-nowrap font-bold<?php echo is_page('digital-marketing-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Services</a>
        <a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/' ) ); ?>" class="text-[11px] xl:text-[13px] whitespace-nowrap font-bold<?php echo is_page('ai-search-optimization-cayman-islands') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">AI Search</a>
        <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-[11px] xl:text-[13px] whitespace-nowrap font-bold<?php echo is_page('website-design-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Web Development</a>
        <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="text-[11px] xl:text-[13px] whitespace-nowrap font-bold<?php echo is_page('our-work') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Our Work</a>
        <a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="text-[11px] xl:text-[13px] whitespace-nowrap font-bold<?php echo is_page('about-toc-toc-marketing') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">About</a>
        <a href="<?php echo esc_url( home_url( '/seo-checker/' ) ); ?>" class="text-[11px] xl:text-[13px] whitespace-nowrap font-boldtext-sky-deep hover:text-primary transition-colors decoration-none uppercase tracking-wider">SEO Checker</a>
    </div>

    <div class="flex items-center gap-4">
        <a href="tel:+13455478120" class="hidden sm:flex bg-accent text-accent-foreground h-11 px-6 rounded-full items-center gap-2 font-bold text-sm shadow-glow transition-transform hover:scale-105 decoration-none">
            Call Us
            <div class="w-6 h-6 rounded-full bg-primary text-primary-foreground flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </div>
        </a>
        
        <!-- Mobile Toggle -->
        <button id="menu-toggle" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 text-primary transition-colors">
            <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            <svg id="close-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-0 z-[900] bg-white translate-x-full transition-transform duration-500 ease-in-out lg:hidden">
    <div class="flex flex-col h-full pt-32 px-8 pb-12">
        <div class="flex flex-col gap-6">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-4xl font-display <?php echo is_front_page() ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Home</a>
            <a href="<?php echo esc_url( home_url( '/digital-marketing-agency-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('digital-marketing-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Services</a>
            <a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('ai-search-optimization-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">AI Search Visibility</a>
            <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('website-design-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Web Development</a>
            <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="text-4xl font-display <?php echo is_page('our-work') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Our Work</a>
            <a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="text-4xl font-display <?php echo is_page('about-toc-toc-marketing') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">About</a>
            <a href="<?php echo esc_url( home_url( '/seo-checker/' ) ); ?>" class="text-4xl font-display text-sky-deep decoration-none">Free SEO Checker</a>
        </div>
        
        <div class="mt-auto">
            <a href="tel:+13455478120" class="w-full bg-slate-950 text-white h-16 rounded-2xl flex items-center justify-center gap-3 font-bold text-lg shadow-pill decoration-none">
                Call Us
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </a>
            <div>
                <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg" alt="TocToc Marketing" width="734" height="127" class="h-4 w-auto brightness-0 invert" />
                <p class="mt-4 text-sm text-white/40 font-medium">Cayman Islands · Built for the AI era</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    let isOpen = false;

    toggle.addEventListener('click', () => {
        isOpen = !isOpen;
        if (isOpen) {
            menu.classList.remove('translate-x-full');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            menu.classList.add('translate-x-full');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        }
    });

    // Close on link click
    const links = menu.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('translate-x-full');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
            isOpen = false;
        });
    });
});
</script>

