<?php
/**
 * The M.X. No Script function.
 *
 * @package The_M.X.
 */
 
/** This function shows css for a <noscript> tag when JavaScript is disabled.
*/

?>
<noscript>
	<style type="text/css">
		#loader-wrapper {
			position: static;
		}
		
		.lds-ring,
		#sidebar-button,
		.menu-toggle {
			display: none;
		}
		
		.site-branding {
			order: 1;
		}
		
		.main-navigation {
			order: 2;
		}
		
		.site-header #header-button-panel {
			height: auto;
			padding: 0 0 0.5em 0;
		}
		
		#header-button-panel .menu-social-media-icons-container {
			position: static;
			width: 100%;
		}
		
		#header-button-panel .searchform {
			background-color: transparent;
			margin: 0.5em;
			position: static;
			width: 100%;
		}
		
		.menu-social-media-icons-container .screen-reader-text {
			position: static !important;
		}
		
		.site-header .main-navigation ul#primary-menu,
		.site-header .main-navigation ul.nav-menu {
			padding: 1em;
			position: static;
			width: 100%;
		}
		
		#sidebar-button {
			display: none;
		}
		
		.site-content .widget-area {
			position: static;
			width: 100%;
		}
		
		@media screen and (min-width: 37.5em) {
			#header-button-panel .menu-social-media-icons-container {
				background-color: transparent;
				box-shadow: none;
				width: 50%;
			}
			
			#menu-social ul li a:link,
			#menu-social ul li a:visited {
				color: rgba(255, 255, 255, 0.87);
			}
		}
		
		@media screen and (min-width: 80em) {
			#header-button-panel .menu-social-media-icons-container {
				position: absolute;
				width: auto;
			}
		}
	</style>
</noscript>