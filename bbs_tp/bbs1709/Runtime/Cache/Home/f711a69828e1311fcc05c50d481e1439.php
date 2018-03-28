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
<html>
	<head>
		<meta charset="utf-8"/>
		<title>LAMP兄弟连-列表页</title>
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
		<link rel="stylesheet" href="/Public/Home/css/details.css">
		<script src="/Public/Home/js/fn.js"></script>
	</head>
	<body>
		<div class="inner">
			<!--引导层开始-->
			<div id="yindao">
				<p><a href="/index.php/Home/Index/index"><?php echo ($father['name']); ?></a> > <a href="/index.php/Home/list/index/tid/<?php echo ($_GET['tid']); ?>"><?php echo ($son['name']); ?></a> > <a href="/index.php/Home/Details/index/id/1/tid/5"><?php echo ($res['title']); ?></a></p>
			</div>
			<!--引导层结束-->
			
			<!--分页开始-->
			<div id="list">
				<div id="page">
					<div id="pagefy">
						<ul>
							<li><a href="#">< 返回列表</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">…537</a></li>
							<li><a href="#">下一页 ></a></li>
						</ul>
					</div>
					<div id="fatie">
						<a href="/index.php/Home/Reply/index/pid/<?php echo ($res['id']); ?>"><button id="replyBtn" >回复</button></a>
						<a href="/index.php/Home/Post/index/id/<?php echo ($tid); ?>"><button >发帖</button></a>
					</div>
				</div>
			</div>
			<!--分页结束-->

			<div style="display: none;" class="alertbox">
				<textarea></textarea>
				<input type="submit" value="确定" class="ok">
			</div>
			<div style="display: none;" class="modal"></div>
			
			<!--楼主帖子详情开始-->
			<div id="bigdetail">
				<div id="detail">
					<div id="lzinfo">
						<div id="read">
							<p>29585</p>
							<p>阅读</p>
						</div>
						<div id="reply">
							<p>641</p>
							<p>回复</p>
						</div>
						<div id="lztoux">
							<div id="uname">
								<a href="#"><?php echo ($userRes['nickname']); ?></a>
							</div>
							<div id="utoux">
								<img style="width: 100%;max-height: 132px;" src="/Public/Photos/<?php echo ($userRes['photo']); ?>"/>
							</div>
							<div id="ulevel">
								<a href="#">上士</a><br/>
								<img src="/Public/Home/images/details/jindu.png"/>
							</div>
							<div id="uhuiz">
								<a href="#"><img src="/Public/Home/images/details/new1.gif"/></a>
								<a href="#"><img src="/Public/Home/images/details/new2.gif"/></a>
								<a href="#"><img src="/Public/Home/images/details/new4.gif"/></a>
								<a href="#"><img src="/Public/Home/images/details/new5.gif"/></a>
								<a href="#"><img src="/Public/Home/images/details/new6.gif"/></a>
							</div>
							<div id="uguanz">
								<a href="#" class="jia">加关注</a>
								<a href="#" class="fa">发消息</a>
							</div>
						</div>
					</div>
					<div id="tzinfo">
						<div id="tzbiaot">
							<p><?php echo ($res['title']); ?><span><a href="#">[复制链接]</a></span></p>
						</div>
						<div id="tzxiangq">
							<div id="fttime">
								<p>楼主 发表于:2016-02-19</p>
								<ul>
									<li><a href="#">只看楼主</a></li>
									<li><a href="#">倒叙阅读</a></li>
									<li><a href="#">使用道具</a></li>
								</ul>
							</div>
							<div id="tzneir">
								<p><?php echo ($res['content']); ?></p>
							</div>
							<div id="tzfenx">
								<a href="#"><img src="/Public/Home/images/details/wechat.png"/></a>
								<a href="#"><img src="/Public/Home/images/details/QQ.png"/></a>
								<a href="#"><img src="/Public/Home/images/details/qzone.png"/></a>
								<a href="#"><img src="/Public/Home/images/details/weibo.png"/></a>
							</div>
							<div id="tzyinc">
								<div></div><p>附件设置隐藏，需要回复后才能看到！</p>
							</div>
							<div id="tzpingf">
								<p>共<span>2</span>条评分，兄弟连粮票<span>+10</span></p>
							</div>
							<div id="tzpingfxx">
								<div class='tzpingfxxleft'>
									<span class='tzjfname'><a href='#'>姜秀明</a></span> <span style="font-size:15px;">兄弟连粮票</span> <span class='tzjfnumber'>+5</span>
								</div>
								<div class='tzpingfxxright'>
									<span class='tzjfname'>2016-10-12 11:02:12</span>
								</div>
							</div>
							<div id="tzpingfxx">
								<div class='tzpingfxxleft'>
									<span class='tzjfname'><a href='#'>吴秀波</a></span> <span style="font-size:15px;">兄弟连粮票</span> <span class='tzjfnumber'>+5</span>
								</div>
								<div class='tzpingfxxright'>
									<span class='tzjfname'>2016-10-12 11:02:12</span>
								</div>
							</div>
							<div id="tzpingfxx">
								<div class='tzpingfxxleft'>
									<span class='tzjfname'><a href='#'>黄&nbsp;渤</a></span> <span style="font-size:15px;">兄弟连粮票</span> <span class='tzjfnumber'>+5</span>
								</div>
								<div class='tzpingfxxright'>
									<span class='tzjfname'>2016-10-12 11:02:12</span>
								</div>
							</div>
							<div class="tzhuif">
								<a href=''><img src='/Public/Home/images/details/huifu.jpg'/> <span>回复</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--楼主帖子详情结束-->
			
			<!--回帖信息开始-->
			<?php if(is_array($replyRes)): foreach($replyRes as $key=>$v): ?><div id='detail'>
				<div id="lzinfo">
						<div id="lztoux">
							<div id="uname">
								<a href="#"><?php echo ($v['nickName']); ?></a>
							</div>
							<div id="utoux">
								<img src="/Public/Photos/<?php echo ($v['photo']); ?>" width="118"/>
							</div>
							<div id="ulevel">
								<a href="#">下士</a><br/>
								<img src="/Public/Home/images/details/jindu.png"/>
							</div>
							<div id="uhuiz">
								<a href="#"><img src="/Public/Home/images/details/new1.gif"/></a>
								<a href="#"><img src="/Public/Home/images/details/new2.gif"/></a>
								<a href="#"><img src="/Public/Home/images/details/new4.gif"/></a>
							</div>
							<div id="uguanz">
								<a href="#" class="jia">加关注</a>
								<a href="#" class="fa">发消息</a>
							</div>
						</div>
					</div>
					<div id="tzinfo">
						<div id="tzxiangq">
							<div id="fttime">
								<p>沙发 发表于:<?php echo ($v['ctime']); ?></p>
								<ul>
									<li><a href="#">只看该作者</a></li>
								</ul>
							</div>
							<div id="tzneir">
								<p><?php echo ($v['content']); ?></p>
							</div>
							
							<div class="tzhuif">
								<a href=''><img src='/Public/Home/images/details/huifu.jpg'/> <span>回复</span></a>
							</div>
						</div>
					</div>
				<div class="htright">
				
				</div>
			</div><?php endforeach; endif; ?>
			<!--回帖信息结束-->
			
			<!--分页开始-->
			<div id="list">
				<div id="page">
					<div id="pagefy">
						<ul>
							<li><a href="#">< 返回列表</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">…537</a></li>
							<li><a href="#">下一页 ></a></li>
						</ul>
					</div>
					<div id="fatie">
						<a href="/index.php/Home/Reply/index/pid/<?php echo ($res['id']); ?>"><button image="/Public/Home/images/details/fatie.png">回复</button></a>
						<a href="/index.php/Home/Post/index/id/<?php echo ($tid); ?>"><button image="/Public/Home/images/details/fatie.png">发帖</button></a>
					</div>
				</div>
			</div>
			<!--分页结束-->
        </div>
		<div id="clear"></div>
		<!--大盒子结束-->
	</body>
	<!--<script>
		var replyBtn=document.getElementById('replyBtn');
        var oModal=document.getElementsByClassName('modal')[0];
        var oAlertbox=document.getElementsByClassName('alertbox')[0];
		replyBtn.onclick=function () {
            oModal.style.display='block';
            oAlertbox.style.display='block';

            //弹窗居中
            var screenW=document.documentElement.clientWidth;
            var screenH=document.documentElement.clientHeight;
            var l=(screenW-oAlertbox.offsetWidth)/2;
            var t=(screenH-oAlertbox.offsetHeight)/2;
            oAlertbox.style.left=l+"px";
            oAlertbox.style.top=t+"px";

            //点击确定，删除弹框和模态层
            var delBtn=oAlertbox.getElementsByClassName('ok')[0];
            delBtn.onclick= function () {
                oModal.style.display='none';
                oAlertbox.style.display='none';
            }
		}
	</script>-->
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