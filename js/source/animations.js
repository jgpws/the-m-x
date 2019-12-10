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
	
	function animateFormLabels() {
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
		
		commentTextarea.on( 'focusin', function() {
			commentLabel.addClass( 'fadeOutLeft' ).removeClass( 'fadeInLeft' );
			commentTextarea.addClass( 'isActive' );
		} );
		
		commentTextarea.on( 'focusout', function() { 
			commentLabel.removeClass( 'fadeOutLeft' ).addClass( 'fadeInLeft' );
			commentTextarea.removeClass( 'isActive' );
		} );
		
		commentAuthor.on( 'focusin', function() {
			commentAuthorLabel.addClass( 'fadeOutLeft' ).removeClass( 'fadeInLeft' );
			commentAuthor.addClass( 'isActive' );
		} );
		
		commentAuthor.on( 'focusout', function() { 
			commentAuthorLabel.removeClass( 'fadeOutLeft' ).addClass( 'fadeInLeft' );
			commentAuthor.removeClass( 'isActive' );
		} );
		
		commentEmail.on( 'focusin', function() {
			commentEmailLabel.addClass( 'fadeOutLeft' ).removeClass( 'fadeInLeft' );
			commentEmail.addClass( 'isActive' );
		} );
		
		commentEmail.on( 'focusout', function() { 
			commentEmailLabel.removeClass( 'fadeOutLeft' ).addClass( 'fadeInLeft' );
			commentEmail.removeClass( 'isActive' );
		} );
		
		commentUrl.on( 'focusin', function() {
			commentUrlLabel.addClass( 'fadeOutLeft' ).removeClass( 'fadeInLeft' );
			commentUrl.addClass( 'isActive' );
		} );
		
		commentUrl.on( 'focusout', function() { 
			commentUrlLabel.removeClass( 'fadeOutLeft' ).addClass( 'fadeInLeft' );
			commentUrl.removeClass( 'isActive' );
		} );
	}
	
	function animateCboxSlides() {
		// For animations between Colorbox slides
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
	
	function countSlides( obj ) {
		var counter = 0;
		return {
			increase: function() {
				counter++;
				if ( counter === obj.length ) {
					counter = obj.length - 1;
				}
				//console.log( counter );
				return counter;
			},
			decrease: function() {
				counter--;
				if ( counter < 0 ) {
					counter = 0;
				}
				//console.log(counter);
				return counter;
			}
		};
	}
	
	// Global variables for the slide animations
	var slides1 = $( '.single.slider #gallery-1 .gallery-item' );
	var slides2 = $( '.single.slider #gallery-2 .gallery-item' );
	var slides3 = $( '.single.slider #gallery-3 .gallery-item' );
	var slides4 = $( '.single.slider #gallery-4 .gallery-item' );
	var slides5 = $( '.single.slider #gallery-5 .gallery-item' );
	
	var gallery1 = $( '#gallery-1' );
	var gallery2 = $( '#gallery-2' );
	var gallery3 = $( '#gallery-3' );
	var gallery4 = $( '#gallery-4' );
	var gallery5 = $( '#gallery-5' );
	
	var currentSlide1 = countSlides( slides1 );
	var currentSlide2 = countSlides( slides2 );
	var currentSlide3 = countSlides( slides3 );
	var currentSlide4 = countSlides( slides4 );
	var currentSlide5 = countSlides( slides5 );
	
	function animateSlidesOnclick() {
		// Gallery with Slider animations between slides when clicking next/previous buttons
		var nextBtn1 = $( '#gallery-1 + .slider-button-panel .slider-next' );
		var nextBtn2 = $( '#gallery-2 + .slider-button-panel .slider-next' );
		var nextBtn3 = $( '#gallery-3 + .slider-button-panel .slider-next' );
		var nextBtn4 = $( '#gallery-4 + .slider-button-panel .slider-next' );
		var nextBtn5 = $( '#gallery-5 + .slider-button-panel .slider-next' );
		
		var previousBtn1 = $( '#gallery-1 + .slider-button-panel .slider-previous' );
		var previousBtn2 = $( '#gallery-2 + .slider-button-panel .slider-previous' );
		var previousBtn3 = $( '#gallery-3 + .slider-button-panel .slider-previous' );
		var previousBtn4 = $( '#gallery-4 + .slider-button-panel .slider-previous' );
		var previousBtn5 = $( '#gallery-5 + .slider-button-panel .slider-previous' );
		
		nextBtn1.on( 'click', function() {
			gallery1.find( slides1[ currentSlide1.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animated fadeIn' );
				//console.log($(this));
			} );
			//console.log(currentSlide1);
		} );
		
		nextBtn2.on( 'click', function() {
			gallery2.find( slides2[ currentSlide2.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animated fadeIn' );
				//console.log($(this));
			} );
			//console.log(currentSlide2);
		} );
		
		nextBtn3.on( 'click', function() {
			gallery3.find( slides3[ currentSlide3.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animated fadeIn' );
				//console.log($(this));
			} );
			//console.log(currentSlide3);
		} );
		
		nextBtn4.on( 'click', function() {
			gallery4.find( slides4[ currentSlide4.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animated fadeIn' );
				//console.log($(this));
			} );
			//console.log(currentSlide4);
		} );
		
		nextBtn5.on( 'click', function() {
			gallery5.find( slides5[ currentSlide5.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animated fadeIn' );
				//console.log($(this));
			} );
			//console.log(currentSlide5);
		} );
		
		previousBtn1.on( 'click', function() {
			gallery1.find( slides1[ currentSlide1.decrease() ] ).next().addClass( 'animated fadeIn' ).one( animationEnd, function(){
				$(this).removeClass( 'animation fadeIn' );
			} );
		} );
		
		previousBtn2.on( 'click', function() {
			gallery2.find( slides2[ currentSlide2.decrease() ] ).next().addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animation fadeIn' );
			} );
		} );
		
		previousBtn3.on( 'click', function() {
			gallery3.find( slides3[ currentSlide3.decrease() ] ).next().addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animation fadeIn' );
			} );
		} );
		
		previousBtn4.on( 'click', function() {
			gallery4.find( slides4[ currentSlide4.decrease() ] ).next().addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animation fadeIn' );
			} );
		} );
		
		previousBtn5.on( 'click', function() {
			gallery5.find( slides5[ currentSlide5.decrease() ] ).next().addClass( 'animated fadeIn' ).one( animationEnd, function() {
				$(this).removeClass( 'animation fadeIn' );
			} );
		} );
	}
	
	function animateSlideshows() {
		var startShwBtn1 = $( '#gallery-1 + .slider-button-panel .slider-startshow' );
		var startShwBtn2 = $( '#gallery-2 + .slider-button-panel .slider-startshow' );
		var startShwBtn3 = $( '#gallery-3 + .slider-button-panel .slider-startshow' );
		var startShwBtn4 = $( '#gallery-4 + .slider-button-panel .slider-startshow' );
		var startShwBtn5 = $( '#gallery-5 + .slider-button-panel .slider-startshow' );
		
		var sliderBtnPanel = $( '.slider-button-panel' );
		var galleryItm = $( '.gallery-item' );
		
		var fadeSlide1;
		var fadeSlide2;
		var fadeSlide3;
		var fadeSlide4;
		var fadeSlide5;
		var isPlaying = false;
		
		startShwBtn1.on( 'click', function() {
			var that = $(this);
			if ( isPlaying === false ) {
				isPlaying = true;
				fadeSlide1 = setInterval( function() {
					gallery1.find( slides1[ currentSlide1.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function(){
						that.closest( sliderBtnPanel ).prev().find( galleryItm ).next().removeClass( 'animated fadeIn' );
					} );
					that.closest( sliderBtnPanel ).prev().find( galleryItm ).last().removeClass( 'animated fadeIn' );
					//console.log(isPlaying);
				}, 5000 );
			} else {
				isPlaying = false;
				clearInterval( fadeSlide1 );
				//console.log( isPlaying );
			}
		} );
		
		startShwBtn2.on( 'click', function() {
			var that = $(this);
			if ( isPlaying === false ) {
				isPlaying = true;
				fadeSlide2 = setInterval( function() {
					gallery2.find( slides2[ currentSlide2.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function(){
						that.closest( sliderBtnPanel ).prev().find( galleryItm ).next().removeClass( 'animated fadeIn' );
					} );
					that.closest( sliderBtnPanel ).prev().find( galleryItm ).last().removeClass( 'animated fadeIn' );
					//console.log(isPlaying);
				}, 5000 );
			} else {
				isPlaying = false;
				clearInterval( fadeSlide2 );
				//console.log(isPlaying);
			}
		} );
		
		startShwBtn3.on( 'click', function() {
			var that = $(this);
			if ( isPlaying === false ) {
				isPlaying = true;
				fadeSlide3 = setInterval( function() {
					gallery3.find( slides3[ currentSlide3.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function(){
						that.closest( sliderBtnPanel ).prev().find( galleryItm ).next().removeClass( 'animated fadeIn' );
					} );
					that.closest( sliderBtnPanel ).prev().find( galleryItm ).last().removeClass( 'animated fadeIn' );
					//console.log(isPlaying);
				}, 5000 );
			} else {
				isPlaying = false;
				clearInterval( fadeSlide3 );
				//console.log(isPlaying);
			}
		} );
		
		startShwBtn4.on( 'click', function() {
			var that = $(this);
			if ( isPlaying === false ) {
				isPlaying = true;
				fadeSlide4 = setInterval( function() {
					gallery4.find( slides4[ currentSlide4.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function(){
						that.closest( sliderBtnPanel ).prev().find( galleryItm ).next().removeClass( 'animated fadeIn' );
					} );
					that.closest( sliderBtnPanel ).prev().find( galleryItm ).last().removeClass( 'animated fadeIn' );
					//console.log(isPlaying);
				}, 5000 );
			} else {
				isPlaying = false;
				clearInterval( fadeSlide4 );
				//console.log(isPlaying);
			}
		} );
		
		startShwBtn5.on( 'click', function() {
			var that = $(this);
			if ( isPlaying === false ) {
				isPlaying = true;
				fadeSlide5 = setInterval( function() {
					gallery5.find( slides5[ currentSlide5.increase() ] ).addClass( 'animated fadeIn' ).one( animationEnd, function(){
						that.closest( sliderBtnPanel ).prev().find( galleryItm ).next().removeClass( 'animated fadeIn' );
					} );
					that.closest( sliderBtnPanel ).prev().find( galleryItm ).last().removeClass( 'animated fadeIn' );
					//console.log(isPlaying);
				}, 5000 );
			} else {
				isPlaying = false;
				clearInterval( fadeSlide5 );
				//console.log(isPlaying);
			}
		} );
	}
	
	function addMaterialInk() {

		// Add .material-ripple class to auto-generated WordPress HTML, including menus
		$( menuItems ).addClass( 'material-ripple' );
		$( sidebarItems ).addClass( 'material-ripple' );
		$( 'button:not(.menu-down-arrow), input[type="button"]' ).addClass( 'material-ripple' );
	}
	
	if ($( 'body' ).hasClass( 'animate' )) {
		$( window ).on( 'load', function() {
			preloadDiv.hide();
			bodyDiv.addClass( 'animated fadeIn' );
			animateSearchbar();
			animateMenu();
			animateSidebar();
			animateFormLabels();
			animateSlidesOnclick();
			animateSlideshows();
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
