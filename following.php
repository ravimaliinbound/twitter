<?php
include_once 'headers.php'
    ?>
<title>Home / X</title>

<div class="middle">
    <div class="ul" style="width: 40%; position: fixed;">
        <ul class="">
            <li>&nbsp; <a href="index.php" class="hover">For you</a></li>
            <li> <a href="following.php" class="hover" style="border-bottom: 2px solid ">Following</a></li>
        </ul>
    </div>
    <div class="index-post">
        <div class="index-post-form">
            <div class="index-sess">
                <p class="index_first_name" style="margin-top: 5px;"><?php echo $_SESSION['firstname']; ?></p>
            </div>
            <div class="index-inp">
                <form action="">
                    <input type="text" placeholder="What's happening?" name="index-input" id="index-input">

                </form>
            </div>
        </div>
        <div class="index-post-icons">
            <div class="post-icons">
                <label for="index-image" class="post-icons"><img src="images/image.png" alt="" height="16px"></label>
                <input type="file" id="index-image" style="display: none;">
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
                <a href="#" class="bg-dark text-white">Post</a>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footers.php';
?>