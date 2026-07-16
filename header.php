<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Perf: warm up connections to the render-critical + image origins -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://images.unsplash.com" crossorigin>
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <?php if ( is_front_page() ) : ?>
    <link rel="preload" as="image" href="https://images.unsplash.com/photo-1513002749550-c59d786b8e6c?q=75&w=1920&auto=format&fit=crop" fetchpriority="high">
    <?php endif; ?>

    <link rel="icon" type="image/svg+xml" href="https://toctoc.ky/toctoc-new-favicon-03.svg">
    <link rel="shortcut icon" href="https://toctoc.ky/toctoc-new-favicon-03.svg">
    <link rel="apple-touch-icon" href="https://toctoc.ky/toctoc-new-favicon-03.svg">
    
    <?php
    // SEO & Social Meta logic
    $site_name = "TocToc Marketing";
    $default_title = "TocToc Marketing | Digital Marketing Agency Cayman Islands";
    $default_desc = "Leading digital marketing agency in the Cayman Islands. We specialize in SEO, Web Design, and AI-driven growth strategies for local businesses.";
    $logo_url = "https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg";
    
    $seo_map = [
        'front' => [
            'title' => 'Marketing Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Top-rated marketing agency in the Cayman Islands. SEO, web design & AI visibility that turn searches into customers. Book your free consultation today.'
        ],
        'seo-agency-services-cayman-islands' => [
            'title' => 'SEO Services Cayman Islands | AEO & GEO Experts | TocToc',
            'desc' => 'Rank #1 in Google and get recommended by AI. Cayman SEO, AEO & GEO services with local Map Pack optimization. Free SEO consultation — talk to an expert.'
        ],
        'digital-marketing-agency-cayman-islands' => [
            'title' => 'Digital Marketing Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Full-service digital marketing agency in Cayman: SEO, web design, social media, advertising & PR. Grow your revenue with a free strategy call today.'
        ],
        'website-design-agency-cayman-islands' => [
            'title' => 'Website Design Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Award-worthy web design & development in the Cayman Islands. Fast, mobile-first websites that convert visitors into leads. Get your custom quote today.'
        ],
        'social-media-marketing-services-cayman-islands' => [
            'title' => 'Social Media Marketing Cayman Islands | TocToc Marketing',
            'desc' => 'Social media marketing & management for Cayman businesses. We build communities that drive real leads, not just likes. Book a free consultation today.'
        ],
        'advertising-pr-agency-cayman-islands' => [
            'title' => 'Advertising & PR Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Advertising, PR & communications agency in the Cayman Islands. Campaigns, media buying & public relations that get your business seen and trusted.'
        ],
        'web-development-cayman-islands' => [
            'title' => 'Web Development Agency Cayman Islands | TocToc Marketing',
            'desc' => 'Custom web development services in the Cayman Islands: websites, e-commerce & web apps built fast, secure & SEO-ready. Get your free project quote today.'
        ],
        'venezuela' => [
            'title' => 'Venezuela Earthquake Appeal — Donate Now | Cayman Islands',
            'desc' => 'See what is happening in Venezuela after the June 2026 earthquakes: photos, videos and footage from the ground, plus trusted ways to donate from the Cayman Islands.'
        ],
        'seo-checker' => [
            'title' => 'Free SEO, GEO & AEO Checker Tool | TocToc Marketing Cayman',
            'desc' => 'Run a free instant audit of any website: classic SEO, AI visibility (GEO/AEO) and Core Web Vitals speed. Get your scores and exactly what to fix.'
        ],
        'digital-marketing-cayman-islands-guide' => [
            'title' => 'Digital Marketing in the Cayman Islands: 2026 Guide | TocToc',
            'desc' => 'A clear 2026 guide to digital marketing in the Cayman Islands — SEO, AEO/GEO, AI visibility, costs and how to choose an agency. Answered by TocToc Marketing.'
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
        'front' => 'digital marketing agency cayman islands, ai marketing agency, aeo agency, revenue loop marketing, marketing agency grand cayman, seo cayman islands',
        'seo-agency-services-cayman-islands' => 'seo services cayman islands, aeo services, geo optimization, ai search visibility, answer engine optimization, local seo grand cayman',
        'digital-marketing-agency-cayman-islands' => 'digital marketing services cayman islands, branding agency cayman, graphic design cayman islands, marketing strategy grand cayman',
        'website-design-agency-cayman-islands' => 'website design cayman islands, web design agency grand cayman, wordpress development cayman, high performance websites',
        'social-media-marketing-services-cayman-islands' => 'social media marketing cayman islands, social media management grand cayman, social media agency cayman, instagram marketing cayman, facebook ads cayman',
        'advertising-pr-agency-cayman-islands' => 'advertising agency cayman islands, advertising company cayman, communications agency cayman, pr agency cayman, pr services cayman, media buying cayman',
        'web-development-cayman-islands' => 'web development cayman islands, web development agency cayman, website development company cayman, ecommerce development cayman, web app development cayman',
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
    } else {
        global $post;
        $current_slug = $post->post_name ?? '';
    }

    $title = $seo_map[$current_slug]['title'] ?? $default_title;
    $desc = $seo_map[$current_slug]['desc'] ?? $default_desc;
    $keywords = $keywords_map[$current_slug] ?? $default_keywords;
    $og_image = $og_image_map[$current_slug] ?? $logo_url;
    $current_url = home_url(add_query_arg([], $GLOBALS['wp']->request));
    $canonical = is_front_page() ? home_url('/') : trailingslashit($current_url);
    ?>

    <title><?php echo esc_html($title); ?></title>
    <meta name="description" content="<?php echo esc_attr($desc); ?>">
    <meta name="keywords" content="<?php echo esc_attr($keywords); ?>">
    <meta name="author" content="TocToc Marketing">
    <meta name="publisher" content="TocToc Marketing">
    <meta name="copyright" content="TocToc Marketing">
    <?php if (is_404()): ?>
    <meta name="robots" content="noindex, follow">
    <?php else: ?>
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <?php endif; ?>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
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
          "@type": ["ProfessionalService", "LocalBusiness"],
          "name": "TocToc Marketing",
          "alternateName": "Toc Toc Marketing",
          "description": "<?php echo esc_attr($default_desc); ?>",
          "slogan": "We build the Revenue Loop for your business.",
          "image": "<?php echo esc_url($logo_url); ?>",
          "logo": "<?php echo esc_url($logo_url); ?>",
          "@id": "https://toctoc.ky",
          "url": "https://toctoc.ky",
          "telephone": "+1 345-547-8120",
          "email": "info@toctoc.ky",
          "priceRange": "$$",
          "areaServed": [
            { "@type": "Country", "name": "Cayman Islands" },
            { "@type": "City", "name": "George Town" },
            { "@type": "Place", "name": "Grand Cayman" }
          ],
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
            "@id": "https://toctoc.ky/about-toc-toc-marketing/#daniel-garrido",
            "name": "Daniel Garrido",
            "jobTitle": "Founder & CEO",
            "worksFor": { "@id": "https://toctoc.ky" }
          },
          "employee": [
            {
              "@type": "Person",
              "@id": "https://toctoc.ky/about-toc-toc-marketing/#andre-gutierrez",
              "name": "Andre Gutierrez",
              "jobTitle": "Web Developer",
              "description": "AI-driven web developer, and the developer and creator of the TocToc Marketing WordPress theme. Specializes in vibe coding, WordPress, and Elementor, building high-performance websites optimized for AI search visibility.",
              "knowsAbout": ["Vibe Coding", "WordPress Development", "WordPress Theme Development", "Elementor", "AI-Assisted Development", "Web Performance"],
              "sameAs": ["https://www.linkedin.com/in/andre-g-9b373a97/"],
              "worksFor": { "@id": "https://toctoc.ky" }
            },
            {
              "@type": "Person",
              "@id": "https://toctoc.ky/about-toc-toc-marketing/#nora-bravo",
              "name": "Nora Bravo",
              "jobTitle": "Graphic Designer",
              "description": "Graphic designer crafting brand identities, visual systems, and creative assets that make Cayman businesses stand out.",
              "knowsAbout": ["Graphic Design", "Branding", "Visual Identity", "Social Media Creatives"],
              "worksFor": { "@id": "https://toctoc.ky" }
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
            "https://www.facebook.com/toctocmarketing",
            "https://www.instagram.com/toctocmarketing",
            "https://www.linkedin.com/company/toctocmarketing"
          ]
        },
        {
          "@type": "WebSite",
          "@id": "https://toctoc.ky/#website",
          "url": "https://toctoc.ky",
          "name": "TocToc Marketing",
          "publisher": { "@id": "https://toctoc.ky" },
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
        <?php if (is_front_page()): ?>
        ,{
          "@type": "FAQPage",
          "mainEntity": [
            {
              "@type": "Question",
              "name": "What is the Revenue Loop framework?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "The Revenue Loop is a three-phase marketing framework (Get Recommended, Get Chosen, Get Clients Back) designed to turn search intent into sustainable growth by optimizing for AI visibility and user conversion."
              }
            },
            {
              "@type": "Question",
              "name": "Do you offer SEO services in Cayman Islands?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, TocToc Marketing is a leading SEO and AEO agency in the Cayman Islands, specializing in getting businesses recommended by AI agents and dominating local search results."
              }
            }
          ]
        }
        <?php endif; ?>
        <?php if (is_page('about-toc-toc-marketing')): ?>
        ,{
          "@type": "AboutPage",
          "@id": "<?php echo esc_url($canonical); ?>#webpage",
          "url": "<?php echo esc_url($canonical); ?>",
          "name": "<?php echo esc_attr($title); ?>",
          "description": "<?php echo esc_attr($desc); ?>",
          "about": { "@id": "https://toctoc.ky" },
          "isPartOf": { "@id": "https://toctoc.ky/#website" }
        }
        <?php endif; ?>
      ]
    }
    </script>


    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Instrument Serif', 'serif'],
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            border: "hsl(var(--border))",
            input: "hsl(var(--input))",
            ring: "hsl(var(--ring))",
            background: "hsl(var(--background))",
            foreground: "hsl(var(--foreground))",
            primary: {
              DEFAULT: "hsl(var(--primary))",
              foreground: "hsl(var(--primary-foreground))",
            },
            secondary: {
              DEFAULT: "hsl(var(--secondary))",
              foreground: "hsl(var(--secondary-foreground))",
            },
            accent: {
              DEFAULT: "hsl(var(--accent))",
              foreground: "hsl(var(--accent-foreground))",
            },
            muted: {
              DEFAULT: "hsl(var(--muted))",
              foreground: "hsl(var(--muted-foreground))",
            },
            card: {
              DEFAULT: "hsl(var(--card))",
              foreground: "hsl(var(--card-foreground))",
            },
            sky: {
              deep: "hsl(var(--sky-deep))",
              mid: "hsl(var(--sky-mid))",
              light: "hsl(var(--sky-light))",
              pale: "hsl(var(--sky-pale))",
            },
          },
          borderRadius: {
            lg: "var(--radius)",
            md: "calc(var(--radius) - 2px)",
            sm: "calc(var(--radius) - 4px)",
          },
          boxShadow: {
            soft: "0 10px 40px -10px hsl(212 80% 30% / 0.18)",
            glass: "0 20px 60px -20px hsl(212 80% 25% / 0.25)",
            pill: "0 8px 24px -8px hsl(220 45% 10% / 0.35)",
            glow: "0 0 60px hsl(72 100% 62% / 0.45)",
          },
          animation: {
            'float-slow': 'float-slow 9s ease-in-out infinite',
            'drift': 'drift 30s ease-in-out infinite alternate',
          },
          keyframes: {
            'float-slow': {
              '0%, 100%': { transform: 'translateY(0px) translateX(0px)' },
              '50%': { transform: 'translateY(-20px) translateX(10px)' },
            },
            'drift': {
              '0%': { transform: 'translateX(-5%)' },
              '100%': { transform: 'translateX(5%)' },
            }
          }
        }
      }
    }
    </script>
    <style type="text/tailwindcss">
      @layer base {
        :root {
          --background: 210 60% 98%;
          --foreground: 220 40% 10%;
          --card: 0 0% 100%;
          --card-foreground: 220 40% 10%;
          --popover: 0 0% 100%;
          --popover-foreground: 220 40% 10%;
          --primary: 220 45% 8%;
          --primary-foreground: 0 0% 100%;
          --secondary: 210 40% 96%;
          --secondary-foreground: 220 40% 10%;
          --muted: 210 30% 94%;
          --muted-foreground: 220 15% 40%;
          --accent: 72 100% 62%;
          --accent-foreground: 220 45% 8%;
          --sky-deep: 212 95% 45%;
          --sky-mid: 205 95% 60%;
          --sky-light: 200 100% 88%;
          --sky-pale: 205 100% 96%;
          --destructive: 0 84% 60%;
          --destructive-foreground: 0 0% 100%;
          --border: 215 25% 88%;
          --input: 215 25% 88%;
          --ring: 212 95% 45%;
          --radius: 1.25rem;
        }
        .dark {
          --background: 222.2 84% 4.9%;
          --foreground: 210 40% 98%;
        }
        body {
          @apply bg-background text-foreground antialiased font-sans;
        }
        h1, h2, h3, h4 {
          @apply font-display tracking-tight font-normal;
        }
      }
      @layer utilities {
        .glass {
          background: hsl(0 0% 100% / 0.55);
          backdrop-filter: blur(20px) saturate(160%);
          border: 1px solid hsl(0 0% 100% / 0.6);
        }
        .glass-dark {
          background: hsl(220 45% 8% / 0.6);
          backdrop-filter: blur(20px) saturate(160%);
          border: 1px solid hsl(0 0% 100% / 0.08);
        }
      }
    </style>
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
        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg" alt="TocToc Marketing" class="h-6 w-auto transition-transform group-hover:scale-105" />
    </a>
    
    <!-- Desktop Menu -->
    <div class="hidden items-center gap-6 lg:gap-8 md:flex">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-[13px] font-bold <?php echo is_front_page() ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Home</a>
        <a href="<?php echo esc_url( home_url( '/digital-marketing-agency-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('digital-marketing-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Services</a>
        <a href="<?php echo esc_url( home_url( '/seo-agency-services-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('seo-agency-services-cayman-islands') ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">AI Search Visibility</a>
        <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('website-design-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Web Design</a>

        <a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('about-toc-toc-marketing') ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">About</a>
    </div>

    <div class="flex items-center gap-4">
        <a href="tel:+13455478120" class="hidden sm:flex bg-accent text-accent-foreground h-11 px-6 rounded-full items-center gap-2 font-bold text-sm shadow-glow transition-transform hover:scale-105 decoration-none">
            Call Us
            <div class="w-6 h-6 rounded-full bg-primary text-primary-foreground flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </div>
        </a>
        
        <!-- Mobile Toggle -->
        <button id="menu-toggle" class="md:hidden w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 text-primary transition-colors">
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
            <a href="<?php echo esc_url( home_url( '/seo-agency-services-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('seo-agency-services-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">AEO/GEO/SEO</a>
            <a href="<?php echo esc_url( home_url( '/website-design-agency-cayman-islands/' ) ); ?>" class="text-4xl font-display <?php echo is_page('website-design-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">Web Design</a>

            <a href="<?php echo esc_url( home_url( '/about-toc-toc-marketing/' ) ); ?>" class="text-4xl font-display <?php echo is_page('about-toc-toc-marketing') ? 'text-sky-deep' : 'text-slate-900'; ?> decoration-none">About</a>
        </div>
        
        <div class="mt-auto">
            <a href="tel:+13455478120" class="w-full bg-slate-950 text-white h-16 rounded-2xl flex items-center justify-center gap-3 font-bold text-lg shadow-pill decoration-none">
                Call Us
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </a>
            <div>
                <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg" alt="TocToc Marketing" class="h-4 w-auto brightness-0 invert" />
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

