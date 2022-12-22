## Table of contents

1. [General informations](#general-informations)
2. [Technologies](#technologies)
3. [Installation](#installation)
4. [Getting started](#getting-started)

## General informations

Project author : Zakaria Eddouh

Date : November 2022

## Technologies

Project realized with the Symfony framework version 6.1.

This application is optimized for a PHP 8.1.10 server, a MYSQL database is required.

The frontend is made with the Bootstrap framework.

## Installation

Download the code ZIP folder or clone the repository to your device.

```text
git clone https://github.com/zakariaeddouh/recipe.git
```

To install `composer`

[getcomposer.org/download/](https://getcomposer.org/download/)

Then run the following command:

```text
composer install
```

Create the application database:

```text
php bin/console doctrine:database:create
```

Edit the `.env` file at the root of the project to allow connection to your database:

```text
DATABASE_URL="mysql://root:password@127.0.0.1:3306/dbname?serverVersion=8"
```

Update your database:

```text
php bin/console doctrine:migrations:migrate
```

To create a dataset:

```text
php bin/console doctrine:fixtures:load
```

Launch the Symfony server:

```text
symfony server:start
```

Your site is now accessible at the following address

[https://127.0.0.1:8000](https://127.0.0.1:8000)

## Getting started

Once the project is installed, you can log in to the administration area using the following mail `admin@symrecipe.fr` and password `password` by following the `Login` link in the top right menu .
