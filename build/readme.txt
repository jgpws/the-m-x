=== The M.X. ===

Contributors: jgpws
Tags: block-styles, block-patterns, blog, custom-background, custom-colors, custom-header, custom-menu, featured-images, flexible-header, grid-layout, left-sidebar, one-column, post-formats, right-sidebar, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, wide-blocks
Requires at least: 4.0
Requires PHP: 5.6
Tested up to: 5.8.1
Stable tag: 1.4
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0-standalone.html

== Copyright ==

The M.X. WordPress Theme, Copyright 2016-2019 Jason G. Designs
The M.X. is distributed under the terms of the GNU GPL.

== Description ==

The M.X. stands for The Modern Experience. Give your content a trendy new style with Google's Material Design. The M.X. comes out of the box supporting many standard WordPress features, such as the Custom Header (renamed Hero Image), Custom Menus, full sized Featured Images and most of the Post Formats. Don't like a sidebar on every page? The default sidebar slides in on click when needed and out of view when not. In addition, The M.X. has support for the Block Editor, with full width post images, editor color palette and gradients.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

The M.X. includes support for Infinite Scroll and Tiled Galleries in Jetpack.

== Changelog ==

= 1.4.0 February 28 2022 =
Major update adding support for FSE style Headers, adding several new block patterns and block styles.

= 1.3.21 December 06 2021 =
Updated Gallery Block for the upcoming 5.9 release.

= 1.3.20 November 08 2021 =
Bug Fix: Added check in extras.php file to see if WooCommerce is loaded before adding classes. This was preventing the site from loading when WC was not activated!

= 1.3.19 November 08 2021 =
Completed styling for non-block WooCommerce pages; added Customizer options for WooCommerce only sidebars, header cart widget; reorganized structure of WC CSS to load only when WooCommerce is activated.

= 1.3.18 October 24 2021 =
Moved theme support for Gutenberg colors to the new theme.json file; added duotone filter support.

= 1.3.17 October 14 2021 =
Styling for video block captions; added support for responsive embeds; CSS adjustments for widgets/Widget Group block; cleaned up functions.php by placing some functions in inc folder.

= 1.3.16 September 20 2021 =
Added styling for more link inside a paragraph tag.

= 1.3.15 August 27 2021 =
Bug fix: Added null check to the animateCSS function in case the item being animated doesn't exist on the page.

= 1.3.14 August 26 2021 =
Bug fix: wrong version of animate.css enqueued.

= 1.3.13 August 19 2021 =
Refactoring of CSS and inline CSS to use custom properties (variables); added cache busting to some enqueued scripts; removed *-two-values, *-four-values mixins; made featured images in image-grid template expand to horizontal full width, etc.

= 1.3.12 August 9 2021 =
Removed button styling in Gutenberg backend stylesheet; updated animations.js file to use more recent code from Animate.css (a promise based function); animations.js is now a vanilla JS file; fixed matching rtl-animations file; removed Ripple.js add-on script and created my own.

= 1.3.11 February 26 2021 =
Updated to the latest version of animate.css; Added additional layout support for right-to-left languages.

= 1.3.10 January 9 2021 =
Applied the single slider Customizer setting to Block Editor galleries. Code refactoring of single slider functions for less code, smoother animations.

= 1.3.9 January 3 2021 =
CSS fixes for Gutenberg in backend editor.

= 1.3.8 June 28 2020 =
Further styling compatibility for WooCommerce; Most core blocks are now styled; matching for editor styles.

= 1.3.7 June 20 2020 =
Added new Material Design styling for HTML tables. Added styling for WooCommerce Product blocks.

= 1.3.6 May 15 2020 =
Fixed color overrides for Gutenberg generated colors. Added Skrollr compatibility to Gutenberg galleries.

= 1.3.5 May 7 2020 =
Fixed rendering issues for the layout in mobile sizes. Restored proper styling for search results page. Removed duplicate style rules.

= 1.3.4 April 29 2020 =
Fixed bug in the search form. Added margins for 404 page.

= 1.3.3 April 21 2020 =
Added defaults for some Customizer settings on the frontend.

= 1.3.2 April 17 2020 =
Updated CSS for the Image Grid layout to work with the new sidebar options.

= 1.3.1 April 15 2020 =
Fix to update Image Grid CSS for posts and page templates. Removed now unused jgd-material-grid.css file.

= 1.3 April 11 2020 =
Major update introducing left and right fixed sidebar options. Plus, further block editor integrations, including gradient support and button outline styling.

= 1.2.5 April 2 2020 =
Updated backend editor styling file (gutenberg-editor-styles.css); backend CSS wasn't displaying correctly. Added overlay gradient to the hero image for the transparent nav menu.

= 1.2.4 April 1 2020 =
Added Colorbox option to block galleries. Adjusted CSS for the Gallery block and Tiled Gallery to look more similar to the standard gallery. Used jQuery selectors to specify the difference between a link to an image or attachment page in Colorbox, eliminating the need to overwrite this functionality from the Customizer.

