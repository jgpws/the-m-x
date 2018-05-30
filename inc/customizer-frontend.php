<?php
/**
 * The M.X. Theme Customizer- front end display.
 *
 * @package The_M.X.
 */

function the_mx_frontend_customizer_styles() {
	$enqueue_main_style = wp_enqueue_style( 'the-mx-style', get_stylesheet_uri() );
	$hero_widgets_color = get_theme_mod( 'the_mx_herotext_color' );
	$hero_widgets_align = get_theme_mod( 'the_mx_herotext_alignment' );
	$layout = get_theme_mod( 'the_mx_layout' );
	
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
		
	}
	
	$is_custom_colors = get_theme_mod( 'the_mx_color_scheme' );
	
	if( $is_custom_colors == 'custom' ) {
		$primary_color_1 = esc_html( get_theme_mod( 'the_mx_custom_primary_1' ) );
		$primary_color_2 = esc_html( get_theme_mod( 'the_mx_custom_primary_2' ) );
		$primary_color_3 = esc_html( get_theme_mod( 'the_mx_custom_primary_3' ) );
		$primary_color_4 = esc_html( get_theme_mod( 'the_mx_custom_primary_4' ) );
		$accent_color_1 = esc_html( get_theme_mod( 'the_mx_custom_accent_1' ) );
		$accent_color_2 = esc_html( get_theme_mod( 'the_mx_custom_accent_2' ) );
		$accent_color_3 = esc_html( get_theme_mod( 'the_mx_custom_accent_3' ) );
		$misc_css = '';
		$bg_color = get_background_color();
		
		if( $primary_color_4 != '' ) {
		$primary_color_4_css = '
a:visited {
	color: ' . $primary_color_4 . ';
}';
		wp_add_inline_style( 'the-mx-style', $primary_color_4_css );
		}
		 
		if( $primary_color_1 != '' ) {
			
			$primary_color_1_css = '
/* Primary Color 1 */
a:link {
	color: ' . $primary_color_1 . ';
}

blockquote, q, .wp-block-pullquote {
	border-left-color: ' . $primary_color_1 . ';
}

.site-branding {
	background-color: ' . $primary_color_1 . ';
}

#menu-social ul li a:link,
#menu-social ul li a:visited {
	color: ' . $primary_color_1 . ';
}

.entry-title a:link,
.page-title a:link {
	color: ' . $primary_color_1 . ';
}

.search .format-standard.has-post-thumbnail .entry-title a:link,
.search .format-image.has-post-thumbnail .entry-title a:link {
  color: ' . $primary_color_1 . ';
}

.search .cat-links a:link,
.search .cat-links a:visited,
.search .tags-links a:link,
.search .tags-links a:visited,
.search .posted-on a:link,
.search .posted-on a:visited,
.search .has-post-thumbnail .posted-on a:link,
.search .has-post-thumbnail .posted-on a:visited {
	color: ' . $primary_color_1 . ';
}

.sticky {
	background-color: ' . $primary_color_1 . ';
}

.widget .calendar_wrap caption,
.widget .calendar_wrap td a {
	background-color: ' . $primary_color_1 . ';
}

.site-footer {
	background-color: ' . $primary_color_1 . ';
}

#custom-header {
	background-color: ' . $primary_color_1 . ';
}

#infinite-handle span {
	background-color: ' . $primary_color_1 . ';
}';
		wp_add_inline_style( 'the-mx-style', $primary_color_1_css );
		}
		
		if( $primary_color_2 != '' ) {
			$primary_color_2_css = '
/* Primary Color 2 */
.site-header #header-button-panel {
	background-color: ' . $primary_color_2 . ';
}

#header-button-panel .searchform {
	background-color: ' . $primary_color_2 . ';
}

a:hover,
a:focus {
	color: ' . $primary_color_2 . ';
}

.entry-title a:hover,
.entry-title a:focus,
.page-title a:hover,
.page-title a:focus {
  color: ' . $primary_color_2 . ' !important;
}

