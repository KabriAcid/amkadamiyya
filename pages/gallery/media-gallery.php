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
                    ?>
                            <div class="col-lg-10 mx-auto text-center">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative">
                                        <a class="d-block blur-shadow-image">
                                            <img src="../../subdomains/admin/<?= $row['blog_thumbnail'] ?>" ; alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                        </a>
                                    </div>
                                    <div class="card-body px-0 pt-4">
                                        <p class="text-gradient text-info font-weight-bold text-sm text-uppercase">
                                            <?= $row['blog_category']; ?></p>
                                        <a href="javascript:;">
                                            <h4>
                                                <?= $row['blog_title']; ?>
                                            </h4>
                                        </a>
                                        <p>
                                            <?= $row['blog_content']; ?>
                                        </p>
                                        <!-- <a href="pages/gallery/media-gallery.php" class="btn bg-gradient-info mt-3">Read more</a> -->
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "0 results";
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