<?php
require_once "../../config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../includes/header.php"; ?>
    <title>Check Admission Status</title>
</head>

<body class="bg-info-soft" style="font-family: 'Open Sans'">
    <?php include "../../includes/navbar.php"; ?>
    <main>
        <section>
            <div class="container pt-5">
                <h3 class="header">Admission Status</h3>
                <p>Please enter the <span class="text-success">Application Code</span> to check for admission status.</p>
                <form action="admission-process.php" method="post">
                    <div class="text-center py-2 mt-3">
                        <div class="mx-auto">
                            <div class="d-flex">
                                <div class="input-group mb-4">
                                    <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    <input class="form-control" placeholder="Enter Application Code" type="text" name="application_code" required tabindex="1">
                                    <input type="submit" name="checkStatus" class="btn bg-gradient-dark w-auto me-1 mb-0" style="border-radius: 0px 4px 4px 0px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_SESSION['infoMessage'])) {
                    echo '<div class="mt-5"><p class="text-center lead text-warning">' . $_SESSION['infoMessage'] . '</p></div>';
                    unset($_SESSION['infoMessage']);
                }
                if (isset($_SESSION['successMessage'])) {
                    echo '<div class="mt-5"><p class="text-center lead"><span class="text-success">Congratulations! </span>Dear ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . ', your admission has been approved.</p><div class="d-flex justify-content-center"><button type="button" onclick="window.print();" class="btn btn-success">PRINT</button></div></div>';
                    unset($_SESSION['successMessage'], $_SESSION['first_name'], $_SESSION['last_name']);
                }
                if (isset($_SESSION['errorMessage'])) {
                    echo '<div class="mt-5"><p class="text-center lead text-danger">' . $_SESSION['errorMessage'] . '</p></div>';
                    unset($_SESSION['errorMessage']);
                }
                ?>
            </div>
        </section>
    </main>
    <!-- Footer  -->
    <?php include "../../includes/scripts.php"; ?>
</body>

</html>
