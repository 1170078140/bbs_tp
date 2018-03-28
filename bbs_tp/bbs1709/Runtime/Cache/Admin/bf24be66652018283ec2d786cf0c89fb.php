<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="/Public/Admin/css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/Public/Admin/js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(/Public/Admin/images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="/Public/Admin/images/main/member.gif" width="44" height="44" /></div>
    <span>用户：<?php echo (session('userName')); ?><br>角色：超级管理员</span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>用户管理</span>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">网站统计</a>
        <a href="/index.php/Admin/User/index" target="mainFrame" onFocus="this.blur()">浏览用户</a>
        <a href="/index.php/Admin/User/add" target="mainFrame" onFocus="this.blur()">添加用户</a>
      </div>
      <div>
        <span>板块管理</span>
        <a href="/index.php/Admin/Type/index" target="mainFrame" onFocus="this.blur()">浏览分区</a>
        <a href="/index.php/Admin/Type/addFather" target="mainFrame" onFocus="this.blur()">添加父分区</a>
      </div>
      <div>
        <span>帖子管理</span>
        <a href="/index.php/Admin/Post/index" target="mainFrame" onFocus="this.blur()">帖子列表</a>
        <a href="/index.php/Admin/Post/recycle" target="mainFrame" onFocus="this.blur()">回收站</a>
      </div>
      <div>
        <span>网站配置</span>
        <a href="/index.php/Admin/Config/index" target="mainFrame" onFocus="this.blur()">网站配置</a>
      </div>
      <div>
        <span>友情链接</span>
        <a href="/index.php/Admin/Links/index" target="mainFrame" onFocus="this.blur()">浏览链接</a>
        <a href="/index.php/Admin/Links/add" target="mainFrame" onFocus="this.blur()">添加链接</a>
      </div>
    </div>
</body>
</html>