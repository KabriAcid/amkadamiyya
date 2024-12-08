<?php
require "admission-process.php";

// <!-- Modal for Registration Success -->
if (isset($_SESSION['registration_success'])) {
    if (isset($_SESSION['registration_id'])) {
        $registration_id = $_SESSION['registration_id'];
        // Fetch application details using registration_id
        $sql = "SELECT application_code, first_name, last_name 
                FROM applicants 
                WHERE registration_id = '$registration_id'";
        $result = mysqli_query($conn, $sql);
        $registration = mysqli_fetch_assoc($result);
        $application_code = $registration['application_code'];
        $first_name = $registration['first_name'];
        $last_name = $registration['last_name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../../includes/header.php"; ?>
    <title>Apply For Admission</title>
</head>

<body class="bg-info-soft" style="font-family: 'Open Sans'">
    <?php include_once "../../includes/navbar.php"; ?>
    <main>
        <section>
            <div class="container pt-5">
                <h3 class="text-gradient text-dark">Enroll your child now!</h3>
                <p>Please note that all details entered are saved in the database and may become permanent. Ensure accuracy in letter casing, spelling, and data validity. Review all inputs carefully before submitting.</p>
                <p class="text-danger text-gradient text-sm">NB: Input fields with asterisks (*) are compulsory.</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
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
                                        <!-- Second Name -->
                                        <div class="col-md-6 mt-3">
                                            <label>Second Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Second Name" name="second_name">
                                            </div>
                                        </div>
                                        <!-- Last Name -->
                                        <div class="col-md-6 mt-3">
                                            <label>Last Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                            </div>
                                        </div>
                                        <!-- Date of Birth -->
                                        <div class="col-md-6 mt-3">
                                            <label>Date of Birth</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control text-uppercase" name="birth_date" required>
                                            </div>
                                        </div>
                                        <!-- State of Origin -->
                                        <div class="col-md-6 mt-3">
                                            <label>State of Origin</label>
                                            <div class="input-group">
                                                <select required onchange="toggleLGA(this);" name="state" id="state" class="form-select select-state">
                                                    <option value="" selected="selected">-- State --</option>
                                                    <?php
                                                    // Fetch states from database
                                                    $sql = "SELECT * FROM `nigerian_states`";
                                                    $states = mysqli_query($conn, $sql);
                                                    while ($state = mysqli_fetch_assoc($states)) {
                                                        echo '<option value="' . htmlspecialchars($state['state_name']) . '">' . htmlspecialchars($state['state_name']) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Local Government Area -->
                                        <div class="col-md-6 mt-3">
                                            <label>Local Government Area</label>
                                            <div class="input-group">
                                                <select name="lga" id="lga" class="form-select select-lga" required>
                                                    <option value="">LGA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Gender -->
                                        <div class="col-md-6 mt-3">
                                            <label>Gender</label>
                                            <div class="input-group">
                                                <select class="form-select" name="gender" required>
                                                    <option selected disabled>-- Select Gender --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Class -->
                                        <div class="col-md-6 mt-3">
                                            <label>Class</label>
                                            <div class="input-group">
                                                <select class="form-select" name="enrolling_class">
                                                    <?php
                                                    // Fetch classes from the database
                                                    $stmt = $conn->prepare("SELECT DISTINCT general_class_id FROM `classes` WHERE class_name != 'null'");
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    while ($class = $result->fetch_assoc()) {
                                                        $class_id = $class['general_class_id'];

                                                        // Fetch class details using the general_class_id
                                                        $stmt2 = $conn->prepare("SELECT * FROM general_class WHERE class_id = ?");
                                                        $stmt2->bind_param("i", $class_id);
                                                        $stmt2->execute();
                                                        $row = $stmt2->get_result()->fetch_assoc();

                                                        if ($row) {
                                                            echo '<option value="' . htmlspecialchars($row['class_id']) . '">' . htmlspecialchars($row['class_name']) . '</option>';
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Section B: Parent's Bio Data -->
                            <div class="mt-5">
                                <h6 class="text-sm text-info text-gradient">Section B: Parent's Bio Data</h6>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Parent's First Name -->
                                        <div class="col-md-6 mt-3">
                                            <label>Parent's First Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Parent's First Name" name="parent_first_name" required>
                                            </div>
                                        </div>
                                        <!-- Parent's Last Name -->
                                        <div class="col-md-6 mt-3">
                                            <label>Parent's Last Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Parent's Last Name" name="parent_last_name" required>
                                            </div>
                                        </div>
                                        <!-- Parent's Email Address -->
                                        <div class="col-md-8 mt-3">
                                            <label>Email Address</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="parent_email" placeholder="belloalibello@gmail.com">
                                            </div>
                                        </div>
                                        <!-- Parent's Phone Number -->
                                        <div class="col-md-4 mt-3">
                                            <label>Phone Number</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="parent_phone_number" placeholder="e.g., 08012345678" required maxlength="11">
                                            </div>
                                        </div>
                                        <!-- Parent's Home Address -->
                                        <div class="col-md-12 mt-3">
                                            <label>Home Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="e.g., Samunaka Junction Along Wuro Sembe Road, Jalingo." name="parent_address" required>
                                            </div>
                                        </div>
                                        <!-- Attestation -->
                                        <div class="col-md-12 mt-3">
                                            <div class="row align-items-center">
                                                <div class="col-8 col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input null-label" type="checkbox" id="flexSwitchCheckDefault" required>
                                                        <label class="form-check-label null-label text-xs" for="flexCheckDefault">
                                                            I hereby attest and confirm that all the above data is correct.
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- Submit Button -->
                                                <div class="col-4 col-md-6">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn bg-gradient-info" name="applyAdmission">Apply</button>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h4 class="text-gradient text-dark text-center">Registration Successful</h4>
                                                                <hr class="horizontal dark my-1">
                                                                <p class="my-3">Dear <i class="font-weight-bold"><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></i>, your application has been successfully submitted.</p>
                                                                <p class="mb-0">Your application code is: <strong><?php echo htmlspecialchars($application_code); ?></strong>. You can check your application status later by visiting <a href="admission-check-status.php" class="text-sm font-weight-bold text-decoration: underline">Admission Status Check</a></p>
                                                                <p class="text-warning mt-3 text-sm">NB: Please copy and save your application code for future reference regarding your admission status.</p>
                                                                <div class="d-flex justify-content-center">
                                                                    <button type="button" class="btn bg-gradient-info mt-3" data-bs-dismiss="modal">Ok</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End of Modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include_once "../../includes/footer.php"; ?>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../js/plugins/state-capital.js"></script>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include_once "../../includes/scripts.php"; ?>

    <!-- Modal for Registration Success -->
    <?php
    if (isset($_SESSION['registration_success'])) {
        // JavaScript to trigger modal display
        echo '<script>
            $(document).ready(function(){
                $("#successModal").modal("show");
            });
          </script>';
        // Unset session variable after displaying modal
        unset($_SESSION['registration_success']);
    }
    ?>

    <!-- SweetAlert for Success Message -->
    <?php if (isset($_SESSION['success_message'])) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Successful",
                    text: "<?php echo $_SESSION['success_message']; ?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'success'
                });
            });
        </script>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <!-- SweetAlert for Error Message -->
    <?php if (isset($_SESSION['error_message'])) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Error",
                    text: "<?php echo $_SESSION['error_message']; ?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'error'
                });
            });
        </script>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
</body>

</html>