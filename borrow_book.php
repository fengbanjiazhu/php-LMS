<?php
include("lms-header.php");

$sql = "SELECT * FROM books";
$res = mysqli_query($conn, $sql);


$json = json_encode($books);
$first_name = json_encode($_SESSION['firstName']);

echo "<script>const bookData = $json;</script>";
echo "<script>const firstNameData = $first_name;</script>";
?>

<div class="main-container">
  <button type='button' class='layui-btn layui-btn-fluid' onclick=borrowBook()>borrow</button>";

</div>

<script>
  function borrowBook() {}
</script>