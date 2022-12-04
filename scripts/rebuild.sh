#!/usr/bin/env bash

./scripts/remove.sh

docker compose build

./scripts/run.sh

./scripts/clear-cache.sh

./scripts/composer-install.sh

./scripts/migrations.sh

./scripts/post-commands.sh

./scripts/chmod-on-var.sh
