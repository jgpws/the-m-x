<?php
/* These functions display the preset and custom color schemes for the front end of the theme. */

function the_mx_frontend_color_scheme_styles( $colors ) {
  $color_scheme_option = get_theme_mod( 'the_mx_color_scheme', 'default' );
  $colors = wp_parse_args(
    $colors,
    array(
      'background_color' => '',
      'primary_1' => '',
      'primary_2' => '',
      'primary_3' => '',
      'primary_4' => '',
      'accent_1' => '',
      'accent_2' => '',
      'accent_3' => '',
      'header_text_color' => '',
      'meta_links_color' => '',
      'meta_links_hover_color' => '',
    )
  );
  $color_outline_button = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_1' ) );
  $color_outline_button_bg_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $color_outline_button );
  $color_outline_button_bg_focus = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $color_outline_button );

  $css = <<<CSS

  /* Preset color schemes */
  :root {
    /* Color overrides */
    --primary-color: {$colors['primary_1']};
    --primary-color-pale: {$colors['background_color']};
    --primary-color-medium: {$colors['primary_4']};
    --primary-color-dark: {$colors['primary_2']};
    --primary-color-darker: {$colors['primary_3']};
    --primary-color-darker-faded: {$colors['meta_links_color']};
    --primary-color-opacity-12: {$color_outline_button_bg_focus};
    --primary-color-opacity-04: {$color_outline_button_bg_hover};
    --accent-color: {$colors['accent_1']};
    --accent-color-dark: {$colors['accent_2']};
    --accent-color-darker: {$colors['accent_3']};
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
    background-color: {$colors['meta_links_hover_color']};
  }

  .mejs-container,
  .mejs-container .mejs-controls,
  .mejs-embed,
  .mejs-embed body {
    background-color: var(--primary-color-dark) !important;
  }

  #cboxContent {
    background-color: var(--primary-color-medium) !important;
  }

  .lds-ring div {
    border-color: var(--primary-color) transparent transparent transparent !important;
  }
CSS;

if (  $color_scheme_option == 'blue_gray' ||
      $color_scheme_option == 'deep_purple' ||
      $color_scheme_option == 'black' ) {
  $css .= '
  mark,
  ins {
    color: rgba(255, 255, 255, 0.87);
  }';
}

  return $css;
}

function the_mx_frontend_user_color_styles() {
  $background_color = get_background_color();
  $primary_color_1 = get_theme_mod( 'the_mx_primary_1' );
  $primary_color_2 = get_theme_mod( 'the_mx_primary_2' );
  $primary_color_3 = get_theme_mod( 'the_mx_primary_3' );
  $primary_color_4 = get_theme_mod( 'the_mx_primary_4' );
  $accent_color_1 = get_theme_mod( 'the_mx_accent_1' );
  $accent_color_2 = get_theme_mod( 'the_mx_accent_2' );
  $accent_color_3 = get_theme_mod( 'the_mx_accent_3' );

  $color_meta_links = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_3' ) );
  $color_meta_links_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7 )', $color_meta_links );
  $color_meta_links = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.54 )', $color_meta_links );

  $color_outline_button = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_1' ) );
  $color_outline_button_bg_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $color_outline_button );
  $color_outline_button_bg_focus = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $color_outline_button );

  $css = '

  /* User selected color scheme */

  :root {
    /* Color overrides */
    --primary-color: ' . esc_attr( $primary_color_1 ) . ';
    --primary-color-pale: #' . esc_attr( $background_color ) . ';
    --primary-color-medium: ' . esc_attr( $primary_color_4 ) . ';
    --primary-color-dark: ' . esc_attr( $primary_color_2 ) . ';
    --primary-color-darker: ' . esc_attr( $primary_color_3 ) . ';
    --primary-color-darker-faded: ' . esc_attr( $color_meta_links ) . ';
    --primary-color-opacity-12: ' . esc_attr( $color_outline_button_bg_focus ) . ';
    --primary-color-opacity-04: ' . esc_attr( $color_outline_button_bg_hover ) . ';
    --accent-color: ' . esc_attr( $accent_color_1 ) . ';
    --accent-color-dark: ' . esc_attr( $accent_color_2 ) . ';
    --accent-color-darker: ' . esc_attr( $accent_color_3 ) . ';
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
    background-color: ' . esc_attr( $color_meta_links_hover ) . ';
  }

  .mejs-container,
  .mejs-container .mejs-controls,
  .mejs-embed,
  .mejs-embed body {
    background-color: var(--primary-color-dark) !important;
  }

  .lds-ring div {
    border-color: var(--primary-color) transparent transparent transparent !important;
  }

  #cboxContent {
    background-color: var(--primary-color-medium) !important;
  }';

  return $css;
}

function the_mx_misc_styles() {
  $misc_css = '
  /* Miscellaneous color scheme css */
  #cboxClose {
    background: url(' . esc_url( get_template_directory_uri() . '/css/images/ic_cancel_white_24px.svg' ) . ') no-repeat center center !important;
  }

  #cboxClose:hover {
    background:url(' . esc_url( get_template_directory_uri() . '/css/images/ic_cancel_white_hover_24px.svg' ) . ') no-repeat center center !important;
  }

  .format-standard.has-post-thumbnail .entry-title a:hover,
  .format-standard.has-post-thumbnail .entry-title a:focus,
  .format-image.has-post-thumbnail .entry-title a:hover,
  .format-image.has-post-thumbnail .entry-title a:focus {
    color: #ffffff !important;
  }

  body.attachment.custom-background {
    background-color: #ffffff;
  }

  .search .no-results input.search-field,
  .error-404 input.search-field::-moz-placeholder,
  .search .no-results input.search-field::-moz-placeholder {
    color: rgba(0, 0, 0, 0.4);
    font-weight: 600;
    opacity: 1;
  }';

  return $misc_css;
}
