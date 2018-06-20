/**
 * File jgd-grid.js.
 *
 * This script adds extra options to control the theme layout
 * It is used with jgd-material-grid.css
 * License: GPLv3
 */
 
 document.addEventListener('DOMContentLoaded', function () {
 
 	function gridSizes() {
 		var windowWidth = window.innerWidth;

		var pageContainer = document.querySelector( '.page article.page' );
	 	var stickyContainers = document.querySelectorAll( '.blog .sticky, .archive .sticky' );
	 	var singlePostContainer = document.querySelector( '.single .post' );
	 	var commentsContainer = document.querySelector( '.single .comments-area' );
	 	var bodyTag = document.getElementsByTagName( 'body' )[0];

 		if ( windowWidth >= 1280 ) {
 			//console.log( 'Window size is greater than 1280' );
			if ( document.body.contains( singlePostContainer ) ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					singlePostContainer.classList.add( 'three-fourths-centered-r' );
					singlePostContainer.classList.remove( 'two-by-two-centered-r' );
				}
			}
			
			// if .page is found, but .paged is not found
			if ( 	-1 !== bodyTag.className.indexOf( 'page' ) &&
					-1 === bodyTag.className.indexOf( 'paged' ) ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					pageContainer.classList.add( 'three-fourths-centered-r' );
					pageContainer.classList.remove( 'two-by-two-centered-r' );
				}
			}
			
			for ( var i = 0, len = stickyContainers.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					stickyContainers[i].classList.add( 'two-by-two-centered-r' );
					stickyContainers[i].classList.remove( 'three-fourths-centered-r' );
					stickyContainers[i].classList.remove( 'jgd-column-1' );
				}
			}
			
			if ( jgdGridParams.layouts === 'wide' && commentsContainer ) {
				commentsContainer.classList.add( 'jgd-column-1' );
				commentsContainer.classList.remove( 'three-fourths-centered-r' );
			}
 		} else if ( windowWidth <= 1279 && windowWidth >= 720 ) {
 			console.log( 'Window size is greater than 720' );
 			for ( var i = 0, len = stickyContainers.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					stickyContainers[i].classList.add( 'three-fourths-centered-r' );
					stickyContainers[i].classList.remove( 'jgd-column-1' );
					stickyContainers[i].classList.remove( 'two-by-two-centered-r' );
				}
			}
			
			if ( jgdGridParams.layouts === 'wide' && commentsContainer ) {
				commentsContainer.classList.add( 'jgd-column-1' );
				commentsContainer.classList.remove( 'three-fourths-centered-r' );
			}
 		} else {
 			console.log('Window size is less than 720');
 			for ( var i = 0, len = stickyContainers.length; i < len; i++ ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					stickyContainers[i].classList.add( 'jgd-column-1' );
					stickyContainers[i].classList.remove( 'three-fourths-centered-r' );
					stickyContainers[i].classList.remove( 'two-by-two-centered-r' );
				}
			}
			
			if ( jgdGridParams.layouts === 'wide' && commentsContainer ) {
				commentsContainer.classList.add( 'jgd-column-1' );
				commentsContainer.classList.remove( 'three-fourths-centered-r' );
			}
 		}
 	}
 	
 	var gSTimeout = setTimeout( gridSizes, 100 );
 	
	window.onload = gridSizes;
	window.onresize = gridSizes;
 
 });