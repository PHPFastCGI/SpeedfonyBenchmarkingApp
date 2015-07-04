# Speedfony Benchmarking App

An application that can be used to benchmark the speed improvements of the SpeedfonyBundle.

## Install

This application (and the SpeedfonyBenchmarkingBundle) are not set up as composer packages.

You will have to follow the steps below to install the benchmark application.

### 1. Clone this repository

``` sh
git clone https://github.com/PHPFastCGI/SpeedfonyBenchmarkingApp.git
cd SpeedfonyBenchmarkingApp
```

### 2. Update composer packages

``` sh
composer update
```

Or:

``` sh
php composer.phar update
```

Depending on how you have [composer installed](https://getcomposer.org/download/).

### 3. Configure the application

Create a blank database and configure a user with sufficient permissions to create tables, read and write.

Set up your app/config/parameters.yml file using the user and database you have just configured.

### 4. Create the schema and load the fixtures

``` sh
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
```

### 5. Run the tests

If you have the following phpunit you can check that the application has been setup correctly by running the functional test.

``` sh
phpunit -c app/
```

### 6. Configure your web server

If you're using apache, add a directive similar to the one below to your virtual host configuration file.

```
FastCgiServer /path/to/symfony/web/app.fcgi
```
