### To run server please use below commands

`composer install`

`docker-compose up -d`


Copy .env.example to make .env with below database configure

`DB_CONNECTION=mysql`
`DB_HOST=0.0.0.0`
`DB_PORT=3306`
`DB_DATABASE=pet_shop`
`DB_USERNAME=root`
`DB_PASSWORD=root`

To run docker server

`docker-compose start`

To run generate key

`php artisan key:generate`

To run migrate

`php artisan migrate --seed`

`php artisan passport:install`

Postman apis already exists in postman folder
