<div class="modal" id="comment-modal-foryou">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id="comment_form_foryou">
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
                        <input type="text" name="comment_input_foryou" id="comment_input_foryou"
                            placeholder="Post your reply" maxlength="500">
                        <span class="comment_span_foryou">500</span>
                        <p class="comment-err-msg-foryou"></p>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="">
                <button type="submit" class="comment_reply_btn_forYou">Reply</button>
            </div>
        </div>
    </div>
</div>