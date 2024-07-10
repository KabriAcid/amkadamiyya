<?php
session_start();
include "../../config/database.php";

if (!isset($_SESSION['staff'])) {
    header("Location: admin-login.php");
}
$class_id = $_SESSION['staff']['class_id'];
$sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
$result = mysqli_query($conn, $sql);
$class = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "inc/admin-header.php"; ?>
    <title>Dashboard</title>
    <script src="../../js/plugins/sweetalert.min.js"></script>
</head>

<body class="g-sidenav-show bg-info-soft">
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
    <?php
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "inc/admin-sidebar.php";
    }
    ?>
    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php";
        if ($_SESSION['staff']['position_id'] == 1) {
            include 'access-level-1.php';
        } else {
            include 'access-level-2.php';
        }
        include "inc/admin-footer.php";
        ?>
    </main>


    <script src="../../js/plugins/datatables.js"></script>
    <script src="../../js/plugins/chartjs.min.js"></script>
    <script src="inc/chart.js"></script>
    <?php include "inc/admin-scripts.php"; ?>
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
        document.addEventListener("DOMContentLoaded", function() {
            const dataTableBasic = new simpleDatatables.DataTable("#datatable-search", {
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