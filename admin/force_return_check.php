<?php
include('./admin_head.php');

if (isset($_POST)) {
  $data = file_get_contents('php://input');
  $bookData = json_decode($data, true);
  $bookId = $bookData["bookId"];
};


$create_datetime = date("Y-m-d H:i:s");

$sql = "UPDATE book_status
SET Member_id=null, Status='Available', Applied_date='$create_datetime'
WHERE Book_id=$bookId ";

$res = mysqli_query($conn, $sql);

if (!$res) {
  echo "Failed to return book, please try again later!";

  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "Successful return book!";
