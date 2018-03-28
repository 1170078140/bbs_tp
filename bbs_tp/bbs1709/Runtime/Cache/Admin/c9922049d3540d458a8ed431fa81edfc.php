<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>主要内容区main</title>
  <link href="/Public/Admin/css/css.css" type="text/css" rel="stylesheet" />
  <link href="/Public/Admin/css/main.css" type="text/css" rel="stylesheet" />
  <link rel="shortcut icon" href="/Public/Admin/main/favicon.ico" />
  <style>
    body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
    #searchmain{ font-size:12px;}
    #search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
    #search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
    #search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
    #search form input.text-but{height:24px; line-height:24px; width:55px; background:url(/Public/Admin/images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
    #search a.add{ background:url(/Public/Admin/images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
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
    #addinfo{ padding:0 0 10px 0;}
    input.text-word{ width:50px; height:24px; line-height:20px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; text-align:center; color:#666}
    .tda{width:100px;}
    .tdb{ padding-left:20px;}
    td#xiugai{ padding:10px 0 0 0;}
    td#xiugai input{ width:100px; height:40px; line-height:30px; border:none; border:1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
  </style>
</head>
<body>
<!--main_top-->
<form method="post" action="">
  <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
    <tr>
      <td width="99%" align="left" valign="top" id="addinfo">您的位置：管理栏目</td>
    </tr>
    <tr>
      <td align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
          <tr>
            <th align="center" valign="middle" class="borderright tda">分类树</th>
            <th align="center" valign="middle" class="borderright tda">ID</th>
              <th align="center" valign="middle" class="borderright">栏目名</th>
              <th align="center" valign="middle" class="borderright">图像</th>
              <th align="center" valign="middle" class="borderright">状态</th>
            <th align="center" valign="middle">栏目管理</th>
          </tr>
          <?php if(is_array($res)): foreach($res as $key=>$v): if($v['pid'] == 0): ?><tr class="bggray">
                      <td align="left" valign="middle" class="borderright borderbottom tdb"><img src="/Public/Admin/images/main/dirfirst.gif" width="15" height="13"></td>
                      <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($v['id']); ?></td>
                      <td align="left" valign="middle" class="borderright borderbottom tdb"><?php echo ($v['name']); ?></td>
                      <td align="left" valign="middle" class="borderright borderbottom tdb"></td>
                      <td align="left" valign="middle" class="borderright borderbottom tdb"><?php echo ($show[$v['status']]); ?></td>
                      <td align="center" valign="middle" class="borderbottom">
                          <a href="/index.php/Admin/Type/editFather/id/<?php echo ($v['id']); ?>" target="mainFrame" onFocus="this.blur()" class="add">修改</a><span class="gray">&nbsp;|&nbsp;</span>
                          <a href="/index.php/Admin/Type/addSon/id/<?php echo ($v['id']); ?>/fname/<?php echo ($v['name']); ?>" target="mainFrame" onFocus="this.blur()" class="add">添加子版块</a><span class="gray">&nbsp;|&nbsp;</span>
                          <a href="/index.php/Admin/Type/delFather/id/<?php echo ($v['id']); ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a>
                      </td>
                  </tr>
              <?php else: ?>
                  <tr>
                      <td align="left" valign="middle" class="borderright borderbottom tdb"><img src="/Public/Admin/images/main/dirsecond.gif" width="29" height="29"></td>
                      <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($v['id']); ?></td>
                      <td align="left" valign="middle" class="borderright borderbottom tdb"><?php echo ($v['name']); ?> </td>
                      <td align="center" valign="middle" class="borderright borderbottom tdb" style="padding: 5px 0">
                          <img src="/Public/Admin/images/blogos/s_<?php echo ($v['blogo']); ?>" alt="">
                      </td>
                      <td align="left" valign="middle" class="borderright borderbottom tdb"><?php echo ($show[$v['status']]); ?></td>
                      <td align="center" valign="middle" class="borderbottom">
                          <a href="/index.php/Admin/Type/editSon/id/<?php echo ($v['id']); ?>" target="mainFrame" onFocus="this.blur()" class="add">修改</a><span class="gray">&nbsp;|&nbsp;</span>
                          <a href="/index.php/Admin/Type/post/id/<?php echo ($v['id']); ?>" target="mainFrame" onFocus="this.blur()" class="add">查看帖子</a><span class="gray">&nbsp;|&nbsp;</span>
                          <a href="/index.php/Admin/Type/delSon/id/<?php echo ($v['id']); ?>" target="mainFrame" onFocus="this.blur()" class="add">删除</a>
                      </td>
                  </tr><?php endif; endforeach; endif; ?>
        </table></td>
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
</form>
</body>
</html>