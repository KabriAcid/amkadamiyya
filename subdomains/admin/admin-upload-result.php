<?php
session_start();
include "../../config/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Select Subject</title>
    <?php include "inc/header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft" style="font-family: 'Open Sans'">
    <?php
    if ($_SESSION['staff']['access_level'] == 1) {
        include "inc/sidebar-admin.php";
    } else {
        include "inc/sidebar-staff.php";
    }
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <!-- Main content  -->
        <div class="container-fluid py-3">
            <div class="container-fluid px-0">
                <div class="card">
                    <div class="card-body">
                        <form action="upload-subject.php" method="get">
                            <select name="subject_id" class="form-select" required>
                                <?php
                                $sql = "SELECT * FROM `section_subjects` WHERE `section_id` = '$section_id'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    echo "<option value='' class='text-center'>-- Choose Subject --</option>";

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject_id = $row['subject_id'];
                                        $sql = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id'";
                                        $subject_result = mysqli_query($conn, $sql);
                                        $subject = mysqli_fetch_assoc($subject_result);
                                ?>
                                        <option value="<?php echo $subject['subject_id']; ?>">
                                            <?php echo $subject['subject_name']; ?>
                                        </option>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <option value="" class="text-center">-- No Subjects Found --</option>
                                <?php
                                }
                                ?>
                            </select>

                            <div class="form-group mb-0 mt-3 text-center">
                                <input type="submit" name="chooseSubject" class="mb-0 btn bg-gradient-success">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Upload Table -->
                <div class="container-fluid py-3 px-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-flush" id="datatable-basic">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $class_id = $_SESSION['staff']['class_id'];
                                            $sql = "SELECT DISTINCT `class_id`, `subject_id` FROM `results` WHERE `class_id` = '$class_id' ORDER BY `subject_id`";
                                            $result = mysqli_query($conn, $sql);
                                            $count = 1;

                                            // Looping through the results table
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr>
                                                    <td class="ps-4 text-sm text-left font-weight-normal"><?php echo $count; ?></td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        <?php
                                                        $subject_id = $row['subject_id'];
                                                        $sql = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id'";
                                                        $subject_result = mysqli_query($conn, $sql);
                                                        $subject = mysqli_fetch_assoc($subject_result);
                                                        echo $subject['subject_name'];

                                                        ?>
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal text-success">&check;</td>
                                                </tr>
                                            <?php
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
    <script src="../../js/plugins/datatables.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

    <?php include "inc/scripts.php"; ?>

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
    if (isset($_SESSION['error_message'])) {
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