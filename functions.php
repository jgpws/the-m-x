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
	 * to change 'the-mx' to the name of your theme in all the template files.
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
	
	// Support for Gutenberg
	add_theme_support( 'align-wide' );
	
	add_theme_support( 
		'editor-color-palette', array(
			array(
				'name' => esc_html__( 'White', 'the-m-x' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name' => esc_html__( 'Brown 50', 'the-m-x' ),
				'slug' => 'brown-50',
				'color' => '#efebe9',
			),
			array(
				'name' => esc_html__( 'Brown 300', 'the-m-x' ),
				'slug' => 'brown-300',
				'color' => '#a1887f',
			),
			array(
				'name' => esc_html__( 'Brown 500', 'the-m-x' ),
				'slug' => 'brown-500',
				'color' => '#795548',
			),
			array(
				'name' => esc_html__( 'Brown 700', 'the-m-x' ),
				'slug' => 'brown-700',
				'color' => '#5d4037',
			),
			array(
				'name' => esc_html__( 'Brown 900', 'the-m-x' ),
				'slug' => 'brown-900',
				'color' => '#3e2723',
			),
			array(
				'name' => esc_html__( 'Amber 500', 'the-m-x' ),
				'slug' => 'amber-500',
				'color' => '#ffc107',
			),
			array(
				'name' => esc_html__( 'Blue Gray 50', 'the-m-x' ),
				'slug' => 'blue-gray-50',
				'color' => '#eceff1',
			),
			array(
				'name' => esc_html__( 'Blue Gray 300', 'the-m-x' ),
				'slug' => 'blue-gray-300',
				'color' => '#90a4ae',
			),
			array(
				'name' => esc_html__( 'Blue Gray 500', 'the-m-x' ),
				'slug' => 'blue-gray-500',
				'color' => '#607d8b',
			),
			array(
				'name' => esc_html__( 'Blue Gray 700', 'the-m-x' ),
				'slug' => 'blue-gray-700',
				'color' => '#455a64',
			),
			array(
				'name' => esc_html__( 'Blue Gray 900', 'the-m-x' ),
				'slug' => 'blue-gray-900',
				'color' => '#263238',
			)
		)
	);
}
endif;
add_action( 'after_setup_theme', 'the_mx_setup' );

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

	wp_enqueue_style( 'the-mx-sup-style', get_template_directory_uri() . '/css/minfiles/supporting-styles.min.css', array( 'the-mx-style' ) );
	
	// Enqueue this for now; may be added to the Customizer later
	wp_enqueue_style( 'the-mx-right-sidebar-overlay', get_template_directory_uri() . '/css/layouts/content-sidebar-overlay.css', array( 'the-mx-style' ) );
	
	wp_enqueue_script( 'throttle-debounce', get_template_directory_uri() . '/js/minfiles/ba-throttle-debounce.min.js', array(), '', true );
	
	// Icon fonts
	wp_enqueue_style( 'the-mx-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,500,300', false );
	
	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', false );
	
	// Conditionally loaded
	if ( get_theme_mod( 'the_mx_color_scheme' ) == 'blue_gray' ) {
		wp_enqueue_style( 'the-mx-color-bluegray', get_template_directory_uri() . '/css/source/alt-color-scheme-bluegray.css', array( 'the-mx-style' ), '' );
	}
	
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
		'link_to' => get_theme_mod( 'the_mx_media_link_to', 'attachment' ),
	);
	wp_localize_script( 'the-mx-scripts', 'colorboxParams', $parameters );
	$parameters = array(
		'layouts' => get_theme_mod( 'the_mx_layout', 'centered' ),
	);
	wp_localize_script( 'the-mx-scripts', 'restoreJSParams', $parameters );
	
	//wp_enqueue_script( 'the-mx-animations', get_template_directory_uri() . '/js/source/animations.js', array( 'jquery' ), '', true );
	
	$parameters = array(
		'sliderControl' => get_theme_mod( 'the_mx_single_slider', 0 ),
		'primaryColor3' => esc_html( get_theme_mod( 'the_mx_custom_primary_3', '#3e2723' ) ),
		'customColors' => get_theme_mod( 'the_mx_color_scheme', 'brown' ),
	);
	wp_localize_script( 'the-mx-scripts', 'mxScriptParams', $parameters );

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

/* Customizer functions */
function the_mx_medialink_switcher() {
	// see inc/customizer.php
	if( get_theme_mod( 'the_mx_media_link_to' ) == 'attachment' ) {
		return 'attachment';
	} else {
		return 'file';
	}
}

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
