FROM php:fpm

WORKDIR /var/www
RUN rmdir /var/www/html
COPY www.conf /usr/local/etc/php-fpm.d/www.conf

ENV user=app
ENV uid=1000
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
 && mkdir -p /home/$user \
 && chown -R $user:$user /home/$user

RUN pecl install xdebug && docker-php-ext-enable xdebug \
 && echo "xdebug.mode=debug,develop\n xdebug.client_host=host.docker.internal\n xdebug.start_with_request=trigger\n xdebug.trigger_value=PHPSTORM" > /usr/local/etc/php/conf.d/xdebug.ini
