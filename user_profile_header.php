<?php
include_once 'headers.php'
    ?>
<title class="user_pro-name"></title>

<div class="profile">
    <div class="profile-name">
        <p>
            <span class="user_pro-name"></span><br>
            <span class="user_post_count"></span>
            <span class="user-post-posts"></span>
        </p>
    </div>
    <div class="user_cover">
        <!-- Cover image or background -->
    </div>
    <div class="user_profile-pic">
        <img src="images/profile_pic.png" alt="" style="border-radius: 50%;" class="user_profile_pics" height="100px"
            width="100px">
    </div>

    <div class="follow-btn">
        <!-- <span class='post-delete-icon'>
            <i class='fa-solid fa-ellipsis' onclick="remove_user(`<?php echo $_SESSION['other_user'] ?>`)"></i>
        </span> -->
        <a href="#" class="follow" style="margin-left: 500px;"></a>
    </div>
    <div class="profile-data">
        <p>
            <span class="user_pro-name"></span>
            <br><span class="user_username"></span>
        </p>
        <p class="user_bio"></p>
        <p>
            <img src="images/calendar.png" alt="" height="20px"> Joined
            <span class="user_joined"></span>
        </p>
        <p>
            <span>
                <a href="user_following.php" class="user_following see_user_following">15</a>
                <a href="user_following.php" class="see_user_following">Following</a>
            </span>
            <a href="user_followers.php" class="user_follower see_user_followers">1</a>
            <a href="user_followers.php" class="follower_followers see_user_followers">Follower</a>
        </p>
    </div>


