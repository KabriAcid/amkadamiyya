<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blogId = intval($_POST['blog_id']);
    $userId = 1; // Replace with the actual user ID if tracking logged-in users

    // Insert the like
    $sql = "INSERT INTO blog_likes (blog_id, user_id) VALUES ($blogId, $userId)";
    mysqli_query($conn, $sql);


    // Redirect back to the page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;

}
