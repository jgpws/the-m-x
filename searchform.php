<?php
/**
 * Search Form
 *
 * @package The_M.X.
 */
 ?>
<form class="searchform">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'the-mx' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' ) ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'the-mx' ); ?>" />
	</label>
	<button class="search-icon"><i class="material-icons">arrow_forward</i></button>
</form>