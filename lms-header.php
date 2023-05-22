<?php
include("conn.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Borrow a Book</title>
  <link rel="stylesheet" href="./layui/css/layui.css">
  <script src="./layui/layui.js"></script>
  <script src="./jquery.js"></script>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <div class="lms-header">
    <ul class="layui-nav layui-bg-blue layui-nav-child-c" lay-bar="disabled">
      <li class="layui-nav-item"><a href="index.php">Home</a></li>
      <li class="layui-nav-item"><a href="book_list.php">Books</a></li>
      <?php
      if ($_SESSION['member_type'] == 'Admin') {
        echo "<li class='layui-nav-item'><a href='./admin/index.php'>Admin page</a></li>";
      }
      ?>

      <?php
      if ($_SESSION['firstName']) {
        echo "<li class='layui-nav-item'><a href='./add_book.php'>Browse new book</a></li>";
        echo "<li class='layui-nav-item'><a href='./my_books.php'>My books</a></li>";
        echo "<li class='layui-nav-item'><a href='./functions/logout.php'>logout</a></li>";
      } else {
        echo "<li class='layui-nav-item'><a href='./login.php'>login</a></li>";
        echo "<li class='layui-nav-item'><a href='./signup.php'>sign up</a></li>";
      }
      ?>

    </ul>
  </div>
</body>

</html>