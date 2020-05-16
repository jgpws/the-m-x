<?php
/**
 * The M.X. functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_M.X.
 */

if ( ! function_exists( 'the_mx_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_mx_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The M.X., use a find and replace
	 * to change 'the-m-x' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'the-m-x', get_template_directory() . '/languages/' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Custom logo
	$defaults = array(
		'flex-height' => true,
		'flex-width' => true,
	);
	add_theme_support( 'custom-logo', $defaults );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'the-m-x' ),
		'social' => esc_html__( 'Social Profiles', 'the-m-x' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'audio',
		'gallery',
		'image',
		'link',
		'quote',
		'video',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'the_mx_custom_background_args', array(
		'default-color' => 'efebe9',
		'default-image' => '',
	) ) );

	// Custom image sizes
	add_image_size( 'the-mx-gallery-thumb', 300, 300, array( 'center', 'center' ) );

	// Selective Refresh on widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Support for Gutenberg

	$primary_color_bg_1 = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_1', '#795548' ) );
	$primary_color_bg_1_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $primary_color_bg_1 );
	$primary_color_bg_1_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $primary_color_bg_1 );

	$primary_color_bg_2 = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_2', '#5d4037' ) );
	$primary_color_bg_2_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $primary_color_bg_2 );
	$primary_color_bg_2_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $primary_color_bg_2 );

	$accent_color_bg_1 = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_accent_1', '#ffc107' ) );
	$accent_color_bg_1_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $accent_color_bg_1 );
	$accent_color_bg_1_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $accent_color_bg_1 );

	$accent_color_bg_2 = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_accent_2', '#ffa000' ) );
	$accent_color_bg_2_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $accent_color_bg_2 );
	$accent_color_bg_2_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $accent_color_bg_2 );

	add_theme_support( 'align-wide' );

	add_theme_support(
		'editor-color-palette', array(
			array(
				'name' => esc_html__( 'White', 'the-m-x' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name' => esc_html__( 'Black', 'the-m-x' ),
				'slug' => 'black',
				'color' => '#000000',
			),
			array(
				'name' => esc_html__( 'Primary Color', 'the-m-x' ),
				'slug' => 'primary-1',
				'color' => esc_html( get_theme_mod( 'the_mx_primary_1' ) ),
			),
			array(
				'name' => esc_html__( 'Primary Color Dark Variant', 'the-m-x' ),
				'slug' => 'primary-2',
				'color' => esc_html( get_theme_mod( 'the_mx_primary_2' ) ),
			),
			array(
				'name' => esc_html__( 'Primary Color Darker Variant', 'the-m-x' ),
				'slug' => 'primary-3',
				'color' => esc_html( get_theme_mod( 'the_mx_primary_3' ) ),
			),
			array(
				'name' => esc_html__( 'Primary Color Light Variant', 'the-m-x' ),
				'slug' => 'primary-4',
				'color' => esc_html( get_theme_mod( 'the_mx_primary_4' ) ),
			),
			array(
				'name' => esc_html__( 'Accent Color', 'the-m-x' ),
				'slug' => 'accent-1',
				'color' => esc_html( get_theme_mod( 'the_mx_accent_1' ) ),
			),
			array(
				'name' => esc_html__( 'Accent Color Dark Variant', 'the-m-x' ),
				'slug' => 'accent-2',
				'color' => esc_html( get_theme_mod( 'the_mx_accent_2' ) ),
			),
			array(
				'name' => esc_html__( 'Accent Color Darker Variant', 'the-m-x' ),
				'slug' => 'accent-3',
				'color' => esc_html( get_theme_mod( 'the_mx_accent_3' ) ),
			),
		)
	);
	add_theme_support(
		'editor-gradient-presets',
		array(
			array(
				'name' => esc_html__( 'Primary Color gradient', 'the-m-x' ),
				'gradient' => 'linear-gradient(180deg, ' . esc_attr( $primary_color_bg_1_rgb ) . ' 0%, ' . esc_attr( $primary_color_bg_2_rgb ) . ' 100%)',
				'slug' => 'primary-1',
			),
			array(
				'name' => esc_html__( 'Secondary Color gradient', 'the-m-x' ),
				'gradient' => 'linear-gradient(180deg, ' . esc_attr( $accent_color_bg_1_rgb ) . ' 0%, ' . esc_attr( $accent_color_bg_2_rgb ) . ' 100%)',
				'slug' => 'accent-1',
			),
			array(
				'name' => esc_html__( 'Primary Color translucent gradient', 'the-m-x' ),
				'gradient' => 'linear-gradient(180deg, ' . esc_attr( $primary_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $primary_color_bg_2_rgba_0pcnt ) . ' 100%)',
				'slug' => 'primary-1-translucent',
			),
			array(
				'name' => esc_html__( 'Accent Color translucent gradient', 'the-m-x' ),
				'gradient' => 'linear-gradient(180deg, ' . esc_attr( $accent_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $accent_color_bg_2_rgba_0pcnt ) . ' 100%)',
				'slug' => 'accent-1-translucent',
			)
		)
	);
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'css/source/gutenberg-editor-styles.css', the_mx_editor_override_filepaths() ) );
}
endif;
add_action( 'after_setup_theme', 'the_mx_setup' );

