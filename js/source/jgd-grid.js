/**
 * File jgd-grid.js.
 *
 * This script adds extra options to control the theme layout
 * It is used with jgd-material-grid.css
 * Copyright 2016-2019, Jason G. Designs
 *
 * License: GNU GPL, version 3
 */

 document.addEventListener('DOMContentLoaded', function () {

 	function gridSizes() {
 		var windowWidth = window.innerWidth;

		var pageContainer = document.querySelector( '.page article.page' );
    var wooPageContainer = document.querySelector( '.single-product .product' );
	 	var stickyContainers = document.querySelectorAll( '.blog .sticky, .archive .sticky' );
	 	var singlePostContainer = document.querySelector( '.single .post' );
	 	var commentsContainer = document.querySelector( '.single .comments-area' );
	 	var bodyTag = document.getElementsByTagName( 'body' )[0];
	 	var i;

 		if ( windowWidth >= 1280 ) {
 			//console.log( 'Window size is greater than 1280' );
			if ( document.body.contains( singlePostContainer ) ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					singlePostContainer.classList.add( 'three-fourths-centered-r' );
					singlePostContainer.classList.remove( 'two-by-two-centered-r' );
				}
			}

			// If body class contains "page" and doesn't contain "paged"
			if ( -1 !== bodyTag.className.indexOf( 'page' ) && -1 === bodyTag.className.indexOf( '-page' ) &&
					-1 === bodyTag.className.indexOf( 'paged' ) ) {
				if ( jgdGridParams.layouts === 'twobytwo' ) {
					pageContainer.classList.add( 'three-fourths-centered-r' );
					pageContainer.classList.remove( 'two-by-two-centered-r' );
          /*wooPageContainer.classList.add( 'three-fourths-centered-r' );
          wooPageContainer.classList.remove( 'two-by-two-centered-r' );*/
				}
			}

			for ( i = 0, len = stickyContainers.length; i < len; i++ ) {
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
 			//console.log( 'Window size is greater than 720' );
 			for ( i = 0, len = stickyContainers.length; i < len; i++ ) {
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
 			//console.log('Window size is less than 720');
 			for ( i = 0, len = stickyContainers.length; i < len; i++ ) {
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
