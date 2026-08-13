require("es6-promise").polyfill();

const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sourcemaps = require("gulp-sourcemaps");
const autoprefixer = require("gulp-autoprefixer");
const jshint = require("gulp-jshint");
const plumber = require("gulp-plumber");
const c = require("ansi-colors");
const browserSync = require("browser-sync").create();
const groupmq = require("gulp-group-css-media-queries");
const orderedStreams = require("ordered-read-streams");
const gulpIf = require("gulp-if");
const isProduction = process.argv.includes("--production");

const cleanCSS = require("gulp-clean-css");
const uglify = require("gulp-terser");
const concatCSS = require("gulp-concat");
const concatJS = require("gulp-concat");

const zip = require("gulp-zip");
const del = require("del");
const rename = require("gulp-rename");
const reloadBrowser = browserSync.reload;

const { series } = require("gulp");
const { parallel } = require("gulp");

const jsFiles = [
  "./build/js/source/the-mx-scripts.js",
  "./build/js/source/navigation.js",
  "./build/js/source/skip-link-focus-fix.js",
  "./build/js/source/animations.js",
  "./build/js/source/rtl-animations.js",
  "./build/js/source/colorbox-main.js",
  "./build/js/source/restore-js.js",
];

const layoutStyles = [
  "./build/css/layouts/mx-grid.css",
  "./build/css/layouts/content-sidebar-overlay.css",
  "./build/css/layouts/content-sidebar.css",
  "./build/css/layouts/sidebar-content.css",
  "./build/css/layouts/rtl.css",
];
const animStyles = [
  "./build/css/vendor/animate.css",
  "./build/css/vendor/spinner.css",
];
const jsSepFiles = [
  "./build/js/source/add-skrollr-data-attributes.js",
  "./build/js/source/mx-skrollr-init.js",
];

function createOrderedStream(fileArray, options = {}) {
  const defaultOptions = Object.assign({ read: true }, options);
  const streams = fileArray.map((path) => gulp.src(path, defaultOptions));
  return orderedStreams(streams);
}

var onError = function (err) {
  console.log("An error occurred:", c.magenta(err.message));
  this.emit("end");
};

// Development tasks

// Styles
function style() {
  return (
    gulp
      .src([
        "./sass/**/*.scss",
        "!./sass/layout/mx-grid.scss",
        "!./sass/site/primary/mx-woocommerce-styles.scss",
      ])
      .pipe(plumber({ errorHandler: onError }))
      .pipe(gulpIf(!isProduction, sourcemaps.init()))
      .pipe(sass())
      .pipe(autoprefixer())
      //.pipe(groupmq()) // Uncomment, then run style before running minifyStyle; incompatible with gulp-sourcemaps
      .pipe(gulpIf(!isProduction, sourcemaps.write("./maps")))
      .pipe(gulp.dest("./build"))
      .pipe(browserSync.stream())
  );
}

function gridStyle() {
  return gulp
    .src("./sass/layout/mx-grid.scss")
    .pipe(plumber({ errorHandler: onError }))
    .pipe(gulpIf(!isProduction, sourcemaps.init()))
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulpIf(!isProduction, sourcemaps.write("../../maps")))
    .pipe(gulp.dest("./build/css/layouts/"))
    .pipe(browserSync.stream());
}

function wcStyle() {
  return gulp
    .src("./sass/site/primary/mx-woocommerce-styles.scss")
    .pipe(gulpIf(!isProduction, sourcemaps.init()))
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulpIf(!isProduction, sourcemaps.write("../../maps")))
    .pipe(gulp.dest("./build/css/source/"))
    .pipe(browserSync.stream());
}

// Run minify functions with --production to exclude sourcemaps
function minifyStyle() {
  return gulp
    .src("./build/style.css")
    .pipe(gulpIf(!isProduction, sourcemaps.init({ loadMaps: true })))
    .pipe(cleanCSS())
    .pipe(
      rename({
        suffix: ".min",
      })
    )
    .pipe(gulpIf(!isProduction, sourcemaps.write("./maps")))
    .pipe(gulp.dest("./build"))
    .pipe(browserSync.stream());
}

function minifyWCStyle() {
  return gulp
    .src("./build/css/source/mx-woocommerce-styles.css")
    .pipe(gulpIf(!isProduction, sourcemaps.init({ loadMaps: true })))
    .pipe(cleanCSS())
    .pipe(
      rename({
        suffix: ".min",
      })
    )
    .pipe(gulpIf(!isProduction, sourcemaps.write("../../maps")))
    .pipe(gulp.dest("./build/css/minfiles"))
    .pipe(browserSync.stream());
}

