(function($) { // opens document ready function
  var animationEnd = (function(el) {
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
  })(document.createElement('div'));
  var windowWidth = $(window).width();

  var rtlSearchForm = $('.rtl #header-button-panel .searchform');
  var rtlSidebarButton = $('.rtl .sidebar-toggle');

  function animateRtlSearchbar() {
    var rtlSearchButton = $('.rtl .search-toggle');
    var searchIcon = $('.search-icon .material-icons');

    rtlSearchForm.addClass('animate__animated');

    $('.searchform .search-icon').on('mouseenter', searchIcon, function() {
      $(this).find(searchIcon).addClass('animate__animated animate__rubberBand').one(animationEnd, function(e) {
        $(this).removeClass('animate__animated animate__rubberBand');
        e.stopPropagation(); // Stop the current event (adding and removing classes) from bubbling up and hiding the parent searchform
      });
    });

    rtlSearchButton.on('click', function() {
      if (rtlSearchForm.hasClass('toggled')) {
        rtlSearchForm.addClass('animate__fadeInLeft').removeClass('hide').one(animationEnd, function() {
          rtlSearchForm.removeClass('animate__fadeInLeft');
          //console.log(this);
        });
        rtlSidebarButton.addClass('animate__fadeInLeft').one(animationEnd, function() {
          rtlSidebarButton.removeClass('animate__fadeInLeft');
        });
      } else {
        rtlSearchForm.addClass('animate__fadeOutLeft').removeClass('hide').one(animationEnd, function() {
          rtlSearchForm.addClass('hide').removeClass('animate__fadeOutLeft');
          //console.log(this);
        });
        rtlSidebarButton.addClass('animate__fadeOutLeft').one(animationEnd, function() {
          rtlSidebarButton.removeClass('animate__fadeOutLeft');
        });
      }
    });
  }

  function animateRtlSidebar() {
    var rtlSidebarPanel = $('.rtl #secondary');

    rtlSidebarButton.addClass('animate__animated');
    rtlSidebarPanel.addClass('animate__animated');

    rtlSidebarButton.on('click', function() {
      if ($(this).hasClass('toggled')) {
        rtlSidebarPanel.addClass('animate__slideInLeft').removeClass('hide').one(animationEnd, function() {
          rtlSidebarPanel.removeClass('animate__slideInLeft');
        });
      } else {
        rtlSidebarPanel.addClass('animate__slideOutLeft').removeClass('hide').one(animationEnd, function() {
          rtlSidebarPanel.addClass('hide').removeClass('animate__slideOutLeft');
        });
      }
    });
  }

  function animateRtlMenu() {
    var windowWidth = $(window).width();
    var mainMenu = $('.main-navigation');
    var rtlMenuButton = $('.rtl .main-navigation .menu-toggle');
    var rtlMenuDropdownButton = $('.rtl .main-navigation .menu-down-arrow');
    var menu = $('.main-navigation .menu-down-arrow + ul');
    var subMenuButton = $('.main-navigation .children .menu-down-arrow');
    var customSubMenuButton = $('.main-navigation .sub-menu .menu-down-arrow');
    var subMenu = $('.main-navigation .menu-down-arrow + ul ul');
    var mobileMenu = $('#primary-menu .nav-menu');
    var mobileSubmenu = $('#primary-menu .nav-menu ul');
    var mobileMenuCustom = $('ul.nav-menu');
    var mobileSubmenuCustom = $('ul.nav-menu ul');
    var subMenuItems = $('.main-navigation ul ul a');

    menu.addClass('animate__animated');
    rtlMenuDropdownButton.addClass('transitionHalfSec');
    mobileMenu.addClass('animate__animated');
    mobileMenuCustom.addClass('animate__animated');

    if (windowWidth >= 600) {
      // https://medium.com/@oscarmwana/toggling-animate-css-with-jquery-972415aa0a71
      rtlMenuDropdownButton.on('click', function() {
        // $(this) = button with .menu-down-arrow class; next() = the next item, represented by menu variable
        if ($(this).next().hasClass('toggled-submenu')) {
          $(this).next().addClass('animate__fadeInUp').one(animationEnd, function() {
            $(this).removeClass('animate__fadeInUp');
            //console.log($(this));
          });
        } else {
          $(this).next().addClass('animate__fadeOutDown toggled-submenu').one(animationEnd, function() {
            $(this).removeClass('animate__fadeOutDown toggled-submenu'); // .toggled-submenu class must remain while animation is playing, then removed, otherwise the animation disappears immediately on second click
            //console.log($(this));
          });
        }
        $(this).toggleClass('rotate180');
      });
    }

    if (windowWidth < 600) {
      rtlMenuButton.on('click', function() {
        if ($(this).closest(mainMenu).hasClass('toggled')) {
          $(this).closest(mainMenu).find(mobileMenu).addClass('animate__slideInRight').removeClass('hide').one(animationEnd, function() {
            $(this).removeClass('animate__slideInRight');
          });
          mobileSubmenu.removeClass('animate__animated animate__slideInRight animate__slideOutRight');
        } else {
          $(this).closest(mainMenu).find(mobileMenu).addClass('animate__slideOutRight').removeClass('hide').one(animationEnd, function() {
            $(this).addClass('hide').removeClass('animate__slideOutRight');
          });
          mobileSubmenu.removeClass('animate__animated animate__slideInRight animate__slideOutRight');
        }

        if ($(this).closest(mainMenu).hasClass('toggled')) {
          $(this).closest(mainMenu).find(mobileMenuCustom).addClass('animate__slideInRight').removeClass('hide').one(animationEnd, function() {
            $(this).removeClass('animate__slideInRight');
          });
          mobileSubmenuCustom.removeClass('animate__animated animate__slideInRight animate__slideOutRight');
        } else {
          $(this).closest(mainMenu).find(mobileMenuCustom).addClass('animate__slideOutRight').removeClass('hide').one(animationEnd, function() {
            $(this).addClass('hide').removeClass('animate__slideOutRight');
          });
          mobileSubmenuCustom.removeClass('animate__animated animate__slideInRight animate__slideOutRight');
        }
      });
    }
  }

  if ($('body').hasClass('animate')) {
    $(window).on('load', function() {
      animateRtlMenu();
      animateRtlSearchbar();
      animateRtlSidebar();
    });
  }
})(jQuery);
