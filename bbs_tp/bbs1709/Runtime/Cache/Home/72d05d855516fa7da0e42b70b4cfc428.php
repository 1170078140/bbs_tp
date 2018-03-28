<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/signup.css"/>
</head>
<body>

	<div  class="inner"  style="padding-top: 60px;"><a href="/index.php/Home/Index/index"><img src="/Public/Home/images/logo.png" alt=""></a></div>
	<div class="main inner clearfix">
		<h3>注册</h3>
		<form action="/index.php/Home/Signup/doSignup" method="post">
			<p class="reminder">请添加能正常发邮箱的邮箱</p>
			<table border="" cellspacing="" cellpadding="">
				<tr>
					<td align="right">用户名<span>*</span></td>
					<td><input type="text" name="userName" required /></td>
					<!--<td class="error"><span><i><img src="/Public/Home/images/xx_03.jpg"/></i>用户名不能为空</span></td>-->
				</tr>
				<tr>
					<td align="right">昵称<span>&nbsp;&nbsp;</span></td>
					<td><input type="text" value="" name="nickName"/></td>
					<td class="error"></td>
				</tr>
				<tr>
					<td align="right">密&nbsp;&nbsp;&nbsp;码<span>*</span></td>
					<td><input type="password" name="password" required /></td>
				</tr>
				<tr>
					<td align="right">确认密码<span>*</span></td>
					<td><input type="password" name="surepass"/></td>
				</tr>
				<tr>
					<td align="right">电子邮箱<span>*</span></td>
					<td><input type="email" name="email" required /></td>
				</tr>
				<tr>
					<td align="right">qq号码<span>&nbsp;&nbsp;</span></td>
					<td><input type="number" name="qq" required /></td>
				</tr>
				<tr>
					<td align="right">性别<span>&nbsp;&nbsp;</span></td>
					<td>
						<label><input type="radio" name="sex" value="m" width="30" checked>男</label>
						<label><input type="radio" name="sex" value="w" width="30">女</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><label><input type="checkbox" />我已阅读并完全同意<a href="#">条款内容</a></label></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="提交注册" class="signup" /></td>
				</tr>				
			</table>			
		</form>
		<div class="login">
			<p>已经拥有账号？</p>
			<a href="/index.php/Home/Login/index">马上登录</a>
		</div>
	</div>
</body>
</html>