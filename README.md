# The M.X.

* [The M.X. Homepage](https://www.jasong-designs.com/2018/06/07/the-m-x/)
* [Video Tour of The M.X.](https://www.youtube.com/watch?v=lI3ZOMKe6Gs&t=4s)

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

The M.X. uses Gulp 5 on the backend to automate tasks and create a finalized file, suitable for distribution.

The latest version of The M.X. is now designed for placing the development theme outside of the WordPress `wp-content` directory, with the build version symbolically linked to `wp-content`.

### Setup ###

Download, clone or move the theme into a separate folder, preferably one in your Home folder. For instance, I created a `Development` directory in my home directory and placed `the-m-x` parent directory inside.

Next, create a symbolic link. The particular location where WordPress is installed depends on many factors. Therefore, the locations below are where it is typically installed with the part preceding the wordpress folder being the server root. I will use the above Development directory as an example, assuming WordPress is installed inside of a `wordpress` folder.

**For Linux:**

Arch and derivatives:
```
ln -s ~/Development/the-m-x/build srv/http/wordpress/wp-content/themes/the-m-x
```

Ubuntu and derivatives:
```
ln -s ~/Development/the-m-x/build var/www/wordpress/wp-content/themes/the-m-x
```

Depending on how WordPress was installed on Linux, files in your home folder may not have permissions to create a symbolic link or access any files in the server root. In that case, add `sudo` before the link.

```
sudo ln -s ~/Development/...
```

Going further, if you would like your user account to have full access to WordPress installed under a root account, please see the article [Ubuntu Linux, Permissions and a Local WordPress Install](https://www.jasong-designs.com/2012/01/14/ubuntu-linux-permissions-and-a-local-wordpress-install/).

**For MacOS and Windows**

For MacOS and Windows, installation can vary greatly.

On MacOS, WordPress.org has the article [Installing WordPress Locally on Your Mac With MAMP](https://codex.wordpress.org/Installing_WordPress_Locally_on_Your_Mac_With_MAMP). The MAMP document root is referenced in the article.

On Windows, many developers install with WAMP or XAMPP. In these two articles, an install folder is referenced.
* [How to Install XAMPP and WordPress Locally on Windows PC](https://themeisle.com/blog/install-xampp-and-wordpress-locally/)
* [How to Install WordPress on your Windows Computer Using WAMP](https://www.wpbeginner.com/wp-tutorials/how-to-install-wordpress-on-your-windows-computer-using-wamp/)

XAMPP installs by default to `C:\xampp`, while WAMP installs to `C:\wamp64`.

Next, install the needed `node_modules` directory. In a terminal application, navigate to where your development files will be. In this case, it is `Development`.
```
cd Develpment/the-m-x
```
In this directory, type:
```
npm install
```

Here are the commands used inside **gulpfile.js**.

### For Development ###

**For CSS**

**`style`**

Converts SASS into formatted CSS; adds a sourcemap; auto-prefixes vendor extensions; handles and displays SASS errors in the terminal; uses BrowserSync to live reload CSS.

**`gridStyle`**

Processes SASS into CSS for the separate mx-grid.css layout file; sourcemap and autoprefixer included.

**`wcStyle`**

Processes SASS into CSS for mx-woocommerce-styles.css (WooCommerce); same includes as above.

**`minifyStyle`**, **`minifyWCStyle`**

Minifies style.css and mx-woocommerce-styles.css.

**`concatLayoutCSS`**

Concatenates selected supporting CSS files inside of the css folder; Minifies the files into a **layout-styles.min.css** file in a **/css/minfiles** folder.

**`concatAnimCSS`**

Does the same as concatenateCSS, but for selected animation related files. Minifies into **animation-styles.min.css** in **/css/minfiles**.

**`reloadLayoutDir`**, **`reloadAnimDir`**

Live reloads changes in the css folder with BrowserSync.

**For JavaScript**

**`compileJS`**

Uses concatJS (gulp-concat) to concatenate selected JavaScript files into scripts.min.js; includes sourcemaps.

**`compileSepJS`**

Copies standalone JavaScript files to the **/build/css/minfiles** folder; sourcemaps included.

**`jsHint`**

Linting (finding errors)

**`watchTask`**

Uses BrowserSync to load the theme on a live server. Watches for changes in SASS, JavaScript and PHP files and runs the CSS, JavaScript and minification functions; uses BrowserSync to reload the page on change.

### For Build ###

**`buildJSProd`**

Concatenates, minifies selected JavaScript files without sourcemaps, ideal for a production build.

**`buildSepJSProd`**

Same as above, but for individual JS files.

### For Distribution ###

**`cleanMaps`**

Removes the **/maps** directory from **/build**.

**`zipUp`** (This function may soon be replaced by an NPM script)

Takes everything in the **/build** folder and creates a zip archive- **the-m-x.zip** inside of a **/dist** folder.

Gulp 5 runs a series of tasks one after the other. Therefore, The M.X. has export tasks to make things more convenient.

**`finishUp`**

Runs the `cleanMaps` and `zipUp` functions, in order.

**`watchTask`**

Takes the watchTask function listed above and starts BrowserSync at the same time.

**`buildCSS`**

Combines the minification and concatenation functions for CSS into one task. Run with the **--production** flag.

```
gulp buildCSS --production
```

**`buildJS`**

Combines the finalized minification and concatenation functions for JavaScript.

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
