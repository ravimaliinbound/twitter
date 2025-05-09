<?php
$conn = new mysqli('localhost', 'root', '', 'twitter');
session_start();

//----------------Fetch Data For Particular Logged in User---------------//
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

//--------------------Edit User--------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'edit_user') {
    $username_chk = $_SESSION['username'];

    //-------------Get Old Profile and Cover Pics Before Delete--------------//

    $get_img = "SELECT * FROM twitter_users WHERE username = '$username_chk'";
    $run_query = $conn->query($get_img);

    $fetch = $run_query->fetch_object();
    $old_profile = $fetch->profile_pic;
    $old_cover = $fetch->cover_pic;

    $name = trim($_POST['edit-name']);
    $username = trim($_POST['edit-username']);
    $email = trim($_POST['edit-email']);
    $bio = trim($_POST['edit-bio']);
    $dob = trim($_POST['edit-dob']);

    $profile_pic = $_FILES['edit-profile-pic']['name'];
    $tmp_profile = $_FILES['edit-profile-pic']['tmp_name'];
    $profile_ext = pathinfo($profile_pic, PATHINFO_EXTENSION);
    $profile_name = pathinfo($profile_pic, PATHINFO_FILENAME);
    $final_profile = $profile_name . time() . "." . $profile_ext;
    $profile_path = "profile_pic/" . $final_profile;

    $cover_pic = $_FILES['edit-cover-pic']['name'];
    $tmp_cover = $_FILES['edit-cover-pic']['tmp_name'];
    $cover_ext = pathinfo($cover_pic, PATHINFO_EXTENSION);
    $cover_name = pathinfo($cover_pic, PATHINFO_FILENAME);
    $final_cover = $cover_name . time() . "." . $cover_ext;
    $cover_path = "cover_pic/" . $final_cover;
    $timestamp = date('Y-m-d h:i:s');

    if ($cover_pic == "" && $profile_pic == "") {
        $upd = "UPDATE twitter_users SET name = '$name', username = '$username',email = '$email', 
        bio = '$bio', dob = '$dob'  WHERE username= '$username_chk'";
    } elseif ($cover_pic == "" && $profile_pic != "") {
        move_uploaded_file($tmp_profile, $profile_path);
        unlink('profile_pic/' . $old_profile);
        $upd = "UPDATE twitter_users SET name = '$name', username = '$username',email = '$email', 
        bio = '$bio', dob = '$dob', profile_pic = '$final_profile'  WHERE username= '$username_chk'";
    } elseif ($cover_pic != "" && $profile_pic == "") {
        move_uploaded_file($tmp_cover, $cover_path);
        unlink(filename: 'cover_pic/' . $old_cover);
        $upd = "UPDATE twitter_users SET name = '$name', username = '$username', email = '$email', 
        bio = '$bio', dob = '$dob', cover_pic = '$final_cover' WHERE username= '$username_chk'";
    } elseif ($profile_pic != "" && $cover_pic != "") {
        move_uploaded_file($tmp_cover, $cover_path);
        move_uploaded_file($tmp_profile, $profile_path);
        unlink('cover_pic/' . $old_cover);
        unlink('profile_pic/' . $old_profile);
        $upd = "UPDATE twitter_users SET name = '$name', username = '$username', email = '$email', bio = '$bio', 
        dob = '$dob', cover_pic = '$final_cover', profile_pic = '$final_profile' WHERE username= '$username_chk'";
    }
    $run = $conn->query($upd);
    if ($run) {
        $_SESSION['username'] = $username;
    }
}

//--------------------- Footer who to follow-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'footer') {
    $username = $_SESSION['username'];
    $sel_footer = "SELECT * FROM twitter_users WHERE username != '$username' LiMIT 0, 3";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {
        $count = $run_footer->num_rows;
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
    echo json_encode([
        'arr' => $arr_footer,
        'count' => $count
    ]);

}


//---------------Signup-------------------//

