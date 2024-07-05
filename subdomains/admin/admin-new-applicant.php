<?php
    session_start();
    include "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Applicants</title>
    <?php include "./inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "./inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "./inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">New Applicants</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">#</th>
                                    <th class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">Name</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Application Code</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Enrolling Class</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Birth Date</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Timestamp</th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" spellcheck="false">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `applicants` WHERE `admission_status` = 0 ORDER BY `timestamp` DESC";
                                $result = mysqli_query($conn, $sql);
                                $count = 1;

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo $count; ?></span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../pages/admission/<?php echo $row['photo']; ?>" class="avatar avatar-sm me-3" style="object-fit: cover;">
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <h6 class="mb-0 text-sm text-capitalize text-left"><?php echo $row['first_name'] . " " . $row['second_name'] . " " . $row['last_name']  ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0"><?php echo $row['application_code']; ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo $row['enrolling_class']; ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo $row['gender']; ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo date("j F, Y", strtotime($row['birth_date'])); ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo $row['timestamp']; ?></span>
                                            </td>

                                            <td class="align-middle">
                                                <a href="admin-view-applicant.php?applicant_id=<?php echo $row['applicant_id']; ?>" class="text-secondary text-center d-block font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                } else {
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="align-middle text-center py-5" colspan="8">
                                        <span class="text-secondary text-xs font-weight-bold text-capitalize"><?php echo "No new applicants found."; ?></span>
                                    </td>
                                </tr>
                            </tfoot>
                        <?php
                                }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php include './inc/admin-footer.php';  ?>
</main>

    <script src="../../js/core/popper.min.js"></script>
    <script src="../../js/core/bootstrap.min.js"></script>
    <script src="../../js/plugins/chartjs.min.js"></script>
    <script src="../../js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>

    <script src="../../js/plugins/dragula/dragula.min.js"></script>
    <script src="../../js/plugins/jkanban/jkanban.js"></script>

    <script src="../../js/soft-ui-dashboard.min3f71.js"></script>

</body>

</html>