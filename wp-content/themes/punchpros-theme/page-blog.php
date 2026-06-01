<?php
/**
 * Template Name: Blog
 * Toont alle blogartikelen in een kaartenraster.
 */
get_header();

$paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );
$blog_query = new WP_Query( [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 9,
    'paged'          => $paged,
] );
?>

<!-- ── Blog Hero ── -->
<section class="bg-black text-white py-14 sm:py-20 text-center -mt-16 pt-28 sm:pt-32">
    <div class="container-pp">
        <p class="text-primary text-sm font-bold tracking-widest uppercase mb-3">PunchPros Kennisbank</p>
        <h1 class="text-4xl sm:text-5xl md:text-6xl leading-none mb-4">BLOG</h1>
        <p class="text-gray-300 max-w-xl mx-auto text-lg" style="font-family: var(--font-body); text-transform: none;">
            Tips, technieken en advies over boksen, MMA en het beschermen van je lichaam.
        </p>
    </div>
</section>

<!-- ── Artikelen grid ── -->
<div class="container-pp py-12 sm:py-16">

    <?php if ( $blog_query->have_posts() ) : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
                $reading_time = ceil( str_word_count( strip_tags( get_the_content() ) ) / 200 );
                $cats         = get_the_category();
            ?>
                <article <?php post_class( 'group flex flex-col bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-xl transition-shadow duration-300' ); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden aspect-video">
                            <?php the_post_thumbnail( 'medium_large', [
                                'class'   => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500',
                                'loading' => 'lazy',
                            ] ); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="relative aspect-video flex items-center justify-center overflow-hidden bg-gradient-to-br from-gray-900 via-black to-gray-800 no-underline">
                            <div class="absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 16px 16px;"></div>
                        </a>
                    <?php endif; ?>

                    <div class="flex flex-col flex-1 p-6" style="font-family: var(--font-body); text-transform: none;">
                        <?php if ( $cats ) : ?>
                            <span class="text-xs font-bold tracking-widest text-primary uppercase mb-3">
                                <?php echo esc_html( $cats[0]->name ); ?>
                            </span>
                        <?php endif; ?>

                        <h2 class="text-lg font-bold leading-snug mb-3 flex-1" style="font-family: var(--font-heading);">
                            <a href="<?php the_permalink(); ?>" class="text-black hover:text-primary transition-colors no-underline">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <p class="text-gray-500 text-sm leading-relaxed mb-5 line-clamp-3">
                            <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                        </p>

                        <div class="flex items-center justify-between text-xs text-gray-400 mt-auto pt-4 border-t border-gray-100">
                            <span><?php echo esc_html( get_the_date( 'd M Y' ) ); ?></span>
                            <span><?php echo $reading_time; ?> min lezen</span>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <nav class="mt-12 flex justify-center gap-2">
            <?php
            echo paginate_links( [
                'total'     => $blog_query->max_num_pages,
                'current'   => $paged,
                'prev_text' => '&laquo; Vorige',
                'next_text' => 'Volgende &raquo;',
            ] );
            ?>
        </nav>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p class="text-gray-500 text-center py-20" style="font-family: var(--font-body); text-transform: none;">
            Er zijn nog geen artikelen gepubliceerd.
        </p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
