<?php
include "student-process.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Login</title>
    <?php include "../../includes/header.php"; ?>
</head>

<body class="bg-info-soft">
    <main>
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto pb-4">
                            <form action="" method="post">
                                <div class="card mt-8">
                                    <div class="card-header pb-0 text-start">
                                        <h3 class="font-weight-bolder text-info text-gradient">Welcome!</h3>
                                        <p class="mb-0">Sign in with your admission number and password.</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Admission Number" name="admission_id" tabindex="1">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" tabindex="2">
                                            <small id="text" class="text-danger text-center mt-2"></small>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input mt-1" type="checkbox" id="showPassword" onchange="togglePasswordVisibility()" tabindex="3">
                                            <label class="form-check-label null-label" for="rememberMe">Show Password</label>
                                        </div>
                                        <div class="mb-3">
                                            <input name="login" value="Sign in" type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                                        </div>
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
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../../assets/images/students/<?php echo $images[0]; ?>')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include "./inc/student-footer.php"; ?>
    <script src="../../js/plugins/sweetalert.min.js"></script>
    <?php
    if (isset($_SESSION['error_message'])) {
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "<?php echo $_SESSION['error_message']; ?>",
                    icon: 'error',
                    showConfirmButton: true,
                    timer: 3000
                })
            })
        </script>
    <?php
        unset($_SESSION['error_message']);
    } ?>
    <script>
        // Get the input field
        var input = document.getElementById("password");

        // Get the warning text
        var text = document.getElementById("text");

        // When the user presses any key on the keyboard, run the function
        input.addEventListener("keyup", function(event) {

            // If "caps lock" is pressed, display the warning text
            if (event.getModifierState("CapsLock")) {
                text.innerHTML = "WARNING! Caps Lock is On";
                text.style.display = "block";
            } else {
                text.style.display = "none"
            }
        });

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var checkbox = document.getElementById("showPassword");

            if (checkbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>

</html>