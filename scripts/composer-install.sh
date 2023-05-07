#!/usr/bin/env bash
docker exec -it service-creature-racer-user composer install
docker exec -it service-creature-racer-user bin/console lexik:jwt:generate-keypair
docker exec -it service-creature-racer-user npm --prefix ../js_scripts install
docker exec -it service-creature-racer-user npm install -g /app/js_scripts

docker exec -it service-creature-racer-game composer install

docker exec -it service-creature-racer-portal composer install

docker exec -it service-creature-racer-nft composer install
docker exec -it service-creature-racer-nft npm --prefix ../js_scripts install
docker exec -it service-creature-racer-nft npm install -g /app/js_scripts

docker exec -it service-creature-racer-contract composer install
docker exec -it service-creature-racer-contract npm --prefix ../js_scripts install
docker exec -it service-creature-racer-contract npm install -g /app/js_scripts

docker exec -it service-creature-racer-cron composer install
docker exec -it service-creature-racer-cron npm --prefix ../js_scripts install
docker exec -it service-creature-racer-cron npm install -g /app/js_scripts

docker exec -it service-creature-racer-admin composer install
docker exec -it service-creature-racer-admin npm --prefix ../js_scripts install
docker exec -it service-creature-racer-admin npm install -g /app/js_scripts
