var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-clean-css');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');
var clean = require('gulp-clean');


gulp.task('js', function(){
    gulp.src([
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
         './owlcarousel/owl.carousel.min.js',
         './node_modules/smartmenus/dist/jquery.smartmenus.min.js'
        ])
    .pipe(concat('bundle.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/js/'));
 });

 gulp.task('css', function(){
    gulp.src([
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './owlcarousel/assets/owl.theme.default.min.css',
        './owlcarousel/assets/owl.carousel.min.css',
        './font-awesome/css/font-awesome.min.css',
        './node_modules/smartmenus/dist/css/sm-mint/sm-mint.css',
        './node_modules/smartmenus/dist/css/sm-core-css.css',
        './css/style.css'
    ])
    .pipe(concat('style.css'))
    .pipe(minify())
    .pipe(gulp.dest('dist/styles/'));
 });

 // Fonts
gulp.task('fonts', function() {
    return gulp.src([
                    './font-awesome/fonts/*'])
            .pipe(gulp.dest('dist/fonts/'));
});

// Images
gulp.task('images', function () {
    return gulp.src([
    		'./owlcarousel/assets/*.+(png|jpg|gif)',
            ])
        .pipe(changed('dist/images'))
        .pipe(imagemin())
        .pipe(gulp.dest('dist/images'));
});

// Clean
gulp.task('clean', function () {
    return gulp.src(['dist/styles', 'dist/js', 'dist/images'], { read: false }).pipe(clean());
});

gulp.task('build', ['js','css', 'fonts', 'images']);

gulp.task('default',['clean'],function(){
    gulp.start('build');
});