var bodyTag;

function skrollrDataAttributes() {
	/* For skroller.js effects */
		var bodyTag = document.body;
		
		var windowWidth = window.innerWidth;
		var windowHeight = window.innerHeight;
		
		var galleryItem = document.querySelectorAll( '.blog .gallery-item' );
		var entryTitle = document.querySelectorAll( '.blog .format-gallery .entry-title, .blog .format-image:not(.has-post-thumbnail) .entry-title, .blog .format-audio .entry-title, .blog .format-video .entry-title, .archive .format-gallery .entry-title, .archive .format-image:not(.has-post-thumbnail) .entry-title, .archive .format-audio .entry-title, .archive .format-video .entry-title' );
		var entryTitleSingle = document.querySelector( '.single .format-gallery .entry-title, .single .format-image .entry-title' );
		var entryTitlePage = document.querySelector( '.page .format-gallery .entry-title' );
		var card = document.querySelectorAll( '.blog .post.format-standard, .blog .post.format-link' );
		var cardPf = document.querySelectorAll( '.blog .post.format-aside, .blog .post.format-status, .blog .post.format-link, .blog .post.format-quote' );
		var cardHeader = document.querySelectorAll( '.blog .format-standard:not(.has-post-thumbnail) .entry-header' );
		var cardContent = document.querySelectorAll( '.blog .format-standard .entry-content, .blog .format-standard .entry-summary' );
		var cardFooter = document.querySelectorAll( '.blog .format-standard .entry-footer' );
		var i;
		
		if ( bodyTag.classList.contains( 'skrollr-animate' ) ) {
			// Slide in each post part when scrolling to center
				
			// For article "cards"
			if ( mxSkrollrParams.layout_type === 'centered' || mxSkrollrParams.layout_type === 'wide' ) {
				//if ( windowWidth ) {
				for ( i = 1; i < card.length; i++ ) {
					card[i].setAttribute( 'data-0-bottom-center', 'opacity: 0' );
					card[i].setAttribute( 'data--200-bottom-center', 'opacity: 1.0' );
					card[card.length - 1].setAttribute( 'data-0-bottom-center', 'opacity: 1.0' );
				}
				
				for ( i = 0; i < cardPf.length; i++ ) {
					cardPf[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-25%); opacity: 0' );
					cardPf[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
					cardPf[cardPf.length - 1].setAttribute( 'data-0-bottom-center', 'translateX(0%); opacity: 1.0' );
				}
				
				for ( i = 1; i < cardHeader.length; i++ ) {
					cardHeader[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-12.5%); opacity: 0' );
					if ( windowHeight < 769 ) {
						cardHeader[i].setAttribute( 'data-144-center-center', 'transform: translate(0%); opacity: 1.0' );
					} else {
						cardHeader[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
					}
					cardHeader[cardHeader.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
				
				for ( i = 1; i < cardContent.length; i++ ) {
					cardContent[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-25%); opacity: 0' );
					cardContent[i].setAttribute( 'data-144-center-center', 'transform: translateX(0%); opacity: 1.0' );
					cardContent[cardContent.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
				
				for ( i = 1; i < cardFooter.length; i++ ) {
					cardFooter[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-12.5%); opacity: 0' );
					if ( windowHeight < 769 ) {
						cardFooter[i].setAttribute( 'data-144-center-center', 'transform: translate(0%); opacity: 1.0' );
					} else {
						cardFooter[i].setAttribute( 'data-288-center-center', 'transform: translateX(0%); opacity: 1.0' );
					}
					cardFooter[cardFooter.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
			} else if ( mxSkrollrParams.layout_type === 'twobytwo' ) {
				for ( i = 1; i < card.length; i++ ) {
					card[i].setAttribute( 'data-0-bottom-top', 'opacity: 0' );
					card[i].setAttribute( 'data-0-bottom-center', 'opacity: 1.0' );
					card[card.length - 1].setAttribute( 'data-0-bottom-top', 'opacity: 1.0' );
				}
				
				for ( i = 0; i < cardPf.length; i++ ) {
					cardPf[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-50%); opacity: 0' );
					cardPf[i].setAttribute( 'data-center-center', 'transform: translateX(0%); opacity: 1.0' );
					cardPf[cardPf.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
				}
			} else {
				// Do nothing;
			}
			
		// Gallery animations
		
		// Loop through each gallery-item
		// Multiply node list position by 50 to position first gallery-item div; add addition 50 pixels to reveal opacity on each div per each 50 pixel downward scroll
		
		for ( i = 0; i < galleryItem.length; i++ ) {
			// fade-in of gallery images
			galleryItem[i].setAttribute( 'data--' + (i * 50) + '-bottom', 'opacity: 0' );
			galleryItem[i].setAttribute( 'data--' + ((i * 50) + 50) + '-bottom', 'opacity: 1.0' );
		}
		
		// Titles
		for ( i = 0; i < entryTitle.length; i++ ) {
			// Fade-in and letter spacing shrink of entry titles on home or blog page
			entryTitle[i].setAttribute( 'data-0-bottom-center', 'opacity: 0' );
			entryTitle[i].setAttribute( 'data-0-center-center', 'opacity: 1.0' );
			if ( windowWidth >= 1280 ) {
				entryTitle[i].setAttribute( 'data-0-bottom-center', 'opacity: 0; letter-spacing: 0.5em' );
				entryTitle[i].setAttribute( 'data-0-center-center', 'opacity: 1.0; letter-spacing: 0em' );
			}
		}
		
		if ( document.body.contains( entryTitleSingle ) ) {
			entryTitleSingle.setAttribute( 'data-0-top-top', 'opacity: 0; letter-spacing: 0.5em' );
			entryTitleSingle.setAttribute( 'data-100-top-top', 'opacity: 1.0; letter-spacing: 0em' );
		}
		
		if ( document.body.contains( entryTitlePage ) ) {
			entryTitlePage.setAttribute( 'data-0-top-top', 'opacity: 0; letter-spacing: 0.5em' );
			entryTitlePage.setAttribute( 'data-100-top-top', 'opacity: 1.0; letter-spacing: 0em' );
		}
		//console.log('Skrollr animations are loaded');
	}
}

document.addEventListener( 'DOMContentLoaded', skrollrDataAttributes );
