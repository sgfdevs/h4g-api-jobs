# Hack 4 Good Project Workforce Development API

This API provides job listings and job-related events for the Hack 4 Good Workforce Development Project.

## Development setup

The project is written using a `PHP` framework called [`Laravel`](https://laravel.com/). The following will need to be installed to set up a local development environment.

### Software

* [Node](https://nodejs.org/en/download/)

* [PHP](https://www.php.net/downloads)
  * Install `PHP` for your platform. Mac users can use [`Homebrew`](https://formulae.brew.sh/formula/php).
  * Project tested with version 7.4.0 of PHP.

* [Composer](https://getcomposer.org/download/)
  * Dependency manager for PHP.
  * Install `Composer` for your platform. Mac users can use [`Homebrew`](https://formulae.brew.sh/formula/composer).

* Database
  * Laravel supports a few databases. Review the [documentation](https://laravel.com/docs/5.8/database) for guidance.
  * Tested successfully with `MySQL 8.0.19`.
  * For a simple solution, consider using [SQLite](https://www.sqlite.org/download.html)
    * There are many `SQLite` browsers available to use. For example, [DB Browser for SQLite](https://sqlitebrowser.org/).

### Seeding the Database

1. Run the database migrations:

```sh
php artisan migrate
```

2. Seed the database:

```sh
php artisan db:seed
```

### Optional Software

* [Valet](https://laravel.com/docs/6.x/valet) **Mac only**
  * For the Mac minimalists that want to set up a Laravel development environment, Valet is a great alternative to `Homestead`.

* [Homestead](https://laravel.com/docs/6.x/homestead)

* [Laravel](https://laravel.com/docs/6.x#installing-laravel)
  * For starting new Laravel projects and making the `laravel cli tool` available globally in your terminal of choice.

## Installation

Node dependencies:
```sh
npm install
```

PHP dependencies:

```sh
composer install
```

## Running the app

To start the app, in a terminal execute:

```sh
php artisan serve
```

## Usage example

_For more examples and usage, please refer to the [Wiki](https://github.com/sgfdevs/h4g-api-jobs/wiki)._



## Contributing

1. Fork it (<https://github.com/sgfdevs/h4g-api-jobs/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin head`)
5. Create a new Pull Request
