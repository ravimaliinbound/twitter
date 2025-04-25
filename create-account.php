<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: index.php');
}
include_once 'header.php';
?>

<title>Sign up for X</title>

<link rel="stylesheet" href="sign-up.css">
</head>

<body>

    <div class="container">
        <h3 id="msg"></h3>

        <div class="form" style="margin: 117.5px auto;">

            <div class="container">
                <div class="cancel-logo" style="display: flex;">
                    <div class="cancel">
                        <a href="home.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="img">
                        <img src="images/logo-black.png" alt="">
                    </div>
                </div>
                <h3>Join X today</h3>
                <div class="form-content">
                    <div class="google d-flex justify-content-center">
                        <i class="fa-brands fa-google"></i><a href="#">Sign in With Google</a>
                    </div>
                    <div class="apple d-flex justify-content-center">
                        <i class="fa-brands fa-apple"></i><a href="#">Sign up with Apple</a>
                    </div>
                    <div class="or d-flex justify-content-center">
                        <p>OR</p>
                    </div>
                    <div class="create-account d-flex justify-content-center bg-dark">
                        <a href="sign-up.php" class="text-white" id="create-account">Create Account</a>
                    </div>
                    <div class="terms">
                        <p>By signing up, you agree to the <a href="https://x.com/en/tos">Terms of Service </a>and <a
                                href="https://x.com/en/privacy">Privacy
                                Policy</a>, including <a
                                href="https://help.x.com/en/rules-and-policies/x-cookies">Cookie Use</a>.</p>
                    </div>

                    <div class="already">
                        <span class="dont">Have an account already?
                            <a href="login.php">Login</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>

        <?php
        include_once 'footer.php';
        ?>
    </div>