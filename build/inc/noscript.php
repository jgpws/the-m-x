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
		.sidebar-toggle,
		.menu-toggle {
			display: none;
		}
		
		.site-branding {
			order: 1;
			width: 100%;
		}
		
		.main-navigation {
			order: 2;
		}
		
		.site-header .header-button-panel {
			height: auto;
			padding: 0 0 0.5em 0;
		}
		
		.menu-toggle,
		.search-toggle,
		.social-toggle,
		.sidebar-toggle {
			max-height: 3.5em;
		}
		
		.header-button-panel .menu-social-container {
			position: static;
			width: 100%;
		}
		
		.menu-social-container ul {
			justify-content: center;
		}
		
		.header-button-panel .menu-social-container .screen-reader-text {
			clip: auto;
			clip-path: none;
			position: static !important;
		}
		
		.header-button-panel .menu-social-container ul li a::before {
			content: "\279A";
			margin-right: 0.25em;
		}
		
		.header-button-panel .searchform {
			background-color: transparent;
			margin: 0.5em;
			position: static;
			z-index: 50;
		}
		
		.site-header .main-navigation ul#primary-menu,
		.site-header .main-navigation ul.nav-menu {
			padding: 1em;
			position: static;
			width: 100%;
		}
		
		.sidebar-overlay .site-content .widget-area {
			position: static;
			width: 100%;
		}
		
		@media screen and (min-width: 37.5em) {
			.site-header .main-navigation ul#primary-menu {
			   padding: 0;
			}
		}
		
		@media screen and (min-width: 48em) {
			.header-button-panel .menu-social-container {
				background-color: transparent;
				box-shadow: none;
				flex-grow: 1;
				padding: 0;
				width: auto;
			}
			
			.header-button-panel .menu-social-container ul li a:link {
				color: rgba(255, 255, 255, 0.87);
			}
		}
		
		@media screen and (min-width: 80em) {
			.site-header .site-branding {
				width: 50%;
			}
			
			.site-header .header-button-panel {
				width: 50%;
			}
			
			.site-branding-text {
				flex-grow: 1;
			}
			
			.header-button-panel .menu-social-container {
				margin-top: 0;
			}
			
			.menu-social-container ul {
				justify-content: left;
			}
			
			.site-header .header-button-panel .searchform {
				width: auto;
			}
		}
	</style>
</noscript>