#!/bin/sh
cp $(dirname $0)/../.env.dist $(dirname $0)/../.env
cp $(dirname $0)/../workspace/.env.example $(dirname $0)/../workspace/.env

cp $(dirname $0)/../deployment/docker-compose.deploy.template.yml.example $(dirname $0)/../deployment/docker-compose.deploy.template.yml
cp $(dirname $0)/../deployment/payment.env.deploy.template.example $(dirname $0)/../deployment/payment.env.deploy.template