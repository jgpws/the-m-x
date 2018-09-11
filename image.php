<?php
/**
 * The template for displaying image attachments.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @link 
 * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
 *
 * @package The_M.X.
 */
 
/* The part beginning with the class .entry-attachment-image was derived from the tutorial "How to Create a Custom Single Attachments Template in WordPress by wpbeginner.
See http://www.wpbeginner.com/wp-themes/how-to-create-a-custom-single-attachments-template-in-wordpress/ for more information. */

global $post;

if( get_theme_mod( 'the_mx_enable_colorbox' ) == 1 ) {
	the_mx_cbox_content(); // This function is inside of inc/colorbox-gallery-content.php
} else {
get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
		
			<div class="return-to-parent"><?php echo sprintf(__( '%1$sReturn to:%2$s', 'the-m-x' ), '<span class="return-to-text">', '</span>' ); ?> <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></div>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<nav class="images-navigation">
				<div class="nav-previous"><?php previous_image_link( false, '<i class="material-icons">arrow_back</i>' ); ?></div>
				<div class="nav-next"><?php next_image_link( false, '<i class="material-icons">arrow_forward</i>' ); ?></div>
			</nav>
			
			<div class="entry-content jgd-grid">
				<div class="entry-attachment-image">
				<?php if( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, 'full' ); ?>
					<p>
					<?php if( get_theme_mod( 'the_mx_single_slider' ) == 1 ) { ?>
						<img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" alt="<?php echo esc_attr( $post->post_excerpt ); ?>">
					<?php } else { ?>
						<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" class="attachment-medium" alt="<?php echo esc_attr( $post->post_excerpt ); ?>"></a>
					<?php } ?>
					</p>
					<?php
					$caption = $post->post_excerpt;
					if( $caption != '' ) { ?>
						<div class="wp-caption-text"><?php echo esc_html( $post->post_excerpt ); ?></div>
					<?php 
					} ?>
				<?php else: ?>
					<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php echo esc_html( get_the_title($post->id), 1 ); ?>" rel="attachment"><?php echo basename($post->guid); ?></a>
				<?php endif; ?>
				</div>
				<?php the_content(); ?>
			</div>
			
			<footer class="entry-footer jgd-grid">
				<h2 class="image-title"><?php 
					$image_title = get_the_title($post->id);
					echo $image_title;
				 ?></h2>
				
				<div class="entry-image-meta">
					<?php the_mx_posted_on(); ?>
					<div class="image-size-meta"><i class="material-icons">image</i><?php echo $att_image[1]; ?> x <?php echo $att_image[2]; ?></div>
				</div>
			</footer>
			
			</article>
			
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php
	get_sidebar();
	get_footer();	

}