/* Function that adds custom colors to front end from Gutenberg colors */
function the_mx_gutenberg_colors() {
	$primary_1 = get_theme_mod( 'the_mx_primary_1', '#795548' );
	$primary_2 = get_theme_mod( 'the_mx_primary_2', '#5d4037' );
	$primary_3 = get_theme_mod( 'the_mx_primary_3', '#3e2723' );
	$primary_4 = get_theme_mod( 'the_mx_primary_4', '#bcaaa4' );
	$accent_1 = get_theme_mod( 'the_mx_accent_1', '#ffc107' );
	$accent_2 = get_theme_mod( 'the_mx_accent_2', '#ffa000' );
	$accent_3 = get_theme_mod( 'the_mx_accent_3', '#ff6f00' );

	$primary_color_bg_1 = the_mx_hex_to_rgb( $primary_1 );
	$primary_color_bg_1_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $primary_color_bg_1 );
	$primary_color_bg_1_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $primary_color_bg_1 );

	$accent_color_bg_1 = the_mx_hex_to_rgb( $accent_1 );
	$accent_color_bg_1_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $accent_color_bg_1 );
	$accent_color_bg_1_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $accent_color_bg_1 );

	$primary_color_bg_2 = the_mx_hex_to_rgb( $primary_2 );
	$primary_color_bg_2_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $primary_color_bg_2 );
	$primary_color_bg_2_rgba_04pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $primary_color_bg_2 );
	$primary_color_bg_2_rgba_12pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $primary_color_bg_2 );

	$accent_color_bg_2 = the_mx_hex_to_rgb( $accent_2 );
	$accent_color_bg_2_rgb = vsprintf( 'rgb( %1$s, %2$s, %3$s )', $accent_color_bg_2 );
	$accent_color_bg_2_rgba_04pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $accent_color_bg_2 );
	$accent_color_bg_2_rgba_12pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $accent_color_bg_2 );

	$css = '';
	$css = '

/* Block Editor colors / Solid backgrounds */

.has-white-color,
.has-white-color:hover,
.has-white-color:focus,
.wp-block-button__link.has-white-color,
.is-style-outline .wp-block-button__link.has-white-color {
	color: rgba(255, 255, 255, 0.87);
}

.has-white-background-color,
.wp-block-button__link.has-white-background-color,
.wp-block-button__link.has-white-background-color:hover,
.wp-block-button__link.has-white-background-color:active,
.wp-block-button__link.has-white-background-color:focus,
.is-style-outline .wp-block-button__link.has-white-background-color {
	background-color: #ffffff;
}

.has-black-color,
.has-black-color:hover,
.has-black-color:focus,
.wp-block-button__link.has-black-color,
.is-style-outline .wp-block-button__link.has-black-color {
	color: rgba(0, 0, 0, 0.87);
}

.has-black-background-color,
.wp-block-button__link.has-black-background-color,
.wp-block-button__link.has-black-background-color:hover,
.wp-block-button__link.has-black-background-color:active,
.wp-block-button__link.has-black-background-color:focus,
.is-style-outline .wp-block-button__link.has-black-background-color {
	background-color: #000000;
}

