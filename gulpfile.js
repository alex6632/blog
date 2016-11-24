var gulp           = require('gulp');
var sass           = require('gulp-sass');
var autoprefixer   = require('gulp-autoprefixer');
var concat         = require('gulp-concat');
var sourcemaps     = require('gulp-sourcemaps');

/*
 * TASKS
 */

gulp.task('styles', function () {

    gulp.src('src/scss/default.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write('./maps'))
        .pipe(autoprefixer('last 2 versions', '> 1%', 'ie 8'))
        .pipe(gulp.dest('styles/'));
});

gulp.task('scripts', function() {
    gulp.src('src/js/*.js')
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest('scripts/'));
});

/*
 * GULP WATCH
 */

gulp.task('watch', function () {

    gulp.watch(['src/scss/**/*.scss'], ['styles']);
    gulp.watch(['src/js/*.js'], ['scripts']);

});

/*
 * GULP DIST
 */

gulp.task('dist', ['styles', 'scripts']);

/*
 * GULP DEFAULT (WATCH)
 */

gulp.task('default', ['watch']);