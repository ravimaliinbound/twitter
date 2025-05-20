<?php
include_once 'headers.php';
?>
<div class="middle">
    <div class="user_d">
        <h3 class="post_d">Post</h3>
    </div>
    <div class='post_data'>

    </div>
</div>

<?php
include_once 'footers.php';
?>

<!--------------------Comment Modal--------------------->

<div class="modal" id="modal_comment">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id="comment_form_modal">
                    <div class="parent_div">
                        <div class="comment_profile_pic">
                            <img src="images/profile_pic.png" alt="" height="40px" style="border-radius: 50%;"
                                class="profile_pics">
                        </div>
                        <div class="comment_user">
                            <p>
                                <span class="comment_name_foryou"></span>
                                <span class="comment_username"></span>
                            </p>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="comment_input_foryou" id="comment_input_modal"
                            placeholder="Post your reply" maxlength="500">
                        <span class="comment_span_foryou">500</span>
                        <p class="comment-err-msg-foryou"></p>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="">
                <button type="submit" class="comment_reply_modal">Reply</button>
            </div>
        </div>
    </div>
</div>
<!--------------------Reply Modal--------------------->

<div class="modal" id="modal_recomment">
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
                                <span class="comment_name_foryou"></span>
                                <span class="comment_username"></span>
                            </p>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="comment_input_foryou" id="reply_input_p"
                            placeholder="Post your reply" maxlength="500">
                        <span class="reply_span">500</span>
                        <p class="reply-err-msg"></p>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="">
                <button type="submit" class="reply_btn">Reply</button>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
}
$id = $_SESSION['id'];
?>
<script>

    function post_details(id) {
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'action': 'post_details', 'id': id },
            success: function (data) {
                if (data == "") {
                    $(".post_data").html("<h4 class='no'>No comments yet.<h4>")
                } else {
                    $(".post_data").html(data)
                }
            }
        });
    }
    $(document).ready(function () {
        var id = '<?php echo $id; ?>';
        post_details(id);
    });
</script>