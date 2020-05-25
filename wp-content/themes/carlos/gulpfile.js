'use strict';

var gulp = require( 'gulp' );
var sass = require( 'gulp-sass' );
var rename = require( 'gulp-rename' );
var notify = require( "gulp-notify" );
var sourcemaps = require( 'gulp-sourcemaps' );
var plumber      = require( 'gulp-plumber' );
var uglifycss    = require( 'gulp-uglifycss' );
var uglify    = require( 'gulp-uglify' );
var babel = require('gulp-babel');
var browserSync = require('browser-sync').create();

var reportError = function (error) {
	notify(
		{
			title: "There's an error",
			message: 'Check the console for more details.'
		}
	).write( error );
	console.log( error.toString() );
	this.emit( 'end' );
}

gulp.task(
	'sass', function () {
		return gulp.src( ['src/sass/**/*.scss', "!src/sass/**/_*.scss"] )
			.pipe( plumber() )
			.pipe( sourcemaps.init() )
			.pipe(
				sass(
					{
						errLogToConsole: true,
						//outputStyle: 'compressed',
						outputStyle: 'compact',
						// outputStyle: 'nested',
						// outputStyle: 'expanded',
						precision: 10
					}
				).on( 'error', reportError )
			)
			.pipe( sourcemaps.write() )
			.pipe( uglifycss() )
			.pipe( gulp.dest( 'css' ) );
	}
);

gulp.task(
	'js', function () {
		return gulp.src( 'src/js/**/*.js' )
			.pipe(babel({presets: ['es2015']}))
			.pipe( uglify() )
			.pipe( gulp.dest( 'js' ) );

	}
);

gulp.task(
	'watch', function() {
		gulp.watch( 'src/sass/**/*.scss', ['sass'] );
		gulp.watch( 'src/js/**/*.js', ['js'] );
	}
);

gulp.task('browser-sync', function() {
    browserSync.init(["css/*.css", "js/*.js"],{
		proxy: 'localhost',
    });
});

gulp.task( 'default',['sass','js'] );
