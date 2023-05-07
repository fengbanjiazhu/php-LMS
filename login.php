<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<?php
include('conn.php');
?>

<body>

  <form class="form" action="./login_check.php" method="post" id="login">
    <h1 class="login-title">Login</h1>
    <input type="email" class="login-input" name="email" placeholder="Email" autofocus>
    <input type="password" class="login-input" name="password" placeholder="Password">
    <input type="submit" value="Login" name="submit" class="login-button">
    <p class="link">Don't have an account? <a href="./signup.php">sign up Now</a></p>
  </form>

</body>

</html>