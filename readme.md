<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Setup

- Clone the project
- Open command line and run : composer install
- Change database configurations according to your local database in the env file.
- run : php artisan key:generate
- run : php artisan migrate

## Notes
- From the description of the task I assumed that there is a one to many relationship between users and todos so every user can have many todos but every todo has only one user that created it.
- i also deployed it on heroku with the url : https://salty-headland-24388.herokuapp.com

Thanks