<!doctype html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
  <meta name="renderer" content="webkit"/>
  <meta name="force-rendering" content="webkit"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
    integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
    crossorigin="anonymous"
  />
  <title>荆棘留言板</title>
</head>
<body class="mdui-theme-primary-indigo mdui-theme-accent-pink">
<header class="mdui-appbar">
  <div class="mdui-toolbar mdui-color-theme">
    <div class="mdui-typo-headline">荆棘留言板</div>
  </div>
</header>
<main class="mdui-container">
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
  <form action="" method="post" class="mdui-m-b-2 mdui-col-xs-12">
    <div class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-6 userInfo">
      <i class="mdui-icon material-icons">account_circle</i>
      <label class="mdui-textfield-label">昵称</label>
      <input class="mdui-textfield-input userInfoInput" type="text" name="name" maxlength="15" required/>
      <div class="mdui-textfield-error">昵称不能为空</div>
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-6 userInfo">
      <i class="mdui-icon material-icons">email</i>
      <label class="mdui-textfield-label">邮箱</label>
      <input class="mdui-textfield-input userInfoInput" type="email" name="email" maxlength="30" required/>
      <div class="mdui-textfield-error">邮箱格式错误</div>
    </div>
    <div class="mdui-textfield mdui-col-xs-12">
      <textarea class="mdui-textfield-input" rows="5" placeholder="说点什么~" name="message" maxlength="300"
                required></textarea>
      <div class="mdui-textfield-error">内容不能为空</div>
    </div>
    <div class="mdui-col-xs-12">
      <label class="mdui-checkbox">
        <input type="checkbox" id="isAnonymous" name="isAnonymous"/>
        <i class="mdui-checkbox-icon"></i>
        匿名
      </label>
      <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme mdui-float-right" type="submit">留言</button>
    </div>
  </form>
  <?php
  $time = new DateTime('20210504083705');
  $messages = array(
    array("isAnonymous" => false, "name" => "test1", "time" => $time, "message" => "测试"),
    array("isAnonymous" => false, "name" => "lol", "time" => $time, "message" => "阿巴阿巴阿巴"),
    array("isAnonymous" => true, "time" => $time, "message" => "Who am I"),
  );
  foreach ($messages as $message) {
    if ($message["isAnonymous"]) { ?>
      <div class="mdui-card mdui-col-xs-12 mdui-m-y-2 mdui-color-grey-900 mdui-text-color-white-text">
        <div class="mdui-card-primary">
          <div
            class="mdui-card-primary-subtitle mdui-float-right"><?php echo $message["time"]->format("Y年m月d日 H:i:s"); ?></div>
          <div class="mdui-card-primary-title">匿名</div>
        </div>
        <div class="mdui-card-content mdui-typo"><?php echo $message["message"]; ?></div>
      </div>
    <?php } else { ?>
      <div class="mdui-card mdui-hoverable mdui-col-xs-12 mdui-m-y-2">
        <div class="mdui-card-primary">
          <div
            class="mdui-card-primary-subtitle mdui-float-right"><?php echo $message["time"]->format("Y年m月d日 H:i:s"); ?></div>
          <div class="mdui-card-primary-title"><?php echo $message["name"]; ?></div>
        </div>
        <div class="mdui-card-content mdui-typo"><?php echo $message["message"]; ?></div>
      </div>
    <?php } ?>
  <?php } ?>


</main>
<script
  src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
  integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
  crossorigin="anonymous"
></script>
<script src="./js/index.js"></script>
</body>
</html>