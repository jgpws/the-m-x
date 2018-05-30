<?php
/**
 * The header specifically made for a the landing page template.
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
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="skrollr-body">
<?php get_template_part( 'template-parts/loader' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'the-mx' ); ?></a>

	<header id="masthead" class="site-header jgd-grid-wrap" role="banner">
		<div class="site-branding jgd-grid">
			<div class="site-branding-text">
				<p class="landing-to-parent"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><?php bloginfo( 'name' ); ?></a></p>
			</div><!-- .site-branding-text -->
		</div><!-- .site-branding -->
		<div class="jgd-grid jgd-grid-wrap" id="header-button-panel">
		<?php get_template_part( 'template-parts/menu', 'social' ); ?>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">