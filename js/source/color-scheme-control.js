/* global colorScheme, Color */
/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.
 * Also trigger an update of the Color Scheme CSS when a color is changed.
 */

//console.log('Color scheme script enqueued!');
( function( api ) {
  var cssTemplate = wp.template( 'the-mx-color-scheme' ),
    colorSchemeKeys = [
      'background_color',
      'the_mx_primary_1',
      'the_mx_primary_2',
      'the_mx_primary_3',
      'the_mx_primary_4',
      'the_mx_accent_1',
      'the_mx_accent_2',
      'the_mx_accent_3'
    ],
    colorSettings = [
      'background_color',
      'the_mx_primary_1',
      'the_mx_primary_2',
      'the_mx_primary_3',
      'the_mx_primary_4',
      'the_mx_accent_1',
      'the_mx_accent_2',
      'the_mx_accent_3'
    ];

  api.controlConstructor.select = api.Control.extend( {
		ready: function() {
      //console.log('ID of this object is: ' + this.id);
			if ( 'the_mx_color_scheme' === this.id ) {
				this.setting.bind( 'change', function( value ) {
          // Update Background Color.
          api( 'background_color' ).set( colorScheme[value].colors[0] );
					api.control( 'background_color' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', colorScheme[value].colors[0] )
						.wpColorPicker( 'defaultColor', colorScheme[value].colors[0] );

          // Update Primary 1
          api( 'the_mx_primary_1' ).set( colorScheme[value].colors[1] );
          api.control( 'the_mx_primary_1' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[1] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[1] );

          // Update Primary 2
          api( 'the_mx_primary_2' ).set( colorScheme[value].colors[2] );
          api.control( 'the_mx_primary_2' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[2] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[2] );

          // Update Primary 3
          api( 'the_mx_primary_3' ).set( colorScheme[value].colors[3] );
          api.control( 'the_mx_primary_3' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[3] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[3] );

          // Update Primary 4
          api( 'the_mx_primary_4' ).set( colorScheme[value].colors[4] );
          api.control( 'the_mx_primary_4' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[4] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[4] );

          // Update Accent 1
          api( 'the_mx_accent_1' ).set( colorScheme[value].colors[5] );
          api.control( 'the_mx_accent_1' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[5] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[5] );

          // Update Accent 2
          api( 'the_mx_accent_2' ).set( colorScheme[value].colors[6] );
          api.control( 'the_mx_accent_2' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[6] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[6] );

          // Update Accent 1
          api( 'the_mx_accent_3' ).set( colorScheme[value].colors[7] );
          api.control( 'the_mx_accent_3' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[7] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[7] );

          // Update Header Text Color
          api( 'header_textcolor' ).set( colorScheme[value].colors[8] );
          api.control( 'header_textcolor' ).container.find( '.color-picker-hex' )
            .data( 'data-default-color', colorScheme[value].colors[8] )
            .wpColorPicker( 'defaultColor', colorScheme[value].colors[8] );
        } );
      }
    }
  } );

  // Generate the CSS for the current Color Scheme.
  function updateCSS() {
    var scheme = api( 'the_mx_color_scheme' )(), css,
      colors = _.object( colorSchemeKeys, colorScheme[ scheme ].colors );

      // Merge in color scheme overrides.
  		_.each( colorSettings, function( setting ) {
  			colors[ setting ] = api( setting )();
  		} );

      // Add RGBA Colors.
      colors.meta_links_color = Color( colors.the_mx_primary_3 ).toCSS( 'rgba', 0.54 );
      colors.meta_links_hover_color = Color( colors.the_mx_primary_3 ).toCSS( 'rgba', 0.7 );

      css = cssTemplate( colors );

      api.previewer.send( 'update-color-scheme-css', css );
  }

  // Update the CSS whenever a color setting is changed.
  _.each( colorSettings, function( setting ) {
    api( setting, function( setting ) {
      setting.bind( updateCSS );
    } );
  } );
} ) ( wp.customize );
