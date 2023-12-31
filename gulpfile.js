import gulp from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import csso from 'postcss-csso';
import plumber from 'gulp-plumber';
import server from 'browser-sync';
import * as config from './config.js';
import {
	rmSync
} from 'node:fs';

const {
	src,
	dest,
	watch,
	series
} = gulp;
const sass = gulpSass(dartSass);


function processStyles() {
	return src(['./source/sass/**/*.scss', '!./source/sass/global.scss'])
		.pipe(plumber())
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss([
			autoprefixer(),
			csso()
		]))
		.pipe(dest('./server/css'))
};

function copyPHP() {
	return src('./source/**/**/*.php')
		.pipe(dest('./server/'));
}

function copyJS() {
	return src('./source/**/**/*.js')
		.pipe(dest('./server/'));
}
export function removeBuild(done) {
	rmSync('server/', {
		force: true,
		recursive: true,
	});
	done();
}

export function startServer() {
	server.init(config.a.browserSyncOpts)
	watch('./source/sass/**/*.scss', series(processStyles));
	watch('./source/**/*.php', series(copyPHP, reloadServer));
	watch('./source/**/*.js', series(copyJS, reloadServer));
};

function reloadServer(done) {
	server.reload();
	done();
}

export function runDev(done) {
	series(
		removeBuild,
		copyPHP,
		copyJS,
		processStyles,
		startServer,
	)(done);
}