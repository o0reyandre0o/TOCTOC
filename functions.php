<?php
/**
 * TOCTOC Premium Theme Functions
 */

function toctoc_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'toctoc_setup' );

function toctoc_scripts() {
    wp_enqueue_style( 'toctoc-style', get_stylesheet_uri(), array(), '3.0' );
    
    // Inline script for smooth scrolling
    wp_add_inline_style( 'toctoc-style', 'html { scroll-behavior: smooth; }' );
}
add_action( 'wp_enqueue_scripts', 'toctoc_scripts' );
