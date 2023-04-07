const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;

gulp.task('serve', () => {
  browserSync.init({
    proxy: 'http://online-quiz/',
    port: 8080,
    open: false,
    injectChanges: true

  });

  gulp.watch('**/*.php').on('change', () => {
    browserSync.reload();
  });

  gulp.watch('**/*.css').on('change', () => {
    browserSync.reload('*.css');
  });
});
