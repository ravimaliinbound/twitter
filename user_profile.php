<?php
include_once 'headers.php'
    ?>
<title><?php echo $_SESSION['name']; ?> (@<?php echo $_SESSION['username']; ?>)</title>

<div class="profile">
    <div class="profile-name">
        <p>
            <span class="user_pro-name"></span><br>
            <span class="count"></span>
            <span class="post-posts"></span>
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
        <a href="#" class="follow">Follow</a>
    </div>
    <div class="profile-data">
        <p>
            <span class="user_pro-name"></span>
            <span><br>@<span class="user_username"></span></span>
        </p>
        <p class="bio"></p>
        <p>
            <img src="images/calendar.png" alt="" height="20px"> Joined
            <span class="user_joined"></span>
        </p>
        <p>
            <span>
                <span class="following">15</span> Following
            </span>
            <span class="follower">1</span>
            <span>Follower</span>
        </p>
    </div>
</div>

<?php
include_once 'footers.php'
    ?>