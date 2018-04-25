/* Scripts to work with Colorbox */
/* see http://www.jacklmoore.com/colorbox/ */

( function( $ ) {

	windowWidth = $( window ).width();
	
	/* Jetpack tiled gallery compatible */
	if ( colorboxParams.link_to === 'attachment' && windowWidth >= 600 ) {
		$( '.gallery-item a, .tiled-gallery-item a' ).colorbox({
			rel: 'gal',
			iframe: 'true',
			innerHeight: '75%',
			innerWidth: '75%',
			opacity: '0.75'
		});
	} else if ( colorboxParams.link_to === 'attachment' && windowWidth < 600 ) {
		$( '.gallery-item a, .tiled-gallery-item a' ).colorbox({
			rel: 'gal',
			iframe: 'true',
			innerHeight: '75%',
			innerWidth: '100%'
		});
	} else {
		$( '.gallery-item a, .tiled-gallery-item a' ).colorbox({
			rel:'gal',
			maxHeight: '75%',
			maxWidth: '100%',
			opacity: '0.87'
		});
	}
	
	// disable scrolling on parent document
	$(document).on( 'cbox_open', function() {
		$( 'body' ).css({ overflow: 'hidden' });
	}).on( 'cbox_closed', function() {
		$( 'body' ).css({ overflow: '' });
	});
	
	// AJAX to pull in our attachment posts
	
	/*$(document).on( 'click', '.gallery-item a', function( event ) {
		if ( colorboxParams.link_to === 'attachment' ) {
			event.preventDefault();
			$.ajax( {
				url: ajaxCboxContent.ajaxurl,
				type: 'post',
				data: {
					action: 'cbox_content',
					query_vars: ajaxCboxContent.query_vars,
					//page: page
				},
				success: function( html ) {
					$('#cboxLoadedContent .main-navigation').remove();
					$('#cboxLoadedContent .attachment').html( html );
				}
			} );
		}
	} );*/
	
} ) (jQuery);