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
    $css_path     = get_theme_file_path( 'assets/css/app.css' );
    $css_min_path = get_theme_file_path( 'assets/css/app.min.css' );
    $version      = file_exists( $css_path ) ? filemtime( $css_path ) : wp_get_theme()->get( 'Version' );

    if ( file_exists( $css_min_path ) && filemtime( $css_min_path ) >= filemtime( $css_path ) ) {
        $css_uri = get_theme_file_uri( 'assets/css/app.min.css' );
    } else {
        $css_uri = get_theme_file_uri( 'assets/css/app.css' );
    }

    wp_enqueue_style( 'punchpros-app', $css_uri, [], $version );
}
add_action( 'wp_enqueue_scripts', 'punchpros_enqueue_assets' );

function punchpros_minify_css() {
    $src  = get_theme_file_path( 'assets/css/app.css' );
    $dest = get_theme_file_path( 'assets/css/app.min.css' );
    if ( ! file_exists( $src ) ) return;
    $css = file_get_contents( $src );
    $css = preg_replace( '#/\*(?!!).*?\*/#s', '', $css );
    $css = preg_replace( '/\s+/', ' ', $css );
    $css = preg_replace( '/\s*([:;{},>~+])\s*/', '$1', $css );
    $css = preg_replace( '/;}/', '}', $css );
    file_put_contents( $dest, trim( $css ) );
}
add_action( 'after_switch_theme', 'punchpros_minify_css' );

