<?php
include "admin-process.php";

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
    $students = mysqli_query($conn, $sql);
    $student = mysqli_fetch_assoc($students);
} else {
    header('Location: admin-student-list.php');
    exit();
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
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "";
    }
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
                                            <input type="date" value="<?php echo $student['birth_date']; ?>" class="form-control text-uppercase cursor-pointer" placeholder="DOB" name="birth_date">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="gender">
                                                <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
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
                                            <select name="lga" id="lga" class="form-select select-lga">
                                                <option value="<?php echo $student['lga']; ?>"><?php echo $student['lga']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Class</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="class_id">
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
                                        </div>
                                    </div>
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
                                            <input type="text" name="parent_email" placeholder="Parent Email Address" value="<?php echo ucfirst($student['parent_email']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Phone Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_phone_number" placeholder="Parent Phone Number" value="<?php echo ucfirst($student['parent_phone_number']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Parent Home Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="parent_address" placeholder="Parent Address" value="<?php echo ucfirst($student['parent_address']); ?>" class="form-control">
                                        </div>
                                    </div>
                                     <!-- Status -->
                                     <div class="col-md-6">
                                        <label>Status</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="status">
                                                <option value="1" <?php if ($student['status'] == 1) echo 'selected'; ?>>Active</option>
                                                <option value="0" <?php if ($student['status'] == 0) echo 'selected'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
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
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-info">Account Information</h6>
                                <p class="text-sm mb-0">Edit student&apos;s account information.</p>
                            </div>
                            <hr class="horizontal dark">

                            <div class="card-body">
                                <!--  -->
                                <label>Admission Number</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo $student['admission_id']; ?>" class="form-control" name="admission_number">
                                </div>
                                <!--  -->
                            </div>
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateStudentAdmission" class="btn bg-gradient-info mb-0">
                            </div>
                        </div>
                    </form>
                    <form action="" method="post" class="mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-info">Change Password</h6>
                                <p class="text-sm mb-0">Change student account password.</p>
                            </div>
                            <hr class="horizontal dark my-0">
                            <div class="card-body">
                                <label>Change Password</label>
                                <div class="input-group">
                                    <input type="password" name="newPassword" placeholder="Enter New Password" class="form-control">
                                </div>

                            </div>
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateStudentPassword" class="btn bg-gradient-info mb-0">
                            </div>
                            <!-- Hidden Input Field -->
                            <input type="hidden" name="staff_id" value="<?php echo $student_id; ?>">
                            <!--  -->
                        </div>
                    </form>
                    <!-- EOF card -->
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