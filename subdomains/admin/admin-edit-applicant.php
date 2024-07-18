<?php
include "update.php";

// Check if applicant ID is set
if (isset($_GET['applicant_id'])) {
    $applicant_id = $_GET['applicant_id'];

    // Prepare SQL query with parameterized query
    $sql = "SELECT * FROM `applicants` WHERE `applicant_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $applicant_id);
    $stmt->execute();
    $applicant = $stmt->get_result()->fetch_assoc();
} else {
    header('Location: admin-new-applicant.php');
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
    <title>Edit Applicant Data</title>
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
                                <h6 class="mb-0 text-gradient text-primary">Applicant Information</h6>
                                <p class="text-sm mb-0">Here you can modify or edit applicant biodata.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="first_name" placeholder="First Name" value="<?php echo ucfirst($applicant['first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Second Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="second_name" placeholder="Second Name" value="<?php echo ucfirst($applicant['second_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo ucfirst($applicant['last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Date of Birth</label>
                                        <div class="input-group mb-3">
                                            <input type="date" value="<?php echo $applicant['birth_date']; ?>" class="form-control text-uppercase cursor-pointer" placeholder="DOB" name="birth_date">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="gender">
                                                <option value="Male" <?php if ($applicant['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($applicant['gender'] == 'Female') echo 'selected'; ?>>Female</option>
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
                                                    <option value="<?php echo $state['state_name']; ?>" <?php if ($applicant['state'] == $state['state_name']) echo 'selected'; ?>><?php echo $state['state_name'] ?></option>
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
                                                <option value="<?php echo $applicant['lga']; ?>"><?php echo $applicant['lga']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Class</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="enrolling_class">
                                                <?php
                                                $sql = "SELECT * FROM `classes` WHERE `class_name` != 'null';";
                                                $classes = mysqli_query($conn, $sql);

                                                while ($class = mysqli_fetch_assoc($classes)) {
                                                ?>
                                                    <option value="<?php echo $class['class_id']; ?>" <?php if ($applicant['enrolling_class'] == $class['class_id']) echo 'selected'; ?>><?php echo $class['class_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="applicant_id" value="<?php echo $applicant['applicant_id']; ?>">
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="Change" name="updateApplicantBioData" class="btn bg-gradient-primary mb-0">
                            </div>
                        </div>
                    </form>

                    <!--  -->
                    <form action="" method="post" class="mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-primary">Parent Information</h6>
                                <p class="text-sm mb-0">Modify or edit a applicant's parent information.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Parent First Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_first_name" placeholder="Parent First Name" value="<?php echo ucfirst($applicant['parent_first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Last Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_last_name" placeholder="Parent Last Name" value="<?php echo ucfirst($applicant['parent_last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Parent Email Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_email" placeholder="Parent Email Address" value="<?php echo ucfirst($applicant['parent_email']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Phone Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_phone_number" placeholder="Parent Phone Number" value="<?php echo ucfirst($applicant['parent_phone_number']); ?>" class="form-control" maxlength="11">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Home Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_address" placeholder="Parent Address" value="<?php echo ucfirst($applicant['parent_address']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="applicant_id" value="<?php echo $applicant['applicant_id']; ?>">
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="Change" name="updateApplicantParentData" class="btn bg-gradient-primary mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 col-xl-5 mt-3 mt-xl-0">
                    <!-- Delete Account -->
                    <div class="card mt-3" id="delete">
                        <div class="card-header">
                            <h6 class="text-danger">Delete Applicant</h6>
                            <p class="text-sm mb-0">
                                Once you erase applicant, all associated data will be removed from the database and will never be restored.
                            </p>
                        </div>
                        <div class="card-body justify-content-between d-flex pt-0">
                            <form action="" method="post">
                                <input type="hidden" name="applicant_id" value="<?php echo $applicant['applicant_id']; ?>">
                                <button class="btn bg-gradient-danger text-xs btn-sm mb-0 ms-2" type="button" name="declineBtn" data-bs-toggle="modal" data-bs-target="#modal-notification">
                                    Delete Account
                                </button>
                            </form>
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
                                                <p class="text-center text-sm">Are you sure you want to delete applicant? <br> This operation cannot be reverted.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-end d-flex align-items-center">
                                            <button type="button" class="btn bg-gradient-secondary btn-round" data-bs-dismiss="modal">No, Cancel</button>
                                            <form action="" method="post">
                                                <button type="submit" class="btn bg-gradient-danger ms-2 btn-round" data-bs-dismiss="modal">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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