#!/usr/bin/env bash

cd $(dirname $0)/../
cub_dir=$(pwd)
deploy_dir=$cub_dir/deployment

git reset --hard && git checkout master && git pull

last_build=0 #номер билда
for f in $deploy_dir/builds/*; do
    if [ -d ${f} ]; then  #если путь это папка
        iterator_build_dir=$(basename $f); #только имя папки
        if [ "$iterator_build_dir" -ge "$last_build" ];then
            last_build=$iterator_build_dir;
        fi

    fi
done
build=$(($last_build+1));#следующий билд - это +1 от максимального
build_dir=$deploy_dir/builds/$build #папка нового билда

mkdir $build_dir
build_docker_compose=$build_dir/docker-compose.deploy.$build.yml
build_payment_env=$build_dir/payment.env.deploy.$build

sed -e "s/<build>/$build/g" $deploy_dir/docker-compose.deploy.template.yml >> $build_docker_compose
sed -e "s/<build>/$build/g" $deploy_dir/payment.env.deploy.template >> $build_payment_env


sed -e 's#<cub_dir>#'$cub_dir'#g' $build_docker_compose > $build_docker_compose.temp
rm $build_docker_compose
mv $build_docker_compose.temp $build_docker_compose

sed -e "s#<build_dir>#$build_dir#g" $build_docker_compose > $build_docker_compose.temp
rm $build_docker_compose
mv $build_docker_compose.temp $build_docker_compose

docker-compose -f $build_docker_compose build
docker rm -f $(docker ps -a -q)
docker-compose -f $build_docker_compose up -d

c_nginx_build=payment.nginx.$build
c_php_fpm_build=payment.php-fpm.$build

docker  exec -it -u root $c_nginx_build chown -R www-data:www-data /var/log/nginx
docker  exec -it -u root $c_php_fpm_build chown -R www-data:www-data /var/www/payment
docker  exec -it -u root $c_php_fpm_build mkdir -p /var/log/payment
docker  exec -it -u root $c_php_fpm_build chown -R www-data:www-data /var/log/payment
docker  exec -it -u root $c_php_fpm_build mkdir -p /var/log/php
docker  exec -it -u root $c_php_fpm_build chown -R www-data:www-data /var/log/php
#composer install
docker exec -it -u www-data $c_php_fpm_build composer install
#generate key
docker exec -it -u www-data $c_php_fpm_build php artisan key:generate --force --no-interaction
#----- application -------
# migrations
docker exec -it -u www-data $c_php_fpm_build php artisan  doctrine:migrations:migrate --force --no-interaction