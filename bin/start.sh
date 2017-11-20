#!/bin/sh
docker rm -f $(docker ps -a -q)
docker-compose up --build -d --force-recreate

docker  exec -it  payment.nginx chown -R www-data:www-data /var/log/nginx

docker  exec -it  payment.php-fpm mkdir -p /var/log/payment
docker  exec -it  payment.php-fpm chown -R www-data:www-data /var/log/payment
docker  exec -it  payment.php-fpm mkdir -p /var/log/php
docker  exec -it  payment.php-fpm chown -R www-data:www-data /var/log/php

#may need password
sudo chmod -R 777 logs/