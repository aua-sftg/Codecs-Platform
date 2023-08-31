## Build steps

This repository is fo the CODECS platform.

Steps to perform:

1. git clone git@g.sftgroup.gr:codecs/codecs-platform-laravel-9.git
2. run `composer update`
3. run `./vendor/bin/sail up --build -d`
4. run `./vendor/bin/sail npm install` [the first time to build breeze filer]
5. run `./vendor/bin/sail npm run build` [the first time to build breeze filer]
6. copy `.env.example` as `.env` and update the mongodb connection string and database
7. run `./vendor/bin/sail artisan key:generate`


## Prerequisites
- you must have php version 8 and above installed on your system
- you must have composer installed
- you must have php-mongodb extension installed and activated
