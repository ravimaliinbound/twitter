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

<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['other_user'] = $username;
}
$username = $_SESSION['other_user'];
?>
<script>
    $(document).ready(function () {
        var username = '<?php echo $username?>';
        $(".follow_user").text("@"+username);
        show_following();
        see_user_following(username);
    });
</script>