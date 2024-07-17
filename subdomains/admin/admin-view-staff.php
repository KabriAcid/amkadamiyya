<?php
session_start();
require_once "../../config/database.php";

// Check if staff ID is set
if (isset($_GET['staff_id'])) {
    $staff_id = $_GET['staff_id'];

    // Prepare SQL query with parameterized query
    $sql = "SELECT * FROM `staff` WHERE `staff_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $staff = $stmt->get_result()->fetch_assoc();
} else {
    header('Location: admin-staff-list.php');
    exit();
}

// Check if staff position ID is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];
} else {
    header('Location: admin-logout.php');
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
    include "inc/admin-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <!--  -->
                    <div class="card card-body" id="profile">
                        <div class="row align-items-center">
                            <div class="col-sm-auto col-4">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="<?php echo $staff['photo']; ?>" alt="bruce" class="w-100 border-radius-lg shadow-sm" />
                                </div>
                            </div>
                            <div class="col-8 my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1 font-weight-bolder"><?php echo ucfirst($staff['first_name']) . '&nbsp;' . ucfirst($staff['last_name']); ?></h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        <?php
                                        $position_id = $staff['position_id'];
                                        $sql = "SELECT `position_name` FROM `school_post` WHERE `position_id` = '$position_id'";
                                        $positions = mysqli_query($conn, $sql);
                                        $position = mysqli_fetch_assoc($positions);
                                        echo $position['position_name'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="card mt-3">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6 class="text-gradient text-warning">Profile Information</h6>
                                <a href="admin-edit-staff.php?staff_id=<?php echo $staff['staff_id']; ?>" class="btn bg-gradient-dark btn-sm">Edit <i class="ms-2 fa fa-edit" style="font-size: 12px;"></i></a>
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
                                    <strong class="text-dark">Qualification: </strong>&nbsp;<?php echo $_SESSION['staff']['qualification'] . '. ' . $_SESSION['staff']['discipline'];
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
                                    <strong class="text-dark">Salary: </strong>&nbsp;&#8358; <?php echo number_format($staff['salary']) ?? 0; ?>.00
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Account Number: </strong>&nbsp; <?php echo $staff['account_number']; ?>
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
                <?php
                if ($class['class_name'] != 'null') {
                ?>
                    <div class="col-12 mb-3">
                        <div class="card">

                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-info">Student's Table</h6>
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
                <?php
                }
                ?>
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