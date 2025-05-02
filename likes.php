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
        <a href="media.php">
            <li>Media</li>
        </a>
        <a href="likes.php" class="profile-menu-item">
            <li style="color: black">Likes</li>
        </a>
    </ul>
</div>
<hr style="border: 1px solid rgb(219, 223, 244);">
    
<div class="likes">
    <p style="margin-top: 8px;"><img src="images/padlock.png" alt="" height="20px" style="margin-top: -10px;"><span
            class="like-text">&nbsp;Your likes are private. Only you can see them.</span></p>
</div>
</div>

<?php
include_once 'footers.php';
?>