<!DOCTYPE html>
<html <?php language_attributes(); ?> data-wf-domain="catalis-temlis.webflow.io" data-wf-page="690a3d4b70be67fbdfcdc07d" data-wf-site="690a3d4b70be67fbdfcdc08a">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        html.w-mod-js:not(.w-mod-ix3) :is([animation="heading"], [animation="description"], [animation="card"], .blog_hero-card, .blog_main-img, [animation="badge"], [animation="large-heading"], [navbar="item"]) {
            visibility: hidden !important;
        }
        
        /* Global Styles from provided HTML */
        body {
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
          font-smoothing: antialiased;
          text-rendering: optimizeLegibility;
        }

        *[tabindex]:focus-visible,
        input[type="file"]:focus-visible {
           outline: 0.125rem solid #4d65ff;
           outline-offset: 0.125rem;
        }

        .inherit-color * {
            color: inherit;
        }

        .w-richtext > :not(div):first-child, .w-richtext > div:first-child > :first-child {
          margin-top: 0 !important;
        }

        .w-richtext>:last-child, .w-richtext ol li:last-child, .w-richtext ul li:last-child {
            margin-bottom: 0 !important;
        }

        .container-medium,.container-small, .container-large {
            margin-right: auto !important;
            margin-left: auto !important;
        }

        .text-style-3lines {
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .text-style-2lines {
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .display-inlineflex {
          display: inline-flex;
        }

        .hide { display: none !important; }
        @media screen and (max-width: 991px) { .hide, .hide-tablet { display: none !important; } }
        @media screen and (max-width: 767px) { .hide-mobile-landscape { display: none !important; } }
        @media screen and (max-width: 479px) { .hide-mobile { display: none !important; } }
         
        .margin-0 { margin: 0rem !important; }
        .padding-0 { padding: 0rem !important; }
        .spacing-clean { padding: 0rem !important; margin: 0rem !important; }
        
        .sidebar::-webkit-scrollbar { display: none; }
        .sidebar { -ms-overflow-style: none; scrollbar-width: none; }
        .spacer * { padding: 0 }
    </style>
</head>
<body <?php body_class(); ?>>
<div class="page-wrapper">
    <div data-animation="default" class="navbar w-nav" data-wf--navbar--variant="base" data-easing2="ease-in-back" data-easing="ease-out" data-collapse="medium" data-w-id="9edf84aa-1c78-d247-2c17-fa546717f184" role="banner" data-no-scroll="1" data-duration="500">
        <div navbar="spacer" class="nav_space"></div>
        <div class="padding-global is-navbar">
            <div class="container-large is-navbar">
                <div class="navbar_content">
                    <a navbar="item" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar_logo-link w-nav-brand w--current">
                        <img loading="lazy" src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/691f4a20bd808c37c4b9e22b_navbar-logo.svg" alt="" class="navbar_logo"/>
                    </a>
                    <div class="nav_wrap">
                        <nav role="navigation" class="nav_mobile w-nav-menu">
                            <div class="navbar_list">
                                <a href="#" navbar="item" class="nav_links w-nav-link">Home</a>
                                <a href="#" navbar="item" class="nav_links w-nav-link">About us</a>
                                <a href="#" navbar="item" class="nav_links w-nav-link">Pricing</a>
                                <a href="#" navbar="item" class="nav_links w-nav-link">Contact</a>
                                <div data-delay="0" data-hover="false" navbar="item" class="nav_dropdown w-dropdown">
                                    <div class="nav_links is-dropdown w-dropdown-toggle">
                                        <div class="text-block">Pages</div>
                                        <div class="nav_link-icon w-icon-dropdown-toggle"></div>
                                    </div>
                                    <nav class="nav_link-dropdown w-dropdown-list">
                                        <div class="nav_dropdown-wrap">
                                            <div class="nav_dropdown-content">
                                                <div class="nav_dropdown-column">
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">Home V.1</a>
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">Home V.2</a>
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">Home V.3</a>
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">Features</a>
                                                </div>
                                                <div class="nav_dropdown-column">
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">Contact V.1</a>
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">Contact V.2</a>
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">Contact V.3</a>
                                                    <a href="#" class="nav_dropdown-link w-dropdown-link">About</a>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="nav_buttons-wrap">
                        <div navbar="item" class="login-wrap hide-mobile-landscape">
                            <a animation="" data-wf--button--variant="base" href="#" class="button_component w-inline-block">
                                <div class="button_content">
                                    <div class="button_text is-one">Get Started</div>
                                    <div class="button_text is-two">Get Started</div>
                                </div>
                            </a>
                        </div>
                        <div class="menu-button w-nav-button">
                            <div class="nav-button_component">
                                <div class="nav-button_line is-first"></div>
                                <div class="nav-button_line is-second"></div>
                                <div class="nav-button_line is-third"></div>
                            </div>
                        </div>
                    </div>
                    <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/691f4cb2f2e0d266846b0e5f_corner-left.svg" loading="lazy" alt="" class="corner-left"/>
                    <img src="https://cdn.prod.website-files.com/690a3d4b70be67fbdfcdc08a/691f4cb23e859b753cec6ff2_corner-right.svg" loading="lazy" alt="" class="corner-right"/>
                </div>
            </div>
        </div>
    </div>
