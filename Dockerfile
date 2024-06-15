FROM php:8.3-fpm

RUN docker-php-ext-install pdo_mysql

COPY . /var/www

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

EXPOSE 80

CMD if [ ! -f .env ]; then cp .env.example .env; fi && chmod 666 .env && php artisan key:generate && php artisan serve --host=0.0.0.0 --port=80
