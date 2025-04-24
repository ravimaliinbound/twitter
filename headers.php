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
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="images/logo-black.png">

    <body>
        

    <!-- Logout Loader -->

    <div class="for_logout" style="margin: 99.5px auto; height: 720px; " id="logout-loader">
        <div style="margin-left: 240px">
            <img src="images/logo-black.png" alt="" height="20px"><br>
            <img src="images/loader.gif" alt="" style="margin: 280px auto;" height="30px" id="show">
        </div>
    </div>
    
    <!-- Left Panel -->
      <div class="container all" style="display: flex; " id="left-panel">
        <div class="slider">
            <div class="logo">
                <img src="images/logo-black.png" alt="" height="30px" width="30px" style="margin-left: 10px;">
            </div>
            <div class="items" style="margin-top: 10px;">
                <li>
                    <i class="fa-solid fa-house"></i><a href="#">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-magnifying-glass"></i><a href="#">Explore</a>
                </li>
                <li>
                    <i class="fa-solid fa-bell"></i><a href="#">Notifications</a>
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i><a href="#">Messages</a>
                </li>
                <li>
                    <img src="images/grok.png" alt="" height="24px"><a href="#" style="margin-left: 25px;">Grok</a>
                </li>
                <li>
                    <i class="fa-solid fa-bookmark"></i><a href="#" style="margin-left: 34px;">Bookmarks</a>
                </li>
                <li>
                    <i class="fa-solid fa-briefcase"></i><a href="#">Jobs</a>
                </li>
                <li>
                    <i class="fa-solid fa-user-group"></i><a href="#" style="margin-left: 25px;">Communities</a>
                </li>
                <li>
                    <img src="images/logo-black.png" alt="" height="23px"><a href="#"
                        style="margin-left: 28px;">Premium</a>
                </li>
                <li>
                    <i class="fa-solid fa-ribbon"></i><a href="#">Varified Orgs</a>
                </li>
                <li>
                    <i class="fa-regular fa-user"></i><a href="#">Profile</a>
                </li>
                <li>
                    <img src="images/circle.png" alt="" height="30px" style="margin-left: -5px;">
                    <a href="#" style="margin-left: 20px;">More</a>
                </li>

            </div>
            <div class="post bg-dark" style="display: block;">
                <a href="#" class="text-white">Post</a>
            </div>
            <div class="profile_model" style="display: none;">
                <a href="#">Add an existing account</a>
                <a href="#" id="logout">Log out @ravimali13</a>
            </div>

            <div class="user_profile">
                <div class="user_image">
                    <img src="images/logo-black.png" alt="" height="30px">
                </div>
                <div class="user_data">
                    <p><span class="profle_name">Ravi Mali</span> <br>@ravimali13 </p>
                </div>
                <div class="ellipsis">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
        </div>
          

     <!-- </div>  -->

   