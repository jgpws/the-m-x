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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php get_template_part( 'template-parts/loader' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'the-m-x' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="custom-logo-link">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id, 'full' ); ?>
				<img height="<?php echo $image[2]; ?>" width="<?php echo $image[1] ?>" src="<?php echo esc_url( $image[0] ); ?>">
			</div>
			<div class="shop-back-link">
				<?php
				$shop_page_url = wc_get_page_permalink( 'shop' );
				$cart_page_url = wc_get_cart_url();

				if ( is_cart() || is_account_page() ) {
					esc_html_e( 'Back to ', 'the-m-x' ); ?> <a href="<?php echo esc_url( $shop_page_url ); ?>"><?php esc_html_e( 'shop page', 'the-m-x' ); ?></a>
				<?php
				} elseif ( is_checkout() ) {
					esc_html_e( 'Back to ', 'the-m-x' ); ?> <a href="<?php echo esc_url( $cart_page_url ); ?>"><?php esc_html_e( 'cart page', 'the-m-x' ); ?></a>
				<?php
				} ?>
			</div><!-- .site-branding-text -->
		</div><!-- .site-branding -->
		<div class="header-button-panel" id="header-button-panel">

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
