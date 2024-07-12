
<?php
session_start();
print_r($_SESSION) . "<br>";
include '../../config/database.php';
// Function to capitalize names
    function capitalize($string)
    {
        return ucwords(strtolower(trim($string)));
    }

    // Update Biodata
    if (isset($_POST['updateBioData'])) {
        $staff_id = $_POST['staff_id'];

        $first_name = capitalize(mysqli_real_escape_string($conn, $_POST['first_name']));
        $last_name = capitalize(mysqli_real_escape_string($conn, $_POST['last_name']));
        $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $lga = mysqli_real_escape_string($conn, $_POST['lga']);
        $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $address = capitalize(mysqli_real_escape_string($conn, $_POST['address']));

        if (isset($_FILES['photo'])) {
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
                }
            }
        }

        $sql = "UPDATE staff SET 
            first_name='$first_name',
            last_name='$last_name', 
            birth_date='$birth_date', 
            gender='$gender', 
            state='$state', 
            lga='$lga', 
            phone_number='$phone_number', 
            address='$address'
            WHERE staff_id='$staff_id'";

        if (mysqli_query($conn, $sql)) {
            // Update session data
            if ($_SESSION['staff']['staff_id'] == $staff_id) {

                $_SESSION['staff']['first_name'] = $first_name;
                $_SESSION['staff']['last_name'] = $last_name;
                $_SESSION['staff']['birth_date'] = $birth_date;
                $_SESSION['staff']['gender'] = $gender;
                $_SESSION['staff']['state'] = $state;
                $_SESSION['staff']['lga'] = $lga;
                $_SESSION['staff']['phone_number'] = $phone_number;
                $_SESSION['staff']['address'] = $address;

            }
            echo "<br>";
            echo "<br>";
            print_r($_SESSION['staff']);

            $_SESSION['success_message'] = "Biodata updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating biodata: " . mysqli_error($conn);
        }
    }