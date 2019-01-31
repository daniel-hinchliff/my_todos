FROM php:7.2.14-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && docker-php-ext-install pdo_mysql \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
