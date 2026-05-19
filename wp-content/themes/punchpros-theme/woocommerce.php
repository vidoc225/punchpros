<?php
/**
 * Wrapper template that WooCommerce loads for all its pages
 * when the active theme has this file in its root.
 *
 * The actual WooCommerce content is injected via woocommerce_content().
 * Our custom layout wrapper around it is handled in functions.php via the
 * woocommerce_before_main_content / woocommerce_after_main_content hooks.
 */

get_header();

woocommerce_content();

get_footer();
