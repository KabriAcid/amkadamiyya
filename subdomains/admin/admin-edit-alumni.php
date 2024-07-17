<?php
include "update.php";

// Check if alumni ID is set
if (isset($_GET['alumni_id'])) {
    $alumni_id = $_GET['alumni_id'];

    // Prepare SQL query with parameterized query
    $sql = "SELECT * FROM `alumni` WHERE `alumni_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $alumni_id);
    $stmt->execute();
    $alumni = $stmt->get_result()->fetch_assoc();
} else {
    header('Location: admin-alumni-list.php');
    exit();
}

// Check if staff position ID is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];
} else {
    header('Location: admin-logout.php');
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
                                <h6 class="mb-0 text-gradient text-primary">Parent Information</h6>
                                <p class="text-sm mb-0">Modify or edit a alumni's parent information.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Parent First Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_first_name" placeholder="Parent First Name" value="<?php echo ucfirst($alumni['parent_first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Last Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_last_name" placeholder="Parent Last Name" value="<?php echo ucfirst($alumni['parent_last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Parent Email Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_email" placeholder="Parent Email Address" value="<?php echo ucfirst($alumni['parent_email']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Phone Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_phone_number" placeholder="Parent Phone Number" value="<?php echo ucfirst($alumni['parent_phone_number']); ?>" class="form-control" maxlength="11">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Home Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_address" placeholder="Parent Address" value="<?php echo ucfirst($alumni['parent_address']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label>Status</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="status">
                                                <option value="1" <?php if ($alumni['status'] == 1) echo 'selected'; ?>>Active</option>
                                                <option value="0" <?php if ($alumni['status'] == 0) echo 'selected'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="alumni_id" value="<?php echo $alumni['alumni_id']; ?>">
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateParentData" class="btn bg-gradient-primary mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 col-xl-5 mt-3 mt-xl-0">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0 text-gradient text-primary">Account Information</h6>
                            <p class="text-sm mb-0">Edit alumni&apos;s account information.</p>
                        </div>
                        <hr class="horizontal dark">

                        <div class="card-body">
                            <form action="" method="post">
                                <!--  -->
                                <label>Admission ID</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo $alumni['admission_id']; ?>" class="form-control" name="admission_id">
                                </div>

                                <!-- Hidden Input Field -->
                                <input type="hidden" name="alumni_id" value="<?php echo $alumni_id; ?>">

                                <!--  -->
                                <div class="text-end">
                                    <input type="submit" value="update" name="updateAlumniAdmission" class="btn bg-gradient-primary mb-0">
                                </div>
                            </form>
                        </div>
                    </div>

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
                        <div class="card-body justify-content-between d-flex pt-0">
                            <div class="d-flex align-items-center mb-sm-0 mb-4">
                                <div>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0" />
                                    </div>
                                </div>
                                <div class="ms-2">
                                    <span class="text-dark font-weight-bold d-block text-sm">Confirm</span>
                                    <span class="text-xs d-block">I want to erase alumni account data.</span>
                                </div>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" name="alumni_id" value="<?php echo $alumni['alumni_id']; ?>">
                                <button class="btn bg-gradient-danger btn-sm mb-0 ms-2" type="submit" name="eraseAlumniData">
                                    Delete Account
                                </button>
                            </form>
                        </div>
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