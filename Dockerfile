FROM php:8.0-apache

COPY ./src/ /var/www/html
# COPY .docker/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod headers


