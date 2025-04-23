<?php
include_once 'header.php';
?>
    <title>Login to X</title>
    <link rel="stylesheet" href="sign-up.css">
</head>

<body>

    <div class="container">
        <h3 id="msg"></h3>

        <div class="form" style="margin: 99.5px auto;">

            <div class="container">
                <div class="cancel-logo" style="display: flex;">
                    <div class="cancel">
                        <a href="home.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="img">
                        <img src="images/logo-black.png" alt="">
                    </div>
                </div>
                <h3>Sign in to X</h3>

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
                </div>
                <form action="#" method="post" id="login-form">
                    <input type="hidden" name="" id="email_check" value="0">
                    <input type="hidden" name="" id="username_check" value="0">


                    <div class="form-group">
                        <input type="email" class="form-control" id="login_email" placeholder="Enter email or username" name="email">
                        <p><span class="text-danger remove" id="errlogin_email"></span></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="login_password" placeholder="Enter password"
                            name="password">
                        <p><span class="text-danger remove" id="errlogin_password"></span></p>
                    </div>

                    <div class="button d-flex justify-content-center">
                        <a class="btn btn-dark mt-4 submit" id="login" name="login" onclick="login()">Next</a>
                    </div>
                </form>
                <div class="google d-flex justify-content-center forgot">
                    <a href="#">Forgot Password?</a>
                    </div>
                <div class="go-to-signup">
                    <span class="dont">Don't have an account ?
                        <a href="create-account.php">Sign up</a>
                    </span>
                </div>
            </div>
        </div>
        <?php
        include_once 'footer.php';
        ?>
    </div>