# Secure Login System

A Laravel-based web application demonstrating user authentication, two-factor authentication (2FA), and role-based access control.

**Source Code:** [GitHub Repository](https://github.com/edudzinanayaw-source/secure-login-system)  
**Live Demo:** [Open the Deployed Application](https://secure-login-system-qlal.onrender.com)

> **Project status:** Academic project in development. The live demo and the latest password-pepper changes should be tested before being described as production-ready.

## Project Overview

The Secure Login System was developed as an academic project to demonstrate how a web application can identify users, verify their identity, and restrict access according to their assigned roles.

The application uses Laravel authentication features and a MySQL database. It includes registration and login, optional two-factor authentication setup, and separate access for users with different roles.

## Main Features

- User registration and login
- Two-factor authentication using an authenticator app
- Recovery codes for two-factor authentication
- Role-based access control for two user roles
- Password hashing
- A password-pepper integration being developed
- Database migrations for application tables
- Login and dashboard views

## Technology Stack

| Component | Technology |
|---|---|
| Backend framework | Laravel 13.34.0 |
| Programming language | PHP 8.3.33 |
| Database | MySQL 8.0.41 |
| Authentication | Laravel Fortify 1.40.0 |
| Frontend | Blade templates |
| Local development environment | Laragon |
| Source control | Git and GitHub |

## Authentication and Access Control

### Registration and Login

Users can create an account and sign in using their credentials. Laravel’s authentication features are used to support the login process.

### Two-Factor Authentication

The application includes a two-factor authentication setup flow. Users can scan a QR code with an authenticator application and confirm the setup using a generated code. Recovery codes are also provided.

### Role-Based Access Control

The application supports two roles: **Admin** and **User**. Role-based access is intended to restrict users to the pages and functions permitted for their role.

### Password Protection

Passwords are hashed before being stored. A password-pepper integration is also being added as an additional security measure. The pepper implementation and registration flow must be fully tested before this feature is considered complete.

## Local Installation

### Requirements

Install the following before running the project locally:

- PHP 8.3 or a compatible version
- Composer
- MySQL
- Node.js and npm, if frontend assets need to be built
- A local PHP environment such as Laragon

### 1. Clone the repository

```bash
git clone https://github.com/edudzinanayaw-source/secure-login-system.git
cd secure-login-system
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure the environment

Copy `.env.example` to `.env` and update the database settings for your local MySQL installation.

```env
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=secure_login
DB_USERNAME=root
DB_PASSWORD=
```

Create a database named `secure_login` in MySQL. Use the username and password configured for your own local database.

**Do not commit your `.env` file, application keys, database credentials, pepper values, or other secrets to GitHub.**

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Run database migrations

```bash
php artisan migrate
```

### 6. Build frontend assets

```bash
npm run build
```

### 7. Start the local development server

```bash
php artisan serve
```

Open `http://127.0.0.1:8000` in your browser.

## Database

The application uses Laravel migrations to create and update its database structure. The development database includes the user table and additional tables for features such as two-factor authentication and role management.

For a fresh local installation, run the migrations using the command shown above.

## Demonstration

The demonstration should show the main user journey:

1. Open the registration page and create a test account.
2. Sign in with the test account.
3. Set up and confirm two-factor authentication.
4. Sign out and sign in again, completing the 2FA challenge.
5. Confirm that the account is directed to the appropriate dashboard for its role.

**Demonstration video:** Add a link here after uploading the video to a location accessible to viewers, such as a GitHub repository asset or a shareable video link.

## Testing and Current Status

The application has been tested locally during development, including registration, login, the two-factor authentication flow, and dashboard access.

The current development notes also identify work that requires final verification, including the password-pepper registration change and the deployed application’s behavior. Confirm these items before presenting the project as fully tested or production-ready.

## Security Notes

- Use test accounts for demonstrations.
- Keep credentials and secret values out of the repository.
- Do not publish real user passwords, recovery codes, or sensitive database contents in screenshots or videos.
- Treat the hosted demo as an academic demonstration unless production security and deployment checks have been completed.

## Author and Purpose

This project was developed as part of an academic exercise in web application security. It demonstrates practical implementation of authentication, two-factor authentication, and role-based access control using Laravel.
