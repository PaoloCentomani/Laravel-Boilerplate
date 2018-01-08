# Boilerplate

## Installation

```bash
git clone https://github.com/PaoloCentomani/dashboard-boilerplate.git
cd dashboard-boilerplate && rm -rf .git
composer install
npm install && npm run dev
git init && git add . && git commit -m "Initial commit"
```

## Configuration

```bash
cp .env.example .env
php artisan key:generate
vim .env
```

### Preparing the database

```bash
php artisan migrate
php artisan db:seed
```
