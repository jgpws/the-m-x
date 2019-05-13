<?php
/**
 * Template Name: Image Grid Page
 * Description: This template displays a selected page with the content followed by a grid of posts, similar to the Image Grid layout for the blog index. Posts are selected by category in the Customizer
 * @package WordPress
 * @subpackage The M.X.
 * @since The M.X. 1.0
 *
 * @package The_M.X.
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main jgd-grid jgd-grid-wrap" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'imagegrid' );

			endwhile; // End of the main loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
