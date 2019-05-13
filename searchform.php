<?php
/**
 * Search Form
 *
 * @package The_M.X.
 */
 ?>
<form class="searchform">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'the-m-x' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'the-m-x' ) ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'the-m-x' ); ?>" />
	</label>
	<button class="search-icon"><i class="material-icons"><?php esc_html_e( 'arrow_forward', 'the-m-x' ); ?></i></button>
</form>