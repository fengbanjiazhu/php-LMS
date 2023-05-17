<?php
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
$first_name = json_encode($_SESSION['firstName']);

echo "<script>const bookData = $json;</script>";
echo "<script>const firstNameData = $first_name;</script>";
