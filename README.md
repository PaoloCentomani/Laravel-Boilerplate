# Boilerplate

## Requirements

- PHP 7.4
- MySQL 8.0

## Installation

Install the following libraries & PHP extensions:

```bash
sudo apt install openssl php-bcmath php-common php-intl php-json php-mbstring php-tokenizer php-xml php-zip unzip
```

Then, install the project dependencies:

```bash
composer install
```

Configure the application:

```bash
cp .env.example .env
vi .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan telescope:publish
```

Finally, compile the assets:

```bash
npm install
npm run dev
```

## Deploy

You can deploy the project by executing `dep deploy production`.

### Configure Cron

```bash
* * * * * cd /var/www/html/current && php artisan schedule:run >> /dev/null 2>&1
```
