<?php
// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["product"])) {
        // Retrieve the form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $product = $_POST["product"];

        // Further processing of the form data will be done here
    } else {
        // Handle missing required fields
        echo "Error: All required fields must be filled out.";
    }
} else {
    // Handle cases where form data has not been submitted
    echo "Error: Form data has not been submitted.";
}
?>
