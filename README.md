

# The app should allow to create users via UI, log in and carry on using application, being logged in. 

Used:
* PHP
* MySQL
* Symphony
* React
* Docker

Project structure:
* www - root directory, contains index.php (a script that processes all incoming requests)
* src - application source code
* static - directory with statics
* tests - tests (unit)
* docker - container docker settings

Installation:
* Install docker
* In Docker folder run: $ docker-compose up (-d run as daemon)

[http://localhost:5006](http://localhost:5006) to view it in the browser.

To run React front-end:
* Go to frontend folder and then $ yarn && yarn start

How to run tests?
* $ docker exec -ti docker_php_1 bash
* $ vendor/bin/phpunit tests/

How to close all containers?
* $ docker-compose down -v
