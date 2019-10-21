const mix = require('laravel-mix');

require('laravel-mix-purgecss');

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

mix.js('resources/js/app.js', 'public/js').extract();

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('postcss-nested'),
    require('tailwindcss')('tailwind.config.js'),
]);

// mix.copyDirectory('resources/img', 'public/img');

mix.inProduction() ? mix.purgeCss().version() : mix.sourceMaps();
