-- Create database if not exists
CREATE DATABASE IF NOT EXISTS ecommerce_db;

-- Use the database
USE ecommerce_db;

-- Create table to store customer orders
CREATE TABLE IF NOT EXISTS customer_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    product VARCHAR(100) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
