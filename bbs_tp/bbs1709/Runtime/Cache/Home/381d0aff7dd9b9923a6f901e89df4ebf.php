<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>登录页面</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
    <link rel="stylesheet" href="/Public/Home/css/login.css" type="text/css" />
</head>
<body>

<div  class="inner"  style="padding-top: 60px;"><a href="/index.php/Home/Index/index"><img src="/Public/Home/images/logo.png" alt=""></a></div>
<div class="main inner">
        <div class="pageTitle">
            <h5>登录</h5>
        </div>
        <div class="logIn">
            <div class="alertLine">如果您在网吧或者非个人电脑，建议设置Cookie有效期为 即时，以保证账户安全</div>
            <form action="/index.php/Home/Login/doLogin" method="post">
                <dl class="info" style="margin-top: 40px;">
                    <dt>用户名</dt>
                    <dd><div><input type="text" value="" name="userName" required></div></dd>
                </dl>
                <dl class="info">
                    <dt>密 码</dt>
                    <dd>
                        <div><input type="password" value="" name="password" required></div>
                   </dd>
                    <dd><div class="find"><a href="#">找回密码</a></div></dd>
                </dl>
                <!--<dl class="info1">
                    <dt class="hlog">隐身登录</dt>
                    <dd class="danxuan1">
                        <label><input class="danxuan" name="one" type="radio" value="" >开启</label>
                        <label><input class="danxuan" name="one" type="radio" value="" >关闭</label>
                    </dd>
                </dl>-->
                <dl class="info1">
                    <dt class="hlog">&nbsp;</dt>
                    <dd class="danxuan1"><label><input class="danxuan" type="checkbox" value="" >下次自动登录</label></dd>
                </dl>
                <dl class="info1">
                    <dt class="hlog">&nbsp;</dt>
                    <dd class="danxuan1"><button type="submit" class="logBtn" style="width: 80px;">登录</button></dd>
                </dl>
            </form>
        </div>
        <div class="signUp">
            <div class="toSign">
                <p>还没有帐号？</p>
                <a href="/index.php/Home/Signup/index" class="goTos"><button>注册一个</button></a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
 ?>