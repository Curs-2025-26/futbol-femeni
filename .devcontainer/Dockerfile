FROM mcr.microsoft.com/devcontainers/php:8.2

# Node 20 per a Vite
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
 && apt-get update && apt-get install -y \
    nodejs \
    unzip \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    mariadb-client \
 && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Composer (per si no ve instal·lat)
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
 && rm composer-setup.php

WORKDIR /var/www/html

