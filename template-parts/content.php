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
} else { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} ?>
			<?php if( has_post_thumbnail() ) { ?>
			<div class="featured-image">
				<?php the_post_thumbnail( 'large' ); ?>
			</div>
			<div class="scrim"></div>
			<?php } ?>
			<?php
				if ( !is_single() ) {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			
				if ( 'post' === get_post_type() ) { ?>
				<div class="entry-meta">
					<?php the_mx_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php 
				} ?>
		</header><!-- .entry-header -->
	
		<?php if( get_theme_mod( 'the_mx_contentlength_choices' ) === 'excerpt' && !is_single() && !is_page() ) { ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
		<?php } else { ?>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					__( 'Continue reading %s...', 'the-mx' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-mx' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php } ?>
	
		<footer class="entry-footer">
			<?php the_mx_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
<?php
}