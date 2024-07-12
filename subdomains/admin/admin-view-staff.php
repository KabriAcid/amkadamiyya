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
    <title>View Staff Profile</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "inc/admin-sidebar.php";
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
                                <h6 class="text-gradient text-warning">Profile Information</h6>
                                <form action="admin-edit-profile.php" method="get">
                                    <input type="hidden" name="staff_id" value="<?php echo $staff['staff_id']; ?>">
                                    <button type="submit" class="btn bg-gradient-dark btn-sm">Edit</button>
                                </form>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name: </strong>&nbsp; <?php echo ucfirst($staff['first_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name: </strong>&nbsp; <?php echo ucfirst($staff['last_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Username: </strong>&nbsp; <?php echo ucfirst($staff['username']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Email: </strong>&nbsp; <?php echo $staff['email']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Phone Number: </strong>&nbsp; <?php echo $staff['phone_number']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Class: </strong>&nbsp;
                                    <?php
                                    $class_id = $staff['class_id'];
                                    $sql = "SELECT `class_name` FROM `classes` WHERE `class_id` = '$class_id'";
                                    $clasess = mysqli_query($conn, $sql);
                                    $class = mysqli_fetch_assoc($clasess);
                                    echo $class['class_name'];
                                    ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Subject: </strong>&nbsp;
                                    <?php
                                    $subject_id = $staff['subject_id'];
                                    $sql = "SELECT `subject_name` FROM `subjects` WHERE `subject_id` = '$subject_id'";
                                    $subjects = mysqli_query($conn, $sql);
                                    $subject = mysqli_fetch_assoc($subjects);
                                    echo $subject['subject_name'];
                                    ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Position: </strong>&nbsp;
                                    <?php
                                    $position_id = $staff['position_id'];
                                    $sql = "SELECT `position_name` FROM `school_post` WHERE `position_id` = '$position_id'";
                                    $positions = mysqli_query($conn, $sql);
                                    $position = mysqli_fetch_assoc($positions);
                                    echo $position['position_name'];
                                    ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Birth Date: </strong>&nbsp; <?php echo $staff['birth_date']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Gender: </strong>&nbsp; <?php echo $staff['gender']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Qualification: </strong>&nbsp;
                                    <?php
                                    $q_id = $staff['q_id'];
                                    $sql = "SELECT * FROM `qualifications` WHERE `q_id` = '$q_id'";
                                    $result = mysqli_query($conn, $sql);
                                    $qual = mysqli_fetch_assoc($result);

                                    $discipline_id = $staff['discipline_id'];
                                    $sql = "SELECT * FROM `university_disciplines` WHERE `discipline_id` = '$discipline_id'";
                                    $result = mysqli_query($conn, $sql);
                                    $discipline = mysqli_fetch_assoc($result);
                                    echo $qual['qualification_name'] . '. ' . $discipline['discipline_name'];
                                    ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Home Address: </strong>&nbsp; <?php echo $staff['address']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">State: </strong>&nbsp; <?php echo $staff['state']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">LGA: </strong>&nbsp; <?php echo ucfirst($staff['lga']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Salary: </strong>&nbsp;&#8358; <?php echo number_format($staff['salary']); ?>.00
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Account Number: </strong>&nbsp; <?php echo $staff['account_number']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Bank Name: </strong>&nbsp;
                                    <?php
                                    $bank_id = $staff['bank_id'];
                                    $sql = "SELECT `bank_name` FROM `nigerian_banks` WHERE `bank_id` = '$bank_id'";
                                    $banks = mysqli_query($conn, $sql);
                                    $bank = mysqli_fetch_assoc($banks);
                                    echo $bank['bank_name'];
                                    ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Join Date: </strong>&nbsp; <?php echo date("j F, Y", strtotime($staff['timestamp'])); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Status: </strong>&nbsp; <?php echo $staff['status'] == "" ? "Not Active" : "Active"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sTudents -->
                <div class="col-12 mb-3">
                    <div class="card">

                        <div class="card-header">
                            <h6 class="mb-0 text-gradient text-danger">Student's Table</h6>
                            <p class="text-sm mb-0">
                                Here is the complete list of students from this class.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                            Full Name</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Class</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gender</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            State</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            LGA</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `students` WHERE `class_id` = '$class_id'";
                                    $students = mysqli_query($conn, $sql);
                                    while ($student = mysqli_fetch_assoc($students)) {
                                    ?>
                                        <tr>
                                            <!-- Names -->
                                            <td class="text-sm font-weight-normal">
                                                <?php echo $student['first_name'] . " " . $student['second_name'] . " " . $student['last_name']; ?>
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
                                                <?php echo $student['gender']; ?>
                                            </td>
                                            <!-- State -->
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php echo $student['state']; ?>
                                            </td>
                                            <!-- LGA -->
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php echo $student['lga']; ?>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a href="admin-view-student.php?student_id=<?php echo $student['student_id']; ?>">View</a>
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
            </div>
        </div>
        <?php include "inc/admin-footer.php"; ?>
    </main>

    <script src="../../js/plugins/datatables.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <script>
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true,
            perPage: 25
        });
    </script>

</body>

</html>