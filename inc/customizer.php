<?php
/**
 * The M.X. Theme Customizer.
 *
 * @package The_M.X.
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_mx_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->get_section( 'colors' )->title = __( 'Color Schemes', 'the-mx' );
	$wp_customize->get_section( 'colors' )->description = sprintf(
		__('%1$sChoose an alternate color scheme.%2$s %1$sFor more information on creating a custom color scheme, see the %3$sGoogle Material Design Color%4$s page as a guideline.%2$s %1$s* To restore the default background color: While under the Custom color scheme, Select Color, then select Default.%2$s', 'the-mx' ), 
		'<p>', '</p>', '<a href="https://material.io/guidelines/style/color.html#color-color-palette">', '</a>' );
		
	$wp_customize->remove_control( 'header_textcolor' );
	
	$wp_customize->add_setting(
		'the_mx_color_scheme', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'brown',
			'transport' => 'refresh',
			'sanitize_callback' => 'the_mx_sanitize_color_choices',
			'sanitize_js_callback' => 'the_mx_sanitize_color_choices',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_color_scheme', array(
			'type' => 'radio',
			'label' => __( 'Color Scheme', 'the-mx' ),
			'section' => 'colors',
			'choices' => array(
				'brown' => __( 'Brown', 'the-mx' ),
				'blue_gray' => __( 'Blue Gray', 'the-mx' ),
				'custom' => __( 'Custom', 'the-mx' ),
			),
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_primary_1', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#795548',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_primary_1', array(
				'label' => __( 'Primary Color 1', 'the-mx' ),
				'description' => __( 'Color for the title bar, footer, entry-title links, etc.', 'the-mx' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_primary_1',
				//'active_callback' => 'the_mx_show_custom_colors',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_primary_2', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#5d4037',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_primary_2', array(
				'label' => __( 'Primary Color 2', 'the-mx' ),
				'description' => __( 'Color for the header button panel, etc.', 'the-mx' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_primary_2',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_primary_3', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#3e2723',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_primary_3', array(
				'label' => __( 'Primary Color 3', 'the-mx' ),
				'description' => __( 'Color for main site navigation in desktop view, etc.', 'the-mx' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_primary_3',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_primary_4', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#a1887f',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_primary_4', array(
				'label' => __( 'Primary Color 4', 'the-mx' ),
				'description' => __( 'Color behind content navigation bar, etc.', 'the-mx' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_primary_4',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_accent_1', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#ffa000',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_accent_1', array(
				'label' => __( 'Accent Color 1', 'the-mx' ),
				'description' => __( 'Button colors, etc.', 'the-mx' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_accent_1',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_accent_2', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#ffa000',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_accent_2', array(
				'label' => __( 'Accent Color 2', 'the-mx' ),
				'description' => __( 'Link colors, button hover colors, etc.', 'the-mx' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_accent_2',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_accent_3', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#ff6f00',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_accent_3', array(
				'label' => __( 'Accent Color 3', 'the-mx' ),
				'description' => __( 'Link hover colors, etc.', 'the-mx' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_accent_3',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_reverse_textcolor', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_reverse_textcolor', array(
			'type' => 'checkbox',
			'label' => __( 'Reverse text against the background to white.', 'the-mx' ),
			'description' => __( 'Use this setting when text is set against a dark background, as some Post Format styling is placed in front of the background.', 'the-mx' ),
			'section' => 'colors',
			'settings' => 'the_mx_reverse_textcolor',
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_reverse_supporting_color', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_reverse_supporting_color', array(
			'type' => 'checkbox',
			'label' => __( 'Reverse supporting colors to black.', 'the-mx' ),
			'description' => __( 'Use this setting if all four primary colors are set to a very light color.', 'the-mx' ),
			'section' => 'colors',
			'settings' => 'the_mx_reverse_supporting_color',
		)
	);
	
	/* Header images settings */
	// Change title of Header Image section to Hero Image
	// from http://natko.com/changing-default-wordpress-theme-customization-api-sections/
	$wp_customize->get_section('header_image')->title = __( 'Hero Image', 'the-mx' );
	
	$wp_customize->add_setting(
		'the_mx_herotext_color', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'white',
			'transport' => 'postMessage',
			'sanitize_callback' => 'the_mx_sanitize_herocolors',
			'sanitize_js_callback' => 'the_mx_sanitize_herocolors',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_herotext_color', array(
			'type' => 'radio',
			'label' => __( 'Choose hero image text color.', 'the-mx' ),
			'description' => sprintf(__( '%1$sUse this option when a %3$sHero Image Widget%4$s is displayed. A Current header (Hero Image) must be selected first before the Hero Image Widget will display in the Widgets section.%2$s %1$sWhite text is best used for an image with a dark background, while black text works with images with a light background.%2$s', 'the-mx' ), '<p>', '</p>', '<a href="' . admin_url() . 'customize.php?autofocus[section]=sidebar-widgets-hero-image-widget">', '</a>' ),
			'section' => 'header_image',
			'priority' => 40,
			'choices' => array(
				'white' => __( 'White text', 'the-mx' ),
				'black' => __( 'Black text', 'the-mx' ),
			),
		)	
	);
	
	$wp_customize->add_setting(
		'the_mx_herotext_alignment', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'center',
			'transport' => 'postMessage',
			'sanitize_callback' => 'the_mx_sanitize_heroalign',
			'sanitize_js_callback' => 'the_mx_sanitize_heroalign',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_herotext_alignment', array(
			'type' => 'radio',
			'label' => __( 'Align the hero image text.', 'the-mx' ),
			'section' => 'header_image',
			'priority' => 50,
			'choices' => array(
				'left' => __( 'Left', 'the-mx' ),
				'center' => __( 'Center', 'the-mx' ),
				'right' => __( 'Right', 'the-mx' ),
			),
		)	
	);
	
	$wp_customize->add_setting(
		'the_mx_homepage_only', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#000000',
			'transport' => 'refresh',
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
			'sanitize_js_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_homepage_only', array(
			'type' => 'checkbox',
			'label' => __( 'Display Hero Image on the home page only.', 'the-mx' ),
			'section' => 'header_image',
			'priority' => 50,
		)
	);
	
	/* Layout settings */
	$wp_customize->add_section(
		'the_mx_layout_section', array(
			'title' => __( 'Layout', 'the-mx' ),
			'priority' => 65,
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_layout', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'centered',
			'transport' => 'refresh',
			'sanitize_callback' => 'the_mx_sanitize_layout_choices',
			'sanitize_js_callback' => 'the_mx_sanitize_layout_choices',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_layout', array(
			'type' => 'radio',
			'label' => __( 'Choose between three layouts for the blog pages.', 'the-mx' ),
			'description' => __( '* The Centered and Two by two layouts affect widths 1280px and above.', 'the-mx' ),
			'section' => 'the_mx_layout_section',
			'choices' => array(
				'centered' => __( 'Centered- Posts stacked vertically.', 'the-mx' ),
				'twobytwo' => __( 'Two by two- A grid of posts two across the screen', 'the-mx' ),
				'imagegrid' => __( 'Image grid- A grid designed for image or gallery posts, supporting only featured images and captions.', 'the-mx' ),
			),
		)
	);
	
	/* Gallery Settings */
	$wp_customize->add_section(
		'the_mx_gallery_settings', array(
			'title' => __( 'Gallery Settings', 'the-mx' ),
			'description' => sprintf( __( '%1$s* In order to use these options, a post with a gallery must be saved with the Gallery post format.%2$s%1$s** This setting disables Colorbox on single posts.', 'the-mx' ), '<p>', '</p>' ),
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_enable_colorbox', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
			'sanitize_js_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_enable_colorbox', array(
			'type' => 'checkbox',
			'label' => __( 'Enable/disable Colorbox for the gallery', 'the-mx' ),
			'description' => __( 'Enable or disable Colorbox overlay for the WordPress gallery. Check to enable and uncheck to disable.', 'the-mx' ),
			'section' => 'the_mx_gallery_settings',
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_single_slider', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
			'sanitize_js_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_single_slider', array(
			'type' => 'checkbox',
			'label' => __( 'Enable/disable the gallery to be shown as a slider on single posts.**', 'the-mx' ),
			'section' => 'the_mx_gallery_settings',
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_media_link_to', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'attachment',
			'sanitize_callback' => 'the_mx_sanitize_linkto_choices',
			'sanitize_js_callback' => 'the_mx_sanitize_linkto_choices',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_media_link_to', array(
			'type' => 'radio',
			'label' => __( 'Link to a media file or attachment page*', 'the-mx' ),
			'section' => 'the_mx_gallery_settings',
			'choices' => array(
				'attachment' => __( 'Attachment page ( default )', 'the-mx' ),
				'file' => __( 'Media File', 'the-mx' ),
			),
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_gal_col_count', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 3,
			'sanitize_callback' => 'the_mx_sanitize_colchoices',
			'sanitize_js_callback' => 'the_mx_sanitize_colchoices',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_gal_col_count', array(
			'type' => 'select',
			'label' => __( 'Change the column count*', 'the-mx' ),
			'section' => 'the_mx_gallery_settings',
			'choices' => array(
				'default' => __( 'Select a column number', 'the-mx' ),
				'one' => '1',
				'two' => '2',
				'three' => '3',
				'four' => '4',
				'five' => '5',
				'six' => '6',
				'seven' => '7',
				'eight' => '8',
				'nine' => '9',
			),
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_limit_gal_thumbs', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'six',
			'sanitize_callback' => 'the_mx_sanitize_thumbschoices',
			'sanitize_js_callback' => 'the_mx_sanitize_thumbschoices',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_limit_gal_thumbs', array(
			'type' => 'select',
			'label' => __( 'Limit the number of gallery thumbnails on posts/pages*', 'the-mx' ),
			'section' => 'the_mx_gallery_settings',
			'choices' => array(
				'default' => 'Select number of gallery thumbnails',
				'one' => '1',
				'two' => '2',
				'three' => '3',
				'four' => '4',
				'five' => '5',
				'six' => '6',
				'seven' => '7',
				'eight' => '8',
				'nine' => '9',
				'ten' => '10',
				'eleven' => '11',
				'twelve' => '12',
			),
		)
	);
	
	/* Animation */
	$wp_customize->add_section(
		'the_mx_animation_settings', array(
			'title' => __( 'Animation', 'the-mx' ),
			'description' => __( 'In this section, you can enable skrollr and animate.css animations.', 'the-mx' ),
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_skrollr_animations', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
			'sanitize_js_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_skrollr_animations', array(
			'type' => 'checkbox',
			'label' => __( 'Enable animations on scroll, including fade-in of gallery images (with skrollr.js) on the blog homepage.', 'the-mx' ),
			'section' => 'the_mx_animation_settings',
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_animate_css', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
			'sanitize_js_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_animate_css', array(
			'type' => 'checkbox',
			'label' => __('Enable simple animations with animate.css and CSS3.', 'the-mx'),
			'section' => 'the_mx_animation_settings',
		)
	);
}
add_action( 'customize_register', 'the_mx_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_mx_customize_preview_js() {
	wp_enqueue_script( 'the-mx-customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20170415', true );
	$parameters = array(
		'color_scheme_choices' => get_theme_mod( 'the_mx_color_scheme' ),
	);
	wp_localize_script( 'the-mx-customizer', 'mxControlParams', $parameters );
}
add_action( 'customize_preview_init', 'the_mx_customize_preview_js' );

/**
 * Supply Customizer control information for Layout to jgd-grid.js file
 */

// See functions.php

/**
 * Customizer Controls functionality
 */
function the_mx_customizer_controls() {
	wp_enqueue_script( 'the-mx-customizer-controls', get_template_directory_uri() . '/js/customize-controls.js', array( 'jquery' ), '20170412', true );
}
add_action( 'customize_controls_enqueue_scripts', 'the_mx_customizer_controls' );

/* Sanitization functions */
/*function the_mx_sanitize_text( $input ) {
	return sanitize_text_field( $input );
}*/

function the_mx_sanitize_checkbox( $input ) {
	if( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function the_mx_sanitize_color_choices( $input ) {
	if( !in_array( $input, array( 'brown', 'blue_gray', 'custom' ) ) ) {
		$input = 'brown';
	}
	return $input;
}

function the_mx_sanitize_layout_choices( $input ) {
	if( !in_array( $input, array( 'centered', 'twobytwo', 'imagegrid' ) ) ) {
		$input = 'centered';
	}
	return $input;
}

function the_mx_sanitize_linkto_choices( $input ) {
	if( !in_array( $input, array( 'attachment', 'file' ) ) ) {
		$input = 'attachment';
	}
	return $input;
}

function the_mx_sanitize_colchoices( $input ) {
	if( !in_array( $input, array( 'default', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine' ) ) ) {
		$input = 'default';
	}
	return $input;
}

function the_mx_sanitize_thumbschoices( $input ) {
	if( !in_array( $input, array( 'default', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve' ) ) ) {
		$input = 'default';
	}
	return $input;
}

function the_mx_sanitize_herocolors( $input ) {
	if( !in_array( $input, array( 'white', 'black' ) ) ) {
		$input = 'white';
	}
	return $input;
}

function the_mx_sanitize_heroalign( $input ) {
	if( !in_array( $input, array( 'left', 'center', 'right' ) ) ) {
		$input = 'center';
	}
	return $input;
}