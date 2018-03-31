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
		<?php } ?>
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title"><i class="material-icons">movie</i>', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><i class="material-icons">movie</i>', '</h2>' );
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
			if( is_single() || is_search() ) {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					__( 'Continue reading %s...', 'the-mx' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-mx' ),
					'after'  => '</div>',
				) );
			} else {
				$content = the_mx_get_formatted_content();
				
				global $post;
				global $wp_embed;
	
				$wp_embed->post_ID = $post->ID;
				
				$wp_embed->run_shortcode( $content );
				
				$new_content = $wp_embed->autoembed( $content );
				
				$embeds = get_media_embedded_in_content( $new_content,  array( 'video', 'object', 'embed', 'iframe' ) );
				//print_r( $embeds );
				if( !empty( $first_embed ) ) {
					$first_embed = $embeds[0];
				}
				
				if( !empty( $first_embed ) && current_theme_supports( 'jetpack-responsive-videos' ) ) {
					return '<div class="jetpack-video-wrapper">' . $first_embed . '</div>';
				} elseif( !empty( $first_embed ) ) {
					return $first_embed;
				}
				
				return $embeds;
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