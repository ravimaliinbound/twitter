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

        <div class="form">

            <div class="container">
                <div class="cancel-logo" style="display: flex;">
                    <div class="cancel">
                        <a href="home.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="img">
                        <img src="images/logo-black.png" alt="">
                    </div>
                </div>
                <h3>Create your account</h3>
                <form action="#" method="post" id="signup">
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

        <?php
        include_once 'footer.php';
        ?>
    </div>