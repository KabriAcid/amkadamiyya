<?php
session_start();
include '../../config/database.php';

function capitalize($string)
{
    return ucwords(strtolower(htmlspecialchars(trim($string))));
}

// Update Biodata
if (isset($_POST['updateStaffBioData'])) {
    // Hiddent Staff ID input
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);

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
            $photo = "uploads/" . strtoupper(uniqid((substr($first_name, 0) . '-' . $last_name))) . '.' . basename(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
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
        // Success Message
        $_SESSION['success_message'] = "Biodata updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating biodata: " . $stmt->error;
    }

    $stmt->close();
    // Redirect to the appropriate page after processing
    header("Location: " . $_SERVER['PHP_SELF'] . '?staff_id=' . $staff_id);
    exit();
}

// Update Other Information
if (isset($_POST['updateOtherData'])) {
    // Hiddent Staff ID input
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);

    // Determing section from class
    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
    $sql = "SELECT * FROM classes WHERE class_id = '$class_id'";
    $classes = mysqli_query($conn, $sql);
    $class = mysqli_fetch_assoc($classes);

    $section_id = $class['section_id'];


    $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $position_id = mysqli_real_escape_string($conn, $_POST['position_id']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $discipline = mysqli_real_escape_string($conn, $_POST['discipline']);
    $salary = mysqli_real_escape_string($conn, str_replace(['₦', ',', '.00'], '', $_POST['salary']));
    $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
    $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);


    $stmt = $conn->prepare("UPDATE staff SET class_id=?, section_id=?, subject_id=?, position_id=?, qualification=?, discipline=?, salary=?, account_number=?, bank_name=?, status=? WHERE staff_id=?");
    $stmt->bind_param("iiiississsi", $class_id, $section_id, $subject_id, $position_id, $qualification, $discipline, $salary, $account_number, $bank_name, $status, $staff_id);

    if ($stmt->execute()) {
        if ($_SESSION['staff']['staff_id'] == $staff_id) {
            $_SESSION['staff']['class_id'] = $class_id;
            $_SESSION['staff']['section_id'] = $section_id;
            $_SESSION['staff']['subject_id'] = $subject_id;
            $_SESSION['staff']['position_id'] = $position_id;
            $_SESSION['staff']['qualification'] = $qualification;
            $_SESSION['staff']['discipline'] = $discipline;
            $_SESSION['staff']['salary'] = $salary;
            $_SESSION['staff']['account_number'] = $account_number;
            $_SESSION['staff']['bank_name'] = $bank_name;
            $_SESSION['staff']['status'] = $status;
        }
        // Success Message
        $_SESSION['success_message'] = "Profile information updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating profile information: " . $stmt->error;
    }

    $stmt->close();
    // Redirect to the appropriate page after processing
    header("Location: " . $_SERVER['PHP_SELF'] . '?staff_id=' . $staff_id);
    exit();
}

// Update Account Information
if (isset($_POST['updateStaffAccount'])) {

    // Hiddent Staff ID input
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $stmt = $conn->prepare("UPDATE staff SET username=?, email=? WHERE staff_id=?");
    $stmt->bind_param("ssi", $username, $email, $staff_id);

    if ($stmt->execute()) {
        if ($_SESSION['staff']['staff_id'] == $staff_id) {
            $_SESSION['staff']['username'] = $username;
            $_SESSION['staff']['email'] = $email;
        }
        // Success Message
        $_SESSION['success_message'] = "Account information updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating account information: " . $stmt->error;
    }

    $stmt->close();
    // Redirect to the appropriate page after processing
    header("Location: " . $_SERVER['PHP_SELF'] . '?staff_id=' . $staff_id);
    exit();
}