.search .cat-links a:hover,
.search .cat-links a:focus,
.search .tags-links a:hover,
.search .tags-links a:focus,
.search .posted-on a:hover,
.search .posted-on a:focus {
	color: ' . $primary_color_2 . ';
}

.wp-block-image.alignfull {
	background-color: ' . $primary_color_2 . ';
}';
		wp_add_inline_style( 'the-mx-style', $primary_color_2_css );
		}
		
		if( $primary_color_3 != '' ) {
			$primary_color_3_css = '
/* Primary Color 3 */
.lds-ring div {
	border-color: ' . $primary_color_3 . ' transparent transparent transparent !important;
}

@media screen and (min-width: 37.5em) {
	.site-header .main-navigation {
		background-color: ' . $primary_color_3 . ';
	}
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
	background-color: ' . $primary_color_3 . ';
}

.cat-links a:hover,
.cat-links a:focus,
.tags-links a:hover,
.tags-links a:focus,
.edit-link a:hover,
.edit-link a:focus,
.comments-link a:hover,
.comments-link a:focus,
.posted-on a:hover,
.posted-on a:focus {
	background-color: ' . $primary_color_3 . ';
}

.mejs-container,
.mejs-container .mejs-controls,
.mejs-embed,
.mejs-embed body {
	background-color: ' . $primary_color_3 . ' !important;
}

.featured-image {
	background-color: ' . $primary_color_3 . ';
}

.single.slider .gallery,
.single.slider .slider-button-panel {
	background-color: ' . $primary_color_3 . ';
}';
		wp_add_inline_style( 'the-mx-style', $primary_color_3_css );
		}
		
		if( $primary_color_4 != '' ) {
			$primary_color_4_css = '
/* Primary Color 4 */
.site-main .comment-navigation,
.site-main .posts-navigation,
.site-main .post-navigation,
.site-main .images-navigation {
	background-color: ' . $primary_color_4 . ';
}

.entry-title a:visited,
.page-title a:visited {
  color: ' . $primary_color_4 . ';
}

.return-to-parent {
	background-color: ' . $primary_color_4 . ';
}

.blog .format-gallery.sticky,
.blog .format-aside.sticky,
.blog .format-image.sticky,
.blog .format-video.sticky,
.blog .format-audio.sticky,
.blog .format-status.sticky,
.blog .format-quote.sticky {
	background-color: ' . $primary_color_4 . ';
}

.search .format-standard.has-post-thumbnail .entry-title a:visited,
.search .format-image.has-post-thumbnail .entry-title a:visited {
	color: ' . $primary_color_4 . ';
}
	
#cboxContent {
	background-color: ' . $primary_color_4 . ' !important;
}';
		wp_add_inline_style( 'the-mx-style', $primary_color_4_css );
		}
		
		if( $accent_color_1 != '' ) {
			$accent_color_1_css = '
/* Accent Color 1 */
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.wp-block-button .wp-block-button__link {
	background-color: ' . $accent_color_1 . ';
}
	
input[type="text"],
input[type="email"],
input[type="url"],
input[type="password"],
input[type="search"],
input[type="number"],
input[type="tel"],
input[type="range"],
input[type="date"],
input[type="month"],
input[type="week"],
input[type="time"],
input[type="datetime"],
input[type="datetime-local"],
input[type="color"],
textarea,
select {
	border-bottom-color: ' . $accent_color_1 . ';
}

.menu-toggle:hover,
.social-toggle:hover,
.search-toggle:hover,
.sidebar-toggle:hover {
  color: ' . $accent_color_1 . ';
}

.menu-toggle:focus,
.social-toggle:focus,
.search-toggle:focus,
.sidebar-toggle:focus,
.searchform.toggled + .search-toggle {
	color: ' . $accent_color_1 . ';
}

.sidebar-toggle.toggled:focus {
	color: rgba(0, 0, 0, 0.87);
}

@media screen and (min-width: 37.5em) {
	.site-header .main-navigation ul li a:hover,
	.site-header .main-navigation ul li a:focus,
	.site-header .main-navigation .current_page_item > a,
	.site-header .main-navigation .current-menu-item > a,
	.site-header .main-navigation .current_page_ancestor > a,
	.site-header .main-navigation .current-menu-ancestor > a {
  		border-bottom-color: ' . $accent_color_1 . ';
	}
}

.more-link:link,
.more-link:visited {
	background-color: ' . $accent_color_1 . ';
}

.more-images-link a {
	background-color: ' . $accent_color_1 . ';
}

.single.slider .slider-button-panel .slider-previous,
.single.slider .slider-button-panel .slider-next {
	background-color: ' . $accent_color_1 . ';
}

';
		wp_add_inline_style( 'the-mx-style', $accent_color_1_css );
		}
		
		if( $accent_color_2 != '' ) {
			$accent_color_2_css = '
/* Accent Color 2 */
button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.wp-block-button .wp-block-button__link:hover {
  background-color: ' . $accent_color_2 . ';
}

button:active,
button:focus,
input[type="button"]:active,
input[type="button"]:focus,
input[type="reset"]:active,
input[type="reset"]:focus,
input[type="submit"]:active,
input[type="submit"]:focus,
.wp-block-button .wp-block-button__link:active,
.wp-block-button .wp-block-button__link:focus {
  background-color: ' . $accent_color_2 . ';
}

.main-navigation .current_page_item > a,
.main-navigation .current-menu-item > a,
.main-navigation .current_page_ancestor > a,
.main-navigation .current-menu-ancestor > a {
  color: ' . $accent_color_2 . ';
}

.more-link:hover,
.more-link:focus,
.more-images-link a:hover,
.more-images-link a:focus {
	background-color: ' . $accent_color_2 . ';
	color: #000000;
}

.single.slider .slider-button-panel .slider-previous:hover,
.single.slider .slider-button-panel .slider-next:hover,
.single.slider .slider-button-panel .slider-previous:focus,
.single.slider .slider-button-panel .slider-next:focus {
	background-color: ' . $accent_color_2 . ';
}';
		wp_add_inline_style( 'the-mx-style', $accent_color_2_css );
		}
		
		if( $accent_color_3 != '' ) {
			$accent_color_3_css = '
/* Accent Color 3 */
mark, ins {
	background-color: ' . $accent_color_3 . ';
}

.main-navigation a:hover,
.main-navigation a:focus {
  color: ' . $accent_color_3 . ';
}

.main-navigation ul ul a:hover,
.main-navigation ul ul a.focus {
	color: ' . $accent_color_3 . ';
}

.widget li a:hover,
.widget li a:focus {
  color: ' . $accent_color_3 . ';
}

.widget .recentcomments a:hover,
.widget .recentcomments a:focus,
.widget ul li .rsswidget:hover,
.widget ul li .rsswidget:focus {
	border-bottom-color: ' . $accent_color_3 . ';
}

@media screen and (min-width: 37.5em) {
	.site-header .main-navigation .children a:hover,
	.site-header .main-navigation .children a:focus,
	.site-header .main-navigation .sub-menu a:hover,
	.site-header .main-navigation .sub-menu a:focus {
		color: ' . $accent_color_3 . ';
	}
}';
		wp_add_inline_style( 'the-mx-style', $accent_color_3_css );
		}
		
		$misc_css = '
