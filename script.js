// --------Post Details----------------//
function post_details(id) {
    $.ajax({
        url: 'action.php',
        type: 'post',
        data: { 'action': 'post_details', 'id': id },
        success: function (data) {
            if (data == "") {
                $(".post_data").html("<h4 class='no'>No comments yet.<h4>")
            } else {
                $(".post_data").html(data)
            }
        }
    });
}

// --------Comment Details----------------//
function comments_details(id) {
    $.ajax({
        url: 'action.php',
        type: 'post',
        data: { 'action': 'comments_details', 'id': id },
        success: function (data) {
            if (data) {
                $(".user_comment").html(data)
            }
        }
    });
}

//-----------Fetch Data-----------//
function fetch_data() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "fetch" },
        success: function (data) {
            var jsonData = JSON.parse(data);
            $(".pro-name").text(jsonData.name);
            $(".username").text(jsonData.username);
            $(".bio").text(jsonData.bio);
            $(".joined").text(jsonData.joined_date);
        }
    });
}

/*---------------- Show Notifications----------------------*/
function show_notifications() {
    $.ajax({
        url: 'action.php',
        type: 'post',
        data: { 'action': 'show_notifications' },
        success: function (data) {
            if (data == "") {
                $(".show_notifications").html("<p class='empty_n'>You will seen notifications here.<p>")
            }
            else {
                $(".show_notifications").html(data)
            }
        }
    });
}

/*--------------------- Fetch Follower Count------------------*/
function fetch_follower(username) {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "fetch_follower", 'username': username },
        success: function (data) {
            if (data > 999) {
                var followers = data / 100 + 'K';
            }
            else {
                var followers = data;
            }
            $(".user_follower").text(followers);
            if (data == 1) {
                $(".follower_followers").text("Follower");
            } else {
                $(".follower_followers").text("Followers");
            }
        }
    });
}

/*--------------------- Show Following Posts------------------*/
function following_post() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "following_post" },
        success: function (data) {
            $(".following_post").html(data)
        }
    });
}

/*--------------------- Fetch Follower Count------------------*/
function fetch_following(username) {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "fetch_following", 'username': username },
        success: function (data) {
            if (data > 999) {
                var following = data / 100 + 'K';
            }
            else {
                var following = data;
            }
            $(".user_following").text(following);
        }
    });
}

/*--------------------- Fetch Follower Count For Current Logged in User------------------*/
function follower() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "follower" },
        success: function (data) {
            if (data > 999) {
                var followers = data / 100 + 'K';
            }
            else {
                var followers = data;
            }
            $(".follower").text(followers);
            if (data == 1) {
                $(".followers").text("Follower");
            } else {
                $(".followers").text("Followers");
            }
        }
    });
}

/*--------------------- Fetch Follower Count For Current Logged in User------------------*/
function following() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "following" },
        success: function (data) {
            if (data > 999) {
                var following = data / 100 + 'K';
            }
            else {
                var following = data;
            }
            $(".following").text(following);
        }
    });
}


//-------------- Open Post Model------------//
function open_model() {
    setTimeout(function () {
        $('.index_inputs').focus();
    }, 500);
    $(".index_inputs").val("");
    $(".post-btn a").css("background-color", "grey")
    $("#post_modal").modal('show');
    $(".index_inputs_span").text("500");
}

/*------------------- Show For You Posst-----------------*/
function show_foryou_post() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_foryou_post" },
        success: function (response) {
            $(".for_you_post").html(response);
        }
    });
}
/*------------------- Show Other User Post-----------------*/
function show_user_post(username) {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_user_post", 'username': username },
        success: function (response) {
            $(".other_user_post").html(response);
        }
    });
}

/*------------------- Show Following-----------------*/
function show_following() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_following" },
        success: function (response) {
            $(".following_list").html(response);
            if (response == "") {
                $(".following_list").html("<h3 class='no'>No Following Yet.<h3>");
            }
        }
    });
}
/*------------------- Show Followers-----------------*/
function show_followers() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_followers" },
        success: function (response) {
            $(".followers_list").html(response);
            if (response == "") {
                $(".user_followers_list").html("<h3 class='no'>No Followers Yet.<h3>");
            }
        }
    });
}

/*------------------- Show User's Following-----------------*/
function see_user_following(username) {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_following", "username": username },
        success: function (response) {
            $(".user_following_list").html(response);
            if (response == "") {
                $(".user_following_list").html("<h3 class='no'>No Following Yet.<h3>");
            }
        }
    });
}

/*------------------- Show User's Followers-----------------*/
function see_user_followers(username) {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_followers", "username": username },
        success: function (response) {
            $(".user_followers_list").html(response);
            if (response == "") {
                $(".user_followers_list").html("<h3 class='no'>No Followers Yet.<h3>");
            }
        }
    });
}
/*------------------- Show Comments-----------------*/
function show_comments() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_comments" },
        success: function (response) {
            $(".replies").html(response);
            if (response == "") {
                $(".replies").html("<h3 class='no'>No Comments Yet.<h3>");
            }
        }
    });
}
/*------------------- Delete Comments-----------------*/
function delete_comment(id, post_id) {
    var conf = confirm("Do you really want to delete this comment?");
    if (conf == true) {
        $.ajax({
            url: "action.php",
            type: "post",
            data: { "action": "delete_comment", "id": id },
            success: function (data) {
                if (data) {
                    show_comments();
                }
            }
        });
    }
}

/*------------------- Show Other User Media-----------------*/
function show_user_media(username) {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_user_media", 'username': username },
        success: function (response) {
            $(".show_user_media").html(response);
            if (response == "") {
                $(".show_user_media").html("<h3 class='no'>No Media Yet.<h3>");
            }
        }
    });
}
//-------------------- Post Validate----------------//
function validate_post(e) {
    var isValid = true;

    var image = $("#index-image").val();
    var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG|avif|AVIF)$/;

    if (!imgPattern.test(image)) {
        $(".post-err-msg").text("Select a valid file");
        isValid = false;
    }
    else {
        $(".post-err-msg").text("");
    }
    if (image == "") {
        $(".post-err-msg").text("");
        isValid = true;
    }
    return isValid;
}


//-------------------- Modal Post Validate ----------------//
function validate_post_modal(e) {
    var isValid = true;

    var image = $("#index-images").val();
    var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG|avif|AVIF)$/;

    if (!imgPattern.test(image)) {
        $(".modal-post-err-msg").text("Select a valid file");
        isValid = false;
    }
    else {
        $(".modal-post-err-msg").text("");
    }
    if (image == "") {
        $(".modal-post-err-msg").text("");
        isValid = true;
    }
    return isValid;
}
//-----------------Insert Post-------------//
function insert_post() {
    var input = $(".index_input").val().trim();
    var forms = $('#media_form')[0];
    var formData = new FormData(forms);
    formData.append('input', input);
    formData.append('action', 'insert_post');
    if (!validate_post()) {
        return false;
    }
    $.ajax({
        url: "action.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#content_form')[0].reset();
            $('#media_form')[0].reset();
            show_post();
            count_posts();
            $(".post-btn a").css('background-color', 'grey');
            $(".index_input_span").text('500');
            $(".index_input_span").css('color','black');
            show_foryou_post();
        }
    });
}

