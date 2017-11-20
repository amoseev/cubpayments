FROM php:7.1-fpm

RUN apt-get update && apt-get install -y \
    openssl \
    unzip \
    libmcrypt-dev  \
    libicu-dev \
    mysql-client \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install iconv \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install intl \
    && docker-php-ext-install opcache


# Set timezone
ARG TIMEZONE
#//todo починить для web
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && apt-get install -f -y --reinstall locales && locale-gen en_US.UTF-8
RUN printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini
RUN "date"

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Php errors
ARG PHP_ERROR_LOG_FILE
RUN printf 'error_log="%s"\n' ${PHP_ERROR_LOG_FILE} >> /usr/local/etc/php/conf.d/docker-php-ext.ini
RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext.ini
RUN echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext.ini
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext.ini
RUN echo "log_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext.ini

# install xdebug
ARG XDEBUG_IP_ADDRESS
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN printf 'xdebug.remote_host="%s"\n' ${XDEBUG_IP_ADDRESS} >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


##############

CMD ["php-fpm"]

WORKDIR /var/www/payment