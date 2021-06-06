<!doctype html>
<html lang="zh-cmn-Hans">
<?php include './config.php'; ?>
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
  <title><?php echo title; ?></title>
</head>
<body class="mdui-theme-primary-indigo mdui-theme-accent-pink">
<header class="mdui-appbar">
  <div class="mdui-toolbar mdui-color-theme">
    <div class="mdui-typo-headline"><?php echo title; ?></div>
    <div class="mdui-toolbar-spacer"></div>
    <a href="https://github.com/jsun969/MessageBoard" target="_blank"
       class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
           x="0px" y="0px" viewBox="0 0 36 36" enable-background="new 0 0 36 36" xml:space="preserve" class="mdui-icon"
           style="width: 24px;height:24px;">
        <path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff" d="M18,1.4C9,1.4,1.7,8.7,1.7,17.7c0,7.2,4.7,13.3,11.1,15.5
	c0.8,0.1,1.1-0.4,1.1-0.8c0-0.4,0-1.4,0-2.8c-4.5,1-5.5-2.2-5.5-2.2c-0.7-1.9-1.8-2.4-1.8-2.4c-1.5-1,0.1-1,0.1-1
	c1.6,0.1,2.5,1.7,2.5,1.7c1.5,2.5,3.8,1.8,4.7,1.4c0.1-1.1,0.6-1.8,1-2.2c-3.6-0.4-7.4-1.8-7.4-8.1c0-1.8,0.6-3.2,1.7-4.4
	c-0.2-0.4-0.7-2.1,0.2-4.3c0,0,1.4-0.4,4.5,1.7c1.3-0.4,2.7-0.5,4.1-0.5c1.4,0,2.8,0.2,4.1,0.5c3.1-2.1,4.5-1.7,4.5-1.7
	c0.9,2.2,0.3,3.9,0.2,4.3c1,1.1,1.7,2.6,1.7,4.4c0,6.3-3.8,7.6-7.4,8c0.6,0.5,1.1,1.5,1.1,3c0,2.2,0,3.9,0,4.5
	c0,0.4,0.3,0.9,1.1,0.8c6.5-2.2,11.1-8.3,11.1-15.5C34.3,8.7,27,1.4,18,1.4z"></path>
      </svg>
    </a>
  </div>
</header>
<main class="mdui-container">
  <form action="submit.php" method="post" class="mdui-m-b-2 mdui-col-xs-12">
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
      <div class="mdui-float-right">
        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-amber mdui-text-color-white-text mdui-m-r-1"
                id="reset" type="reset">
          <i class="mdui-icon mdui-icon-right material-icons">delete_sweep</i>清空
        </button>
        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme mdui-float-right" id="submit"
                type="submit">
          <i class="mdui-icon mdui-icon-right material-icons">send</i>留言
        </button>
      </div>
    </div>
  </form>
  <?php
  $conn = new mysqli(db_host, db_username, db_password, db_name, db_port);
  $messages = $conn->query("SELECT date,is_anonymous,name,email,message FROM message ORDER BY id DESC");
  foreach ($messages as $message) {
    if ($message["is_anonymous"]) { ?>
      <div class="mdui-card mdui-col-xs-12 mdui-m-y-2 mdui-color-grey-900 mdui-text-color-white-text">
        <div class="mdui-card-primary">
          <div
            class="mdui-card-primary-subtitle mdui-float-right"><?php echo date_create($message["date"])->format("Y年m月d日 H:i:s"); ?></div>
          <div class="mdui-card-primary-title">匿名</div>
        </div>
        <div class="mdui-card-content mdui-typo"><?php echo htmlspecialchars($message["message"]) ?></div>
      </div>
    <?php } else { ?>
      <div class="mdui-card mdui-hoverable mdui-col-xs-12 mdui-m-y-2">
        <div class="mdui-card-primary">
          <div
            class="mdui-card-primary-subtitle mdui-float-right"><?php echo date_create($message["date"])->format("Y年m月d日 H:i:s"); ?></div>
          <div class="mdui-card-primary-title"><?php echo htmlspecialchars($message["name"]) ?></div>
        </div>
        <div class="mdui-card-content mdui-typo"><?php echo htmlspecialchars($message["message"]) ?></div>
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