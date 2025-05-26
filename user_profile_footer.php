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
    //-----------remove follower-------------//
    function remove_user(username) {
        $("#remove_follower").modal("show");
    }
    $(document).ready(function () {
        var username = '<?php echo $username; ?>';
        var current_user = '<?php echo $current_user; ?>';
        show_user_post(username);
        show_user_media(username);
        other_user_post_count(username);
        fetch_follower(username);
        fetch_following(username);

        /*------------- See User's Following----------------*/
        $(document).on('click', '.see_user_following', function () {
            see_user_following(username);
        });
        /*------------- See User's Followers----------------*/
        $(document).on('click', '.see_user_followers', function () {
            see_user_followers(username);
        });

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { action: 'show_user', username: username },
            success: function (response) {
                var data = JSON.parse(response);
                $(".user_pro-name").text(data.name);
                if (data.username == current_user) {
                    window.location = 'profile.php';
                }
                $(".user_bio").text(data.bio);
                $(".user_username").text("@" + data.username);
                $(".user_joined").text(data.joined);

                if (data.profile == "") {
                    $(".user_profile_pics").attr('src', 'images/profile_pic.png');
                } else {
                    $(".user_profile_pics").attr('src', 'profile_pic/' + data.profile);
                }
                $('.user_profile_pics').css({
                    'width': '100%',
                    'height': '100%'
                })

                if (data.cover == "") {
                    $(".user_cover").css({
                        'background': 'url(cover_pic/cover.png)',
                        'background-size': '750px 350px',
                        'width': '100%'
                    });
                } else {
                    $(".user_cover").css({
                        'background': 'url(cover_pic/' + data.cover + ')',
                        'background-size': '750px 350px',
                        'width': '100%'
                    });
                }
            }
        });

        /*---------------Follow Unfollow-----------------------*/
        $(".follow").click(function () {
            if ($(this).text() == 'Unfollow') {
                var conf = confirm("Do you really want to unfollow @" + username + '?');
                if (conf == true) {
                    $.ajax({
                        url: "action.php",
                        type: "post",
                        data: { "action": "unfollow", 'other_user': username },
                        success: function (data) {
                            if (data) {
                                $.ajax({
                                    url: 'action.php',
                                    type: 'post',
                                    data: { 'action': 'follow_back', 'other_user': username },
                                    success: function (dataa) {
                                        if (dataa == 1) {
                                            $('.follow').text("Follow Back");
                                        } else {
                                            $('.follow').text("Follow");
                                        }
                                        fetch_following(username);
                                        fetch_follower(username);
                                    }
                                })
                            }
                            $('.follow').css({
                                'background-color': 'black',
                                'color': 'white'
                            });
                            fetch_following(username);
                            fetch_follower(username);
                        }
                    });
                }
            }
            if ($(this).text() == 'Follow' || $(this).text() == 'Follow Back') {
                $.ajax({
                    url: "action.php",
                    type: "post",
                    data: { "action": "follow_unfollow", 'other_user': username },
                    success: function (data) {
                        following_post();
                        fetch_following(username);
                        fetch_follower(username);
                    }
                });
            }
            $(this).css({
                'background-color': 'white',
                'color': 'black',
                'border': '1px solid'
            });
            $(this).text("Following")
        });

        /*--------------------Show Unfollow Option on Mouseenter-----------------------*/
        $(document).on('mouseenter', '.follow', function () {
            if ($(this).text() == 'Following') {
                $(this).css({
                    'background-color': 'rgb(255, 216, 216)',
                    'border': '1px solid rgb(255, 158, 158)',
                    'color': 'red'
                });
                $(this).text("Unfollow");
            }
        });
        $(document).on('mouseout', '.follow', function () {
            if ($(this).text() == 'Following') {
                $(this).css({
                    'background-color': 'white',
                    'border': '1px solid black',
                    'color': 'black'
                });
                $(this).text("Following");
            }
            if ($(this).text() == 'Unfollow') {
                $(this).css({
                    'background-color': 'white',
                    'border': '1px solid black',
                    'color': 'black'
                });
                $(this).text("Following");
            }
        });
        /*------------------- Check if already followed other user--------------------------*/
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'action': 'follow_check', 'other_user': username },
            success: function (data) {
                if (data == 'No') {
                    $(".follow").text("Follow")
                }
                if (data == 'Back') {
                    $(".follow").text("Follow Back")
                } else if (data == 'Yes') {
                    $(".follow").text("Following");
                    $(".follow").css({
                        'background-color': 'white',
                        'border': '1px solid black',
                        'color': 'black'
                    });
                }
            }
        });

        if ($('.follow').text() == 'Following') {
            $('.follow').css({
                'background-color': 'white',
                'border': '1px solid black',
                'color': 'black'
            });
        }

    });
</script>
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