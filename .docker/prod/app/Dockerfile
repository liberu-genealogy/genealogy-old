#
# PHP Dependencies
#
FROM composer:latest as vendor

WORKDIR /
COPY ./composer.json /composer.json

COPY ./composer.lock /composer.lock
 
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist
 #
# Application
#

FROM php:8.2-fpm-bullseye

# Set working directory
COPY . /var/www/
COPY ./.env.example /var/www/.env
COPY --from=vendor /app/vendor/ /var/www/vendor/

WORKDIR /var/www

# Install dependencies
#install all the system dependencies and enable PHP modules
RUN apt-get update \
  && apt-get -y install --no-install-recommends \
    locales \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
                curl \
            libmemcached-dev \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libwebp-dev \
            libxpm-dev \
            libmcrypt-dev \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && locale-gen en_US.UTF-8 \
  && localedef -f UTF-8 -i en_US en_US.UTF-8 \
  && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    bcmath \
    pcntl \
  && docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-webp \
            --with-xpm \
            --with-freetype \
  && docker-php-ext-install gd \

#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

# Copy existing application directory permissions
RUN chown -R www-data:www-data /var/www

# Change current user to www-data
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
