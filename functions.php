<?php
/**
 * TOCTOC Modern Theme Functions
 */

function toctoc_modern_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'toctoc_modern_setup' );

function toctoc_modern_scripts() {
    wp_enqueue_style( 'toctoc-style', get_stylesheet_uri(), array(), '2.0' );
    
    // Add custom inline CSS for smooth scrolling
    wp_add_inline_style( 'toctoc-style', 'html { scroll-behavior: smooth; }' );
}
add_action( 'wp_enqueue_scripts', 'toctoc_modern_scripts' );
