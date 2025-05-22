<?php
include_once 'notifications.php';
?>

<div class="notification-list">
    <ul>
        <li><a href="notification.php" class="multi-a">All</a></li>
        <li><a href="verified.php" class="multi-a" style="margin-left: -18px;">Verified</a></li>
        <li><a href="mentions.php" class="multi-a"
                style="border-bottom: 3px solid deepskyblue; color: black">Mentions</a></li>
    </ul>
</div>
</div>
<div class="mentions">
    <img src="images/illustration_unmention.png" alt="" width="100%" height="200px">
</div>
<div class="mention-msg">
    <p>
        <span class="verified-msg">Control which conversations you’re mentioned in</span><br>
        <span class="mention-p">Use the action menu — those three little dots on a post — to untag yourself and leave a
            conversation.
        </span>
        <a href="https://help.x.com/en/managing-your-account/about-x-verified-accounts" class="anchor">Learn more</a>
    </p>
</div>
</div>
<?php
include_once 'footers.php';
?>