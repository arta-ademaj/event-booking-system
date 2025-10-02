# Event Booking System (backend).

A RESTful PHP API built with Laravel for event booking system.
This is a Laravel-based RESTful API for managing **users, events, tickets, bookings, and payments**.  
It uses **Laravel Sanctum** for authentication and implements **role-based access control (RBAC)** for different user roles.
---

## 🚀 Technologies Used

- **PHP 7.4.19**
- **Laravel 8.83.29**
- **MySQL 8+**
- **Composer**
- **Postman** (for testing API endpoints)


---

## Features
- User authentication (Register, Login, Logout) using Laravel Sanctum
- Role-based access:
  - **Admin**: Manage all events, tickets, bookings
  - **Organizer**: Manage only their own events and tickets
  - **Customer**: Book tickets & view their own bookings
- Events CRUD (Create, Read, Update, Delete)
- Database seeding with sample data
- Feature & Unit tests with PHPUnit


## 🛠️ Setup Instructions

### 1. Clone the Repository

```
git clone https://github.com/arta-ademaj/event-booking-system.git
cd event-booking-system
```

### 2. Install Dependencies

```
composer install
```

### 3. Create `.env` File

```
cp .env.example .env
php artisan key:generate
```

Edit `.env` with your DB credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=event_booking_app
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Create Database

Create a database named `event_booking_app` (or the one you specified in `.env`) in MySQL:

```
CREATE DATABASE event_booking_app;
```

### 5. Run Migrations and Seeders

This project uses Laravel migrations to create both the database schema. Run the following command:

```
php artisan migrate
```

This will:
- Create the `users` table
- Create the `events` table
- Create the `tickets` table
- Create the `bookings` table
- Create the `payments` table
---

This project uses Laravel migrations to create both the database schema and seed initial data. Run the following commands:

```bash
php artisan migrate --seed



### 6. Clear and Cache Configuration (Optional)

After updating your `.env` or configuration files, run:

```bash
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:clear
```

### 3. Access the App

Visit: [http://localhost:8000](http://localhost:8000)

---


## Authentication & Authorization

This project uses **Laravel Sanctum** for API authentication and role-based access control.

### Authentication (Sanctum)

- **Register**  
  `POST /api/register`  
  Create a new user (Admin, Organizer, or Customer).  

- **Login**  
  `POST /api/login`  
  Returns an access token that must be sent in the `Authorization` header for all protected requests. 

  - **Logout**  
  `POST /api/logout`  
  Revokes the currently authenticated user's token.

    curl -X POST http://your-app.test/api/events \
    -H "Authorization: Bearer <token>" \
    -H "Content-Type: application/json" \
    -d '{
            "title": "Laravel Conference",
            "description": "Best practices with Laravel",
            "date": "2025-12-01",
            "location": "Prishtina",
            "created_by": 1
        }'
        
## 📬 API Endpoints (Example Requests)


All requests use the base URL: `http://localhost:8000/api`

### ➕ ENDPOINTS

**GET** `/api/events` 
**POST** `/api/events`
**PUT** `/api/events/1`  
**DELETE** `/api/events/1` 
**POST** `/api/register` 
**POST** `/api/login` 
**POST** `/api/logout` 

----

## 🧪 Testing the API

You can test the API using:

- [Postman](https://www.postman.com/)
- CURL
- Frontend client

Example with CURL:

```
curl -X GET http://localhost:8000/api/events
```

---

## 📝 License

This project is licensed under the MIT License.