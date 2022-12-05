#!/usr/bin/env bash

if [[ "$1" == "prod" ]]; then
  docker compose -f docker-compose-production.yml -f docker-compose.override.yml up -d
else
  docker compose -f docker-compose.yml -f docker-compose.override.yml  up -d
fi

docker exec -it service-creature-racer-user startup
docker exec -it service-creature-racer-game startup
docker exec -it service-creature-racer-cron startup
docker exec -it service-creature-racer-portal startup
docker exec -it service-creature-racer-contract startup
docker exec -it service-creature-racer-nft startup
docker exec -it service-creature-racer-admin startup
