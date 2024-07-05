<?php
session_start();
include "../../config/database.php";

if (isset($_GET['staff_id'])) {
    $staff_id = $_GET['staff_id'];
    $sql = "SELECT * FROM `staff` WHERE `staff_id` = '$staff_id'";
    $result = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_assoc($result);

    $class_id = $staff["class_id"];
} else {
    header('Location: admin-staff-list.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Staff</title>
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
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="mb-0 text-gradient text-info">Student's Table</h5>
                            <p class="text-sm mb-0">
                                Here is the complete list of students from this class.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th
                                            class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                            Full Name</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Class</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gender</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            State</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            LGA</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `students` WHERE `class_id` = '$class_id'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <!-- Names -->
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $row['first_name'] . " " . $row['second_name'] . " " . $row['last_name']; ?>
                                            </td>
                                            <!-- Class -->
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php
                                                $query = "SELECT * FROM `classes` WHERE `class_id` = '$class_id' ";
                                                $res = mysqli_query($conn, $query);
                                                $class = mysqli_fetch_assoc($res);

                                                echo $class['class_name'];
                                                ?>

                                            </td>
                                            <!-- Gender -->
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php echo $row['gender']; ?>
                                            </td>
                                            <!-- State -->
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php echo $row['state']; ?>
                                            </td>
                                            <!-- LGA -->
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php echo $row['lga']; ?>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a
                                                    href="admin-view-student.php?student_id=<?php echo $row['student_id']; ?>">View</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6>Profile Information</h6>
                                <a href="admin-edit-staff.php?staff_id=<?php echo $staff['staff_id']; ?>"
                                    class="btn bg-gradient-dark btn-sm">Edit <i class="fa fa-edit text-sm ms-1"></i></a>
                            </div>
                        </div>
                        <hr class="horizontal dark my-1">
                        <div class="card-body">
                            <div class="row">
                                <h6 class="mb-4 text-gradient text-warning">Personal Data</h6>
                                <div class="col-xl-6 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name: </strong>&nbsp;
                                    <?php echo ucfirst($staff['first_name']); ?>
                                </div>
                                <div class="col-xl-6 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name: </strong>&nbsp;
                                    <?php echo ucfirst($staff['last_name']); ?>
                                </div>
                                <div class="col-xl-6 col-6 text-sm mb-4">
                                    <strong class="text-dark">Username: </strong>&nbsp;
                                    <?php echo ucfirst($staff['username']); ?>
                                </div>
                                <div class="col-xl-6 col-6 text-sm mb-4">
                                    <strong class="text-dark">Subject: </strong>&nbsp;
                                    <?php
                                    $subject_id = $staff['subject_id'];
                                    $subject_query = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id' ";
                                    $subject_result = mysqli_query($conn, $subject_query);
                                    if (mysqli_num_rows($subject_result) > 0) {
                                        $subject = mysqli_fetch_assoc($subject_result);

                                        echo $subject['subject_name'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </div>
                                <div class="col-xxl-6 col-6 text-sm mb-4">
                                    <strong class="text-dark">Form Master: </strong>&nbsp;
                                    <?php
                                    $class_id = $staff['class_id'];
                                    $class_query = "SELECT * FROM `classes` WHERE `class_id` = '$class_id' ";
                                    $class_result = mysqli_query($conn, $class_query);
                                    $class_row = mysqli_fetch_assoc($class_result);

                                    echo $class_row['class_name'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>

    <script src="../../js/plugins/datatables.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <script>
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>

</body>

</html>