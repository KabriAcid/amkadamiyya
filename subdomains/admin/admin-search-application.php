<?php
    include "admin-process.php";
    if (isset($_POST['checkStatus'])) {
        $application_code = $_POST['application_code'];
        $sql = "SELECT * FROM `applicants` WHERE `application_code` = '$application_code'";
        $result = mysqli_query($conn, $sql);
        print_r($row = mysqli_fetch_assoc($result));

        if ($row = mysqli_fetch_assoc($result)) {
            if ($application_code == $row['application_code'] and $row['admission_status'] == 0) {
                $_GET['infoMessage'] = "You application is now pending kindly check later.";
            } 
            if ($application_code != $row['application_code']) {
                $_GET['errorMessage'] = "Invalid application Code";
            }
            if ($application_code == $row['application_code'] and $row['admission_status'] == 1) {
                $_GET['successMessage'] = true;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Applicants</title>
    <?php include "./inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "./inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "./inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-body">
                    <div class="container pt-5">
                        <h4 class="header">Search Application Code</h3>
                            <p>Please enter in the <span class="text-success">Application Code</span> to check for admission status.</p>
                            <form action="" method="post">
                                <div class="text-center py-2 mt-3">
                                    <div class="mx-auto">
                                        <div class="d-flex">
                                            <div class="input-group mb-4">
                                                <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
                                                <input class="form-control" placeholder="Enter Application Code" type="text" name="application_code">
                                                <input type="submit" name="checkStatus" class="btn bg-gradient-dark w-auto me-1 mb-0" style="border-radius: 0px 4px 4px 0px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php if (isset($_GET['infoMessage'])) {
                            ?>
                                <div class="mt-5">
                                    <p class="text-center lead text-warning"><?php echo $_GET['infoMessage']; ?>.</p>
                                </div>
                            <?php
                            } else if (isset($_GET['successMessage'])) {
                            ?>
                                <div class="mt-5">
                                    <p class="text-center lead"><span class="text-success">Congratulations! </span>Dear <?php echo $row['first_name'] . " " . $row['last_name']  ?> your admission has been approved.</p>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" onclick="window.print();" class="btn btn-success">PRINT</button>
                                    </div>
                                </div>
                            <?php
                            } else if (isset($_GET['errorMessage'])) {
                            ?>
                                <div class="mt-5">
                                    <p class="text-center lead text-danger"><?php echo $_GET['errorMessage']; ?></p>
                                </div>
                            <?php
                            } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include './inc/admin-footer.php';  ?>
    </main>

    <script src="../../js/core/popper.min.js"></script>
    <script src="../../js/core/bootstrap.min.js"></script>
    <script src="../../js/plugins/chartjs.min.js"></script>
    <script src="../../js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>

    <script src="../../js/plugins/dragula/dragula.min.js"></script>
    <script src="../../js/plugins/jkanban/jkanban.js"></script>

    <script src="../../js/soft-ui-dashboard.min3f71.js"></script>

</body>

</html>