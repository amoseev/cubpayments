#!/bin/sh
docker  exec -it -u www-data payment.php-fpm rm -rf /var/log/payment
docker  exec -it -u www-data payment.php-fpm rm -rf /var/log/php