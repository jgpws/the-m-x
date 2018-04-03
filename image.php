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
	// limited header for display inside colorbox
	get_template_part( 'template-parts/header', 'none' );
	the_mx_hide_adminbar();
} else {
	get_header(); 
} ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
		
		if( get_theme_mod( 'the_mx_enable_colorbox' ) == 1 ) {
			//show nothing
		} else { ?>
			<div class="return-to-parent"><?php echo sprintf(__( '%1$sReturn to:%2$s', 'the-mx' ), '<span class="return-to-text">', '</span>' ); ?> <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></div>
		<?php
		}
		?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if( get_theme_mod( 'the_mx_enable_colorbox' ) == 1 ) { 
				// show nothing
			} else { ?>
			<nav class="images-navigation">
				<div class="nav-previous"><?php previous_image_link( false, '<i class="material-icons">arrow_back</i>' ); ?></div>
				<div class="nav-next"><?php next_image_link( false, '<i class="material-icons">arrow_forward</i>' ); ?></div>
			</nav>
			<?php } ?>
			
			<div class="entry-attachment-image">
			<?php if( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, 'full' ); ?>
				<p>
				<?php if( get_theme_mod( 'the_mx_enable_colorbox' ) == 1 && get_theme_mod( 'the_mx_single_slider' ) == 1 ) { ?>
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
				<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php echo wp_specialchars( get_the_title($post->id), 1 ); ?>" rel="attachment"><?php echo basename($post->guid); ?></a>
			<?php endif; ?>
			</div>
			
			<header class="entry-header jgd-grid">
				<h2 class="image-title"><?php 
					$image_title = get_the_title($post->id);
					echo $image_title;
				 ?></h2>
				
				<div class="entry-image-meta">
					<?php the_mx_posted_on(); ?>
					<div class="image-size-meta"><i class="material-icons">image</i><?php echo $att_image[1]; ?> x <?php echo $att_image[2]; ?></div>
				</div>
			</header>
			
			<div class="entry-content jgd-grid">
				<?php the_content(); ?>
			</div>
			
			</article>
			
			<?php
			if( get_theme_mod( 'the_mx_enable_colorbox' ) == 1 ) {
				// exclude comments
			} else {
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( get_theme_mod( 'the_mx_enable_colorbox' ) ) {
	// exclude sidebar
	get_template_part( 'template-parts/footer', 'none' );
} else {
	get_sidebar();
	get_footer();
}
