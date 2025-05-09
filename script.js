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
//-------------- Open Post Model------------//
function open_model() {
    $("#post_modal").modal('show');
}

//-------------------- Post Validate----------------//
function validate_post(e) {
    var isValid = true;

    var image = $("#index-image").val();
    var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG)$/;

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
    var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG)$/;

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
    var input = $(".index_input").val();
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
        }
    });
}
//------------------Insert Post With Modal-------------//
function insert_post_modal() {
    var input = $(".index_inputs").val();
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
            $("#post_modal").modal('hide');
            show_post();
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
        }
    })
}

//------------------------------ Edit Validate--------------------
function validate_edit(e) {
    var isValid = true;

    // Patterns
    var emailPattern = /^[a-zA-Z0-9.]+\@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    var usernamePattern = /^[a-zA-Z]{1,15}$/;

    // Input Values
    var name = $('#edit-name').val().trim();
    var username = $('#edit-username').val().trim();
    var email = $('#edit-email').val().trim();
    var dob = $('#edit-dob').val().trim();

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
            }
            if (cover == "") {
                $(".cover").css('background', 'rgb(207, 217, 222)');
            } else {
                var imageUrl = 'cover_pic/' + cover;
                $(".cover").css({
                    'background': 'url(' + imageUrl + ')',
                    'background-size': '800px 250px',
                    'width': '100%'
                });
                $(".covers").css({
                    'background': 'url(' + imageUrl + ')',
                    'background-size': '800px 250px',
                    'width': '82%'
                });
            }
        }
    });
}

//-------------Before Delete-------------//
function before_delete(id) {
    $('#deleteModal').modal('show');
    $("#hidden").val(id);
}
//--------------------- Delete Post-----------------//
function delete_post() {
    var conf = confirm("Do You Really Want To Delete?")
    if (conf == true) {
        var id = $("#hidden").val();
        $.ajax({
            url: "action.php",
            type: "post",
            data: { 'action': 'delete_post', 'id': id },
            success: function () {
                $('#deleteModal').modal('hide');
                show_media();
                count_posts();
                show_post();
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
    })
}

//----------------------- Show Posts---------------------//
function show_post() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_post" },
        success: function (data) {
            $(".posts").html(data);
        }
    })
}


//-------------------- Likes Count----------------------//
function like_count(like) {
    console.log(like)
    var like_inp = $("#liked").val();
    if (like_inp == 0) {
        like++;
    }
    console.log(like)
}


//-------------------- Comment Count--------------------//
function comment_count(comment) {
    console.log(comment)
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
            $(".show-to-follow").html(response.arr)
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
            }, 300);
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
                }, 300);

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

//----------------------------------------------Document.ready-------------------------------------------------//

$(document).ready(function () {
    count_posts();
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
        $(".footer-search-div").css("border", "1px solid black");
    });

    //-------------- Explore Search-------------//
    $(".explore-search-input").focus(function () {
        $(".explore-search-div").css("border", "1px solid skyblue");
        $(this).css("outline", " none")
    });
    $(".explore-search-input").blur(function () {
        $(".explore-search-div").css("border", "1px solid black");
    });

    //-------------- Index Post-------------//
    $(".index_input, .index_inputs").focus(function () {
        $(this).css("outline", " none")
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
                }, 300);
            }
        });
    });

    //---------------------- Limit Characters while Editing User details-------------------------//
    var length = 15;
    var bio = 150;
    $("#edit-name").keyup(function () {
        var len = length - $(this).val().length;
        $(".name-span").text(len);
    });
    $("#edit-username").keyup(function () {
        var len = length - $(this).val().length;
        $(".username-span").text(len);
    });
    $("#edit-bio").keyup(function () {
        var len = bio - $(this).val().length;
        $(".bio-span").text(len);
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
        var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG)$/;

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


    //------------------------------------- Modal Post Validation----------------------------//

    $("#index-images").change(function () {
        var image = $("#index-images").val();
        var imgPattern = /\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|PNG)$/;

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

    //-----------------Disable Post Button-------------//

    if ($(".index_input").val() == "") {
        $(".post-btn a").css('background-color', 'grey')
    }
    else {
        $(".post-btn a").css('background-color', 'black')
    }
    $(".index_input, .index_inputs").keyup(function () {
        if ($(this).val() == "") {
            $(".post-btn a").css('background-color', 'grey')
        }
        else {
            $(".post-btn a").css('background-color', 'black')
        }
    })



});

