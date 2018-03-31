<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_M.X.
 */

if( get_theme_mod( 'the_mx_layout' ) == 'imagegrid' ) {
	the_mx_imagegrid();	
} else {
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if( has_post_thumbnail() ) { ?>
			<div class="featured-image">
				<?php the_post_thumbnail( 'large' ); ?>
			</div>
			<div class="scrim"></div>
			<?php
			} ?>
			<?php
			if( is_single() && has_post_thumbnail() ) {
				the_title( '<h1 class="entry-title"><i class="material-icons">image</i>', '</h1>' );
			} elseif( has_post_thumbnail() ) {
				the_title( '<h2 class="entry-title"><i class="material-icons">image</i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} elseif( is_single() ) {
				the_title( '<h1 class="entry-title"><i class="material-icons">image</i>', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><i class="material-icons">image</i>', '</h2>' );
			}
	
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php the_mx_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; 
			
			if( has_post_thumbnail() && !is_single() ) {
				$caption = get_post( get_post_thumbnail_id() )->post_excerpt;
				if( $caption ) { ?>
					<p class="wp-caption-text"><?php echo esc_html( $caption ); ?></p>
				<?php	
				}
			} ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php
			if( has_post_thumbnail() && !is_single() ) { // Use post thumbnail in place of the content in Image post format- this template.
				// show nothing
			} else {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					__( 'Continue reading', '', 'the-mx' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-mx' ),
					'after'  => '</div>',
				) );
			}
			?>
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
			<?php the_mx_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
<?php
}
?>
