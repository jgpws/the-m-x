/* Scripts to work with Colorbox */
/* see http://www.jacklmoore.com/colorbox/ */

( function( $ ) {

	// If Colorbox is not loaded, do nothing
	if ( !$().colorbox ) {
		return;
	}

	if( $( 'body' ).hasClass( 'colorbox' ) ) {

		var windowWidth = $( window ).width();
		var galleryImgItems = $( '.blocks-gallery-item a[href$=".jpg"], .blocks-gallery-item a[href$=".jpeg"], .blocks-gallery-item a[href$=".png"], .blocks-gallery-item a[href$=".gif"], .gallery-icon a[href$=".jpg"], .gallery-icon a[href$=".jpeg"], .gallery-icon a[href$=".png"], .gallery-icon a[href$=".gif"]' );
		var galleryAttsItems = $( '.blocks-gallery-item > figure > a:not([href$=".jpg"], [href$=".png"], [href$=".gif"]), .gallery-icon > a:not([href$=".jpg"], [href$=".png"], [href$=".gif"])' );

		/* Jetpack tiled gallery compatible */

		if ( windowWidth < 600 ) {
			galleryImgItems.colorbox({
				rel: 'gal',
				maxWidth: '100%',
				maxHeight: '75%'
			});
		} else {
			galleryImgItems.colorbox({
				rel: 'gal',
				maxWidth: '75%',
				maxHeight: '75%',
				opacity: '0.75'
			});
		}

		if ( windowWidth >= 600 ) {
			galleryAttsItems.colorbox({
				rel: 'gal',
				iframe: 'true',
				innerHeight: '75%',
				innerWidth: '75%',
				opacity: '0.75'
			});
		} else if ( windowWidth < 600 ) {
			galleryAttsItems.colorbox({
				rel: 'gal',
				iframe: 'true',
				innerHeight: '75%',
				innerWidth: '100%'
			});
		} else {
			galleryAttsItems.colorbox({
				rel:'gal',
				maxHeight: '75%',
				maxWidth: '100%',
				opacity: '0.87',
				iframe: 'true'
			});
		}

		// disable scrolling on parent document
		$(document).on( 'cbox_open', function() {
			$( 'body' ).css({ overflow: 'hidden' });
		}).on( 'cbox_closed', function() {
			$( 'body' ).css({ overflow: 'auto' });
		});
	}

} ) (jQuery);
