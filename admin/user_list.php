<?php
include("./admin_head.php");
include("../functions/getAllUser.php");

?>
<div class="layui-body  fixPadding">
  <div class="main-container">
    <div class="card-container">
    </div>
    <div id="book-page"></div>
  </div>
</div>

<script>
  const createMarkup = function(data) {
    return `<div class="card">
    <div class="card__details">
      <h4 class="card__sub-heading">${data.firstName} ${data.lastName}</h4>
      <p class="card__text">
        <span class="card__footer-value">ID: ${data.id}</span>
        <span class="card__footer-text">${data.memberType}</span>
      </p>
      <p class="card__text">
        <span class="card__footer-text">${data.email}</span>
      </p>
    </div>
  </div>`;
  };

  // // page rendering
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

    const data = userData

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
</script>