//------------------Insert Post With Modal-------------//
function insert_post_modal() {
    var input = $(".index_inputs").val().trim();
    var form = $('#post_media_form')[0];
    var formData = new FormData(form);
    formData.append('input', input);
    formData.append('action', 'insert_post');
    if (!validate_post_modal()) {
        return false;
    }
    $.ajax({
        url: "action.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#post_content_form')[0].reset();
            $('#post_media_form')[0].reset();
            if (data == "") {
                $("#post_modal").modal('hide');
            }
            $(".post-btn a").css('background-color', 'grey')
            $(".index_inputs_span").text('500');
            show_post();
            show_foryou_post();
            count_posts();
        }
    });
}

//----------------Edit User-------------------------//
function edit_user() {
    var form = $("#edit-user-form")[0];
    var formData = new FormData(form);
    formData.append('action', 'edit_user');
    if (!validate_edit()) {
        return false;
    }
    $.ajax({
        url: "action.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function () {
            $("#edit-user").modal('hide');
            edit_profile();
            fetch_data();
            show_post();
        }
    })
}

//------------------------------ Edit Validate--------------------
function validate_edit(e) {
    var isValid = true;

    // Patterns
    var emailPattern = /^[a-zA-Z0-9.]+\@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    var usernamePattern = /^[a-zA-Z]{1,15}$/;
    var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG|avif|AVIF)$/;


    // Input Values
    var name = $('#edit-name').val().trim();
    var username = $('#edit-username').val().trim();
    var email = $('#edit-email').val().trim();
    var dob = $('#edit-dob').val().trim();
    var profile = $("#edit-profile-pic").val();
    var cover = $("#edit-cover-pic").val();

    // ----------- Name Validation ------------
    if (name == "") {
        $("#err-editname").text("Name can't be blank");
        isValid = false;
    }
    if (username == "") {
        $("#err-editusername").text("Username can't be blank");
        isValid = false;
    }
    else if (!usernamePattern.test(username)) {
        $("#err-editusername").text("Enter a valid username");
        isValid = false;
    }
    //------------ Image Validation-----------
    if (!imgPattern.test(profile)) {
        $("#err-profile").text("Profile image is not valid");
        isValid = false;
    }

    if (profile == "") {
        $("#err-profile").text("");
        isValid = true;
    }
    if (!imgPattern.test(cover)) {
        $("#err-cover").text("Cover image is not valid");
        isValid = false;
    }

    if (cover == "") {
        $("#err-cover").text("");
        isValid = true;
    }
    // ----------- Email Validation ------------
    if (email == "") {
        $("#err-editemail").text("Email can't be blank");
        isValid = false;
    } else if (!emailPattern.test(email)) {
        $("#err-editemail").text("Enter a valid email");
        isValid = false;
    }

    if ($("#edit_email_check").val() == 1) {
        $("#err-editemail").text("Email has already been taken");
        isValid = false;
    }
    if ($("#edit_username_check").val() == 1) {
        $("#err-editusername").text("Username has already been taken");
        isValid = false;
    }

    //----------DOB Validation-------------//

    if (dob == "") {
        $("#err-editdob").text("Date of birth can't be blank");
        isValid = false;
    }
    return isValid;
}

//---------------- Open Edit Modal-----------------//
function edit_modal() {
    $("#edit-user").modal('show');
}

//------------------ Edit Profile Open Form (Modal)-------------------//

function edit_profile() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "edit_profile" },
        success: function (response) {
            var data = JSON.parse(response)
            $("#edit-name").val(data.name);
            $("#edit-username").val(data.username);
            $("#edit-email").val(data.email);
            $("#edit-dob").val(data.dob);
            $("#edit-bio").val(data.bio);
            var profile = data.profile;
            var cover = data.cover;
            if (profile == "") {
                $(".profile_pics").attr('src', 'images/profile_pic.png');
            } else {
                $(".profile_pics").attr('src', 'profile_pic/' + profile);
                $(".profile_pics").css({
                    'width': '100%',
                    'height' : '100%'
                });
            }
            if (cover == "") {
                $(".cover").css('background', 'url(cover_pic/cover.png)');
                $(".covers").css({
                    'background': 'url(cover_pic/cover.png)',
                    'width': '100%',
                });
            } else {
                var imageUrl = 'cover_pic/' + cover;
                $(".cover").css({
                    'background': 'url(' + imageUrl + ')',
                    'background-size': '800px 250px',
                    'width': '100%',
                });
                $(".covers").css({
                    'background': 'url(' + imageUrl + ')',
                    'background-size': '450px 150px',
                    'width': '100%',
                    'height': '100%',
                    'background-repeat': 'no-repeat'
                });
            }
        }
    });
}

//-------------Before Delete Post-------------//
function before_delete(id) {
    $('#deleteModal').modal('show');
    $("#hidden").val(id);
}

function before_deletes(id) {
    $('#deletesModal').modal('show');
    $("#hidden").val(id);
}

//-------------Post Details-------------//
function post_details(id) {
    window.location.href = 'post_details.php?id=' + id;
}

//-------------Before Delete Notification-------------//
function before_delete_notification(id) {
    $('#delete_n_Modal').modal('show');
    $("#n_hidden").val(id);
}

//--------------------- Delete Post-----------------//
function delete_post() {
    var conf = confirm("Do you really want to delete this post?");
    if (conf == true) {
        var id = $("#hidden").val();
        $.ajax({
            url: "action.php",
            type: "post",
            data: { 'action': 'delete_post', 'post_id': id },
            success: function (data) {
                $('#deleteModal').modal('hide');
                show_media();
                count_posts();
                show_post();
            }
        });
    }
}
function delete_posts() {
    var conf = confirm("Do you really want to delete this post?");
    if (conf == true) {
        var id = $("#hidden").val();
        $.ajax({
            url: "action.php",
            type: "post",
            data: { 'action': 'delete_posts', 'post_id': id },
            success: function (data) {
                $('#deletesModal').modal('hide');
                show_media();
                count_posts();
                show_post();
                show_foryou_post();
            }
        });
    }
}
function reply_details(id) {
    $.ajax({
        url: 'action.php',
        type: 'post',
        data: {
            action: 'reply_details',
            id: id
        },
        success: function (data) {
            $(".user_comment").html(data);
        }
    });
}

//--------------------- Delete Post-----------------//
function delete_notification() {
    var conf = confirm("Do you really want to delete this notification?");
    if (conf == true) {
        var id = $("#n_hidden").val();
        $.ajax({
            url: "action.php",
            type: "post",
            data: { 'action': 'delete_notification', 'id': id },
            success: function (data) {
                $('#delete_n_Modal').modal('hide');
                show_notifications();
            }
        });
    }
}


//--------------- Show Media-----------------------//
function show_media() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_media" },
        success: function (data) {
            if (data == "") {
                $(".highlight").css("display", "block");
            }
            else {
                $(".media-flex").html(data);
            }
        }
    });
}

//----------------- Post Count-----------------//
function count_posts() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { 'action': 'count_posts' },
        success: function (data) {
            $(".count").text(data)
            if (data == 1) {
                $(".post-posts").text('post');
            } else {
                $(".post-posts").text('posts');

            }
        }
    });
}


