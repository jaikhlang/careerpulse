FROM node:24-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
ENV WAYFINDER_SKIP_GENERATE=1
RUN npm run build


FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

COPY --from=frontend /app/public/build ./public/build

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
