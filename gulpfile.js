const { src, dest, series } = require('gulp');
const sass = require('gulp-sass');
const inlinesource = require('gulp-inline-source');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');

function scss() {
  return src('./assets/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./css'));
}

function prefix() {
  return src('./css/style.css')
    .pipe(autoprefixer())
    .pipe(dest('./css'));
}

function scripts() {
	return src('./assets/js/**/*.js')
		.pipe(concat('all.js'))
    .pipe(dest('./js'));
}

function inlinecss() {
  return src('temp/header.php')
    .pipe(inlinesource())
    .pipe(dest('./'));
}

exports.prefix = prefix;
exports.scss = scss;
exports.scripts = scripts;
exports.inlinecss = inlinecss;

exports.default = series(scss, prefix, scripts);