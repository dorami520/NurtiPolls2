FROM php:7.4-apache

RUN docker-php-ext-install pdo_mysql mysqli

COPY . /var/www/html/