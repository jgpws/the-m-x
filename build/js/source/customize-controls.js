/**
 * Scripts to alter the behavior of Customizer controls.
 */
( function () {
	wp.customize.bind( 'ready', function() {

		function hideShowCustomMoreTitle() {
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
				colorControlIds.forEach( function( element ) {
					let control = document.querySelector('#customize-control-' + element);

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

		function hideShowWCSidebarControls() {
			let wcSidebarControl = document.querySelector('#customize-control-the_mx_enable_wc_sidebar');

			let wcSidebarControlIds = [
				'the_mx_wc_sidebar_layout',
				'the_mx_wc_sidebar_onpage'
			];

			if ( wp.customize.instance( 'the_mx_enable_wc_sidebar' ).get() === true ) {
				wcSidebarControlIds.forEach( function( element ) {
					let control = document.querySelector('#customize-control-' + element);
					control.style.display = 'list-item';
				} );
			} else {
				wcSidebarControlIds.forEach( function( element ) {
					let control = document.querySelector('#customize-control-' + element);
					control.style.display = 'none';
				} );
			}

			wcSidebarControl.addEventListener( 'change', hideShowWCSidebarControls );
		}

		hideShowWCSidebarControls();

	} );

}() );
