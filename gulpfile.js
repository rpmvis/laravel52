/* File: gulpfile.js */
/* ReneVis: adjust proj_root to your own need  */
var proj_root='/home/rene/LaravelProjects/laravel52/';
var gulp_file=proj_root + 'resources/assets/gulp_build.html';
var gulp_dest=proj_root + 'public/'

var gulp  = require('gulp');
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');

gulp.task('laravel52_build_assets', function(){
    return gulp.src(gulp_file)
        .pipe(useref())
        // minifies only if it's a JavaScript file
        .pipe(gulpIf('*.js', uglify()))
        .pipe(gulp.dest(proj_root + 'public'))

        // minifies only if it's a CSS file
        .pipe(gulpIf('*.css', cssnano()))
        .pipe(gulp.dest(gulp_dest))
});
