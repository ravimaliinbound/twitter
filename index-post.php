<div class="index-post">
    <div class="index-post-form">
        <div class="index-sess">
            <a href="profile.php" class="pro-fname"><p class="index_first_name" style="margin-top: 5px;"><?php echo $_SESSION['firstname']; ?></p></a>
        </div>
        <div class="index-inp">
            <form action="" id="content-form">
                <input type="text" placeholder="What's happening?" name="index-input" id="index-input">
            </form>
        </div>
    </div>
    <div class="index-post-icons">
        <div class="post-icons">
            <form action="" method="post" enctype="multipart/form-data" id="media-form">
                <label for="index-image"><img src="images/image.png" alt="" height="16px"  class="post-icons"></label>
                <input type="file" id="index-image" style="display: none;" name="index-image">
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
            <a href="#" class="bg-dark text-white" onclick="insert_post()">Post</a>
        </div>
    </div>
</div>

<!-- Adding class to active element -->
<script>
    $(document).ready(function () {
        $("#home").addClass("active_class");
    });
</script>