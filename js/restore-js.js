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
		var infPfArticlesNarrow = document.querySelectorAll( '.infinite-wrap .post.format-aside, .infinite-wrap .post.format-status, .infinite-wrap .post.format-link, .infinite-wrap .post.format-quote' );
		var infSearch = document.querySelectorAll( '.search .infinite-wrap .post, .search .infinite-wrap .page' );
		
		for ( var i = 0; i < infWrap.length; i++ ) {
			infWrap[i].classList.add( 'jgd-grid-wrap' );
		}
		
		if (windowWidth >= 1280) {
			
			for ( var i = 0; i < infArticles.length; i++ ) {
				if ( restoreJSParams.layouts === 'centered' ) {
					infArticles[i].classList.add( 'three-fourths-centered' );
					infArticles[i].classList.remove( 'two-by-two-centered' );
					infArticles[i].classList.remove( 'jgd-column-1' );
				} else if ( restoreJSParams.layouts === 'wide' ) {
					infArticles[i].classList.add( 'jgd-column-1' );
					infArticles[i].classList.remove( 'two-by-two-centered' );
					infArticles[i].classList.remove( 'three-fourths-centered' );
				} else {
					infArticles[i].classList.add( 'two-by-two-centered' );
					infArticles[i].classList.remove( 'three-fourths-centered' );
					infArticles[i].classList.remove( 'jgd-column-1' );
					//console.log(i);
				}
			}
			
			for ( var i = 0; i < infPfArticles.length; i++ ) {
				infPfArticles[i].classList.add( 'jgd-column-1' );
				infPfArticles[i].classList.remove( 'three-fourths-centered' );
				infPfArticles[i].classList.remove( 'two-by-two-centered' );
			}
			
			for ( var i = 0; i < infPfArticlesNarrow.length; i++ ) {
				if ( restoreJSParams.layouts === 'wide' ) {
					infPfArticlesNarrow[i].classList.add( 'jgd-column-1' );
					infPfArticlesNarrow[i].classList.remove( 'two-by-two-centered' );
					infPfArticlesNarrow[i].classList.remove( 'three-fourths-centered' );
				} else {
					infPfArticlesNarrow[i].classList.add( 'three-fourths-centered' );
					infPfArticlesNarrow[i].classList.remove( 'two-by-two-centered' );
					infPfArticlesNarrow[i].classList.remove( 'jgd-column-1' );
				}
			}
			
			for ( var i = 0; i < infSearch.length; i++ ) {
				infSearch[i].classList.add( 'three-fourths-centered' );
				infSearch[i].classList.remove( 'two-by-two-centered' );
				infSearch[i].classList.remove( 'jgd-column-1' );
			}
			
		} else if (windowWidth >= 720 && windowWidth <= 1279) {
			
			for ( var i = 0; i < infArticles.length; i++ ) {
				if ( restoreJSParams.layouts === 'wide' ) {
					infArticles[i].classList.add( 'jgd-column-1' );
					infArticles[i].classList.remove( 'three-fourths-centered' );
					infArticles[i].classList.remove( 'two-by-two-centered' );
				} else {
					infArticles[i].classList.add( 'three-fourths-centered' );
					infArticles[i].classList.remove( 'two-by-two-centered' );
					infArticles[i].classList.remove( 'jgd-column-1' );
				}
			}
			
		} else {
			
			for ( var i=0; i < infArticles.length; i++ ) {
				infArticles[i].classList.add( 'jgd-column-1' );
				infArticles[i].classList.remove( 'three-fourths-centered' );
				infArticles[i].classList.remove( 'two-by-two-centered' );
			}
			
		}
		
		return addJGDGrid;
	}
	
	function addSkrollrEffects() {
		var windowWidth = window.innerWidth;
		var infCard = document.querySelectorAll( '.home .infinite-wrap .post.format-standard, .home .infinite-wrap .post.format-link' );
		var infCardHeader = document.querySelectorAll( '.home .infinite-wrap .format-standard:not(.has-post-thumbnail) .entry-header' );
		var infCardContent = document.querySelectorAll( '.home .infinite-wrap .format-standard .entry-content' );
		var infCardFooter = document.querySelectorAll( '.home .infinite-wrap .format-standard .entry-footer' );
		var infCardPf = document.querySelectorAll( '.home .post.format-aside, .home .post.format-status, .home .post.format-link, .home .post.format-quote' );
		
		if ( document.body.classList.contains( 'skrollr-animate' ) ) {
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
					infCardHeader[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
					infCardHeader[infCardHeader.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
				
				for ( var i = 1; i < infCardContent.length; i++ ) {
					infCardContent[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-25%); opacity: 0' );
					infCardContent[i].setAttribute( 'data-144-center-center', 'transform: translateX(0%); opacity: 1.0' );
					infCardContent[infCardContent.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
				
				for ( var i = 1; i < infCardFooter.length; i++ ) {
					infCardFooter[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-12.5%); opacity: 0' );
					infCardFooter[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
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
	
	function throttledFuncs() {
		$( window ).scroll( $.throttle( 5000, addJGDGrid ) );
		console.log( 'addJGDGrid is throttled.' );
		$( window ).scroll( $.throttle( 1000, addSkrollrEffects ) );
	}
	
} )( jQuery );