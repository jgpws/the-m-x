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

	<footer id="colophon" class="site-footer jgd-grid" role="contentinfo">
		<div class="site-info jgd-column-1">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'the-mx' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'the-mx' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'the-mx' ), 'the-mx', '<a href="http://www.jasong-designs.com" rel="designer">Jason G. Designs</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
