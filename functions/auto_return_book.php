<?php
include("../conn.php");


$create_datetime = date("Y-m-d H:i:s");

$sql = "UPDATE book_status
SET Member_id=null, Status='Available', Applied_date='$create_datetime'
WHERE Book_id=$bookId ";
