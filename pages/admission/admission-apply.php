<?php
    session_start();
    include "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../includes/header.php"; ?>
    <title>Apply For Admission</title>
</head>

<body class="bg-info-soft" style="font-family: 'Open Sans'">
    <?php include "../../includes/navbar.php"; ?>
    <main>
        <section>
            <div class="container pt-5">
                <h3 class="header">Enrol your child now!</h3>
                <p>Please note that all details entered are saved in the database and may become permanent. Ensure accuracy in letter casing, spelling, and data validity. Review all inputs carefully before submitting.
                </p>
                <p class="text-danger text-sm">NB: Input fields with asterisks (*) are compulsory.</p>
            </div>
            <div class="container py-5">
                <form action="admission-process.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <!-- STUDENTS DATA SECTION -->
                    <h6>Section A: Student's Bio Data</h6>
                    <div class="card p-4">
                        <!--  -->
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label>First Name</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control capitalize" placeholder="First Name" name="first_name" required>
                                </div>
                            </div>
                            <!-- Middle Name  -->
                            <div class="col-md-6">
                                <label class="null-label">Middle Name</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control capitalize" placeholder="Middle Name" name="middle_name">
                                </div>
                            </div>
                            <!-- Last Name  -->
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control capitalize" placeholder="Last Name" name="last_name" required>
                                </div>
                            </div>
                            <!-- Date of Birth  -->
                            <div class="col-md-6">
                                <label>Date of Birth</label>
                                <div class="input-group mb-4">
                                    <input type="date" class="form-control text-uppercase" placeholder="DOB" name="birth_date" required>
                                </div>
                            </div>
                            <!-- State of Origin  -->
                            <div class="col-md-6">
                                <label>State of Origin</label>
                                <div class="input-group mb-4">
                                    <select onchange="toggleLGA(this);" name="state" id="state" class="form-select select-state" required>
                                        <option value="" selected="selected">-- State --</option>
                                        <?php
                                        $sql = "SELECT * FROM nigerian_states;";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['state_name']; ?>">
                                                <?php echo $row['state_name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Local Government Area  -->
                            <div class="col-md-6">
                                <label>Local government Area</label>
                                <div class="input-group mb-4">
                                    <select name="lga" id="lga" class="form-select fs-small select-lga">
                                        <option value="">LGA</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Gender  -->
                            <div class="col-md-6">
                                <label>Gender</label>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="gender" required>
                                        <option selected value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Upload a Photo  -->
                            <div class="col-md-6">
                                <label>Upload a Photo</label>
                                <div class="input-group mb-4">
                                    <input type="file" class="form-control" name="photo" accept=".jpg, .png, .jpeg, .heic" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="mt-5">
                        <h6>Section B: Parent's Bio Data</h6>
                    </div>
                    <!-- PARENT OR GUARDIAN SECTION -->
                    <div class="card p-4">
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label>First Name</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control capitalize" placeholder="First Name" name="parent_firstName" required>
                                </div>
                            </div>
                            <!-- Last Name  -->
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control capitalize" placeholder="Last Name" name="parent_lastName" required>
                                </div>
                            </div>
                            <!-- Email Address  -->
                            <div class="col-md-6">
                                <label class="null-label">Email Address</label>
                                <div class="input-group mb-4">
                                    <input type="email" class="form-control" name="parent_email" placeholder="Email Address">
                                </div>
                            </div>
                            <!-- Home Address  -->
                            <div class="col-md-6">
                                <label>Home Address</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control capitalize" placeholder="Home or Residential Address" name="parent_address" required>
                                </div>
                            </div>
                            <!-- Occupation  -->
                            <div class="col-md-6">
                                <label class="null-label">Occupation</label>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="parent_occupation" required>
                                        <option value="Civil Servant">Civil Servant</option>
                                        <option value="Bussiness Owner">Business Owner</option>
                                        <option value="Merchant">Merchant</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Marital Status  -->
                            <div class="col-md-6">
                                <label>Marital Status</label>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="parent_maritalStatus" required>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Undisclosed">Undisclosed</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Phone Number  -->
                            <div class="col-md-6">
                                <label>Phone Number</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="parent_phoneNumber" placeholder="Phone Number" required maxlength="11">
                                </div>
                            </div>
                            <!-- Phone Number  -->
                            <div class="col-md-6">
                                <label>Alternate Phone Number</label>
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="parent_altPhone" placeholder="Phone Number" required maxlength="11">
                                </div>
                            </div>
                            <!-- State of Origin  -->
                            <div class="col-md-6">
                                <label>State of Origin</label>
                                <div class="input-group mb-4">
                                    <select onchange="toggleLGA(this)" name="state" id="state" class="form-select select-state" required>
                                        <option value="" selected="selected">-- State --</option>
                                        <?php
                                        $sql = "SELECT * FROM `nigerian_states`";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['state_name']; ?>">
                                                <?php echo $row['state_name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Local Government Area  -->
                            <div class="col-md-6">
                                <label>Local government Area</label>
                                <div class="input-group mb-4">
                                    <select name="lga" id="lga" class="form-select select-lga" required>
                                        <option value="">LGA</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Applicant's Enrolling Class  -->
                            <div class="col-md-6">
                                <label>Applicant's Enrolling Class</label>
                                <div class="input-group mb-4">
                                    <select class="form-select" name="enrolling_class" required>
                                        <?php
                                        $sql = "SELECT * FROM `school_class`";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['class_name']; ?>">
                                                <?php echo $row['class_name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Attestation -->
                        <div class="my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                                <label class="form-check-label null-label" for="flexCheckDefault">
                                    I hereby attest and confirm that all the above data is correct.
                                </label>
                            </div>
                        </div>
                        <!--  -->
                        <div class="d-lg-none">
                            <div class="w-50 m-auto">
                                <input type="submit" class="w-100 d-block btn bg-gradient-success me-1 mt-3" value="Submit" name="submitApplication">
                            </div>
                        </div>
                        <!--  -->
                        <div class="d-lg-block d-none">
                            <input type="submit" class="w-auto btn bg-gradient-success me-1 mt-3" value="Submit" name="submitApplication">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer  -->
        <?php
        include "../../includes/footer.php";
        ?>
    </main>
    <script src="../../js/plugins/state-capital.js"></script>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "../../includes/scripts.php"; ?>

    <?php
    if (isset($_SESSION['success_message'])) {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: "Successful",
                    text: "<?php echo $_SESSION['success_message'];?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'success'
                })
            })
        </script>
        <?php
        unset($_SESSION['success_message']);
        header("Location: form-success.php");
    } 
    if(isset($_SESSION['error_message'])){
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: "Error",
                    text: "<?php echo $_SESSION['error_message'];?>",
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