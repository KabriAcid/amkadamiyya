<?php
session_start();
include "../../config/database.php";

function addOrdinalSuffix($num) {
    if (!in_array(($num % 100), array(11, 12, 13))){
        switch ($num % 10) {
            case 1: return $num.'<sup>st</sup>';
            case 2: return $num.'<sup>nd</sup>';
            case 3: return $num.'<sup>rd</sup>';
        }
    }
    return $num.'<sup>th</sup>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Results</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "inc/admin-sidebar.php";
    }
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="mb-0 text-gradient text-danger">Results Uploads Table</h5>
                            <p class="text-sm mb-0">
                                Here is the complete list of uploaded students result.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th
                                            class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                            Full Name</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Class</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Grand Total</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Average</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Position</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SESSION['staff']['position_id'] == 1) {
                                        $sql = "SELECT * FROM `uploads` ORDER BY `class_id` DESC, `position` ASC";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $student_id = $row['student_id'];
                                            $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
                                            $result_students = mysqli_query($conn, $sql);
                                            $students = mysqli_fetch_assoc($result_students);
                                            ?>
                                            <tr>
                                                <td class="text-sm text-left font-weight-normal">
                                                    <?php echo $students['first_name'] . ' ' . $students['second_name'] . ' ' . $students['last_name']; ?>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php
                                                    $class_id = $row['class_id'];
                                                    $sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
                                                    $result_classes = mysqli_query($conn, $sql);
                                                    $class = mysqli_fetch_assoc($result_classes);
                                                    echo $class['class_name'];
                                                    ?>
                                                </td>
                                                <?php
                                                $sql = "SELECT * FROM `uploads` WHERE `student_id` = '$student_id'";
                                                $uploads_result = mysqli_query($conn, $sql);
                                                $foreach_upload = mysqli_fetch_assoc($uploads_result);
                                                ?>
                                                <!-- Grand Total -->
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php echo $foreach_upload['grand_total']; ?></td>
                                                <!-- Average -->
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php echo $foreach_upload['average']; ?></td>
                                                <!-- Position -->
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php echo addOrdinalSuffix($foreach_upload['position']); ?></td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="admin-print-result.php?student_id=<?php echo $students['student_id']; ?>"
                                                        class="font-weight-bold">Print</a>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    if ($_SESSION['staff']['position_id'] == 2) {
                                        $class_id = $_SESSION['staff']
['class_id'];
                                        $sql = "SELECT * FROM `uploads` WHERE `class_id` = '$class_id' ORDER BY `position`";
                                        $uploads = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($uploads)) {
                                            $student_id = $row['student_id'];
                                            $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
                                            $result_students = mysqli_query($conn, $sql);
                                            $students = mysqli_fetch_assoc($result_students);
                                            $class_id = $students['class_id'];
                                            ?>
                                            <tr>
                                                <!-- Full Name -->
                                                <td class="text-sm text-left font-weight-normal">
                                                    <?php echo $students['first_name'] . ' ' . $students['second_name'] . ' ' . $students['last_name']; ?>
                                                </td>
                                                <!-- Class -->
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php
                                                    $sql = "SELECT * FROM `classes` WHERE class_id = '$class_id'";
                                                    $result_classes = mysqli_query($conn, $sql);
                                                    $class = mysqli_fetch_assoc($result_classes);
                                                    echo $class["class_name"];
                                                    ?>
                                                </td>
                                                <?php
                                                $sql = "SELECT * FROM `uploads` WHERE `student_id` = '$student_id'";
                                                $uploads_result = mysqli_query($conn, $sql);
                                                $foreach_upload = mysqli_fetch_assoc($uploads_result);
                                                ?>
                                                <!-- Grand Total -->
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php echo $foreach_upload['grand_total']; ?></td>
                                                <!-- Average -->
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php echo $foreach_upload['average']; ?></td>
                                                <!-- Position -->
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php echo addOrdinalSuffix($foreach_upload['position']); ?></td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="admin-print-result.php?student_id=<?php echo $students['student_id']; ?>"
                                                        class="text-decoration-underline">Print</a>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>
    <?php include "inc/admin-scripts.php"; ?>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
                searchable: true,
                fixedHeight: true,
                perPage: 25, // Default number of entries per page
                labels: {
                    placeholder: "Search...", // Placeholder text for search input
                    noRows: "No entries found", // Text shown when no rows found
                    info: "Showing {start} to {end} of {rows} entries" // Info text shown below the table
                }
            });
        });

    </script>

</body>

</html>