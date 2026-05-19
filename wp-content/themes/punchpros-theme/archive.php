<?php get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="main-content" role="main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header>

                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="entry-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="entry-meta">
                                <span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
                                <span class="byline"><?php the_author(); ?></span>
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a class="more-link" href="<?php the_permalink(); ?>">
                                <?php esc_html_e( 'Read More', 'punchpros-theme' ); ?>
                            </a>
                        </div>

                    </article>
                <?php endwhile; ?>

                <nav class="pagination">
                    <?php
                    the_posts_pagination( [
                        'mid_size'  => 2,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                    ] );
                    ?>
                </nav>

            <?php else : ?>
                <p><?php esc_html_e( 'No posts found.', 'punchpros-theme' ); ?></p>
            <?php endif; ?>

        </main>

        <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
            <aside id="secondary" class="sidebar" role="complementary">
                <?php dynamic_sidebar( 'sidebar-main' ); ?>
            </aside>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
