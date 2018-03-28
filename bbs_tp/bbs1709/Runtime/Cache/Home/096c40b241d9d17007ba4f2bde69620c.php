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

    <?php  date_default_timezone_set('PRC')?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>主要内容区main</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/post.css">

</head>
<body>
<div class="search inner">
    <form action="" method="post">
        <input type="text" name="" id="" placeholder="让学习成为一种习惯！" class="serBox"/>
        <select name="">
            <option value="">帖子</option>
            <option value="">用户</option>
            <option value="">板块</option>
        </select>
        <input type="submit" value="搜索" class="btn"/>
        <ul class="tags clearfix">
            <li>热搜：</li>
            <li><a href="#">PHP</a></li>
            <li><a href="#">明哥</a></li>
            <li><a href="#">Java</a></li>
            <li><a href="#">大数据</a></li>
            <li><a href="#">Python</a></li>
        </ul>
    </form>
</div>
<div class="main inner">
    <form method="post" action="/index.php/Home/Reply/doReply">
    <table>
        <input type="hidden" name="ctime" value="<?php echo date('Y/m/d H:i:s');?>">
        <input type="hidden" name="uid" value="<?php echo ($_SESSION['res']['id']); ?>">
        <input type="hidden" name="pid" value="<?php echo ($pid); ?>">

        <tr style="height: 50px;">
            <td colspan="3">标题：&nbsp;<input style="width: 400px;" type="text" class="title" placeholder="<?php echo ($post['title']); ?>" readonly></td>
        </tr>
        <tr style="height: 50px;">
            <td colspan="3">内容：&nbsp;<input style="width: 400px;" type="text" class="title" placeholder="<?php echo ($post['content']); ?>" readonly></td>
        </tr>
        <tr style="height: 50px;">
            <td colspan="3"><span style="vertical-align: top">回复：&nbsp;</span><textarea name="content" style="width: 400px;height: 200px;border: #dcdcdc 1px solid;"></textarea> </td>
        </tr>
        <tr style="height: 70px;">
            <td align="center"><input name="" type="submit" value="确定" class="btn"></td>
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