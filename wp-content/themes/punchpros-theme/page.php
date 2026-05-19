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

                </article>

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
