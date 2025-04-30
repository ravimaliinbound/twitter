<?php
$conn = new mysqli('localhost', 'root', '', 'project');
session_start();

//----------------Fetch Data For Particular User---------------//
if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $username = $_SESSION['username'];
    $sel_id = "SELECT user_id FROM users WHERE username = '$username'";
    $run_id = $conn->query($sel_id);
    $arr_id = null;
    while ($data = $run_id->fetch_object()) {
        $arr_id = $data->user_id;
    }
    $sel = "SELECT * FROM users WHERE user_id = '$arr_id'";
    $run = $conn->query($sel);

    $data = [];
    $arr = [];
    while ($fetch = $run->fetch_object()) {
        $data = $fetch;
        $arr = array(
            "user_id" => $data->user_id,
            "name" => $data->name,
            "username" => $data->username,
            "email" => $data->email,
            "dob" => $data->dob,
            "joined" => $data->joined
        );
    }
    echo json_encode($arr);
    // echo json_encode([
    //     "user_id" => $data->user_id,
    //     "name" => $data->name,
    //     "username" => $data->username,
    //     "email" => $data->email,
    //     "dob" => $data->dob,
    //     "joined" => $data->joined
    // ]);
    // echo json_encode($data->name);
}


//--------------------- Footer who to follow-------------------------//
if (isset($_POST['action']) && $_POST['action'] == 'footer') {
    $username = $_SESSION['username'];
    $sel_footer = "SELECT * FROM users WHERE username != '$username' LiMIT 0, 3";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {
        $arr_footer .=
            " <div style = 'display: flex;'>
            <div class='show-img' style='margin-top: 6px;'>
            <a href='#'><img src='images/happy.png' height='40px'></a>
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
        </div>
        ";
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
    $joined = date('F Y');
    $insert = "INSERT INTO users (name, username, email, password, dob, joined) VALUES ('$name','$username','$email','$password','$dob', '$joined')";
    $run = $conn->query($insert);
    if ($run) {
        $_SESSION['login'] = 'Login';
        $_SESSION['joined'] = date('F Y');
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
    $image = $_FILES['index-image']['name'];
    $username = $_SESSION['username'];
    echo $username;
    /*-----Insert Code---*/

}



//-----------------Already Exists----------------//

if (isset($_POST['action']) && $_POST['action'] == 'email_check' || $_POST['action'] == 'email_check') {
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email_query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
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

    $sel = "SELECT * FROM users WHERE (email = '$email' OR username = '$email') AND password = '$password'";
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
    $sel_footer = "SELECT * FROM users WHERE username != '$username' LIMIT 0,50";
    $run_footer = $conn->query($sel_footer);
    $arr_footer = "";
    while ($data = $run_footer->fetch_object()) {
        $arr_footer .=
            " <div style = 'display: flex;'>
                <div class='showw-img' style='margin-top: 6px; '>
                    <a href='#'><img src='images/happy.png' height='40px' width= '40px'></a>
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

?>