<?php

/* Color Scheme functions */
function the_mx_color_scheme_array() {
	/*
	 * Get color scheme values from a nested array
	 *
	 * @since The M.X. 1.2
	 */
	return apply_filters(
		'the_mx_color_schemes',
		array(
			'default' => array(
				'label' => esc_html__( 'Default (Brown)', 'the-m-x' ),
				'colors' => array(
					'#efebe9', // Background Color
					'#795548', // Primary 1
					'#5d4037', // Primary 2
					'#3e2723', // Primary 3
					'#bcaaa4', // Primary 4
					'#ffc107', // Accent 1
					'#ffa000', // Accent 2
					'#ff6f00', // Accent 3
					'#ffffff', // Header Text Color
				),
			),
			'blue_gray' => array(
				'label' => esc_html__( 'Blue Gray', 'the-m-x' ),
				'colors' => array(
					'#eceff1',
					'#607d8b',
					'#455a64',
					'#263238',
					'#b0bec5',
					'#795548',
					'#5d4037',
					'#3e2723',
					'#ffffff',
				),
			),
			'deep_purple' => array(
				'label' => esc_html__( 'Deep Purple', 'the-m-x' ),
				'colors' => array(
					'#ede7f6',
					'#673ab7',
					'#512da8',
					'#311b92',
					'#b39ddb',
					'#cddc39',
					'#afb42b',
					'#827717',
					'#ffffff',
				),
			),
			'pale_orange' => array(
				'label' => esc_html__( 'Pale Orange', 'the-m-x' ),
				'colors' => array(
					'#fff3e0',
					'#ffe0b2',
					'#ffb74d',
					'#ff9800',
					'#ffe0b2',
					'#009688',
					'#00796b',
					'#004d40',
					'#000000',
				),
			),
			'black' => array(
				'label' => esc_html__( 'Black', 'the-m-x' ),
				'colors' => array(
					'#fafafa',
					'#212121',
					'#212121',
					'#212121',
					'#bdbdbd',
					'#ffffff',
					'#eeeeee',
					'#616161',
					'#ffffff',
				),
			),
			'white' => array(
				'label' => esc_html__( 'White', 'the-m-x' ),
				'colors' => array(
					'#fafafa',
					'#ffffff',
					'#ffffff',
					'#bdbdbd',
					'#ffffff',
					'#9e9e9e',
					'#616161',
					'#212121',
					'#000000',
				),
			),
			'custom' => array(
				'label' => esc_html__( 'Custom', 'the-m-x' ),
				'colors' => array(
					get_background_color(), // Background Color
					get_theme_mod( 'the_mx_primary_1', '#795548' ), // Primary 1
					get_theme_mod( 'the_mx_primary_2', '#5d4037' ), // Primary 2
					get_theme_mod( 'the_mx_primary_3', '#3e2723' ), // Primary 3
					get_theme_mod( 'the_mx_primary_4', '#bcaaa4' ), // Primary 4
					get_theme_mod( 'the_mx_accent_1', '#ffc107' ), // Accent 1
					get_theme_mod( 'the_mx_accent_2', '#ffa000' ), // Accent 2
					get_theme_mod( 'the_mx_accent_3', '#ff6f00' ), // Accent 3
					get_header_textcolor(), // Header Text Color
				),
			),
		)
	);
}

if ( ! function_exists( 'the_mx_get_color_scheme_choices' ) ) :
	function the_mx_get_color_scheme_choices() {
		/**
		 * Returns values from the_mx_color_schemes array.
		 *
		 * @since The M.X. 1.2
		 *
		 */
		$color_schemes = the_mx_color_scheme_array();
		$color_scheme_control_options = array();

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}
endif;

if ( ! function_exists( 'the_mx_get_color_scheme' ) ) :
	function the_mx_get_color_scheme() {
		$color_scheme_option = get_theme_mod( 'the_mx_color_scheme', 'default' );
		$color_schemes = the_mx_color_scheme_array();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}
endif;

/**
 * Output an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the Customizer
 * preview.
 *
 * @since The M.X. 1.2
 */
function the_mx_color_scheme_css_template() {
	$colors = array(
		'background_color' => '{{ data.background_color }}',
		'primary_1' => '{{ data.the_mx_primary_1 }}',
		'primary_2' => '{{ data.the_mx_primary_2 }}',
		'primary_3' => '{{ data.the_mx_primary_3 }}',
		'primary_4' => '{{ data.the_mx_primary_4 }}',
		'accent_1' => '{{ data.the_mx_accent_1 }}',
		'accent_2' => '{{ data.the_mx_accent_2 }}',
		'accent_3' => '{{ data.the_mx_accent_3 }}',
		'header_text_color' => '{{ data.header_textcolor }}',
		'meta_links_color' => '{{ data.meta_links_color }}',
		'meta_links_hover_color' => '{{ data.meta_links_hover_color }}',
	); ?>
	<script type="text/html" id="tmpl-the-mx-color-scheme">
		<?php echo the_mx_frontend_color_scheme_styles( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'the_mx_color_scheme_css_template' );
