<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../includes/header.php"; ?>
    <title>Admission includements</title>
</head>

<body class="bg-info-soft" style="font-family: 'Open Sans'">
    <?php include "../../includes/navbar.php"; ?>
    <main>
        <section>
            <div class="container py-5">
                <h3 class="header mb-3">Admission Process</h3>
                <p>To avoid delays in processing, application review time, and admission decisions, please ensure your child's application is complete with all supporting documents before submission.</p>

                <p>Only complete applications will be considered for admission. If any required documents are missing, your child's application will be deemed incomplete and will not be processed until all documents have been received.</p>
                
                <p>Please note that applications may be placed on a waiting list if submitted mid-session or if incomplete. Applicants will be called for a Physical Entrance Assessment Test <strong>(PEAT)</strong>. If successful, an ID or Registration Number will be issued. Failure to pass the <strong>PEAT</strong> may result in a Denial of Placement <strong>(DOP)</strong> for the intended class, and applicants may be referred to a more suitable academic pace.</p>
                
                <p>PS: After submitting your application form, you will receive an <b class="text-success">Application Code</b> to check your admission status.</p>
                
                <p><strong>Note:</strong> Ensure that all information provided in the application form is accurate and up to date to avoid any processing delays.</p>
                
                <p><strong>Reminder:</strong> Regularly check your email for updates and notifications regarding your application status.</p>


                <p>Below are the requirements for application:</p>
                <div>
                    <ul>
                        <li class="mb-2">A recent 3" x 4" headshot photograph of the applicant (maximum file size 2MB).</li>
                        <li class="mb-2">Applicant's date of birth.</li>
                        <li class="mb-2">Parent's email address and phone number.</li>
                        <li class="mb-2">Parent's marital status and occupation.</li>

                    </ul>
                </div>
                <div class="d-lg-none">
                    <div class="w-50 m-auto">
                        <a href="admission-apply.php" class="w-100 d-block btn bg-gradient-dark me-1 mt-3">Apply Now</a>
                    </div>
                </div>
                <!--  -->
                <div class="d-lg-block d-none">
                    <a href="admission-apply.php" class="w-auto btn bg-gradient-dark me-1 mt-3">Apply Now</a>
                </div>
            </div>
        </section>
    </main>
    <?php include "../../includes/scripts.php";?>
</body>

</html>