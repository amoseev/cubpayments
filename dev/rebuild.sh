#!/bin/sh
docker rm -f $(docker ps -a -q)
docker-compose build --no-cache
docker-compose up -d --force-recreate
