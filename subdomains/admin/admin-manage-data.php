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
                <div class="col-md-8">
                    <div class="card mb-4">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h6 class="text-dark text-gradient">Manage Data</h6>
                            <p class="mb-0 text-sm">Here you can add and update various data entries such as bank names, disciplines, and qualifications.</p>
                        </div>
                        <hr class="horizontal dark my-0">
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="bank_name" class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="e.g Fidelity Bank" required>
                                        </div>
                                        <div class="form-group mb-3 text-end">
                                            <button type="submit" class="btn bg-gradient-success btn-sm" name="add">Add</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="discipline" class="form-label">Disciplines</label>
                                            <input type="text" class="form-control" name="discipline" placeholder="e.g Statistics" required>
                                        </div>
                                        <div class="form-group mb-3 text-end">
                                            <button type="submit" class="btn bg-gradient-success btn-sm" name="add">Add</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="discipline" class="form-label">Qualifications</label>
                                            <input type="text" class="form-control" name="qualification" placeholder="e.g Bsc." required>
                                        </div>
                                        <div class="form-group text-end">
                                            <button type="submit" class="btn bg-gradient-success btn-sm" name="add">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="text-dark text-gradient">Student Levy</h6>
                            <p class="mb-0 text-sm">Here you can add and update student levy details, including various fees and charges applicable to students.</p>
                        </div>
                        <hr class="horizontal dark my-0">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="discipline" class="form-label">Qualifications</label>
                                            <input type="text" class="form-control" name="qualification" placeholder="e.g Bsc." required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="discipline" class="form-label">Qualifications</label>
                                            <input type="text" class="form-control" name="qualification" placeholder="e.g Bsc." required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="discipline" class="form-label">Qualifications</label>
                                            <input type="text" class="form-control" name="qualification" placeholder="e.g Bsc." required>
                                        </div>
                                    </div>
                                    <div class="form-group text-end">
                                        <button type="submit" class="btn bg-gradient-success btn-sm" name="add">Add</button>
                                    </div>
                                </div>
                            </form>
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