### Starter Laravel for Backend Development 

A Laravel PHP Framework implementation of frontend and backend using microservice architecture with docker-compose

## Prerequisites 

* Install Docker/Docker-compose.
* Install Laradock
* set up Laradock 
* Copy the example env file and make the required configuration changes in the .env file
```
DB_CONNECTION=mysql
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=UG_DINING_BOOKING_APP
DB_USERNAME=root
DB_PASSWORD=root
```

## Ports used in the project

* nginx	  8090
* phpmyadmin	8081

## Instructions

* run docker-compose execute command " docker-compose up -d nginx mariadb phpmyadmin workspace "
* Create Database as " UG_DINING_BOOKING_APP "
* docker exec -it your-laradock-workspace-container-name bash -c "composer install"
* docker exec -it your-laradock-workspace-container-name bash -c "php artisan migrate"
  
## Folders Structure
```
app - Contains all the Eloquent models
app/Http/Controllers/Api - Contains all the api controllers
app/Http/Middleware - Contains the JWT auth middleware
app/Models - Contains all of Eloquent model classes 
app/Http/Requests/Api - Contains all the api form requests
config - Contains all the application configuration files
database/factories - Contains the model factory for all the models
database/migrations - Contains all the database migrations
routes - Contains all the api routes defined in api.php file
tests/Feature - Contains the api tests

```
## Outline

/**This applications uses JSON Web Token (JWT) to handle authentication.
     * The token is passed with each request using the Authorization header with Token scheme.
     * The JWT authentication middleware handles the validation and authentication of the token.
     */




