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

	// Support for WooCommerce
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );

	// Support for Gutenberg
	add_theme_support( 'align-wide' );

	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'editor-styles' );

	// the_mx_editor_override_filepaths() function is in /inc/gutenberg-backend-color-overrides.php.
	add_editor_style( array( 'css/source/gutenberg-editor-styles.css', the_mx_editor_override_filepaths() ) );
}
endif;
add_action( 'after_setup_theme', 'the_mx_setup' );

require get_template_directory() . '/inc/gutenberg-frontend-color-overrides.php';

require get_template_directory() . '/inc/gutenberg-frontend-colors.php';

require get_template_directory() . '/inc/gutenberg-backend-color-overrides.php';

require get_template_directory() . '/inc/gutenberg-backend-colors.php';

function the_mx_image_sizes( $sizes ) {
	$addsizes = array(
		'the-mx-gallery-thumb' => esc_html__( 'Gallery Thumbnail (300 x 300, hard cropped)', 'the-m-x' ),
	);
	$newsizes = array_merge( $sizes, $addsizes );
	return $newsizes;
}
add_filter( 'image_size_names_choose', 'the_mx_image_sizes' );

/**
 * Prints the header reusable block.
 * If a "site-header" reusable block doesn't exist, return false.
 *
 * @return bool
 */
function the_mx_header_reusable_block() {

	// Run the query.
	$posts = get_posts( [
		'post_type' => 'wp_block',
		'title' => 'site-header',
	] );

	// If a block was located print it and return true.
	if ( $posts && isset( $posts[0] ) ) {
		echo do_blocks( $posts[0]->post_content );
		return true;
	}

	// If we got this far the header block doesn't exist.
	// Return false.
	return false;
}

function the_mx_header() {
	?>
	<?php if (get_theme_mod( 'the_mx_block_header' ) === 1 ) { ?>
		<header id="masthead" class="site-header-blocks" role="banner">
		<?php // Print the header. If one doesn't exist, print custom content. ?>
		<?php if ( ! the_mx_header_reusable_block() ) : ?>
			<?php //get_template_part( 'fallback-header' ); ?>
			<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
				<div class="create-header-message-wrap">
				<p class="create-header-message-body">
					<?php esc_html_e( 'Ready to use blocks for your header?', 'the-m-x' ); ?>
				</p>
				<p>
					<a class="create-header-link" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=wp_block&post_title=site-header' ) ); ?>">
						<?php esc_html_e( 'Create a new header', 'the-m-x' ); ?></a>
				</p>
				</div>
			<?php } ?>
			<?php endif; ?>
		</header>
	<?php } else { ?>
		<header id="masthead" class="site-header" role="banner">
			<?php get_template_part( 'fallback-header' ); ?>
		</header>
	<?php } ?>
	<?php
}

require get_template_directory() . '/inc/block-patterns.php';

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
		'name' 					=> esc_html__( 'Hero Image Widget', 'the-m-x' ),
		'id'						=> 'hero-image-widget',
		'description'		=> esc_html__( 'Add widget to be displayed above Hero (header) Image.', 'the-m-x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s jgd-column-1">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'					=> esc_html__( 'Footer Widgets', 'the-m-x' ),
		'id'						=> 'footer-widget-area',
		'description'		=> esc_html__( 'Add widgets to the Footer.', 'the-m-x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'WooCommerce Widgets', 'the-m-x' ),
		'id' => 'wc-widget-area',
		'description' => esc_html__( 'Add widgets to your WooCommerce shop in a sidebar.', 'the-m-x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s jgd-column-1">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'the_mx_widgets_init' );

/**
 * WooCommerce hooks/Functions
 */
 /**
  * Check if WooCommerce is activated
  */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/**
 * Enqueue scripts and styles.
 */

function the_mx_enqueue_scripts() {

	// Shared variables
	$mx_animate = get_theme_mod( 'the_mx_animate_css', 1 );
	$mx_colorbox = get_theme_mod( 'the_mx_enable_colorbox', 0 );

	// Styles
	wp_enqueue_style( 'the-mx-style', get_template_directory_uri() . '/style.min.css' );

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

	if ( $mx_animate == 1 ) {
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/minfiles/animation-styles.min.css' );
	}

	if ( is_woocommerce_activated() ) {
		wp_enqueue_style( 'the-mx-wc-styles', get_theme_file_uri( '/css/minfiles/mx-woocommerce-styles.min.css' ) );
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

	wp_enqueue_script( 'the-mx-scripts', get_template_directory_uri() . '/js/minfiles/scripts.min.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/minfiles/scripts.min.js' ), true );
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
 * Scripts for custom block styles
 */
function the_mx_block_styles() {
	wp_enqueue_script( 'the-mx-block-styles', get_stylesheet_directory_uri() . '/js/source/block-styles.js', array( 'wp-blocks', 'wp-dom' ),
	filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'the_mx_block_styles' );

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

	$hexCode = preg_replace("/[^0-9a-fA-F]/", "", $hexCode);

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
