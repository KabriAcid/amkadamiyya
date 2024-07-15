<?php
    session_start();
    include "../../config/database.php";
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
                        <span class="align-text-top">Hi, <?php echo $_SESSION['first_name']; ?>!</span>
                        <img class="avatar avatar-sm rounded-circle mx-2" style="width: 30px;height: 30px;" src="<?php echo $_SESSION['photo']; ?>">
                        <i class="fa fa-cog cursor-pointer"></i>
                    </div>
                </div>
            </div>
        </nav>


        <!--  -->
        <div class="container-fluid py-4">
            <div class="row gx-4">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6>Notification Timeline</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted">
                                <!-- 1. School Fees Payment -->
                                <?php   
                                    $sql = "SELECT * FROM `student_notification` ORDER BY `not_timestamp` DESC";
                                    $result = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <a href="" >
                                                <div class="timeline-block mb-3">
                                                    <span class="timeline-step">
                                                        <i class="<?php echo $row['not_icon']; ?> <?php echo $row['not_icon_color']; ?> text-gradient"></i>
                                                    </span>
                                                    <div class="timeline-content">
                                                        <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $row['not_title']; ?></h6>
                                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo date("j F, Y h:m", strtotime($row['not_timestamp'])); ?></p>
                                                        <p class="mt-3">
                                                            <?php echo $row['not_content']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php
                                        }
                                    }
                                    else {
                                        echo "<p class='text-center'>No notification available.</p>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-5 ">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6>Timeline with dotted line</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side" data-timeline-axis-style="dotted">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-bell-55 text-success text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                        <p class="text-sm mt-3 mb-2">
                                        People care about how you see the world, how you think, what motivates you, what you’re struggling with or afraid of.
                                        </p>
                                        <span class="badge badge-sm bg-gradient-success">Design</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!--  -->
    </div>
    <?php include "./inc/student-footer.php";?>
</body>
</html>