#!/usr/bin/env bash

docker build --tag base-nginx-php:latest docker/microservices/base/
docker build --tag creature-racer-contract:latest docker/microservices/contract/
docker build --tag creature-racer-cron:latest docker/microservices/cron/
docker build --tag creature-racer-game:latest docker/microservices/game/
docker build --tag creature-racer-nft:latest docker/microservices/nft/
docker build --tag creature-racer-portal:latest docker/microservices/portal/
docker build --tag creature-racer-user:latest docker/microservices/user/
