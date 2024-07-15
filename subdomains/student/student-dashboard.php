<?php
session_start();
include "../../config/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <?php include "inc/student-header.php"; ?>
</head>

<body class="g-sidenav-show bg-warning-soft">
    <?php
    include "inc/student-sidebar.php";
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/student-navbar.php"; ?>
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
          
        </div>
        <?php include "inc/student-footer.php"; ?>
    </main>

    <?php include "inc/student-scripts.php"; ?>
</body>

</html>