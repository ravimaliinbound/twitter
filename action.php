<?php
$conn = new mysqli('localhost', 'root', '', 'project');

if (isset($_POST['action']) && $_POST['action'] == 'signup') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : "";

    $insert = "INSERT INTO users (name, username, email, password, dob) VALUES ('$name','$username','$email','$password','$dob')";
    $run = $conn->query($insert);
    if ($run) {
        echo "<p class='text-success border border-success p-2 rounded msg'>Data Inserted Successfully...!</p>";
    } else {
        echo "<p class='text-danger border border-danger p-2 rounded msg'>Something Went Wrong...!</p>";
    }
}
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
?>