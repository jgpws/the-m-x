require('es6-promise').polyfill();

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var newer = require('gulp-newer');
var mode = require('gulp-mode')();
var autoprefixer = require('gulp-autoprefixer');
var jshint = require('gulp-jshint');
var rtlcss = require('gulp-rtlcss');
var plumber = require('gulp-plumber');
const c = require('ansi-colors');
var browserSync = require('browser-sync').create();
var reloadBrowser = browserSync.reload;
var pipeline = require('readable-stream').pipeline;
const groupmq = require('gulp-group-css-media-queries');

var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var concatCSS = require('gulp-concat-css');
var concatJS = require('gulp-concat');

const zip = require('gulp-zip');
const del = require('del');
var rename = require('gulp-rename');

const { series } = require('gulp');
const { parallel } = require('gulp');

var layoutStyles = [	'./build/css/layouts/mx-grid.css',
 							'./build/css/layouts/content-sidebar-overlay.css',
							'./build/css/layouts/content-sidebar.css',
							'./build/css/layouts/sidebar-content.css',
              './build/css/layouts/rtl.css'];
var animStyles = [ 	'./build/css/vendor/animate.css',
							'./build/css/vendor/spinner.css' ];
var jsFiles = [ 	'./build/js/source/jgd-grid.js',
						'./build/js/source/the-mx-scripts.js',
						'./build/js/source/navigation.js',
						'./build/js/source/skip-link-focus-fix.js',
						'./build/js/source/animations.js',
            './build/js/source/rtl-animations.js',
						'./build/js/source/colorbox-main.js',
						'./build/js/source/restore-js.js' ];
var jsSepFiles = [	'./build/js/source/add-skrollr-data-attributes.js',
							'./build/js/source/mx-skrollr-init.js'	];

var onError = function(err) {
	console.log('An error occurred:', c.magenta(err.message));
	this.emit('end');
};


// Development tasks

// Styles
function style() {
	return gulp.src(['./sass/**/*.scss', '!./sass/layout/mx-grid.scss'])
		.pipe(plumber({ errorHandler: onError }))
		.pipe(sourcemaps.init())
		.pipe(sass({
			indentType: 'tab',
			indentWidth: 1,
			outputStyle: 'expanded',
		}))
		.pipe(autoprefixer())
		//.pipe(groupmq()) // Uncomment, then run style before running minifyStyle; incompatible with gulp-sourcemaps
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest('./build'))
		.pipe(browserSync.stream());
}

function gridStyle() {
	return gulp.src('./sass/layout/mx-grid.scss')
		.pipe(plumber({ errorHandler: onError }))
		.pipe(mode.development(sourcemaps.init()))
		.pipe(sass({
			indentType: 'tab',
			indentWidth: 1,
			outputStyle: 'expanded',
		}))
		.pipe(autoprefixer())
		.pipe(mode.development(sourcemaps.write('../../maps')))
		.pipe(gulp.dest('./build/css/layouts/'))
		.pipe(browserSync.stream());
}

function minifyStyle(done) {
	return gulp.src('./build/style.css')
		.pipe(cleanCSS())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('./build'))
		.pipe(browserSync.stream());
	done();
}

// Adjust rtl.css file manually

function concatLayoutCSS() {
	return gulp.src(layoutStyles)
		.pipe(concatCSS('layout-styles.min.css'))
		.pipe(cleanCSS())
		.pipe(gulp.dest('./build/css/minfiles'))
		.pipe(browserSync.stream());
}

function concatAnimCSS() {
	return gulp.src(animStyles)
		.pipe(concatCSS('animation-styles.min.css'))
		.pipe(cleanCSS())
		.pipe(gulp.dest('./build/css/minfiles'));
}

function reloadLayoutDir() {
	return gulp.src(layoutStyles)
		.pipe(browserSync.stream());
}

function reloadAnimDir() {
	return gulp.src(animStyles)
		.pipe(browserSync.stream());
}

// Scripts
function minifyJS() {
  return pipeline(
    gulp.src(jsFiles),
    mode.development(sourcemaps.init()),
    concatJS('scripts.min.js'),
    mode.production(uglify()),
    mode.development(sourcemaps.write('../../maps')),
    gulp.dest('./build/js/minfiles')
  );
}

function minifySepJS() {
	return pipeline(
		gulp.src(jsSepFiles),
    mode.development(sourcemaps.init()),
		mode.production(uglify()),
		rename({
			suffix: '.min'
		}),
    mode.development(sourcemaps.write('../../maps')),
		gulp.dest('./build/js/minfiles')
	);
}

function jsHint() {
	return gulp.src('./build/js/source/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
}

function watch() {
	browserSync.init({
		proxy: 'localhost/wordpress/'
	});
	gulp.watch('./sass/**/*.scss', style);
	gulp.watch('./sass/layout/mx-grid.scss', gridStyle);
	//gulp.watch('.build/js/source/*.js', jsHint);
	gulp.watch(jsFiles, minifyJS);
	gulp.watch(jsSepFiles, minifySepJS);
  gulp.watch('./build/style.css', minifyStyle);
	gulp.watch(layoutStyles, series(concatLayoutCSS, reloadLayoutDir));
	gulp.watch(animStyles, series(concatAnimCSS, reloadAnimDir));
	gulp.watch('./build/**/*.php').on('change', reloadBrowser);
	gulp.watch('./build/js/**/*.js').on('change', reloadBrowser);
}

// Utility functions
function zipUp(done) {
	return gulp.src('build/**/*')
		.pipe(zip('the-m-x.zip'))
		.pipe(gulp.dest('dist'))
	done();
}

function cleanMaps(done) {
  return del([
    './build/maps'
  ]);
  done();
  console.log('Sourcemaps removed from build folder.');
}

function cleanAfterZip() {
	return del([
		'./dist/**/*',
		'!./dist/the-m-x.zip'
	]);
}

exports.default = series(style, gridStyle, concatLayoutCSS, minifyStyle, minifyJS, minifySepJS, watch);
exports.style = style;
exports.gridStyle = gridStyle;
exports.minifyStyle = minifyStyle;
exports.concatLayoutCSS = concatLayoutCSS;
exports.concatAnimCSS = concatAnimCSS;
exports.minifyJS = minifyJS;
exports.minifySepJS = minifySepJS;
exports.jsHint = jsHint;

exports.zipUp = zipUp;
exports.finishUp = series(cleanMaps, zipUp);
exports.watch = watch;
