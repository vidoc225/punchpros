<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'min-h-screen flex flex-col' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site flex flex-col flex-1">

    <header id="masthead" class="site-header sticky top-0 z-40 bg-brand-primary text-white shadow-lg">
        <div class="container-pp py-4 flex flex-wrap items-center justify-between gap-4">
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <p class="site-title text-xl font-bold tracking-tight m-0">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white no-underline hover:no-underline" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </p>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description ) : ?>
                        <p class="site-description text-xs text-white/60 m-0"><?php echo esc_html( $description ); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'punchpros-theme' ); ?>">
                <?php
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'flex flex-wrap gap-6 list-none p-0 m-0 text-sm font-medium [&_a]:text-white/85 [&_a]:no-underline hover:[&_a]:text-brand-accent [&_.current-menu-item>a]:text-brand-accent',
                    'container'      => false,
                    'fallback_cb'    => '__return_false',
                ] );
                ?>
            </nav>

            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                   class="relative inline-flex items-center gap-2 text-white hover:text-brand-accent no-underline text-sm font-medium"
                   aria-label="<?php esc_attr_e( 'Cart', 'punchpros-theme' ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="cart-count inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 rounded-full bg-brand-accent text-white text-xs font-bold">
                        <?php echo esc_html( WC()->cart ? WC()->cart->get_cart_contents_count() : 0 ); ?>
                    </span>
                </a>
            <?php endif; ?>
        </div>
    </header>

    <div id="content" class="site-content-wrapper flex-1">
