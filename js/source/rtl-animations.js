(function() { // opens document ready function

  // Function to add then immediately remove animate.css classes by name
  // element = a string in quotes representing an element .class or #id; animation = animation name without animate__ prefix.
  const animateCSS = (element, animation, prefix = 'animate__') =>
    new Promise((resolve, reject) => {
      const animationName = `${prefix}${animation}`;
      const node = document.querySelector(element);

      node.classList.add(`${prefix}animated`, animationName);

      function handleAnimationEnd(event) {
        event.stopPropagation();
        node.classList.remove(`${prefix}animated`, animationName);
        resolve('Animation ended');
      }

      node.addEventListener('animationend', handleAnimationEnd, {once: true});
    });


  // Helper function to hide elements after animation completes;
  // Use in the else part of if statement
  const hideAfterAnimation = (element, duration) => {
    if (element.classList.contains('hide')) {

      // Remove the .hide class
      element.classList.remove('hide');

      // Set a timeout to the length of the animation
      Number.isInteger(duration);

      setTimeout(function() {
        element.classList.add('hide');
      }, duration);
    }
  }


  // Global variables
  let viewportWidth = window.innerwidth;
  let bodyDiv = document.querySelector('body');
  let rtlSearchForm = document.querySelector('.rtl #header-button-panel .searchform');
  let rtlSidebarButton = document.querySelector('.rtl .sidebar-toggle');

  function animateRtlSearchbar() {
    let rtlSearchToggleButton = document.querySelector('.rtl .search-toggle');
    let rtlSearchButton = document.querySelector('.searchform .search-icon');
    let searchIcon = document.querySelector('.search-icon .material-icons');

    // Since the icon was dynamically created, it must be searched from a parent object via event delegation
    if (rtlSearchButton !== null) {
      rtlSearchButton.addEventListener('mouseenter', event => {
        if (event.target.className === '.search-icon .material-icons') {
          animateCSS('.search-icon .material-icons', 'rubberBand');
        }
      });
    }

    // Check if body elements has the class rtl
    // to isolate functions from ltr animation script
    if (bodyDiv.classList.contains('rtl')) {

      // Check if search button exists on the page
      if (rtlSearchToggleButton !== null) {
        rtlSearchToggleButton.addEventListener('click', function() {
          if (rtlSearchForm.classList.contains('toggled')) {
            animateCSS('#header-button-panel .searchform', 'fadeInLeft');
            animateCSS('.sidebar-toggle', 'fadeInLeft');
          } else {
            animateCSS('#header-button-panel .searchform', 'fadeOutLeft');
            hideAfterAnimation(rtlSearchForm, 1000);
            animateCSS('.sidebar-toggle', 'fadeOutLeft');
          }
        });
      }
    }
  }

  function animateRtlSidebar() {
    let rtlSidebarPanel = document.querySelector('.rtl #secondary');

    if (bodyDiv.classList.contains('rtl')) {
      if (rtlSidebarButton !== null) {
        rtlSidebarButton.addEventListener('click', function() {
          if (this.classList.contains('toggled')) {
            animateCSS('#secondary', 'slideInLeft');
          } else {
            animateCSS('#secondary', 'slideOutLeft');
            hideAfterAnimation(rtlSidebarPanel, 1000);
          }
        });
      }
    }
  }

  function animateRtlMenu() {
    let viewportWidth = window.innerWidth;
    let rtlMainMenu = document.querySelector('.main-navigation');
    let rtlMenuButton = document.querySelector('.main-navigation .menu-toggle');
    let rtlMenuDropdownButton = document.querySelectorAll('.main-navigation .menu-down-arrow');
    let rtlMobileMenu = document.querySelector('#primary-menu .nav-menu');
    let rtlMobileSubmenu = document.querySelectorAll('#primary-menu .nav-menu ul');
    let rtlMobileMenuCustom = document.querySelector('#primary-menu.nav-menu');
    let rtlMobileSubmenuCustom = document.querySelectorAll('.sub-menu');

    for (var i = 0; i < rtlMenuDropdownButton.length; i++) {
      rtlMenuDropdownButton[i].classList.add('transitionHalfSec')
    }

    if (bodyDiv.classList.contains('rtl')) { // Opens .rtl class check
      if (viewportWidth >= 600) {

        // Loop through dropdown buttons nodelist
        for (var i = 0, len = rtlMenuDropdownButton.length; i < len; i++) {
          rtlMenuDropdownButton[i].addEventListener('click', function() {

            // Assign nextElementSibling (ul) to a variable
            let thisSubmenu = this.nextElementSibling;

            // Add necessary animate.css class
            thisSubmenu.classList.add('animate__animated');

            if (thisSubmenu.classList.contains('toggled-submenu')) {
              this.classList.add('rotate180');
              thisSubmenu.classList.add('animate__fadeInUp');
              thisSubmenu.classList.remove('animate__fadeOutDown');
            } else {
              this.classList.remove('rotate180');

              // Leave in .toggled-submenu class while animating
              thisSubmenu.classList.add('animate__fadeOutDown', 'toggled-submenu');
              thisSubmenu.classList.remove('animate__fadeInUp');

              // Remove .toggled-submenu after length of animation
              setTimeout(function() {
                thisSubmenu.classList.remove('toggled-submenu');
              }, 1000);
            }
          });
        }
      }

      if (viewportWidth < 600) {
        if (typeof(rtlMobileMenuCustom) !== 'undefined' && rtlMobileMenuCustom !== null) {
          rtlMenuButton.addEventListener('click', function() {
            if (rtlMainMenu.classList.contains('toggled')) {
              animateCSS('#primary-menu.nav-menu', 'slideInRight');
              for (let i = 0, len = rtlMobileSubmenuCustom.length; i < len; i++) {
                rtlMobileSubmenuCustom[i].classList.remove('animate__animated', 'animate__slideInRight', 'animate__slideOutRight');
              }
            } else {
              animateCSS('#primary-menu.nav-menu', 'slideOutRight');
              hideAfterAnimation(rtlMobileMenuCustom, 1000);
              for (let i = 0, len = rtlMobileSubmenuCustom.length; i < len; i++) {
                rtlMobileSubmenuCustom[i].classList.remove('animate__animated', 'animate__slideInRight', 'animate__slideOutRight');
              }
            }
          });
        }

        if (typeof(rtlMobileMenu) !== 'undefined' && rtlMobileMenu !== null) {
          rtlMenuButton.addEventListener('click', function() {
            if (rtlMainMenu.classList.contains('toggled')) {
              animateCSS('#primary-menu .nav-menu', 'slideInRight');
              for (let i = 0, len = rtlMobileSubmenu.length; i < len; i++) {
                rtlMobileSubmenu[i].classList.remove('animate__animated', 'animate__slideInRight', 'animate__slideOutRight');
              }
            } else {
              animateCSS('#primary-menu .nav-menu', 'slideOutRight');
              hideAfterAnimation(rtlMobileMenu, 1000);
              for (let i = 0, len = rtlMobileSubmenu.length; i < len; i++) {
                rtlMobileSubmenu[i].classList.remove('animate__animated', 'animate__slideInRight', 'animate__slideOutRight');
              }
            }
          });
        }
      }
    } // Closes .rtl class check
  }

  if (bodyDiv.classList.contains('animate')) {
    window.addEventListener('load', function() {
      animateRtlMenu();
      animateRtlSearchbar();
      animateRtlSidebar();
    });
  }
})();
