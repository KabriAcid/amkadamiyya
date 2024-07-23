<?php
session_start();
include "config/database.php";

if (isset($_POST['contactBtn'])) {
    // Collect and sanitize form data
    $first_name = htmlspecialchars(ucfirst(trim($_POST['first_name'])));
    $last_name = htmlspecialchars(ucfirst(trim($_POST['last_name'])));
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $message = trim($_POST['message']);

    // Validation checks
    $errors = [];

    if (empty($first_name) || !preg_match("/^[a-zA-Z'-]+$/", $first_name)) {
        $errors[] = "Invalid or empty first name.";
    }
    if (empty($last_name) || !preg_match("/^[a-zA-Z'-]+$/", $last_name)) {
        $errors[] = "Invalid or empty last name.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid or empty email.";
    }
    if (empty($phone_number) || !preg_match("/^[0-9]{10,15}$/", $phone_number)) {
        $errors[] = "Invalid or empty phone number.";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

    // If there are validation errors, store them and redirect
    if (!empty($errors)) {
        $_SESSION['error_message'] = implode(' ', $errors);
        header("Location: index.php");
        exit;
    }

    // Prepare and bind parameters to prevent SQL injection
    $sql = "INSERT INTO `contacts` (first_name, last_name, email, phone_number, message) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $phone_number, $message);

        // Execute the statement and check for success
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Form submitted successfully!";
        } else {
            $_SESSION['error_message'] = "Error occurred: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = "Error occurred: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: index.php");
    exit;
}
