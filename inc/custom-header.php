<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package The_M.X.
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses the_mx_header_style()
 */
function the_mx_custom_header_setup() {
	$color_scheme = the_mx_get_color_scheme();
	$default_text_color = trim( $color_scheme[8], '#' );

	add_theme_support( 'custom-header', apply_filters( 'the_mx_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => $default_text_color,
		'width'                  => 1920,
		'height'                 => 540,
		'flex-height'            => true,
		'wp-head-callback'       => 'the_mx_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'the_mx_custom_header_setup' );

if ( ! function_exists( 'the_mx_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see the_mx_custom_header_setup().
 */
function the_mx_header_style() {
	$header_text_color = get_header_textcolor();
	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-branding-text {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}

		.page-template-template-landing .site-branding-text {
			position: static;
			clip: auto;
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-branding-text {
			clip: auto;
			position: relative;
		}

		.site-title a:link,
		.site-title a:visited,
		.site-description {
			color: #<?php echo esc_attr(  $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
