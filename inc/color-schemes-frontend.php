<?php
/* These functions display the preset and custom color schemes for the front end of the theme. */

function the_mx_frontend_color_scheme_styles( $colors ) {
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

  body {
    background-color: {$colors['background_color']};
  }

  a:link {
    color: {$colors['primary_1']};
  }

  a:visited {
    color: {$colors['primary_4']};
  }

  a:hover,
  a:focus {
    color: {$colors['primary_2']};
  }

  blockquote, q, .wp-block-pullquote {
    border-left-color: {$colors['primary_1']};
  }

  pre {
    background-color: {$colors['background_color']};
  }

  mark, ins {
    background-color: {$colors['primary_3']};
  }

  button,
  input[type="button"],
  input[type="reset"],
  input[type="submit"],
  .wp-block-button__link {
    background-color: {$colors['accent_1']};
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
  select,
  .header-button-panel .search-field,
  .animate .isActive {
    border-bottom-color: {$colors['accent_1']};
  }

  button:hover,
  input[type="button"]:hover,
  input[type="reset"]:hover,
  input[type="submit"]:hover,
  .wp-block-button__link:hover {
    background-color: {$colors['accent_2']};
  }

  button:active,
  button:focus,
  input[type="button"]:active,
  input[type="button"]:focus,
  input[type="reset"]:active,
  input[type="reset"]:focus,
  input[type="submit"]:active,
  input[type="submit"]:focus,
  .wp-block-button__link:active,
  .wp-block-button__link:focus {
    background-color: {$colors['accent_2']};
  }

  .site-branding {
    background-color: {$colors['primary_1']};
  }

  .site-header .header-button-panel {
    background-color: {$colors['primary_2']};
  }

  .menu-toggle:hover,
  .social-toggle:hover,
  .search-toggle:hover,
  .sidebar-toggle:hover {
    color: {$colors['accent_1']};
  }

  .menu-toggle:focus,
  .social-toggle:focus,
  .search-toggle:focus,
  .sidebar-toggle:focus,
  .searchform.toggled + .search-toggle {
    color: {$colors['accent_1']};
  }

  .sidebar-toggle.toggled:focus {
    color: rgba(0, 0, 0, 0.87);
  }

  .header-button-panel .searchform {
    background-color: {$colors['primary_2']};
  }

  #menu-social ul li a:link,
  #menu-social ul li a:visited {
    color: {$colors['primary_1']};
  }

  .main-navigation a:hover,
  .main-navigation a:focus {
    color: {$colors['accent_3']};
  }

  .main-navigation ul ul a:hover,
  .main-navigation ul ul a.focus {
    color: {$colors['accent_3']};
  }

  .main-navigation .current_page_item > a,
  .main-navigation .current-menu-item > a,
  .main-navigation .current_page_ancestor > a,
  .main-navigation .current-menu-ancestor > a {
    color: {$colors['accent_2']};
  }

  .site-main .comment-navigation,
  .site-main .posts-navigation,
  .site-main .post-navigation,
  .site-main .images-navigation {
    background-color: {$colors['primary_4']};
  }

  .entry-title a:link,
  .page-title a:link {
    color: {$colors['primary_1']};
  }

  .entry-title a:visited,
  .page-title a:visited {
    color: {$colors['primary_4']};
  }

  .entry-title a:hover,
  .entry-title a:focus,
  .page-title a:hover,
  .page-title a:focus {
    color: {$colors['primary_2']};
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
    background-color: {$colors['meta_links_color']};
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

  .search .format-standard.has-post-thumbnail .entry-title a:link,
  .search .format-image.has-post-thumbnail .entry-title a:link {
    color: {$colors['primary_1']};
  }

  .search .cat-links a:link,
  .search .cat-links a:visited,
  .search .tags-links a:link,
  .search .tags-links a:visited,
  .search .posted-on a:link,
  .search .posted-on a:visited,
  .search .has-post-thumbnail .posted-on a:link,
  .search .has-post-thumbnail .posted-on a:visited {
    color: {$colors['primary_1']};
  }

  .search .format-standard.has-post-thumbnail .entry-title a:visited,
  .search .format-image.has-post-thumbnail .entry-title a:visited {
    color: {$colors['primary_4']};
  }

  .search .cat-links a:hover,
  .search .cat-links a:focus,
  .search .tags-links a:hover,
  .search .tags-links a:focus,
  .search .posted-on a:hover,
  .search .posted-on a:focus {
    color: {$colors['primary_2']};
  }

  .sticky {
    background-color: {$colors['primary_1']};
  }

  /*.blog .format-gallery.sticky,
  .blog .format-aside.sticky,
  .blog .format-image.sticky,
  .blog .format-video.sticky,
  .blog .format-audio.sticky,
  .blog .format-status.sticky,
  .blog .format-quote.sticky {
  background-color: {$colors['primary_4']};
  }*/

  .format-image,
  .format-audio,
  .format-video,
  .format-aside,
  .format-status,
  .format-quote {
    background-color: {$colors['primary_4']};
  }

  .more-link:link,
  .more-link:visited,
  .more-images-link a:link,
  .more-images-link a:visited {
    background-color: {$colors['accent_1']};
  }

  .more-link:hover,
  .more-link:focus,
  .more-images-link a:hover,
  .more-images-link a:focus {
    background-color: {$colors['accent_2']};
    color: #000000;
  }

  .bypostauthor .comment-content {
    background-color: {$colors['background_color']};
  }

  .is-style-outline .wp-block-button__link {
    color: {$colors['primary_3']};
  }

  .is-style-outline .wp-block-button__link:hover {
    background-color: {$color_outline_button_bg_hover};
  }

  .is-style-outline .wp-block-button__link:active,
  .is-style-outline .wp-block-button__link:focus {
    background-color: {$color_outline_button_bg_focus};
  }

  .wp-block-calendar table caption {
    background-color: {$colors['primary_1']};
  }

  .wp-block-calendar table th {
    background-color: {$colors['background_color']};
  }

  .widget li a:hover,
  .widget li a:focus {
    color: {$colors['accent_3']};
  }

  .widget .recentcomments a:hover,
  .widget .recentcomments a:focus,
  .widget ul li .rsswidget:hover,
  .widget ul li .rsswidget:focus {
    border-bottom-color: {$colors['accent_3']};
  }

  .widget .calendar_wrap caption,
  .widget .calendar_wrap td a {
    background-color: {$colors['primary_1']};
  }

  .site-footer {
    background-color: {$colors['primary_1']};
  }

  .gallery-icon.portrait {
    background-color: {$colors['background_color']};
  }

  .featured-image {
    background-color: {$colors['primary_2']};
  }

  .mejs-container,
  .mejs-container .mejs-controls,
  .mejs-embed,
  .mejs-embed body {
    background-color: {$colors['primary_2']} !important;
  }

  .single.slider .gallery {
    background-color: {$colors['primary_2']};
  }

  .single.slider .slider-button-panel {
    background-color: {$colors['primary_3']};
  }

  .single.slider .slider-button-panel .slider-previous,
  .single.slider .slider-button-panel .slider-next {
    background-color: {$colors['accent_1']};
  }

  .single.slider .slider-button-panel .slider-previous:hover,
  .single.slider .slider-button-panel .slider-next:hover,
  .single.slider .slider-button-panel .slider-previous:focus,
  .single.slider .slider-button-panel .slider-next:focus {
    background-color: {$colors['accent_2']};
  }

  #custom-header {
    background-color: {$colors['primary_1']};
  }

  .page-template-template-landing .site-header {
    background-color: {$colors['primary_1']};
  }

  .return-to-parent {
    background-color: {$colors['primary_4']};
  }

  body.attachment.colorbox .entry-attachment-image p {
    background-color: {$colors['background_color']};
  }

  #infinite-handle span {
    background-color: {$colors['primary_1']};
  }

  .wp-block-image.alignfull,
  .wp-block-image.alignwide {
    background-color: {$colors['primary_2']};
  }

  .lds-ring div {
    border-color: {$colors['primary_1']} transparent transparent transparent !important;
  }

  #cboxContent {
    background-color: {$colors['primary_4']} !important;
  }

  @media screen and (min-width: 37.5em) {
    .site-header .main-navigation {
      background-color: {$colors['primary_2']};
    }

    .site-header .main-navigation ul li a:hover,
    .site-header .main-navigation ul li a:focus,
    .site-header .main-navigation .current_page_item > a,
    .site-header .main-navigation .current-menu-item > a,
    .site-header .main-navigation .current_page_ancestor > a,
    .site-header .main-navigation .current-menu-ancestor > a {
      border-bottom-color: {$colors['accent_1']};
    }

    .site-header .main-navigation .children a:hover,
    .site-header .main-navigation .children a:focus,
    .site-header .main-navigation .sub-menu a:hover,
    .site-header .main-navigation .sub-menu a:focus {
      color: {$colors['accent_3']};
    }
  }

  @media screen and (min-width: 80em) {
    .site-header .header-button-panel {
      background-color: {$colors['primary_1']};
    }
  }
