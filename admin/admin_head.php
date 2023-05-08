<?php
include("../conn.php");

session_start();

if (!isset($_SESSION['email'])) {
    alert('Please login first', '../login.php');
}

if ($_SESSION['member_type'] !== 'Admin') {
    alert('Your member type have no access to this page', '../index.php');
}


function limits()
{
    $conn = @mysqli_connect('127.0.0.1', 'root', '', 'library') or die('链接失败');
    mysqli_query($conn, 'set names utf8');
    $email = $_SESSION['email'];
    $sql = "select * from user where email = '$email' and Member_type = 'Admin'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) < 1) {
        alert('you have no authorization to access this page', 'index.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>LMS</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
    <script src="../layui/layui.js"></script>

<body>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo layui-hide-xs layui-bg-black">LMS</div>
            <!-- 头部区域-->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layui-hide-xs"><a href="index.php">Home</a></li>
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item layui-hide-xs"><a href="../logout.php">Logout</a></li>
                <li class="layui-nav-item layui-hide layui-show-md-inline-block">
                    <a href="javascript:;">
                        个人中心
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="my_info.php">Me</a></dd>
                        <dd><a href="my_book_list.php">My books</a></dd>
                    </dl>
                </li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域  -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">Manage book</a>
                        <dl class="layui-nav-child">
                            <dd><a href="book_list.php">Book list</a></dd>
                            <dd><a href="add_book.php">Add new book</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">Manage user</a>
                        <dl class="layui-nav-child">
                            <dd><a href="user_list.php">user list</a></dd>
                            <dd><a href="user_new.php">change user info</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>