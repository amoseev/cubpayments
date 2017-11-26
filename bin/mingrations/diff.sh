#!/usr/bin/env bash

docker  exec -it -u root payment.php-fpm php artisan doctrine:migrations:diff --connection=$1