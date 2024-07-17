<?php
session_start();
require_once "../../config/database.php";

if (isset($_SESSION['student'])) {
    $class_id = $_SESSION['student']['class_id'];
    $student_id = $_SESSION['student']['student_id'];
} else {
    header('Location: student-logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Generate Invoice</title>
    <?php include "inc/student-header.php"; ?>
</head>

<body class="g-sidenav-show bg-info-soft">
    <?php
    include "inc/student-sidebar.php";
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <?php require "inc/student-navbar.php"; ?>
        <!-- Profile Information -->
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-8">
                    <form class action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <img class="mb-2 w-25 p-2 avatar avatar-xl" src="../../assets/favicon/favicon.png" alt="Logo">
                                <div class="row">
                                    <div class="col-8 col-lg-7">
                                        <h6 class="text-start mb-0">
                                            Amkadamiyya School Jalingo
                                        </h6>
                                        <span class="mb-0 text-secondary">Samunaka Junction, Along Wuro Sembe Road.</span>
                                    </div>
                                    <div class="col-4 col-lg-5 text-end">
                                        <span class="mb-0 text-secondary text-sm">
                                            Billed for:
                                        </span>
                                        <h6 class="mb-0">
                                            <?php echo $_SESSION['student']['admission_id']; ?>
                                        </h6>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <hr class="horizontal gray-light">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="mb-0 text-start text-secondary text-sm">
                                            Invoice ID:
                                        </span>
                                        <h6 class="text-start mb-0">
                                            <?php echo "AMK_" . substr(rand(0, time()), 0, 6); ?>
                                        </h6>
                                    </div>
                                    <div>
                                        <span class="mb-0 text-start text-secondary text-sm">
                                            Invoice Date:
                                        </span>
                                        <h6 class="text-start mb-0">
                                            <?php echo date('d-M-Y'); ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table text-right">
                                                <thead class="bg-default">
                                                    <tr>
                                                        <th scope="col" class="pe-2 text-start ps-2">#</th>
                                                        <th scope="col" class="pe-2 text-start ps-2">Item</th>
                                                        <th scope="col" class="pe-2">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM `school_levy`;";
                                                    $result = mysqli_query($conn, $sql);
                                                    $count = 1;
                                                    $total = 0;

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                            <tr>
                                                                <td class="text-start"><?php echo $count; ?>.</td>
                                                                <td class="text-start"><?php echo $row['item']; ?></td>
                                                                <td class="ps-4" colspan="2">&#8358;<?php echo number_format($row['item_amount']); ?>.00</td>
                                                            </tr>
                                                </tbody>
                                        <?php
                                                            $total += $row['item_amount'];
                                                            $count++;
                                                        }
                                                    } else {
                                                        echo "No records found.";
                                                    }
                                        ?>
                                        <tfoot>
                                            <tr>
                                                <th colspan=2" class="font-weight-bold">Total</th>
                                                <td class="text-right h5 ps-4" colspan="3" style="font-family:'Trebuchet MS';"> &#8358;<?php echo number_format($total); ?>.00</td>
                                            </tr>
                                        </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer mt-md-5">
                                <div class="row">
                                    <div class="col-lg-5 text-left">
                                        <h5>Notice!</h5>
                                        <p class="text-secondary text-sm">If you encounter any issues related to the invoice you can contact us at: <strong>+234 3063 1546</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--  -->
                <div class="col-md-4 mt-3 mt-md-0">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Select Session <small>(Current session: 2023/2024)</small> </label>
                                        <div class="input-group mb-4">
                                            <select class="form-select" name="currentSession" required>
                                                <?php
                                                $sql = "SELECT * FROM `school_sessions`";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option selected value="<?php echo $row['session_id'] ?>"><?php echo $row['session_year']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>Select Term</label>
                                        <div class="input-group">
                                            <select class="form-select" name="currentTerm" required>
                                                <?php
                                                $sql = "SELECT * FROM `school_terms`";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $term = $row['term_name'];
                                                    global $term;
                                                ?>
                                                    <option selected value="<?php echo $row['term_id'] ?>"><?php echo $row['term_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end mt-4">
                                        <button class="btn bg-gradient-success mb-0" type="button" onclick="makePayment()">Proceed</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/student-footer.php"; ?>
    </main>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script>
        function makePayment() {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-5c0807c43d956b1b7321432a2b2f63c3-X",
                tx_ref: "<?php echo "AMK_" . substr(rand(0, time()), 0, 6); ?>",
                amount: <?php echo $total; ?>,
                currency: "NGN",
                payment_options: " ",
                customer: {
                    email: "<?php echo $_SESSION['student']['parent_email']; ?>",
                    phone_number: "<?php echo $_SESSION['student']['parent_phone_number']; ?>",
                    name: "<?php echo $_SESSION['student']['parent_first_name'] . ' ' . $_SESSION['student']['parent_last_name']; ?>",
                },
                customizations: {
                    title: "<?php echo $_SESSION['student']['first_name'] . ' ' . $_SESSION['student']['last_name'];  ?>",
                    description: "Payment for school fees",
                    logo: "http://localhost/amkad/assets/favicon/favicon.jpg",
                    callback: function(data) {
                        console.log(data);
                        var tx_ref = data.tx_ref;
                        $.ajax({
                            type: "POST",
                            url: "student-process.php",
                            data: {
                                "tx_ref": tx_ref
                            },
                            dataType: "dataType",
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }
                }
            });
        }
    </script>
    <?php include "inc/student-scripts.php"; ?>

</body>

</html>