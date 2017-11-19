#!/bin/sh
docker rm -f $(docker ps -a -q)
docker-compose up --build -d --force-recreate
