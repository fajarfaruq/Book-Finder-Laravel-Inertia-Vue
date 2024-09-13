# Laravel Project with Vite and Inertia

## Introduction

Welcome to the Laravel project! This project utilizes Laravel 11.20.0 along with Vite for modern frontend asset bundling and Inertia.js for a seamless SPA experience using Laravel and Vue.js. The project is configured with SQLite as its database for simplicity and ease of setup.

## Requirements

Before you begin, make sure you have the following software installed:

- **Node.js** v22.7.0
- **PHP** v8.3
- **SQLite** driver for PHP

## Installation

Follow these steps to set up and run the project on your local machine:

### 1. Clone the Repository

Clone the project repository to your local environment:

```bash
git clone https://github.com/fajarfaruq/Book-Finder-Laravel-Inertia-Vue
cd Book-Finder-Laravel-Inertia-Vue
```
### 2. Install PHP Dependencies

Ensure you have Composer installed. If not, download and install Composer. Then, install the PHP dependencies:

```bash
composer install
```

### 3. Configure Environment Variables

Copy the example environment file to create your own .env file:

```bash
cp .env.example .env
```

Update your .env file with the SQLite database configuration:

```bash
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite
```

Replace /path/to/database.sqlite with the actual path where you want to create your SQLite database file.

### 4. Generate the Application Key

Generate a new application key for your Laravel project:

```bash
php artisan key:generate
```

### 5. Install Node.js Dependencies

Make sure you have Node.js v22.7.0 installed. If not, download and install Node.js. Then, install the JavaScript dependencies:

```bash
npm install
```

### 6. Run Migrations
Set up the database schema by running the migrations:

```bash
php artisan migrate
```

### 7. Start the Development Server
In one terminal window or tab, start the Laravel development server:

```bash
php artisan serve
The server will be available at http://127.0.0.1:8000 by default.
```

### 8. Start Vite for Frontend Development
In another terminal window or tab, start Vite to handle frontend assets:

```bash
npm run dev
```

This will start the Vite development server, providing fast refresh and hot module replacement.