#!/usr/bin/env bash

# Saves user id to temp file to use in cron operations
echo $(id -u) > /tmp/useruid

php-fpm -D

nginx

service cron restart

chmod -R 777 var/