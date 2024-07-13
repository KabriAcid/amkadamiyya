<?php
session_start();
include "../../config/database.php";

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
    $students = mysqli_query($conn, $sql);
    $student = mysqli_fetch_assoc($students);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Student</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "";
    }
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6 class="text-gradient text-info">Profile Information</h6>
                                <a href="admin-edit-student.php?student_id=<?php echo $student['student_id']; ?>" class="btn bg-gradient-dark btn-sm">Edit <i class="ms-2 fa fa-edit" style="font-size: 12px;"></i></a>
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
                <?php
                $sql = "SELECT `student_id` FROM `results` WHERE `student_id` = '$student_id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <div class="col-12">
                        <div class="card" style="overflow: auto;">
                            <div class="card-body">
                                <table class="table table-responsive" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase px-0 text-center text-xxs font-weight-bolder border">
                                                S/N</th>
                                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                                subject</th>
                                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                                1<sup>st</sup>&nbsp;c.a</th>
                                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                                2<sup>nd</sup>&nbsp;c.a</th>
                                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                                exams</th>
                                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                                total</th>
                                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                                grade</th>
                                            <th class="text-uppercase text-center text-xxs font-weight-bolder border">
                                                remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM `results` WHERE `student_id` = '$student_id' ORDER BY `subject_id` ASC";
                                        $result = mysqli_query($conn, $sql);
                                        $count = 1;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal border"><?php echo $count; ?>
                                                </td>

                                                <!-- Subjects  -->
                                                <td class="text-sm text-center font-weight-normal border">
                                                    <?php
                                                    $subject_id = $row['subject_id'];

                                                    $subject_query = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id' ";
                                                    $subject_result = mysqli_query($conn, $subject_query);;
                                                    $subject = mysqli_fetch_assoc($subject_result);
                                                    echo $subject['subject_name'];
                                                    ?>
                                                </td>

                                                <!-- First CA  -->
                                                <td class="text-sm text-center font-weight-normal border">
                                                    <?php
                                                    echo $row['first_test'];
                                                    ?>
                                                </td>

                                                <!-- Second CA  -->
                                                <td class="text-sm text-center font-weight-normal border">
                                                    <?php
                                                    echo $row['second_test'];
                                                    ?>
                                                </td>

                                                <!-- Exam  -->
                                                <td class="text-sm text-center font-weight-normal border">
                                                    <?php
                                                    echo $row['exam'];
                                                    ?>
                                                </td>

                                                <!-- Total  -->
                                                <td class="text-sm text-center font-weight-normal border">
                                                    <?php
                                                    echo $row['total'];
                                                    ?>
                                                </td>

                                                <!-- Grade  -->
                                                <td class="text-sm text-center font-weight-normal border">
                                                    <?php
                                                    echo $row['grade'];
                                                    ?>
                                                </td>

                                                <!-- Remark  -->
                                                <td class="text-sm text-center font-weight-normal border">
                                                    <?php
                                                    echo $row['remark'];
                                                    ?>
                                                </td>

                                            </tr>

                                        <?php
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small class="text-warning" style="font-style:italic">Note that the student&apos;s result might be inconclusive.</small>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="admin-print-result.php?student_id=<?php echo $student['student_id'] ?>" class="btn btn-round bg-gradient-info">Print result</a>
                    </div>
                <?php
                } else {
                ?>
                    <p class="text-center py-3">No result found for this student.</p>
                <?php
                }
                ?>
            </div>
        </div>
        <?php include "inc/admin-footer.php"; ?>
    </main>

    <?php include "inc/admin-scripts.php"; ?>
</body>

</html>