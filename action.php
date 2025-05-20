<?php
$conn = new mysqli('localhost', 'root', '', 'twitter');
session_start();

//----------------Fetch Data For Particular Logged in User---------------//
if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $username = $_SESSION['username'];
    $sel = "SELECT * FROM twitter_users WHERE username = '$username'";
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
//----------------Profile Pic---------------//
if (isset($_POST['action']) && $_POST['action'] == 'profile_pic') {
    $username = $_SESSION['username'];
    $sel = "SELECT * FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($sel);
    $data = $run->fetch_object();
    echo $data->profile_pic;
}

//----------------Delete Comment---------------//
if (isset($_POST['action']) && $_POST['action'] == 'delete_comment') {
    $id = $_POST['id'];
    $delete_comments = "DELETE FROM twitter_comments WHERE id = '$id'";
    $run = $conn->query($delete_comments);
    $data = $run->fetch_object();
}

//----------------Follow Unfollow---------------//
if (isset($_POST['action']) && $_POST['action'] == 'follow_unfollow') {
    $current_user = $_SESSION['username'];
    $other_user = $_POST['other_user'];
    $sel_id = "SELECT id FROM twitter_users WHERE username = '$current_user'";
    $run_id = $conn->query($sel_id);
    $user_data = $run_id->fetch_object();
    $follower_id = $user_data->id;

    $sel_other_id = "SELECT id FROM twitter_users WHERE username = '$other_user'";
    $run_other_id = $conn->query($sel_other_id);
    $other_user_data = $run_other_id->fetch_object();
    $following_id = $other_user_data->id;

    //Check if already followed
    $check = "SELECT * FROM twitter_followers WHERE follower_id = '$current_user' AND following_id= '$other_user'";
    $check_result = $conn->query($check);
    $already_followed = $check_result->num_rows > 0 ? 'Yes' : 'No';
    if ($already_followed == 'No') {
        $insert_follow = "INSERT INTO twitter_followers(follower_id, following_id) VALUES ('$follower_id', '$following_id')";
        $run_insert = $conn->query($insert_follow);
        if ($run_insert) {
            $insert_notification = "INSERT INTO twitter_notifications(user_id,from_user_id, type, message) 
            VALUES ('$following_id','$follower_id', 'follow', '@$current_user started to following you.')";
            $run_notification = $conn->query($insert_notification);
            if ($run_notification) {
                echo "Following";
            }
        }
    }
}
//----------------Unfollow---------------//
if (isset($_POST['action']) && $_POST['action'] == 'unfollow') {
    $current_user = $_SESSION['username'];
    $other_user = $_POST['other_user'];
    $sel_id = "SELECT id FROM twitter_users WHERE username = '$current_user'";
    $run_id = $conn->query($sel_id);
    $user_data = $run_id->fetch_object();
    $follower_id = $user_data->id;

    $sel_other_id = "SELECT id FROM twitter_users WHERE username = '$other_user'";
    $run_other_id = $conn->query($sel_other_id);
    $other_user_data = $run_other_id->fetch_object();
    $following_id = $other_user_data->id;

    $unfollow = "DELETE FROM twitter_followers WHERE follower_id = '$follower_id' AND following_id = '$following_id'";
    $run_unfollow = $conn->query($unfollow);
    if ($run_unfollow) {
        $delete_notification = "DELETE FROM twitter_notifications WHERE 
        from_user_id = '$follower_id' AND user_id = '$following_id' AND type = 'follow'";
        $run_notification = $conn->query($delete_notification);
        if ($run_notification) {
            echo "Unfollowed";
        }
    }
}
//----------------Check if already followed other user---------------//
if (isset($_POST['action']) && $_POST['action'] == 'follow_check') {
    $current_user = $_SESSION['username'];
    $other_user = $_POST['other_user'];
    $sel_id = "SELECT id FROM twitter_users WHERE username = '$current_user'";
    $run_id = $conn->query($sel_id);
    $user_data = $run_id->fetch_object();
    $follower_id = $user_data->id;

    $sel_other_id = "SELECT id FROM twitter_users WHERE username = '$other_user'";
    $run_other_id = $conn->query($sel_other_id);
    $other_user_data = $run_other_id->fetch_object();
    $following_id = $other_user_data->id;

    //Check if already followed
    $check = "SELECT * FROM twitter_followers WHERE follower_id = '$follower_id' AND following_id= '$following_id'";
    $check_result = $conn->query($check);
    $followed = $check_result->num_rows > 0 ? 'Yes' : 'No';
    echo $followed;
}

/*-------------- Fetch Follower Count----------------*/
if (isset($_POST['action']) && $_POST['action'] == 'fetch_follower') {
    $username = $_POST['username'];
    $sel_other_id = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run_other_id = $conn->query($sel_other_id);
    $other_user_data = $run_other_id->fetch_object();
    $following_id = $other_user_data->id;

    $get_followers = "SELECT COUNT(*) AS total_followers 
          FROM twitter_followers 
          WHERE following_id = $following_id";

    $result = $conn->query($get_followers);

    if ($result) {
        $data = $result->fetch_assoc();
        $followers = $data['total_followers'];
        echo $followers;
    } else {
        echo "Error: " . $conn->error;
    }
}
/*-------------- Fetch Following Count----------------*/
if (isset($_POST['action']) && $_POST['action'] == 'fetch_following') {
    $username = $_POST['username'];
    $sel_other_id = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run_other_id = $conn->query($sel_other_id);
    $other_user_data = $run_other_id->fetch_object();
    $follower_id = $other_user_data->id;

    $get_following = "SELECT COUNT(*) AS total_following 
          FROM twitter_followers 
          WHERE follower_id = $follower_id";

    $result = $conn->query($get_following);

    if ($result) {
        $data = $result->fetch_assoc();
        $following = $data['total_following'];
        echo $following;
    } else {
        echo "Error: " . $conn->error;
    }
}

