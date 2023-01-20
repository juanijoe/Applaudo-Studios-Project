#!/bin/bash

set -e

if [ ! -f "vendor/autoload.php" ]; then
    composer install --ignore-platform-reqs --no-progress --no-interaction
fi

echo $DB_HOST

role=${CONTAINER_ROLE:-app}

php artisan migrate
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear

php-fpm