/* Miscellaneous */
#cboxClose {
	background: url(' . get_template_directory_uri() . '/css/images/ic_cancel_white_24px.svg) no-repeat center center !important;
}

#cboxClose:hover {
	background:url(' . get_template_directory_uri() . '/css/images/ic_cancel_white_hover_24px.svg) no-repeat center center !important;
}

pre {
	background-color: #' . $bg_color . ';
}

.format-standard.has-post-thumbnail .entry-title a:hover,
.format-standard.has-post-thumbnail .entry-title a:focus,
.format-image.has-post-thumbnail .entry-title a:hover,
.format-image.has-post-thumbnail .entry-title a:hover {
	color: #ffffff !important;
}

.format-image,
.format-audio,
.format-video,
.format-aside,
.format-status,
.format-quote {
	background-color: #' . $bg_color . ';
}

.sticky a:link,
.sticky a:visited {
	color: rgba(255, 255, 255, 0.87);
}

.sticky a:hover,
.sticky a:focus {
	color: #ffffff !important;
}

body.attachment.custom-background {
	background-color: #ffffff;
}

body.attachment.custom-background.colorbox .entry-attachment-image p {
	background-color: #' . $bg_color . ';
}';
		wp_add_inline_style( 'the-mx-style', $misc_css );
	}
	
	$reverse_text_color = get_theme_mod( 'the_mx_reverse_textcolor', 0 );
	$reverse_supporting_color = get_theme_mod( 'the_mx_reverse_supporting_color', 0 );
	
	if( $reverse_text_color == 1 ) {
		$reverse_text_color_css = '
/* Reversed text color */
.blog .format-image .entry-content,
.archive .format-image .entry-content,
.blog .format-audio .entry-content,
.archive .format-audio .entry-content,
.blog .format-video .entry-content,
.archive .format-video .entry-content {
	color: #ffffff;
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
	color: rgba(255, 255, 255, 0.87);
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
	color: #ffffff;
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
	color: rgba(255, 255, 255, 0.87);
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
	color: #ffffff;
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
	color: rgba(255, 255, 255, 0.87);
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
	color: rgba(255, 255, 255, 0.87);
}

.blog .format-gallery .cat-links a:link,
.blog .format-gallery .cat-links a:visited,
.blog .format-gallery .tags-links a:link,
.blog .format-gallery .tags-links a:visited,
.blog .format-gallery .edit-link a:link,
.blog .format-gallery .edit-link a:visited,
.blog .format-gallery .posted-on a:link,
.blog .format-gallery .posted-on a:visited {
	color: rgba(255, 255, 255, 0.87);
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
.search .no-results input.search-field,
pre {
	color: rgba(255, 255, 255, 0.87);
}

.error-404 {
	color: #ffffff;
}

.error-404 a:link,
.error-404 a:visited,
.error-404 .widget li a:link,
.error-404 .widget.widget li a:visited {
	color: rgba(255, 255, 255, 0.87);
}

.error-404 a:hover,
.error-404 a:focus,
.error-404 .widget li a:hover,
.error-404 .widget li a:focus {
	color: #ffffff;
}

.error-404 input.search-field::-moz-placeholder,
.search .no-results input.search-field::-moz-placeholder {
	color: rgba(255, 255, 255, 0.4);
	font-weight: 600;
	opacity: 1;
}
';
		wp_add_inline_style( 'the-mx-style', $reverse_text_color_css );
	}
	
	if( $reverse_supporting_color == 1 ) {
		$reverse_supporting_color_css = '
/* Reversed supporting color */
a:link,
a:visited,
.entry-title a:link,
.entry-title a:visited,
.sticky a:link,
.sticky a:visited {
	color: rgba(0, 0, 0, 0.54);
}

a:hover,
a:focus {
	color: rgba(0, 0, 0, 0.87);
}

.entry-title a:hover,
.entry-title a:focus,
.sticky a:hover,
.sticky a:focus {
	color: rgba(0, 0, 0, 0.87) !important;
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
	color: rgba(0, 0, 0, 0.87) !important;
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

#header-button-panel #menu-social ul li a:link,
#header-button-panel #menu-social ul li a:visited {
	color: rgba(0, 0, 0, 0.7);
}

#header-button-panel #menu-social ul li a:hover {
	color: #000000;
}

#header-button-panel input.search-field::-moz-placeholder {
	color: rgba(0, 0, 0, 0.4);
}

#header-button-panel .search-field {
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

.site-header .main-navigation .menu-down-arrow {
	color: #000000;
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

.single.slider .gallery-caption {
	color: rgba(0, 0, 0, 0.87);
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

#infinite-handle span {
	color: #000000;
}';
	
		wp_add_inline_style( 'the-mx-style', $reverse_supporting_color_css );
	}
}
add_action( 'wp_enqueue_scripts', 'the_mx_frontend_customizer_styles' );
?>