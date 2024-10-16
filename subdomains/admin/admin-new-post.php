<?php
    require_once "_CREATE.php";
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
                <div class="container-fluid">
                    <div class="row my-3">
                        <div class="col-12">
                            <div class="ms-3">
                                <h3 class="text-dark font-weight-bold text-gradient">Publish Blog Post</h3>
                                <p>This blog section is a platform for school administrators to share informative content. Please be mindful of typographical and grammatical errors in our posts.

                                <p>Posts must adhere to our standards of relevance and coherence. Content that does not meet these guidelines may be declined or removed.</p>
                                Thank you for your attention to these guidelines.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 my-4">
                            <div class="card">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Blog Title</label>
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="End of First Term" type="text" name="blog_title" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ps-md-2">
                                                <label>Blog Category</label>
                                                <div class="input-group">
                                                    <select id="blog_category" name="blog_category" class="form-control">
                                                        <option value="academic">Academic</option>
                                                        <option value="sports">Notice</option>
                                                        <option value="events">Events</option>
                                                        <option value="news">News</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mt-3">
                                                    <label>Blog Thumbnail</label>
                                                    <input type="file" name="blog_thumbnail" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Blog Content</label>
                                                    <?php $dummy_text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum tempora eum soluta optio accusamus aliquid totam ipsam consequuntur cumque fugit numquam assumenda quos, asperiores labore facilis expedita vitae sed corrupti!"; ?>
                                                    <textarea name="blog_content" class="form-control" rows="6" placeholder="Blog content should be less than 50 characters."><?php echo $dummy_text; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hidden Input Field -->
                                        <input type="hidden" name="staff_id" value="<?php echo $_SESSION['staff']['staff_id'] ?>">

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
    if (isset($_SESSION['success_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Successful",
                    text: "<?php echo $_SESSION['success_message']; ?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'success'
                })
            })
        </script>
    <?php
        unset($_SESSION['success_message']);
    } else if (isset($_SESSION['error_message'])) {
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