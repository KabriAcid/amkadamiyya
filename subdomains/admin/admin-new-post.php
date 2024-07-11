<?php
    include "admin-process.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New Blog</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "inc/admin-sidebar.php"; ?>
    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <section class="pt-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 mx-auto text-center">
                            <div class="ms-3">
                                <h3 class="text-dark font-weight-bold">Publish Blog Post</h3>
                                <p class="mb-0">Here you can publish post content to the website homepage</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 mx-auto my-3">
                            <div class="card">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Blog Title</label>
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Blog Title" type="text" name="blog_title" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ps-md-2">
                                                <label>Blog Subtitle</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Blog Subtitle" required name="blog_subtitle">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <label>Blog Thumbnail</label>
                                                <input type="file" name="blog_thumbnail" class="form-control">
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label>Blog Content</label>
                                                <textarea name="blog_content" class="form-control" rows="6" placeholder="Blog content should be more than 50 characters."></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 text-end">
                                                <input type="submit" name="uploadBlog" class="btn bg-gradient-success mb-0" value="upload">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'inc/admin-footer.php'; ?>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <?php
    if (isset($_SESSION['error_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Error",
                    text: "<?php echo $_SESSION['error_message']; ?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'error'
                })
            })
        </script>
    <?php
        unset($_SESSION['error_message']);
    }
    ?>

</body>

</html>