// Update Staff Password
if (isset($_POST['updateStaffPassword'])) {
    // Declare student_id from hidden input field
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);

    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if ($newPassword != $confirmNewPassword) {
        $_SESSION['error_message'] = "Password does not match";
    } else {
        if (empty($newPassword) || empty($confirmNewPassword)) {
            $_SESSION['error_message'] = "Password cannot be empty";
        } else if (strlen($newPassword) <= 3) {
            $_SESSION['error_message'] = "Password must be greater than 3 characters";
        } else {
            $password = password_hash($confirmNewPassword, PASSWORD_BCRYPT);

            $sql = "UPDATE staff SET password = ? WHERE staff_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $password, $staff_id);
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Password updated successfully!";
            } else {
                $_SESSION['error_message'] = "Error updating password: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    // Redirect to the appropriate page after processing
    header("Location: " . $_SERVER['PHP_SELF'] . '?staff_id=' . $staff_id);
    exit();
}

// Erase Staff
if (isset($_POST['eraseStaffData'])) {
    // Hiddent Staff ID input
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);

    $stmt = $conn->prepare("DELETE FROM staff WHERE staff_id=?");
    $stmt->bind_param("i", $staff_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Staff erased successfully!";
        header('Location: admin-staff-list.php');
        // Clear session data after deleting the staff
    } else {
        $_SESSION['error_message'] = "Error erasing staff: " . $stmt->error;
    }

    $stmt->close();
}







/* ======================================================================================================== 

UPDATE STUDENTS INFORMATION

======================================================================================================== */





// Update Student Biodata
if (isset($_POST['updateStudentBioData'])) {
    // Declare student_id from hidden input field
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    // Determining section from class
    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
    $sql = "SELECT * FROM classes WHERE class_id = '$class_id'";
    $classes = mysqli_query($conn, $sql);
    $class = mysqli_fetch_assoc($classes);

    $section_id = $class['section_id'];

    $first_name = capitalize($_POST['first_name']);
    $second_name = capitalize($_POST['second_name']);
    $last_name = capitalize($_POST['last_name']);
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];


    $sql = "UPDATE students SET first_name = ?, second_name = ?, last_name = ?, birth_date = ?, gender = ?, state = ?, lga = ?, class_id = ?, section_id = ? WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssiii', $first_name, $second_name, $last_name, $birth_date, $gender, $state, $lga, $class_id, $section_id, $student_id);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Student biodata updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating biodata: " . $stmt->error;
    }
    $stmt->close();
    // Redirect to the appropriate page after processing
    header('Location: ' . $_SERVER['PHP_SELF'] . '?student_id=' . $student_id);
    exit();
}

// Update Parent Information
if (isset($_POST['updateParentData'])) {
    // Declare student_id from hidden input field
    $student_id = $_POST['student_id'];

    $parent_first_name = capitalize($_POST['parent_first_name']);
    $parent_last_name = capitalize($_POST['parent_last_name']);
    $parent_email = $_POST['parent_email'];
    $parent_phone_number = $_POST['parent_phone_number'];
    $parent_address = capitalize($_POST['parent_address']);
    $status = $_POST['status'];

    $sql = "UPDATE students SET parent_first_name = ?, parent_last_name = ?, parent_email = ?, parent_phone_number = ?, parent_address = ?, status = ? WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssii', $parent_first_name, $parent_last_name, $parent_email, $parent_phone_number, $parent_address, $status, $student_id);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Parent information updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating parent information: " . $stmt->error;
    }
    $stmt->close();
    // Redirect to the appropriate page after processing
    header('Location: ' . $_SERVER['PHP_SELF'] . '?student_id=' . $student_id);
    exit();
}

// Update Student Account Information
if (isset($_POST['updateStudentID'])) {
    // Declare student_id from hidden input field
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $admission_id = trim($_POST['admission_id']);

    // Validate admission ID using a closure function
    $validate_id = function ($admission_id) {
        // Define the pattern
        $pattern = '/^AMK\/\d{2}\/\d{4}$/';
        // Check if the ID matches the pattern
        return preg_match($pattern, $admission_id) === 1;
    };

    // Validate admission ID
    if (!$validate_id($admission_id)) {
        $_SESSION['error_message'] = "Invalid admission ID format. Please enter a valid ID";
        header('Location: ' . $_SERVER['PHP_SELF'] . '?student_id=' . $student_id);
        exit();
    }


    // Check if the admission ID is already taken
    $sql = "SELECT admission_id FROM students WHERE admission_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $admission_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "Admission ID already taken!";
        $stmt->close();
        header('Location: ' . $_SERVER['PHP_SELF'] . '?student_id=' . $student_id);
        exit();
    } else {
        // Update the student's admission ID
        $sql = "UPDATE students SET admission_id = ? WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $admission_id, $student_id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Student ID updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating student ID: " . $stmt->error;
        }
        $stmt->close();

        header('Location: ' . $_SERVER['PHP_SELF'] . '?student_id=' . $student_id);
        exit();
    }
    $stmt->close();
    // Redirect to the appropriate page after processing
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


