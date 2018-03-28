<?php
namespace Home\Controller;
use Think\Controller;
class ReplyController extends Controller {
    public function index(){
        Controller::getConfig();

        //判断是否登录
        if(empty($_SESSION['res']['id'])){
            $this->error('请先登录',U('Login/index'),2);
            die;
        }

        //获取帖子id，并查询对应的帖子信息
        $pid=I('get.pid');
        $post=M('post');
        $postRes=$post->find($pid);
        $tid=$postRes["tid"];

        //压入数据，并解析模板
        $this->assign('post',$postRes);
        $this->assign('pid',$pid);
        $this->display('Reply/index');
    }

    public function doReply()
    {
        // 获取信息，并添加到reply表格
        $reply=M('reply');
        $res = $reply->add($_POST);

        //判断结果
        if($res){
            echo "<script>alert('回帖成功');</script>";
        }else{
            $this->error('回帖失败');
        }
    }
}