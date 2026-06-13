# TechZone Electronics

## Project Overview

TechZone Electronics is a database-driven e-commerce web application developed using HTML, CSS, JavaScript, PHP, and MySQL. The project allows users to register, log in, browse electronic products, add items to a shopping cart, manage quantities, and place orders through a checkout system.

The application demonstrates the integration of frontend and backend web technologies while implementing session management, database connectivity, user authentication, and order processing.

---

## Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript

### Backend

* PHP

### Database

* MySQL

### Development Environment

* XAMPP

---

## Features

* User Registration
* User Login and Logout
* Session Management
* Product Catalog
* Shopping Cart
* Add to Cart Functionality
* Quantity Controls
* Cart Count Display
* Total Price Calculation
* Checkout System
* Order Confirmation Page
* MySQL Database Integration

---

## Database Structure

### users

| Column   |
| -------- |
| user_id  |
| name     |
| email    |
| password |

### orders

| Column        |
| ------------- |
| order_id      |
| user_id       |
| customer_name |
| email         |
| phone         |
| address       |
| total_amount  |
| order_date    |

### cart_items

| Column       |
| ------------ |
| item_id      |
| order_id     |
| product_name |
| quantity     |
| price        |
| subtotal     |

---

## Project Flow

Register → Login → Browse Products → Add To Cart → Manage Cart → Checkout → Order Confirmation

---

## How to Run

1. Install XAMPP.
2. Start Apache and MySQL.
3. Copy the project folder into:

```text
htdocs/TechZone
```

4. Open browser and visit:

```text
http://localhost/TechZone/register.php
```

5. Create an account and start using the application.

---

## Learning Outcomes

This project helped in understanding:

* PHP Session Management
* MySQL Database Operations
* Form Handling
* User Authentication
* Shopping Cart Implementation
* Order Processing Workflow
* Frontend and Backend Integration

---

## Author

**Aarathi M Iyer**

USN: 1CD24CS005

Department of Computer Science and Engineering

Cambridge Institute of Technology
