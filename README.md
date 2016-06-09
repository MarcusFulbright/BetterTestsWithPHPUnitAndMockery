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

## Branches Explained

**Master**: This branch serves as a skeleton for the project. It has the basic PHPUnit configuration, boot-strap script, and testing directory structure that will be used.

**Unit**: This branch demonstrates the lowest level of unit tests. A single class (`src\Models\FizzBuzz`) exists that can handle solving FizzBuzz for a single integer. The tests for this class exist in `Tests\Unit\FizzBuzz`.

**Integration**: This branch demonstrates the later of testing above unit testing. Unit tests now use mock objects to handle dependencies. Test with multiple concrete classes are integration tests. These tests, just make sure that all objects are able to work together correctly.

**Trait**: This branch uses a trait to ensure that all incoming data is actually an integer. A dummy class is used to test the trait.

**Database**: This branch adds a database into the mix. Unit tests exist for the new database classes. These tests show several ways to handle a database while testing including: mocking the connection, using transactions to ensure every test starts with the DB in the same state, and how to insert records into the DB when needed.

**Functional**: This branch adds functional testing using PHPs built in web server. Here we use Slim PHP to make a single API endpoint to provide an entry point to our fizzbuzz function. We create our own LocalWebTestCase which handles spinning up / tearing down the web server for each test.
