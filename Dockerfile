FROM php:8.2-apache

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libicu-dev libonig-dev libzip-dev unzip \
    && docker-php-ext-install intl pdo pdo_mysql zip mbstring

RUN a2enmod rewrite

# Copier le projet
COPY --chown=www-data:www-data ./ /var/www/html/

WORKDIR /var/www/html/

# Copier la config Apache personnalisée
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP
RUN composer install 

RUN chown -R www-data:www-data var/cache var/log \
    && chmod -R 775 var/cache var/log

EXPOSE 80

CMD ["apache2-foreground"]
