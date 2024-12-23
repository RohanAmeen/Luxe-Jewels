
# Luxe Jewels

Luxe Jewels is an e-commerce jewelry platform designed to offer a seamless online shopping experience for customers. The platform allows users to browse products, add items to their cart, and make purchases. It also incorporates an API for managing products and implementing user authentication through Laravel Passport.

---

## Project Overview

Luxe Jewels provides a feature-rich online jewelry store with the following:

- **E-commerce functionality:** Users can browse and purchase products.
- **Authentication:** Implemented using Laravel Passport for secure authentication.
- **Product API:** A set of RESTful API endpoints to interact with product data.

This project is built using **Laravel**, **Laravel Passport** for API authentication, and includes various features such as product management and user authentication.

---

## Setup Instructions

Follow the steps below to set up the project locally:

### 1. Clone the Repository

```bash
git clone <repository_url>
cd LuxeJewels
```

### 2. Install Dependencies

Ensure you have **Composer** installed. If not, install it from [here](https://getcomposer.org/).

Run the following command to install the required dependencies:

```bash
composer install
```

### 3. Set Up Environment File

Create a `.env` file by copying the `.env.example` file:

```bash
cp .env.example .env
```

### 4. Generate Application Key

Run the following command to generate the application key:

```bash
php artisan key:generate
```

### 5. Set Up Database

Update your `.env` file with the correct database connection settings. Here’s an example:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=luxejewels
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Migrations

Run the migrations to set up the database tables:

```bash
php artisan migrate
```

### 7. Install Passport

Install Laravel Passport for API authentication:

```bash
composer require laravel/passport
```

Then, publish Passport’s assets:

```bash
php artisan vendor:publish --provider="Laravel\Passport\PassportServiceProvider"
```

Run the migrations for Passport:

```bash
php artisan migrate
```

Finally, install Passport and generate the necessary encryption keys:

```bash
php artisan passport:install
```

---

## Usage Guide

### Accessing the Application

- Start the Laravel development server:

```bash
php artisan serve
```

By default, the application will be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000).

### API Testing with Postman

1. **Set Up Environment Variables** in Postman:
   - Create an environment with the base URL of the project: `http://127.0.0.1:8000`.
   - Define environment variables like `baseUrl` and `token`.

2. **Authenticate User:**
   - Send a POST request to `/api/login` with your user credentials.
   - Obtain the authentication token from the response.

3. **Test API Endpoints:**
   - Use the generated token in the `Authorization` header as `Bearer <token>` to access protected routes like `/api/products`.

4. **Example Request (Get Products):**
   - Method: `GET`
   - URL: `{{baseUrl}}/api/products`
   - Headers: 
     - Authorization: `Bearer {{token}}`

---

## Contributing

If you'd like to contribute to the project, please fork the repository and submit a pull request. Contributions, bug reports, and suggestions are always welcome!

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---











<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
