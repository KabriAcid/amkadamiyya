<?php
// Function for redirection to avoid code repetition
function redirect($url) {
    header("Location: $url");
    exit();
}

// Check if staff session is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];
    $class_id = $_SESSION['staff']['class_id'];

    // Prepare and execute SQL query to get position number
    $stmt = $conn->prepare("SELECT position_number FROM school_position WHERE position_id = ?");
    $stmt->bind_param("i", $position_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $position_number = $row['position_number'];
} else {
    // Redirect to logout if session is not set
    redirect("admin-logout.php");
}
?>

<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-gradient text-info">Student's Table</h5>
                    <p class="text-sm mb-0">
                        Below is a general list of students. Click 'View' to see complete details.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                    Full Name
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Admission Number
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Class
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Gender
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    State
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    LGA
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Check position and determine the SQL query to execute
                            if (in_array($position_number, [1, 2, 3, 4, 5])) {
                                // Query for admins who can view all students
                                $sql = "SELECT * FROM `students` ORDER BY `admission_id` ASC, `first_name` ASC, `second_name` ASC, `last_name` ASC, `gender` ASC, `class_id` ASC";
                                $result = mysqli_query($conn, $sql);
                            } else {
                                // Query for staff who can view only students of their class
                                $sql = "SELECT * FROM `students` WHERE `class_id` = '$class_id' ORDER BY admission_id ASC, `first_name` ASC, `second_name` ASC, `last_name` ASC";
                                $result = mysqli_query($conn, $sql);
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                // Fetch class name separately
                                $class_id = $row['class_id'];
                                $class_query = "SELECT `class_name` FROM `classes` WHERE `class_id` = '$class_id'";
                                $class_result = mysqli_query($conn, $class_query);
                                $class = mysqli_fetch_assoc($class_result);
                            ?>
                                <tr>
                                    <!-- Full Name -->
                                    <td class="align-middle text-left text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo $row['first_name'] . '&nbsp;' . $row['second_name'] . '&nbsp;' . $row['last_name']; ?>
                                        </span>
                                    </td>
                                    <!-- Admission Number -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo $row['admission_id']; ?>
                                        </span>
                                    </td>
                                    <!-- Class -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo $class['class_name']; ?>
                                        </span>
                                    </td>
                                    <!-- Gender -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo $row['gender']; ?>
                                        </span>
                                    </td>
                                    <!-- State -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo $row['state']; ?>
                                        </span>
                                    </td>
                                    <!-- LGA -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo $row['lga']; ?>
                                        </span>
                                    </td>
                                    <!-- Status -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm rounded <?php echo $row['status'] == 1 ? 'bg-gradient-success' : "bg-gradient-secondary"; ?>">
                                            <?php echo $row['status'] == 1 ? 'Active' : "Inactive"; ?>
                                        </span>
                                    </td>
                                    <!-- Action -->
                                    <td class="align-middle text-center text-sm">
                                        <form action="admin-view-student.php" method="get">
                                            <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                                            <button type="submit" class="badge badge-sm rounded bg-gradient-light text-dark border-0">View</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
