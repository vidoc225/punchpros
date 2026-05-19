<?php get_header(); ?>

<div class="container-pp py-10">
    <div class="flex flex-col lg:flex-row gap-8">
        <main id="main" class="flex-1 min-w-0" role="main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header mb-8">
                    <?php the_archive_title( '<h1 class="text-3xl sm:text-4xl font-extrabold text-brand-primary">', '</h1>' ); ?>
                    <?php the_archive_description( '<div class="archive-description mt-2 text-gray-600">', '</div>' ); ?>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow' ); ?>>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="block">
                                    <?php the_post_thumbnail( 'medium_large', [ 'class' => 'w-full h-48 object-cover' ] ); ?>
                                </a>
                            <?php endif; ?>

                            <div class="p-5">
                                <h2 class="text-lg font-bold leading-tight mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-brand-primary hover:text-brand-accent no-underline"><?php the_title(); ?></a>
                                </h2>
                                <div class="text-xs text-gray-500 mb-3 flex gap-3">
                                    <span><?php echo esc_html( get_the_date() ); ?></span>
                                    <span><?php the_author(); ?></span>
                                </div>
                                <div class="text-sm text-gray-700"><?php the_excerpt(); ?></div>
                                <a class="btn mt-4" href="<?php the_permalink(); ?>">
                                    <?php esc_html_e( 'Read More', 'punchpros-theme' ); ?>
                                </a>
                            </div>

                        </article>
                    <?php endwhile; ?>
                </div>

                <nav class="mt-10 flex justify-center">
                    <?php the_posts_pagination( [ 'mid_size' => 2, 'prev_text' => '&laquo;', 'next_text' => '&raquo;' ] ); ?>
                </nav>

            <?php else : ?>
                <p class="text-gray-600"><?php esc_html_e( 'No posts found.', 'punchpros-theme' ); ?></p>
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
