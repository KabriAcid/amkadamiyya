<?php
session_start();
require_once "../../config/database.php";

// Check if staff ID is set
if (isset($_SESSION['staff'])) {
    $staff_id = $_SESSION['staff']['staff_id'];
    $position_id = $_SESSION['staff']['position_id'];

    // Prepare SQL query with parameterized query
    $sql = "SELECT * FROM `staff` WHERE `staff_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $staff = $stmt->get_result()->fetch_assoc();
} 
 else {
    header('Location: admin-logout.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Profile</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "inc/admin-sidebar.php"; ?>
    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php"; ?>

        <!--  -->
        <div class="container-fluid">
            <div class="page-header w-100 p-5 rounded" style="background: url('../../assets/images/backgrounds/blog7-3.jpg') no-repeat; background-size: cover; background-position: center;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?php echo $staff['photo']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?php echo $staff['first_name'] . " " . $staff['last_name']; ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                <?php
                                $position_id = $staff['position_id'];
                                $sql = "SELECT `position_name` FROM `school_position` WHERE `position_id` = '$position_id'";
                                $positions = mysqli_query($conn, $sql);
                                $position = mysqli_fetch_assoc($positions);
                                echo $position['position_name'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-10 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6 class="text-gradient text-warning">Profile Information</h6>
                                <a href="admin-edit-profile.php" class="btn bg-gradient-dark btn-sm">Edit <i class="ms-2 fa fa-edit" style="font-size: 12px;"></i></a>
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
                                    <strong class="text-dark">Phone Number: </strong>&nbsp;
                                    <?php
                                    function formateNumber($number)
                                    {
                                        return chunk_split($number, 4);
                                    }
                                    echo formateNumber($staff['phone_number']);
                                    ?>
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
                                    $sql = "SELECT `position_name` FROM `school_position` WHERE `position_id` = '$position_id'";
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
                                    <strong class="text-dark">Qualification: </strong>&nbsp;<?php $staff['qualification'] . '. ' . $staff['discipline'];
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
                                    <?php echo $staff['bank_name']; ?>
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
            </div>
        </div>

        <?php include 'inc/admin-footer.php';  ?>
    </main>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

</body>

</html>