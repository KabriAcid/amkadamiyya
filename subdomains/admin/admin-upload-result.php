<?php
session_start();
include "../../config/database.php";

if (isset($_GET['subject_id'])) {
    $class_id = $_SESSION['staff']['class_id'];
    $sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
    $class_result = mysqli_query($conn, $sql);
    $class = mysqli_fetch_assoc($class_result);

    $subject_id = $_GET['subject_id'];
    $section_id = $class['section_id'];

    $query = "SELECT * FROM `results` WHERE `subject_id` = '$subject_id' AND `class_id` = '$class_id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {  // Changed to > 0 to handle multiple records
        $_SESSION['error_message'] = "Subject Already Uploaded";
        // Redirect to avoid form resubmission on page refresh
        header("Location: admin-choose-subject.php");
        exit;
    }
} else {
    header("Location: admin-choose-subject.php");
}
$sql = 'SELECT * FROM `defaults`';
$default_result = mysqli_query($conn, $sql);
$default = mysqli_fetch_assoc($default_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Subject</title>
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
        <!-- Main content  -->
        <div class="container-fluid py-4">
            <div class="card card-body bg-gradient-dark" id="profile">
                <div class="row align-items-center">
                    <div class="col-sm-auto col-2">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?php echo $_SESSION['staff']['photo']; ?>" alt="" class="w-100 border-radius-lg shadow-sm" />
                        </div>
                    </div>
                    <div class="col-10 my-auto">
                        <div class="row">
                            <!-- Form Master -->
                            <div class="col-md-4 col-6 mb-3">
                                <h6 class="text-light text-sm font-weight-bold"><span class="text-secondary">Form
                                        Master:
                                    </span><?php echo $_SESSION['staff']['first_name'] . '&nbsp;' . $_SESSION['staff']['last_name']; ?>
                                </h6>
                            </div>
                            <!-- Subject -->
                            <div class="col-md-4 col-6 mb-3 text-md-center">
                                <h6 class="font-weight-bold text-light text-sm">
                                    <span class="text-secondary">Subject:</span>
                                    <?php
                                    $subject_id = $_GET['subject_id'];
                                    $sql = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id'";
                                    $subject_result = mysqli_query($conn, $sql);
                                    $subject = mysqli_fetch_assoc($subject_result);
                                    echo $subject['subject_name'];
                                    ?>
                                </h6>
                            </div>
                            <!-- Class -->
                            <div class="col-md-4 col-6 mb-3 text-md-end">
                                <h6 class="text-light text-sm font-weight-bold"><span class="text-secondary">Class:
                                    </span><?php echo $class['class_name']; ?> </h6>
                            </div>
                        </div>
                        <!-- Second Row -->
                        <div class="row">
                            <div class="col-md-6 col-6 mb-3">
                                <h6 class="text-light text-sm font-weight-bold"><span class="text-secondary">Session:
                                    </span><?php echo $default['session_name']; ?> </h6>
                            </div>
                            <div class="col-md-6 col-6 text-md-end">
                                <h6 class="text-light text-sm font-weight-bold"><span class="text-secondary">Term:
                                    </span><?php echo $default['current_term']; ?> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="admin-process.php" method="post">
                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        S/N
                                    </th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        1<sup>st</sup> C.A</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        2<sup>nd</sup> C.A</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Exams</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `class_id` = '$class_id' ORDER BY `first_name` ASC, `second_name` ASC, `last_name` ASC";
                                $student_result = mysqli_query($conn, $sql);
                                $count = 1;
                                if (mysqli_num_rows($student_result) > 0) {
                                    while ($student = mysqli_fetch_assoc($student_result)) {
                                ?>
                                        <input type="hidden" name="student_id[]" value="<?php echo $student['student_id']; ?>">
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal align-middle">
                                                <?php echo $count; ?>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal align-middle">
                                                <?php echo $student['first_name'] . '&nbsp;' . $student['second_name'] . '&nbsp;' . $student['last_name']; ?>
                                            </td>
                                            <td class="text-center">
                                                <input type="number" name="first_test[]" class="form-control" required placeholder="20" max="20" min="0">
                                            </td>
                                            <td class="text-center">
                                                <input type="number" name="second_test[]" class="form-control" required placeholder="20" max="20" min="0">
                                            </td>
                                            <td class="text-center">
                                                <input type="number" name="exam[]" class="form-control" required placeholder="60" max="60" min="0">
                                            </td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="border-0">
                                        <div class="card-footer row">
                                            <!-- Hidden Input Fields -->
                                            <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                                            <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                            <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">

                                            <!-- Checkbox -->
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" required>
                                                    <label class="form-check-label null-label" for="verify">I have checked an verified
                                                        the above inputs.</label>
                                                </div>
                                            </div>
                                            <!-- Submit Button -->
                                            <div class="col-md-6 text-end">
                                                <div class="form-input">
                                                    <button type="submit" value="Upload" class="btn bg-gradient-success mb-0" name="uploadSubject">
                                                        <span class="ni ni-cloud-upload-96 text-md opacity-10 mx-2" aria-hidden="true"></span>
                                                        upload
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                } else {
                                    echo "<tr><td class='text-center text-secondary' colspan='5'>No student found</td></tr>";
                                }
                            ?>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <?php
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