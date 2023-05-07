<?php
header('Content-Type:text/html;charset=utf-8');

$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = "library";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check status
if ($conn->connect_error) {
    exit('Failed: ' . $conn->connect_error);
}
echo '<script> console.log("Successful connect to DB")</script>';

function alert($str, $url)
{
    echo '<script> alert ("' . $str . '");location.href="' . $url . '";</script>';
}

session_start();

if (!isset($_SESSION['email'])) {
    alert('Please login first', '../login.php');
}
$sql = "select * from borrow where state = 0";
$rs = mysqli_query($conn, $sql);
$num = mysqli_num_rows($rs);
if ($num > 0) {
    $span = '<span class = "layui-badge-rim">' . $num . '</span>';
} else {
    $span = null;
}
function limits($limits)
{
    $conn = @mysqli_connect('127.0.0.1', 'root', '', 'library') or die('链接失败');
    mysqli_query($conn, 'set names utf8');
    $username = $_SESSION['username'];
    $sql = "select * from user where username = '$username' and limits like '%" . $limits . "%'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) < 1) {
        alert('您不具备访问该页面的权限', 'index.php');
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
                        <dd><a href="mine_info_list.php">Me</a></dd>
                        <dd><a href="mine_borrow_new.php">借阅申请</a></dd>
                        <dd><a href="mine_borrow_list.php">申请列表</a></dd>
                        <dd><a href="mine_book_list.php">我的书籍</a></dd>
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
                            <dd><a href="book_new.php">Add new book</a></dd>
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