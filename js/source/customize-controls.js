/**
 * Scripts to alter the behavior of Customizer controls.
 */
( function () {
	wp.customize.bind( 'ready', function() {

		function hideShowCustomMoreTitle() {
			//var imgGridMoreLink = $( '#customize-control-the_mx_customize_showmore_title' );
			var imgGridMoreBtn = document.querySelector('#customize-control-the_mx_add_showmore_button');
			var imgGridMoreLink = document.querySelector( '#customize-control-the_mx_customize_showmore_title' );

			if ( wp.customize.instance( 'the_mx_add_showmore_button' ).get() === true ) {
				imgGridMoreLink.style.display = 'list-item';
			} else {
				imgGridMoreLink.style.display = 'none';
			}

			if( imgGridMoreBtn !== undefined ) {
				imgGridMoreBtn.addEventListener( 'change', hideShowCustomMoreTitle );
			}

			return hideShowCustomMoreTitle;
		}

		hideShowCustomMoreTitle();


		function hideShowColorControls() {
			/* Hide and show controls for custom color schemes only when "Custom" color scheme is chosen" */

			let colorSchemeSelect = document.querySelector('#customize-control-the_mx_color_scheme');

			// array for our id titles
			let colorControlIds = [
				'header_textcolor',
				'background_color',
				'the_mx_primary_1',
				'the_mx_primary_2',
				'the_mx_primary_3',
				'the_mx_primary_4',
				'the_mx_accent_1',
				'the_mx_accent_2',
				'the_mx_accent_3'
			];

			if ( wp.customize.instance( 'the_mx_color_scheme' ).get() === 'custom' ) {
				console.log('Color scheme is custom.');
				colorControlIds.forEach( function( element ) {
					let control = document.querySelector('#customize-control-' + element);

					//console.log(control);
					control.style.display = 'list-item';
				} );
			} else {
				colorControlIds.forEach( function( element ) {
					let control = document.querySelector('#customize-control-' + element);
					control.style.display = 'none';
				} );
			}

			colorSchemeSelect.addEventListener( 'change', hideShowColorControls );
		}

		hideShowColorControls();

	} );

}() );
