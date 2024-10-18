

## Overview

This quiz system allows users to participate in quizzes, view their results, and compete on leaderboards.

## Features

#### Admin Features

-   Manage other admins
-   Manage quizzes
-   Manage questions and options
-   View all the tests taken on the system

#### User Features

-   Log in and register
-   Participate in quizzes as a guest or registered user
-   View a specific quiz's results and leaderboard
-   View the overall leaderboard, which ranks all users based on their test results

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

#### Installation

1- Clone the project

```
git clone https://github.com/haweil/DEPI-Project.git
```

2- Install the dependencies

```
composer install
```

3- Configure the environment:

```
cp .env.example .env
```

4- Generate the application key:

```
php artisan key:generate
```

5- Migrate the database:

```
php artisan migrate --seed
```

6- Start the development server:

```
php artisan serve
```

## Running Tests

To run tests, run the following command

```
  php artisan test
```

