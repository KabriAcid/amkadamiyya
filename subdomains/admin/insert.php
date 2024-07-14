<?php
session_start();
include '../../config/database.php';

if (isset($_POST['register'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    // Checking if user already exists;
    $sql = "SELECT * FROM `staff` WHERE `email` = '$email' AND 'phone_number' = '$phone_number'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error_message'] = "User Already Exist";
    } else {
        function capitalize($string)
        {
            return ucwords(strtolower(trim($string)));
        }
        // Validate mandatory fields
        $mandatoryFields = ['first_name', 'last_name', 'birth_date', 'gender', 'address', 'state', 'lga', 'email', 'phone_number', 'qualification', 'discipline_name', 'class_id', 'subject_id', 'position_id', 'account_number', 'bank_name', 'salary', 'status'];
        foreach ($mandatoryFields as $field) {
            if (empty($_POST[$field])) {
                $_SESSION['error_message'] = "Some fields are missing!";
            }
        }

        // Sanitize and assign variables
        $first_name = capitalize(mysqli_real_escape_string($conn, $_POST['first_name']));
        $last_name = capitalize(mysqli_real_escape_string($conn, $_POST['last_name']));
        $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $lga = mysqli_real_escape_string($conn, $_POST['lga']);
        $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
        $discipline = mysqli_real_escape_string($conn, $_POST['discipline']);
        $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
        $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $position_id = mysqli_real_escape_string($conn, $_POST['position_id']);

        $result = mysqli_query($conn, "SELECT * FROM `classes` WHERE `class_id` = '$class_id'");
        $class = mysqli_fetch_assoc($result);

        $section_id = $class['section_id'];

        // Handle file upload for photo
        if (!empty($_FILES['photo']['name'])) {
            $photo = "uploads/" . strtoupper(uniqid($first_name . '_' . $last_name . '_')) . '.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) {
                $_SESSION['error_message'] = "Photo upload failed!";
                // Redirect back to the same page
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        } else {
            $photo = 'uploads/default.png';
        }

        // function isValidPhoneNumber($phone_number)
        // {
        //     // Define the regular expression pattern for a Nigerian phone number
        //     $pattern = '/^((070|080|090|081|091)\d{8})$/';
        //     trim($phone_number);

        //     // Check if the phone number matches the pattern
        //     if (preg_match($pattern, $phone_number)) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
        // // Validate phone number
        // if (!isValidPhoneNumber($phone_number)) {
        //     $_SESSION['error_message'] = "Please enter a valid Nigerian phone number.";
        //     // Redirect back to the same page
        //     header("Location: " . $_SERVER['PHP_SELF']);
        //     exit();
        // }

        // Generate username
        $username = $first_name . substr($phone_number, 9);

        // Hash the password using BCRYPT
        $default_password = 'amka123';
        $hashed_password = password_hash($default_password, PASSWORD_BCRYPT);

        // Insert the data into the staff table
        $sql = "INSERT INTO `staff` (
                    `username`, `first_name`, `last_name`, `class_id`, `section_id`,
                    `subject_id`, `birth_date`, `state`, `lga`, `gender`, `photo`,
                    `email`, `phone_number`,`qualification`, `discipline`, `address`,
                    `account_number`, `bank_name`, `salary`, `status`, `position_id`, `password`
                ) VALUES (
                    '$username', '$first_name', '$last_name', '$class_id', '$section_id',
                    '$subject_id', '$birth_date', '$state', '$lga', '$gender', '$photo',
                    '$email', '$phone_number', '$qualification', '$discipline', '$address',
                    '$account_number', '$bank_name', '$salary', '$status', '$position_id', '$hashed_password'
                )";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "New staff registered successfully!";

            // Getting details from registration form
            $user_info = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username
            );

            // Setting the registration variable.
            $_SESSION['registration_success'] = $user_info;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $_SESSION['error_message'] = "Registration failed: " . mysqli_error($conn);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}

