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
        <a href="#">
            <li>Highlights</li>
        </a>
        <a href="#">
            <li>Articles</li>
        </a>
        <a href="media.php" class="profile-menu-item">
            <li style="color: black">Media</li>
        </a>
        <a href="#">
            <li>Likes</li>
        </a>
    </ul>
</div>
<hr style="border: 1px solid rgb(219, 223, 244);">

<div class="highlight" style="display: none;">
    <h2>Lights, camera … attachments!</h2>
    <p style="margin-bottom: 30px;">When you post photos or videos, they will show up here..</p>
</div>
<div class="media">
    <div class='media-flex'>

    </div>
</div>
</div>

<?php
include_once 'footers.php';
?>

<script>
    $(document).ready(function () {
        show_media();
    })
</script>