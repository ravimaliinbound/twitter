<?php
include_once 'header.php';
?>
    <title>X. It's what's happening / X</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
       
        <div class="parent">
            <div class="img">
                <img src="images/logo-black.png" alt="">
            </div>
            <div class="forms">
                <h1>Happening now</h1>
                <div class="form-content">
                    <h2 class="mt-4">Join today.</h2>
                    <div class="google d-flex justify-content-center">
                        <i class="fa-brands fa-google"></i><a href="#">Sign in With Google</a>
                    </div>
                    <div class="apple d-flex justify-content-center">
                        <i class="fa-brands fa-apple"></i><a href="#">Sign up with Apple</a>
                    </div>
                    <div class="or d-flex justify-content-center">
                        <p>OR</p>
                    </div>
                    <div class="create-account d-flex justify-content-center">
                        <a href="sign-up.php" class="text-white" id="create-account">Create Account</a>
                    </div>
                    <div class="terms">
                        <p>By signing up, you agree to the <a href="#">Terms of Service </a>and <a
                                href="#">Privacy
                                Policy</a>, including <a
                                href="#kies">Cookie Use</a>.</p>
                    </div>
                    <div class="already">
                        <p>Already have an account?</p>
                    </div>
                    <div class="sign-in d-flex justify-content-center">
                        <a href="login.php" class="text-primary">Sign in</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once 'footer.php';
        ?>

        