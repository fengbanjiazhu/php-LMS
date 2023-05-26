<?php
include("./lms-header.php");
include("./functions/checkBookStatus.php");
include("./functions/getAllBook.php");
include("./functions/loginAuth.php");

?>

<div class="main-container">
  <div class="card-container"></div>
</div>

<script>
  let myBookData;
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


  const myBookStatus = bookStatusData.filter(el => el.memberId === currentUserId);
  if (myBookStatus?.length > 0) {
    myBookData = bookData.filter(book => myBookStatus.some(bookStatus => bookStatus.bookId * 1 === book.id * 1));
    renderPage(myBookData)
  } else {
    const mainContainer = document.querySelector(".main-container");
    mainContainer.innerHTML = `<h1> You have not borrow any book yet, it's time to borrow one! </h1>`
  };
</script>