function punchpros_register_widgets() {
    register_sidebar( [
        'name'          => __( 'Main Sidebar', 'punchpros-theme' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Add widgets here to display in the main sidebar.', 'punchpros-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-8 p-5 bg-gray-light rounded-md">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title text-sm font-bold uppercase tracking-wider text-dark mb-3 pb-2 border-b-2 border-primary">',
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
    echo '<div class="container-pp py-10"><main id="main">';
}

function punchpros_wc_wrapper_end() {
    echo '</main></div>';
}

/**
 * Products per page on shop archive.
 */
add_filter( 'loop_shop_per_page', function () {
    return 12;
} );

/**
 * SEO: meta description + Open Graph tags per pagina-type.
 */
function punchpros_seo_meta() {
    $site_name = get_bloginfo( 'name' );
    $logo_url  = get_theme_file_uri( 'assets/images/logo-white.png' );

    if ( is_front_page() ) {
        $title       = $site_name . ' — Bokshandschoenen & MMA Gear Online Kopen';
        $description = 'PunchPros is jouw online vechtsportwinkel voor bokshandschoenen, MMA-uitrusting en beschermingsmateriaal. Gratis verzending boven €50. Bestel nu!';
        $image       = $logo_url;
        $url         = home_url( '/' );

    } elseif ( is_shop() ) {
        $title       = 'Alle Producten — ' . $site_name;
        $description = 'Ontdek ons volledige assortiment vechtsportartikelen: bokshandschoenen, MMA shorts, springtouwen, bokszakken en meer. Bestel snel en veilig.';
        $image       = $logo_url;
        $url         = get_permalink( wc_get_page_id( 'shop' ) );

    } elseif ( is_product_category() ) {
        $term        = get_queried_object();
        $cat_desc    = strip_tags( $term->description );
        $title       = $term->name . ' kopen — ' . $site_name;
        $description = $cat_desc ?: 'Bekijk ons assortiment ' . strtolower( $term->name ) . ' van topmerken. Snelle levering, scherpe prijzen.';
        $thumb       = get_term_meta( $term->term_id, 'thumbnail_id', true );
        $image       = $thumb ? wp_get_attachment_url( $thumb ) : $logo_url;
        $url         = get_term_link( $term );

    } elseif ( is_product() ) {
        global $post;
        $product     = wc_get_product( $post->ID );
        $title       = get_the_title() . ' — ' . $site_name;
        $description = $product ? wp_strip_all_tags( $product->get_short_description() ?: $product->get_description() ) : '';
        $description = $description ?: 'Koop ' . get_the_title() . ' bij PunchPros. Topkwaliteit vechtsportartikelen met snelle bezorging.';
        $description = wp_trim_words( $description, 25, '...' );
        $image       = get_the_post_thumbnail_url( $post->ID, 'large' ) ?: $logo_url;
        $url         = get_permalink();

    } elseif ( is_page() ) {
        $title       = get_the_title() . ' — ' . $site_name;
        $description = wp_trim_words( get_the_excerpt() ?: get_bloginfo( 'description' ), 25, '...' );
        $image       = get_the_post_thumbnail_url( get_the_ID(), 'large' ) ?: $logo_url;
        $url         = get_permalink();

    } else {
        return;
    }

    $description = esc_attr( wp_strip_all_tags( $description ) );
    $title       = esc_attr( $title );
    $image       = esc_url( $image );
    $url         = esc_url( $url );
    ?>
    <meta name="description" content="<?php echo $description; ?>">
    <meta property="og:type" content="<?php echo is_product() ? 'product' : 'website'; ?>">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:image" content="<?php echo $image; ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <meta name="twitter:image" content="<?php echo $image; ?>">
    <?php
}
add_action( 'wp_head', 'punchpros_seo_meta', 1 );

/**
 * SEO: canonical URL om duplicate content te voorkomen.
 */
function punchpros_canonical() {
    if ( is_singular() || is_front_page() || is_shop() || is_product_category() ) {
        $url = is_front_page() ? home_url( '/' ) : ( is_shop() ? get_permalink( wc_get_page_id( 'shop' ) ) : wp_get_canonical_url() );
        echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'punchpros_canonical', 2 );

/**
 * Sitemap: zorg dat de WP core sitemap actief is en voeg product-categorieën toe.
 */
add_filter( 'wp_sitemaps_post_types', function ( $post_types ) {
    // Zorg dat producten in de sitemap zitten
    if ( post_type_exists( 'product' ) && ! isset( $post_types['product'] ) ) {
        $post_types['product'] = get_post_type_object( 'product' );
    }
    return $post_types;
} );

add_filter( 'wp_sitemaps_taxonomies', function ( $taxonomies ) {
    // Voeg product categorieën toe aan de sitemap
    if ( taxonomy_exists( 'product_cat' ) && ! isset( $taxonomies['product_cat'] ) ) {
        $taxonomies['product_cat'] = get_taxonomy( 'product_cat' );
    }
    return $taxonomies;
} );

/**
 * Schema.org JSON-LD gestructureerde data.
 */
function punchpros_schema_jsonld() {
    $site_name = get_bloginfo( 'name' );
    $site_url  = home_url( '/' );
    $logo_url  = get_theme_file_uri( 'assets/images/logo-white.png' );
    $schemas   = [];

    // WebSite schema op elke pagina (voor sitelinks-zoekfunctie in Google)
    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'name'     => $site_name,
        'url'      => $site_url,
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => [
                '@type'       => 'EntryPoint',
                'urlTemplate' => home_url( '/?s={search_term_string}&post_type=product' ),
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];

    // Organization schema op de homepage
    if ( is_front_page() ) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type'    => 'Organization',
            'name'     => $site_name,
            'url'      => $site_url,
            'logo'     => [
                '@type' => 'ImageObject',
                'url'   => $logo_url,
            ],
            'contactPoint' => [
                '@type'       => 'ContactPoint',
                'telephone'   => '+31640260209',
                'contactType' => 'customer service',
                'areaServed'  => 'NL',
                'availableLanguage' => 'Dutch',
            ],
            'address' => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Salverdastraat 8',
                'addressLocality' => 'Sneek',
                'postalCode'      => '8602 AV',
                'addressCountry'  => 'NL',
            ],
            'sameAs' => [
                'https://www.instagram.com/punchpros/',
                'https://www.facebook.com/punchpros/',
            ],
        ];
    }

    // Product schema op productpagina's
    if ( is_product() ) {
        global $post;
        $product = wc_get_product( $post->ID );
        if ( $product ) {
            $price       = $product->get_price();
            $reg_price   = $product->get_regular_price();
            $image_url   = get_the_post_thumbnail_url( $post->ID, 'large' ) ?: $logo_url;
            $in_stock    = $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock';
            $description = wp_strip_all_tags( $product->get_short_description() ?: $product->get_description() );

            $schema = [
                '@context'    => 'https://schema.org',
                '@type'       => 'Product',
                'name'        => get_the_title(),
                'description' => wp_trim_words( $description, 50, '...' ),
                'image'       => $image_url,
                'url'         => get_permalink(),
                'sku'         => $product->get_sku() ?: (string) $product->get_id(),
                'brand'       => [
                    '@type' => 'Brand',
                    'name'  => $site_name,
                ],
                'offers' => [
                    '@type'           => 'Offer',
                    'url'             => get_permalink(),
                    'priceCurrency'   => get_woocommerce_currency(),
                    'price'           => $price,
                    'availability'    => $in_stock,
                    'itemCondition'   => 'https://schema.org/NewCondition',
                    'seller'          => [
                        '@type' => 'Organization',
                        'name'  => $site_name,
                    ],
                ],
            ];

            // Voeg aanbiedingsprijs toe als er een sale is
            if ( $product->is_on_sale() && $reg_price ) {
                $schema['offers']['priceValidUntil'] = date( 'Y-12-31' );
            }

            $schemas[] = $schema;
        }
    }

    // BreadcrumbList op categorie- en productpagina's
    if ( is_product_category() ) {
        $term      = get_queried_object();
        $ancestors = array_reverse( get_ancestors( $term->term_id, 'product_cat', 'taxonomy' ) );
        $items     = [
            [ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $site_url ],
            [ '@type' => 'ListItem', 'position' => 2, 'name' => 'Shop', 'item' => get_permalink( wc_get_page_id( 'shop' ) ) ],
        ];
        $pos = 3;
        foreach ( $ancestors as $ancestor_id ) {
            $ancestor = get_term( $ancestor_id, 'product_cat' );
            if ( ! is_wp_error( $ancestor ) ) {
                $items[] = [ '@type' => 'ListItem', 'position' => $pos++, 'name' => $ancestor->name, 'item' => get_term_link( $ancestor ) ];
            }
        }
        $items[] = [ '@type' => 'ListItem', 'position' => $pos, 'name' => $term->name, 'item' => get_term_link( $term ) ];

        $schemas[] = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

    if ( empty( $schemas ) ) return;

    echo '<script type="application/ld+json">' . wp_json_encode( $schemas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'punchpros_schema_jsonld', 5 );

/**
 * Mini-cart sidebar: AJAX endpoint to get cart contents.
 */
function punchpros_mini_cart_fragments() {
    $items = [];
    if ( WC()->cart ) {
        foreach ( WC()->cart->get_cart() as $key => $item ) {
            $product   = $item['data'];
            $thumbnail = wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail' ) ?: wc_placeholder_img_src( 'thumbnail' );
            $items[]   = [
                'key'       => $key,
                'name'      => $product->get_name(),
                'qty'       => $item['quantity'],
                'price'     => html_entity_decode( strip_tags( WC()->cart->get_product_subtotal( $product, $item['quantity'] ) ) ),
                'thumbnail' => $thumbnail,
                'permalink' => get_permalink( $item['product_id'] ),
            ];
        }
    }
    wp_send_json_success( [
        'items' => $items,
        'total' => html_entity_decode( strip_tags( WC()->cart->get_cart_subtotal() ) ),
        'count' => WC()->cart->get_cart_contents_count(),
    ] );
}
add_action( 'wp_ajax_pp_get_mini_cart', 'punchpros_mini_cart_fragments' );
add_action( 'wp_ajax_nopriv_pp_get_mini_cart', 'punchpros_mini_cart_fragments' );

/**
 * Mini-cart sidebar: AJAX remove item.
 */
function punchpros_mini_cart_remove() {
    $key = isset( $_POST['cart_key'] ) ? sanitize_text_field( $_POST['cart_key'] ) : '';
    if ( $key ) {
        WC()->cart->remove_cart_item( $key );
    }
    punchpros_mini_cart_fragments();
}
add_action( 'wp_ajax_pp_remove_cart_item', 'punchpros_mini_cart_remove' );
add_action( 'wp_ajax_nopriv_pp_remove_cart_item', 'punchpros_mini_cart_remove' );

/**
 * Mini-cart sidebar: enqueue JS + pass ajax url.
 */
function punchpros_mini_cart_scripts() {
    if ( ! class_exists( 'WooCommerce' ) ) return;

    $js_path = get_theme_file_path( 'assets/js/mini-cart.js' );
    $version = file_exists( $js_path ) ? filemtime( $js_path ) : '1.0';
    wp_enqueue_script( 'pp-mini-cart', get_theme_file_uri( 'assets/js/mini-cart.js' ), [ 'jquery' ], $version, true );
    wp_localize_script( 'pp-mini-cart', 'ppCart', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'pp_cart_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'punchpros_mini_cart_scripts' );

/**
 * Add custom classes to nav menu links.
 */
add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( $args->theme_location === 'primary' ) {
        $atts['class'] = 'text-white text-sm font-bold tracking-wider hover:text-primary transition-colors no-underline';
        $atts['style']  = 'font-family: var(--font-heading);';
    }
    return $atts;
}, 10, 3 );
