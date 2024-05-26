<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the email address from the form
    $email = $_POST["email"];

    // Validate email address (optional)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email address
        die("Invalid email address");
    }

    // Save the email address to a text file (e.g., subscribers.txt)
    $file = fopen("subscribers.txt", "a");
    if ($file) {
        fwrite($file, $email . PHP_EOL);                    
        fclose($file);
        echo "Subscription successful!";
    } else {
        echo "Failed to open file.";
    }
} else {
    // Redirect to the index page if accessed directly
    header("Location: index.html");
    exit;
}
