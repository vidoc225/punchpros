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

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'punchpros-theme' ),
        'footer'  => __( 'Footer Navigation', 'punchpros-theme' ),
    ] );
}
add_action( 'after_setup_theme', 'punchpros_setup' );

function punchpros_enqueue_assets() {
    wp_enqueue_style(
        'punchpros-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'punchpros_enqueue_assets' );

function punchpros_register_widgets() {
    register_sidebar( [
        'name'          => __( 'Main Sidebar', 'punchpros-theme' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Add widgets here to display in the main sidebar.', 'punchpros-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Widgets', 'punchpros-theme' ),
        'id'            => 'sidebar-footer',
        'description'   => __( 'Add widgets here to display in the footer.', 'punchpros-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ] );
}
add_action( 'widgets_init', 'punchpros_register_widgets' );

function punchpros_content_width() {
    $GLOBALS['content_width'] = 840;
}
add_action( 'after_setup_theme', 'punchpros_content_width', 0 );
