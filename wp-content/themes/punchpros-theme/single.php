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
                        <div class="entry-meta">
                            <span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
                            <span class="byline"><?php the_author(); ?></span>
                            <?php if ( has_category() ) : ?>
                                <span class="cat-links"><?php the_category( ', ' ); ?></span>
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

                    <footer class="entry-footer">
                        <?php the_tags( '<div class="tag-links">' . __( 'Tags: ', 'punchpros-theme' ), ', ', '</div>' ); ?>
                    </footer>

                </article>

                <?php
                the_post_navigation( [
                    'prev_text' => '<span class="nav-subtitle">' . __( '&laquo; Previous', 'punchpros-theme' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . __( 'Next &raquo;', 'punchpros-theme' ) . '</span> <span class="nav-title">%title</span>',
                ] );
                ?>

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
