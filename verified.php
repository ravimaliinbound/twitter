<?php
include_once 'notifications.php';
?>

<div class="notification-list">
    <ul>
        <li><a href="notification.php" class="multi-a">All</a></li>
        <li><a href="verified.php" class="multi-a"
                style="margin-left: -18px; border-bottom: 3px solid deepskyblue">Verified</a></li>
        <li><a href="mentions.php" class="multi-a">Mentions</a></li>
    </ul>
</div>
</div>
<div class="verified-img">
    <img src="images/verification-check.png" alt="" height="160px">
</div>
<div class="verify">
    <p>
        <span class="verified-msg">Nothing to see here — yet</span><br>
        <span>Likes, mentions, reposts, and a whole lot more
            — when it comes from a verified account, you’ll find it here.</span>
        <a href="https://help.x.com/en/managing-your-account/about-x-verified-accounts" class="anchor">Learn more</a>
    </p>
</div>
</div>
<?php
include_once 'footers.php';
?>