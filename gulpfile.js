const gulp = require('gulp'),
    browserSync = require('browser-sync').create(),
    webpack = require('webpack-stream'),
    fileinclude = require('gulp-file-include'),
    del = require("del"),
    cleanCSS = require('gulp-clean-css'),
    rename = require("gulp-rename"),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass')(require('sass'));

const path = require('./gulp/pathConfig.js');
const webpackConfig = require('./gulp/webpackConfig.js');
const isDev = !process.argv.includes('--prod');

let siteUrl = 'http://growfy.local/';

function style() {
    return gulp.src(path.src.css)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css))
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest(path.build.css));
}

function vendorCSS() {
    return gulp.src([
        'node_modules/blaze-slider/dist/blaze.css',
    ])
    .pipe(gulp.dest(path.build.css))
}

function image() {
    return gulp.src(path.src.images)
        .pipe(gulp.dest(path.build.images));
}

function html(cb) {
    gulp.src(path.src.html)
        .pipe(fileinclude())
        .pipe(gulp.dest(path.build.html))
        .pipe(browserSync.stream());

    cb();
}

function fonts() {
    return gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts));
}

function js() {
    return gulp.src(path.src.js)
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest(path.build.js))
        .pipe(browserSync.stream());
}

function server(cb) {
    browserSync.init({
        // proxy: {
		// 	target: siteUrl,
		// 	ws: true
		// },
		//reloadDelay: 2000,
        proxy: siteUrl,
        host: 'localhost',
        port: 3000,
        tunnel: false,
    });

    cb();
}

function lib() {
    return gulp.src(path.src.lib)
        .pipe(gulp.dest(path.build.lib));
}

function clean(cb) {
    del(path.clean);

    cb();
}

function watch() {
    gulp.watch([path.watch.html], html);
    gulp.watch([path.watch.js], js);
    gulp.watch([path.watch.lib], lib);
    gulp.watch([path.watch.images], image);
    gulp.watch([path.watch.css], style).on('change', browserSync.reload);
}

exports.html = html;
exports.js = js;
exports.lib = lib;
exports.clean = clean;
exports.style = style;
exports.image = image;
exports.fonts = fonts;

if (isDev) {
    exports.default = gulp.series(
        html,
        js,
        lib,
        vendorCSS,
        style,
        image,
        fonts,
        gulp.parallel(watch, server)
    );
} else {
    exports.default = gulp.series(clean, html, js, lib, vendorCSS, style, image, fonts);
}
