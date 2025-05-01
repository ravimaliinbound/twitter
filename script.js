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


//-----------------------Post-------------//
function insert_post() {
    var input = $("#index-input").val();
    var form = $('#media-form')[0];
    var image = $("#index-image").val();
    var formData = new FormData(form);

    formData.append('input', input);
    formData.append('action', 'insert_post');

    $.ajax({
        url: "action.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#content-form')[0].reset();
            $('#media-form')[0].reset();
        }
    });
}


//--------------- Show Media-----------------------//
function show_media() {
    // console.log("Showing Media");
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "show_media" },
        success: function (data) {
            console.log(data);
        }
    });
}


//------------------Footer Who to follow-----------------//
function footer() {
    $.ajax({
        url: "action.php",
        type: "post",
        data: { "action": "footer" },
        success: function (data) {
            var response = JSON.parse(data);
            $(".show-to-follow").html(response)
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
        success: function () {
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


//Document.ready

$(document).ready(function () {
    $(".remove-btn").click(function () {
        $('.remove').text("");
    });

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
    $("#index-input").focus(function () {
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



});

