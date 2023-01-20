FROM php:8.1.0-fpm as php

RUN apt-get update && apt-get install -y \
    unzip \
    libpq-dev \
    libcurl4-gnutls-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

WORKDIR /var/www
COPY . .

COPY --from=composer:latest /usr/bin/composer usr/bin/composer

ENV PORT=8000
CMD [ "docker/entrypoint.sh" ]
