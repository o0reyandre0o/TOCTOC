<?php
/**
 * TOCTOC Premium Theme Functions
 */

function toctoc_setup() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'toctoc_setup' );

function toctoc_scripts() {
    wp_enqueue_style( 'toctoc-style', get_stylesheet_uri(), array(), '3.0' );
    
    // Inline script for smooth scrolling
    wp_add_inline_style( 'toctoc-style', 'html { scroll-behavior: smooth; }' );
}
add_action( 'wp_enqueue_scripts', 'toctoc_scripts' );

// Register Legal Page Template
function toctoc_register_legal_template( $templates ) {
    $templates['page-legal.php'] = 'Legal Page';
    return $templates;
}
add_filter( 'theme_page_templates', 'toctoc_register_legal_template' );

// Dynamic XML Sitemap at /sitemap.xml — intercepts before WordPress routing, no permalink flush needed
add_action( 'init', function () {
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    // Strip query string for comparison
    $path = strtok( $uri, '?' );
    if ( $path !== '/sitemap.xml' ) {
        return;
    }
    header( 'Content-Type: application/xml; charset=utf-8' );
    $today = gmdate( 'Y-m-d' );
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    $urls = [
        [ 'https://toctoc.ky/',                                                    '1.0' ],
        [ 'https://toctoc.ky/seo-agency-services-cayman-islands/',                 '0.9' ],
        [ 'https://toctoc.ky/digital-marketing-agency-cayman-islands/',            '0.9' ],
        [ 'https://toctoc.ky/website-design-agency-cayman-islands/',               '0.9' ],
        [ 'https://toctoc.ky/social-media-marketing-services-cayman-islands/',     '0.8' ],
        [ 'https://toctoc.ky/about-toc-toc-marketing/',                            '0.7' ],
        [ 'https://toctoc.ky/cookie-policy/',                                      '0.2' ],
        [ 'https://toctoc.ky/privacy-policy/',                                     '0.2' ],
        [ 'https://toctoc.ky/terms-and-conditions/',                               '0.2' ],
    ];
    foreach ( $urls as [ $loc, $priority ] ) {
        echo "  <url><loc>{$loc}</loc><lastmod>{$today}</lastmod><priority>{$priority}</priority></url>\n";
    }
    echo '</urlset>';
    exit;
} );
