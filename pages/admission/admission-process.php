<?php
session_start();
include "../../config/database.php";

if (isset($_POST['submitApplication'])) {

    // Function to sanitize input data
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = ucwords(strtolower($data));
        return $data;
    }

    // Error and success message initialization
    $_SESSION['success_message'] = null;
    $_SESSION['error_message'] = null;

    // Student's Data
    $first_name = sanitize_input($_POST['first_name']);
    $middle_name = sanitize_input($_POST['middle_name']);
    $last_name = sanitize_input($_POST['last_name']);
    $birth_date = sanitize_input($_POST['birth_date']);
    $state = sanitize_input($_POST['state']);
    $lga = sanitize_input($_POST['lga']);
    $gender = sanitize_input($_POST['gender']);

    // Student's Passport photograph
    $photo = $_FILES['photo'];

    // Parent's Data
    $parent_firstName = sanitize_input($_POST['parent_firstName']);
    $parent_last_name = sanitize_input($_POST['parent_last_name']);
    $parent_email = $_POST['parent_email'];
    $parent_address = sanitize_input($_POST['parent_address']);
    $parent_occupation = sanitize_input($_POST['parent_occupation']);
    $parent_maritalStatus = sanitize_input($_POST['parent_maritalStatus']);
    $parent_phoneNumber = sanitize_input($_POST['parent_phoneNumber']);
    $parent_altPhone = sanitize_input($_POST['parent_altPhone']);
    $parent_birthState = sanitize_input($_POST['parent_birthState']);
    $parent_birthLGA = sanitize_input($_POST['parent_birthLGA']);
    $enrolling_class = sanitize_input($_POST['enrolling_class']);

    // Reusable Variables
    $dir = "uploads/";
    $tmp_name = $photo['tmp_name'];
    $fileSize = $photo['size'];

    // Encrypting file Name
    $uniqid = uniqid();
    $fileNewName = $dir . $uniqid . "." . pathinfo($photo['name'], PATHINFO_EXTENSION);
    $target_file = $fileNewName;
    $ext = array("jpg", "jpeg", "JPG", "png", "heic");
    $megabyte = (1024 * 1024) * 3; // 3MB

    // Function to insert hyphens
    function insertHyphens($string) {
        $result = chunk_split($string, 4, '-');
        return rtrim($result, '-');
    }

    // Generate application code
    $md5_hash = md5(uniqid(rand(), true));
    $substring = substr($md5_hash, 0, 16);
    $application_code = strtoupper(insertHyphens($substring));

    // Check if photo upload is successful
    if ($photo['error'] == 0) {
        // Check file size
        if ($fileSize <= $megabyte) {
            // Check if file is a valid photo
            if (in_array(pathinfo($target_file, PATHINFO_EXTENSION), $ext)) {
                // Move uploaded file
                if (move_uploaded_file($tmp_name, $target_file)) {
                    // Insert into database
                    $sql = "INSERT INTO `applicants` (
                        first_name, middle_name, last_name, birth_date, state, lga, gender, photo, parent_firstName, parent_last_name, parent_email, parent_address, parent_occupation, parent_maritalStatus, parent_phoneNumber, parent_altPhone, parent_birthState, parent_birthLGA, enrolling_class, application_code
                    ) VALUES (
                        '$first_name', '$middle_name', '$last_name', '$birth_date', '$state', '$lga', '$gender', '$target_file', '$parent_firstName', '$parent_last_name', '$parent_email', '$parent_address', '$parent_occupation', '$parent_maritalStatus', '$parent_phoneNumber', '$parent_altPhone', '$parent_birthState', '$parent_birthLGA', '$enrolling_class', '$application_code'
                    )";

                    if (mysqli_query($conn, $sql)) {
                        // Insert into Notifications table
                        $notification_sql = "INSERT INTO `notifications` (`not_level`, `not_title`, `not_content`, `not_icon`, `not_icon_color`, `not_bg_color`)
                        VALUES ('applicant', 'New Applicant received.', '$first_name $last_name from $lga has applied for an admission and is enrolling for $enrolling_class.', 'ni ni-single-02', 'text-warning', 'bg-warning-soft');";
                        
                        mysqli_query($conn, $notification_sql);

                        $_SESSION['success_message'] = "Application submitted successfully.";
                        $_SESSION['applicant'] = $_POST;

                        // Redirect to form-success page
                        header('Location: form-success.php');
                        exit;
                    } else {
                        $_SESSION['error_message'] = "Can't upload data.";
                    }
                } else {
                    $_SESSION['error_message'] = "Failed to move uploaded file.";
                }
            } else {
                $_SESSION['error_message'] = "Invalid file type.";
            }
        } else {
            $_SESSION['error_message'] = "File size is greater than 3MB.";
        }
    } else {
        $_SESSION['error_message'] = "Error uploading photo.";
    }

    // Redirect to the same page to show error message
    // header('Location: ' . $_SERVER['PHP_SELF']);
    header("Location: form-success.php");
    exit;
}
?>
