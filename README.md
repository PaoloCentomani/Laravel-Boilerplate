# Boilerplate

<img src="https://i.ibb.co/nrGyFQX/Boilerplate.png" width="1280" alt="Boilerplate">

## Features

* [Tailwind CSS](https://tailwindcss.com/) UI with [Bootstrap](https://getbootstrap.com/)-like classes
* Ready-made [Vue.js](https://vuejs.org/) components: alerts, date/time pickers, dropdowns, modals, tabs, toggle password
* Lightweight, well-mantained JavaScript plugins: [flatpickr](https://flatpickr.js.org/), [SimpleBar](http://grsmto.github.io/simplebar/)
* [Turbolinks](https://github.com/turbolinks/turbolinks) for fast navigation
* Useful Blade directives: `@svg`
* Roles and permissions using [Laravel Permission](https://docs.spatie.be/laravel-permission/v3/introduction/)
* Filtering with [Laravel Query Builder](https://docs.spatie.be/laravel-query-builder/v2/introduction/)
* [Deployer](https://deployer.org/) support

Make sure to check the companion [Laravel Resources](https://github.com/PaoloCentomani/Laravel-Resources) repository for additional code.

## Installation

First, install the required dependencies:

    composer install

Then, configure the application:

    cp .env.example .env
    vi .env
    php artisan key:generate
    php artisan migrate --seed
    php artisan storage:link
    php artisan telescope:publish

Finally, compile the assets:

    npm install
    npm run dev
