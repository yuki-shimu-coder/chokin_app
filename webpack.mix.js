const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .autoload({
      jquery: ['$', 'window.jQuery']
   })
   .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();
    //popper.js.map - Failed to load resource: the server responded with a status of 404 (Not Found)の解消
