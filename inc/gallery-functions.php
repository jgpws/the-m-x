<?php 

/**
 * Functions for Galleries and the Gallery Post Format
 */

function the_mx_gal_colcount_switcher() {
	/* Function that replaces column count functionality */
	$gallery_columncount = get_theme_mod( 'the_mx_gal_col_count' );
	switch( $gallery_columncount ) {
		case 'one':
			return 1;
		break;
		case 'two':
			return 2;
		break;
		case 'three':
			return 3;
		break;
		case 'four':
			return 4;
		break;
		case 'five':
			return 5;
		break;
		case 'six':
			return 6;
		break;
		case 'seven':
			return 7;
		break;
		case 'eight':
			return 8;
		break;
		case 'nine':
			return 9;
		break;
		default:
			return 3;
	}
}

function the_mx_get_gallery_ids() {
	/* This function gets the gallery IDs from the shortcode */
	global $post;
	
	$post_content = $post->post_content;
	preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
	$images_id = $ids[1];
	
	return $images_id;
}

function the_mx_limit_ids( $length ) {
	/* Helper function to grab supplied ids and limit them via array_slice */
	/* Returns a string of comma separated ids at the length specified */
	
	// Get ids from the_mx_get_gallery_ids() (regular expression results)
	$init_ids = the_mx_get_gallery_ids();
	
	// Turn the comma separated string into an array
	$expl_ids = explode( ',', $init_ids );
	
	// Chop up the exploded array from the end; length equals the total number of ids
	$expl_ids = array_slice( $expl_ids, 0, intval( $length ) );
	
	// Turn the array back into a comma separated string
	$impl_ids = implode( ',', $expl_ids );
	
	// For debugging
	/*print_r( $expl_ids );
	echo '<br>';
	print_r( $impl_ids );
	echo '<br>';*/
	
	return $impl_ids;
}

function the_mx_number_thumbs_switcher() {
	/* Function to limit gallery thumbnails by number */
	$gallery_thumbcount = get_theme_mod( 'the_mx_limit_gal_thumbs' );
	
	switch( $gallery_thumbcount ) {
		case 'one':
			return the_mx_limit_ids(1);
		break;
		case 'two':
			return the_mx_limit_ids(2);
		break;
		case 'three':
			return the_mx_limit_ids(3);
		break;
		case 'four':
			return the_mx_limit_ids(4);
		break;
		case 'five':
			return the_mx_limit_ids(5);
		break;
		case 'six':
			return the_mx_limit_ids(6);
		break;
		case 'seven':
			return the_mx_limit_ids(7);
		break;
		case 'eight':
			return the_mx_limit_ids(8);
		break;
		case 'nine':
			return the_mx_limit_ids(9);
		break;
		case 'ten':
			return the_mx_limit_ids(10);
		break;
		case 'eleven':
			return the_mx_limit_ids(11);
		break;
		case 'twelve':
			return the_mx_limit_ids(12);
		break;
		default:
			return the_mx_limit_ids(6);
	}
}

