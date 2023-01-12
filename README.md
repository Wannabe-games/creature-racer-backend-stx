# Creature Racer Backend

## Description

This is a complete stack for running into Docker containers using docker-compose tool. It is composed by 11 containers:

- `service-creature-racer-admin`
- `service-creature-racer-contract`
- `service-creature-racer-cron`
- `service-creature-racer-game`
- `service-creature-racer-mailer`
- `service-creature-racer-mongo`
- `service-creature-racer-pgbackups`
- `service-creature-racer-portal`
- `service-creature-racer-postgres`
- `service-creature-racer-redis`
- `service-creature-racer-user`


## Installation

1. Clone this repo.

2. Create and custom the file `./docker-compose.override.yml` using `./docker-compose.override.yml.dist` as template.

3. Optional create and custom the file `./src/common/.env.local` using `./src/common/.env.local.dist` as template.

4. Go inside folder `./scripts` and run `deploy.sh` to deploy and run `run.sh` to start containers.
