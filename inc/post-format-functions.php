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

function the_mx_get_formatted_content() {
	$content = get_the_content( sprintf(
		/* translators: %s: Name of current post. */
		__( 'Continue reading %s...', 'the-mx' ),
		the_title( '<span class="screen-reader-text">"', '"</span>', false )
	) );
	$content = wpautop( $content );
	
	return $content;
}

function the_mx_get_formatted_excerpt() {
	$excerpt = get_the_excerpt();
	$excerpt = wpautop( $excerpt );
	
	return $excerpt;
}

function the_mx_get_first_image() {
	global $post;
	
	if( has_shortcode( $post->post_content, 'caption' ) ) {
		$output_caption = preg_match_all('/\[caption(.)*caption="([\s\S][^"]*)"]<a.*>(<img[\s\S][^>]*>)<\/a>\[\/caption\]/im', $post->post_content, $caption_matches );
		// [2] = first capturing group (information inside caption="")
		// [3] = first image src
		// second [0] = first iteration of each
		$first_caption = $caption_matches[2][0];
		$first_img = $caption_matches[3][0];
		return '<a href="' . get_the_permalink() . '">' . $first_img . '</a>' . "\n" .
		'<p class="wp-caption-text">' . $first_caption . '</p>';
	} else {
	
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output_nocaption = preg_match_all('/(<img.+src=[\'"]([^\'"]+)[\'"].*>)/i', $post->post_content, $matches );
	$first_img = $matches[1][0];
	// [0] = the first matching img src tag
	// [1] = first capturing group in parenthesis (also represented by the entire img src tag)
	
	if( empty( $first_img ) ) {
		$first_img = "";
	}
	return '<a href="' . get_the_permalink() . '">' . $first_img . '</a>';
	
	}
}

/*function the_mx_get_first_media() {
	$content = the_mx_get_formatted_content();
	
	global $post;
	
	// To get oembeds within posts that don't have this filter applied
	// get_the_content literally echoes everything on the page
	// see the answer on this Stack Exchange page - http://wordpress.stackexchange.com/questions/202707/how-to-use-oembeds-on-post-content-during-ajax-requests
	global $wp_embed;
	$new_content = '';
	
	$wp_embed->post_ID = $post->ID;
	
	$wp_embed->run_shortcode( $content );
	
	$new_content = $wp_embed->autoembed( $content );
	
	if( !is_single() && !is_search() ) {
	
		if( has_post_format( 'image' ) ) {
			
			return the_mx_get_first_image();
			
		} elseif( has_post_format( 'video' ) ) {
			
			$embeds = get_media_embedded_in_content( $new_content,  array( 'video', 'object', 'embed', 'iframe' ) );
			if( !empty( $first_embed ) ) {
				$first_embed = $embeds[0];
			}
			
			if( !empty( $first_embed ) && current_theme_supports( 'jetpack-responsive-videos' ) ) {
				return '<div class="jetpack-video-wrapper">' . $first_embed . '</div>';
			} elseif( !empty( $first_embed ) ) {
				return $first_embed;
			} else {
				return $new_content;
			}
			
		} elseif( has_post_format( 'quote' ) ) {
			// Adapted from the article Post Formats: Quote, by Justin Tadlock
			// see http://justintadlock.com/archives/2012/08/27/post-formats-quote
			
			$content = the_mx_get_formatted_content();
			/* Match blockquote elements */
			/*preg_match( '/<blockquote.*?>/', $content, $matches );
			
			if( empty( $matches ) ) {
				$content = "<blockquote>{$content}</blockquote>";
			} else {
				return $new_content;
			}
		
		return $content;
		
		} else {
			return $new_content; // Content when media type post format is not chosen
		}
			
	} else {
		return $new_content; // Content inside Single post
	}
}
add_filter( 'the_content', 'the_mx_get_first_media' );*/

function the_mx_get_first_excerpt_media() {
	$new_excerpt = the_mx_get_formatted_excerpt();
	if( is_search() ) {
		
		if( has_post_format( 'video' ) ) {
			return $new_excerpt;
		} else {
			return $new_excerpt;
		}
		
	}
}
add_filter( 'the_excerpt', 'the_mx_get_first_excerpt_media' );