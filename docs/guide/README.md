Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

It also goes a bit further regarding features and provides essential database, signup and password
restore out of the box.

Getting Started
---------------

* [Installation](start-installation.md)
* [Difference from basic project template](start-comparison.md)
* [Configuring Composer](start-composer.md)
* [Running Tests](start-testing.md)

Structure
---------

* [Directories](structure-directories.md)
* [Predefined path aliases](structure-path-aliases.md)
* [Applications](structure-applications.md)
* [Configuration and environments](structure-environments.md)

Additional Topics
-----------------

* [Creating links from backend to frontend](topic-link-backend-frontend.md)
* [Adding more applications](topic-adding-more-apps.md)
* [Using advanced project template at shared hosting](topic-shared-hosting.md)

Directory Structure
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
