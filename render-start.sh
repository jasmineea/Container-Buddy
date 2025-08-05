#!/usr/bin/env bash

# Run Laravel-specific setup
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Serve the app
php -S 0.0.0.0:8000 -t public
