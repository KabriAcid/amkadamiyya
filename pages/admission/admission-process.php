
<?php
session_start();
require_once "../../config/database.php";


function changeCase($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = ucwords(strtolower($data));
    return $data;
}
// Adding new student
if (isset($_POST['applyAdmission'])) {

    // Session Registration Unique ID
    $registration_id = md5(uniqid());

    // Input sanitization and validation
    $enrolling_class = $_POST['enrolling_class'];

    $result = mysqli_query($conn, "SELECT * FROM `classes` WHERE `class_id` = '$enrolling_class'");
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
        $sql = "INSERT INTO `applicants` (`enrolling_class`, `section_id`, `first_name`, `second_name`, `last_name`, `birth_date`, `state`, `lga`, `gender`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_address`, `parent_phone_number`, `admission_status`, `application_code`, `registration_id`) 

        VALUES ('$enrolling_class', '$section_id', '$first_name', '$second_name', '$last_name', '$birth_date', '$state', '$lga', '$gender', '$parent_first_name', '$parent_last_name', '$parent_email', '$parent_address', '$parent_phone_number', 0, '$application_code', '$registration_id')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['registration_success']['registration_id'] = $registration_id;

            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error_message'] = $errors;
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
            $_SESSION['successMessage'] = true;
            $_SESSION['applicant']['first_name'] = $row['first_name'];
            $_SESSION['applicant']['last_name'] = $row['last_name'];
        }
    } else {
        $_SESSION['errorMessage'] = "Invalid application code.";
    }
    $stmt->close();
}
?>