if (isset($_POST['action']) && $_POST['action'] == 'signup') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? md5(trim($_POST['password'])) : "";
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : "";
    $joined_date = date('F Y');
    $insert = "INSERT INTO twitter_users (name, username, email, password, dob, joined_date, profile_pic, cover_pic) 
    VALUES ('$name','$username','$email','$password','$dob', '$joined_date', '', '')";
    $run = $conn->query($insert);

    if ($run) {
        $_SESSION['login'] = 'Login';
        $_SESSION['username'] = $username;
        // $_SESSION['firstname'] = substr($name, 0, 1);
        $_SESSION['name'] = $name;
    } else {
        echo "<p class='p-2 rounded msg'>Something Went Wrong</p>";
    }
}

//--------------------- Insert Post-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'insert_post') {

    $content = trim($_POST['input']);
    $username = $_SESSION['username'];

    $image_name = $_FILES['index-image']['name'];
    $tmp_name = $_FILES['index-image']['tmp_name'];

    $img_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $img_name = pathinfo($image_name, PATHINFO_FILENAME);
    $final_image = $img_name . time() . "." . $img_ext;
    $path = "posts/" . $final_image;
    if ($image_name == "" && $content != "") {
        $insert_post = "INSERT INTO twitter_posts(content,total_comments, total_likes,user_id)
        SELECT '$content',0,0, id 
        FROM twitter_users WHERE username = '$username'";
        $run_post = $conn->query($insert_post);
    } elseif ($content == "" && $image_name != "") {
        move_uploaded_file($tmp_name, $path);
        $insert_post = "INSERT INTO twitter_posts(media,total_comments, total_likes,user_id)
           SELECT '$final_image',0,0, id 
           FROM twitter_users WHERE username = '$username'";
        $run_post = $conn->query($insert_post);
    } elseif ($content != "" && $final_image != "") {
        move_uploaded_file($tmp_name, $path);
        $insert_post = "INSERT INTO twitter_posts(content, media,total_comments, total_likes, user_id)
        SELECT '$content', '$final_image',0,0, id 
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
            "joined_date" => $data->joined_date,
            'profile' => $data->profile_pic,
            'cover' => $data->cover_pic
        );
    }
    echo json_encode($arr);
}


//-----------------Already Exists----------------//

if (isset($_POST['action']) && $_POST['action'] == 'email_check') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
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


//-----------------Already Exists For Edit Username----------------//

