<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_M.X.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-m-x' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'the-m-x' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
	<?php
	// Begin parameters and display of category posts
	$imagegrid_postcount = the_mx_imagegrid_postnum_switcher();

	$args = array(
		'cat' => intval( get_theme_mod( 'the_mx_cat_dropdown_1', 0 ) ),
		'posts_per_page' => $imagegrid_postcount,
	);

	$cat_query1 = new WP_Query( $args );
	if( $cat_query1->have_posts() ) : ?>
		<div class="imagegrid-wrap"><?php
		while( $cat_query1->have_posts() ) : $cat_query1->the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="tile">
			<header class="entry-header">
			<?php
			the_title( '<h2 class="entry-title-imagegrid"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>
			<div class="entry-content">
				<?php if( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>">
					<div class="featured-image">
						<?php the_post_thumbnail( 'gallery-thumb' ); ?>
					</div>
					<div class="scrim"></div>
					</a><?php
				} ?>
			</div>
		</div>
	<?php
		endwhile; ?>
		</div><?php
		$morebutton = get_theme_mod( 'the_mx_add_showmore_button', 0 );
		$the_m_x_cat_id = intval( get_theme_mod( 'the_mx_cat_dropdown_1' ) );
		$the_m_x_cat_link = get_category_link( $the_m_x_cat_id );

		if( $morebutton == 1 ) { ?>
		<a href="<?php echo esc_url( $the_m_x_cat_link ); ?>" class="more-link"><?php the_mx_showmore_title_render(); ?></a>
		<?php }
	endif ?>
</article><!-- #post-## -->
