<?php
include_once 'headers.php'
    ?>
<div class="middle">
    <h4 class="follow_user">Ravi Mali</h4>
    <div class="ul_list">
        <ul>
            <a href="user_followers.php">
                <li>
                    <span>Followers</span>
                </li>
            </a>
            <a href="#">
                <li>
                    <span class="follow_active" style="color: black; font-weight: 500">Following</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="user_following_list">

    </div>
</div>
<div class="footers">
    <div class="follow_footer">
        <p class="what">What's happening</p>
        <div class="trending">
            <span>Politics · Trending</span>
            <p>#BJP</p>
            <span>Trending</span>
            <p>#War2</p>
            <span>Trending</span>
            <p>Sehwag</p>
            <span>Trending</span>
            <p>#stufflistingsarmy </p>
            <span>Music · Trending</span>
            <p>To Me</p>
        </div>
    </div>
    <div class="footerss">
        <a href="#" class="f-anchor">Terms of Service |</a>
        <a href="#" class="f-anchor"> Privacy Policy |</a>
        <a href="#" class="f-anchor"> Cookie Policy |</a>
        <a href="#" class="f-anchor"> Accessibility |</a>
        <a href="#" class="f-anchor"> Ads info |</a>
        <a href="#" class="f-anchor"> © <?php echo date('Y') ?> X Corp.</a>
    </div>
</div>
<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['other_user'] = $username;
}
$username = $_SESSION['other_user'];
?>
<script>
    $(document).ready(function () {
        var username = '<?php echo $username ?>';
        $(".follow_user").text("@" + username);
        show_following();
        see_user_following(username);
    });
</script>