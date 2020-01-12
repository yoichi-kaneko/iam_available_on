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

mix.sass('resources/sass/all-themes.scss', 'public/css')
    .sass('resources/sass/libs.scss', 'public/css')
    .sass('resources/sass/calendar.scss', 'public/css')
    .sass('resources/sass/main/main.scss', 'public/css');

mix.js('resources/js/libs.js', 'public/js')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/pages/calendar.js', 'public/js/pages');

