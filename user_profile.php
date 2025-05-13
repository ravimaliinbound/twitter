<?php
include_once 'headers.php'
    ?>
<title><?php echo $_SESSION['name']; ?> (@<?php echo $_SESSION['username']; ?>)</title>

<div class="profile">
    <div class="profile-name">
        <p>
            <span class="user_pro-name"></span><br>
            <span class="count"></span>
            <span class="post-posts"></span>
        </p>
    </div>
    <div class="user_cover">
        <!-- Cover image or background -->
    </div>
    <div class="user_profile-pic">
        <img src="images/profile_pic.png" alt="" style="border-radius: 50%;" class="user_profile_pics" height="100px"
            width="100px">
    </div>

    <div class="follow-btn">
        <a href="#" class="follow">Follow</a>
    </div>
    <div class="profile-data">
        <p>
            <span class="user_pro-name"></span>
            <br><span class="user_username"></span>
        </p>
        <p class="user_bio"></p>
        <p>
            <img src="images/calendar.png" alt="" height="20px"> Joined
            <span class="user_joined"></span>
        </p>
        <p>
            <span>
                <span class="following">15</span> Following
            </span>
            <span class="follower">1</span>
            <span>Follower</span>
        </p>
    </div>
</div>

<?php
include_once 'footers.php'
    ?>


<?php
$conn = new mysqli('localhost', 'root', '', 'twitter');


// Check if username is passed via URL
if (!isset($_GET['username'])) {
    echo "No user selected.";
    exit;
}
$username = $_GET['username'];
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    var username = '<?php echo $username; ?>';
    $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { action: 'show_user', username: username },
        success: function (response) {
            var data = JSON.parse(response);
            $(".user_pro-name").text(data.name);
            $(".user_bio").text(data.bio);
            $(".user_username").text("@" + data.username);
            $(".user_joined").text(data.joined);
            
            if (data.profile == "") {
                $(".user_profile_pics").attr('src', 'images/profile_pic.png');
            } else {
                $(".user_profile_pics").attr('src', 'profile_pic/' + data.profile);
            }

            if (data.cover == "") {
                $(".user_cover").css('background', 'rgb(207, 217, 222)');
            } else {
                $(".user_cover").css({
                    'background': 'url(cover_pic/' + data.cover + ')',
                    'background-size': '800px 250px',
                    'width': '100%'
                });
            }
        }
    });
});
</script>
