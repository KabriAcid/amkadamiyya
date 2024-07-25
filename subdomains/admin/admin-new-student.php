<?php
    require_once "_CREATE.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New Student</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
        include "inc/admin-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="card bg-gradient-dark mt-3">
                <div class="card-body">
                    <h5 class="text-white font-weight-bold">Student Registration Form</h5>
                    <p class="text-light text-sm mb-0">All fields with red asterisks must not be empty.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="mt-5">
                        <h6 class="text-sm text-info text-gradient">Section A: Student's Bio Data</h6>
                    </div>
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-md-6 mt-3">
                                        <label>First Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                                        </div>
                                    </div>
                                    <!-- second Name  -->
                                    <div class="col-md-6 mt-3">
                                        <label class="null-label">Second Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Second Name" name="second_name">
                                        </div>
                                        <small class="text-secondary">If using two names, leave this blank and fill in the last name.</small>
                                    </div>
                                    <!-- Last Name  -->
                                    <div class="col-md-6 mt-3">
                                        <label>Last Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                        </div>
                                    </div>
                                    <!-- Date of Birth  -->
                                    <div class="col-md-6 mt-3">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control text-uppercase" name="birth_date" required>
                                        </div>
                                    </div>
                                    <!-- State of Origin  -->
                                    <div class="col-md-6 mt-3">
                                        <label>State of Origin</label>
                                        <div class="input-group">
                                            <select required onchange="toggleLGA(this);" name="state" id="state" class="form-select select-state">
                                                <option value="" selected="selected">-- State --</option>
                                                <?php
                                                $sql = "SELECT * FROM `nigerian_states`;";
                                                $states = mysqli_query($conn, $sql);

                                                while ($state = mysqli_fetch_assoc($states)) {
                                                ?>
                                                    <option value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Local Government Area  -->
                                    <div class="col-md-6 mt-3">
                                        <label>Local government Area</label>
                                        <div class="input-group">
                                            <select name="lga" id="lga" class="form-select select-lga" required>
                                                <option value="">LGA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Gender  -->
                                    <div class="col-md-6 mt-3">
                                        <label>Gender</label>
                                        <div class="input-group">
                                            <select class="form-select" name="gender" required>
                                                <option selected value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Class -->
                                    <div class="col-md-6 mt-3">
                                        <label>Class</label>
                                        <div class="input-group">
                                            <select class="form-select" name="class_id">
                                                <?php
                                                $sql = "SELECT * FROM `classes` WHERE `class_name` != 'NULL';";
                                                $result = mysqli_query($conn, $sql);

                                                while ($class = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $class['class_id']; ?>">
                                                        <?php echo $class['class_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="mt-5">
                            <h6 class="text-sm text-info text-gradient">Section B: Parent's Bio Data</h6>
                        </div>
                        <!-- PARENT OR GUARDIAN SECTION -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-md-6 mt-3">
                                        <label>First Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="First Name" name="parent_first_name" required>
                                        </div>
                                    </div>
                                    <!-- Last Name  -->
                                    <div class="col-md-6 mt-3">
                                        <label>Last Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Last Name" name="parent_last_name" required>
                                        </div>
                                    </div>
                                    <!-- Email Address  -->
                                    <div class="col-md-8 mt-3">
                                        <label class="null-label">Email Address</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="parent_email" placeholder="belloalibello@gmail.com">
                                        </div>
                                    </div>
                                    <!-- Phone Number  -->
                                    <div class="col-md-4 mt-3">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="parent_phone_number" placeholder="e.g., 08012345678" required maxlength="11">
                                        </div>
                                    </div>
                                    <!-- Home Address  -->
                                    <div class="col-md-12 mt-3">
                                        <label>Home Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="eg. Samunaka Junction Along Wuro Sembe Road, Jalingo." name="parent_address" required>
                                        </div>
                                    </div>
                                    <!-- Attestation -->
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-8 col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="form-check form-switch mb-0">
                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                                        </div>
                                                    </div>
                                                    <div class="ms-2">
                                                        <span class="text-dark font-weight-bold d-block text-sm">Form Attestation</span>
                                                        <span class="text-xs d-block">I hereby affirm and verify that all the aforementioned data is accurate.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-6">
                                                <!-- Submit Button -->
                                                <div class="text-end">
                                                    <input type="submit" class="btn bg-gradient-info" name="addStudent" tabindex="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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