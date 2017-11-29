#!/bin/sh
docker rm -f $(docker ps -a -q)
docker-compose up --build -d --force-recreate

docker  exec -it -u root payment.nginx chown -R www-data:www-data /var/log/nginx

docker  exec -it -u root payment.php-fpm chown -R www-data:www-data /var/www/payment

docker  exec -it -u root payment.php-fpm mkdir -p /var/log/payment
docker  exec -it -u root payment.php-fpm chown -R www-data:www-data /var/log/payment
docker  exec -it -u root payment.php-fpm mkdir -p /var/log/php
docker  exec -it -u root payment.php-fpm chown -R www-data:www-data /var/log/php

#composer install
docker exec -it -u www-data payment.php-fpm composer install
#generate key
docker exec -it -u www-data payment.php-fpm php artisan key:generate

#----- application -------
# migrations
docker exec -it -u www-data payment.php-fpm php artisan  doctrine:migrations:migrate


#даем права на логи.
#sudo chmod -R 777 $(dirname $0)/../logs
