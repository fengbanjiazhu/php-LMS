<?php
include("../conn.php");

$current_datetime = date("Y-m-d H:i:s");

$sql = "UPDATE book_status
SET Member_id=null, Status='Available', Applied_date='$current_datetime'
WHERE Applied_date <= now() - INTERVAL 7 day";

mysqli_query($conn, $sql);



$sql = "SELECT * FROM book_status";
$res = mysqli_query($conn, $sql);

$status = array();
while ($row = mysqli_fetch_assoc($res)) {
  $bookStatus = [
    'bookId' => $row["Book_id"],
    'memberId' => $row["Member_id"],
    'Status' => $row["Status"],
    'appliedDate' => $row["Applied_date"],
  ];
  $status[] = $bookStatus;
}
$json = json_encode($status);
// $first_name = json_encode($_SESSION['firstName']);

echo "<script>const bookStatusData = $json;</script>";
