# Better Tests with PHPUnit and Mockery

This repository is mean to serve as a reference for those seeking to begin writing or get better at writing automated tests. For the purposes of Illustration, the simple problem of FizzBuzz is used. For Later iterations, this solution gets radically over engineered to create interesting situations for testing.

## Requirements

1. PHP 5.5+
2. Installation of composer
3. Mysql install

> Note: This repository comes with PHPUnit defined as a dependency in the `composer.json`. In the real world, you should have PHPUnit installed globally on your system, as this is a test suite run-time dependency and not a dependency of of the project it self. There are other test runners out there and others might prefer to use one of them instead.

## Set Up

1. Clone repository
2. `cp .env.dist .env`
3. Create a mysql DB to use
4. Fill in your DB credentials and DB name in the newly created `.env` file
5. `composer install`
