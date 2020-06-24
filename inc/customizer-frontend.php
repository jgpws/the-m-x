<?php
/**
 * The M.X. Theme Customizer- front end display.
 *
 * @package The_M.X.
 */

function the_mx_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'the_mx_color_scheme', 'default' );

	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}

	$color_scheme = the_mx_get_color_scheme();

	$color_meta_links = the_mx_hex_to_rgb( $color_scheme[3] );
	$header_text_color = the_mx_hex_to_rgb( esc_url( get_header_textcolor() ) );
	$colors = array(
		'background_color' => $color_scheme[0],
		'primary_1' => $color_scheme[1],
		'primary_2' => $color_scheme[2],
		'primary_3' => $color_scheme[3],
		'primary_4' => $color_scheme[4],
		'accent_1' => $color_scheme[5],
		'accent_2' => $color_scheme[6],
		'accent_3' => $color_scheme[7],
		'header_text_color' => $color_scheme[8],
		'meta_links_color' => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.54)', $color_meta_links ),
		'meta_links_hover_color' => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_meta_links ),
	);

	$color_scheme_css = the_mx_frontend_color_scheme_styles( $colors );
	$user_color_scheme_css = the_mx_frontend_user_color_styles();
	$misc_color_css = the_mx_misc_styles();

	if ( get_theme_mod( 'the_mx_color_scheme' ) != 'custom' ) {
		wp_add_inline_style( 'the-mx-style', $color_scheme_css );
	} else {
		wp_add_inline_style( 'the-mx-style', $user_color_scheme_css );
	}
	wp_add_inline_style( 'the-mx-style', $misc_color_css );
}
add_action( 'wp_enqueue_scripts', 'the_mx_color_scheme_css' );

require get_template_directory() . '/inc/color-schemes-frontend.php';

