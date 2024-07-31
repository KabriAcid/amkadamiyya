<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-gradient text-dark">Staff Table</h5>
                    <p class="text-sm mb-0">
                        Below is a list of staff. Click 'View' to see complete details.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">Full Name</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Phone number</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Class Master</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Prepared statement for fetching staff data
                            $stmt = $conn->prepare("SELECT * FROM `staff` WHERE position_id != 1 ORDER BY `position_id`, `first_name`, `last_name`");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo htmlspecialchars($row['photo']); ?>" class="avatar avatar-sm text-center me-2">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php echo htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Position -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <?php
                                            $position_id = $row['position_id'];
                                            // Prepared statement for fetching position name
                                            $stmt_position = $conn->prepare("SELECT `position_name` FROM `school_position` WHERE `position_id` = ?");
                                            $stmt_position->bind_param("i", $position_id);
                                            $stmt_position->execute();
                                            $position_result = $stmt_position->get_result();
                                            $position = $position_result->fetch_assoc();
                                            echo htmlspecialchars($position['position_name'] ?? '');
                                            ?>
                                        </span>
                                    </td>

                                    <!-- Phone Number -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo htmlspecialchars(substr($row['phone_number'], 0, 3) . '-' . substr($row['phone_number'], 3, 4) . '-' . substr($row['phone_number'], 7)); ?>
                                        </span>
                                    </td>

                                    <!-- Username -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php echo htmlspecialchars($row['username']); ?>
                                        </span>
                                    </td>

                                    <!-- Subject -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php
                                            $subject_id = $row['subject_id'];
                                            // Prepared statement for fetching subject name
                                            $stmt_subject = $conn->prepare("SELECT `subject_name` FROM `subjects` WHERE `subject_id` = ?");
                                            $stmt_subject->bind_param("i", $subject_id);
                                            $stmt_subject->execute();
                                            $subject_result = $stmt_subject->get_result();
                                            $subject = $subject_result->fetch_assoc();
                                            echo htmlspecialchars($subject['subject_name'] ?? '');
                                            ?>
                                        </span>
                                    </td>

                                    <!-- Class -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                            <?php
                                            $class_id = $row['class_id'];
                                            // Prepared statement for fetching class name
                                            $stmt_class = $conn->prepare("SELECT `class_name` FROM `classes` WHERE `class_id` = ?");
                                            $stmt_class->bind_param("i", $class_id);
                                            $stmt_class->execute();
                                            $class_result = $stmt_class->get_result();
                                            $class = $class_result->fetch_assoc();
                                            echo htmlspecialchars($class['class_name'] ?? '');
                                            ?>
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm rounded <?php echo $row['status'] == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary'; ?>">
                                            <?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </td>

                                    <!-- View Button -->
                                    <td class="align-middle text-center text-sm">
                                        <form action="admin-view-staff.php" method="get">
                                            <input type="hidden" name="staff_id" value="<?php echo htmlspecialchars($row['staff_id']); ?>">
                                            <button type="submit" class="badge badge-sm rounded bg-gradient-light text-dark border-0">View</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            // Close the statement
                            $stmt->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <?php
                    if(isset($_SESSION['staff'])){
                        $photo = $_SESSION['staff']['photo'];
                    }
                ?>
               <img src="<?= $photo;?>" alt="photo">
            </div>
        </div>
    </div>
</div>
<!-- End of Modal -->