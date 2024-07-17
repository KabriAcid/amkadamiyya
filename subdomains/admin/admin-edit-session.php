<?php
    require_once "create.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Session</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php include "inc/admin-sidebar.php"; ?>

    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">School Sessions List</h5>
                            <p>Here is a list of active and inactive school sessions.</p>
                        </div>
                        <hr class="horizontal gray-light mt-0">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" colspan="5">School Sessions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `school_sessions` ORDER BY `session_id` DESC";
                                        $result = mysqli_query($conn, $sql);
                                        $count = 1;
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td class="px-4 align-middle text-center"><?php echo $count;  ?></td>
                                                    <td class="px-4 align-middle text-center" colspan="5"><?php echo $row['session_name'];  ?></td>
                                                </tr>
                                        <?php
                                                $count++;
                                            }
                                        } else {
                                            echo "<p class='text-center'>No school sessions found.</p>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- School Term List -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0">School Term List</h5>
                            <p>Here is a list of active and inactive school terms.</p>
                        </div>
                        <hr class="horizontal gray-light mt-0">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" colspan="5">School Terms</th>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `school_terms`";
                                        $result = mysqli_query($conn, $sql);
                                        $count = 1;
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td class="px-4 align-middle text-center"><?php echo $count;  ?></td>
                                                    <td class="px-4 align-middle text-center" colspan="5"><?php echo $row['term_name'];  ?></td>
                                                    <td class="px-4 align-middle text-center"><?php echo $row['active_term'];  ?></td>
                                                </tr>
                                        <?php
                                                $count++;
                                            }
                                        } else {
                                            echo "<p class='text-center'>No school terms found.</p>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modify School Session -->
                <div class="col-md-4 mt-3 mt-md-0">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6 class="mb-0 text-info">Modify School Session or Term </h6>
                            <p class="mb-0">Here you can modify school sessions or change school terms.</p>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <label for="Current Session">Session Year</label>
                                <div class="input-group">
                                    <!-- SELECT SESSION -->
                                    <select name="session_id" class="form-control" required>
                                        <?php
                                        $sql = "SELECT * FROM `school_sessions`";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['session_id'] ?>"><?php echo $row['session_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mt-2"></div>
                                <label for="Current Session">Session Term</label>
                                <div class="input-group">
                                    <!-- SELECT TERM -->
                                    <select name="term_id" class="form-control" required>
                                        <?php
                                        $sql = "SELECT * FROM `school_terms`";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['term_name'] ?>"><?php echo $row['term_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mt-3 text-end">
                                    <input type="submit" name="modifySession" value="Modify" class="btn bg-gradient-info">
                                </div>
                            </form>

                        </div>
                    </div>

                    <!-- Add School New Sessions  -->
                    <div class="card mt-3">
                        <div class="card-header pb-0">
                            <h6 class="mb-0 text-success">Add New School Session</h6>
                            <p class="mb-0">Here you can add new school sessions and terms.</p>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <label for="Current Session">Session Year</label>
                                <div class="input-group">
                                    <input type="text" name="session_id" placeholder="Add New Session Year" class="form-control">
                                </div>
                                <div class="mt-3 text-end">
                                    <input type="submit" name="addSessionYear" value="Add Session" class="btn bg-gradient-success">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php include 'inc/admin-footer.php';  ?>
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