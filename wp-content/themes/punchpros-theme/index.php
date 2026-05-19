<?php get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="main-content" role="main">

            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && ! is_front_page() ) : ?>
                    <header class="page-header">
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="entry-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <header class="entry-header">
                            <?php if ( is_singular() ) : ?>
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            <?php else : ?>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            <?php endif; ?>

                            <?php if ( 'post' === get_post_type() ) : ?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </span>
                                    <span class="byline">
                                        <?php the_author(); ?>
                                    </span>
                                    <?php if ( has_category() ) : ?>
                                        <span class="cat-links"><?php the_category( ', ' ); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </header>

                        <div class="entry-content">
                            <?php
                            if ( is_singular() ) {
                                the_content();
                                wp_link_pages( [
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'punchpros-theme' ),
                                    'after'  => '</div>',
                                ] );
                            } else {
                                the_excerpt();
                                echo '<a class="more-link" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read More', 'punchpros-theme' ) . '</a>';
                            }
                            ?>
                        </div>

                    </article>
                <?php endwhile; ?>

                <nav class="pagination" aria-label="<?php esc_attr_e( 'Posts navigation', 'punchpros-theme' ); ?>">
                    <?php
                    the_posts_pagination( [
                        'mid_size'  => 2,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                    ] );
                    ?>
                </nav>

            <?php else : ?>

                <article class="entry no-results">
                    <h2 class="entry-title"><?php esc_html_e( 'Nothing found', 'punchpros-theme' ); ?></h2>
                    <div class="entry-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'punchpros-theme' ); ?></p>
                    </div>
                    <?php get_search_form(); ?>
                </article>

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
