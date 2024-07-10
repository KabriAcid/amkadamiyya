<?php
    session_start();
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
                        <img class="avatar avatar-sm rounded-circle mx-2" style="width: 30px;height: 30px;" src="../../pages/admission/<?php echo $_SESSION['student']['photo']; ?>">
                        <i class="fa fa-cog cursor-pointer"></i>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Info Container -->
        <div class="container-fluid pt-3">
            <div class="card card-body" id="profile">
                <div class="d-flex align-items-center">
                    <div class="">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../../pages/admission/<?php echo $_SESSION['student']['photo']; ?>" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="ms-3">
                        <div class="h-100">
                            <h5 class="mb-1 font-weight-bolder">
                                <?php echo $_SESSION['student']['first_name'] . " " . $_SESSION['student']['middle_name'] . " " . $_SESSION['student']['last_name']; ?>
                            </h5>
                            <p class="mb-0 lead text-sm">
                                <?php echo $_SESSION['student']['admission_number']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Info Container -->
        
        <!-- Profile Information -->
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div>
                                <h6>Profile Information</h6>
                            </div>
                        </div>
                        <hr class="horizontal gray-light my-1">
                        <div class="card-body">
                            <div class="row">
                                <h6 class="mb-4 text-gradient text-warning">Personal Data</h6>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">First Name: </strong>&nbsp; <?php echo ucfirst($_SESSION['student']['first_name']);?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Middle Name: </strong>&nbsp; <?php echo ucfirst($_SESSION['student']['middle_name']);?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Last Name: </strong>&nbsp; <?php echo ucfirst($_SESSION['student']['last_name']);?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Birth Date: </strong>&nbsp; <?php echo $_SESSION['student']['birth_date'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">State: </strong>&nbsp; <?php echo $_SESSION['student']['state'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">LGA: </strong>&nbsp; <?php echo $_SESSION['student']['lga'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Gender: </strong>&nbsp; <?php echo ucfirst($_SESSION['student']['gender']);?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Current Class: </strong>&nbsp; <?php echo $_SESSION['student']['active_class'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Status: </strong>&nbsp; <?php echo $_SESSION['student']['status'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Entry Date: </strong>&nbsp; <?php echo date("j F, Y", strtotime($_SESSION['student']['entry_date'])); ?>
                                </div>
                            </div>
                            <hr class="horizontal gray-light">
                            <!-- Parents Data -->
                            <div class="row">
                                <h6 class="text-gradient text-info mb-4 h6">Parent's Data</h6>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. First Name: </strong>&nbsp; <?php echo ucfirst($_SESSION['student']['parent_firstName']);?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Last Name: </strong>&nbsp; <?php echo ucfirst($_SESSION['student']['parent_lastName']);?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Email: </strong>&nbsp; <?php echo $_SESSION['student']['parent_email'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Address: </strong>&nbsp; <?php echo ucfirst($_SESSION['student']['parent_address']);?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Occupation: </strong>&nbsp; <?php echo $_SESSION['student']['parent_occupation'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Phone Number: </strong>&nbsp; <?php echo $_SESSION['student']['parent_phoneNumber'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. Alt Number: </strong>&nbsp; <?php echo $_SESSION['student']['parent_altPhone'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. State: </strong>&nbsp; <?php echo $_SESSION['student']['parent_birthState'];?>
                                </div>
                                <div class="col-xxl-4 col-6 text-sm mb-4">
                                    <strong class="text-dark">Par. LGA: </strong>&nbsp; <?php echo $_SESSION['student']['parent_birthLGA'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Invoices</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 font-weight-bold text-sm">3<sup>rd</sup> Term Fees</h6>
                                        <span class="text-xs">#MS-415646</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        <span class="text-danger">&#8358;18,000</span>
                                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-dark mb-1 font-weight-bold text-sm">2<sup>nd</sup> Term Fees</h6>
                                        <span class="text-xs">#RV-126749</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        <span class="text-success">&#8358;18,000</span>
                                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-dark mb-1 font-weight-bold text-sm">1<sup>st</sup> Term Fees</h6>
                                        <span class="text-xs">#FB-212562</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        <span class="text-success">&#8358;18,000</span>
                                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Container -->
    </div>
    <?php include "./inc/student-footer.php";?>
</body>
</html>