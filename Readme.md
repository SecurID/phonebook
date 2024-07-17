# T9 Phonebook Application

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Setup Instructions](#setup-instructions)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
    - [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Running Tests](#running-tests)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

This is a T9 Phonebook application built with PHP and MySQL. It allows users to add and search for phonebook entries using a T9 predictive text search method.

## Features

- Add phonebook entries (lastname, firstname, phonenumber)
- Search entries using T9 predictive text input

## Setup Instructions

### Prerequisites

Ensure you have the following software installed on your machine:

- PHP (version 8.3 or higher)
- Composer
- SQLite
- Git

### Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/phonebook.git
    cd phonebook
    ```

2. Install dependencies using Composer:
    ```sh
    composer install
    ```

### Database Setup

1. Create the database file:
    ```sh
    touch database/phonebook.db
    ```

2. Run the setup script in your terminal to create the necessary tables:
    ```sh
    php database/setup.php
    ```

## Running the Application

1. Start the PHP built-in server:
    ```sh
    php -S localhost:8000 -t public
    ```

2. Open your browser and navigate to `http://localhost:8000`.

## Running Tests

1. Ensure the test database file is created:
    ```sh
    touch database/testing.db
    ```

2. Run the tests using PHPUnit:
    ```sh
    ./vendor/bin/phpunit tests
    ```

## Usage

- To add a phonebook entry, fill out the form on the main page and submit.
- To search for entries, use the T9 input method in the search form and submit.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.