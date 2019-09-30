# Boilerplate

<img src="https://i.ibb.co/SJLV8cM/Boilerplate.png" width="1280" alt="Boilerplate">

## Features

* [Tailwind CSS](https://tailwindcss.com/) UI with [Bootstrap](https://getbootstrap.com/)-like classes
* Ready-made [Vue.js](https://vuejs.org/) components: tabs, dropdowns
* Lightweight, well-mantained plain JavaScript plugins: [flatpickr](https://flatpickr.js.org/), [SimpleBar](http://grsmto.github.io/simplebar/)
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
php artisan migrate
php artisan db:seed
```

## Configuration

```
cp .env.example .env
php artisan key:generate
```
