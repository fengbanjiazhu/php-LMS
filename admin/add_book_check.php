<?php
include('./admin_head.php');



// book info
$bookTitle = $_POST['bookTitle'];
$Author = $_POST['Author'];
$Publisher = $_POST['Publisher'];
$Language = $_POST['Language'];
$Category = $_POST['Category'];

// img info
$sql = "INSERT INTO books (Book_title, Author, Publisher, Language, Category) 
VALUES ( '$bookTitle', '$Author', '$Publisher', '$Language', '$Category')";

$res = mysqli_query($conn, $sql);

if (!$res) {
  alert('Something went wrong, Please try again', 'add_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// save image for book
$book_id =  mysqli_insert_id($conn);
$imgName = "book_$book_id.png";
$tmp = $_FILES['bookCoverImage']['tmp_name'];
$filepath = '../public/images/book-image/';


$tmpFilePath = $_FILES['bookCoverImage']['tmp_name'];
echo "<script>console.log('Temporary file path:','$tmpFilePath')</script>";

if (move_uploaded_file($tmp, $filepath . $imgName)) {
  echo "Successfully Added book";
} else {
  echo "<script>alert('Failed to save image')</script>";
};

// create book status
$create_datetime = date("Y-m-d H:i:s");

$sql = "INSERT INTO book_status ( Book_id,  Applied_date) 
VALUES ( '$book_id', '$create_datetime')";

$res = mysqli_query($conn, $sql);

if (!$res) {
  alert('Fail to create book status, Please contact admin', 'add_book.php');
  echo "Error: " . $sql . "<br>" . $conn->error;
}

alert('added successfully', 'add_book.php');
