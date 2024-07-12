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
        $mandatoryFields = ['first_name', 'last_name', 'birth_date', 'gender', 'address', 'state', 'lga', 'email', 'phone_number', 'q_id', 'discipline_id', 'class_id', 'subject_id', 'position_id', 'account_number', 'bank_id', 'salary', 'status'];
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
        $address = capitalize(mysqli_real_escape_string($conn, $_POST['address']));
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $lga = mysqli_real_escape_string($conn, $_POST['lga']);
        $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
        $discipline = mysqli_real_escape_string($conn, $_POST['discipline']);
        $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
        $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $bank_id = mysqli_real_escape_string($conn, $_POST['bank_id']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $position_id = mysqli_real_escape_string($conn, $_POST['position_id']);

        $result = mysqli_query($conn, "SELECT * FROM `classes` WHERE `class_id` = '$class_id'");
        $class = mysqli_fetch_assoc($result);

        $section_id = $class['section_id'];

        // Handle file upload for photo
        if (!empty($_FILES['photo']['name'])) {
            $photo = "uploads/" . strtolower(uniqid((substr($first_name, 3) . '-' . $last_name))) . '_' . basename($_FILES['photo']['name']);

            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) {
                $_SESSION['error_message'] = "Photo upload failed!";
                // Redirect back to the same page
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        } else {
            $photo = 'uploads/default.png';
        }

        function isValidPhoneNumber($phone_number)
        {
            // Define the regular expression pattern for a Nigerian phone number
            $pattern = '/^((070|080|090|081|091)\d{8})$/';
            trim($phone_number);

            // Check if the phone number matches the pattern
            if (preg_match($pattern, $phone_number)) {
                return true;
            } else {
                return false;
            }
        }
        // Validate phone number
        if (!isValidPhoneNumber($phone_number)) {
            $_SESSION['error_message'] = "Please enter a valid Nigerian phone number.";
            // Redirect back to the same page
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // Generate username
        $username = $first_name . substr($phone_number, 9);

        // Hash the password using BCRYPT
        $default_password = 'amka123';
        $hashed_password = password_hash($default_password, PASSWORD_BCRYPT);

        // Insert the data into the staff table
        $sql = "INSERT INTO `staff` (
                    `username`, `first_name`, `last_name`, `class_id`, `section_id`,
                    `subject_id`, `birth_date`, `state`, `lga`, `gender`, `photo`,
                    `email`, `phone_number`,`q_id`, `discipline_id`, `address`,
                    `account_number`, `bank_id`, `salary`, `status`, `position_id`, `password`
                ) VALUES (
                    '$username', '$first_name', '$last_name', '$class_id', '$section_id',
                    '$subject_id', '$birth_date', '$state', '$lga', '$gender', '$photo',
                    '$email', '$phone_number', '$qualification', '$discipline', '$address',
                    '$account_number', '$bank_id', '$salary', '$status', '$position_id', '$hashed_password'
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

// Updating staff information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Function to capitalize names
    function capitalize($string)
    {
        return ucwords(strtolower(trim($string)));
    }

    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);

    // Update Biodata
    if (isset($_POST['updateStaffBioData'])) {
        $first_name = capitalize(mysqli_real_escape_string($conn, $_POST['first_name']));
        $last_name = capitalize(mysqli_real_escape_string($conn, $_POST['last_name']));
        $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $lga = mysqli_real_escape_string($conn, $_POST['lga']);
        $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $address = capitalize(mysqli_real_escape_string($conn, $_POST['address']));

        $photo = null;
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $megabyte = (1024 * 1024) * 3;
            if ($_FILES['photo']['size'] > $megabyte) {
                $_SESSION['error_message'] = "Image size should not be more than 3MB";
            } else {
                $photo = "uploads/" . strtolower(uniqid((substr($first_name, 3) . '-' . $last_name))) . '_' . basename($_FILES['photo']['name']);
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) {
                    if ($_SESSION['staff']['staff_id'] == $staff_id) {
                        $_SESSION['staff']['photo'] = $photo;
                    }
                    $_SESSION['success_message'] = "Photo updated successfully!";
                } else {
                    $_SESSION['error_message'] = "Error uploading the photo.";
                }
            }
        }

        $sql = "UPDATE staff SET 
            first_name=?, last_name=?, birth_date=?, gender=?, state=?, lga=?, phone_number=?, address=?";
        if ($photo) {
            $sql .= ", photo=?";
        }
        $sql .= " WHERE staff_id=?";

        $stmt = $conn->prepare($sql);
        if ($photo) {
            $stmt->bind_param("sssssssssi", $first_name, $last_name, $birth_date, $gender, $state, $lga, $phone_number, $address, $photo, $staff_id);
        } else {
            $stmt->bind_param("ssssssssi", $first_name, $last_name, $birth_date, $gender, $state, $lga, $phone_number, $address, $staff_id);
        }

        if ($stmt->execute()) {
            if ($_SESSION['staff']['staff_id'] == $staff_id) {
                $_SESSION['staff']['first_name'] = $first_name;
                $_SESSION['staff']['last_name'] = $last_name;
                $_SESSION['staff']['birth_date'] = $birth_date;
                $_SESSION['staff']['gender'] = $gender;
                $_SESSION['staff']['state'] = $state;
                $_SESSION['staff']['lga'] = $lga;
                $_SESSION['staff']['phone_number'] = $phone_number;
                $_SESSION['staff']['address'] = $address;
                if ($photo) {
                    $_SESSION['staff']['photo'] = $photo;
                }
            }
            $_SESSION['success_message'] = "Biodata updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating biodata: " . $stmt->error;
        }

        $stmt->close();
    }

    // Update Other Information
    if (isset($_POST['updateOtherData'])) {
        $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
        $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
        $position_id = mysqli_real_escape_string($conn, $_POST['position_id']);
        $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
        $discipline = mysqli_real_escape_string($conn, $_POST['discipline']);
        $salary = mysqli_real_escape_string($conn, str_replace(['₦', ',', '.00'], '', $_POST['salary']));
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $bank_id = mysqli_real_escape_string($conn, $_POST['bank_id']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        if ($_SESSION['staff']['staff_id'] == $staff_id) {
            $_SESSION['staff']['class_id'] = $class_id;
            $_SESSION['staff']['subject_id'] = $subject_id;
            $_SESSION['staff']['position_id'] = $position_id;
            $_SESSION['staff']['q_id'] = $qualification;
            $_SESSION['staff']['discipline_id'] = $discipline;
            $_SESSION['staff']['salary'] = $salary;
            $_SESSION['staff']['account_number'] = $account_number;
            $_SESSION['staff']['bank_id'] = $bank_id;
            $_SESSION['staff']['status'] = $status;
        }

        $stmt = $conn->prepare("UPDATE staff SET class_id=?, subject_id=?, position_id=?, q_id=?, discipline_id=?, salary=?, account_number=?, bank_id=?, status=? WHERE staff_id=?");
        $stmt->bind_param("iiississsi", $class_id, $subject_id, $position_id, $qualification, $discipline, $salary, $account_number, $bank_id, $status, $staff_id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Profile information updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating profile information: " . $stmt->error;
        }

        $stmt->close();
    }

    // Update Account Information
    if (isset($_POST['updateAccount'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $stmt = $conn->prepare("UPDATE staff SET username=?, email=? WHERE staff_id=?");
        $stmt->bind_param("ssi", $username, $email, $staff_id);

        if ($stmt->execute()) {
            if ($_SESSION['staff']['staff_id'] == $staff_id) {
                $_SESSION['staff']['username'] = $username;
                $_SESSION['staff']['email'] = $email;
            }
            $_SESSION['success_message'] = "Account information updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating account information: " . $stmt->error;
        }

        $stmt->close();
    }

    // Update Staff Password
    if (isset($_POST['updateStaffPassword'])) {
        $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);

        if (empty($newPassword)) {
            $_SESSION['error_message'] = "Password cannot be empty";
        } else if (strlen($newPassword) < 3) {
            $_SESSION['error_message'] = "Password must be greater than 3 characters";
        } else {
            $password = password_hash($newPassword, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("UPDATE staff SET password=? WHERE staff_id=?");
            $stmt->bind_param("si", $password, $staff_id);

            if ($stmt->execute()) {
                if ($_SESSION['staff']['staff_id'] == $staff_id) {
                    $_SESSION['staff']['password'] = $password;
                }
                $_SESSION['success_message'] = "Password updated successfully!";
            } else {
                $_SESSION['error_message'] = "Error updating password: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    // Erase Staff
    if (isset($_POST['eraseStaffData'])) {
        $stmt = $conn->prepare("DELETE FROM staff WHERE staff_id=?");
        $stmt->bind_param("i", $staff_id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Staff erased successfully!";
            // Clear session data after deleting the staff
        } else {
            $_SESSION['error_message'] = "Error erasing staff: " . $stmt->error;
        }

        $stmt->close();
    }

    // Redirect to the appropriate page after processing
    header("Location:" . $_SERVER['PHP_SELF']);
    exit();
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Function to capitalize names
    function capitalize($string)
    {
        return ucwords(strtolower(htmlspecialchars(trim($string))));
    }

    // Declare student_id once
    $student_id = $_POST['student_id'];

    // Update Student Biodata
    if (isset($_POST['updateStudentBioData'])) {
        $first_name = capitalize($_POST['first_name']);
        $second_name = capitalize($_POST['second_name']);
        $last_name = capitalize($_POST['last_name']);
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $state = $_POST['state'];
        $lga = $_POST['lga'];
        $class_id = $_POST['class_id'];

        $sql = "UPDATE students SET first_name = ?, second_name = ?, last_name = ?, birth_date = ?, gender = ?, state = ?, lga = ?, class_id = ? WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssii', $first_name, $second_name, $last_name, $birth_date, $gender, $state, $lga, $class_id, $student_id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Student biodata updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating biodata: " . $stmt->error;
        }
        $stmt->close();
    }

    // Update Parent Information
    if (isset($_POST['updateParentData'])) {
        $parent_first_name = capitalize($_POST['parent_first_name']);
        $parent_last_name = capitalize($_POST['parent_last_name']);
        $parent_email = $_POST['parent_email'];
        $parent_phone_number = $_POST['parent_phone_number'];
        $parent_address = capitalize($_POST['parent_address']);
        $status = $_POST['status'];

        $sql = "UPDATE parents SET first_name = ?, last_name = ?, email = ?, phone_number = ?, address = ?, status = ? WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssii', $parent_first_name, $parent_last_name, $parent_email, $parent_phone_number, $parent_address, $status, $student_id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Parent information updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating parent information: " . $stmt->error;
        }
        $stmt->close();
    }

    // Update Student Account Information
    if (isset($_POST['updateStudentAdmission'])) {
        $admission_number = $_POST['admission_number'];

        $sql = "UPDATE students SET admission_number = ? WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $admission_number, $student_id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Account information updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating account information: " . $stmt->error;
        }
        $stmt->close();
    }

    // Update Student Password
    if (isset($_POST['updateStudentPassword'])) {
        $newPassword = $_POST['newPassword'];

        if (empty($newPassword)) {
            $_SESSION['error_message'] = "Password cannot be empty";
        } else if (strlen($newPassword) < 3) {
            $_SESSION['error_message'] = "Password must be greater than 3 characters";
        } else {
            $password = password_hash($newPassword, PASSWORD_BCRYPT);

            $sql = "UPDATE students SET password = ? WHERE student_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $password, $student_id);
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Password updated successfully!";
            } else {
                $_SESSION['error_message'] = "Error updating password: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    // Redirect to the appropriate page after processing
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}




//  Login Process
if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['error_message'] = "Both username and password are required!";
    } else {
        // Sanitize user inputs
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Fetch user data from the database
        $sql = "SELECT * FROM `staff` WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Check if user exists
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                // Verify the password using BCRYPT
                if (password_verify($password, $row['password'])) {
                    // Password is correct, set session variables and redirect to dashboard
                    $_SESSION['staff'] = $row;
                    $_SESSION['success_message'] = "You are logged in.";
                    header("Location: admin-dashboard.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = "Incorrect password!";
                }
            } else {
                $_SESSION['error_message'] = "User does not exist!";
            }
        } else {
            $_SESSION['error_message'] = "Database query failed: " . mysqli_error($conn);
        }
    }
}

// Adding new student
if (isset($_POST['addStudent'])) {
    // Input sanitization and validation
    $class_id = $_POST['class_id'];

    $result = mysqli_query($conn, "SELECT * FROM `classes` WHERE `class_id` = '$class_id'");
    $class = mysqli_fetch_assoc($result);

    $section_id = $class['section_id'];

    function changeCase($string)
    {
        return strtolower(ucwords(htmlspecialchars($string)));
    }


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

    function isValidEmailAddress($email)
    {
        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Validate the sanitized email
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Check if email is set and not empty
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];

        if (!isValidEmailAddress($email)) {
            $_SESSION['error_message'] = "Please enter a valid email address.";
            // Redirect back to the same page
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Email is required.";
        // Redirect back to the same page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (empty($errors)) {
        // Insert data into the database
        $sql = "INSERT INTO `students` (`class_id`, `section_id`, `admission_id`, `first_name`, `second_name`, `last_name`, `birth_date`, `state`, `lga`, `gender`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_address`, `parent_phone_number`) 

        VALUES ('$class_id', '$section_id', 1001, '$first_name', '$second_name', '$last_name', '$birth_date', '$state', '$lga', '$gender', '$parent_first_name', '$parent_last_name', '$parent_email', '$parent_address', '$parent_phone_number')";

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

# Check if the form is submitted
if (isset($_POST['uploadPost'])) {

    # Details about the staff making the post
    $staff_id = $_SESSION['staff']['staff_id'];
    $staff_first_name = $_SESSION['staff']['first_name'];
    $staff_last_name = $_SESSION['staff']['last_name'];
    $staff_photo = $_SESSION['staff']['photo'];

    # Validate and sanitize post details
    $blog_title = ucwords(strtolower(htmlspecialchars($_POST['blog_title'])));
    $blog_subtitle = ucwords(strtolower(htmlspecialchars($_POST['blog_subtitle'])));
    $blog_content = htmlspecialchars($_POST['blog_content']);

    # Reusable Variables
    $dir = 'uploads/';
    $tmp_name = $_FILES['blog_thumbnail']['tmp_name'];
    $fileSize = $_FILES['blog_thumbnail']['size'];
    $fileError = $_FILES['blog_thumbnail']['error'];
    $fileExt = pathinfo($_FILES['blog_thumbnail']['name'], PATHINFO_EXTENSION);

    # Encrypting file Name
    $uniqid = uniqid();
    $fileNewName = $dir . $uniqid . "." . $fileExt;
    $target_file = $fileNewName;
    $allowed_ext = array("jpg", "jpeg", "JPG", "png", "heic");
    $maxFileSize = 3 * 1024 * 1024; # 3MB

    # If upload is successful
    if ($fileError == 0) {
        # Checking file size
        if ($fileSize <= $maxFileSize) {
            # Checking if file is an allowed photo type
            if (in_array($fileExt, $allowed_ext)) {
                # Move uploaded file
                if (move_uploaded_file($tmp_name, $target_file)) {
                    # Inserting into database
                    $sql = "INSERT INTO `blogs` 
                            (`staff_id`, `staff_first_name`, `staff_last_name`, `staff_photo`, `blog_title`, `blog_subtitle`, `blog_thumbnail`, `blog_content`)
                            VALUES 
                            ('$staff_id', '$staff_first_name', '$staff_last_name', '$staff_photo', '$blog_title', '$blog_subtitle', '$target_file', '$blog_content');";

                    if (mysqli_query($conn, $sql)) {
                        # Insert into Notifications table
                        $sql = "INSERT INTO `admin_notification` 
                                (`not_type`, `not_level`, `not_title`, `not_content`, `not_icon`, `not_iconColor`, `not_bgColor`)
                                VALUES 
                                ('new-staff', 3, 'New post uploaded.', '$staff_first_name $staff_last_name has uploaded a new post to the timeline.', 'ni ni-album-2', 'text-dark', 'bg-info-soft');";

                        mysqli_query($conn, $sql);
                        $_SESSION['success_message'] = "Post Uploaded Successfully";
                        header("Location: admin-timeline.php");
                        exit;
                    } else {
                        exit("Can't upload post. Database error.");
                    }
                } else {
                    $_SESSION['error_message'] = "Failed to move uploaded file.";
                }
            } else {
                $_SESSION['error_message'] = "Invalid file type. Allowed types: " . implode(", ", $allowed_ext);
            }
        } else {
            $_SESSION['error_message'] = "File size exceeds 3MB.";
        }
    } else {
        $_SESSION['error_message'] = "Error uploading file.";
    }

    # Redirect back in case of error
    if (isset($_SESSION['error_message'])) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Assuming you have already established a database connection
if (isset($_POST['addalumni'])) {

    function changeCase($string)
    {
        return strtolower(ucwords(htmlspecialchars(trim($string))));
    }


    // Retrieve and sanitize form data
    $first_name = changeCase($_POST['first_name']);
    $second_name = changeCase($_POST['second_name']);
    $last_name = changeCase($_POST['last_name']);
    $index_no = trim($_POST['index_no']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $gender = changeCase($_POST['gender']);
    $graduation_year = trim($_POST['graduation_year']);
    $position_held = changeCase($_POST['position_held']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $state = changeCase($_POST['state']);
    $lga = changeCase($_POST['lga']);
    $address = changeCase($_POST['address']);
    $nin_number = trim($_POST['nin_number']);

    function isValidPhoneNumber($phone_number)
    {
        // Define the regular expression pattern for a Nigerian phone number
        $pattern = '/^((070|080|090|081|091)\d{8})$/';
        trim($phone_number);

        // Check if the phone number matches the pattern
        if (preg_match($pattern, $phone_number)) {
            return true;
        } else {
            return false;
        }
    }
    // Validate phone number
    if (!isValidPhoneNumber($phone_number)) {
        $_SESSION['error_message'] = "Please enter a valid Nigerian phone number.";
        // Redirect back to the same page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    $index_prefix = '4350785';
    $index_prefix .= $index_no;

    // Insert data into the alumni table
    $sql = "INSERT INTO `alumni` (`first_name`, `second_name`, `last_name`, `index_no`, `date_of_birth`, `gender`, `graduation_year`, `position_held`, `email`, `phone_number`, `state`, `lga`, `address`, `nin_number`) 
                 VALUES ('$first_name', '$second_name', '$last_name', '$index_prefix', '$date_of_birth', '$gender', '$graduation_year', '$position_held', '$email', '$phone_number', '$state', '$lga', '$address', '$nin_number')";
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        $sql = "INSERT INTO `notifications` (`not_level`, `not_title`, `not_content`, `not_icon`, `not_icon_color`, `not_bg_color`)
            VALUES ('1', 'New Alumni has been added.', '{$first_name} {$last_name} has been added successfully.', 'fa fa-graduation-cap', 'text-warning', 'bg-warning-soft');";
        $result = mysqli_query($conn, $sql);

        $_SESSION['success_message'] = "New alumni has been added successfully";
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


# Uploading subjects
if (isset($_POST['addSubject'])) {

    $subject = ucwords(strtolower($_POST['subject']));

    $sql = "INSERT INTO `subjects` (`subject_name`) VALUES ('$subject')";

    if (mysqli_query($conn, $sql)) {

        #Insert into Notifications table
        $sql = "INSERT INTO `notifications` (`not_level`, `not_title`, `not_content`, `not_icon`, `not_icon_color`, `not_bg_color`)
            VALUES ('1', 'A subject has been added.', '{$subject} has been added successfully.', 'ni ni-check-bold', 'text-success', 'bg-success-soft');";
        $result = mysqli_query($conn, $sql);

        $_SESSION['success_message'] = "Subject Added Successfully";
    } else {
        $_SESSION['error_message'] = "Error Occured";
    }
}

#Setting Defaults
if (isset($_POST['setDefaults'])) {
    $staff_id = $_SESSION['staff']['staff_id'];

    $session = $_POST['session'];
    $current_term = ucwords(strtolower($_POST['current_term']));
    $term_ending = $_POST['term_ending'];
    $term_begins = $_POST['term_begins'];

    $sql = "UPDATE `defaults` SET `session_name` = '$session', `current_term` = '$current_term', `term_ending`  = '$term_ending', `term_begins`  = '$term_begins'";
    if (mysqli_query($conn, $sql)) {
        $sql = "INSERT INTO `notifications` (`staff_id`, `not_level`, `not_title`, `not_content`, `not_icon`, `not_icon_color`, `not_bg_color`)
            VALUES ('$staff_id', '1', 'New defaults settings.', 'New default settings has been updated successfully.', 'ni ni-settings-gear-65', 'text-primary', 'bg-primary-soft');";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success_message'] = "New default settings has been updated successfully";
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $_SESSION['error_message'] = "Error Occured";
    }
}

# Delete student
if (isset($_GET['delete_student'])) {

    $student_id = $_GET['delete_student'];

    $sql = "DELETE FROM `students` WHERE `student_id` = '$student_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Student Deleted Successfully";
        exit;
    }
}
# Delete alumni
if (isset($_GET['delete_alumni'])) {

    $alumni_id = $_GET['delete_alumni'];

    $sql = "DELETE FROM `alumni` WHERE `alumni_id` = '$alumni_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Alumni Deleted Successfully";
        exit;
    }
}

# Delete Subject
if (isset($_GET['delete_subject'])) {
    $subject_id = $_GET['delete_subject'];
    $staff_id = $_SESSION['staff']['staff_id'];

    $sql = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $subject_name = $row['subject_name'];

    $sql = "DELETE FROM `subjects` WHERE `subject_id` = '$subject_id' ";
    if (mysqli_query($conn, $sql)) {
        #Insert into Notifications table
        $sql = "INSERT INTO `notifications` (`staff_id`, `not_level`, `not_title`, `not_content`, `not_icon`, `not_icon_color`, `not_bg_color`)
            VALUES ('$staff_id', '1', 'A subject has been deleted.', '{$subject_name} has been deleted successfully.', 'fa fa-trash', 'text-danger', 'bg-danger-soft');";
        mysqli_query($conn, $sql);
        $_SESSION['success_message'] = "Subject Deleted Successfully";
    }
    sleep(1);
}

# Delete Notification 
if (isset($_GET['delete_notification'])) {
    $staff_id = $_GET['delete_notification'];
    $sql = "DELETE FROM `admin_notification`";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Notifications Deleted Successfully";
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

        $sql = "INSERT INTO `admin_notification` (`staff_id`, `not_level`, `not_title`, `not_content`, `not_icon`, `not_icon_color`, `not_bg_color`)
        VALUES ('$staff_id', '1', 'A subject has been uploaded.', 'You have successfully uploaded the data for {$subject_name}.', 'ni ni-upload-96', 'text-info', 'bg-info-soft');";
        mysqli_query($conn, $sql);

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
