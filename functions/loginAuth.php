<?php
include("../conn.php");

session_start();

if (!isset($_SESSION['email'])) {
  alert('Please login first', '../PHP-library/login.php');
  exit();
};

$memberId = json_encode($_SESSION['member_id']);
echo "<script>const currentUserId = $memberId;</script>";
