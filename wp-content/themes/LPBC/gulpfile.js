var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
 
gulp.task('sass', function () {
  return gulp.src('sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(concat("style.css"))
    .pipe(gulp.dest("./"));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default',['sass', 'sass:watch']);