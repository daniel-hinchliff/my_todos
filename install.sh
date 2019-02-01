#!/usr/bin/env bash
cd laravel
cp .env.example .env

# RUN this script to install dependencies
docker run --rm --interactive --tty --volume $PWD:/app composer install

# SETUP ARTISAN
docker-compose exec app chmod 777 -R /var/www/laravel/storage/
docker-compose exec app php /var/www/laravel/artisan key:generate
docker-compose exec app php /var/www/laravel/artisan migrate
docker-compose exec app php /var/www/laravel/artisan optimize
