Skeleton php application

This repository contains the basic skeleton of the php application, which we will use in practical tasks.

Project structure:
* www - root directory, contains index.php (a script that processes all incoming requests)
* src - application source code
* static - directory with statics
* tests - tests (unit)
* docker - container docker settings

As an autoloader for classes, I suggest using composer, but if someone has a desire to write his own, then please :)
Installation

To make life easier for students, it is suggested to use a docker. Using the docker is optional, the student can select and configure the web server (or use the php builtin server), select the subd. Still, it is recommended to use mysql, because the author has hands-on experience with her.

I checked the functionality only on Unix systems, although everything should work on Windows too.
* Install docker
* Go to the docker folder
* Docker-compose up (-d run as daemon)
* We wait until all the image is installed, then open localhost: 8080 and if we see "Hello World", then everything is ok :)

Shortcuts
How to run tests?
* docker exec -ti docker_php_1 bash - переходим в контейнер php
* vendor/bin/phpunit tests/

How to get tolerance to mysql container?
* docker exec -ti docker_mysql_1 mysql


How to close all containers?
* docker-compose down -v

Links
* [php-fpm](http://php.net/manual/ru/install.fpm.php)
* [autoload](http://php.net/manual/ru/language.oop5.autoload.php)
* [docker](https://www.docker.com/)
* [composer](https://getcomposer.org/)
* [debug](https://medium.com/@pablofmorales/xdebug-with-docker-and-phpstorm-786da0d0fad2)
