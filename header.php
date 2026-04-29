<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="nav-pillar">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
        <div style="width: 32px; height: 32px; background: #000; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 14px; font-weight: 800;">T</div>
        TocToc <span style="font-weight: 400; font-style: italic; color: #64748b; margin-left: 4px;">Marketing</span>
    </a>
    <div class="nav-links">
        <a href="#home" class="nav-link">Home</a>
        <a href="#loop" class="nav-link">Loop</a>
        <a href="#process" class="nav-link">Process</a>
        <a href="#portfolio" class="nav-link">Portfolio</a>
    </div>
    <a href="#contact" class="btn-nav">
        Book a Call
        <div style="width: 24px; height: 24px; background: #000; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
        </div>
    </a>
</nav>
