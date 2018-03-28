<?php
namespace Home\Controller;
use Think\Controller;
class DetailsController extends Controller {
    public function index(){
//        var_dump($_GET);
        Controller::getConfig();

        //实例化发帖表，并查询对应id的帖子的详情
        $post=M('post');
        $res=$post->find($_GET['id']);

        //实例化用户详情表，并查询对应uid的帖子的详情
        $ud=M('userdetail');
        $userRes=$ud->find($res['uid']);
//        var_dump($userRes);

        //获取一二级主题
        $tid=I('get.tid');
        $type=M('type');
        $son=$type->find($tid);
        $father=$type->where('id='.$son['pid'])->find();

        //获取回帖信息，以及回帖人信息
        $id=I('get.id');
        $reply=M('reply');
        $replyRes=$reply->where('pid='.$id)->select();

        foreach ($replyRes as $k=>$v){
            $ud=M('userdetail');
            $replyRes[$k]['nickName']=$ud->where('uid='.$v['uid'])->field('nickName')->find()['nickname'];
            $replyRes[$k]['photo']=$ud->where('uid='.$v['uid'])->field('photo')->find()['photo'];
        }

        //压入数据，并解析模板
        $this->assign('res',$res);
        $this->assign('tid',$tid);
        $this->assign('userRes',$userRes);
        $this->assign('father',$father);
        $this->assign('son',$son);
        $this->assign('replyRes',$replyRes);
        $this->display('Details/index');
    }
}