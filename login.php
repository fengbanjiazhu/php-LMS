<?php
include("lms-header.php");
?>

<div class="main-container">
  <form class="layui-form" action="./functions/login_check.php" method="post" id="login">
    <h1 class="login-title">Login</h1>
    <div class="demo-login-container">
      <div class="layui-form-item">
        <div class="layui-input-wrap">
          <div class="layui-input-prefix">
            <i class="layui-icon layui-icon-username"></i>
          </div>
          <input type="email" name="email" value="" lay-verify="required" placeholder="Email" lay-reqtext="Please enter email" class="layui-input" lay-affix="clear">
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-input-wrap">
          <div class="layui-input-prefix">
            <i class="layui-icon layui-icon-password"></i>
          </div>
          <input type="password" name="password" value="" lay-verify="required" placeholder="Password" lay-reqtext="Please enter password" class="layui-input" lay-affix="eye">
        </div>
      </div>

      <input type="submit" value="Login" name="submit" class="layui-btn layui-btn-fluid layui-bg-blue">
      <p class="link">Don't have an account? <a href="./signup.php">sign up Now</a></p>
    </div>
  </form>
</div>

<?php
include('./footer.php');
?>