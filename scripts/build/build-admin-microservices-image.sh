#!/usr/bin/env bash

docker build --tag base-nginx-php:latest docker/microservices/base/
docker build --tag creature-racer-admin:latest docker/microservices/admin/
