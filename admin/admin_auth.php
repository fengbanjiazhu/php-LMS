<?php
include("../conn.php");

session_start();

if (!isset($_SESSION['email'])) {
  alert('Please login first', '../login.php');
}

if ($_SESSION['member_type'] !== 'Admin') {
  alert('Your member type have no access to this page', '../index.php');
}
