<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php if ( is_front_page() ) : ?>
    <link rel="preload" as="image" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-bg.webp' ) ); ?>">
    <?php elseif ( is_page( 'over-ons' ) ) : ?>
    <link rel="preload" as="image" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/over-ons-foto.webp' ) ); ?>">
    <?php endif; ?>
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'min-h-screen flex flex-col' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site flex flex-col flex-1">

    <header id="masthead" class="site-header fixed top-0 left-0 right-0 z-50 bg-black border-b border-black">
        <div class="container-pp h-16 flex items-center justify-between">
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center no-underline hover:no-underline" rel="home">
                        <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-white.png' ) ); ?>"
                             alt="<?php bloginfo( 'name' ); ?> — Bokshandschoenen & MMA Gear"
                             class="h-6 w-auto">
                    </a>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation hidden md:flex items-center gap-6 lg:gap-10" aria-label="<?php esc_attr_e( 'Primary Navigation', 'punchpros-theme' ); ?>">
                <?php
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'flex items-center gap-6 lg:gap-10 list-none p-0 m-0',
                    'container'      => false,
                    'fallback_cb'    => '__return_false',
                ] );
                ?>
            </nav>

            <div class="flex items-center gap-4 text-white">
                <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                       class="relative inline-flex items-center text-white hover:text-primary no-underline transition-colors"
                       aria-label="<?php esc_attr_e( 'Cart', 'punchpros-theme' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="absolute -top-1 -right-2 bg-primary text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center" style="text-shadow: 0 0 2px rgba(0,0,0,0.8);">
                            <?php echo esc_html( WC()->cart ? WC()->cart->get_cart_contents_count() : 0 ); ?>
                        </span>
                    </a>
                <?php endif; ?>

                <!-- Mobile hamburger -->
                <button id="pp-mobile-toggle" class="md:hidden text-white bg-transparent border-0 cursor-pointer p-1" aria-label="Menu openen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div id="pp-mobile-overlay" class="fixed inset-0 bg-black/60 z-40 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>

    <!-- Mobile Menu Panel -->
    <nav id="pp-mobile-menu" class="fixed top-0 left-0 w-full bg-black z-40 -translate-y-full transition-transform duration-300 md:hidden" style="padding-top: 64px;">
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'menu_id'        => 'mobile-menu',
            'menu_class'     => 'flex flex-col list-none p-0 m-0',
            'container'      => false,
            'fallback_cb'    => '__return_false',
            'link_before'    => '',
            'link_after'     => '',
        ] );
        ?>
    </nav>

    <div id="content" class="site-content-wrapper flex-1" style="margin-top: 64px;">
