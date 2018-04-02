<?php
/**
 * The M.X. Post Format functions.
 *
 * @package The_M.X.
 */
 
/**
 * These functions control the display of content when some of the registered post formats are active.
 * The content and excerpts are changed with filters.
 */
function the_mx_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

function the_mx_wrap_quote() {
// Adapted from the article Post Formats: Quote, by Justin Tadlock
// see http://justintadlock.com/archives/2012/08/27/post-formats-quote
	
	global $post;
	$content = $post->post_content;
	
	if( has_post_format( 'quote' ) && ( !is_single() || !is_search() ) ) {
		/* Match blockquote elements */
		preg_match( '/<blockquote.*?>/', $content, $matches );
		
		if( empty( $matches ) ) {
			$content = "<blockquote>{$content}</blockquote>";
		} else {
			return $content;
		}
	}
	
	return $content;
}
?>