FROM php:8.1-fpm-bullseye

# Set working directory
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
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && locale-gen en_US.UTF-8 \
  && localedef -f UTF-8 -i en_US en_US.UTF-8 \
  && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    bcmath \
    pcntl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

# Copy existing application directory contents
#COPY . /var/www

# Copy existing application directory permissions
RUN chown -R www-data:www-data /var/www

# Change current user to www-data
USER www-data


# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
