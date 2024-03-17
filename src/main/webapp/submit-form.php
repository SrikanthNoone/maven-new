<?php

// Database credentials
$hostname = 'localhost';
$username = 'admin';
$password = 'Admin@123';
$database = 'ecommerce_db';

// Establish a connection to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $product = mysqli_real_escape_string($conn, $_POST["product"]);

    // Print form data for debugging
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone: " . $phone . "<br>";
    echo "Product: " . $product . "<br>";

    // Construct SQL INSERT statement
    $sql = "INSERT INTO customer_orders (name, email, phone, product) VALUES ('$name', '$email', '$phone', '$product')";

    // Execute INSERT statement
    if (mysqli_query($conn, $sql)) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "No form data submitted.";
}

// Close the database connection
mysqli_close($conn);
?>
