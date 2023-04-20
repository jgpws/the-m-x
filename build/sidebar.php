<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_M.X.
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php if( the_mx_example_is_amp() ) { ?>
	<aside id="secondary" class="widget-area hide" [class]="'widget-area' + ( sidebarExpanded ? '' : '  hide' )" aria-expanded="false" [aria-expanded]="sidebarExpanded ? 'true' : 'false'" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
<?php } else { ?>
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
<?php } ?>
