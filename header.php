<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_M.X.
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="skrollr-body">
<?php get_template_part( 'template-parts/loader' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'the-m-x' ); ?></a>

	<header id="masthead" class="site-header jgd-grid-wrap" role="banner">
		<div class="site-branding jgd-grid">
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
		<div class="jgd-grid jgd-grid-wrap" id="header-button-panel">
		<?php get_template_part( 'template-parts/menu', 'social' ); ?>
		<?php if( !is_404() && is_active_sidebar( 'sidebar-1' ) ) { ?>
			<button class="sidebar-toggle" id="sidebar-button"></button>
		<?php } ?>
		<?php get_search_form(); ?>
		</div>
		
		<?php if ( get_header_image() ) : ?>
			<?php if ( ( get_theme_mod( 'the_mx_homepage_only' ) == 1 ) && !is_home() ) : 
			echo ''; else : ?>
			<div id="custom-header">
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				<div class="hero-widgets-wrap">
					<?php dynamic_sidebar( 'hero-image-widget' ); ?>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; // End header image check. ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" title="<?php esc_attr_e( 'Toggle the navigation menu', 'the-m-x' ) ?>"><i class="material-icons"><?php esc_html_e( 'menu', 'the-m-x' ); ?></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">