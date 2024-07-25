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
    // Hindering staff from editing part of their profile
    $disabled = ''; // Default to no disabled attribute

    if (!in_array($position_id, [1, 2, 3, 5])) {
        redirect('admin-logout.php');
    }
} else {
    redirect('admin-logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alumni List</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
        include "inc/admin-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <?php include "inc/alumni-table.php"; ?>
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