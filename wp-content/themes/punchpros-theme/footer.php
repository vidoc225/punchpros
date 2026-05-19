    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar( 'sidebar-footer' ); ?>
                </div>
            <?php endif; ?>

            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer Navigation', 'punchpros-theme' ); ?>">
                    <?php
                    wp_nav_menu( [
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'fallback_cb'    => '__return_false',
                    ] );
                    ?>
                </nav>
            <?php endif; ?>

            <p class="copyright">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
                <?php
                printf(
                    /* translators: %s: WordPress */
                    esc_html__( 'Powered by %s.', 'punchpros-theme' ),
                    '<a href="https://wordpress.org">WordPress</a>'
                );
                ?>
            </p>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