function the_mx_reverse_primary_4_css() {
	$reverse_text_color = get_theme_mod( 'the_mx_reverse_primary_4_textcolor', 0 );

	if ( $reverse_text_color == 1 ) {
		$reverse_text_color_css = <<<CSS

		/* Reversed to white text color */

		.comment-navigation .nav-previous a:link,
		.comment-navigation .nav-previous a:visited,
		.comment-navigation .nav-next a:link,
		.comment-navigation .nav-next a:visited,
		.posts-navigation .nav-previous a:link,
		.posts-navigation .nav-previous a:visited,
		.posts-navigation .nav-next a:link,
		.posts-navigation .nav-next a:visited,
		.post-navigation .nav-previous a:link,
		.post-navigation .nav-previous a:visited,
		.post-navigation .nav-next a:link,
		.post-navigation .nav-next a:visited,
		.images-navigation .nav-previous a:link,
		.images-navigation .nav-previous a:visited,
		.images-navigation .nav-next a:link,
		.images-navigation .nav-next a:visited {
			color: rgba(255, 255, 255, 0.87);
		}

		.blog .format-image .entry-content,
		.archive .format-image .entry-content,
		.blog .format-audio .entry-content,
		.archive .format-audio .entry-content,
		.blog .format-video .entry-content,
		.archive .format-video .entry-content {
			color: rgba(255, 255, 255, 0.87);
		}

		.blog .format-image .entry-content a:link,
		.archive .format-image .entry-content a:link,
		.blog .format-image .entry-content a:visited,
		.archive .format-image .entry-content a:visited,
		.blog .format-audio .entry-content a:link,
		.archive .format-audio .entry-content a:link,
		.blog .format-audio .entry-content a:visited,
		.archive .format-audio .entry-content a:visited,
		.blog .format-video .entry-content a:link,
		.archive .format-video .entry-content a:link,
		.blog .format-video .entry-content a:visited,
		.archive .format-video .entry-content a:visited {
			color: rgba(255, 255, 255, 0.54);
		}

		.blog .format-image .entry-content a:hover,
		.archive .format-image .entry-content a:hover,
		.blog .format-image .entry-content a:focus,
		.archive .format-image .entry-content a:focus,
		.blog .format-audio .entry-content a:hover,
		.archive .format-audio .entry-content a:hover,
		.blog .format-audio .entry-content a:focus,
		.archive .format-audio .entry-content a:focus,
		.blog .format-video .entry-content a:hover,
		.archive .format-video .entry-content a:hover,
		.blog .format-video .entry-content a:focus,
		.archive .format-video .entry-content a:focus {
			color: rgba(255, 255, 255, 0.7);
		}

		.blog .format-image:not(.has-post-thumbnail) .entry-title,
		.archive .format-image .entry-title,
		.blog .format-audio .entry-title,
		.archive .format-audio .entry-title,
		.blog .format-video .entry-title,
		.archive .format-video .entry-title {
			color: rgba(255, 255, 255, 0.54);
		}

		.blog .format-image:not(.has-post-thumbnail) .entry-title .material-icons,
		.archive .format-image .entry-title .material-icons,
		.blog .format-audio .entry-title .material-icons,
		.archive .format-audio .entry-title .material-icons,
		.blog .format-video .entry-title .material-icons,
		.archive .format-video .entry-title .material-icons {
			color: rgba(255, 255, 255, 0.54);
		}

		.blog .format-aside .entry-content p:not(.view-full-post-link),
		.archive .format-aside .entry-content p:not(.view-full-post-link),
		.blog .format-status .entry-content,
		.archive .format-status .entry-content,
		.blog .format-quote .entry-content,
		.archive .format-quote .entry-content {
			color: rgba(255, 255, 255, 0.54);
		}

		.blog .format-aside a:link,
		.archive .format-aside a:link,
		.blog .format-aside a:visited,
		.archive .format-aside a:visited,
		.blog .format-status a:link,
		.archive .format-status a:link,
		.blog .format-status a:visited,
		.archive .format-status a:visited,
		.blog .format-quote a:link,
		.archive .format-quote a:link,
		.blog .format-quote a:visited,
		.archive .format-quote a:visited {
			color: rgba(255, 255, 255, 0.54);
		}

		.blog .format-aside a:hover,
		.archive .format-aside a:hover,
		.blog .format-aside a:focus,
		.archive .format-aside a:focus,
		.blog .format-status a:hover,
		.archive .format-status a:hover,
		.blog .format-status a:focus,
		.archive .format-status a:focus,
		.blog .format-quote a:hover,
		.archive .format-quote a:hover,
		.blog .format-quote a:focus,
		.archive .format-quote a:focus {
			color: rgba(255, 255, 255, 0.7);
		}

		.blog .format-quote blockquote,
		.archive .format-quote blockquote {
			border-left-color: rgba(255, 255, 255, 0.87);
		}

		.blog [class*="format-"] .cat-links a:link,
		.blog [class*="format-"] .cat-links a:visited,
		.blog [class*="format-"] .tags-links a:link,
		.blog [class*="format-"] .tags-links a:visited,
		.blog [class*="format-"] .edit-link a:link,
		.blog [class*="format-"] .edit-link a:visited,
		.blog [class*="format-"] .comments-link a:link,
		.blog [class*="format-"] .comments-link a:visited,
		.blog [class*="format-"] .posted-on a:link,
		.blog [class*="format-"] .posted-on a:visited {
			color: rgba(255, 255, 255, 0.7);
		}

		.blog .format-standard .cat-links a:link,
		.blog .format-standard .cat-links a:visited,
		.blog .format-standard .tags-links a:link,
		.blog .format-standard .tags-links a:visited,
		.blog .format-standard .edit-link a:link,
		.blog .format-standard .edit-link a:visited,
		.blog .format-standard .comments-link a:link,
		.blog .format-standard .comments-link a:visited,
		.blog .format-standard .posted-on a:link,
		.blog .format-standard .posted-on a:visited,
		.blog .format-image.has-post-thumbnail .posted-on a:link,
		.blog .format-image.has-post-thumbnail .posted-on a:visited {
			color: rgba(255, 255, 255, 0.7);
		}

		.blog .format-gallery .cat-links a:link,
		.blog .format-gallery .cat-links a:visited,
		.blog .format-gallery .tags-links a:link,
		.blog .format-gallery .tags-links a:visited,
		.blog .format-gallery .edit-link a:link,
		.blog .format-gallery .edit-link a:visited,
		.blog .format-gallery .posted-on a:link,
		.blog .format-gallery .posted-on a:visited {
			color: rgba(255, 255, 255, 0.7);
		}

		.blog [class*="format-"] .material-icons,
		.blog [class*="format-"] .material-icons {
			color: rgba(255, 255, 255, 0.54);
		}

		.blog .format-standard .material-icons,
		.blog .format-gallery .material-icons,
		.blog .format-link .material-icons {
			color: rgba(0, 0, 0, 0.54);
		}

		.blog .sticky .material-icons {
			color: #ffffff;
		}

		.archive [class*="format-"] .material-icons,
		.archive [class*="format-"] .material-icons {
			color: rgba(255, 255, 255, 0.54);
		}

		.archive .format-gallery .material-icons,
		.archive .format-link .material-icons {
			color: rgba(0, 0, 0, 0.54);
		}

		.page-title,
		.blog .wp-caption-text,
		.archive .wp-caption-text,
		.search .no-results,
		pre,
		table tbody tr:hover,
		.comment-content {
			color: rgba(255, 255, 255, 0.87);
		}

		.error-404 {
			color: rgba(255, 255, 255, 0.87);
		}

		.error-404 a:link,
		.error-404 a:visited,
		.error-404 .widget li a:link,
		.error-404 .widget.widget li a:visited {
			color: rgba(255, 255, 255, 0.7);
		}

		.error-404 a:hover,
		.error-404 a:focus,
		.error-404 .widget li a:hover,
		.error-404 .widget li a:focus {
			color: rgba(255, 255, 255, 0.87);
		}

		.page-template-template-landing .wp-block-calendar table tbody,
		.page-template-template-landing .wc-block-grid__product-price .wc-block-grid__product-price__value,
		.page-template-template-landing .wc-block-pagination-page,
		.page-template-template-landing .wc-block-pagination-page--active[disabled]:focus,
		.page-template-template-landing .wc-block-pagination-page--active[disabled]:hover {
			color: rgba(255, 255, 255, 0.87);
		}

		.page-template-template-landing .wc-block-pagination-page:not(.wc-block-pagination-page--active):hover,
		.page-template-template-landing .wc-block-pagination-page:not(.wc-block-pagination-page--active):focus {
			background-color: rgba(255, 255, 255, 0.2);
		}

		.page-template-template-landing,
		.page-template-template-landing .type-page a:link,
		.page-template-template-landing .type-page a:visited,
		.page-template-template-landing .is-style-outline .wp-block-button__link {
			color: rgba(255, 255, 255, 0.87);
		}

		.page-template-template-landing .type-page a:not(.wp-block-button__link):hover,
		.page-template-template-landing .type-page a:not(.wp-block-button__link):focus {
			color: #ffffff;
		}
CSS;

		wp_add_inline_style( 'the-mx-style', $reverse_text_color_css );

		return $reverse_text_color_css;
	}
}
add_action( 'wp_enqueue_scripts', 'the_mx_reverse_primary_4_css' );