// Adjust rtl.css file manually

function concatLayoutCSS() {
  return createOrderedStream(layoutStyles)
    .pipe(gulpIf(!isProduction, sourcemaps.init({ loadMaps: true })))
    .pipe(concatCSS("layout-styles.css"))
    .pipe(cleanCSS())
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulpIf(!isProduction, sourcemaps.write("../../maps")))
    .pipe(gulp.dest("./build/css/minfiles"))
    .pipe(browserSync.stream());
}

function concatAnimCSS() {
  return createOrderedStream(animStyles)
    .pipe(gulpIf(!isProduction, sourcemaps.init({ loadMaps: true })))
    .pipe(concatCSS("animation-styles.min.css"))
    .pipe(cleanCSS())
    .pipe(gulpIf(!isProduction, sourcemaps.write("../../maps")))
    .pipe(gulp.dest("./build/css/minfiles"));
}

function reloadLayoutDir() {
  return gulp.src(layoutStyles).pipe(browserSync.stream());
}

function reloadAnimDir() {
  return gulp.src(animStyles).pipe(browserSync.stream());
}

// Scripts
function compileJS() {
  return createOrderedStream(jsFiles)
    .pipe(sourcemaps.init())
    .pipe(concatJS("scripts.min.js"))
    .pipe(sourcemaps.write("../../maps"))
    .pipe(gulp.dest("./build/js/minfiles"));
}

function buildJSProd() {
  return createOrderedStream(jsFiles)
    .pipe(concatJS("scripts.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest("./build/js/minfiles"));
}

function compileSepJS() {
  return gulp
    .src(jsSepFiles)
    .pipe(sourcemaps.init())
    .pipe(sourcemaps.write("../../maps"))
    .pipe(gulp.dest("./build/js/minfiles"));
}

function buildSepJSProd() {
  return gulp
    .src(jsSepFiles)
    .pipe(uglify())
    .pipe(
      rename({
        suffix: ".min",
      })
    )
    .pipe(gulp.dest("./build/js/minfiles"));
}

function jsHint() {
  return gulp
    .src("./build/js/source/*.js")
    .pipe(jshint())
    .pipe(jshint.reporter("default"));
}

function browsersyncStart() {
  browserSync.init({
    proxy: "localhost/wordpress/",
  });
}

function watchTask(cb) {
  gulp.watch("./sass/**/*.scss", style);
  gulp.watch("./sass/layout/mx-grid.scss", gridStyle);
  gulp.watch(
    "./sass/site/primary/mx-woocommerce-styles.scss",
    series(wcStyle, minifyWCStyle)
  );
  //gulp.watch('.build/js/source/*.js', jsHint);
  gulp.watch(jsFiles, compileJS);
  gulp.watch(jsSepFiles, compileSepJS);
  gulp.watch("./build/style.css", minifyStyle);
  gulp.watch(layoutStyles, series(concatLayoutCSS, reloadLayoutDir));
  gulp.watch(animStyles, series(concatAnimCSS, reloadAnimDir));
  gulp.watch("./build/**/*.php").on("change", reloadBrowser);
  gulp.watch("./build/js/**/*.js").on("change", reloadBrowser);
  cb();
}

// Utility functions
function zipUp(done) {
  return gulp
    .src("build/**/*")
    .pipe(zip("the-m-x.zip"))
    .pipe(gulp.dest("dist"));
  done();
}

function cleanMaps() {
  console.log("Sourcemaps removed from build folder.");
  return del(["./build/maps"]);
}

exports.default = series(
  style,
  gridStyle,
  concatLayoutCSS,
  minifyStyle,
  watchTask
);
exports.compileJS = compileJS;
exports.style = style;
exports.gridStyle = gridStyle;
exports.wcStyle = wcStyle;
exports.minifyStyle = minifyStyle;
exports.minifyWCStyle = minifyWCStyle;
exports.concatLayoutCSS = concatLayoutCSS;
exports.concatAnimCSS = concatAnimCSS;
exports.jsHint = jsHint;

exports.zipUp = zipUp;
exports.finishUp = series(cleanMaps, zipUp);
exports.watchTask = parallel(browsersyncStart, watchTask);
exports.buildCSS = series(
  minifyStyle,
  minifyWCStyle,
  concatLayoutCSS,
  concatAnimCSS
); // Run with --production flag for final build
exports.buildJS = series(buildJSProd, buildSepJSProd);
