#!/usr/bin/env bash

# Postgres migrations
docker exec -it service-creature-racer-game bin/console doctrine:migrations:migrate --no-interaction

# MongoDB migrations
docker exec -it service-creature-racer-game bin/console doctrine:mongodb:schema:update
