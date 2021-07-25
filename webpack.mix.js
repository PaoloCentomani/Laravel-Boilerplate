const mix = require('laravel-mix');

const plugins = [
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss'),
];

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

mix.postCss('resources/css/vendor.css', 'public/css').options({ postCss: plugins });
mix.postCss('resources/css/app.css', 'public/css').options({ postCss: plugins });

mix.js('resources/js/app.js', 'public/js').extract();

mix.copyDirectory('resources/img', 'public/img');

if (mix.inProduction()) {
    mix.version();
}
