<?php
include("lms-header.php");
?>

<div class="main-container">
  <div class="card-container">
    <div class="card">
      <div class="card__header">
        <div class="card__picture">
          <img src="./public/images/book_1.png" alt="Tour 1" class="card__picture-img" />
        </div>
      </div>

      <div class="card__details">
        <h2 class="card__sub-heading">Title</h2>
        <h4 class="card__sub-heading">author</h4>
        <p class="card__text">
          <span class="card__footer-value">English</span>
          <span class="card__footer-text">fiction</span>
        </p>
      </div>
      <div class="card__footer">
        <p>
          <span class="card__footer-text">macmillan collectors library</span>
        </p>
        <button type="button" class="layui-btn layui-btn-fluid">borrow</button>
      </div>
    </div>
  </div>
</div>

<?php
include('./footer.php');
?>