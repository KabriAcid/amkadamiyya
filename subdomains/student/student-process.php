<?php
session_start();
include "../../config/database.php";

# Function to sanitize input data
function sanitize_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

//  Login Process
if (isset($_POST['login'])) {
    if (empty($_POST['admission_id']) || empty($_POST['password'])) {
        $_SESSION['error_message'] = "Both admission number and password are required";
    } else {
        // Sanitize user inputs
        $admission_id = sanitize_input(mysqli_real_escape_string($conn, $_POST['admission_id']));
        $password = sanitize_input(mysqli_real_escape_string($conn, $_POST['password']));

        // Fetch user data from the database
        $sql = "SELECT * FROM `students` WHERE `admission_id` = '$admission_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Check if user exists
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                // Verify the password using BCRYPT
                if (password_verify($password, $row['password'])) {
                    // Password is correct, set session variables and redirect to dashboard
                    $_SESSION['student'] = $row;
                    $_SESSION['success_message'] = "Login Successful.";
                    header("Location: student-dashboard.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = "Incorrect password!";
                }
            } else {
                $_SESSION['error_message'] = "Student does not exist!";
            }
        } else {
            $_SESSION['error_message'] = "Database query failed: " . mysqli_error($conn);
        }
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
