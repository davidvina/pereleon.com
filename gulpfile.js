// const { series, parallel }
const { src, dest, watch, series, parallel } = require('gulp');

// SASS
const sass = require('gulp-sass');
//sass.compiler = require('dart-sass');
const autoprefixer = require('gulp-autoprefixer');
const sassGlob = require('gulp-sass-glob');

// JAVASCRIPT
const include = require("gulp-include");
const uglify = require("gulp-uglify");

// SOURCEMAPS
const sourcemaps = require('gulp-sourcemaps');

// BROWSERSYNC
const browserSync = require('browser-sync').create();

// CONDITIONAL
const gulpif = require('gulp-if');

// CLAN
const del = require('del');

/**
 * get values for tasks configs
 *
 */
let config = require('./gulp_config.json');


/**
 * LIST OF FILES TO COMPILE AND EXCLUDE FROM COMPILATION SASS
 */
let sassFilesCompiler = [];
sassFilesCompiler.push(config.sass.src + '/**/*.scss');

for (fileIndex in config.sass.excludeFiles) {
	sassFilesCompiler.push("!" + config.sass.src + '/**/' + config.sass.excludeFiles[fileIndex]);
}

/**
 * SASS COMPILER
 */
function sassCompile(){
	return src(sassFilesCompiler)
	//return src(config.sass.src + '/**/*.scss')
		.pipe(gulpif(config.sass.sourcemap, sourcemaps.init()))
		.pipe(sassGlob({
			ignorePaths: [
				'**/__*.*',
			],
		}))
		.pipe(sass(config.sass.options).on('error', sass.logError))
		.pipe(autoprefixer(config.autoPrefixer))
		.pipe(gulpif(config.sass.sourcemap, sourcemaps.write('.')))
		.pipe(dest(config.sass.dest));
}
exports.sassCompile = sassCompile;

/**
 * JAVASCRIPT COMPILER
 */
function scripts(){
	return src(config.js.src + '/**/*.js')
	.pipe(gulpif(config.js.sourcemap, sourcemaps.init()))
	.pipe(include()).on('error', console.log)
	.pipe(gulpif(config.js.uglify, uglify()))
	.pipe(gulpif(config.js.sourcemap, sourcemaps.write('.')))
	.pipe(dest(config.js.dest ));
}
exports.scripts= scripts;

/**
 * BROWSER SYNC START
 */
function browser_sync(){
	browserSync.init(
		{
			// list of files to watch
			files: config.browserSync.watchfiles,
			//watch: true,
			proxy: config.browserSync.proxy,
			// Inject CSS changes
			injectChanges: true
		});
}
exports.browser_sync = browser_sync;

/**
 * BROWSER RELOAD
 */
function browser_reload(done){
	browserSync.reload();
	done();
}
exports.browser_reload = browser_reload;

/**
 * CLEAN FOLDERS
 */
function clean(){
	return del([
		config.sass.dest,
		config.js.dest
	]);
}
exports.clean = clean;

/**
 * WATCH
 */
function startWatch(){
	if( config.sass.compile ){
		watch(config.sass.src + '/**/*.scss', sassCompile);
	}
	if( config.js.compile ){
		watch(config.js.src + '/**/*.js', scripts);
	}
}
exports.startWatch = startWatch;

/**
 *
 * DEFAULT
 */
if( config.js.compile && config.sass.compile ){
	exports.default = series(
		scripts,
		sassCompile,
		parallel(browser_sync, startWatch)
	);
}

if( !config.js.compile && config.sass.compile ){
	exports.default = series(
		sassCompile,
		parallel(browser_sync, startWatch)
	);
}

if( config.js.compile && !config.sass.compile ){
	exports.default = series(
		scripts,
		parallel(browser_sync, startWatch)
	);
}