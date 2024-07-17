<?php
include "student-process.php";
$student_id = $_SESSION['student']
['student_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notifications</title>
    <?php include "inc/student-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php require "inc/student-sidebar.php"; ?>
    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/student-navbar.php"; ?>
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
                                $sql = "SELECT * FROM `student_notification` ORDER BY `not_timestamp` DESC";
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
            </div>
        </div>
        <?php include "inc/student-footer.php"; ?>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/student-scripts.php"; ?>


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