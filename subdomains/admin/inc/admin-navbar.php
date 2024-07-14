<?php
function hasNewNotifications()
{
    // Your logic to check for new notifications
    // This is just an example, replace it with your actual logic
    $newNotifications = true; // Assume we have new notifications
    return $newNotifications;
}
?>
<nav class="navbar navbar-main navbar-expand-lg mt-4 top-1 px-0 mx-4 shadow border-radius-xl z-index-sticky" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link text-body p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">

                    <a href="admin-profile.php" class="nav-link text-body font-weight-bold px-0">
                        <span class="me-2"><small class="text-secondary">Welcome&comma;&nbsp;</small><span class="font-weight-bolder"><?php echo $_SESSION['staff']['first_name']; ?></span></span>
                        <img src="<?php echo $_SESSION['staff']['photo']; ?>" class="avatar avatar-sm">
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ni ni-settings-gear-65 cursor-pointer" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="">
                            <a class="dropdown-item border-radius-md" href="../../index.php">
                                <span>Homepage</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="dropdown-item border-radius-md" href="admin-logout.php">
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ps-1 d-flex align-items-center">
                    <?php $hasNewNotifications = hasNewNotifications(); ?>
                    <div class="notification-icon">
                        <i class="ni ni-bell-55 cursor-pointer text-sm" aria-hidden="true"></i>
                        <div class="notification-dot <?php echo $hasNewNotifications ? 'active' : ''; ?>"></div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>