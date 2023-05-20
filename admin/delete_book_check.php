<?php
include('./admin_head.php');

// book info
$bookId = $_POST['bookId'];

$sql = "DELETE FROM books
WHERE Book_id=$bookId";

$res = mysqli_query($conn, $sql);

if (!$res) {
  alert('Something went wrong, Please try again later', 'edit_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}

alert('successful deleted book!', '../admin/edit_book.php');
