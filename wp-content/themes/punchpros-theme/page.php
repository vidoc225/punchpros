<?php get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="main-content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
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
            <aside id="secondary" class="sidebar" role="complementary">
                <?php dynamic_sidebar( 'sidebar-main' ); ?>
            </aside>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
