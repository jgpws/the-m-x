<?php
/**
 * Function used for rendering of an image grid when "Image grid" is chosen in the Customizer
 * posts only show Featured Images and titles
 */
 
function the_mx_imagegrid() {
	if( is_single() ) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	} else { ?>
		<div id="post-<?php the_ID(); ?>" class="tile">
	<?php
	} ?>
		<header class="entry-header">
			<?php if( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
				
				if( has_post_format( 'gallery' ) ) { // Gallery post format on single post only
					// show nothing
				} else {
					if( has_post_thumbnail() ) { ?>
					<div class="featured-image">
						<?php the_post_thumbnail( 'large' ); ?>
					</div>
					<?php
					}
				}
				
				if ( 'post' === get_post_type() ) { ?>
				<div class="entry-meta">
					<?php the_mx_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php 
				}
				
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} ?>
		</header>
		<div class="entry-content">
			<?php 
			if( !is_single() ) {
				// show post thumbnail in content on all pages except single
				if( has_post_thumbnail() ) { ?>
					<a href="<?php esc_url( the_permalink() ); ?>">
					<div class="featured-image">
						<?php the_post_thumbnail( 'gallery-thumb' ); ?>
					</div>
					<div class="scrim"></div>
					</a>
				<?php
				}
			} else {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					__( 'Continue reading %s...', 'the-mx' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-mx' ),
					'after'  => '</div>',
				) );
			} ?>
		</div>
	<?php
	if( is_single() ) { ?>
		</article>
	<?php
	} else { ?>
		</div>
	<?php
	}
	
	if( is_single() ) { ?>
		<footer class="entry-footer">
			<?php the_mx_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php
	}
}