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
				the_title( '<h2 class="entry-title">', '</h2>' );
			}
		
			if ( 'post' === get_post_type() ) { ?>
			<div class="entry-meta">
				<?php the_mx_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php 
			} ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
	<?php
	if( !is_single() ) {
		
		if( has_shortcode( $post->post_content, 'caption' ) ) {
		// Find first image with a caption
			
			$output_caption = preg_match_all('/\[caption(.)*caption="([\s\S][^"]*)"]<a.*>(<img[\s\S][^>]*>)<\/a>\[\/caption\]/im', $post->post_content, $caption_matches );
			// [2] = first capturing group (information inside caption="")
			// [3] = first image src
			// second [0] = first iteration of each
			if( !empty( $output_caption ) ) {
				$first_caption = $caption_matches[2][0];
				$first_img = $caption_matches[3][0];
				echo '<a href="' . get_the_permalink() . '">' . $first_img . '</a>' . "\n" .
				'<p class="wp-caption-text">' . $first_caption . '</p>';
			}
			
		} else {
			// Find first image with no caption
		
			$first_img = '';
			ob_start();
			ob_end_clean();
			$output_nocaption = preg_match_all('/(<img.+src=[\'"]([^\'"]+)[\'"].*>)/i', $post->post_content, $matches );
			$first_img = $matches[1][0];
			// [0] = the first matching img src tag
			// [1] = first capturing group in parenthesis (also represented by the entire img src tag)
			
			if( empty( $first_img ) ) {
				$first_img = "";
			}
			echo '<a href="' . get_the_permalink() . '">' . $first_img . '</a>';
	
		}
	} else {
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			__( 'Continue reading %s...', 'the-mx' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-mx' ),
			'after'  => '</div>',
		) );
	} ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php the_mx_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article>
<?php
}
?>