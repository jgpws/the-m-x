<?php if( has_nav_menu( 'social' ) ) {

	wp_nav_menu( array(
			'theme_location' => 'social',
			'menu_id' => 'menu-social-items',
			'container' => '',
			'menu_class' => 'menu-items',
			'depth' => 1,
			'fallback_cb' => '',
		)
	);

}