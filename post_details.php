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
<!-- Delete Post Modal -->
<div class="modal" id="delete_post_modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <!-- Modal body  -->
            <div class="modal-body">
                <ul class="models-ul">
                <input type='hidden' id='post_context' value=''>
                    <li onclick="delete_post_self()">
                    <input type='hidden' id='hidden_val_for_post_del' value='0'>
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
<?php
include_once 'reply_modal.php';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
}
if (isset($_GET['context'])) {
    $context = $_GET['context'];
}
$id = $_SESSION['id'];
?>
<script>
    function post_details(id) {
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                'action': 'post_details',
                'id': id
            },
            success: function(data) {
                if (data == "") {
                    $(".post_data").html("<h4 class='no'>No comments yet.<h4>")
                } else {
                    $(".post_data").html(data)
                }
            }
        });
    }

    function before_delete_self(id) {
        $('#delete_post_modal').modal('show');
        $("#hidden_val_for_post_del").val(id);
    }
    $(document).ready(function() {
        var id = '<?php echo $id; ?>';
        var context = '<?php echo $context; ?>';
        $("#post_context").val(context)
        post_details(id);
    });
</script>