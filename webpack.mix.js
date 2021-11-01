const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js')
 .combine(['resources/js/plugins/plotly.js','resources/js/plugins/micromodal.min.js','resources/js/plugins/flatpickr.js'],'public/js/plugins.js')
 .postCss('resources/css/app.css', 'public/css', [
     require('postcss-import'),
     require('tailwindcss'),
     require('autoprefixer'),
 ]);

