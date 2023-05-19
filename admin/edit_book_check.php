<?php
include('./admin_head.php');



// book info
$bookId = $_POST['bookId'];
$bookTitle = $_POST['bookTitle'];
$Author = $_POST['Author'];
$Publisher = $_POST['Publisher'];
$Language = $_POST['Language'];
$Category = $_POST['Category'];

// echo "<script>layer.alert('$bookId,$bookTitle')</script>";

$sql = "UPDATE books
SET Book_title='$bookTitle',Author='$Author',Publisher='$Publisher',Language='$Language',Category='$Category'
WHERE Book_id=$bookId ";

$res = mysqli_query($conn, $sql);

if (!$res) {
  alert('Something went wrong, Please try again', 'edit_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}

alert('successful edit book detail!', '../admin/edit_book.php');
