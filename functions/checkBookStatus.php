<?php

$current_datetime = date("Y-m-d H:i:s");

// refresh book status where loaned before 21 days ago, set them to available
$sql = "UPDATE book_status
SET Member_id=null, Status='Available', Applied_date='$current_datetime'
WHERE Status='On-loan' AND Applied_date <= now() - INTERVAL 21 day";

mysqli_query($conn, $sql);

// get all book status data
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

// send data to javascript
echo "<script>const bookStatusData = $json;</script>";
