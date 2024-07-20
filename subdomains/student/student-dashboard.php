<?php
session_start();
require_once "../../config/database.php";

function addOrdinalSuffix($num)
{
    if (!in_array(($num % 100), array(11, 12, 13))) {
        switch ($num % 10) {
            case 1:
                return $num . '<sup>st</sup>';
            case 2:
                return $num . '<sup>nd</sup>';
            case 3:
                return $num . '<sup>rd</sup>';
        }
    }
    return $num . '<sup>th</sup>';
}

if (isset($_SESSION['student'])) {
    $class_id = $_SESSION['student']['class_id'];
    $student_id = $_SESSION['student']['student_id'];
} else {
    header('Location: student-logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <?php include "inc/student-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    include "inc/student-sidebar.php";
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/student-navbar.php"; ?>
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
            <div class="row removable">
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-3 mb-xl-0">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total in Class</p>
                                        <h6 class="font-weight-bolder mb-0">
                                            <?php
                                            $sql = "SELECT COUNT(*) AS `total_student` FROM `students` WHERE `class_id` = '$class_id' ";
                                            $total = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($total);
                                            ?>
                                            <?php echo $row['total_student']; ?>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-3 mb-xl-0">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Position</p>
                                        <h6 class="font-weight-bolder mb-0">
                                            <?php
                                            $sql = "SELECT `position` FROM `uploads` WHERE `student_id` = '$student_id' ";
                                            $uploads = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($uploads) > 0) {
                                                $row = mysqli_fetch_assoc($uploads);
                                                $position = addOrdinalSuffix($row['position']);
                                                echo $position;
                                            } else {
                                                echo "NIL";
                                            }

                                            ?>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-trophy text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-3 mb-xl-0">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Class</p>
                                        <h6 class="font-weight-bolder mb-0">
                                            <?php
                                            $sql = "SELECT `class_name` FROM `classes` WHERE `class_id` = '$class_id' ";
                                            $total = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($total);
                                            ?>
                                            <?php echo $row['class_name']; ?>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Fees Status</p>
                                        <h6 class="font-weight-bolder mb-0 text-danger">
                                            Not Paid
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
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