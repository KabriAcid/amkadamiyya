<?php
include "_UPDATE.php";

// Redirect function for convenience
function redirect($url) {
    header("Location: $url");
    exit();
}

// Check if alumni ID is set and valid
if (isset($_GET['alumni_id'])) {
    $alumni_id = $_GET['alumni_id'];

    // Prepare SQL query with parameterized query
    $sql = "SELECT * FROM `alumni` WHERE `alumni_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $alumni_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if alumni exists
    if ($result->num_rows > 0) {
        $alumni = $result->fetch_assoc();
    } else {
        // Redirect if alumni does not exist
        redirect('admin-alumni-list.php');
    }
} else {
    // Redirect if alumni_id is not set
    redirect('admin-alumni-list.php');
}

// Check if staff session is set
if (!isset($_SESSION['staff'])) {
    redirect('admin-logout.php');
}

// Check if staff position ID is set in session
$position_id = $_SESSION['staff']['position_id'];
if (!in_array($position_id, [1, 2, 3, 5])) {
    redirect('admin-logout.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Alumni Profile</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    include "inc/admin-sidebar.php";
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-12 col-xl-7">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-primary">Alumni Information</h6>
                                <p class="text-sm mb-0">Here you can modify or edit alumni biodata.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="first_name" placeholder="First Name" value="<?php echo ucfirst($alumni['first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Second Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="second_name" placeholder="Second Name" value="<?php echo ucfirst($alumni['second_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo ucfirst($alumni['last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Date of Birth</label>
                                        <div class="input-group mb-3">
                                            <input type="date" value="<?php echo $alumni['birth_date']; ?>" class="form-control text-uppercase cursor-pointer" placeholder="DOB" name="birth_date">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="gender">
                                                <option value="Male" <?php if ($alumni['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($alumni['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- State of Origin  -->
                                    <div class="col-md-6">
                                        <label>State of Origin</label>
                                        <div class="input-group mb-3">
                                            <select onchange="toggleLGA(this);" name="state" id="state" class="form-select select-state">
                                                <option value="" selected="selected">-- State --</option>
                                                <?php
                                                $sql = "SELECT * FROM `nigerian_states`;";
                                                $states = mysqli_query($conn, $sql);

                                                while ($state = mysqli_fetch_assoc($states)) {
                                                ?>
                                                    <option value="<?php echo $state['state_name']; ?>" <?php if ($alumni['state'] == $state['state_name']) echo 'selected'; ?>><?php echo $state['state_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Local Government Area  -->
                                    <div class="col-md-6">
                                        <label>Local government Area</label>
                                        <div class="input-group mb-3">
                                            <select name="lga" id="lga" class="form-select select-lga">
                                                <option value="<?php echo $alumni['lga']; ?>"><?php echo $alumni['lga']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="alumni_id" value="<?php echo $alumni['alumni_id']; ?>">
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateAlumniBioData" class="btn bg-gradient-primary mb-0">
                            </div>
                        </div>
                    </form>

                    <div class="my-3"></div>
                    <!--  -->
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-primary">Other Information</h6>
                                <p class="text-sm mb-0">Edit alumni other information.</p>
                            </div>
                            <hr class="horizontal dark">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--  -->
                                        <label>Index No</label>
                                        <div class="input-group mb-3">
                                            <input type="number" value="<?php echo $alumni['index_no']; ?>" class="form-control" name="index_no">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Position Held</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="<?php echo $alumni['position_held']; ?>" class="form-control" placeholder="e.g Head Boy" name="position_held">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>NIN Number</label>
                                        <div class="input-group mb-3">
                                            <input type="number" value="<?php echo $alumni['nin_number']; ?>" class="form-control" name="nin_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Graduation Year</label>
                                        <div class="input-group mb-3">
                                            <input type="number" value="<?php echo $alumni['graduation_year']; ?>" class="form-control" name="graduation_year">
                                        </div>
                                    </div>
                                </div>
                                <!-- Hidden Input Field -->
                                <input type="hidden" name="alumni_id" value="<?php echo $alumni_id; ?>">
                                <!--  -->
                            </div>
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateAlumniAccount" class="btn bg-gradient-primary mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 col-xl-5 mt-3 mt-xl-0">

                    <!-- Change Passowrd -->
                    <form action="" method="post" class="mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-primary">Change Password</h6>
                                <p class="text-sm mb-0">Change alumni account password.</p>
                            </div>
                            <hr class="horizontal dark my-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Change Password</label>
                                    <div class="input-group">
                                        <input type="password" name="newPassword" placeholder="Enter New Password" class="form-control">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="confirmNewPassword" placeholder="Confirm New Password" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateAlumniPassword" class="btn bg-gradient-primary mb-0">
                            </div>
                            <!-- Hidden Input Field -->
                            <input type="hidden" name="alumni_id" value="<?php echo $alumni_id; ?>">
                            <!--  -->
                        </div>
                    </form>

                    <!-- Delete Account -->
                    <div class="card mt-3" id="delete">
                        <div class="card-header">
                            <h6 class="text-danger">Delete Alumni</h6>
                            <p class="text-sm mb-0">
                                Once you erase alumni, all associated data will be removed from the database and will never be restored.
                            </p>
                        </div>
                        <div class="card-body justify-content-end d-flex pt-0">
                            <button class="btn bg-gradient-danger text-xs btn-sm mb-0 ms-2" type="button" data-bs-toggle="modal" data-bs-target="#modal-notification">
                                Delete Account
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="py-3 text-center">
                                            <div>
                                                <i class="fas fa-exclamation-triangle bg-danger-soft p-3 text-danger fa-3x" style="border-radius: 100%;"></i>
                                            </div>
                                            <h4 class="text-gradient text-danger mt-4">Delete Account?</h4>
                                            <p class="text-center text-sm">Are you sure you want to delete alumni? <br> This operation cannot be reverted.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-end d-flex align-items-center">
                                        <button type="button" class="btn bg-gradient-secondary btn-round" data-bs-dismiss="modal">No, Cancel</button>
                                        <form action="" method="post">
                                            <input type="hidden" name="alumni_id" value="<?php echo $alumni['alumni_id']; ?>">
                                            <button type="submit" name="eraseAlumniData" class="btn bg-gradient-danger ms-2 btn-round" data-bs-dismiss="modal">Yes, Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal -->
                    </div>
                </div>
            </div>

        </div>
        <?php include "inc/admin-footer.php"; ?>
    </main>

    <script src="../../js/plugins/state-capital.js"></script>
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