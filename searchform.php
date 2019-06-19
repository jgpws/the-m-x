<?php
/**
 * Search Form
 *
 * @package The_M.X.
 */
 ?>
<form role="search" method="get" action="<?php esc_url( home_url( '/' ) ) ?>" class="searchform">
	<label>
		<span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'the-m-x' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'the-m-x' ) ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr__( 'Search for:', 'the-m-x' ); ?>" />
	</label>
	<button class="search-icon"><i class="material-icons">arrow_forward</i></button>
</form>