<?php
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

.editor-styles-wrapper input[type="text"],
.editor-styles-wrapper input[type="email"],
.editor-styles-wrapper input[type="url"],
.editor-styles-wrapper input[type="password"],
.editor-styles-wrapper input[type="search"],
.editor-styles-wrapper input[type="number"],
.editor-styles-wrapper input[type="tel"],
.editor-styles-wrapper input[type="range"],
.editor-styles-wrapper input[type="date"],
.editor-styles-wrapper input[type="month"],
.editor-styles-wrapper input[type="week"],
.editor-styles-wrapper input[type="time"],
.editor-styles-wrapper input[type="datetime"],
.editor-styles-wrapper input[type="datetime-local"],
.editor-styles-wrapper input[type="color"],
.editor-styles-wrapper textarea:not(.editor-post-title__input),
.editor-styles-wrapper select {
  border-bottom-color: ' . esc_attr( $accent_color_1 ) . ' !important;
}

.editor-styles-wrapper button,
.editor-styles-wrapper input[type="button"],
.editor-styles-wrapper input[type="reset"],
.editor-styles-wrapper input[type="submit"] {
	background-color: ' . esc_attr( $accent_color_1 ) . ' !important;
}

.editor-styles-wrapper button:hover,
.editor-styles-wrapper input[type="button"]:hover,
.editor-styles-wrapper input[type="reset"]:hover,
.editor-styles-wrapper input[type="submit"]:hover {
	background-color: ' . esc_attr( $accent_color_2 ) . ' !important;
}

.editor-styles-wrapper pre,
.editor-styles-wrapper .wp-block-code,
.editor-styles-wrapper table tbody tr:hover {
	background-color: #' . esc_attr( $background_color ) . ' !important;
}

.editor-styles-wrapper blockquote.wp-block-quote.is-style-default,
.editor-styles-wrapper blockquote.wp-block-quote.is-style-large,
.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce blockquote,
.editor-styles-wrapper figure.wp-block-pullquote {
  border-color: ' . esc_attr( $primary_color_1 ) . ';
}

.editor-styles-wrapper a.wp-block-button__link,
.editor-styles-wrapper button.wp-block-button__link,
.editor-styles-wrapper div.wp-block-button__link,
.editor-styles-wrapper div.wp-block-file .wp-block-file__button {
  background-color: ' . esc_attr( $accent_color_1 ) . ';
}

.editor-styles-wrapper a.wp-block-button__link:hover,
.editor-styles-wrapper button.wp-block-button__link:hover,
.editor-styles-wrapper div.wp-block-button__link:hover,
.editor-styles-wrapper div.wp-block-file .wp-block-file__button:hover {
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

.editor-styles-wrapper figure.wp-block-table.is-style-stripes tbody tr:nth-child(odd) {
	background-color: #' . esc_attr( $background_color ) . ' !important;
}

.wp-block-calendar table caption {
  background-color: ' . esc_attr( $primary_color_1 ) . ' !important;
}

.wp-block-calendar table th {
  background-color: #' . esc_attr( $background_color ) . ' !important;
}

button.wc-block-pagination-page:not(.components-button):not(.mce-open):not([role="presentation"]):not(.toggle) {
	background-color: transparent !important;
}

.editor-styles-wrapper .is-menu-open .wp-block-navigation-item__content {
	color: ' . esc_attr( $primary_color_1 ) . ' !important;
}

.editor-styles-wrapper .is-menu-open .wp-block-navigation-item__content:hover,
.editor-styles-wrapper .is-menu-open .wp-block-navigation-item__content:focus {
	color: ' . esc_attr( $primary_color_1 ) . ' !important;
}

@media screen and (min-width: 37.5em) {
	.wp-block-navigation .wp-block-navigation-item__content {
		color: rgba(255, 255, 255, 0.7) !important;
	}
	
	.the-mx-columns--light-bg .wp-block-navigation .wp-block-navigation-item__content {
		color: rgba(0, 0, 0, 0.7) !important;
	}
	
	.wp-block-navigation .wp-block-navigation-item__content:hover,
	.wp-block-navigation .wp-block-navigation-item__content:focus {
		border-bottom-color: ' . esc_attr( $accent_color_1 ) . ' !important;
		color: rgba(255, 255, 255, 0.87) !important;
	}
	
	.the-mx-columns--light-bg .wp-block-navigation .wp-block-navigation-item__content:hover,
	.the-mx-columns--light-bg .wp-block-navigation .wp-block-navigation-item__content:focus {
		color: rgba(0, 0, 0, 0.87) !important;
	}
	
	.wp-block-navigation__submenu-container .wp-block-navigation-item__content {
		color: rgba(0, 0, 0, 0.7) !important;
	}
	
	.wp-block-navigation .wp-block-navigation__submenu-container .wp-block-navigation-item__content {
		border-bottom-color: transparent;
	}
	
	.wp-block-navigation__submenu-container .wp-block-navigation-item__content:focus,
	.wp-block-navigation__submenu-container .wp-block-navigation-item__content:hover {
		color: ' . esc_attr( $accent_color_3 ) . ' !important;
	}
}

.editor-styles-wrapper .wp-block-site-title a {
	color: #ffffff !important;
}

.editor-styles-wrapper .the-mx-columns--light-bg .wp-block-site-title a {
	color: #000000 !important;
}

input.wp-block-search__input {
	border-bottom-color: ' . esc_attr( $accent_color_1 ) . ' !important;
}';

	return $css;
}
