
<?php
session_start();
include "../../config/database.php";
function changeCase($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = ucwords(strtolower($data));
    return $data;
}
// Adding new student
if (isset($_POST['applyAdmission'])) {
    // Input sanitization and validation
    $class_id = $_POST['class_id'];

    $result = mysqli_query($conn, "SELECT * FROM `classes` WHERE `class_id` = '$class_id'");
    $class = mysqli_fetch_assoc($result);

    $section_id = $class['section_id'];


    $first_name = changeCase(trim($_POST['first_name']));
    $second_name = changeCase(trim($_POST['second_name']));
    $last_name = changeCase(trim($_POST['last_name']));
    $birth_date = trim($_POST['birth_date']);
    $state = changeCase(trim($_POST['state']));
    $lga = changeCase(trim($_POST['lga']));
    $gender = trim($_POST['gender']);
    $parent_first_name = changeCase(trim($_POST['parent_first_name']));
    $parent_last_name = changeCase(trim($_POST['parent_last_name']));
    $parent_email = trim($_POST['parent_email']);
    $parent_address = changeCase(trim($_POST['parent_address']));
    $parent_phone_number = trim($_POST['parent_phone_number']);

    $errors = [];

    // Validate mandatory fields
    $mandatoryFields = [
        'first_name', 'last_name', 'birth_date', 'state', 'lga', 'gender',
        'parent_first_name', 'parent_last_name', 'parent_address'
    ];
    foreach ($mandatoryFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . " is required";
        }
    }

    // Function to insert hyphens
    function insertHyphens($string)
    {
        $result = chunk_split($string, 4, '-');
        return rtrim($result, '-');
    }

    // Generate application code
    $md5_hash = md5(uniqid(rand(), true));
    $substring = substr($md5_hash, 0, 12);
    $application_code = strtoupper(insertHyphens($substring));

    function isValidPhoneNumber($parent_phone_number)
    {
        // Define the regular expression pattern for a Nigerian phone number
        $pattern = '/^((070|080|090|081|091)\d{8})$/';
        trim($parent_phone_number);

        // Check if the phone number matches the pattern
        if (preg_match($pattern, $parent_phone_number)) {
            return true;
        } else {
            return false;
        }
    }
    // Validate phone number
    if (!isValidPhoneNumber($parent_phone_number)) {
        $_SESSION['error_message'] = "Please enter a valid Nigerian phone number.";
        // Redirect back to the same page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (empty($errors)) {
        // Insert data into the database
        $sql = "INSERT INTO `applicants` (`class_id`, `section_id`, `first_name`, `second_name`, `last_name`, `birth_date`, `state`, `lga`, `gender`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_address`, `parent_phone_number`, `admission_status`, `application_code`) 

        VALUES ('$class_id', '$section_id', '$first_name', '$second_name', '$last_name', '$birth_date', '$state', '$lga', '$gender', '$parent_first_name', '$parent_last_name', '$parent_email', '$parent_address', '$parent_phone_number', 0, '$application_code')";

        if (mysqli_query($conn, $sql)) {
            // $sql = "INSERT INTO `admin_notification` (`not_level`, `not_title`, `not_content`, `not_icon`, `not_icon_color`, `not_bg_color`)
            //             VALUES ('applicant', 'New Applicant received.', '$first_name $last_name from $lga has applied for an admission and is enrolling for ', 'ni ni-single-02', 'text-warning', 'bg-warning-soft');";
            // mysqli_query($conn, $sql);
            $_SESSION['success_message'] = "Student added successfully!";
            header('Location: ' . $_SERVER['PHP_SELF']);
            // echo 
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error_message'] = $errors;
    }

    exit;
}
