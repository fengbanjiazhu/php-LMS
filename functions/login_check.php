<?php
include('../conn.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$res = mysqli_query($conn, $sql);


// while
if (mysqli_num_rows($res) !== 1) {
  alert('This email is not signed up yet', '../login.php');
}

$row = mysqli_fetch_assoc($res);
$password_hash = $row['password'];
$type = $row['Member_type'];
$firstName = $row['first_name'];
$memberId = $row['$Member_id'];


if (!password_verify($password, $password_hash)) {
  alert('Wrong password, please try again', '../login.php');
}

$_SESSION['email'] = $email;
$_SESSION['firstName'] = $firstName;
$_SESSION['member_type'] = $type;
$_SESSION['member_id'] = $memberId;

if ($type == 'Member') {
  alert('successful logged in!', '../index.php');
}
alert('successful logged in!', '../admin/index.php');
