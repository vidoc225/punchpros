<?php get_header(); ?>

<div class="container-pp py-10">
    <div class="flex flex-col lg:flex-row gap-8">
        <main id="main" class="flex-1 min-w-0" role="main">

            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && ! is_front_page() ) : ?>
                    <header class="page-header mb-8">
                        <h1 class="text-3xl sm:text-4xl font-extrabold text-brand-primary"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

                <div class="space-y-10">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry pb-10 border-b border-gray-200 last:border-b-0' ); ?>>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="entry-thumbnail mb-5 overflow-hidden rounded-lg">
                                    <a href="<?php the_permalink(); ?>" class="block">
                                        <?php the_post_thumbnail( 'large', [ 'class' => 'w-full h-auto hover:scale-105 transition-transform duration-300' ] ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <header class="entry-header mb-3">
                                <?php if ( is_singular() ) : ?>
                                    <h1 class="text-3xl sm:text-4xl font-extrabold text-brand-primary leading-tight"><?php the_title(); ?></h1>
                                <?php else : ?>
                                    <h2 class="text-2xl font-bold leading-tight">
                                        <a href="<?php the_permalink(); ?>" class="text-brand-primary hover:text-brand-accent no-underline"><?php the_title(); ?></a>
                                    </h2>
                                <?php endif; ?>

                                <?php if ( 'post' === get_post_type() ) : ?>
                                    <div class="entry-meta mt-2 flex flex-wrap gap-x-4 gap-y-1 text-sm text-gray-500">
                                        <span><?php echo esc_html( get_the_date() ); ?></span>
                                        <span><?php the_author(); ?></span>
                                        <?php if ( has_category() ) : ?>
                                            <span class="cat-links [&_a]:text-brand-accent"><?php the_category( ', ' ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </header>

                            <div class="entry-content mt-3">
                                <?php
                                if ( is_singular() ) {
                                    the_content();
                                    wp_link_pages( [
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'punchpros-theme' ),
                                        'after'  => '</div>',
                                    ] );
                                } else {
                                    the_excerpt();
                                    echo '<a class="btn mt-4" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read More', 'punchpros-theme' ) . '</a>';
                                }
                                ?>
                            </div>

                        </article>
                    <?php endwhile; ?>
                </div>

                <nav class="mt-10 flex justify-center" aria-label="<?php esc_attr_e( 'Posts navigation', 'punchpros-theme' ); ?>">
                    <?php
                    the_posts_pagination( [
                        'mid_size'           => 2,
                        'prev_text'          => '&laquo;',
                        'next_text'          => '&raquo;',
                        'class'              => 'flex flex-wrap gap-2',
                        'before_page_number' => '<span class="screen-reader-text sr-only">' . __( 'Page', 'punchpros-theme' ) . ' </span>',
                    ] );
                    ?>
                </nav>

            <?php else : ?>

                <article class="entry no-results text-center py-12">
                    <h2 class="text-2xl font-bold text-brand-primary mb-3"><?php esc_html_e( 'Nothing found', 'punchpros-theme' ); ?></h2>
                    <p class="text-gray-600 mb-6"><?php esc_html_e( 'It looks like nothing was found at this location.', 'punchpros-theme' ); ?></p>
                    <?php get_search_form(); ?>
                </article>

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
