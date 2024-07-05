<?php
session_start();
include "../../config/database.php";

if (isset($_GET['alumni_id'])) {
    $alumni_id = $_GET['alumni_id'];
    $sql = "SELECT * FROM `alumni` WHERE `alumni_id` = '$alumni_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    header('Location: alumni-list.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Alumni</title>
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
                <div class="col-lg-10 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6>Profile Information</h6>
                                <a href="admin-edit-alumni.php?alumni_id=<?php echo $row['alumni_id']; ?>"
                                    class="btn bg-gradient-dark btn-sm">Edit <i class="fa fa-edit text-sm ms-1"></i></a>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <div class="row">
                                <h6 class="mb-4 text-gradient text-warning">Personal Data</h6>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name: </strong>&nbsp;
                                    <?php echo ucfirst($row['first_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Middle Name: </strong>&nbsp;
                                    <?php echo ucfirst($row['second_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name: </strong>&nbsp;
                                    <?php echo ucfirst($row['last_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Birth Date: </strong>&nbsp;
                                    <?php
                                    $date_of_birth = date('d-M-Y', strtotime($row['date_of_birth']));
                                    echo ucfirst($date_of_birth);
                                    ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Index No: </strong>&nbsp;
                                    <?php echo ucfirst($row['index_no']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Email Address: </strong>&nbsp;
                                    <?php echo ucfirst($row['email']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Phone Number: </strong>&nbsp;
                                    <?php echo ucfirst($row['phone_number']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Graduation Year: </strong>&nbsp;
                                    <?php
                                     $year_id =  $row['graduation_year'];
                                     $sql = "SELECT * FROM graduation_year WHERE `year_id` = '$year_id'";
                                     $year_result = mysqli_query($conn, $sql);
                                     $year = mysqli_fetch_assoc($year_result);
                                     echo $year['year'];
                                      ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Position Held: </strong>&nbsp;
                                    <?php echo $row['position_held']; ?>
                                </div>

                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">State: </strong>&nbsp; <?php echo $row['state']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">LGA: </strong>&nbsp; <?php echo $row['lga']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Home Address: </strong>&nbsp; <?php echo $row['address']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Gender: </strong>&nbsp;
                                    <?php echo ucfirst($row['gender']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">NIN Number: </strong>&nbsp;
                                    <?php echo ucfirst($row['nin_number']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>


    <?php include "inc/admin-scripts.php"; ?>
</body>

</html>