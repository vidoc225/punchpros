<?php get_header(); ?>

<div class="container-pp py-20">
    <main id="main" class="error-404 text-center max-w-2xl mx-auto" role="main">
        <p class="text-[clamp(5rem,15vw,10rem)] font-black text-brand-accent leading-none">404</p>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-brand-primary mb-3"><?php esc_html_e( 'Page Not Found', 'punchpros-theme' ); ?></h1>
        <p class="text-gray-600 mb-6"><?php esc_html_e( "The page you're looking for doesn't exist or has been moved.", 'punchpros-theme' ); ?></p>
        <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php esc_html_e( 'Go Home', 'punchpros-theme' ); ?>
        </a>
        <div class="mt-8">
            <?php get_search_form(); ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