CSS;

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

  $color_meta_links = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_4' ) );
  $color_meta_links_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7 )', $color_meta_links );
  $color_meta_links = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.54 )', $color_meta_links );

  $color_outline_button = the_mx_hex_to_rgb( get_theme_mod( 'the_mx_primary_1' ) );
  $color_outline_button_bg_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.04 )', $color_outline_button );
  $color_outline_button_bg_focus = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.12 )', $color_outline_button );

  $css = '

  /* User selected color scheme */

  body {
    background-color: #' . esc_attr( $background_color ) . ';
  }

  a:link {
    color: ' . esc_attr( $primary_color_1 ) . ';
  }

  a:visited {
    color: ' . esc_attr( $primary_color_4 ) . ';
  }

  a:hover,
  a:focus {
    color: ' . esc_attr( $primary_color_2 ) . ';
  }

  blockquote, q, .wp-block-pullquote {
    border-left-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  pre {
    background-color: #' . esc_attr( $background_color ) . ';
  }

  mark, ins {
    background-color: ' . esc_attr( $primary_color_3 ) . ';
  }

  button,
  input[type="button"],
  input[type="reset"],
  input[type="submit"],
  .wp-block-button__link {
    background-color: ' . esc_attr( $accent_color_1 ) . ';
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
  select,
  .header-button-panel .search-field,
  .animate .isActive {
    border-bottom-color: ' . esc_attr( $accent_color_1 ) . ';
  }

  button:hover,
  input[type="button"]:hover,
  input[type="reset"]:hover,
  input[type="submit"]:hover,
  .wp-block-button__link:hover {
    background-color: ' . esc_attr( $accent_color_2 ) . ';
  }

  button:active,
  button:focus,
  input[type="button"]:active,
  input[type="button"]:focus,
  input[type="reset"]:active,
  input[type="reset"]:focus,
  input[type="submit"]:active,
  input[type="submit"]:focus,
  .wp-block-button__link:active,
  .wp-block-button__link:focus {
    background-color: ' . esc_attr( $accent_color_2 ) . ';
  }

  .site-branding {
    background-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .site-header .header-button-panel {
    background-color: ' . esc_attr( $primary_color_2 ) . ';
  }

  .menu-toggle:hover,
  .social-toggle:hover,
  .search-toggle:hover,
  .sidebar-toggle:hover {
    color: ' . esc_attr( $accent_color_1 ) . ';
  }

  .menu-toggle:focus,
  .social-toggle:focus,
  .search-toggle:focus,
  .sidebar-toggle:focus,
  .searchform.toggled + .search-toggle {
    color: ' . esc_attr( $accent_color_1 ) . ';
  }

  .main-navigation a:hover,
  .main-navigation a:focus {
    color: ' . esc_attr( $accent_color_3 ) . ';
  }

  .main-navigation ul ul a:hover,
  .main-navigation ul ul a.focus {
    color: ' . esc_attr( $accent_color_3 ) . ';
  }

  .main-navigation .current_page_item > a,
  .main-navigation .current-menu-item > a,
  .main-navigation .current_page_ancestor > a,
  .main-navigation .current-menu-ancestor > a {
    color: ' . esc_attr( $accent_color_2 ) . ';
  }

  .site-main .comment-navigation,
  .site-main .posts-navigation,
  .site-main .post-navigation,
  .site-main .images-navigation {
    background-color: ' . esc_attr( $primary_color_4 ) . ';
  }

  .entry-title a:link,
  .page-title a:link {
    color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .entry-title a:visited,
  .page-title a:visited {
    color: ' . esc_attr( $primary_color_4 ) . ';
  }

  .entry-title a:hover,
  .entry-title a:focus,
  .page-title a:hover,
  .page-title a:focus {
    color: ' . esc_attr( $primary_color_2 ) . ';
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
    background-color: ' . esc_attr( $color_meta_links ) . ';
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

  .search .format-standard.has-post-thumbnail .entry-title a:link,
  .search .format-image.has-post-thumbnail .entry-title a:link {
    color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .search .cat-links a:link,
  .search .cat-links a:visited,
  .search .tags-links a:link,
  .search .tags-links a:visited,
  .search .posted-on a:link,
  .search .posted-on a:visited,
  .search .has-post-thumbnail .posted-on a:link,
  .search .has-post-thumbnail .posted-on a:visited {
    color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .search .format-standard.has-post-thumbnail .entry-title a:visited,
  .search .format-image.has-post-thumbnail .entry-title a:visited {
    color: ' . esc_attr( $primary_color_4 ) . ';
  }

  .search .cat-links a:hover,
  .search .cat-links a:focus,
  .search .tags-links a:hover,
  .search .tags-links a:focus,
  .search .posted-on a:hover,
  .search .posted-on a:focus {
    color: ' . esc_attr( $primary_color_2 ) . ';
  }

  .sticky {
    background-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .format-image,
  .format-audio,
  .format-video,
  .format-aside,
  .format-status,
  .format-quote {
    background-color: ' . esc_attr( $primary_color_4 ) . ';
  }

  .more-link:link,
  .more-link:visited,
  .more-images-link a:link,
  .more-images-link a:visited {
    background-color: ' . esc_attr( $accent_color_1 ) . ';
  }

  .more-link:hover,
  .more-link:focus,
  .more-images-link a:hover,
  .more-images-link a:focus {
    background-color: ' . esc_attr( $accent_color_2 ) . ';
    color: #000000;
  }

  .bypostauthor .comment-content {
    background-color: ' . esc_attr( $background_color ) . ';
  }

  .is-style-outline .wp-block-button__link {
    color: ' . esc_attr( $primary_color_3 ) . ';
  }

  .is-style-outline .wp-block-button__link:hover {
    background-color: ' . esc_attr( $color_outline_button_bg_hover ) . ';
  }

  .is-style-outline .wp-block-button__link:active,
  .is-style-outline .wp-block-button__link:focus {
    background-color: ' . esc_attr( $color_outline_button_bg_focus ) . ';
  }

  .wp-block-calendar table caption {
    background-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .wp-block-calendar table th {
    background-color: #' . esc_attr( $background_color ) . ';
  }

  .widget li a:hover,
  .widget li a:focus {
    color: ' . esc_attr( $accent_color_3 ) . ';
  }

  .widget .recentcomments a:hover,
  .widget .recentcomments a:focus,
  .widget ul li .rsswidget:hover,
  .widget ul li .rsswidget:focus {
    border-bottom-color: ' . esc_attr( $accent_color_3 ) . ';
  }

  .widget .calendar_wrap caption,
  .widget .calendar_wrap td a {
    background-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .site-footer {
    background-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .gallery-icon.portrait {
    background-color: ' . esc_attr( $background_color ) . ';
  }

  .featured-image {
    background-color: ' . esc_attr( $primary_color_2 ) . ';
  }

  .mejs-container,
  .mejs-container .mejs-controls,
  .mejs-embed,
  .mejs-embed body {
    background-color: ' . esc_attr( $primary_color_2 ) . ' !important;
  }

  .single.slider .gallery {
    background-color: ' . esc_attr( $primary_color_2 ) . ';
  }

  .single.slider .slider-button-panel {
    background-color: ' . esc_attr( $primary_color_3 ) . ';
  }

  .single.slider .slider-button-panel .slider-previous,
  .single.slider .slider-button-panel .slider-next {
    background-color: ' . esc_attr( $accent_color_1 ) . ';
  }

  .single.slider .slider-button-panel .slider-previous:hover,
  .single.slider .slider-button-panel .slider-next:hover,
  .single.slider .slider-button-panel .slider-previous:focus,
  .single.slider .slider-button-panel .slider-next:focus {
    background-color: ' . esc_attr( $accent_color_2 ) . ';
  }

  #custom-header {
    background-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .page-template-template-landing .site-header {
    background-color: ' . esc_attr( $primary_color_1 ) . ';
  }

  .return-to-parent {
    background-color: ' . esc_attr( $primary_color_4 ) . ';
  }

  body.attachment.colorbox .entry-attachment-image p {
    background-color: #' . esc_attr( $background_color ) . ';
  }

  .wp-block-image.alignfull {
    background-color: ' . esc_attr( $primary_color_2 ) . ';
  }

  .lds-ring div {
    border-color: ' . esc_attr( $primary_color_1 ) . ' transparent transparent transparent !important;
  }

  #cboxContent {
    background-color: ' . esc_attr( $primary_color_4 ) . ' !important;
  }

  @media screen and (min-width: 37.5em) {
    .site-header .main-navigation {
      background-color: ' . esc_attr( $primary_color_2 ) . ';
    }

    .site-header .main-navigation ul li a:hover,
    .site-header .main-navigation ul li a:focus,
    .site-header .main-navigation .current_page_item > a,
    .site-header .main-navigation .current-menu-item > a,
    .site-header .main-navigation .current_page_ancestor > a,
    .site-header .main-navigation .current-menu-ancestor > a {
      border-bottom-color: ' . esc_attr( $accent_color_1 ) . ';
    }

    .site-header .main-navigation .children a:hover,
    .site-header .main-navigation .children a:focus,
    .site-header .main-navigation .sub-menu a:hover,
    .site-header .main-navigation .sub-menu a:focus {
      color: ' . esc_attr( $accent_color_3 ) . ';
    }
  }

  @media screen and (min-width: 80em) {
    .site-header .header-button-panel {
      background-color: ' . esc_attr( $primary_color_1 ) . ';
    }


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
  .format-image.has-post-thumbnail .entry-title a:hover {
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
