<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>留言成功</title>
</head>
<body>
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
?>
<script type="text/javascript">
  alert('留言成功');
  window.location = "/";
</script>
</body>
</html>
