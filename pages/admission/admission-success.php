<?php
    include "../../../../config/database.php";

    session_start();
    $first_name = $_SESSION['applicant']['first_name'];
    $birth_date = $_SESSION['applicant']['birth_date'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../includes/header.php"; ?>
    <title>Registration Successful</title>
</head>

<body class="bg-info-soft" style="font-family: 'Open Sans'">
    <main>
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header pb-0 text-center">
                                <h6 class="text-success mb-0">Registration Successful <i class="fa fa-check"></i></h6>
                            </div>
                            <hr class="horizontal bg-light">
                            <div class="card-body">
                                <p>Your registration is successful and will be processed. <br> Kindly check your
                                    admission status after 24 hours here: <a href="../admission/status-admission.php"
                                        class="text-decoration-underline">Admission Status</a></p>
                                <?php
                                $sql = "SELECT * FROM `applicants` WHERE `first_name` = '$first_name' AND `birth_date` = '$birth_date'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <p>Your <span class="text-warning">Application Code</span> is :
                                    <strong><?php echo $row['application_code']; ?></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer  -->
    <?php include "../../includes/scripts.php";?>
</body>

</html>