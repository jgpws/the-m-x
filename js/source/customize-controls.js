/**
 * Scripts to alter the behavior of Customizer controls.
 */
( function ( $ ) {
	wp.customize.bind( 'ready', function() {

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
