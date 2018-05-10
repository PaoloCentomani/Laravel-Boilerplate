let mix = require('laravel-mix');

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

mix.webpackConfig({
    resolve: {
        alias: {
            'jquery': 'jquery/dist/jquery.slim'
        }
    }
});

mix.js('resources/assets/js/app.js', 'public/js')
   .extract(['axios', 'bootstrap', 'lodash', 'jquery/dist/jquery.slim', 'vue'])
   .sass('resources/assets/sass/app.scss', 'public/css')
   .purgeCss({whitelist: ['show']});

mix.inProduction() ? mix.version() : mix.sourceMaps();
