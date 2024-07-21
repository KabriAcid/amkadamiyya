<?php

require_once "update.php";

if (isset($_SESSION['staff'])) {
    $staff_id = $_SESSION['staff']['staff_id'];
    $sql = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
    $staff_result = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_assoc($staff_result);

} else {
    header('Location: admin-logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Results</title>
    <?php include "inc/admin-header.php"; ?>
    <script>
        function setSubjectId(subjectId) {
            document.getElementById('subject_id_input').value = subjectId;
        }
    </script>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-gradient text-dark">Manage Results</h5>
                    <p class="text-sm">
                        Here you can manage and view the results. Click 'View' to see the complete details of each entry.
                    </p>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">#</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">Class</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT DISTINCT r.class_id, r.subject_id, c.class_name, s.subject_name 
                                        FROM `results` r
                                        JOIN `classes` c ON r.class_id = c.class_id
                                        JOIN `subjects` s ON r.subject_id = s.subject_id WHERE status = 0";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $count = 1;

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo $count; ?></span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="mb-0 text-secondary text-xs font-weight-bold text-capitalize text-left">
                                                    <?php echo htmlspecialchars($row['class_name']); ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                    <?php echo htmlspecialchars($row['subject_name']); ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center d-flex align-items-center justify-content-center">
                                                <div>
                                                    <form action="" method="post" class="me-2">
                                                        <input type="hidden" name="subject_id" value="<?php echo htmlspecialchars($row['subject_id']); ?>">
                                                        <button name="approveSubject" type="submit" class="badge badge-sm rounded bg-gradient-success text-white border-0">Approve</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <button class="badge badge-sm rounded bg-gradient-danger text-white border-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-notification" onclick="setSubjectId('<?php echo htmlspecialchars($row['subject_id']); ?>')">
                                                        Truncate
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                } else {
                                    ?>
                            </tbody>
                        <?php
                                }
                        ?>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="py-3 text-center">
                                            <div>
                                                <i class="fas fa-exclamation-triangle bg-danger-soft p-3 text-danger fa-3x" style="border-radius: 100%;"></i>
                                            </div>
                                            <h4 class="text-gradient text-danger mt-4">Delete Subject?</h4>
                                            <p class="text-center text-sm">Are you sure you want to delete subject? <br> This operation cannot be reverted.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-end d-flex align-items-center">
                                        <button type="button" class="btn bg-gradient-secondary btn-round" data-bs-dismiss="modal">No, Cancel</button>
                                        <form action="" method="post">
                                            <input type="hidden" name="subject_id" id="subject_id_input">
                                            <button type="submit" class="btn bg-gradient-danger btn-round" name="truncatesubject">truncate</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal -->
                    </div>
                </div>

            </div>
        </div>
        <?php include 'inc/admin-footer.php';  ?>
    </main>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
                searchable: true,
                fixedHeight: true,
                perPage: 10, // Default number of entries per page
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