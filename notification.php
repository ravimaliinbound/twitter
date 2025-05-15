<?php
include_once 'notifications.php';
?>

<div class="notification-list">
    <ul>
        <li><a href="notification.php" class="multi-a"
                style="border-bottom: 3px solid deepskyblue; color: black">All</a></li>
        <li><a href="verified.php" class="multi-a" style="margin-left: -18px;">Verified</a></li>
        <li><a href="mentions.php" class="multi-a">Mentions</a></li>
    </ul>
</div>
</div>
<!--------------------Delete Post Modal--------------------->
<div class="modal" id="delete_n_Modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="model-ul">
                    <li onclick="delete_notification()">
                        <i class="fa-solid fa-trash text-danger"></i>
                        <a href="#" class="text-danger" id="delete-modal">Delete Notification</a>
                    </li>
                    <li>
                        <img src="images/pin.png" alt="" height="20px">
                        <a href="#">Mute this conversation</a>
                    </li>
                    <li>
                        <img src="images/comment.png" alt="" height="20px">
                        <a href="#">Change who can reply</a>
                    </li>
                    <li>
                        <img src="images/graph.png" alt="" height="20px">
                        <a href="#">Leave this conversation</a>
                    </li>
                    <li>
                        <img src="images/link.png" alt="" height="20px">
                        <a href="#">Embed post</a>
                    </li>
                    <li>
                        <img src="images/graph.png" alt="" height="20px">
                        <a href="#">View post analytics</a>
                    </li>
                    <li>
                        <img src="images/marketing.png" alt="" height="20px">
                        <a href="#">Request community notes</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="show_notifications">
   

</div>
</div>
<?php
include_once 'footers.php';
?>