<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_M.X.
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info jgd-column-1">
			<?php if( is_active_sidebar( 'footer-widget-area' ) ) { ?>
			<div class="footer-widget-panel three-fourths-centered">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div>
			<?php } ?>
			<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">
			<?php printf(
				/* translators: %s: WordPress */
				esc_html__( 'Proudly powered by %s', 'the-m-x' ), 'WordPress'
			); ?>
			</a>
			<span class="sep"> | </span>
			<?php printf(
			/* translators: %1$s: The M.X. %2$s: http://www.jasong-designs.com */
			esc_html__( 'Theme: %1$s by %2$s.', 'the-m-x' ), 'The M.X.', '<a href="http://www.jasong-designs.com" rel="designer">Jason G. Designs</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