// Update Student Password
if (isset($_POST['updateStudentPassword'])) {
    // Declare student_id from hidden input field
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if ($newPassword != $confirmNewPassword) {
        $_SESSION['error_message'] = "Password does not match";
    } else {
        if (empty($newPassword) || empty($confirmNewPassword)) {
            $_SESSION['error_message'] = "Password cannot be empty";
        } else if (strlen($newPassword) < 3) {
            $_SESSION['error_message'] = "Password must be greater than 3 characters";
        } else {
            $password = password_hash($confirmNewPassword, PASSWORD_BCRYPT);

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

// Erase Student
if (isset($_POST['eraseStudentData'])) {
    // Declare student_id from hidden input field
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $stmt = $conn->prepare("DELETE FROM students WHERE student_id=?");
    $stmt->bind_param("i", $student_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Student erased successfully!";
        header('Location: admin-student-list.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Error erasing student: " . $stmt->error;
    }

    $stmt->close();
    // Redirect to the appropriate page after processing
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}








/* ======================================================================================================== 

UPDATE APPLICANT INFORMATION

======================================================================================================== */



// Update applicant Biodata
if (isset($_POST['updateApplicantBioData'])) {
    // Declare student_id from hidden input field
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);

    // Determining section from class
    $class_id = mysqli_real_escape_string($conn, $_POST['enrolling_class']);
    $sql = "SELECT * FROM classes WHERE class_id = '$class_id'";
    $classes = mysqli_query($conn, $sql);
    $class = mysqli_fetch_assoc($classes);

    $section_id = $class['section_id'];

    $first_name = capitalize($_POST['first_name']);
    $second_name = capitalize($_POST['second_name']);
    $last_name = capitalize($_POST['last_name']);
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];


    $sql = "UPDATE applicants SET first_name = ?, second_name = ?, last_name = ?, birth_date = ?, gender = ?, state = ?, lga = ?, enrolling_class = ?, section_id = ? WHERE applicant_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssiii', $first_name, $second_name, $last_name, $birth_date, $gender, $state, $lga, $class_id, $section_id, $applicant_id);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Applicants biodata updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating biodata: " . $stmt->error;
    }
    $stmt->close();
    // Redirect to the appropriate page after processing
    header('Location: ' . $_SERVER['PHP_SELF'] . '?applicant_id=' . $applicant_id);
    exit();
}

// Update Parent Information
if (isset($_POST['updateApplicantParentData'])) {
    // Declare applicant_id from hidden input field
    $applicant_id = $_POST['applicant_id'];

    $parent_first_name = capitalize($_POST['parent_first_name']);
    $parent_last_name = capitalize($_POST['parent_last_name']);
    $parent_email = $_POST['parent_email'];
    $parent_phone_number = $_POST['parent_phone_number'];
    $parent_address = capitalize($_POST['parent_address']);
    $status = $_POST['status'];

    $sql = "UPDATE students SET parent_first_name = ?, parent_last_name = ?, parent_email = ?, parent_phone_number = ?, parent_address = ?, status = ? WHERE applicant_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssii', $parent_first_name, $parent_last_name, $parent_email, $parent_phone_number, $parent_address, $status, $applicant_id);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Parent information updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating parent information: " . $stmt->error;
    }
    $stmt->close();
    // Redirect to the appropriate page after processing
    header('Location: ' . $_SERVER['PHP_SELF'] . '?applicant_id=' . $applicant_id);
    exit();
}

if (isset($_POST['declineBtn'])) {
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);

    // Delete applicant from the database
    $delete_query = "DELETE FROM applicants WHERE applicant_id = $applicant_id";

    if (mysqli_query($conn, $delete_query)) {
        $_SESSION['success_message'] = 'Applicant has been declined and removed successfully.';
        header('Location: admin-new-applicant.php'); // Redirect to the applicants page
        exit();
    } else {
        $_SESSION['error_message'] = 'An error occurred while declining the applicant. Please try again.';
    }
}










/* ======================================================================================================== 

UPDATE ALUMNI INFORMATION

======================================================================================================== */

// Validate and capitalize necessary data
function validateAndCapitalize($data)
{
    return ucwords(trim(htmlspecialchars($data)));
}

