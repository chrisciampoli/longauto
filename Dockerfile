# Use the official PHP image with Apache as the base
FROM php:8.0-apache

# Install system dependencies
RUN apt-get update && apt-get install -y git zip unzip libpq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Run a2enmod rewrite
RUN a2enmod rewrite