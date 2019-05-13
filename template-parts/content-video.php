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
					the_title( '<h2 class="entry-title"><i class="material-icons">' . __( 'movie', 'the-m-x' ) . '</i>', '</h2>' );
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
				//global $post;
				$the_m_x_vid_post_id = '';
				
				$the_m_x_post = get_post( $the_m_x_vid_post_id );
				$the_m_x_content = apply_filters( 'the_content', $the_m_x_post->post_content );
				$the_m_x_embeds = get_media_embedded_in_content( $the_m_x_content );
				
				if( !empty( $the_m_x_embeds ) ) {
					$first_embed = $the_m_x_embeds[0];
					if( class_exists( 'Jetpack' ) ) { ?>
						<div class="jetpack-video-wrapper">
							<?php echo $first_embed; ?>
						</div><?php
					} else {
						echo $first_embed;
					}
				}
			} else {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					__( 'Continue reading %s...', 'the-m-x' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
		
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-m-x' ),
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