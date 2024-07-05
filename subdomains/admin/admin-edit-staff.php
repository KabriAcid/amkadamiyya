<?php
include "admin-process.php";

if (isset($_GET['staff_id'])) {
    $staff_id = $_GET['staff_id'];
    $sql = "SELECT * FROM `staff` WHERE `staff_id` = '$staff_id'";
    $result = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_assoc($result);
} else {
    // Redirect if no valid staff ID is provided
    header('Location: admin-staff-list.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Staff Profile</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "";
    }
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="row mb-4">
                <div class="col-md-6">
                    <!-- Profile Information -->
                    <form action="" method="post">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="text-gradient text-warning">Personal Information</h6>
                                <p class="mb-0">Modify or change personal information.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label>First Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="first_name" placeholder="First Name" value="<?php echo ucfirst($staff['first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Last Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo ucfirst($staff['last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="null-label">User Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="second" placeholder="username" value="<?php echo ucfirst($staff['username']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label for="subject_id" class="form-label">Subject Master</label>
                                        <div class="input-group mb-4">
                                            <select name="subject_name" class="form-control">
                                                <option value="">--Choose Subject--</option>
                                                <?php
                                                $subject = $staff['subject_id'];
                                                $sql = "SELECT * FROM `subjects`";
                                                $result = mysqli_query($conn, $sql);
                                                while ($subject = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $subject['subject_id']; ?>">
                                                        <?php echo $subject['subject_name']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Current Class</label>
                                        <div class="input-group">
                                            <select class="form-select" name="currentClass">
                                                <option value="">-- Choose Class --</option>
                                                <?php
                                                $sql = "SELECT * FROM `classes` ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($class = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $class['class_id']; ?>">
                                                        <?php echo $class['class_name']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>

                            <!--  -->
                            <div class="card-footer text-end">
                                <input type="submit" value="update" name="updateStaff" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-gradient text-dark">Update Profile Picture</h6>
                            <p class="text-sm mb-0">Choose a photo from your gallery and click the update button.</p>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <!-- Hidden Input -->
                                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                <!-- Image and Button -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="<?php echo $staff['photo']; ?>" class="avatar avatar-xl shadow-lg blur cursor-pointer" data-bs-toggle="modal" data-bs-target="#imageModal">
                                    <span class="btn-file">
                                        <button type="button" class="fileupload-new btn bg-info-soft btn-sm position-relative">
                                            Change Photo
                                            <input type="file" required name="photo" id="user-photo" class="opacity-0 position-absolute cursor-pointer" style="right: 0px;top: 5px;">
                                        </button>
                                    </span>
                                </div>
                                <?php
                                if (isset($_GET['staff_id'])) {
                                ?>
                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn bg-gradient-success" name="updatePicture">Update</button>
                                    </div>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <img src="<?php echo $staff['photo']; ?>" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Column 2  -->
                    <?php
                    if ($_SESSION['staff']['position_id'] == 1) {
                    ?>
                        <!-- Reset Password -->
                        <div class="card mt-3">
                            <div class="card-body">
                                <h6 class="text-gradient text-dark">Reset Password</h6>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="staff_id" value="<?php echo $staff['staff_id']; ?>">
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn bg-gradient-warning" name="resetPassword">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Delete Account -->
                        <div class="card mt-3">
                            <div class="card-body">
                                <h6 class="text-gradient text-dark">Delete Staff</h6>
                                <p class="mb-0 text-danger">Once you delete a staff, all associated data will be removed from the database.</p>
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="?delete_staff=<?php echo $staff['staff_id']; ?>" class="btn bg-gradient-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        <!-- EOF card -->
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php include "inc/admin-footer.php"; ?>
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