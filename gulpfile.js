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

var layoutStyles = [	'./css/layouts/mx-grid.css',
 							'./css/layouts/content-sidebar-overlay.css',
							'./css/layouts/content-sidebar.css',
							'./css/layouts/sidebar-content.css',
              './css/layouts/rtl.css'];
var animStyles = [ 	'./css/vendor/animate.css',
							'./css/vendor/ripple.css',
							'./css/vendor/spinner.css' ];
var jsFiles = [ 	'./js/source/jgd-grid.js',
						'./js/source/the-mx-scripts.js',
						'./js/source/navigation.js',
						'./js/source/skip-link-focus-fix.js',
						'./js/source/animations.js',
            './js/source/rtl-animations.js',
						'./js/source/colorbox-main.js',
						'./js/source/restore-js.js' ];
var jsSepFiles = [	'./js/source/add-skrollr-data-attributes.js',
							'./js/source/mx-skrollr-init.js'	];
var jsCustomizerFiles = [ './js/source/color-scheme-control.js',
            './js/source/customize-controls.js',
            './js/source/customize-preview.js'  ];

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
		.pipe(gulp.dest('./'))
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
		.pipe(gulp.dest('./css/layouts/'))
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

function rtl(done) {
	return gulp.src('./style.css')
		.pipe(rtlcss())
		.pipe(rename({ basename: 'rtl' }))
		.pipe(gulp.dest('./'));
	done();
}

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
	gulp.watch('./sass/**/*.scss', series(style, copyMaps, copyStyle));
	gulp.watch('./sass/layout/mx-grid.scss', gridStyle);
	//gulp.watch('./js/source/*.js', jsHint);
	gulp.watch(jsFiles, series(copyMaps, copyJSSrc, minifyJS));
	gulp.watch(jsSepFiles, series(copyJSSep, minifySepJS));
  gulp.watch(jsCustomizerFiles, copyCustomizerJS);
	//gulp.watch('./style.css', parallel(series(rtl, copyRTL), minifyStyle));
  gulp.watch('./style.css', parallel(copyRTL, minifyStyle));
	gulp.watch(layoutStyles, series(copyCSSLayout, concatLayoutCSS));
	gulp.watch(layoutStyles, reloadLayoutDir);
	gulp.watch(animStyles, reloadAnimDir);
  gulp.watch('./*.php', copyPHP);
  gulp.watch('./inc/*.php', copyInc);
  gulp.watch('./page-templates/*.php', copyPageTemplates);
  gulp.watch('./template-parts/*.php', copyTempParts);
	gulp.watch('./**/*.php').on('change', reloadBrowser);
	gulp.watch('./js/**/*.js').on('change', reloadBrowser);
}

// Copying files to build/ folder
function copyMainFiles(done) {
	gulp.src([
		'./*.css',
		'!./build/*.css',
		'readme.txt',
		'!./build/readme.txt',
		'./screenshot.png',
		'!./build/screenshot.png'
	])
		.pipe(gulp.dest('./build/'));
	done();
}

function copyPHP(done) {
  gulp.src('./*php')
    .pipe(gulp.dest('./build'));
  done();
  console.log('PHP files copied');
}

function copyCSS(done) {
	gulp.src('./css/**/*.css')
		.pipe(gulp.dest('./build/css'));
	done();
	console.log('CSS folder copied.');
}

function copyStyle(done) {
  gulp.src(['./style.css', './style.min.css'])
    .pipe(gulp.dest('./build'));
  done();
  console.log('style.css copied.');
}

function copyRTL(done) {
  gulp.src('./rtl.css')
    .pipe(gulp.dest('./build'));
  done();
  console.log('rtl.css copied.');
}

function copyCSSLayout(done) {
  gulp.src('./css/layouts/*.css')
    .pipe(gulp.dest('./build/css/layouts'));
  done();
}

function copyCSSImgs(done) {
	gulp.src('./css/images/*')
		.pipe(gulp.dest('./build/css/images'));
	done();
}

function copyFonts(done) {
	gulp.src('./fonts/*')
		.pipe(gulp.dest('./build/fonts'));
	done();
	console.log('Fonts folder copied.');
}

function copyInc(done) {
	gulp.src('./inc/**/*.php')
    .pipe(newer('./build/inc'))
    .pipe(gulp.dest('./build/inc'));
	done();
	console.log('Inc folder copied.');
}

function copyJS(done) {
	gulp.src('./js/**/*.js')
    .pipe(gulp.dest('./build/js'));
	done();
	console.log('JS folder copied.');
}

function copyCustomizerJS(done) {
  gulp.src(jsCustomizerFiles)
    .pipe(gulp.dest('./build/js/source'));
  done();
  console.log('JS Customizer files copied.');
}

function copyJSSrc(done) {
  gulp.src(jsFiles)
    .pipe(gulp.dest('./build/js/source'));
  done();
}

function copyJSSep(done) {
  gulp.src(jsSepFiles)
    .pipe(gulp.dest('./build/js/source'));
  done();
}

function copyLang(done) {
	gulp.src('./languages/*')
    .pipe(gulp.dest('./build/languages'));
	done();
	console.log('Languages folder copied.');
}

function copyMaps(done) {
  gulp.src('./maps/*')
    .pipe(mode.development(gulp.dest('./build/maps')));
  done();
}

function copyPageTemplates(done) {
	gulp.src('./page-templates/*.php')
    .pipe(gulp.dest('./build/page-templates'));
	done();
	console.log('Page-Templates folder copied.')
}

function copySass(done) {
	gulp.src('./sass/**/*.scss')
    .pipe(gulp.dest('./build/sass'));
	done();
	console.log('Sass folder copied.');
}

function copyTempParts(done) {
	gulp.src('./template-parts/*.php')
    .pipe(newer('./build/template-parts'))
    .pipe(gulp.dest('./build/template-parts'))
	done();
	console.log('Template-parts folder copied');
}

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
}

function clean(done) {
	return del([
		'./build/**/*'
	]);
	done();
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
exports.rtl = rtl;
exports.minifyStyle = minifyStyle;
exports.concatLayoutCSS = concatLayoutCSS;
exports.concatAnimCSS = concatAnimCSS;
exports.minifyJS = minifyJS;
exports.minifySepJS = minifySepJS;
exports.jsHint = jsHint;

exports.copyMainFiles = copyMainFiles;
exports.copyPHP = copyPHP;
exports.copyCSS = copyCSS;
exports.copyStyle = copyStyle;
exports.copyRTL = copyRTL;
exports.copyCSSLayout = copyCSSLayout;
exports.copyCSSImgs = copyCSSImgs;
exports.copyInc = copyInc;
exports.copyJS = copyJS;
exports.copyCustomizerJS = copyCustomizerJS;
exports.copyJSSrc = copyJSSrc;
exports.copyJSSep = copyJSSep;
exports.copyMaps = copyMaps;
exports.copyPageTemplates = copyPageTemplates;
exports.copySass = copySass;
exports.copyTempParts = copyTempParts;
exports.restoreFiles = series(clean, copyMainFiles, copyCSS, copyCSSImgs, copyFonts, copyInc, copyJS, copyLang, copyPageTemplates, copyTempParts);

exports.zipUp = zipUp;
exports.clean = clean;
exports.finishUp = series(cleanMaps, zipUp);
exports.watch = watch;
