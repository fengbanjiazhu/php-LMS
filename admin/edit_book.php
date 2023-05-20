<?php
include("./admin_head.php");
include("../functions/getAllBook.php");
session_start();

?>
<style>
  .fixPadding {
    padding: 1rem;
    text-align: center;
  }

  .layui-btn+.layui-btn {
    margin: 10px 0 10px 0;
  }
</style>

<div class="layui-body  fixPadding">
  <div class="card-container"></div>
  <div id="book-page"></div>

  <div id="ID-test-layer-wrapper" style="display: none;">
    <div style="padding:16px;">
    </div>
  </div>
</div>

<script>
  let clickedBookData;
  const createMarkup = function(data) {
    return `<div class="card">
    <div class="card__header">
      <div class="card__picture">
        <img src="../public/images/book-image/book_${data.id}.png" alt="Book id" class="card__picture-img" />
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
      <button type='button' class='layui-btn layui-bg-black layui-btn-fluid' lay-on='edit_book' onclick=setClickedBookData(${data.id})>Edit</button>
      <button type='button' class='layui-btn layui-btn-danger layui-btn-fluid' lay-on='delete_book' onclick=setClickedBookData(${data.id})>Delete</button>
    </div>
  </div>`;
  };

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

  // set clicked book data
  function setClickedBookData(id) {
    bookData.forEach(el => {
      if (el.id * 1 !== id) return;
      clickedBookData = el;
    })
  }

  layui.use(function() {
    const $ = layui.$;
    const layer = layui.layer;
    const util = layui.util;
    const form = layui.form;

    util.on('lay-on', {
      'edit_book': function() {
        layer.open({
          type: 1,
          area: ['400px', '450px'],
          resize: false,
          shadeClose: true,
          title: 'Edit Book Detail',
          content: `
          <form class="layui-form" action="./edit_book_check.php" method="post" enctype="multipart/form-data">
            <div class="demo-reg-container">
              <div class="layui-form-item">
                <input type="number" name="bookId" value="${clickedBookData.id}" readonly class="layui-input">
              </div>
              <div class="layui-form-item">
                <input type="text" name="bookTitle" value="${clickedBookData.title}" required placeholder="Book Title" class="layui-input">
              </div>
              <div class="layui-form-item">
                <input type="text" name="Author" value="${clickedBookData.Author}" required placeholder="Author" class="layui-input">
              </div>
              <div class="layui-form-item">
                <input type="text" name="Publisher" value="${clickedBookData.Publisher}" required placeholder="Publisher" class="layui-input">
              </div>
              <div class="layui-form-item" name="Language">
                <select lay-search="" name="Language" lay-verify="required">
                  <option value="">please select Language</option>
                  <option value="English">English</option>
                  <option value="French">French</option>
                  <option value="German">German</option>
                  <option value="Mandarin">Mandarin</option>
                  <option value="Japanese">Japanese</option>
                  <option value="Russian">Russian</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="layui-form-item" name="Category">
                <select lay-search="" name="Category" lay-verify="required">
                  <option value="">please select Category</option>
                  <option value="Fiction">Fiction</option>
                  <option value="Nonfiction">Nonfiction</option>
                  <option value="Reference">Reference</option>
                </select>
              </div>
              <button class="layui-btn layui-btn-fluid layui-bg-black" id="submitBtn" lay-submit lay-filter="submit-change">Edit Book Detail</button>
            </div>
          </form>
        `,
          success: function() {
            form.render();
          }
        });
      },

      'delete_book': function() {
        layer.open({
          type: 1,
          area: ['400px', '250px'],
          resize: false,
          shadeClose: true,
          title: 'Are you sure to delete this book?',
          content: `
          <form class="layui-form" action="./delete_book_check.php" method="post">
            <div class="demo-reg-container">
              <div class="layui-form-item">
                <input type="number" name="bookId" value="${clickedBookData.id}" readonly class="layui-input">
              </div>
              <div class="layui-form-item">
                <input type="text" name="bookTitle" value="${clickedBookData.title.toUpperCase()}" readonly placeholder="Book Title" class="layui-input">
              </div>
              <button class="layui-btn layui-btn-fluid layui-btn-danger" id="submitBtn" lay-submit lay-filter="submit-change">Yes, Delete</button>
            </div>
          </form>
        `,
          success: function() {
            form.render();
          }
        });
      }
    })
  });
</script>