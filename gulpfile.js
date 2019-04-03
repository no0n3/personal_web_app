var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var jsDest  = './public/js/';
var cssDest = './public/css/';

gulp.task('js', function() {
    gulp
        .src([
            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/slick-carousel/slick/slick.min.js',
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/viewerjs/dist/viewer.min.js',
            jsDest + 'app.js'
        ])
        .pipe(concat('all.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});

gulp.task('css', function() {
    gulp
        .src([
            'bower_components/slick-carousel/slick/slick.css',
            'bower_components/font-awesome/css/font-awesome.min.css',
            'bower_components/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/viewerjs/dist/viewer.min.css',
            'public/viewer.min.css',
            cssDest + 'app.css'
        ])
        .pipe(concat('all.css'))
        .pipe(gulp.dest(cssDest));
});

gulp.task('build', ['js', 'css']);
