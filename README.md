Skeleton PHP Authentication Application
(please pull 'last-working-branch' instead of master)

The app should allow to create users via UI, log in and carry on using application, being logged in. 

Project structure:
* www - root directory, contains index.php (a script that processes all incoming requests)
* src - application source code
* static - directory with statics
* tests - tests (unit)
* docker - container docker settings

Docker is optional.

Installation:
* Install docker
* Go to the docker folder
* Docker-compose up (-d run as daemon)
* Wait until all the image is installed, then open localhost: 8080 and if we see "Hello World", then everything is ok :)

How to run tests?
* docker exec -ti docker_php_1 bash
* vendor/bin/phpunit tests/

How to close all containers?
* docker-compose down -v