= 1.2.3 February 19 2020 =
Fixed issue where social media panel in mobile did not have a background color.

= 1.2.2 December 27 2019 =
Critical fix! Heredoc block had spaces before closing delimiter, producing a fatal syntax error.

= 1.2.1 December 14 2019 =
Regenerated .pot file; removed unneeded files

= 1.2 December 09 2019 =
Updated version includes preset color schemes; Gutenberg colors in post/page editor now reflect the chosen color scheme

= 1.1.5 November 28 2019 =
Added padding around container to site title and subtitle, instead of the elements themselves, so when a title only is displayed, it doesn't display right against the edge of the navigation element

= 1.1.4 November 25 2019 =
Featured Images now use full size image to fit better in its parent container

= 1.1.3 July 28 2019 =
Fixed issue where Skrollr did not scroll to the top of a page in mobile after arriving from a different page. This affected Blink based browsers

= 1.1.2 July 22 to July 23 2019 =
File rearranging for Skrollr effects; Fixed compatibility issues between Skrollr and Jetpack's Infinite Scroll

= 1.1.1 July 20 2019 =
Fixed JavaScript error for social media button container; file cleanup

= 1.1 June 23 2019 to July 19 2019 =
The M.X. now uses Gulp to automate theme development. New support includes CSS prefixes for older browsers, right-to-left support via stylesheet, changes to the files referred to in functions.php (files have been concatenated and minified), other small fixes. Development files are only available at GitHub (http://github.com/jgpws/the-m-x)

= 1.0.25 June 21 2019 =
Fixed issues where default animations were not showing on front end; Where Colorbox links to has been made more specific

= 1.0.24 June 12 2019 =
Fixed issue where theme body did not scroll inside of an iframe; CSS Animations are now turned on by default

= 1.0.23 June 05 2019 =
Added action and method attributes to searchform.php, etc.

= 1.0.22 - May 30 2019 =
Fixed PHP error; Background Color functionality is now working; Fixed cropping error when an image is chosen in the Customizer

= 1.0.21 - May 19 2019 =
More data escaping and translating

= 1.0.19 - May 13 2019 =
Added license for spinner.css file; fixed escaping issues; changed custom page template titles; regenerated pot file

= 1.0.17 - April 3 2019 =
Fixed PHP errors, etc.

= 1.0.16 - March 13 2019 =
Change to readme.txt - Requires PHP added

= 1.0.15 - March 8 2019 =
Added escaping and translation to more strings, etc.

= 1.0.14 - March 1 2019 =
Updated license to GPLv3; Added license information for Themify logo fonts; Changed screenshot, as the former image is no longer compatible with the GPL

= 1.0.13 - December 18 2018 =
Updated frontend and backend styles for Gutenberg's newest iteration; regenerated the theme .pot file for translation; Added a proper theme URI; Adjusted the heading font sizes for responsive viewports; Various small fixes

= 1.0.12 - November 14 2018 =
* Updated readme.txt file

= 1.0 - May 12 2015 =
* Initial release

== Upgrade Notice ==

Please update to the latest version, as an error with HEREDOC blocks was causing a fatal error.

= 1.0 =
* Initial release

== Credits ==

* The M.X. is based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* The M.X. uses code from Twenty Fifteen https://wordpress.org/themes/twentyfifteen/, (C) 2014-2019 WordPress.org & Automattic.com, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Material Design Icons, Copyright 2018 Google, Apache 2.0, http://google.github.io/material-design-icons/
* Themify Icons, Copyright 2019 Lally Elias, SIL Open Font License, https://github.com/lykmapipo/themify-icons
* Animate.css, Copyright 2018 Daniel Eden, MIT, https://daneden.github.io/animate.css/
* Colorbox, Copyright 2016 Jack Moore, MIT, http://www.jacklmoore.com/colorbox/
* jQuery throttle/debounce, Copyright 2010 "Cowboy" Ben Alman, MIT/GPL2, http://benalman.com/projects/jquery-throttle-debounce-plugin/
* Skrollr, Copyright 2012-2014 Alexander Prinzhorn (@Prinzhorn), MIT, https://prinzhorn.github.io/skrollr/
* Ripple.js Copyright (c) 2014 Jacob Kelley, MIT, https://github.com/jakiestfu/Ripple.js
* Spinner.css Copyright (c) 2014-2017 loading.io, CC0, https://loading.io/css/
* headroom.js Copyright (c) 2013 Nick Williams, MIT, https://wicky.nillia.ms/headroom.js/

== About the Screenshot ==

Copyright Free Nature Stock
License: CC0 Creative Commons
Source: https://stocksnap.io/photo/ROOAD1EI11

The screenshot image is not bundled with this theme.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Notes ==

* CSS for style.css minified with CSS Minifier https://cssminifier.com/
* JS for the-mx-scripts.js, animations.js, restore-js.js and jgd-grid.js minified with Minify https://www.minifier.org/
* Sass files are compiled with Ruby on the command line.