.has-primary-1-color,
.has-primary-1-color:hover,
.has-primary-1-color:focus,
.wp-block-button__link.has-primary-1-color,
.is-style-outline .wp-block-button__link.has-primary-1-color {
	color: ' . esc_attr( $primary_1 ) . ';
}

.has-primary-1-background-color,
.wp-block-button__link.has-primary-1-background-color,
.is-style-outline .wp-block-button__link.has-primary-1-background-color {
	background-color: ' . esc_attr( $primary_1 ) . ';
}

.wp-block-button__link.has-primary-1-background-color:hover,
.wp-block-button__link.has-primary-1-background-color:active,
.wp-block-button__link.has-primary-1-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( $primary_1, -0.2 ) ) . ';
}

.has-primary-2-color,
.has-primary-2-color:hover,
.has-primary-2-color:focus,
.wp-block-button__link.has-primary-2-color,
.is-style-outline .wp-block-button__link.has-primary-2-color {
	color: ' . esc_attr( $primary_2 ) . ';
}

.has-primary-2-background-color,
.wp-block-button__link.has-primary-2-background-color,
.is-style-outline .wp-block-button__link.has-primary-2-background-color {
	background-color: ' . esc_attr( $primary_2 ) . ';
}

.wp-block-button__link.has-primary-2-background-color:hover,
.wp-block-button__link.has-primary-2-background-color:active,
.wp-block-button__link.has-primary-2-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( $primary_2, -0.2 ) ) . ';
}

.has-primary-3-color,
.has-primary-3-color:hover,
.has-primary-3-color:focus,
.wp-block-button__link.has-primary-3-color,
.is-style-outline .wp-block-button__link.has-primary-3-color {
	color: ' . esc_attr( $primary_3 ) . ';
}

.has-primary-3-background-color,
.wp-block-button__link.has-primary-3-background-color,
.is-style-outline .wp-block-button__link.has-primary-3-background-color {
	background-color: ' . esc_attr( $primary_3 ) . ';
}

.wp-block-button__link.has-primary-3-background-color:hover,
.wp-block-button__link.has-primary-3-background-color:active,
.wp-block-button__link.has-primary-3-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( $primary_3, -0.2 ) ) . ';
}

.has-primary-4-color,
.has-primary-4-color:hover,
.has-primary-4-color:focus,
.wp-block-button__link.has-primary-4-color,
.is-style-outline .wp-block-button__link.has-primary-4-color {
	color: ' . esc_attr( $primary_4 ) . ';
}

.has-primary-4-background-color,
.wp-block-button__link.has-primary-4-background-color,
.is-style-outline .wp-block-button__link.has-primary-4-background-color {
	background-color: ' . esc_attr( $primary_4 ) . ';
}

.wp-block-button__link.has-primary-4-background-color:hover,
.wp-block-button__link.has-primary-4-background-color:active,
.wp-block-button__link.has-primary-4-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( $primary_4, -0.2 ) ) . ';
}

.has-accent-1-color,
.has-accent-1-color:hover,
.has-accent-1-color:focus,
.wp-block-button__link.has-accent-1-color,
.is-style-outline .wp-block-button__link.has-accent-1-color {
	color: ' . esc_attr( $accent_1 ) . ';
}

.has-accent-1-background-color,
.wp-block-button__link.has-accent-1-background-color,
.is-style-outline .wp-block-button__link.has-accent-1-background-color {
	background-color: ' . esc_attr( $accent_1 ) . ';
}

.wp-block-button__link.has-accent-1-background-color:hover,
.wp-block-button__link.has-accent-1-background-color:active,
.wp-block-button__link.has-accent-1-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( $accent_1, -0.2 ) ) . ';
}

.has-accent-2-color,
.has-accent-2-color:hover,
.has-accent-2-color:focus,
.wp-block-button__link.has-accent-2-color,
.is-style-outline .wp-block-button__link.has-accent-2-color {
	color: ' . esc_attr( $accent_2 ) . ';
}

.has-accent-2-background-color,
.wp-block-button__link.has-accent-2-background-color,
.is-style-outline .wp-block-button__link.has-accent-2-background-color {
	background-color: ' . esc_attr( $accent_2 ) . ';
}

.wp-block-button__link.has-accent-2-background-color:hover,
.wp-block-button__link.has-accent-2-background-color:active,
.wp-block-button__link.has-accent-2-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( $accent_2, -0.2 ) ) . ';
}

