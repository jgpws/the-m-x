<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_M.X.
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main jgd-grid jgd-grid-wrap" role="main">

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation( array(
				'prev_text' => sprintf( '%1$s' . __( 'arrow_back', 'the-m-x' ) . '%2$s' . __( 'Previous Posts', 'the-m-x' ), '<i class="material-icons">', '</i>' ),
				'next_text' => sprintf( __( 'Next Posts', 'the-m-x' ) . '%1$s' . __( 'arrow_forward', 'the-m-x' ) . '%2$s', '<i class="material-icons">', '</i>' ),
			) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
