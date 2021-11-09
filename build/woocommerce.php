<?php
/**
 * The template for displaying all WooCommerce pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_M.X.
 */

get_template_part( 'template-parts/header', 'wc' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php woocommerce_breadcrumb(); ?>
			<?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
the_mx_wc_sidebar_choosepages();
get_footer();
