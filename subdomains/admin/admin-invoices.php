<?php
    session_start();
    include "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoices</title>
    <?php include "./inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "./inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "./inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">

        </div>

    <?php include './inc/admin-footer.php';  ?>
</main>

    <script src="../../js/core/popper.min.js"></script>
    <script src="../../js/core/bootstrap.min.js"></script>
    <script src="../../js/plugins/chartjs.min.js"></script>
    <script src="../../js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>

    <script src="../../js/plugins/dragula/dragula.min.js"></script>
    <script src="../../js/plugins/jkanban/jkanban.js"></script>

    <script src="../../js/soft-ui-dashboard.min3f71.js"></script>

</body>

</html>