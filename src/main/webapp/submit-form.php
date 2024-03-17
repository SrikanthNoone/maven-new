<?php
// Database credentials
$host = 'localhost'; // Assuming MySQL server is running on the same host
$username = 'admin';
$password = 'Admin@123';
$database = 'ecommerce_db';

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["product"])) {
        // Retrieve the form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $product = $_POST["product"];

        // Connect to the database
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into the database
        $sql = "INSERT INTO customer_orders (name, email, phone, product) VALUES ('$name', '$email', '$phone', '$product')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    } else {
        // Handle missing required fields
        echo "Error: All required fields must be filled out.";
    }
} else {
    // Handle cases where form data has not been submitted
    echo "Error: Form data has not been submitted.";
}
?>
