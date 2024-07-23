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
        $_SESSION['error_message'] = $errors;
        header("Location: " . $_SERVER['PHP_SELF']);
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
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email from the form submission
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email address.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT email FROM newsletters WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "The email is already subscribed.";
        $stmt->close();
        $conn->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $stmt->close();

        // Insert the email into the newsletter table
        $stmt = $conn->prepare("INSERT INTO newsletters (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "You have successfully subscribed to the newsletter!";
        } else {
            $_SESSION['error_message'] = "There was an error subscribing. Please try again.";
        }

        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
