<?php
    session_start();
    include "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Profile</title>
    <?php include "./inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "./inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "./inc/admin-navbar.php"; ?>

        <!--  -->
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../../assets/images/backgrounds/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?php echo $_SESSION['staff']['photo']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?php echo $_SESSION['staff']['first_name'] . " " . $_SESSION['staff']['last_name']; ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                <?php echo $_SESSION['staff']['position_id']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h6>Profile Information</h6>
                                <a href="admin-edit-profile.php" class="btn bg-gradient-dark btn-sm">Edit <i class="ms-2 fa fa-edit" style="font-size: 12px;"></i></a>
                            </div>
                        </div>
                        <hr class="horizontal gray-light my-1">
                        <div class="card-body">
                            <div class="row">
                                <h6 class="mb-4 text-gradient text-warning">Personal Data</h6>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name: </strong>&nbsp; <?php echo ucfirst($_SESSION['staff']['first_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name: </strong>&nbsp; <?php echo ucfirst($_SESSION['staff']['last_name']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Position: </strong>&nbsp; <?php echo ucfirst($_SESSION['staff']['position_id']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Birth Date: </strong>&nbsp; <?php echo $_SESSION['staff']['birth_date']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Gender: </strong>&nbsp; <?php echo $_SESSION['staff']['gender']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Qualification: </strong>&nbsp; <?php echo $_SESSION['staff']['qualification'] . '. ' . $_SESSION['staff']['discipline']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Home Address: </strong>&nbsp; <?php echo $_SESSION['staff']['address']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">State: </strong>&nbsp; <?php echo $_SESSION['staff']['state']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">LGA: </strong>&nbsp; <?php echo ucfirst($_SESSION['staff']['lga']); ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Salary: </strong>&nbsp;&#8358; <?php echo number_format($_SESSION['staff']['salary']); ?>.00
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Account Number: </strong>&nbsp; <?php echo $_SESSION['staff']['account_number']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Bank Name: </strong>&nbsp; <?php echo $_SESSION['staff']['bank_name']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Join Date: </strong>&nbsp; <?php echo $_SESSION['staff']['join_date']; ?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Status: </strong>&nbsp; <?php echo $_SESSION['staff']['status'] == "" ? "Not Active" : "Active"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include './inc/admin-footer.php';  ?>
</main>

</body>

</html>