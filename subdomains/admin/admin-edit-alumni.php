<?php
include "admin-process.php";

if (isset($_GET['alumni_id'])) {
    $alumni_id = $_GET['alumni_id'];
    $sql = "SELECT * FROM `alumni` WHERE `alumni_id` = '$alumni_id'";
    $result = mysqli_query($conn, $sql);
    $alumni = mysqli_fetch_assoc($result);
} else {
    header('Location: alumni-list.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Alumni</title>
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
                <div class="col-md-6">
                    <!-- Profile Information -->
                    <form action="" method="post">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="text-gradient text-warning">Personal Information</h6>
                                <p class="mb-0">Here you can modify or change a alumni's personal information.</p>
                            </div>
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <!-- Form inputs groups -->
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label>First Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="first_name" placeholder="First Name"
                                                value="<?php echo ucfirst($alumni['first_name']); ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label class="null-label">Middle Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="second" placeholder="Middle Name"
                                                value="<?php echo ucfirst($alumni['second_name']); ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Last Name</label>
                                        <div class="input-group mb-4">
                                            <input type="text" name="last_name" placeholder="Last Name"
                                                value="<?php echo ucfirst($alumni['last_name']); ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!--  -->
                                    <!--  -->
                                    <div class="col-12">
                                        <label>State of Origin</label>
                                        <div class="input-group mb-4">
                                            <select required onchange="toggleLGA(this);" name="state" id="state"
                                                class="form-select">
                                                <option value="" selected="selected"><?php echo $alumni['state']; ?></option>
                                                <?php
                                                $sql = "SELECT * FROM nigerian_states;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($state = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <option value="<?php echo $state['state_name']; ?>">
                                                        <?php echo $state['state_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Local government Area</label>
                                        <div class="input-group mb-4">
                                            <select name="lga" id="lga" class="form-select select-lga"
                                                required>
                                                <option value="">LGA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-12">
                                        <label>Gender</label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--  -->
                                    
                                    <!--  -->
                                </div>
                            </div>
                            <!--  -->
                            <div class="card-footer text-end">
                                <input type="submit" value="SUBMIT" name="updateStudent"
                                    class="btn bg-gradient-dark mb-0">
                            </div>
                        </div>
                    </form>
                </div>


                <!--Column 2  -->
                <div class="col-md-6 mt-3 mt-md-0">
                    <!-- Delete Account -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-gradient text-dark">Erase alumni</h6>
                            <p class="mb-0 text-danger">Once you erase alumni, all data will be removed from the
                                database.</p>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="text-end">
                                    <a href="?delete_alumni=<?php echo $alumni['alumni_id'];?>" class="btn bg-gradient-danger">Erase alumni</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EOF card -->
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?></body>

</html>