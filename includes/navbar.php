<div class="container position-sticky z-index-sticky top-0 mb-7">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-3">
                    <a class="navbar-brand text-dark" href="../../index.php" rel="tooltip" title="Amkadamiyya School" data-placement="bottom">
                        <img src="../../assets/favicon/favicon.png" class="avatar avatar-sm rounded align-center">
                        <span class="ms-2">Amkadamiyya</span>
                    </a>
                    <button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover mx-auto">
                            <!-- Home -->
                            <li class="nav-item mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-dark" role="button" href="../../index.php">
                                    Home
                                </a>
                            </li>

                            <!-- Admission -->
                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-dark" role="button" id="admissionDropdown" data-bs-toggle="dropdown">
                                    Admission <i class="ms-1 fa fa-chevron-down text-secondary mt-1"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3">
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-requirements.php">Apply For Admission</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-check-status.php">Check Admission Status</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-guidelines.php">Guidelines</a></li>
                                </ul>
                            </li>

                            <!-- Docs -->
                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-dark" role="button" id="admissionDropdown" data-bs-toggle="dropdown">
                                    Docs <i class="ms-1 fa fa-chevron-down text-secondary mt-1"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3">
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-requirements.php">About theDirector</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-check-status.php">History and Development</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-guidelines.php">Mission and Vision</a></li>
                                </ul>
                            </li>

                            <!-- Docs -->
                            <li class="nav-item dropdown dropdown-hover mx-2">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-dark" role="button" id="admissionDropdown" data-bs-toggle="dropdown">
                                    Dropdown <i class="ms-1 fa fa-chevron-down text-secondary mt-1"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3">
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-requirements.php">About theDirector</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-check-status.php">History and Development</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="../../pages/admission/admission-guidelines.php">Mission and Vision</a></li>
                                </ul>
                            </li>


                        </ul>
                        <?php
                        if (isset($_SESSION['staff']
) || isset($_SESSION['student'])) {
                            $photo = $_SESSION['staff']
['photo'];
                        ?>
                            <div class="nav-item dropdown pe-2 px-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../subdomains/admin/<?php echo $photo; ?>" class="avatar avatar-sm rounded">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                    <!-- If session == Staff -->
                                    <?php if (isset($_SESSION['staff']
)) {
                                    ?>
                                        <li class="px-2 py-1">
                                            <a class="dropdown-item border-radius-md" href="../../subdomains/admin/admin-dashboard.php">
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="px-2 py-1">
                                            <a class="dropdown-item border-radius-md" href="../../subdomains/admin/logout.php">
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <!-- If session == students -->
                                        <li class="px-2 py-1">
                                            <a class="dropdown-item border-radius-md" href="../../subdomains/student/student-profile.php">
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="px-2 py-1">
                                            <a class="dropdown-item border-radius-md" href="../../subdomains/student/student-logout.php">
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    <?php
                                    } ?>
                                </ul>
                            </div>

                        <?php
                        } else {
                        ?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="../../subdomains/student/student-login.php" ; class="btn btn-sm bg-gradient-info btn-round text-uppercase mb-0 me-1">students portal</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../subdomains/admin/login.php" ; class="btn btn-sm bg-gradient-dark btn-round text-uppercase mb-0 me-1">admin portal</a>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>