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
	
	$wp_customize->get_section( 'colors' )->title = esc_html__( 'Color Schemes', 'the-m-x' );
	$wp_customize->get_section( 'colors' )->description = sprintf(
	/* translators: %1$s: opening html paragraph tag, %2$s: closing html paragraph tag, %3$s: html link -> <a href="https://material.io/guidelines/style/color.html#color-color-palette">, %4$s: closing link tag */
		'%1$s' . esc_html__( 'Choose an alternate color scheme.', 'the-m-x' ) . '%2$s %1$s' . esc_html__( 'For more information on creating a custom color scheme, see the %3$sGoogle Material Design Color%4$s page as a guideline.', 'the-m-x' ) . '%2$s %1$s' . esc_html__( '* To restore the default background color: Select Color, then select Default.', 'the-m-x' ) . '%2$s', 
		'<p>', '</p>', '<a href="https://material.io/guidelines/style/color.html#color-color-palette">', '</a>' );
	
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
			'label' => esc_html__( 'Color Scheme', 'the-m-x' ),
			'section' => 'colors',
			'choices' => array(
				'brown' => esc_html__( 'Brown', 'the-m-x' ),
				'blue_gray' => esc_html__( 'Blue Gray', 'the-m-x' ),
				'custom' => esc_html__( 'Custom', 'the-m-x' ),
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
				'label' => esc_html__( 'Primary Color 1', 'the-m-x' ),
				'description' => esc_html__( 'Color for the title bar, footer, links, etc.', 'the-m-x' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_primary_1',
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
				'label' => esc_html__( 'Primary Color 2', 'the-m-x' ),
				'description' => esc_html__( 'Color for the header button panel, link hover, etc.', 'the-m-x' ),
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
				'label' => esc_html__( 'Primary Color 3', 'the-m-x' ),
				'description' => esc_html__( 'Color for main site navigation in desktop view, etc.', 'the-m-x' ),
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
				'label' => esc_html__( 'Primary Color 4', 'the-m-x' ),
				'description' => esc_html__( 'Color behind content navigation bar, etc.', 'the-m-x' ),
				'section' => 'colors',
				'settings' => 'the_mx_custom_primary_4',
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_custom_accent_1', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => '#ffc107',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize,
			'the_mx_custom_accent_1', array(
				'label' => esc_html__( 'Accent Color 1', 'the-m-x' ),
				'description' => esc_html__( 'Button colors, etc.', 'the-m-x' ),
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
				'label' => esc_html__( 'Accent Color 2', 'the-m-x' ),
				'description' => esc_html__( 'Button hover colors, etc.', 'the-m-x' ),
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
				'label' => esc_html__( 'Accent Color 3', 'the-m-x' ),
				'description' => esc_html__( 'Navigation and widget link hover colors, etc.', 'the-m-x' ),
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
			'label' => esc_html__( 'Reverse text against the background to white.', 'the-m-x' ),
			'description' => esc_html__( 'Use this setting when text is set against a dark background, as some Post Format styling is placed in front of the background.', 'the-m-x' ),
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
			'label' => esc_html__( 'Reverse supporting colors to black.', 'the-m-x' ),
			'description' => esc_html__( 'Use this setting if all four primary colors are set to a very light color.', 'the-m-x' ),
			'section' => 'colors',
			'settings' => 'the_mx_reverse_supporting_color',
		)
	);
	
	/* Header images settings */
	// Change title of Header Image section to Hero Image
	// from http://natko.com/changing-default-wordpress-theme-customization-api-sections/
	$wp_customize->get_section('header_image')->title = esc_html__( 'Hero Image', 'the-m-x' );
	
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
			'default' => 'white',
			'label' => esc_html__( 'Choose hero image text color.', 'the-m-x' ),
			'description' => sprintf(
			/* translators: %3$s: link to internal webpage -> <a href="' . admin_url() . 'customize.php?autofocus[section]=sidebar-widgets-hero-image-widget">, %4$s: </a> */
			'%1$s' . esc_html__( 'Use this option when a %3$sHero Image Widget%4$s is displayed. A Current header (Hero Image) must be selected first before the Hero Image Widget will display in the Widgets section.', 'the-m-x' ) . '%2$s %1$s' . esc_html__( 'White text is best used for an image with a dark background, while black text works with images with a light background.', 'the-m-x' ) . '%2$s', '<p>', '</p>', '<a href="' . esc_url( admin_url() ) . 'customize.php?autofocus[section]=sidebar-widgets-hero-image-widget">', '</a>' ),
			'section' => 'header_image',
			'priority' => 40,
			'choices' => array(
				'white' => esc_html__( 'White text', 'the-m-x' ),
				'black' => esc_html__( 'Black text', 'the-m-x' ),
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
			'label' => esc_html__( 'Align the hero image text.', 'the-m-x' ),
			'section' => 'header_image',
			'priority' => 50,
			'choices' => array(
				'left' => esc_html__( 'Left', 'the-m-x' ),
				'center' => esc_html__( 'Center', 'the-m-x' ),
				'right' => esc_html__( 'Right', 'the-m-x' ),
			),
		)	
	);
	
	$wp_customize->add_setting(
		'the_mx_homepage_only', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
			'sanitize_js_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_homepage_only', array(
			'type' => 'checkbox',
			'label' => esc_html__( 'Display Hero Image on the home page only.', 'the-m-x' ),
			'section' => 'header_image',
			'priority' => 50,
		)
	);
	
	/* Layout settings */
	$wp_customize->add_section(
		'the_mx_layout_section', array(
			'title' => esc_html__( 'Layout', 'the-m-x' ),
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
			'label' => esc_html__( 'Choose between three layouts for the blog pages.', 'the-m-x' ),
			'description' => esc_html__( '* The Centered, Wide and Two by two layouts affect widths 1280px and above.', 'the-m-x' ),
			'section' => 'the_mx_layout_section',
			'choices' => array(
				'centered' => esc_html__( 'Centered- Posts stacked vertically.', 'the-m-x' ),
				'wide' => esc_html__( 'Wide- Posts stacked vertically with a wide content area.', 'the-m-x' ),
				'twobytwo' => esc_html__( 'Two by two- A grid of posts two across the screen', 'the-m-x' ),
				'imagegrid' => esc_html__( 'Image grid- A grid designed for image or gallery posts, supporting only featured images and captions.', 'the-m-x' ),
			),
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_contentlength_choices', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'full',
			'sanitize_callback' => 'the_mx_sanitize_contentlength_choices'
		)
	);
	
	$wp_customize->add_control(
		'the_mx_contentlength_choices', array(
			'type' => 'radio',
			'label' => esc_html__( 'Content Length', 'the-m-x' ),
			'description' => esc_html__( 'Choose between full length content or excerpts on the blog posts page.', 'the-m-x' ),
			'section' => 'the_mx_layout_section',
			'choices' => array(
				'full' => esc_html__( 'Full Content', 'the-m-x' ),
				'excerpt' => esc_html__( 'Excerpt', 'the-m-x' ),
			),
		)
	);
	
	/* Page Template Settings */
	require_once get_stylesheet_directory() . '/inc/dropdown-category.php';
	
	$wp_customize->add_panel(
		'the_mx_page_templates', array(
			'title' => esc_html__( 'Page Template Customizations', 'the-m-x' ),
			'description' => esc_html__( 'In this section are customizations for some of the page templates that can be applied to a custom home page.', 'the-m-x' ),
			'active_callback' => 'the_mx_page_callback',
		)
	);
	
	$wp_customize->add_section(
		'the_mx_imagegrid_template', array(
			'title' => esc_html__( 'Image Grid', 'the-m-x' ),
			'description' => esc_html__( 'Customize the Image Grid page template.', 'the-m-x' ),
			'panel' => 'the_mx_page_templates',
			'active_callback' => 'the_mx_page_callback',
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_cat_dropdown_1', array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'absint',
		)
	);
	
	$wp_customize->add_control( new The_MX_Category_Control( $wp_customize,
		'the_mx_cat_dropdown_1', array(
			'section' => 'the_mx_imagegrid_template',
			'label' => esc_html__( 'Choose a category of posts to display on the Image Grid page', 'the-m-x' ),
		)
	) );
	
	$wp_customize->add_setting(
		'the_mx_select_cat_numposts', array(
			'type' => 'theme_mod',
			'default' => 'all',
			'sanitize_callback' => 'the_mx_sanitize_cat_numposts',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_select_cat_numposts', array(
			'section' => 'the_mx_imagegrid_template',
			'label' => esc_html__( 'Choose the number of posts to show', 'the-m-x' ),
			'type' => 'select',
			'choices' => array(
				'all' => esc_html__( 'Show all image grid posts', 'the-m-x' ),
				'one' => esc_html__( '1', 'the-m-x' ),
				'two' => esc_html__( '2', 'the-m-x' ),
				'three' => esc_html__( '3', 'the-m-x' ),
				'four' => esc_html__( '4', 'the-m-x' ),
				'five' => esc_html__( '5', 'the-m-x' ),
				'six' => esc_html__( '6', 'the-m-x' ),
				'seven' => esc_html__( '7', 'the-m-x' ),
				'eight' => esc_html__( '8', 'the-m-x' ),
				'nine' => esc_html__( '9', 'the-m-x' ),
				'ten' => esc_html__( '10', 'the-m-x' ),
				'eleven' => esc_html__( '11', 'the-m-x' ),
				'twelve' => esc_html__( '12', 'the-m-x' ),
			)
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_add_showmore_button', array(
			'type' => 'theme_mod',
			'default' => 0,
			'transport' => 'postMessage',
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_add_showmore_button', array(
			'section' => 'the_mx_imagegrid_template',
			'label' => esc_html__( 'More posts', 'the-m-x' ),
			'description' => sprintf( 
			/* translators: %1$s, %2$s: <strong>, </strong> */
			esc_html__( 'Add a customizable %1$sMore Posts%2$s button below the posts that links to the posts&rsquo; category page.', 'the-m-x' ), '<strong>', '</strong>' ),
			'type' => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_customize_showmore_title', array(
			'type' => 'theme_mod',
			'default' => esc_html__( 'More Posts', 'the-m-x' ),
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_customize_showmore_title', array(
			'section' => 'the_mx_imagegrid_template',
			'label' => esc_html__( 'Change the title of the More Posts button', 'the-m-x' ),
			'type' => 'text',
		)
	);
	
	$wp_customize->selective_refresh->add_partial( 'the_mx_customize_showmore_title', array(
		'selector' => '.page-template-page_image-grid .more-link',
		'container_inclusive' => false,
		'render_callback' => 'the_mx_showmore_title_render', // in customizer-frontend.php
	) );
	
	/* Gallery Settings */
	$wp_customize->add_section(
		'the_mx_gallery_settings', array(
			'title' => esc_html__( 'Gallery Settings', 'the-m-x' ),
			'description' => sprintf( '%1$s' . esc_html__( '* These settings only apply to galleries displayed on the blog index page. The Gallery post format must be applied to a post containing the gallery.', 'the-m-x' ) . '%2$s%1$s' . esc_html__( '** This setting disables Colorbox on single posts.', 'the-m-x' ), '<p>', '</p>' ),
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
			'label' => esc_html__( 'Show the gallery inside Colorbox', 'the-m-x' ),
			'description' => esc_html__( 'Display the gallery posts inside of a Colorbox overlay.', 'the-m-x' ),
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
			'label' => esc_html__( 'Show the gallery as a slider on single posts.**', 'the-m-x' ),
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
			'label' => esc_html__( 'Link to a media file or attachment page*', 'the-m-x' ),
			'section' => 'the_mx_gallery_settings',
			'choices' => array(
				'attachment' => esc_html__( 'Attachment page ( default )', 'the-m-x' ),
				'file' => esc_html__( 'Media File', 'the-m-x' ),
			),
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_gal_col_count', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'three',
			'sanitize_callback' => 'the_mx_sanitize_colchoices',
			'sanitize_js_callback' => 'the_mx_sanitize_colchoices',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_gal_col_count', array(
			'type' => 'select',
			'label' => esc_html__( 'Change the column count*', 'the-m-x' ),
			'section' => 'the_mx_gallery_settings',
			'choices' => array(
				'default' => esc_html__( 'Select a column number', 'the-m-x' ),
				'one' => esc_html__( '1', 'the-m-x' ),
				'two' => esc_html__( '2', 'the-m-x' ),
				'three' => esc_html__( '3', 'the-m-x' ),
				'four' => esc_html__( '4', 'the-m-x' ),
				'five' => esc_html__( '5', 'the-m-x' ),
				'six' => esc_html__( '6', 'the-m-x' ),
				'seven' => esc_html__( '7', 'the-m-x' ),
				'eight' => esc_html__( '8', 'the-m-x' ),
				'nine' => esc_html__( '9', 'the-m-x' ),
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
			'label' => esc_html__( 'Limit the number of gallery thumbnails on posts/pages*', 'the-m-x' ),
			'section' => 'the_mx_gallery_settings',
			'choices' => array(
				'default' => esc_html__( 'Select number of gallery thumbnails', 'the-m-x' ),
				'one' => esc_html__( '1', 'the-m-x' ),
				'two' => esc_html__( '2', 'the-m-x' ),
				'three' => esc_html__( '3', 'the-m-x' ),
				'four' => esc_html__( '4', 'the-m-x' ),
				'five' => esc_html__( '5', 'the-m-x' ),
				'six' => esc_html__( '6', 'the-m-x' ),
				'seven' => esc_html__( '7', 'the-m-x' ),
				'eight' => esc_html__( '8', 'the-m-x' ),
				'nine' => esc_html__( '9', 'the-m-x' ),
				'ten' => esc_html__( '10', 'the-m-x' ),
				'eleven' => esc_html__( '11', 'the-m-x' ),
				'twelve' => esc_html__( '12', 'the-m-x' ),
			),
		)
	);
	
	/* Animation */
	$wp_customize->add_section(
		'the_mx_animation_settings', array(
			'title' => esc_html__( 'Animation', 'the-m-x' ),
			'description' => esc_html__( 'In this section, you can enable skrollr and animate.css animations.', 'the-m-x' ),
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
			'label' => esc_html__( 'Enable animations on scroll, including fade-in of gallery images (with skrollr.js) on the blog homepage.', 'the-m-x' ),
			'section' => 'the_mx_animation_settings',
		)
	);
	
	$wp_customize->add_setting(
		'the_mx_animate_css', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 1,
			'sanitize_callback' => 'the_mx_sanitize_checkbox',
			'sanitize_js_callback' => 'the_mx_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control(
		'the_mx_animate_css', array(
			'type' => 'checkbox',
			'label' => esc_html__( 'Enable simple animations with animate.css and CSS3.', 'the-m-x' ),
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
		'color_scheme_choices' => get_theme_mod( 'the_mx_color_scheme', 'brown' ),
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
	if( !in_array( $input, array( 'centered', 'wide', 'twobytwo', 'imagegrid' ) ) ) {
		$input = 'centered';
	}
	return $input;
}

function the_mx_sanitize_contentlength_choices( $input ) {
	if( !in_array( $input, array( 'full', 'excerpt' ) ) ) {
		$input = 'full';
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

function the_mx_sanitize_cat_numposts( $input ) {
	if( !in_array( $input, array( 'all', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve' ) ) ) {
		$input = 'all';
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

function the_mx_page_callback() {
	return is_page();
}
