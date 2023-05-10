<?php
/* Block patterns registered for this theme.
 * @package The_M.X.
 * @since 1.4
 */

function the_mx_register_block_patterns() {
   if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
      $content_header5 = '<!-- wp:group {"tagName":"header","className":"site-header-blocks"} -->
<header class="wp-block-group site-header-blocks"><!-- wp:columns {"backgroundColor":"white","className":"is-style-the-mx-columns"} -->
<div class="wp-block-columns is-style-the-mx-columns has-white-background-color has-background"><!-- wp:column {"verticalAlignment":"bottom","width":"75%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:75%"><!-- wp:group {"className":"is-style-the-mx-group-p1em"} -->
<div class="wp-block-group is-style-the-mx-group-p1em"><!-- wp:site-title /-->

<!-- wp:site-tagline /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"25%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:25%"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","buttonText":"Search","buttonUseIcon":true,"textColor":"primary-text-color"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:navigation {"backgroundColor":"white","className":"is-style-the-mx-nav","layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} /--></header>
<!-- /wp:group -->';

      register_block_pattern(
         'the-mx-patterns/header-lightbg-title-menu-search',
         array(
            'title' => esc_html__( 'Header (Light Background)- Title, Menu, Search Bar', 'the-m-x' ),
            'content' => trim( $content_header5 ),
            'categories' => array( 'header', 'the-m-x' ),
            'viewportWidth' => 1280,
         )
      );
		
      $content_header2 = '<!-- wp:group {"tagName":"header","className":"site-header-blocks"} --><header class="wp-block-group site-header-blocks"><!-- wp:columns {"backgroundColor":"primary-brown","className":"is-style-the-mx-columns"} -->
<div class="wp-block-columns is-style-the-mx-columns has-primary-brown-background-color has-background"><!-- wp:column {"width":"15%"} -->
<div class="wp-block-column" style="flex-basis:15%"><!-- wp:site-logo {"align":"left"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"85%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:85%"><!-- wp:social-links {"iconColor":"primary-text-color-white","iconColorValue":"rgba(255, 255, 255, 0.87)","size":"has-normal-icon-size","align":"right","className":"is-style-the-mx-social-badges","layout":{"type":"flex","justifyContent":"right"}} -->
<ul class="wp-block-social-links alignright has-normal-icon-size has-icon-color is-style-the-mx-social-badges"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"wordpress"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:navigation {"textColor":"primary-text-color-medium-white","backgroundColor":"primary-dark-brown","className":"is-style-the-mx-nav the-mx-nav-darkbg","layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} /--></header>
<!-- /wp:group -->';

      register_block_pattern(
         'the-mx-patterns/header-logo-menu-social',
         array(
            'title' => esc_html__( 'Header- Logo, Menu, Social Badges', 'the-m-x' ),
            'content' => trim( $content_header2 ),
            'categories' => array( 'header', 'the-m-x' ),
            'viewportWidth' => 1280,
         )
      );
		
      $content_header3 = '<!-- wp:group {"tagName":"header","className":"site-header-blocks"} --><header class="wp-block-group site-header-blocks"><!-- wp:columns {"backgroundColor":"primary-brown","className":"is-style-the-mx-columns"} -->
<div class="wp-block-columns is-style-the-mx-columns has-primary-brown-background-color has-background"><!-- wp:column {"width":"75%"} -->
<div class="wp-block-column" style="flex-basis:75%"><!-- wp:site-logo {"align":"left"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"25%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:25%"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","buttonText":"Search","buttonUseIcon":true,"textColor":"primary-text-color-white","className":"is-style-the-mx-search-darkbg"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:navigation {"textColor":"primary-text-color-medium-white","backgroundColor":"primary-dark-brown","className":"is-style-the-mx-nav the-mx-nav-darkbg","layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} /--></header>
<!-- /wp:group -->';

      register_block_pattern(
         'the-mx-patterns/header-logo-menu-search',
         array(
            'title' => esc_html__( 'Header- Logo, Menu, Search Bar', 'the-m-x' ),
            'content' => trim( $content_header3 ),
            'categories' => array( 'header', 'the-m-x' ),
            'viewportWidth' => 1280,
         )
      );
		
      $content_header4 = '<!-- wp:group {"tagName":"header","className":"site-header-blocks"} --><header class="wp-block-group site-header-blocks"><!-- wp:columns {"isStackedOnMobile":false,"backgroundColor":"primary-brown","className":"is-style-the-mx-columns"} -->
<div class="wp-block-columns is-not-stacked-on-mobile is-style-the-mx-columns has-primary-brown-background-color has-background"><!-- wp:column {"width":"100%"} -->
<div class="wp-block-column" style="flex-basis:100%"><!-- wp:site-logo /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:navigation {"textColor":"primary-text-color-medium-white","backgroundColor":"primary-dark-brown","className":"is-style-the-mx-nav the-mx-nav-darkbg","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} /--></header>
<!-- /wp:group -->';
		
      register_block_pattern(
         'the-mx-patterns/header-logo-menu',
         array(
            'title' => esc_html__( 'Header- Logo, Menu', 'the-m-x' ),
            'content' => trim( $content_header4 ),
            'categories' => array( 'header', 'the-m-x' ),
            'viewportWidth' => 1280,
         )
      );
		
      $content_hero1 = '<!-- wp:group {"tagName":"header","className":"site-header-blocks"} --><header class="wp-block-group site-header-blocks"><!-- wp:cover {"url":"https://www.jgpws.com/the-mx-block-images/StockSnap_ROOAD1EI11_1920_optimized.jpg","id":6684,"dimRatio":50,"contentPosition":"bottom center","isDark":false} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center"><span aria-hidden="true" class="wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-6684" alt="" src="https://www.jgpws.com/the-mx-block-images/StockSnap_ROOAD1EI11_1920_optimized.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"white","fontSize":"extra-large"} -->
<p class="has-text-align-center has-white-color has-text-color has-extra-large-font-size" style="text-transform:uppercase">A Headline</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"96px"} -->
<div style="height:96px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:navigation {"textColor":"primary-text-color-medium-white","className":"is-style-the-mx-nav the-mx-nav-darkbg","layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} /--></div></div>
<!-- /wp:cover --></header>
<!-- /wp:group -->';

      register_block_pattern(
         'the-mx-patterns/hero-menu',
         array(
            'title' => esc_html__( 'Header- Hero Image, Menu', 'the-m-x' ),
            'content' => trim( $content_hero1 ),
            'categories' => array( 'header', 'the-m-x' ),
            'viewportWidth' => 1280,
         )
      );
		
      $content_hero2 = '<!-- wp:group {"tagName":"header","className":"site-header-blocks"} --><header class="wp-block-group site-header-blocks"><!-- wp:cover {"url":"https://www.jgpws.com/the-mx-block-images/StockSnap_KJ9ZK1L8WS_1920px_optimized.jpg","id":11480,"dimRatio":50,"overlayColor":"white","contentPosition":"bottom center","isDark":false} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center"><span aria-hidden="true" class="has-white-background-color wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-11480" alt="" src="https://www.jgpws.com/the-mx-block-images/StockSnap_KJ9ZK1L8WS_1920px_optimized.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"black","fontSize":"extra-large"} -->
<p class="has-text-align-center has-black-color has-text-color has-extra-large-font-size" style="text-transform:uppercase">Exclusive Sale at Our Store</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"black","fontSize":"extra-large"} -->
<p class="has-text-align-center has-black-color has-text-color has-extra-large-font-size">50% Off Sale. Invite Only.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"96px"} -->
<div style="height:96px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"accent-amber"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-accent-amber-background-color has-background">Reserve Yours Today!</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"72px"} -->
<div style="height:72px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover --></header>
<!-- /wp:group -->';

      register_block_pattern(
         'the-mx-patterns/hero-cta',
         array(
            'title' => esc_html__( 'Header- Hero Image, Call-to-Action', 'the-m-x' ),
            'content' => trim( $content_hero2 ),
            'categories' => array( 'header', 'the-m-x' ),
            'viewportWidth' => 1280,
         )
      );
   }

}


function the_mx_register_block_pattern_cats() {
	if( function_exists( 'register_block_pattern_category' ) ) {
   	// Add new block pattern category for this theme.
   	register_block_pattern_category(
      	'the-m-x',
      	array( 'label' => esc_html__( 'The M.X.', 'the-m-x' ) )
   	);
   }
}

add_action( 'init', 'the_mx_register_block_patterns' );
add_action( 'init', 'the_mx_register_block_pattern_cats' );
