<nav class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start position-absolute ms-3 bg-body-tertiary loopple-fixed-start" id="sidenav-main" data-sidebar="true" data-sidebar-value="52">
        <div class="collapse navbar-collapse w-auto" id="navbarNav" style="height: auto;">
            <ul class="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'student-profile.php' ? 'active' : ''; ?> " href="student-profile.php">

                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 <?php echo basename($_SERVER['PHP_SELF']) == 'student-profile.php' ? 'text-white' : 'text-dark'; ?>" style="font-size: 12px;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'student-payment.php' ? 'active' : ''; ?>" href="student-payment.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card <?php echo basename($_SERVER['PHP_SELF']) == 'student-payment.php' ? 'text-white' : 'text-dark'; ?>" style="font-size: 12px;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Payments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'student-result.php' ? 'active' : ''; ?>" href="student-result.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-folder-17 <?php echo basename($_SERVER['PHP_SELF']) == 'student-result.php' ? 'text-white' : 'text-dark'; ?>" style="font-size: 11px;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Results</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'student-notification.php' ? 'active' : ''; ?>" href="student-notification.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bell-55 <?php echo basename($_SERVER['PHP_SELF']) == 'student-notification.php' ? 'text-white' : 'text-dark'; ?>" style="font-size: 12px;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'student-invoice.php' ? 'active' : ''; ?>" href="student-invoice.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tag <?php echo basename($_SERVER['PHP_SELF']) == 'student-invoice.php' ? 'text-white' : 'text-dark'; ?>" style="font-size: 12px;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Generate Invoice</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student-logout.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-spaceship text-dark" style="font-size: 12px;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>