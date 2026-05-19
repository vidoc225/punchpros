<?php
defined( 'ABSPATH' ) || exit;

function punchpros_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'customize-selective-refresh-widgets' );

    // WooCommerce
    add_theme_support( 'woocommerce', [
        'thumbnail_image_width' => 400,
        'single_image_width'    => 800,
        'product_grid'          => [
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 6,
        ],
    ] );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'punchpros-theme' ),
        'footer'  => __( 'Footer Navigation', 'punchpros-theme' ),
    ] );
}
add_action( 'after_setup_theme', 'punchpros_setup' );

function punchpros_enqueue_assets() {
    $css_path = get_theme_file_path( 'assets/css/app.css' );
    $css_uri  = get_theme_file_uri( 'assets/css/app.css' );
    $version  = file_exists( $css_path ) ? filemtime( $css_path ) : wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'punchpros-app', $css_uri, [], $version );
}
add_action( 'wp_enqueue_scripts', 'punchpros_enqueue_assets' );

function punchpros_register_widgets() {
    register_sidebar( [
        'name'          => __( 'Main Sidebar', 'punchpros-theme' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Add widgets here to display in the main sidebar.', 'punchpros-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-8 p-5 bg-brand-light rounded-md">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title text-sm font-bold uppercase tracking-wider text-brand-primary mb-3 pb-2 border-b-2 border-brand-accent">',
        'after_title'   => '</h2>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Widgets', 'punchpros-theme' ),
        'id'            => 'sidebar-footer',
        'description'   => __( 'Add widgets here to display in the footer.', 'punchpros-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title text-sm font-bold uppercase tracking-wider text-white/90 mb-3">',
        'after_title'   => '</h2>',
    ] );
}
add_action( 'widgets_init', 'punchpros_register_widgets' );

function punchpros_content_width() {
    $GLOBALS['content_width'] = 840;
}
add_action( 'after_setup_theme', 'punchpros_content_width', 0 );

/**
 * WooCommerce: replace default wrapper with our own.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'punchpros_wc_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'punchpros_wc_wrapper_end', 10 );

function punchpros_wc_wrapper_start() {
    echo '<div class="container-pp py-10"><div class="flex flex-col lg:flex-row gap-8"><main id="main" class="flex-1 min-w-0">';
}

function punchpros_wc_wrapper_end() {
    echo '</main>';
    if ( is_active_sidebar( 'sidebar-main' ) ) {
        echo '<aside class="w-full lg:w-80 flex-shrink-0">';
        dynamic_sidebar( 'sidebar-main' );
        echo '</aside>';
    }
    echo '</div></div>';
}

/**
 * Products per page on shop archive.
 */
add_filter( 'loop_shop_per_page', function () {
    return 12;
} );
