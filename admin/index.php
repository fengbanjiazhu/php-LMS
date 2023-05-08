<?php
include('./admin_head.php');
session_start()
?>
<div class="layui-body">
    <div style="padding: 15px;">
        <h1>Welcome Manager <?php echo $_SESSION['firstName'] ?> !</h1>
    </div>
</div>
<?php
include('../footer.php');
