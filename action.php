<?php
$conn = new mysqli('localhost', 'root', '', 'project');
session_start();

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
?>