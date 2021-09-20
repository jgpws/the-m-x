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
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'the-m-x' ); ?></a>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content">
				<div class="entry-attachment-image">
				<?php if( wp_attachment_is_image( get_the_ID() ) ) : $att_image = wp_get_attachment_image_src( get_the_ID(), 'full' ); ?>
					<p>
					<img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo esc_attr( $att_image[1] ); ?>" height="<?php echo esc_attr( $att_image[2] ); ?>" alt="<?php echo esc_attr( get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true ) ); ?>">
					</p>
					<?php
					$caption = get_the_excerpt();
					if( $caption != '' ) {
					$allowed_tags = array(
						'a' => array(
							'href' => array(),
							'title' => array()
						),
						'br' => array(),
						'em' => array(),
					); ?>
						<div class="wp-caption-text"><?php echo wp_kses( $caption, $allowed_tags ); ?></div>
					<?php
					} ?>
				<?php else: ?>
					<a href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php echo esc_html( basename( wp_get_attachment_url() ) ); ?></a>
				<?php endif; ?>
				</div>
				<?php the_content(); ?>
			</div>

			<footer class="entry-footer">
				<h2 class="image-title"><?php
					$image_title = get_the_title( get_the_ID() );
					echo esc_html( $image_title );
				 ?></h2>

				<div class="entry-image-meta">
					<?php the_mx_posted_on(); ?>
					<div class="image-size-meta"><i class="material-icons">image</i><?php echo esc_html( $att_image[1] ); ?> x <?php echo esc_html( $att_image[2] ); ?> <?php esc_html_e( 'pixels', 'the-m-x' ); ?></div>
				</div>
			</footer>

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
