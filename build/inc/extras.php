<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package The_M.X.
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function the_mx_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a .colorbox class to the body_class for Colorbox content specific CSS
	if( get_theme_mod( 'the_mx_enable_colorbox' ) == 1 ) {
		$classes[] = 'colorbox';
	}

	// Adds a .slider class to the body when 'Enable gallery to be shown as slider' is selected in the Customizer
	if( get_theme_mod( 'the_mx_single_slider' ) == 1 && is_single() ) {
		$classes[] = 'slider';
	}

	// Adds .imagegrid class to the body when Image Grid is chosen in the Customizer for post layouts
	if( get_theme_mod( 'the_mx_layout' ) == 'imagegrid' ) {
		$classes[] = 'imagegrid';
	}

	// Adds the class .animate for CSS3 animations
	if( get_theme_mod( 'the_mx_animate_css', 1 ) == 1 ) {
		$classes[] = 'animate';
	}

	// Adds .skrollr-animate class for Skrollr animations
	if( get_theme_mod( 'the_mx_skrollr_animations' ) == 1 ) {
		$classes[] = 'skrollr-animate';
	}

	// Layouts
	if( get_theme_mod( 'the_mx_layout' ) == 'centered' ) {
		$classes[] = 'centered';
	}

	if( get_theme_mod( 'the_mx_layout' ) == 'twobytwo' ) {
		$classes[] = 'two-by-two';
	}

	if( get_theme_mod( 'the_mx_layout' ) == 'wide' ) {
		$classes[] = 'wide';
	}

	// Sidebars
	$sidebar_layout = get_theme_mod( 'the_mx_sidebar_layout', 'overlay' );
	if( $sidebar_layout != '' ) {
		switch ( $sidebar_layout ) {
			case 'overlay':
				$classes[] = 'sidebar-overlay';
				break;
			case 'right':
				$classes[] = 'sidebar-right';
				break;
			case 'left':
				$classes[] = 'sidebar-left';
				break;
			default:
				$classes[] = 'sidebar-overlay';
				break;
		}
	}

	return $classes;
}
add_filter( 'body_class', 'the_mx_body_classes' );

function the_mx_add_grid_layouts( $classes ) {
	// Switches post classes dependent on layout choices in the Customizer
	$grid_layout = get_theme_mod( 'the_mx_layout', 'centered' );
	if( $grid_layout != '' ) {
		switch ( $grid_layout ) { // opens switch
			case 'centered':
				$classes[] = 'three-fourths-centered-r';
				break;
			case 'wide':
				$classes[] = 'jgd-column-1';
				break;
			case 'twobytwo':
				$classes[] = 'two-by-two-centered-r';
				break;
			default:
				$classes[] = 'three-fourths-centered-r';
				break;
		} // closes switch
		return $classes;
	} else { // default when no theme mods have been set
		$classes[] = 'three-fourths-centered-r';
		return $classes;
	}
}
add_filter( 'post_class', 'the_mx_add_grid_layouts' );

function the_mx_gallery_post_class( $classes ) {
	global $post;

	if( has_shortcode( $post->post_content, 'gallery' ) ) {
		$classes[] = 'has-gallery';
	}

	if( has_block( 'gallery' ) ) {
		$classes[] = 'has-gallery-block';
	}
	return $classes;
}
add_filter( 'post_class', 'the_mx_gallery_post_class' );

function the_mx_pingback_header() {
	if( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'the_mx_pingback_header' );
