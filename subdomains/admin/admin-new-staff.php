<?php
require_once '_CREATE.php';
if (isset($_SESSION['registration_success'])) {
    $first_name = $_SESSION['registration_success']['first_name'];
    $last_name = $_SESSION['registration_success']['last_name'];
    $username = $_SESSION['registration_success']['username'];
}
// Redirect function for convenience
function redirect($url)
{
    header("Location: $url");
    exit();
}
// Check if staff position ID is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];

    if (!in_array($position_id, [1, 2, 3, 5])) {
        redirect('admin-logout.php');
    }
} else {
    redirect('admin-logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New Staff</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php";
        ?>
        <!--  -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-12">
                    <div class="multisteps-form">
                        <div class="row">
                            <div class="col-12 col-lg-8 mx-auto my-5">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                                        <span>User Info</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn" type="button">Contact Info</button>
                                    <button class="multisteps-form__progress-btn" type="button">Other Info</button>
                                    <button class="multisteps-form__progress-btn" type="button">Account Info</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-8 m-auto">
                                <!-- Form -->
                                <form class="multisteps-form__form mb-8" action="" method="post" enctype="multipart/form-data">
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                        <h5 class="font-weight-bolder mb-0">Personal Identity</h5>
                                        <p class="mb-0 text-sm">Simply enter two names in the last name field.</p>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-3">
                                                <div class="col-md-6 mt-3">
                                                    <label>First Name</label>
                                                    <input class="multisteps-form__input form-control" name="first_name" type="text" placeholder="eg. Aliyu" required>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label>Last Name</label>
                                                    <input class="multisteps-form__input form-control" name="last_name" type="text" placeholder="eg. Bello Sani" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label>Birth Date</label>
                                                    <input class="multisteps-form__input form-control text-uppercase" type="date" name="birth_date">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label>Gender</label>
                                                    <div class="input-group">
                                                        <select class="multisteps-form__input form-select" name="gender" required>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <label>Upload Photo</label>
                                                    <input type="file" class="multisteps-form__input form-control" name="photo" accept=".jpg, .png, .jpeg, .heic">
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contact Info -->

                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                        <h5 class="font-weight-bolder mb-0">Contact Info</h5>
                                        <p class="mb-0 text-sm">All fields are required for the staff.</p>
                                        <div class="multisteps-form__content">
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <label>Home Address</label>
                                                    <input class="multisteps-form__input form-control text-capitalize" name="address" type="text" placeholder="eg. Samunaka Junction Along Wuro Sembe Road, Jalingo.">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label>State</label>
                                                    <select onchange="toggleLGA(this);" name="state" id="state" class="form-select select-state">
                                                        <option value="" selected="selected">-- State --</option>
                                                        <?php
                                                        $sql = "SELECT * FROM nigerian_states;";
                                                        $result = mysqli_query($conn, $sql);

                                                        while ($state = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <option value="<?php echo $state['state_name']; ?>">
                                                                <?php echo $state['state_name'] ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--  -->
                                                <div class="col-md-6 mt-3">
                                                    <label>LGA</label>
                                                    <select name="lga" id="lga" class="form-select select-lga">
                                                        <option value="">LGA</option>
                                                    </select>
                                                </div>
                                                <!--  -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 mt-3">
                                                    <label>Email Address</label>
                                                    <input class="multisteps-form__input form-control text-lowercase" name="email" type="email" placeholder="ahmadbello@gmail.com">
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <label>Phone Number</label>
                                                    <input type="text" class="multisteps-form__input form-control" name="phone_number" placeholder="07012345678" maxlength="11">
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Qualification -->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                        <h5 class="font-weight-bolder mb-0">Qualification</h5>
                                        <p class="mb-0 text-sm">Set aliases(fake data) where details are unknown.</p>
                                        <div class="multisteps-form__content">
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label>Qualification</label>
                                                    <div class="input-group">
                                                        <select class="multisteps-form__input form-select" name="qualification">
                                                            <?php
                                                            $sql = "SELECT * FROM `qualifications`;";
                                                            $result = mysqli_query($conn, $sql);

                                                            while ($qualification = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <option value="<?php echo $qualification['qualification_name']; ?>">
                                                                    <?php echo $qualification['qualification_name'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label>Discipline</label>
                                                    <div class="input-group">
                                                        <select class="multisteps-form__input form-select" name="discipline">
                                                            <?php
                                                            $sql = "SELECT * FROM `university_disciplines`;";
                                                            $result = mysqli_query($conn, $sql);

                                                            while ($discipline = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <option value="<?php echo $discipline['discipline_name']; ?>">
                                                                    <?php echo $discipline['discipline_name'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Class -->
                                                <div class="col-md-6 mt-3">
                                                    <label>Awarded Class</label>
                                                    <div class="input-group">
                                                        <select class="form-select" name="class_id">
                                                            <?php
                                                            $sql = "SELECT * FROM `classes`;";
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
                                                <!-- Subject -->
                                                <div class="col-md-6 mt-3">
                                                    <label>Awarded Subject</label>
                                                    <div class="input-group">
                                                        <select class="multisteps-form__input form-select" name="subject_id">
                                                            <?php
                                                            $sql = "SELECT * FROM `subjects`;";
                                                            $result = mysqli_query($conn, $sql);

                                                            while ($subject = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <option value="<?php echo $subject['subject_id']; ?>">
                                                                    <?php echo $subject['subject_name']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label>Position</label>
                                                    <div class="input-group">
                                                        <select class="form-select" name="position_id">
                                                            <?php
                                                            $sql = "SELECT * FROM `school_position` WHERE `position_number` >= 5 ORDER BY `position_number` DESC;";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($post = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <option value="<?php echo $post['position_id']; ?>">
                                                                    <?php echo $post['position_name'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profile -->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                        <h5 class="font-weight-bolder mb-0">Account</h5>
                                        <p class="mb-0 text-sm">Leave the fields empty if no account details are available.</p>
                                        <div class="multisteps-form__content">
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label>Bank Account Number</label>
                                                    <input type="text" class="multisteps-form__input form-control" name="account_number" placeholder="Bank Account Number" maxlength="10">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label>Bank Name</label>
                                                    <select class="form-select" name="bank_name">
                                                        <?php
                                                        $sql = "SELECT * FROM `nigerian_banks`;";
                                                        $result = mysqli_query($conn, $sql);

                                                        while ($bank = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <option value="<?php echo $bank['bank_name']; ?>">
                                                                <?php echo $bank['bank_name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label>Salary</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="" aria-hidden="true"></i>&#8358;</span>
                                                        <input class="multisteps-form__input form-control" placeholder="Salary Amount" type="number" name="salary">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label>Status</label>
                                                    <select name="status" class="multisteps-form__input form-select fs-small select-lga" required>
                                                        <option value="1" selected>Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container p-3">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="form-check mb-0">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" required>
                                                            </div>
                                                        </div>
                                                        <div class="ms-2">
                                                            <span class="text-dark font-weight-bold d-block text-sm">Confirm Submission</span>
                                                            <span class="text-xs d-block">Please ensure that all mandatory fields are filled out correctly.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>

                                                <!-- Submit Button -->
                                                <button type="submit" focusable name="register" class="btn bg-gradient-success ms-auto mb-0">Register</button>
                                                <!-- <button type="submit" focusable name="register" class="btn bg-gradient-success ms-auto mb-0" onclick="soft.showSwal('success-message')">Proceed</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Modal -->
                                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h4 class="text-gradient text-dark text-center">Registration Successful</h4>
                                                <hr class="horizontal dark my-1">
                                                <p class="py-3">Dear <?php echo $first_name . ' ' . $last_name; ?>, your username is <strong><?php echo $username; ?></strong> and the default password is <strong><i>amka123</i></strong></p>
                                                <p class="text-sm mb-0">Note: Please change your password immediately after logging in.</p>
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
        </div>
        <?php include 'inc/admin-footer.php'; ?>
    </main>

    <script src="../../js/plugins/state-capital.js"></script>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/multistep-form.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include 'inc/admin-scripts.php'; ?>

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
    <?php
    // Check if registration success flag is set
    if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
        // Output JavaScript to trigger the modal display
        echo '<script>
            $(document).ready(function(){
                $("#successModal").modal("show");
            });
          </script>';

        // Unset the session variable after displaying modal
        unset($_SESSION['registration_success']);
    }
    ?>

</body>

</html>