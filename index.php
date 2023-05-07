<?php
include("conn.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Borrow a Book</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <p>Welcome! <?php echo $_SESSION['firstName'] ?></p>
</body>

</html>