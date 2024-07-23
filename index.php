<?php
require 'process.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://amkadamiyya.com.ng/" />
    <meta name="description" content="Best School in Taraba Nigeria">
    <meta name="keywords" content="School in Taraba, Amkadamiyya, Amkad">
    <meta name="author" content="Bsc. Software Engineering: Abdullahi Abubakar Kabri">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=">
    <meta name="openai-domain-verification" content="dv-oah0pJ6F5d9ugDzBZY6lhIvv">
    <title>Home - Amkadamiyya School Jalingo</title>
    <link rel="icon" type="image/png" href="assets/favicon/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link href="css/nucleo-icons.css" rel="stylesheet" />
    <link href="css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/286d2a7519.js" crossorigin="anonymous"></script>

    <!-- Sweetalert -->
    <script src="js/plugins/sweetalert.min.js"></script>

    <link id="pagestyle" href="css/soft-design-system-pro.min3f71.css" rel="stylesheet" />
    <link id="pagestyle" href="css/style.css" rel="stylesheet" />
</head>

<body class="bg-info-soft" style="font-family: 'Open Sans';">
    <!-- Navbar Light -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
        <div class="container">
            <a class="navbar-brand" href="https://amkadamiyya.com.ng" rel="tooltip" title="Amkadamiyya School Jalingo" data-placement="bottom">
                Amkadamiyya
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                <ul class="navbar-nav navbar-nav-hover mx-auto">
                    <li class="nav-item mx-2">
                        <a href="#" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                            Home
                        </a>
                    </li>
                    <li class="nav-item mx-2 dropdown">
                        <a href="#" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                            Admission
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pages/admission/admission-requirements.php">Apply For
                                    Admission</a></li>
                            <li><a class="dropdown-item" href="pages/admission/admission-check-status.php">Check
                                    Admission Status</a></li>
                            <li><a class="dropdown-item" href="pages/admission/admission-guidelines.php">Guidelines</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2 dropdown">
                        <a href="#" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                            Docs
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">About the Director</a></li>
                            <li><a class="dropdown-item" href="#">Mission and Vision</a></li>
                            <li><a class="dropdown-item" href="#">History and Development</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2 dropdown">
                        <a href="#" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['staff'])) {
                    $photo = $_SESSION['staff']['photo'];
                ?>
                    <div class="nav-item dropdown pe-2 px-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="subdomains/admin/<?php echo $photo; ?>" class="avatar avatar-sm rounded">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <!-- If session == Staff -->
                            <li class="px-2 py-1">
                                <a class="dropdown-item border-radius-md" href="subdomains/admin/admin-dashboard.php">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="px-2 py-1">
                                <a class="dropdown-item border-radius-md" href="subdomains/admin/admin-logout.php">
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php
                } else if (isset($_SESSION['student'])) {
                ?>
                    <!-- If session == students -->
                    <div class="nav-item dropdown pe-2 px-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ni ni-settings-gear-65"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <!-- If session == Staff -->
                            <li class="px-2 py-1">
                                <a class="dropdown-item border-radius-md" href="subdomains/student/student-dashboard.php">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="px-2 py-1">
                                <a class="dropdown-item border-radius-md" href="subdomains/student/student-logout.php">
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php
                } else {
                ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="subdomains/student/student-login.php" ; class="btn btn-sm bg-gradient-info btn-round text-uppercase mb-0 me-1">students portal</a>
                        </li>
                        <li class="nav-item">
                            <a href="subdomains/admin/admin-login.php" ; class="btn btn-sm bg-gradient-dark btn-round text-uppercase mb-0 me-1">admin portal</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <header class="position-relative">
        <div class="page-header min-vh-75 position-relative" style="background-image: url('assets/images/buildings/building-1.jpg'); background-attachment: fixed; background-size: cover;">
            <!-- <span class="mask bg-gradient-dark"></span> -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center mx-auto mt-md-n7">
                        <h1 class="text-white fadeIn2 fadeInBottom">Amkadamiyya School Jalingo</h1>
                        <p class="lead mb-5 fadeIn3 fadeInBottom text-white opacity-6">"Education For Better Future."
                        </p>
                        <button type="submit" class="btn bg-white btn-rounded me-2 fadeIn1 fadeInBottom">Get
                            started</button>
                        <button type="submit" class="btn bg-white btn-icon-only rounded-circle fadeIn1 fadeInBottom">
                            <i class="fas fa-play"></i>
                        </button>
                    </div>
                </div>
            </div>
            <img src="" class="rellax position-absolute floating-man ms-7 fadeIn1 fadeInBottom mt-n10 d-none d-sm-none d-md-none d-lg-block" data-rellax-speed="-4" alt>
            <img src="" class="rellax position-absolute floating-man end-0 fadeIn3 fadeInBottom me-8 mt-10 d-none d-sm-none d-md-none d-lg-block z-index-2" data-rellax-speed="7" alt>
            <div class="position-absolute w-100 z-index-1 bottom-0">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,1" />
                    </g>
                </svg>
            </div>
        </div>
    </header>
    <!-- About the Director -->
    <!-- START Blogs w/ big image on left -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-6 mx-lg-0 mx-auto px-lg-0 px-md-0 my-auto">
                    <img class="w-100 border-radius-lg shadow" src="assets/images/avatar/director.jpg">
                </div>
                <div class="col-lg-6 col-10 d-flex justify-content-center flex-column mx-auto text-lg-start text-center">
                    <h4 class="mb-0 mt-lg-0 mt-4 text-gradient text-info">Learn about the director</h4>
                    <h2 class="mb-4">Brief History of the Director</h2>

                    <p class="">Alh Abubakar Kabri, a native of Taraba State's Sardauna region in Nigeria, has left
                        an
                        indelible mark on Nigerian society through his extensive career in public service. With roots
                        deeply intertwined with the cultural fabric of his homeland, Abubakar has dedicated his life to
                        the advancement of education and the empowerment of marginalized communities.
                    </p>
                    <p class="">

                        Throughout his illustrious career, Abubakar Kabri has held pivotal roles within the Nigerian
                        government, serving across various platforms including educational and nomadic departments. As a
                        director for nomadic education in Taraba State, he spearheaded initiatives aimed at providing
                        quality education to nomadic communities, ensuring that every child, regardless of background,
                        had access to learning opportunities.
                    </p>
                    <p class="lead"><a href="" class="btn bg-gradient-dark">Learn More</a></p>

                    <blockquote class="blockquote my-3 px-3">
                        <span class="h5 mb-2">"I am incredibly proud of our student&apos;s dedication and the
                            supportive community we have
                            built. Together, we create an environment where everyone can thrive."</span><br>
                        <small class="blockquote-footer">
                            Alh. Abubakar Muhammad Kabri
                        </small>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <!-- END Blogs w/ big image on left -->
    <!-- News and Events -->
    <section class="py-5 bg-gray-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="assets/images/students/student.jpg" ; alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-0 pt-4">
                            <p class="text-gradient text-info font-weight-bold text-sm text-uppercase">
                                News</p>
                            <a href="javascript:;">
                                <h4>
                                    End of Second Term Highlights
                                </h4>
                            </a>
                            <p>
                                At the close of the first term, our school celebrates the achievements and growth of our
                                students and faculty. Academic accomplishments, artistic showcases, and extracurricular
                                successes have marked this phase of the academic year. As we transition into the next
                                term, we carry forward the momentum and enthusiasm gained during these initial months.
                            </p>
                            <button type="button" class="btn bg-gradient-info mt-3">Read more</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mx-auto text-center mt-5">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="assets/images/students/student-7.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-0 pt-4">
                            <p class="text-gradient text-warning text-gradient font-weight-bold text-sm text-uppercase">
                                Events</p>
                            <a href="javascript:;">
                                <h4>
                                    Speech and Prize Giving Day
                                </h4>
                            </a>
                            <p>

                                Join us for an inspiring event as we recognize the outstanding achievements of our
                                students and faculty at the upcoming Speech and Prize Giving Day. Get ready for an
                                evening filled with motivational speeches and well-deserved awards, as we celebrate
                                excellence and inspiration within our school community.
                            </p>
                            <button type="button" class="btn bg-gradient-warning mt-3">Read more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Meet our Captains -->
    <section class="py-7 bg-gradient-dark position-relative overflow-hidden">
        <div class="position-absolute w-100 z-inde-1 top-0 mt-n3">
            <svg width="100%" viewBox="0 -2 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wave-down</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g fill="#FFFFFF" fill-rule="nonzero">
                        <g>
                            <path d="M0,60.8320331 C299.333333,115.127115 618.333333,111.165365 959,47.8320321 C1299.66667,-15.5013009 1620.66667,-15.2062179 1920,47.8320331 L1920,156.389409 L0,156.389409 L0,60.8320331 Z" transform="translate(960.000000, 78.416017) rotate(180.000000) translate(-960.000000, -78.416017) ">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <img src="assets/images/waves/waves-white.svg" class="position-absolute opacity-6 h-100 top-0 d-md-block d-none" alt="avatar">
        <div class="container pt-6 pb-5 position-relative z-index-3">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <span class="badge badge-white text-dark mb-2">Admins</span>
                    <h2 class="text-white mb-3">Some quotes from our leaders</h2>
                    <h5 class="text-white font-weight-light">
                        Guiding beacons illuminating our path, these words inspire, motivate, and unite us in our shared
                        mission of excellence.
                    </h5>
                </div>
            </div>
            <div class="row mt-8">
                <div class="col-lg-4 mb-lg-0 mb-7">
                    <div class="card">
                        <div class="text-center mt-n5 z-index-1">
                            <div class="position-relative">
                                <div class="blur-shadow-avatar">
                                    <img class="avatar avatar-xxl shadow-lg" src="assets/images/avatar/co-ordinator.jpeg" alt="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center pb-0">
                            <h4 class="mb-0">Ustaz Muhammad Adam</h4>
                            <p>Co-ordinator</p>
                            <p class="mt-2">
                                "As the school coordinator, my aim is to embrace the diversity within our student body
                                and create a cohesive community where everyone feels valued and supported in their
                                educational journey."
                            </p>
                        </div>
                        <div class="card-footer text-center pt-2">
                            <div class="mx-auto">
                                <svg class="opacity-2" width="60px" height="60px" viewBox="0 0 270 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>quote-down</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path d="M107.000381,49.033238 C111.792099,48.01429 115.761022,48.6892564 116.625294,50.9407629 C117.72393,53.8028077 113.174473,58.3219079 107.017635,60.982801 C107.011653,60.9853863 107.00567,60.9879683 106.999688,60.990547 C106.939902,61.0219589 106.879913,61.0439426 106.820031,61.0659514 C106.355389,61.2618887 105.888177,61.4371549 105.421944,61.5929594 C88.3985192,68.1467602 80.3242628,76.9161885 70.3525495,90.6906738 C60.0774843,104.884196 54.9399518,119.643717 54.9399518,134.969238 C54.9399518,138.278158 55.4624127,140.716309 56.5073346,142.283691 C57.2039492,143.328613 57.9876406,143.851074 58.8584088,143.851074 C59.7291771,143.851074 61.0353294,143.241536 62.7768659,142.022461 C68.3497825,138.016927 75.4030052,136.01416 83.9365338,136.01416 C93.8632916,136.01416 102.658051,140.063232 110.320811,148.161377 C117.983572,156.259521 121.814952,165.88151 121.814952,177.027344 C121.814952,188.695638 117.417572,198.970703 108.622813,207.852539 C99.828054,216.734375 89.1611432,221.175293 76.6220807,221.175293 C61.9931745,221.175293 49.3670351,215.166992 38.7436627,203.150391 C28.1202903,191.133789 22.8086041,175.024577 22.8086041,154.822754 C22.8086041,131.312012 30.0359804,110.239421 44.490733,91.6049805 C58.2196377,73.906272 74.3541002,59.8074126 102.443135,50.4450748 C102.615406,50.3748509 102.790055,50.3058192 102.966282,50.2381719 C104.199241,49.7648833 105.420135,49.3936487 106.596148,49.1227802 L107,49 Z M233.000381,49.033238 C237.792099,48.01429 241.761022,48.6892564 242.625294,50.9407629 C243.72393,53.8028077 239.174473,58.3219079 233.017635,60.982801 C233.011653,60.9853863 233.00567,60.9879683 232.999688,60.990547 C232.939902,61.0219589 232.879913,61.0439426 232.820031,61.0659514 C232.355389,61.2618887 231.888177,61.4371549 231.421944,61.5929594 C214.398519,68.1467602 206.324263,76.9161885 196.352549,90.6906738 C186.077484,104.884196 180.939952,119.643717 180.939952,134.969238 C180.939952,138.278158 181.462413,140.716309 182.507335,142.283691 C183.203949,143.328613 183.987641,143.851074 184.858409,143.851074 C185.729177,143.851074 187.035329,143.241536 188.776866,142.022461 C194.349783,138.016927 201.403005,136.01416 209.936534,136.01416 C219.863292,136.01416 228.658051,140.063232 236.320811,148.161377 C243.983572,156.259521 247.814952,165.88151 247.814952,177.027344 C247.814952,188.695638 243.417572,198.970703 234.622813,207.852539 C225.828054,216.734375 215.161143,221.175293 202.622081,221.175293 C187.993174,221.175293 175.367035,215.166992 164.743663,203.150391 C154.12029,191.133789 148.808604,175.024577 148.808604,154.822754 C148.808604,131.312012 156.03598,110.239421 170.490733,91.6049805 C184.219638,73.906272 200.3541,59.8074126 228.443135,50.4450748 C228.615406,50.3748509 228.790055,50.3058192 228.966282,50.2381719 C230.199241,49.7648833 231.420135,49.3936487 232.596148,49.1227802 L233,49 Z" fill="#48484A" fill-rule="nonzero" transform="translate(135.311778, 134.872794) scale(-1, -1) translate(-135.311778, -134.872794) ">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-7">
                    <div class="card">
                        <div class="text-center mt-n5 z-index-1">
                            <div class="position-relative">
                                <div class="blur-shadow-avatar">
                                    <img class="avatar avatar-xxl shadow-lg" src="assets/images/avatar/general-secretary.jpg" alt="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center pb-0">
                            <h4 class="mb-0">Dahiru Umar Sama</h4>
                            <p>General Secretary</p>
                            <p class="mt-2">
                                "As the general secretary, I am committed to ensuring the smooth operation of our
                                school's administrative functions, providing efficient support to both staff and
                                students, enabling a conducive environment for learning and growth."
                            </p>
                        </div>
                        <div class="card-footer text-center pt-2">
                            <div class="mx-auto">
                                <svg class="opacity-2" width="60px" height="60px" viewBox="0 0 270 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>quote-down</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path d="M107.000381,49.033238 C111.792099,48.01429 115.761022,48.6892564 116.625294,50.9407629 C117.72393,53.8028077 113.174473,58.3219079 107.017635,60.982801 C107.011653,60.9853863 107.00567,60.9879683 106.999688,60.990547 C106.939902,61.0219589 106.879913,61.0439426 106.820031,61.0659514 C106.355389,61.2618887 105.888177,61.4371549 105.421944,61.5929594 C88.3985192,68.1467602 80.3242628,76.9161885 70.3525495,90.6906738 C60.0774843,104.884196 54.9399518,119.643717 54.9399518,134.969238 C54.9399518,138.278158 55.4624127,140.716309 56.5073346,142.283691 C57.2039492,143.328613 57.9876406,143.851074 58.8584088,143.851074 C59.7291771,143.851074 61.0353294,143.241536 62.7768659,142.022461 C68.3497825,138.016927 75.4030052,136.01416 83.9365338,136.01416 C93.8632916,136.01416 102.658051,140.063232 110.320811,148.161377 C117.983572,156.259521 121.814952,165.88151 121.814952,177.027344 C121.814952,188.695638 117.417572,198.970703 108.622813,207.852539 C99.828054,216.734375 89.1611432,221.175293 76.6220807,221.175293 C61.9931745,221.175293 49.3670351,215.166992 38.7436627,203.150391 C28.1202903,191.133789 22.8086041,175.024577 22.8086041,154.822754 C22.8086041,131.312012 30.0359804,110.239421 44.490733,91.6049805 C58.2196377,73.906272 74.3541002,59.8074126 102.443135,50.4450748 C102.615406,50.3748509 102.790055,50.3058192 102.966282,50.2381719 C104.199241,49.7648833 105.420135,49.3936487 106.596148,49.1227802 L107,49 Z M233.000381,49.033238 C237.792099,48.01429 241.761022,48.6892564 242.625294,50.9407629 C243.72393,53.8028077 239.174473,58.3219079 233.017635,60.982801 C233.011653,60.9853863 233.00567,60.9879683 232.999688,60.990547 C232.939902,61.0219589 232.879913,61.0439426 232.820031,61.0659514 C232.355389,61.2618887 231.888177,61.4371549 231.421944,61.5929594 C214.398519,68.1467602 206.324263,76.9161885 196.352549,90.6906738 C186.077484,104.884196 180.939952,119.643717 180.939952,134.969238 C180.939952,138.278158 181.462413,140.716309 182.507335,142.283691 C183.203949,143.328613 183.987641,143.851074 184.858409,143.851074 C185.729177,143.851074 187.035329,143.241536 188.776866,142.022461 C194.349783,138.016927 201.403005,136.01416 209.936534,136.01416 C219.863292,136.01416 228.658051,140.063232 236.320811,148.161377 C243.983572,156.259521 247.814952,165.88151 247.814952,177.027344 C247.814952,188.695638 243.417572,198.970703 234.622813,207.852539 C225.828054,216.734375 215.161143,221.175293 202.622081,221.175293 C187.993174,221.175293 175.367035,215.166992 164.743663,203.150391 C154.12029,191.133789 148.808604,175.024577 148.808604,154.822754 C148.808604,131.312012 156.03598,110.239421 170.490733,91.6049805 C184.219638,73.906272 200.3541,59.8074126 228.443135,50.4450748 C228.615406,50.3748509 228.790055,50.3058192 228.966282,50.2381719 C230.199241,49.7648833 231.420135,49.3936487 232.596148,49.1227802 L233,49 Z" fill="#48484A" fill-rule="nonzero" transform="translate(135.311778, 134.872794) scale(-1, -1) translate(-135.311778, -134.872794) ">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-7">
                    <div class="card">
                        <div class="text-center mt-n5 z-index-1">
                            <div class="position-relative">
                                <div class="blur-shadow-avatar">
                                    <img class="avatar avatar-xxl shadow-lg" src="assets/images/avatar/principal.jpg" alt="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center pb-0">
                            <h4 class="mb-0">Umar Bakari Yahya</h4>
                            <p>Principal</p>
                            <p class="mt-2">
                                "Leading this school is not just a job; it's a passion. I am dedicated to fostering a
                                culture of excellence where every student can succeed and thrive."
                            </p>
                        </div>
                        <div class="card-footer text-center pt-2">
                            <div class="mx-auto">
                                <svg class="opacity-2" width="60px" height="60px" viewBox="0 0 270 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>quote-down</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path d="M107.000381,49.033238 C111.792099,48.01429 115.761022,48.6892564 116.625294,50.9407629 C117.72393,53.8028077 113.174473,58.3219079 107.017635,60.982801 C107.011653,60.9853863 107.00567,60.9879683 106.999688,60.990547 C106.939902,61.0219589 106.879913,61.0439426 106.820031,61.0659514 C106.355389,61.2618887 105.888177,61.4371549 105.421944,61.5929594 C88.3985192,68.1467602 80.3242628,76.9161885 70.3525495,90.6906738 C60.0774843,104.884196 54.9399518,119.643717 54.9399518,134.969238 C54.9399518,138.278158 55.4624127,140.716309 56.5073346,142.283691 C57.2039492,143.328613 57.9876406,143.851074 58.8584088,143.851074 C59.7291771,143.851074 61.0353294,143.241536 62.7768659,142.022461 C68.3497825,138.016927 75.4030052,136.01416 83.9365338,136.01416 C93.8632916,136.01416 102.658051,140.063232 110.320811,148.161377 C117.983572,156.259521 121.814952,165.88151 121.814952,177.027344 C121.814952,188.695638 117.417572,198.970703 108.622813,207.852539 C99.828054,216.734375 89.1611432,221.175293 76.6220807,221.175293 C61.9931745,221.175293 49.3670351,215.166992 38.7436627,203.150391 C28.1202903,191.133789 22.8086041,175.024577 22.8086041,154.822754 C22.8086041,131.312012 30.0359804,110.239421 44.490733,91.6049805 C58.2196377,73.906272 74.3541002,59.8074126 102.443135,50.4450748 C102.615406,50.3748509 102.790055,50.3058192 102.966282,50.2381719 C104.199241,49.7648833 105.420135,49.3936487 106.596148,49.1227802 L107,49 Z M233.000381,49.033238 C237.792099,48.01429 241.761022,48.6892564 242.625294,50.9407629 C243.72393,53.8028077 239.174473,58.3219079 233.017635,60.982801 C233.011653,60.9853863 233.00567,60.9879683 232.999688,60.990547 C232.939902,61.0219589 232.879913,61.0439426 232.820031,61.0659514 C232.355389,61.2618887 231.888177,61.4371549 231.421944,61.5929594 C214.398519,68.1467602 206.324263,76.9161885 196.352549,90.6906738 C186.077484,104.884196 180.939952,119.643717 180.939952,134.969238 C180.939952,138.278158 181.462413,140.716309 182.507335,142.283691 C183.203949,143.328613 183.987641,143.851074 184.858409,143.851074 C185.729177,143.851074 187.035329,143.241536 188.776866,142.022461 C194.349783,138.016927 201.403005,136.01416 209.936534,136.01416 C219.863292,136.01416 228.658051,140.063232 236.320811,148.161377 C243.983572,156.259521 247.814952,165.88151 247.814952,177.027344 C247.814952,188.695638 243.417572,198.970703 234.622813,207.852539 C225.828054,216.734375 215.161143,221.175293 202.622081,221.175293 C187.993174,221.175293 175.367035,215.166992 164.743663,203.150391 C154.12029,191.133789 148.808604,175.024577 148.808604,154.822754 C148.808604,131.312012 156.03598,110.239421 170.490733,91.6049805 C184.219638,73.906272 200.3541,59.8074126 228.443135,50.4450748 C228.615406,50.3748509 228.790055,50.3058192 228.966282,50.2381719 C230.199241,49.7648833 231.420135,49.3936487 232.596148,49.1227802 L233,49 Z" fill="#48484A" fill-rule="nonzero" transform="translate(135.311778, 134.872794) scale(-1, -1) translate(-135.311778, -134.872794) ">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <section class="py-10" id="count-stats">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-gradient text-dark" id="state1" countTo="630"></h1>
                    <h5 class="mt-3 text-gradient text-primary">Students</h5>
                    <p>Our school currently enrolls 630 students, creating a diverse and dynamic learning environment.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-gradient text-dark" id="state2" countTo="55"></h1>
                    <h5 class="mt-3 text-gradient text-primary">Staff</h5>
                    <p>Our school is supported by a dedicated team of 55 staff members, including staff,
                        administrators, and support personnel.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-gradient text-dark" id="state3" countTo="38"></h1>
                    <h5 class="mt-3 text-gradient text-primary">Rooms</h5>
                    <p>In total, there are 38 classrooms, with each classroom accommodating no more than 35 students.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-gradient text-dark" id="state4" countTo="5"></h1>
                    <h5 class="mt-3 text-gradient text-primary">Buildings</h5>
                    <p>Our school campus comprises a total of 10 special buildings. From science labs, computer labs,
                        libraries to recreational spaces.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Blog -->
    <!-- <section class="py-6 bg-gray-100">
        <div class="container">
            <div class="d-flex justify-content-center py-4">
                <div class="col-6 text-center">
                    <h2>Timeline</h2>
                    <p class="text-primary text-gradient">A glance at Amkadamiyya&apos;s post timeline.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="assets/images/backgrounds/house.jpg" class="img-fluid border-radius-lg">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <span
                                class="text-gradient text-warning text-uppercase text-xs font-weight-bold my-2">House</span>
                            <a href="javascript:;" class="card-title h5 d-block text-darker">
                                Shared Coworking
                            </a>
                            <p class="card-description mb-4">
                                Use border utilities to quickly style the border and border-radius of an element. Great
                                for images, buttons.
                            </p>
                            <div class="author align-items-center">
                                <img src="assets/images/staff/staff.jpg" alt="..." class="avatar shadow">
                                <div class="name ps-3">
                                    <span>Abdullahi Kabri</span>
                                    <div class="stats">
                                        <small>Bloged on 28 February</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="assets/images/backgrounds/antalya.jpg" class="img-fluid border-radius-lg">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <span
                                class="text-gradient text-info text-uppercase text-xs font-weight-bold my-2">Office</span>
                            <a href="javascript:;" class="text-darker card-title h5 d-block">
                                Really Housekeeping
                            </a>
                            <p class="card-description mb-4">
                                Use border utilities to quickly style the border and border-radius of an element. Great
                                for images, buttons.
                            </p>
                            <div class="author align-items-center">
                                <img src="assets/images/staff/anty.jpg" alt="..." class="avatar shadow">
                                <div class="name ps-3">
                                    <span>Anty Maryam</span>
                                    <div class="stats">
                                        <small>Bloged 2 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="assets/images/backgrounds/blog7-3.jpg" class="img-fluid border-radius-lg">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <span
                                class="text-gradient text-warning text-uppercase text-xs font-weight-bold my-2">Hub</span>
                            <a href="javascript:;" class="text-darker card-title h5 d-block">
                                Shared Coworking
                            </a>
                            <p class="card-description mb-4">
                                Use border utilities to quickly style the border and border-radius of an element. Great
                                for images, buttons.
                            </p>
                            <div class="author align-items-center">
                                <img src="assets/images/staff/e-officer.jpg" alt="..." class="avatar shadow">
                                <div class="name ps-3">
                                    <span>Abubakar Abubakar</span>
                                    <div class="stats">
                                        <small>Bloged now</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Contact Us -->
    <div class="container-fluid py-3">
        <div class="page-header min-vh-100">
            <div class="position-absolute fixed-top ms-auto w-50 h-100 rounded-3 z-index-0 d-none d-sm-none d-md-block me-n4" style="background-image: url('assets/images/students/student-10.jpg'); background-size: cover;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 d-flex flex-column justify-content-center pb-4 px-0">
                        <div class="card">
                            <div class="card-body rounded-3 shadow-lg blur">
                                <form id="contact-form" action="" method="post" autocomplete="off">
                                    <h3 class="text-center my-3">Contact us</h3>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="first_name">First Name</label>
                                                <div class="input-group mb-4">
                                                    <input class="form-control" placeholder="eg. Musa" aria-label="First Name..." type="text" id="first_name" name="first_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="last_name">Last Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="eg. Sani" aria-label="Last Name..." id="last_name" name="last_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-8 col-md-6">
                                                <div class="mb-4">
                                                    <label for="email">Email Address</label>
                                                    <div class="input-group">
                                                        <input type="email" class="form-control" placeholder="eg. musa@northernmail.com" id="email" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-4">
                                                    <label for="phone">Phone Number</label>
                                                    <div class="input-group">
                                                        <input type="tel" class="form-control" aria-label="Phone Number" placeholder="0802345678" id="phone" name="phone_number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="message">Your message</label>
                                            <textarea name="message" class="form-control" placeholder="Type in your message here..." id="message" rows="6"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn bg-gradient-dark w-100" name="contactBtn">Send
                                                    Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer  -->
    <!-- ---- START FOOTER 10 white w/ bg image 5 cols & subscribe area & social---- -->
    <footer class="footer py-7 position-relative overflow-hidden">
        <img src="assets/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute start-0 top-0 w-100 opacity-6">
        <div class="position-absolute w-100 bottom-0">
            <svg width="100%" viewBox="0 -1 1920 166" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wave-up</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.000000, 5.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g id="wave-up" transform="translate(0.000000, -5.000000)">
                            <path d="M0,70 C298.666667,105.333333 618.666667,95 960,39 C1301.33333,-17 1621.33333,-11.3333333 1920,56 L1920,165 L0,165 L0,70 Z">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="container position-relative z-index-1 mt-8">
            <div class="row ">
                <!-- Contact Info -->
                <div class="col-md-6 col-lg-3 col-12 mb-md-0 mb-4">
                    <h6 class="text-sm text-primary">Contact Information</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <span class="nav-link opacity-8">
                                <span class="font-weight-bold">Location:</span>
                                <a href="https://www.google.com/maps/search/?api=1&query=Samunaka%20Junction,%20Along%20Wuro%20Sembe%20Road%20Jalingo,%20Taraba%20State,%20Nigeria" target="_blank" style="text-decoration: none; color: inherit;">
                                    Samunaka Junction, <br> Along Wuro Sembe Road Jalingo, <br> Taraba State, Nigeria.
                                </a>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link opacity-8">
                                <span class="font-weight-bold">Tel:</span>
                                <a href="tel:+08030631546" style="text-decoration: none; color: inherit;">
                                    080-3063-1546
                                </a>,
                                <a href="tel:+07014948484" style="text-decoration: none; color: inherit;">
                                    070-1494-8484
                                </a>,
                                <a href="tel:+07037943396" style="text-decoration: none; color: inherit;">
                                    0703-794-3396
                                </a>
                            </span>

                        </li>
                        <li class="nav-item">
                            <span class="nav-link opacity-8"><span class="font-weight-bold">Batch No:</span> BN-3293542</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link opacity-8">
                                <span class="font-weight-bold">Mail:</span>
                                <a href="mailto:amkadamiyyaschool@gmail.com?subject=Contact%20Amkadamiyya%20School%20Jalingo" style="text-decoration: none; color: inherit;" target="_blank">
                                    amkadamiyyaschool@gmail.com
                                </a>
                            </span>

                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-2 col-12 mb-md-0 mb-4">
                    <h6 class="text-sm text-primary">Quick Links</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Admissions
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Tuition and Fees
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Contact
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Admission Status
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-2 col-12 mb-md-0 mb-4">
                    <h6 class="text-sm text-primary">Pages</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                News and Events
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Image Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                WAEC
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <!--  -->

                <div class="col-md-6 col-lg-2 col-12 mb-md-0 mb-4">
                    <h6 class="text-sm text-primary">Enquiries</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Get Directions
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Alumni
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Contact
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                IT support
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="">
                                Jobs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3 col-12 mb-md-0 mb-4">
                    <h6 class="text-sm mb-0 text-primary">Newsletter</h6>
                    <p class="text-sm">Subscribe to Amkadamiyya's Newsletter.</p>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter your email address" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark btn-sm">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <hr class="horizontal dark my-4">
            <div class="row">
                <div class="col-lg-8 col-8">
                    <p class="mb-0 opacity-8 text-sm">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Soft by Abdul Sass |
                        <a href="mailto:kabriacid01@gmail.com?subject=Contact%20Abdullahi%20Kabri" style="text-decoration: none; color: inherit;">
                            kabriacid01@gmail.com
                        </a>.
                    </p>

                </div>
                <div class="col-lg-4 col-4">
                    <button type="button" class="btn btn-icon-only btn-link mb-0 opacity-6">
                        <i class="fab fa-facebook text-lg text-secondary"></i>
                    </button>
                    <button type="button" class="btn btn-icon-only btn-link mb-0 opacity-6">
                        <a href="https://wa.me/2348030631546" target="_blank">
                            <i class="fab fa-whatsapp text-lg text-secondary"></i>
                        </a>
                    </button>

                    <button type="button" class="btn btn-icon-only btn-link mb-0 opacity-6">
                        <i class="fab fa-twitter text-lg text-secondary"></i>
                    </button>
                </div>
            </div>
        </div>
    </footer>
    <!-- ---- END FOOTER 10 white w/ bg image 5 cols & subscribe area & social---- -->


    <!-- Mandatory scripts -->
    <script src="js/plugins/countup.min.js"></script>
    <script type="text/javascript">
        if (document.getElementById("state1")) {
            const countUp = new CountUp("state1", document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById("state2")) {
            const countUp1 = new CountUp("state2", document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById("state3")) {
            const countUp2 = new CountUp("state3", document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            };
        }
        if (document.getElementById("state4")) {
            const countUp3 = new CountUp("state4", document.getElementById("state4").getAttribute("countTo"));
            if (!countUp3.error) {
                countUp3.start();
            } else {
                console.error(countUp3.error);
            };
        }
    </script>

    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>


    <?php
    // Handling feedback display

    if (isset($_SESSION['success_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "<?php echo $_SESSION['success_message']; ?>",
                    confirmButtonText: 'OK'
                });
            });
        </script>
    <?php
        unset($_SESSION['success_message']); // Clear feedback message
    }
    if (isset($_SESSION['error_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "<?php echo $_SESSION['error_message']; ?>",
                    confirmButtonText: 'OK'
                });
            });
        </script>
    <?php
        unset($_SESSION['error_message']); // Clear feedback message
    }
    ?>

    <script src="js/soft-design-system-pro.min3f71.js"></script>
</body>

</html>