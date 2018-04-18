# The M.X.

Visit The M.X. temporary [Homepage](http://www.jasong-designs.com/tag/the-m-x/) for more information including images.

The M.X. stands for *The Modern Experience*.

Give your content a trendy new style with Google's Material Design. The M.X. comes out of the box supporting many standard WordPress features, such as the Custom Header (renamed Hero Image), Custom Menus, full sized Featured Images and most of the Post Formats.

Don't like a sidebar on every page? The sidebar slides in on click when needed and out of view when not. In addition, The M.X. has support for Gutenberg, with full width post images and editor color palette.

## In Beta

Currently, The M.X. is not a production ready theme and *may* not be 100% useful on an existing website. In my opinion, it is useful if making sure certain features are turned off.

In the Customizer:

* Under **Gallery Settings**, uncheck **Enable/disable the gallery to be shown as a slider on single posts**. ~~When galleries in single posts are shown as a slider, the back button does not go to the previous slide. I haven't figured out a fix for this yet, but there is an open question on Stack Overflow for anyone interested in helping with this.~~ I've now found a solution listed below in the Fixes section. Also, the slideshow feature hasn't yet been implemented.

* Under **Animation**, right now, animations on scroll (with Skrollr.js) do not play nicely with Colorbox. To enable Colorbox, go to **Gallery Settings** and check **Enable/disable Colorbox for the gallery**. Skrollr uses a method when in mobile, it fixes the viewport in place and scrolls the content using CSS transforms. Fixed type elements such as Colorbox popups are fixed to the scroll location. Thus, they don't appear on screen. I tested this in Firefox and Chromium. Chromium does place the popups on screen but in its scroll location, while Firefox doesn't place them on screen at all. Temporarily, until I fix this, one on these features should be used or the other.

* More features are on the way! I still need to add a few Page Templates (dependent on whether Gutenberg will support page templates on launch).

___

Fixes:

* I've now found a solution for the previous slider button to work as expected; it is on the updated [Stack Overflow](https://stackoverflow.com/questions/47999831/slider-previous-button-hides-first-slide-instead-of-previous-slide) page.

* Some small CSS tweaks to make the theme look better were made, including shrinking the width of the content area for the standard layout (Centered layout). This provides a shorter line length across.

* Even though I shrank the entire content area, elements that have .alignfull and .alignwide applied in Gutenberg still span past the content area's boundaries.

___

Newest additions:

* Custom logo support has now been added!
* "Wide" layout mode added to the Customizer, suitable for the incoming Gutenberg editor
* Ripple effect on menu items; more may be added as needed

___

I figured since this theme was taking such a long time to develop, releasing it here in beta is the best option at this point. This will allow people to see the code and perhaps contribute.

This page will update as the theme is developed.
