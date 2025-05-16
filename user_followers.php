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
            <a href="user_following.php">
                <li>
                    <span>Following</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="user_followers_list">

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
        var username = "<?php echo $username; ?>";
        $(".follow_user").text("@"+username);
        show_followers();
        see_user_followers(username);
    });
</script>