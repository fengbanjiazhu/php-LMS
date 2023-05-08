<?php
include('./conn.php');

$username = $_POST['username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$create_datetime = date("Y-m-d H:i:s");


$sql = "SELECT * FROM users WHERE email = '$email'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    alert('This email is already exist', 'signup.php');
    exit();
}

if (strlen($password) < 6) {
    alert('Password must not less than 6 character', 'signup.php');
    exit();
}
if ($password != $passwordConfirm) {
    alert('The password and confirm are not the same', 'signup.php');
    exit();
}

$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

//insert one

$sql = "INSERT INTO users (username, first_name, last_name, email, password, create_datetime) 
VALUES ( '$username', '$firstName', '$lastName', '$email', '$passwordHashed', '$create_datetime')";



$res = mysqli_query($conn, $sql);

if (!$res) {
    alert('Please try again', 'signup.php');
    echo "Error: " . $sql . "<br>" . $conn->error;
}
alert('registered successfully', 'login.php');
echo "新记录插入成功";
