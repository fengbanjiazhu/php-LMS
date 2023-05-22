<?php
include('./admin_head.php');

// book info
$bookId = $_POST['bookId'];

// delete book from database
$sql = "DELETE FROM books
WHERE Book_id=$bookId";

$res = mysqli_query($conn, $sql);

if (!$res) {
  alert('Something went wrong, Please try again later', 'edit_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// update book status to deleted
$create_datetime = date("Y-m-d H:i:s");

$sql = "UPDATE book_status
SET Status='Deleted', Applied_date='$create_datetime'
WHERE Book_id=$bookId ";

$res = mysqli_query($conn, $sql);
if (!$res) {
  alert('Book status error, please contact admin', 'edit_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}

alert('successful deleted book!', '../admin/edit_book.php');
