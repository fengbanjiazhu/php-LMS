<?php
include("lms-header.php");
?>

<div class="main-container">
  <form class="layui-form" lay-filter="signupForm" action="./functions/signup_check.php" method="post">
    <div class="demo-reg-container">
      <h1>Sign up</h1>
      <div class="layui-form-item">
        <input type="text" name="username" value="" required placeholder="Username" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-item">
        <input type="text" name="firstName" value="" required placeholder="First Name" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-item">
        <input type="text" name="lastName" value="" required placeholder="Last Name" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-item">
        <input id="regEmail" type="email" name="email" value="" required placeholder="Email Address" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-form-item">
        <input type="password" name="password" lay-verify="password" value="" required placeholder="Password" autocomplete="off" class="layui-input" lay-affix="eye">
        <div class="layui-form-mid layui-word-aux">Must between 8-15 character, 1 uppercase,</div>
        <div class="layui-form-mid layui-word-aux">1 lowercase and 1 special character </div>
      </div>
      <div class="layui-form-item">
        <input type="password" name="passwordConfirm" value="" required placeholder="Password Confirm" autocomplete="off" class="layui-input" lay-affix="eye">
      </div>

      <button type="submit" name="submit" value="Register" class="layui-btn layui-btn-fluid layui-bg-blue">Sign Up</button>
      <p class="link"><a href="login.php">Click to Login</a></p>
    </div>
  </form>
</div>

<script>
  layui.use(function() {
    var form = layui.form;
    form.on('submit(signupForm)', function(data) {
      const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+!=])[A-Za-z0-9@#$%^&+!=]{8,15}$/;
      var field = layui.form.val("signupForm");

      const {
        password,
        passwordConfirm
      } = field;

      if (!regex.test(password)) {
        alert("Password must between 8-15, at least include 1 uppercase, 1 lowercase, 1 special character")
        return false;
      } else if (password !== passwordConfirm) {
        alert("Password and Password Confirm are not same")
        return false;
      } else {
        return true;
      }
    });
  })
</script>
<?php
include('./footer.php');
?>