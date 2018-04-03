/**
 * File reload-js.js. Mixed jQuery/JavaScript file
 *
 * Restores this theme's JavaScripts with Jetpack Infinite Scroll.
 */
 
( function ( $ ) { 
	
	//$( window ).scroll( $.throttle( 250, addJGDGrid ) );
	$( document.body ).on( 'post-load', throttledFuncs );
	$( document.body ).on( 'post-load', function () { 
		skrollr.get().refresh();
	} );
	//$( document.body ).on( 'post-load', addSkrollrEffects );
	
	function addJGDGrid() {
		var windowWidth = window.innerWidth;
		var infWrap = document.querySelectorAll( '.infinite-wrap' );
		var infArticles = document.querySelectorAll( '.infinite-wrap .post' );
		var infPfArticles = document.querySelectorAll( '.infinite-wrap .post.format-gallery, .infinite-wrap .post.format-image, .infinite-wrap .post.format-audio, .infinite-wrap .post.format-video' );
		var infPfArticlesNarrow = document.querySelectorAll( '.infinite-wrap .post.format-aside, .infinite-wrap .post.format-status, .infinite-wrap .post.format-link, .infinite-wrap .post.format-quote, .search .infinite-wrap .post, .search .infinite-wrap .page' );
		
		for ( var i = 0; i < infWrap.length; i++ ) {
			infWrap[i].classList.add( 'jgd-grid-wrap' );
		}
		
		if (windowWidth >= 1280) {
			
			for ( var i = 0; i < infArticles.length; i++ ) {
				if ( restoreJSParams.layouts === 'centered' ) {
					infArticles[i].classList.add( 'three-fourths-centered' );
					infArticles[i].classList.remove( 'two-by-two-centered' );
					infArticles[i].classList.remove( 'column-1' );
				} else {
					infArticles[i].classList.add( 'two-by-two-centered' );
					infArticles[i].classList.remove( 'three-fourths-centered' );
					infArticles[i].classList.remove( 'column-1' );
					//console.log(i);
				}
			}
			
			for ( var i = 0; i < infPfArticles.length; i++ ) {
				infPfArticles[i].classList.add( 'column-1' );
				infPfArticles[i].classList.remove( 'three-fourths-centered' );
				infPfArticles[i].classList.remove( 'two-by-two-centered' );
			}
			
			for ( var i = 0; i < infPfArticlesNarrow.length; i++ ) {
				infPfArticlesNarrow[i].classList.add( 'three-fourths-centered' );
				infPfArticlesNarrow[i].classList.remove( 'two-by-two-centered' );
				infPfArticlesNarrow[i].classList.remove( 'column-1' );
			}
			
		} else if (windowWidth >= 720 && windowWidth <= 1279) {
			
			for ( var i = 0; i < infArticles.length; i++ ) {
				infArticles[i].classList.add( 'three-fourths-centered' );
				infArticles[i].classList.remove( 'two-by-two-centered' );
				infArticles[i].classList.remove( 'column-1' );
			}
			
		} else {
			
			for ( var i=0; i < infArticles.length; i++ ) {
				infArticles[i].classList.add( 'column-1' );
				infArticles[i].classList.remove( 'three-fourths-centered' );
				infArticles[i].classList.remove( 'two-by-two-centered' );
			}
			
		}
		
		return addJGDGrid;
	}
	
	function addSkrollrEffects() {
		var windowWidth = window.innerWidth;
		var enableSkrollr = mxSkrollrParams.enable_skrollr;
		
		if ( enableSkrollr ) {
			var infGalleryWrap = document.querySelectorAll( '.home .infinite-wrap .gallery' );
			var infGalleryItem = document.querySelectorAll( '.home .infinite-wrap .gallery-item' );
			var infEntryTitle = document.querySelectorAll( '.home .infinite-wrap .format-gallery .entry-title, .infinite-wrap .format-image:not(.has-post-thumbnail) .entry-title, .infinite-wrap .format-audio .entry-title, .infinite-wrap .format-video .entry-title' );
			
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
	
	function throttledFuncs() {
		$( window ).scroll( $.throttle( 5000, addJGDGrid ) );
		console.log( 'addJGDGrid is throttled.' );
		$( window ).scroll( $.throttle( 1000, addSkrollrEffects ) );
	}
	
} )( jQuery );