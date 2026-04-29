<?php
/**
 * TOCTOC functions and definitions
 */

function toctoc_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'toctoc_setup' );

function toctoc_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'toctoc-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;600;700&display=swap', array(), null );

    // Enqueue Webflow Shared CSS (Crucial for the exact replica)
    wp_enqueue_style( 'toctoc-webflow-shared', 'https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/css/catalis-temlis.webflow.shared.53a618a0b.min.css', array(), null );

    // Main stylesheet
    wp_enqueue_style( 'toctoc-style', get_stylesheet_uri(), array(), '1.0' );

    // GSAP and other scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'gsap', 'https://cdn.prod.website-files.com/gsap/3.15.0/gsap.min.js', array(), '3.15.0', true );
    wp_enqueue_script( 'gsap-splittext', 'https://cdn.prod.website-files.com/gsap/3.15.0/SplitText.min.js', array('gsap'), '3.15.0', true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdn.prod.website-files.com/gsap/3.15.0/ScrollTrigger.min.js', array('gsap'), '3.15.0', true );
    
    // Webflow specific JS
    wp_enqueue_script( 'toctoc-webflow-js', 'https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/js/webflow.459743b6.e15722ff015d5abf.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'toctoc_scripts' );
