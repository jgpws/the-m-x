# The M.X.

* [The M.X. Homepage](https://www.jasong-designs.com/2018/06/07/the-m-x/)

The M.X. stands for *The Modern Experience*.

Give your content a trendy new style with Google's Material Design. The M.X. comes out of the box supporting many standard WordPress features, such as the Custom Header (renamed Hero Image), Custom Menus, full sized Featured Images and most of the Post Formats.

Don't like a sidebar on every page? The sidebar slides in on click when needed and out of view when not. In addition, The M.X. has support for Gutenberg, with full width post images and editor color palette.

## Installation Instructions

* Click the **Clone or download** button, then from the dropdown, **Download ZIP**
* This will likely download to a Downloads or My Downloads folder on your computer
* Login to WordPress
* In the WordPress dashboard, click **Themes** under the **Appearance** menu item
* Click **Add New**
* Then click **Upload theme**
* Click the **Browse** button and navigate to where the zip file is (Downloads folder). Browse may be named something else depending on your operating system.
* Click **Install Now**

___

## Needed Fixes

In the Customizer:

* Under **Gallery Settings**, uncheck **Enable/disable the gallery to be shown as a slider on single posts**. ~~When galleries in single posts are shown as a slider, the back button does not go to the previous slide. I haven't figured out a fix for this yet, but there is an open question on Stack Overflow for anyone interested in helping with this.~~ I've now found a solution listed below in the Fixes section.

* Under **Animation**, right now, animations on scroll (with Skrollr.js) do not play nicely with Colorbox. To enable Colorbox, go to **Gallery Settings** and check **Enable/disable Colorbox for the gallery**. Skrollr uses a method when in mobile, it fixes the viewport in place and scrolls the content using CSS transforms. Fixed type elements such as Colorbox popups are fixed to the scroll location. Thus, the popups don't appear on screen when they are scrolled out of view. I tested this in Firefox and Chromium. Chromium places the popups on screen but in its scroll location, while Firefox doesn't place them on screen at all. Temporarily, until I fix this, one on these features should be used *or* the other.

___

## Fixes

* I've now found a solution for the previous slider button to work as expected; it is on the updated [Stack Overflow](https://stackoverflow.com/questions/47999831/slider-previous-button-hides-first-slide-instead-of-previous-slide) page.

* Some small CSS tweaks to make the theme look better were made, including shrinking the width of the content area for the standard layout (Centered layout). This provides a shorter line length across.

* After shrinking the entire content area, elements that have .alignfull and .alignwide apply correctly in Gutenberg, spanning past the content area's boundaries.

* In version 1.2.5, I used jQuery selectors in combination with Colorbox to differentiate between loading images or attachment pages. This removes the need for using a Customizer control to override the user "link to" selection for galleries. Colorbox now also works with block galleries.

___

## Optional fixes

On the last update, I ran The M.X. through Theme Check in preparation for wp.org. One thing that is not allowed is hiding the admin bar for any purpose. So I removed the CSS code that hides the admin bar in Colorbox windows. It made sense to originally hide the admin bar there, as it only shows an attachment page or an image. To restore this functionality, you can add the CSS code below to the WordPress **Additional CSS** section in the Customizer.

```
body.attachment.admin-bar.colorbox #wpadminbar {
  display: none;
}

body.attachment.admin-bar.colorbox {
  margin-top: -46px;
}

@media screen and (min-width: 783px) {
  body.attachment.admin-bar.colorbox {
    margin-top: -32px;
  }
}
```

___

## Gulp Commands

The M.X. uses Gulp 4 on the backend to automate tasks and create a finalized file, suitable for distribution. Here are the commands used inside **gulpfile.js**.

### For Development ###

**`style`**

Converts SASS into formatted CSS; adds a sourcemap; auto-prefixes vendor extensions; handles and displays SASS errors in the terminal; uses BrowserSync to live reload CSS.

**`minifyStyle`**

Minifies style.css.

**`concatenateCSS`**

Concatenates selected supporting CSS files inside of the css folder; Minifies the files into a **supporting-styles.min.css** file in a **/css/minfiles** folder.

**`concatAnimCSS`**

Does the same as concatenateCSS, but for selected animation related files. Minifies into **animation-styles.min.css** in **/css/minfiles**.

**`reloadCSSDir`**

Live reloads changes in the css folder with BrowserSync.

**`scripts`**

Takes all non-vendor (3rd Party) JavaScript files, concatenates and minifies them into **scripts.min.js**; adds a sourcemap.

**`minifyJS`**

Minifies JavaScript files that need to be loaded individually.

**`jsHint`**

Linting (finding errors)

**`rtl`**

Generates a right-to-left stylesheet.

**`watch`**

Uses BrowserSync to load the theme on a live server. Watches for changes in SASS, JavaScript and PHP files and runs the **style**, **script** and minification functions; uses BrowserSync to reload the page on change.

### For Distribution ###

Each of these commands copy files to a **/dist** folder that mirrors the production theme file structure, leaving out any other filetypes than the ones specified.

**`copyMainFiles`**

Copies the top level php, css files, readme.txt and screenshot.png.

**`copyCSS`**

Copies **/css** folder.

**`copyCSSImgs`**

Copies CSS images to **/dist/css/images**

**`copyFonts`**

Copies Themify icon fonts.

**`copyInc`**

Copies the **/inc** folder (PHP includes)

**`copyJS`**

Copies JavaScript files.

**`copyLang`**

Copies .pot file for translation.

**`copyMaps`**

Copies all sourcemaps.

**`copyPageTemplates`**

Copies page templates.

**`copySass`**

Copies SASS files.

**`copyTempParts`**

Copies theme template parts.

**`zipUp`**

Takes everything in the **/dist** folder and creates a zip archive- **the-m-x.zip**.

**`clean`**

Deletes everything in the **/dist** folder.

**`cleanAfterZip`**

Deletes everything in the **/dist** folder, except **the-m-x.zip**

Gulp 4 runs a series of tasks one after the other. Therefore, The M.X. has export tasks to make things more convenient.

**`copyFiles`**

Cleans the **/dist** folder; runs each of the copy commands one after another.

**`finishUp`**

Creates the zip file; cleans with **cleanAfterZip**.

___

## Newest additions

* Custom logo support has now been added!
* "Wide" layout mode added to the Customizer, suitable for the WP 5.0 block editor
* Ripple effect on menu items; more may be added as needed
* The animations for the gallery slider option on single pages have been completed! This includes transitions between each slide on click and when playing on a timed slideshow. Also, the galleries themselves have been given a new look with new icons
* I added a page preloading spinner (optional with **Enable simple animations...** turned on)
* Optional social media icons via the **Social Profiles** menu. To use, simply include a link with the top level domain of some of the popular social networks. Icons will appear on the front with links to your social profiles or pages
* Currently supported icons: Facebook, Twitter, Instagram, Pinterest, GitHub :), Tumblr, WordPress (.org and .com), YouTube, Vimeo, Flickr and Google+
* Version 1.2 features preset color schemes, similar to the ones in Twenty Fifteen and Twenty Sixteen. The color schemes are Default (Brown), Blue Gray, Deep Purple, Pale Orange, Black, and White

___

The theme's location here at GitHub is now the development version, while the production version is at WordPress.org: <https://wordpress.org/themes/the-m-x/>

This page will update as the theme is developed.
