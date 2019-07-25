require('es6-promise').polyfill();

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
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

var supStyles = [	'./css/layouts/jgd-material-grid.css',
						'./css/vendor/themify-icons.css' ];
var animStyles = [ 	'./css/vendor/animate.css',
							'./css/vendor/ripple.css',
							'./css/vendor/spinner.css' ];
var jsFiles = [ 	'./js/source/jgd-grid.js',
						'./js/source/the-mx-scripts.js',
						'./js/source/navigation.js',
						'./js/source/skip-link-focus-fix.js',
						'./js/source/animations.js',
						'./js/source/colorbox-main.js',
						'./js/source/restore-js.js' ];
var jsSepFiles = [	'./js/source/add-skrollr-data-attributes.js',
							'./js/source/skrollr-infinite-init.js'	];

var onError = function(err) {
	console.log('An error occurred:', c.magenta(err.message));
	this.emit('end');
};


// Development tasks

// Styles
function style() {
	return gulp.src('./sass/**/*.scss')
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
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream());
}

function minifyStyle(done) {
	return gulp.src('./style.css')
		.pipe(cleanCSS())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream());
	done();
}

function concatenateCSS() {
	return gulp.src(supStyles)
		.pipe(concatCSS('supporting-styles.min.css'))
		.pipe(cleanCSS())
		.pipe(gulp.dest('./css/minfiles'))
		.pipe(browserSync.stream());
}

function concatAnimCSS() {
	return gulp.src(animStyles)
		.pipe(concatCSS('animation-styles.min.css'))
		.pipe(cleanCSS())
		.pipe(gulp.dest('./css/minfiles'));
}

function reloadCSSDir() {
	return gulp.src('./css/**/*.css', '!./css/vendor/*.css')
		.pipe(browserSync.stream());
}

// Scripts
function scripts() {
	return pipeline(
		gulp.src(jsFiles),
		sourcemaps.init(),
		concatJS('scripts.min.js'),
		uglify(),
		sourcemaps.write('../../maps'),
		gulp.dest('./js/minfiles')
	);
}

function minifyJS() {
	return pipeline(
		gulp.src(jsSepFiles),
		uglify(),
		rename({
			suffix: '.min'
		}),
		gulp.dest('./js/minfiles')
	);
}

function jsHint() {
	return gulp.src('./js/source/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
}

function rtl(done) {
	return gulp.src('./style.css')
		.pipe(rtlcss())
		.pipe(rename({ basename: 'rtl' }))
		.pipe(gulp.dest('./'));
	done();
}

function watch() {
	browserSync.init({
		proxy: 'http://localhost/wordpress/'
	});
	gulp.watch('./sass/**/*.scss', style);
	//gulp.watch('./js/source/*.js', jsHint);
	gulp.watch(jsFiles, scripts);
	gulp.watch(jsSepFiles, minifyJS);
	gulp.watch('./style.css', minifyStyle);
	gulp.watch(supStyles, concatenateCSS);
	gulp.watch('./css/**/*.css', reloadCSSDir);
	gulp.watch('./**/*.php').on('change', reloadBrowser);
	gulp.watch('./js/**/*.js').on('change', reloadBrowser);
}

// Copying files to dist/ folder
function copyMainFiles(done) {
	gulp.src([
		'./*.php',
		'!./dist/*.php',
		'./*.css',
		'!./dist/*.css',
		'readme.txt',
		'!./dist/readme.txt',
		'./screenshot.png',
		'!./dist/screenshot.png'
	])
		.pipe(gulp.dest('./dist/'));
	done();
}

function copyCSS(done) {
	gulp.src('./css/**/*.css')
		.pipe(gulp.dest('./dist/css'));
	done();
	console.log('CSS folder copied.');
}

function copyCSSImgs(done) {
	gulp.src('./css/images/*')
		.pipe(gulp.dest('./dist/css/images'));
	done();
}

function copyFonts(done) {
	gulp.src('./fonts/*')
		.pipe(gulp.dest('./dist/fonts'));
	done();
	console.log('Fonts folder copied.');
}

function copyInc(done) {
	gulp.src('./inc/**/*.php')
	.pipe(gulp.dest('./dist/inc'));
	done();
	console.log('Inc folder copied.');
}

function copyJS(done) {
	gulp.src('./js/**/*.js')
	.pipe(gulp.dest('./dist/js'));
	done();
	console.log('JS folder copied.');
}

function copyLang(done) {
	gulp.src('./languages/*')
	.pipe(gulp.dest('./dist/languages'));
	done();
	console.log('Languages folder copied.');
}

function copyLayouts(done) {
	gulp.src('./layouts/*.css')
	.pipe(gulp.dest('./dist/layouts'));
	done();
	console.log('Layouts folder copied.');
}

function copyMaps(done) {
	gulp.src('./maps/*.map')
	.pipe(gulp.dest('./dist/maps'));
	done();
	console.log('Maps folder copied');
}

function copyPageTemplates(done) {
	gulp.src('./page-templates/*.php')
	.pipe(gulp.dest('./dist/page-templates'));
	done();
	console.log('Page-Templates folder copied.')
}

function copySass(done) {
	gulp.src('./sass/**/*.scss')
	.pipe(gulp.dest('./dist/sass'));
	done();
	console.log('Sass folder copied.');
}

function copyTempParts(done) {
	gulp.src('./template-parts/*.php')
	.pipe(gulp.dest('./dist/template-parts'))
	done();
	console.log('Template-parts folder copied');
}

function zipUp(done) {
	return gulp.src('dist/**/*')
		.pipe(zip('the-m-x.zip'))
		.pipe(gulp.dest('dist'))
	done();
}

function clean(done) {
	return del([ 
		'./dist/**/*'
	]);
	done();
}

function cleanAfterZip() {
	return del([
		'./dist/**/*',
		'!./dist/the-m-x.zip'
	]);
}

exports.default = series(style, concatenateCSS, minifyStyle, scripts, minifyJS, watch);
exports.style = style;
exports.rtl = rtl;
exports.minifyStyle = minifyStyle;
exports.concatenateCSS = concatenateCSS;
exports.concatAnimCSS = concatAnimCSS;
exports.scripts = scripts;
exports.minifyJS = minifyJS;
exports.jsHint = jsHint;
exports.copyFiles = series(clean, copyMainFiles, copyCSS, copyCSSImgs, copyFonts, copyInc, copyJS, copyLang, copyLayouts, copyMaps, copyPageTemplates, copySass, copyTempParts);
exports.zipUp = zipUp;
exports.clean = clean;
exports.finishUp = series(zipUp, cleanAfterZip);
exports.watch = parallel(watch, rtl);
