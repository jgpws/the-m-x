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

The M.X. uses Gulp 4 on the backend to automate tasks and create a finalized file, suitable for distribution.

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

Finally, we need to generate the `build` folder that WordPress is linked to. For that, there is a convenient `restoreFiles` function.
```
gulp restoreFiles
```

Here are the commands used inside **gulpfile.js**.

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

**`minifyJS`**

Takes all non-vendor (3rd Party) JavaScript files, concatenates and minifies them into **scripts.min.js**; adds a sourcemap.

**`minifySepJS`**

Minifies JavaScript files that need to be loaded individually.

**`jsHint`**

Linting (finding errors)

**`rtl`**

Generates a right-to-left stylesheet.

**`watch`**

Uses BrowserSync to load the theme on a live server. Watches for changes in SASS, JavaScript and PHP files and runs the **style**, **script** and minification functions; uses BrowserSync to reload the page on change.

### For Build ###

Each of these commands copy files to the **/build** folder that mirrors the production theme file structure, leaving out any other filetypes than the ones specified.

**`copyMainFiles`**

Copies the top level css files, readme.txt and screenshot.png.

**`copyPHP`**

Copies the top level php files.

**`copyCSS`**

Copies **/css** folder.

**`copyRTL`**

Copies **rtl.css** file.

**`copyCSSLayout`**

Copies **/css/layouts** folder.

**`copyCSSImgs`**

Copies CSS images to **/dist/css/images**

**`copyFonts`**

Copies Themify icon fonts.

**`copyInc`**

Copies the **/inc** folder (PHP includes)

**`copyJS`**

Copies JavaScript files.

**`copyJSSrc`**

Copies select files in **/js/source** to be minified/concatenated.

**`copyJSSep`**

Copies select files in **/js/source** only to be minified.

**`copyLang`**

Copies .pot file for translation.

**`copyMaps`**

Copies **/maps** folder (sourcemaps).

**`copyPageTemplates`**

Copies page templates.

**`copySass`**

Copies SASS files.

**`copyTempParts`**

Copies theme template parts.

**`clean`**

Deletes everything in the **/build** folder.

### For Distribution ###

**`cleanMaps`**

Removes the **/maps** directory from **/build**.

**`zipUp`**

Takes everything in the **/build** folder and creates a zip archive- **the-m-x.zip** inside of a **/dist** folder.

Gulp 4 runs a series of tasks one after the other. Therefore, The M.X. has export tasks to make things more convenient.

**`restoreFiles`**

Cleans the **/build** folder; runs each of the copy commands one after another.

**`finishUp`**

Runs the `cleanMaps` and `zipUp` functions, in order.

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
