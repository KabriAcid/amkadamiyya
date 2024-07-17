<?php
session_start();
require_once "../../config/database.php";

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
    <title>My Result</title>
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
           
        </div>
        <?php include "inc/student-footer.php"; ?>
    </main>

    <?php include "inc/student-scripts.php"; ?>
</body>

</html>