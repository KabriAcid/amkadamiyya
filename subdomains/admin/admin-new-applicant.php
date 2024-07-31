<?php
session_start();
require_once "../../config/database.php";

// Redirect function for convenience
function redirect($url)
{
    header("Location: $url");
    exit();
}
// Check if staff position ID is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];
    $sql = "SELECT position_number FROM school_position WHERE position_id = '$position_id'";
    $postions = mysqli_query($conn, $sql);
    $position = mysqli_fetch_assoc($postions);
    $position_number = $position['position_number'];

    if (!in_array($position_number, [1, 2, 3, 5])) {
        redirect('admin-logout.php');
    }
} else {
    redirect('admin-logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Applicants</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-gradient text-primary">New Applicants</h5>
                    <p class="text-sm">
                        Here's a list of pending applications. Click 'View' to see the complete details.
                    </p>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">#</th>
                                    <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">Name</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Application Code</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Enrolling Class</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Birth Date</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Timestamp</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `applicants` WHERE `admission_status` = 0 ORDER BY `timestamp` DESC";
                                $applicants = mysqli_query($conn, $sql);
                                $count = 1;

                                if (mysqli_num_rows($applicants) > 0) {
                                    while ($applicant = mysqli_fetch_assoc($applicants)) {
                                ?>
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo $count; ?></span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <span class="mb-0 text-secondary text-xs font-weight-bold text-capitalize text-left"><?php echo $applicant['first_name'] . " " . $applicant['second_name'] . " " . $applicant['last_name']  ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-secondary text-xs text-center font-weight-bold mb-0"><?php echo $applicant['application_code']; ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                    <?php
                                                    $class_id = $applicant['enrolling_class'];
                                                    $sql = "SELECT `class_name` FROM `general_class` WHERE `class_id` = '$class_id'";
                                                    $clasess = mysqli_query($conn, $sql);
                                                    $class = mysqli_fetch_assoc($clasess);
                                                    echo $class['class_name'];
                                                    ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo $applicant['gender']; ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo date("j F, Y", strtotime($applicant['birth_date'])); ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo date("j F, Y H:m", strtotime($applicant['timestamp'])); ?></span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <form action="admin-view-applicant.php" method="get">
                                                    <input type="hidden" name="applicant_id" value="<?php echo $applicant['applicant_id']; ?>">
                                                    <button type="submit" class="badge badge-sm rounded bg-gradient-light text-dark border-0">View</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                } else {
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="align-middle text-center py-5" colspan="8">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo "No new applicants found."; ?></span>
                                    </td>
                                </tr>
                            </tfoot>
                        <?php
                                }
                        ?>
                        </table>
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