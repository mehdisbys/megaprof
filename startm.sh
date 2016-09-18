#! /bin/bash
mysql.server start
./dumps/apply.sh 

php artisan env
php artisan serve


