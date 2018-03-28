<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
    public function index(){
        Controller::getConfig();

        //获取post表的类别id
        $tid=I('get.tid');

        //实例化，并查询帖子标题 内容以及发帖人用户名
        $post=M('post');
        $res=$post->query('select user.userName,post.title,post.id,post.elite from user,post where user.id=post.uid && post.tid='.$tid);
//        var_dump($res);

        //获取一二级主题
        $type=M('type');
        $son=$type->field('id,name,pid')->find($tid);
        $father=$type->field('name')->where('id='.$son['pid'])->find();

        //压入数据，并解析模板
        $this->assign('res',$res);
        $this->assign('son',$son);
        $this->assign('father',$father);
        $this->assign('tid',$tid);
        $this->display('List/index');
    }
}