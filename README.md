# iNewHomes Test Task Template

This is a Yii 2 boilerplate for test task completion.

This project is based on Yii 2 Advanced Project Template.
Documentation is at [docs/guide/README.md](docs/guide/README.md).

## Run using Docker

Install the application dependencies

    docker-compose run --rm backend composer install

Initialize the application by running the `init` command within a container with `dev` environment configs

    docker-compose run --rm backend /app/init --env=Development --overwrite=All
           
Start the application

    docker-compose up -d

Run the migrations

    docker-compose run --rm backend yii migrate
    
Access it in your browser by opening

- frontend: http://127.0.0.1:20080
- backend: http://127.0.0.1:21080

## Default user

During migration we create default user `admin` with credentials
- Login: admin
- Password: admin

If you want, you can register additional users, but admin user should be enough.
Registration is available here http://127.0.0.1:20080/site/signup.

## DB content

During migration we create `complex` and `city` entities and populate them with test data which will be useful during task completion.

NOTE: We create only tables in DB with necessary fields to import data. Further you have to manage models and create additional attributes.

## Environment variables

This template contains two predefined environments: `prod` and `dev`.

We have to use only `dev` environment as this is a test app and we do not need `prod` environment.

## Task 2

1. Get all complexes with pagination:
    - ```http://127.0.0.1:20080/complex```
    - ```http://127.0.0.1:20080/complex?page=2```
2. Get complexes with some fields only
    - ```http://127.0.0.1:20080/complex?fields[complexes]=name,address``` 
3. Filter complexes by field
    - ```http://127.0.0.1:20080/complex?filter[name]=500 Alton Road```
    - ```http://127.0.0.1:20080/complex?filter[complex_id]=45```
4. Filter complex by city_id
    - ```http://127.0.0.1:20080/complex?filter[city_id]=1```
    
## Task 4

1. Added rest app http://127.0.0.1:23080