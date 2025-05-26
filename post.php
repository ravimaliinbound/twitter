<div class="index-post-form">
    <div class="index-sess">
        <a href="profile.php" class="pro-fname">
            <img src="images/profile_pic.png" alt="" class="post_profile_pic">
        </a>
    </div>
    <div class="index-inp">
        <form action="" id="content_form">
            <input type="text" placeholder="What's happening?" name="index-input" class="index_input" rows="5" cols="40"
                maxlength="500" style="width: 630px">
            <span class="index_input_span">500</span>
        </form>
    </div>
</div>
<div class="index-post-icons">
    <div class="post-icons">
        <form action="" method="post" enctype="multipart/form-data" id="media_form">
            <label for="index-image">
                <img src="images/image.png" alt="" height="16px" class="post-image-hover">
            </label>
            <input type="file" id="index-image" style="display: none;" name="index-image"
                accept="image/png, image/jpeg, image/jpg, image/avif, image/gif, video/*">
        </form>
    </div>
    <div class="post-icons">
        <img src="images/gif.png" alt="" height="20px">
    </div>
    <div class="post-icons">
        <img src="images/grok.png" alt="" height="20px">
    </div>
    <div class="post-icons">
        <img src="images/polling.png" alt="" height="20px">
    </div>
    <div class="post-icons">
        <img src="images/happy.png" alt="" height="18px">
    </div>
    <div class="post-icons">
        <img src="images/schedule.png" alt="" height="18px">
    </div>
    <div class="post-icons">
        <img src="images/location.png" alt="" height="18px">
    </div>
    <div class="post-btn">
        <a href="#" onclick="insert_post()">Post</a>
    </div>
</div>
<p class="post-err post-err-msg"></p>