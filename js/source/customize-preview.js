/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-branding-text' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-branding-text' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Hero text colors
	wp.customize( 'the_mx_herotext_color', function ( value ) {
		value.bind( function ( to ) {
			if ( 'white' === to ) {
				$( '#custom-header .hero-widgets-wrap .widget' ).css( {
					'color' : 'rgba(255, 255, 255, 0.87)'
				} );
			} else {
				$( '#custom-header .hero-widgets-wrap .widget' ).css( {
					'color' : 'rgba(0, 0, 0, 0.87)'
				} );
			}
		} );
	} );

	// Hero text alignment
	wp.customize( 'the_mx_herotext_alignment', function ( value ) {
		value.bind( function ( to ) {
		var windowWidth = $( window ).width();
			if( 'left' === to ) {

				$( '#custom-header .hero-widgets-wrap' ).css( {
					'margin-left' : '0',
					'margin-right' : '0'
				} );
				$( '#custom-header .hero-widgets-wrap .widget' ).css( {
					'text-align' : 'left'
				} );
				$( '#custom-header .hero-widgets-wrap .widget-title' ).css( {
					'margin-left' : '0',
					'text-align' : 'left'
				} );

				if ( windowWidth >= 768 ) {
					$( '#custom-header .hero-widgets-wrap' ).css( {
						'margin-left' : '2.5%',
						'margin-right' : '47.5%'
					} );
				}

				if ( windowWidth >= 1280 ) {
					$( '#custom-header .hero-widgets-wrap' ).css( {
						'margin-left' : '3%',
						'margin-right' : '64%'
					} );

				}

			} else if( 'right' === to ) {

				$( '#custom-header .hero-widgets-wrap' ).css( {
					'margin-left' : '0',
					'margin-right' : '0'
				} );
				$( '#custom-header .hero-widgets-wrap .widget' ).css( {
					'text-align' : 'left'
				} );
				$( '#custom-header .hero-widgets-wrap .widget-title' ).css( {
					'margin-left' : '0',
					'text-align' : 'left'
				} );

				if ( windowWidth >= 768  ) {
					$( '#custom-header .hero-widgets-wrap' ).css( {
						'margin-left' : '47.5%',
						'margin-right' : '2.5%'
					} );
				}

				if ( windowWidth >= 1280 ) {
					$( '#custom-header .hero-widgets-wrap' ).css( {
						'margin-left' : '64%',
						'margin-right' : '3%'
					} );
				}
			} else {
				$( '#custom-header .hero-widgets-wrap .widget-title' ).css( {
					'text-align' : 'center'
				} );

				if ( windowWidth >= 768  ) {
					$( '#custom-header .hero-widgets-wrap' ).css( {
						'margin-left' : '25%',
						'margin-right' : '25%'
					} );
				}

				if ( windowWidth >= 1280 ) {
					$( '#custom-header .hero-widgets-wrap' ).css( {
						'margin-left' : '33.3%',
						'margin-right' : '33.3%'
					} );
				}

			}
		} );

		// For the More Posts button in the Image Grid page template
		wp.customize( 'the_mx_add_showmore_button', function ( value ) {
			value.bind( function( to ) {
				if ( true === to ) {
					$( '.page-template-template-image-grid .more-link' ).show();
					console.log(to);
				} else {
					$( '.page-template-template-image-grid .more-link' ).hide();
				}
			} );
		} );
	} );

} )( jQuery );
