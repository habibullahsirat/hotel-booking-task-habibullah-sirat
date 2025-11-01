# About this project
## Hotel Booking System
This Hotel Booking System is a Laravel web application designed to simulate a real hotel room reservation system. It allows users to browse different types of rooms (like Premium Deluxe, Super Deluxe, and Standard Deluxe) and book their stay online.

This project allows users to:
- View available rooms (Premium Deluxe, Super Deluxe, Standard Deluxe)
- Submit booking forms
- View a thank-you confirmation page
---

## Built with
- **Laravel’s MVC architecture**
- **Blade templates**
- **database migrations**

## Features

- Display of 3 different room types with images  
- Booking form with name, email, phone, and date fields  
- Thank-you page after successful booking  
- MySQL database integration  
- Simple Laravel routing and controller structure  

---
## Requirements

Before starting, make sure you have these installed on your computer:

| Tool                             | Version (Recommended) |
| -------------------------------- | --------------------- |
| PHP                              | ≥ 8.1                 |
| Composer                         | ≥ 2.5                 |
| MySQL                            | Any version           |
| Laravel                          | ≥ 11.x                |
| Node.js (optional, for frontend) | ≥ 18.x                |
| XAMPP                            | Any                   |

---
## 📁 Project Structure

```text
hotel-booking-task-habibullah-sirat/
├── app/
│   ├── Http/Controllers/BookingController.php
│   ├── Models/Booking.php
│   └── ...
├── database/
│   └── migrations/
├── public/
│   └── images/
├── resources/
│   └── views/
│       ├── index.blade.php
│       ├── available.blade.php
│       └── thankyou.blade.php
├── routes/
│   └── web.php
├── .env
├── composer.json
└── README.md
```
---
## installation guide.
#### Clone the Repository
```bash
git clone https://github.com/habibullahsirat/hotel-booking-task-habibullah-sirat.git
```
#### Go to Project Directory
```bash
cd hotel-booking-task-habibullah-sirat
```
#### Install PHP Dependencies
```bash
composer install
```
#### Create a Copy of the Environment File
```bash
cp .env.example .env
```
#### Generate Application Key
```bash
php artisan key:generate
```
#### Configure Database Connection

Open .env and set your MySQL credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_booking
DB_USERNAME=root
DB_PASSWORD=
```
#### If using XAMPP:
- Open phpMyAdmin 
- Create a new database named hotel_booking
---
#### Run Database Migrations
```bash
php artisan migrate
```
#### Start the Development Server
```bash
php artisan serve
```
Now open in your browser:
- http://localhost:8000
---
### Pages Overview
| Page                  | Description                                |
| --------------------- | ------------------------------------------ |
| `index.blade.php`     | Homepage with images and booking form      |
| `available.blade.php` | Shows available rooms and booking buttons  |
| `thankyou.blade.php`  | Displays booking confirmation and details  |
---
### Useful Artisan Commands
| Command                                         | Description              |
| ----------------------------------------------- | ------------------------ |
| `php artisan serve`                             | Start Laravel server     |
| `php artisan migrate`                           | Run all migrations       |
| `php artisan make:model Room -m`                | Create model + migration |
| `php artisan make:model RoomCategory -m`        | Create model + migration |
| `php artisan make:model Booking -m`             | Create model + migration |
| `php artisan make:controller BookingController` | Create controller        |
| `php artisan route:list`                        | Show all routes          |
| `php artisan make:seeder RoomSeeder`            | Create seeder            |
| `php artisan db:seed --class=RoomSeeder`        | Seeding Database         |


---
### Author
##### Habibullah Sirat
Passionate about Web Development

