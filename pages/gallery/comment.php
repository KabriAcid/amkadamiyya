<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blogId = intval($_POST['blog_id']);
    $userName = mysqli_real_escape_string($conn, $_POST['user_name']);
    $commentText = mysqli_real_escape_string($conn, $_POST['comment_text']);

    // Insert the comment
    $sql = "INSERT INTO blog_comments (blog_id, user_name, comment_text) VALUES ($blogId, '$userName', '$commentText')";
    mysqli_query($conn, $sql);

    // Redirect back to the page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;

}
