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

    // Construct SQL INSERT statement using prepared statement
    $sql = "INSERT INTO customer_orders (name, email, phone, product) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $product);

    // Execute prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Success: Redirect or display success message
        header("Location: success.php"); // Redirect to success page
        exit(); // Stop script execution
    } else {
        // Error: Display error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
