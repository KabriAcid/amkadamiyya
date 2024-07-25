<?php
// Start session
session_start();
require_once '../../config/database.php';

// Function to change the case of a string
function changeCase($string) {
    return ucwords(strtolower(trim($string)));
}

// Function to insert hyphens in a string
function insertHyphens($string) {
    return implode("-", str_split($string, 4));
}

// Function to validate Nigerian phone numbers
function isValidPhoneNumber($phone) {
    return preg_match('/^(\+234|0)[789]\d{9}$/', $phone);
}

// Adding new student
if (isset($_POST['applyAdmission'])) {

    $registration_id = md5(uniqid());

    $enrolling_class = $_POST['enrolling_class'];
    $result = mysqli_query($conn, "SELECT * FROM `classes` WHERE `class_id` = '$enrolling_class'");
    if ($result && mysqli_num_rows($result) > 0) {
        $class = mysqli_fetch_assoc($result);
        $section_id = $class['section_id'];
    } 
    else {
        $section_id = null; // or handle the error appropriately
    }

    $first_name = changeCase($_POST['first_name']);
    $second_name = changeCase($_POST['second_name']);
    $last_name = changeCase($_POST['last_name']);
    $birth_date = $_POST['birth_date'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $gender = $_POST['gender'];
    $parent_first_name = changeCase($_POST['parent_first_name']);
    $parent_last_name = changeCase($_POST['parent_last_name']);
    $parent_email = trim($_POST['parent_email']);
    $parent_address = changeCase($_POST['parent_address']);
    $parent_phone_number = trim($_POST['parent_phone_number']);

    $errors = [];

    if (!isValidPhoneNumber($parent_phone_number)) {
        $errors[] = "Please enter a valid Nigerian phone number.";
    }

    $md5_hash = md5(uniqid(rand(), true));
    $substring = substr($md5_hash, 0, 12);
    $application_code = strtoupper(insertHyphens($substring));
    $admission_status = 0;

    if (empty($errors)) {
        $sql = "INSERT INTO `applicants` (`enrolling_class`, `section_id`, `first_name`, `second_name`, `last_name`, `birth_date`, `state`, `lga`, `gender`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_address`, `parent_phone_number`, `admission_status`, `application_code`, `registration_id`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("iissssssssssssiss", 
            $enrolling_class, $section_id, $first_name, $second_name, $last_name, 
            $birth_date, $state, $lga, $gender, $parent_first_name, $parent_last_name, 
            $parent_email, $parent_address, $parent_phone_number, $admission_status, 
            $application_code, $registration_id
        );

        if ($stmt->execute()) {
            $_SESSION['registration_success'] = "Application submitted successfully";
            $_SESSION['registration_id'] = $registration_id;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['error_message'] = "Error: " . htmlspecialchars($stmt->error);
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Error Occured";
    }
}



// Checking admission status
if (isset($_POST['checkStatus'])) {
    $application_code = mysqli_real_escape_string($conn, trim($_POST['application_code']));

    $stmt = $conn->prepare("SELECT * FROM `applicants` WHERE `application_code` = ?");
    $stmt->bind_param("s", $application_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($row['admission_status'] == 0) {
            $_SESSION['infoMessage'] = "Your application is now pending, kindly check later.";
        } else if ($row['admission_status'] == 1) {
            $_SESSION['successMessage'] = "Congratulations, " . $row['first_name'] . " " . $row['last_name'] . "! Your admission has been approved.";
        }
    } else {
        $_SESSION['errorMessage'] = "Invalid application code.";
    }
    $stmt->close();
}
?>