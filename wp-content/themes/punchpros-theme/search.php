<?php get_header(); ?>

<div class="container-pp py-10">
    <div class="flex flex-col lg:flex-row gap-8">
        <main id="main" class="flex-1 min-w-0" role="main">

            <header class="page-header mb-6">
                <h1 class="text-3xl font-extrabold text-brand-primary">
                    <?php
                    printf(
                        /* translators: %s: search query */
                        esc_html__( 'Search results for: %s', 'punchpros-theme' ),
                        '<span class="text-brand-accent">' . esc_html( get_search_query() ) . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <div class="mb-8">
                <?php get_search_form(); ?>
            </div>

            <?php if ( have_posts() ) : ?>

                <div class="space-y-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry pb-6 border-b border-gray-200 last:border-b-0' ); ?>>
                            <h2 class="text-xl font-bold leading-tight mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-brand-primary hover:text-brand-accent no-underline"><?php the_title(); ?></a>
                            </h2>
                            <div class="text-xs text-gray-500 mb-3">
                                <?php echo esc_html( get_the_date() ); ?>
                            </div>
                            <div class="text-sm text-gray-700"><?php the_excerpt(); ?></div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <nav class="mt-10 flex justify-center">
                    <?php the_posts_pagination( [ 'mid_size' => 2, 'prev_text' => '&laquo;', 'next_text' => '&raquo;' ] ); ?>
                </nav>

            <?php else : ?>
                <p class="text-gray-600"><?php esc_html_e( 'No results found. Try a different search term.', 'punchpros-theme' ); ?></p>
            <?php endif; ?>

        </main>

        <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
            <aside id="secondary" class="w-full lg:w-80 flex-shrink-0" role="complementary">
                <?php dynamic_sidebar( 'sidebar-main' ); ?>
            </aside>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
