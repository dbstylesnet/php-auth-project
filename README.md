
# PHP authetication project
Project allows to create users via UI, log in and carry on using application after being logged in.

### Tech stack:
* PHP
* MySQL
* Symphony
* React
* Docker

![PHP Authentification](https://github.com/dbstylesnet/auth-php-react/blob/master/screenshot.png)

## Project structure:
* www - root directory
* src - application source code
* static - directory with statics
* tests - tests (unit)
* docker - container docker settings

##  Installation:
* Install docker
* Install docker-compose
* In Docker folder run: $ docker-compose up -d

[http://localhost:5004/auth](http://localhost:5004/auth) to view it in the browser.

* In case there is autoload error under localhost, run:
* docker-compose run --rm composer install

### In order to run tests:
* $ docker exec -ti docker_php_1 bash
* $ vendor/bin/phpunit tests/

### In order to close all containers:
* $ docker-compose down -v
