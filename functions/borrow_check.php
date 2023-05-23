<?php
include("lms-header.php");
include("./loginAuth.php");

header('Content-Type: application/json');

$memberId = $_SESSION['member_id'];

// 解码接收到的JSON数据
$requestBody = json_decode(file_get_contents('php://input'));
$bookId = $requestBody->bookId;
// $bookId = $_POST['bookId'];


$response = array('message' => "the book is: $bookId");
echo json_encode($response);


// $create_datetime = date("Y-m-d H:i:s");

// $sql = "UPDATE book_status
// SET Member_id='$memberId',Status='On-loan', Applied_date='$create_datetime'
// WHERE Book_id=$bookId ";

// $res = mysqli_query($conn, $sql);
// if (!$res) {
//   alert('Book status error, please contact admin', 'edit_book.php');
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// alert('successful borrow a book!', '../my_books.php');
