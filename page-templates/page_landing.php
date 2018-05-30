<?php
/*
 * Template Name: Landing Page
 * Description: Full width page ideal for a landing page. It has no sidebars, menus or comments and a thin header.
 * @package WordPress
 * @subpackage The M.X.
 * @since The M.X. 1.0
 */
 
get_template_part( 'template-parts/header', 'landing' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main jgd-grid jgd-grid-wrap" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_template_part( 'template-parts/footer', 'none' ); ?>