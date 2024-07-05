<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-gradient text-info">Student's Table</h5>
                    <p class="text-sm mb-0">
                        Below is a concise student list. Click 'View' to see complete details.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                    Full Name</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Admission Number</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Class</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Gender</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    State</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    LGA</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($_SESSION['staff']['position_id'] == 1) {
                                $sql = "SELECT * FROM `students` ORDER BY `class_id` DESC, `first_name` ASC, `second_name` ASC, `last_name` ASC, `gender` ASC, `state` ASC";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <!-- Fullname -->
                                        <td class="text-sm text-left font-weight-normal">
                                            <?php echo $row['first_name'] . '&nbsp;' . $row['second_name'] . '&nbsp;' . $row['last_name'];; ?>
                                        </td>
                                        <!-- Admission Number -->
                                        <td class="text-sm text-center font-weight-normal">
                                            <?php echo $row['admission_id']; ?>
                                        </td>
                                        <!-- Class -->
                                        <td class="text-sm text-center font-weight-normal">
                                            <?php
                                            $class_id = $row['class_id'];
                                            $sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
                                            $res = mysqli_query($conn, $sql);
                                            $class = mysqli_fetch_assoc($res);
                                            echo $class['class_name'];
                                            ?>
                                        </td>
                                        <td class="text-sm text-center font-weight-normal"><?php echo $row['gender']; ?></td>
                                        <td class="text-sm text-center font-weight-normal"><?php echo $row['state']; ?></td>
                                        <td class="text-sm text-center font-weight-normal"><?php echo $row['lga']; ?></td>
                                        <td class="text-sm text-center font-weight-normal">
                                            <a href="admin-view-student.php?student_id=<?php echo $row['student_id']; ?>" class="">View</a>
                                        </td>
                                    </tr>

                                <?php
                                }
                            } else if ($_SESSION['staff']['position_id'] == 2) {
                                $class_id = $_SESSION['staff']['class_id'];
                                $sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
                                $result = mysqli_query($conn, $sql);
                                $class = mysqli_fetch_assoc($result);

                                $sql = "SELECT * FROM `students` WHERE `class_id` = '$class_id' ORDER BY `first_name` ASC, `second_name` ASC, `last_name` ASC";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td class="text-sm text-left font-weight-normal">
                                            <?php echo $row['first_name'] . '&nbsp;' . $row['second_name'] . '&nbsp;' . $row['last_name'];; ?>
                                        </td>
                                        <td class="text-sm text-center font-weight-normal"><?php echo $class['class_name']; ?>
                                        </td>
                                        <td class="text-sm text-center font-weight-normal"><?php echo $row['gender']; ?></td>
                                        <td class="text-sm text-center font-weight-normal"><?php echo $row['state']; ?></td>
                                        <td class="text-sm text-center font-weight-normal"><?php echo $row['lga']; ?></td>
                                        <td class="text-sm text-center font-weight-normal">
                                            <a href="admin-view-student.php?student_id=<?php echo $row['student_id']; ?>" class="">View</a>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>