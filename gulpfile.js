var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-clean-css');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');
var clean = require('gulp-clean');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();


gulp.task('js', function(){
    gulp.src([
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/bootstrap/dist/js/popper.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
        './node_modules/bootstrap/dist/js/mdb.min.js',
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

 gulp.task('css', ['sass'], function(){
    gulp.src([
        './font-awesome/css/font-awesome.css',
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './node_modules/mdbootstrap/css/mdb.min.css',
        './owlcarousel/assets/owl.theme.default.min.css',
        './owlcarousel/assets/owl.carousel.min.css',
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
                    './font-awesome/fonts/*',
                    './node_modules/mdbootstrap/font/**/*'
                ])
            .pipe(gulp.dest('dist/font/'));
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

//Compile Sass\Scss to Css
gulp.task('sass', function() {
    gulp.src('./smartmenus/dist/css/sm-mint/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./smartmenus/dist/css/sm-mint/'));
});

// Clean
gulp.task('clean', function () {
    return gulp.src(['dist/styles', 'dist/js', 'dist/images','dist/font'], { read: false }).pipe(clean());
});


gulp.task('browserSync', function() {
    browserSync.init({
        ui: false,
        open: false,
        server: {
           baseDir: 'dist'
        },
     })
});



gulp.task('build', ['browserSync', 'js','css', 'fonts', 'images'], function() {
    gulp.watch(['./css/*', 'js/*'], ['css','js']);
    gulp.watch('./smartmenus/dist/css/sm-mint/**/*.scss', ['css']);
});

gulp.task('default',['clean'],function(){
    gulp.start('build');
});