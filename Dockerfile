FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

FROM php:8.4-apache
RUN apt-get update && apt-get install -y libzip-dev \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

WORKDIR /var/www/html
COPY . .
COPY --from=vendor /app/vendor ./vendor

RUN chown -R www-data:www-data storage bootstrap/cache
EXPOSE 80
CMD ["apache2-foreground"] 
