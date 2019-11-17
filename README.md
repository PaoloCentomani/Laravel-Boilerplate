# Boilerplate

<img src="https://i.ibb.co/nrGyFQX/Boilerplate.png" width="1280" alt="Boilerplate">

## Features

* [Tailwind CSS](https://tailwindcss.com/) UI with [Bootstrap](https://getbootstrap.com/)-like classes
* Ready-made [Vue.js](https://vuejs.org/) components: alerts, dropdowns, modals, tabs, toggle password
* Lightweight, well-mantained JavaScript plugins: [flatpickr](https://flatpickr.js.org/), [SimpleBar](http://grsmto.github.io/simplebar/)
* Useful Blade directives: `@svg`, `@widget`
* Roles and permissions using [Laravel Permission](https://docs.spatie.be/laravel-permission/v3/introduction/)
* [Deployer](https://deployer.org/) support

## Installation

```
git clone https://github.com/PaoloCentomani/Laravel-Boilerplate.git
cd Laravel-Boilerplate && rm -rf .git
composer install
npm install && npm run dev
git init && git add . && git commit -m "Initial commit"
```

### Preparing the database

```
php artisan migrate --seed
```

## Configuration

```
cp .env.example .env
php artisan key:generate
php artisan storage:link
```
