<?php
    // Database connection
    $servername = "localhost";
    $db_username = "if0_37962732";
    $db_password = "3y0optI2XLJNV ";
    // NBsYgkED,K/u=4%
    $dbname = "mystish";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
