<?php
session_start();
include "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Timeline</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-gray-100">
    <?php include "inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3 bg-gray-100">
            <!-- Timeline Blog -->
            <div class="container pb-7">
                <div class="d-flex justify-content-center py-4">
                    <div class="col-6 text-center">
                        <h2>Blog Timeline</h2>
                        <p>As admin you can choose to modify or delete a blog.</p>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM `blogs`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col-lg-4 mb-lg-0 mb-4">
                                <div class="card mb-3">
                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                        <a href="javascript:;" class="d-block">
                                            <img src="<?php echo $row['blog_thumbnail'] ?>" class="img-fluid border-radius-lg">
                                        </a>
                                    </div>

                                    <div class="card-body pt-3">
                                        <span class="text-gradient text-warning text-uppercase text-xs font-weight-bold my-2"><?php echo $row['blog_category']; ?></span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">
                                            <?php echo $row['blog_title']; ?>
                                        </a>
                                        <p class="card-description mb-4">
                                            <?php echo $row['blog_content']; ?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="author align-items-center">
                                                <?php
                                                
                                                $staff_id = $row['staff_id'];
                                                $sql = "SELECT * FROM `staff` WHERE `staff_id` = '$staff_id'";
                                                $staff_result = mysqli_query($conn, $sql);
                                                $staff = mysqli_fetch_assoc($staff_result);
                                                ?>

                                                <img src="<?php echo $staff['photo']; ?>" class="avatar shadow">
                                                
                                                <div class="name ps-3">
                                                    <span><?php echo $staff['first_name'] . " " . $staff['last_name']; ?></span>
                                                    <div class="stats">
                                                        <small><?php echo date("j F, Y h:m", strtotime($row['blog_timestamp'])); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Icon -->
                                            <div class="text-end">
                                                    <i class="fa fa-trash text-secondary cursor-pointer" data-target="successToast"></i>
                                                </a>
                                            </div>
                                            <!-- Modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <p class="text-center text-secondary">No blogs found.</p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="position-fixed bottom-1 end-1 z-index-2">
            <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
                <div class="toast-header border-0">
                    <i class="ni ni-check-bold text-success me-2"></i>
                    <span class="me-auto font-weight-bold">Soft UI Dashboard</span>
                    <small class="text-body">11 mins ago</small>
                    <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                </div>
                <hr class="horizontal dark m-0">
                <div class="toast-body">
                    Hello, world! This is a notification message.
                </div>
            </div>
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
    }
    ?>

</body>

</html>