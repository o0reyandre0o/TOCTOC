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

// Dynamic XML Sitemap at /sitemap.xml
function toctoc_sitemap_rewrite() {
    add_rewrite_rule( '^sitemap\.xml$', 'index.php?toctoc_sitemap=1', 'top' );
}
add_action( 'init', 'toctoc_sitemap_rewrite' );

function toctoc_sitemap_query_vars( $vars ) {
    $vars[] = 'toctoc_sitemap';
    return $vars;
}
add_filter( 'query_vars', 'toctoc_sitemap_query_vars' );

function toctoc_serve_sitemap() {
    if ( ! get_query_var( 'toctoc_sitemap' ) ) {
        return;
    }
    header( 'Content-Type: application/xml; charset=utf-8' );
    $today = date( 'Y-m-d' );
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url><loc>https://toctoc.ky/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>1.0</priority></url>
  <url><loc>https://toctoc.ky/seo-agency-services-cayman-islands/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.9</priority></url>
  <url><loc>https://toctoc.ky/digital-marketing-agency-cayman-islands/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.9</priority></url>
  <url><loc>https://toctoc.ky/website-design-agency-cayman-islands/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.9</priority></url>
  <url><loc>https://toctoc.ky/social-media-marketing-services-cayman-islands/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.8</priority></url>
  <url><loc>https://toctoc.ky/about-toc-toc-marketing/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.7</priority></url>
  <url><loc>https://toctoc.ky/cookie-policy/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.2</priority></url>
  <url><loc>https://toctoc.ky/privacy-policy/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.2</priority></url>
  <url><loc>https://toctoc.ky/terms-and-conditions/</loc><lastmod><?php echo esc_html( $today ); ?></lastmod><priority>0.2</priority></url>
</urlset>
    <?php
    exit;
}
add_action( 'template_redirect', 'toctoc_serve_sitemap' );