function the_mx_reverse_supporting_color_css() {
	$reverse_supporting_color = get_theme_mod( 'the_mx_reverse_supporting_color', 0 );

	if ( $reverse_supporting_color == 1 ) {
		$reverse_supporting_color_css = <<<CSS

		/* Reversed to black supporting color */
		a:link,
		a:visited,
		.entry-title a:link,
		.entry-title a:visited,
		.sticky a:link,
		.sticky a:visited,
		.sticky .entry-title a:link,
		.sticky .entry-title a:visited {
			color: rgba(0, 0, 0, 0.54);
		}

		a:hover,
		a:focus {
			color: rgba(0, 0, 0, 0.87);
		}

		.entry-title a:hover,
		.entry-title a:focus,
		.sticky a:hover,
		.sticky a:focus,
		.sticky .entry-title a:hover,
		.sticky .entry-title a:focus {
			color: rgba(0, 0, 0, 0.87);
		}

		.sticky .entry-content,
		.sticky .entry-summary {
			color: rgba(0, 0, 0, 0.87);
		}

		.sticky .material-icons {
			color: rgba(0, 0, 0, 0.54);
		}

		.sticky .cat-links a:link,
		.sticky .cat-links a:visited,
		.sticky .tags-links a:link,
		.sticky .tags-links a:visited,
		.sticky .edit-link a:link,
		.sticky .edit-link a:visited,
		.sticky .posted-on a:link,
		.sticky .posted-on a:visited {
			color: rgba(0, 0, 0, 0.87);
		}

		.sticky .cat-links a:hover,
		.sticky .cat-links a:focus,
		.sticky .tags-links a:hover,
		.sticky .tags-links a:focus,
		.sticky .edit-link a:hover,
		.sticky .edit-link a:focus,
		.sticky .posted-on a:hover,
		.sticky .posted-on a:focus {
			color: rgba(0, 0, 0, 0.87);
		}

		.cat-links a:link,
		.cat-links a:visited,
		.tags-links a:link,
		.tags-links a:visited,
		.edit-link a:link,
		.edit-link a:visited,
		.comments-link a:link,
		.comments-link a:visited,
		.posted-on a:link,
		.posted-on a:visited {
			color: rgba(0, 0, 0, 0.87);
		}

		.site-title a:link,
		.site-title a:visited,
		.site-description,
		.menu-toggle,
		.social-toggle,
		.sidebar-toggle,
		.search-toggle {
			color: rgba(0, 0, 0, 0.87);
		}

		.site-title a:hover,
		.site-title a:focus {
			color: #000000;
		}

		.header-button-panel #menu-social ul li a:link,
		.header-button-panel #menu-social ul li a:visited {
			color: rgba(0, 0, 0, 0.7);
		}

		.header-button-panel #menu-social ul li a:hover {
			color: #000000;
		}

		.header-button-panel input.search-field::-moz-placeholder {
			color: rgba(0, 0, 0, 0.4);
		}

		.header-button-panel .search-field {
			color: rgba(0, 0, 0, 0.87);
		}

		.site-header .main-navigation a:link,
		.site-header .main-navigation a:visited {
			color: rgba(0, 0, 0, 0.7);
		}

		.site-header .main-navigation ul li a:hover,
		.site-header .main-navigation ul li a:focus {
			color: rgba(0, 0, 0, 0.87);
		}

		#custom-header + .main-navigation a:link,
		#custom-header + .main-navigation a:visited {
			color: rgba(255, 255, 255, 0.7);
		}

		#custom-header + .main-navigation .sub-menu a:link,
		#custom-header + .main-navigation .sub-menu a:visited {
			color: rgba(0, 0, 0, 0.7);
		}

		#custom-header + .main-navigation a:hover,
		#custom-header + .main-navigation a:focus {
			color: rgba(255, 255, 255, 0.87);
		}

		#custom-header + .main-navigation .sub-menu a:hover,
		#custom-header + .main-navigation .sub-menu a:focus {
			color: rgba(0, 0, 0, 0.87);
		}

		.site-header .main-navigation .menu-down-arrow {
			color: #000000;
		}

		#custom-header + .main-navigation .menu-down-arrow {
			color: #ffffff;
		}

		.widget .calendar_wrap caption,
		.widget .calendar_wrap td a {
			color: #000000;
		}

		.comment-navigation .nav-previous a:link,
		.comment-navigation .nav-previous a:visited,
		.comment-navigation .nav-next a:link,
		.comment-navigation .nav-next a:visited,
		.posts-navigation .nav-previous a:link,
		.posts-navigation .nav-previous a:visited,
		.posts-navigation .nav-next a:link,
		.posts-navigation .nav-next a:visited,
		.post-navigation .nav-previous a:link,
		.post-navigation .nav-previous a:visited,
		.post-navigation .nav-next a:link,
		.post-navigation .nav-next a:visited,
		.images-navigation .nav-previous a:link,
		.images-navigation .nav-previous a:visited,
		.images-navigation .nav-next a:link,
		.images-navigation .nav-next a:visited {
			color: rgba(0, 0, 0, 0.87);
		}

		.blog .format-gallery.sticky .entry-content p,
		.blog .format-aside.sticky .entry-content p,
		.blog .format-image.sticky .entry-content p,
		.blog .format-video.sticky .entry-content p,
		.blog .format-audio.sticky .entry-content p,
		.blog .format-status.sticky .entry-content p,
		.blog .format-quote.sticky .entry-content p {
			color: rgba(0, 0, 0, 0.54);
		}

		.search .cat-links a:link,
		.search .cat-links a:visited,
		.search .tags-links a:link,
		.search .tags-links a:visited,
		.search .posted-on a:link,
		.search .posted-on a:visited,
		.search .has-post-thumbnail .posted-on a:link,
		.search .has-post-thumbnail .posted-on a:visited {
			color: rgba(0, 0, 0, 0.54);
		}

		.search .cat-links a:hover,
		.search .cat-links a:focus,
		.search .tags-links a:hover,
		.search .tags-links a:focus,
		.search .posted-on a:hover,
		.search .posted-on a:focus,
		.search .has-post-thumbnail .posted-on a:hover,
		.search .has-post-thumbnail .posted-on a:focus {
			color: rgba(0, 0, 0, 0.87);
		}

		.search .format-standard.has-post-thumbnail .entry-title a:link,
		.search .format-image.has-post-thumbnail .entry-title a:link,
		.search .format-standard.has-post-thumbnail .entry-title a:visited,
		.search .format-image.has-post-thumbnail .entry-title a:visited {
			color: rgba(0, 0, 0, 0.54);
		}

		.search .format-standard.has-post-thumbnail .entry-title a:hover,
		.search .format-image.has-post-thumbnail .entry-title a:hover,
		.search .format-standard.has-post-thumbnail .entry-title a:focus,
		.search .format-image.has-post-thumbnail .entry-title a:focus {
			color: rgba(0, 0, 0, 0.87) !important;
		}

		.wp-block-calendar table caption {
			color: #000000;
		}

		.is-style-outline .wp-block-button__link {
			color: rgba(0, 0, 0, 0.54);
		}

		.single.slider .gallery-caption {
			color: rgba(0, 0, 0, 0.87);
		}

		.landing-to-parent a:link,
		.landing-to-parent a:visited {
			color: rgba(0, 0, 0, 0.54);
		}

		.site-footer {
			color: #000000;
		}

		.site-footer a:link,
		.site-footer a:visited,
		.site-footer .widget li a:link,
		.site-footer .widget li a:visited {
			color: rgba(0, 0, 0, 0.87);
		}

		.site-footer a:hover,
		.site-footer a:focus {
			color: #000000;
			border-bottom: 1px solid rgba(0, 0, 0, 0.87);
		}

		.mejs-container,
		.mejs-container .mejs-controls,
		.mejs-embed,
		.mejs-embed body {
			background-color: #222222 !important;
		}

		#infinite-handle span {
			color: #000000;
		}
