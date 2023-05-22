<?php
include("../conn.php");

session_start();

if (!isset($_SESSION['email'])) {
  alert('Please login first', '../login.php');
}
