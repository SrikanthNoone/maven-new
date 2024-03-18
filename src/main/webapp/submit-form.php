<?php

// Database credentials
$hostname = 'mysql-container'; // Update hostname to match MySQL container name
$username = 'root'; // Use root as the username
$password = 'root_password'; // Use the specified root password
$database = 'ecommerce_db';

// Establish a connection to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data (sanitized)
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $product = mysqli_real_escape_string($conn, $_POST["product"]);

    // Construct SQL INSERT statement using prepared statement
    $sql = "INSERT INTO customer_orders (name, email, phone, product) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Check if prepared statement was created successfully
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $product);

        // Execute prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Success: Redirect to success page
            header("Location: success.php");
            exit(); // Stop script execution
        } else {
            // Error: Display error message
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Error: Display error message
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
