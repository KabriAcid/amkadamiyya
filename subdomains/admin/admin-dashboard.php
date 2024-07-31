<?php
session_start();
require_once "../../config/database.php";

if (isset($_SESSION['staff'])) {

    // Determining the session variable
    $staff_id = $_SESSION['staff']['staff_id'];
    $class_id = $_SESSION['staff']['class_id'];
    $position_id = $_SESSION['staff']['position_id'];

    print_r($_SESSION['staff']);


    $stmt = $conn->prepare("SELECT * FROM `staff` WHERE `staff_id` = ?");
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $staff = $result->fetch_assoc();

    $sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
    $result = mysqli_query($conn, $sql);
    $class = mysqli_fetch_assoc($result);

    $sql = $conn->prepare("SELECT * FROM `school_position` WHERE `position_id` = ?");
    $sql->bind_param("i", $position_id);
    $sql->execute();
    $positions = $sql->get_result();
    $position = $positions->fetch_assoc();

    $position_number = $position['position_number'];
} else {
    header("Location: admin-logout.php");
    exit;
}


// Function to find total count of rows in a given table
function find_total($conn, $table)
{
    $sql = "SELECT COUNT(*) AS `total` FROM `$table`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Retrieve totals
$totals = [
    'students' => find_total($conn, 'students'),
    'staff' => find_total($conn, 'staff'),
    'alumni' => find_total($conn, 'alumni'),
    'applicants' => find_total($conn, 'applicants')
];

// Determine the maximum total value for scaling the bar heights
$max_total = max($totals);
$scale_factor = 300 / $max_total; // Adjust the height scale factor based on the container height (300px)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "inc/admin-header.php"; ?>
    <title>Dashboard</title>
    <style>
        .bar-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            width: 100%;
            height: 300px;
            /* Adjust height as needed */
        }

        .bars {
            width: 40px;
            border-radius: 3px;
            background-color: #f7f7f7;
            transition: height 1s ease-in-out;
            animation-name: barAnimation;
            animation-duration: 3.5s;
            animation-iteration-count: 1;
            animation-timing-function: ease-in;
        }

        @keyframes barAnimation {
            to {
                height: var(--bar-height);
            }
        }

        #bar-students {
            --bar-height: <?php echo find_total($conn, 'students') . 'px'; ?>;
        }

        #bar-staff {
            --bar-height: <?php echo find_total($conn, 'staff') . 'px'; ?>;
        }

        #bar-alumni {
            --bar-height: <?php echo find_total($conn, 'alumni') . 'px'; ?>;
        }

        #bar-applicants {
            --bar-height: <?php echo find_total($conn, 'applicants') . 'px'; ?>;
        }

        .points {
            height: 100%;
            position: relative;
            bottom: -20px;
        }
    </style>

</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    include "inc/admin-sidebar.php";
    ?>
    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php";

        if (in_array($position_number, [1])) {
            require 'dashboard-1.php';
        } else if (in_array($position_number, [2])) {
            require 'dashboard-2.php';
        } else if (in_array($position_number, [3])) {
            require 'dashboard-3.php';
        } else if (in_array($position_number, [4])) {
            require 'dashboard-4.php';
        } else if (in_array($position_number, [5])) {
            require 'dashboard-5.php';
        } else if (in_array($position_number, [6])) {
            require 'dashboard-6.php';
        } else if (in_array($position_number, [7])) {
            require 'dashboard-7.php';
        } else if (in_array($position_number, [8])) {
            require 'dashboard-8.php';
        } else {
            require 'dashboard-default.php';
        }
        include "inc/admin-footer.php";
        ?>
    </main>


    <script src="../../js/plugins/datatables.js"></script>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <script src="../../js/plugins/countup.min.js"></script>

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
    ?>

    <script>
        // Pass the totals to JavaScript
        const totals = <?php echo json_encode($totals); ?>;

        // Function to start count up animation
        function startCountUp(id) {
            const element = document.getElementById(id);
            const countTo = element.getAttribute("countTo");
            const countUp = new CountUp(id, countTo);
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }

        // Start count up for each section
        ['total-students', 'total-staff', 'total-alumni', 'total-applicants'].forEach(startCountUp);

        // Animate bars to rise from the bottom
        function animateBars() {
            document.querySelectorAll('.bars').forEach(bar => {
                bar.style.height = getComputedStyle(bar).getPropertyValue('--bar-height');
            });
        }

        // Call function to animate bars after page load
        window.onload = animateBars;
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
                searchable: true,
                fixedHeight: true,
                perPage: 10, // Default number of entries per page
                labels: {
                    placeholder: "Search...", // Placeholder text for search input
                    noRows: "No entries found", // Text shown when no rows found
                    info: "Showing {start} to {end} of {rows} entries" // Info text shown below the table
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            const dataTableBasic = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: true,
                perPage: 10, // Default number of entries per page
                labels: {
                    placeholder: "Search...", // Placeholder text for search input
                    noRows: "No entries found", // Text shown when no rows found
                    info: "Showing {start} to {end} of {rows} entries" // Info text shown below the table
                }
            });
        });
    </script>


</body>

</html>