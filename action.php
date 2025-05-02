<?php
$conn = new mysqli('localhost', 'root', '', 'twitter');
session_start();

//----------------Fetch Data For Particular User---------------//
if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $username = $_SESSION['username'];
    $sel_id = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run_id = $conn->query($sel_id);
    $arr_id = null;
    while ($data = $run_id->fetch_object()) {
        $arr_id = $data->id;
    }
    $sel = "SELECT * FROM twitter_users WHERE id = '$arr_id'";
    $run = $conn->query($sel);

    $data = [];
    $arr = [];
    while ($fetch = $run->fetch_object()) {
        $data = $fetch;
        $arr = array(
            "id" => $data->id,
            "name" => $data->name,
            "username" => $data->username,
            "email" => $data->email,
            "bio" => $data->bio,
            "dob" => $data->dob,
            "joined_date" => $data->joined_date
        );
    }
    echo json_encode($arr);
}


//--------------------- Footer who to follow-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'footer') {
    $username = $_SESSION['username'];
    $sel_footer = "SELECT * FROM twitter_users WHERE username != '$username' LiMIT 0, 3";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {
        $arr_footer .=
            " <div style = 'display: flex;' class='background'>
                <div class='show-img' style='margin-top: 6px;'>
                    <a href='#'>
                        <img src='images/profile_pic.png' height='40px' style='border-radius: 50%'>
                    </a>
                </div>
                <div class='show-to-follow-data'>
                    <p>
                        <a href='#' class='show-to-follow-name'>$data->name</a><br>
                        <a href='#' class='show-to-follow-username'>@$data->username</a>
                    </p>
                </div>
                <div class='show-to-follow-btn'>
                    <a href='#'>Follow</a>
                </div>
                </div>";
    }
    $arr_footer .= "";
    echo json_encode($arr_footer);

}


//---------------Signup-------------------//

if (isset($_POST['action']) && $_POST['action'] == 'signup') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? md5(trim($_POST['password'])) : "";
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : "";
    $joined_date = date('F Y');
    $insert = "INSERT INTO twitter_users (name, username, email, password, dob, joined_date, profile_pic, cover_pic) VALUES ('$name','$username','$email','$password','$dob', '$joined_date', '', '')";
    $run = $conn->query($insert);
    if ($run) {
        $_SESSION['login'] = 'Login';
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = substr($name, 0, 1);
        $_SESSION['name'] = $name;
    } else {
        echo "<p class='p-2 rounded msg'>Something Went Wrong</p>";
    }
}

//--------------------- Insert Post-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'insert_post') {
    $content = $_POST['input'];
    $username = $_SESSION['username'];

    $image_name = $_FILES['index-image']['name'];
    $tmp_name = $_FILES['index-image']['tmp_name'];

    $img_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $img_name = pathinfo($image_name, PATHINFO_FILENAME);
    $final_image = $img_name . time() . "." . $img_ext;
    $path = "users/" . $final_image;
    echo $content;
    echo $tmp_name;
    if ($image_name == "" && $content != "") {
        $insert_post = "INSERT INTO twitter_posts(content,user_id)
        SELECT '$content', id 
        FROM twitter_users WHERE username = '$username'";
        $run_post = $conn->query($insert_post);
    } elseif ($content == "" && $image_name != "") {
        move_uploaded_file($tmp_name, $path);
        $insert_post = "INSERT INTO twitter_posts(media,user_id)
           SELECT '$final_image', id 
           FROM twitter_users WHERE username = '$username'";
        $run_post = $conn->query($insert_post);
    } elseif ($content != "" && $final_image != "") {
        move_uploaded_file($tmp_name, $path);
        $insert_post = "INSERT INTO twitter_posts(content, media, user_id)
        SELECT '$content', '$final_image', id 
        FROM twitter_users WHERE username = '$username'";
        $run_post = $conn->query($insert_post);
    } elseif ($image_name == "" && $content == "") {
        echo "Failed to post";
    }
}

//--------------------- Edit Profile-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'edit_profile') {
    $username = $_SESSION['username'];
    $fetch_edit = "SELECT * FROM twitter_users WHERE username = '$username'";
    $run_edit = $conn->query($fetch_edit);
    $arr = [];
    $edit = [];
    while ($data = $run_edit->fetch_object()) {
        $arr = $data;
        $arr = array(
            "id" => $data->id,
            "name" => $data->name,
            "username" => $data->username,
            "email" => $data->email,
            "bio" => $data->bio,
            "dob" => $data->dob,
            "joined_date" => $data->joined_date
        );
    }
    echo json_encode($arr);
}


//-----------------Already Exists----------------//

if (isset($_POST['action']) && $_POST['action'] == 'email_check' || $_POST['action'] == 'email_check') {
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email_query = "SELECT * FROM twitter_users WHERE email = '$email' OR username = '$username'";
    $email_run = $conn->query($email_query);
    if ($email_run->num_rows > 0) {
        echo json_encode([
            'status' => 'failed'
        ]);
    } else {
        echo json_encode([
            'status' => 'success'
        ]);
    }
}