.has-accent-3-color,
.has-accent-3-color:hover,
.has-accent-3-color:focus,
.wp-block-button__link.has-accent-3-color,
.is-style-outline .wp-block-button__link.has-accent-3-color {
	color: ' . esc_attr( $accent_3 ) . ';
}

.has-accent-3-background-color,
.wp-block-button__link.has-accent-3-background-color,
.is-style-outline .wp-block-button__link.has-accent-3-background-color {
	background-color: ' . esc_attr( $accent_3 ) . ';
}

.wp-block-button__link.has-accent-3-background-color:hover,
.wp-block-button__link.has-accent-3-background-color:active,
.wp-block-button__link.has-accent-3-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( $accent_3, -0.2 ) ) . ';
}

/* Gradient backgrounds */

.has-primary-1-gradient-background,
.has-primary-1-gradient-background:active,
.has-primary-1-gradient-background:hover {
	background: linear-gradient(180deg, ' . esc_attr( $primary_color_bg_1_rgb ) . ' 0%, ' . esc_attr( $primary_color_bg_2_rgb ) . ' 100%);
}

.wp-block-button__link.has-primary-1-translucent-gradient-background:hover {
	background: linear-gradient(180deg, ' . esc_attr( $primary_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $primary_color_bg_2_rgba_04pcnt ) . ' 100%);
}

.wp-block-button__link.has-primary-1-translucent-gradient-background:active,
.wp-block-button__link.has-primary-1-translucent-gradient-background:focus {
	background: linear-gradient(180deg, ' . esc_attr( $primary_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $primary_color_bg_2_rgba_12pcnt ) . ' 100%);
}

.has-accent-1-gradient-background,
.has-accent-1-gradient-background:active,
.has-accent-1-gradient-background:hover {
	background: linear-gradient(180deg, ' . esc_attr( $accent_color_bg_1_rgb ) . ' 0%, ' . esc_attr( $accent_color_bg_2_rgb ) . ' 100%);
}

.wp-block-button__link.has-accent-1-translucent-gradient-background:hover {
	background: linear-gradient(180deg, ' . esc_attr( $accent_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $accent_color_bg_2_rgba_04pcnt ) . ' 100%);
}

.wp-block-button__link.has-accent-1-translucent-gradient-background:active,
.wp-block-button__link.has-accent-1-translucent-gradient-background:focus {
	background: linear-gradient(180deg, ' . esc_attr( $accent_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $accent_color_bg_2_rgba_12pcnt ) . ' 100%);
}

.is-style-outline .wp-block-button__link.has-primary-1-translucent-gradient-background:hover,
.is-style-outline .wp-block-button__link.has-primary-1-translucent-gradient-background:active,
.is-style-outline .wp-block-button__link.has-primary-1-translucent-gradient-background:focus,
.is-style-outline .wp-block-button__link.has-accent-1-translucent-gradient-background:hover,
.is-style-outline .wp-block-button__link.has-accent-1-translucent-gradient-background:active,
.is-style-outline .wp-block-button__link.has-accent-1-translucent-gradient-background:focus {
	background-color: transparent;
}';

	return wp_strip_all_tags( $css );
}

