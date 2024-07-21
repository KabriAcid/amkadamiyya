<?php

include "update.php";

// Check if student ID is set
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Prepare SQL query with parameterized query
    $sql = "SELECT * FROM `students` WHERE `student_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $student = $stmt->get_result()->fetch_assoc();
}

// Check if staff position ID is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];


    // Hindering staff from editing part of their profile
    $disabled = ''; // Default to no disabled attribute

    if (!in_array($position_id, [1, 2, 3, 5])) {
        $disabled = 'disabled';
    }
} else {
    header('Location: admin-logout.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Student Profile</title>
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
                                <h6 class="mb-0 text-gradient text-info">Student Information</h6>
                                <p class="text-sm mb-0">Here you can modify or edit student biodata.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="first_name" placeholder="First Name" value="<?php echo ucfirst($student['first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Second Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="second_name" placeholder="Second Name" value="<?php echo ucfirst($student['second_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo ucfirst($student['last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Date of Birth</label>
                                        <div class="input-group mb-3">
                                            <input type="date" value="<?php echo $student['birth_date']; ?>" class="form-control text-uppercase cursor-pointer" placeholder="DOB" name="birth_date" <?php echo $disabled; ?>>
                                            <?php if ($disabled) : ?>
                                                <input type="hidden" name="birth_date" value="<?php echo $student['birth_date']; ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="gender" <?php echo $disabled; ?>>
                                                <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                            </select>
                                            <?php if ($disabled) : ?>
                                                <input type="hidden" name="gender" value="<?php echo $student['gender']; ?>">
                                            <?php endif; ?>
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
                                                    <option value="<?php echo $state['state_name']; ?>" <?php if ($student['state'] == $state['state_name']) echo 'selected'; ?>><?php echo $state['state_name'] ?></option>
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
                                            <select name="lga" id="lga" class="form-select select-lga" required>
                                                <option value="<?php echo $student['lga']; ?>"><?php echo $student['lga']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Class</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="class_id" <?php echo $disabled; ?>>
                                                <?php
                                                $sql = "SELECT * FROM `classes`;";
                                                $classes = mysqli_query($conn, $sql);

                                                while ($class = mysqli_fetch_assoc($classes)) {
                                                ?>
                                                    <option value="<?php echo $class['class_id']; ?>" <?php if ($student['class_id'] == $class['class_id']) echo 'selected'; ?>><?php echo $class['class_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                            <?php if ($disabled) : ?>
                                                <input type="hidden" name="class_id" value="<?php echo $student['class_id']; ?>">
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateStudentBioData" class="btn bg-gradient-info mb-0">
                            </div>
                        </div>
                    </form>

                    <div class="my-3"></div>
                    <!--  -->
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-info">Parent Information</h6>
                                <p class="text-sm mb-0">Modify or edit a student's parent information.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Parent First Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_first_name" placeholder="Parent First Name" value="<?php echo ucfirst($student['parent_first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Last Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_last_name" placeholder="Parent Last Name" value="<?php echo ucfirst($student['parent_last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Parent Email Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_email" placeholder="Parent Email Address" value="<?php echo ucfirst($student['parent_email']); ?>" class="form-control" <?php echo $disabled; ?>>


                                            <?php if ($disabled) : ?>
                                                <input type="hidden" name="parent_email" value="<?php echo $student['parent_email']; ?>">
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Phone Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_phone_number" placeholder="Parent Phone Number" value="<?php echo ucfirst($student['parent_phone_number']); ?>" class="form-control" maxlength="11" <?php echo $disabled; ?>>


                                            <?php if ($disabled) : ?>
                                                <input type="hidden" name="parent_phone_number" value="<?php echo $student['parent_phone_number']; ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Home Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_address" placeholder="Parent Address" value="<?php echo ucfirst($student['parent_address']); ?>" class="form-control" <?php echo $disabled; ?>>


                                            <?php if ($disabled) : ?>
                                                <input type="hidden" name="parent_address" value="<?php echo $student['parent_address']; ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label>Status</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="status" <?php echo $disabled; ?>>
                                                <option value="1" <?php if ($student['status'] == 1) echo 'selected'; ?>>Active</option>
                                                <option value="0" <?php if ($student['status'] == 0) echo 'selected'; ?>>Inactive</option>
                                            </select>

                                            <?php if ($disabled) : ?>
                                                <input type="hidden" name="status" value="<?php echo $student['status']; ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateParentData" class="btn bg-gradient-info mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 col-xl-5 mt-3 mt-xl-0">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0 text-gradient text-info">Account Information</h6>
                            <p class="text-sm mb-0">Edit student&apos;s account information.</p>
                        </div>
                        <hr class="horizontal dark">

                        <div class="card-body">
                            <form action="" method="post">
                                <!--  -->
                                <label>Admission ID</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo $student['admission_id']; ?>" class="form-control" name="admission_id">
                                </div>

                                <!-- Hidden Input Field -->
                                <input type="hidden" name="admission_id" value="<?php echo $student['admission_id']; ?>">
                                <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">

                                <!--  -->
                                <div class="text-end">
                                    <input type="submit" value="update" name="updateStudentID" class="btn bg-gradient-info mb-0" <?php echo $disabled; ?>>
                                </div>


                                <?php if ($disabled) : ?>
                                    <input type="hidden" name="admission_id" value="<?php echo $student['admission_id']; ?>">
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>

                    <!-- Change Passowrd -->
                    <form action="" method="post" class="mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-info">Change Password</h6>
                                <p class="text-sm mb-0">Change student account password.</p>
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
                                <input type="submit" value="update" name="updateStudentPassword" class="btn bg-gradient-info mb-0" <?php echo $disabled; ?>>
                            </div>
                            <!-- Hidden Input Field -->
                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                            <!--  -->
                        </div>
                    </form>

                    <!-- Delete Account -->
                    <?php
                    if (in_array($position_id, [1, 2, 3])) {
                    ?>
                        <div class="card mt-3" id="delete">
                            <div class="card-header">
                                <h6 class="text-danger">Delete Student</h6>
                                <p class="text-sm mb-0">
                                    Once you erase student, all associated data will be removed from the database and will never be restored.
                                </p>
                            </div>
                            <div class="card-body justify-content-end d-flex pt-0">
                                <button class="btn bg-gradient-danger text-xs btn-sm mb-0 ms-2" type="button" data-bs-toggle="modal" data-bs-target="#modal-notification">
                                    Delete Account
                                </button>
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
                                                    <p class="text-center text-sm">Are you sure you want to delete student? <br> This operation cannot be reverted.</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-end d-flex align-items-center">
                                                <button type="button" class="btn bg-gradient-secondary btn-round" data-bs-dismiss="modal">No, Cancel</button>
                                                <form action="" method="post">
                                                    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                                                    <button type="submit" name="eraseStudentData" class="btn bg-gradient-danger ms-2 btn-round" data-bs-dismiss="modal">Yes, Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal -->
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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