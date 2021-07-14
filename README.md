# Laravel
## Requirements
https://getcomposer.org
https://www.docker.com/get-started

## Installation

git clone https://github.com/dv3xxx-git/paster.git
composer install

fill in the .env file
use ./vendor/bin/sail up
use ./vendor/bin/sail php artisan migrate --seed

## Schedule
use ./vendor/bin/sail php artisan schedule:work
