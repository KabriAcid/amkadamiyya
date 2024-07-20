<?php
session_start();
require_once "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Data</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    include "inc/admin-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h6 class="text-dark text-gradient">Manage Data</h6>
                            <p class="mb-0 text-sm">Here you can add and update various data entries such as bank names, disciplines, and qualifications.</p>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="discipline" class="form-label">Disciplines</label>
                                        <input type="text" class="form-control" name="discipline" placeholder="e.g Bsc.">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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