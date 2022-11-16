#!/usr/bin/env bash
docker exec -it service-creature-racer-user composer dump-autoload
docker exec -it service-creature-racer-user bin/console cache:clear
docker exec -it service-creature-racer-user bin/console doctrine:cache:clear-metadata
docker exec -it service-creature-racer-user bin/console doctrine:cache:clear-query
docker exec -it service-creature-racer-user bin/console doctrine:cache:clear-result
docker exec -it service-creature-racer-user bin/console assets:install

docker exec -it service-creature-racer-game composer dump-autoload
docker exec -it service-creature-racer-game bin/console cache:clear
docker exec -it service-creature-racer-game bin/console doctrine:cache:clear-metadata
docker exec -it service-creature-racer-game bin/console doctrine:cache:clear-query
docker exec -it service-creature-racer-game bin/console doctrine:cache:clear-result
docker exec -it service-creature-racer-game bin/console assets:install
docker exec -it service-creature-racer-game chmod -R 777 /app/game/public/

docker exec -it service-creature-racer-cron composer dump-autoload
docker exec -it service-creature-racer-cron bin/console cache:clear
docker exec -it service-creature-racer-cron bin/console doctrine:cache:clear-metadata
docker exec -it service-creature-racer-cron bin/console doctrine:cache:clear-query
docker exec -it service-creature-racer-cron bin/console doctrine:cache:clear-result
docker exec -it service-creature-racer-cron bin/console assets:install

docker exec -it service-creature-racer-portal composer dump-autoload
docker exec -it service-creature-racer-portal bin/console cache:clear
docker exec -it service-creature-racer-portal bin/console doctrine:cache:clear-metadata
docker exec -it service-creature-racer-portal bin/console doctrine:cache:clear-query
docker exec -it service-creature-racer-portal bin/console doctrine:cache:clear-result
docker exec -it service-creature-racer-portal bin/console assets:install
docker exec -it service-creature-racer-portal chmod -R 777 var/

docker exec -it service-creature-racer-contract composer dump-autoload
docker exec -it service-creature-racer-contract bin/console cache:clear
docker exec -it service-creature-racer-contract bin/console doctrine:cache:clear-metadata
docker exec -it service-creature-racer-contract bin/console doctrine:cache:clear-query
docker exec -it service-creature-racer-contract bin/console doctrine:cache:clear-result
docker exec -it service-creature-racer-contract bin/console assets:install
docker exec -it service-creature-racer-contract chmod -R 777 var/

docker exec -it service-creature-racer-nft composer dump-autoload
docker exec -it service-creature-racer-nft bin/console cache:clear
docker exec -it service-creature-racer-nft bin/console doctrine:cache:clear-metadata
docker exec -it service-creature-racer-nft bin/console doctrine:cache:clear-query
docker exec -it service-creature-racer-nft bin/console doctrine:cache:clear-result
docker exec -it service-creature-racer-nft bin/console assets:install
docker exec -it service-creature-racer-nft chmod -R 777 var/

