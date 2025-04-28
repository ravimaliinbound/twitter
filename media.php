<?php
include_once 'headers.php'
    ?>
<title><?php echo $_SESSION['name']; ?> (@<?php echo $_SESSION['username']; ?>)</title>

<div class="profile">
    <div class="profile-name">
        <p><span class="pro-name"><?php echo $_SESSION['name']; ?></span><br>0 posts</p>
    </div>
    <div class="cover">
        <!-- Cover image or background -->
    </div>
    <div class="profile-pic">
        <p class="profile-fname"><?php echo $_SESSION['firstname'] ?></p>
        <!-- <img src="images/verified.png" alt="" height="100%"> -->
    </div>
    <div class="edit">
        <a href="#" class="edit-btn">Edit Profile</a>
    </div>
    <div class="profile-data">
        <p><span class="pro-name"><?php echo $_SESSION['name']; ?></span> <span class="verified"><img
                    src="images/verified.png" alt="" height="20px" style="margin-top: -5px;"> Get Verified</span>
            <span><br>@<?php echo $_SESSION['username']; ?></span>
        </p>
        <p>Web Developer</p>
        <p><img src="images/calendar.png" alt="" height="20px"> Joined <?php echo $_SESSION['joined']; ?></p>
        <p><span><span class="following">15</span> Following</span> <span class="follower">1</span><span>
                Follower</span></p>
    </div>
    <div class="profile-menu" style="margin-left: -28px;">
        <ul style="width: 100%;" >
            <li><a href="profile.php">Posts</a></li>
            <li><a href="#">Replies</a></li>
            <li><a href="highlight.php" style="margin-left: 1px;">Highlights</a></li>
            <li><a href="article.php">Articles</a></li>
            <li><a href="media.php">Media</a></li>
            <li><a href="#">Likes</a></li>
        </ul>
    </div>
    <div class="highlight">
        <h2>Lights, camera … attachments!</h2>
        <p style="margin-bottom: 30px;">When you post photos or videos, they will show up here..</p>
    </div>
   
</div>

<?php
include_once 'footers.php';
?>