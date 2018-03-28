<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
    <link href="/Public/Admin/css/css.css" type="text/css" rel="stylesheet" />
    <link href="/Public/Admin/css/page.css" type="text/css" rel="stylesheet" />
    <link href="/Public/Admin/css/main.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="/Public/Admin/images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(/Public/Admin/images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(/Public/Admin/images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(/Public/Admin/images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：帖子回收站</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="post" action="">
	         <span>管理员：</span>
	         <input type="text" name="" value="" class="text-word">
	         <input name="" type="button" value="查询" class="text-but">
	         </form>
         </td>
  		  <!--<td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>-->
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">主题</th>
        <th align="center" valign="middle" class="borderright">发帖人</th>
        <th align="center" valign="middle" class="borderright">发表时间</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      <?php if(is_array($postRes)): foreach($postRes as $key=>$v): ?><tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($v['id']); ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($v['title']); ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($v['uid']); ?></td>
        <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($v['ctime']); ?></td>
        <td align="center" valign="middle" class="borderright borderbottom">普通</td>
        <td align="center" valign="middle" class="borderbottom">
          <a href="/index.php/Admin/Post/" target="mainFrame" onFocus="this.blur()" class="add">查看帖子</a><span class="gray">&nbsp;|&nbsp;</span>
          <a href="/index.php/Admin/Post/delete/id/<?php echo ($v['id']); ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a><span class="gray">&nbsp;|&nbsp;</span>
          <a href="/index.php/Admin/Post/leaveRecycle/id/<?php echo ($v['id']); ?>" target="mainFrame" onFocus="this.blur()" class="add">恢复</a>
        </td>
      </tr><?php endforeach; endif; ?>
    </table>
    </td>
    </tr>
  <tr>
    <td align="left" valign="top" class="fenye">
        11 条数据 1/1 页&nbsp;&nbsp;
        <a href="#" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;
        <a href="#" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;
        <a href="#" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;
        <a href="#" target="mainFrame" onFocus="this.blur()">尾页</a>

        <!--<div class="manu"><?php echo ($page); ?></div>-->
    </td>
  </tr>
</table>
</body>
</html>