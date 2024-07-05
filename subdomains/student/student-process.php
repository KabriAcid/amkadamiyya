<?php
    # Start the session
    session_start();
    include "../../config/database.php";

    # Function to sanitize input data
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    # Check if form is submitted
    if (isset($_POST['studentLogin'])) {
        # Sanitize and validate registration number
        $admission_number = sanitize_input($_POST["admission_number"]);

        # Sanitize and validate password
        $password = sanitize_input($_POST["password"]);

        # Checking and verifying user inputs
        $sql = "SELECT * FROM `students` WHERE `admission_number` = '$admission_number' AND `password` = '$password'";
        $result = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_assoc($result)){
            $_SESSION['student'] = $row;
            $_SESSION['loggedin'] = true;
            header("Location: student-profile.php");
            // sleep(3);
        } else {
            $_GET['error'] = "Invalid login details";
        }
        if(mysqli_num_rows($result) == 0){
            $_GET['error'] = "User Not Found. Contact Admin";
        }
    }
?>
