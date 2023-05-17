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
      <button type='button' class='layui-btn layui-btn-fluid layui-bg-blue' lay-on='test-page-custom' data-bookId='${data.id}'>Manage</button>
    </div>
  </div>`;
  };
  // onclick=manageBook(${data.id})
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
  // function manageBook(bookId) {
  //   console.log(bookId);
  // }


  layui.use(function() {
    const $ = layui.$;
    const layer = layui.layer;
    const util = layui.util;
    const form = layui.form;

    util.on('lay-on', {
      'test-page-custom': function() {
        layer.open({
          type: 1,
          area: ['400px', '450px'],
          resize: false,
          shadeClose: true,
          title: 'Edit Book Detail',
          content: `
          <form class="layui-form" action="./manage_book_check.php" method="post" enctype="multipart/form-data">
            <div class="demo-reg-container">
              <div class="layui-form-item">
                <input type="number" name="bookTitle" value="" lay-verify="required" placeholder="Book Title" class="layui-input">
              </div>
              <div class="layui-form-item">
                <input type="text" name="bookTitle" value="" lay-verify="required" placeholder="Book Title" class="layui-input">
              </div>
              <div class="layui-form-item">
                <input type="text" name="Author" value="" lay-verify="required" placeholder="Author" class="layui-input">
              </div>
              <div class="layui-form-item">
                <input type="text" name="Publisher" value="" placeholder="Publisher" class="layui-input">
              </div>
              <div class="layui-form-item" name="Language">
                <select lay-search="" name="Language">
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
                <select lay-search="" name="Category">
                  <option value="">please select Category</option>
                  <option value="Fiction">Fiction</option>
                  <option value="Nonfiction">Nonfiction</option>
                  <option value="Reference">Reference</option>
                </select>
              </div>
              <input type="submit" name="submit" value="Add new book" id="submitBtn" class="layui-btn layui-btn-fluid layui-bg-black">
            </div>
          </form>
        `,
          success: function() {
            form.render();
            console.log(this);
            // 表单提交事件
            form.on('submit(demo-login)', function(data) {
              const field = data.field;
              layer.alert(JSON.stringify(field), {
                title: '当前填写的字段值'
              });
              // 此处可执行 Ajax 等操作

              return false; // 阻止默认 form 跳转
            });
          }
        });
      }
    })
  });
</script>