if (isset($_POST['action']) && $_POST['action'] == 'edit_username_check') {
    $username_check = $_SESSION['username'];
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $email_query = "SELECT * FROM twitter_users WHERE   username = '$username' AND username != '$username_check'";
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

//-----------------Already Exists For Edit Email----------------//
if (isset($_POST['action']) && $_POST['action'] == "edit_email_check") {
    $username_check = $_SESSION['username'];
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $email_query = "SELECT * FROM twitter_users WHERE email = '$email' AND username != '$username_check'";
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
        // $_SESSION['firstname'] = substr($name_check, 0, 1);
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
    // unset($_SESSION['firstname']);
    unset($_SESSION['count']);
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
                        twitter_posts.user_id = twitter_users.id WHERE twitter_users.username = 
                        '$username' AND twitter_posts.media != 'Null' ORDER BY twitter_posts.id desc";
    $run_query = $conn->query($show_media_query);
    $media_data = '';
    while ($data = $run_query->fetch_object()) {
        $media_data .= "<div class='media-post'>
                                <img src='posts/$data->media'>
                        </div>";
    }
    echo $media_data;
}

//------------------ Show Post----------------//
if (isset($_POST['action']) && $_POST['action'] == "show_post") {
    $username = $_SESSION['username'];
    $show_post_query = "SELECT twitter_posts.id, twitter_posts.content, twitter_posts.media, twitter_posts.created_at,
                        twitter_posts.total_comments, twitter_posts.total_likes,
                        twitter_users.name, twitter_users.username FROM twitter_posts JOIN 
                        twitter_users ON twitter_posts.user_id = twitter_users.id WHERE 
                        twitter_users.username = '$username' ORDER BY twitter_posts.id DESC";
    $run_query = $conn->query($show_post_query);
    $post_data = '';
    while ($data = $run_query->fetch_object()) {
        $likes = $data->total_likes;
        $comments = $data->total_comments;
        if ($likes == 0) {
            $likes = Null;
        }
        if ($comments == 0) {
            $comments = Null;
        }
        //--------------- Time of post--------------------
        date_default_timezone_set("Asia/Kolkata");
        $post_date = new DateTime("$data->created_at");
        $today = new DateTime(date('Y-m-d H:i:s'));
        $diff = $post_date->diff($today);
        $print = $diff->format('%s');
        $title = $post_date->format('h:i A - M j, Y');

        if ($diff->format('%i') < 1) {
            $print = $diff->format('%s') . 's';
        }
        if ($diff->format('%h') < 1 && $diff->format('%i') > 0) {
            $print = $diff->format('%i') . 'm';
        }
        if ($diff->format('%h') > 0) {
            $print = $diff->format('%h') . 'h';
        }
        if ($diff->format('%d') > 0 || $diff->format('%m') > 0) {
            $print = $post_date->format('M j');
        }
        if ($diff->format('%y') > 0) {
            $print = $post_date->format('M j Y');
        }
        if ($data->media != "") {

            $post_data .= "<div class='user-post'>
                            <div class='post-user-info'>
                                <img src='images/profile_pic.png' alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='hidden' value='0'>
                                     <input type='hidden' id='liked' value='0'>
                                    <input type='hidden' id='commented' value='0'>
                                    <span class='post-name'>$data->name </span>
                                    <span class='post-username'>@$data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                     <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis' onclick='before_delete($data->id)'></i>
                                    </span>
                                </p>
                                <p class='post-content'>$data->content</p>
                                <div class='post-img'>
                                    <img src='posts/$data->media' alt='Post Image'>
                                </div>
                                <p class='icons'>
                                    <span class='comment-icon'>
                                        <img src='images/chat.png' height='17px' title='Reply' onclick='comment_count($data->total_comments)>
                                    </span>
                                    <span class='comment-count'>$comments</span>
                                     <span class='like-icon'>
                                        <img src='images/heart.png' height='18px' title='Like' onclick='like_count($data->total_likes)'>
                                    </span>
                                    <span class='like' >$likes</span>
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
                                    <input type='hidden' id='hidden' value='0'>
                                    <input type='hidden' id='liked' value='0'>
                                    <input type='hidden' id='commented' value='0'>
                                    <span class='post-name'>$data->name </span>
                                    <span class='post-username'>@$data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                    <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis' onclick='before_delete($data->id)'></i>
                                    </span>
                                </p>
                                <p class='post-content'>$data->content</p>
                                <p class='icons'>
                                    <span class='comment-icon'>
                                        <img src='images/chat.png' height='17px' title='Reply' onclick='comment_count($data->total_comments)'>
                                    </span>
                                    <span class='comment-count'>$comments</span>
                                     <span class='like-icon'>
                                        <img src='images/heart.png' height='18px' title='Like' onclick='like_count($data->total_likes)'>
                                    </span>
                                    <span class='like'>$likes</span>
                                </p>
                            </div>
                        </div>";
        }
    }
    echo $post_data;
}

//------------Count Total Posts--------------//
if (isset($_POST['action']) && $_POST['action'] == "count_posts") {
    $username = $_SESSION['username'];
    $show_post_query = "SELECT * FROM twitter_posts JOIN twitter_users ON 
    twitter_posts.user_id = twitter_users.id WHERE 
    twitter_users.username = '$username' ORDER BY twitter_posts.id desc";
    $run_query = $conn->query($show_post_query);

    $count = 0;
    while ($run_query->fetch_object()) {
        $count++;
    }
    echo $count;
}

//----------------------- Delete Post------------------//

if (isset($_POST['action']) && $_POST['action'] == 'delete_post') {
    $id = $_POST['id'];

    $get_img = "SELECT media FROM twitter_posts WHERE id = '$id'";
    $run_query = $conn->query($get_img);

    $fetch = $run_query->fetch_object();
    $media = $fetch->media;

    $del = "DELETE FROM twitter_posts WHERE id = '$id'";
    $run = $conn->query($del);
    if ($run) {
        unlink('posts/' . $media);
    }
}


?>