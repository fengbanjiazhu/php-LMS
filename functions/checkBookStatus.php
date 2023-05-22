<?php
$sql = "SELECT * FROM book_status";
$res = mysqli_query($conn, $sql);

$books = array();
while ($row = mysqli_fetch_assoc($res)) {
  $bookStatus = [
    'bookId' => $row["Book_id"],
    'memberId' => $row["Member_id"],
    'Status' => $row["Status"],
    'appliedDate' => $row["Applied_date"],
  ];
  $books[] = $book;
}
$json = json_encode($books);
// $first_name = json_encode($_SESSION['firstName']);

echo "<script>const bookStatusData = $json;</script>";
// echo "<script>const firstNameData = $first_name;</script>";
