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
        var username = '<?php echo $username; ?>';
        show_user_post(username);
        show_user_media(username);
        other_user_post_count(username);
        fetch_follower(username);
        fetch_following(username);
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
                    $(".user_cover").css({
                        'background': 'url(cover_pic/cover.png)',
                        'background-size': '800px 250px',
                        'width': '100%'
                    });
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
<?php
include_once 'footers.php'
    ?>