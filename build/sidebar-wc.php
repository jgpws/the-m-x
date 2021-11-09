<?php
/**
 * The sidebar containing the widget area on WooCommerce pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_M.X.
 */

if ( ! is_active_sidebar( 'wc-widget-area' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'wc-widget-area' ); ?>
</aside><!-- #secondary -->
