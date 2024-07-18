<?php
session_start();
require_once "../../config/database.php";

if (isset($_SESSION['staff'])) {
    $position_id = $_SESSION['staff']['position_id'];
} else {
    header("Location: admin-logout.php");
    exit;
}

$class_id = $_SESSION['staff']['class_id'];
$sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
$result = mysqli_query($conn, $sql);
$class = mysqli_fetch_assoc($result);

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
            bottom: -30px;
        }
    </style>

</head>

<body class="g-sidenav-show bg-info-soft">
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
    <?php
        include "inc/admin-sidebar.php";
    ?>
    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php";
        if (in_array($position_id, [1, 2, 3])) {
            include 'access-level-1.php';
        } 
        else if(in_array($position_id, [0, 4])) {
            include 'access-level-2.php';
        }
        include "inc/admin-footer.php";
        ?>
    </main>


    <script src="../../js/plugins/datatables.js"></script>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <script src="../../js/plugins/chartjs.min.js"></script>
    <script src="inc/chart.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <script src="../../js/plugins/countup.min.js"></script>
    <!-- <script src="js/script.js"></script> -->
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