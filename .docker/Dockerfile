FROM php:8.4

RUN apt update && apt install -y unzip curl git \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Install Xdebug
RUN pecl install xdebug

# Enabled show erros (optional)
RUN echo "display_errors=On" >> /usr/local/etc/php/conf.d/docker-php.ini \
    && echo "error_reporting=E_ALL" >> /usr/local/etc/php/conf.d/docker-php.ini

ARG DOCKER_HOST_IP=172.17.0.1    
# Create configuration files Xdebug
RUN echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host=${DOCKER_HOST_IP}" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/xdebug.ini

ARG UID=1000
ARG GID=1000
RUN groupadd -g ${GID} php && \
    useradd -u ${UID} -g ${GID} -m php

USER php    

WORKDIR /var/www/html    