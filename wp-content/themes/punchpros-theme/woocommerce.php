<?php
get_header();
?>

<?php if ( is_shop() && ! is_search() ) : ?>
    <div class="container-pp py-10">
        <main id="main">
            <?php
            if ( apply_filters( 'woocommerce_show_page_title', true ) ) {
                echo '<h1 class="woocommerce-products-header__title page-title">' . woocommerce_page_title( false ) . '</h1>';
            }

            // Renders the category grid (hooked via punchpros_shop_categories)
            do_action( 'woocommerce_before_shop_loop' );
            ?>
        </main>
    </div>
<?php else : ?>
    <div class="container-pp py-10">
        <main id="main">
            <?php woocommerce_content(); ?>
        </main>
    </div>
<?php endif; ?>

<?php
get_footer();
