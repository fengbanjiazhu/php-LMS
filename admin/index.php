<?php
include('head.php');
// include('../conn.php');
session_start()
?>
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <h1>欢迎<?php echo $_SESSION['firstName'] ?>的到来-图书管理系统</h1>
    </div>
</div>
<?php
include('foot.php');
