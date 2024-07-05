<?php
    include "student-process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../../includes/header.php";?>
    <title>Student Login</title>
</head>
<body class="bg-info-soft">
    <main>
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <form action="" method="post">
                                <div class="card mt-8">
                                    <div class="card-header pb-0 text-start">
                                        <h3 class="font-weight-bolder text-info text-gradient">Welcome!</h3>
                                        <p class="mb-0">Sign in with your admission number and password.</p>
                                        <?php
                                            if(isset($_GET['error'])){
                                                ?>
                                                <div class="container">
                                                    <div class="text-white text-sm" role="alert">
                                                        <p class="text-center mb-0 text-danger rounded">
                                                            <?php echo $_GET['error'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" class="text-start">
                                            <div class="mb-3 <?php if(isset($_GET['error'])){
                                                ?>has-danger<?php
                                            } ?>">
                                                <input type="text" class="form-control <?php if(isset($_GET['error'])){
                                                ?>is-invalid<?php
                                            } ?>" placeholder="Admission Number" data-gtm-form-interact-field-id="0" name="admission_number" required>
                                            </div>
                                            <div class="mb-3 <?php if(isset($_GET['error'])){
                                                ?>has-danger<?php
                                            } ?>">
                                                <input type="password" class="form-control <?php if(isset($_GET['error'])){
                                                ?>is-invalid<?php
                                            } ?>" placeholder="Password" required name="password">
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                                <label class="form-check-label null-label" for="rememberMe">Remember me</label>
                                            </div>
                                            <div class="text-center">
                                                <input name="studentLogin" value="Sign in" type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            Don't have an account?
                                            <a href="javascript:;" class="text-info text-gradient font-weight-bold">Contact Admin</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Other Column -->
                        <div class="col-md-6">
                            <?php 
                                $images = array("laboratory-2.jpg", "student-6.jpg", "student-10.jpg");
                                $random = array_rand($images);
                                $randomImage = $images[$random];
                            ?>
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../../assets/images/students/<?php  echo $randomImage; ?>')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include "./inc/student-footer.php";?>
</body>
</html>