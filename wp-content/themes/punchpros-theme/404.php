<?php get_header(); ?>

<div class="container">
    <main id="main" class="main-content error-404" role="main">
        <p class="error-code">404</p>
        <h1><?php esc_html_e( 'Page Not Found', 'punchpros-theme' ); ?></h1>
        <p><?php esc_html_e( "The page you're looking for doesn't exist or has been moved.", 'punchpros-theme' ); ?></p>
        <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php esc_html_e( 'Go Home', 'punchpros-theme' ); ?>
        </a>
        <br><br>
        <?php get_search_form(); ?>
    </main>
</div>

<?php get_footer(); ?>
