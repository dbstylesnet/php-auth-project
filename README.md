
# PHP authetication project
The project allows users to be created through the UI, supports login, and enables continued use of the application once authenticated.

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
* In Docker folder run: `docker-compose up -d`

The database schema will be **automatically initialized** when you start the containers. The `db-init` service ensures that the required tables are created, even if you're pulling the project for the first time or if the database already exists.

### Manual Database Initialization (if needed):
If for some reason the automatic initialization fails, you can manually initialize the database:

```bash
docker exec -i docker_mysql_1 mysql -uapp -papp app < docker/mysql/scripts/01-init.sql
```

Or using the PHP script:
```bash
docker exec -it docker_php_1 php /data/docker/mysql/scripts/init-db.php
```

[http://localhost:5004/auth](http://localhost:5004/auth) to view it in the browser.

* In case there is autoload error under localhost, run:
* docker-compose run --rm composer install

### In order to run tests:
* $ docker exec -ti docker_php_1 bash
* $ vendor/bin/phpunit tests/

### In order to close all containers:
* $ docker-compose down -v