CSS;
		wp_add_inline_style( 'the-mx-style', $reverse_supporting_color_css );

		return $reverse_supporting_color_css;
	}
}
add_action( 'wp_enqueue_scripts', 'the_mx_reverse_supporting_color_css' );

function the_mx_hero_widgets_styles() {
	$enqueue_main_style = wp_enqueue_style( 'the-mx-style', get_stylesheet_uri() );
	$hero_widgets_color = get_theme_mod( 'the_mx_herotext_color', 'white' );
	$hero_widgets_align = get_theme_mod( 'the_mx_herotext_alignment', 'center' );
	$layout = get_theme_mod( 'the_mx_layout', 'centered' );

	if( $hero_widgets_color == 'white' ) {
		$hero_widgets_css = '
/* Hero widgets color */
#custom-header .hero-widgets-wrap .widget {
	color: rgba(255, 255, 255, 0.87);
}';
	wp_add_inline_style( 'the-mx-style', $hero_widgets_css );
	} else {
		$hero_widgets_css = '
/* Hero widgets color */
#custom-header .hero-widgets-wrap .widget {
	color: rgba(0, 0, 0, 0.87);
}';
	wp_add_inline_style( 'the-mx-style', $hero_widgets_css );
	}

	if( $hero_widgets_align == 'left' ) {
		$hero_widgets_align_css = '
/* Hero widgets align */
#custom-header .hero-widgets-wrap .widget-title {
	margin-left: 0;
	text-align: left;
}

