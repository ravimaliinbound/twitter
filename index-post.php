<div class="index-post">
    <?php
    include 'post.php';
    ?>
</div>
<div class="modal" id="deletesModal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="models-ul">
                    <li onclick="delete_posts()">
                        <i class="fa-solid fa-trash text-danger"></i>
                        <a href="#" class="text-danger" id="delete-modal">Delete Post</a>
                    </li>
                    <li>
                        <img src="images/pin.png" alt="" height="20px">
                        <a href="#">Pin to your profile</a>
                    </li>
                    <li>
                        <img src="images/comment.png" alt="" height="20px">
                        <a href="#">Change who can reply</a>
                    </li>
                    <li>
                        <img src="images/graph.png" alt="" height="20px">
                        <a href="#">View post engagements</a>
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
<!-- Adding class to active element -->
<script>
    $(document).ready(function () {
        $("#home").addClass("active_class");
    });
</script>