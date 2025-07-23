FROM php:8.2-apache

RUN apt-get update && apt-get install -y default-mysql-client libzip-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql zip

RUN a2enmod rewrite

WORKDIR /var/www/html