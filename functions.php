<?php
/**
 * TOCTOC Premium Theme Functions
 */

function toctoc_setup() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'toctoc_setup' );

// Free SEO / GEO / AEO checker tool (AJAX endpoints for /seo-checker/).
require_once get_template_directory() . '/seo-checker-tool.php';

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

/**
 * Render a visible FAQ accordion plus matching FAQPage JSON-LD.
 * The answer text stays visible in the DOM — required for FAQ rich results and
 * it is exactly what AI answer engines (ChatGPT, Perplexity, Google AI) read.
 * Pass $faqs as [ ['q' => 'Question?', 'a' => 'Answer.'], ... ].
 */
function toctoc_render_faq( $faqs, $eyebrow = 'FAQ', $heading = 'Frequently Asked Questions' ) {
    if ( empty( $faqs ) ) {
        return;
    }
    ?>
    <section class="py-24 md:py-32 bg-white">
        <div class="mx-auto max-w-4xl px-6">
            <div class="text-center mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-deep"><?php echo esc_html( $eyebrow ); ?></span>
                <h2 class="mt-6 text-5xl md:text-7xl font-display text-slate-900 leading-[0.9]"><?php echo wp_kses_post( $heading ); ?></h2>
            </div>
            <div class="space-y-4">
                <?php foreach ( $faqs as $faq ) : ?>
                <details class="group rounded-[1.75rem] border border-slate-100 bg-slate-50 p-7 shadow-soft transition-all open:bg-white">
                    <summary class="flex cursor-pointer items-center justify-between gap-4 text-xl md:text-2xl font-display text-slate-900 list-none [&::-webkit-details-marker]:hidden">
                        <span><?php echo esc_html( $faq['q'] ); ?></span>
                        <span class="shrink-0 inline-flex items-center justify-center w-9 h-9 rounded-full bg-sky-pale text-sky-deep transition-transform group-open:rotate-45">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                        </span>
                    </summary>
                    <p class="mt-5 text-base md:text-lg leading-relaxed text-slate-600"><?php echo wp_kses_post( $faq['a'] ); ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <script type="application/ld+json">
    <?php
    $entities = array_map( function ( $faq ) {
        return [
            '@type'          => 'Question',
            'name'           => wp_strip_all_tags( $faq['q'] ),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags( $faq['a'] ),
            ],
        ];
    }, $faqs );
    echo wp_json_encode( [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    ?>
    </script>
    <?php
}

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
        [ 'https://toctoc.ky/web-development-cayman-islands/',                      '0.8' ],
        [ 'https://toctoc.ky/advertising-pr-agency-cayman-islands/',               '0.8' ],
        [ 'https://toctoc.ky/about-toc-toc-marketing/',                            '0.7' ],
        [ 'https://toctoc.ky/venezuela/',                                          '0.9' ],
        [ 'https://toctoc.ky/seo-checker/',                                        '0.7' ],
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
