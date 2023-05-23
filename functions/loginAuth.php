<?php
include("../conn.php");

session_start();

if (!isset($_SESSION['email'])) {
  alert('Please login first', '../login.php');
};

$memberId = json_encode($_SESSION['member_id']);
echo "<script>const currentUserId = $memberId;</script>";
