<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="nav-bar">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
        TocToc <strong>Marketing</strong>
    </a>
    <div class="nav-links">
        <a href="#about" class="nav-link">About</a>
        <a href="#loop" class="nav-link">Loop</a>
        <a href="#portfolio" class="nav-link">Portfolio</a>
    </div>
    <a href="#" class="btn-neon">Get Started</a>
</nav>
