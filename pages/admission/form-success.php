<?php
include "../../config/database.php";

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
                            <hr class="horizontal dark">
                            <div class="card-body">
                                <p>Your registration is successful and will be processed. <br> Kindly check your admission status after 24 hours here: <a href="../admission/status-admission.php" class="text-decoration-underline">Admission Status</a></p>
                                <?php
                                $sql = "SELECT * FROM `applicants` WHERE `first_name` = '$first_name' AND `birth_date` = '$birth_date'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <p>Your Application Code is : <strong><?php echo $row['application_code']; ?></strong></p>
                                <p class="text-secondary text-sm mt-3">Please copy and save your <span class="text-warning">Application Code</span>. You will need it to check your admission status when you return.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer  -->
        <?php include "../../includes/footer.php" ?>
    </main>

    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php include "../../includes/scripts.php"; ?>

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
</body>

</html>

<!-- <p id="textToCopy">This is the text to be copied.</p>
<i class="icon" id="copyIcon">&#128203; Copy Text</i> Using a Unicode clipboard icon -->

<script>
    /* document.getElementById('copyIcon').addEventListener('click', function() {
        // Get the text from the paragraph element
        const textToCopy = document.getElementById('textToCopy').innerText;

        // Use the Clipboard API to write the text
        navigator.clipboard.writeText(textToCopy)
            .then(() => {
                alert('Text copied to clipboard!');
            })
            .catch(err => {
                console.error('Failed to copy text: ', err);
            });
    });*/
</script>