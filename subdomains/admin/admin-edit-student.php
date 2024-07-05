<?php
include "admin-process.php";

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = "SELECT * FROM `students` WHERE `student_id` = '$student_id'";
    $result = mysqli_query($conn, $sql);
    $student = mysqli_fetch_assoc($result);
} else {
    header('Location: admin-student-list.php');
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
            <div class="row mb-4">
                <div class="col-md-6 col-lg-8">
                    <!-- Profile Information -->
                    <form action="" method="post">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="text-gradient text-warning">Personal Information</h6>
                                <p class="mb-0">Here you can modify or change a student's personal information.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>First Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="first_name" placeholder="First Name" value="<?php echo ucfirst($student['first_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <label class="null-label">Middle Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="second_name" placeholder="Second Name" value="<?php echo ucfirst($student['second_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <label>Last Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo ucfirst($student['last_name']); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <label>State of Origin</label>
                                        <div class="input-group mb-4">
                                            <select required onchange="toggleLGA(this);" name="state" id="state" class="form-select select-state">
                                                <option value="" <?php echo empty($student['state']) ? 'selected="selected"' : ''; ?>>- Select State -</option>
                                                <?php
                                                $sql = "SELECT * FROM nigerian_states;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($state = mysqli_fetch_assoc($result)) {
                                                    $selected = ($student['state'] == $state['state_name']) ? 'selected="selected"' : '';
                                                    echo '<option value="' . $state['state_name'] . '" ' . $selected . '>' . $state['state_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <label>Local Government Area</label>
                                        <div class="input-group mb-4">
                                            <select name="lga" id="lga" class="form-select select-lga">
                                                <option value=""><?php echo !empty($student['lga']) ? $student['lga'] : '--LGA--'; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <label>Gender</label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="gender">
                                                <option value="Male" <?php echo ($student['gender'] == 'Male') ? 'selected="selected"' : ''; ?>>Male</option>
                                                <option value="Female" <?php echo ($student['gender'] == 'Female') ? 'selected="selected"' : ''; ?>>Female</option>
                                            </select>

                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <label>Current Class</label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="class">
                                                <?php
                                                $sql = "SELECT * FROM `classes`";
                                                $result = mysqli_query($conn, $sql);
                                                while ($class = mysqli_fetch_assoc($result)) {
                                                    $selected = ($student['class_id'] == $class['class_id']) ? 'selected="selected"' : '';
                                                    echo '<option value="' . $class['class_id'] . '" ' . $selected . '>' . $class['class_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <label for="">Current Section</label>
                                        <select class="form-control" name="section">
                                            <?php
                                            $sql = "SELECT * FROM sections";
                                            $result = mysqli_query($conn, $sql);
                                            while ($section = mysqli_fetch_assoc($result)) {
                                                $selected = ($student['section_id'] == $section['section_id']) ? 'selected="selected"' : '';
                                                echo "<option value='" . $section["section_id"] . "' " . $selected . ">" . $section["section_name"] . "</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="card-footer text-end">
                                <input type="submit" value="submit" name="updateStudent" class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-gradient text-dark">Delete student</h6>
                            <small class="mb-0 text-danger">Once you delete a student, all associated data will be removed from the database.</small>
                            <div class="d-flex justify-content-end mt-3">
                                <a href="?delete_student=<?php echo $student['student_id']; ?>" class="btn bg-gradient-danger btn-sm">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="py-3 text-center">
                                    <i class="ni ni-bell-55 ni-3x text-danger"></i>
                                    <h4 class="text-gradient text-danger mt-4">Delete Session</h4>
                                    <p>Are you sure you want to delete school session?</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-secondary" data-bs-dismiss="modal">No</a>
                                <a href="?delete_session=<?php echo $row['id']; ?>" class="btn btn-danger ml-auto">Delete</a>
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
</body>

</html>