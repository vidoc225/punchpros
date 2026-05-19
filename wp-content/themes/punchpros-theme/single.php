<?php get_header(); ?>

<div class="container-pp py-10">
    <div class="flex flex-col lg:flex-row gap-8">
        <main id="main" class="flex-1 min-w-0" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-thumbnail mb-6 rounded-lg overflow-hidden">
                            <?php the_post_thumbnail( 'large', [ 'class' => 'w-full h-auto' ] ); ?>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header mb-6">
                        <h1 class="text-3xl sm:text-4xl font-extrabold text-brand-primary leading-tight"><?php the_title(); ?></h1>
                        <div class="entry-meta mt-2 flex flex-wrap gap-x-4 gap-y-1 text-sm text-gray-500">
                            <span><?php echo esc_html( get_the_date() ); ?></span>
                            <span><?php the_author(); ?></span>
                            <?php if ( has_category() ) : ?>
                                <span class="[&_a]:text-brand-accent"><?php the_category( ', ' ); ?></span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();
                        wp_link_pages( [
                            'before' => '<div class="page-links">' . __( 'Pages:', 'punchpros-theme' ),
                            'after'  => '</div>',
                        ] );
                        ?>
                    </div>

                    <footer class="entry-footer mt-8">
                        <?php the_tags( '<div class="tag-links text-sm text-gray-600">' . __( 'Tags: ', 'punchpros-theme' ), ', ', '</div>' ); ?>
                    </footer>

                </article>

                <nav class="my-10 flex justify-between gap-4 text-sm">
                    <?php
                    the_post_navigation( [
                        'prev_text' => '<span class="block text-gray-500">&laquo; ' . __( 'Previous', 'punchpros-theme' ) . '</span> <span class="block font-semibold text-brand-primary">%title</span>',
                        'next_text' => '<span class="block text-gray-500 text-right">' . __( 'Next', 'punchpros-theme' ) . ' &raquo;</span> <span class="block font-semibold text-brand-primary text-right">%title</span>',
                    ] );
                    ?>
                </nav>

                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>

            <?php endwhile; ?>

        </main>

        <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
            <aside id="secondary" class="w-full lg:w-80 flex-shrink-0" role="complementary">
                <?php dynamic_sidebar( 'sidebar-main' ); ?>
            </aside>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
