<?php
defined( 'ABSPATH' ) || exit;

$term      = get_queried_object();
$cat_name  = $term ? $term->name : '';
$cat_desc  = $term ? $term->description : '';
$cat_img   = $term ? get_term_meta( $term->term_id, 'thumbnail_id', true ) : 0;
$cat_img_url = $cat_img ? wp_get_attachment_image_url( $cat_img, 'large' ) : '';

// Breadcrumb parents
$ancestors = $term ? get_ancestors( $term->term_id, 'product_cat', 'taxonomy' ) : [];
$ancestors = array_reverse( $ancestors );

get_header();
?>

<!-- ── Breadcrumbs ── -->
<nav class="bg-gray-50 border-b border-gray-100" aria-label="Breadcrumb">
    <div class="container-pp py-3">
        <ol class="flex flex-wrap items-center gap-1 text-xs text-gray-500 list-none p-0 m-0" style="font-family: var(--font-body); text-transform: none;">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-primary no-underline transition-colors">Home</a></li>
            <li class="text-gray-300">/</li>
            <li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="hover:text-primary no-underline transition-colors">Shop</a></li>
            <?php foreach ( $ancestors as $ancestor_id ) :
                $ancestor = get_term( $ancestor_id, 'product_cat' );
                if ( ! is_wp_error( $ancestor ) ) : ?>
                    <li class="text-gray-300">/</li>
                    <li><a href="<?php echo esc_url( get_term_link( $ancestor ) ); ?>" class="hover:text-primary no-underline transition-colors"><?php echo esc_html( $ancestor->name ); ?></a></li>
                <?php endif;
            endforeach; ?>
            <li class="text-gray-300">/</li>
            <li class="text-gray-700 font-semibold" aria-current="page"><?php echo esc_html( $cat_name ); ?></li>
        </ol>
    </div>
</nav>

<!-- ── Category Hero ── -->
<section class="bg-black text-white py-12 sm:py-16 relative overflow-hidden">
    <?php if ( $cat_img_url ) : ?>
        <div class="absolute inset-0">
            <img src="<?php echo esc_url( $cat_img_url ); ?>"
                 alt="<?php echo esc_attr( $cat_name ); ?>"
                 class="w-full h-full object-cover opacity-30">
        </div>
    <?php endif; ?>
    <div class="relative z-10 container-pp text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl leading-none mb-4">
            <?php echo esc_html( strtoupper( $cat_name ) ); ?>
        </h1>
        <?php if ( $cat_desc ) : ?>
            <p class="text-gray-300 max-w-2xl mx-auto text-base sm:text-lg" style="font-family: var(--font-body); text-transform: none;">
                <?php echo wp_kses_post( $cat_desc ); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- ── Sub-categorieën (als die er zijn) ── -->
<?php
$subcats = get_terms( [
    'taxonomy'   => 'product_cat',
    'parent'     => $term ? $term->term_id : 0,
    'hide_empty' => true,
] );
if ( ! is_wp_error( $subcats ) && ! empty( $subcats ) ) : ?>
<section class="bg-white py-8 border-b border-gray-100">
    <div class="container-pp">
        <div class="flex flex-wrap gap-3 justify-center">
            <?php foreach ( $subcats as $subcat ) : ?>
                <a href="<?php echo esc_url( get_term_link( $subcat ) ); ?>"
                   class="inline-flex items-center gap-2 px-4 py-2 border-2 border-black text-sm font-bold tracking-wider hover:bg-black hover:text-white transition-colors no-underline"
                   style="font-family: var(--font-heading);">
                    <?php echo esc_html( $subcat->name ); ?>
                    <span class="text-xs text-gray-500 group-hover:text-gray-300">(<?php echo esc_html( $subcat->count ); ?>)</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ── Filters + Product Grid ── -->
<div class="container-pp py-10">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <p class="text-sm text-gray-500" style="font-family: var(--font-body); text-transform: none;">
            <?php
            $total = wc_get_loop_prop( 'total' ) ?: $term->count;
            printf( esc_html( _n( '%s product', '%s producten', $total, 'punchpros-theme' ) ), '<strong>' . esc_html( $total ) . '</strong>' );
            ?>
        </p>
        <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
            <!-- sidebar intentionally omitted for clean category layout -->
        <?php endif; ?>
    </div>

    <?php woocommerce_product_loop_start(); ?>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php wc_get_template_part( 'content', 'product' ); ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="text-gray-500 col-span-full py-10 text-center" style="font-family: var(--font-body); text-transform: none;">
            Geen producten gevonden in deze categorie.
        </p>
    <?php endif; ?>

    <?php woocommerce_product_loop_end(); ?>

    <nav class="mt-10 flex justify-center">
        <?php woocommerce_pagination(); ?>
    </nav>
</div>

<!-- ── SEO Tekst blok onderaan ── -->
<?php if ( $cat_desc ) : ?>
<section class="bg-gray-50 border-t border-gray-100 py-10">
    <div class="container-pp max-w-3xl mx-auto prose prose-sm" style="font-family: var(--font-body); text-transform: none; color: #555;">
        <h2 class="text-lg font-bold mb-3" style="font-family: var(--font-heading);">Over <?php echo esc_html( $cat_name ); ?></h2>
        <?php echo wp_kses_post( $cat_desc ); ?>
        <p class="mt-4">
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="text-primary font-semibold hover:underline">
                &larr; Bekijk alle bokshandschoenen, MMA gear en beschermingsmateriaal
            </a>
        </p>
    </div>
</section>
<?php endif; ?>

<?php
do_action( 'woocommerce_after_main_content' );
get_footer();
?>
