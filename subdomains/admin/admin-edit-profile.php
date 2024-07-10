<?php
session_start();
include "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit My Profile</title>
    <?php include "./inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "./inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "./inc/admin-navbar.php"; ?>
        <!--  -->
        <div class="container-fluid pt-3">
            <div class="page-header w-100 p-5 rounded" style="background: url('../../assets/images/backgrounds/curved-8.jpg') no-repeat; background-size: auto; background-position: left;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card car-body blur shadow-blur p-4 mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto my-auto">
                        <div class="h100">
                            <h4 class="text-gradient text-danger">Edit Profile</h4>
                            <p class="mb-0">Manage staff basic profile information. Here you can update, delete or modify staff data.</p>
                        </div>
                    </div>
                    <div class="col-auto"></div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-6">
                    <form action="student-process.php" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-gradient text-warning">Staff Biodata</h6>
                                <p class="mb-0">Here you can modify or change a staff biodata.</p>
                            </div>
                            <hr class="horizontal gray-light my-0">
                            <div class="card-body">
                                <!-- Image and Button -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="<?php echo $_SESSION['staff']['photo']; ?>" class="avatar avatar-xl shadow-lg blur" style="">
                                    <span class="btn-file me-3">
                                        <button type="button" class="fileupload-new btn bg-gradient-dark btn-sm position-relative">
                                            Change Photo
                                            <input type="file" name="photo" id="user-photo" class="opacity-0 position-absolute cursor-pointer" style="right: 0px;top: 5px;">
                                        </button>
                                    </span>
                                </div>
                                <!-- Form inputs groups -->
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label>First Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="first_name" placeholder="First Name" value="<?php echo ucfirst($_SESSION['staff']['first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Last Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo ucfirst($_SESSION['staff']['last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Date of Birth</label>
                                        <div class="input-group mb-4">
                                            <input type="date" value="<?php echo $_SESSION['staff']['birth_date']; ?>" class="form-control text-uppercase cursor-pointer" placeholder="DOB" name="birth_date">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Gender</label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>State of Origin</label>
                                        <div class="input-group mb-4">
                                            <select onchange="toggleLGA(this);" name="state" id="state" class="form-select">
                                                <option>-- State --</option>
                                                <?php
                                                $sql = "SELECT * FROM nigerian_states;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row_n = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $row_n['state_name']; ?>"><?php echo $row_n['state_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Local government Area</label>
                                        <div class="input-group mb-4">
                                            <select name="lga" id="lga" class="form-select fs-small select-lga">
                                                <option value="">LGA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>Home Address</label>
                                        <div class="input-group mb-4">
                                            <input type="text" value="<?php echo $_SESSION['staff']['address']; ?>" class="form-control" name="address" placeholder="Home Address">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $_SESSION['staff']['phone_number']; ?>" class="form-control" name="phone_number" placeholder="Phone Number" maxlength="11">
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end">
                                <input type="submit" value="SUBMIT" name="staffBiodata" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>

                    <div class="my-3"></div>
                    <!--  -->
                    <form action="student-process.php" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-gradient text-warning">Other Information</h6>
                                <p class="mb-0">Here you can modify or change a staff data.</p>
                            </div>
                            <hr class="horizontal gray-light my-0">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label>Position</label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="position">
                                                <?php
                                                $sql = "SELECT * FROM `school_post`;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row_p = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $row_p['post_name']; ?>"><?php echo $row_p['post_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <div class="input-group mb-4">
                                            <label>Qualification</label>
                                            <div class="input-group">
                                                <select class="form-select" name="qualification">
                                                    <?php
                                                    $sql = "SELECT * FROM `qualifications`;";
                                                    $result = mysqli_query($conn, $sql);

                                                    while ($row_q = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row_q['qualification_name']; ?>"><?php echo $row_q['qualification_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <div class="input-group mb-4">
                                            <label>Discipline</label>
                                            <div class="input-group">
                                                <select class="form-select" name="discipline">
                                                    <?php
                                                    $sql = "SELECT * FROM `university_disciplines`;";
                                                    $result = mysqli_query($conn, $sql);

                                                    while ($row_u = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row_u['discipline_name']; ?>"><?php echo $row_u['discipline_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Administrative Role</label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="role">
                                                <?php
                                                $sql = "SELECT * FROM `school_post`;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row_n = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $row_n['position_name']; ?>"><?php echo $row_n['position_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Level</label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="level">
                                                <?php
                                                $sql = "SELECT * FROM `government_levels`;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row_g = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $row_g['level_name']; ?>"><?php echo $row_g['level_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Salary</label>
                                        <div class="input-group mb-4">
                                            <input type="text" value="&#8358;<?php echo number_format($_SESSION['staff']['salary']); ?>.00" class="form-control" name="salary">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Account Number</label>
                                        <div class="input-group mb-4">
                                            <input type="text" value="<?php echo $_SESSION['staff']['account_number']; ?>" class="form-control" name="account_number" maxlength="10">
                                        </div>
                                    </div>

                                    <!--  -->
                                    <div class="col-12">
                                        <label>Account Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" value="<?php echo $_SESSION['staff']['bank_name']; ?>" class="form-control" name="account_name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>Bank Name</label>
                                        <div class="input-group mb-4">
                                            <select name="bank_name" class="form-control">
                                                <?php
                                                $sql = "SELECT * FROM `bank_names`;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row_b = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $row_b['bank_name']; ?>"><?php echo $row_b['bank_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!--  -->
                                    <div class="col-12">
                                        <label>Join Date</label>
                                        <div class="input-group">
                                            <input type="date" value="<?php echo $_SESSION['staff']['join_date']; ?>" class="form-control" name="join_date">
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer text-end">
                                <input type="submit" value="SUBMIT" name="staffOtherdata" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <form action="" method="post">
                        <div class="card pt-sm-none pt-3">
                            <div class="card-header">
                                <h6 class="text-gradient text-dark">Account Information</h6>
                                <p class="mb-0">Edit staff&apos;s account information.</p>
                            </div>
                            <hr class="horizontal gray-light m-0 p-0">
                            <div class="card-body">
                                <!--  -->
                                <label>Email Address</label>
                                <div class="input-group mb-4">
                                    <input type="text" value="<?php echo $_SESSION['staff']['email']; ?>" class="form-control" placeholder="Email Address" name="email">
                                </div>
                                <!--  -->
                                <label>Current Password</label>
                                <div class="input-group mb-4">
                                    <input type="text" name="currentPassword" placeholder="Current Password" class="form-control" value="<?php echo $_SESSION['staff']['password'] ?>">
                                </div>
                                <!--  -->
                                <label>New Password</label>
                                <div class="input-group mb-4">
                                    <input type="password" name="newPassword" placeholder="New Password" class="form-control">
                                </div>
                                <!--  -->
                                <label>Confirm New Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirmPassword" placeholder="Confirm New Password" class="form-control">
                                </div>

                            </div>
                            <div class="card-footer text-end">
                                <input type="submit" value="CHANGE" name="modifyAccount" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>

                    <!--  -->
                    <div class="my-3"></div>
                    <!-- Delete Account -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-gradient text-dark">Erase Staff</h6>
                            <p class="mb-0 text-danger">Once you erase staff, all data will be removed from the database.</p>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="text-end">
                                    <form action="student-process.php" method="post">
                                        <input class="btn bg-gradient-danger btn-sm px-0" value="ERASE STAFF" name="eraseStaff">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EOF card -->
                </div>
            </div>
        </div>

        <?php include './inc/admin-footer.php';  ?>
    </main>

    <script src="../../js/plugins/state-capital.js"></script>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

</body>

</html>