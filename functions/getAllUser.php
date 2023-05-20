<?php
$sql = "SELECT * FROM users";
$res = mysqli_query($conn, $sql);

$users = array();

while ($row = mysqli_fetch_assoc($res)) {
  $user = [
    'id' => $row["Member_id"],
    'memberType' => $row["Member_type"],
    'username' => $row["username"],
    'firstName' => $row["first_name"],
    'lastName' => $row["last_name"],
    'email' => $row["email"],
  ];
  $users[] = $user;
}
$json = json_encode($users);

echo "<script>const userData = $json;</script>";
