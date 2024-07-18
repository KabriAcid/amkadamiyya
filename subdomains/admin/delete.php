<?php
/**
 * Handles deletion of subjects and notifications.
 *
 * This script is responsible for deleting subjects and notifications from the database.
 * It uses the `$_GET` superglobal to retrieve the IDs of the subjects and notifications to be deleted.
 *
 * @author [Your Name]
 * @since [Version]
 */

session_start();
include '../../config/database.php';

/**
 * Deletes a subject from the database.
 *
 * @param int $subject_id The ID of the subject to be deleted.
 * @return void
 */
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

/**
 * Deletes all notifications from the database.
 *
 * @return void
 */
if (isset($_GET['delete_notification'])) {
    $staff_id = $_GET['delete_notification'];
    $sql = "DELETE FROM `admin_notification`";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Notifications Deleted Successfully";
    }
}

/**
 * Example usage:
 *
 * To delete a subject with ID 1:
 * `http://example.com/delete.php?delete_subject=1`
 *
 * To delete all notifications:
 * `http://example.com/delete.php?delete_notification=1`
 */
if (isset($_GET['delete_notification'])) {
    $staff_id = $_GET['delete_notification'];
    $sql = "DELETE FROM `admin_notification`";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Notifications Deleted Successfully";
    }
}