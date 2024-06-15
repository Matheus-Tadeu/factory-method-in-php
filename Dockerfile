FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
&& docker-php-ext-install pdo_mysql zip

WORKDIR /var/www

COPY . /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 80

CMD bash -c composer install
    && if [ ! -f .env ]; then cp .env.example .env; fi
    && chmod 777 .env
    && php artisan key:generate
    && php artisan serve --host=0.0.0.0 --port=80
