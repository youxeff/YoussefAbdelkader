<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Validate and process data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        http_response_code(400); // Bad request
        echo "Please fill out all fields.";
        exit();
    }

    // Additional validation or sanitization can be added here

    // Send email
    $to = "recipient@example.com"; // Replace with the recipient's email address
    $headers = "From: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200); // OK
        echo "OK"; // Return success message to JavaScript
        exit();
    } else {
        http_response_code(500); // Internal server error
        echo "Email sending failed.";
        exit();
    }
} else {
    http_response_code(405); // Method not allowed
    echo "Method not allowed.";
    exit();
}
?>
