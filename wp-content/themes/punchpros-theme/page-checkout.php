<?php get_header(); ?>

<div class="container-pp py-10">
    <main id="main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </main>
</div>

<?php get_footer(); ?>
