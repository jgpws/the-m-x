<?php
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

.wp-block-button__link.has-white-color,
.is-style-outline .wp-block-button__link.has-white-color {
	color: rgba(255, 255, 255, 0.87) !important;
}

.wp-block-button__link.has-black-color,
.is-style-outline .wp-block-button__link.has-black-color {
	color: rgba(0, 0, 0, 0.87) !important;
}

.wp-block-button__link.has-primary-brown-background-color:hover,
.wp-block-button__link.has-primary-brown-background-color:active,
.wp-block-button__link.has-primary-brown-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( '795548', -0.2 ) ) . ' !important;
}

.wp-block-button__link.has-primary-light-brown-background-color:hover,
.wp-block-button__link.has-primary-light-brown-background-color:active,
.wp-block-button__link.has-primary-light-brown-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'bcaaa4', -0.1 ) ) . ' !important;
}

.wp-block-button__link.has-accent-amber-background-color:hover,
.wp-block-button__link.has-accent-amber-background-color:active,
.wp-block-button__link.has-accent-amber-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'ffc107', -0.1 ) ) . ' !important;
}

.wp-block-button__link.has-primary-blue-gray-background-color:hover,
.wp-block-button__link.has-primary-blue-gray-background-color:active,
.wp-block-button__link.has-primary-blue-gray-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( '607d8b', -0.2 ) ) . ' !important;
}

.wp-block-button__link.has-primary-light-blue-gray-background-color:hover,
.wp-block-button__link.has-primary-light-blue-gray-background-color:active,
.wp-block-button__link.has-primary-light-blue-gray-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'b0bec5', -0.1 ) ) . ' !important;
}

.wp-block-button__link.has-primary-deep-purple-background-color:hover,
.wp-block-button__link.has-primary-deep-purple-background-color:active,
.wp-block-button__link.has-primary-deep-purple-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( '673ab7', -0.2 ) ) . ' !important;
}

.wp-block-button__link.has-primary-light-deep-purple-background-color:hover,
.wp-block-button__link.has-primary-light-deep-purple-background-color:active,
.wp-block-button__link.has-primary-light-deep-purple-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'b39ddb', -0.1 ) ) . ' !important;
}

.wp-block-button__link.has-accent-lime-background-color:hover,
.wp-block-button__link.has-accent-lime-background-color:active,
.wp-block-button__link.has-accent-lime-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'cddc39', -0.1 ) ) . ' !important;
}

.wp-block-button__link.has-primary-pale-orange-background-color:hover,
.wp-block-button__link.has-primary-pale-orange-background-color:active,
.wp-block-button__link.has-primary-pale-orange-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'ffe0b2', -0.1 ) ) . ' !important;
}

.wp-block-button__link.has-accent-teal-background-color:hover,
.wp-block-button__link.has-accent-teal-background-color:active,
.wp-block-button__link.has-accent-teal-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( '009688', -0.2 ) ) . ' !important;
}

.wp-block-button__link.has-primary-almost-black-background-color:hover,
.wp-block-button__link.has-primary-almost-black-background-color:active,
.wp-block-button__link.has-primary-almost-black-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( '212121', -0.2 ) ) . ' !important;
}

.wp-block-button__link.has-primary-light-gray-background-color:hover,
.wp-block-button__link.has-primary-light-gray-background-color:active,
.wp-block-button__link.has-primary-light-gray-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'bdbdbd', -0.1 ) ) . ' !important;
}

.wp-block-button__link.has-accent-almost-white-background-color:hover,
.wp-block-button__link.has-accent-almost-white-background-color:active,
.wp-block-button__link.has-accent-almost-white-background-color:focus {
	background-color: ' . esc_attr( the_mx_adjust_brightness( 'fafafa', -0.1 ) ) . ' !important;
}

/* Gradient backgrounds */

.wp-block-button__link.has-accent-amber-translucent-gradient-background:hover {
	background: linear-gradient(180deg, rgba(255, 193, 7, 0.0) 0%, rgba(255, 160, 0, 0.04) 100%) !important;
}

.wp-block-button__link.has-accent-amber-translucent-gradient-background:active,
.wp-block-button__link.has-accent-amber-translucent-gradient-background:focus {
	background: linear-gradient(180deg, rgba(255, 193, 7, 0.0) 0%, rgba(255, 160, 0, 0.12) 100%) !important;
}

.wp-block-button__link.has-accent-brown-translucent-gradient-background:hover {
	background: linear-gradient(180deg, rgba(121, 85, 72, 0.0) 0%, rgba(93, 64, 55, 0.04) 100%) !important;
}

.wp-block-button__link.has-accent-brown-translucent-gradient-background:active,
.wp-block-button__link.has-accent-brown-translucent-gradient-background:focus {
	background: linear-gradient(180deg, rgba(121, 85, 72, 0.0) 0%, rgba(93, 64, 55, 0.12) 100%) !important;
}

.wp-block-button__link.has-accent-lime-translucent-gradient-background:hover {
	background: linear-gradient(180deg, rgba(205, 220, 57, 0.0) 0%, rgba(175, 180, 43, 0.04) 100%) !important;
}

.wp-block-button__link.has-accent-lime-translucent-gradient-background:active,
.wp-block-button__link.has-accent-lime-translucent-gradient-background:focus {
	background: linear-gradient(180deg, rgba(205, 220, 57, 0.0) 0%, rgba(175, 180, 43, 0.12) 100%) !important;
}

.wp-block-button__link.has-accent-teal-translucent-gradient-background:hover {
	background: linear-gradient(180deg, rgba(0, 150, 136, 0.0) 0%, rgba(0, 121, 107, 0.04) 100%) !important;
}

.wp-block-button__link.has-accent-teal-translucent-gradient-background:active,
.wp-block-button__link.has-accent-teal-translucent-gradient-background:focus {
	background: linear-gradient(180deg, rgba(0, 150, 136, 0.0) 0%, rgba(0, 121, 107, 0.12) 100%) !important;
}

.wp-block-button__link.has-accent-almost-white-translucent-gradient-background:hover {
	background: linear-gradient(180deg, rgba(250, 250, 250, 0.0) 0%, rgba(189, 189, 189, 0.04) 100%) !important;
}

.wp-block-button__link.has-accent-almost-white-translucent-gradient-background:active,
.wp-block-button__link.has-accent-almost-white-translucent-gradient-background:focus {
	background: linear-gradient(180deg, rgba(250, 250, 250, 0.0) 0%, rgba(189, 189, 189, 0.12) 100%) !important;
}';

	return wp_strip_all_tags( $css );
}
