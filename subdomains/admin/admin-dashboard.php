<?php
session_start();
include "../../config/database.php";

if (!isset($_SESSION['staff'])) {
    header("Location: admin-login.php");
}
$class_id = $_SESSION['staff']['class_id'];
$sql = "SELECT * FROM `classes` WHERE `class_id` = '$class_id'";
$result = mysqli_query($conn, $sql);
$class = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "inc/admin-header.php"; ?>
    <title>Dashboard</title>
    <script src="../../js/plugins/sweetalert.min.js"></script>
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
    if ($_SESSION['staff']['position_id'] == 1) {
        include "inc/admin-sidebar.php";
    } else {
        include "inc/admin-sidebar.php";
    }
    ?>
    <!--  -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "inc/admin-navbar.php";
        if ($_SESSION['staff']['position_id'] == 1) {
            include 'access-level-1.php';
        } else {
            include 'access-level-2.php';
        }
        include "inc/admin-footer.php";
        ?>
    </main>


    <script src="../../js/plugins/datatables.js"></script>
    <script src="../../js/plugins/chartjs.min.js"></script>
    <script src="inc/chart.js"></script>
    <?php include "inc/admin-scripts.php"; ?>

    <script>
        // Bar chart
        var ctx5 = document.getElementById("bar-chart").getContext("2d");

        new Chart(ctx5, {
            type: "bar",
            data: {
                labels: ["16-20", "21-25", "26-30", "31-36", "36-42", "42+"],
                datasets: [{
                    label: "students",
                    weight: 5,
                    borderWidth: 0,
                    borderRadius: 4,
                    backgroundColor: "#3A416F",
                    data: [15, 20, 12, 60, 20, 15],
                    fill: false,
                    maxBarThickness: 35,
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: "#9ca2b7",
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: true,
                            drawTicks: true,
                        },
                        ticks: {
                            display: true,
                            color: "#9ca2b7",
                            padding: 10,
                        },
                    },
                },
            },
        });
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