<?php
include("lms-header.php");
include("./loginAuth.php");

$memberId = $_SESSION['member_id'];

$create_datetime = date("Y-m-d H:i:s");

// $sql = "UPDATE book_status
// SET ,Status='On-loan', Applied_date='$create_datetime'
// WHERE Book_id=$bookId ";

$res = mysqli_query($conn, $sql);
if (!$res) {
  alert('Book status error, please contact admin', 'edit_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}

alert('successful deleted book!', '../admin/edit_book.php');
