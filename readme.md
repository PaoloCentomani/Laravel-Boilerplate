# Boilerplate

<img src="https://i.ibb.co/SJLV8cM/Boilerplate.png" width="1280" alt="Boilerplate">

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
