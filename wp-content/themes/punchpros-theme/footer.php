    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-brand-primary text-white/70 mt-auto">
        <div class="container-pp py-12 flex flex-col items-center gap-4 text-center">
            <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
                <div class="footer-widgets w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-6 text-left">
                    <?php dynamic_sidebar( 'sidebar-footer' ); ?>
                </div>
            <?php endif; ?>

            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer Navigation', 'punchpros-theme' ); ?>">
                    <?php
                    wp_nav_menu( [
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => 'flex flex-wrap justify-center gap-6 list-none p-0 m-0 text-sm [&_a]:text-white/85 [&_a]:no-underline hover:[&_a]:text-brand-accent',
                        'container'      => false,
                        'fallback_cb'    => '__return_false',
                    ] );
                    ?>
                </nav>
            <?php endif; ?>

            <p class="copyright text-sm m-0">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white hover:text-brand-accent no-underline"><?php bloginfo( 'name' ); ?></a>.
                <?php esc_html_e( 'All rights reserved.', 'punchpros-theme' ); ?>
            </p>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
