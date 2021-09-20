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
