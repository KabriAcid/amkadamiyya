<?php

session_start();
require_once "../../config/database.php";

$staff_id = $_SESSION['staff']
['staff_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notifications</title>
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
            <div class="row gx-4">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6>Notification Timeline</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted">
                                <!-- 1. School Fees Payment -->
                                <?php
                                $sql = "SELECT * FROM `admin_notification` ORDER BY `not_timestamp` DESC";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <a href="" class="d-block">
                                            <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                    <i class="<?php echo $row['not_icon']; ?> <?php echo $row['not_icon_color']; ?> text-gradient"></i>
                                                </span>
                                                <div class="timeline-content">
                                                    <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $row['not_title']; ?></h6>
                                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo date("j F, Y h:m", strtotime($row['not_timestamp'])); ?></p>
                                                    <p class="mt-3">
                                                        <?php echo $row['not_content']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                <?php
                                    }
                                } else {
                                    echo "<p class='text-center'>No notification available.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Delete  Notification-->
                <div class="col-lg-4 mt-3 mt-md-0">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-danger">Delete All Notifications</h6>
                            <p class="text-sm mb-0">By hitting the delete button all your notifications will be cleared.</p>
                            <div class="text-end">
                                <a href="?delete_notification=<?php echo $staff_id; ?>" class="btn bg-gradient-danger btn-sm text-end my-3">Delete</a>
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
    }
    ?>

</body>

</html>