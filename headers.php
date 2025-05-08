<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="images/logo-black.png">
    <script>
        $(document).ready(function () {
            fetch_data();
            show_more();
            footer();
            edit_profile();
        });
    </script>

<body>


    <!-- Logout Loader -->

    <div class="for_logout" style="margin: 99.5px auto; height: 720px;" id="logout-loader">
        <div style="margin-left: 220px">
            <img src="images/logo-black.png" alt="" height="20px" style="margin-left: 20px;"><br>
            <img src="images/loader.gif" alt="" style="margin-top: 260px; margin-left: 20px" id="show" height="30px">
            <p class="show" style="margin-top: 20px;">Logging out</p>
        </div>
    </div>

    <!-- Left Panel -->
    <div class="container all" style="display: flex; " id="left-panel">
        <div class="slider">




            <div class="logo">
                <img src="images/logo-black.png" alt="" height="30px" width="30px" style="margin-left: 10px;">
            </div>
            <div class="items" style="margin-top: 10px;">
                <a href="index.php">
                    <li>
                        <i class="fa-solid fa-house"></i><span id="home">Home</span>
                    </li>
                </a>
                <a href="explore.php">
                    <li>
                        <i class="fa-solid fa-magnifying-glass"></i><span id="explore">Explore</span>
                    </li>
                </a>
                <a href="notification.php">
                    <li>
                        <i class="fa-solid fa-bell"></i><span id="notification">Notifications</span>
                    </li>
                </a>
                <a href="#">
                    <li>
                        <i class="fa-solid fa-envelope"></i><span id="message">Messages</span>
                    </li>
                </a>

                <a href="#">
                    <li>
                        <img src="images/grok.png" alt="" height="24px"><span style="margin-left: 15px;"
                            id="grok">Grok</span>
                    </li>
                </a>
                <a href="bookmark.php">
                    <li>
                        <i class="fa-solid fa-bookmark"></i><span id="bookmark">Bookmarks</span>
                    </li>
                </a>
                <a href="#">
                    <li>
                        <i class="fa-solid fa-briefcase"></i><span id="job">Jobs</span>
                    </li>
                </a>
                <a href="#">
                    <li>
                        <i class="fa-solid fa-user-group"></i><span style="margin-left: 15px;"
                            id="community">Communities</span>
                    </li>
                </a>
                <a href="#">
                    <li>
                        <img src="images/logo-black.png" alt="" height="23px"><span id="premium">Premium</span>
                    </li>
                </a>
                <a href="#">
                    <li>
                        <i class="fa-solid fa-ribbon"></i><span id="verified-orgs">Varified Orgs</span>
                    </li>
                </a>
                <a href="profile.php">
                    <li>
                        <i class="fa-regular fa-user"></i><span id="profile">Profile</span>
                    </li>
                </a>
                <a href="#">
                    <li>
                        <img src="images/circle.png" alt="" height="30px" style="margin-left: -5px;">
                        <span style="margin-left: 10px;" id="more">More</span>
                    </li>
                </a>

            </div>
            <br><br>
            <a href="#" class="text-white bg-dark post" data-toggle="modal" data-target="#post_modal">Post</a>
            <div class="profile_model" style="display: none;">
                <a href="#">Add an existing account</a>
                <a href="#" id="logout">Log out @<?php echo $_SESSION['username']; ?></a>
            </div>

            <div class="user_profile">
                <div class="user_image">
                    <img src="images/profile_pic.png" alt="" height="100%" style="border-radius: 50%;"
                        class="profile_pics">
                </div>
                <div class="user_data" style="width: 60%;">
                    <p><span class="profle_name"><?php echo $_SESSION['name']; ?></span>
                        <br>@<?php echo $_SESSION['username']; ?>
                    </p>
                </div>
            </div>

        </div>
        <!-- Post Modal -->
        <div class="modal fade" id="post_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        include 'post.php';
                        ?>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <!-- </div>  -->