let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
      'resources/assets/udemy/css/libs/blog-post.css',
      'resources/assets/udemy/css/libs/bootstrap.css',
      'resources/assets/udemy/css/libs/font-awesome.css',
      'resources/assets/udemy/css/libs/metisMenu.css',
      'resources/assets/udemy/css/libs/sb-admin-2.css',
  ], 'public/udemy/css/libs.css')
  .scripts([
   'resources/assets/udemy/js/libs/jquery.js',
   'resources/assets/udemy/js/libs/bootstrap.js',
   'resources/assets/udemy/js/libs/metisMenu.js',
   'resources/assets/udemy/js/libs/sb-admin-2.js',
   'resources/assets/udemy/js/libs/scripts.js',
   ], 'public/udemy/js/libs.js');
