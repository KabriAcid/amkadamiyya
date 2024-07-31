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
    $sql = "SELECT position_number FROM school_position WHERE position_id = '$position_id'";
    $postions = mysqli_query($conn, $sql);
    $position = mysqli_fetch_assoc($postions);
    $position_number = $position['position_number'];

    if (!in_array($position_number, [1, 2, 3, 5])) {
        redirect('admin-logout.php');
    }
} else {
    redirect('admin-logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New Subject</title>
    <?php include "inc/admin-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
     <?php
        include "inc/admin-sidebar.php";
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <div class="container-fluid pt-3">

            <div class="row mb-4">
                <div class="col-lg-8">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="mb-0 text-gradient text-primary">Subjects Table</h5>
                            <p class="text-sm mb-0">
                                Here is the complete list of subject offered. You can select how many entries to display
                                on
                                this page.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th
                                            class="text-uppercase text-left text-secondary text-xxs font-weight-bolder opacity-7">
                                            S/N</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Subject Name</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `subjects`";
                                    $result = mysqli_query($conn, $sql);
                                    $count = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td class="text-sm font-weight-normal"><?php echo $count; ?></td>
                                            <!-- Subject name -->
                                            <td class="text-sm text-center font-weight-normal">
                                                <?php echo $row['subject_name'] ?>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header mb-0">
                            <h6 class="text-dark">Add New Subject</h6>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control"
                                        placeholder="Enter subject name" required>
                                </div>
                                <div class="mt-3 text-end">
                                    <button type="submit" class="btn bg-gradient-success" name="addSubject">Add Subject</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php";?>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    
    <script>
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
        
    </script>

    
<?php
    if (isset($_SESSION['success_message'])) {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: "Successful",
                    text: "<?php echo $_SESSION['success_message'];?>",
                    timer: 3000,
                    showConfirmButton: true,
                    icon: 'success'
                })
            })
        </script>
        <?php
        unset($_SESSION['success_message']);
    } else if(isset($_SESSION['error_message'])){
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: "Error",
                    text: "<?php echo $_SESSION['error_message'];?>",
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