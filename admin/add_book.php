<?php
include("./admin_head.php");
session_start();
?>


<div class="layui-body">
  <form class="layui-form" action="./add_book_check.php" method="post">
    <h1 class="title">Add new Book</h1>
    <div class="demo-reg-container">
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
      <input type="submit" name="submit" value="Add new book" class="layui-btn layui-btn-fluid layui-bg-blue">
    </div>
  </form>
</div>