/* jQuery script to control animate.css */

( function( $ ) { // opens document ready function

	var animationEnd = ( function( el ) {
		var animations = {
			'animation': 'animationend',
			'OAnimation': 'oAnimationEnd',
			'MozAnimation': 'mozAnimationEnd',
			'WebkitAnimation': 'webkitAnimationEnd',
		};

		for (var t in animations) {
			if (el.style[t] !== undefined) {
				return animations[t];
			}
		}
	} )( document.createElement( 'div' ) );
	var windowWidth = $( window ).width();

	// Shared global variables
	var searchForm = $( '#header-button-panel .searchform' );
	var sidebarButton = $( '.sidebar-toggle' );
	var menuItems = $( '.main-navigation ul li a' );
	var sidebarItems = $( '#secondary ul li a' );

	var preloadDiv = $( '#loader-wrapper' );
	var bodyDiv = $( 'body' );

	function animateSearchbar() {
		// Search
		var searchButton = $( '.search-toggle' );
		var searchIcon = $( '.search-icon .material-icons' );

		searchForm.addClass( 'animated' );

		// Since the icon was dynamically created, it must be searched from a parent object via event delegation
		$( '.searchform .search-icon' ).on( 'mouseenter', searchIcon, function() {
			$(this).find(searchIcon).addClass( 'animated rubberBand' ).one( animationEnd, function(e) {
				$(this).removeClass( 'animated rubberBand' );
				e.stopPropagation(); // Stop the current event (adding and removing classes) from bubbling up and hiding the parent searchform
			} );
		} );

		searchButton.on( 'click', function() {
			if ( searchForm.hasClass( 'toggled' ) ) {
				searchForm.addClass( 'fadeInRight' ).removeClass( 'hide' ).one( animationEnd, function() {
					searchForm.removeClass( 'fadeInRight' );
					//console.log(this);
				} );
				sidebarButton.addClass( 'fadeInRight' ).one( animationEnd, function() {
					sidebarButton.removeClass( 'fadeInRight' );
				} );
			} else {
				searchForm.addClass( 'fadeOutRight' ).removeClass( 'hide' ).one( animationEnd, function() {
					searchForm.addClass( 'hide' ).removeClass( 'fadeOutRight' );
					//console.log(this);
				} );
				sidebarButton.addClass( 'fadeOutRight' ).one( animationEnd, function() {
					sidebarButton.removeClass( 'fadeOutRight' );
				} );
			}
		} );
	}

	function animateMenu() {
		// Menus
		var windowWidth = $( window ).width();
		var mainMenu = $( '.main-navigation' );
		var menuButton = $( '.main-navigation .menu-toggle' );
		var menuDropdownButton = $( '.main-navigation .menu-down-arrow' );
		var menu = $( '.main-navigation .menu-down-arrow + ul' );
		var subMenuButton = $( '.main-navigation .children .menu-down-arrow' );
		var customSubMenuButton = $( '.main-navigation .sub-menu .menu-down-arrow' );
		var subMenu = $( '.main-navigation .menu-down-arrow + ul ul' );
		var mobileMenu = $( '#primary-menu .nav-menu' );
		var mobileSubmenu = $( '#primary-menu .nav-menu ul' );
		var mobileMenuCustom = $( 'ul.nav-menu' );
		var mobileSubmenuCustom = $( 'ul.nav-menu ul' );
		var subMenuItems = $( '.main-navigation ul ul a' );

		menu.addClass( 'animated' );
		menuDropdownButton.addClass( 'transitionHalfSec' );
		mobileMenu.addClass( 'animated' );
		mobileMenuCustom.addClass( 'animated' );

		if ( windowWidth >= 600 ) {
			// https://medium.com/@oscarmwana/toggling-animate-css-with-jquery-972415aa0a71
			menuDropdownButton.on( 'click', function() {
				// $(this) = button with .menu-down-arrow class; next() = the next item, represented by menu variable
				if ( $(this).next().hasClass( 'toggled-submenu' ) ) {
					$(this).next().addClass( 'fadeInUp' ).one( animationEnd, function() {
						$(this).removeClass( 'fadeInUp' );
						//console.log($(this));
					} );
				} else {
					$(this).next().addClass( 'fadeOutDown toggled-submenu' ).one( animationEnd, function() {
						$(this).removeClass( 'fadeOutDown toggled-submenu' ); // .toggled-submenu class must remain while animation is playing, then removed, otherwise the animation disappears immediately on second click
						//console.log($(this));
					} );
				}
				$(this).toggleClass( 'rotate180' );
			} );
		}

		if( windowWidth < 600 ) {
			menuButton.on( 'click', function() {
				if ( $(this).closest(mainMenu).hasClass( 'toggled' ) ) {
					$(this).closest( mainMenu ).find( mobileMenu ).addClass( 'slideInLeft' ).removeClass( 'hide' ).one( animationEnd, function() {
						$(this).removeClass( 'slideInLeft' );
					});
					mobileSubmenu.removeClass( 'animated slideInLeft slideOutLeft' );
				} else {
					$(this).closest( mainMenu ).find( mobileMenu ).addClass( 'slideOutLeft' ).removeClass( 'hide' ).one( animationEnd, function() {
						$(this).addClass( 'hide' ).removeClass( 'slideOutLeft' );
					});
					mobileSubmenu.removeClass( 'animated slideInLeft slideOutLeft' );
				}

				if ( $(this).closest( mainMenu ).hasClass( 'toggled' ) ) {
					$(this).closest( mainMenu ).find( mobileMenuCustom ).addClass( 'slideInLeft' ).removeClass( 'hide' ).one( animationEnd, function() {
						$(this).removeClass( 'slideInLeft' );
					} );
					mobileSubmenuCustom.removeClass( 'animated slideInLeft slideOutLeft' );
				} else {
					$(this).closest( mainMenu ).find( mobileMenuCustom ).addClass( 'slideOutLeft' ).removeClass( 'hide' ).one( animationEnd, function() {
						$(this).addClass( 'hide' ).removeClass( 'slideOutLeft' );
					} );
					mobileSubmenuCustom.removeClass( 'animated slideInLeft slideOutLeft' );
				}
			} );
		}
	}

	function animateSidebar() {
		// Sidebar
		var sidebarPanel = $( '#secondary' );

		sidebarButton.addClass( 'animated' );
		sidebarPanel.addClass('animated');

		sidebarButton.on( 'click', function () {
			if ( $(this).hasClass( 'toggled' ) ) {
				sidebarPanel.addClass( 'slideInRight' ).removeClass( 'hide' ).one( animationEnd, function() {
					sidebarPanel.removeClass( 'slideInRight' );
				} );
			} else {
				sidebarPanel.addClass( 'slideOutRight' ).removeClass( 'hide' ).one( animationEnd, function() {
					sidebarPanel.addClass( 'hide' ).removeClass( 'slideOutRight' );
				} );
			}
		} );
	}

	var commentTextarea = $( '.comment-form-comment' );
	var commentAuthor = $( '.comment-form-author' );
	var commentEmail = $( '.comment-form-email' );
	var commentUrl = $( '.comment-form-url' );

	var commentLabel = $( '.comment-form-comment label' );
	var commentAuthorLabel = $( '.comment-form-author label' );
	var commentEmailLabel = $( '.comment-form-email label' );
	var commentUrlLabel = $( '.comment-form-url label' );

	commentLabel.addClass( 'animated' );
	commentAuthorLabel.addClass( 'animated' );
	commentEmailLabel.addClass( 'animated' );
	commentUrlLabel.addClass( 'animated' );

	function animateFormLabels(formElement, formLabel) {
		/* Animates labels inside form elements */
		formElement.on( 'focusin', function() {
			formLabel.addClass( 'fadeOutLeft' ).removeClass( 'fadeInLeft' );
			formElement.addClass( 'isActive' );
		} );

		formElement.on( 'focusout', function() {
			formLabel.removeClass( 'fadeOutLeft' ).addClass( 'fadeInLeft' );
			formElement.removeClass( 'isActive' );
		} );
	}

	function animateCboxSlides() {
		/* For animations between Colorbox slides */
		var colorboxNext = $( '#cboxNext' );
		var colorboxPrevious = $( '#cboxPrevious' );
		var colorboxContent = $( '#cboxLoadedContent' );

		$( 'body.attachment.colorbox' ).removeClass( 'animated fadeIn' );

		colorboxNext.on( 'click', function() {
			$( '#cboxLoadedContent' ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$( '#cboxLoadedContent' ).removeClass( 'animated fadeIn' );
			} );
		} );

		colorboxPrevious.on( 'click', function() {
			$( '#cboxLoadedContent' ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$( '#cboxLoadedContent' ).removeClass( 'animated fadeIn' );
			} );
		} );
	}

	// Global variables for the slide animations
	var gallery1 = $( '#gallery-1' );
	var gallery2 = $( '#gallery-2' );
	var gallery3 = $( '#gallery-3' );
	var gallery4 = $( '#gallery-4' );
	var gallery5 = $( '#gallery-5' );
	var gallery6 = $( '.wp-block-gallery:nth-of-type(1)' );
	var gallery7 = $( '.wp-block-gallery:nth-of-type(2)' );
	var gallery8 = $( '.wp-block-gallery:nth-of-type(3)' );
	var gallery9 = $( '.wp-block-gallery:nth-of-type(4)' );
	var gallery10 = $( '.wp-block-gallery:nth-of-type(5)' );

	var slides1 = $( '.single.slider #gallery-1 .gallery-item' );
	var slides2 = $( '.single.slider #gallery-2 .gallery-item' );
	var slides3 = $( '.single.slider #gallery-3 .gallery-item' );
	var slides4 = $( '.single.slider #gallery-4 .gallery-item' );
	var slides5 = $( '.single.slider #gallery-5 .gallery-item' );
	var slides6 = $( '.single.slider .wp-block-gallery:nth-of-type(1) .blocks-gallery-item' );
	var slides7 = $( '.single.slider .wp-block-gallery:nth-of-type(2) .blocks-gallery-item' );
	var slides8 = $( '.single.slider .wp-block-gallery:nth-of-type(3) .blocks-gallery-item' );
	var slides9 = $( '.single.slider .wp-block-gallery:nth-of-type(4) .blocks-gallery-item' );
	var slides10 = $( '.single.slider .wp-block-gallery:nth-of-type(5) .blocks-gallery-item' );

	var nextBtn1 = $( '#gallery-1 + .slider-button-panel .slider-next' );
	var nextBtn2 = $( '#gallery-2 + .slider-button-panel .slider-next' );
	var nextBtn3 = $( '#gallery-3 + .slider-button-panel .slider-next' );
	var nextBtn4 = $( '#gallery-4 + .slider-button-panel .slider-next' );
	var nextBtn5 = $( '#gallery-5 + .slider-button-panel .slider-next' );
	var nextBtn6 = $( '.wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-next' );
	var nextBtn7 = $( '.wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-next' );
	var nextBtn8 = $( '.wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-next' );
	var nextBtn9 = $( '.wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-next' );
	var nextBtn10 = $( '.wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-next' );

	var previousBtn1 = $( '#gallery-1 + .slider-button-panel .slider-previous' );
	var previousBtn2 = $( '#gallery-2 + .slider-button-panel .slider-previous' );
	var previousBtn3 = $( '#gallery-3 + .slider-button-panel .slider-previous' );
	var previousBtn4 = $( '#gallery-4 + .slider-button-panel .slider-previous' );
	var previousBtn5 = $( '#gallery-5 + .slider-button-panel .slider-previous' );
	var previousBtn6 = $( '.wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-previous' );
	var previousBtn7 = $( '.wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-previous' );
	var previousBtn8 = $( '.wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-previous' );
	var previousBtn9 = $( '.wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-previous' );
	var previousBtn10 = $( '.wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-previous' );

	var slideshowBtn1 = $( '#gallery-1 + .slider-button-panel .slider-startshow' );
	var slideshowBtn2 = $( '#gallery-2 + .slider-button-panel .slider-startshow' );
	var slideshowBtn3 = $( '#gallery-3 + .slider-button-panel .slider-startshow' );
	var slideshowBtn4 = $( '#gallery-4 + .slider-button-panel .slider-startshow' );
	var slideshowBtn5 = $( '#gallery-5 + .slider-button-panel .slider-startshow' );
	var slideshowBtn6 = $( '.wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-startshow' );
	var slideshowBtn7 = $( '.wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-startshow' );
	var slideshowBtn8 = $( '.wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-startshow' );
	var slideshowBtn9 = $( '.wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-startshow' );
	var slideshowBtn10 = $( '.wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-startshow' );

	function animateSlide(btn, gallery, slides, counter) {
		btn.on( 'click', function() {
			gallery.find( slides[ counter.value() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animated fadeIn' );
			} );
				//console.log(counter.value());
				//console.log($(this));
			gallery.find( slides[ counter.value() - 1 ] ).addClass( 'animated fadeOut' ).removeClass( 'hide' ).one( animationEnd, function() {
				//console.log($(this));
				$(this).removeClass( 'animated fadeOut' ).addClass( 'hide' );
			} );
		} );
	}

	function animateSlideshow(slideshowBtn, gallery, slideItems, counter) {
		var isPlaying = false;
		var currentIndex = counter.value();
		var slideInterval;

		function startAnimation() {
			isPlaying = true;
			slideInterval = window.setInterval(fadeSlide, 5000);
		}

		function fadeSlide() {
			console.log(currentIndex++);
			gallery.find( slideItems[currentIndex] ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				console.log($(this));
				$(this).prev().removeClass( 'animated fadeIn' );
			} );
			gallery.find( slideItems[currentIndex - 1] ).addClass( 'animated fadeOut' ).removeClass( 'hide' ).one( animationEnd, function() {
				console.log($(this));
				$(this).removeClass( 'animated fadeOut' ).addClass( 'hide' );
			} );

			if ( slideItems[currentIndex + 1] === slideItems[currentIndex.length] ) {
				clearInterval( slideInterval );
			}
		}

		function pauseAnimation() {
			isPlaying = false;
			clearInterval( slideInterval );
		}

		slideshowBtn.on( 'click', function() {
			if (isPlaying === false) {
				startAnimation();
				console.log('The slideshow animation is playing.');
			} else {
				pauseAnimation();
				//clearInterval( setInterval );
				console.log('The slideshow animation is not playing.');
			}
		} );
	}

	function addMaterialInk() {
		/* Add .material-ripple class to auto-generated WordPress HTML, including menus */

		$( menuItems ).addClass( 'material-ripple' );
		$( sidebarItems ).addClass( 'material-ripple' );
		$( 'button:not(.menu-down-arrow), input[type="button"], .wp-block-button__link' ).addClass( 'material-ripple' );
	}

	if ($( 'body' ).hasClass( 'animate' )) {
		$( window ).on( 'load', function() {
			preloadDiv.hide();
			bodyDiv.addClass( 'animated fadeIn' );
			animateSearchbar();
			animateMenu();
			animateSidebar();

			animateFormLabels(commentTextarea, commentLabel);
			animateFormLabels(commentAuthor, commentAuthorLabel);
			animateFormLabels(commentEmail, commentEmailLabel);
			animateFormLabels(commentUrl, commentUrlLabel);

			animateSlide(nextBtn1, gallery1, slides1, counter0);
			animateSlide(previousBtn1, gallery1, slides1, counter0);

			animateSlide(nextBtn2, gallery2, slides2, counter1);
			animateSlide(previousBtn2, gallery2, slides2, counter1);

			animateSlide(nextBtn3, gallery3, slides3, counter2);
			animateSlide(previousBtn3, gallery3, slides3, counter2);

			animateSlide(nextBtn4, gallery4, slides4, counter3);
			animateSlide(previousBtn4, gallery4, slides4, counter3);

			animateSlide(nextBtn5, gallery5, slides5, counter4);
			animateSlide(previousBtn1, gallery1, slides1, counter0);

			animateSlide(nextBtn6, gallery6, slides6, counter5);
			animateSlide(previousBtn6, gallery6, slides6, counter5);

			animateSlide(nextBtn7, gallery7, slides7, counter6);
			animateSlide(previousBtn7, gallery7, slides7, counter6);

			animateSlide(nextBtn8, gallery8, slides8, counter7);
			animateSlide(previousBtn8, gallery8, slides8, counter7);

			animateSlide(nextBtn9, gallery9, slides9, counter8);
			animateSlide(previousBtn9, gallery9, slides9, counter8);

			animateSlide(nextBtn10, gallery10, slides10, counter9);
			animateSlide(previousBtn10, gallery10, slides10, counter9);

			animateSlideshow(slideshowBtn1, gallery1, slides1, counter0);
			animateSlideshow(slideshowBtn2, gallery2, slides2, counter1);
			animateSlideshow(slideshowBtn3, gallery3, slides3, counter2);
			animateSlideshow(slideshowBtn4, gallery4, slides4, counter3);
			animateSlideshow(slideshowBtn5, gallery5, slides5, counter4);
			animateSlideshow(slideshowBtn6, gallery6, slides6, counter5);
			animateSlideshow(slideshowBtn7, gallery7, slides7, counter6);
			animateSlideshow(slideshowBtn8, gallery8, slides8, counter7);
			animateSlideshow(slideshowBtn9, gallery9, slides9, counter8);
			animateSlideshow(slideshowBtn10, gallery10, slides10, counter9);

			//animateSlideshows();
			animateCboxSlides();
			addMaterialInk();
		} );

		$( window ).on( 'resize', function() {
			var timeOut = setTimeout( function() { // Delay rendering/event so that event doesn't fire multiple times
				animateMenu();
			}, 250 );

			if ( timeOut != null ) {
				clearTimeout( timeOut );
			}
		} );
	}

	//}

} )( jQuery );
