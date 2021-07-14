# Laravel
## Requirements
**https://getcomposer.org**

**https://www.docker.com/get-started**

## Installation
```
git clone https://github.com/dv3xxx-git/paster.git
composer install
```
fill in the .env file as in the env.example
```
 ./vendor/bin/sail up
 ./vendor/bin/sail php artisan migrate --seed
 ```

## Schedule
use
```
./vendor/bin/sail php artisan schedule:work
```
