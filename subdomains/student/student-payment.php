<?php
    session_start();
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
        <div class="container-fluid pt-3">
            
        </div>
    </div>
    <?php include "./inc/student-footer.php";?>
</body>
</html>