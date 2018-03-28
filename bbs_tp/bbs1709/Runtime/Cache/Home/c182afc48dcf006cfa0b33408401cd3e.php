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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($configRes['webname']); ?></title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css"/>
	<script src="/Public/Home/js/fn.js" type="text/javascript"></script>
	<script type="text/javascript">
		window.onload=function(){
			var showBtn=document.getElementsByClassName('show');
			var con=document.getElementsByClassName('con');
			var bool=true;
			for(var i=0;i<showBtn.length;i++){
				showBtn[i].index=i;
				showBtn[i].onclick=function(){
					if(bool){
						con[this.index].className+=" hide";
					}else{
						con[this.index].classList.remove('hide');
					}
					bool=!bool;
				}
			}
			
			silider();
		}
	</script>
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
	<div class="banner inner clearfix">
		<div class="slider">
			<ul class="img_list">
		        <li class="img"><img src="/Public/Home/images/20170729083208.jpg"/></li>
		        <li class="hide img"><img src="/Public/Home/images/20170729083247.jpg" alt=""></li>
		        <li class="hide img"><img src="/Public/Home/images/20171102023340.jpg" alt=""></li>
		        <li class="hide img"><img src="/Public/Home/images/20170824010015.jpg" alt=""></li>
		        <li class="hide img"><img src="/Public/Home/images/20171102023328.jpg" alt=""></li>
		    </ul>
		    <ol class="btn_list">
		        <li class="ac btn">1</li>
		        <li class="btn">2</li>
		        <li class="btn">3</li>
		        <li class="btn">4</li>
		        <li class="btn">5</li>
		    </ol>
		</div>
		<div class="sPic">
			<div><img src="/Public/Home/images/lampt_1_20140529.jpg"/></div>
			<div><img src="/Public/Home/images/lampt_2_20140529.jpg"/></div>
		</div>
		<div class="sPic">
			<div><img src="/Public/Home/images/lampt_3.png"/></div>
			<div><img src="/Public/Home/images/lampt_4.png"/></div>
		</div>
	</div>
	<div class="news inner"><img src="/Public/Home/images/news_03.jpg"/></div>
	<?php if(is_array($res1)): foreach($res1 as $key=>$v1): ?><div class="block inner">
		<div class="title">
			<i><img src="/Public/Home/images/icon_07.jpg"/></i>
			<a href="#">:::. <?php echo ($v1['name']); ?> :::.</a>
			<i class="show"><img src="/Public/Home/images/cate_fold.gif"/></i>
		</div>
		<div class="con ">
			<ul class="line clearfix">
				<?php if(is_array($res2)): foreach($res2 as $key=>$v2): if($v2['pid'] == $v1['id']): ?><li>
						<div class="pic"><img src="/Public/Admin/images/blogos/s_<?php echo ($v2['blogo']); ?>"/></div>
						<div class="text">
							<p><a href="/index.php/Home/List/index/tid/<?php echo ($v2['id']); ?>" class="subject"><?php echo ($v2['name']); ?></a></p>
							<p>主题:<span>10675</span>帖子:<span>94376</span></p>
							<p><a href="#" class="time">最后发帖: <span>2017-12-25 09:28</span></a></p>
						</div>
					</li><?php endif; endforeach; endif; ?>
			</ul>
		</div>
	</div><?php endforeach; endif; ?>
	<div class="block inner connect">
		<div class="title">
			<i><img src="/Public/Home/images/icon_07.jpg"/></i>
			<a href="#">友情链接</a>
			<i class="show"><img src="/Public/Home/images/cate_fold.gif"/></i>
		</div>
		<div class="con ">
			<div>
				<?php if(is_array($linkRes)): foreach($linkRes as $key=>$val): ?><a href="<?php echo ($val['url']); ?>" target="_blank"><?php echo ($val['linkname']); ?></a><?php endforeach; endif; ?>
			</div>
		</div>
	</div>
	<div class="block inner online">
		<div class="title">
			<i><img src="/Public/Home/images/icon_07.jpg"/></i>
			<a href="#" class="infor">在线用户 - 共 1333 人在线,29 位会员,1304 位访客,最多 4931 人发生在 2013-06-07 05:37</a>
			<i class="show"><img src="/Public/Home/images/cate_fold.gif"/></i>
		</div>
		<div class="con ">
			<a href="#"><img src="/Public/Home/images/3.gif"/><span>司令（管理员）</span></a>
			<a href="#"><img src="/Public/Home/images/4.gif"/><span>连长（超版）</span></a>
			<a href="#"><img src="/Public/Home/images/5.gif"/><span>排长（版主）</span></a>
			<a href="#"><img src="/Public/Home/images/18.gif"/><span>教官</span></a>
			<a href="#"><img src="/Public/Home/images/10.gif"/><span>新兵</span></a>
			<a href="#"><img src="/Public/Home/images/6.gif"/><span>普通会员</span></a>
			<a href="#"><span class="open">[打开在线列表]</span></a>
		</div>
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