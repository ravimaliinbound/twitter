<?php
include_once 'profile-post.php'
    ?>
<div class="profile-menu" style="margin-left: -28px;">
    <ul style="width: 100%;">
        <a href="profile.php">
            <li>Posts</li>
        </a>
        <a href="replies.php">
            <li>Replies</li>
        </a>
        <a href="highlight.php">
            <li>Highlights</li>
        </a>
        <a href="article.php">
            <li>Articles</li>
        </a>
        <a href="media.php" class="profile-menu-item">
            <li style="color: black">Media</li>
        </a>
        <a href="likes.php">
            <li>Likes</li>
        </a>
    </ul>
</div>
<!-- <div class="highlight">
    <h2>Lights, camera … attachments!</h2>
    <p style="margin-bottom: 30px;">When you post photos or videos, they will show up here..</p>
</div> -->
<div class="media">
    <div class="media-flex">
        <div class="media-post">
            <img src="images/verification-check.png" alt="">
        </div>
        <div class="media-post">
            <img src="images/verification-check.png" alt="">
        </div>
        <div class="media-post">
            <img src="images/verification-check.png" alt="">
        </div>
    </div>
    <div class="media-flex">
        <div class="media-post">
            <img src="images/verification-check.png" alt="">
        </div>
    </div>
</div>
</div>

<?php
include_once 'footers.php';
?>

<script>
    $(document).ready(function(){
        show_media();
    })
</script>