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
    <title>General Alerts</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
        include "inc/admin-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <!-- Main content  -->
        <div class="container-fluid py-4">
            
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

</body>

</html>