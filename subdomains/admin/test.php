<?php
session_start();
include "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Testing Environment</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "";
    }
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <!-- Main content  -->
        <div class="container-fluid py-4">
            <h1>
                <?php

               $database = array(
                    'tables' => array (
                        'users' => array(
                            'user_id' => 100,
                            'name' => 'Kabri',
                            'age' => 23,
                            'dob' => date('d-M-Y'),
                            'status' => true,
                        ),
                        'payments' => array(
                            'payment_id' => 100,
                            'amount' => 530.54,
                            'user_id' => 1,
                        ),
                        'orders' => array(
                            'order_id' => 1,
                            'quantity' => 5,
                            'address' => '123 Main Street'
                        )
                    )
               );

               $count = 0;
               while($database){
                   print_r($database[0][0]) . "<br>";
                } $count++;
                
                
                ?>
            </h1>
        </div>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

</body>

</html>