<?php
include("lms-header.php");

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
?>

<div class="main-container">
  <div class="card-container"></div>
  <div id="book-page"></div>
</div>

<script>
  function fetchBookDate() {
    console.log(bookData);
  }

  function renderBtn(boolean, id) {
    if (boolean) {
      return `<button type='button' class='layui-btn layui-btn-fluid layui-bg-blue' onclick=borrowBook(${id})>Borrow</button>`;
    } else {
      return "<button type='button' class='layui-btn layui-btn-fluid layui-btn-disabled'>Login to borrow</button>";
    }
  };

  const createMarkup = function(data) {
    return `<div class="card">
    <div class="card__header">
      <div class="card__picture">
        <img src="./public/images/book-image/book_${data.id}.png" alt="Book id" class="card__picture-img" />
      </div>
    </div>
    <div class="card__details">
      <h2 class="card__sub-heading">${data.title}</h2>
      <h4 class="card__sub-heading">${data.Author}</h4>
      <p class="card__text">
        <span class="card__footer-value">${data.Language}</span>
        <span class="card__footer-text">${data.Category}</span>
      </p>
    </div>

    <div class="card__footer">
      <p>
        <span class="card__footer-text">${data.Publisher}</span>
      </p>
      ${renderBtn(firstNameData,data.id)}
    </div>
  </div>`;
  };

  // page rendering

  const renderPage = function(datas) {
    const container = document.querySelector(".card-container");
    let template = [];
    datas.forEach((data) => {
      template.push(createMarkup(data));
    });
    const markup = template.join("");

    container.innerHTML = markup
  }

  // pagination 
  layui.use(function() {
    const laypage = layui.laypage;

    const data = bookData

    laypage.render({
      elem: 'book-page',
      count: data.length,
      limit: 6,
      jump: function(obj) {
        const thisData = data.concat().splice(obj.curr * obj.limit - obj.limit, obj.limit);
        renderPage(thisData)
      }
    });
  });


  // borrow book
  function borrowBook(bookId) {
    console.log(bookId);
  }
</script>

<?php
include('./footer.php');
?>