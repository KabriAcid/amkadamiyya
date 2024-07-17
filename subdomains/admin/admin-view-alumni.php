<?php
session_start();
require_once "../../config/database.php";

// Check if alumni ID is set
if (isset($_GET['alumni_id'])) {
    $alumni_id = $_GET['alumni_id'];

    // Prepare SQL query with parameterized query
    $sql = "SELECT * FROM `alumni` WHERE `alumni_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $alumni_id);
    $stmt->execute();
    $alumni = $stmt->get_result()->fetch_assoc();
} else {
    header('Location: admin-alumni-list.php');
    exit();
}

// Check if staff position ID is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];
} else {
    header('Location: admin-logout.php');
}
?>
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
                    <div class="card card-body" id="profile">
                        <div class="row align-items-center">
                            <div class="col-sm-auto col-4">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="<?php echo $row['photo']; ?>" alt="bruce" class="w-100 border-radius-lg shadow-sm" />
                                </div>
                            </div>
                            <div class="col-8 my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1 font-weight-bolder"><?php echo ucfirst($row['first_name']) . '&nbsp;' . ucfirst($row['last_name']); ?></h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        <?php
                                        // $position_id = $row['position_id'];
                                        // $sql = "SELECT `position_name` FROM `school_post` WHERE `position_id` = '$position_id'";
                                        // $positions = mysqli_query($conn, $sql);
                                        // $position = mysqli_fetch_assoc($positions);
                                        // echo $position['position_name'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6 class="text-gradient text-primary">Profile Information</h6>
                                <a href="admin-edit-alumni.php?alumni_id=<?php echo $row['alumni_id']; ?>" class="btn bg-gradient-primary btn-sm">Edit <i class="fa fa-edit text-sm ms-1"></i></a>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <div class="row">
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
                                    echo $row['graduation_year'];
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
        <?php include "inc/admin-footer.php"; ?>
    </main>


    <?php include "inc/admin-scripts.php"; ?>
</body>

</html>