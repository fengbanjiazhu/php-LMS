<?php
include("lms-header.php");

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$rows_per_page = 10;
$offset = ($page - 1) * $rows_per_page;

$sql = "SELECT * FROM books";
$res = mysqli_query($conn, $sql);

$first_name = $_SESSION['firstName'];

function renderBtn($boolean)
{
  if ($boolean) {
    echo "<button type='button' class='layui-btn layui-btn-fluid layui-bg-blue'>Borrow</button>";
  } else {
    echo "<button type='button' class='layui-btn layui-btn-fluid layui-btn-disabled'>Login to borrow</button>";
  }
};
?>
<script>

</script>

<div class="main-container">
  <div class="card-container">
    <?php
    if (!mysqli_num_rows($res) > 0) {
      echo "<h1>No Book Found</h1>";
    };
    $initData = 0;
    $dataPerPage = 6;
    // $data = array_slice($res, $initData, 1);

    while ($row = mysqli_fetch_assoc($res)) {

      $id = $row["Book_id"];
      $title = $row["Book_title"];
      $Author = $row["Author"];
      $Publisher = $row["Publisher"];
      $Language = $row["Language"];
      $Category = $row["Category"];
      // render
      echo "<div class='card'>";

      echo " <div class='card__header'>
          <div class='card__picture'>
            <img src='./public/images/book-image/book_$id.png' alt='Book $id' class='card__picture-img' />
          </div>
        </div>
    
        <div class='card__details'>
          <h2 class='card__sub-heading'>$title</h2>
          <h4 class='card__sub-heading'>$Author</h4>
          <p class='card__text'>
            <span class='card__footer-value'>$Language</span>
            <span class='card__footer-text'>$Category</span>
          </p>
        </div>
        
        <div class='card__footer'>
          <p>
            <span class='card__footer-text'>$Publisher</span>
          </p> ";
      echo  renderBtn($first_name);

      echo " </div></div> ";
    }

    ?>
  </div>
  <div id="book-page"></div>
</div>

<script>
  layui.use(function() {
    var laypage = layui.laypage;

    laypage.render({
      elem: 'book-page',
      count: 50
    });

  });
</script>

<?php
include('./footer.php');
?>