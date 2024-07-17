<div class="container-fluid pt-3">
    <div class="row removable">
        <div class="col-xl-3 col-sm-6">
            <div class="card mb-3 mb-xl-0">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Staff</p>
                                <h6 class="font-weight-bolder mb-0">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS `total_staff` FROM `staff` ";
                                    $total = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($total);
                                    ?>
                                    <?php echo $row['total_staff']; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card mb-3 mb-xl-0">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Students</p>
                                <h6 class="font-weight-bolder mb-0">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS `total_students` FROM `students` ";
                                    $total = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($total);
                                    ?>
                                    <?php echo $row['total_students']; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="col-xl-3 col-sm-6">
            <div class="card mb-3 mb-xl-0">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Alumni</p>
                                <h6 class="font-weight-bolder mb-0">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS `total_alumni` FROM `alumni` ";
                                    $total = mysqli_query($conn, $sql);
                                    $classes = mysqli_fetch_assoc($total);
                                    ?>
                                    <?php echo $classes['total_alumni']; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Payroll</p>
                                <h6 class="font-weight-bolder mb-0">
                                    <?php
                                    $sql = "SELECT SUM(`salary`) AS `totaL_balance` FROM `staff`";
                                    $total = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($total);
                                    ?>
                                    <?php echo '&#8358;' . number_format($row['totaL_balance'], 2); ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "inc/student-table.php"; ?>
<?php include_once "inc/staff-table.php"; ?>
<!-- Chart -->
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-lg-8">
            <div class="">
                <?php
                $sql = "SELECT * FROM `blogs` ORDER BY `blog_timestamp` DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="">
                            <div class="card">
                                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <a href="javascript:;" class="d-block">
                                        <img src="<?php echo $row['blog_thumbnail'] ?>" style="height: 300px; width: 100%;object-fit:cover;" class="img-fluid border-radius-lg">
                                    </a>
                                </div>

                                <div class="card-body pt-3">
                                    <span class="text-gradient text-warning text-uppercase text-xs font-weight-bold my-2"><?php echo $row['blog_category']; ?></span>
                                    <a href="javascript:;" class="card-title h5 d-block text-darker">
                                        <?php echo $row['blog_title']; ?>
                                    </a>
                                    <p class="card-description mb-4">
                                        <?php echo $row['blog_content']; ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="author align-items-center">
                                            <?php

                                            $staff_id = $row['staff_id'];
                                            $sql = "SELECT * FROM `staff` WHERE `staff_id` = '$staff_id'";
                                            $staff_result = mysqli_query($conn, $sql);
                                            $staff = mysqli_fetch_assoc($staff_result);
                                            ?>

                                            <img src="<?php echo $staff['photo']; ?>" class="avatar shadow">

                                            <div class="name ps-3">
                                                <span><?php echo $staff['first_name'] . " " . $staff['last_name']; ?></span>
                                                <div class="stats">
                                                    <small><?php echo date("j F, Y h:m", strtotime($row['blog_timestamp'])); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center text-secondary">No blogs found.</p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-lg-4">
            <!--  -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Notifications</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="badge badge-sm rounded bg-gradient-light text-dark border-0" href="admin-view-notification.php">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border-radius-lg p-3 pt-0">
                    <?php
                    $sql = "SELECT * FROM `admin_notification` ORDER BY `not_timestamp` DESC LIMIT 4";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <a href="admin-view-notification.php">
                                <div class="d-flex mt-4">
                                    <div>
                                        <div class="icon icon-shape <?php echo $row['not_bg_color']; ?> shadow text-center border-radius-md shadow-none">
                                            <i class="<?php echo $row['not_icon']; ?> <?php echo $row['not_icon_color']; ?> text-lg text-gradient opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="numbers">
                                            <h6 class="mb-1 text-dark text-sm"><?php echo $row['not_title']; ?></h6>
                                            <span class="text-sm"><?php echo date("j F, Y h:m", strtotime($row['not_timestamp'])); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                    <?php
                        }
                    } else {
                        echo "<p class='text-center text-sm'>No notification available.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card z-index-2">
                <div class="card-header p-3 pb-0">
                    <h6>Bar chart</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="bar-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>