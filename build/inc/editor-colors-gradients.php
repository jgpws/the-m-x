<?php
/* Customizer support for custom colors in the backend */
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
