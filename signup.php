<?php
include("lms-header.php");
?>

<div class="main-container">
  <form class="layui-form" action="signup_check.php" method="post">
    <div class="demo-reg-container">
      <h1>Sign up</h1>
      <div class="layui-form-item">
        <input type="text" name="username" value="" lay-verify="required" placeholder="Username" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-item">
        <input type="text" name="firstName" value="" lay-verify="required" placeholder="First Name" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-item">
        <input type="text" name="lastName" value="" lay-verify="required" placeholder="Last Name" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-item">
        <input id="regEmail" type="email" name="email" value="" lay-verify="required" placeholder="Email Address" autocomplete="off" class="layui-input" onchange="checkAvailability()">
      </div>
      <div class="layui-form-item">
        <input type="password" name="password" value="" lay-verify="required" placeholder="password" autocomplete="off" class="layui-input" lay-affix="eye">
      </div>
      <div class="layui-form-item">
        <input type="password" name="passwordConfirm" value="" lay-verify="required" placeholder="Password Confirm" autocomplete="off" class="layui-input" lay-affix="eye">
      </div>

      <input type="submit" name="submit" value="Register" class="layui-btn layui-btn-fluid layui-bg-blue">
      <p class="link"><a href="login.php">Click to Login</a></p>
    </div>
  </form>
</div>
<?php
include('./footer.php');
?>