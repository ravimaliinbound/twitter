<?php
include_once 'profile-post.php'
    ?>

<div class="profile-menu" style="margin-left: -28px;">
    <ul style="width: 100%;">
        <a href="profile.php" class="profile-menu-item">
            <li style="color: black">Posts</li>
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
        <a href="likes.php">
            <li>Likes</li>
        </a>
    </ul>
</div>
<hr style="border: 1px solid rgb(219, 223, 244);">
<div class="posts">
    
</div>
</div>

<?php
include_once 'footers.php';
?>

<script>
    $(document).ready(function () {
        show_post();
    })
</script>