//----------------- Other User Post Count-----------------//
function other_user_post_count(username) {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { 'action': 'other_user_post_count', 'username': username },
        success: function (data) {
            $(".user_post_count").text(data)
            if (data == 1) {
                $(".user-post-posts").text('post');
            } else {
                $(".user-post-posts").text('posts');

            }
        }
    });
}
//----------------------- Show Posts---------------------//
function show_post() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_post" },
        success: function (response) {
            var data = JSON.parse(response);
            $(".posts").html(data.post_data);
            if (data.post_data == "") {
                $(".posts").html("<h3 class='no'>No Posts Yet.<h3>");
            }
            $(".comment_name").text(data.name)
            $(".comment_name_foryou").text(data.name)
            $(".comment_username").text('@' + data.username)
        }
    });
}

/*---------------- Show Other User----------------*/
function show_user(username) {
    window.location.href = 'user_profile.php?username=' + username;
}
/*---------------- Show comemnts In details----------------*/
function show_comment(id) {
    window.location.href = 'reply.php?id=' + id;
}
function show_reply(id) {
    window.location.href = 'reply.php?reply_id=' + id;
}
//------------------Footer Who to follow-----------------//
function footer() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "footer" },
        success: function (data) {
            var response = JSON.parse(data);
            var count = response.count;
            if (count > 0) {
                $(".show_more").text("Show More");
                $(".who-to-follow").text("Who to follow");
            }
            $(".show-to-follow").html(response.arr);
        }
    });
}
//---------------------Show More-----------//
function show_more() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_more" },
        success: function (data) {
            var response = JSON.parse(data);
            $(".followw").html(response);
        }
    });
}

//-------------------Signup-----------------//
function signup() {
    var name = $("#name").val();
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var dob = $("#dob").val();

    if (!validate()) {
        return false;
    }

    $.ajax({
        url: "action.php",
        type: "post",
        data: { "name": name, "username": username, "email": email, "password": password, "dob": dob, "action": "signup" },
        success: function (data) {
            $(".show").show();
            $(".hide").hide();
            setTimeout(function () {
                $('.msg').fadeOut('slow');
                window.location = 'index.php';
            }, 100);
            $('#signup')[0].reset();
        }
    });
}

//-----------------Login-------------------//

function login() {
    var email = $("#login_email").val();
    var password = $("#login_password").val();

    if (!loginvalidate()) {
        return false;
    }

    $.ajax({
        url: "action.php",
        type: "post",
        data: { "email": email, "password": password, "action": "login" },
        success: function (response) {
            var data = JSON.parse(response);
            if (data.status == 'success') {
                $("#hide").hide();
                $("#show").show();
                $(".show").show();
                $('#login-form')[0].reset();
                setTimeout(function () {
                    window.location = 'index.php';
                }, 100);

            } else {
                $("#msg").html("<p class='p-2 rounded msg'>Incorrect, Please try again.</p>")
            }
            setTimeout(function () {
                $('.msg').fadeOut('slow');
            }, 3000);
        }
    });
}

