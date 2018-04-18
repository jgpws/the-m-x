document.addEventListener('DOMContentLoaded', function () {
	// Code goes here
	
	// Add grid classes to WP elements based on screen size
	
	// Get all article elements with the class .post
	articles = document.querySelectorAll( '.blog .post, .archive .post' );
	galleryContainers = document.querySelectorAll( '.blog .post.format-gallery, .archive .post.format-gallery' );
	imageContainers = document.querySelectorAll( '.blog .post.format-image, .archive .post.format-image' );
	audioContainers = document.querySelectorAll( '.blog .post.format-audio, .archive .post.format-audio' );
	videoContainers = document.querySelectorAll( '.blog .post.format-video, .archive .post.format-video' );
	pfContainers = document.querySelectorAll( '.blog .post.format-aside, .archive .post.format-aside, .blog .post.format-status, .archive .post.format-status, .blog .post.format-link, .archive .post.format-link, .blog .post.format-quote, .archive .post.format-quote' );
	singlePostContainer = document.querySelector( '.single .post' );
	commentsContainer = document.querySelector( '.single .comments-area' );
	attachmentPostContainer = document.querySelector( '.single .attachment' );
	pageContainer = document.querySelector( '.page article.page' );
	searchContainers = document.querySelectorAll( '.search .post, .search .page' );
	errorContainer = document.querySelector( '.error404 .error-404' );
	stickyContainers = document.querySelectorAll( '.blog .sticky, .archive .sticky' );
	bodyTag = document.getElementsByTagName( 'body' );
	//imgGridContainers = document.querySelectorAll( '.blog .tile, .archive .tile' );
	
	function gridSizes() {
		var windowWidth = window.innerWidth;
		
		if (windowWidth >= 1280) {
			// Add class for grid two columns to articles
			
			for ( var i = 0, len = articles.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'centered' ) {
					articles[i].classList.add( 'three-fourths-centered' );
					articles[i].classList.remove( 'two-by-two-centered' );
					articles[i].classList.remove( 'jgd-column-1' );
				} else if ( jgdGridParams.layouts === 'wide' ) {
					articles[i].classList.add( 'jgd-column-1' );
					articles[i].classList.remove( 'two-by-two-centered' );
					articles[i].classList.remove( 'three-fourths-centered' );
				} else {
					articles[i].classList.add( 'two-by-two-centered' );
					articles[i].classList.remove( 'three-fourths-centered' );
					articles[i].classList.remove( 'jgd-column-1' );
				}
			}
			
			for ( var i = 0, len = searchContainers.length; i < len; i++ ) {
				searchContainers[i].classList.add( 'three-fourths-centered' );
				searchContainers[i].classList.remove( 'two-by-two-centered' );
				searchContainers[i].classList.remove( 'jgd-column-1' );
			}
			
			for ( var i = 0, len = galleryContainers.length; i < len; i++ ) {
				galleryContainers[i].classList.add( 'jgd-column-1' );
				galleryContainers[i].classList.remove( 'two-by-two-centered' );
				galleryContainers[i].classList.remove( 'three-fourths-centered' );
			}
			
			for ( var i = 0, len = imageContainers.length; i < len; i++ ) {
				imageContainers[i].classList.add( 'jgd-column-1' );
				imageContainers[i].classList.remove( 'two-by-two-centered' );
				imageContainers[i].classList.remove( 'three-fourths-centered' );
			}
			
			for ( var i = 0, len = audioContainers.length; i < len; i++ ) {
				audioContainers[i].classList.add( 'jgd-column-1' );
				audioContainers[i].classList.remove( 'two-by-two-centered' );
				audioContainers[i].classList.remove( 'three-fourths-centered' );
			}
			
			for ( var i = 0, len = videoContainers.length; i < len; i++ ) {
				videoContainers[i].classList.add( 'jgd-column-1' );
				videoContainers[i].classList.remove( 'two-by-two-centered' );
				videoContainers[i].classList.remove( 'three-fourths-centered' );
			}
			
			for ( var i = 0, len = pfContainers.length; i < len; i++ ) {
				pfContainers[i].classList.add( 'three-fourths-centered' );
				pfContainers[i].classList.remove( 'two-by-two-centered' );
				pfContainers[i].classList.remove( 'jgd-column-1' );
			}
			
			for ( var i = 0, len = stickyContainers.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'wide' ) {
					stickyContainers[i].classList.add( 'jgd-column-1' );
					stickyContainers[i].classList.remove( 'three-fourths-centered' );
					stickyContainers[i].classList.remove( 'two-by-two-centered' );
				} else {
					stickyContainers[i].classList.add( 'three-fourths-centered' );
					stickyContainers[i].classList.remove( 'two-by-two-centered' );
					stickyContainers[i].classList.remove( 'jgd-column-1' );
				}
			}

			// if body tag contains string ".single"; this check is needed otherwise the script breaks on non-single pages
			if ( -1 !== bodyTag[0].className.indexOf( 'single' ) ) {
				if ( document.body.contains( singlePostContainer ) ) {
					if ( jgdGridParams.layouts === 'wide' ) {
						singlePostContainer.classList.add( 'jgd-column-1' );
						singlePostContainer.classList.remove( 'three-fourths-centered' );
					} else {
						singlePostContainer.classList.add( 'three-fourths-centered' );
						singlePostContainer.classList.remove( 'jgd-column-1' );
					}
				}
			}
			
			// if .page is found, but .paged is not found
			if ( 	-1 !== bodyTag[0].className.indexOf( 'page' ) &&
					-1 === bodyTag[0].className.indexOf( 'paged' ) ) {
				if ( jgdGridParams.layouts === 'wide' ) {
					pageContainer.classList.add( 'jgd-column-1' );
					pageContainer.classList.remove( 'three-fourths-centered' );
				} else {
					pageContainer.classList.add( 'three-fourths-centered' );
					pageContainer.classList.remove( 'jgd-column-1' );
				}
			}
			
			if ( -1 !== bodyTag[0].className.indexOf( 'error404' ) ) {
				if ( document.body.contains( errorContainer ) ) {
					errorContainer.classList.add( 'three-fourths-centered' );
					errorContainer.classList.remove( 'jgd-column-1' );
				}
			}
			//console.log( 'The window is greater than 1280px.' );

		} else if (windowWidth >= 720 && windowWidth <= 1279) {
			// Add class for grid three fourths centered to articles
			
			// loop through each article with class .post and add/remove grid classes
			for (var i = 0, len = articles.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'wide' ) {
					articles[i].classList.remove( 'two-by-two-centered' );
					articles[i].classList.add( 'jgd-column-1' );
					articles[i].classList.remove( 'three-fourths-centered' );
				} else {
					articles[i].classList.remove( 'two-by-two-centered' );
					articles[i].classList.add( 'three-fourths-centered' );
					articles[i].classList.remove( 'jgd-column-1' );
				}
			}
			
			for ( var i = 0, len = searchContainers.length; i < len; i++ ) {
				searchContainers[i].classList.add( 'three-fourths-centered' );
				searchContainers[i].classList.remove( 'two-by-two-centered' );
				searchContainers[i].classList.remove( 'jgd-column-1' );
			}
			
			// if body tag contains string ".single"; this check is needed otherwise the script breaks on non-single pages
			if ( -1 !== bodyTag[0].className.indexOf( 'single' ) ) {
				if ( document.body.contains( singlePostContainer ) ) {
					if ( jgdGridParams.layouts === 'wide' ) {
						singlePostContainer.classList.add( 'jgd-column-1' );
						singlePostContainer.classList.remove( 'three-fourths-centered' );
					} else {
						singlePostContainer.classList.add( 'three-fourths-centered' );
						singlePostContainer.classList.remove( 'jgd-column-1' );
					}
				}
			}
			
			// if .page is found, but .paged is not found
			if ( 	-1 !== bodyTag[0].className.indexOf( 'page' ) &&
					-1 === bodyTag[0].className.indexOf( 'paged' ) ) {
				pageContainer.classList.add( 'three-fourths-centered' );
			}
			
			if ( -1 !== bodyTag[0].className.indexOf( 'error404' ) ) {
				if ( document.body.contains( errorContainer ) ) {
					errorContainer.classList.add( 'three-fourths-centered' );
					errorContainer.classList.remove( 'jgd-column-1' );
				}
			}
			console.log( 'The window is greater than 720px.' );
	
		} else  {
			for ( var i = 0, len = articles.length; i < len; i++ ) {
				articles[i].classList.add( 'jgd-column-1' );
				articles[i].classList.remove( 'three-fourths-centered' );
				articles[i].classList.remove( 'two-by-two-centered' );
			}
			
			for ( var i = 0, len = searchContainers.length; i < len; i++ ) {
				searchContainers[i].classList.add(
 'jgd-column-1' );
				searchContainers[i].classList.remove( 'two-by-two-centered' );
				searchContainers[i].classList.remove( 'three-fourths-centered' );
			}
			
			if ( -1 !== bodyTag[0].className.indexOf( 'single' ) ) {
				if ( document.body.contains( singlePostContainer ) ) {
					singlePostContainer.classList.add( 'jgd-column-1' );
					singlePostContainer.classList.remove( 'three-fourths-centered' );
				}
			}
			
			// if .page is found, but .paged is not found
			if ( 	-1 !== bodyTag[0].className.indexOf( 'page' ) &&
					-1 === bodyTag[0].className.indexOf( 'paged' ) ) {
				pageContainer.classList.add( 'jgd-column-1' );
				pageContainer.classList.remove( 'three-fourths-centered' );
			}
			
			if ( -1 !== bodyTag[0].className.indexOf( 'single' ) ) {
				if ( commentsContainer !== null ) {
					commentsContainer.classList.add( 'jgd-column-1' );
					//commentsContainer.classList.remove( 'three-fourths-centered' );
				}
			}
			//console.log( 'The window is less than 720px' );
		}
	}
	
	window.onload = gridSizes;
	window.onresize = gridSizes;
	
});