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

if( get_theme_mod( 'the_mx_enable_colorbox' ) == 1 ) {
	the_mx_cbox_content(); // This function is inside of inc/colorbox-gallery-content.php
} else {
get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
		
			<div class="return-to-parent">
			<?php echo sprintf( 
				/* translators: %1$s: opening <span> html tag, %2$s: closing </span> html tag */
				'%1$s' . esc_html__( 'Return to:', 'the-m-x' ) . '%2$s', '<span class="return-to-text">', '</span>' 
			); ?> <a href="<?php echo esc_url( get_permalink( wp_get_post_parent_id( get_the_ID() ) ) ); ?>"><?php echo esc_html( get_the_title( wp_get_post_parent_id( get_the_ID() ) ) ); ?></a>
			</div>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<nav class="images-navigation">
				<div class="nav-previous"><?php previous_image_link( false, '<i class="material-icons">arrow_back</i>' ); ?></div>
				<div class="nav-next"><?php next_image_link( false, '<i class="material-icons">arrow_forward</i>' ); ?></div>
			</nav>
			
			<div class="entry-content jgd-grid">
				<figure class="entry-attachment-image wp-block-image">
				<?php if( wp_attachment_is_image( get_the_ID() ) ) : $att_image = wp_get_attachment_image_src( get_the_ID(), 'full' ); ?>
					<p>
					<?php if( get_theme_mod( 'the_mx_single_slider' ) == 1 ) { ?>
						<img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo esc_attr( $att_image[1] ); ?>" height="<?php echo esc_attr( $att_image[2] ); ?>" alt="<?php echo esc_attr( get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true ) ); ?>">
					<?php } else { ?>
						<a href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo esc_attr( $att_image[1] ); ?>" height="<?php echo esc_attr( $att_image[2] ); ?>" class="attachment-medium" alt="<?php echo esc_attr( get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true ) ); ?>"></a>
					<?php } ?>
					</p>
					<?php
					$caption = get_the_excerpt();
					if( $caption != '' ) { ?>
						<figcaption class="wp-caption-text"><?php echo esc_html( get_the_excerpt() ); ?></figcaption>
					<?php
					} ?>
				<?php else: ?>
					<a href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php echo esc_html( basename( wp_get_attachment_url() ) ); ?></a>
				<?php endif; ?>
				</figure>
				<?php the_content(); ?>
			</div>
			
			<footer class="entry-footer jgd-grid">
				<h2 class="image-title"><?php 
					$image_title = get_the_title( get_the_ID() );
					echo esc_html( $image_title );
				 ?></h2>
				
				<div class="entry-image-meta">
					<?php the_mx_posted_on(); ?>
					<div class="image-size-meta"><i class="material-icons">image</i><?php echo esc_html( $att_image[1] ); ?> x <?php echo esc_html( $att_image[2] ); ?></div>
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
