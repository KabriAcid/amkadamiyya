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
                                <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                    Full Name</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Position</th>

                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Phone number</th>

                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Username</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Subject</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Class Master</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `staff` ORDER BY `position_id`, `first_name`, `last_name`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="text-sm text-center font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo $row['photo']; ?>" class="avatar avatar-sm text-center me-2">
                                            <?php echo $row['first_name'] . " " . $row['last_name']; ?>
                                        </div>
                                    </td>
                                    <!-- Position -->
                                    <td class="text-sm text-center font-weight-normal">
                                        <?php
                                        $position_id = $row['position_id'];
                                        $sql = "SELECT * FROM `school_post` WHERE `position_id` = '$position_id'";
                                        $positions = mysqli_query($conn, $sql);
                                        $position = mysqli_fetch_assoc($positions);

                                        echo $position['position_name'] ?? '';
                                        ?>
                                    </td>

                                    <!-- Phone Number -->
                                    <td class="text-sm text-center font-weight-normal">
                                        <?php echo substr($row['phone_number'], 0, 3) . '-' . substr($row['phone_number'], 3, 4) . '-' . substr($row['phone_number'], 7); ?>
                                    </td>

                                    <!-- Username -->
                                    <td class="text-sm text-center font-weight-normal"><?php echo $row['username']; ?></td>

                                    <!-- Subject -->
                                    <td class="text-sm text-center font-weight-normal">
                                        <?php
                                        $subject_id = $row['subject_id'];
                                        $sql = "SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id' ";
                                        $subjects = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($subjects) > 0) {
                                            $subject = mysqli_fetch_assoc($subjects);

                                            echo $subject['subject_name'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        <?php
                                        $class_id = $row['class_id'];
                                        $sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id' ";
                                        $classes = mysqli_query($conn, $sql);
                                        $class = mysqli_fetch_assoc($classes);

                                        echo $class['class_name'] ?? '';
                                        ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        <form action="admin-view-staff.php" method="get">
                                            <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                                            <button type="submit" class="border-0 bg-gradient-light rounded text-sm">View</button>
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