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
    // .sass('resources/sass/base.scss', 'public/assets/css/base.css')
    // .sass('resources/sass/elements.scss', 'public/assets/css/elements.css')
    // .sass('resources/sass/header.scss', 'public/assets/css/header.css')
    // .sass('resources/sass/banner.scss', 'public/assets/css/banner.css')
    // .sass('resources/sass/contents.scss', 'public/assets/css/contents.css')
    // .sass('resources/sass/footer.scss', 'public/assets/css/footer.css');

