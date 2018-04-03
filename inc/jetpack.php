<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package The_M.X.
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function the_mx_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'the_mx_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'the_mx_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function the_mx_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
		    get_template_part( 'template-parts/content', 'search' );
		else :
		    get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}

/**
 * Script to reload the theme's Javascript for infinite scroll
 */
function the_mx_enqueue_jetpack_scripts() {
	wp_enqueue_script( 'the-mx-restore-js', get_template_directory_uri() . '/js/restore-js.js', array( 'jquery', 'the-mx-scripts', 'the-mx-skrollr' ), '', true );
	$parameters = array(
		'layouts' => get_theme_mod( 'the_mx_layout' ),
	);
	wp_localize_script( 'the-mx-restore-js', 'restoreJSParams', $parameters );
}
add_action( 'wp_enqueue_scripts', 'the_mx_enqueue_jetpack_scripts' );
