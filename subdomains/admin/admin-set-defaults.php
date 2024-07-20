<?php
session_start();
require_once "../../config/database.php";

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
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header mb-0">
                            <h6 class="text-dark text-gradient">Set Defaults</h6>
                            <p class="mb-0 text-sm">Here you can configure the default settings and values for various data entries and system preferences.</p>
                        </div>

                        <hr class="horizontal dark my-0 py-0">
                        <div class="card-body">
                            <form action="create
                            .php" method="post">
                                <div class="form-group">
                                    <label for="">Session</label>
                                    <input type="text" name="session" class="form-control" value="<?php echo $default['session_name'] ?>" placeholder="Enter session year">
                                </div>
                                <div class="form-group">
                                    <label for="">Current Term</label>
                                    <input type="text" name="current_term" class="form-control" value="<?php echo $default['current_term'] ?>" placeholder="Enter current term">
                                </div>
                                <div class="form-group">
                                    <label for="">Term Ending</label>
                                    <input type="text" name="term_ending" class="form-control" value="<?php echo $default['term_ending'] ?>" placeholder="Enter term Ending year">
                                </div>
                                <div class="form-group">
                                    <label for="">Next Term Begins</label>
                                    <input type="text" name="term_begins" class="form-control" value="<?php echo $default['term_begins'] ?>" placeholder="Enter next term beginning">
                                </div>
                                <div class="text-end">
                                    <input type="submit" value="Update" name="setDefaults" class="btn bg-gradient-success">
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