<?php
include './config.php';
$conn = new mysqli(db_host, db_username, db_password, db_name, db_port);
if ($stmt = $conn->prepare("INSERT INTO message (`is_anonymous`,`ip`,`name`,`email`,`message`) VALUES (?,?,?,?,?)")) {
  $stmt->bind_param("issss", $isAnonymous, $ip, $name, $email, $message);
  $isAnonymous = (bool)$_POST["isAnonymous"];
  $ip = $_SERVER['REMOTE_ADDR'];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $stmt->execute();
}
echo '<h1>留言成功</h1>';