@media screen and (min-width: 37.5em) {
	#custom-header .hero-widgets-wrap {
		margin-left: 2.5%;
		margin-right: 47.5%;
	}
}

@media screen and (min-width: 80em) {
	#custom-header .hero-widgets-wrap {
		margin-left: 3%;
		margin-right: 64%;
	}
}';
	wp_add_inline_style( 'the-mx-style', $hero_widgets_align_css );
	} elseif( $hero_widgets_align == 'right' ) {
		$hero_widgets_align_css = '
#custom-header .hero-widgets-wrap .widget {
	text-align: left;
}

#custom-header .hero-widgets-wrap .widget-title {
	margin-left: 0;
	text-align: left;
}

@media screen and (min-width: 37.5em) {
	#custom-header .hero-widgets-wrap {
		margin-left: 47.5%;
		margin-right: 2.5%;
	}
}

@media screen and (min-width: 80em) {
	#custom-header .hero-widgets-wrap {
		margin-left: 64%;
		margin-right: 3%;
	}
}';
	wp_add_inline_style( 'the-mx-style', $hero_widgets_align_css );
	} else {
		return;
	}
}
add_action( 'wp_enqueue_scripts', 'the_mx_hero_widgets_styles' );

// shows either a default or a custom title in the Image Grid page template
function the_mx_showmore_title_render() {
	$more_button_title = get_theme_mod( 'the_mx_customize_showmore_title', esc_html__( 'More Posts', 'the-m-x' ) );
	if( $more_button_title != '' ) {
		echo esc_html( $more_button_title );
	} else {
		echo esc_html__( 'More posts', 'the-m-x' );
	}
}
