<?php include_once 'headers.php'; ?>

<div class="middle">
    <div class="user_d">
        <h3 class="post_d">Reply</h3>
    </div>
    <div class="user_comment"></div>
</div>

<?php include_once 'reply_modal.php'; ?>

<!-- Nested Reply Modal -->
<div class="modal" id="modal_replies">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id="reply_form">
                    <input type="hidden" id="comment_id" value="0">
                    <div class="parent_div">
                        <div class="comment_profile_pic">
                            <img src="images/profile_pic.png" alt="" height="40px" style="border-radius: 50%;"
                                class="profile_pics">
                        </div>
                        <div class="comment_user">
                            <p>
                                <span><?php echo $_SESSION['name']; ?></span>
                                <span style="color: grey">@<?php echo $_SESSION['username']; ?></span>
                            </p>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="comment_input_foryou" id="replies_input_p"
                            placeholder="Post your reply" maxlength="500">
                        <span class="replies_span">500</span>
                        <p class="replies-err-msg error"></p>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="">
                <button type="submit" class="replies_btn">Reply</button>
            </div>
        </div>
    </div>
</div>
<!-- Nested Reply Modal -->
<div class="modal" id="modal_nested_replies">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Reply</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="nested_reply_form">
                    <input type="hidden" id="reply_id_input">
                    <input type="hidden" id="parent_id_input">
                    <input type="hidden" id="comment_id_input">
                    <div class="parent_div d-flex mb-2">
                        <div style="height: 50px; width: 50px;">
                            <img src="images/profile_pic.png" alt="" height="50px" width="50px"
                                style="border-radius: 50%;" class="profile_pics">
                        </div>
                        <div>
                            <p class="mb-0" style="margin-top: 5px; margin-left: 10px;">
                                <span><?php echo $_SESSION['name']; ?></span>
                                <span style="color: grey;">@<?php echo $_SESSION['username']; ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <input type="text" id="nested_reply_input" placeholder="Post your reply" maxlength="500">
                        <small class="text-muted"><span class="nested_reply_char_count">500</span> </small>
                        <p class="error nested_reply_error mt-1"></p>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="nested_reply_submit_btn">Reply</button>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footers.php'; ?>

<?php
// Determine which ID is set in URL
$comment_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$reply_id = isset($_GET['reply_id']) ? (int) $_GET['reply_id'] : 0;
?>

<script>
    function comments_details(id) {
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                action: 'comment_details',
                'id': id
            },
            success: function (data) {  
                $(".user_comment").html(data);
            }
        });
    }

    function reply_details(id) {
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                action: 'reply_details',
                id: id
            },
            success: function (data) {
                $(".user_comment").html(data);
            }
        });
    }

    $(document).ready(function () {
        var commentId = <?= $comment_id ?>;
        var replyId = <?= $reply_id ?>;

        if (commentId > 0) {
            comments_details(commentId);
        } else if (replyId > 0) {
            reply_details(replyId);
        }
    });
</script>