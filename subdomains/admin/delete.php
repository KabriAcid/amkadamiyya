<?php
session_start();
include '../../config/database.php';


# Delete Subject
if (isset($_GET['delete_subject'])) {
    $subject_id = $_GET['delete_subject'];
    $staff_id = $_SESSION['staff']['staff_id'];

    $sql = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $subject_name = $row['subject_name'];

    $sql = "DELETE FROM `subjects` WHERE `subject_id` = '$subject_id' ";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Subject Deleted Successfully";
    }
}

# Delete Notification 
if (isset($_GET['delete_notification'])) {
    $staff_id = $_GET['delete_notification'];
    $sql = "DELETE FROM `admin_notification`";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Notifications Deleted Successfully";
    }
}