function the_mx_gutenberg_editor_color_overrides() {
	$color_choices = get_theme_mod( 'the_mx_color_scheme', 'default' );
	wp_enqueue_style( 'the-mx-gutenberg-styles', get_theme_file_uri( '/css/source/gutenberg-editor-styles.css' ), false );

	switch ( $color_choices ) {
		case 'blue_gray':
			wp_enqueue_style( 'the-mx-gutenberg-override-deep-purple', get_theme_file_uri( '/css/source/editor-style-blue-gray.css' ), array( 'the-mx-gutenberg-styles' ), '', false );
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

function the_mx_editor_custom_override() {
	$background_color = get_background_color();
  $primary_color_1 = get_theme_mod( 'the_mx_primary_1' );
  $primary_color_2 = get_theme_mod( 'the_mx_primary_2' );
  $primary_color_3 = get_theme_mod( 'the_mx_primary_3' );
  $primary_color_4 = get_theme_mod( 'the_mx_primary_4' );
  $accent_color_1 = get_theme_mod( 'the_mx_accent_1' );
  $accent_color_2 = get_theme_mod( 'the_mx_accent_2' );
  $accent_color_3 = get_theme_mod( 'the_mx_accent_3' );

	$color_outline_button = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_1' ) );
  $color_outline_button_bg_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $color_outline_button );
  $color_outline_button_bg_focus = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $color_outline_button );

	$primary_color_bg_1 = $color_outline_button;
	$primary_color_bg_2 = the_mx_hex_to_rgb( $primary_color_2 );

	$accent_color_bg_1 = the_mx_hex_to_rgb( $accent_color_1 );
	$accent_color_bg_2 = the_mx_hex_to_rgb( $accent_color_2 );

	$primary_color_bg_1_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $primary_color_bg_1 );
	$primary_color_bg_2_rgba_04pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $primary_color_bg_2 );
	$primary_color_bg_2_rgba_12pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $primary_color_bg_2 );

	$accent_color_bg_1_rgba_0pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.0 )', $accent_color_bg_1 );
	$accent_color_bg_2_rgba_04pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $accent_color_bg_2 );
	$accent_color_bg_2_rgba_12pcnt = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $accent_color_bg_2 );

	$css = '
	.editor-styles-wrapper a {
	  color: ' . esc_attr( $primary_color_1 ) . ' !important;
	}

	.editor-styles-wrapper a:focus {
	  color: ' . esc_attr( $primary_color_2 ) . ' !important;
	}

	.editor-styles-wrapper blockquote.wp-block-quote.is-style-default,
	.editor-styles-wrapper blockquote.wp-block-quote.is-style-large,
	.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce blockquote,
	.editor-styles-wrapper figure.wp-block-pullquote {
	  border-color: ' . esc_attr( $primary_color_1 ) . ';
	}

	.editor-styles-wrapper div.wp-block-button__link {
	  background-color: ' . esc_attr( $accent_color_1 ) . ';
	}

	.editor-styles-wrapper div.wp-block-button__link:hover {
	  background-color: ' . esc_attr( $accent_color_2 ) . ';
	}

	.editor-styles-wrapper .is-style-outline div.wp-block-button__link {
	  color: ' . esc_attr( $primary_color_2 ) . ';
	}

	.editor-styles-wrapper .is-style-outline div.wp-block-button__link:hover {
	  background-color: ' . esc_attr( $color_outline_button_bg_hover ) . ';
	}

	.editor-styles-wrapper .is-style-outline div.wp-block-button__link:active,
	.editor-styles-wrapper .is-style-outline div.wp-block-button__link:focus {
	  background-color: ' . esc_attr( $color_outline_button_bg_focus ) . ';
	}

	.editor-styles-wrapper div.wp-block-button__link.has-primary-1-translucent-gradient-background:hover {
		background: linear-gradient(180deg, ' . esc_attr( $primary_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $primary_color_bg_2_rgba_04pcnt ) . ' 100%) !important;
	}

	.editor-styles-wrapper div.wp-block-button__link.has-primary-1-translucent-gradient-background:active,
	.editor-styles-wrapper div.wp-block-button__link.has-primary-1-translucent-gradient-background:focus {
		background: linear-gradient(180deg, ' . esc_attr( $primary_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $primary_color_bg_2_rgba_12pcnt ) . ' 100%) !important;
	}

	.editor-styles-wrapper div.wp-block-button__link.has-accent-1-translucent-gradient-background:hover {
		background: linear-gradient(180deg, ' . esc_attr( $accent_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $accent_color_bg_2_rgba_04pcnt ) . ' 100%) !important;
	}

	.editor-styles-wrapper div.wp-block-button__link.has-accent-1-translucent-gradient-background:active,
	.editor-styles-wrapper div.wp-block-button__link.has-accent-1-translucent-gradient-background:focus {
		background: linear-gradient(180deg, ' . esc_attr( $accent_color_bg_1_rgba_0pcnt ) . ' 0%, ' . esc_attr( $accent_color_bg_2_rgba_12pcnt ) . ' 100%) !important;
	}

	.wp-block-calendar table caption {
	  background-color: ' . esc_attr( $primary_color_1 ) . ' !important;
	}

	.wp-block-calendar table th {
	  background-color: #' . esc_attr( $background_color ) . ' !important;
	}';

	return $css;
}

