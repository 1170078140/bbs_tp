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
    <title>查看帖子详情</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
    <link rel="stylesheet" href="/Public/Home/css/list.css">
</head>
<body>
<div class="bread inner">
    <p style="">
        <a href="/index.php/Home/Index/index"><?php echo ($father['name']); ?></a>
        <i>></i>
        <a href="/index.php/Home/List/index/tid/5"><?php echo ($son['name']); ?></a>
    </p>
    <ul class="fr">
        <li class="mr10"><a href="#">新帖</a></li>
        <li class="mr5"><a href="#">精华</a></li>
    </ul>
</div>
<div id="pw_content" class="mb10 inner">
    <div id="sidebar" class="f_tree cc">
        <div class="content_thread cc">
            <div class="content_ie">
                <div class="hB mb10" style="padding-right:10px;font-size: 12px;">
                    <span class="fr">版主:  <a href=" _cardshow">吴擘君</a></span>
                    <h2 class="mr5 fl f14" style="font-size: 18px;"><?php echo ($name['name']); ?></h2>
                </div>
                <div class="threadInfo mb10" style="overflow:hidden;">
                    <table width="100%">
                        <tbody>
                            <tr class="vt" style="font-size: 12px">
                                <td width="10">
                                    <img src="/Public/Home/images/127.png" alt="" style="padding:0 10px;">
                                </td>
                                <td style="padding-right:10px;">
                                    <p class="mb5 s6 cc">
                                        今日:
                                        <span class="s2 mr10">0</span>
                                        <span class="gray2 mr10">|</span>
                                        主题:
                                        <span class="s2 mr10">10675</span>
                                        <span class="gray2 mr10">|</span>
                                        帖数:
                                        <span class="s2">2675</span>
                                    </p>
                                    <p class="s6" style="width: 100%;">PHP基础编程、疑难解答、学习和开发过程中的经验总结等。</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="c" style="font-size: 12px;">
                    <div class="sidePd10">
                        <div class="tabA">
                            <ul class="cc" id="lampnewtzdh">
                                <li class="current"><a href="#">全部</a></li>
                                <li id="thread_type_digest"><a href="#">精华</a></li>
                                <li><a href="#">投票</a></li>
                                <li><a href="#">悬赏</a></li>
                                <li><a href="#">商品</a></li>
                            </ul>
                        </div>
                        <div id="ajaxtable">
                            <div class="pw_ulA cc">
                                <ul class="cc" id="id_all">
                                    <li id="thread_type_all" class="current"><a href="#">全部</a></li>
                                    <li id="thread_type_1"><a href="#">已解决</a></li>
                                    <li id="thread_type_2"><a href="#">我要提问</a></li>
                                    <li id="thread_type_3"><a href="#">PHP</a></li>
                                    <li id="thread_type_5"><a href="#">其他</a></li>
                                    <li id="thread_type_6"><a href="#">经验技巧</a></li>
                                </ul>
                            </div>
                            <div class="threadCommon">
                                <table width="100%" style="table-layout:fixed;">
                                    <tbody>
                                        <tr class="tr2 thread_sort">
                                            <td style="padding-left:12px;">
                                                排序： &nbsp;
                                                <a href="#">最新发帖</a>
                                                <span class="gray">|</span>
                                                <a href="#" class="s6 current">最后回复</a>
                                            </td>
                                            <td class="author">作者</td>
                                            <td width="60">回复</td>
                                            <td class="author">最后发表</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" style="table-layout:fixed;" class="z">
                                    <tbody id="threadlist">

                                        <!-- 如果想要遍历数据，遍历tr3即可 -->
                                        <?php if(is_array($res)): foreach($res as $key=>$v): ?><tr class="tr3">
                                            <td class="icon tar" width="30" >
                                                <?php if($v['elite'] == 1): ?><a href="#"><img src="/Public/Home/images/topichot.gif" alt=""></a>
                                                    <?php else: endif; ?>
                                            </td>
                                            <td class="subject" id="td_149463">
                                                <img class="fr" src="/Public/Home/images/digest_1.gif" style="margin-top:4px;" alt="">
                                                <a href="/index.php/Home/Details/index/id/<?php echo ($v['id']); ?>/tid/<?php echo ($tid); ?>" class="subject_t f14"><?php echo ($v['title']); ?></a>&nbsp;
                                            </td>
                                            <td class="author" >
                                                <a href="#" class=" _cardshow"><?php echo ($v['username']); ?></a>
                                                <p>2012-11-22</p>
                                            </td>
                                            <td class="num" width="70">
                                                <em>1116</em>/53519
                                            </td>
                                            <td class="author" >
                                                <a href="#" class=" _cardshow">fkdmuji</a>
                                                <p><a href="#">5小时前</a></p>
                                            </td>
                                        </tr><?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cc" style="padding:10px;" id="tabA">
                        <a href="/index.php/Home/Post/index/id/<?php echo ($tid); ?>" class="post fr" id="td_post">发帖</a>
                        <div style="padding-top:4px;">
                            <div class="pages">
                                <b>1</b>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#">..534</a>
                                <a href="#" class="pages_next">下一页</a>
                                <div class="fl">到第</div>
                                <input type="text" size="3" onkeydown="javascript: if(event.keyCode==13){var value = parseInt(this.value); var page=(value>534) ? 534 : value;  location='thread.php?fid=127&search=all&page='+page+''; return false;}">
                                <div class="fl">页</div>
                                <button onclick="javascript:var value = parseInt(this.previousSibling.previousSibling.value); var page=(value>534) ? 534 : value;  location='thread.php?fid=127&search=all&page='+page+''; return false;">确认</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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