<?php
include_once 'headers.php'
    ?>
<div class="middle">
    <h4 class="follow_user">Ravi Mali</h4>
    <div class="ul_list">
        <ul>
            <a href="#">
                <li>
                    <span class="follow_active" style="color: black; font-weight: 500">Followers</span>
                </li>
            </a>
            <a href="see_following.php">
                <li>
                    <span>Following</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="followers_list">

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
$current_user = $_SESSION['username'];
?>
<script>
    $(document).ready(function () {
        var username = "<?php echo $username; ?>";
        var current_user = "<?php echo $current_user; ?>";
        $(".follow_user").text("@"+current_user);
        show_followers();
        see_user_followers(username);
    });
</script>