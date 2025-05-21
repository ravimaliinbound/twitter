<?php
include_once 'headers.php';
?>
<div class="middle">
    <div class="user_d">
        <h3 class="post_d">Reply</h3>
    </div>
    <div class="user_comment">

    </div>
</div>
<!--------------------Reply Modal--------------------->

<?php
include_once 'reply_modal.php';
?>
<!----------- Nested Reply Modal---------->
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
                                <span class=""><?php echo $_SESSION['name']; ?></span>
                                <span style="color: grey">@<?php echo $_SESSION['username'] ?></span>
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
<?php
include_once 'footers.php';
?>


<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
}
if (isset($_GET['reply_id'])) {
    $reply_id = $_GET['reply_id'];
    $_SESSION['reply_id'] = $reply_id;
}
$id = $_SESSION['id'];
$reply_id = $_SESSION['reply_id'];
?>
<script>
    function comments_details(id) {
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'action': 'comment_details', 'id': id },
            success: function (data) {
                if (data) {
                    $(".user_comment").html(data)
                }
            }
        });
    }
    function reply_details(id) {
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'action': 'reply_details', 'id': id },
            success: function (data) {
                if (data) {
                    $(".user_comment").html(data)
                }
            }
        });
    }
    $(document).ready(function () {
        var id = '<?php echo $id; ?>';
        var reply_id = '<?php echo $reply_id; ?>';
        <?php
        if (isset($_GET['id'])) {
            ?>
            comments_details(id);
            <?php
        } else if (isset($_GET['reply_id'])) {
            ?>
                reply_details(id);
            <?php
        }
        ?>
    });
</script>