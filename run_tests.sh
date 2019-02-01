#!/usr/bin/env bash
docker-compose exec app bash -c "cd /var/www/laravel && vendor/bin/codecept run acceptance"

