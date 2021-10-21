<?php
/* Overrides for html elements that can't be edited in the backend */

function the_mx_gutenberg_editor_color_overrides() {
	$color_choices = get_theme_mod( 'the_mx_color_scheme', 'default' );
	wp_enqueue_style( 'the-mx-gutenberg-styles', get_theme_file_uri( '/css/source/gutenberg-editor-styles.css' ), false );

	switch ( $color_choices ) {
		case 'blue_gray':
			wp_enqueue_style( 'the-mx-gutenberg-override-blue-gray', get_theme_file_uri( '/css/source/editor-style-blue-gray.css' ), array( 'the-mx-gutenberg-styles' ), '', false );
			break;
		case 'deep_purple':
			wp_enqueue_style( 'the-mx-gutenberg-override-deep-purple', get_theme_file_uri( '/css/source/editor-style-deep-purple.css' ), array( 'the-mx-gutenberg-styles' ), '', false );
			break;
		case 'pale_orange':
			wp_enqueue_style( 'the-mx-gutenberg-override-pale-orange', get_theme_file_uri( '/css/source/editor-style-pale-orange.css' ), array( 'the-mx-gutenberg-styles' ), '', false );
			break;
		case 'black':
			wp_enqueue_style( 'the-mx-gutenberg-override-black', get_theme_file_uri( '/css/source/editor-style-black.css' ), array( 'the-mx-gutenberg-styles' ), '', false );
			break;
		case 'white':
			wp_enqueue_style( 'the-mx-gutenberg-override-white', get_theme_file_uri( '/css/source/editor-style-white.css' ), array( 'the-mx-gutenberg-styles' ), '', false );
			break;
		case 'custom':
			wp_add_inline_style( 'the-mx-gutenberg-styles', the_mx_editor_custom_override() );
			break;
		default:
			// do nothing
			break;
	}
}
add_action( 'enqueue_block_editor_assets', 'the_mx_gutenberg_editor_color_overrides' );

function the_mx_editor_override_filepaths() {
	$color_choices = get_theme_mod( 'the_mx_color_scheme', 'default' );

	switch ( $color_choices ) {
		case 'blue_gray':
			return '/css/source/editor-style-blue-gray.css';
			break;
		case 'deep_purple':
			return '/css/source/editor-style-deep-purple.css';
			break;
		case 'pale_orange':
			return '/css/source/editor-style-pale-orange.css';
			break;
		case 'black':
			return '/css/source/editor-style-black.css';
			break;
		case 'white':
			return '/css/source/editor-style-white.css';
			break;
		default:
			// do nothing
			break;
	}
}
