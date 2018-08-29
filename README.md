# mbsoft

create a new database (e.g: screen )

modify .env file 

#DB_CONNECTION=mysql

#DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=screen

DB_USERNAME=root

DB_PASSWORD=

run to create database tables:

php artisan migrate:fresh --seed

then run the server:

php artisan serve