/*-------------- Fetch Follower Count For Current Logged in User----------------*/
if (isset($_POST['action']) && $_POST['action'] == 'follower') {
    $username = $_SESSION['username'];
    $sel_other_id = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run_other_id = $conn->query($sel_other_id);
    $other_user_data = $run_other_id->fetch_object();
    $following_id = $other_user_data->id;

    $get_followers = "SELECT COUNT(*) AS total_followers 
          FROM twitter_followers 
          WHERE following_id = $following_id";

    $result = $conn->query($get_followers);

    if ($result) {
        $data = $result->fetch_assoc();
        $followers = $data['total_followers'];
        echo $followers;
    } else {
        echo "Error: " . $conn->error;
    }
}
/*-------------- Fetch Following Count For Current Logged in User----------------*/
if (isset($_POST['action']) && $_POST['action'] == 'following') {
    $username = $_SESSION['username'];
    $sel_other_id = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run_other_id = $conn->query($sel_other_id);
    $other_user_data = $run_other_id->fetch_object();
    $follower_id = $other_user_data->id;

    $get_following = "SELECT COUNT(*) AS total_following 
          FROM twitter_followers 
          WHERE follower_id = $follower_id";

    $result = $conn->query($get_following);

    if ($result) {
        $data = $result->fetch_assoc();
        $following = $data['total_following'];
        echo $following;
    } else {
        echo "Error: " . $conn->error;
    }
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
        if ($old_profile) {
            unlink('profile_pic/' . $old_profile);
        }
        $upd = "UPDATE twitter_users SET name = '$name', username = '$username',email = '$email', 
        bio = '$bio', dob = '$dob', profile_pic = '$final_profile'  WHERE username= '$username_chk'";
    } elseif ($cover_pic != "" && $profile_pic == "") {
        move_uploaded_file($tmp_cover, $cover_path);
        if ($old_cover) {
            unlink(filename: 'cover_pic/' . $old_cover);
        }
        $upd = "UPDATE twitter_users SET name = '$name', username = '$username', email = '$email', 
        bio = '$bio', dob = '$dob', cover_pic = '$final_cover' WHERE username= '$username_chk'";
    } elseif ($profile_pic != "" && $cover_pic != "") {
        move_uploaded_file($tmp_cover, $cover_path);
        move_uploaded_file($tmp_profile, $profile_path);
        if ($old_cover) {
            unlink(filename: 'cover_pic/' . $old_cover);
        }
        if ($old_profile) {
            unlink('profile_pic/' . $old_profile);
        }
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

    //------------Get current user's ID---------------------
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $dataa = $run->fetch_object();
    $follower_id = $dataa->id;

    $sel_footer = "SELECT * FROM twitter_users WHERE username != '$username'";
    $run_footer = $conn->query($sel_footer);
    $count = $run_footer->num_rows;
    $arr_footer = "";
    $i = 0;
    while ($data = $run_footer->fetch_object()) {
        if ($i == 3) {
            continue;
        }

        // Check if logged-in user is already following this user
        $check_follow = "SELECT * FROM twitter_followers WHERE follower_id = '$follower_id' AND following_id = '$data->id'";
        $run_check = $conn->query($check_follow);
        $is_following = $run_check->num_rows > 0;
        if ($is_following) {
            continue;
        }
        // Set button text based on follow status
        $btn_text = $is_following ? "Following" : "Follow";
        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic . '' : 'images/profile_pic.png';
        $arr_footer .=
            " <div style = 'display: flex;' class='background'>
                <div class='show-img' style='margin-top: 6px;' href='user_profile.php'  onclick='show_user(`$data->username`)'>
                    <a onclick='show_user(`$data->username`)'>
                        <img src=$profile height='40px' style='border-radius: 50%'>
                    </a>
                </div>
                <div class='show-to-follow-data' href='user_profile.php'  onclick='show_user(`$data->username`)'>
                    <p>
                        <a class='show-to-follow-name'>$data->name</a><br>
                        <a class='show-to-follow-username'>@$data->username</a>
                    </p>
                </div>
                <div class='show-to-follow-btn'>
                    <a href='#' class='n_following' data-other_user='{$data->username}'>$btn_text</a>
                </div>
                </div>";
        $i++;
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

//---------------------Show More-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'show_more') {
    $username = $_SESSION['username'];

    //------------Get current user's ID---------------------
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $dataa = $run->fetch_object();
    $follower_id = $dataa->id;

    $sel_footer = "SELECT * FROM twitter_users  WHERE username != '$username' LIMIT 0,50";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {



        // Check if logged-in user is already following this user
        $check_follow = "SELECT * FROM twitter_followers WHERE follower_id = '$follower_id' AND following_id = '$data->id'";
        $run_check = $conn->query($check_follow);
        $is_following = $run_check->num_rows > 0;
        if ($is_following) {
            continue;
        }
        // Set button text based on follow status
        $btn_text = $is_following ? "Following" : "Follow";
        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic . '' : 'images/profile_pic.png';
        $arr_footer .=
            " <div style = 'display: flex;' class= 'background-follow'>
                <div class='showw-img' style='margin-top: 6px;'   onclick='show_user(`$data->username`)'>
                    <a ><img src=$profile height='40px' width= '40px' style='border-radius: 50%'>
                    </a>
                </div>
                <div class='show-to-followw-data' style='width:50%' onclick='show_user(`$data->username`)'>
                    <p>
                        <a class='show-to-followw-name'>$data->name</a><br>
                        <a class='show-to-followw-username' >@$data->username</a><br>
                        <a class='show-to-followw-username' >$data->bio</a>
                    </p>
                </div>
                <div class='show-to-followw-btn'>
                    <a href='#' class='not_following'  data-other_user='{$data->username}'>$btn_text</a>
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

//------------------ Show Other User's Media ----------------//
if (isset($_POST['action']) && $_POST['action'] == "show_user_media") {
    $username = $_POST['username'];
    $show_media_query = "SELECT media FROM twitter_posts JOIN twitter_users ON 
                        twitter_posts.user_id = twitter_users.id WHERE twitter_users.username = 
                        '$username' AND twitter_posts.media != 'Null' ORDER BY twitter_posts.id desc";
    $run_query = $conn->query($show_media_query);
    $media_data = '';
    while ($data = $run_query->fetch_object()) {
        $media = $data->media;
        if ($media) {
            $media_data .= "<div class='media-post'>
                                <img src='posts/$media'>
                        </div>";
        }
    }
    echo $media_data;
}

//------------------ Show Post----------------//
if (isset($_POST['action']) && $_POST['action'] == "show_post") {
    $username = $_SESSION['username'];
    /*------------ Getting user id-------------*/
    $u_query = "SELECT * FROM twitter_users WHERE username = '$username'";
    $u_result = $conn->query($u_query);
    $u_data = $u_result->fetch_object();
    $user_id = $u_data->id;
    $name = $u_data->name;


    $show_post_query = "SELECT twitter_posts.id, twitter_posts.content, twitter_posts.media, 
                        twitter_users.profile_pic, twitter_users.cover_pic,
                        twitter_posts.created_at, twitter_users.name, twitter_users.username FROM twitter_posts JOIN 
                        twitter_users ON twitter_posts.user_id = twitter_users.id WHERE 
                        twitter_users.username = '$username' ORDER BY twitter_posts.id DESC";
    $run_query = $conn->query($show_post_query);
    $post_data = '';
    while ($data = $run_query->fetch_object()) {
        $username = $data->username;
        /*--------------- Total Likes---------------*/
        $post_id = $data->id;
        $query = "SELECT COUNT(*) AS total_likes 
          FROM twitter_likes 
          WHERE liked_id = $post_id 
          AND likeable_type = 'post'";

        $result = $conn->query($query);

        if ($result) {
            $likes = $result->fetch_assoc();
            $total_likes = $likes['total_likes'];
            if ($total_likes == 0) {
                $total_likes = '';
            }
        } else {
            echo "Error: " . $conn->error;
        }

        /*--------------- Total Comments---------------*/
        $post_id = $data->id;
        $query = "SELECT COUNT(*) AS total_comments 
          FROM twitter_comments 
          WHERE post_id = $post_id";

        $result = $conn->query($query);

        if ($result) {
            $comments = $result->fetch_assoc();
            $total_comments = $comments['total_comments'];
            if ($total_comments == 0) {
                $total_comments = '';
            }
        } else {
            echo "Error: " . $conn->error;
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

        /*----------------- Check user has liked the post or not--------------------*/
        $check_query = "SELECT * FROM twitter_likes 
                WHERE user_id = $user_id 
                AND liked_id = $post_id 
                AND likeable_type = 'post'";

        $check_result = $conn->query($check_query);

        $already_liked = ($check_result->num_rows > 0);
        $liked = $already_liked ? 'liked' : '';
        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic . '' : 'images/profile_pic.png';
        if ($data->media != "") {

            $post_data .= "<div class='user-post'>
                            <div class='post-user-info' onclick='show_user(`$data->username`)'>
                                <img src=$profile alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
                                    <span class='post-name' onclick='show_user(`$data->username`)'>$data->name </span>
                                    <span class='post-username' onclick='show_user(`$data->username`)'>@$data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                     <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis' onclick='before_delete($data->id)'></i>
                                    </span>
                                </p>
                                <div class='for_posts' onclick='post_details(`$data->id`)'>
                                    <p class='post-content'>$data->content</p>
                                    <div class='post-img'>
                                        <img src='posts/$data->media' alt='Post Image'>
                                    </div>
                                </div>
                                <p class='icons'>
                                    <span class='comment-icon open_comment_modal' data-post-id='{$data->id}'>
                                        <img src='images/chat.png' height='17px' title='Reply'>
                                    </span>
                                    <span class='comment-count'>$total_comments</span>
                                    <span class='like-icon' data-post-id='{$data->id}'>
                                        <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                                    </span>
                                    <span class='like'>$total_likes</span>
                                </p>
                            </div>
                        </div>";
        } else {
            $post_data .= "<div class='user-post'>
                            <div class='post-user-info' onclick='show_user(`$data->username`)'>
                                <img src=$profile alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
                                    <span class='post-name' onclick='show_user(`$data->username`)'>$data->name </span>
                                    <span class='post-username' onclick='show_user(`$data->username`)'>@$data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                    <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis' onclick='before_delete($data->id)'></i>
                                    </span>
                                </p>
                                <div class='for_posts' onclick='post_details(`$data->id`)'>
                                    <p class='post-content'>$data->content</p>
                                </div>
                                <p class='icons'>
                                    <span class='comment-icon open_comment_modal' data-post-id='{$data->id}'>
                                        <img src='images/chat.png' height='17px' title='Reply'>
                                    </span>
                                    <span class='comment-count'>$total_comments</span>
                                     <span class='like-icon' data-post-id='{$data->id}'>
                                        <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                                    </span>
                                    <span class='like'>$total_likes</span>
                                </p>
                            </div>
                        </div>";
        }
    }
    echo json_encode([
        'post_data' => $post_data,
        'name' => $name,
        'username' => $username
    ]);
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

//------------Count Total Posts Of Other User--------------// 
if (isset($_POST['action']) && $_POST['action'] == "other_user_post_count") {
    $username = $_POST['username'];
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
    $id = $_POST['post_id'];

    $get_img = "SELECT media FROM twitter_posts WHERE id = '$id'";
    $run_query = $conn->query($get_img);

    $fetch = $run_query->fetch_object();
    $media = $fetch->media;

    $del = "DELETE FROM twitter_posts WHERE id = '$id'";
    $run = $conn->query($del);
    if ($run) {
        if ($media) {
            unlink('posts/' . $media);
        }
        echo 'Deleted';
    }
}


//----------------------- Delete Post------------------//

if (isset($_POST['action']) && $_POST['action'] == 'delete_notification') {
    $id = $_POST['id'];

    $del = "DELETE FROM twitter_notifications WHERE id = '$id'";
    $run = $conn->query($del);
    echo 'Deleted';
}


//----------------------- Like Post------------------//
if (isset($_POST['action']) && $_POST['action'] == 'like') {

    $username = $_SESSION['username'];

    // Get user ID
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $data = $run->fetch_object();
    $user_id = $data->id;
    $post_id = $_POST['post_id'];
    $type = $_POST['type'];

    // Get post owner (for notification)
    $fetch_post_owner = "SELECT user_id FROM twitter_posts WHERE id = $post_id";
    $run_owner = $conn->query($fetch_post_owner);
    if (!$run_owner || $run_owner->num_rows == 0) {
        echo "Post not found.";
        exit;
    }

    $owner_data = $run_owner->fetch_object();
    $post_owner_id = $owner_data->user_id;

    // Check if already liked
    $sel = "SELECT * FROM twitter_likes WHERE user_id = $user_id AND liked_id = $post_id";
    $res = $conn->query($sel);
    if (!$res) {
        echo "Like check error: " . $conn->error;
        exit;
    }

    if ($res->num_rows > 0) {
        // Unlike
        $delete = "DELETE FROM twitter_likes WHERE user_id = $user_id AND liked_id = $post_id";
        $result = $conn->query($delete);
        if (!$result) {
            echo "Delete error: " . $conn->error;
        } else {
            // Delete notification only if it's not self-like
            if ($user_id != $post_owner_id) {
                $delete_notif = "DELETE FROM twitter_notifications 
                                 WHERE user_id = $post_owner_id 
                                 AND from_user_id = $user_id 
                                 AND type = 'like' 
                                 AND post_id = $post_id";
                $conn->query($delete_notif);
            }
        }
    } else {
        // Like
        $insert = "INSERT INTO twitter_likes (user_id, liked_id, likeable_type) VALUES ($user_id, $post_id, '$type')";
        $result = $conn->query($insert);
        if (!$result) {
            echo "Insert error: " . $conn->error;
        } else {
            // Insert notification only if it's not self-like
            if ($user_id != $post_owner_id) {
                $message = "@$username liked your post.";
                $insert_notification = "INSERT INTO twitter_notifications(user_id, from_user_id, type, message, post_id) 
                                        VALUES ($post_owner_id, $user_id, 'like', '$message', $post_id)";
                $conn->query($insert_notification);
            }
        }
    }
}



//----------------------- Like Comment------------------//
if (isset($_POST['action']) && $_POST['action'] == 'comment_like') {

    $username = $_SESSION['username'];

    // Get user ID
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $data = $run->fetch_object();
    $user_id = $data->id;
    $comment_id = $_POST['comment_id'];
    $type = $_POST['type'];

    // Get Commentator (for notification)
    $fetch_post_owner = "SELECT user_id FROM twitter_comments WHERE id = $comment_id";
    $run_owner = $conn->query($fetch_post_owner);
    if (!$run_owner || $run_owner->num_rows == 0) {
        echo "Post not found.";
        exit;
    }

    $owner_data = $run_owner->fetch_object();
    $commentator_id = $owner_data->user_id;

    // Check if already liked
    $sel = "SELECT * FROM twitter_likes WHERE user_id = $user_id AND liked_id = $comment_id";
    $res = $conn->query($sel);
    if (!$res) {
        echo "Like check error: " . $conn->error;
        exit;
    }

    if ($res->num_rows > 0) {
        // Unlike
        $delete = "DELETE FROM twitter_likes WHERE user_id = $user_id AND liked_id = $comment_id";
        $result = $conn->query($delete);
        if (!$result) {
            echo "Delete error: " . $conn->error;
        } else {
            // Delete notification only if it's not self-like
            if ($user_id != $commentator_id) {
                $delete_notif = "DELETE FROM twitter_notifications 
                                 WHERE user_id = $commentator_id 
                                 AND from_user_id = $user_id 
                                 AND type = 'like' 
                                 AND post_id = $comment_id";
                $conn->query($delete_notif);
            }
        }
    } else {
        // Like
        $insert = "INSERT INTO twitter_likes (user_id, liked_id, likeable_type) VALUES ($user_id, $comment_id, '$type')";
        $result = $conn->query($insert);
        if (!$result) {
            echo "Insert error: " . $conn->error;
        } else {
            // Insert notification only if it's not self-like
            if ($user_id != $commentator_id) {
                $message = "@$username liked your comment.";
                $insert_notification = "INSERT INTO twitter_notifications(user_id, from_user_id, type, message, post_id) 
                                        VALUES ($commentator_id, $user_id, 'like', '$message', $comment_id)";
                $conn->query($insert_notification);
            }
        }
    }
}

/*----------------------------- Comment Insert-----------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'insert_comment') {
    if (!isset($_POST['post_id']) || !is_numeric($_POST['post_id'])) {
        echo "Invalid or missing post_id.";
        exit;
    }
    $post_id = $_POST['post_id'];
    $comment = isset($_POST['comment']) ? $conn->real_escape_string(trim($_POST['comment'])) : '';
    $username = $_SESSION['username'];

    if (empty($comment)) {
        echo "Comment cannot be empty.";
        exit;
    }

    // Get logged-in user
    $u_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $u_result = $conn->query($u_query);
    $u_data = $u_result->fetch_object();
    $user_id = $u_data->id;

    // Ensure post exists
    $get_user_query = "SELECT user_id FROM twitter_posts WHERE id = $post_id";
    $get_result = $conn->query($get_user_query);
    if ($get_result->num_rows == 0) {
        echo "Post not found.";
        exit;
    }
    $get_data = $get_result->fetch_object();
    $post_owner_id = $get_data->user_id;

    // Insert comment
    $insert = "INSERT INTO twitter_comments (user_id, post_id, comment) VALUES ($user_id, $post_id, '$comment')";
    $result = $conn->query($insert);

    if (!$result) {
        echo "Insert error: " . $conn->error;
    } else {
        if ($user_id != $post_owner_id) {
            $insert_notification = "INSERT INTO twitter_notifications(user_id, from_user_id, type, message, comment_content, post_id) 
                VALUES ('$post_owner_id', '$user_id', 'comment', '@$username commented on your post.', '$comment', '$post_id')";
            $conn->query($insert_notification);
        }
        echo "Comment added";
    }
}



/*----------------------------- Reply Insert-----------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'insert_reply') {
    $comment_id = $_POST['comment_id'];
    echo $comment_id;
    $reply = $_POST['reply'];
    $post_id = $_POST['post_id']; // optional, but useful for notification linking
    $username = $_SESSION['username'];

    // Get logged-in user
    $u_query = "SELECT * FROM twitter_users WHERE username = '$username'";
    $u_result = $conn->query($u_query);
    $u_data = $u_result->fetch_object();
    $user_id = $u_data->id;

    // Get comment owner
    $get_user_query = "SELECT user_id FROM twitter_comments WHERE id = '$comment_id'";
    $get_result = $conn->query($get_user_query);
    $get_data = $get_result->fetch_object();
    $comment_owner_id = $get_data->user_id;

    // Insert reply
    $insert = "INSERT INTO twitter_replies (user_id, post_id, comment_id, reply) 
               VALUES ('$user_id', '$post_id', '$comment_id', '$reply')";
    $result = $conn->query($insert);

    if (!$result) {
        echo "Reply insert error: " . $conn->error;
    } else {
        // Insert notification only if user is not replying to own comment
        if ($user_id != $comment_owner_id) {
            $insert_notification = "INSERT INTO twitter_notifications(
                                        user_id, from_user_id, type, message, comment_content, post_id
                                    ) 
                                    VALUES (
                                        '$comment_owner_id', '$user_id', 'reply',
                                        '@$username replied to your comment.',
                                        '$reply', '$post_id'
                                    )";
            $conn->query($insert_notification);
        }

        echo "Reply added";
    }
}



/*----------------------------- Show Notifications-----------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'show_notifications') {
    $username = $_SESSION['username'];

    // Get ID of currently logged in user
    $sel = "SELECT * FROM twitter_users WHERE username = '$username'";
    $run_user = $conn->query($sel);
    $data = $run_user->fetch_object();
    $id = $data->id;

    $notifications = "";
    $fetch_notifications = "SELECT * FROM twitter_notifications WHERE user_id = '$id' ORDER BY id DESC";
    $run_notifications = $conn->query($fetch_notifications);
    while ($n_data = $run_notifications->fetch_object()) {
        $fetch_user = "SELECT * FROM twitter_users WHERE id = '$n_data->from_user_id'";
        $run_user = $conn->query($fetch_user);
        $users_data = $run_user->fetch_object();
        $profile = $users_data->profile_pic ? 'profile_pic/' . $users_data->profile_pic . '' : 'images/profile_pic.png';
        $notifications .= "<div class='n_parent'>
                            <div class='n_img'  onclick='show_user(`$users_data->username`)'>
                                <img src=$profile alt='' height='40px'>
                            </div>
                            <div class='n_userdata'>
                                <p>
                                    <input type='hidden' id='n_hidden' value='0'>
                                    <span class='n_name'  onclick='show_user(`$users_data->username`)'>$users_data->name</span>
                                    <span class='n_username'  onclick='show_user(`$users_data->username`)'>@$users_data->username</span>
                                    <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis' onclick='before_delete_notification($n_data->id)'></i>
                                    </span><br>
                                    <span class='n_msg'>$n_data->message</span><br>
                                    <span class='n_comment'>$n_data->comment_content</span>
                                </p>
                            </div>
                        </div>";
    }
    echo $notifications;
}

/*-----------------------------Show Other User Profile-----------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'show_user') {
    $username = $_POST['username'];

    $u_query = "SELECT * FROM twitter_users WHERE username = '$username'";
    $u_result = $conn->query($u_query);
    $u_data = $u_result->fetch_object();

    echo json_encode([
        'name' => $u_data->name,
        'username' => $u_data->username,
        'bio' => $u_data->bio,
        'joined' => $u_data->joined_date,
        'profile' => $u_data->profile_pic,
        'cover' => $u_data->cover_pic
    ]);
}



/*------------------------Show For You Posts---------------------*/

if (isset($_POST['action']) && $_POST['action'] == "show_foryou_post") {
    $username = $_SESSION['username'];
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $data = $run->fetch_object();
    $id = $data->id;
    $select = 'SELECT * FROM twitter_posts ORDER BY id DESC';
    $run = $conn->query($select);
    $data = '';
    $post_data = '';
    while ($data = $run->fetch_object()) {
        $user_id = $data->user_id;

        /*--------------- Total Likes---------------*/
        $post_id = $data->id;
        $query = "SELECT COUNT(*) AS total_likes 
                            FROM twitter_likes WHERE liked_id = $post_id 
                            AND likeable_type = 'post'";
        $result = $conn->query($query);

        if ($result) {
            $likes = $result->fetch_assoc();
            $total_likes = $likes['total_likes'];
            if ($total_likes == 0) {
                $total_likes = '';
            }
        } else {
            echo "Error: " . $conn->error;
        }


        /*----------------- Check user has liked the post or not--------------------*/
        $check_query = "SELECT * FROM twitter_likes 
                WHERE user_id = $id 
                AND liked_id = $post_id 
                AND likeable_type = 'post'";

        $check_result = $conn->query($check_query);

        $already_liked = ($check_result->num_rows > 0);
        $liked = $already_liked ? 'liked' : '';

        /*--------------- Total Comments---------------*/
        $post_id = $data->id;
        $query = "SELECT COUNT(*) AS total_comments 
          FROM twitter_comments 
          WHERE post_id = $post_id";

        $result = $conn->query($query);

        if ($result) {
            $comments = $result->fetch_assoc();
            $total_comments = $comments['total_comments'];
            if ($total_comments == 0) {
                $total_comments = '';
            }
        } else {
            echo "Error: " . $conn->error;
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

        /*-----------Get User Data to show with posts------*/
        $user_query = "SELECT * FROM twitter_users WHERE id = '$user_id'";
        $run_query = $conn->query($user_query);
        $user_data = $run_query->fetch_object();
        $profile = $user_data->profile_pic ? 'profile_pic/' . $user_data->profile_pic . '' : 'images/profile_pic.png';
        if ($data->media != "") {
            $post_data .= "<div class='user-post'>
                            <div class='post-user-info' onclick='show_user(`$user_data->username`)'>
                                <img src= $profile alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='commented_foryou' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
                                    <span class='post-name' onclick='show_user(`$user_data->username`)'>$user_data->name </span>
                                    <span class='post-username' onclick='show_user(`$user_data->username`)'>@$user_data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                </p>
                                <div class='for_posts' onclick='post_details(`$data->id`)'>
                                    <p class='post-content'>$data->content</p>
                                    <div class='post-img'>
                                        <img src='posts/$data->media' alt='Post Image'>
                                    </div>
                                </div>
                                <p class='icons'>
                                    <span class='comment-icon open_comment_modal_foryou' data-post-id='{$data->id}'>
                                        <img src='images/chat.png' height='17px' title='Reply'>
                                    </span>
                                    <span class='comment-count'>$total_comments</span>
                                    <span class='like-icon' data-post-id='{$data->id}'>
                                        <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                                    </span>
                                    <span class='like'>$total_likes</span>
                                </p>
                            </div>
                        </div>";
        } else {
            $post_data .= "<div class='user-post'>
                            <div class='post-user-info' onclick='show_user(`$user_data->username`)'>
                                <img src=$profile alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='commented_foryou' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
                                    <span class='post-name' onclick='show_user(`$user_data->username`)'>$user_data->name </span>
                                    <span class='post-username' onclick='show_user(`$user_data->username`)'>@$user_data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                </p>
                                 <div class='for_posts' onclick='post_details(`$data->id`)'>
                                    <p class='post-content'>$data->content</p>
                                </div>
                                <p class='icons'>
                                    <span class='comment-icon open_comment_modal_foryou' data-post-id='{$data->id}'>
                                        <img src='images/chat.png' height='17px' title='Reply'>
                                    </span>
                                    <span class='comment-count'>$total_comments</span>
                                    <span class='like-icon' data-post-id='{$data->id}'>
                                        <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                                    </span>
                                    <span class='like'>$total_likes</span>
                                </p>
                            </div>
                        </div>";
        }
    }
    echo $post_data;
}



/*------------------------Show Other User Posts---------------------*/
if (isset($_POST['action']) && $_POST['action'] == "show_user_post") {
    $username = $conn->real_escape_string($_POST['username']);
    $current_user = $_SESSION['username'];

    // Get current user id
    $sel = "SELECT id FROM twitter_users WHERE username = '$current_user'";
    $run_user = $conn->query($sel);
    if (!$run_user) {
        echo "Error: " . $conn->error;
        exit;
    }
    $current_user_data = $run_user->fetch_object();

    // Get requested user id
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $data = $run->fetch_object();
    $user_id = $data->id;

    // Fetch posts with user info + likes/comments count + if liked by current user
    $query = "
        SELECT p.*, u.name, u.username, u.profile_pic,
            (SELECT COUNT(*) FROM twitter_likes WHERE liked_id = p.id AND likeable_type = 'post') AS total_likes,
            (SELECT COUNT(*) FROM twitter_comments WHERE post_id = p.id) AS total_comments,
            (SELECT 1 FROM twitter_likes WHERE user_id = {$current_user_data->id} AND liked_id = p.id AND likeable_type = 'post' LIMIT 1) AS liked_by_user
        FROM twitter_posts p
        JOIN twitter_users u ON p.user_id = u.id
        WHERE p.user_id = $user_id
        ORDER BY p.id DESC
    ";
    $run = $conn->query($query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    date_default_timezone_set("Asia/Kolkata");
    $today = new DateTime();
    $post_data = '';

    while ($data = $run->fetch_object()) {
        $liked = $data->liked_by_user ? 'liked' : '';

        // Time formatting
        $post_date = new DateTime($data->created_at);
        $diff = $post_date->diff($today);
        $title = $post_date->format('h:i A - M j, Y');

        if ($diff->format('%i') < 1) {
            $print = $diff->format('%s') . 's';
        } elseif ($diff->format('%h') < 1) {
            $print = $diff->format('%i') . 'm';
        } elseif ($diff->format('%d') == 0) {
            $print = $diff->format('%h') . 'h';
        } elseif ($diff->format('%y') == 0) {
            $print = $post_date->format('M j');
        } else {
            $print = $post_date->format('M j Y');
        }

        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic : 'images/profile_pic.png';
        $post_media = $data->media ? "<div class='post-img'><img src='posts/{$data->media}' alt='Post Image'></div>" : '';

        $post_data .= "
            <div class='user-post'>
                <div class='post-user-info' onclick='show_user(`$data->username`)'>
                    <img src='$profile' alt='Post' height='40px' style='border-radius: 50%'>
                </div>
                <div class='postuser-name'>
                    <p>
                        <input type='hidden' id='commented' value='0'>
                        <input type='hidden' id='other_username' value='0'>
                        <input type='hidden' id='commented_foryou' value='0'>
                        <input type='hidden' id='hidden' value='0'>
                        <span class='post-name' onclick='show_user(`$data->username`)'>{$data->name}</span>
                        <span class='post-username' onclick='show_user(`$data->username`)'>@{$data->username}</span>
                        <span class='time' title='$title'>· $print</span>
                    </p>
                    <p class='post-content'  onclick='post_details(`$data->id`)'>{$data->content}</p>
                    <div onclick='post_details(`$data->id`)'>$post_media</div>
                    <p class='icons'>
                        <span class='comment-icon open_comment_modal_foryou' data-post-id='{$data->id}' data-username='$username'>
                            <img src='images/chat.png' height='17px' title='Reply'>
                        </span>"
            . ($data->total_comments > 0 ? "<span class='comment-count'>{$data->total_comments}</span>" : "") .
            "<span class='like-icon' data-post-id='{$data->id}' data-username='$username'>
                            <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                    </span>"
            . ($data->total_likes > 0 ? "<span class='like'>{$data->total_likes}</span>" : "") . "
                    </p>
                </div>
            </div>";
    }

    echo $post_data;
}

/*------------------------Show Following Posts---------------------*/
if (isset($_POST['action']) && $_POST['action'] == "following_post") {
    $username = $_SESSION['username'];

    // Get logged-in user id
    $result = $conn->query("SELECT id FROM twitter_users WHERE username = '$username'");
    if (!$result) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $user = $result->fetch_object();
    $user_id = $user->id;

    // Get following IDs
    $res = $conn->query("SELECT GROUP_CONCAT(following_id) as ids FROM twitter_followers WHERE follower_id = $user_id");
    if (!$res) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $row = $res->fetch_assoc();
    $ids_list = $row['ids'];

    if (empty($ids_list)) {
        echo "<p class='follow_people'>Follow people to see their posts.</p>";
        exit;
    }

    // Fetch posts with user info and likes/comments count + if logged user liked post
    $query = "
        SELECT p.*, u.username, u.name, u.profile_pic,
            (SELECT COUNT(*) FROM twitter_likes WHERE liked_id = p.id AND likeable_type = 'post') AS total_likes,
            (SELECT COUNT(*) FROM twitter_comments WHERE post_id = p.id) AS total_comments,
            (SELECT 1 FROM twitter_likes WHERE user_id = $user_id AND liked_id = p.id AND likeable_type = 'post' LIMIT 1) AS liked_by_user
        FROM twitter_posts p
        JOIN twitter_users u ON p.user_id = u.id
        WHERE p.user_id IN ($ids_list)
        ORDER BY p.created_at DESC
    ";
    $posts_result = $conn->query($query);
    if (!$posts_result) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    date_default_timezone_set("Asia/Kolkata");
    $today = new DateTime();
    $post_data = '';

    while ($data = $posts_result->fetch_object()) {
        $liked = $data->liked_by_user ? 'liked' : '';
        $total_comments = $data->total_comments == 0 ? '' : $data->total_comments;
        $total_likes = $data->total_likes == 0 ? '' : $data->total_likes;

        // Time formatting
        $post_date = new DateTime($data->created_at);
        $diff = $post_date->diff($today);
        $title = $post_date->format('h:i A - M j, Y');

        if ($diff->format('%i') < 1) {
            $print = $diff->format('%s') . 's';
        } elseif ($diff->format('%h') < 1) {
            $print = $diff->format('%i') . 'm';
        } elseif ($diff->format('%d') == 0) {
            $print = $diff->format('%h') . 'h';
        } elseif ($diff->format('%y') == 0) {
            $print = $post_date->format('M j');
        } else {
            $print = $post_date->format('M j Y');
        }

        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic : 'images/profile_pic.png';
        $post_media = $data->media ? "<div class='post-img'><img src='posts/{$data->media}' alt='Post Image'></div>" : '';
        $post = "";
        if ($post_media != "") {
            $post .= "<div class='post-img'>
                        <img src='posts/$data->media' alt='Post Image'>
                    </div>";
        }

        $post_data .= "<div class='user-post'>
            <div class='post-user-info' onclick='show_user(`$data->username`)'>
                <img src='$profile' alt='Post' height='40px' style='border-radius: 50%'>
            </div>
            <div class='postuser-name'>
                <p onclick='show_user(`$data->username`)'>
                    <span class='post-name'>{$data->name}</span>
                    <span class='post-username'>@{$data->username}</span>
                    <span class='time' title='$title'>· $print</span>
                </p>
                <div class='for_posts' onclick='post_details(`$data->id`)'>
                    <p class='post-content'>$data->content</p>
                    $post
                </div>
                <p class='icons'>
                    <span class='comment-icon open_comment_modal_foryou' data-post-id='{$data->id}'>
                        <img src='images/chat.png' height='17px' title='Reply'>
                    </span>
                    <span class='comment-count'>{$total_comments}</span>
                    <span class='like-icon' data-post-id='{$data->id}'>
                        <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                    </span>
                    <span class='like'>{$total_likes}</span>
                </p>
            </div>
        </div>";
    }

    echo $post_data;
}


//---------------------Search User-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'search') {
    $search = $_POST['search'];
    $username = $_SESSION['username'];
    $sel_footer = "SELECT * FROM twitter_users  WHERE (username LIKE '%$search%' OR name LIKE '%$search%') AND username != '$username' ";
    $run_footer = $conn->query($sel_footer);
    $search = "";
    while ($data = $run_footer->fetch_object()) {
        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic . '' : 'images/profile_pic.png';

        $search .= "<div class='search_user' onclick='show_user(`$data->username`)'>
                        <div class='post-user-info' style='margin-top: 10px'>
                            <img src=$profile alt='Post' height='40px' style='border-radius: 50%'>
                        </div>
                        <div class='serach_data' style='margin-top: 10px'>
                            <p>
                                <span class='post-name'>$data->name</span><br>
                                <span class='post-username'>@$data->username</span>
                            </p>
                        </div>
                    </div>";
    }
    echo $search;
}
//---------------------Show Following-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'show_following') {
    $username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
    $current_user = $_SESSION['username'];

    // Fetch ID of profile owner
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $dataa = $run->fetch_object();
    $id = $dataa->id;

    // Fetch ID of logged-in user
    $current_user_query = "SELECT id FROM twitter_users WHERE username = '$current_user'";
    $current_user_run = $conn->query($current_user_query);
    if (!$current_user_run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $current_user_data = $current_user_run->fetch_object();
    $current_user_id = $current_user_data->id;

    // Fetch users that this profile is following
    $sel_footer = "SELECT twitter_users.* FROM twitter_users 
                   JOIN twitter_followers ON twitter_users.id = twitter_followers.following_id 
                   WHERE twitter_followers.follower_id = '$id'";
    $run_footer = $conn->query($sel_footer);
    if (!$run_footer) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $search = "";
    while ($data = $run_footer->fetch_object()) {
        $following_id = $data->id;
        $name = $data->username == $current_user ? 'You' : $data->username;
        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic : 'images/profile_pic.png';

        // Check if logged-in user follows this "following" user
        $check_follow_query = "SELECT * FROM twitter_followers 
                               WHERE follower_id = '$current_user_id' AND following_id = '$following_id'";
        $check_follow_result = $conn->query($check_follow_query);

        $button_text = "";
        if ($following_id != $current_user_id) {
            if ($check_follow_result && $check_follow_result->num_rows > 0) {
                $button_text = "<button class='follow-btn  following-btn'  data-other_user='{$data->username}'>Following</button>";
            } else {
                $button_text = "<button class='follow-btn follow-back-btn'  data-other_user='{$data->username}'>Follow Back</button>";
            }
        }

        $search .= "<div class='search_user'>
                        <div class='post-user-info' style='margin-top: 10px; width :10%' onclick='show_user(`$data->username`)'>
                            <img src='$profile' alt='Post' height='40px' style='border-radius: 50%'>
                        </div>
                        <div class='serach_data' style='margin-top: 10px; width: 55%' onclick='show_user(`$data->username`)'>
                            <p>
                                <span class='post-name'>$name</span><br>
                                <span class='post-username'>@$data->username</span>
                            </p>
                        </div>
                        <div class='follow-action' style='width: 20%'>
                            $button_text
                        </div>
                    </div>";
    }

    echo $search;
}



//---------------------Show Followers-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'show_followers') {
    $username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
    $current_user = $_SESSION['username'];

    // Fetch user ID
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $dataa = $run->fetch_object();
    $id = $dataa->id;

    // Fetch logged-in user ID
    $fetch_current_user_id_query = "SELECT id FROM twitter_users WHERE username = '$current_user'";
    $current_user_run = $conn->query($fetch_current_user_id_query);
    if (!$current_user_run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $current_user_data = $current_user_run->fetch_object();
    $current_user_id = $current_user_data->id;

    // Fetch followers of the target user
    $sel_footer = "SELECT twitter_users.* FROM twitter_users 
                    JOIN twitter_followers ON twitter_users.id = twitter_followers.follower_id 
                    WHERE twitter_followers.following_id = '$id'";
    $run_footer = $conn->query($sel_footer);
    if (!$run_footer) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $search = "";
    while ($data = $run_footer->fetch_object()) {
        $follower_id = $data->id;
        $name = ($data->username == $current_user) ? 'You' : $data->username;
        $profile = $data->profile_pic ? 'profile_pic/' . $data->profile_pic : 'images/profile_pic.png';

        // Check if logged-in user follows this follower
        $check_follow_query = "SELECT * FROM twitter_followers 
                               WHERE follower_id = '$current_user_id' AND following_id = '$follower_id'";
        $follow_check_result = $conn->query($check_follow_query);

        $button_text = "";
        if ($follower_id != $current_user_id) { // Don't show button for self
            if ($follow_check_result && $follow_check_result->num_rows > 0) {
                $button_text = "<button class='follow-btn following-btn'  data-other_user='{$data->username}'>Following</button>";
            } else {
                $button_text = "<button class='follow-btn follow-back-btn'  data-other_user='{$data->username}'>Follow Back</button>";
            }
        }

        $search .= "<div class='search_user'>
                        <div class='post-user-info' style='margin-top: 10px; width: 10%;' onclick='show_user(`$data->username`)'>
                            <img src='$profile' alt='Post' height='40px' style='border-radius: 50%'>
                        </div>
                        <div class='serach_data' style='margin-top: 10px; width: 55%;' onclick='show_user(`$data->username`)' >
                            <p>
                                <span class='post-name'>$name</span><br>
                                <span class='post-username'>@$data->username</span>
                            </p>
                        </div>
                        <div class='follow-action' style='width: 20%%;'>
                            $button_text
                        </div>
                    </div>";
    }

    echo $search;
}



//---------------------Show Comments-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'show_comments') {
    $username = $_SESSION['username'];
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $dataa = $run->fetch_object();
    $id = $dataa->id;

    // Fetch all comments on posts created by the logged-in user
    $sel_footer = "SELECT c.comment, 
                        c.id as comment_id, 
                        c.post_id,
                        c.user_id as commentator_id,
                        p.content, 
                        p.media,
                        p.user_id as post_owner_id,
                        u1.name as commentator_name, 
                        u1.username as commentator_username, 
                        u1.profile_pic as commentator_profile_pic,
                        u2.name as post_owner_name,
                        u2.username as post_owner_username,
                        u2.profile_pic as post_owner_profile_pic
                    FROM twitter_comments c
                    JOIN twitter_posts p ON c.post_id = p.id
                    JOIN twitter_users u1 ON c.user_id = u1.id
                    JOIN twitter_users u2 ON p.user_id = u2.id
                    WHERE p.user_id = '$id'
                    ORDER BY c.id DESC";

    $run_footer = $conn->query($sel_footer);
    if (!$run_footer) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }

    $search = "";
    while ($data = $run_footer->fetch_object()) {
        $post_owner_profile = $data->post_owner_profile_pic ? 'profile_pic/' . $data->post_owner_profile_pic : 'images/profile_pic.png';
        $commentator_profile = $data->commentator_profile_pic ? 'profile_pic/' . $data->commentator_profile_pic : 'images/profile_pic.png';
        $media = $data->media ? "<img src='posts/$data->media' height='100px' class='comment_img'>" : "";

        $search .= "<div class='c_user_data'>
                        <div class='u_user_img' onclick='show_user(`$data->post_owner_username`)'>
                            <img src=$post_owner_profile alt='' height='40px' style='border-radius: 50%;'>
                        </div>
                        <div class='c_usernames'>
                            <p>
                                <span class='c_name' onclick='show_user(`$data->post_owner_username`)'>$data->post_owner_name</span>
                                <span class='c_username' onclick='show_user(`$data->post_owner_username`)'>@$data->post_owner_username</span>
                                <span class='post-delete-icon'>
                                <i class='fa-solid fa-trash text-danger' onclick='delete_comment($data->comment_id)'></i>
                            </span>
                            </p>
                        </div>
                    </div>
                    <div class='c_user_post'>
                        <p>$data->content</p>
                        <div class='comment_media'>$media</div>
                    </div>
                   
                    <div class='c_user_data' onclick='show_user(`$data->commentator_username`)'>
                        <div class='u_user_img'>
                            <img src=$commentator_profile alt='' height='40px' style='border-radius: 50%;'>
                        </div>
                        <div class='c_usernames'>
                            <p>
                                <span class='c_name'>$data->commentator_name</span>
                                <span class='c_username'>@$data->commentator_username</span><br>
                                <span>$data->comment</span>
                            </p>
                        </div>
                    </div>";
    }
    echo $search;
}


//---------------------Show Post Details-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'post_details') {
    $post_id = $_POST['id'];
    $username = $_SESSION['username'];
    $fetch_id_query = "SELECT * FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "User fetch error: " . $conn->error;
        exit;
    }
    $user = $run->fetch_object();
    $user_id = $user->id;

    $post_query = "SELECT 
                        p.id, p.content, p.media, p.created_at, p.user_id AS post_user_id,
                        u.name AS post_owner_name, u.username AS post_owner_username, u.profile_pic AS post_owner_profile
                    FROM twitter_posts p
                    JOIN twitter_users u ON p.user_id = u.id
                    WHERE p.id = '$post_id'
                    LIMIT 1";

    $post_result = $conn->query($post_query);
    if (!$post_result || $post_result->num_rows == 0) {
        echo "Post not found";
        exit;
    }

    $post = $post_result->fetch_object();
    $today = new DateTime();
    date_default_timezone_set("Asia/Kolkata");
    $post_date = new DateTime($post->created_at);
    $diff = $post_date->diff($today);
    $title = $post_date->format('h:i A - M j, Y');
    if ($diff->format('%i') < 1)
        $print = $diff->format('%s') . 's';
    elseif ($diff->format('%h') < 1)
        $print = $diff->format('%i') . 'm';
    elseif ($diff->format('%d') == 0)
        $print = $diff->format('%h') . 'h';
    elseif ($diff->format('%y') == 0)
        $print = $post_date->format('M j');
    else
        $print = $post_date->format('M j Y');

    $profile_pic = $post->post_owner_profile ? 'profile_pic/' . $post->post_owner_profile : 'images/profile_pic.png';
    $current_user_profile = $user->profile_pic ? 'profile_pic/' . $user->profile_pic : 'images/profile_pic.png';
    $media = $post->media ? "<img src='posts/$post->media' height='100px' class='comment_img'>" : "";

    // Total post likes
    $like_q = "SELECT COUNT(*) AS total_likes FROM twitter_likes WHERE liked_id = $post->id AND likeable_type = 'post'";
    $likes = $conn->query($like_q)->fetch_assoc();
    $total_likes = $likes['total_likes'] ?: '';

    // Check if already liked 
    $check_like = "SELECT * FROM twitter_likes WHERE user_id = $user_id AND liked_id = $post->id AND likeable_type = 'post'";
    $liked = $conn->query($check_like)->num_rows > 0 ? 'liked' : '';

    // Total comments
    $comment_q = "SELECT COUNT(*) AS total_comments FROM twitter_comments WHERE post_id = $post->id";
    $comments = $conn->query($comment_q)->fetch_assoc();
    $total_comments = $comments['total_comments'] ?: '';

    $html = "<div class='mydiv'>
                <div style='display: flex;'>
                    <div class='post-user-info'>
                        <img src='$profile_pic' alt='Post' height='40px' style='border-radius: 50%'>
                    </div>
                    <div>
                        <p style='margin-top: 10px;'>
                            <span class='name_d'>$post->post_owner_name </span>
                            <span class='username_d'>@$post->post_owner_username</span>
                            <span class='time' title='$title'>· $print</span>
                        </p>
                        <p class='post-content'>$post->content</p>
                        <div class='comment_media'>$media</div>
                    </div>
                </div>
                <div class='post_details'>
                    <p class='icons'>
                        <span class='comment-icon open_modal_comment' data-post-id='{$post->id}' data-comment-id='{$post->id}'>
                            <img src='images/chat.png' height='17px' title='Reply'>
                        </span>
                        <span class='comment-count'>$total_comments</span>
                        <span class='like-icon' data-post-id='{$post->id}'>
                            <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                        </span>
                        <span class='like'>$total_likes</span>
                    </p>
                </div>
            </div>
            <div>
                <form action='' id='comment_form_p'>
                    <input type='hidden' id='a_id' value='0'>
                    
                    <input type='hidden' id='b_username' value='0'>
                    <div class='parent_div'>
                        <div class='comment_profile_pic'>
                            <img src='$current_user_profile' alt='' height='40px' style='border-radius: 50%;' class='profile_pics'>
                        </div>
                        <div>
                            <input type='text' name='comment_input_foryou' id='comment_input_p' placeholder='Post your reply' maxlength='500'>
                            <span class='comment_span_p'>500</span>
                            <p class='comment-err-msg-p error'></p>
                            <p class='comment_btn_p' data-post-id='{$post->id}'>Reply</p>
                        </div>
                    </div>
                </form>
            </div>";

    // ================= Show all comments of this post ==================
    $sel_comments = "SELECT c.comment, c.created_at, c.id AS comment_id, c.user_id,
                            u.name, u.username, u.profile_pic
                     FROM twitter_comments c
                     JOIN twitter_users u ON c.user_id = u.id
                     WHERE c.post_id = '$post_id'
                     ORDER BY c.id DESC";
    $comments_result = $conn->query($sel_comments);

    while ($comment = $comments_result->fetch_object()) {
        $comment_date = new DateTime($comment->created_at);
        $diff = $comment_date->diff($today);
        if ($diff->format('%i') < 1)
            $print = $diff->format('%s') . 's';
        elseif ($diff->format('%h') < 1)
            $print = $diff->format('%i') . 'm';
        elseif ($diff->format('%d') == 0)
            $print = $diff->format('%h') . 'h';
        elseif ($diff->format('%y') == 0)
            $print = $comment_date->format('M j');
        else
            $print = $comment_date->format('M j Y');

        $c_pic = $comment->profile_pic ? 'profile_pic/' . $comment->profile_pic : 'images/profile_pic.png';

        // comment like count
        $query = "SELECT COUNT(*) AS total_likes FROM twitter_likes WHERE liked_id = $comment->comment_id AND likeable_type = 'comment'";
        $likes = $conn->query($query)->fetch_assoc();
        $total_likes = $likes['total_likes'] ?: '';

        $check_like = "SELECT * FROM twitter_likes WHERE user_id = $user_id AND liked_id = $comment->comment_id AND likeable_type = 'comment'";
        $liked = $conn->query($check_like)->num_rows > 0 ? 'liked' : '';

        // replies count on this comment
        $query = "SELECT COUNT(*) AS total_comments FROM twitter_replies WHERE comment_id = $comment->comment_id";
        $replies = $conn->query($query)->fetch_assoc();
        $total_replies = $replies['total_comments'] ?: '';

        $html .= "<div class='post_comment' style='display: flex;'>
                    <div class='post-user-info' onclick='show_user(`$comment->username`)'>
                        <img src='$c_pic' alt='' height='40px' style='border-radius: 50%;'>
                    </div>
                    <div>
                        <p style='margin-top: 10px;' onclick='show_user(`$comment->username`)'>
                            <span class='name_d'>$comment->name </span>
                            <span class='username_d'>@$comment->username</span>
                            <span class='time'>· $print</span>
                        </p>
                        <div onclick='show_comment(`$comment->comment_id`)'>
                            <p class='comment_content'>$comment->comment</p>
                        </div>
                        <div class=''>
                            <p class='icons'>
                                <span class='comment-icon open_modal_recomment' data-comment-id='{$comment->comment_id}'
                                 data-post-id='{$post->id}' data-username='{$post->post_owner_username}'>
                                    <img src='images/chat.png' height='17px' title='Reply'>
                                </span>
                                <span class='comment-count'>$total_replies</span>
                                <span class='comment-like-icon' data-comment-id='{$comment->comment_id}' data-post-id='{$post->id}'>
                                    <i class='heart-icon fa fa-heart $liked' title='Like'></i>
                                </span>
                                <span class='like'>$total_likes</span>
                            </p>
                        </div>
                    </div>
                </div>";
    }

    echo $html;
}

//---------------------Show Comment Details-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'comment_details') {
    $comment_id = $_POST['id'];
    $username = $_SESSION['username'];
    $fetch_id_query = "SELECT * FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "User fetch error: " . $conn->error;
        exit;
    }
    $user = $run->fetch_object();
    $user_id = $user->id;

    $comment_query = "SELECT 
                        c.id, c.comment, c.created_at, c.user_id AS comment_user_id,
                        u.name AS comment_owner_name, u.username AS comment_owner_username, u.profile_pic AS comment_owner_profile
                    FROM twitter_comments c
                    JOIN twitter_users u ON c.user_id = u.id
                    WHERE c.id = '$comment_id'
                    LIMIT 1";

    $comment_result = $conn->query($comment_query);
    if (!$comment_result || $comment_result->num_rows == 0) {
        echo "Comment not found";
        exit;
    }
   
    $show = '';
    $comment = $comment_result->fetch_object();
     // Total post likes
    $like_q = "SELECT COUNT(*) AS total_likes FROM twitter_likes WHERE liked_id = $comment_id AND likeable_type = 'comment'";
    $likes = $conn->query($like_q)->fetch_assoc();
    $total_likes = $likes['total_likes'] ?: '';

    // Check if already liked 
    $check_like = "SELECT * FROM twitter_likes WHERE user_id = $comment->comment_user_id AND liked_id = $comment_id AND likeable_type = 'comment'";
    $liked = $conn->query($check_like)->num_rows > 0 ? 'liked' : '';

    // Total comments
    $comment_q = "SELECT COUNT(*) AS total_comments FROM twitter_comments WHERE post_id = $post->id";
    $comments = $conn->query($comment_q)->fetch_assoc();
    $total_comments = $comments['total_comments'] ?: '';
    $show .= "    <div class='mydiv'>
            <div style='display: flex;'>
                <div class='post-user-info'>
                    <img src='images/profile_pic.png' alt='Post' height='40px' style='border-radius: 50%'>
                </div>
                <div>
                    <p style='margin-top: 10px;'>
                        <span class='name_d'>Ravi Mali </span>
                        <span class='username_d'>@ravimali</span>
                        <span class='time' title=''>· 3h</span>
                    </p>
                    <p class='post-content'>Good Morning</p>
                    <div class='comment_media'></div>
                </div>
            </div>
            <div class='post_details'>
                <p class='icons'>
                    <span class='comment-icon open_modal_comment' data-post-id=''>
                        <img src='images/chat.png' height='17px' title='Reply'>
                    </span>
                    <span class='comment-count'>12</span>
                    <span class='like-icon'>
                        <i class='heart-icon fa fa-heart ' title='Like'></i>
                    </span>
                    <span class='like'>4</span>
                </p>
            </div>
        </div>
        <div>
            <form action='' id='replyy_form'>
                <div class='parent_div'>
                    <div class='profile_profile_pic'>
                        <img src='images/profile_pic.png' alt='' height='40px' style='border-radius: 50%;'
                            class='profile_pics'>
                    </div>
                    <div>
                        <input type='text' name='comment_input_foryou' id='replyy_input_p' placeholder='Post your reply'
                            maxlength='500'>
                        <span class='replyy_span'>500</span>
                        <p class='replyy-err-msg error'></p>
                        <p class='replyy_btn'>Reply</p>
                    </div>
                </div>
            </form>
        </div>";
        echo $show;
}



//---------------------Follow Back -------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'follow_back') {
    $username = isset($_POST['other_user']) ? $_POST['other_user'] : $_SESSION['username'];
    $current_user = $_SESSION['username'];

    // Fetch user ID
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $dataa = $run->fetch_object();
    $id = $dataa->id;

    // Fetch logged-in user ID
    $fetch_current_user_id_query = "SELECT id FROM twitter_users WHERE username = '$current_user'";
    $current_user_run = $conn->query($fetch_current_user_id_query);
    if (!$current_user_run) {
        echo "Data fetch error: " . $conn->error;
        exit;
    }
    $current_user_data = $current_user_run->fetch_object();
    $current_user_id = $current_user_data->id;


    // Check if logged-in user follows this follower
    $check_follow_query = "SELECT * FROM twitter_followers 
                               WHERE follower_id = '$id' AND following_id = '$current_user_id'";
    $follow_check_result = $conn->query($check_follow_query);
    $value = '';
    if ($follow_check_result && $follow_check_result->num_rows > 0) {
        $value = 1;
    } else {
        $value = 0;
    }
    echo $value;
}
