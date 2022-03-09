<?php
/* Overrides for theme.json colors on the frontend. Accords to Customizer color schemes */

function the_mx_gutenberg_json_color_overrides() {
	$color_choices = get_theme_mod( 'the_mx_color_scheme', 'default' );
	
	switch( $color_choices ) {
		case 'blue_gray':
			wp_enqueue_style( 'the-mx-frontend-override-blue-gray', get_theme_file_uri( '/css/source/frontend-style-blue-gray.css' ), array( 'the-mx-style' ), '', false );
			break;
		case 'deep_purple':
			wp_enqueue_style( 'the-mx-frontend-override-deep-purple', get_theme_file_uri( '/css/source/frontend-style-deep-purple.css' ), array( 'the-mx-style' ), '', false );
			break;
		case 'pale_orange':
			wp_enqueue_style( 'the-mx-frontend-override-pale-orange', get_theme_file_uri( '/css/source/frontend-style-pale-orange.css' ), array( 'the-mx-style' ), '', false );
			break;
		case 'black':
			wp_enqueue_style( 'the-mx-frontend-override-black', get_theme_file_uri( '/css/source/frontend-style-black.css' ), array( 'the-mx-style' ), '', false );
			break;
		case 'white':
			wp_enqueue_style( 'the-mx-frontend-override-white', get_theme_file_uri( '/css/source/frontend-style-white.css' ), array( 'the-mx-style' ), '', false );
			break;
		default:
			// do nothing
			break;
	}
}
add_action( 'wp_enqueue_scripts', 'the_mx_gutenberg_json_color_overrides' );