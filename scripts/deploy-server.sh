#!/usr/bin/env bash

git reset --hard
git pull origin $1

./scripts/remove.sh

./scripts/run.sh $2

./scripts/clear-cache.sh

./scripts/composer-install.sh

./scripts/migrations.sh

./scripts/chmod-on-var.sh