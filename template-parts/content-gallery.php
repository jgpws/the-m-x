<?php
/**
 * Template part for displaying gallery post format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @link https://codex.wordpress.org/Post_Formats
 *
 * @package The_M.X.
 */
 
// Post variable to be used anywhere
global $post;

if( get_theme_mod( 'the_mx_layout' ) == 'imagegrid' ) {
	the_mx_imagegrid();
} else {
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title"><i class="material-icons">view_comfy</i>', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><i class="material-icons">view_comfy</i>', '</h2>' );
				}
	
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php the_mx_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<?php
				if( is_single() ) {
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-m-x' ),
						'after'  => '</div>',
					) );
				} else {
					echo get_post_gallery(); ?>
					<div class="more-images-link"><a href="<?php the_permalink(); ?>"><?php _e( 'More images', 'the-m-x' ); ?></a></div>
				<?php
				} // ends else ?>
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
			<?php the_mx_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article>
<?php
}
?>