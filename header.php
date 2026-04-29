<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="nav-container">
    <div class="container">
        <div class="nav-content">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
                TOCTOC<span>.</span>
            </a>
            <div class="nav-links">
                <a href="#about" class="nav-link">About</a>
                <a href="#loop" class="nav-link">Revenue Loop</a>
                <a href="#portfolio" class="nav-link">Portfolio</a>
                <a href="#" class="btn btn-primary" style="padding: 0.5rem 1.2rem; font-size: 0.85rem;">Consultation</a>
            </div>
        </div>
    </div>
</nav>
