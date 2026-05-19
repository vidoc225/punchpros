<?php get_header(); ?>

<?php // ── Hero Section ── ?>
<section class="hero relative overflow-hidden bg-gradient-to-br from-brand-primary via-brand-dark to-brand-primary">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -right-20 -top-20 h-96 w-96 rounded-full bg-brand-accent blur-3xl"></div>
        <div class="absolute -left-20 -bottom-20 h-80 w-80 rounded-full bg-brand-accent blur-3xl"></div>
    </div>

    <div class="container-pp relative z-10 py-24 sm:py-32 lg:py-40 text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight text-balance">
            <?php esc_html_e( 'Gear Up.', 'punchpros-theme' ); ?>
            <span class="text-brand-accent"><?php esc_html_e( 'Fight Hard.', 'punchpros-theme' ); ?></span>
        </h1>

        <p class="mt-6 text-lg sm:text-xl text-white/70 max-w-2xl mx-auto leading-relaxed">
            <?php esc_html_e( 'Premium boxing and fight gear for every level. From first-timers to champions — we\'ve got you covered.', 'punchpros-theme' ); ?>
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn text-base px-8 py-3.5">
                <?php esc_html_e( 'Shop Now', 'punchpros-theme' ); ?>
            </a>
            <?php
            $sale_page = get_permalink( wc_get_page_id( 'shop' ) );
            if ( $sale_page ) : ?>
                <a href="<?php echo esc_url( add_query_arg( 'on_sale', 'true', $sale_page ) ); ?>" class="btn-outline text-base px-8 py-3.5 text-white border-white hover:bg-white hover:text-brand-primary">
                    <?php esc_html_e( 'View Deals', 'punchpros-theme' ); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php // ── Featured Products ── ?>
<?php if ( class_exists( 'WooCommerce' ) ) : ?>
<section class="featured-products bg-white py-16 sm:py-20">
    <div class="container-pp">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-brand-primary"><?php esc_html_e( 'Featured Gear', 'punchpros-theme' ); ?></h2>
            <p class="mt-3 text-gray-600 max-w-xl mx-auto"><?php esc_html_e( 'Hand-picked equipment trusted by fighters worldwide.', 'punchpros-theme' ); ?></p>
        </div>

        <?php
        echo do_shortcode( '[products limit="8" columns="4" visibility="featured" orderby="date"]' );
        ?>

        <div class="mt-10 text-center">
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn-outline">
                <?php esc_html_e( 'View All Products', 'punchpros-theme' ); ?> &rarr;
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php // ── Product Categories ── ?>
<?php
$categories = get_terms( [
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'exclude'    => get_option( 'default_product_cat' ),
    'number'     => 6,
] );

if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) : ?>
<section class="product-categories bg-brand-light py-16 sm:py-20">
    <div class="container-pp">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-brand-primary"><?php esc_html_e( 'Shop by Category', 'punchpros-theme' ); ?></h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-<?php echo min( count( $categories ), 6 ); ?> gap-4 sm:gap-6">
            <?php foreach ( $categories as $cat ) :
                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image        = $thumbnail_id
                    ? wp_get_attachment_image_url( $thumbnail_id, 'medium' )
                    : wc_placeholder_img_src( 'medium' );
            ?>
                <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                   class="group relative flex flex-col items-center justify-end rounded-xl overflow-hidden aspect-square bg-brand-primary no-underline hover:no-underline">
                    <img src="<?php echo esc_url( $image ); ?>"
                         alt="<?php echo esc_attr( $cat->name ); ?>"
                         class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-80 group-hover:scale-105 transition-all duration-300">
                    <div class="relative z-10 p-4 text-center">
                        <span class="block text-white font-bold text-lg drop-shadow-lg"><?php echo esc_html( $cat->name ); ?></span>
                        <?php if ( $cat->count > 0 ) : ?>
                            <span class="block text-white/70 text-sm mt-0.5">
                                <?php printf( esc_html( _n( '%d product', '%d products', $cat->count, 'punchpros-theme' ) ), $cat->count ); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php // ── Trust / USP Bar ── ?>
<section class="usp-bar bg-brand-primary text-white py-12">
    <div class="container-pp">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-brand-accent text-3xl mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white"><?php esc_html_e( 'Premium Quality', 'punchpros-theme' ); ?></h3>
                <p class="text-white/60 text-sm mt-1"><?php esc_html_e( 'Only the best materials and brands.', 'punchpros-theme' ); ?></p>
            </div>
            <div>
                <div class="text-brand-accent text-3xl mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white"><?php esc_html_e( 'Fast Shipping', 'punchpros-theme' ); ?></h3>
                <p class="text-white/60 text-sm mt-1"><?php esc_html_e( 'Quick delivery, right to your door.', 'punchpros-theme' ); ?></p>
            </div>
            <div>
                <div class="text-brand-accent text-3xl mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white"><?php esc_html_e( 'Secure Payment', 'punchpros-theme' ); ?></h3>
                <p class="text-white/60 text-sm mt-1"><?php esc_html_e( 'Safe checkout with trusted providers.', 'punchpros-theme' ); ?></p>
            </div>
            <div>
                <div class="text-brand-accent text-3xl mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white"><?php esc_html_e( 'Expert Support', 'punchpros-theme' ); ?></h3>
                <p class="text-white/60 text-sm mt-1"><?php esc_html_e( 'Fighters helping fighters. Always.', 'punchpros-theme' ); ?></p>
            </div>
        </div>
    </div>
</section>

<?php // ── New Arrivals ── ?>
<?php if ( class_exists( 'WooCommerce' ) ) : ?>
<section class="new-arrivals bg-white py-16 sm:py-20">
    <div class="container-pp">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-brand-primary"><?php esc_html_e( 'New Arrivals', 'punchpros-theme' ); ?></h2>
            <p class="mt-3 text-gray-600"><?php esc_html_e( 'The latest gear, fresh in stock.', 'punchpros-theme' ); ?></p>
        </div>

        <?php echo do_shortcode( '[recent_products limit="4" columns="4" orderby="date"]' ); ?>
    </div>
</section>
<?php endif; ?>

<?php // ── CTA Banner ── ?>
<section class="cta-banner relative overflow-hidden bg-gradient-to-r from-brand-accent to-rose-700 py-16 sm:py-20">
    <div class="container-pp relative z-10 text-center">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white text-balance">
            <?php esc_html_e( 'Ready to Step in the Ring?', 'punchpros-theme' ); ?>
        </h2>
        <p class="mt-4 text-lg text-white/80 max-w-xl mx-auto">
            <?php esc_html_e( 'Browse our full collection and find the gear that fits your fight.', 'punchpros-theme' ); ?>
        </p>
        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
           class="btn mt-8 bg-white text-brand-primary hover:bg-gray-100 text-base px-8 py-3.5">
            <?php esc_html_e( 'Shop the Collection', 'punchpros-theme' ); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
