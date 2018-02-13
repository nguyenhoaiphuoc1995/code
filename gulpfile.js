var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-clean-css');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');
var clean = require('gulp-clean');
var browserSync = require('browser-sync').create();


gulp.task('js', function(){
    gulp.src([
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
         './owlcarousel/owl.carousel.min.js',
         './smartmenus/dist/jquery.smartmenus.min.js',
         './js/*'
        ])
    .pipe(concat('bundle.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/js/'))
    .pipe(browserSync.reload({
        stream:true
    }));
 });

 gulp.task('css', function(){
    gulp.src([
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './owlcarousel/assets/owl.theme.default.min.css',
        './owlcarousel/assets/owl.carousel.min.css',
        './font-awesome/css/font-awesome.min.css',
        './smartmenus/dist/css/sm-mint/sm-mint.css',
        './smartmenus/dist/css/sm-core-css.css',
        './css/*'
    ])
    .pipe(concat('style.css'))
    .pipe(minify())
    .pipe(gulp.dest('dist/styles/'))
    .pipe(browserSync.reload({
        stream: true
    }));
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


gulp.task('browserSync', function() {
    browserSync.init({
        server: {
           baseDir: 'dist'
        },
     })
});



gulp.task('build', ['browserSync', 'js','css', 'fonts', 'images'], function() {
    gulp.watch(['./css/*', 'js/*'], ['css','js']);
});

gulp.task('default',['clean'],function(){
    gulp.start('build');
});