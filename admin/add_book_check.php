<?php
include('./admin_head.php');

$bookTitle = $_POST['bookTitle'];
$Author = $_POST['Author'];
$Publisher = $_POST['Publisher'];
$Language = $_POST['Language'];
$Category = $_POST['Category'];

// echo "<script> console.log('$Category','$Language','$Publisher','$Author','$bookTitle')</script>";


$sql = "INSERT INTO books (Book_title, Author, Publisher, Language, Category) 
VALUES ( '$bookTitle', '$Author', '$Publisher', '$Language', '$Category')";



$res = mysqli_query($conn, $sql);

if (!$res) {
  alert('Please try again', 'add_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}
alert('added successfully', 'add_book.php');
echo "新记录插入成功";
