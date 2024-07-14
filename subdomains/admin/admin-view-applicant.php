<?php
include "admin-process.php";

if (isset($_GET['applicant_id'])) {
    $applicant_id = $_GET['applicant_id'];
    $sql = "SELECT * FROM `applicants` WHERE `applicant_id` = '$applicant_id'";
    $applicants = mysqli_query($conn, $sql);
    $applicant = mysqli_fetch_assoc($applicants);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Applicant</title>
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
                                <h6 class="text-gradient text-primary">Profile Information</h6>
                                <a href="admin-edit-applicant.php?applicant_id=<?php echo $applicant['applicant_id']; ?>" class="btn bg-gradient-dark btn-sm">Edit <i class="ms-2 fa fa-edit" style="font-size: 12px;"></i></a>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name: </strong>&nbsp; <?php echo ucfirst($applicant['first_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name: </strong>&nbsp; <?php echo ucfirst($applicant['last_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Birth Date: </strong>&nbsp; <?php echo date("j F, Y", strtotime($applicant['birth_date'])) ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Gender: </strong>&nbsp; <?php echo $applicant['gender']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">State: </strong>&nbsp; <?php echo $applicant['state']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">LGA: </strong>&nbsp; <?php echo ucfirst($applicant['lga']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Application Date: </strong>&nbsp; <?php echo date("j F, Y. H:m", strtotime($applicant['timestamp'])); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Enrolling Class: </strong>&nbsp; 
                                    <?php  $class_id = $applicant['enrolling_class'];

                                    $sql = "SELECT `class_name` FROM `classes` WHERE `class_id` = '$class_id'";
                                    $clasess = mysqli_query($conn, $sql);
                                    $class = mysqli_fetch_assoc($clasess);
                                    echo $class['class_name']; ?>
                                </div>
                                <!--  -->
                                <h6 class="mt-4 mb-3 text-gradient text-primary">Parent's Data</h6>

                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. First Name: </strong>&nbsp; <?php echo ucfirst($applicant['parent_first_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Last Name: </strong>&nbsp; <?php echo ucfirst($applicant['parent_last_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Phone Number: </strong>&nbsp; <?php echo $applicant['parent_phone_number']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Email Address: </strong>&nbsp; <?php echo $applicant['parent_email']; ?>
                                </div>
                                <div class="col-xxl-8 col-8 text-sm mb-4">
                                    <strong class="text-dark">Par. Home Address: </strong>&nbsp; <?php echo $applicant['parent_address']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 text-end">
                        <form action="" method="post">
                            <input type="hidden" name="applicant_id" value="<?php echo $applicant['applicant_id'] ?>">
                            <button type="submit" class="btn bg-gradient-danger btn-round" name="declineBtn">Decline</button>
                        </form>
                    </div>
                    <div class="col-6 text-">
                        <form action="" method="post">
                            <input type="hidden" name="applicant_id" value="<?php echo $applicant['applicant_id'] ?>">
                            <button type="submit" class="btn bg-gradient-success btn-round" name="approveBtn">Approve</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php"; ?>
    </main>

    <?php include "inc/admin-scripts.php"; ?>
</body>

</html>