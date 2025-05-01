<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: index.php');
}
include_once 'header.php';
?>
<title>Sign up for X / X</title>

<link rel="stylesheet" href="sign-up.css">
</head>

<body>

    <div class="container">

        <div class="form" style="margin-top: 134px; height: 800px;">

            <div class="container">
                <div class="cancel-logo" style="display: flex;">
                    <div class="cancel">
                        <a href="home.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="img">
                        <img src="images/logo-black.png" alt="">
                    </div>
                </div>
                <img src="images/loader.gif" alt="" style="margin: 0 220px; margin-top: 260px; display: none" class="show">
                <p class="show" style="display: none; margin-left: 200px; margin-top: 20px;">Sighing up</p>

                <h3 class="hide">Create your account</h3>
                <form action="#" method="post" id="signup" class="hide">
                    <input type="hidden" name="" id="email_check" value="0">
                    <input type="hidden" name="" id="username_check" value="0">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                        <p><span class="text-danger remove" id="errname"></span></p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" placeholder="Enter username"
                            name="username">
                        <p><span class="text-danger remove" id="errusername"></span></p>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                        <p><span class="text-danger remove" id="erremail"></span></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter password"
                            name="password">
                        <p><span class="text-danger remove" id="errpassword"></span></p>
                    </div>
                    <div class="form-group">
                        <p>
                            <span class="dob">Date of birth</span><br>
                            <span class="dob-description">
                                This will not be shown publicly. Confirm your own age, even if this account is for a
                                business, a pet, or something else.
                            </span>
                        </p>
                        <input type="date" class="form-control" id="dob" name="dob">
                        <p><span class="text-danger remove" id="errdob"></span></p>
                    </div>
                    <div class="button d-flex justify-content-center">
                        <a class="btn btn-dark mt-4 submit" id="signup" name="signup" onclick="signup()">Next</a>
                    </div>
                </form>
            </div>
        </div>
        <h3 id="msg"></h3>

        <?php
        include_once 'footer.php';
        ?>
    </div>