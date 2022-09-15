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
 | In current laravel6kit webpack.mix is JUST an OPTIONS. Not used on the following js/css files.
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/vue.js', 'public/js')
    .extract([ 'jquery', 'vue' ])
    .sass('resources/sass/main.scss', 'public/assets/css/main.css')
    .sass('resources/sass/app.scss', 'public/assets/css/app.css')

