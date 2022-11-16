#!/usr/bin/env bash

# Post commands
docker exec -it service-creature-racer-portal bin/console import:level-data:csv production_data.csv
docker exec -it service-creature-racer-portal bin/console app:creature:cohorts
docker exec -it service-creature-racer-portal bin/console app:creatures:max-preference-range
