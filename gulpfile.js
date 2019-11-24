var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

// var ts = require('gulp-typescript');
// var tsProject = ts.createProject('tsconfig.json')
// var babel = require('gulp-babel');
// var concat = require('gulp-concat');

function sassCompile(cb) {
    return gulp.src('app/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('app/css'));
    cb();
}


function watch() {
    gulp.watch('app/scss/**/*.scss', sassCompile);
    // gulp.watch('app/js/*.js', babelCompile);
}


exports.sass = sassCompile;

exports.watch = watch;