function validate(e) {
    var isValid = true;

    // Patterns
    var usernamePattern = /^[a-zA-Z0-9]{3,15}$/;
    var namePattern = /^[a-zA-Z ]{3,15}$/;
    var emailPattern = /^[a-zA-Z0-9.]+\@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    var passPatern = /^[a-z A-Z0-9!@#$%^&*()_+-=]{8,15}$/;


    // Input Values
    var name = $('#name').val();
    var username = $('#username').val();
    var names = $('#name').val().trim();
    var usernames = $('#username').val().trim();
    var email = $('#email').val().trim();
    var password = $('#password').val().trim();
    var dob = $('#dob').val().trim();

    // Clear previous error messages
    $('.remove').text("");

    // ----------- Name Validation ------------
    if (name == "") {
        $("#errname").text("Name field is required");
        isValid = false;
    } else if (names == "") {
        $("#errname").text("Only spaces are not allowed");
        isValid = false;
    } else if (!namePattern.test(names)) {
        $("#errname").text("Minimum 3 And Maximum 15 Characters Allowed");
        isValid = false;
    }
    if (username == "") {
        $("#errusername").text("Username field is required");
        isValid = false;
    } else if (username == "") {
        $("#errusername").text("Only spaces are not allowed");
        isValid = false;
    } else if (!usernamePattern.test(usernames)) {
        $("#errusername").text("Minimum 3 And Maximum 15 Characters Allowed");
        isValid = false;
    }

    // ----------- Email Validation ------------
    if (email == "") {
        $("#erremail").text("Email field is required");
        isValid = false;
    } else if (!emailPattern.test(email)) {
        $("#erremail").text("Enter a valid email");
        isValid = false;
    }

    if ($("#email_check").val() == 1) {
        $("#erremail").text("Email has already been taken");
        isValid = false;
    }
    if ($("#username_check").val() == 1) {
        $("#errusername").text("Username has already been taken");
        isValid = false;
    }

    //---------------Password Validation--------------//

    if (password == "") {
        $("#errpassword").text("Password field is required");
        isValid = false;
    } else if (!passPatern.test(password)) {
        $("#errpassword").text("Password length must be between 8-15 characters");
        isValid = false;
    }

    //----------DOB Validation-------------//

    if (dob == "") {
        $("#errdob").text("Date of birth field is required");
        isValid = false;
    }
    return isValid;
}


//-----------Login Validation-------------//

function loginvalidate(e) {
    let isValid = true;
    var email = $("#login_email").val();
    var emails = $("#login_email").val().trim();
    var password = $("#login_password").val();

    // ----------- Email Validation ------------
    if (email == "") {
        $("#errlogin_email").text("This field is required");
        isValid = false;
    }
    else if (emails == "") {
        $("#errlogin_email").text("Only spaces are not allowed")
    }

    if (password == "") {
        $("#errlogin_password").text("Password field is required");
        isValid = false;
    }
    return isValid;
}

//-------------------- Comment Validate----------------//
function validate_comment(e) {
    var isValid = true;

    var comment = $("#comment_input").val();
    if (comment == "") {
        $(".comment-err-msg").text("Comment can't be blank");
        isValid = false;
    }
    else {
        $(".comment-err-msg").text("");
    }
    return isValid;
}

//-------------------- Comment Validate For Modal----------------//
function validate_comment_modal(e) {
    var isValid = true;

    var comment = $("#comment_input_modal").val();
    if (comment == "") {
        $(".comment-err-msg-foryou").text("Comment can't be blank");
        isValid = false;
    }
    else {
        $(".comment-err-msg-foryou").text("");
    }
    return isValid;
}
//-------------------- Comment Validate For Modal----------------//
function validate_comment_p(e) {
    var isValid = true;

    var comment = $("#comment_input_p").val();
    if (comment == "") {
        $(".comment-err-msg-p").text("Comment can't be blank");
        isValid = false;
    }
    else {
        $(".comment-err-msg-p").text("");
    }
    return isValid;
}
//-------------------- Comment Reply Validate----------------//
function validate_reply(e) {
    var isValid = true;

    var comment = $("#reply_input_p").val();
    if (comment == "") {
        $(".reply-err-msg").text("Comment can't be blank");
        isValid = false;
    }
    else {
        $(".reply-err-msg").text("");
    }
    return isValid;
}
//--------------------  Replies Validate----------------//
function validate_replies(e) {
    var isValid = true;

    var comment = $("#replies_input_p").val();
    if (comment == "") {
        $(".replies-err-msg").text("Comment can't be blank");
        isValid = false;
    }
    else {
        $(".replies-err-msg").text("");
    }
    return isValid;
}
//-------------------- Comment Reply Validate----------------//
function validate_replyy(e) {
    var isValid = true;

    var comment = $("#replyy_input_p").val();
    if (comment == "") {
        $(".replyy-err-msg").text("Comment can't be blank");
        isValid = false;
    }
    else {
        $(".replyy-err-msg").text("");
    }
    return isValid;
}
//-------------------- Comment Validate For You----------------//
function validate_comment_foryou(e) {
    var isValid = true;

    var comment = $("#comment_input_foryou").val();
    if (comment == "") {
        $(".comment-err-msg-foryou").text("Comment can't be blank");
        isValid = false;
    }
    else {
        $(".comment-err-msg-foryou").text("");
    }
    return isValid;
}

//----------------------------------------------Document.ready-------------------------------------------------//

$(document).ready(function () {
    count_posts();
    following();
    follower();
    show_notifications();

    //------------Fetch Notifications----------//
    setInterval(function () {
        $.ajax({
            url: "action.php",
            type: "POST",
            data: { 'action': "check" },
            success: function (res) {
                var data = JSON.parse(res);
                if (data.unread > 0) {
                    $("#notifDot").css('display', 'inline-block');
                    // show_notifications();
                } else {
                    $("#notifDot").css('display', 'none');
                }
            }
        });
    }, 100);

    $(document).on('click', '.edit', function () {
        $('.error').text("");
        $(".username-span, .name-span").text("15");
        $(".bio-span").text("150");
        $(".username-span, .name-span, .bio-span").css("color", "black");
    });

    /*----------Profile Pic---------*/
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "profile_pic" },
        success: function (data) {
            if (data == "") {
                $(".post_profile_pic").attr('src', 'images/profile_pic.png');
            } else {
                $(".post_profile_pic").attr('src', 'profile_pic/' + data);
            }
        }
    });


    /*--------------------Search Users on keyup-----------------------*/
    $(document).on('keyup', '.footer-search-input', function () {
        var search = $(this).val().trim();
        if (search != "") {
            $.ajax({
                url: "action.php",
                type: "post",
                data: { "action": "search", 'search': search },
                success: function (data) {
                    if (data != "") {
                        $("#searches").modal("show")
                        $("#empty").modal("hide")
                        $(".search_div").html(data)
                    } else {
                        $("#empty").modal("show");
                        $("#searches").modal("hide")
                        $(".try").text("No such user found.");
                    }
                }
            });
        } else {
            $(".try").text("Try searching for people.");
            $("#empty").modal("show")
            $("#searches").modal("hide")
        }
    });
    /*--------------------Search Users on focus-----------------------*/
    $(document).on('focus', '.footer-search-input', function () {
        var search = $(this).val().trim();
        if (search != "") {
            $.ajax({
                url: "action.php",
                type: "post",
                data: { "action": "search", 'search': search },
                success: function (data) {
                    if (data != "") {
                        $("#searches").modal("show")
                        $("#empty").modal("hide")
                        $(".search_div").html(data)
                    } else {
                        $("#empty").modal("show")
                        $(".try").text("No such user found.");
                    }
                }
            });
        } else {
            $(".try").text("Try searching for people.");
            $("#empty").modal("show")
            $("#searches").modal("hide")
        }
    });
    $(document).on('blur', '.footer-search-input', function () {
        // $("#searches").modal("hide")
        $("#empty").modal("hide")
    });

    /*--------------------Follow-----------------------*/
    $(document).on('click', '.n_following, .not_following, .follow-back-btn, .following-btn', function () {
        var other_user = $(this).data('other_user');
        var btn = $(this);

        if (btn.text() == 'Unfollow') {
            var conf = confirm("Do you really want to unfollow @" + other_user + '?');
            if (conf) {
                $.ajax({
                    url: "action.php",
                    type: "post",
                    data: { "action": "unfollow", 'other_user': other_user },
                    success: function (data) {
                        if (data) {
                            $.ajax({
                                url: 'action.php',
                                type: 'post',
                                data: { 'action': 'follow_back', 'other_user': other_user },
                                success: function (dataa) {
                                    if (dataa == 1) {
                                        btn.text("Follow Back");
                                    } else {
                                        btn.text("Follow");
                                    }
                                }
                            })
                        }
                        // Change button text & style after unfollow
                        btn.css({
                            "background-color": "black",
                            "color": "#fff",
                            "border": "none"
                        });

                        following_post();
                        show_more();
                        show_followers();
                        following();
                        follower();
                    }
                });
            }
        } else if (btn.text() == 'Follow' || 'Follow Back') {
            $.ajax({
                url: "action.php",
                type: "post",
                data: { "action": "follow_unfollow", 'other_user': other_user },
                success: function (data) {
                    // Change button text & style after follow
                    btn.text("Following");
                    btn.css({
                        "background-color": "#0000",
                        "color": "#000",
                        "border": "1px solid black"
                    });
                    show_notifications();
                    following_post();
                    show_followers();
                    following();
                    follower();
                }
            });
        }
    });


    /*--------------------Show Unfollow Option on Mouseenter-----------------------*/
    $(document).on('mouseenter', '.n_following, .follow-back-btn, .not_following, .following-btn', function () {
        if ($(this).text() == 'Following') {
            $(this).css({
                'background-color': 'rgb(255, 216, 216)',
                'border': '1px solid rgb(255, 158, 158)',
                'color': 'red'
            });
            $(this).text("Unfollow");
        }
    });
    $(document).on('mouseout', '.n_following, .not_following, .follow-back-btn, .following-btn', function () {
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

    /*-------------- Open Comment For You Modal----------------------*/
    $(document).on('click', '.open_comment_modal_foryou', function () {
        $("#comment-modal-foryou").modal("show");
        setTimeout(function () {
            $('#comment_input_foryou').focus();
        }, 100);
        var post_id = $(this).data('post-id');
        var username = $(this).data('username');
        $("#post_ids").val(post_id);
        $("#other_username").val(username);
        $(".comment-err-msg-foryou").text("");
        $("#comment_input_foryou").val("");
        $(".comment_span_foryou").text(500);
        $(".comment_reply_btn_forYou").css('background-color', 'grey');
        show_post();
    });
    /*-------------- Open  Model comment----------------------*/
    $(document).on('click', '.open_modal_comment', function () {
        $("#modal_comment").modal("show");
        setTimeout(function () {
            $('#comment_input_modal').focus();
        }, 100);
        var post_id = $(this).data('post-id');
        var username = $(this).data('username');
        $("#a_id").val(post_id);
        $("#b_username").val(username);
        $(".comment-err-msg-foryou").text("");
        $("#comment_input_modal").val("");
        $(".comment_span_foryou").text(500);
        $(".comment_reply_modal").css('background-color', 'grey')
        show_post();
    });
    /*-------------- Open Model For Reply----------------------*/
    $(document).on('click', '.open_modal_recomment', function () {
        $("#modal_recomment").modal("show");
        setTimeout(function () {
            $('#reply_input_p').focus();
        }, 100);
        var comment_id = $(this).data('comment-id');
        $("#comment_id").val(comment_id);
        $(".reply-err-msg").text("");
        $("#reply_input_p").val("");
        $(".reply_span").text(500);
        $(".reply_btn").css('background-color', 'grey');
        show_post();
    });

    //---------------Comment Insert on show-------------------//
    $(document).on('click', ' .comment_reply_modal', function () {
        var post_id = $("#a_id").val();
        var comment = $("#comment_input_modal").val();
        var username = $("#b_username").val();
        if (!validate_comment_modal()) {
            return false;
        }
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'post_id': post_id, 'action': 'insert_comment', 'comment': comment },
            success: function (data) {
                $("#modal_comment").modal("hide");
                $(".comment_span_foryou").text(500);
                $(".comment_reply_modal").css('background-color', 'grey')
                $("#comment_form_modal")[0].reset();
                show_post();
                show_notifications();
                post_details(post_id);
                show_foryou_post();
                following_post();
                show_user_post(username);
            }
        });
    });

    //---------------Insert Reply-------------------//
    $(document).on('click', '.reply_btn', function () {
        var comment = $("#reply_input_p").val();
        var post_id = $('.open_modal_recomment').data('post-id');
        var comment_id = $("#comment_id").val();
        var username = $('.open_modal_recomment').data('username');
        if (!validate_reply()) {
            return false;
        }
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'post_id': post_id, 'action': 'insert_reply', 'reply': comment, 'comment_id': comment_id },
            success: function (data) {
                $(".reply_span").text(500);
                $(".reply_btn").css('background-color', 'grey')
                $("#reply_input_p").val("");
                comments_details(comment_id);
                if (post_id) {
                    post_details(post_id);
                }
                show_post();
                $("#modal_recomment").modal("hide");
                show_foryou_post();
                following_post();
                show_notifications();
                show_user_post(username);
            }
        });
    });
    // Open the nested reply modal
    $(document).on('click', '.open_nested_replies_modal', function () {
        var replyId = $(this).data('reply-id');
        var commentId = $(this).data('comment-id');
        var parent_id = $(this).data('parent-id');

        $('#reply_id_input').val(replyId);
        $('#comment_id_input').val(commentId);
        $('#parent_id_input').val(parent_id);
        $('#nested_reply_input').val('');
        $('.nested_reply_char_count').text(500);
        $('.nested_reply_error').text('');
        $('#modal_nested_replies').modal('show');
        setTimeout(function () {
            $('#nested_reply_input').focus();
        }, 100);
        $(".nested_reply_submit_btn").css('background-color', 'grey');
    });

    //--------------Submit nested reply----------------------//
    $(document).on('click', '.nested_reply_submit_btn', function () {
        var reply = $('#nested_reply_input').val().trim();
        var replyId = $('#reply_id_input').val();
        var commentId = $('#comment_id_input').val();
        var parent_id = $('#parent_id_input').val();

        if (reply === '') {
            $('.nested_reply_error').text("Comment can't be blank");
            return;
        }

        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                action: 'insert_repliess',
                reply: reply,
                reply_id: replyId,
                comment_id: commentId,
                parent_id: parent_id //Send parent_id
            },
            success: function (data) {
                console.log('Reply Insert Response:', data);

                $('#modal_nested_replies').modal('hide');
                $('#nested_reply_input').val('');
                $('.nested_reply_error').text('');

                // Reload reply page or update count
                if ($('#nested_reply_container_' + replyId).is(':visible')) {
                    reply_details(replyId); // full reload
                } else {
                    $.ajax({
                        url: 'action.php',
                        type: 'post',
                        data: {
                            action: 'get_reply_count',
                            reply_id: replyId
                        },
                        success: function (countData) {
                            $('#reply_count_' + replyId).text(countData);
                        }
                    });
                }

                // Update posts/notifications
                show_post();
                show_foryou_post();
                following_post();
                show_notifications();
            }
        });
    });



    //---------------Insert Reply into reply-------------------//
    $(document).on('click', '.replyy_btn', function () {
        var comment = $("#replyy_input_p").val();
        var comment_id = $(this).data('comment-id');
        if (!validate_replyy()) {
            return false;
        }
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'action': 'insert_reply', 'reply': comment, 'comment_id': comment_id },
            success: function (data) {
                $(".reply_span").text(500);
                $(".reply_btn").css('background-color', 'grey')
                $("#reply_input_p").val("");
                comments_details(comment_id);
                show_post();
                show_notifications();
                show_foryou_post();
                following_post();
            }
        });
    });
    $(document).on('click', '.replies_btn', function () {
        var reply = $("#replies_input_p").val();
        var reply_id = $(this).data('reply-id');
        var comment_id = $(this).data('comment-id');
        if (!validate_replies()) {
            return false;
        }
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'action': 'insert_replies', 'reply': reply, 'comment_id': comment_id, 'reply_id': reply_id },
            success: function (data) {
                $(".reply_span").text(500);
                $(".reply_btn").css('background-color', 'grey')
                $("#reply_input_p").val("");
                reply_details(reply_id);
                show_post();
                show_foryou_post();
                following_post();
                show_notifications();
            }
        });
    });

    //---------------For You Comment Insert-------------------//
    $(document).on('click', ' .comment_reply_btn_forYou', function () {
        var post_id = $("#post_ids").val();
        var comment = $("#comment_input_foryou").val();
        var username = $("#other_username").val();
        if (!validate_comment_foryou()) {
            return false;
        }
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'post_id': post_id, 'action': 'insert_comment', 'comment': comment },
            success: function (data) {
                $("#comment-modal-foryou").modal("hide");
                $(".comment_span_foryou").text(500);
                $(".comment_reply_btn_forYou").css('background-color', 'grey')
                $("#comment_form_foryou")[0].reset();
                show_post();
                show_foryou_post();
                following_post();
                show_notifications();
                show_user_post(username);
            }
        });
    });
    /*-------------- Open Comment Modal----------------------*/
    $(document).on('click', '.open_comment_modal', function () {
        $("#comment-modal").modal("show");
        var post_id = $(this).data('post-id');
        $("#commented").val(post_id);
        $(".comment-err-msg").text("");
    });
    /*-------------- Open Nested Reply Modal----------------------*/
    $(document).on('click', '.open_modal_nested_reply', function () {
        $("#modal_recomment").modal("show");
        setTimeout(function () {
            $('#reply_input_p').focus();
        }, 100);
        var post_id = $(this).data('post-id');
        $("#commented").val(post_id);
        $(".comment-err-msg").text("");
    });

    //---------------Comment Insert-------------------//
    $(document).on('click', '.comment_reply_btn', function () {
        var post_id = $("#commented").val();
        var comment = $("#comment_input").val();
        if (!validate_comment()) {
            return false;
        }
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'post_id': post_id, 'action': 'insert_comment', 'comment': comment },
            success: function (data) {
                $("#comment-modal").modal("hide");
                $(".comment_span").text(500);
                $(".comment_reply_btn").css('background-color', 'grey')
                $("#comment_form")[0].reset();
                show_post();
                show_foryou_post();
                show_notifications();
                following_post();
            }
        })
    });

    //---------------Comment Insert Post-------------------//
    $(document).on('click', '.comment_btn_p', function () {
        var post_id = $(this).data('post-id');
        var comment = $("#comment_input_p").val();
        var username = $("#b_username").val();
        if (!validate_comment_p()) {
            return false;
        }
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'post_id': post_id, 'action': 'insert_comment', 'comment': comment },
            success: function (data) {
                $(".comment_span_p").text(500);
                $(".comment_btn_p").css('background-color', 'grey')
                $("#comment_form_p")[0].reset();
                show_post();
                post_details(post_id);
                show_foryou_post();
                show_notifications();
                following_post();
                show_user_post(username);
            }
        });
    });
    //---------------Reply Like -------------------//
    $(document).on('click', '.reply-like-icon', function () {
        var reply_id = $(this).data('reply-id');
        var comment_id = $(this).data('comment-id');
        var heartIcon = $(this).children('i.heart-icon');

        heartIcon.toggleClass('liked');

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { "reply_id": reply_id, "action": "reply_like", "type": "reply" },
            success: function (response) {
                show_post();
                show_foryou_post();
                comments_details(comment_id)
                following_post();
                show_notifications();
            }
        });
    });
    //---------------Reply Like -------------------//
    $(document).on('click', '.replies-like-icon', function () {
        var reply_id = $(this).data('reply-id');
        var heartIcon = $(this).children('i.heart-icon');
        var likeSpan = $(this).siblings('.like');

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { "reply_id": reply_id, "action": "reply_like", "type": "reply" },
            success: function (response) {
                try {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        // Update heart icon
                        heartIcon.toggleClass('liked', res.liked);
                        // Update like count
                        likeSpan.text(res.new_like_count > 0 ? res.new_like_count : '');
                    }
                } catch (e) {
                    console.error("Like response error: ", e, response);
                }
            }
        });
    });

    //------------ Fetch Nested Replies------//
    $(document).on('click', '.open_modal_nested_reply', function () {
        let replyId = $(this).data('reply-id');
        let container = $('#nested-replies-' + replyId);

        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {
                action: 'fetch_nested_replies',
                parent_reply_id: replyId
            },
            success: function (data) {
                container.html(data);
            }
        });
    });

    //---------------Comment Like -------------------//
    $(document).on('click', '.comment-like-icon', function () {
        var comment_id = $(this).data('comment-id');
        var post_id = $(this).data('post-id');
        var heartIcon = $(this).children('i.heart-icon');
        heartIcon.toggleClass('liked');

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { "comment_id": comment_id, "action": "comment_like", "type": "comment" },
            success: function (response) {
                show_post();
                post_details(post_id)
                show_foryou_post();
                following_post();
                show_notifications();
            }
        });
    });
    //---------------Comments Like -------------------//
    $(document).on('click', '.comments-like-icon', function () {
        var comment_id = $(this).data('comment-id');
        var post_id = $(this).data('post-id');
        var heartIcon = $(this).children('i.heart-icon');
        heartIcon.toggleClass('liked');

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { "comment_id": comment_id, "action": "comment_like", "type": "comment" },
            success: function (response) {
                show_post();
                comments_details(comment_id)
                show_foryou_post();
                show_notifications();
                following_post();
            }
        });
    });
    //---------------Post Like -------------------//
    $(document).on('click', '.post-like-icon', function () {
        var comment_id = $(this).data('comment-id');
        var post_id = $(this).data('post-id');
        var heartIcon = $(this).children('i.heart-icon');
        heartIcon.toggleClass('liked');

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { "comment_id": comment_id, "action": "comment_like", "type": "comment" },
            success: function (response) {
                show_post();
                post_details(post_id)
                show_foryou_post();
                following_post();
                show_notifications();
            }
        });
    });

    //---------------Post Like -------------------//
    $(document).on('click', '.like-icon', function () {
        var post_id = $(this).data('post-id');
        var username = $(this).data('username');
        var heartIcon = $(this).children('i.heart-icon');

        heartIcon.toggleClass('liked');

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { "post_id": post_id, "action": "like", "type": "post" },
            success: function (response) {
                show_post();
                show_notifications();
                show_foryou_post();
                following_post();
                show_user_post(username);
            }
        });
    });
    //--------------- Particular Post Like -------------------//
    $(document).on('click', '.post-like-icon', function () {
        var post_id = $(this).data('post-id');
        var username = $(this).data('username');
        var heartIcon = $(this).children('i.heart-icon');

        heartIcon.toggleClass('liked');

        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: { "post_id": post_id, "action": "like", "type": "post" },
            success: function (response) {
                show_post();
                post_details(post_id)
                show_foryou_post();
                show_notifications();
                following_post();
                show_user_post(username);
            }
        });
    });


    /*---------Input Outline None (on focus)---------*/
    $(document).on('focus', "#comment_input, #comment_input_p, " +
        " #reply_input_p, " +
        " #nested_reply_input, " +
        " #replies_input_p, " +
        " #replyy_input_p, " +
        " #comment_input_foryou," +
        " #comment_input_modal," +
        " .index_input," +
        " .index_inputs", function () {
            $(this).css("outline", " none")
        });


    $(".remove-btn").click(function () {
        $('.remove').text("");
    });
    //-------------- Open Edit Modal-------------//
    $(".edit").click(function () {
        edit_modal();
    })
    $(".edit").css("text-decoration", "none");
    //----------Explore's Tabs hover------------//

    $(".multi-a").mouseenter(function () {
        $(this).css("background-color", "rgb(241, 240, 240)")
    });
    $(".multi-a").mouseout(function () {
        $(this).css("background-color", "white")
    });

    //-------------- Footer Search-------------//
    $(".footer-search-input").focus(function () {
        $(".footer-search-div").css("border", "1px solid skyblue");
        $(this).css("outline", " none")
    });
    $(".footer-search-input").blur(function () {
        $(".footer-search-div").css("border", "1px solid rgb(239, 243, 244)");
    });

    //-------------- Explore Search-------------//
    $(".explore-search-input").focus(function () {
        $(".explore-search-div").css("border", "1px solid skyblue");
        $(this).css("outline", " none")
    });
    $(".explore-search-input").blur(function () {
        $(".explore-search-div").css("border", "1px solid black");
    });


    //------------------->> Validation <<----------------------//

    $("input").focus(function () {
        var inp_id = $(this).attr('id');
        if ($(this).val() == "") {
            $("#err" + inp_id).text("");
        }
    });

    //-----------Name Validation------------//
    $("#name").blur(function (e) {
        var isValid = true;
        var name_val = $("#name").val().trim();
        var namePattern = /^[a-zA-Z ]{3,15}$/;
        if (namePattern.test(name_val)) {
            $("#errname").text("");
        }
        else {
            $("#errname").text("Minimum 3 And Maximum 15 Characters Allowed");
            isValid = false;
        }
        if (name_val == "") {
            $("#errname").text("Only spaces are not allowed");
        }
        if ($("#name").val() == "") {
            $("#errname").text("Name field is required");
            isValid = false;
        }
        if (!isValid) {
            e.preventDefault();
        }
    });

    //-----------Username Validation------------//
    $("#username").blur(function (e) {
        var isValid = true;
        var name_val = $("#username").val().trim();
        var namePattern = /^[a-zA-Z0-9]{3,15}$/;
        if (namePattern.test(name_val)) {
            $("#errusername").text("");
        }
        else {
            $("#errusername").text("Minimum 3 And Maximum 15 Characters Allowed");
            isValid = false;
        }
        if (name_val == "") {
            $("#errusername").text("Only spaces are not allowed");
        }
        if ($("#username").val() == "") {
            $("#errusername").text("Username field is required");
            isValid = false;
        }
        $.ajax({
            url: "action.php",
            type: "post",
            data: { "username": name_val, "action": "email_check" },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status == 'failed') {
                    $("#username_check").val(1);
                    $("#errusername").text("Username has already been taken");
                } else {
                    $("#username_check").val(0);
                }
            }
        });
        if (!isValid) {
            e.preventDefault();
        }
    });
    $("#username").focus(function () {
        $("#errusername").text("");
    })

    //------------Email Validation----------------//

    $("#email").blur(function (e) {
        var isValid = true;
        var mail = $("#email").val();
        var emailPattern = /^[a-zA-Z0-9.]+\@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
        var a = emailPattern.test(mail);
        if (a == true) {
            $("#erremail").text("");
        }
        else {
            $("#erremail").text("Enter A Valid Email");
            isValid = false;
        }
        if ($("#email").val() == "") {
            $("#erremail").text("Email field is required");
            isValid = false;
        }
        $.ajax({
            url: "action.php",
            type: "post",
            data: { "email": mail, "action": "email_check" },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status == 'failed') {
                    $("#email_check").val(1);
                    $("#erremail").text("Email has already been taken");
                } else {
                    $("#email_check").val(0);
                }
            }
        });
        if (!isValid) {
            e.preventDefault();
        }
    });
    $("#email").focus(function () {
        $("#erremail").text("");
    })

    //----------------------- Password Validation----------------------->>

    $("#password").blur(function (e) {
        var isValid = true;
        var pass = $("#password").val();
        var pass_val = $("#password").val().trim();
        var passPatern = /^[a-z A-Z0-9!@#$%^&*()_+-=]{8,15}$/;
        if (passPatern.test(pass)) {
            $("#errpassword").text("");
        }
        else {
            $("#errpassword").text("Password length must be between 8-15 characters");
            isValid = false;
        }
        if (passPatern.test(pass)) {
            $("#errpassword").text("");
        }
        else {
            $("#errPassword").text("Password length must be between 8-15 characters");
            isValid = false;
        }
        if (pass_val == "") {
            $("#errpassword").text("Only spaces are not allowed");
        }
        if ($("#password").val() == "") {
            $("#errpassword").text("Password field is required");
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
    $("#Password").focus(function () {
        $("#errPassword").text("");
    })

    //--------------Date of birth Validation---------------//
    $("#dob").blur(function () {
        if ($(this).val() == "") {
            $("#errdob").text("Date of birth field is required");
        }
    });

    //----------------Login Validation---------------//

    $("#login_email").blur(function () {
        if ($(this).val() == "") {
            $("#errlogin_email").text("This field is required");
        }
    });
    $("#login_password").blur(function () {
        if ($(this).val() == "") {
            $("#errlogin_password").text("Password field is required");
        }
        else if ($(this).val().trim() == "") {
            $("#errlogin_password").text("Only spaces are not allowed");
        }
    });


    //---------------Hide post button and show logout----------------//
    $(".user_profile").click(function () {
        if ($(".post").css("display") == "none") {
            $(".post").css("display", "block")
        } else {
            $(".post").css("display", "none")
        }
        if ($(".profile_model").css("display") == "none") {
            $(".profile_model").css("display", "block")
        }
        else {
            $(".profile_model").css("display", "none")
        }
    });

    //--------------Logout----------------//
    $("#logout").click(function () {
        var conf = confirm('Are you sure to logout?');
        if (conf == true) {
            $.ajax({
                url: "action.php",
                type: "post",
                data: { "action": "logout" },
                success: function () {
                    $("#left-panel").hide();
                    $("#logout-loader").show();
                    $("body").css("background-color", "grey");
                    setTimeout(function () {
                        window.location = 'login.php';
                    }, 100);
                }
            });
        }
    });

    //---------------------- Limit Characters while Editing User details-------------------------//
    var length = 15;
    var post = 500;
    var bio = 150;
    $("#edit-name").keyup(function () {
        var len = length - $(this).val().trim().length;
        $(".name-span").text(len);
        if (len < 11) {
            $(".name-span").css("color", "red");
        }
        else {
            $(".name-span").css("color", "black");
        }
    });
    $("#edit-username").keyup(function () {
        var len = length - $(this).val().trim().length;
        $(".username-span").text(len);
        if (len < 11) {
            $(".username-span").css("color", "red");
        }
        else {
            $(".commusername-spanent_span").css("color", "black");
        }
    });
    $("#edit-bio").keyup(function () {
        var len = bio - $(this).val().trim().length;
        $(".bio-span").text(len);
        if (len < 11) {
            $(".bio-span").css("color", "red");
        }
        else {
            $(".bio-span").css("color", "black");
        }
    });
    $(".index_input").keyup(function () {
        var len = post - $(this).val().trim().length;
        $(".index_input_span").text(len);
        if (len < 11) {
            $(".index_input_span").css("color", "red");
        }
        else {
            $(".index_input_span").css("color", "black");
        }
    });
    $(".index_inputs").keyup(function () {
        var len = post - $(this).val().trim().length;
        $(".index_inputs_span").text(len);
        if (len < 11) {
            $(".index_inputs_span").css("color", "red");
        }
        else {
            $(".index_inputs_span").css("color", "black");
        }
    });
    $("#comment_input").keyup(function () {
        var len = post - $(this).val().trim().length;
        $(".comment_span").text(len);
        if ($(this).val().trim() != "") {
            $(".comment-err-msg").text("");
        }
        else {
            $(".comment-err-msg").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".comment_span").css("color", "red");
        }
        else {
            $(".comment_span").css("color", "black");
        }
    });
    $(document).on('keyup', "#comment_input_p", function () {
        var len = post - $(this).val().trim().length;
        $(".comment_span_p").text(len);
        if ($(this).val().trim() != "") {
            $(".comment-err-msg-p").text("");
        }
        else {
            $(".comment-err-msg-p").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".comment_span_p").css("color", "red");
        }
        else {
            $(".comment_span_p").css("color", "black");
        }
    });
    $(document).on('keyup', "#reply_input_p", function () {
        var len = post - $(this).val().trim().length;
        $(".reply_span").text(len);
        if ($(this).val().trim() != "") {
            $(".reply-err-msg").text("");
        }
        else {
            $(".reply-err-msg").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".reply_span").css("color", "red");
        }
        else {
            $(".reply_span").css("color", "black");
        }
    });
    $(document).on('keyup', "#nested_reply_input", function () {
        var len = post - $(this).val().trim().length;
        $(".nested_reply_char_count").text(len);
        if ($(this).val().trim() != "") {
            $(".nested_reply_error").text("");
        }
        else {
            $(".nested_reply_error").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".nested_reply_char_count").css("color", "red");
        }
        else {
            $(".nested_reply_char_count").css("color", "black");
        }
    });
    $(document).on('keyup', "#replies_input_p", function () {
        var len = post - $(this).val().trim().length;
        $(".replies_span").text(len);
        if ($(this).val().trim() != "") {
            $(".replies-err-msg").text("");
        }
        else {
            $(".replies-err-msg").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".replies_span").css("color", "red");
        }
        else {
            $(".replies_span").css("color", "black");
        }
    });
    $(document).on('keyup', "#replyy_input_p", function () {
        var len = post - $(this).val().trim().length;
        $(".replyy_span").text(len);
        if ($(this).val().trim() != "") {
            $(".replyy-err-msg").text("");
        }
        else {
            $(".replyy-err-msg").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".replyy_span").css("color", "red");
        }
        else {
            $(".replyy_span").css("color", "black");
        }
    });
    $("#comment_input_foryou").keyup(function () {
        var len = post - $(this).val().trim().length;
        $(".comment_span_foryou").text(len);
        if ($(this).val().trim() != "") {
            $(".comment-err-msg-foryou").text("");
        }
        else {
            $(".comment-err-msg-foryou").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".comment_span_foryou").css("color", "red");
        }
        else {
            $(".comment_span_foryou").css("color", "black");
        }
    });
    $("#comment_input_modal").keyup(function () {
        var len = post - $(this).val().trim().length;
        $(".comment_span_foryou").text(len);
        if ($(this).val().trim() != "") {
            $(".comment-err-msg-foryou").text("");
        }
        else {
            $(".comment-err-msg-foryou").text("Comment can't be blank");
        }
        if (len < 11) {
            $(".comment_span_foryou").css("color", "red");
        }
        else {
            $(".comment_span_foryou").css("color", "black");
        }
    });


    //---------------------- Validation For Edit---------------------------//
    //-----------Name Validation------------//
    $("#edit-name").keyup(function () {
        if ($("#edit-name").val().trim() == "") {
            $("#err-editname").text("Name can't be blank");
        }
        if ($("#edit-name").val().trim() != "") {
            $("#err-editname").text("");
        }
    });

    //-----------Username Validation------------//
    $("#edit-username").keyup(function () {
        var name_val = $("#edit-username").val().trim();
        var namePattern = /^[a-zA-Z]{1,15}$/;
        if (namePattern.test(name_val)) {
            $("#err-editusername").text("");
        }
        else {
            $("#err-editusername").text("Enter a valid username");
        }
        if ($("#edit-username").val() == "") {
            $("#err-editusername").text("Username can't be blank");
        }
        $.ajax({
            url: "action.php",
            type: "post",
            data: { "username": name_val, "action": "edit_username_check" },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status == 'failed') {
                    $("#edit_username_check").val(1);
                    $("#err-editusername").text("Username has already been taken");
                } else {
                    $("#edit_username_check").val(0);
                }
            }
        });
        if (namePattern.test(name_val)) {
            $("#err-editusername").text("");
        }
    });


    //------------Email Validation----------------//

    $("#edit-email").keyup(function () {
        var mail = $("#edit-email").val();
        var emailPattern = /^[a-zA-Z0-9.]+\@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
        var a = emailPattern.test(mail);
        if (a == true) {
            $("#err-editemail").text("");
        }
        else {
            $("#err-editemail").text("Enter a valid email");
        }
        if ($("#edit-email").val() == "") {
            $("#err-editemail").text("Email can't be blank")
            isValid = false;
        }
        $.ajax({
            url: "action.php",
            type: "post",
            data: { "email": mail, "action": "edit_email_check" },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status == 'failed') {
                    $("#edit_email_check").val(1);
                    $("#err-editemail").text("Email has already been taken");
                } else {
                    $("#edit_email_check").val(0);
                }
            }
        });
    });
    //--------------------- Date of Birth Validation----------------------//
    $("#edit-dob").keyup(function () {
        if ($(this).val() == "") {
            $("#err-editdob").text("Date of birth can't be blank");
        }
        if ($(this).val() != "") {
            $("#err-editdob").text("");
        }
    });


    //------------------------------------- Post Validation----------------------------//

    $("#index-image").change(function () {
        var image = $("#index-image").val();
        var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG|avif|AVIF)$/;

        if (!imgPattern.test(image)) {
            $(".post-err-msg").text("Select a valid file");
            $(".post-btn a").css('background-color', 'grey')
            isValid = false;
        }
        else {
            $(".post-err-msg").text("");
            $(".post-btn a").css('background-color', 'black')
        }
        if (image == "") {
            $(".post-err-msg").text("");
            if ($(".index_input").val() == "") {
                $(".post-btn a").css('background-color', 'grey')
            }
            else {
                $(".post-btn a").css('background-color', 'black')
            }
        }
    });

    //------------ Image Validation-----------

    $("#edit-profile-pic").change(function () {
        var profile = $("#edit-profile-pic").val();
        var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG|avif|AVIF)$/;
        if (!imgPattern.test(profile)) {
            $("#err-profile").text("Profile image is not valid");
            isValid = false;
        }

        if (profile == "") {
            $("#err-profile").text("");
        }
    });
    $("#edit-cover-pic").change(function () {
        var cover = $("#edit-cover-pic").val();
        var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG|avif|AVIF)$/;
        if (!imgPattern.test(cover)) {
            $("#err-cover").text("Cover image is not valid");
            isValid = false;
        }

        if (cover == "") {
            $("#err-cover").text("");
        }
    });

    /*------------------------------------- Modal Post Validation----------------------------*/

    $("#index-images").change(function () {
        var image = $("#index-images").val();
        var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG|avif|AVIF)$/;

        if (!imgPattern.test(image)) {
            $(".modal-post-err-msg").text("Select a valid file");
            $(".post-btn a").css('background-color', 'grey')
            isValid = false;
        }
        else {
            $(".modal-post-err-msg").text("");
            $(".post-btn a").css('background-color', 'black')
        }
        if (image == "") {
            $(".modal-post-err-msg").text("");
            if ($(".index_inputs").val() == "") {
                $(".post-btn a").css('background-color', 'grey')
            }
            else {
                $(".post-btn a").css('background-color', 'black')
            }
        }
    });

    /*-----------------Disable Post Button-------------*/

    if ($(".index_input").val() == "") {
        $(".post-btn a").css('background-color', 'grey')
    }
    else {
        $(".post-btn a").css('background-color', 'black')
    }
    $(".index_input, .index_inputs").keyup(function () {
        if ($(this).val().trim() == "") {
            $(".post-btn a").css('background-color', 'grey')
        }
        else {
            $(".post-btn a").css('background-color', 'black')
        }
    });
    $("#comment_input").keyup(function () {
        if ($(this).val().trim() == "") {
            $(".comment_reply_btn").css('background-color', 'grey')
        }
        else {
            $(".comment_reply_btn").css('background-color', 'black')
        }
    });
    $(document).on('keyup', "#comment_input_p", function () {
        if ($(this).val().trim() == "") {
            $(".comment_btn_p").css('background-color', 'grey')
        }
        else {
            $(".comment_btn_p").css('background-color', 'black')
        }
    });
    $(document).on('keyup', "#reply_input_p", function () {
        if ($(this).val().trim() == "") {
            $(".reply_btn").css('background-color', 'grey')
        }
        else {
            $(".reply_btn").css('background-color', 'black')
        }
    });
    $(document).on('keyup', "#nested_reply_input", function () {
        if ($(this).val().trim() == "") {
            $(".nested_reply_submit_btn").css('background-color', 'grey')
        }
        else {
            $(".nested_reply_submit_btn").css('background-color', 'black')
        }
    });
    $(document).on('keyup', "#replies_input_p", function () {
        if ($(this).val().trim() == "") {
            $(".replies_btn").css('background-color', 'grey')
        }
        else {
            $(".replies_btn").css('background-color', 'black')
        }
    });
    $(document).on('keyup', "#replyy_input_p", function () {
        if ($(this).val().trim() == "") {
            $(".replyy_btn").css('background-color', 'grey')
        }
        else {
            $(".replyy_btn").css('background-color', 'black')
        }
    });
    $("#comment_input_foryou").keyup(function () {
        if ($(this).val().trim() == "") {
            $(".comment_reply_btn_forYou").css('background-color', 'grey')
        }
        else {
            $(".comment_reply_btn_forYou").css('background-color', 'black')
        }
    });
    $("#comment_input_modal").keyup(function () {
        if ($(this).val().trim() == "") {
            $(".comment_reply_modal").css('background-color', 'grey')
        }
        else {
            $(".comment_reply_modal").css('background-color', 'black')
        }
    });
});