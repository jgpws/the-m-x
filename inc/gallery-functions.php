<?php 

/**
 * Functions for Galleries and the Gallery Post Format
 */
 
function the_mx_get_gallery_atts() {
	/* This function gets the gallery IDs from the shortcode */
	global $post;
	
	$post_content = $post->post_content;
	preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
	$images_id = $ids[1];
	
	return $images_id;
}

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

function the_mx_number_thumbs_switcher() {
	/* Function to limit gallery thumbnails by number */
	
	$gallery_thumbcount = get_theme_mod( 'the_mx_limit_gal_thumbs' );
	$init_ids = the_mx_get_gallery_atts();
	$expl_ids = explode( ',', $init_ids ); // $expl_ids = Exploded ids; impl_ids = Imploded ids
	$impl_ids = implode( ',', $expl_ids );
	
	switch( $gallery_thumbcount ) {
		case 'one':
			return $expl_ids[0];
		break;
		case 'two':
			$expl_ids = array_slice( $expl_ids, 0, 2 );
			$impl_ids = implode( ',', $expl_ids );
			//print_r( $expl_ids );
			//echo '<br>';
			//print_r( $impl_ids );
			//echo '<br>';
			return $impl_ids;
		break;
		case 'three':
			$expl_ids = array_slice( $expl_ids, 0, 3 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'four':
			$expl_ids = array_slice( $expl_ids, 0, 4 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'five':
			$expl_ids = array_slice( $expl_ids, 0, 5 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'six':
			$expl_ids = array_slice( $expl_ids, 0, 6 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'seven':
			$expl_ids = array_slice( $expl_ids, 0, 7 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'eight':
			$expl_ids = array_slice( $expl_ids, 0, 8 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'nine':
			$expl_ids = array_slice( $expl_ids, 0, 9 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'ten':
			$expl_ids = array_slice( $expl_ids, 0, 10 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'eleven':
			$expl_ids = array_slice( $expl_ids, 0, 11 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		case 'twelve':
			$expl_ids = array_slice( $expl_ids, 0, 12 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
		break;
		default:
			$expl_ids = array_slice( $expl_ids, 0, 6 );
			$impl_ids = implode( ',', $expl_ids );
			return $impl_ids;
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
				'orderby' => 'menu_order ID',
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

//add_shortcode( 'gallery', 'the_mx_limited_gallery' );

/* Function to use 300 x 300 size images by default via a filter */
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

/* Function that switches between large and thumbnail images in single posts when 'Enable the gallery to be shown as a slider' is checked in the Customizer */

/*function the_mx_large_gal_imgs() {
	if( shortcode_exists( 'gallery' ) ) {
		if( 'the_mx_single_slider' == 1 && is_single() ) {
			shortcode_atts( array(
					'size' => 'large'
				)
			);
		}
	}
	
}
add_filter( 'shortcode_atts_gallery', 'the_mx_large_gal_imgs' );*/

?>