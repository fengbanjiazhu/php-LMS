<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Sign up</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <form class="form" action="signup_check.php" method="post">
    <h1 class="login-title">Sign up</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" required>
    <input type="text" class="login-input" name="firstName" placeholder="First Name" required>
    <input type="text" class="login-input" name="lastName" placeholder="Last Name" required>
    <input type="email" class="login-input" name="email" placeholder="Email Address" required>
    <input type="password" class="login-input" name="password" placeholder="Password" required>
    <input type="password" class="login-input" name="passwordConfirm" placeholder="Password Confirm" required>
    <input type="submit" name="submit" value="Register" class="login-button">
    <p class="link"><a href="login.php">Click to Login</a></p>
  </form>
</body>

</html>