//-------------------------Login-------------------------//

if (isset($_POST['action']) && $_POST['action'] == "login") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? md5(trim($_POST['password'])) : "";

    $sel = "SELECT * FROM twitter_users WHERE (email = '$email' OR username = '$email') AND password = '$password'";
    $run = $conn->query($sel);
    $email_check = '';
    $password_check = '';
    $username_check = '';
    $name_check = '';
    $res = '';
    while ($fetch = $run->fetch_object()) {
        $email_check = $fetch->email;
        $username_check = $fetch->username;
        $password_check = $fetch->password;
        $name_check = $fetch->name;
    }
    if ($email == $email_check || $email == $username_check && $password == $password_check) {
        $_SESSION['login'] = 'Login';
        $_SESSION['username'] = $username_check;
        $_SESSION['name'] = $name_check;
        $_SESSION['firstname'] = substr($name_check, 0, 1);
        echo json_encode([
            'status' => 'success'
        ]);
    } else {
        echo json_encode([
            'status' => 'failed'
        ]);
    }
}

//------------------Logout-----------------//
if (isset($_POST['action']) && $_POST['action'] == "logout") {
    unset($_SESSION['login']);
    unset($_SESSION['username']);
    unset($_SESSION['firstname']);
}

//---------------------Who to follow-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'show_more') {
    $username = $_SESSION['username'];
    $sel_footer = "SELECT * FROM twitter_users WHERE username != '$username' LIMIT 0,50";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {
        $arr_footer .=
            " <div style = 'display: flex;' class= 'background-follow'>
                <div class='showw-img' style='margin-top: 6px; '>
                    <a href='#'><img src='images/profile_pic.png' 
                        height='40px' width= '40px' style='border-radius: 50%'>
                    </a>
                </div>
                <div class='show-to-followw-data' style='width:50%  '>
                    <p>
                        <a href='#' class='show-to-followw-name'>$data->name</a><br>
                        <a href='#' class='show-to-followw-username'>@$data->username</a><br>
                        <a href='#' class='show-to-followw-username'>$data->bio</a>
                    </p>
                </div>
                <div class='show-to-followw-btn'>
                    <a href='#'>Follow</a>
                </div>
            </div>";
    }
    $arr_footer .= "";
    echo json_encode($arr_footer);

}

//------------------ Show Media----------------//
if (isset($_POST['action']) && $_POST['action'] == "show_media") {
    $username = $_SESSION['username'];
    $show_media_query = "SELECT media FROM twitter_posts JOIN twitter_users ON 
                        twitter_posts.user_id = twitter_users.id WHERE 
                        twitter_users.username = '$username' AND twitter_posts.media != 'Null'";
    $run_query = $conn->query($show_media_query);
    $media_data = '';
    while ($data = $run_query->fetch_object()) {
        $media_data .= "<div class='media-post'>
                                <img src='users/$data->media'>
                        </div>";
    }
    echo $media_data;
}

//------------------ Show Media----------------//
if (isset($_POST['action']) && $_POST['action'] == "show_post") {
    $username = $_SESSION['username'];
    $show_post_query = "SELECT * FROM twitter_posts JOIN twitter_users ON 
                        twitter_posts.user_id = twitter_users.id WHERE 
                        twitter_users.username = '$username' ORDER BY twitter_posts.id desc";
    $run_query = $conn->query($show_post_query);
    $post_data = '';
    while ($data = $run_query->fetch_object()) {
        if ($data->media != "") {
            $post_data .= "<div class='user-post'>
                            <div class='post-user-info'>
                                <img src='images/profile_pic.png' alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <span class='post-name'>$data->name </span>
                                    <span class='post-username'>@$data->username</span>
                                    <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis'></i>
                                    </span>
                                </p>
                                <p class='post-content'>$data->content</p>
                                <div class='post-img'>
                                    <img src='users/$data->media' alt='Post Image'>
                                </div>
                                <p class='icons'>
                                   <span class='comment-icon'>
                                        <i class='fa-solid fa-comment' title='Reply'></i>
                                    </span>
                                    <span class='like-icon'>
                                        <i class='fa-solid fa-heart' title='Like'></i>
                                    </span>
                                </p>
                            </div>
                        </div>";
        } else {
            $post_data .= "<div class='user-post'>
                            <div class='post-user-info'>
                                <img src='images/profile_pic.png' alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <span class='post-name'>$data->name </span>
                                    <span class='post-username'>@$data->username</span>
                                    <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis'></i>
                                    </span>
                                </p>
                                <p class='post-content'>$data->content</p>
                                <p class='icons'>
                                    <span class='comment-icon'>
                                        <i class='fa-solid fa-comment' title='Reply'></i>
                                    </span>
                                    <span class='like-icon'>
                                        <i class='fa-solid fa-heart' title='Like'></i>
                                    </span>
                                </p>
                            </div>
                        </div>";
        }
    }
    echo $post_data;
}
?>