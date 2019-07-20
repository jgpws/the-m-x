/**
 * Scripts to alter the behavior of Customizer controls.
 */
( function ( $ ) {
	wp.customize.bind( 'ready', function() {
		
		function hideShowColorControls() {
			/* Hide and show controls for Background Color and custom color schemes when "Custom" color scheme is chosen */
			// array for our id titles
			var colorControlIds = [
				'the_mx_custom_primary_1',
				'the_mx_custom_primary_2',
				'the_mx_custom_primary_3',
				'the_mx_custom_primary_4',
				'the_mx_custom_accent_1',
				'the_mx_custom_accent_2',
				'the_mx_custom_accent_3',
			];
			
			if ( wp.customize.instance( 'the_mx_color_scheme' ).get() === 'custom' ) {
				$.each( colorControlIds, function ( i, value ) {	
					$( '#customize-control-' + value ).show();
				} );
			} else {
				$.each( colorControlIds, function ( i, value ) { 
					$( '#customize-control-' + value ).hide();
					//console.log( '#customize-control-' + value );
				} );
			}
			
			return hideShowColorControls;
		}
		
		// Call this function on page load
		hideShowColorControls();
		
		// ... and on radio button change
		$( '#customize-control-the_mx_color_scheme' ).on( 'change', hideShowColorControls );
		
		function hideShowCustomMoreTitle() {
			var imgGridMoreLink = $( '#customize-control-the_mx_customize_showmore_title' );
			
			if ( wp.customize.instance( 'the_mx_add_showmore_button' ).get() === true ) {
				imgGridMoreLink.show();
			} else {
				imgGridMoreLink.hide();
			}
			
			return hideShowCustomMoreTitle;
		}
		
		hideShowCustomMoreTitle();
		
		$( '#customize-control-the_mx_add_showmore_button' ).on( 'change', hideShowCustomMoreTitle );
		
	} );

} ) (jQuery);