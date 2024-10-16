<?php
session_start();
require_once "../../config/database.php";
    // Check if alumni ID is set
    if (isset($_GET['alumni_id'])) {
        $alumni_id = $_GET['alumni_id'];

        // Prepare the SQL query to fetch the alumni data
        $sql = "SELECT * FROM `alumni` WHERE `alumni_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $alumni_id);
        $stmt->execute();
        $alumni = $stmt->get_result()->fetch_assoc();

        // If no alumni data is found, redirect to the list page
        if (!$alumni) {
            header('Location: admin-alumni-list.php');
            exit();
        }
    } else {
        // If no alumni ID is provided, redirect to the list page
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

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Alumni</title>
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
                <div class="col-lg-10 mb-3 mb-lg-0">
                    <div class="card card-body" id="profile">
                        <div class="row align-items-center">
                            <div class="col-sm-auto col-4">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="<?php echo $alumni['photo']; ?>" alt="user" class="w-100 border-radius-lg shadow-sm" />
                                </div>
                            </div>
                            <div class="col-8 my-auto">
                                <div class="h-100">
                                    <h5 class="mb-0">
                                        <span class="font-weight-bold text-capitalize">
                                            <?php echo ucfirst($alumni['first_name']) . ' ' . ucfirst($alumni['last_name']); ?>
                                        </span>
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        <?php
                                        // $position_id = $alumni['position_id'];
                                        // $sql = "SELECT `position_name` FROM `school_position` WHERE `position_id` = '$position_id'";
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
                                <a href="admin-edit-alumni.php?alumni_id=<?php echo $alumni['alumni_id']; ?>" class="btn bg-gradient-primary btn-sm">Edit <i class="fa fa-edit text-sm ms-1"></i></a>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo ucfirst($alumni['first_name']); ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Middle Name:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo ucfirst($alumni['second_name']); ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo ucfirst($alumni['last_name']); ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Birth Date:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php
                                        $date_of_birth = date('d-M-Y', strtotime($alumni['birth_date']));
                                        echo $date_of_birth;
                                        ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Index No:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo ucfirst($alumni['index_no']); ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Email Address:</strong>
                                    <span class="text-secondary text-xs font-weight-bold">
                                        <?php echo $alumni['email']; ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Phone Number:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo substr($alumni['phone_number'], 0, 3) . '-' . substr($alumni['phone_number'], 3, 4) . '-' . substr($alumni['phone_number'], 7); ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Graduation Year:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo $alumni['graduation_year']; ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Position Held:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo $alumni['position_held']; ?>
                                    </span>
                                </div>

                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">State:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo $alumni['state']; ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">LGA:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo $alumni['lga']; ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Home Address:</strong>
                                    <span class="text-secondary text-xs font-weight-bold">
                                        <?php echo $alumni['address']; ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Gender:</strong>
                                    <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                        <?php echo ucfirst($alumni['gender']); ?>
                                    </span>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">NIN Number: </strong>&nbsp;
                                    <?php echo ucfirst($alumni['nin_number']); ?>
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