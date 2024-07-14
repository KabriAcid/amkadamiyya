<?php
include_once "admin-process-update.php";

$staff_id = $_SESSION['staff']['staff_id'];
$sql = "SELECT * FROM `staff` WHERE `staff_id` = '$staff_id'";
$staff_result = mysqli_query($conn, $sql);
$staff = mysqli_fetch_assoc($staff_result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit My Profile</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "inc/admin-sidebar.php";
    }
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <!-- Page Header  -->
        <div class="container-fluid pt-3">
            <div class="page-header w-100 p-5 rounded" style="background: url('../../assets/images/backgrounds/blog7-3.jpg') no-repeat; background-size: cover; background-position: center;">
                <span class="mask bg-gradient-dark opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur p-4 mx-4 mt-n6 overflow-hidden">
                <div class="row">
                    <div class="col-auto my-auto">
                        <div class="h100">
                            <h4 class="mb-0 text-gradient text-dark">Edit My Profile</h4>
                            <p class="text-sm mb-0">Manage your profile information. Here you can update or modify your personal data.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update profile -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-12 col-xl-7">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-dark">Biodata</h6>
                                <p class="text-sm mb-0">Here you can modify or change a your personal biodata.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Image and Button -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="<?php echo $staff['photo']; ?>" class="avatar avatar-xl shadow-lg blur">
                                    <span class="btn-file me-3">
                                        <button type="button" class="fileupload-new btn bg-gradient-dark btn-sm position-relative">
                                            Change Photo
                                            <input type="file" name="photo" id="user-photo" class="opacity-0 position-absolute cursor-pointer" style="right: 0px;top: 5px;" accept=".jpg, .png, .jpeg, .heic">
                                        </button>
                                    </span>
                                </div>
                                <!-- Form inputs groups -->
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="first_name" placeholder="First Name" value="<?php echo ucfirst($staff['first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo ucfirst($staff['last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Date of Birth</label>
                                        <div class="input-group mb-3">
                                            <input type="date" value="<?php echo $staff['birth_date']; ?>" class="form-control text-uppercase cursor-pointer" placeholder="DOB" name="birth_date">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="gender">
                                                <option value="Male" <?php if ($staff['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($staff['gender'] == 'Female') echo 'selected'; ?>>Female</option>
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
                                                    <option value="<?php echo $state['state_name']; ?>" <?php if ($staff['state'] == $state['state_name']) echo 'selected'; ?>><?php echo $state['state_name'] ?></option>
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
                                                <option value="<?php echo $staff['lga']; ?>"><?php echo $staff['lga']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Phone Number -->
                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="<?php echo $staff['phone_number']; ?>" class="form-control" name="phone_number" placeholder="Phone Number" maxlength="11">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Home Address</label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $staff['address']; ?>" class="form-control" name="address" placeholder="Home Address">
                                        </div>
                                    </div>
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                    <!--  -->
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateStaffBioData" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>

                    <div class="my-3"></div>
                    <!--  -->
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-dark">Other Information</h6>
                                <p class="text-sm mb-0">Here you can edit or change your personal data.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Class</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="class_id">
                                                <?php
                                                $sql = "SELECT * FROM `classes`;";
                                                $classes = mysqli_query($conn, $sql);

                                                while ($class = mysqli_fetch_assoc($classes)) {
                                                ?>
                                                    <option value="<?php echo $class['class_id']; ?>" <?php if ($staff['class_id'] == $class['class_id']) echo 'selected'; ?>><?php echo $class['class_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Subject</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="subject_id">
                                                <?php
                                                $sql = "SELECT * FROM `subjects`;";
                                                $subjects = mysqli_query($conn, $sql);

                                                while ($subject = mysqli_fetch_assoc($subjects)) {
                                                ?>
                                                    <option value="<?php echo $subject['subject_id']; ?>" <?php if ($staff['subject_id'] == $subject['subject_id']) echo 'selected'; ?>><?php echo $subject['subject_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Position</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="position_id">
                                                <?php
                                                $sql = "SELECT * FROM `school_post`;";
                                                $positions = mysqli_query($conn, $sql);

                                                while ($position = mysqli_fetch_assoc($positions)) {
                                                ?>
                                                    <option value="<?php echo $position['position_id']; ?>" <?php if ($staff['position_id'] == $position['position_id']) echo 'selected'; ?>><?php echo $position['position_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <label>Qualification</label>
                                            <div class="input-group">
                                                <select class="form-select" name="qualification">
                                                    <?php
                                                    $sql = "SELECT * FROM `qualifications`;";
                                                    $qualifications = mysqli_query($conn, $sql);

                                                    while ($qualification = mysqli_fetch_assoc($qualifications)) {
                                                    ?>
                                                        <option value="<?php echo $qualification['qualification_name']; ?>" <?php if ($staff['qualification'] == $qualification['qualification_name']) echo 'selected'; ?>><?php echo $qualification['qualification_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <label>Discipline</label>
                                            <div class="input-group">
                                                <select class="form-select" name="discipline">
                                                    <?php
                                                    $sql = "SELECT * FROM `university_disciplines`;";
                                                    $disciplines = mysqli_query($conn, $sql);

                                                    while ($discipline = mysqli_fetch_assoc($disciplines)) {
                                                    ?>
                                                        <option value="<?php echo $discipline['discipline_name']; ?>" <?php if ($staff['discipline'] == $discipline['discipline_name']) echo 'selected'; ?>><?php echo $discipline['discipline_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Salary</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="&#8358;<?php echo number_format($staff['salary']); ?>.00" class="form-control" name="salary">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-6">
                                        <label>Account Number</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="<?php echo $staff['account_number']; ?>" class="form-control" name="account_number" maxlength="10">
                                        </div>
                                    </div>
                                    <!-- Bank Name -->
                                    <div class="col-md-6">
                                        <label>Bank Name</label>
                                        <div class="input-group mb-3">
                                            <select name="bank_name" class="form-control">
                                                <?php
                                                $sql = "SELECT * FROM `nigerian_banks`;";
                                                $banks = mysqli_query($conn, $sql);

                                                while ($bank = mysqli_fetch_assoc($banks)) {
                                                ?>
                                                    <option value="<?php echo $bank['bank_name']; ?>" <?php if ($staff['bank_name'] == $bank['bank_name']) echo 'selected'; ?>><?php echo $bank['bank_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label>Status</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="status">
                                                <option value="1" <?php if ($staff['status'] == 1) echo 'selected'; ?>>Active</option>
                                                <option value="0" <?php if ($staff['status'] == 0) echo 'selected'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Hidden Input Field -->
                                    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                    <!--  -->
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateOtherData" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <!--  -->
                <div class="col-lg-12 col-xl-5 mt-3 mt-xl-0">
                    <!-- Account Info form -->
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-dark">Account Information</h6>
                                <p class="text-sm mb-0">Edit your account information.</p>
                            </div>
                            <hr class="horizontal dark">

                            <div class="card-body">
                                <!--  -->
                                <label>Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo $staff['username']; ?>" class="form-control" name="username">
                                </div>
                                <!--  -->
                                <label>Email Address</label>
                                <div class="input-group mb-3">
                                    <input type="email" value="<?php echo $staff['email']; ?>" class="form-control" placeholder="Email Address" name="email">
                                </div>
                                <!-- Hidden Input Field -->
                                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                <!--  -->
                            </div>
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateStaffAccount" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>
                    <!-- End of form -->
                    <form action="" method="post" class="mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0 text-gradient text-info">Change Password</h6>
                                <p class="text-sm mb-0">Change your account password.</p>
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
                            <!-- Hidden Input Field -->
                            <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                            <!--  -->
                            <div class="card-footer text-end pt-0">
                                <input type="submit" value="update" name="updateStaffPassword" class="btn bg-gradient-info mb-0">
                            </div>
                        </div>
                    </form>
                    <div class="container py-7">
                        <div class="row mt-5">
                            <div class="col-sm-3 col-6 mx-auto">
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Launch demo modal
                                </button> -->

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Your modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Society has put up so many boundaries, so many limitations on what’s right and wrong that it’s almost impossible to get a pure thought out.
                                                <br><br>
                                                It’s like a little kid, a little boy, looking at colors, and no one told him what colors are good, before somebody tells you you shouldn’t like pink because that’s for girls, or you’d instantly become a gay two-year-old.
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn bg-gradient-dark">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button type="submit" focusable name="register" class="btn bg-gradient-success ms-auto mb-0" onclick="soft.showSwal('success-message')">Proceed</button> -->
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