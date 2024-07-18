<?php


?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="mb-0 text-gradient text-warning">Alulmni Table</h5>
                    <p class="text-sm mb-0">
                        Here is the complete list of Alumni. You can select how many entries to display on
                        this page.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                    Full Name</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Gender</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Phone Number</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Date of Birth</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    State</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    LGA</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Index No</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($_SESSION['staff']['position_id'] == 1) {
                                $sql = "SELECT * FROM `alumni` ORDER BY `first_name` ASC, `second_name` ASC, `index_no` ASC, `last_name` ASC, `gender` ASC, `state` ASC";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td class="align-middle text-left text-sm">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php echo $row['first_name'] . '&nbsp;' . $row['second_name'] . '&nbsp;' . $row['last_name']; ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php echo $row['gender']; ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php echo $row['phone_number']; ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php
                                                $date_of_birth = date('d-M-Y', strtotime($row['date_of_birth']));
                                                echo ucfirst($date_of_birth);
                                                ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php echo $row['state']; ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php echo $row['lga']; ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold text-capitalize">
                                                <?php echo $row['index_no']; ?>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <form action="admin-view-alumni.php" method="get">
                                                <input type="hidden" name="alumni_id" value="<?php echo $row['alumni_id']; ?>">
                                                <button type="submit" class="badge badge-sm rounded bg-gradient-light text-dark border-0">View</button>
                                            </form>
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