<?php
session_start();
include "../../config/database.php";

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
    $std_result = mysqli_query($conn, $sql);
    $student = mysqli_fetch_assoc($std_result);

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
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h6 class="font-weight-bold text-dark">Result Summary</h6>
                            <p class="text-secondary text-sm">Below is the result summary for
                                <span
                                    class="font-weight-bold text-dark"><?php echo $student['first_name'] . '&nbsp;' . $student['second_name'] . '&nbsp;' . $student['last_name']; ?>.</span>
                            </p>
                        </div>
                        <div class="">
                            <a href="admin-student-profile.php?student_id=<?php echo $student['student_id']; ?>"
                                class="btn bg-gradient-dark btn-sm">View Profile</a>
                        </div>
                    </div>
                    <small class="text-warning" style="font-style:italic">Note that the student&apos;s uploaded result
                        might be inconclusive.</small>
                </div>
            </div>
            <div class="row">
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
                                                $subject_result = mysqli_query($conn, $subject_query);
                                                ;
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
                <div class="d-flex justify-content-center mt-3">
                    <a href="admin-print-result.php?student_id=<?php echo $student['student_id'] ?>"
                        class="btn btn-round bg-gradient-info">Print result</a>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>

    <?php include "inc/admin-scripts.php"; ?>
</body>

</html>