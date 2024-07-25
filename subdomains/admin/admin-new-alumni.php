<?php
require_once "_CREATE.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New Alumni</title>
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
                <div class="col-lg-10">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0 text-gradient text-primary">Add Alumni</h5>
                            <p class="text-sm mb-0">
                                You can add a new alumni to the database here.
                            </p>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <form action="" method="post" class="mt-3">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="Enter first name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="second_name">Second Name</label>
                                        <input type="text" class="form-control" name="second_name"
                                            placeholder="Enter second name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name"
                                            placeholder="Enter last name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="index_no">WAEC Index No</label>
                                        <input type="text" class="form-control" name="index_no" placeholder="001"
                                            maxlength="3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input type="date" class="form-control" name="date_of_birth" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="graduation_year">Graduation Year</label>
                                        <input type="text" name="graduation_year" class="form-control" placeholder="Year">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="position_held">Position Held</label>
                                        <input type="text" class="form-control" name="position_held"
                                            placeholder="Enter position held">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter email address" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone_number"
                                            placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="state">State</label>
                                        <select onchange="toggleLGA(this)" name="state" id="state" class="form-select select-state">
                                            <option value="" selected="selected" required>-- State --</option>
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

                                    <div class="form-group col-md-6">
                                        <label>Local government Area</label>
                                        <div class="input-group">
                                            <select name="lga" id="lga" class="form-select select-lga">
                                                <option value="">--Select--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter address">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nin_number">NIN Number</label>
                                        <input type="text" class="form-control" name="nin_number"
                                            placeholder="Enter NIN number" required maxlength="11">
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn bg-gradient-success"
                                        name="addalumni">Upload</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>


    <script src="../../js/plugins/state-capital.js"></script>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <?php
    if (isset($_SESSION['success_message'])) {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
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
    } else if (isset($_SESSION['error_message'])) {
        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
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