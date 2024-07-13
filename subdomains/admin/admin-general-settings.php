<?php
session_start();
include "../../config/database.php";

$sql = "SELECT * FROM `defaults`;";
$result = mysqli_query($conn, $sql);
$default = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Set Defaults</title>
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
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header pb-0 p-3">
                                <h4 class="mb-0 text-dark text-gradient text-center">General Settings</h4>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body p-3">
                                <!-- Students -->
                                <h6 class="text-uppercase font-weight-bolder">
                                    Students
                                </h6>
                                <p class="text-muted mb-3">Truncating this table will remove all student records.</p>
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="students" name="tables[]" value="students" />
                                    <label class="form-check-label null-label text-body ms-3 text-truncate w-80 mb-0" for="students">Truncate Students Table</label>
                                </div>
                                <!-- Staff -->
                                <h6 class="text-uppercase font-weight-bolder mt-4">
                                    Staff
                                </h6>
                                <p class="text-muted mb-3">Truncating this table will remove all staff records.</p>
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="staff" name="tables[]" value="staff" />
                                    <label class="form-check-label null-label text-body ms-3 text-truncate w-80 mb-0" for="staff">Truncate Staff Table</label>
                                </div>
                                <!-- Alumni -->
                                <h6 class="text-uppercase font-weight-bolder mt-4">
                                    Alumni
                                </h6>
                                <p class="text-muted mb-3">Truncating this table will remove all alumni records.</p>
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="alumni" name="tables[]" value="alumni" />
                                    <label class="form-check-label null-label text-body ms-3 text-truncate w-80 mb-0" for="alumni">Truncate Alumni Table</label>
                                </div>
                                <!-- Blog -->
                                <h6 class="text-uppercase font-weight-bolder mt-4">
                                    Blog
                                </h6>
                                <p class="text-muted mb-3">Truncating this table will remove all blog posts.</p>
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="blog" name="tables[]" value="blog" />
                                    <label class="form-check-label null-label text-body ms-3 text-truncate w-80 mb-0" for="blog">Truncate Blog Table</label>
                                </div>
                                <!-- Results -->
                                <h6 class="text-uppercase font-weight-bolder mt-4">
                                    Results
                                </h6>
                                <p class="text-muted mb-3">Truncating this table will remove all results records.</p>
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="results" name="tables[]" value="results" />
                                    <label class="form-check-label null-label text-body ms-3 text-truncate w-80 mb-0" for="results">Truncate Results Table</label>
                                </div>
                                <!-- Notifications -->
                                <h6 class="text-uppercase font-weight-bolder mt-4">
                                    Notifications
                                </h6>
                                <p class="text-muted mb-3">Truncating this table will remove all notifications records.</p>
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="notifications" name="tables[]" value="notifications" />
                                    <label class="form-check-label null-label text-body ms-3 text-truncate w-80 mb-0" for="notifications">Truncate Notifications Table</label>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-check form-switch ps-0 mt-4 text-end">
                                    <button type="submit" name="truncateData" class="btn bg-gradient-danger">Apply Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php"; ?>
    </main>


    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <?php
    if (isset($_SESSION['success_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Successful",
                    text: "<?php echo $_SESSION['success_message']; ?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'success'
                })
            })
        </script>
    <?php
        unset($_SESSION['success_message']);
    } else if (isset($_SESSION['error_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Error",
                    text: "<?php echo $_SESSION['error_message']; ?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'error'
                })
            })
        </script>
    <?php
        unset($_SESSION['error_message']);
    }
    ?>

</body>

</html>