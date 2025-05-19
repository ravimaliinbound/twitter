<?php
include_once 'headers.php';
?>
<div class="middle">
    <div class="user_d">
        <h3 class="post_d">Post</h3>
    </div>
    <div class="user_comment">
        <div class='mydiv'>
            <div style='display: flex;'>
                <div class='post-user-info'>
                    <img src='images/profile_pic.png' alt='Post' height='40px' style='border-radius: 50%'>
                </div>
                <div>
                    <input type='hidden' id='a_id' value='0'>
                    <input type='hidden' id='b_username' value='0'>
                    <input type='hidden' id='p_id' value='$data->id'>
                    <input type='hidden' id='p_username' value='$data->post_owner_name'>
                    <p style='margin-top: 10px;'>
                        <span class='name_d'>Ravi Mali </span>
                        <span class='username_d'>@ravimali</span>
                        <span class='time' title='$title'>· 3h</span>
                    </p>
                    <p class='post-content'>Good Morning</p>
                    <div class='comment_media'></div>
                </div>
            </div>
            <div class='post_details'>
                <p class='icons'>
                    <span class='comment-icon open_modal_comment' data-post-id=''>
                        <img src='images/chat.png' height='17px' title='Reply'>
                    </span>
                    <span class='comment-count'>12</span>
                    <span class='like-icon' data-post-id=''>
                        <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                    </span>
                    <span class='like'>4</span>
                </p>
            </div>
        </div>
        <div>
            <form action='' id='reply_form'>
                <div class='parent_div'>
                    <div class='profile_profile_pic'>
                        <img src='images/profile_pic.png' alt='' height='40px' style='border-radius: 50%;'
                            class='profile_pics'>
                    </div>
                    <div>
                        <input type='text' name='comment_input_foryou' id='reply_input_p' placeholder='Post your reply'
                            maxlength='500'>
                        <span class='reply_span'>500</span>
                        <p class='reply-err-msg error'></p>
                        <p class='reply_btn'>Reply</p>
                    </div>
                </div>
            </form>
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
$id = $_SESSION['id'];
?>
<script>
    $(document).ready(function () {
        var id = '<?php echo $id; ?>';
        console.log(id)
    });
</script>