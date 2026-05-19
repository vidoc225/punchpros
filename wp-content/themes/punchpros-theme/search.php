<?php get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="main-content" role="main">

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        /* translators: %s: search query */
                        esc_html__( 'Search results for: %s', 'punchpros-theme' ),
                        '<span>' . esc_html( get_search_query() ) . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <?php get_search_form(); ?>

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="entry-meta">
                                <span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
                            </div>
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
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
                <p><?php esc_html_e( 'No results found. Try a different search term.', 'punchpros-theme' ); ?></p>
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
