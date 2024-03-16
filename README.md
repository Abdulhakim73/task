# Dockerized Laravel

Docker development implementation for Laravel 8.\* with:

- Nginx
- PostgreSQL
- PHP 8.0

## Installation

- Clone this repository ``
- Make sure you have docker installed on your local machine, you do not need to have php / mysql / redis / node installed on your machine
- typ_command: `cp .env.example .env`
- Run command: `docker-compose up --build -d`
- Run the container in bash mode: `docker exec -it Laravel_php /bin/sh`
- Install composer dependencies: `composer install`
- Generate key: `php artisan key:generate`
- Run migration: `php artisan migrate`
- You can access the project at: `http://localhost:8000` 
- If there apperance (permission denide) type: `sudo chmod -R 777 /path to file/tesTask/storage/logs`
- `php artisan config:clear`
- `php artisan cache:clear`
- `php artisan optimize`
- Run migration: `php artisan migrate`
- All apis are located on `/routes/api.php`
- You can chack api: `http://localhost:8000/api/apiName`

