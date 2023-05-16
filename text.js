const markup = function (data) {
  return `<div class="card">
    <div class="card__header">
      <div class="card__picture">
        <img src="./public/images/book-image/book_id.png" alt="Book id" class="card__picture-img" />
      </div>
    </div>
    <div class="card__details">
      <h2 class="card__sub-heading">title</h2>
      <h4 class="card__sub-heading">Author</h4>
      <p class="card__text">
        <span class="card__footer-value">Language</span>
        <span class="card__footer-text">Category</span>
      </p>
    </div>

    <div class="card__footer">
      <p>
        <span class="card__footer-text">Publisher</span>
      </p>
    </div>
  </div>;`;
};
