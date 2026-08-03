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
    $default_desc = "AI Search Visibility agency in the Cayman Islands. We make local businesses the #1 answer on ChatGPT, Gemini and Google, with high-performance websites AI loves and humans trust.";
    $logo_url = "https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg";
    
    $seo_map = [
        'front' => [
            'title' => 'Marketing Agency Cayman Islands | TocToc Marketing',
            'desc' => 'The AI-era marketing agency for the Cayman Islands, rated 4.8★ by 21 clients. We make your business the #1 answer on Google, ChatGPT & Gemini. Free consult.'
        ],
        'ai-search-optimization-cayman-islands' => [
            'title' => 'SEO & AI Search Optimization Cayman | ChatGPT, Gemini',
            'desc' => 'Rank on Google and get recommended by ChatGPT & Gemini. SEO, AEO & GEO for Cayman Islands businesses, rated 4.8★ (21 reviews). Book a free strategy call.'
        ],
        'seo-agency-services-cayman-islands' => [
            'title' => 'AI Search Optimization Cayman | ChatGPT & Gemini | TocToc',
            'desc' => 'Be the #1 business recommended by ChatGPT, Gemini & Google. AI Search Optimization (SEO, AEO & GEO) for Cayman Islands brands. Book a free strategy call.'
        ],
        'digital-marketing-agency-cayman-islands' => [
            'title' => 'Digital Marketing Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Full-service digital marketing in Cayman: SEO, web design, social & PR built for the AI search era. Rated 4.8★ by 21 clients. Book a free strategy call.'
        ],
        'website-design-agency-cayman-islands' => [
            'title' => 'Website Design Cayman Islands | Fast & AI-Ready | TocToc',
            'desc' => 'High-speed, mobile-first website design in the Cayman Islands, built to convert and get recommended by AI. Rated 4.8★ (21 reviews). Get a free quote.'
        ],
        'social-media-marketing-services-cayman-islands' => [
            'title' => 'Social Media Marketing Cayman | AI-Ready | TocToc',
            'desc' => 'Social media marketing in the Cayman Islands that makes ChatGPT, Gemini & Google see your brand as the local authority. Rated 4.8★. Book a free call.'
        ],
        'advertising-pr-agency-cayman-islands' => [
            'title' => 'PR Agency Cayman | Digital PR & AI Authority | TocToc',
            'desc' => 'A Cayman Islands PR agency for the AI era. We build the citations and authority that make ChatGPT, Gemini & Google recommend your brand. Free strategy call.'
        ],
        'web-development-cayman-islands' => [
            'title' => 'Web Development Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Custom web development in the Cayman Islands: fast, secure, SEO-ready websites, e-commerce & web apps. Rated 4.8★ by 21 clients. Get a free project quote.'
        ],
        'venezuela' => [
            'title' => 'Venezuela Earthquake Appeal — Donate Now | Cayman Islands',
            'desc' => 'See what is happening in Venezuela after the June 2026 earthquakes: photos, videos and footage from the ground, plus trusted ways to donate from the Cayman Islands.'
        ],
        'seo-checker' => [
            'title' => 'Free Website SEO, GEO & AEO Checker | TocToc Cayman',
            'desc' => 'Run a free instant audit of any website: classic SEO, AI visibility (GEO/AEO) and Core Web Vitals speed. Get your scores and exactly what to fix.'
        ],
        'digital-marketing-cayman-islands-guide' => [
            'title' => 'Digital Marketing in the Cayman Islands: 2026 Guide | TocToc',
            'desc' => 'A clear 2026 guide to digital marketing in the Cayman Islands — SEO, AEO/GEO, AI visibility, costs and how to choose an agency. Answered by TocToc Marketing.'
        ],
        'our-work' => [
            'title' => 'Our Work | AI Search Case Studies Cayman | TocToc',
            'desc' => 'Real results: how we made Cayman brands the #1 recommendation on ChatGPT and Gemini. Case studies from 19-81 Brewing Co., Prime Group and TintXKing.'
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
        'ai-search-optimization-cayman-islands' => 'ai search optimization cayman islands, ai seo cayman, aeo agency cayman, geo optimization cayman, chatgpt seo, gemini recommendation, ai search visibility cayman, answer engine optimization',
        'seo-agency-services-cayman-islands' => 'ai search optimization cayman islands, ai seo cayman, aeo agency cayman, geo optimization cayman, chatgpt seo, gemini recommendation, ai search visibility cayman, answer engine optimization',
        'digital-marketing-agency-cayman-islands' => 'digital marketing services cayman islands, branding agency cayman, graphic design cayman islands, marketing strategy grand cayman',
        'website-design-agency-cayman-islands' => 'website design cayman islands, web design agency grand cayman, wordpress development cayman, high performance websites',
        'social-media-marketing-services-cayman-islands' => 'social media marketing cayman islands, social media for ai search, algorithmic trust, social search optimization, social media optimization cayman, social media agency cayman, ai crawlers social profiles, instagram linkedin optimization cayman',
        'advertising-pr-agency-cayman-islands' => 'digital pr cayman islands, ai authority citations, pr agency cayman, pr services cayman, entity trust score, linkedin authority building cayman, digital pr for ai search, brand citations chatgpt gemini',
        'web-development-cayman-islands' => 'web development cayman islands, web development agency cayman, website development company cayman, ecommerce development cayman, web app development cayman',
        'our-work' => 'toctoc marketing case studies, ai search results cayman islands, chatgpt ranking case study, gemini recommendation cayman, 19-81 brewing, prime group cayman, web design portfolio cayman islands',
        'about-toc-toc-marketing' => 'about toctoc marketing, marketing team cayman islands, daniel garrido, digital marketing experts grand cayman',
        'venezuela' => 'donate venezuela cayman islands, venezuela earthquake appeal cayman, help venezuela from cayman, venezuela earthquake donation, cayman islands red cross venezuela, donate to venezuela earthquake',
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

    <!-- Image Source for legacy crawlers -->
    <link rel="image_src" href="<?php echo esc_url($logo_url); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="TocToc Marketing">
    <meta property="og:url" content="<?php echo esc_url($current_url); ?>">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($desc); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <meta property="og:image:alt" content="<?php echo esc_attr($title); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo esc_url($current_url); ?>">
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
          "slogan": "AI Search Visibility for Cayman businesses. We make you the #1 answer on ChatGPT, Gemini & Google — with high-performance websites AI loves and humans trust.",
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.8",
            "reviewCount": "21",
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
            "sameAs": ["https://www.linkedin.com/in/bydanielgarrido/"],
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
            "https://www.instagram.com/wearetoctoc",
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

<nav class="fixed top-6 left-1/2 -translate-x-1/2 w-[90%] max-w-6xl h-16 glass rounded-full flex items-center justify-between px-8 z-[1000] shadow-soft border border-white/50">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center group decoration-none">
        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg" alt="TocToc Marketing" width="734" height="127" class="h-6 w-auto transition-transform group-hover:scale-105" />
    </a>
    
    <!-- Desktop Menu -->
    <div class="hidden items-center gap-6 lg:gap-8 md:flex">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-[13px] font-bold <?php echo is_front_page() ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Home</a>
        <a href="<?php echo esc_url( home_url( '/digital-marketing-agency-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('digital-marketing-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Services</a>
        <a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('ai-search-optimization-cayman-islands') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">AI Search Visibility</a>
        <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('website-design-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Web Design</a>
        <a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('our-work') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Our Work</a>
        <a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('about-toc-toc-marketing') ? 'text-sky-deep' : 'text-slate-700'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">About</a>
        <a href="<?php echo esc_url( home_url( '/seo-checker/' ) ); ?>" class="text-[13px] font-bold text-sky-deep hover:text-primary transition-colors decoration-none uppercase tracking-wider">SEO Checker</a>
    </div>

    <div class="flex items-center gap-4">
        <a href="tel:+13455478120" class="hidden sm:flex bg-accent text-accent-foreground h-11 px-6 rounded-full items-center gap-2 font-bold text-sm shadow-glow transition-transform hover:scale-105 decoration-none">
            Call Us
            <div class="w-6 h-6 rounded-full bg-primary text-primary-foreground flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </div>
        </a>
        
        <!-- Mobile Toggle -->
        <button id="menu-toggle" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false" class="md:hidden w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 text-primary transition-colors">
            <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            <svg id="close-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-0 z-[900] bg-white translate-x-full transition-transform duration-500 ease-in-out md:hidden">
    <div class="flex flex-col h-full pt-32 px-8 pb-12">
        <div class="flex flex-col gap-6">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-4xl font-display <?php echo is_front_page() ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Home</a>
            <a href="<?php echo esc_url( home_url( '/digital-marketing-agency-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('digital-marketing-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Services</a>
            <a href="<?php echo esc_url( home_url( '/ai-search-optimization-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('ai-search-optimization-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">AI Search Visibility</a>
            <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('website-design-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Web Design</a>
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

