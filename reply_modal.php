<div class="modal" id="modal_recomment">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action='' id='reply_form'>
                    <input type='hidden' id='comment_id' value='0'>
                    <div class='parent_div'>
                        <div class='comment_profile_pic'>
                            <img src='images/profile_pic.png' alt='' height='40px' style='border-radius: 50%;'
                                class='profile_pics'>
                        </div>
                        <div class='comment_user'>
                            <p>
                                <span class='comment_name_foryou'></span>
                                <span class='comment_username'></span>
                            </p>
                        </div>
                    </div>
                    <div>
                        <input type='text' name='comment_input_foryou' id='reply_input_p'
                            placeholder='Post your reply' maxlength='500'>
                        <span class='reply_span'>500</span>
                        <p class='reply-err-msg error'></p>
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