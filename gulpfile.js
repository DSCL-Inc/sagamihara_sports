const gulp = require("gulp");
const autoprefixer = require("gulp-autoprefixer");
const cleanCSS = require("gulp-clean-css");
const rename = require("gulp-rename");
const sass = require("gulp-sass");
const sourcemaps = require("gulp-sourcemaps");
const changed = require("gulp-changed");
const imagemin = require("gulp-imagemin");
const imageminJpg = require("imagemin-jpeg-recompress");
const imageminPng = require("imagemin-pngquant");
const imageminGif = require("imagemin-gifsicle");
const svgmin = require("gulp-svgmin");
var concat = require("gulp-concat");
var jshint = require("gulp-jshint");
//var rename = require("gulp-rename");
var uglify = require("gulp-uglify");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
var connect = require("gulp-connect");
var browserSync = require("browser-sync");
var sassGlob = require("gulp-sass-glob");
//var scsslint = require("gulp-scss-lint");
var connectSSI = require("connect-ssi");

/*scss*/
const paths = {
  src: {
    scss: "./src/scss/style.scss",
    scss_other: "./src/scss/**/*.scss",
    image: "src/image/*.+(jpg|jpeg|png|gif)",
    js: "src/js/*.js"
  },
  dist: {
    css: "./site/assets/css/",
    image: "./site/assets/image/",
    js: "./site/assets/js/"
  }
};
gulp.task("sass", function() {
  return gulp
    .src(paths.src.scss, { sourcemaps: true })
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(autoprefixer())
    .pipe(
      sass({
        outputStyle: "expanded"
      }).on("error", sass.logError)
    )
    .pipe(cleanCSS())
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.dist.css));
});
/*
gulp.task("sassLint", function() {
  return gulp.src(paths.src.scss).pipe(
    scsslint({
      config: "scss-lint.yml"
    })
  );
});
*/
/*image*/
gulp.task("imagemin", function() {
  return gulp
    .src(paths.src.image)
    .pipe(changed(paths.dist.image))
    .pipe(
      imagemin([
        imageminPng(),
        imageminJpg(),
        imageminGif({
          interlaced: false,
          optimizationLevel: 3,
          colors: 180
        })
      ])
    )
    .pipe(gulp.dest(paths.dist.image));
});

/*js*/
gulp.task("js", function() {
  return gulp
    .src(paths.src.js)
    .pipe(jshint())
    .pipe(concat("app.js"))
    .pipe(uglify())
    .pipe(gulp.dest(paths.dist.js));
});

gulp.task("serve", function() {
  connect.server({
    root: "./site/"
  });
});
// Browser Sync
gulp.task("bs", function() {
  browserSync({
    server: {
      baseDir: "./site",
      middleware: [
        connectSSI({
          baseDir: __dirname + "/site",
          ext: ".html"
        })
      ]
    }
  });
});
// Reload Browser
gulp.task("bs-reload", function() {
  browserSync.reload(); // 2
});
gulp.task("watch", function() {
  gulp.watch(paths.src.scss_other, gulp.task("sass"));
  gulp.watch(paths.src.scss, gulp.task("sass"));
  gulp.watch(paths.src.js, gulp.task("js"));
  gulp.watch(
    "./site/index.html",
    gulp.parallel(gulp.task("bs"), gulp.task("bs-reload"))
  );
});

gulp.task("default", gulp.series("watch"));
