<?php
require_once "_CREATE.php";
// Redirect function for convenience
function redirect($url)
{
    header("Location: $url");
    exit();
}
// Check if staff position ID is set
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];

    if (!in_array($position_id, [1, 2, 3, 5])) {
        redirect('admin-logout.php');
    }
} else {
    redirect('admin-logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Data</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    include "inc/admin-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h6 class="text-dark text-gradient">Manage Data</h6>
                            <p class="mb-0 text-sm">Here you can add and update various data entries such as bank names, disciplines, and qualifications.</p>
                        </div>
                        <hr class="horizontal dark my-0">
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="bank_name" class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name" placeholder="e.g Fidelity Bank" required>
                                        </div>
                                        <div class="form-group mb-3 text-end">
                                            <button type="submit" class="btn bg-gradient-success btn-sm" name="addbankname">Add</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="discipline" class="form-label">Disciplines</label>
                                            <input type="text" class="form-control" name="discipline" placeholder="e.g Statistics" required>
                                        </div>
                                        <div class="form-group mb-3 text-end">
                                            <button type="submit" class="btn bg-gradient-success btn-sm" name="adddiscipline">Add</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="discipline" class="form-label">Qualifications</label>
                                            <input type="text" class="form-control" name="qualification" placeholder="e.g Bsc." required>
                                        </div>
                                        <div class="form-group text-end">
                                            <button type="submit" class="btn bg-gradient-success btn-sm" name="addqualification">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h6 class="text-dark text-gradient">Student Levy</h6>
                            <p class="mb-0 text-sm">Here you can add and update student levy details, including various fees and charges applicable to students.</p>
                        </div>
                        <hr class="horizontal dark my-0">
                        <!-- Card Body with Form -->
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <!-- Form Group for Item -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="item" class="form-label">Item</label>
                                            <input type="text" class="form-control" name="item" placeholder="e.g. Medical Fee" required>
                                        </div>
                                    </div>
                                    <!-- Form Group for Amount -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="item amount" class="form-label">Item Amount</label>
                                            <input type="number" class="form-control" name="item_amount" placeholder="e.g. 1000" required>
                                        </div>
                                    </div>
                                    <!-- Form Group for Section -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="section" class="form-label">Section</label>
                                            <select class="form-control" name="section" required>
                                                <option value="" class="text-center">--Select Section--</option>
                                                <?php

                                                // Fetch sections from the database
                                                $sql = "SELECT section_id, name FROM general_section WHERE name != 'null'";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option value='" . $row['section_id'] . "'>" . htmlspecialchars($row['name']) . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''>No sections available</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-gradient-success btn-sm" name="addstudentlevy">Add</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <?php include "inc/admin-footer.php"; ?>
    </main>


    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <?php
    if (isset($_SESSION['success_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Successful",
                    text: "<?php echo $_SESSION['success_message']; ?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'success'
                })
            })
        </script>
    <?php
        unset($_SESSION['success_message']);
    } else if (isset($_SESSION['error_message'])) {
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