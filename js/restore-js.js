/**
 * File restore-js.js. Mixed jQuery/JavaScript file
 *
 * Restores this theme's JavaScripts with Jetpack Infinite Scroll.
 */

( function ( $ ) {
	
	$( document.body ).on( 'post-load', addJGDGrid );
	$( document.body ).on( 'post-load', addSkrollrEffects );
	$( document.body ).on( 'post-load', function() {
		skrollr.get().refresh();
	} );
	
	var windowWidth = window.innerWidth;
	var windowHeight = window.innerHeight;
	
	function addJGDGrid() {
		var infSearch = document.querySelectorAll( '.search .infinite-wrap .post, .search .infinite-wrap .page' );
		var infStickyArticles = document.querySelectorAll( '.infinite-wrap .post.sticky' );
		
		/*for ( var i = 0; i < infWrap.length; i++ ) {
			infWrap[i].classList.add( 'jgd-grid-wrap' );
			console.log(infWrap);
		}*/
		
		if ( windowWidth >= 1280 ) {
			for ( var i = 0; i < infStickyArticles.length; i++ ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					infStickyArticles[i].classList.add( 'two-by-two-centered-r' );
					infStickyArticles[i].classList.remove( 'three-fourths-centered-r' );
					infStickyArticles[i].classList.remove( 'jgd-column-1' );
				}
			}
		} else if ( windowWidth <= 1279 && windowWidth >= 720 ) {
			for ( var i = 0, len = infStickyArticles.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					infStickyArticles[i].classList.add( 'three-fourths-centered-r' );
					infStickyArticles[i].classList.remove( 'jgd-column-1' );
					infStickyArticles[i].classList.remove( 'two-by-two-centered-r' );
				}
			}
		} else {
			for ( var i = 0, len = infStickyArticles.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					infStickyArticles[i].classList.add( 'jgd-column-1' );
					infStickyArticles[i].classList.remove( 'three-fourths-centered-r' );
					infStickyArticles[i].classList.remove( 'two-by-two-centered-r' );
				}
			}
		}
		
		return addJGDGrid;
	}

	function addSkrollrEffects() {
		//var windowWidth = window.innerWidth;
		console.log('addSkrollrEffects is loaded');
		
		var infCardHeader = document.querySelectorAll( '.home .infinite-wrap .format-standard:not(.has-post-thumbnail) .entry-header' );
		var infCardContent = document.querySelectorAll( '.home .infinite-wrap .format-standard .entry-content, .home .infinite-wrap .format-standard .entry-summary' );
		var infCardFooter = document.querySelectorAll( '.home .infinite-wrap .format-standard .entry-footer' );
		var infCardPf = document.querySelectorAll( '.home .post.format-aside, .home .post.format-status, .home .post.format-link, .home .post.format-quote' );
		
		if ( document.body.classList.contains( 'skrollr-animate' ) ) {
			var infCard = document.querySelectorAll( '.home .infinite-wrap .post.format-standard, .home .infinite-wrap .post.format-link' );
			var infGalleryWrap = document.querySelectorAll( '.home .infinite-wrap .gallery' );
			var infGalleryItem = document.querySelectorAll( '.home .infinite-wrap .gallery-item' );
			var infEntryTitle = document.querySelectorAll( '.home .infinite-wrap .format-gallery .entry-title, .infinite-wrap .format-image:not(.has-post-thumbnail) .entry-title, .infinite-wrap .format-audio .entry-title, .infinite-wrap .format-video .entry-title' );
			
			if ( restoreJSParams.layouts === 'centered' || restoreJSParams.layouts === 'wide' ) {
				for ( var i = 1; i < infCard.length; i++ ) {
					infCard[i].setAttribute( 'data-0-bottom-center', 'opacity: 0' );
					infCard[i].setAttribute( 'data--200-bottom-center', 'opacity: 1.0' );
					infCard[infCard.length - 1].setAttribute( 'data-0-bottom-center', 'opacity: 1.0' );
				}
				
				for ( var i = 0; i < infCardPf.length; i++ ) {
					infCardPf[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-25%); opacity: 0' );
					infCardPf[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
					infCardPf[infCardPf.length - 1].setAttribute( 'data-0-bottom-center', 'translateX(0%); opacity: 1.0' );
				}
				
				for ( var i = 1; i < infCardHeader.length; i++ ) {
					infCardHeader[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-12.5%); opacity: 0' );
					
					if ( windowWidth < 769 ) {
						infCardHeader[i].setAttribute( 'data-144-center-center', 'transform: translateX(0%); opacity: 1.0' );
					} else {
						infCardHeader[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
					}
					infCardHeader[infCardHeader.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
				
				for ( var i = 1; i < infCardContent.length; i++ ) {
					infCardContent[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-25%); opacity: 0' );
					infCardContent[i].setAttribute( 'data-144-center-center', 'transform: translateX(0%); opacity: 1.0' );
					infCardContent[infCardContent.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
				
				for ( var i = 1; i < infCardFooter.length; i++ ) {
					infCardFooter[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-12.5%); opacity: 0' );
					if ( windowHeight < 769 ) {
						infCardFooter[i].setAttribute( 'data-144-center-center', 'transform: translateX(0%); opacity: 1.0' );
					} else {
						infCardFooter[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
					}
					infCardFooter[infCardFooter.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
			}
			
			// Gallery animations
			for ( var i = 0; i < infGalleryItem.length; i++ ) {
				// fade-in of gallery images
				infGalleryItem[i].setAttribute( 'data--' + (i * 50) + '-bottom', 'opacity: 0' );
				infGalleryItem[i].setAttribute( 'data--' + ((i * 50) + 50) + '-bottom', 'opacity: 1.0' );
			}
			
			for ( var i = 0; i < infEntryTitle.length; i++ ) {
				infEntryTitle[i].setAttribute( 'data-0-bottom-center', 'opacity: 0' );
				infEntryTitle[i].setAttribute( 'data-0-center-center', 'opacity: 1.0' );
				if ( windowWidth >= 1280 ) {
					infEntryTitle[i].setAttribute( 'data-0-bottom-center', 'opacity: 0; letter-spacing: 0.5em' );
					infEntryTitle[i].setAttribute( 'data-0-center-center', 'opacity: 1.0; letter-spacing: 0em' );
				}
			}
		}
		
		return addSkrollrEffects;
	}
	
	/*function throttledFuncs() {
		$( window ).scroll( $.throttle( 200, addJGDGrid ) );
		console.log( 'addJGDGrid is throttled.' );
		$( window ).scroll( $.throttle( 1000, addSkrollrEffects ) );
	}*/

} )( jQuery );