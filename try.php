<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = "library";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
  exit('连接失败: ' . $conn->connect_error);
}
echo '<script> console.log("连接成功")</script>';


// $username = 'jeffrey';
// $email = '5624@qq.com';
// $password = 'test1234';
// $create_datetime = date("Y-m-d H:i:s");


$sql = "CREATE TABLE users (
  Member_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  Member_type ENUM('Member', 'Admin') DEFAULT 'Member', 
  username VARCHAR(30) NOT NULL,
  first_name VARCHAR(20),
	last_name  VARCHAR(20),
  email VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  create_datetime TIMESTAMP
  )";

// 使用 sql 创建数据表
// $sql = "INSERT into `admin` (admin_id, password, email, create_datetime) VALUES ('$username', '" . password_hash($password, PASSWORD_DEFAULT) . "', '$email', '$create_datetime')";

if ($conn->query($sql) === TRUE) {
  echo "新记录插入成功";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
