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
   .js('resources/js/clock.js','public/js')
   .js('resources/js/update.js','public/js')
   .js('resources/js/flashoption.js','public/js')
   .js('resources/js/tooltip.js','public/js')
   .js('resources/js/fileupload.js','public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/mdbootstrap/js/mdb.min.js', 'public/js')
   .vue()
   .version();
