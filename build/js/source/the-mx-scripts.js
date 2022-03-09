/**
 * File the-mx-scripts.js.
 *
 * Extra scripts for navigation, slideshow controls, animations, etc.
 * Licenses for the scripts are GPLv3 or compatible
 */

var makeCounter = function() {
  var privateCounter = 0;

  function changeBy(val) {
    privateCounter += val;
  }

  return {
    increment: function() {
      changeBy(1);
    },

    decrement: function() {
      changeBy(-1);
    },

    value: function() {
      return privateCounter;
    }
  };
};

/* Global counter variables for next/previous buttons in this file and animations.js */
var counter0 = makeCounter();
var counter1 = makeCounter();
var counter2 = makeCounter();
var counter3 = makeCounter();
var counter4 = makeCounter();
var counter5 = makeCounter();
var counter6 = makeCounter();
var counter7 = makeCounter();
var counter8 = makeCounter();
var counter9 = makeCounter();
//console.log(counter5);

(function() {

  // Global variables
  var windowWidth;
  var windowHeight = window.innerHeight;
  var bodyElHeight = document.getElementsByTagName('body')[0].clientHeight;
  var headerPanel = document.getElementById('header-button-panel');
  var socialContainer = document.getElementById('menu-social');
  var menu = document.querySelector('.main-navigation ul');
  var customSubmenuButton;


  /* Functions to convert hex values to RGB values
   * http://www.javascripter.net/faq/hextorgb.htm
   */
  function hexToR(h) {
    return parseInt((cutHex(h)).substring(0, 2), 16);
  }

  function hexToG(h) {
    return parseInt((cutHex(h)).substring(2, 4), 16);
  }

  function hexToB(h) {
    return parseInt((cutHex(h)).substring(4, 6), 16);
  }

  function cutHex(h) {
    return (h.charAt(0) === "#") ? h.substring(1, 7) : h;
  }


  function headerTitleRGBA() {
    var headerTitleCss = '.site-title a:link,\n' +
      '.site-title a:visited {\n' +
      '\tcolor: rgba(' + hexToR(colorScheme.headerTextColor) + ', ' + hexToG(colorScheme.headerTextColor) + ', ' + hexToB(colorScheme.headerTextColor) + ', 0.87);' +
      '\n}\n\n' +

      '.site-title a:hover,\n' +
      '.site-title a:focus {\n' +
      '\tcolor: #' + colorScheme.headerTextColor + ' !important;' +
      '\n}\n\n';

    var headerTitleStyle = document.createElement('style');

    if (headerTitleStyle.styleSheet) {
      headerTitleStyle.styleSheet.cssText = headerTitleCss;
    } else {
      headerTitleStyle.appendChild(document.createTextNode(headerTitleCss));
    }
    document.getElementsByTagName('head')[0].appendChild(headerTitleStyle);
  }


  function addMobileSocialButton() {
    if (socialContainer) {
      socialContainer.insertAdjacentHTML('beforebegin', '<button class="social-toggle" id="social-button"><i class="material-icons">&#xE7FD;</i></button>');
    }
  }


  function loadInitSocialMenuState() {
    var socialToggleButton = document.getElementById('social-button');
    windowWidth = window.innerWidth;

    if (typeof(socialContainer) != 'undefined' && socialContainer != null) {
      if (windowWidth < 768) {
        socialToggleButton.classList.remove('hide');
        socialContainer.classList.add('hide');
      } else {
        socialToggleButton.classList.add('hide');
        socialContainer.classList.remove('hide');
      }
    }
  }


  function toggleSocialPanel() {
    /* Toggle social media button panel */
    var socialToggleButton = document.getElementById('social-button');

    if (socialContainer) {
      socialToggleButton.onclick = function() {
        if (-1 !== socialContainer.className.indexOf('toggled')) {
          socialContainer.className = socialContainer.className.replace(' toggled', '');
          socialContainer.classList.add('hide');
          socialContainer.setAttribute('aria-expanded', 'false');
        } else {
          socialContainer.className += ' toggled';
          socialContainer.classList.remove('hide');
          socialContainer.setAttribute('aria-expanded', 'true');
        }
      };
    }
  }


  function socialMediaButtons() {
    /* add social media icons to links in the Social Media Icons menu */
    /* by adding specific classes to a tags with *.com strings */

    // if the container for the social icons exists
    if (document.body.contains(socialContainer)) {
      var fbLink = document.querySelector('#menu-social-items li a[href*="facebook.com"]');
      var twLink = document.querySelector('#menu-social-items li a[href*="twitter.com"]');
      var instLink = document.querySelector('#menu-social-items li a[href*="instagram.com"]');
      var pntLink = document.querySelector('#menu-social-items li a[href*="pinterest.com"]');
      var ytLink = document.querySelector('#menu-social-items li a[href*="youtube.com"]');
      var vimLink = document.querySelector('#menu-social-items li a[href*="vimeo.com"]');
      var flkLink = document.querySelector('#menu-social-items li a[href*="flickr.com"]');
      var gthbLink = document.querySelector('#menu-social-items li a[href*="github.com"]');
      var gpLink = document.querySelector('#menu-social-items li a[href*="plus.google.com"]');
      var tmbLink = document.querySelector('#menu-social-items li a[href*="tumblr.com"]');
      var wpLink = document.querySelector('#menu-social-items li a[href*="wordpress.com"]');
      var wpOrgLink = document.querySelector('#menu-social-items li a[href*="wordpress.org"]');

      if (fbLink) {
        fbLink.classList.add('ti-facebook');
      }
      if (twLink) {
        twLink.classList.add('ti-twitter-alt');
      }
      if (instLink) {
        instLink.classList.add('ti-instagram');
      }
      if (pntLink) {
        pntLink.classList.add('ti-pinterest');
      }
      if (ytLink) {
        ytLink.classList.add('ti-youtube');
      }
      if (vimLink) {
        vimLink.classList.add('ti-vimeo-alt');
      }
      if (flkLink) {
        flkLink.classList.add('ti-flickr-alt');
      }
      if (gthbLink) {
        gthbLink.classList.add('ti-github');
      }
      if (gpLink) {
        gpLink.classList.add('ti-google');
      }
      if (tmbLink) {
        tmbLink.classList.add('ti-tumblr-alt');
      }
      if (wpLink) {
        wpLink.classList.add('ti-wordpress');
      }
      if (wpOrgLink) {
        wpOrgLink.classList.add('ti-wordpress');
      }
    }
  }


  function toggleSidebar() {
    /* Toggle sidebar script */
    var container, toggleButton, sidebar, chevronLeft, chevronRight;
    //var bodyEl = document.getElementsByTagName( 'body' )[0];
    //console.log( 'body height is: ' + bodyElHeight );
    //console.log( 'window height is: ' + window.outerHeight );

    container = document.getElementById('content');
    if (!container) {
      return;
    }

    toggleButton = document.getElementById('sidebar-button');

    sidebar = document.querySelector('.sidebar-overlay #secondary');

    // Create chevron logo elements
    chevronLeft = document.createElement('i');
    cLeftContent = document.createTextNode('chevron_left');
    chevronLeft.appendChild(cLeftContent);
    chevronLeft.classList.add('material-icons');

    chevronRight = document.createElement('i');
    cRightContent = document.createTextNode('chevron_right');
    chevronRight.appendChild(cRightContent);
    chevronRight.classList.add('material-icons');

    // Hide sidebar toggle button if menu is empty and return early.
    // first check if sidebar shows up in the theme; if the element with id #secondary exists (is contained) in the body
    if (document.body.contains(sidebar)) {

      if ('undefined' === typeof sidebar) {
        toggleButton.classList.add('hide');
        return;
      }

      sidebar.setAttribute('aria-expanded', 'false');
      // Absolutely positioned sidebar flows outside of its container, adding space below the footer
      // So, the sidebar's max height is set to the same as the body.
      if (bodyElHeight > window.outerHeight) {
        //sidebar.style.maxHeight = ( bodyElHeight - window.outerHeight ) + 'px';
        sidebar.style.maxHeight = window.outerHeight + 'px';
      } else {
        sidebar.style.maxHeight = bodyElHeight + 'px';
      }


      // set initial menu state here, instead of CSS file, in case JavaScript is turned off in browser.
      sidebar.classList.add('hide');
      if (document.body.contains(toggleButton)) {
        toggleButton.appendChild(chevronLeft);
        toggleButton.setAttribute('title', 'Click or press Enter to open/close the sidebar.');

        toggleButton.onclick = function() {
          if (-1 !== container.className.indexOf('toggled')) {
            container.className = container.className.replace(' toggled', '');
            toggleButton.className = toggleButton.className.replace(' toggled', '');
            toggleButton.setAttribute('aria-expanded', 'false');
            sidebar.setAttribute('aria-expanded', 'false');
            sidebar.classList.add('hide');
            toggleButton.appendChild(chevronLeft);
            toggleButton.removeChild(chevronRight);
          } else {
            container.className += ' toggled';
            toggleButton.className += ' toggled';
            toggleButton.setAttribute('aria-expanded', 'true');
            sidebar.setAttribute('aria-expanded', 'true');
            sidebar.classList.remove('hide');
            toggleButton.removeChild(chevronLeft);
            toggleButton.appendChild(chevronRight);
          }
        };
      }

    }
  }


  function addOverlayToSidebar(e) {
    /* Add a "scrim" div to the bottom of the sidebar when Overlay design is used (sidebar slides in/out) */
    var overlayStylesheet = document.head.querySelector('link[href*="/layouts/content-sidebar-overlay.css"]');
    var theSidebar = document.querySelector('.sidebar-overlay #secondary');
    var theScrim;

    function placeScrim() {
      if (bodyElHeight > window.outerHeight) {
        //console.log( 'sidebar height is: ' + theSidebar.getBoundingClientRect().height );
        theScrim.style.position = 'fixed';
        theScrim.style.bottom = '0px';
        window.addEventListener('scroll', scrimTimeout);
      } else {
        //console.log(document.body.clientHeight);
        //console.log(theSidebar.getBoundingClientRect().height);
        theScrim.style.position = 'fixed';
        theScrim.style.bottom = document.body.clientHeight - theSidebar.getBoundingClientRect().height + 'px';
      }
    }

    function animateScrim() {
      theScrim.classList.add('animated');
      if (window.pageYOffset > theSidebar.getBoundingClientRect().height - window.innerHeight) {
        theScrim.style.opacity = '0';
        theScrim.style.transitionDuration = '1s';
      } else {
        theScrim.style.opacity = '1';
        theScrim.style.transitionDuration = '0.5s';
      }
    }

    function scrimTimeout() {
      scrTimeout = setTimeout(animateScrim, 250);
    }

    if (document.body.contains(theSidebar)) {
      if (overlayStylesheet !== '') {
        theSidebar.insertAdjacentHTML('beforeend', '<div class="scrim"></div>');
      }

      theScrim = document.querySelector('.sidebar-overlay #secondary .scrim');

      placeScrim();
      animateScrim();
      scrimTimeout();
    }

  }

  function toggleSearchbar() {
    /* Toggle search bar with button */

    var searchToggleButton, searchField, searchContainer;

    if (document.body.contains(headerPanel)) { // check if headerPanel exists

      if (document.body.classList.contains('page-template-template-landing') || document.body.classList.contains('woocommerce-page')) {
        return;
      } else {
        // Create and add searchToggleButton to header button panel
        searchToggleButton = document.createElement('button');
        searchIcon = document.createElement('i');
        sIconContent = document.createTextNode('search');

        headerPanel.appendChild(searchToggleButton);
        searchToggleButton.appendChild(searchIcon);
        searchToggleButton.classList.add('search-toggle');

        searchIcon.appendChild(sIconContent);
        searchIcon.classList.add('material-icons');


        // Get the first instance of searchform (class) within .header-button-panel
        searchContainer = document.getElementById('header-button-panel').getElementsByClassName('searchform')[0];
        toggleSearch = document.getElementById('header-button-panel').getElementsByClassName('search-toggle')[0];
        searchField = document.getElementsByClassName('search-field')[0];

        // Set initial search field state here, instead of CSS file, in case JavaScript is turned off in browser.
        searchContainer.setAttribute('aria-expanded', 'false');
        searchContainer.classList.add('hide');

        // Toggle search field
        toggleSearch.onclick = function() {
          if (-1 !== searchContainer.className.indexOf('toggled')) {
            searchContainer.className = searchContainer.className.replace(' toggled', '');
            searchContainer.classList.add('hide');
            searchContainer.setAttribute('aria-expanded', 'false');
          } else {
            searchContainer.className += ' toggled';
            searchContainer.classList.remove('hide');
            searchContainer.setAttribute('aria-expanded', 'true');
          }
        };
      }

    }
  }

  function addDesktopNavButtons() {
    /* Add buttons to the navigation menu for desktop widths */
    // setup variables
    var hasChildren = document.querySelectorAll('.main-navigation .page_item_has_children');
    var hasChildrenLink = document.querySelectorAll('.main-navigation .page_item_has_children > a');
    var customHasChildren = document.querySelectorAll('.main-navigation .menu-item-has-children');
    var customHasChildrenLink = document.querySelectorAll('.main-navigation .menu-item-has-children > a');

    // For custom menus
    for (var i = 0; i < customHasChildren.length; i++) {
      //console.log( customHasChildrenLink[i].parentNode );
      //console.log( customHasChildrenLink[i] );
      // Add button HTML after each link that has the class .menu-item-has-children
      customHasChildrenLink[i].insertAdjacentHTML('afterend', '<button class="menu-down-arrow"><i class="material-icons">arrow_drop_down</i></button>');
    }

    // For page menu fallback
    for (var i2 = 0; i2 < hasChildren.length; i2++) {
      //console.log( hasChildrenLink[i2].parentNode );
      //console.log( hasChildrenLink[i2] );
      // Add button HTML after each link that has the class .page_item_has_children
      hasChildrenLink[i2].insertAdjacentHTML('afterend', '<button class="menu-down-arrow"><i class="material-icons">arrow_drop_down</i></button>');
    }
  }

  function toggleMenuItems() {
    /* The code below roughly follows the Vanilla JS method in the article "Lose the jQuery Bloat" */
    /* https://www.sitepoint.com/dom-manipulation-with-nodelist-js/ */
    // loop through each element that has .sub-menu
    var customSubmenuButton = document.querySelectorAll('.main-navigation .menu-down-arrow, .is-style-the-mx-nav .wp-block-navigation-submenu__toggle');

    for (var iSub = 0; iSub < customSubmenuButton.length; iSub++) {
      // Add click event to the button to show ul.sub-menu
      customSubmenuButton[iSub].addEventListener('click', function() {
        // this refers to the current loop iteration of customSubmenuButton
        // nextElementSibling refers to the neighboring ul with .sub-menu class
        if (this.nextElementSibling.className.indexOf('toggled-submenu') !== -1) { // if .sub-menu has .toggled-submenu class
          this.nextElementSibling.className = this.nextElementSibling.className.replace(' toggled-submenu', ''); // remove it
          this.nextElementSibling.setAttribute('aria-expanded', 'false');
          //console.log( 'button.' + this.className + ' is not toggled' );
        } else {
          this.nextElementSibling.className += ' toggled-submenu'; // otherwise, add it
          this.nextElementSibling.setAttribute('aria-expanded', 'true');
        }
        //console.log( 'button.' + this.className + ' is toggled' );
      });
      //console.log( customSubmenuButton[iSub] );
    } // ends for loop
    
    // Override to remove toggled-submenu class when clicking outside of the nav block
    window.addEventListener('click', function(e) {
    	var navBlock = document.querySelector('.is-style-the-mx-nav');
    	var navBlockSubmenu = document.querySelectorAll('.is-style-the-mx-nav .wp-block-navigation__submenu-container');
    	
    	if (document.body.contains(navBlock) && !navBlock.contains(e.target)) {
    		for (var iSub = 0; iSub < navBlockSubmenu.length; iSub++) {
    			navBlockSubmenu[iSub].classList.remove('toggled-submenu');
    		}
    	}
    });
  }

  function loadInitMenuState() {
    // Loads the menu state depending on screen size at the time of load
    windowWidth = window.innerWidth;
    var customSubmenuButton = document.querySelectorAll('.main-navigation .menu-down-arrow');
    if (typeof(menu) != 'undefined' && menu != null) { // if a menu exists on the page
      if (windowWidth < 600) {
        menu.classList.add('hide');
        for (i = 0; i < customSubmenuButton.length; i++) {
          customSubmenuButton[i].classList.add('hide');
        }
      } else {
        menu.classList.remove('hide');
        for (i = 0; i < customSubmenuButton.length; i++) {
          customSubmenuButton[i].classList.remove('hide');
        }
      }
    }
  }

  function disappearingHeader() {
    if (document.body.classList.contains('page-template-template-landing')) {
      var theHeader = document.querySelector('#masthead');

      var headroom = new Headroom(theHeader);
      headroom.init();
    }
  }


  /* For slider option in the Customizer */

  // Supports up to five galleries

  // Setup global variables for the gallery
  var gallery = document.querySelectorAll('.single.slider .gallery, .single.slider .wp-block-gallery');

  var galleries = [document.querySelector('.single.slider #gallery-1'),
    document.querySelector('.single.slider #gallery-2'),
    document.querySelector('.single.slider #gallery-3'),
    document.querySelector('.single.slider #gallery-4'),
    document.querySelector('.single.slider #gallery-5'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(1)'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(2)'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(3)'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(4)'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(5)')
  ];

  var slides = [document.querySelectorAll('.single.slider #gallery-1 .gallery-item'),
    document.querySelectorAll('.single.slider #gallery-2 .gallery-item'),
    document.querySelectorAll('.single.slider #gallery-3 .gallery-item'),
    document.querySelectorAll('.single.slider #gallery-4 .gallery-item'),
    document.querySelectorAll('.single.slider #gallery-5 .gallery-item'),
    document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(1) .blocks-gallery-item'),
    document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(2) .blocks-gallery-item'),
    document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(3) .blocks-gallery-item'),
    document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(4) .blocks-gallery-item'),
    document.querySelectorAll('.single.slider .wp-block-gallery:nth-of-type(5) .blocks-gallery-item')
  ];
  var i, len;

  // Some of the articles and tutorials consulted for these functions are:
  // Understand JavaScript Closures With Ease- http://javascriptissexy.com/understand-javascript-closures-with-ease/
  // Make a Simple JavaScript Slideshow without jQuery- https://www.sitepoint.com/make-a-simple-javascript-slideshow-without-jquery/ <- for the start and pause functions
  // Closures- https://developer.mozilla.org/en-US/docs/Web/JavaScript/Closures

  function showFirstSlide(arrayOfGals, arrayOfSlides) {
    /* arrayOfGals should be an array of galleries ex. var galleries = [ document.querySelector('.gallery-1'), document.querySelector('.gallery-2') ]; */
    /* arrayOfSlides should be an array of slides within the arrayOfGals ex. var slides = [ document.querySelectorAll('.gallery-1 .slides'), document.querySelectorAll('.gallery-2 .slides') ]; */

    // slides[0] = first location of the array in the slides variable, slides[1] = second, etc.
    // slides[0][0] = first slide inside of the first array

    for (var iGal = 0, len = arrayOfGals.length; iGal < len; iGal++) {
      // Loop through number of galleries
      //console.log('number of galleries: ' + iGal);

      for (var jSlide = 0, lenSlide = arrayOfSlides.length; jSlide < lenSlide; jSlide++) {
        // Loop through each set of slides
        //console.log('number of slides within gallery: ' + arrayOfSlides[jSlide].length); // for debugging
        //console.log(arrayOfSlides[0][0]); // for debugging
        //console.log(arrayOfSlides[jSlide]);

        // We must loop over each slide in the set when using querySelectorAll
        for (var kEachSlide = 0; kEachSlide < arrayOfSlides[jSlide].length; kEachSlide++) {
          //console.log(arrayOfSlides[jSlide][kEachSlide]);

          if (arrayOfSlides[jSlide] !== undefined) {
            //console.log(arrayOfSlides[counter][kEachSlide]);

            // Hide all slides within each slides array
            if (arrayOfSlides[jSlide][kEachSlide]) {
              arrayOfSlides[jSlide][kEachSlide].classList.add('hide');
            }

            // Show first slide within each slides array
            if (arrayOfSlides[jSlide][0]) {
              //console.log(arrayOfSlides[jSlide][0]);
              arrayOfSlides[jSlide][0].classList.remove('hide');
            }
          }
        }
      }
    }
  }

  for (i = 0, len = gallery.length; i < len; i++) {
    // Add slider controls to each gallery
    gallery[i].insertAdjacentHTML('afterend', '<div class="slider-button-panel"><button class="slider-previous"><i class="material-icons">skip_previous</i></button><button class="slider-startshow"><i class="material-icons">play_arrow</i></button><button class="slider-next"><i class="material-icons">skip_next</i></button></div>');
    //console.log(gallery.length);
  }

  // Variables that are defined after our dynamically created buttons/panel
  var buttonPanel = document.querySelectorAll('.single.slider .slider-button-panel');

  var sliderNext = [document.querySelector('.single.slider #gallery-1 + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider #gallery-2 + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider #gallery-3 + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider #gallery-4 + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider #gallery-5 + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-next'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-next')
  ];

  var sliderPrevious = [document.querySelector('.single.slider #gallery-1 + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider #gallery-2 + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider #gallery-3 + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider #gallery-4 + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider #gallery-5 + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-previous'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-previous')
  ];

  var slideshowBtn = [document.querySelector('.single.slider #gallery-1 + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider #gallery-2 + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider #gallery-3 + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider #gallery-4 + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider #gallery-5 + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(1) + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(2) + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(3) + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(4) + .slider-button-panel .slider-startshow'),
    document.querySelector('.single.slider .wp-block-gallery:nth-of-type(5) + .slider-button-panel .slider-startshow')
  ];

  /* Hide any galleries and button panels that are more than five; */
  /* for this we start the counter at 4 */
  for (i = 5, len = gallery.length; i < len; i++) {
    //console.log(gallery[i]);
    gallery[i].classList.add('hide');
  }

  for (i = 5, len = buttonPanel.length; i < len; i++) {
    //console.log(buttonPanel[i]);
    buttonPanel[i].classList.add('hide');
  }

  /* Show each subsequent slide one at a time by clicking the next and previous buttons */
  /* checking if each button exists on the page first */

  function addSlideClickEvents(slideItems, nextBtn, prevBtn, counter) {
    /* Next and previous buttons */
    /* ex: var sliderNext = document.querySelector('.gallery-1 .next-btn'); */
    /*     or var sliderNext = [ document.querySelector('.gallery-1 .next-btn'), document.querySelector('.gallery-2 .next-btn') ]

    /* Slide items */
    /* ex: var slides = document.querySelectorAll('.gallery-1 .gallery-item'); */
    /*     or var slides = [ document.querySelectorAll('.gallery-1 .gallery-item'), document.querySelectorAll('.gallery-2 .gallery-item') ] */

    if (nextBtn !== null) {
      nextBtn.addEventListener('click', function() {
        var currentIndex = counter.value();

        counter.increment();

        //console.log(slideItems.length - 1);
        //console.log(currentIndex + 1);

        slideItems[currentIndex].classList.add('hide');
        if (slideItems[currentIndex + 1] !== undefined) {
          slideItems[0].classList.add('hide');
          slideItems[currentIndex + 1].classList.remove('hide');
        }

        if (currentIndex + 1 === slideItems.length - 1) {
          nextBtn.setAttribute('disabled', '');
        }

        prevBtn.removeAttribute('disabled');
      });
    }

    if (prevBtn !== null) {
      /* Set previous button to disabled on page load, since there are no previous slides. */
      prevBtn.setAttribute('disabled', '');

      prevBtn.addEventListener('click', function() {
        currentIndex = counter.value();

        counter.decrement();

        //console.log(currentIndex - 1);

        if (slideItems[currentIndex - 1] !== undefined) {
          slideItems[currentIndex - 1].classList.remove('hide');
        }
        if (slideItems[currentIndex] !== undefined) {
          slideItems[currentIndex].classList.add('hide');
        }

        if ((currentIndex - 1) === 0) {
          prevBtn.setAttribute('disabled', '');
        }

        nextBtn.removeAttribute('disabled');
      });
    }
  }

  function addSlideshowEvents(slideshowBtn, nextBtn, prevBtn, slideItems, counter) {
    var isPlaying = false;
    var currentIndex = counter.value();
    var slideInterval;

    function startShow() {
      nextBtn.setAttribute('disabled', '');
      prevBtn.setAttribute('disabled', '');
      isPlaying = true;
      slideshowBtn.innerHTML = '<i class="material-icons">pause</i>';

      slideInterval = window.setInterval(incrementSlide, 5000);
    }

    function incrementSlide() {
      if (slideItems[currentIndex] !== undefined) {
        slideItems[currentIndex].classList.add('hide');
      }
      if (slideItems[currentIndex + 1] !== undefined) {
        slideItems[currentIndex + 1].classList.remove('hide');
      }

      if (currentIndex + 1 === slideItems.length - 1) {
        slideshowBtn.innerHTML = '<i class="material-icons">play_arrow</i>';
        isPlaying = false;

      }

      if (currentIndex + 1 === slideItems.length) {
        nextBtn.removeAttribute('disabled');
        clearInterval(slideInterval);
        //console.log(slideItems[slideItems.length - 1]);
        slideItems[0].classList.remove('hide');
      }
      currentIndex++;
    }

    function pauseShow() {
      isPlaying = false;
      slideshowBtn.innerHTML = '<i class="material-icons">play_arrow</i>';
      clearInterval(slideInterval);
    }

    if (slideshowBtn) {
      slideshowBtn.addEventListener('click', function() {
        if (isPlaying === false) {
          startShow();
          //console.log('The slideshow is playing.');
        } else {
          pauseShow();
          //console.log('The slideshow is not playing.');
        }
      });
    }
  }

  function theMXInit() {
    headerTitleRGBA();
    addMobileSocialButton();
    loadInitSocialMenuState();
    toggleSocialPanel();
    socialMediaButtons();
    toggleSidebar();
    addOverlayToSidebar();
    toggleSearchbar();
    addDesktopNavButtons();
    toggleMenuItems();
    loadInitMenuState();
    disappearingHeader();
    showFirstSlide(galleries, slides);

    addSlideClickEvents(slides[0], sliderNext[0], sliderPrevious[0], counter0);
    addSlideClickEvents(slides[1], sliderNext[1], sliderPrevious[1], counter1);
    addSlideClickEvents(slides[2], sliderNext[2], sliderPrevious[2], counter2);
    addSlideClickEvents(slides[3], sliderNext[3], sliderPrevious[3], counter3);
    addSlideClickEvents(slides[4], sliderNext[4], sliderPrevious[4], counter4);
    addSlideClickEvents(slides[5], sliderNext[5], sliderPrevious[5], counter5);
    addSlideClickEvents(slides[6], sliderNext[6], sliderPrevious[6], counter6);
    addSlideClickEvents(slides[7], sliderNext[7], sliderPrevious[7], counter7);
    addSlideClickEvents(slides[8], sliderNext[8], sliderPrevious[8], counter8);
    addSlideClickEvents(slides[9], sliderNext[9], sliderPrevious[9], counter9);

    addSlideshowEvents(slideshowBtn[0], sliderNext[0], sliderPrevious[0], slides[0], counter0);
    addSlideshowEvents(slideshowBtn[1], sliderNext[1], sliderPrevious[1], slides[1], counter1);
    addSlideshowEvents(slideshowBtn[2], sliderNext[2], sliderPrevious[2], slides[2], counter2);
    addSlideshowEvents(slideshowBtn[3], sliderNext[3], sliderPrevious[3], slides[3], counter3);
    addSlideshowEvents(slideshowBtn[4], sliderNext[4], sliderPrevious[4], slides[4], counter4);
    addSlideshowEvents(slideshowBtn[5], sliderNext[5], sliderPrevious[5], slides[5], counter5);
    addSlideshowEvents(slideshowBtn[6], sliderNext[6], sliderPrevious[6], slides[6], counter6);
    addSlideshowEvents(slideshowBtn[7], sliderNext[7], sliderPrevious[7], slides[7], counter7);
    addSlideshowEvents(slideshowBtn[8], sliderNext[8], sliderPrevious[8], slides[8], counter8);
    addSlideshowEvents(slideshowBtn[9], sliderNext[9], sliderPrevious[9], slides[9], counter9);
  }
  document.addEventListener('DOMContentLoaded', theMXInit);

  function theMXResize() {
    var timeOut = setTimeout(function() {
      loadInitMenuState();
      loadInitSocialMenuState();
    }, 250);
  }
  window.addEventListener('resize', theMXResize);
})();
