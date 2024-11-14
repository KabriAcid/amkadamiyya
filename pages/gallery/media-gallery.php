<?php
session_start();
require '../../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../includes/header.php"; ?>
    <title>Media Gallery</title>
</head>

<body class="bg-info-soft" style="font-family: 'Open Sans'">
    <header>
        <!-- Navigation Bar -->
        <?php include "../../includes/navbar.php"; ?>
    </header>
    <main>
        <section>
            <div class="container pt-5">
                <div class="row">
                    <?php
                    $sql = 'SELECT * FROM blogs LIMIT 3';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Get blog ID
                            $blogId = $row['blog_id'];

                            // Count likes for this blog post
                            $likesResult = mysqli_query($conn, "SELECT COUNT(*) AS like_count FROM blog_likes WHERE blog_id = $blogId");
                            $likesCount = mysqli_fetch_assoc($likesResult)['like_count'];

                            // Count comments for this blog post
                            $commentsResult = mysqli_query($conn, "SELECT COUNT(*) AS comment_count FROM blog_comments WHERE blog_id = $blogId");
                            $commentsCount = mysqli_fetch_assoc($commentsResult)['comment_count'];

                    ?>
                            <div class="col-lg-8 mx-auto text-center">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative">
                                        <a class="d-block blur-shadow-image">
                                            <img src="subdomains/admin/<?= $row['blog_thumbnail'] ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                        </a>
                                    </div>
                                    <div class="card-body px-0 pt-4">
                                        <p class="text-gradient text-info font-weight-bold text-sm text-uppercase">
                                            <?= $row['blog_category']; ?>
                                        </p>
                                        <a href="javascript:;">
                                            <h4>
                                                <?= $row['blog_title']; ?>
                                            </h4>
                                        </a>
                                        <p>
                                            <?= $row['blog_content']; ?>...
                                        </p>
                                        <a href="pages/gallery/media-gallery.php" class="btn bg-gradient-info mt-3">Read more</a>

                                        <!-- Like and Comment Section -->
                                        <div class="mt-3">
                                            <form action="like.php" method="POST">
                                                <input type="hidden" name="blog_id" value="<?= $blogId ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">👍 Like (<?= $likesCount ?>)</button>
                                            </form>
                                            <span class="ml-2"><?= $commentsCount ?> Comments</span>
                                        </div>

                                        <!-- Comment Form -->
                                        <form action="comment.php" method="POST" class="mt-3">
                                            <input type="hidden" name="blog_id" value="<?= $blogId ?>">
                                            <input type="text" name="user_name" placeholder="Your name" required class="form-control mb-2">
                                            <textarea name="comment_text" placeholder="Add a comment" required class="form-control mb-2"></textarea>
                                            <button type="submit" class="btn btn-sm btn-outline-success">Post Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </section>
    </main>
    <!-- Footer  -->
    <?php include "../../includes/scripts.php" ?>
</body>

</html>