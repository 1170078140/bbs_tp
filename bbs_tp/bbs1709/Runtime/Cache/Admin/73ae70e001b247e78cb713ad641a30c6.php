<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台页面头部</title>
<link href="/Public/Admin/css/css.css" type="text/css" rel="stylesheet" />
</head>
<body onselectstart="return false" oncontextmenu=return(false) style="overflow-x:hidden;">
<!--禁止网页另存为-->
<noscript><iframe scr="*.htm"></iframe></noscript>
<!--禁止网页另存为-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="header">
  <tr>
    <td align="left" valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom" id="header-name">后台管理系统</td>
        <td align="right" valign="top" id="header-right">
        	<a href="/index.php/Admin/Index/doLogout" target="_top" onFocus="this.blur()" class="admin-out">注销</a>
            <a href="index.html" target="top" onFocus="this.blur()" class="admin-home">后台首页</a>
        	<a href="index.html" target="_blank" onFocus="this.blur()" class="admin-index">网站首页</a>       	
            <span>
<!-- 日历 -->
<SCRIPT type=text/javascript src="/Public/Admin/js/clock.js"></SCRIPT>
<SCRIPT type=text/javascript>showcal();</SCRIPT>
            </span>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="bottom">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" id="header-admin"></td>
        <td align="left" valign="bottom" id="header-menu">
        <a href="#" target="left" onFocus="this.blur()" id="menuon">后台首页</a>
        <a href="#" target="left" onFocus="this.blur()">用户管理</a>
        <a href="#" target="left" onFocus="this.blur()">栏目管理</a>
        <a href="#" target="left" onFocus="this.blur()">友情链接</a>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>