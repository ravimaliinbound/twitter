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
        <a href="highlight.php" class="profile-menu-item">
            <li style="color: black">Highlights</li>
        </a>
        <a href="article.php">
            <li>Articles</li>
        </a>
        <a href="media.php">
            <li>Media</li>
        </a>
        <a href="likes.php">
            <li>Likes</li>
        </a>
    </ul>
</div>
<div class="highlight">
    <h2>Highlight on your profile</h2>
    <p style="margin-bottom: 30px;">You must be subscribed to Premium to highlight posts on your profile.</p>
    <a href="#" class="text-white bg-dark">Subscribe to Premium</a>
</div>

</div>

<?php
include_once 'footers.php';
?>