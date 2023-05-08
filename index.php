<?php
include("lms-header.php");
session_start();
?>

<body>
  <div class="main-container">
    <?php
    if ($_SESSION['firstName']) {
      $first_name = $_SESSION['firstName'];
      echo "<h1>Welcome! $first_name</h1>";
    } else {
      echo "<h1>Welcome! Login to start borrow a book for free</h1>";
    }
    ?>
  </div>

  <?php
  include('./footer.php');
  ?>
</body>