function the_mx_image_sizes( $sizes ) {
	$addsizes = array(
		'the-mx-gallery-thumb' => esc_html__( 'Gallery Thumbnail (300 x 300, hard cropped)', 'the-m-x' ),
	);
	$newsizes = array_merge( $sizes, $addsizes );
	return $newsizes;
}
add_filter( 'image_size_names_choose', 'the_mx_image_sizes' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_mx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the_mx_content_width', 960 );
}
add_action( 'after_setup_theme', 'the_mx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function the_mx_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'the-m-x' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets to the Sidebar.', 'the-m-x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s jgd-column-1">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name' 			=> esc_html__( 'Hero Image Widget', 'the-m-x' ),
		'id'				=> 'hero-image-widget',
		'description'	=> esc_html__( 'Add widget to be displayed above Hero (header) Image.', 'the-m-x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s jgd-column-1">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Widgets', 'the-m-x' ),
		'id'				=> 'footer-widget-area',
		'description'	=> esc_html__( 'Add widgets to the Footer.', 'the-m-x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'the_mx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function the_mx_enqueue_scripts() {

	// Shared variables
	$mx_animate = get_theme_mod( 'the_mx_animate_css', 1 );
	$mx_colorbox = get_theme_mod( 'the_mx_enable_colorbox', 0 );

	// Styles
	wp_enqueue_style( 'the-mx-style', get_template_directory_uri() . '/style.css' );

	// Add Gutenberg custom colors to the front end
	wp_add_inline_style( 'the-mx-style', the_mx_gutenberg_colors() );

	wp_enqueue_style( 'the-mx-icons', get_template_directory_uri() . '/css/vendor/themify-icons.css' );
	wp_enqueue_style( 'the-mx-layout-style', get_template_directory_uri() . '/css/minfiles/layout-styles.min.css', array( 'the-mx-style' ) );

	// Icon fonts
	wp_enqueue_style( 'the-mx-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,500,300', false );

	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', false );

	// Conditionally loaded
	if ( $mx_colorbox == 1 && shortcode_exists( 'gallery' ) ) {
		wp_enqueue_style( 'the-mx-colorbox-styles', get_template_directory_uri() . '/css/minfiles/the-mx-colorbox.min.css' );
	}

	if( $mx_animate == 1 ) {
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/minfiles/animation-styles.min.css' );
	}


	// Scripts
	if ( get_theme_mod( 'the_mx_skrollr_animations' ) == 1 ) {
		wp_enqueue_script( 'the-mx-skrollr-data-atts', get_template_directory_uri() . '/js/minfiles/add-skrollr-data-attributes.min.js', array(), '', true );
		$parameters = array(
			'layout_type' => get_theme_mod( 'the_mx_layout', 'centered' ),
		);
		wp_localize_script( 'the-mx-skrollr-data-atts', 'mxSkrollrParams', $parameters );
		wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/minfiles/skrollr.min.js', array(), '', true );
		wp_add_inline_script( 'skrollr',
			'function skrollrInit() {
				var s = skrollr.init({
					forceHeight: false
				});
				//console.log("Skrollr initialized.");
			}

			document.addEventListener( "DOMContentLoaded", skrollrInit );'
		);
		wp_enqueue_script( 'the-mx-skrollr-init', get_template_directory_uri() . '/js/minfiles/mx-skrollr-init.min.js', array(), '', true );
	}

	wp_enqueue_script( 'the-mx-scripts', get_template_directory_uri() . '/js/minfiles/scripts.min.js', array( 'jquery' ), '', true );
	$parameters = array(
		'layouts' => get_theme_mod( 'the_mx_layout', 'centered' ),
	);
	wp_localize_script( 'the-mx-scripts', 'jgdGridParams', $parameters );

	$parameters = array(
		'layouts' => get_theme_mod( 'the_mx_layout', 'centered' ),
	);
	wp_localize_script( 'the-mx-scripts', 'restoreJSParams', $parameters );

	$parameters = array(
		'sliderControl' => get_theme_mod( 'the_mx_single_slider', 0 ),
	);
	wp_localize_script( 'the-mx-scripts', 'mxScriptParams', $parameters );

	wp_localize_script( 'the-mx-scripts', 'colorScheme',
	array(
		'headerTextColor' => get_header_textcolor(),
		'primaryColor3' => esc_html( get_theme_mod( 'the_mx_primary_3', '#3e2723' ) ),
	) );

	wp_enqueue_script( 'throttle-debounce', get_template_directory_uri() . '/js/minfiles/ba-throttle-debounce.min.js', array(), '', true );

	// Conditionally loaded
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( $mx_colorbox == 1 && shortcode_exists( 'gallery' ) ) {
		wp_enqueue_script( 'colorbox', get_template_directory_uri() . '/js/minfiles/jquery.colorbox-min.js', array( 'jquery' ), '', false );
	}

	if ( get_theme_mod( 'the_mx_single_slider' ) == 1 && is_single() ) {
		wp_dequeue_script( 'colorbox' );
		wp_dequeue_style( 'the-mx-colorbox-styles' );
	}

	if( $mx_animate ) {
		wp_enqueue_script( 'ripple', get_template_directory_uri() . '/js/minfiles/ripple.min.js', array( 'jquery' ), '', true );
	}

	if( is_page_template( 'page-templates/template-landing.php' ) ) {
		wp_enqueue_script( 'the-mx-headroom', get_template_directory_uri() . '/js/minfiles/headroom.min.js', array(), '20180530', true );
	}
}
add_action( 'wp_enqueue_scripts', 'the_mx_enqueue_scripts' );
// Additional scripts enqueued in inc/jetpack.php

/* Add <noscript> tag for disabled JavaScript */
function the_mx_noscript() {
	require get_template_directory() . '/inc/noscript.php';
}
add_action( 'wp_head', 'the_mx_noscript' );

/* For the Gutenberg editor styles */
function the_mx_add_gutenberg_styles() {
	wp_enqueue_style( 'the-mx-gutenberg-styles', get_theme_file_uri( '/css/source/gutenberg-editor-styles.css' ), false );
	wp_add_inline_style( 'the-mx-gutenberg-styles', the_mx_gutenberg_colors() );
}
add_action( 'enqueue_block_editor_assets', 'the_mx_add_gutenberg_styles' );

/**
 * Colorbox content
 */
require get_template_directory() . '/inc/colorbox-gallery-content.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/customizer-frontend.php';

require get_template_directory() . '/inc/post-format-functions.php';

require get_template_directory() . '/inc/imagegrid-function.php';

function the_mx_imagegrid_postnum_switcher() {
	// This is used with the posts_per_page parameter in page-templates/page_image_grid.php
	$imagegrid_postcount = get_theme_mod( 'the_mx_select_cat_numposts', 'all' );
	switch( $imagegrid_postcount ) {
		case 'one':
			return 1;
		break;
		case 'two':
			return 2;
		break;
		case 'three':
			return 3;
		break;
		case 'four':
			return 4;
		break;
		case 'five':
			return 5;
		break;
		case 'six':
			return 6;
		break;
		case 'seven':
			return 7;
		break;
		case 'eight':
			return 8;
		break;
		case 'nine':
			return 9;
		break;
		case 'ten':
			return 10;
		break;
		case 'eleven':
			return 11;
		break;
		case 'twelve':
			return 12;
		break;
		default:
			return -1;
	}
}

/**
 * Load Jetpack compatibility file.
 */
if( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* include gallery functions */
require get_template_directory() . '/inc/gallery-functions.php';

/* Hex to RGB converter */

/**
 * Convert HEX to RGB.
 *
 * @since The M.X. 1.2
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function the_mx_hex_to_rgb( $color ) {
	$color = trim( $color, '#' );

	if( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0 , 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red' => $r,
		'green' => $g,
		'blue' => $b,
	);
}

function the_mx_adjust_brightness( $hexCode, $adjustPercent ) {
  /* See the Stack Overflow page https://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
  */
  $hexCode = ltrim($hexCode, '#');

  if ( strlen( $hexCode ) == 3 ) {
    $hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
  }

  $hexCode = array_map( 'hexdec', str_split( $hexCode, 2 ) );

  foreach ( $hexCode as & $color ) {
    $adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
    $adjustAmount = ceil( $adjustableLimit * $adjustPercent );

    $color = str_pad( dechex( $color + $adjustAmount ), 2, '0', STR_PAD_LEFT );
  }

  return '#' . implode( $hexCode );
}
