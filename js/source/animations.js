/* Script to control animate.css */

(function() { // opens document ready function
  "use strict";


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


  // Shared global variables
  let viewportWidth = window.innerwidth;
  let searchForm = document.querySelector('#header-button-panel .searchform');
  let sidebarButton = document.querySelector('.sidebar-toggle');

  let preloadDiv = document.querySelector('#loader-wrapper');
  let bodyDiv = document.querySelector('body');


  function animateSearchbar() {
    // Search
    let searchToggleButton = document.querySelector('.search-toggle');
    let searchButton = document.querySelector('.searchform .search-icon');
    let searchIcon = document.querySelector('.search-icon .material-icons');

    // Since the icon was dynamically created, it must be searched from a parent object via event delegation
    if (searchButton !== null) {
      searchButton.addEventListener('mouseenter', event => {
        if (event.target.className === 'search-icon') {
          animateCSS('.search-icon .material-icons', 'rubberBand');
        }
      });
    }

    // Check if search button exists on the page
    if (searchToggleButton !== null) {
      searchToggleButton.addEventListener('click', function() {
        if (searchForm.classList.contains('toggled')) {
          animateCSS('#header-button-panel .searchform', 'fadeInRight');
          animateCSS('.sidebar-toggle', 'fadeInRight');
        } else {
          animateCSS('#header-button-panel .searchform', 'fadeOutRight');
          hideAfterAnimation(searchForm, 1000);
          animateCSS('.sidebar-toggle', 'fadeOutRight');
        }
      });
    }
  }


  function animateMenu() {
    // Menus

    let viewportWidth = window.innerWidth;
    let mainMenu = document.querySelector('.main-navigation');
    let menuButton = document.querySelector('.main-navigation .menu-toggle');
    let menuDropdownButton = document.querySelectorAll('.main-navigation .menu-down-arrow');
    let mobileMenu = document.querySelector('#primary-menu .nav-menu');
    let mobileSubmenu = document.querySelectorAll('#primary-menu .nav-menu ul');
    let mobileMenuCustom = document.querySelector('#primary-menu.nav-menu');
    let mobileSubmenuCustom = document.querySelectorAll('.sub-menu');

    for (var i = 0; i < menuDropdownButton.length; i++) {
      menuDropdownButton[i].classList.add('transitionHalfSec')
    }

    if (viewportWidth >= 600) {

      // Loop through dropdown buttons nodelist
      for (var i = 0, len = menuDropdownButton.length; i < len; i++) {
        menuDropdownButton[i].addEventListener('click', function() {

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
      if (typeof(mobileMenuCustom) !== 'undefined' && mobileMenuCustom !== null) {
        menuButton.addEventListener('click', function() {
          if (mainMenu.classList.contains('toggled')) {
            animateCSS('#primary-menu.nav-menu', 'slideInLeft');
            for (let i = 0, len = mobileSubmenuCustom.length; i < len; i++) {
              mobileSubmenuCustom[i].classList.remove('animate__animated', 'animate__slideInLeft', 'animate__slideOutLeft');
            }
          } else {
            animateCSS('#primary-menu.nav-menu', 'slideOutLeft');
            hideAfterAnimation(mobileMenuCustom, 1000);
            for (let i = 0, len = mobileSubmenuCustom.length; i < len; i++) {
              mobileSubmenuCustom[i].classList.remove('animate__animated', 'animate__slideInLeft', 'animate__slideOutLeft');
            }
          }
        });
      }

      if (typeof(mobileMenu) !== 'undefined' && mobileMenu !== null) {
        menuButton.addEventListener('click', function() {
          if (mainMenu.classList.contains('toggled')) {
            animateCSS('#primary-menu .nav-menu', 'slideInLeft');
            for (let i = 0, len = mobileSubmenu.length; i < len; i++) {
              mobileSubmenu[i].classList.remove('animate__animated', 'animate__slideInLeft', 'animate__slideOutLeft');
            }
          } else {
            animateCSS('#primary-menu .nav-menu', 'slideOutLeft');
            hideAfterAnimation(mobileMenu, 1000);
            for (let i = 0, len = mobileSubmenu.length; i < len; i++) {
              mobileSubmenu[i].classList.remove('animate__animated', 'animate__slideInLeft', 'animate__slideOutLeft');
            }
          }
        });
      }
    }
  }


  function animateSocialMenu() {
    let socialToggleButton = document.querySelector('#social-button');
    let socialPanel = document.querySelector('#menu-social');

    //if (viewportWidth < 600 && socialToggleButton !== null) {
      socialToggleButton.addEventListener('click', function() {
        if (socialPanel.classList.contains('toggled')) {
          animateCSS('#menu-social', 'slideInUp');
        } else {
          animateCSS('#menu-social', 'slideOutDown');
          hideAfterAnimation(socialPanel, 1000);
        }
      });
    //}
  }


  function animateSidebar() {
    // Sidebar
    let sidebarPanel = document.querySelector('#secondary');

    if (sidebarButton !== null) {
      sidebarButton.addEventListener('click', function() {
        if (this.classList.contains('toggled')) {
          animateCSS('#secondary', 'slideInRight');
        } else {
          animateCSS('#secondary', 'slideOutRight');
          hideAfterAnimation(sidebarPanel, 1000);
        }
      });
    }
  }


  // Gloabl Variables for Comments form
  let commentTextarea = document.querySelector('.comment-form-comment');
  let commentAuthor = document.querySelector('.comment-form-author');
  let commentEmail = document.querySelector('.comment-form-email');
  let commentUrl = document.querySelector('.comment-form-url');

  let commentLabel = document.querySelector('.comment-form-comment label');
  let commentAuthorLabel = document.querySelector('.comment-form-author label');
  let commentEmailLabel = document.querySelector('.comment-form-email label');
  let commentUrlLabel = document.querySelector('.comment-form-url label');


  function animateFormLabels(formElement, formLabel) {
    /* Animates labels inside form elements */
    // Function parameters are element objects selected with document.querySelector

    // Check if form element exists
    if (formElement !== null && formLabel !== null) {
      formLabel.classList.add('animate__animated');
      formElement.addEventListener('focusin', function() {
        formLabel = this.querySelector('label');
        formLabel.classList.add('animate__fadeOutLeft');
        formLabel.classList.remove('animate__fadeInLeft');
        formElement.classList.add('isActive');
      });

      formElement.addEventListener('focusout', function() {
        formLabel = this.querySelector('label');
        formLabel.classList.remove('animate__fadeOutLeft');
        formLabel.classList.add('animate__fadeInLeft');
        formElement.classList.remove('isActive');
      });
    }
  }


  function animateCboxSlides() {
    /* For animations between Colorbox slides */

    let colorboxNext = document.querySelector('#cboxNext');
    let colorboxPrevious = document.querySelector('#cboxPrevious');
    let colorboxContent = document.querySelector('#cboxLoadedContent');

    if (colorboxNext !== null) {
      colorboxNext.addEventListener('click', () => {
        animateCSS('#cboxLoadedContent', 'fadeIn');
      });
    }

    if (colorboxPrevious !== null) {
      colorboxPrevious.addEventListener('click', () => {
        animateCSS('#cboxLoadedContent', 'fadeIn');
      });
    }
  }

// Global variables for the slide animations

// Standard galleries
let gallery1 = document.querySelector('#gallery-1');
let gallery2 = document.querySelector('#gallery-2');
let gallery3 = document.querySelector('#gallery-3');
let gallery4 = document.querySelector('#gallery-4');
let gallery5 = document.querySelector('#gallery-5');

// Block galleries
let gallery6 = document.querySelector('.wp-block-gallery:nth-of-type(1)');
let gallery7 = document.querySelector('.wp-block-gallery:nth-of-type(2)');
let gallery8 = document.querySelector('.wp-block-gallery:nth-of-type(3)');
let gallery9 = document.querySelector('.wp-block-gallery:nth-of-type(4)');
let gallery10 = document.querySelector('.wp-block-gallery:nth-of-type(5)');

// Standard gallery slides
let slides1 = document.querySelectorAll('.single.slider #gallery-1 .gallery-item');
let slides2 = document.querySelectorAll('.single.slider #gallery-2 .gallery-item');
let slides3 = document.querySelectorAll('.single.slider #gallery-3 .gallery-item');
let slides4 = document.querySelectorAll('.single.slider #gallery-4 .gallery-item');
let slides5 = document.querySelectorAll('.single.slider #gallery-5 .gallery-item');

// Block gallery slides
let slides6 = document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(1) .blocks-gallery-item');
let slides7 = document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(2) .blocks-gallery-item');
let slides8 = document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(3) .blocks-gallery-item');
let slides9 = document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(4) .blocks-gallery-item');
let slides10 = document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(5) .blocks-gallery-item');

// Next panel buttons
let nextBtn1 = document.querySelector('#gallery-1 + .slider-button-panel .slider-next');
let nextBtn2 = document.querySelector('#gallery-2 + .slider-button-panel .slider-next');
let nextBtn3 = document.querySelector('#gallery-3 + .slider-button-panel .slider-next');
let nextBtn4 = document.querySelector('#gallery-4 + .slider-button-panel .slider-next');
let nextBtn5 = document.querySelector('#gallery-5 + .slider-button-panel .slider-next');
let nextBtn6 = document.querySelector('.wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-next');
let nextBtn7 = document.querySelector('.wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-next');
let nextBtn8 = document.querySelector('.wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-next');
let nextBtn9 = document.querySelector('.wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-next');
let nextBtn10 = document.querySelector('.wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-next');

// Previous panel buttons
let previousBtn1 = document.querySelector('#gallery-1 + .slider-button-panel .slider-previous');
let previousBtn2 = document.querySelector('#gallery-2 + .slider-button-panel .slider-previous');
let previousBtn3 = document.querySelector('#gallery-3 + .slider-button-panel .slider-previous');
let previousBtn4 = document.querySelector('#gallery-4 + .slider-button-panel .slider-previous');
let previousBtn5 = document.querySelector('#gallery-5 + .slider-button-panel .slider-previous');
let previousBtn6 = document.querySelector('.wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-previous');
let previousBtn7 = document.querySelector('.wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-previous');
let previousBtn8 = document.querySelector('.wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-previous');
let previousBtn9 = document.querySelector('.wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-previous');
let previousBtn10 = document.querySelector('.wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-previous');

let slideshowBtn1 = document.querySelector('#gallery-1 + .slider-button-panel .slider-startshow');
let slideshowBtn2 = document.querySelector('#gallery-2 + .slider-button-panel .slider-startshow');
let slideshowBtn3 = document.querySelector('#gallery-3 + .slider-button-panel .slider-startshow');
let slideshowBtn4 = document.querySelector('#gallery-4 + .slider-button-panel .slider-startshow');
let slideshowBtn5 = document.querySelector('#gallery-5 + .slider-button-panel .slider-startshow');
let slideshowBtn6 = document.querySelector('.wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-startshow');
let slideshowBtn7 = document.querySelector('.wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-startshow');
let slideshowBtn8 = document.querySelector('.wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-startshow');
let slideshowBtn9 = document.querySelector('.wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-startshow');
let slideshowBtn10 = document.querySelector('.wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-startshow');

let animateSlide = (btn, gallery, slides, counter) => {
//function animateSlide(btn, gallery, slides, counter) {
  // If the button exists on page
  if (btn !== null) {
    btn.addEventListener('click', () => {

      let nextSlide = slides[counter.value()];
      let previousSlide = slides[counter.value() - 1];

      if (nextSlide !== undefined) {
        nextSlide.classList.add('animate__animated', 'animate__fadeIn');
        nextSlide.addEventListener('animationend', function() {
          nextSlide.classList.remove('animate__animated', 'animate__fadeIn');
        });
      }

      if (previousSlide !== undefined) {
        previousSlide.classList.add('animate__animated', 'animate__fadeOut');
        previousSlide.addEventListener('animationend', function() {
          previousSlide.classList.remove('animate__animated', 'animate__fadeOut');
        });
      }
    });
  }
}

let animateSlideshow = (slideshowBtn, gallery, slideItems, counter) => {
  let isPlaying = false;
  let currentIndex = counter.value();
  let slideInterval;

  let startAnimation = () => {
    isPlaying = true;
    slideInterval = window.setInterval(fadeSlide, 5000);
  }

  let pauseAnimation = () => {
    isPlaying = false;
    clearInterval(slideInterval);
  }

  let fadeSlide = () => {
    currentIndex = currentIndex + 1;
    let nextSlide = slideItems[currentIndex];
    let previousSlide = slideItems[currentIndex - 1];

    if (nextSlide !== undefined) {
      nextSlide.classList.add('animate__animated', 'animate__fadeIn');
      nextSlide.addEventListener('animationend', function() {
        nextSlide.classList.remove('animate__animated', 'animate__fadeIn');
      });
    }

    if (previousSlide !== undefined) {
      previousSlide.classList.add('animate__animated', 'animate__fadeOut');
      previousSlide.classList.remove('hide');
      previousSlide.addEventListener('animationend', function() {
        previousSlide.classList.remove('animate__animated', 'animate__fadeOut');
        previousSlide.classList.add('hide');
      });
    }
  }

  if (slideshowBtn !== null) {
    slideshowBtn.addEventListener('click', () => {
      if (isPlaying === false) {
        startAnimation();
        //console.log('The slideshow animation is playing.');
      } else {
        pauseAnimation();
        //console.log('The slideshow animation is not playing.');
      }
    });
  }
}


  // Add .ripple class to auto-generated WordPress HTML, including menus
  // See CSS-Tricks article How to Recreate the Ripple Effect of Material Design Buttons
  // https://css-tricks.com/how-to-recreate-the-ripple-effect-of-material-design-buttons/
  let addMaterialInk = (event) => {
    const materialElement = event.currentTarget;
    const circle = document.createElement('span');
    const diameter = Math.max(materialElement.clientWidth, materialElement.clientHeight);
    const radius = diameter / 2;

    circle.style.width = circle.style.height = `${diameter}px`;
    circle.style.left = `${event.offsetX - radius}px`;
    circle.style.top = `${event.offsetY - radius}px`;
    circle.classList.add('ripple');

    const hadRipple = materialElement.getElementsByClassName('ripple')[0];

    if (hadRipple) {
      hadRipple.remove();
    }

    materialElement.appendChild(circle);
  }


  // Load functions if the body element has the .animate class
  if (bodyDiv.classList.contains('animate')) {
    window.addEventListener('load', () => {
      preloadDiv.style.display = 'none';
      bodyDiv.classList.add('animate__animated', 'animate__fadeIn');

      animateSocialMenu();

      animateFormLabels(commentTextarea, commentLabel);
      animateFormLabels(commentAuthor, commentAuthorLabel);
      animateFormLabels(commentEmail, commentEmailLabel);
      animateFormLabels(commentUrl, commentUrlLabel);

      // Counter in this function call is defined at the top of the-mx-scripts.js
      animateSlide(nextBtn1, gallery1, slides1, counter0);
      animateSlide(nextBtn2, gallery2, slides2, counter1);
      animateSlide(nextBtn3, gallery3, slides3, counter2);
      animateSlide(nextBtn4, gallery4, slides4, counter3);
      animateSlide(nextBtn5, gallery5, slides5, counter4);
      animateSlide(nextBtn6, gallery6, slides6, counter5);
      animateSlide(nextBtn7, gallery7, slides7, counter6);
      animateSlide(nextBtn8, gallery8, slides8, counter7);
      animateSlide(nextBtn9, gallery9, slides9, counter8);
      animateSlide(nextBtn10, gallery10, slides10, counter9);

      animateSlide(previousBtn1, gallery1, slides1, counter0);
      animateSlide(previousBtn2, gallery2, slides2, counter1);
      animateSlide(previousBtn3, gallery3, slides3, counter2);
      animateSlide(previousBtn4, gallery4, slides4, counter3);
      animateSlide(previousBtn5, gallery5, slides5, counter4);
      animateSlide(previousBtn6, gallery6, slides6, counter5);
      animateSlide(previousBtn7, gallery7, slides7, counter6);
      animateSlide(previousBtn8, gallery8, slides8, counter7);
      animateSlide(previousBtn9, gallery9, slides9, counter8);
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

      animateCboxSlides();

      const buttons = document.querySelectorAll('button:not(.menu-down-arrow), input[type="button"], .wp-block-button__link');
      const menuItems = document.querySelectorAll('.main-navigation .menu-item a, .main-navigation .page_item a');

      for (const button of buttons) {
        button.addEventListener('click', addMaterialInk);
      }

      for (const menuItem of menuItems) {
        menuItem.addEventListener('click', addMaterialInk);
      }
    });

    window.addEventListener('resize', () => {
      var timeOut = setTimeout(function() { // Delay rendering/event so that event doesn't fire multiple times
        animateMenu();
      }, 250);

      if (timeOut != null) {
        clearTimeout(timeOut);
      }
    });
  }

  if (bodyDiv.classList.contains('animate') && !bodyDiv.classList.contains('rtl')) {
    window.addEventListener('load', () => {
      animateMenu();
      animateSearchbar();
      animateSidebar();
    });
  }

  //}

})();
