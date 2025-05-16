<?php
include_once 'profile-post.php';
?>

<div class="profile-menu" style="margin-left: -28px;">
    <ul style="width: 100%;">
        <a href="profile.php">
            <li>Posts</li>
        </a>
        <a href="replies.php" class="profile-menu-item">
            <li style="color: black">Replies</li>
        </a>
        <a href="#">
            <li>Highlights</li>
        </a>
        <a href="#">
            <li>Articles</li>
        </a>
        <a href="media.php">
            <li>Media</li>
        </a>
        <a href="#">
            <li>Likes</li>
        </a>
    </ul>
</div>
<hr style="border: 1px solid rgb(219, 223, 244);">
<div class="replies">
    

</div>
</div>

<?php
include_once 'footers.php';
?>

<script>
    $(document).ready(function(){
        show_comments();
    })
</script>