FROM php:8.4

RUN apt update && apt install -y unzip curl git \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html    