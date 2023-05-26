<?php
include("./admin_head.php");
include("../functions/checkBookStatus.php");
include("../functions/getAllBook.php");

?>

<div class="layui-body  fixPadding">
  <div class="main-container">
    <div class="card-container"></div>
  </div>
</div>

<script>
  let myBookData;
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
      <button type='button' class='layui-btn layui-btn-fluid layui-bg-black' onclick=returnBook(${data.id})>Force Return</button>
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
  };


  const onLoanBooks = bookStatusData.filter(el => el.Status === "On-loan");
  if (onLoanBooks?.length > 0) {
    myBookData = bookData.filter(book => onLoanBooks.some(bookStatus => bookStatus.bookId * 1 === book.id * 1));
    renderPage(myBookData)
  } else {
    const mainContainer = document.querySelector(".main-container");
    mainContainer.innerHTML = `<h1>No one is borrowing book right now</h1>`
  };

  const returnBook = async function(bookId) {
    const bodyData = {
      bookId
    };
    const res = await fetch("./force_return_check.php", {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(bodyData),
    })

    if (res.ok === true) {
      alert("successful return a book!")
      location.reload()
    } else {
      alert("Please try again later")
    };
  }
</script>