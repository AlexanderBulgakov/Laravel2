<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Simple blog (example)
- git clone https://github.com/AlexanderBulgakov/Laravel2.git simple-blog
- cd simple-blog/
- composer install
- cp .env.example .env
- php artisan key:generate
- add or change settings in .env file (for example) 
  - APP_NAME="Simple Blog"
  - DB_CONNECTION=mysql
  - DB_HOST=mysql
  - DB_PORT=3306
  - DB_DATABASE=simple_blog
  - DB_USERNAME=sail
  - DB_PASSWORD=password
  - REDIS_HOST=redis
  - SCOUT_DRIVER=meilisearch
  - MEILISEARCH_HOST=http://meilisearch:7700
- ./vendor/bin/sail up -d
- docker exec -it simple-blog-laravel.test-1 sh
- chown -R sail:sail storage
- npm install
- npm run build
- php artisan migrate
- php artisan db:seed --class=UserSeeder
- php artisan storage:link
- go to http://localhost/login
  - demo@test.test
  - 1234567890
- go to http://localhost:8025/ for verification email

## Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