/* Function to filter gallery shortcode display only in Gallery Post Format */
function the_mx_limited_gallery( $attr ) {
	$post = get_post();
	$link_image_to = the_mx_medialink_switcher(); // Customizer controls
	$mx_colcount = the_mx_gal_colcount_switcher(); // Customizer controls
	$mx_thumbcount = the_mx_number_thumbs_switcher(); // Customizer controls
	if( get_post_format() == 'gallery' ) { // opens gallery post format check
	
		if( !is_single() ) { // opens non single page if statement
	
			static $instance = 0;
			$instance++;
	
			if ( ! empty( $attr['ids'] ) ) {
				// 'ids' is explicitly ordered, unless you specify otherwise.
				if ( empty( $attr['orderby'] ) ) {
					$attr['orderby'] = 'post__in';
				}
				$attr['include'] = $attr['ids'];
			}
		
			// setup shortcode attributes
			$atts = null;
			$atts = shortcode_atts( array(
				'order' => 'ASC',
				'orderby' => 'post__in',
				'id' => $post ? $post->ID : 0,
				'itemtag' => 'figure',
				'icontag' => 'div',
				'captiontag' => 'figcaption',
				'columns' => $mx_colcount,
				'include' => $mx_thumbcount,
				'size' => 'gallery-thumb',
				'link' => $link_image_to,
			), $atts );
				
			$id = intval( $atts['id'] );
			
			if ( ! empty( $atts['include'] ) ) {
				$_attachments = get_posts( array( 
					'include' => $atts['include'], 
					'post_status' => 'inherit', 
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'order' => $atts['order'], 
					'orderby' => $atts['orderby'],
				) );
			
				$attachments = array();
				foreach ( $_attachments as $key => $val ) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			} elseif ( ! empty( $atts['exclude'] ) ) {
				$attachments = get_children( array( 
					'post_parent' => $id, 
					'exclude' => $atts['exclude'], 
					'post_status' => 'inherit', 
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'order' => $atts['order'], 
					'orderby' => $atts['orderby'] 
				) );
			} else {
				$attachments = get_children( array( 
					'post_parent' => $id, 
					'post_status' => 'inherit', 
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'order' => $atts['order'], 
					'orderby' => $atts['orderby'] 
				) );
			}
	
			if ( empty( $attachments ) ) {
				return '';
			}
			
			$itemtag = tag_escape( $atts['itemtag'] );
			$captiontag = tag_escape( $atts['captiontag'] );
			$icontag = tag_escape( $atts['icontag'] );
			$valid_tags = wp_kses_allowed_html( 'post' );
			if ( ! isset( $valid_tags[ $itemtag ] ) ) {
				$itemtag = 'figure';
			}
			if ( ! isset( $valid_tags[ $captiontag ] ) ) {
				$captiontag = 'figcaption';
			}
			if ( ! isset( $valid_tags[ $icontag ] ) ) {
				$icontag = 'div';
			}
			
			$columns = intval( $atts['columns'] );
			$float = is_rtl() ? 'right' : 'left';
	
			$selector = "gallery-{$instance}";
	
			$gallery_style = '';
			
			$size_class = sanitize_html_class( $atts['size'] );
			$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
			
			$output = $gallery_div;
			
			$i = 0;
			foreach ( $attachments as $id => $attachment ) {
				$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
				if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
					$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
				} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
					$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
				} else {
					$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
				}
				$image_meta  = wp_get_attachment_metadata( $id );
	
				$orientation = '';
				if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
					$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
				}
				
				$output .= "<{$itemtag} class='gallery-item'>";
				$output .= "
					<{$icontag} class='gallery-icon {$orientation}'>
						$image_output
					</{$icontag}>";
				if ( $captiontag && trim($attachment->post_excerpt) ) {
					$output .= "
						<{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
						" . wptexturize($attachment->post_excerpt) . "
						</{$captiontag}>";
				}
				$output .= "</{$itemtag}>";
			}
			$output .= "
				</div>\n";
				
			return $output;
		
		} // closes non single page if statement
		
	} // closes gallery post format check
	
}
add_filter( 'post_gallery', 'the_mx_limited_gallery', 10, 1 );


/* Function to use 300 x 300 size images by default via a filter and switch between large and thumbnail images in single posts when 'Enable the gallery to be shown as a slider' is checked in the Customizer */
// see https://amethystwebsitedesign.com/how-to-get-larger-images-in-a-wordpress-gallery/
function the_mx_gallery_atts( $out, $pairs, $atts ) {
	$link_image_to = the_mx_medialink_switcher();
	
	if ( get_theme_mod( 'the_mx_single_slider' ) == 1 && is_single() ) {
		$atts = shortcode_atts( array(
			'size' => 'large',
			'link' => $link_image_to,
		), $atts );
	} else {
		$atts = shortcode_atts( array(
			'size' => 'gallery-thumb',
			'link' => $link_image_to,
		), $atts );
	}
	
	$out['size'] = $atts['size'];
	$out['link'] = $atts['link'];
	
	return $out;
}
add_filter( 'shortcode_atts_gallery', 'the_mx_gallery_atts', 10, 3 );

?>