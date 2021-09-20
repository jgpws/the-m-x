<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package The_M.X.
 */

if ( ! function_exists( 'the_mx_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function the_mx_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: 2: text hiding <span class="screen-reader-text">, 3: </span> closing tag */
		esc_html_x( '%2$sPosted on%3$s%1$s', 'post date', 'the-m-x' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>', '<span class="screen-reader-text">', '</span>'
	);

	$byline = sprintf(
		/* translators: %s: Post author title */
		esc_html_x( 'by %s', 'post author', 'the-m-x' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<div class="byline"><i class="material-icons">person</i>' . $byline . '</div><div class="posted-on"><i class="material-icons">schedule</i>' . $posted_on . '</div>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'the_mx_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function the_mx_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html( ' ' ) );
		if ( $categories_list && the_mx_categorized_blog() ) {
			printf(
				/* translators: 2: text hiding <span class="screen-reader-text">, 3: </span> closing tag */
				'<div class="cat-links"><i class="material-icons">folder</i>' . esc_html__( '%2$sPosted in %3$s%1$s', 'the-m-x' ) . '</div>', $categories_list, '<span class="screen-reader-text">', '</span>' 
			); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html( ' ' ) );
		if ( $tags_list ) {
			printf(
				/* translators: 2: text hiding <span class="screen-reader-text">, 3: </span> closing tag */
				'<div class="tags-links"><i class="material-icons">bookmark</i>' . esc_html__( '%2$sTagged %3$s%1$s', 'the-m-x' ) . '</div>', $tags_list, '<span class="screen-reader-text">', '</span>' 
			); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<div class="comments-link"><i class="material-icons">comment</i>';
		comments_popup_link( 
			sprintf( 
				wp_kses( 
					/* translators: 1: post title, 2: hide text with .screen-reader-text class <span> tag, 3: closing </span> tag */
					esc_html__( 'Leave a Comment%2$s on %1$s%3$s', 'the-m-x' ), 
					array( 
						'span' => array( 
							'class' => array() 
						),
					) 
				), 
				esc_html( get_the_title() ),
				'<span class="screen-reader-text">',
				'</span>' 
			) 
		);
		echo '</div>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'the-m-x' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<div class="edit-link"><i class="material-icons">mode_edit</i>',
		'</div>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function the_mx_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'the_mx_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'the_mx_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so the_mx_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so the_mx_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in the_mx_categorized_blog.
 */
function the_mx_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'the_mx_categories' );
}
add_action( 'edit_category', 'the_mx_category_transient_flusher' );
add_action( 'save_post',     'the_mx_category_transient_flusher' );
