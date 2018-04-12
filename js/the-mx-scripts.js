/**
 * File the-mx-scripts.js.
 *
 * Extra scripts for navigation, video sizing controls, animations, etc.
 * Licenses for the scripts are GPLv3 or compatible
 */
 
(function() {


	/* Toggle sidebar script */
	
	var container, toggleButton, sidebar, chevronLeft, chevronRight;
	
	container = document.getElementById( 'content' );
	if ( ! container ) {
		return;
	}
	
	toggleButton = document.getElementById( 'sidebar-button' );
	
	sidebar = document.getElementById( 'secondary' );
	
	// Create chevron logo elements
	chevronLeft = document.createElement( 'i' );
	cLeftContent = document.createTextNode( 'chevron_left' );
	chevronLeft.appendChild(cLeftContent);
	chevronLeft.classList.add( 'material-icons' );
	
	chevronRight = document.createElement( 'i' );
	cRightContent = document.createTextNode( 'chevron_right' );
	chevronRight.appendChild(cRightContent);
	chevronRight.classList.add( 'material-icons' );
	
	// Hide sidebar toggle button if menu is empty and return early.
	// first check if sidebar shows up in the theme; if the element with id #secondary exists (is contained) in the body
	if ( document.body.contains( sidebar ) ) {
	
		if ( 'undefined' === typeof sidebar ) {
			toggleButton.style.display = 'none';
			return;
		}
		
		sidebar.setAttribute( 'aria-expanded', 'false' );
		
		// set initial menu state here, instead of CSS file, in case JavaScript is turned off in browser.
		sidebar.style.display = 'none';
		toggleButton.appendChild(chevronLeft);
		
		toggleButton.onclick = function() {
			if ( -1 !== container.className.indexOf( 'toggled' ) ) {
				container.className = container.className.replace( ' toggled', '' );
				toggleButton.className = toggleButton.className.replace( ' toggled', '' );
				toggleButton.setAttribute( 'aria-expanded', 'false' );
				sidebar.setAttribute( 'aria-expanded', 'false' );
				sidebar.style.display = 'none';
				toggleButton.appendChild(chevronLeft);
				toggleButton.removeChild(chevronRight);
			} else {
				container.className += ' toggled';
				toggleButton.className += ' toggled';
				toggleButton.setAttribute( 'aria-expanded', 'true' );
				sidebar.setAttribute( 'aria-expanded', 'true' );
				sidebar.style.display = 'flex';
				toggleButton.removeChild(chevronLeft);
				toggleButton.appendChild(chevronRight);
			}
		}
	
	}
	
	
	/* Toggle search bar with button */
	
	var searchToggleButton, searchField, searchContainer, headerPanel;
	
	headerPanel = document.getElementById( 'header-button-panel' );
	
	
	if ( document.body.contains( headerPanel ) ) { // check if headerPanel exists
		
		// Create and add searchToggleButton to header button panel
		searchToggleButton = document.createElement( 'button' );
		searchIcon = document.createElement( 'i' );
		sIconContent = document.createTextNode( 'search' );
		
		headerPanel.appendChild(searchToggleButton);
		searchToggleButton.appendChild(searchIcon);
		searchToggleButton.classList.add( 'search-toggle' );
		
		searchIcon.appendChild(sIconContent);
		searchIcon.classList.add( 'material-icons' );
		
		
		// Get the first instance of searchform (class) within .header-button-panel
		searchContainer = document.getElementById( 'header-button-panel' ).getElementsByClassName( 'searchform' )[0];
		
		toggleSearch = document.getElementById( 'header-button-panel' ).getElementsByClassName( 'search-toggle' )[0];
		
		searchField = document.getElementsByClassName( 'search-field' )[0];
		
		// Set initial search field state here, instead of CSS file, in case JavaScript is turned off in browser.
		searchContainer.setAttribute( 'aria-expanded', 'false' );
		searchContainer.style.display = 'none';
		
		// Toggle search field
		toggleSearch.onclick = function() {
			if ( -1 !== searchContainer.className.indexOf( 'toggled' ) ) {
				searchContainer.className = searchContainer.className.replace( ' toggled', '' );
				searchContainer.style.display = 'none';
				searchContainer.setAttribute( 'aria-expanded', 'false' );
			} else {
				searchContainer.className += ' toggled';
				searchContainer.style.display = 'flex';
				searchContainer.setAttribute( 'aria-expanded', 'true' );
			}
		}
	
	}
	
	
	/* Add buttons to the navigation menu */
	
	// setup variables
	var windowWidth = window.innerWidth;
	//var menuListItem = document.querySelectorAll( '.main-navigation ul li' );
	var hasChildren = document.querySelectorAll( '.main-navigation .page_item_has_children' );
	var hasChildrenLink = document.querySelectorAll( '.main-navigation .page_item_has_children > a' );
	var customHasChildren = document.querySelectorAll( '.main-navigation .menu-item-has-children' );
	var customHasChildrenLink = document.querySelectorAll( '.main-navigation .menu-item-has-children > a' );
	
	if ( windowWidth >= 600 ) {
		
		// For custom menus
		for ( var i = 0; i < customHasChildren.length; i++ ) {
			//console.log( customHasChildrenLink[i].parentNode );
			//console.log( customHasChildrenLink[i] );
			// Add button HTML after each link that has the class .menu-item-has-children
			customHasChildrenLink[i].insertAdjacentHTML( 'afterend', '<button class="menu-down-arrow"><i class="material-icons">arrow_drop_down</i></button>' );
		}
		
		// For page menu fallback
		for ( var i2 = 0; i2 < hasChildren.length; i2++ ) {
			//console.log( hasChildrenLink[i2].parentNode );
			//console.log( hasChildrenLink[i2] );
			// Add button HTML after each link that has the class .page_item_has_children
			hasChildrenLink[i2].insertAdjacentHTML( 'afterend', '<button class="menu-down-arrow"><i class="material-icons">arrow_drop_down</i></button>' );
		}
		
		/* The code below roughly follows the Vanilla JS method in the article "Lose the jQuery Bloat" */
		/* https://www.sitepoint.com/dom-manipulation-with-nodelist-js/ */
		// loop through each element that has .sub-menu
		var customSubmenuButton = document.querySelectorAll( '.main-navigation .menu-down-arrow' );
		for ( var iSub = 0, customSubmenuButton; iSub < customSubmenuButton.length; iSub++ ) {
			// Add click event to the button to show ul.sub-menu
			customSubmenuButton[iSub].addEventListener( 'click', function() {
				// this refers to the current loop iteration of customSubmenuButton
				// nextElementSibling refers to the neighboring ul with .sub-menu class
				if ( this.nextElementSibling.className.indexOf( 'toggled-submenu' ) !== -1 ) { // if .sub-menu has .toggled-submenu class
					this.nextElementSibling.className = this.nextElementSibling.className.replace( ' toggled-submenu', '' ); // remove it
					this.nextElementSibling.setAttribute( 'aria-expanded', 'false' );
					//console.log( 'button.' + this.className + ' is not toggled' );
				} else {
					this.nextElementSibling.className += ' toggled-submenu'; // otherwise, add it
					this.nextElementSibling.setAttribute( 'aria-expanded', 'true' );
				}
					//console.log( 'button.' + this.className + ' is toggled' );
			} );
		} // ends for loop
		console.log( customSubmenuButton[iSub] );
		
	}


	/* For skroller.js effects */
	
	var galleryItem = document.querySelectorAll( '.blog .gallery-item' );
	var entryTitle = document.querySelectorAll( '.home .format-gallery .entry-title, .home .format-image:not(.has-post-thumbnail) .entry-title, .home .format-audio .entry-title, .home .format-video .entry-title, .archive .format-gallery .entry-title, .archive .format-image:not(.has-post-thumbnail) .entry-title, .archive .format-audio .entry-title, .archive .format-video .entry-title' );
	var entryTitleSingle = document.querySelector( '.single .format-gallery .entry-title, .single .format-image .entry-title' );
	var entryTitlePage = document.querySelector( '.page .format-gallery .entry-title' );
	var card = document.querySelectorAll( '.home .post.format-standard, .home .post.format-link' );
	var cardPf = document.querySelectorAll( '.home .post.format-aside, .home .post.format-status, .home .post.format-link, .home .post.format-quote' );
	var cardHeader = document.querySelectorAll( '.home .format-standard:not(.has-post-thumbnail) .entry-header' );
	var cardContent = document.querySelectorAll( '.home .format-standard .entry-content' );
	var cardFooter = document.querySelectorAll( '.home .format-standard .entry-footer' );
	
	// If skrollr animations are checked in the customizer, the class skrollr-animate is added to the body via functions.php
	 // Slide in each post part when scrolling to center
	
	if ( document.body.classList.contains( 'skrollr-animate' ) ) {
		// For article "cards"
		if ( mxSkrollrParams.layout_type === 'centered' ) {
			for ( var i = 1; i < card.length; i++ ) {
				card[i].setAttribute( 'data-0-bottom-center', 'opacity: 0' );
				card[i].setAttribute( 'data--200-bottom-center', 'opacity: 1.0' );
				card[card.length - 1].setAttribute( 'data-0-bottom-center', 'opacity: 1.0' );
			}
			
			for ( var i = 0; i < cardPf.length; i++ ) {
				cardPf[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-50%); opacity: 0' );
				cardPf[i].setAttribute( 'data-center-center', 'transform: translateX(0%); opacity: 1.0' );
				cardPf[cardPf.length - 1].setAttribute( 'data-0-bottom-center', 'translateX(0%); opacity: 1.0' );
			}
			
			for ( var i = 1; i < cardHeader.length; i++ ) {
				cardHeader[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-50%); opacity: 0' );
				cardHeader[i].setAttribute( 'data-center-center', 'transform: translateX(0%); opacity: 1.0' );
				cardHeader[cardHeader.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
			}
			
			for ( var i = 1; i < cardContent.length; i++ ) {
				cardContent[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-50%); opacity: 0' );
				cardContent[i].setAttribute( 'data-center-center', 'transform: translateX(0%); opacity: 1.0' );
				cardContent[cardContent.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
			}
			
			for ( var i = 1; i < cardFooter.length; i++ ) {
				cardFooter[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-50%); opacity: 0' );
				cardFooter[i].setAttribute( 'data-center-center', 'transform: translateX(0%); opacity: 1.0' );
				cardFooter[cardFooter.length - 1].setAttribute( 'data-0-bottom-center', 'transform: translateX(0%); opacity: 1.0' );
			}
		} else if (mxSkrollrParams.layout_type === 'twobytwo') {
			for ( var i = 1; i < card.length; i++ ) {
				card[i].setAttribute( 'data-0-bottom-top', 'opacity: 0' );
				card[i].setAttribute( 'data-0-bottom-center', 'opacity: 1.0' );
				card[card.length - 1].setAttribute( 'data-0-bottom-center', 'opacity: 1.0' );
			}
			
			for ( var i = 0; i < cardPf.length; i++ ) {
				cardPf[i].setAttribute( 'data-0-bottom-center', 'transform: translateX(-50%); opacity: 0' );
				cardPf[i].setAttribute( 'data-center-center', 'transform: translateX(0%); opacity: 1.0' );
			}
		} else {
		
		}
		
		// Gallery animations
		
		// Loop through each gallery-item
		// Multiply node list position by 50 to position first gallery-item div; add addition 50 pixels to reveal opacity on each div per each 50 pixel downward scroll
		
		for ( var i = 0; i < galleryItem.length; i++ ) {
			// fade-in of gallery images
			galleryItem[i].setAttribute( 'data--' + (i * 50) + '-bottom', 'opacity: 0' );
			galleryItem[i].setAttribute( 'data--' + ((i * 50) + 50) + '-bottom', 'opacity: 1.0' );
		}
		
		// Titles
		for ( var i = 0; i < entryTitle.length; i++ ) {
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
	}
	
	
	/* For slider option in the Customizer */
	
	// Supports up to five galleries
	
	// Setup variables
	var gallery = document.querySelectorAll('.single.slider .gallery');
	
	var galleries = [	document.querySelector('.single.slider #gallery-1'),
							document.querySelector('.single.slider #gallery-2'),
							document.querySelector('.single.slider #gallery-3'),
							document.querySelector('.single.slider #gallery-4'),
							document.querySelector('.single.slider #gallery-5') ];
	
	var slides = [ 	document.querySelectorAll('.single.slider #gallery-1 .gallery-item'),
							document.querySelectorAll('.single.slider #gallery-2 .gallery-item'),
							document.querySelectorAll('.single.slider #gallery-3 .gallery-item'),
							document.querySelectorAll('.single.slider #gallery-4 .gallery-item'),
							document.querySelectorAll('.single.slider #gallery-5 .gallery-item') ];
	
	function hideFirstSlide() {
		
		// slides[0] = first location of the array in the slides variable, slides[1] = second, etc.
		// slides[0][0] = first slide inside of the first array
		
		for (var iGal = 0, len = galleries.length; iGal < len; iGal++) {
			//console.log('number of galleries: ' + iGal);
			for (var jSlide = 0, len = slides.length; jSlide < len; jSlide++) {
				//console.log('number of slides within gallery: ' + slides[jSlide].length); // for debugging
				//console.log(slides[0][0]); // for debugging
				
				// We must loop over each slide when using querySelectorAll
				for (var kEachSlide = 0; kEachSlide < slides[jSlide].length; kEachSlide++) {
					//console.log(slides[jSlide].length); // Number of slides within current selected query
					
					// Hide all slides within each slides array;
					if (slides[0][kEachSlide]) {
						slides[0][kEachSlide].classList.add('hide');
					}
					if (slides[1][kEachSlide]) {
						slides[1][kEachSlide].classList.add('hide');
					}
					if (slides[2][kEachSlide]) {
						slides[2][kEachSlide].classList.add('hide');
					}
					if (slides[3][kEachSlide]) {
						slides[3][kEachSlide].classList.add('hide');
					}
					if (slides[4][kEachSlide]) {
						slides[4][kEachSlide].classList.add('hide');
					}
					
					// Show first slide within each slides array
					if (slides[0][0]) {
						slides[0][0].classList.remove('hide');
					}
					if (slides[1][0]) {
						slides[1][0].classList.remove('hide');
					}
					if (slides[2][0]) {
						slides[2][0].classList.remove('hide');
					}
					if (slides[3][0]) {
						slides[3][0].classList.remove('hide');
					}
					if (slides[4][0]) {
						slides[4][0].classList.remove('hide');
					}
				}
			}
		}
	}
	
	window.onload = hideFirstSlide();
	
	for (var i = 0, len = gallery.length; i < len; i++) {
		// Add slider controls to each gallery
		gallery[i].insertAdjacentHTML('afterend', '<div class="slider-button-panel"><button class="slider-previous"></button><button class="slider-startshow">Start Slideshow</button><button class="slider-next"></button></div>');
		//console.log(gallery.length);
	}
	
	var sliderButtonPrevious = document.querySelectorAll('.single.slider .slider-previous');
	var sliderButtonNext = document.querySelectorAll('.single.slider .slider-next');
	
	// Variables that are defined after our dynamically created buttons/panel
	var buttonPanel = document.querySelectorAll('.single.slider .slider-button-panel');
	
	var sliderNext = [	document.querySelector('.single.slider #gallery-1 + .slider-button-panel .slider-next'),
								document.querySelector('.single.slider #gallery-2 + .slider-button-panel .slider-next'),
								document.querySelector('.single.slider #gallery-3 + .slider-button-panel .slider-next'),
								document.querySelector('.single.slider #gallery-4 + .slider-button-panel .slider-next'),
								document.querySelector('.single.slider #gallery-5 + .slider-button-panel .slider-next') ];
								
	var sliderPrevious = [	document.querySelector('.single.slider #gallery-1 + .slider-button-panel .slider-previous'),
									document.querySelector('.single.slider #gallery-2 + .slider-button-panel .slider-previous'),
									document.querySelector('.single.slider #gallery-3 + .slider-button-panel .slider-previous'),
									document.querySelector('.single.slider #gallery-4 + .slider-button-panel .slider-previous'),
									document.querySelector('.single.slider #gallery-5 + .slider-button-panel .slider-previous') ];
	
	// Hide any galleries and button panels that are more than five;
	// for this we start the counter at 4
	for (var i = 5, len = gallery.length; i < len; i++) {
		//console.log(gallery[i]);
		gallery[i].classList.add('hide');
	}
	
	for (var i = 5, len = buttonPanel.length; i < len; i++) {
		//console.log(buttonPanel[i]);
		buttonPanel[i].classList.add('hide');
	}
	
	// Some of the articles and tutorials consulted for these functions are:
	// Understand JavaScript Closures With Ease- http://javascriptissexy.com/understand-javascript-closures-with-ease/
	// Make a Simple JavaScript Slideshow without jQuery- https://www.sitepoint.com/make-a-simple-javascript-slideshow-without-jquery/
	
	// Next slide function
	function showSlide(obj) {
		var counter = 0;
		return {
			showNext: function() {
				counter++;
				if (counter === obj.length) {
					counter = obj.length - 1;
				}
				console.log('Next slide: ' + counter);
				return counter;
			},
			showPrevious: function() {
				counter--;
				if (counter < 0) {
					counter = 0;
				}
				console.log('Previous slide: ' + counter);
				return counter;
			}
		}
	}
	
	// Show each subsequent slide one at a time by clicking the next and previous buttons
	// checking if each button exists on the page first
	function addClickEvents() {
		var currentSlide1 = showSlide(slides[0]);
		var currentSlide2 = showSlide(slides[1]);
		var currentSlide3 = showSlide(slides[2]);
		var currentSlide4 = showSlide(slides[3]);
		var currentSlide5 = showSlide(slides[4]);
		
		var slides1Length = slides[0].length - 1;
		
		if (sliderNext[0]) {
			sliderNext[0].addEventListener('click', function() {
				slides[0][currentSlide1.showPrevious()].classList.add('hide');
				slides[0][currentSlide1.showNext()].classList.remove('hide');
				slides[0][currentSlide1.showNext()];
			});
		}
		if (sliderNext[1]) {
			sliderNext[1].addEventListener('click', function () {
				slides[1][currentSlide2.showPrevious()].classList.add('hide');
				slides[1][currentSlide2.showNext()].classList.remove('hide');
				slides[1][currentSlide2.showNext()];
			});
		}
		if (sliderNext[2]) {
			sliderNext[2].addEventListener('click', function () {
				slides[2][currentSlide3.showPrevious()].classList.add('hide');
				slides[2][currentSlide3.showNext()].classList.remove('hide');
				slides[2][currentSlide3.showNext()];
			});
		}
		if (sliderNext[3]) {
			sliderNext[3].addEventListener('click', function () {
				slides[3][currentSlide4.showPrevious()].classList.add('hide');
				slides[3][currentSlide4.showNext()].classList.remove('hide');
				slides[3][currentSlide4.showNext()];
			});
		}
		if (sliderNext[4]) {
			sliderNext[4].addEventListener('click', function () {
				slides[4][currentSlide5.showPrevious()].classList.add('hide');
				slides[4][currentSlide5.showNext()].classList.remove('hide');
				slides[4][currentSlide5.showNext()];
			});
		}
		
		if (sliderPrevious[0]) {
			sliderPrevious[0].addEventListener('click', function() {
				slides[0][currentSlide1.showPrevious()].classList.remove('hide');
				slides[0][currentSlide1.showNext()].classList.add('hide');
				slides[0][currentSlide1.showPrevious()];
			});
		}
		if (sliderPrevious[1]) {
			sliderPrevious[1].addEventListener('click', function () {
				slides[1][currentSlide2.showPrevious()].classList.remove('hide');
				slides[1][currentSlide2.showNext()].classList.add('hide');
				slides[1][currentSlide2.showPrevious()];
			});
		}
		if (sliderPrevious[2]) {
			sliderPrevious[2].addEventListener('click', function () {
				slides[2][currentSlide3.showPrevious()].classList.remove('hide');
				slides[2][currentSlide3.showNext()].classList.add('hide');
				slides[2][currentSlide3.showPrevious()];
			});
		}
		if (sliderPrevious[3]) {
			sliderPrevious[3].addEventListener('click', function () {
				slides[3][currentSlide4.showPrevious()].classList.remove('hide');
				slides[3][currentSlide4.showNext()].classList.add('hide');
				slides[3][currentSlide4.showPrevious()];
			});
		}
		if (sliderPrevious[4]) {
			sliderPrevious[4].addEventListener('click', function () {
				slides[4][currentSlide5.showPrevious()].classList.remove('hide');
				slides[4][currentSlide5.showNext()].classList.add('hide');
				slides[4][currentSlide5.showPrevious()];
			});
		}
	}
	window.onload = addClickEvents();
	
})();