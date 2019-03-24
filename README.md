# Wirecard Technical Challenge

Endpoint: https://wirecardapi.appspot.com

Follow Postman file to import and then run REST services as known as bellow:

[docs/WirecardApi.postman_collection](docs/WirecardApi.postman_collection.json) It is for documentation as well.

## Google Cloud Platform as environment 

  Logging

  Deployment by gcloud command-line tools

## PHP 7

  Laravel 

  Xdebug

## Database

MySQL 2nd Gen 5.7		

 Laravel Migrations versioning schema

 running it: php artisan migrate

## Application architecture

 Services Providers and Service Container 
  
  app/Providers

 DDD Bundle

  src

  src/{Domain}/Application

  src/{Domain}/Domain

  src/{Domain}/Infrastructure

 Baseline

 src/Shared 

## Unit testing

 dir: /var/www/backend/wirecard

 running: ./vendor/bin/phpunit --testdox

## DDD -Domain Driven Design 
* Domain Event
* CQRS - Command Query Responsibility Segregation
* Design patterns as Repository, Dependency Injection, Factory, Facades, Services Locators
* SOLID - Single Responsibility, Dependency inversion principle, Open–closed principle

## Docker

 docker pull 216254431/wirecard-gcloud-php7

 docs/docker-compose.yml

 docker-compose up -d

 http://localhost:8080

## Improvements

* Add UUID for all entities in order to be identified globally
* Implement middleware security
* Speed up end-to-end application
* Increasing unit testing coverage
* Set up database transaction in order to ensure consistent data