<?php

$servername = "localhost";
$username = "root";
$password = "";

/* Connect to MySQL */
$conn = mysqli_connect($servername, $username, $password);

if (!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

/* Create Database */
$sql = "CREATE DATABASE IF NOT EXISTS techzone_db";

if(mysqli_query($conn,$sql))
{
    // Database Ready
}
else
{
    echo "Error Creating Database";
}

/* Select Database */
mysqli_select_db($conn,"techzone_db");

/* Users Table */
$sql = "CREATE TABLE IF NOT EXISTS users
(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
)";

mysqli_query($conn,$sql);

/* Orders Table */
$sql = "CREATE TABLE IF NOT EXISTS orders
(
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    customer_name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    total_amount DECIMAL(10,2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn,$sql);

/* Cart Items Table */
$sql = "CREATE TABLE IF NOT EXISTS cart_items
(
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_name VARCHAR(100),
    quantity INT,
    price DECIMAL(10,2),
    subtotal DECIMAL(10,2)
)";

mysqli_query($conn,$sql);

?>