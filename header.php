<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            'title' => 'TocToc Marketing | AI-Driven Revenue Loop Agency Cayman',
            'desc' => 'Leading digital marketing agency in the Cayman Islands. We build the Revenue Loop for your business. Speed, AI Visibility, and Growth for the 2026 era.'
        ],
        'seo-agency-services-cayman-islands' => [
            'title' => 'AEO, GEO & SEO Services Cayman | TocToc Marketing',
            'desc' => 'Dominate the Answer Economy. Our AEO, GEO, and SEO services ensure your business is the first recommendation by AI and search engines alike.'
        ],
        'digital-marketing-agency-cayman-islands' => [
            'title' => 'Full-Service Digital Marketing Agency Cayman | TocToc',
            'desc' => 'From professional branding to high-impact graphic design. We provide comprehensive digital marketing solutions tailored for Cayman businesses.'
        ],
        'website-design-agency-cayman-islands' => [
            'title' => 'Premium Website Design Agency Cayman Islands | TocToc',
            'desc' => 'We build websites AI loves and humans trust. High-performance, mobile-optimized web design that converts visitors into leads.'
        ],
        'social-media-marketing-services-cayman-islands' => [
            'title' => 'Social Media Marketing & Management Cayman | TocToc',
            'desc' => 'Scale your local impact with data-driven social media strategies. We manage your presence so you can focus on your business.'
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
    $current_url = home_url(add_query_arg([], $GLOBALS['wp']->request));
    $canonical = is_front_page() ? home_url('/') : trailingslashit($current_url);
    ?>

    <title><?php echo esc_html($title); ?></title>
    <meta name="description" content="<?php echo esc_attr($desc); ?>">
    <?php if (is_404()): ?>
    <meta name="robots" content="noindex, follow">
    <?php else: ?>
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <?php endif; ?>
    
    <!-- GA4 Tag (Replace G-XXXXXXXXXX with your actual ID) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-XXXXXXXXXX');
    </script>

    <!-- Image Source for legacy crawlers -->
    <link rel="image_src" href="<?php echo esc_url($logo_url); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="TocToc Marketing">
    <meta property="og:url" content="<?php echo esc_url($current_url); ?>">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($desc); ?>">
    <meta property="og:image" content="<?php echo esc_url($logo_url); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo esc_url($current_url); ?>">
    <meta property="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta property="twitter:description" content="<?php echo esc_attr($desc); ?>">
    <meta property="twitter:image" content="<?php echo esc_url($logo_url); ?>">

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
              "description": "AI-driven web developer specializing in vibe coding, WordPress, and Elementor. Builds high-performance websites optimized for AI search visibility.",
              "knowsAbout": ["Vibe Coding", "WordPress Development", "Elementor", "AI-Assisted Development", "Web Performance"],
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

<nav class="fixed top-6 left-1/2 -translate-x-1/2 w-[90%] max-w-6xl h-16 glass rounded-full flex items-center justify-between px-8 z-[1000] shadow-soft border border-white/50">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center group decoration-none">
        <img src="https://toctoc.ky/wp-content/uploads/2026/05/toctoc-new-logo-02.svg" alt="TocToc Marketing" class="h-6 w-auto transition-transform group-hover:scale-105" />
    </a>
    
    <!-- Desktop Menu -->
    <div class="hidden items-center gap-6 lg:gap-8 md:flex">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-[13px] font-bold <?php echo is_front_page() ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Home</a>
        <a href="<?php echo esc_url( home_url( '/digital-marketing-agency-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('digital-marketing-agency-cayman-islands') ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">Services</a>
        <a href="<?php echo esc_url( home_url( '/seo-agency-services-cayman-islands/' ) ); ?>" class="text-[13px] font-bold <?php echo is_page('seo-agency-services-cayman-islands') ? 'text-sky-deep' : 'text-slate-500'; ?> hover:text-primary transition-colors decoration-none uppercase tracking-wider">AEO/GEO/SEO</a>
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