// Adding new student
if (isset($_POST['addStudent'])) {
    // Generate Student ID function
    function generateStudentID($conn, $section_id, $entry_year)
    {

        $sql = "SELECT * FROM `sections` WHERE `section_id` = '$section_id'";
        $result = mysqli_query($conn, $sql);
        $section = mysqli_fetch_assoc($result);

        $sql = "SELECT * FROM `serial_numbers` WHERE `section_id` = '$section_id' AND `entry_year` = '$entry_year'";
        $result = mysqli_query($conn, $sql);
        $serial = mysqli_fetch_assoc($result);

        if ($serial) {
            $current_serial = $serial['current_serial'] + 1;
            $sql = "UPDATE `serial_numbers` SET `current_serial` = '$current_serial' WHERE `section_id` = '$section_id' AND `entry_year` = '$entry_year'";
            mysqli_query($conn, $sql);
        } else {
            $current_serial = $section['serial_start'];
            $sql = "INSERT INTO serial_numbers (section_id, entry_year, current_serial) VALUES ('$section_id', '$entry_year', '$current_serial')";
            mysqli_query($conn, $sql);
        }

        $admission_id = sprintf('AMK/%d/%d', $entry_year, $current_serial);
        return $admission_id;
    }
    // Input sanitization and validation
    $class_id = $_POST['class_id'];

    $result = mysqli_query($conn, "SELECT * FROM `classes` WHERE `class_id` = '$class_id'");
    $class = mysqli_fetch_assoc($result);

    $section_id = $class['section_id'];

    function changeCase($string)
    {
        return ucwords(strtolower(htmlspecialchars($string)));
    }

    $first_name = changeCase(trim($_POST['first_name']));
    $second_name = changeCase(trim($_POST['second_name']));
    $last_name = changeCase(trim($_POST['last_name']));
    $birth_date = trim($_POST['birth_date']);
    $state = trim($_POST['state']);
    $lga = trim($_POST['lga']);
    $gender = trim($_POST['gender']);
    $parent_first_name = changeCase(trim($_POST['parent_first_name']));
    $parent_last_name = changeCase(trim($_POST['parent_last_name']));
    $parent_email = trim($_POST['parent_email']);
    $parent_address = changeCase(trim($_POST['parent_address']));
    $parent_phone_number = trim($_POST['parent_phone_number']);

    // Variables
    $entry_year = date('y');
    $admission_id = generateStudentID($conn, $section_id, $entry_year);

    // Hash the password using BCRYPT
    $default_password = $admission_id;
    $password = password_hash($default_password, PASSWORD_BCRYPT);


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

    // function isValidPhoneNumber($parent_phone_number)
    // {
    //     // Define the regular expression pattern for a Nigerian phone number
    //     $pattern = '/^((070|080|090|081|091)\d{8})$/';
    //     trim($parent_phone_number);

    //     // Check if the phone number matches the pattern
    //     if (preg_match($pattern, $parent_phone_number)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // // Validate phone number
    // if (!isValidPhoneNumber($parent_phone_number)) {
    //     $_SESSION['error_message'] = "Please enter a valid Nigerian phone number.";
    //     // Redirect back to the same page
    //     header("Location: " . $_SERVER['PHP_SELF']);
    //     exit();
    // }


    if (empty($errors)) {
        // Insert data into the database
        $sql = "INSERT INTO `students` (`class_id`, `section_id`, `admission_id`, `status`, `password`, `first_name`, `second_name`, `last_name`, `birth_date`, `state`, `lga`, `gender`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_address`, `parent_phone_number`) 

        VALUES ('$class_id', '$section_id', '$admission_id', 1, '$password', '$first_name', '$second_name', '$last_name', '$birth_date', '$state', '$lga', '$gender', '$parent_first_name', '$parent_last_name', '$parent_email', '$parent_address', '$parent_phone_number')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "Student added successfully!";
            // echo 
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error_message'] = $errors;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['uploadBlog'])) {

    // Function to generate a unique filename
    function generateUniqueFileName($extension)
    {
        return uniqid('thumb_', true) . '.' . $extension;
    }

    function sanitizeBlog($string)
    {
        $string = ucwords(strtolower($string));

        return $string;
    }
    $staff_id = $_POST['staff_id'];
    $blogTitle = sanitizeBlog($_POST['blog_title']);
    $blogCategory = sanitizeBlog($_POST['blog_category']);
    $blogContent = htmlspecialchars($_POST['blog_content']);



    // if(str_word_count($blogContent) < 10){
    //     $_SESSION['error_message'] = "Blog content must contain at least 10 words";
    // }

    // Thumbnail upload handling
    if (isset($_FILES['blog_thumbnail']) && $_FILES['blog_thumbnail']['error'] == UPLOAD_ERR_OK) {
        $thumbnail = $_FILES['blog_thumbnail'];
        $thumbnailTmpName = $thumbnail['tmp_name'];
        $thumbnailSize = $thumbnail['size'];
        $thumbnailExtension = pathinfo($thumbnail['name'], PATHINFO_EXTENSION);

        // Check thumbnail size (limit to 3MB)
        if ($thumbnailSize > 3000000) {
            $_SESSION['error_message'] = "Thumbnail size should not exceed 3MB.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // Generate a unique file name for the thumbnail
        $thumbnailName = generateUniqueFileName($thumbnailExtension);
        $thumbnailDestination = 'uploads/' . $thumbnailName;

        // Upload thumbnail
        if (!move_uploaded_file($thumbnailTmpName, $thumbnailDestination)) {
            $_SESSION['error_message'] = "There was an error uploading the thumbnail.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    } else {
        $thumbnailDestination = "uploads/blog.jpg";
    }

    // Insert blog post into database
    $stmt = $conn->prepare("INSERT INTO blogs (staff_id, blog_title, blog_category, blog_content, blog_thumbnail) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $staff_id, $blogTitle, $blogCategory, $blogContent, $thumbnailDestination);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Blog post uploaded successfully.";
        header("Location: admin-timeline.php");
    } else {
        $_SESSION['error_message'] = "There was an error uploading the blog post.";
    }

    $stmt->close();
    $conn->close();
}

// Assuming you have already established a database connection
if (isset($_POST['addalumni'])) {

    function changeCase($string)
    {
        return ucwords(strtolower(htmlspecialchars(trim($string))));
    }

    // Retrieve and sanitize form data
    $first_name = changeCase($_POST['first_name']);
    $second_name = changeCase($_POST['second_name']);
    $last_name = changeCase($_POST['last_name']);
    $index_no = trim($_POST['index_no']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $gender = $_POST['gender'];
    $graduation_year = trim($_POST['graduation_year']);
    $position_held = $_POST['position_held'];
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $address = ucwords($_POST['address']);
    $nin_number = trim($_POST['nin_number']);

    // function isValidPhoneNumber($phone_number)
    // {
    //     // Define the regular expression pattern for a Nigerian phone number
    //     $pattern = '/^((070|080|090|081|091)\d{8})$/';
    //     trim($phone_number);

    //     // Check if the phone number matches the pattern
    //     if (preg_match($pattern, $phone_number)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // // Validate phone number
    // if (!isValidPhoneNumber($phone_number)) {
    //     $_SESSION['error_message'] = "Please enter a valid Nigerian phone number.";
    //     // Redirect back to the same page
    //     header("Location: " . $_SERVER['PHP_SELF']);
    //     exit();
    // }

    $index_prefix = '4350785';
    $index_prefix .= $index_no;

    // Insert data into the alumni table
    $sql = "INSERT INTO `alumni` (`first_name`, `second_name`, `last_name`, `index_no`, `date_of_birth`, `gender`, `graduation_year`, `position_held`, `email`, `phone_number`, `state`, `lga`, `address`, `nin_number`) 
                 VALUES ('$first_name', '$second_name', '$last_name', '$index_prefix', '$date_of_birth', '$gender', '$graduation_year', '$position_held', '$email', '$phone_number', '$state', '$lga', '$address', '$nin_number')";
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "New alumni has been added successfully";
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Approving Applicant's Admission
if (isset($_POST['approveBtn'])) {
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);

    // Generate Student ID function
    function generateStudentID($conn, $section_id, $entry_year)
    {

        $sql = "SELECT * FROM `sections` WHERE `section_id` = '$section_id'";
        $result = mysqli_query($conn, $sql);
        $section = mysqli_fetch_assoc($result);

        $sql = "SELECT * FROM `serial_numbers` WHERE `section_id` = '$section_id' AND `entry_year` = '$entry_year'";
        $result = mysqli_query($conn, $sql);
        $serial = mysqli_fetch_assoc($result);

        if ($serial) {
            $current_serial = $serial['current_serial'] + 1;
            $sql = "UPDATE `serial_numbers` SET `current_serial` = '$current_serial' WHERE `section_id` = '$section_id' AND `entry_year` = '$entry_year'";
            mysqli_query($conn, $sql);
        } else {
            $current_serial = $section['serial_start'];
            $sql = "INSERT INTO serial_numbers (section_id, entry_year, current_serial) VALUES ('$section_id', '$entry_year', '$current_serial')";
            mysqli_query($conn, $sql);
        }

        $admission_id = sprintf('AMK/%d/%d', $entry_year, $current_serial);
        return $admission_id;
    }

    // Fetch applicant data from the database
    $query = "SELECT * FROM applicants WHERE applicant_id = $applicant_id";
    $result = mysqli_query($conn, $query);
    $applicant = mysqli_fetch_assoc($result);

    if ($applicant) {

        $class_id = $applicant['enrolling_class'];
        $entry_year = date('y');
        // Determing section base on class
        $sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
        $clasess = mysqli_query($conn, $sql);
        $class = mysqli_fetch_assoc($clasess);
        $section_id = $class['section_id'];

        // Insert applicant data into students table
        $first_name = mysqli_real_escape_string($conn, $applicant['first_name']);
        $last_name = mysqli_real_escape_string($conn, $applicant['last_name']);
        $birth_date = mysqli_real_escape_string($conn, $applicant['birth_date']);
        $gender = mysqli_real_escape_string($conn, $applicant['gender']);
        $state = mysqli_real_escape_string($conn, $applicant['state']);
        $lga = mysqli_real_escape_string($conn, $applicant['lga']);
        $parent_first_name = mysqli_real_escape_string($conn, $applicant['parent_first_name']);
        $parent_last_name = mysqli_real_escape_string($conn, $applicant['parent_last_name']);
        $parent_phone_number = mysqli_real_escape_string($conn, $applicant['parent_phone_number']);
        $parent_email = mysqli_real_escape_string($conn, $applicant['parent_email']);
        $parent_address = mysqli_real_escape_string($conn, $applicant['parent_address']);

        $admission_id = generateStudentID($conn, $section_id, $entry_year);
        // Hash the password using BCRYPT
        $default_password = $admission_id;
        $password = password_hash($default_password, PASSWORD_BCRYPT);

        $insert_query = "INSERT INTO students (
            class_id, section_id, admission_id, first_name, last_name, status,
            password, birth_date, gender, state, lga, parent_first_name,
            parent_last_name, parent_phone_number, parent_email, parent_address
            ) VALUES (
            '$class_id', '$section_id', '$admission_id', '$first_name', '$last_name', 1,
            '$password', '$birth_date', '$gender', '$state', '$lga', '$parent_first_name',
            '$parent_last_name', '$parent_phone_number', '$parent_email', '$parent_address')";

        if (mysqli_query($conn, $insert_query)) {
            $sql = "UPDATE applicants SET admission_status = 1 WHERE `applicant_id` = '$applicant_id'";
            mysqli_query($conn, $sql);
            $_SESSION['success_message'] = 'Applicant has been approved and added to the students database successfully.';
            header('Location: admin-new-applicant.php'); // Redirect to the applicants page
            exit();
        } else {
            $_SESSION['error_message'] = 'An error occurred while approving the applicant. Please try again.';
        }
    } else {
        $_SESSION['error_message'] = 'Applicant not found.';
    }

    mysqli_free_result($result);
} elseif (isset($_POST['declineBtn'])) {
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);

    // Delete applicant from the database
    $delete_query = "DELETE FROM applicants WHERE applicant_id = $applicant_id";

    if (mysqli_query($conn, $delete_query)) {
        $_SESSION['success_message'] = 'Applicant has been declined and removed from the database successfully.';
        header('Location: admin-new-applicant.php'); // Redirect to the applicants page
        exit();
    } else {
        $_SESSION['error_message'] = 'An error occurred while declining the applicant. Please try again.';
    }
}
# Uploading subjects
if (isset($_POST['addSubject'])) {

    $subject = ucwords(strtolower($_POST['subject']));

    $sql = "INSERT INTO `subjects` (`subject_name`) VALUES ('$subject')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Subject Added Successfully";
    } else {
        $_SESSION['error_message'] = "Error Occured";
    }
}


// Uploading Results base on subject
if (isset($_POST['uploadSubject'])) {
    $staff_id = $_SESSION['staff']['staff_id'];

    // Retrieve data from form
    $subject_id = $_POST['subject_id'];
    $section_id = $_POST['section_id'];
    $class_id = $_POST['class_id'];

    $student_ids = $_POST['student_id'];
    $first_tests = $_POST['first_test'];
    $second_tests = $_POST['second_test'];
    $exams = $_POST['exam'];

    // Loop through all students and update their scores
    foreach ($student_ids as $index => $student_id) {
        $first_test = $first_tests[$index];
        $second_test = $second_tests[$index];
        $exam = $exams[$index];

        // Calculate total score for each student
        $total = $first_test + $second_test + $exam;

        // Determine the grade and remark based on total score
        if ($total >= 70 && $total <= 100) {
            $grade = 'A';
            $remark = 'Excellent';
        } elseif ($total >= 60 && $total < 70) {
            $grade = 'B';
            $remark = 'V. Good';
        } elseif ($total >= 50 && $total < 60) {
            $grade = 'C';
            $remark = 'Good';
        } elseif ($total >= 40 && $total < 50) {
            $grade = 'D';
            $remark = 'Pass';
        } else {
            $grade = 'F';
            $remark = 'Fail';
        }

        // Insert scores into the results table
        $sql = "INSERT INTO `results` (`student_id`, `subject_id`, `class_id`, `first_test`, `second_test`, `exam`, `total`, `grade`, `remark`, `status`)
                VALUES ('$student_id', '$subject_id', '$class_id', '$first_test', '$second_test', '$exam', '$total', '$grade', '$remark', 1)";
        if (!mysqli_query($conn, $sql)) {
            $_SESSION['error_message'] = "Error inserting scores: " . mysqli_error($conn);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    // Calculate grand totals, averages, and subject counts for each student
    $sql = "SELECT student_id, SUM(total) AS grand_total, COUNT(subject_id) AS subject_count
            FROM results
            WHERE class_id = '$class_id'
            GROUP BY student_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $student_id = $row['student_id'];
            $grand_total = $row['grand_total'];
            $subject_count = $row['subject_count'];

            // Calculate the average by dividing grand total by the number of subjects
            $average = $grand_total / $subject_count;

            // Update the uploads table if the record exists, else insert new record
            $check_sql = "SELECT * FROM uploads WHERE student_id = '$student_id' AND class_id = '$class_id'";
            $check_result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($check_result) > 0) {
                // If record exists, update it
                $update_sql = "UPDATE uploads SET grand_total = '$grand_total', average = '$average', subject_count = '$subject_count' WHERE student_id = '$student_id' AND class_id = '$class_id'";
                if (!mysqli_query($conn, $update_sql)) {
                    $_SESSION['error_message'] = "Error updating uploads: " . mysqli_error($conn);
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }
            } else {
                // If record does not exist, insert it
                $insert_sql = "INSERT INTO uploads (`student_id`, `class_id`, `grand_total`, `average`, `position`, `subject_count`)
                               VALUES ('$student_id', '$class_id', '$grand_total', '$average', 0, '$subject_count')";
                if (!mysqli_query($conn, $insert_sql)) {
                    $_SESSION['error_message'] = "Error inserting into uploads: " . mysqli_error($conn);
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }
            }
        }

        // Update positions based on average in descending order
        $sql = "SELECT student_id, average FROM uploads WHERE class_id = '$class_id' ORDER BY average DESC";
        $result = mysqli_query($conn, $sql);

        $position = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $student_id = $row['student_id'];
            $update_sql = "UPDATE uploads SET position = $position WHERE student_id = '$student_id' AND class_id = '$class_id'";
            mysqli_query($conn, $update_sql);
            $position++;
        }

        $sql = "SELECT `subject_name` FROM `subjects` WHERE `subject_id` = '$subject_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $subject_name = $row['subject_name'];
        // Success message and redirection
        $_SESSION['success_message'] = "Upload Successful";
        header("Location: admin-choose-subject.php");
        exit;
    } else {
        // Error message and redirection if calculation fails
        $_SESSION['error_message'] = "Error calculating averages: " . mysqli_error($conn);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
