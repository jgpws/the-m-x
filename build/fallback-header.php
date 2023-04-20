	<div class="site-branding">
		<?php if( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		} ?>
		<div class="site-branding-text">
		<?php
		if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
		<?php
		endif; ?>
		</div><!-- .site-branding-text -->
	</div><!-- .site-branding -->
	<div class="header-button-panel" id="header-button-panel">
	<?php 
	if( the_mx_example_is_amp() ) { ?>
	<button class="social-toggle" id="social-button" on="tap:AMP.setState( { socialPanelExpanded: ! socialPanelExpanded } )" [class]="'social-toggle' + ( socialPanelExpanded ? ' toggled' : '' )" aria-expanded="false" [aria-expanded]="socialPanelExpanded ? 'true' : 'false'"><i class="material-icons">person</i></button>
	<?php }
	if( the_mx_example_is_amp() ) { ?>
		<amp-state id="socialPanelExpanded">
			<script type="application/json">false</script>
		</amp-state>
		<div class="menu-social-container hide" id="menu-social" [class]="'menu-social-container' + ( socialPanelExpanded ? ' toggled' : ' hide' )" aria-expanded="false" [aria-expanded]="socialPanelExpanded ? 'true' : 'false'">
		<?php get_template_part( 'template-parts/menu', 'ampsocial' ); ?>
		</div>
	<?php } else {
		get_template_part( 'template-parts/menu', 'social' );
	} ?>
	<?php
	$sidebar_layout = get_theme_mod( 'the_mx_sidebar_layout', 'overlay' );
	if( !is_404() && is_active_sidebar( 'sidebar-1' ) && $sidebar_layout == 'overlay' && the_mx_example_is_amp() ) { ?>
		<amp-state id="sidebarExpanded">
			<script type="application/json">false</script>
		</amp-state>
		
		<button class="sidebar-toggle" id="sidebar-button" on="tap:AMP.setState( { sidebarExpanded: ! sidebarExpanded } )" [class]="'sidebar-toggle' + ( sidebarExpanded ? ' toggled' : '' )" aria-expanded="false" [aria-expanded]="sidebarExpanded ? 'true' : 'false'"><i class="material-icons">chevron_left</i></button>
	<?php } elseif( !is_404() && is_active_sidebar( 'sidebar-1' ) && $sidebar_layout == 'overlay' ) { ?>
		<button class="sidebar-toggle" id="sidebar-button"></button>
  <?php }
  if( the_mx_example_is_amp() ) {
  	 get_template_part( 'template-parts/searchform', 'amp' );
  } else {
    get_search_form();
 } ?>
  <?php if( the_mx_example_is_amp() ) { ?>
    <button class="search-toggle" id="search-button" on="tap:AMP.setState( { searchbarExpanded: ! searchbarExpanded } )" [class]="'search-toggle' + ( searchbarExpanded ? ' toggled' : '' )" aria-expanded="false" [aria-expanded]="searchbarExpanded ? 'true' : 'false'"><i class="material-icons">search</i></button>
  <?php 
  }; ?>
	</div>

	<?php if ( get_header_image() ) : ?>
		<?php if ( ( get_theme_mod( 'the_mx_homepage_only' ) == 1 ) && !is_home() ) :
		echo ''; else : ?>
		<div id="custom-header">
			<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
			<div class="hero-widgets-wrap">
				<?php dynamic_sidebar( 'hero-image-widget' ); ?>
			</div>
			<div class="scrim"></div>
		</div>
		<?php endif; ?>
	<?php endif; // End header image check. ?>

	<?php if( the_mx_example_is_amp() ) { ?>
	<amp-state id="navMenuExpanded">
		<script type="application/json">false</script>
	</amp-state>
		
	<nav id="main-navigation" class="main-navigation" [class]="'main-navigation' + ( navMenuExpanded ? ' toggled' : '' )" aria-expanded="false" [aria-expanded]="navMenuExpanded ? 'true' : 'false'">
		<button class="menu-toggle" on="tap:AMP.setState( { navMenuExpanded: ! navMenuExpanded } )" [class]="'menu-toggle' + ( navMenuExpanded ? ' toggled' : '' )" aria-expanded="false" [aria-expanded]="navMenuExpanded ? 'true' : 'false'"><i class="material-icons"><?php esc_html_e( 'menu', 'the-m-x' ); ?></i></button>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->
	<?php } else { ?>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" id="site-navigation-button" aria-controls="primary-menu" aria-expanded="false" title="<?php esc_attr_e( 'Toggle the navigation menu', 'the-m-x' ) ?>"><i class="material-icons"><?php esc_html_e( 'menu', 'the-m-x' ); ?></i></button>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->
	<?php } ?>
