<?php
session_start();
require_once '../../config/database.php';

// Check if staff position ID is set and retrieve section and class IDs from session
if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];
    $section_id = $_SESSION['staff']['section_id'];
    $class_id = $_SESSION['staff']['class_id'];
} else {
    header('Location: admin-logout.php');
    exit;
}

// Prepare and execute the query to get subjects for the section
$stmt = $conn->prepare('SELECT subject_id FROM section_subjects WHERE section_id = ?');
$stmt->bind_param('i', $section_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the subjects and their details
$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjectId = $row['subject_id'];
    $subjectStmt = $conn->prepare('SELECT subject_id, subject_name, uploaded FROM subjects WHERE subject_id = ?');
    $subjectStmt->bind_param('i', $subjectId);
    $subjectStmt->execute();
    $subjectResult = $subjectStmt->get_result();
    $subject = $subjectResult->fetch_assoc();
    $subjects[] = $subject;
    $subjectStmt->close();
}

// Sort subjects based on 'uploaded' status
usort($subjects, function($a, $b) {
    return $a['uploaded'] <=> $b['uploaded'];
});
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Choose Subject</title>
    <?php include "inc/admin-header.php"; ?>
</head>
<body class="g-sidenav-show bg-info-soft">
    <?php include "inc/admin-sidebar.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/admin-navbar.php"; ?>
        <!-- Main content -->
        <div class="container-fluid py-3">
            <div class="container-fluid px-0">
                <div class="card">
                    <div class="card-body">
                        <form action="admin-upload-result.php" method="get">
                            <select name="subject_id" class="form-select" required>
                                <option value="" class="text-center">-- Choose Subject --</option>
                                <?php foreach ($subjects as $subject) { ?>
                                    <option value="<?php echo $subject['subject_id']; ?>">
                                        <?php echo htmlspecialchars($subject['subject_name']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="form-group mb-0 mt-3 text-center">
                                <input type="submit" name="chooseSubject" value="Choose" class="mb-0 btn bg-gradient-success">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Upload Table -->
                <div class="container-fluid py-3 px-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-flush" id="datatable-basic">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Prepare and execute query to get results based on class_id
                                            $resultStmt = $conn->prepare('SELECT subject_id, status FROM results WHERE class_id = ?');
                                            $resultStmt->bind_param('i', $class_id);
                                            $resultStmt->execute();
                                            $resultData = $resultStmt->get_result();
                                            $count = 1;

                                            while ($row = $resultData->fetch_assoc()) {
                                                $subject_id = $row['subject_id'];
                                                $subjectStmt = $conn->prepare('SELECT subject_name FROM subjects WHERE subject_id = ?');
                                                $subjectStmt->bind_param('i', $subject_id);
                                                $subjectStmt->execute();
                                                $subjectResult = $subjectStmt->get_result();
                                                $subject = $subjectResult->fetch_assoc();
                                                $subjectStmt->close();
                                            ?>
                                                <tr>
                                                    <!-- S/N -->
                                                    <td class="text-sm text-left font-weight-normal"><?php echo $count; ?></td>
                                                    <!-- Subject -->
                                                    <td class="text-sm text-center font-weight-normal">
                                                        <?php echo htmlspecialchars($subject['subject_name']); ?>
                                                    </td>
                                                    <!-- Upload Status -->
                                                    <td class="text-sm text-center font-weight-normal">
                                                        <span class="badge badge-sm rounded <?php echo $row['status'] == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary'; ?>">
                                                            <?php echo $row['status'] == 1 ? 'Uploaded' : 'Unuploaded'; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php
                                                $count++;
                                            }
                                            $resultStmt->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/admin-footer.php"; ?>
    </main>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/datatables.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
                searchable: true,
                fixedHeight: true,
                perPage: 25, // Default number of entries per page
                labels: {
                    placeholder: "Search...", // Placeholder text for search input
                    noRows: "No entries found", // Text shown when no rows found
                    info: "Showing {start} to {end} of {rows} entries" // Info text shown below the table
                }
            });
        });
    </script>
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
    }
    if (isset($_SESSION['error_message'])) {
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
