<?php
session_start();
include "../../config/database.php";

if (isset($_SESSION['student']['student_id'])) {
    $student_id = $_SESSION['student']['student_id'];
    $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
    $students = mysqli_query($conn, $sql);
    $student = mysqli_fetch_assoc($students);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Student</title>
    <?php include "inc/student-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    include "inc/student-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/student-navbar.php"; ?>
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6 class="text-gradient text-info">Profile Information</h6>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name: </strong>&nbsp; <?php echo ucfirst($student['first_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name: </strong>&nbsp; <?php echo ucfirst($student['last_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Admission Number: </strong>&nbsp; <?php echo ucfirst($student['admission_id']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Class: </strong>&nbsp;
                                    <?php
                                    $class_id = $student['class_id'];
                                    $sql = "SELECT `class_name` FROM `classes` WHERE `class_id` = '$class_id'";
                                    $clasess = mysqli_query($conn, $sql);
                                    $class = mysqli_fetch_assoc($clasess);
                                    echo $class['class_name'];
                                    ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Birth Date: </strong>&nbsp; <?php echo $student['birth_date']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Gender: </strong>&nbsp; <?php echo $student['gender']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">State: </strong>&nbsp; <?php echo $student['state']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">LGA: </strong>&nbsp; <?php echo ucfirst($student['lga']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Join Date: </strong>&nbsp; <?php echo date("j F, Y", strtotime($student['timestamp'])); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Status: </strong>&nbsp; <?php echo $student['status'] == "" ? "Not Active" : "Active"; ?>
                                </div>
                                <!--  -->
                                <h6 class="mt-4 mb-3 text-gradient text-primary">Parent's Data</h6>

                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. First Name: </strong>&nbsp; <?php echo ucfirst($student['parent_first_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Last Name: </strong>&nbsp; <?php echo ucfirst($student['parent_last_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Phone Number: </strong>&nbsp; <?php echo $student['parent_phone_number']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Email Address: </strong>&nbsp; <?php echo $student['parent_email']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Home Address: </strong>&nbsp; <?php echo $student['parent_address']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include "inc/student-footer.php"; ?>
    </main>

    <?php include "inc/student-scripts.php"; ?>
</body>

</html>