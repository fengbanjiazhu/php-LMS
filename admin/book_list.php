<?php
include("./admin_head.php");
session_start();

$sql = "SELECT * FROM books";
$res = mysqli_query($conn, $sql);

$books = array();
while ($row = mysqli_fetch_assoc($res)) {
  $book = [
    'id' => $row["Book_id"],
    'title' => $row["Book_title"],
    'Author' => $row["Author"],
    'Publisher' => $row["Publisher"],
    'Language' => $row["Language"],
    'Category' => $row["Category"],
  ];
  $books[] = $book;
}
$json = json_encode($books);
?>

<div class="layui-body">

</div>