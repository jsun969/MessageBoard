<!doctype html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
  <meta name="renderer" content="webkit"/>
  <meta name="force-rendering" content="webkit"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <link rel="stylesheet" href="./css/index.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
    integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
    crossorigin="anonymous"
  />
  <title>荆棘留言版</title>
</head>
<body class="mdui-theme-primary-indigo mdui-theme-accent-pink">
<header class="mdui-appbar">
  <div class="mdui-toolbar mdui-color-theme">
    <div class="mdui-typo-headline">荆棘留言版</div>
  </div>
</header>
<main class="mdui-container">
  <form action="" class="mdui-m-b-2 mdui-col-xs-12">
    <div class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-6 userInfo">
      <i class="mdui-icon material-icons">account_circle</i>
      <label class="mdui-textfield-label">昵称</label>
      <input class="mdui-textfield-input userInfoInput" type="text" required/>
      <div class="mdui-textfield-error">昵称不能为空</div>
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-6 userInfo">
      <i class="mdui-icon material-icons">email</i>
      <label class="mdui-textfield-label">邮箱</label>
      <input class="mdui-textfield-input userInfoInput" type="email" required/>
      <div class="mdui-textfield-error">邮箱格式错误</div>
    </div>
    <div class="mdui-textfield mdui-col-xs-12">
      <textarea class="mdui-textfield-input" rows="5" placeholder="说点什么~" required></textarea>
      <div class="mdui-textfield-error">内容不能为空</div>
    </div>
    <div class="mdui-col-xs-12">
      <label class="mdui-checkbox">
        <input type="checkbox" id="isAnonymous"/>
        <i class="mdui-checkbox-icon"></i>
        匿名
      </label>
      <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme mdui-float-right" type="submit">留言</button>
    </div>
  </form>

  <div class="mdui-card mdui-hoverable mdui-col-xs-12 mdui-m-y-2">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-subtitle mdui-float-right">2020年3月20日 12:10:30</div>
      <div class="mdui-card-primary-title">荆棘</div>
    </div>
    <div class="mdui-card-content mdui-typo">
      测试消息
    </div>
  </div>

  <div class="mdui-card mdui-col-xs-12 mdui-m-y-2 mdui-color-grey-900 mdui-text-color-white-text">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-subtitle mdui-float-right">2020年3月20日 12:10:30</div>
      <div class="mdui-card-primary-title">???</div>
    </div>
    <div class="mdui-card-content mdui-typo">
      测试匿名消息
    </div>
  </div>

</main>
<script
  src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
  integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
  crossorigin="anonymous"
></script>
<script src="./js/index.js"></script>
</body>
</html>