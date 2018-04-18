/* jQuery script to control animate.css */

(function($) { // opens document ready function

	// Menus
	var mainMenu = $('.main-navigation');
	var menuButton = $('.main-navigation .menu-toggle');
	var menuDropdownButton = $('.main-navigation .menu-down-arrow');
	var menu = $('.main-navigation .menu-down-arrow + ul');
	//var menuOpen = $('.main-navigation .menu-down-arrow + ul.toggled-submenu');
	var subMenuButton = $('.main-navigation .menu-down-arrow .menu-down-arrow'); // two levels deep
	var subMenu = $('.main-navigation .menu-down-arrow + ul ul');
	var mobileMenu = $('#primary-menu .nav-menu');
	var mobileSubmenu = $('#primary-menu .nav-menu ul');
	var mobileMenuCustom = $('ul.nav-menu');
	var mobileSubmenuCustom = $('ul.nav-menu ul');
	
	// Search
	var searchButton = $('.search-toggle');
	var searchForm = $('#header-button-panel .searchform');
	var searchIcon = $('.search-icon .material-icons');
	
	// Sidebar
	var sidebarButton = $('.sidebar-toggle');
	var sidebarPanel = $('#secondary');
	
	// Colorbox
	var colorboxNext = $('#cboxNext');
	var colorboxPrevious = $('#cboxPrevious');
	var colorboxContent = $('#cboxLoadedContent');
	
	// Misc.
	var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	var windowWidth = $(window).width();
	
	menu.addClass('animated');
	menuDropdownButton.addClass('transitionHalfSec');
	
	searchForm.addClass('animated');
	sidebarButton.addClass('animated');
	sidebarPanel.addClass('animated');
	mobileMenu.addClass('animated');
	mobileMenuCustom.addClass('animated');
	
	function animateMenu() {
		if (windowWidth >= 600) {
			// Undo original hiding method in CSS
			menu.css({
				'display' : 'block',
				'left' : '0px'
			});
			subMenu.css({
				'left' : '25%'
			});
			
			// Hide the menu on load with jQuery
			menu.hide();
			mobileMenu.hide();
			
			// https://medium.com/@oscarmwana/toggling-animate-css-with-jquery-972415aa0a71
			menuDropdownButton.on('click', function() {
				// $(this) = button with .menu-down-arrow class; next() = the next item, represented by menu variable
				if ($(this).next().hasClass('toggled-submenu')) {
					$(this).next().addClass('fadeInUp').show().one(animationEnd, function() {
						$(this).removeClass('fadeInUp');
						//console.log($(this));
					});
					subMenu.removeClass('animated fadeOutDown fadeInUp');
				} else {
					$(this).next().addClass('fadeOutDown').one(animationEnd, function() {
						$(this).hide().removeClass('fadeOutDown');
						//console.log($(this));
					});
					
					// Remove all classes related to hiding and showing on menus two levels deep
					// as the second click cancels out the first menu
					subMenu.removeClass('animated fadeOutDown fadeInUp');
					subMenu.hide();
				}
				$(this).toggleClass('rotate180');
			});
		} 
		
		if(windowWidth < 600) {
			menuButton.on('click', function() {
				if ($(this).closest(mainMenu).hasClass('toggled')) {
					$(this).closest(mainMenu).find(mobileMenu).addClass('slideInLeft').show().one(animationEnd, function() {
						$(this).removeClass('slideInLeft');
					});
					mobileSubmenu.removeClass('animated slideInLeft slideOutLeft');
				} else {
					$(this).closest(mainMenu).find(mobileMenu).addClass('slideOutLeft').show().one(animationEnd, function() {
						$(this).hide().removeClass('slideOutLeft');
					});
					mobileSubmenu.removeClass('animated slideInLeft slideOutLeft');
				}
				
				if ($(this).closest(mainMenu).hasClass('toggled')) {
					$(this).closest(mainMenu).find(mobileMenuCustom).addClass('slideInLeft').show().one(animationEnd, function() {
						$(this).removeClass('slideInLeft');
					});
					mobileSubmenuCustom.removeClass('animated slideInLeft slideOutLeft');
				} else {
					$(this).closest(mainMenu).find(mobileMenuCustom).addClass('slideOutLeft').show().one(animationEnd, function() {
						$(this).hide().removeClass('slideOutLeft');
					});
					mobileSubmenuCustom.removeClass('animated slideInLeft slideOutLeft');
				}
			});
		}
	}
	window.onload = animateMenu();
	window.onresize = function() {
		if (timeOut != null) {
			clearTimeout(timeOut);
		}
		
		timeOut = setTimeout(function() { // Delay rendering/event so that event doesn't fire multiple times
			animateMenu();
		}, 250 );
	}
	/*$(window).resize(function(){
		if (windowWidth < 600) {
			animateMenu;
		}
	});*/
	
	searchButton.on('click', function() {
		if (searchForm.hasClass('toggled')) {
			searchForm.addClass('fadeInRight').show().one(animationEnd, function() {
				searchForm.removeClass('fadeInRight');
				//console.log(this);
			});
			sidebarButton.addClass('fadeInRight').one(animationEnd, function() {
				sidebarButton.removeClass('fadeInRight');
			});
		} else {
			searchForm.addClass('fadeOutRight').show().one(animationEnd, function() {
				searchForm.hide().removeClass('fadeOutRight');
				//console.log(this);
			});
			sidebarButton.addClass('fadeOutRight').one(animationEnd, function() {
				sidebarButton.removeClass('fadeOutRight');
			});
		}
	});
	
	// Since the icon was dynamically created, it must be searched from a parent object via event delegation
	$('.searchform .search-icon').on('mouseenter', searchIcon, function() {
		$(this).find(searchIcon).addClass('animated rubberBand').one(animationEnd, function(e) {
			$(this).removeClass('animated rubberBand');
			e.stopPropagation(); // Stop the current event (adding and removing classes) from bubbling up and hiding the parent searchform
		});
	});
	
	sidebarButton.on('click', function () {
		if ($(this).hasClass('toggled')) {
			sidebarPanel.addClass('slideInRight').show().one(animationEnd, function() {
				sidebarPanel.removeClass('slideInRight');
			});
		} else {
			sidebarPanel.addClass('slideOutRight').show().one(animationEnd, function() {
				sidebarPanel.hide().removeClass('slideOutRight');
			});
		}
	});
	
	// For animations between Colorbox slides
	colorboxNext.on('click', function() {
		$('#cboxLoadedContent').addClass('animated fadeIn').one(animationEnd, function() {
			$('#cboxLoadedContent').removeClass('animated fadeIn');
		});
	});
	
	colorboxPrevious.on('click', function() {
		$('#cboxLoadedContent').addClass('animated fadeIn').one(animationEnd, function() {
			$('#cboxLoadedContent').removeClass('animated fadeIn');
		});
	});
	
})(jQuery);