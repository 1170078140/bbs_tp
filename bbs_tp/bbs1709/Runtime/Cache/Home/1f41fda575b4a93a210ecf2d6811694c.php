<?php if (!defined('THINK_PATH')) exit();?><div class="top">
    <ul class="inner clearfix top_nav">
        <li class="left"><a href="#">设为首页</a></li>
        <li class="left"><a href="#">收藏LAMP兄弟连</a></li>
        <li><a href="/index.php/Home/Signup/index">注册</a></li>
        <li><a href="/index.php/Home/Login/index">登陆</a></li>
        <li><a href="#">帮助</a></li>
        <li><a href="#">推广链接</a></li>
        <li><a href="#">社区应用</a></li>
        <li><a href="#">最新帖子</a></li>
        <li><a href="#">精华区</a></li>
        <li><a href="#">社区服务</a></li>
        <li><a href="#">会员列表</a></li>
        <li><a href="#">统计排行</a></li>
        <li><a href="#">搜索</a></li>
    </ul>
</div>
<div class="header inner">
    <a href="/index.php/Home/Index/index" class="logo"><img src="/Public/Home/images/logo/<?php echo ($configRes['logo']); ?>"/></a>

    <?php if($_SESSION['res']== null ): ?><form action="/index.php/Home/Login/doLogin" method="post">
        <table border="" cellspacing="" cellpadding="">
            <tr>
                <td class="inputBox">
                    <input type="text" name="userName" placeholder="输入用户名" class="name"/>
                </td>
                <td><label><input type="checkbox" />记住登录</label></td>
                <td><a href="#">找回密码</a></td>
            </tr>
            <tr>
                <td><input type="password"  name="password" class="pass"/></td>
                <td><input type="submit" value="登陆" class="btn login"></td>
                <td><a href="/index.php/Home/Signup/index" class="btn signup">注册</a></td>
            </tr>
        </table>
    </form>
    <?php else: ?>
        <div style="float: right;padding-top: 30px;" id="user">
            <span style="display: inline-block;width: 50px;height:50px;border-radius: 50%;border: 1px solid #fff;overflow: hidden;">
                <?php if($_SESSION['photo']== 'photo' ): ?><a href="/index.php/Home/Center/editPic"><img src="/Public/Photos/default.jpg" alt="" style="height: 100%;"></a>
                <?php else: ?>
                    <a href="/index.php/Home/Center/editPic"><img src="/Public/Photos/<?php echo (session('photo')); ?>" alt="" style="height: 100%;"></a><?php endif; ?>

            </span>
            <span style="vertical-align: 15px;font-weight: bolder;font-size: 14px;">
                <?php echo ($_SESSION['res']['username']); ?>&nbsp;
                <a href="/index.php/Home/Center/index/id/<?php echo ($_SESSION['res']['id']); ?>">个人中心</a>&nbsp;
                <a href="/index.php/Home/Login/doLogout" style="color: blue;">退出</a>
            </span>
        </div><?php endif; ?>
</div>
<div class="nav">
    <div class="inner">
        <ul>
            <li><a href="#">培训课程</a></li>
            <li><a href="#">论坛</a></li>
            <li><a href="#">兄弟连云课堂</a></li>
            <li><a href="#">PHP视屏</a></li>
            <li><a href="#">Linux视频</a></li>
            <li><a href="#">战地日记</a></li>
        </ul>
        <button type="button">快捷通道</button>
    </div>
</div>

    <!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>个人中心</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/signup.css"/>
</head>
<body>
	<div class="main inner clearfix">
		<h3>个人中心</h3>
		<form action="/index.php/Home/Center/editUser" method="post">
			<table border="" cellspacing="" cellpadding="">
				<input type="hidden" value="<?php echo ($userRes['id']); ?>" name="id">
				<tr>
					<td align="right">用户名<span>*</span></td>
					<td><input type="text" value="<?php echo ($_SESSION['res']['username']); ?>" name="userName" required /></td>
					<!--<td class="error"><span><i><img src="/Public/Home/images/xx_03.jpg"/></i>用户名不能为空</span></td>-->
				</tr>
                <tr>
                    <td align="right">昵称<span>&nbsp;&nbsp;</span></td>
                    <td><input type="text" value="<?php echo ($userRes['nickname']); ?>" name="nickName"/></td>
                    <td class="error"></td>
                </tr>
				<!--<tr>
					<td align="right">密码<span>*</span></td>
					<td><input type="password" name="password" value="<?php echo ($_SESSION['res']['password']); ?>" required /></td>
				</tr>-->
				<tr>
					<td align="right">电子邮箱<span>&nbsp;&nbsp;</span></td>
					<td><input type="email" name="email" value="<?php echo ($userRes['email']); ?>" required /></td>
				</tr>
                <tr>
                    <td align="right">qq号码<span>&nbsp;&nbsp;</span></td>
                    <td><input type="number" name="qq" value="<?php echo ($userRes['qq']); ?>" required /></td>
                </tr>
                <tr>
                    <td align="right">性别<span>&nbsp;&nbsp;</span></td>
					<td>
						<label><input type="radio" name="sex" value="m" width="30" <?php echo ($userRes['sex']=='m'?'checked':''); ?>>男</label>
						<label><input type="radio" name="sex" value="w" width="30" <?php echo ($userRes['sex']=='w'?'checked':''); ?>>女</label>
					</td>
                </tr>
				<tr>
					<td></td>
					<td><input type="submit" value="提交修改" class="signup" /></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<div class="footer inner">
    <ul>
        <li><a href="#">联系我们</a><span>|</span></li>
        <li><a href="#">无图版</a><span>|</span></li>
        <li><a href="#">手机浏览</a><span>|</span></li>
        <li><a href="#">清除Cookies</a><span>|</span></li>
        <li><a href="../../Admin/Index/index" target="_blank">网站后台</a></li>
    </ul>
    <p>© Crafted with by <?php echo ($configRes['copy']); ?></p>
    <p>学习用~~</p>
</div>