// Process Alumni Bio Data Update
if (isset($_POST['updateAlumniBioData'])) {
    // Get and validate form inputs
    $alumni_id = $_POST['alumni_id'];
    $first_name = validateAndCapitalize($_POST['first_name']);
    $second_name = validateAndCapitalize($_POST['second_name']);
    $last_name = validateAndCapitalize($_POST['last_name']);
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];

    // Prepare and execute the update query
    $sql = "UPDATE alumni SET first_name = ?, second_name = ?, last_name = ?, birth_date = ?, gender = ?, state = ?, lga = ? WHERE alumni_id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $first_name, $second_name, $last_name, $birth_date, $gender, $state, $lga, $alumni_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Alumni biodata updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating biodata: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = "Error preparing statement: " . mysqli_error($conn);
    }

    // Redirect back to the page with the alumni ID
    header("Location: " . $_SERVER['PHP_SELF'] . '?alumni_id='. $alumni_id);
    exit();
}

// Process Other Alumni Information Update
if (isset($_POST['updateAlumniAccount'])) {
    // Get and validate form inputs
    $alumni_id = $_POST['alumni_id'];
    $index_no = trim(htmlspecialchars($_POST['index_no']));
    $position_held = validateAndCapitalize($_POST['position_held']);
    $nin_number = trim(htmlspecialchars($_POST['nin_number']));
    $graduation_year = trim(htmlspecialchars($_POST['graduation_year']));

    // Prepare and execute the update query
    $sql = "UPDATE alumni SET index_no = ?, position_held = ?, nin_number = ?, graduation_year = ? WHERE alumni_id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "isssi", $index_no, $position_held, $nin_number, $graduation_year, $alumni_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Other alumni information updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating information: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = "Error preparing statement: " . mysqli_error($conn);
    }

    // Redirect back to the page with the alumni ID
    header("Location: " . $_SERVER['PHP_SELF'] . '?alumni_id='. $alumni_id);
    exit();
}

// Process Alumni Password Change
if (isset($_POST['updateAlumniPassword'])) {
    // Get and validate form inputs
    $alumni_id = $_POST['alumni_id'];
    $newPassword = trim($_POST['newPassword']);
    $confirmNewPassword = trim($_POST['confirmNewPassword']);

    if ($newPassword !== $confirmNewPassword) {
        $_SESSION['error_message'] = "Passwords do not match!";
    } else {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Prepare and execute the update query
        $sql = "UPDATE alumni SET password = ? WHERE alumni_id = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $alumni_id);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['success_message'] = "Password updated successfully!";
            } else {
                $_SESSION['error_message'] = "Error updating password: " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = "Error preparing statement: " . mysqli_error($conn);
        }
    }

    // Redirect back to the page with the alumni ID
    header("Location: " . $_SERVER['PHP_SELF'] . '?alumni_id='. $alumni_id);
    exit();
}

// Process Alumni Data Deletion
if (isset($_POST['eraseAlumniData'])) {
    // Get and validate form inputs
    $alumni_id = $_POST['alumni_id'];

    // Prepare and execute the delete query
    $sql = "DELETE FROM alumni WHERE alumni_id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $alumni_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Alumni data deleted successfully!";
        } else {
            $_SESSION['error_message'] = "Error deleting alumni data: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = "Error preparing statement: " . mysqli_error($conn);
    }
}




/*
=============================================
        Managing Data 
============================================
*/


if (isset($_POST['approveSubject'])) {
    $subject_id = $_POST['subject_id'];
    // Perform the approve operation
    $sql = "UPDATE `results` SET `status` = 1 WHERE `subject_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $subject_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Subject approved successfully.";
    } else {
        $_SESSION['error_message'] = "Error approving subject.";
    }

    $stmt->close();
    header('Location:' . $_SERVER['PHP_SELF']);
    exit;
}


if (isset($_POST['truncatesubject'])) {
    $subject_id = $_POST['subject_id'];
    $conn->begin_transaction();

    try {
        // Perform the truncate operation for results
        $sql1 = "DELETE FROM `results` WHERE `subject_id` = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $subject_id);
        $stmt1->execute();
        $stmt1->close();

        // Perform the truncate operation for uploads
        $sql2 = "DELETE FROM `uploads` WHERE `subject_id` = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $subject_id);
        $stmt2->execute();
        $stmt2->close();

        $conn->commit();
        $_SESSION['success_message'] = "Subject truncated successfully.";
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['error_message'] = "Error truncating subject.";
    }
    header('Location:' . $_SERVER['PHP_SELF']);
    exit;
}
