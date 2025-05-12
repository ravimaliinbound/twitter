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
    $sel_footer = "SELECT * FROM twitter_users WHERE username != '$username' LiMIT 0, 3";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {
        $count = $run_footer->num_rows;
        $arr_footer .=
            " <div style = 'display: flex;' class='background'>
                <div class='show-img' style='margin-top: 6px;' href='user_profile.php'  onclick='show_user(`$data->username`)'>
                    <a href='user_profile.php' onclick='show_user(`$data->username`)'>
                        <img src='images/profile_pic.png' height='40px' style='border-radius: 50%'>
                    </a>
                </div>
                <div class='show-to-follow-data' href='user_profile.php'  onclick='show_user(`$data->username`)'>
                    <p>
                        <a class='show-to-follow-name'>$data->name</a><br>
                        <a class='show-to-follow-username'>@$data->username</a>
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

//---------------------Who to follow-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'show_more') {
    $username = $_SESSION['username'];
    $sel_footer = "SELECT * FROM twitter_users WHERE username != '$username' LIMIT 0,50";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {
        $arr_footer .=
            " <div style = 'display: flex;' class= 'background-follow'>
                <div class='showw-img' style='margin-top: 6px;'   onclick='show_user(`$data->username`)'>
                    <a href='user_profile.php'><img src='images/profile_pic.png' 
                        height='40px' width= '40px' style='border-radius: 50%'>
                    </a>
                </div>
                <div class='show-to-followw-data' style='width:50%'   onclick='show_user(`$data->username`)'>
                    <p>
                        <a href='user_profile.php' class='show-to-followw-name'>$data->name</a><br>
                        <a href='user_profile.php' class='show-to-followw-username' >@$data->username</a><br>
                        <a href='user_profile.php' class='show-to-followw-username' >$data->bio</a>
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
          WHERE user_id = $user_id 
          AND post_id = $post_id";

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
        if ($data->media != "") {

            $post_data .= "<div class='user-post'>
                            <div class='post-user-info'>
                                <img src='profile_pic/$data->profile_pic' alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
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
                            <div class='post-user-info'>
                                <img src='profile_pic/$data->profile_pic' alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
                                    <span class='post-name'>$data->name </span>
                                    <span class='post-username'>@$data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                    <span class='post-delete-icon'>
                                        <i class='fa-solid fa-ellipsis' onclick='before_delete($data->id)'></i>
                                    </span>
                                </p>
                                <p class='post-content'>$data->content</p>
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


//----------------------- Like Post------------------//

if (isset($_POST['action']) && $_POST['action'] == 'like') {

    $username = $_SESSION['username'];

    // Step 1: Get user ID
    $fetch_id_query = "SELECT id FROM twitter_users WHERE username = '$username'";
    $run = $conn->query($fetch_id_query);
    if (!$run) {
        echo "User fetch error: " . $conn->error;
        exit;
    }

    $data = $run->fetch_object();
    $id = $data->id;
    $post_id = $_POST['post_id'];
    $type = $_POST['type'];

    // Step 2: Check if already liked
    $sel = "SELECT * FROM twitter_likes WHERE user_id = $id AND liked_id = $post_id";
    $res = $conn->query($sel);
    if (!$res) {
        echo "Like check error: " . $conn->error;
        exit;
    }

    if ($res->num_rows > 0) {
        // Unlike
        $delete = "DELETE FROM twitter_likes WHERE user_id = $id AND liked_id = $post_id";
        $result = $conn->query($delete);
        if (!$result) {
            echo "Delete error: " . $conn->error;
        } else {
            echo "Disliked";
        }
    } else {
        // Like
        $insert = "INSERT INTO twitter_likes (user_id, liked_id, likeable_type) VALUES ($id, $post_id, '$type')";
        $result = $conn->query($insert);
        if (!$result) {
            echo "Insert error: " . $conn->error;
        } else {
            echo "Liked";
        }
    }
}


/*----------------------------- Comment Insert-----------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'insert_comment') {
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $username = $_SESSION['username'];
    $u_query = "SELECT * FROM twitter_users WHERE username = '$username'";
    $u_result = $conn->query($u_query);
    $u_data = $u_result->fetch_object();
    $user_id = $u_data->id;


    $insert = "INSERT INTO twitter_comments (user_id, post_id, comment) VALUES ($user_id, $post_id, '$comment')";
    $result = $conn->query($insert);
    if (!$result) {
        echo "Insert error: " . $conn->error;
    } else {
        echo "Commented";
    }
}

/*----------------------------- Comment Insert-----------------------*/
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
                WHERE user_id = $user_id 
                AND liked_id = $post_id 
                AND likeable_type = 'post'";

        $check_result = $conn->query($check_query);

        $already_liked = ($check_result->num_rows > 0);
        $liked = $already_liked ? 'liked' : '';

        /*--------------- Total Comments---------------*/
        $post_id = $data->id;
        $query = "SELECT COUNT(*) AS total_comments 
          FROM twitter_comments 
          WHERE user_id = $user_id 
          AND post_id = $post_id";

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
        if ($data->media != "") {
            $post_data .= "<div class='user-post'>
                            <div class='post-user-info'>
                                <img src='profile_pic/$user_data->profile_pic' alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
                                    <span class='post-name'>$user_data->name </span>
                                    <span class='post-username'>@$user_data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                </p>
                                <p class='post-content'>$data->content</p>
                                <div class='post-img'>
                                    <img src='posts/$data->media' alt='Post Image'>
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
                            <div class='post-user-info'>
                                <img src='profile_pic/$user_data->profile_pic' alt='Post' height='40px' style='border-radius: 50%'>
                            </div>
                            <div class='postuser-name'>
                                <p>
                                    <input type='hidden' id='commented' value='0'>
                                    <input type='hidden' id='hidden' value='0'>
                                    <span class='post-name'>$user_data->name </span>
                                    <span class='post-username'>@$user_data->username</span>
                                    <span class='time' title='$title'>· $print</span>
                                </p>
                                <p class='post-content'>$data->content</p>
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
    echo $post_data;
}