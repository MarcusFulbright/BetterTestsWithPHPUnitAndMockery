# Better Tests with PHPUnit and Mockery

This repository is mean to serve as a reference for those seeking to begin writing or get better at writing automated tests. For the purposes of Illustration, the simple problem of FizzBuzz is used. For Later iterations, this solution gets radically over engineered to create interesting situations for testing.

## Requirements

1. PHP 5.5+
2. Installation of composer
3. Global install of PHPUnit
5. Mysql install

## Set Up

1. Clone repository
2. `cp .env.dist .env`
3. Create a mysql DB to use
4. Fill in your DB credentials and DB name in the newly created `.env` file

## Branches Explained

**Master**: This branch serves as a skeleton for the project. It has the basic PHPUnit configuration, boot-strap script, and testing directory structure that will be used.

**Unit**: This branch demonstrates the lowest level of unit tests. A single class (`src\Models\FizzBuzz`) exists that can handle solving FizzBuzz for a single integer. The tests for this class exist in `Tests\Unit\FizzBuzz`.

**Integration**: This branch demonstrates the later of testing above unit testing. Unit tests now use mock objects to handle dependencies. Test with multiple concrete classes are integration tests. These tests, just make sure that all objects are able to work together correctly.

**Database**: This branch adds a database into the mix. Unit tests exist for the new database classes. These tests show several ways to handle a database while testing including: mocking the connection, using transactions to ensure every test starts with the DB in the same state, and how to insert records into the DB when needed.

**Functional**: @TODO

