<?php
/**
 * The template for displaying image attachment information inside the Colorbox popup. This is used inside of image.php when Colorbox is active (selected in the Customizer).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @link 
 * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
 *
 * @since 1.0
 *
 * @package The_M.X.
 */

function the_mx_cbox_content() {
global $post;	
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'the-mx' ); ?></a>
	
	<div id="content" class="site-content">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="entry-attachment-image">
			<?php if( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, 'full' ); ?>
				<p>
				<img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" alt="<?php echo esc_attr( $post->post_excerpt ); ?>">
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
					<div class="image-size-meta"><i class="material-icons">image</i><?php echo $att_image[1]; ?> x <?php echo $att_image[2]; ?> pixels</div>
				</div>
			</header>
			
			<div class="entry-content jgd-grid">
				<?php the_content(); ?>
			</div>
			
			</article>
			
			<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>

<?php
} // ends function

the_mx_hide_adminbar();
?>