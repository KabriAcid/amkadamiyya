<?php
    session_start();
    include '../../../../config/database.php';
    // Check if user is logged in
   // Check if user is logged in
   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    // Redirect to login page if not logged in
    header("location: student-logout.php");
    
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include "inc/student-header.php"; ?>
</head>
<body class="g-sidenav-show">
    <?php  include "./inc/student-sidebar.php"; ?>
    <div class="main-content" id="panel">
        <nav class="navbar shadow border-radius-xl mt-3 mx-4 px-0">
            <div class="container p-2">
                <div class="d-none d-lg-block">
                    <a href="" class="navbar-brand">Dashboard</a>
                </div>
                <div class="d-lg-none">
                    <button type="button" class="navbar-toggler-icon navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav">
                        <span class="sidenav-toggler-line"></span>
                        <span class="sidenav-toggler-line"></span>
                        <span class="sidenav-toggler-line"></span>
                    </button>
                </div>
                <div>
                    <div class="d-flex align-items-center">
                        <span class="align-text-top">Hi, <?php echo $_SESSION['student']['first_name']; ?>!</span>
                        <img class="avatar avatar-sm rounded-circle mx-2" style="width: 30px;height: 30px;" src="<?php echo $_SESSION['student']['photo']; ?>">
                        <i class="fa fa-cog cursor-pointer"></i>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Invoice Container -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-8">
                    <form class action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <img class="mb-2 w-25 p-2 avatar avatar-xl" src="../../assets/favicon/favicon.jpg" alt="Logo">
                                <div class="row">
                                    <div class="col-8 col-lg-7">
                                        <h6 class="text-start mb-0">
                                            Amkadamiyya School Jalingo
                                        </h6>
                                        <span class="mb-0 text-secondary">Samunaka Junction, Along Wuro Sembe Road.</span>
                                    </div>
                                    <div class="col-4 col-lg-5 text-end">
                                        <span class="mb-0 text-secondary">
                                            Billed for:
                                        </span>
                                        <h6 class="mb-0">
                                            <?php echo $_SESSION['student']['admission_number']; ?>
                                        </h6>
                                        <span>3<sup>rd</sup> Term Fees</span>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <hr class="horizontal gray-light">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="mb-0 text-start text-secondary">
                                            Invoice ID
                                        </span>
                                        <h6 class="text-start mb-0">
                                            <?php  echo "AMK_".substr(rand(0, time()), 0, 6); ?>
                                        </h6>
                                    </div>
                                    <div>
                                        <span class="mb-0 text-start text-secondary">
                                            Invoice Date
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
                                                    $sql = "SELECT * FROM `student_levy`;";
                                                    $result = mysqli_query($conn, $sql);
                                                    $count = 1;
                                                    $total = 0;

                                                    if(mysqli_num_rows($result) > 0){
                                                        while($row = mysqli_fetch_assoc($result)){
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
                                                        
                                                    }   else {
                                                        echo "No records found.";
                                                    }
                                                    ?>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan=2" class="font-weight-bold">Total</th>
                                                        <td class="text-right h4 ps-4" colspan="3" style="font-family:'Trebuchet MS';"> &#8358;<?php echo number_format($total); ?>.00</td>
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
                                                    $sql = "SELECT * FROM `school_sessions` WHERE active_session = 1";
                                                    $result = mysqli_query($conn, $sql);

                                                    while($row = mysqli_fetch_assoc($result)){
                                                        ?>
                                                            <option selected value="<?php echo $row['session_year'] ?>"><?php echo $row['session_year']; ?></option>
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
                                                    $sql = "SELECT * FROM `school_terms` WHERE active_term = 1;";
                                                    $result = mysqli_query($conn, $sql);

                                                    while($row = mysqli_fetch_assoc($result)){
                                                        ?>
                                                            <option selected value="<?php echo $row['session_term'] ?>"><?php echo $row['session_term'] ?></option>
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
        <!-- Invoice Container -->
    </div>

    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script>
        function makePayment() {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-5c0807c43d956b1b7321432a2b2f63c3-X",
                tx_ref: "<?php  echo "AMK_".substr(rand(0, time()), 0, 6);?>",
                amount: <?php echo $total;?>,
                currency: "NGN",
                payment_options: " ",
                customer: {
                email: "<?php echo $_SESSION['student']['parent_email']; ?>",
                phone_number: "<?php echo $_SESSION['student']['parent_phoneNumber']; ?>",
                name: "<?php echo $_SESSION['student']['parent_firstName'] . ' ' . $_SESSION['student']['parent_lastName']; ?>",
                },
                customizations: {
                title: "<?php echo $_SESSION['student']['first_name'] . ' ' . $_SESSION['student']['last_name'];  ?>",
                description: "Payment for school fees",
                logo: "http://localhost/amkad/assets/favicon/favicon.jpg",
                callback: function(data){
                    console.log(data);
                    var tx_ref = data.tx_ref;
                    $.ajax({
                        type: "POST",
                        url: "student-process.php",
                        data: {
                            "tx_ref" : tx_ref
                        },
                        dataType: "dataType",
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
                }
            });
            }
    </script>
    <?php include "./inc/student-footer.php";?>
</body>
</html>